<?php

include_once "memcache.inc";
include_once "functions.inc";
include_once "releases.inc";
include_once "sections.inc";

$invalid_param     = false;
$default_tree      = 'any';
$default_dist      = 'default';
$default_sort      = 'asc';

function addGETParam(&$_params, $_param_name) {
  if (isset($_GET[$_param_name])) {
    $_value = stripslashes($_GET[$_param_name]);
  } else {
    $_value = "";
  }
  if ($_value)
    $_params[$_param_name] = urlencode($_value);
}

function get_query_description() {
	$_desc = array();
	global $default_dist;
	global $default_tree;

	if (!empty($_GET['summary']))
		array_push($_desc, "Search = '" . $_GET['summary'] . "'");
	if (!empty($_GET['name']))
		array_push($_desc, "Name = '" . $_GET['name'] . "'");
	if (!empty($_GET['maintainer']))
		array_push($_desc, "Maintainer = '" . $_GET['maintainer'] . "'");
	if (!empty($_GET['dist_name']) && $_GET['dist_name'] != $default_dist)
		array_push($_desc, "Distribution = '" . $_GET['dist_name'] . "'");
	elseif (!empty($_GET['dist']))
		array_push($_desc, "Distribution = '" . $_GET['dist'] . "'");
	if (!empty($_GET['architecture']))
		array_push($_desc, "Architecture = '" . $_GET['architecture'] . "'");
	if (!empty($_GET['tree']) && $_GET['tree'] != $default_tree)
		array_push($_desc, "Tree = '" . $_GET['tree'] . "'");
	if (!empty($_GET['sec']))
		array_push($_desc, "Section = '" . $_GET['sec'] . "'");
	if (!empty($_GET['depends']))
		array_push($_desc, "Depends = '" . $_GET['depends'] . "'");
	if (!empty($_GET['builddepends']))
		array_push($_desc, "BuildDepends = '" . $_GET['builddepends'] . "'");
	return join(", ", $_desc);
}

function get_query_params() {
	$_getparams    = array();
	$_query_params = "";

	global $default_tree;
	global $default_dist;

	if (isset($_GET['nomaintainer'])) {
		$_value = $_GET['nomaintainer'];
	} else {
		$_value = 'off';
	}
	if ($_value == 'on')
		$_GET['maintainer'] = 'None';
	addGETParam($_getparams, 'maintainer');
	addGETParam($_getparams, 'name');
	addGETParam($_getparams, 'summary');
	addGETParam($_getparams, 'nolist');
	addGETParam($_getparams, 'dist');
	addGETParam($_getparams, 'dist_name');
	addGETParam($_getparams, 'architecture');
	addGETParam($_getparams, 'tree');
	addGETParam($_getparams, 'sec');
	addGETParam($_getparams, 'nochildren');
	addGETParam($_getparams, 'noshlibsdev');
	addGETParam($_getparams, 'showall');
	addGETParam($_getparams, 'name_exact');
	addGETParam($_getparams, 'doc_id');
	addGETParam($_getparams, 'pkg_id');
	addGETParam($_getparams, 'depends');
	addGETParam($_getparams, 'builddepends');
	foreach ($_getparams as $_key => $_value) {
		if ($_key == "dist_name" && $_value == $default_dist)
			continue;
		if ($_key == "tree" && $_value == $default_tree)
			continue;
		$_query_params .= htmlentities($_key) . '=' . htmlentities($_value) . '&';
	}
	$_query_params = rtrim($_query_params, '&?');
	$_query_params = str_replace("&amp;",'&',$_query_params);
	return $_query_params;
}

if (isset($_GET['submit']) && $_GET['submit'] == 'Search') {
  header("Location: browse.php?" . get_query_params());
}

$pdb_has_adv_searchoptions = false;

// Read url parameters
// NOTE: You have to change the parameter list at the top of this file as well

list($maintainer, $inv_p) = get_safe_param('maintainer', '/../');
$invalid_param = $invalid_param || $inv_p;
if ($inv_p) { $invalid_param_text = 'Maintainer must be at least 2 characters!'; }
if (!empty($maintainer)) $pdb_has_adv_searchoptions = true;

