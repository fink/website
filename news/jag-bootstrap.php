<?
$title = "Bootstapping Fink under Mac OS X 10.2";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2002/11/01 19:52:52 $';

include "header.inc";
?>


<h1>Bootstrapping Fink under Mac OS X 10.2</h1>

<p>
Apple introduced major changes in Mac OS X 10.2, and the Fink installation
procedure has changed somewhat with the new OS.  The instructions 
in this document are current as of 20 October 2002.
</p>
<p>
If you are trying to upgrade an existing Fink installation, see the
<a href="jaguar.php">Jaguar upgrade page</a> instead.
</p>
<p>
Here are the step-by-step instructions to install Fink on Mac OS X 10.2.
</p>
<ul>
<li> <b>Step 1: Install Mac OS X 10.2 and the OS X 10.2 Developer Tools.</b>
A binary option is not yet available for the 10.2 version of Fink.
<br><br>
<li> <b>Step 2: Obtain the files for the Fink upgrade.</b>
Download the <A href="http://prdownloads.sourceforge.net/fink/fink-0.11.0.tar.gz?download">Fink 0.11.0 archive</A>. Double click on the archive to expand it (Stuffit Expander or OpenUp both work), then open a terminal window and "cd" into the <b>fink-0.11.0</b> directory. All subsequent commands will assume that you are in the <b>fink-0.11.0</b> directory.
<br><br>
<li><b>Step 3: Install Fink.</b>  To do this, run the command
<pre>
  ./bootstrap.sh
</pre>
from within the fink-0.11.0 directory.
<br><br>
<li><b>Step 4: Edit your fink.conf file.</b>
You will find this file at /sw/etc/fink.conf (or another location if you
installed Fink in a non-standard place).  You may need to change to file
permissions or use sudo to edit the file.  You want to add the "unstable"
trees to the Trees line in this file, so that the line reads
<pre>
Trees: local/main stable/main stable/crypto local/bootstrap unstable/main unstable/crypto
</pre>
Even if you have not used the unstable Trees in the past, at the present
time virtually all of the 10.2 Fink packages are still being tested in
the unstable tree and have not yet been moved to the stable tree, so
this step is highly recommended.
<br><br>
<li><b>Step 5: Add fink to your paths.</b>
Type:
<pre>
pico ~/.cshrc
</pre>
A text editor will pop up. Enter this line:
<pre>
source /sw/bin/init.csh
</pre>
To get out of the editor, press control-O, return, control-X. 
Close the Terminal.app window and open a new one.
<li><b>Step 6: Obtain updated fink packages.</b>
To do this, issue the command
<pre>
fink selfupdate-cvs
</pre>
You will need an active internet connection during this step, which will
provide you with package descriptions for the 10.2 packages.
<br><br>
<li> Finally, when all of this has been completed, you may remove the
fink-0.11.0 archive, directory, and its contents.
</ul>
<p> You should now have a fully functioning Fink installation, into which
you can install whichever Fink packages you wish. 
<br>If you encounter problems with these 
instructions please consult the fink <a href="../help">Help page</A> which lists sources of finding
assistance.
</p>


<?
include "footer.inc";
?>
