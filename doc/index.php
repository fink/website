<?
$title = "Documentation";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/10/31 10:27:04 $';

include "header.inc";
?>


<h1>Fink Documentation</h1>

<p>This is a collection of various documents written for Fink. Some of
the documents may also be useful to people that use Mac OS X or
Darwin without Fink and want to learn about porting Unix software. The
intended audience is noted with each document in the list below.</p>

<h2>Documents from the distribution package</h2>

<p>
The version numbers in these documents haven't been updated for the
0.3.0 release, but what is said still applies to the 0.3.0 source
release.
</p>

<ul>
<li><a href="bundled/readme.php">Fink ReadMe</a> - the ReadMe for the
distribution</li>
<li><a href="bundled/install.php">Installation and Upgrading</a> - how
to install Fink or upgrade to a new version</li>
<li><a href="bundled/usage.php">Usage</a> - how to use Fink
and the installed software</li>
</ul>

<h2>Other User Documentation</h2>

<ul>
<li><a href="x11/index.php">Running X11 on Darwin and Mac OS X</a> -
covers concepts, installation and launching (also intended for Darwin
and Mac OS X users in general)</li>
<li><a href="cvsaccess/index.php">CVS Access</a> - how to access the
Fink CVS repository to get the latest source packages between
releases</li>
<li>The new <a href="users-guide/index.php">User's Guide</a> -
replacing the Installation and Usage documents with a comprehensive
guide that takes the binary distribution into account.
<b>Caution: Work in Progress!</b></li>
</ul>

<h2>Developer Documentation</h2>

<ul>
<li><a href="porting/index.php">Porting Tips</a> - notes for porting
Unix applications to Darwin</li>
<li><a href="packaging/index.php">Packaging Manual</a> - how to create and
maintain Fink packages</li>
</ul>


<?
include "footer.inc";
?>
