<?
$title = "Porting";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/08/13 16:32:07';

$metatags = '<link rel="start" href="index.php" title="Porting Contents"><link rel="next" href="basics.php" title="Basics">';

include "header.inc";
?>

<h1>Porting Unix software to Darwin and Mac OS X</h1>
<p>
This document contains hints for porting Unix applications to Darwin
and Mac OS X.
The information here applies to Mac OS X version 10.0.x and Darwin
1.3.x.
Both systems will be referred to as Darwin, since Mac OS X is actually
a superset of Darwin.
</p>
<h2>Contents</h2><ul>
<li><a href="basics.php"><b>Basics</b></a></li>
<ul>
<li><a href="basics.php#heritage">Where Darwin came from</a></li>
<li><a href="basics.php#compiler">The Compiler and Tools</a></li>
<li><a href="basics.php#host-type">Host type</a></li>
<li><a href="basics.php#libraries">Libraries</a></li>
</ul>
<li><a href="shared.php"><b>Shared Code</b></a></li>
<ul>
<li><a href="shared.php#lib-and-mod">Shared Libraries vs. Loadable Modules</a></li>
<li><a href="shared.php#version">Version Numbering</a></li>
<li><a href="shared.php#cflags">Compiler Flags</a></li>
<li><a href="shared.php#build-lib">Building a Shared Library</a></li>
<li><a href="shared.php#build-mod">Building a Module</a></li>
</ul>
<li><a href="libtool.php"><b>GNU libtool</b></a></li>
<ul>
<li><a href="libtool.php#situation">The Situation</a></li>
<li><a href="libtool.php#patch-135">The 1.3.5 Patch</a></li>
<li><a href="libtool.php#notes">Further Notes</a></li>
</ul>
</ul><p>Generated from <i>$Fink: porting.xml,v 1.4 2001/08/13 16:32:07 chrisp Exp $</i></p>


<?
include "footer.inc";
?>
