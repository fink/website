<a name="2007-03-04%20Problems%20with%20tar"><span class="news-date">2007-03-04: </span><span class="news-headline">Problems with tar</span></a><?php gray_line(); ?>
<p>Some users of fink's unstable tree are having sporadic difficulties
at the end of building large packages, getting reports like
<b>tar: File changed as we read it</b> which causes the .deb file
not to be built.
</p><p>
The fink team is currently studying this problem to determine a permanent
fix.  For the time being, users experiencing this problem can work around
it by issuing the command <code>fink install tar-1.15.1-14</code>.  It
may be necessary to issue that command after each <code>fink update-all</code>
command, as well.
</p><p>Once the fink team has determined how to solve this problem 
permanently, another announcement will be made here.
</p>
<p><b> Update: 16 March 2007: </b> The new version of fink's 
<code>dpkg</code> package resolves this problem.  Unstable users can
now run the update commands normally.
</p>
		<a name="2006-08-19%20Server%20down;%20workarounds%20available"><span class="news-date">2006-08-19: </span><span class="news-headline">Server down; workarounds available</span></a><?php gray_line(); ?>
<p><b> Update: 21 August 2006: </b> The server has been restored.</p>
	<p> 
The server which hosts four important
fink services (the rsync update, the binary distribution, the "master mirror" 
of source files, and the package database) is down at the moment.  We are
hoping that the server will be restored as early as Monday, August 21,
but are providing these workarounds for use during the period of outage.
</p><p>
To update fink, you must either select an rsync mirror other than the
primary one (see the next paragraph), or use the command
<code>fink selfupdate-cvs</code>.  You only need to give this command
once; subsequent updates will continue to be performed using CVS.
When the server is restored, you can revert to rsync updating by means
of the command <code>fink selfupdate-rsync</code>.
</p><p>
To work around the lack of the binary distribution, and the "master mirror"
of source files, run the command <code>fink configure</code>.  You should
accept the default answers to all of the questions, except the following:
when asked "Should Fink try to download pre-compiled packages from 
the binary distribution if available?" answer "no" (to disable the binary
distribution); when asked if you want to change the mirror settings,
answer "yes", and then you will be asked "What mirror order should fink use 
when downloading sources?".  The answer is "2: Search Master Mirrors last"
(to disable the automatic attempts to use the master mirror server).
Finally, if you have decided to stick with rsync for updates, when asked to
"Choose a mirror for 'RSync SelfUpdate'" you should choose one other than
rsync://master.us.finkmirrors.net/finkinfo/.  Unfortunately, other choices
might not be available to you if you are in the U.S.
</p><p>
Finally, to use the package database during the outage, you can connect
to <a href="http://lists.finkproject.org/pdb">this backup copy of the
package database</a> which is a few weeks out of date.
</p>
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
				As we mentioned <a href="<?php print $root; ?>news/#2006-07-01%20July%20is%20%22Fink%20Update%20Month%22">previously</a>,
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
		