list($name, $inv_p) = get_safe_param('name', '/^[a-z0-9\+\-\.\%]+$/');
$invalid_param = $invalid_param || $inv_p;
if ($inv_p) { $invalid_param_text = 'Name contained invalid characters!'; }
if (!empty($name)) $pdb_has_adv_searchoptions = true;

list($summary, $inv_p) = get_safe_param('summary', '/../');
$invalid_param = $invalid_param || $inv_p;
if ($inv_p) { $invalid_param_text = 'Summary search must be at least 2 characters!'; }

list($nolist, $inv_p) = get_safe_param('nolist', '/on/');
$invalid_param = $invalid_param || $inv_p;

list($dist_name, $inv_p) = get_safe_param('dist_name', '/^[a-z0-9\+\-\.\%]+$/');
$invalid_param = $invalid_param || $inv_p;
if (empty($dist_name)) $dist_name = $default_dist;
if (!empty($dist_name) && $dist_name != $default_dist) $pdb_has_adv_searchoptions = true;

list($dist, $inv_p) = get_safe_param('dist', '/^[a-z0-9\+\-\.\%]+$/');
$invalid_param = $invalid_param || $inv_p;

list($architecture, $inv_p) = get_safe_param('architecture', '/^(i386|powerpc|x86_64)$/');
$invalid_param = $invalid_param || $inv_p;

list($tree, $inv_p) = get_safe_param('tree', '/^(any|testing|bindist|stable|unstable)$/');
$invalid_param = $invalid_param || $inv_p;
if (empty($tree)) $tree = $default_tree;
if (!empty($tree) && $tree != $default_tree) $pdb_has_adv_searchoptions = true;

list($sec, $inv_p) = get_safe_param('sec', '/^[a-z0-9\+\-\.\/]+$/');
$invalid_param = $invalid_param || $inv_p;
if (!empty($sec)) $pdb_has_adv_searchoptions = true;

if (isset($_GET['nochildren'])) {
	$nochildren = $_GET['nochildren'];
} else {
	$nochildren = "";
}
if ($nochildren != "on") $nochildren = '';
if (!empty($nochildren)) $pdb_has_adv_searchoptions = true;

if (isset($_GET['noshlibsdev'])) {
	$noshlibsdev = $_GET['noshlibsdev'];
} else {
	$noshlibsdev = "";
}
if ($noshlibsdev != "on") $noshlibsdev = '';
if (!empty($noshlibsdev)) $pdb_has_adv_searchoptions = true;

if (isset($_GET['sort'])) {
	$sort = $_GET['sort'];
} else {
	$sort = "";
}
if ($sort != "desc") $sort = $default_sort;

list($showall, $inv_p) = get_safe_param('showall', '/^on$/');
$invalid_param = $invalid_param || $inv_p;

list($name_exact, $inv_p) = get_safe_param('name_exact', '/(on|checked)/');
$invalid_param = $invalid_param || $inv_p;
if (!empty($name_exact)) $pdb_has_adv_searchoptions = true;

list($doc_id, $inv_p) = get_safe_param('doc_id', '/^[a-zA-Z0-9\:\+\-\.]+$/');
$invalid_param = $invalid_param || $inv_p;

list($pkg_id, $inv_p) = get_safe_param('pkg_id', '/^[a-zA-Z0-9\:\+\-\.]+$/');
$invalid_param = $invalid_param || $inv_p;

list($depends, $inv_p) = get_safe_param('depends', '/^[a-z0-9\+\-\.\%]+$/');
$invalid_param = $invalid_param || $inv_p;
if ($inv_p) { $invalid_param_text = 'Depends contained invalid characters!'; }

list($builddepends, $inv_p) = get_safe_param('builddepends', '/^[a-z0-9\+\-\.\%]+$/');
$invalid_param = $invalid_param || $inv_p;
if ($inv_p) { $invalid_param_text = 'BuildDepends contained invalid characters!'; }

