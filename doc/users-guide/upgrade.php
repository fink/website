<?
$title = "User's Guide - Upgrade";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/09/20 20:46:51';

$metatags = '<link rel="start" href="index.php" title="User\'s Guide Contents"><link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="prev" href="packages.php" title="Installing Packages">';

include "header.inc";
?>

<h1>User's Guide - Upgrading Fink</h1>




This chapter covers the procedures used to update your Fink
installation with the latest and greatest stuff.


<a name="bin"><h2>Upgrading using Binary Packages</h2></a>
<p>
[FIXME: no special procedure, just hit update in dselect or run
'apt-get update' and install as normal (apt-0.5.3-5 or later
required)]
</p>


<a name="src"><h2>Upgrading the Source Distribution</h2></a>
<p>
[FIXME: selfupdate (available in 0.2.5 and later) or download
packages-### tarball and run inject.pl, then 'fink update-all']
</p>





<?
include "footer.inc";
?>
