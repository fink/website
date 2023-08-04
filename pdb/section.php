<?php
$title = "Package Database - Obsolete page";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2012/03/27 14:26:13 $';

/* check path info */
if (isset($_SERVER["PATH_INFO"])) {
        $PATH_INFO = $_SERVER["PATH_INFO"];
} else {
        $PATH_INFO = "";
}
if ($PATH_INFO == "") {
	$section = "";
} elseif (preg_match("/^(\/[a-zA-Z0-9_.+-]+)$/", $PATH_INFO, $r)) {
	$section = $r[1];
} elseif (preg_match("/^(\/[a-zA-Z0-9_.+-]+\/[a-zA-Z0-9_.+-]+)$/", $PATH_INFO, $r)) {
	$section = $r[1];
}

$server = $_SERVER['SERVER_NAME'];
$location = "https://$server/pdb/browse.php";

if (isset($section)) {
	$location .= "?sec=" . $section;
}

// This page is obsolete. We redirect to browse.php
header("Location: $location");

?>