$name_exact = strtolower($name_exact);
if ($name_exact == "on" || $name_exact == "checked" || $name_exact == "true" || $name_exact == "yes") {
	$name_exact = true;
} else {
	$name_exact = false;
}

// We need to set a specific distribution if showing packages in "testing"
// Select the one with the highest priority. If an architecture was specified,
// take that into account, too.
if ($tree == 'testing') {
	foreach ($distributions as $_d) {
		if (empty($dist_name) or $dist_name == $default_dist or $dist_name == "any") {
			$dist = $_d->getId();
		} else {
			if ($architecture and ($_d->getArchitecture() != $architecture)) {
				# Architecture mismatch -> skip
				continue;
			}
			# Only consider dists which have matching name and are visible.
			# The visibility check ensures that we don't end up taking the 10.5-x86_64
			# distribution which is empty and unsupported.
			if ($_d->getName() == $dist_name and $_d->isVisible()) {
				$dist = $_d->getId();
			}
		}
	}
}

$query = new pdbQuery();

$query->addField("name");
$query->addField("name_e");
$query->addField("version");
$query->addField("revision");
$query->addField("descshort");
$query->addField("rel_type");

// TODO: "testing" is where stable version != unstable version

if ($dist)
	$query->addQuery("dist_id:\"$dist\"", true);
if ($dist_name == $default_dist)
	$query->addQuery("+(dist_name:\"10.9\" OR dist_name:\"10.10\" OR dist_name:\"10.11\" OR dist_name:\"10.12\" OR dist_name:\"10.13\" OR dist_name:\"10.14\" OR dist_name:\"10.14.5\" OR dist_name:\"10.15\" OR dist_name:\"11.0\" OR dist_name:\"11.3\" OR dist_name:\"12.0\" OR dist_name:\"13.0\")");
elseif ($dist_name != 'any')
	$query->addQuery("dist_name:\"$dist_name\"", true);
if ($architecture)
	$query->addQuery("dist_architecture:\"$architecture\"", true);
if ($tree) {
	if ($tree == 'testing')
		$query->addQuery("(+rel_type:\"stable\" OR +rel_type:\"unstable\")");
	elseif ($tree != 'any')
		$query->addQuery("rel_type:\"$tree\"", true);
}
if (!$showall)
	$query->addQuery("dist_visible:true", true);
if ($nochildren == "on")
	$query->addQuery("has_parent:false", true);
if ($noshlibsdev == "on")
	$query->addQuery("is_common_splitoff:false", true);

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

if (!empty($sec)) {
	$section_query = "section:\"$sec\"";

	if ($sec == "games")
		$section_query = "(section:\"$sec\" OR parentname:games OR parentname:toys)";
	elseif ($sec == "graphics")
		$section_query = "(section:\"$sec\" OR parentname:graphics)";
	elseif ($sec == "sound")
		$section_query = "(section:\"$sec\" OR parentname:multimedia)";
	elseif ($sec == "utils") {
		$section_query = "((section:\"$sec\" OR parentname:utils) AND NOT parentname:webmin)";
	}

	$query->addQuery($section_query, true);
}

if (!empty($pkg_id))
	$query->addQuery("pkg_id:\"$pkg_id\"", true);

if (!empty($doc_id))
	$query->addQuery("doc_id:\"$doc_id\"", true);

if (!empty($depends))
	$query->addQuery("depends:\"$depends\"", true);

if (!empty($builddepends))
	$query->addQuery("builddepends:\"$builddepends\"", true);


$query->addSort("name_e $sort");
$query->addSort("epoch desc");
$query->addSort("version_e desc");
$query->addSort("revision_e desc");
$query->addSort("dist_id desc");
$query->addSort("dist_architecture desc");

if ($tree != "testing") {
	$query->setUnique(true);
}

$link_alternate =  "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS\" href=\"rss.php?format=RSS2.0&amp;" . get_query_params() . "\">\n";
$link_alternate .= "<link rel=\"alternate\" type=\"application/atom+xml\" title=\"Atom\" href=\"rss.php?format=ATOM&amp;" . get_query_params() . "\">\n";
?>
