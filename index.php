<?
$title = "Home";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/10/07 20:59:30 $';
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


<p><table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h2>News</h2>

<p>2001-10-03: The binary distribution update is now complete.
The <a href="news/puma.php">10.1 compatibility report</a> has been
updated to reflect the fixes in Fink 0.3.0.
</p>
<p>2001-09-30: Fink 0.3.0 is released.
The source release, the binary installer and a binary upgrade kit for
broken-by-10.1 installations are available in the new <a
href="download/index.php">download section</a>.
The bulk of the binary distribution will be updated gradually over the
next few days, as usual.
</p>

<h2>Status</h2>

<p>
Fink 0.3.0 was released on 30 September 2001.
Almost all problems with Mac OS X 10.1 have been fixed.
Work continues normally.
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
The <a href="http://sourceforge.net/projects/fink/">Fink project</a>
is hosted by SourceForge.
In addition to hosting this site and the downloads, SourceForge
provides the following resources for the project:
</p>
<ul>
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

</td></tr></table></p>


<?
include "footer.inc";
?>
