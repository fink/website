<?
$title = "Upgrading Fink for Mac OS X 10.2";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2002/09/09 00:33:58 $';

include "header.inc";
?>


<h1>Upgrading Fink for Mac OS X 10.2</h1>

<p>
Apple introduced major changes in Mac OS X 10.2, and Fink installations
need to be upgraded with care in order to cope with these changes.
If you have upgraded to Mac OS X 10.2 on a machine with a pre-existing
Fink installation, then this document will provide step-by-step instructions
for upgrading Fink.  The instructions are current as of 8 September 2002,
and can be expected to simplify at a later date as further progress in
updating Fink is made.  Roughly 800 out of 1150 Fink packages are available
in the new 10.2 version of Fink, with more coming every day.
</p>
<p>If you want to install a fresh copy of Fink on Mac OS X 10.2, then you
should consult the <a href="jag-bootstrap.php">Jaguar bootstrap guide</a>
instead of this document.
</p>
<p>
Here are the steps to follow for an upgrade.
</p>
<ul>
<li> <b>Step 1: Upgrade Mac OS X and install the OS X 10.2 Developer Tools.</b>
Even if you have been using Fink's binary distribution, you will need to
install the Developer Tools, because the 10.2 Fink packages are not yet
available in binary form.
<p>
<li> <b>Step 2: Obtain the files for the Fink upgrade.</b>
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
<p>
<li><b>Step 3: Verify the integrity of your Fink installation, and update
any external software which is related to Fink.</b>  If you have installed
XFree86 using the distribution from the XonX project, you need to get
a 10.2 upgrade from that project.  Any other software which Fink learns
about via a system-foo package should also be checked for updates.
<p> There have been reports that if you choose "Archive and Install"
when upgrading to OS X 10.2, some parts of your Fink installation may
be damaged.  To help diagnose this, run the command
<pre>
  ./dpkg-checkall.sh
</pre>
from within the finkcvs/fink directory.  You will get a report of any
missing files from your Fink installation.  In some cases these files
are harmless, but in case of doubt about the package foo, you should
either issue the command
<pre>
  fink reinstall foo
</pre>
or the command
<pre>
  fink remove foo
</pre>
You can run dpkg-checkall.sh multiple times if needed.
<p>
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
<p>
<li><b>Step 5: Run the update script.</b>
From within the finkcvs/fink directory, issue the command
<pre>
  sudo ./update-fink.sh
</pre>
You will need an internet connection, and a bit of patience, as the update
takes a while to complete.
<p>
<li><b>Step 6: Update your XFree86 packages.</b>
This is done with the command 
<pre>
  fink update xfree86-base xfree86-rootless
</pre>
If you are not running XFree86, or if you installed it externally from the
XonX project, you may skip this step.
<p>
<li><b>Step 7: Update your other fink packages.</b>
The easy way to do this is with the command 
<pre>
  fink update-all
</pre>
but
if you prefer to customize things you may issue individual <b>fink update</b>
commands.
<p>
<li> Finally, when all of this has been completed, you may remove the
finkcvs directory and its contents if you wish.
</ul>



<?
include "footer.inc";
?>
