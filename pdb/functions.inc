<?php

include_once('memcache.inc');

static $debug           = false;
static $cache_threshold = 250;  // number of packages in an object before storing

// Read url parameters. We use basic HTML encoding for now, and 
// cut off very long values, to make unforseen SQL injection hacks more difficult.
function get_safe_param($_param, $_valid_regexp='.*', $_max_length=120) {
	if (isset($_GET[$_param])) {
		$_value = $_GET[$_param];
	} else {
		$_value = "";
	}
	if (!empty($_value)) $has_param_name = true;
	if (strlen($_value) > $_max_length) {
		$_value = '';
	}
	if (!empty($_value) && !preg_match($_valid_regexp, $_value)) {
		$_value = '';
	}

	$_value = htmlspecialchars($_value);
	if (strlen($_value) > $_max_length) {
			$_value = '';
	}

	if (isset($has_param_name) && empty($_value))
		$invalid_param = true;
	else
		$invalid_param = false;
	return array (
		$_value,
		$invalid_param,
	);
}

function handle_last_modified($_key, $_query) {
	$last_modified = memcache_get_key($_key);
	if (!$last_modified) {
		$q = clone($_query);
		$q->setFields(array("infofilechanged"));
		$q->setSort(array("infofilechanged desc", "rel_id desc", "pkg_id desc"));
		$q->setRows(1);
		$q->setRaw(true);
	   $r = $q->fetch();
	   if (isset($r) && (isset($r->response)) && (is_object($r->response)) && $r->response->numFound >0) {
	      $date = $r->response->docs[0]->infofilechanged;
	      $last_modified = date_create($date)->format('D, d M Y H:i:s') . ' GMT';
	      memcache_set_key($_key, $last_modified, false, 1800);
	   } else {
	      $last_modified = gmdate('D, d M Y H:i:s') . ' GMT';
	   }
	}
	header("Last-Modified: $last_modified");
	return $last_modified;
}

function format_solr_date($date) {
	$returnval = date_create($date)->format("r");
	$returnval = preg_replace('/ \+\d+$/', ' (UTC)', $returnval);
	return $returnval;
}

function memcache_set_key($key, $value, $flag = false, $expire = 1800) {
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
	if (isset($parray['epoch']) && $parray['epoch'] != 0)
		$returnval = $parray['epoch'] . ':' . $returnval;
	return $returnval;
}

function parse_version($version) {
	$epoch = null;
	$revision = null;

	if (strrpos($version, ':')) {
		list($epoch, $version) = explode(":", $version);
	}
	if (strrpos($version, "-")) {
		list($version, $revision) = explode("-", $version, 2);
	}

	return array($epoch, $version, $revision);
}

function fetch_package($_name, $_version = null, $_distribution = null, $_release = null, $_architecture = null, $_showall = false) {
	$_query = new pdbQuery();

	$_query->addQuery("name_e:\"$_name\"", true);
	if ($_version != null)
		$_query->addQuery("version_e:\"$_version\"", true);
	if ($_distribution != null)
		$_query->addQuery("dist_name:\"$_distribution\"", true);
	if ($_release != null)
		$_query->addQuery("rel_type:\"$_release\"", true);
	if ($_architecture != null)
		$_query->addQuery("dist_architecture:\"$_architecture\"", true);
	if (!$_showall)
		$_query->addQuery("dist_visible:true", true);

	$_response = $_query->fetch();
	if ($_response == null || $_response == false) {
		return null;
	} elseif (count($_response) == 0) {
		return null;
	} elseif (count($_response) == 1 && is_array($_response)) {
		return array_shift($_response);
	} else {
		return $_response;
	}
}

class pdbQuery {
	protected $action;
	protected $url;
	protected $type;
	protected $raw     = false;
	protected $unique  = false;
	protected $rows    = 3000;
	protected $timeout = 1800;

	protected $fields  = array();
	protected $sort    = array();
	protected $query   = array();

	public function __construct($action = 'select', $url = 'http://localhost:8082/solr', $type = 'json') {
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
	public function setSort($sort)       { $this->sort = $sort; return $this; }
	public function addSort($sort)       { array_push($this->sort, $sort); return $this; }

	public function getQuery()           { return $this->query; }
	public function setQuery($query)     { $this->query = $query; return $this; }

	public function addQuery($query, $required = false, $exclude = false) {
		if ($required) {
			array_push($this->query, '+' . $query);
		} elseif ($exclude) {
			array_push($this->query, '-' . $query);
		} else {
			array_push($this->query, $query);
		}
		return $this;
	}

	public function fetch() {
		global $cache_threshold;
		require('pdbconfig.inc');

		$key    = $this->uniqueId();
		$result = memcache_get_key($key);

		if ($result == null || $result == false) {
			if ($pdbdb == 'sql')
				$result = $this->fetch_sql_uncached($this->unique);
			else
				$result = $this->fetch_solr_uncached($this->unique);
			if ($result != null && count($result) > $cache_threshold) {
				memcache_set_key($key, $result, false, $this->getTimeout());
			}
		}

		return $result;
	}

	public function fetch_sql_uncached() {
		$results = array();

		$fields = array();
		foreach ($this->getFields() as $field) {
			if ($field == 'doc_id')
				continue;

			$fields[] = $field;
		}

		$query  = "SELECT ";
		$query .= implode(',', $fields);
		$query .= " FROM `ldb`";

		// Parse $this->query and convert to sql
		$where = array();
		foreach ($this->query as $q) {

			if (preg_match("/^-/", $q))
				$q = str_replace(":", "!=", $q);
			else
				$q = str_replace(":", "=", $q);

			$q = preg_replace("/^[+-]/", "", $q);
			$q = preg_replace("/=true/", "=1 ", $q);
			$q = preg_replace("/=false/", "=0 ", $q);

			$where[] = $q;
		}

		if (!empty($where))
			$query .= " WHERE " . implode(' AND ', $where);
		if (!empty($this->getSort()))
			$query .= " ORDER BY " . implode(',', $this->getSort());
		$query .= " LIMIT " . $this->rows;

		/* Requires ADOdb for all SQL transactions */
		require_once("adodb/adodb-exceptions.inc.php");
		require_once("adodb/adodb.inc.php");

		if (empty($db)) {
			require('pdbconfig.inc');

			$db = NewADOConnection($sqldriver);
			$db->Connect($sqlhost, $sqluser, $sqlpass, $sqldb);
			$db->Execute("set names 'utf8'");
			$db->SetFetchMode(ADODB_FETCH_ASSOC);
		}

		// Get query
		try {
			$results = $db->getArray($query);
		} catch (exception $e) {
			$results = "DBerror: $e";
		}

		// return results
		return $results;
	}

	public function fetch_solr_uncached() {
		if ($this->getType() != "json") {
			throw new Exception("This class only knows how to handle JSON for now");
		}

		$start  = 0;
		$rows   = $this->rows;
		$count  = 0;
		$result = array();

		while (true) {
			$query           = $this . '&start=' . $start . '&rows=' . $this->rows;
			$get_response    = @file_get_contents($query);
			$parsed_response = json_decode($get_response);

			if ($parsed_response == null) {
				$result = "DBerror";
				break;
			}
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
		$returnval = "solr-query-" . $this->getAction() . "-" . ($this->unique? 'u' : 'n');

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
