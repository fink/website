<?
$title = "User's Guide - Introduction";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/10/12 19:02:10';

$metatags = '<link rel="start" href="index.php" title="User\'s Guide Contents"><link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="next" href="install.php" title="First Time Installation"><link rel="prev" href="index.php" title="User\'s Guide Contents">';

include "header.inc";
?>

<h1>User's Guide - Introduction</h1>



<a name="what"><h2>What is Fink?</h2></a>
<p>
Fink is a distribution of Unix Open Source software for Mac OS X and
Darwin.
It brings free command-line and graphical software developed for Linux
and similar operating systems to your Mac.
</p>


<a name="req"><h2>Requirements</h2></a>
<p>
In any case you will need:
</p>
<ul>
<li><p>
An installed Mac OS X system, version 10.0 or later, or equivalent
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


<a name="supported-os"><h2>Supported Systems</h2></a>
<p>
<b>Mac OS X 10.0.x</b> is fully tested and supported at this point
in time.
It is strongly recommended that you upgrade to the latest update in
that series, 10.0.4, through the Software Update panel in the System
Preferences.
Note that support for 10.0.x will be dropped in the future when 10.1
is in widespread use.
</p>
<p>
<b>Mac OS X 10.1</b> has been out for some weeks now.
The BSD subsystem and the development tools have seen significant
updates and there are still some packages that haven't been updated
to compile on 10.1 yet.
Those are rare, however; most packages work.
</p>
<p>
<b>Darwin 1.3.1</b> is the Darwin version corresponding to Mac OS X
10.0.x and should work as well.
However, this has not been tested as most people just run Mac OS X
proper instead.
You may run into problems with packages that use features specific to
Mac OS X - affected packages include XFree86 and possibly esound.
</p>
<p>
<b>Darwin 1.4.1</b> is the Darwin version corresponding to Mac OS X
10.1.
Both the notes about Darwin 1.3.1 and about Mac OS X 10.1 apply in
this case.
</p>


<a name="src-vs-bin"><h2>Source vs. Binary</h2></a>
<p>
Software is written in human-readable programming languages, called
the "source code".
When you buy commercial software you don't get to see the source code,
however.
All you get is the ready-to-run program (also called "executable" or
"binary").
</p>
<p>
Not so with Open Source software.
As the name implies, the source code is open for anyone to see and
modify.
In fact, most Open Source software is only distributed as source code
by its authors, and you must "compile" it on your computer to get a
program that can be run.
</p>
<p>
Fink lets you choose between the two models.
The "source" distribution will download the original source, adapt it
to Mac OS X and to Fink's policy, and compile it on your computer.
That process is fully automated, but takes some time.
The "binary" distribution on the other hand will download pre-compiled
packages from the Fink site and install those, saving you the time for
compiling.
It is actually possible to mix the two models at will.
The rest of this manual will show you how.
</p>


<p align="right">
Next: <a href="install.php">First Time Installation</a></p>


<?
include "footer.inc";
?>
