<?
/* $Id: header.inc,v 1.5 2001/10/12 20:08:01 chrisp Exp $ */

$section = "documentation";
$parents = array("doc/index.php", "Document List");
$navbox = array(
  "doc/packaging/index.php", "Contents",
  "doc/packaging/intro.php", "Introduction",
  "doc/packaging/format.php", "File Format",
  "doc/packaging/policy.php", "Policy",
  "doc/packaging/fslayout.php", "FS Layout",
  "doc/packaging/reference.php", "Reference"
);
$printlink = "doc/packaging/packaging.html";

$fsroot = $root = "../../";
include $fsroot."header.inc";
?>
