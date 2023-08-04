<?php
$title = "Package Database - Obsolete page";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:04:57 $';

$server = $_SERVER['SERVER_NAME'];
$location = "https://$server/pdb/browse.php";

if (isset($_GET['maintainer'])) {
	$maintainer = htmlspecialchars($_GET['maintainer']);
	$location .= "?maintainer=" . $maintainer;
}

// This page is obsolete. We redirect to browse.php
header("Location: $location");

?>
