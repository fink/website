<?
$title = "Packaging";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2004/04/19 03:23:22';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Packaging Contents"><link rel="next" href="intro.php?phpLang=en" title="Introduction">';

include_once "header.inc";
?>

<h1>Creating Fink Packages</h1>
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
<a href="http://fink.sourceforge.net/pdb/nomaintainer.php">package which
currently has no maintainer.</a>
</p>
<h2>Contents</h2><ul>
	<li><a href="intro.php?phpLang=en"><b>1 Introduction</b></a><ul><li><a href="intro.php?phpLang=en#def1">1.1 What is a Package?</a></li><li><a href="intro.php?phpLang=en#ident">1.2 Identifying a Package</a></li></ul></li><li><a href="format.php?phpLang=en"><b>2 Package Descriptions</b></a><ul><li><a href="format.php?phpLang=en#trees">2.1 Tree Layout</a></li><li><a href="format.php?phpLang=en#format">2.2 File Format</a></li><li><a href="format.php?phpLang=en#percent">2.3 Percent Expansion</a></li></ul></li><li><a href="policy.php?phpLang=en"><b>3 Packaging Policy</b></a><ul><li><a href="policy.php?phpLang=en#licenses">3.1 Package Licenses</a></li><li><a href="policy.php?phpLang=en#prefix">3.2 Base System Interference</a></li><li><a href="policy.php?phpLang=en#sharedlibs">3.3 Shared Libraries</a></li><li><a href="policy.php?phpLang=en#perlmods">3.4 Perl Modules</a></li><li><a href="policy.php?phpLang=en#emacs">3.5 Emacs Policy</a></li></ul></li><li><a href="fslayout.php?phpLang=en"><b>4 Filesystem Layout</b></a><ul><li><a href="fslayout.php?phpLang=en#fhs">4.1 The Filesystem Hierarchy Standard</a></li><li><a href="fslayout.php?phpLang=en#dirs">4.2 The Directories</a></li><li><a href="fslayout.php?phpLang=en#avoid">4.3 Things to Avoid</a></li></ul></li><li><a href="reference.php?phpLang=en"><b>5 Reference</b></a><ul><li><a href="reference.php?phpLang=en#build">5.1 The Build Process</a></li><li><a href="reference.php?phpLang=en#fields">5.2 Fields</a></li><li><a href="reference.php?phpLang=en#splitoffs">5.3 SplitOffs</a></li><li><a href="reference.php?phpLang=en#scripts">5.4 Scripts</a></li><li><a href="reference.php?phpLang=en#patches">5.5 Patches</a></li><li><a href="reference.php?phpLang=en#profile.d">5.6 Profile.d scripts</a></li></ul></li></ul><!--Generated from $Fink: packaging.en.xml,v 1.24 2004/04/19 03:23:22 dmacks Exp $-->

<? include_once "footer.inc"; ?>
