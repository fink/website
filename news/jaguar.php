<?php
$title = "Upgrading Fink for Mac OS X 10.2";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:09:29 $';

include "header.inc";
?>


<h1>Upgrading Fink for Mac OS X 10.2</h1>

<p>
Apple introduced major changes in Mac OS X 10.2, and Fink installations
need to be upgraded with care in order to cope with these changes.
If you have upgraded to Mac OS X 10.2 on a machine with a pre-existing
Fink installation, then this document will provide step-by-step instructions
for upgrading Fink.  The instructions in this document are current as of 6 December 2002.
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
<br><br>
<li> <b>Step 2: Obtain the files for the Fink upgrade.</b>
Download the <A href="http://prdownloads.sourceforge.net/fink/fink-0.11.1.tar.gz?download">Fink 0.11.1 archive</A>. Double click on the archive to expand it (Stuffit Expander or OpenUp both work), then open a terminal window and "cd" into the <b>fink-0.11.1</b> directory. All subsequent commands will assume that you are in the <b>fink-0.11.1</b> directory.
<br><br>
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
<br><br>
<li><b>Step 4: Run the update script.</b>
From within the fink-0.11.1 directory, issue the command
<pre>
  sudo ./update-fink.sh
</pre>
You will need an internet connection, and a bit of patience, as the update
takes a while to complete.
<br><br>
<li><b>Step 4a (added November 13, 2002): Finish the update</b>
by running the command
<pre>
  sudo /sw/lib/fink/postinstall.pl
</pre>
<br><br>
<li><b>Step 5: Update your XFree86 packages.</b>
This is done with the command 
<pre>
  fink update xfree86-base xfree86-rootless
</pre>
If you are not running XFree86, or if you installed it externally from the
XonX project, you may skip this step.
<br><br>
<li><b>Step 6: Update your other fink packages.</b>
The easy way to do this is with the command 
<pre>
  fink update-all
</pre>
but
if you prefer to customize things you may issue individual <b>fink update</b>
commands.
<br><br>
<li> Finally, when all of this has been completed, you may remove the
fink-0.11.1 archive, directory, and its contents.
</ul>
<br>If you encounter problems with these 
instructions please consult the fink <a href="../help">Help page</A> which lists sources of finding
assistance.
<?php
include "footer.inc";
?>
