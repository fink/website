<?
$title = "Packaging";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/08/02 14:52:29';

$metatags = '<link rel="start" href="index.php" title="Packaging Contents"><link rel="next" href="intro.php" title="Introduction">';

include "header.inc";
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
policy used in post-0.2.3 development versions of Fink.
</p>
<p>
If you create packages for Fink, you may want to subscribe to the
<a href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a>
mailing list.
</p>
<h2>Contents</h2><ul><li><a href="intro.php"><b>Introduction</b></a></li><ul><li><a href="intro.php#def1">What is a Package?</a></li><li><a href="intro.php#ident">Identifying a Package</a></li></ul><li><a href="format.php"><b>Package Descriptions</b></a></li><ul><li><a href="format.php#trees">Tree Layout</a></li><li><a href="format.php#format">File Format</a></li><li><a href="format.php#percent">Percent Expansion</a></li></ul><li><a href="policy.php"><b>Packaging Policy</b></a></li><ul><li><a href="policy.php#licenses">Package Licenses</a></li><li><a href="policy.php#prefix">Base System Interference</a></li></ul><li><a href="fslayout.php"><b>Filesystem Layout</b></a></li><ul><li><a href="fslayout.php#fhs">The Filesystem Hierarchy Standard</a></li><li><a href="fslayout.php#dirs">The Directories</a></li><li><a href="fslayout.php#avoid">Things to Avoid</a></li></ul><li><a href="reference.php"><b>Reference</b></a></li><ul><li><a href="reference.php#build">The Build Process</a></li><li><a href="reference.php#fields">Fields</a></li><li><a href="reference.php#scripts">Scripts</a></li><li><a href="reference.php#patches">Patches</a></li></ul></ul><p>Generated from <i>$Fink: packaging.xml,v 1.8 2001/08/02 14:52:29 chrisp Exp $</i></p>


<?
include "footer.inc";
?>
