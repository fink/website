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
following command:
</p>
<p>
<code>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43; \
fink selfupdate; fink index</code>
</p><p>
The Fink team is still working on getting Fink packages working under 10.3,
but many many packages already work.
</p>
		<a name="2003-10-23 Say Hello to Mirror Numero Uno"><span class="news-date">2003-10-23: </span><span class="news-headline">Say Hello to Mirror Numero Uno</span></a><?php gray_line(); ?>
	<p>You are too late. Rus Foster from <a href="http://www.jvds.com">JVDS</a>
	beat you all to it. He is the first one to provide us with resources 
	for a Fink rsync mirror.
	The mirror is located in Atlanta, GA and is updated every two hours, at 35 minutes past.
	</p>
	<p>For those of you who are still waiting, join in. The more mirrors we have
	the faster you can rsync your info files. As per usual, updated and current
	information on the mirror structure can be found on <a href="http://finkmirrors.net"> Finkmirrors.net </a>
	</p>
		
