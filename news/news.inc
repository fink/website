<a name="2003-10-31 Happy Halloween and welcome new mirrors"><span class="news-date">2003-10-31: </span><span class="news-headline">Happy Halloween and welcome new mirrors</span></a><?php gray_line(); ?>
		<p>
		We wish all of you a happy Halloween.
		</p>
		<p>
		Furthermore I would like to welcome our new mirrors to the Fink family.
		From Europe in Rijeka, Croatia a new full mirror joins us. This mirrors 
		has been sponsored by the <a href="http://mac.dir.hr/">Jabucnjak</a> Apple user group. 
		This is our first mirror in Europe, so I hope that more will be joining us 
		soon.
		</p>
		<p>
		Dave Schroeder from the <a href="http://mirror.services.wisc.edu/">University of 
		Wisconsin</a> in Madison is sponsoring a 100Mbit dedicated Master server.
		A. J. Wright and <a href="http://sunsite.utk.edu/">SunSITE@UTK</a> are helping out with 
		another full mirror in the United states. 
		</p>
		<p>
		This raises our full mirror count to four and the rsync mirror count to 
		five. We are happy to have such a great community back us up, but I know 
		that more mirrors will join over time. I will not stop nagging you until
		Fink has its own mirror in every state of the USA. Yet, with such a 
		brilliant community backing us up, I am not too worried about not
		reaching my goal very soon.
		</p>
		<p>
		Trick or treat! Our most wanted treat is more mirrors, so come forth 
		Administrators and fill our bag. Information on how you can be a mirror
		can be found on the official <a href="http://finkmirrors.net">
		mirroring website</a>.
		</p>
		<a name="2003-10-25 Look Ma, a logo for Fink"><span class="news-date">2003-10-25: </span><span class="news-headline">Look Ma, a logo for Fink</span></a><?php gray_line(); ?>
	<p>As you surely noticed, Fink has a logo. This is the result of our
	Logo <a href="<?php print $root; ?>logo.php">contest</a> held earlier this year.
	This new, official, logo has been displayed since the 24th of October and
	those of you who wondered how it has been picked and what the name of the
	winner is should read up in the PR <a href="<?php print $root; ?>pr/index.php">section</a>.
	</p>
	<p>
	The longer explanation also features a larger version of the logo itself,
	so that you may have a closer look at its details. We like our new logo,
	we hope that you will like it too.
	</p>
	<p>IMPORTANT: We do not yet have a formal licensing agreement for the new
   logo and so are unable to give permission to distribute it.  Currently, it
   can only be displayed on the Fink web page.  Thank you for your understanding.
	</p>
		<a name="2003-10-24 Upgrade to gcc 3.3 and/or 10.3"><span class="news-date">2003-10-24: </span><span class="news-headline">Upgrade to gcc 3.3 and/or 10.3</span></a><?php gray_line(); ?>
	<p>It is now possible to upgrade Fink to take full advantage of the gcc 3.3
compiler, or to use OS X 10.3 if you have that installed.  Binary packages
corresponding to these upgrades are not yet available, so if you make 
extensive use of binary packages you may wish to wait a few days before 
upgrading.
</p><p>
If you wish to perform this upgrade, and you had previously installed the
June 2003 Developer Tools update from Apple, you will need to install
the August 2003 Developer Tools update BEFORE you upgrade Fink.  Under
10.3, be sure to install XCode from the XCode disk before upgrading
Fink.
</p><p>
Running "fink selfupdate" should perform the upgrade for you.  The latest
version of the fink package manager will automatically detect which
version of OS X and which version of gcc you have installed, and will
adjust itself accordingly.
</p><p>
If you wish to do a fresh install of Fink on a 10.3 system, we recommend
<a href="http://fink.sf.net/download/srcdist.php">bootstrapping from
source,</a> starting from fink-full-0.6.0.tar.gz available
on fink's <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">sourceforge 
download page.</a>  You'll need XCode for this as
well.
</p><p>
Also note that once you have Fink version 0.15.0 or higher, you do
not need to install system-xfree86 anymore.  Fink is
capable of automatically determining your system-xfree86 version if you
don't already have any fink x11 packages installed.  If you currently
have an old system-xfree86 package of any kind installed, please run the
following:
</p>
<pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43; fink selfupdate; fink index</pre>
<p>
The Fink team is still working on getting Fink packages working under 10.3,
but many many packages already work.
</p>
		
