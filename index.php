<?
$title = "Home";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2002/05/29 16:00:54 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, software, distribution, Fink">
';

include "header.inc";
?>


<p>
The Fink project wants to bring the full world of Unix
<a href="http://www.opensource.org/">Open Source</a> software to
<a href="http://www.opensource.apple.com/">Darwin</a> and
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
We modify Unix software so that it compiles and runs on Mac OS X
("port" it) and make it available for download as a coherent
distribution.
Fink uses <a href="http://www.debian.org/">Debian</a> tools like dpkg
and apt-get to provide powerful binary package management.
You can choose whether you want to download precompiled binary
packages or build everything from source.
<a href="about.php">Read more...</a>
</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h2>News</h2>

<p>2002-05-29: Fink <a href="news/kde.php">announces support</a> for
<a href="http://www.kde.org">KDE</a>.  Packages are available in the
unstable distribution, as well as pre-built binaries.  For more
information on installing and running it, see the full
<a href="news/kde.php">KDE Support In Fink</a> announcement.
</p>
<p>2002-05-03: All Fink users are urged to update their <i>passwd</i> 
package to version 20020329 or newer. Older versions of the 
<i>passwd</i> package are affected by a bug which could lead to the 
loss of all data on your hard disk if you remove system users created 
by Fink manually from the system via System Preferences. (Removing 
them via the NetInfo tool is safe.) You can check the version of your 
passwd package by entering <i>dpkg -s passwd</i>. If your version is 
oudated, you can update to the current one in two ways:
<ul>
<li>Via the binary distribution. First make sure you have the latest 
list of packages available: <i>sudo apt-get update</i>. Then you can 
perform the actual update: <i>sudo apt-get install passwd</i>.
<li>Via the source distribution. First make sure you have the latest 
set of package descriptions: <i>fink selfupdate-cvs</i>. Then, update 
the passwd package: <i>fink update passwd</i>
</ul>
<p>See <a href="faq/usage-general.php#passwd">Fink's FAQ, question 6.3,</a>
for more information about the passwd package.</p>

<p>2002-04-18: Fink 0.4.0 is released.
The source release and the binary installer are available now, 
as well as many of the binary packages. As usual, the rest of the
binaries will be made available during the next few days.
For information about upgrading, visit the
<a href="download/upgrade.php">Upgrade Matrix</a>.
</p>

<h2>Status</h2>

<p>
Fink 0.4.0 was released on 18 April 2002.
The source release and the binary installer are available now, the
other binary packages are still being built.
</p>

</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h2>Resources</h2>

<p>
If you're looking for support, check out the <a
href="help/index.php">help page</a>.
That page also lists various options to help the project and submit
feedback.
</p>

<p>
The Fink project is hosted by
<a href="http://sourceforge.net/">SourceForge</a>.
In addition to hosting this site and the downloads, SourceForge
provides the following resources for the project:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">Summary page</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Bug tracker</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package request tracker</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Feature request tracker</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Package submission tracker</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Patch tracker</a></li>
<li><a href="lists/index.php">Mailing lists</a></li>
<li>CVS (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink">browse
online</a>, <a href="doc/cvsaccess/index.php">access instructions</a>)</li>
</ul>

</td></tr></table>


<?
include "footer.inc";
?>
