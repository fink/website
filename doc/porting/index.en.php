<?php
$title = "Porting";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2014/10/25 09:21:47';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Porting Contents"><link rel="next" href="basics.php?phpLang=en" title="Basics">';


include_once "header.en.inc";
?>
<h1>Porting Unix software to Darwin and Mac OS X</h1>
		<p>This document contains hints for porting Unix applications to Darwin and Mac OS X. Much of the information here applies to both Mac OS X version 10.x.x and "pure" Darwin systems. Both systems will be referred to as Darwin, since Mac OS X is actually a superset of Darwin.</p>
	<h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="basics.php?phpLang=en"><b>1 Basics</b></a><ul><li><a href="basics.php?phpLang=en#heritage">1.1 Where Darwin came from</a></li><li><a href="basics.php?phpLang=en#compiler">1.2 The Compiler and Tools</a></li><li><a href="basics.php?phpLang=en#host-type">1.3 Host type</a></li><li><a href="basics.php?phpLang=en#libraries">1.4 Libraries</a></li><li><a href="basics.php?phpLang=en#other-sources">1.5 Other sources of information</a></li></ul></li><li><a href="shared.php?phpLang=en"><b>2 Shared Code</b></a><ul><li><a href="shared.php?phpLang=en#lib-and-mod">2.1 Shared Libraries vs. Loadable Modules</a></li><li><a href="shared.php?phpLang=en#version">2.2 Version Numbering</a></li><li><a href="shared.php?phpLang=en#cflags">2.3 Compiler Flags</a></li><li><a href="shared.php?phpLang=en#build-lib">2.4 Building a Shared Library</a></li><li><a href="shared.php?phpLang=en#build-mod">2.5 Building a Module</a></li></ul></li><li><a href="libtool.php?phpLang=en"><b>3 GNU libtool</b></a><ul><li><a href="libtool.php?phpLang=en#situation">3.1 The Situation</a></li><li><a href="libtool.php?phpLang=en#patch-135">3.2 The 1.3.5 Patch</a></li><li><a href="libtool.php?phpLang=en#fixing-14x">3.3 Fixing 1.4.x</a></li><li><a href="libtool.php?phpLang=en#notes">3.4 Further Notes</a></li></ul></li><li><a href="preparing-10.2.php?phpLang=en"><b>4 Preparing for 10.2</b></a><ul><li><a href="preparing-10.2.php?phpLang=en#bash">4.1 The bash shell</a></li><li><a href="preparing-10.2.php?phpLang=en#gcc3">4.2 The gcc3 compiler</a></li></ul></li><li><a href="preparing-10.3.php?phpLang=en"><b>5 Preparing for 10.3</b></a><ul><li><a href="preparing-10.3.php?phpLang=en#perl">5.1 Perl</a></li><li><a href="preparing-10.3.php?phpLang=en#typedef">5.2 New symbol definitions</a></li><li><a href="preparing-10.3.php?phpLang=en#system-libs">5.3 New builtin system libraries</a></li></ul></li><li><a href="preparing-10.4.php?phpLang=en"><b>6 Preparing for 10.4</b></a><ul><li><a href="preparing-10.4.php?phpLang=en#perl">6.1 Perl</a></li><li><a href="preparing-10.4.php?phpLang=en#typedef">6.2 New symbol definitions</a></li><li><a href="preparing-10.4.php?phpLang=en#system-libs">6.3 New builtin system libraries</a></li></ul></li></ul>
<!--Generated from $Fink: porting.en.xml,v 1.10 2014/10/25 09:21:47 gecko2 Exp $-->
<?php include_once "../../footer.inc"; ?>


