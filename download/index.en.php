<?
$title = "Download Quick Start";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2004/04/08 22:00:19 $';

include "header.inc";
?>


<h1>Fink Downloads</h1>
<p>
There are many ways to install or upgrade Fink.
For new users, the quick start instructions below are recommended.
Otherwise, check out the <a href="overview.php">overview</a> and the
<a href="upgrade.php">upgrade matrix</a>.
</p>

<h2>Quick Start</h2>
<p>
New to Fink?  These quick start instructions are here to get you up to speed
with the binary release.
</p>
<? 
include "../fink_version.inc";
?>

<ol>
<li><p>
Download the installer disk image:<br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Installer.dmg?download">Fink
<? print $fink_version; ?> Binary Installer</a> - <? print $dmg_size; ?><br>
(10.2 users - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.3-Installer.dmg?download">Fink
0.6.3</a>)<br>
(10.1 users - use <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink
0.4.1</a>)
</p>
</li>
<li><p>
Double-click "Fink-<? print $fink_version; ?>-Installer.dmg" to mount the disk image,
then double-click the "Fink <? print $fink_version; ?> Installer.pkg" package
inside. Follow the instructions on screen.
</p></li>
<li><p>
At the end of the installation, the pathsetup utility will be launched.
You will be asked for permission before your shell's configuration files
are edited. When the utility has finished, you are set to go!
</p></li>
<li><p>
If anything goes wrong during this process, you can try again by launching 
the pathsetup application which appears on the installer disk, or by
running (from the command line in a Terminal.app window) 
</p><pre>/sw/bin/pathsetup.sh <RETURN></pre><p>
(This step should also be repeated by any other users on your system: 
each user must run pathsetup in his or her own account.)
</p><p>
If pathsetup generates errors messages, consult the documentation, 
particularly 
<a href="../doc/users-guide/install.php#setup">section
2.3 "Setting Up Your Environment"</a> of the User's Guide.</p>
</li>
<li><p>
Open a new Terminal.app window and run the following: "<code>fink scanpackages; fink index</code>", or use the included Fink Commander GUI application (which must be placed in a real folder on your system, not run from the disk image) and run the following commands from its menu:  <em>Source->scanpackages</em> followed by <em>Source->Tools->index</em>.
</p>
</p></li>
<li><p>Once those two commands are finished you should update the <code>fink</code> package, in case there have been significant changes since the last point release.  After you do this you can install other packages.  There are several ways to do this:
<ul>
<li>
<p>Use the included Fink Commander to select and install packages. Fink Commander provides an easy to use GUI for Fink. This is the recommended method for new users, or users who are not comfortable with the command line.  Fink Commander has Binary and Source menus.  You should install from binaries if you don't have the Developer Tools installed, or don't want to build packages yourself.</p>
<ul><li><p>The Fink Commander sequence to update <code>fink</code> from binaries is as follows:</p>
<ol>
<li>Binary->Update descriptions</li>
<li>Select the <code>fink</code> package.</li>
<li>Binary->Install</li>
</ol></li>
<li><p>The recommended Fink Commander sequence sequence to update <code>fink</code>is as follows:</p>
<ol>
<li>Source->Selfupdate</li> 
<li>Tools->Interact with Fink...
<li>Make sure "Accept default response" is selected, and click "Submit".</li>
<li><code>fink</code> and other base packages will be built and run automatically</li>
</ol></li></ul>
<p>Now that you've updated <code>fink</code>, you can install other packages.</p>  
<ul>
<li>To install from binaries, select the package, and use Binary->Install.</p></li>
<li>To install from source, select the package, and use Source->Install</li>
</ul>
</li>
<li>
<p>Use apt-get. Apt-get will fetch and install binary packages for you, saving compiling time.  You should either use this method or the Fink Commander binary method (above) if you don't have the Developer Tools installed.</p>
<p>To update <code>fink</code> open a Terminal.app window and type <code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>Once you've updated <code>fink</code>, you can install other packages, using the same syntax, e.g <code>sudo apt-get install gimp</code> to install the Gimp.  Note, however, that not all fink packages are in binary form.</p>
</li>
<li>
<p>Install from source. To update <code>fink</code> run <code>fink selfupdate</code>.  When prompted, select option (1), "rsync".  This will automatically update the <code>fink</code> package.</p>
<p>Once <code>fink</code> is updated, you can use "<code>fink install</code>" to fetch and compile from source code.  For example, to install the Gimp, run <code>fink install gimp</code>.</p> 
</li> 
</ul>

</li> 
</ol>

<p>
For more information, please refer to the <a
href="../faq/index.php">Frequently Asked Questions</a> and the <a
href="../doc/index.php">documentation section</a>.
If your questions aren't answered by those documents, check out the <a
href="../help/index.php">help page</a>.
</p>
<p>
To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>

<p>
The source code for the packages in the installer disk image can be
downloaded from this site,
<a
href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">here</a>.
</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
