<?
$title = "Home";
$cvs_author = '$Author: fingolfin $';
$cvs_date = '$Date: 2001/12/16 14:10:02 $';
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

<p>2001-11-04: Fink 0.3.1 is released.
The source release and the binary installer are available now, the
bulk of binary packages will be built and made available gradually
over the next few days as usual.
For information about upgrading, visit the
<a href="download/upgrade.php">Upgrade Matrix</a> and the recently
updated <a href="doc/users-guide/index.php">User's Guide</a>.
</p>
<p>2001-11-02:
The <a href="doc/x11/index.php">Running X11</a> document has had a
significant update.
The troubleshooting section now has a comprehensive list of XDarwin
error messages with explanations.
</p>
<p>2001-10-23:
In addition to ripping off Fink packages and breaking the GPL, the
ports collection at <a href="http://macosx.forked.net/">forked.net</a>
has just gone commercial.
More <a href="pr/forked.php">details</a> now available.
</p>

<h2>Status</h2>

<p>
Fink 0.3.1 was released on 4 November 2001.
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
href="http://sourceforge.net/tracker/?atid=117203&group_id=17203">Bug tracker</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&group_id=17203">Package request tracker</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&group_id=17203">Feature request tracker</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&group_id=17203">Package submission tracker</a></li>
<li><a href="lists/index.php">Mailing lists</a></li>
<li>CVS (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink">browse
online</a>, <a href="doc/cvsaccess/index.php">access instructions</a>)</li>
</ul>

</td></tr></table>


<?
include "footer.inc";
?>
