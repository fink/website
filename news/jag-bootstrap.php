<?
$title = "Bootstapping Fink under Mac OS X 10.2";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2002/09/09 00:38:05 $';

include "header.inc";
?>


<h1>Bootstrapping Fink under Mac OS X 10.2</h1>

<p>
Apple introduced major changes in Mac OS X 10.2, and the Fink installation
procedure has changed somewhat with the new OS.  The instructions 
in this document are
current as of 8 September 2002, and can be expected to simplify at a later 
date as further progress in updating Fink is made.
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
<li> <b>Step 2: Obtain the files for the Fink installation.</b>
To do this, create a directory <b>finkcvs</b> in a location of your
choice.  Now issue the commands
<pre>
  cd finkcvs
  cvs -d:pserver:anonymous@cvs.fink.sourceforge.net:/cvsroot/fink login
  cvs -d:pserver:anonymous@cvs.fink.sourceforge.net:/cvsroot/fink co fink
  cd fink
</pre>
(After the "login" command, just press a carriage return when it asks for
a password: no password is needed.)
All subsequent commands will assume that you are in the <b>finkcvs/fink</b>
directory.
<br><br>
<li><b>Step 3: Install Fink.</b>  To do this, run the command
<pre>
  ./bootstrap.sh
</pre>
from within the finkcvs/fink directory.
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
<li><b>Step 5: Obtain updated fink packages.</b>
To do this, issue the command
<pre>
fink selfupdate-cvs
</pre>
You will need an active internet connection during this step, which will
provide you with package descriptions for the 10.2 packages.
<br><br>
<li> Finally, when all of this has been completed, you may remove the
finkcvs directory and its contents if you wish.
</ul>
<p> You should now have a fully functioning Fink installation, into which
you can install whichever Fink packages you wish.
</p>


<?
include "footer.inc";
?>
