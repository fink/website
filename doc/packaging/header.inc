<?
/* $Id: header.inc,v 1.4 2001/09/30 14:57:23 chrisp Exp $ */

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

$fsroot = $root = "../../";
include $fsroot."header.inc";
?>
