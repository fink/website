<?
$title = "User's Guide - Introduction";
$cvs_author = 'Author: benh57';
$cvs_date = 'Date: 2002/12/08 00:05:40';

$metatags = '<link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="next" href="install.php" title="First Time Installation"><link rel="prev" href="index.php" title="User\'s Guide Contents">';

include "header.inc";
?>

<h1>User's Guide - 1 Introduction</h1>



<a name="what"><h2>1.1 What is Fink?</h2></a>
<p>
Fink is a distribution of Unix Open Source software for Mac OS X and
Darwin.
It brings a wide range of free command-line and graphical software
developed for Linux and similar operating systems to your Mac.
</p>


<a name="req"><h2>1.2 Requirements</h2></a>
<p>
In any case you will need:
</p>
<ul>
<li><p>
An installed Mac OS X system, version 10.2 or later, or equivalent
Darwin releases.
Earlier versions of both will <b>not</b> work.
See below for more information about supported systems.
</p></li>
<li><p>
Internet access.
Both source code and binary packages are downloaded from Internet
download sites.
</p></li>
</ul>
<p>
If you intend to use the source distribution (see below), you will
also need:
</p>
<ul>
<li><p>
Development tools.
On Mac OS X, install the Developer.pkg package from the Developer
Tools CD.
Note that the tools must match your Mac OS X version.
On Darwin, the tools should be present in the default install.
</p>
<p>
It's a good idea to have the Developer Tools installed even if you
don't intend to build packages from source.
Some of the programs installed by the package are actually general
purpose command line tools.
Some packages may depend on those to run.
</p></li>
<li><p>
Patience.
Compiling several big packages takes time.
I'm talking hours or even days here.
</p></li>
</ul>


<a name="supported-os"><h2>1.3 Supported Systems</h2></a>
<p>
<b>Mac OS X 10.2</b> is the operating system of choice for running
Fink.
All developers run it, and packages are tested on this system.
It is considered &quot;fully supported and tested&quot;, although there may
still be stray compile problems with single packages.
</p>
<p>
<b>Mac OS X 10.1</b> is still supported to some extent.
You must run Fink 0.4.1 and no later versions.
</p>
<p>
<b>Darwin 6.0.2</b> is the Darwin version corresponding to Mac OS X
10.2.
It should work in general, but this has not been tested as most people
just run Mac OS X proper instead.
You may run into problems with packages that use features specific to
Mac OS X - affected packages include XFree86 and possibly esound.
</p>


<a name="src-vs-bin"><h2>1.4 Source vs. Binary</h2></a>
<p>
Software is written (&quot;developed&quot;) in human-readable programming
languages; this form is called the &quot;source code&quot;.
Before a computer can actually run a program, it must be transformed
into low-level machine code instructions (unreadable by most humans).
That process is called &quot;compiling&quot; and the resulting program is called
&quot;executable&quot; or &quot;binary&quot;.
(The process is also refered to as &quot;building&quot;, because it usually
involves more steps than just compiling.)
</p>
<p>
When you buy commercial software you don't get to see the source code,
though - companies treat it as a trade secret.
You only get the ready-to-run executable, which means you have no way
to modify the program or even find out what it actually does when it's
run.
</p>
<p>
Not so with <a href="http://www.opensource.org/">Open Source</a>
software.
As the name implies, the source code is open for anyone to see and
modify.
In fact, most Open Source software is only distributed as source code
by its authors, and you must compile it on your computer to get a
program that can be run.
</p>
<p>
Fink lets you choose between the two models.
The &quot;source&quot; distribution will download the original source, adapt it
to Mac OS X and to Fink's policy, and compile it on your computer.
That process is fully automated, but takes some time.
The &quot;binary&quot; distribution on the other hand will download pre-compiled
packages from the Fink site and install those, saving you the time for
compiling.
It is actually possible to mix the two models at will.
The rest of this manual will show you how.
</p>


<p align="right">
Next: <a href="install.php">2 First Time Installation</a></p>


<?
include "footer.inc";
?>

