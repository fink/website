<?
/* $Id: header.inc,v 1.5 2001/10/12 20:08:01 chrisp Exp $ */

$section = "documentation";
$parents = array("doc/index.php", "Document List");
$navbox = array(
  "doc/porting/index.php", "Contents",
  "doc/porting/basics.php", "Basics",
  "doc/porting/shared.php", "Shared Code",
  "doc/porting/libtool.php", "libtool"
);
$printlink = "doc/porting/porting.html";

$fsroot = $root = "../../";
include $fsroot."header.inc";
?>
