<?
/* $Id: header.inc,v 1.4 2001/08/11 20:18:29 chrisp Exp $ */

if ($uses_pathinfo) {
  if ($PATH_INFO == "") {
    $pispec = "-";
    $title .= "(none)";
    $pdbroot = "";
  } elseif (ereg("^/([a-zA-Z0-9_.+-]+)$", $PATH_INFO, $r)) {
    $pispec = $r[1];
    $title .= $pispec;
    $pdbroot = "../";
  } else {
    print '<p><b>PATH_INFO not in expected format!</b></p>';
    exit;
  }
  $root = "-".$pdbroot;
}

$navbox = array(
  "pdb/index.php", "Sections",
  "pdb/list.php", "Flat list",
  "pdb/testing.php", "Help needed"
);

include "timestamp.inc";

$fsroot = "../";
if (substr($root,0,1) == "-") {
  $root = substr($root.$fsroot,1);
} else {
  $root = $fsroot;
}
include $fsroot."header.inc";
?>
