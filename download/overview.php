<?
$title = "Download Overview";
$cvs_author = '$Author: dmalloc $';
$cvs_date = '$Date: 2003/11/22 18:51:55 $';

include "header.inc";
?>
<!-- IndexTools Customization Code -->
<!-- Added Temprorarily by dmalloc -->
<!-- Remove leading // to activate custom variables -->
<script language="Javascript">
var DOCUMENTGROUP='downloads';
var DOCUMENTNAME='overview';
//var ACTION='';
</script>
<!-- End of Customization Code --><!-- IndexTools Code v3.01 - All rights reserved -->
<script language="javascript1.1" src="../indextools.js"></script><noscript>
<img src="http://stats.indextools.com/p.pl?a=100048449005&js=no" width="1" height="1"></noscript><!--//-->
<!-- End of IndexTools Code -->

<h1>Download Overview</h1>

<p>
There are many different ways to get Fink.
This page will try to explain the various options and their
- sometimes confusing - differences.
But first, two important things to realize:
</p>

<p>
<b>Source vs. Binary Packages.</b>
A package can come in two forms: source and binary.
A binary package is a package archive that contains precompiled,
ready-to-run programs.
You can immediately use it, it just has be be downloaded and extracted
(installed).
A source package consist of the original source code, Fink-specific
patches and build instructions.
Source packages take some time to install because the source code is
compiled on your computer to produce executable programs.
</p>

<p>
<b>All Fink installations are created equal.</b>
No matter how you installed Fink, you always have the option to build
a specific package from source.
Likewise, you always have the option to install downloaded binary
packages <u>as long as Fink is installed in <tt>/sw</tt></u>.
All you have to do is use the appropriate tools and update
procedures.
</p>

<p>
So now, what are the actual options?
Here we go, from convenient to cutting edge:
</p>

<p>
The <a href="bindist.php">binary release</a> uses binary packages.
It comes with a graphical installer package for first-time
installation and a package browser and selection app (dselect).
It tracks the last source release; it usually takes some days to catch
up when a new source release is made.
Occasionally, there are updates between releases.
Updating to new releases is automatic - just ask dselect or apt-get to
fetch the latest package lists.
The downside of the binary release is that not all packages are
available as binaries.
Some don't meet our quality standards or have technical problems, some
can't be distributed due to their restrictive licenses, and some are
covered by export restrictions on cryptography.
</p>

<p>
The <a href="srcdist.php">source release</a> builds everything from
source (unless you choose otherwise) and is driven by command-line
scripts.
The source release can update itself to the latest release with the
'fink selfupdate' command.
The positive side is that you'll get all packages that have been
marked as 'stable'.
The negative sides have already been mentioned - compiling from source
takes time and you must type commands to install packages.
</p>

<p>
Actual development of the Fink distribution happens in a CVS
repository.
You can track it to stay on the cutting edge between releases.
Usage is equivalent to the source release, only that you'll get the
package descriptions through other channels.
(Read: 'fink selfupdate' doesn't work here.)
See the <a href="../doc/cvsaccess/index.php">CVS instructions</a> for
details.
</p>


<?
include "footer.inc";
?>
