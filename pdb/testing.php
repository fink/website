<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/09/27 19:51:10 $';

$server = $_SERVER['SERVER_NAME'];
$location = "pdb/browse.php?tree=testing&nochildren=on";

// This page is obsolete. We redirect to browse.php
header("Location: http://$server/$location");

?>
