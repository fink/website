<?
/* $Id: header.inc,v 1.5 2001/10/26 21:01:08 chrisp Exp $ */

$section = "documentation";
$parents = array("doc/index.php", "Document List");
$navbox = array(
  "doc/x11/index.php", "Contents",
  "doc/x11/intro.php", "Introduction",
  "doc/x11/history.php", "History",
  "doc/x11/inst-xfree86.php", "XFree86 (1)",
  "doc/x11/run-xfree86.php", "XFree86 (2)",
  "doc/x11/xtools.php", "Xtools",
  "doc/x11/other.php", "Other Stuff",
  "doc/x11/trouble.php", "Problems?",
  "doc/x11/tips.php", "Tips"
);
$printlink = "doc/x11/x11.html";

$fsroot = $root = "../../";
include $fsroot."header.inc";
?>
