<?
$title = "Porting";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/07/30 11:48:24';

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
<h2>Contents</h2><ul><li><a href="basics.php"><b>Basics</b></a></li><ul><li><a href="basics.php#heritage">Where Darwin came from</a></li><li><a href="basics.php#compiler">The Compiler and Tools</a></li><li><a href="basics.php#host-type">Host type</a></li><li><a href="basics.php#libraries">Libraries</a></li><li><a href="basics.php#shared-libs">Shared Libraries</a></li></ul><li><a href="libtool.php"><b>GNU libtool</b></a></li><ul><li><a href="libtool.php#situation">The Situation</a></li><li><a href="libtool.php#patch-135">The 1.3.5 Patch</a></li><li><a href="libtool.php#notes">Further Notes</a></li></ul></ul><p>Generated from <i>$Fink: porting.xml,v 1.3 2001/07/30 11:48:24 chrisp Exp $</i></p>


<?
include "footer.inc";
?>
