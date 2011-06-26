<?php
$title = "Package Database - Obsolete page";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2011/06/26 23:14:08 $';

/* check path info */
$PATH_INFO = $HTTP_SERVER_VARS["PATH_INFO"];
if (preg_match("/^(\/[a-zA-Z0-9_.+-]+)$/", $PATH_INFO, $r)) {
	$section = $r[1];
} elseif (preg_match("/^(\/[a-zA-Z0-9_.+-]+\/[a-zA-Z0-9_.+-]+)$/", $PATH_INFO, $r)) {
	$section = $r[1];
}

$server = $_SERVER['SERVER_NAME'];
$location = "http://$server/pdb/browse.php";

if (isset($section)) {
	$location .= "?sec=" . $section;
}

// This page is obsolete. We redirect to browse.php
header("Location: $location");

?>
