<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/06 22:03:22 $';

$server = $_SERVER['SERVER_NAME'];
$location = "http://$server/pdb/browse.php?tree=testing&nochildren=on";

// This page is obsolete. We redirect to browse.php
header("Location: $location");

?>
