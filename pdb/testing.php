<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/09/10 18:56:35 $';

$server = $_SERVER['SERVER_NAME'];
$location = "pdb/browse.php?tree=testing&nochildren=on";

// This page is obsolete. We redirect to browse.php
header("Location: http://$server/$location");

?>
