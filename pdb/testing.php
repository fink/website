<?php
$title = "Package Database";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:04:57 $';

$server = $_SERVER['SERVER_NAME'];
$location = "http://$server/pdb/browse.php?tree=testing&nochildren=on";

// This page is obsolete. We redirect to browse.php
header("Location: $location");

?>
