<a name="2007-10-26%20Initial%20Leopard%20Support"><span class="news-date">2007-10-26: </span><span class="news-headline">Initial Leopard Support</span></a><?php gray_line(); ?>
    <p>The Fink Project announces initial support for Mac OS X Leopard (10.5).</p>
<p>10.5 users who are starting a new Fink tree will need to do this via bootstrap, until a binary distribution gets generated.  Download fink-0.27.7 <a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">here</a>.</p>
<p>The 10.4-&gt;10.5 update can be accomplished by running <code>fink selfupdate</code> to get <code>fink-0.27.7</code> .  If you're doing this on 10.5, make sure that you have Xcode 3.0 installed.  After 10.5 is installed, run <code>fink reinstall fink</code>.</p>
<p>A direct 10.3-&gt;10.5 upgrade path isn't ready yet.  If you're impatient to get going, you'll need to download the <code>fink-0.27.7</code> tarball and bootstrap a new Fink tree as above.</p>
<p><b>Update, 2007-10-29:</b>Upgrading users should note that using <code>fink cleanup</code> to remove .deb files will remove <b>all</b> of them.  This issue should be resolved in the next update.</p>
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

<p><b> Update: 2 June 2007.</b>  Due to changes to the behavior of <code>sudo</code> on 10.4.9, the update script needs a bit of assistance.  Switching to a superuser prompt first via <code>sudo -s</code> will suffice.</p>
		
