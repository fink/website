<?
$title = "Home";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/04/15 07:54:19 $';
$wantnav = "main";
$is_home = 1;

include "header.inc";
?>


<p>Fink is an attempt to bring the full world of <a
href="http://www.gnu.org/">GNU</a> and other Open Source software to
<a href="http://www.opensource.apple.com/">Darwin</a> and <a
href="http://www.apple.com/macosx/">Mac OS X</a>. Think of it as an
add-on distribution (in the Linux sense) for these systems. Once it is
more mature, I want Fink to evolve into a general package manager
suitable for all Unix variants.</p>

<p>Fink wants to be simple, functional and fully automated. GNU stow
is used to manage a separate directory tree. The fink package manager
downloads, configures, compiles and installs software from the
internet.</p>

<p><table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h2>News</h2>

<p>2001-04-15: Released version 0.1.8a, fixing install problems. You
only need this if you downloaded 0.1.8 and had install problems ("stow
not found"). Get it from the <a href="download.php">download
page</a>.</p>
<p>2001-04-14: Version 0.1.8 is out. Get it from the <a
href="download.php">download page</a>.</p>
<p>2001-03-30: The <a href="darwin/porting.php">porting notes</a> have
been updated with information on Mac OS X Final.</p>
<p>2001-03-30: Version 0.1.7 is out. Get it from the <a
href="download.php">download page</a>.</p>

<h2>Status</h2>

<p>Version 0.1.8a was released on 15 April 2001. This is the last
release to use stow. A new version using dpkg for low-level package
management is nearing usable state and will be released Real Soon
Now(tm).</p>

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
for bug tracking and other stuff. A <a
href="http://lists.sourceforge.net/lists/listinfo/fink-users">mailing
list</a> for users is also available.</p>
<p>If you have any questions, suggestions, rants etc. please mail <a
href="mailto:fink@chrisp.de">fink@chrisp.de</a>.</p>

</td></tr></table></p>


<?
include "footer.inc";
?>
