<?
/* $Id: header.inc,v 1.9 2005/10/25 01:00:51 dmrrsn Exp $ */

$server = $_SERVER['SERVER_NAME'];
$uri = $_SERVER['REQUEST_URI'];

if ($server == "fink.sourceforge.net") { 
  header("HTTP/1.1: 301 Moved Permanently");
  header("Location: http://pdb.finkproject.org$uri");
  exit();
}

/* check path info */
$PATH_INFO = $HTTP_SERVER_VARS["PATH_INFO"];
if ($uses_pathinfo) {
  if ($PATH_INFO == "") {
    $pispec = "-";
    $title .= "(none)";
    $pdbroot = "";
  } elseif (ereg("^/([a-zA-Z0-9_.+-]+)$", $PATH_INFO, $r)) {
    $pispec = $r[1];
    $title .= $pispec;
    $pdbroot = "../";
  } elseif (ereg("^/([a-zA-Z0-9_.+-]+/[a-zA-Z0-9_.+-]+)$", $PATH_INFO, $r)) {
    $pispec = $r[1];
    $title .= $pispec;
    $pdbroot = "../../";
  } else {
    print '<p><b>PATH_INFO not in expected format!</b></p>';
    exit;
  }
  $root = "-".$pdbroot;
}

/* generate page header and navigation */
$section = "packages";
$navbox = array(
  "pdb/index.php", "Introduction",
  "pdb/sections.php", "By Section",
  "pdb/list.php", "By Package",
  "pdb/search.php", "Search",
  "pdb/testing.php", "Help needed"
);
include "timestamp.inc";

$fsroot = "../";
if (substr($root,0,1) == "-") {
  $root = substr($root.$fsroot,1);
} else {
  $root = $fsroot;
}
include "hostlogo.inc";
include $fsroot."header.inc";

/* connect to database */
include $fsroot."db.inc.php";
$dbh = mysql_pconnect($db_host, $db_user, $db_passwd);
mysql_select_db($db_name, $dbh);
?>
