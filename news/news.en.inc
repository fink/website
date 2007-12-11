<a name="2007-11-18%20PDB%20Website%20Down"><span class="news-date">2007-11-18: </span><span class="news-headline">PDB Website Down</span></a><?php gray_line(); ?>
    <p>The Package Database web interface is presently down pending hardware and software upgrades. We are working on fixing the server as soon as possible. Sorry for any inconvenience.</p>
<p><b>Update, 2007-12-20</b>The Package Database is up and running again, with enhanced features.</p>
  <a name="2007-10-26%20Initial%20Leopard%20Support"><span class="news-date">2007-10-26: </span><span class="news-headline">Initial Leopard Support</span></a><?php gray_line(); ?>
    <p>The Fink Project announces initial support for Mac OS X Leopard (10.5).</p>
    <p>10.5 users who are starting a new Fink tree will need to do this via bootstrap, until a binary distribution gets generated.  Download fink-0.27.8 <a href="http://downloads.sourceforge.net/fink/fink-0.27.8.tar.gz">here</a>.</p>
    <p>The 10.4-&gt;10.5 update can be accomplished by running <code>fink selfupdate</code> to get <code>fink-0.27.8</code> .  If you're doing this on 10.5, make sure that you have Xcode 3.0 installed.  After 10.5 is installed, run <code>fink reinstall fink</code>.</p>
    <p>A direct 10.3-&gt;10.5 upgrade path isn't ready yet.  If you're impatient to get going, you'll need to download the <code>fink-0.27.8</code> tarball and bootstrap a new Fink tree as above.</p>
    <p><b>Update, 2007-10-29:</b>  Users who have updated from 10.4 to 10.5 should note that using <code>fink cleanup</code> to remove .deb files will remove <b>all</b> of them.  This issue should be resolved in the next update.</p>
    <p><b>Update, 2007-11-03:</b>  <code>fink-0.27.8</code> or later should solve the above issue as well as a couple of others that have come up.</p>
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
<p><b> Update, 16 March 2007: </b> The new version of fink's 
<code>dpkg</code> package resolves this problem.  Unstable users can
now run the update commands normally.
</p>
		
