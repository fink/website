<?
/* $Id: header.inc,v 1.3 2001/08/03 16:51:30 chrisp Exp $ */

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
  "pdb/list.php", "Flat list"
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
