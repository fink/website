<?
$title = "Package Database - Obsolete page";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/05 19:04:34 $';

$location = "browse.php";

if (isset($_GET['summary'])) {
	$summary = htmlspecialchars($_GET['summary']);
	$location .= "?summary=" . $summary;
}
else {
	$location .= "?nolist=on";
}

// This page is obsolete. We redirect to browse.php
header("Location: " . $location);

?>
