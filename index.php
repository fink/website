<?
$title = "Home";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/03/30 09:42:23 $';
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

<p>2001-03-30: Version 0.1.7 is out. Get it from the <a
href="download.php">download page</a>.</p>
<p>2001-03-24: Mac OS X is released. Expect Fink packages to be
adapted to the final release within the next one or two weeks.</p>
<p>2001-03-15: Updated the <a href="darwin/libtool.php">libtool
page</a> with a revised patch that does full shared library
versioning.</p>

<h2>Status</h2>

<p>Version 0.1.7 was released on 30 March 2001. Most packages have
been verified with Mac OS X Final and fixed as neccessary.
Most likely this will be the last release before the transition from
stow to dpkg. That transition will eliminate many of the current
problems caused by stow and will allow a binary distribution to be set
up. Stay tuned.</p>

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
