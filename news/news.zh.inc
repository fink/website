<a name="2007-12-10%20Leopard,%20X11,%20and%20Fink"><span class="news-date">2007-12-10: </span><span class="news-headline">Leopard, X11, and Fink</span></a><?php gray_line(); ?>
    <p>Users who want to update their Leopard X11 installation should make sure to download a <a href="http://xquartz.macosforge.org/downloads/Xquartz-1.3.0-apple-fink.bz2">Fink-friendly update to Xquartz</a>.  Users who have already applied the X11-2.1.0.1.pkg from macosxforge.org <b>must</b> download the Fink-compatible Xquartz for Fink to work properly.</p>
  <a name="2007-11-18%20PDB%20Website%20Down"><span class="news-date">2007-11-18: </span><span class="news-headline">PDB Website Down</span></a><?php gray_line(); ?>
    <p>The Package Database web interface is presently down pending hardware and software upgrades. We are working on fixing the server as soon as possible. Sorry for any inconvenience.</p>
<p><b>Update, 2007-12-10:  </b>The Package Database is up and running again, with enhanced features.</p>
  <a name="2007-10-26%20Initial%20Leopard%20Support"><span class="news-date">2007-10-26: </span><span class="news-headline">Initial Leopard Support</span></a><?php gray_line(); ?>
    <p>The Fink Project announces initial support for Mac OS X Leopard (10.5).</p>
<p>10.5 users who are starting a new Fink tree will need to do this via bootstrap, until a binary distribution gets generated.  Download fink-0.27.7 <a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">here</a>.</p>
<p>The 10.4-&gt;10.5 update can be accomplished by running <code>fink selfupdate</code> to get <code>fink-0.27.7</code> .  If you're doing this on 10.5, make sure that you have Xcode 3.0 installed.  After 10.5 is installed, run <code>fink reinstall fink</code>.</p>
<p>A direct 10.3-&gt;10.5 upgrade path isn't ready yet.  If you're impatient to get going, you'll need to download the <code>fink-0.27.7</code> tarball and bootstrap a new Fink tree as above.</p>
<p><b>Update, 2007-10-29:</b>Upgrading users should note that using <code>fink cleanup</code> to remove .deb files will remove <b>all</b> of them.  This issue should be resolved in the next update.</p>

