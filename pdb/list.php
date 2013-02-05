<?php
$title = "Package Database - Obsolete page";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2013/02/05 23:48:30 $';

if (isset($_SERVER['SERVER_NAME'])) {
	$server = $_SERVER['SERVER_NAME'];
} else {
	$server = "localhost";
}
$location = "http://$server/pdb/browse.php";

// This page is obsolete. We redirect to browse.php
header("Location: $location");

?>
