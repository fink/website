<?php
$title = "Package Database - Obsolete page";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/05 19:04:34 $';

$server = $_SERVER['SERVER_NAME'];
$location = "pdb/browse.php?maintainer=None&nochildren=on";

// This page is obsolete. We redirect to browse.php
header("Location: http://$server/$location");

?>
