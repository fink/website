<?
$title = "Download Quick Start";
$cvs_author = '$Author: fingolfin $';
$cvs_date = '$Date: 2002/01/15 23:45:09 $';

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
New to Fink?
These quick start instructions are here to get you up to speed with
the binary release.
</p>

<ol>
<li><p>
Download the installer disk image:<br />
<a href="http://prdownloads.sourceforge.net/fink/fink-0.3.2a-installer.dmg.gz">Fink
0.3.2a Binary Installer</a> - 7.7 MB
</p></li>
<li><p>
Double-click "fink-0.3.2a-installer.dmg" to mount the disk image,
then double-click the "Fink 0.3.2a Installer.pkg" package
inside. Follow the instructions on screen.
</p></li>
<li><p>
Open a new Terminal.app window and type "pico .cshrc".
A text editor will pop up.
Enter this line:
</p><pre>source /sw/bin/init.csh</pre><p>
To get out of the editor, press control-O, return, control-X.
Close the Terminal.app window.
</p></li>
<li><p>
Open a new Terminal.app window and type "sudo dselect".
That launches you into a package selection app.
(When asked for a password, enter the password of your normal user
account.)
In the menu, hit "[U]pdate" once, then go to "[S]elect" to choose the
packages you want installed.
When you're done, hit "[I]nstall" to actually install the packages.
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
<a href="../bindist/dists/fink-0.3.2a/main/source/base/">here</a>.
</p>


<?
include "footer.inc";
?>
