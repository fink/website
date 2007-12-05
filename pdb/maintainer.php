<?
$title = "Package Database - Obsolete page";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/05 19:04:34 $';

$location = "browse.php";

if (isset($_GET['maintainer'])) {
	$maintainer = htmlspecialchars($_GET['maintainer']);
	$location .= "?maintainer=" . $maintainer;
}

// This page is obsolete. We redirect to browse.php
header("Location: " . $location);

?>
