<?
$title = "Home";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/13 15:46:15 $';
$wantnav = "main";
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, software, distribution, Fink">
';

include "header.inc";
?>


<p>Fink is an attempt to bring the full world of Unix Open Source
software to <a href="http://www.opensource.apple.com/">Darwin</a> and
<a href="http://www.apple.com/macosx/">Mac OS X</a>. Think of it as an
add-on distribution (in the Linux sense) for these systems. Once it is
more mature, Fink might evolve into a general package manager and
add-on distribution suitable for all Unix variants.</p>

<p>Fink wants to be simple, functional and fully automated. It manages
a separate directory tree using dpkg. The fink package manager
downloads, configures, compiles and installs software from the
Internet.</p>

<p><table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h2>News</h2>

<p>2001-05-09: Version 0.2.1 is released. Get it from the <a
href="download.php">download page</a>.</p>
<p>2001-04-26: This site now sports a <a href="faq/index.php">FAQ
section</a>. Not much content yet, but it's here to stay.</p>
<p>2001-04-20: Version 0.2.0 is released. It now uses dpkg for binary
package management. You can get it from the download page, but be
aware that this version is not yet as stable as the 0.1.x series.</p>

<h2>Status</h2>

<p>Version 0.2.1 was released on 9 May 2001. The 0.2.x series is now
ready for general use. There is a lot of room for improvement,
though. The next big items on the list are X11 packaging and a binary
distribution.</p>

</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h2>Darwin Resources</h2>

<p>The <a href="darwin/index.php">Darwin section</a> of this site has
useful information on Darwin in general, like <a
href="darwin/porting.php">porting hints</a>, <a
href="darwin/patches.php">patches</a> and <a
href="darwin/x11-choices.php">X11 information</a>. Check it out!</p>

<h2>Fink Resources</h2>

<p>This project is hosted by <a
href="http://sourceforge.net">SourceForge</a>. Have a look at the <a
href="http://sourceforge.net/projects/fink/">project summary</a> there
for bug tracking and other stuff. Several <a
href="fink/lists.php">mailing lists</a> are available. Common problems
are addressed in the <a href="faq/index.php">FAQ section</a>.</p>

<h2>Feedback</h2>

<p>Fink is still under development, so I appreciate feedback that
helps me improve Fink. You can send it my way at <a
href="mailto:fink@chrisp.de">fink@chrisp.de</a>. Keep in mind that,
like most people on this planet, I'm usually quite busy. If you need
help with using or troubleshooting Fink, a better place to ask is the
<a href="fink/lists.php">users mailing list</a>.</p>

</td></tr></table></p>


<?
include "footer.inc";
?>
