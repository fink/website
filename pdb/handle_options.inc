<?

include_once "memcache.inc";
include_once "functions.inc";
include_once "releases.inc";
include_once "sections.inc";

function addGETParam(&$params, $param_name) {
  $value = stripslashes($_GET[$param_name]);
  if ($value)
    $params[$param_name] = urlencode($value);
}

function get_query_params() {
	$getparams    = array();
	$query_params = "";

	$value = $_GET['nomaintainer'];
	if ($value == 'on')
		$_GET['maintainer'] = 'None';
	addGETParam($getparams, 'maintainer');
	addGETParam($getparams, 'name');
	addGETParam($getparams, 'summary');
	addGETParam($getparams, 'nolist');
	addGETParam($getparams, 'dist');
	addGETParam($getparams, 'tree');
	addGETParam($getparams, 'section');
	addGETParam($getparams, 'nochildren');
	addGETParam($getparams, 'noshlibsdev');
	addGETParam($getparams, 'sort');
	addGETParam($getparams, 'showall');
	addGETParam($getparams, 'name_exact');
	addGETParam($getparams, 'doc_id');
	addGETParam($getparams, 'pkg_id');
	foreach ($getparams as $key => $value) {
		$query_params .= "$key=$value&";
	}
	$query_params = rtrim($query_params, '&?');
	return $query_params;
}

if (isset($_GET['submit']) && $_GET['submit'] == 'Search') {
  header("Location: browse.php?" . get_query_params());
}

// are there any advanced search options? If no, collapse advanced search div
if ($_GET['maintainer'] || $_GET['name'] || $_GET['dist'] || $_GET['tree'] || $_GET['section'] || $_GET['nochildren'] || $_GET['noshlibsdev'] || $_GET['sort'] || $_GET['name_exact'])
  $pdb_has_adv_searchoptions = true;
else
  $pdb_has_adv_searchoptions = false;

// Read url parameters
// NOTE: You have to change the parameter list at the top of this file as well

$invalid_param = false;

list($maintainer, $inv_p) = get_safe_param('maintainer', '/^[a-zA-Z0-9\.@%\&\'\\\ ]+$/');
$invalid_param = $invalid_param || $inv_p;
if ($inv_p) { $invalid_param_text = 'Maintainer contained invalid characters!'; }

list($name, $inv_p) = get_safe_param('name', '/^[a-z0-9\+\-\.\%]+$/');
$invalid_param = $invalid_param || $inv_p;
if ($inv_p) { $invalid_param_text = 'Name contained invalid characters!'; }

list($summary, $inv_p) = get_safe_param('summary', '/../');
$invalid_param = $invalid_param || $inv_p;
if ($inv_p) { $invalid_param_text = 'Summary search must be at least 2 characters!'; }

list($nolist, $inv_p) = get_safe_param('nolist', '/on/');
$invalid_param = $invalid_param || $inv_p;

list($dist, $inv_p) = get_safe_param('dist', '/^[a-z0-9\+\-\.\%]+$/');
$invalid_param = $invalid_param || $inv_p;

list($tree, $inv_p) = get_safe_param('tree', '/^(bindist|stable|unstable)$/');
$invalid_param = $invalid_param || $inv_p;

list($section, $inv_p) = get_safe_param('section', '/^[a-z0-9\+\-\.\/]+$/');
$invalid_param = $invalid_param || $inv_p;

$nochildren = $_GET['nochildren'];
if ($nochildren != "on") $nochildren = '';

$noshlibsdev = $_GET['noshlibsdev'];
if ($noshlibsdev != "on") $noshlibsdev = '';

$sort = $_GET['sort'];
if ($sort != "desc") $sort = 'asc';

list($showall, $inv_p) = get_safe_param('showall', '/^on$/');
$invalid_param = $invalid_param || $inv_p;

list($name_exact, $inv_p) = get_safe_param('name_exact', '/(on|checked)/');
$invalid_param = $invalid_param || $inv_p;

list($doc_id, $inv_p) = get_safe_param('doc_id', '/^[a-zA-Z0-9\:\+\-\.]+$/');
$invalid_param = $invalid_param || $inv_p;

list($pkg_id, $inv_p) = get_safe_param('pkg_id', '/^[a-zA-Z0-9\:\+\-\.]+$/');
$invalid_param = $invalid_param || $inv_p;

$name_exact = strtolower($name_exact);
if ($name_exact == "on" || $name_exact == "checked" || $name_exact == "true" || $name_exact == "yes") {
	$name_exact = true;
} else {
	$name_exact = false;
}

// We need to set a specific distribution if showing packages in "testing"
// Select the one with the highest priority
if ($tree == 'testing' && empty($dist)) {
	foreach($distributions as $d) {
		$dist = $d;
	}
}

$query = new SolrQuery();

$query->addField("name");
$query->addField("name_e");
$query->addField("version");
$query->addField("revision");
$query->addField("descshort");
$query->addField("rel_type");

// TODO: "testing" is where stable version != unstable version

if ($dist)
	$query->addQuery("dist_id:\"$dist\"", true);
if ($tree) {
	if ($tree == "testing")
		$query->addQuery("(+rel_type:\"stable\" OR +rel_type:\"unstable\")");
	else
		$query->addQuery("rel_type:\"$tree\"", true);
}
if (!$showall)
	$query->addQuery("dist_visible:true", true);
if ($nochildren == "on")
	$query->addQuery("has_parent:false", true);
if ($noshlibsdev == "on")
	$query->addQuery("has_common_splitoffs:false", true);

if (!empty($maintainer))
	$query->addQuery("maintainer:\"$maintainer\"", true);

if (!empty($name)) {
	if ($name_exact) {
		$query->addQuery("name_e:\"$name\"", true);
	} else {
		$query->addQuery("name:\"$name\"", true);
	}
}

if (!empty($summary))
	$query->addQuery("text:\"$summary\"", true);

if (!empty($section)) {
	$section_query = "section:\"$section\"";

	if ($section == "games")
		$section_query = "(section:\"$section\" OR parentname:games OR parentname:toys)";
	elseif ($section == "graphics")
		$section_query = "(section:\"$section\" OR parentname:graphics)";
	elseif ($section == "sound")
		$section_query = "(section:\"$section\" OR parentname:multimedia)";
	elseif ($section == "utils") {
		$section_query = "((section:\"$section\" OR parentname:utils) AND NOT parentname:webmin)";
	}

	$query->addQuery($section_query, true);
}

if (!empty($pkg_id))
	$query->addQuery("pkg_id:\"$pkg_id\"", true);

if (!empty($doc_id))
	$query->addQuery("doc_id:\"$doc_id\"", true);



$query->addSort("name_e $sort");
$query->addSort("epoch asc");
$query->addSort("version_e asc");
$query->addSort("revision_e asc");
$query->addSort("dist_id asc");
$query->addSort("dist_architecture asc");

if ($section != "testing") {
	$query->setUnique(true);
}

$link_alternate =  "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS\" href=\"rss.php?format=RSS2.0&" . get_query_params() . "\" />\n";
$link_alternate .= "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"Atom\" href=\"rss.php?format=ATOM&" . get_query_params() . "\" />\n";
