<?
/* $Id: header.inc,v 1.4 2001/09/30 14:57:23 chrisp Exp $ */

$section = "documentation";
$parents = array("doc/index.php", "Document List");
$navbox = array(
  "doc/porting/index.php", "Contents",
  "doc/porting/basics.php", "Basics",
  "doc/porting/shared.php", "Shared Code",
  "doc/porting/libtool.php", "libtool"
);

$fsroot = $root = "../../";
include $fsroot."header.inc";
?>
