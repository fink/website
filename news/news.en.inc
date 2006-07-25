<a name="2006-07-24 Fink Birds-of-a-Feather OSCON 2006"><span class="news-date">2006-07-24: </span><span class="news-headline">Fink Birds-of-a-Feather OSCON 2006</span></a><?php gray_line(); ?>
			<p>Are you at OSCON 2006?  Want to meet up?</p>
			<p>
				<a href="mailto:oscon2006@racoonfink.com">Benjamin Reed</a> (RangerRick on #fink)
				is at OSCON and is interested in meeting anyone who wants to hang out and talk about
				Fink, or even just meet for the heck of it.
			</p>
			<p>
				Meet us in room F150 on Wednesday, July 26th at 8:30pm and we'll talk about Fink,
				Mac OS X, and anything else that takes our fancy.
			</p>
		<a name='2006-07-01 July is "Fink Update Month"'><span class="news-date">2006-07-01: </span><span class="news-headline">July is "Fink Update Month"</span></a><?php gray_line(); ?>
      <p>
Fink users on PowerPC machines are advised to update their copies of
fink from the old "10.4-transitional" tree to the more recent "10.4"
tree.  We plan to discontinue the 10.4-transitional tree
by the end of July, 2006.
</p><p>
Some background: along with OS X 10.4 came a new version of the g++ compiler
(one of the workhorses of Fink), which produced code that was binary
incompatible with previous versions.  Fink, when using the 10.4-transitional 
tree, mixes the new gcc-4.0 compiler with the older g++-3.3 compiler.
This strategy gave us some extra time to make packages compatible with
g++-4.0.  The time has now come to complete that transition, and rely
exclusively on the newer tree.  The update, however, is slightly
complicated since all packages using or providing g++ libraries must
be rebuilt in the correct order.
</p><p>
If you are using OS X 10.4, you can
find out if you need to update your Fink installation
by running the command
<code>fink --version</code>.  If the Distribution version is 0.8.1.cvs
or 0.8.1.rsync, you do <b>not</b> need to update.  However, if the 
Distribution version is 0.8.0.cvs or 0.8.0.rsync, you should update,
as described below.
</p>
<p>
Many users will prefer to remove their fink installations and
start anew with the 0.8.1 installer.  Others will prefer to use the 
<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">10.4-update 
tarball (v. 0.4)</a> (around 12 MB), which includes 
precompiled versions of the basic fink packages as well as a script which
will attempt to update an existing fink installation.  Please consult
the README file which you will find within the 10.4-update directory 
(after unpacking the tarball) for further instructions.
</p>
<p>
Note: Fink users who are upgrading their systems from OS X 10.3 to OS X 10.4
can use the same two options to update their fink installations: they can
either remove their old fink installations and start over, or they can
use the same 10.4-update tarball.  The update script should not be run
until after OS X has been upgraded.
</p>
<a name="2006-06-15 New Fink release."><span class="news-date">2006-06-15: </span><span class="news-headline">New Fink release.</span></a><?php gray_line(); ?>
      <p>
A new Fink release for OS X 10.4 (Tiger) is 
<a href="<?php print $root; ?>download/index.php">available</a>
 today: version 0.8.1, which can be installed on either Intel or PowerPC
hardware.
The release includes source files, binary packages, and  Fink
installers for both kinds of hardware.
</p>
      <p>
Fink on the Intel platform is still considered "beta" quality, and a number of
packages (particularly packages in the "unstable" tree) either do not compile,
or compile but do not run.  Work to improve this situation is ongoing.
</p>
<p>
Fink users on PowerPC whose existing fink installation uses the 
10.4-transitional tree (from the 0.8.0 distribution) may upgrade in
one of two ways.  The upgrade process is problematic, due to the change
in ABI of g++ libraries which requires many libraries to be recompiled.
Many users will simply wish to remove their fink installations and
start anew with the 0.8.1 installer.  Others may wish to use the new
<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.3.tar.gz?download">10.4-update tarball (v. 0.3)</a> (around 12 MB), which includes 
precompiled versions of the basic fink packages as well as a script which
will attempt to update an existing fink installation.
</p>

