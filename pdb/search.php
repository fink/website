<?php
$title = "Package Database - Obsolete page";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/09/10 18:56:35 $';

$server = $_SERVER['SERVER_NAME'];
$location = "pdb/browse.php";

if (isset($_GET['summary'])) {
	$summary = htmlspecialchars($_GET['summary']);
	$location .= "?summary=" . $summary;
}

// This page is obsolete. We redirect to browse.php
header("Location: http://" . $server . "/" . $location);

?>
