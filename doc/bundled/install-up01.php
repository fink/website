<?
$title = "Installation - Upgrade from 0.1";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/02/26 14:51:52';

$metatags = '<link rel="contents" href="install.php" title="Installation Contents"><link rel="prev" href="install-up02.php" title="Upgrading From Fink 0.2.x">';

include "header.inc";
?>

<h1>Installation - 5 Upgrading From Fink 0.1.x</h1>



<a name="upgrade-01"><h2>5.1 Clean cut</h2></a>
<p>
There is no direct upgrade path from Fink 0.1.x to Fink 0.2.x, because
they use different methods for underlying package management (stow
vs. dpkg). The only way to upgrade is to do a complete reinstall. The
procedure is as follows:
</p>
<ul>
<li><p>
Save any changes you have made to configuration files etc.
</p></li>
<li><p>
Save a list of packages you had installed. Hint: Try
<tt><nobr>ls /sw/var/fink-stamp</nobr></tt>.
</p></li>
<li><p>
If you have the source tarballs still lying around in /sw/src and
don't want to download them again, move them to another directory.
</p></li>
<li><p>
Wipe out the /sw directory, i.e. <tt><nobr>cd / ; rm -rf /sw</nobr></tt>.
Do this as root if neccessary.
</p></li>
<li><p>
Follow the procedures for a first time installation above.
</p></li>
<li><p>
When you're asked for an 'additional directory for downloaded
tarballs', enter the directory you moved the tarballs to.
</p></li>
<li><p>
Reinstall the packages you need.
</p></li>
</ul>





<?
include "footer.inc";
?>

