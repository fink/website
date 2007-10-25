<?
$title = "Source Release Download";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2007/10/25 02:35:55 $';

include "header.inc";
?>

<h1>Download Fink Source Release</h1>

<!--AKH 2007-05-31.  Fix when we have a release tarball that works with OS > 10.4.9
<p>
The source release contains the fink package manager plus package
descriptions and patches.
It will download the source code from the original distribution sites
and build them on your local machine.
</p>
-->
<p>The source tarball contains the <em>fink</em> package manager.  After you have installed it, you will be able to get package descriptions and patches.  It will use these to download the source code from the original distribution sites or the Fink project's mirrors and build them on your local machine.</p>
<? 
include "../fink_version.inc";
?>

<!--
<p>
Fink <? print $fink_version; ?> was officially released on 
<? print $release_date; ?>.
-->

<p><EM>fink-0.27.7</EM> was officially released on 2007-10-24.</p>
</p>
<ul>
<!--<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full.tar.gz">Fink
<? print $release_version; ?></a> - 6786K, .tar.gz format</li>-->
<li><a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">fink-0.27.7</a> - 1291K, .tar.gz format</li>
</ul>

<p>
<b>Important:</b>
Don't extract the archive with StuffIt, it will corrupt some file
names.
Use the command line <tt>tar</tt> utility instead.
Instructions are in the Installation document.  You also need to install the Xcode Tools (c.f. <a href="./index.en.php" >the Quick Start page</a>).</p>  
<p>
Installation and usage instructions are inside the distribution
tarball.
Please read them - Fink is not a one-click-and-done thing.
The documents README, INSTALL and USAGE are provided as pure text (for
reading from the command line) and as HTML (for reading in a browser
and for printing).
They are also available online in the <a
href="../doc/index.php">documentation section</a>.
</p>
<p>After you have installed <em>fink</em> and the other base packages, the commands</p>
<pre>fink selfupdate-rsync</pre>
<p>or</p>
<pre>fink selfupdate-cvs</pre>
<p>will download the package description files and patches.</p>

<p>
To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>


<?
include "footer.inc";
?>
