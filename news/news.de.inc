<a name="2006-07-24%20Reminder:%20%2210.4-transitional%22%20Tree%20Unsupported%20on%20August%201st,%202006"><span class="news-date">2006-07-24: </span><span class="news-headline">Reminder: "10.4-transitional" Tree Unsupported on August 1st, 2006</span></a><?php gray_line(); ?>
			<p>
				The "10.4-transitional" tree was created as an interim solution to the issues of
				incompatibilities between binaries made using GCC 3.3 (the default Mac OS X 10.3
				compiler) and GCC 4.0 (the default Mac OS X 10.4 compiler).  Now that the work to
				move Fink to using GCC 4.0 is essentially finished, we will be stopping official
				support of the "10.4-transitional" tree in favor of the "10.4" tree as of August
				1st, 2006.
			</p>
			<p><b>You should not need to do anything if "fink --version" prints "0.8.1.cvs" or "0.8.1.rsync".</b></p>
			<p>
				As we mentioned <a href="<?php print $root; ?>news#2006-07-01%20July%20is%20%22Fink%20Update%20Month%22">previously</a>,
				there are 2 ways to make the switch to the supported "10.4" tree.
			</p>
			<p>
				The simplest way is to remove your Fink installation by deleting it and
				installing fresh using the 0.8.1 installer available from the <a href="<?php print $root; ?>download">download page</a>.
			</p>
			<p>
				Alternately, to preserve your Fink installation, download the
				<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">upgrade script</a>
				and read the README for instructions on how to upgrade your existing installation in-place.
				This will re-build your Fink installation from source, upgrading everything in the process.
				Be warned, it can take a lot of time, depending on your fink installation!
			</p>
			<p>
				Feedback on the upgrade script has been very positive; many users have already
				made the switch.  If you have problems, please feel free to mail your issues to
				the <a href="<?php print $root; ?>lists">discussion lists</a>.
			</p>
		<a name="2006-07-24%20Fink%20Birds-of-a-Feather%20at%20OSCON%202006"><span class="news-date">2006-07-24: </span><span class="news-headline">Fink Birds-of-a-Feather at OSCON 2006</span></a><?php gray_line(); ?>
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
		<a name="2006-07-01%20July%20is%20%22Fink%20Update%20Month%22"><span class="news-date">2006-07-01: </span><span class="news-headline">July is "Fink Update Month"</span></a><?php gray_line(); ?>
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

