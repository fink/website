<?php
/* $Id: header.inc,v 1.33 2014/10/27 20:29:36 thesin Exp $ */

$linkroot  = "http://localhost/~justin/fink/"; //"http://www.finkproject.org/";
$localroot = "http://localhost/~justin/fink/"; //"http://pdb.finkproject.org/";
$pdbroot   = $localroot . "pdb/";

$section   = 'packages';
$navloc = "http://localhost/~justin/fink"; //"http://pdb.finkproject.org";
$disabled = false;

$server = $_SERVER['SERVER_NAME'];
$uri = $_SERVER['REQUEST_URI'];

if ($server == "fink.sourceforge.net") { 
  header("HTTP/1.1: 301 Moved Permanently");
  header("Location: http://pdb.finkproject.org$uri");
  exit();
}

if (!isset($cache_timeout)) {
	// 1 hour
	$cache_timeout = 3600;
}

header("Expires: " . gmdate("D, d M Y H:i:s", time() + $cache_timeout) . " GMT");
header("Cache-Control: max-age=" . $cache_timeout . ", s-maxage=" . ($cache_timeout / 2));

/* check path info */
if (isset($_SERVER["PATH_INFO"])) {
	$PATH_INFO = $_SERVER["PATH_INFO"];
} else {
	$PATH_INFO = "";
}
if (!isset($title)) $title = "";
if (isset($uses_pathinfo)) {
  if ($PATH_INFO == "") {
    $pispec = "-";
    $title .= "(none)";
    $pdbroot = "";
  } elseif (preg_match("/^(\/[a-zA-Z0-9_.+-]+)$/", $PATH_INFO, $r)) {
    $pispec = $r[1];
    $title .= $pispec;
    $pdbroot = "../";
  } elseif (preg_match("/^(\/[a-zA-Z0-9_.+-]+\/[a-zA-Z0-9_.+-]+)$/", $PATH_INFO, $r)) {
    $pispec = $r[1];
    $title .= $pispec;
    $pdbroot = "../../";
  } else {
    $pispec = "-";
    $title .= "(none)";
    $pdbroot = "../";
  }
  $root = "-".$pdbroot;
}

if (!empty($pdb_title)) {
	$title = $pdb_title;
}

/* generate page header and navigation */
$navbox = array(
  $localroot."pdb/index.php", "Introduction",
  $localroot."pdb/sections.php", "By Section",
  $localroot."pdb/browse.php", "By Package",
  $localroot."pdb/browse.php?nolist=on", "Package Search",
  $localroot."pdb/filefind.php", "File Search",
  $localroot."pdb/help.php", "Help needed"
);

$fsroot = "../";
global $root;
if (substr($root,0,1) == "-") {
  $root = substr($root.$fsroot,1);
} else {
  $root = $fsroot;
}

$metaindex = 'noindex';

include_once "hostlogo.inc";
include_once $fsroot."header.inc";

echo "<script>var linkroot = '" . $linkroot . "'; </script>";

$solrurl = 'http://localhost:8983/solr';

if ($disabled) {
	print "<p>The package database is down temporarily. Sorry for the inconvenience.</p>\n";
	include "footer.inc";
	exit(0);
}

?>
