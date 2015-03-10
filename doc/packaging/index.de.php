<?php
$title = "Paket erstellen";
$cvs_author = 'Author: Nachteule';
$cvs_date = 'Date: 2014/10/25 01:52:35';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="intro.php?phpLang=de" title="Introduction">';


include_once "header.de.inc";
?>
<h1>Ein Fink-Paket erstellen</h1>
<p>
  Dieses Dokument ist noch nicht übersetzt. Deshalb steht an dieser
  Stelle bis auf weiteres einfach die englische Version als Platzhalter.
  Der Vorteil ist, dass die Spracheinstellung nicht zurück gesetzt wird.
</p>
<p>
This manual documents how to create package descriptions for the Fink
package manager.
It also provides a policy and guidelines for the Fink distribution.
Both the description format and the distribution policy are still
evolving, so watch the "Last changed" info and the CVS tag on this
page to detect updates.
What you're reading right now is a description of the format and
policy used in post-0.9.0 development versions of the fink
package manager.
</p>
<p>
If you create packages for Fink, you may want to subscribe to the
<a href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a>
mailing list.
If you are looking for a way to help out with Fink, and you have skills
in this area, you might consider adopting a
<a href="http://pdb.finkproject.org/pdb/nomaintainer.php">package which
currently has no maintainer.</a>
</p>
<h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=de"><b>1 Introduction</b></a><ul><li><a href="intro.php?phpLang=de#def1">1.1 What is a Package?</a></li><li><a href="intro.php?phpLang=de#ident">1.2 Identifying a Package</a></li></ul></li><li><a href="format.php?phpLang=de"><b>2 Package Descriptions</b></a><ul><li><a href="format.php?phpLang=de#trees">2.1 Tree Layout</a></li><li><a href="format.php?phpLang=de#format">2.2 File Format</a></li><li><a href="format.php?phpLang=de#percent">2.3 Percent Expansion</a></li></ul></li><li><a href="policy.php?phpLang=de"><b>3 Packaging Policy</b></a><ul><li><a href="policy.php?phpLang=de#licenses">3.1 Package Licenses</a></li><li><a href="policy.php?phpLang=de#openssl">3.2 The GPL and OpenSSL</a></li><li><a href="policy.php?phpLang=de#prefix">3.3 Base System Interference</a></li><li><a href="policy.php?phpLang=de#sharedlibs">3.4 Shared Libraries</a></li><li><a href="policy.php?phpLang=de#perlmods">3.5 Perl Modules</a></li><li><a href="policy.php?phpLang=de#emacs">3.6 Emacs Policy</a></li><li><a href="policy.php?phpLang=de#sources">3.7 Source Policy</a></li><li><a href="policy.php?phpLang=de#downloading">3.8 File Download Policy</a></li></ul></li><li><a href="fslayout.php?phpLang=de"><b>4 Filesystem Layout</b></a><ul><li><a href="fslayout.php?phpLang=de#fhs">4.1 The Filesystem Hierarchy Standard</a></li><li><a href="fslayout.php?phpLang=de#dirs">4.2 The Directories</a></li><li><a href="fslayout.php?phpLang=de#avoid">4.3 Things to Avoid</a></li></ul></li><li><a href="compilers.php?phpLang=de"><b>5 Compilers</b></a><ul><li><a href="compilers.php?phpLang=de#versions">5.1 Compiler Versions</a></li><li><a href="compilers.php?phpLang=de#abi">5.2 The g++ ABI</a></li></ul></li><li><a href="reference.php?phpLang=de"><b>6 Reference</b></a><ul><li><a href="reference.php?phpLang=de#build">6.1 The Build Process</a></li><li><a href="reference.php?phpLang=de#fields">6.2 Fields</a></li><li><a href="reference.php?phpLang=de#splitoffs">6.3 SplitOffs</a></li><li><a href="reference.php?phpLang=de#scripts">6.4 Scripts</a></li><li><a href="reference.php?phpLang=de#patches">6.5 Patches</a></li><li><a href="reference.php?phpLang=de#profile.d">6.6 Profile.d scripts</a></li></ul></li></ul>
<!--Generated from $Fink: packaging.de.xml,v 1.129 2014/10/25 01:52:35 Nachteule Exp $-->
<?php include_once "../../footer.inc"; ?>


