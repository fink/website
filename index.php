<?
$title = "Home";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/10 14:10:09 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, software, distribution, Fink">
';

include "header.inc";
?>


<p>
Fink is an attempt to bring the full world of Unix Open Source
software to <a href="http://www.opensource.apple.com/">Darwin</a> and
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Think of it as an add-on distribution (in the Linux sense) for these
systems.
</p>
<p>
Fink wants to be as painless as possible.
It keeps the hands off your base system and manages a separate
directory tree instead.
Fink uses <a href="http://www.debian.org/">Debian</a> tools like dpkg
and apt-get to provide powerful binary package management.
You can choose whether you want to download precompiled binary
packages or build everything from source.
<a href="about.php">Read more...</a>
</p>


<p><table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h2>News</h2>

<p>2001-09-07: The binary distribution is now fully updated to
Fink 0.2.6. Enjoy.</p>
<p>2001-09-04: Fink 0.2.6 is released, fixing several bootstrap
problems. The source release is available from the <a
href="download.php">download page</a> or via the 'fink selfupdate'
command. The binary release will follow soon.</p>
<p>2001-09-02: Chat with the developers and other users! We now have
a #fink channel on the <a href="http://openprojects.net/">openprojects.net</a>
IRC network.</p>
<p>2001-08-23: OpenOSX.com refuses to give fair credit after using
Fink to create GIMP CDs. Read Christoph's <a
href="pr/openosx.php">public statement</a> on the issue.</p>

<h2>Status</h2>

<p>
Fink 0.2.6 was released on 4 September 2001.
Now that a base feature set is implemented, focus is shifting to
provide more packages, keep them current and improve quality.
Work continues to make more packages available as binaries.
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
