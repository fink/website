<?
$title = "Download Quick Start";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2003/04/05 15:31:13 $';

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
Open a new Terminal.app window and type "pico .cshrc".
A text editor will pop up.
Enter this line:
</p><pre>source /sw/bin/init.csh</pre><p>
and then hit return.
To get out of the editor, press control-O, return, control-X.</p>
<p>Some users may may need to modify some more files.  Run the following command:</p>
<p><pre>ls -a ~</pre></p>
<p>if files called <code>.login</code> or <code>.tcshrc</code> are among those listed, you'll need to do some more editing.  Consult the <a href="http://fink.sourceforge.net/doc/users-guide/install.php#setup">relevant page</a> of the Fink Users Guide.</p>
<p>Close the Terminal.app window when you're done editing files.
</p></li>
<li><p>
Open a new Terminal.app window and type "fink scanpackages".
(This does one final bit of necessary setup.  
When asked for a password, enter the password of your normal user
account.)
Then type
"sudo dselect", which will 
launch you into a package selection app.
In the menu, hit "[U]pdate" once, then go to "[S]elect" to choose the
packages you want installed.
When you're done, hit "[I]nstall" to actually install the packages.
</p></li>
<li><p>When you install packages in the future, repeat step 4, but you can skip running "fink scanpackages".</p></li> 
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


<?
include "footer.inc";
?>
