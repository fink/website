<?
$title = "Home";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/01/17 18:52:06 $';
$wantnav = "main";

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
<tr valign="top"><td>

<h2>News</h2>

<p>2001-01-17: Version 0.1.2 is out. Get it from the <a
href="download.php">download page</a>.</p>
<p>2001-01-16: GNOME! I've got the core GNOME system running. It has
lots of rough edges, but looks promising...</p>
<p>2001-01-16: Several patches that add shared library support to
basic libraries are now available on the <a href="patches.php">patches
pages</a>. More patches are to follow.</p>

<h2>Status</h2>

<p>Version 0.1.2 was released on 17 January 2001. It adds package
revisions, primitive (but working) dependency support and GNOME
packages. Still, this is an early release, so be careful. You can grab
it from the <a href="download.php">download page</a>.</p>

</td><td>&nbsp;&nbsp;&nbsp;</td><td>

<h2>Darwin Resources</h2>

<p>The <a href="darwin.php">Darwin section</a> of this site has useful
information on Darwin in general, like <a href="porting.php">porting
hints</a>, <a href="patches.php">patches</a> and <a
href="x11-choices.php">X11 information</a>. Check it out!</p>

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
