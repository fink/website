<?
$title = "Download Quick Start";
$cvs_author = '$Author: htodd $';
$cvs_date = '$Date: 2003/11/03 03:45:59 $';

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
At the end of the installation, a Terminal.app window will be launched, 
and the pathsetup.command script will automatically be run. You will be 
asked for permission before your shell's configuration files are edited. 
When the script has finished, close the window are you are set to go!
</p></li>
<li><p>
If anything goes wrong during this process, you can try again by launching 
pathsetup.command file which appears on the installer disk, or by 
running (from the command line in a Terminal.app window) 
</p><pre>open /sw/bin/pathsetup.command <RETURN></pre><p>
(This step should also be repeated by any other users on your system: each user must run pathsetup.command in his or her own account.)
</p><p>
If pathsetup.command generates errors messages, consult the documentation, 
particularly 
<a href="../doc/users-guide/install.php#setup">section
2.3 "Setting Up Your Environment"</a> of the User's Guide.</p>
</li>
<li><p>
Open a new Terminal.app window and type 
"sudo dselect", which will 
launch you into a package selection app.
In the menu, hit "[U]pdate" once, then go to "[S]elect" to choose the
packages you want installed.
When you're done, hit "[I]nstall" to actually install the packages.
</p></li>
<li><p>When you install packages in the future, repeat step 5.
</p></li> 
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
