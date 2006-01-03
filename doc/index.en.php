<?
$title = "Documentation";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2005/12/14 17:51:03';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink - Documentation</h1>
<!--Generated from $Fink: doc.en.xml,v 1.15 2005/12/14 17:51:03 alexkhansen Exp $-->
    <p>
This is a collection of various documents written for Fink.
Some of the documents may also be useful to people who use Mac OS X
or Darwin without Fink and want to learn about porting Unix software.
</p>
  <h2><a name="userdoc">User Documentation</a></h2>
    
    <p>
The current user documentation for Fink:
</p>
    <ul>
      <li><a href="users-guide/index.php">Fink User's Guide</a> -
this covers installing Fink itself, installing packages, and upgrading
to a new Fink release. It contains instructions for both the source
and the binary release.
</li>
      <li><a href="advanced/index.php">Fink Advanced Topics Guide</a> -
covers more advanced concepts than those covered in the User's Guide.</li>
      <li><a href="x11/index.php">Running X11 on Darwin and Mac OS X</a> -
covers concepts, installation and launching (also intended for Darwin
and Mac OS X users in general)</li>
    </ul>
    <p>
A bunch of documents that are more complete, but slightly outdated and
no longer maintained:
</p>
    <ul>
      <li><a href="bundled/install.php">Installation and Upgrading</a> - how
to install Fink or upgrade to a new version</li>
      <li><a href="bundled/usage.php">Usage</a> - how to use Fink
and the installed software</li>
      <li><a href="readme.php">Fink ReadMe</a> - the ReadMe for the
source distribution</li>
      <li><a href="cvsaccess/index.php">CVS Access</a> - how to access the
Fink CVS repository to get the latest source packages between
releases</li>
    </ul>
  <h2><a name="developerdoc">Developer Documentation</a></h2>
    
    <ul>
      <li><a href="security/index.php">Security Policy Manual</a> - 
	  Mandatory read for all of those who either maintain packages in Fink or would like to add their own.</li>
      <li><a href="http://fink.sourceforge.net/doc/UsingFink.pdf">Using Fink: A Developer's How To</a> (2MB pdf
file) - slides from a presentation at the <a href="http://conferences.oreillynet.com/macosx2002/">O'Reilly Mac OS X Conference</a> (also available as a
<a href="http://conferences.oreillynet.com/presentations/macosx02/morrison_david.ppt">PowerPoint file</a>) </li>
      <li><a href="porting/index.php">Porting Tips</a> - notes for porting
Unix applications to Darwin</li>
      <li><a href="quick-start-pkg/index.php">Packaging Tutorial</a> - a complement to the Packaging Manual which focuses on real examples and introduces packaging to beginners.</li>
      <li><a href="packaging/index.php">Packaging Manual</a> - how to create and
maintain Fink packages</li>
      <li><a href="http://wiki.opendarwin.org/index.php/Fink">The Fink Developer Wiki</a> - includes developer-related material that is under construction.</li>
    </ul>
  <h2><a name="otherdoc">Other Documents</a></h2>
    
    <ul>
      <li><a href="multilingual/index.php">Internationalization Guide</a> - material concerning
the ongoing website
internationalization 
effort</li>
      <li><a href="netiquette/index.php">Mailing List Netiquette</a> - how best to employ the Fink mailing lists.</li>
    </ul>
  
<? include_once "../footer.inc"; ?>


