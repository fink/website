<?php

include_once('memcache.inc');

static $debug           = false;
static $cache_threshold = 250;  // number of packages in an object before storing

// Read url parameters. We use basic HTML encoding for now, and 
// cut off very long values, to make unforseen SQL injection hacks more difficult.
function get_safe_param($param_name, $valid_regexp='.*', $max_length=120) {
	$param_name = $_GET[$param_name];
	if ($param_name) $has_param_name = true;
	if (strlen($param_name) > $max_length || !preg_match($valid_regexp, $param_name)) {
		$param_name = '';
	} else {
		#$param_name = mysql_real_escape_string(htmlspecialchars($param_name));
		$param_name = htmlspecialchars($param_name);
		if (strlen($param_name) > $max_length || !preg_match($valid_regexp, $param_name))
			$param_name = '';
	}
	if ($has_param_name && !$param_name)
		$invalid_param = true;
	else
		$invalid_param = false;
	return array (
		$param_name,
		$invalid_param,
	);
}

function format_solr_date($date) {
	$returnval = date_create($date)->format("r");
	$returnval = preg_replace('/ \+\d+$/', ' (UTC)', $returnval);
	return $returnval;
}

function memcache_set_key($key, $value, $flag = false, $expire = 3600) {
	global $debug;
	global $memcache;
	if (isset($memcache) && !$debug) {
		$memcache->set($key, $value, $flag, $expire);
	}
}

function memcache_get_key($key) {
	global $debug;
	global $memcache;
	if (isset($memcache) && !$debug) {
		return $memcache->get($key);
	}
	return false;
}

function get_full_version($parray) {
	if ($parray == null)
		return "unknown";
	$returnval = $parray['version'] . '-' . $parray['revision'];
	if ($parray['epoch'])
		$returnval = $parray['epoch'] . ':' . $returnval;
	return $returnval;
}

function parse_version($version) {
	$epoch = null;
	$revision = null;

	if (strrpos($version, ':')) {
		list($epoch, $version) = split(":", $version);
	}
	if (strrpos($version, "-")) {
		list($version, $revision) = split("-", $version, 2);
	}

	return array($epoch, $version, $revision);
}

function fetch_package($name, $version = null, $distribution = null, $release = null, $architecture = null, $showall = false) {
	$query = new SolrQuery();

	$query->addQuery("name_e:\"$name\"", true);
	if ($version != null)
		$query->addQuery("version_e:\"$version\"", true);
	if ($distribution != null)
		$query->addQuery("dist_name:\"$distribution\"", true);
	if ($release != null)
		$query->addQuery("rel_type:\"$release\"", true);
	if ($architecture != null)
		$query->addQuery("dist_architecture:\"$architecture\"", true);
	if (!$showall)
		$query->addQuery("dist_visible:true", true);

	$response = $query->fetch();
	if ($response == null || $response == false) {
		return null;
	} elseif (count($response) == 0) {
		return null;
	} elseif (count($response) == 1) {
		return array_shift($response);
	} else {
		return $response;
	}
}

class SolrQuery {
	protected $action;
	protected $url;
	protected $type;
	protected $raw     = false;
	protected $unique  = false;
	protected $rows    = 3000;
	protected $timeout = 3600;

	protected $fields  = array();
	protected $sort    = array();
	protected $query   = array();

	public function __construct($action = 'select', $url = 'http://localhost:8983/solr', $type = 'json') {
		$this->setAction($action);
		$this->setUrl($url);
		$this->setType($type);
	}

	public function getAction()          { return $this->action; }
	public function setAction($action)   { $this->action = $action; }
	public function getUrl()             { return $this->url; }
	public function setUrl($url)         { $this->url = $url; }
	public function getType()            { return $this->type; }
	public function setType($type)       { $this->type = $type; }

	public function setRaw($raw)         { $this->raw = $raw; }
	public function getRows()            { return $this->rows; }
	public function setRows($rows)       { $this->rows = $rows; }

	public function getUnique()          { return $this->unique; }
	public function setUnique($unique)   { $this->unique = $unique; }

	public function getTimeout()         { return $this->timeout; }
	public function setTimeout($seconds) { $this->timeout = $timeout; }
	public function setFields($fields)   { $this->fields = $fields; }
	public function addField($field)     { array_push($this->fields, $field); }
	public function getFields()          {
		$retval = array('*');

		if (count($this->fields) != 0) {
			$retval = array('doc_id');
			foreach ($this->fields as $field) {
				if ($field == "doc_id") continue;
				array_push($retval, $field);
			}
		}
		return $retval;
	}

	public function getSort()            { return $this->sort; }
	public function setSort($sort)       { $this->sort = $sort; }
	public function addSort($sort)       { array_push($this->sort, $sort); }

	public function getQuery()           { return $this->query; }
	public function setQuery($query)     { $this->query = $query; }

	public function addQuery($query, $required = false, $exclude = false) {
		if ($required) {
			array_push($this->query, '+' . $query);
		} elseif ($exclude) {
			array_push($this->query, '-' . $query);
		} else {
			array_push($this->query, $query);
		}
	}

	public function fetch() {
		global $cache_threshold;

		$key    = $this->uniqueId();
		$result = memcache_get_key($key);

		if ($result == null || $result == false) {
			$result = $this->fetch_uncached($unique);
			if ($result != null && count($result) > $cache_threshold) {
				memcache_set_key($key, $result, false, $this->getTimeout());
			}
		}

		return $result;
	}

	public function fetch_uncached() {
		if ($this->getType() != "json") {
			throw new Exception("This class only knows how to handle JSON for now");
		}

		$start  = 0;
		$rows   = $this->rows;
		$count  = 0;
		$result = array();

		while (true) {
			$query           = $this . '&start=' . $start . '&rows=' . $this->rows;
			$get_response    = file_get_contents($query);
			$parsed_response = json_decode($get_response);

			if ($parsed_response == null) break;
			if ($this->raw) return $parsed_response;
			$numfound = $parsed_response->response->numFound;

			foreach ($parsed_response->response->docs as $res) {
				$count++;
				foreach ($res as $key => $value) {
					if ($this->unique) {
						$result[$res->name_e][$key] = $value;
					} else {
						$result[$res->doc_id][$key] = $value;
					}
				}
			}

			if ($count >= $numfound)
				break;

			$start += $this->rows;
		}

		return $result;
	}

	public function uniqueId() {
		$returnval = "solr-query-" . $this->getAction() . "-" . ($unique? 'u' : 'n');

		$md5key = "";
		foreach ($this as $key => $value) {
			if ($key == "action" || $key == "unique") continue;
			$md5key .= $key;
			if (is_array($value)) {
				foreach ($value as $array_contents) {
					$md5key .= $array_contents;
				}
			}
		}
		$returnval .= "-" . md5($md5key);
		return $returnval;
	}

	public function __toString() {
		$returnval = $this->url . "/" . $this->action . "?wt=" . $this->type;

		if (count($this->getSort()) > 0) {
			$returnval .= "&sort=" . urlencode(join(",", $this->getSort()));
		}

		if (count($this->getFields()) > 0) {
			$returnval .= "&fl=" . urlencode(join(",", $this->getFields()));
		} else {
			$returnval .= "&fl=*";
		}

		$returnval .= "&q=" . urlencode(join(" ", $this->getQuery()));

		return $returnval;
	}
}

?>
