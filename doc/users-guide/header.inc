<?
/* $Id: header.inc,v 1.5 2001/10/12 20:08:01 chrisp Exp $ */

$section = "documentation";
$parents = array("doc/index.php", "Document List");
$navbox = array(
  "doc/users-guide/index.php", "Contents",
  "doc/users-guide/intro.php", "Introduction",
  "doc/users-guide/install.php", "First Install",
  "doc/users-guide/packages.php", "Packages",
  "doc/users-guide/upgrade.php", "Upgrade"
);
$printlink = "doc/users-guide/uguide.html";

$fsroot = $root = "../../";
include $fsroot."header.inc";
?>
