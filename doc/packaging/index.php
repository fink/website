<?
$title = "Packaging";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2003/05/02 20:36:34';

$metatags = '<link rel="contents" href="index.php" title="Packaging Contents"><link rel="next" href="intro.php" title="Introduction">';

include "header.inc";
?>

<h1>Creating Fink Packages</h1>
<p>
This manual documents how to create package descriptions for the Fink
package manager.
It also provides a policy and guidelines for the Fink distribution.
Both the description format and the distribution policy are still
evolving, so watch the &quot;Last changed&quot; info and the CVS tag on this
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
<li><a href="intro.php"><b>1 Introduction</b></a></li>
<ul>
<li><a href="intro.php#def1">1.1 What is a Package?</a></li>
<li><a href="intro.php#ident">1.2 Identifying a Package</a></li>
</ul>
<li><a href="format.php"><b>2 Package Descriptions</b></a></li>
<ul>
<li><a href="format.php#trees">2.1 Tree Layout</a></li>
<li><a href="format.php#format">2.2 File Format</a></li>
<li><a href="format.php#percent">2.3 Percent Expansion</a></li>
</ul>
<li><a href="policy.php"><b>3 Packaging Policy</b></a></li>
<ul>
<li><a href="policy.php#licenses">3.1 Package Licenses</a></li>
<li><a href="policy.php#prefix">3.2 Base System Interference</a></li>
<li><a href="policy.php#sharedlibs">3.3 Shared Libraries</a></li>
</ul>
<li><a href="fslayout.php"><b>4 Filesystem Layout</b></a></li>
<ul>
<li><a href="fslayout.php#fhs">4.1 The Filesystem Hierarchy Standard</a></li>
<li><a href="fslayout.php#dirs">4.2 The Directories</a></li>
<li><a href="fslayout.php#avoid">4.3 Things to Avoid</a></li>
</ul>
<li><a href="reference.php"><b>5 Reference</b></a></li>
<ul>
<li><a href="reference.php#build">5.1 The Build Process</a></li>
<li><a href="reference.php#fields">5.2 Fields</a></li>
<li><a href="reference.php#splitoffs">5.3 SplitOffs</a></li>
<li><a href="reference.php#scripts">5.4 Scripts</a></li>
<li><a href="reference.php#patches">5.5 Patches</a></li>
<li><a href="reference.php#profile.d">5.6 Profile.d scripts</a></li>
</ul>
</ul><p>Generated from <i>$Fink: packaging.xml,v 1.41 2003/05/02 20:36:34 dmrrsn Exp $</i></p>


<?
include "footer.inc";
?>

