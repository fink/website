<?
$title = "News";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2003/01/07 22:13:34';

$metatags = '';

include "header.inc";
?>

<a name="2003-01-07 Fink Interaction with Apple's X11 Public Beta"><span class="news_date">2003-01-07: </span><span class="news_headline">Fink Interaction with Apple's X11 Public Beta</span></a><?php gray_line(); ?>
	<p>
	Fink works just fine with the <a href="<?php print $root; ?>http://www.apple.com/macosx/x11/">public beta X11 release</a>
	with some caveats.  Please read <a href="<?php print $root; ?>http://fink.sourceforge.net/doc/x11/inst-xfree86.php#apple-binary">the newly added Apple X11</a> section of the Fink X11 Documentation for details.</p>
	<a name="2003-01-07 RSS Feeds available"><span class="news_date">2003-01-07: </span><span class="news_headline">RSS Feeds available</span></a><?php gray_line(); ?>
	<p>
	Thanks to one of our most valuable developers, Benjamin Reed, it is now possible to receive RSS 1.0 Feeds that cotain a lot of valuable information

<a href="<?php print $root; ?>http://fink.sf.net/news/fink-stable.rdf">fink-stable.rdf</a> will tell you about the changes and additions in the stable tree, reflecting packages which have been added or modified.
</p>
<p><a href="<?php print $root; ?>http://fink.sf.net/news/fink-unstable.rdf">fink-unstable.rdf</a> will tell you about changes or additions to the unstable tree and is most likely the most active RSS feed.
The above Feeds are automatically updated every 60 minutes to make sure that they keep you all on top of the latest development.
</p>
<p><a href="<?php print $root; ?>http://fink.sf.net/news/news.rdf">news.rdf</a> This feed reflects the contents of the Fink News Page. The Feed is updated as soon as a new item is added on the Website.
</p>
<a name="2002-12-22 New Upgrade Matrix"><span class="news_date">2002-12-22: </span><span class="news_headline">New Upgrade Matrix</span></a><?php gray_line(); ?>
  <p>A new <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> is
  now available, for use in upgrading earlier versions of Fink to the
  current version, under either OS X 10.1 or OS X 10.2.  Users upgrading
  under 10.1 will be brought to Fink version 0.4.1a, while users
  upgrading under 10.2 will be brought to Fink version 0.5.0a.
  </p>
  <a name="2002-12-11 New Upgrade Matrix coming"><span class="news_date">2002-12-11: </span><span class="news_headline">New Upgrade Matrix coming</span></a><?php gray_line(); ?>
  <p>The Fink team is aware of the shortcomings of the current
  <b>Upgrade Matrix</b> page, which is inadequate for upgrading
to Fink 0.5.0a.  Please be patient as we construct
  a new version of that page, whose existence will be announced
  here.  In the meantime, some of you may wish to use the <a href="<?php print $root; ?>news/jaguar.php">test version of the Jaguar updater</a> which was
made available on 2002-09-08.
  </p>
  <a name="2002-12-09 Fink 0.5.0a Released"><span class="news_date">2002-12-09: </span><span class="news_headline">Fink 0.5.0a Released</span></a><?php gray_line(); ?>
  <p>
    Fink 0.5.0a for Mac OS X 10.2 is now complete. (Note: 0.5.0a is a final
    release, and replaces 0.5.0 which was never officially released.) This
    release includes over 700 
    binary packages for OS X 10.2 as well as over 1800 source packages of
    all kinds. 
  </p>
  <p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
  </p>
  <p>
  This release is for Mac OS X 10.2 only. 10.1 users should use Fink 0.4.1.
  </p>
  <a name="2002-11-11 Update XFree86 for use with OS X 10.2.2"><span class="news_date">2002-11-11: </span><span class="news_headline">Update XFree86 for use with OS X 10.2.2</span></a><?php gray_line(); ?>
  <p>
Users should update their XFree86 installations to version 4.2.1.1
for use with OS X 10.2.2.  If you are using system-xfree86, you
can get the new version from the <a href="<?php print $root; ?>https://sourceforge.net/project/shownotes.php?release_id=118483">XonX 
project</a>.  If you are using Fink's
xfree86 packages, you should update to xfree86-base-4.2.1.1-1 and
xfree86-rootless-4.2.1.1-1.  These packages are recent additions to
the 10.2/unstable tree; to gain access to them, you may need to run 
&quot;fink selfupdate-cvs&quot; and/or enable the unstable tree
  </p>
  <a name="2002-10-30 Don't reuse binary installer"><span class="news_date">2002-10-30: </span><span class="news_headline">Don't reuse binary installer</span></a><?php gray_line(); ?>
  <p>
  Users are cautioned to use the binary installer for Fink 0.4.1 <b>only
once</b> on a given machine.  Due to an apparent bug in Apple's
Installer.app program, attempting a second installation on the same
machine can result in permissions being altered in the machine's root
directory, in some cases leaving the machine in a non-bootable state.
</p><p> If Installer.app presents you with an &quot;Upgrade&quot; button rather
than an &quot;Install&quot; button when installing Fink 0.4.1, <b>do not proceed
any further!</b> </p>
<p>A new version of the binary installer for Fink 0.4.1 became available
on November 5.  The new version avoids
the problem of the machine not booting, but even with the new version,
users are advised to only &quot;Install&quot;,
not &quot;Upgrade.&quot;  (You can recognize the new version by its filesize of
12582912 bytes, while the old version had a filesize of 10541112 bytes.)
</p><a name="2002-09-28 Fink 0.4.1 released"><span class="news_date">2002-09-28: </span><span class="news_headline">Fink 0.4.1 released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
    </p>
    <p>
    This is the <b>last release for Mac OS X 10.1</b>. Future versions of Fink will <b>not</b> officially support Mac OS X 10.1 anymore, we are gearing all our efforts towards 10.2.
    </p>
    <p>
    At the same time, this release is not meant for Mac OS X 10.2. Fink 0.5.0. which is targeted for October, will be geared towards 10.2. In the meantime refer to the news item below on how to upgrade Fink for 10.2.
    </p>
  <a name="2002-09-27 Possible conflicts with anti-virus software"><span class="news_date">2002-09-27: </span><span class="news_headline">Possible conflicts with anti-virus software</span></a><?php gray_line(); ?>
<p> A number of recent reports on the 
<a href="<?php print $root; ?>http://www.mail-archive.com/fink-users@lists.sourceforge.net/">fink-users
mailing list</a> have indicated problems (including kernel panics and
infinite hangs during patching) when using Fink to compile packages while
anti-virus software is installed.  You may need to switch off any anti-virus
software before using Fink.
</p><a name="2002-09-08 Test version of Jaguar updater available"><span class="news_date">2002-09-08: </span><span class="news_headline">Test version of Jaguar updater available</span></a><?php gray_line(); ?>
		<p>
			A test version of the 10.2 updater for Fink is now available. The update process is somewhat complicated at the moment, but is explained in <a href="<?php print $root; ?>news/jaguar.php">step-by-step instructions for updating</a>. We also have separate <a href="<?php print $root; ?>news/jag-bootstrap.php">instructions to install Fink from scratch on 10.2</a>. 
		</p>
		<p>
			At the moment, approximately 800 out of 1150 Fink packages have been made ready for 10.2. However, virtually all of these packages are still being tested and have not yet been moved to the &quot;stable&quot; tree in the 10.2 section; moreover, binaries for 10.2 packages are not yet available. 
		</p>
	<a name="2002-08-20 Mac OS X 10.2 / Jaguar"><span class="news_date">2002-08-20: </span><span class="news_headline">Mac OS X 10.2 / Jaguar</span></a><?php gray_line(); ?>
    <p>
      During the last few weeks, we got a lot of emails asking whether Fink will work Mac OS X 10.2.
    </p>
    <p>
      The answer is: Yes, we will support 10.2. However, due to some
      major changes in this new OS version, we had to make a lot of adjustments both
      to the Fink tool itself and to many packages. The current binary distribution,
      0.4.0a, will only work partially on 10.2. We are working on an upgrade guide,
      as well as a new Fink release, to support 10.2.
    </p>
	<p>
	 If you upgrade your system to 10.2 before the official Fink update for 10.2 is ready,
	 many Fink packages built on 10.1 are going to work fine, but others need to be rebuilt.
	 Some packages need special changes to build on 10.2. Adding &quot;unstable/main&quot; to your
	 list of trees in /sw/etc/fink.conf (see also the <a href="<?php print $root; ?>faq/usage-fink.php#unstable">FAQ</a>)
	 will give you access to the latest versions of packages, many of which include important
	 fixes for 10.2.
	</p>
    <p>
     As of now, please do not email us asking about 10.2 support. If you can't wait,
     consult the <a href="<?php print $root; ?>lists/index.php">mailing list archives</a> instead.
    </p>
  <a name="2002-08-06 Fink package manager 0.10.0 released"><span class="news_date">2002-08-06: </span><span class="news_headline">Fink package manager 0.10.0 released</span></a><?php gray_line(); ?>
    <p>
      Yesterday version 0.10.0 of the Fink package manager was released to the unstable tree, along with version 1.6 of the base-files package. All Fink users which are using the unstable tree are recommended to update to this version. The easiest way to do so usually is to run 'fink selfupdate-cvs' which will automatically take care of updating these essential packages.
    </p>
    <p>
      Please report any problems you encounter with this version via our bug tracker.
    </p>
    <p>
      An overview of what changed since version 0.9.12 can be found <a href="<?php print $root; ?>http://sourceforge.net/project/shownotes.php?release_id=103599">here.</a>
    </p>
  <a name="2002-07-17 Binary distribution moves"><span class="news_date">2002-07-17: </span><span class="news_headline">Binary distribution moves</span></a><?php gray_line(); ?>
    <p>
      The Fink binary distribution has moved to a new location. All Fink users wishing to use the binary distribution will have to make sure they are using the new binary distribution (many of you already are using it, maybe without even noticing). If you want to know how to switch and why we do this, <a href="<?php print $root; ?>news/bindist_move.php">read more here.</a>.
    </p>
  <a name="2002-05-29 KDE support"><span class="news_date">2002-05-29: </span><span class="news_headline">KDE support</span></a><?php gray_line(); ?>
    <p>
      Fink <a href="<?php print $root; ?>news/kde.php">announces support</a> for <a href="http://www.kde.org">KDE</a>. Packages are available in the unstable distribution, as well as pre-built binaries. For more information on installing and running it, see the full <a href="<?php print $root; ?>news/kde.php">KDE Support In Fink</a> announcement. 
    </p>
  <a name="2002-05-03 Bug in passwd package"><span class="news_date">2002-05-03: </span><span class="news_headline">Bug in passwd package</span></a><?php gray_line(); ?>
    <p>
      All Fink users are urged to update their <b> passwd </b> package to version 20020329 or newer. Older versions of the <b> passwd </b> package are affected by a bug which could lead to the loss of all data on your hard disk if you remove system users created by Fink manually from the system via System Preferences. (Removing them via the NetInfo tool is safe.) You can check the version of your passwd package by entering <b> dpkg -s passwd</b>. If your version is oudated, you can update to the current one in two ways: 
    </p>
    <ul>
      <li>
        Via the binary distribution. First make sure you have the latest list of packages available: <b> sudo apt-get update</b>. Then you can perform the actual update: <b> sudo apt-get install passwd</b>. 
      </li>
      <li>
        Via the source distribution. First make sure you have the latest set of package descriptions: <b> fink selfupdate-cvs</b>. Then, update the passwd package: <b> fink update passwd</b> 
      </li>
    </ul>
    <p>
      See <a href="<?php print $root; ?>faq/usage-general.php#passwd">Fink's FAQ, question 6.3,</a> for more information about the passwd package. 
    </p>
  <a name="2002-04-18 Fink 0.4.0 released"><span class="news_date">2002-04-18: </span><span class="news_headline">Fink 0.4.0 released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, as well as many of the binary packages. As usual, the rest of the binaries will be made available during the next few days. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
    </p>
  <a name="2002-01-16 Fink 0.3.2a is released"><span class="news_date">2002-01-16: </span><span class="news_headline">Fink 0.3.2a is released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2002-01-09 Fink 0.3.2 is released"><span class="news_date">2002-01-09: </span><span class="news_headline">Fink 0.3.2 is released</span></a><?php gray_line(); ?>
    <p>
      The source release is available now, the binary installer will follow soon. The bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2002-01-08 Binary distribution lost"><span class="news_date">2002-01-08: </span><span class="news_headline">Binary distribution lost</span></a><?php gray_line(); ?>
    <p>
      Due to a faulty script, the whole fink website, including our binary distro, has been wiped! This means you can't use the binary distro right now. I am working as quick as I can on uploading the new Fink 0.3.2 binary distro. In addition, the package database is not working for now. Please bear with us. 
    </p>
  <a name="2001-12-16 Yes, we are alive!"><span class="news_date">2001-12-16: </span><span class="news_headline">Yes, we are alive!</span></a><?php gray_line(); ?>
    <p>
      Despite the fact that no news were listed here for over a month, the fink project was quite busy in the recent time. Sadly, our leader, Christoph, left us last month. But despite this, development is going on actively. 
    </p>
    <p>
      Version 0.9.5 of the Fink package manager was recently released, and many updated and new packages are in our <a href="<?php print $root; ?>doc/cvsaccess/index.php">CVS</a>. 
    </p>
  <a name="2001-11-04 Fink 0.3.1 is released"><span class="news_date">2001-11-04: </span><span class="news_headline">Fink 0.3.1 is released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the recently updated <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2001-11-02 Running X11 document updated"><span class="news_date">2001-11-02: </span><span class="news_headline">Running X11 document updated</span></a><?php gray_line(); ?>
    <p>
      The <a href="<?php print $root; ?>doc/x11/index.php">Running X11</a> document has had a significant update. The troubleshooting section now has a comprehensive list of XDarwin error messages with explanations. 
    </p>
  <a name="2001-10-31" /><span class="news_date">2001-10-31</span></a><?php gray_line(); ?>
    <p>
      <a href="http://www.macosxhints.com/">MacOSXHints</a> has
      posted an <a href="http://homepage.mac.com/rgriff/xdarwin.html">
      installation guide</a> for XFree86, Fink, Window Maker and The GIMP.
    </p>
  <a name="2001-10-23 forked.net"><span class="news_date">2001-10-23: </span><span class="news_headline">forked.net</span></a><?php gray_line(); ?>
    <p>
      In addition to ripping off Fink packages and breaking the GPL, the ports
      collection at <a href="http://macosx.forked.net/">forked.net
      </a> has just gone commercial. More details soon. 
    </p>
  <a name="2001-10-03 Binary distribution complete"><span class="news_date">2001-10-03: </span><span class="news_headline">Binary distribution complete</span></a><?php gray_line(); ?>
    <p>The binary distribution update is now complete.
    The <a href="<?php print $root; ?>news/puma.php">10.1 compatibility report</a> has been
    updated to reflect the fixes in Fink 0.3.0.
    </p>
  <a name="2001-09-30 Fink 0.3.0 is released"><span class="news_date">2001-09-30: </span><span class="news_headline">Fink 0.3.0 is released</span></a><?php gray_line(); ?>
    <p>The source release, the binary installer and a binary upgrade kit for
    broken-by-10.1 installations are available in the new <a href="<?php print $root; ?>download/index.php">download section</a>.
    The bulk of the binary distribution will be updated gradually over the
    next few days, as usual.
    </p>
  <a name="2001-09-26 Mac OS X 10.1 released"><span class="news_date">2001-09-26: </span><span class="news_headline">Mac OS X 10.1 released</span></a><?php gray_line(); ?>
    <p>Mac OS X 10.1 has been officially released yesterday. Before you use Fink
    on 10.1, check out the <a href="<?php print $root; ?>news/puma.php">compatibility report</a>.
    <b>Update:</b> The apt-get issue has been solved, expect a new release
    this weekend.
    </p>
  <a name="2001-09-07 Binary distribution fully updated"><span class="news_date">2001-09-07: </span><span class="news_headline">Binary distribution fully updated</span></a><?php gray_line(); ?>
    <p>The binary distribution is now fully updated to
    Fink 0.2.6. Enjoy.
    </p>
  <a name="2001-09-04 Fink 0.2.6 is released"><span class="news_date">2001-09-04: </span><span class="news_headline">Fink 0.2.6 is released</span></a><?php gray_line(); ?>
    <p>Fink 0.2.6 is released, fixing several bootstrap problems. The source
    release is available from the <a href="<?php print $root; ?>download.php">download page</a>
    or via the 'fink selfupdate' command. The binary release will follow soon.
    </p>
 <a name="2001-09-02 Fink IRC Channel"><span class="news_date">2001-09-02: </span><span class="news_headline">Fink IRC Channel</span></a><?php gray_line(); ?>
    <p>Chat with the developers and other users! We now have a #fink channel
    on the <a href="http://openprojects.net/">openprojects.net</a>
    IRC network.
    </p>
 <a name="2001-08-25 Fink 0.2.5 was released"><span class="news_date">2001-08-25: </span><span class="news_headline">Fink 0.2.5 was released</span></a><?php gray_line(); ?>
    <p>The source release is
    available from the <a href="<?php print $root; ?>download.php">download page</a>, the
    binary release will follow soon.
    </p>
  <a name="2001-08-23 OpenOSX.com"><span class="news_date">2001-08-23: </span><span class="news_headline">OpenOSX.com</span></a><?php gray_line(); ?>
    <p>OpenOSX.com refuses to give fair credit after using Fink to create GIMP
    CDs. Read Christoph's <a href="<?php print $root; ?>pr/openosx.php">public statement</a>
    on the issue.
    </p>
 <a name="2001-08-22 New help page"><span class="news_date">2001-08-22: </span><span class="news_headline">New help page</span></a><?php gray_line(); ?>
    <p>The new <a href="<?php print $root; ?>help/index.php">help page</a> lists various ways
    to get help using Fink. It also lists some ideas how you can give back to
    the project.
    </p>
  <a name="2001-08-13 Porting tips and X11 document updated"><span class="news_date">2001-08-13: </span><span class="news_headline">Porting tips and X11 document updated</span></a><?php gray_line(); ?>
    <p>The <a href="<?php print $root; ?>doc/porting/index.php">porting tips</a> document has
    a new chapter on shared libraries and modules. The <a href="<?php print $root; ?>doc/x11/index.php">X11</a> document was also updated recently.
    </p>
  <a name="2001-08-01 Version 0.2.4a is released"><span class="news_date">2001-08-01: </span><span class="news_headline">Version 0.2.4a is released</span></a><?php gray_line(); ?>
    <p>There was a bootstrapping problem in Fink 0.2.4. It is fixed in Fink
    0.2.4a. You only need this if you're doing a first time install, updates
    are not affected.
    </p>
  <a name="2001-08-01 Version 0.2.4 is released"><span class="news_date">2001-08-01: </span><span class="news_headline">Version 0.2.4 is released</span></a><?php gray_line(); ?>
    <p>Version 0.2.4 is released. Get it from the <a href="<?php print $root; ?>download.php">download page</a>. Some highlights: The GIMP
    1.2.2, sound playback and recording via esound (thanks to Shawn Hsiao
    and Masanori Sekino for the CoreAudio patch), xmms 1.2.5.
    </p>
  <a name="2001-07-19 New document: X11 on Darwin and Mac OS X"><span class="news_date">2001-07-19: </span><span class="news_headline">New document: X11 on Darwin and Mac OS X</span></a><?php gray_line(); ?>
    <p>A comprehensive document about <a href="<?php print $root; ?>doc/x11/index.php">X11 on
    Darwin and Mac OS X</a> is now available. It was written to be useful
    for anyone, not just Fink users.
    </p>
  <a name="2001-07-13 Package database now online"><span class="news_date">2001-07-13: </span><span class="news_headline">Package database now online</span></a><?php gray_line(); ?>
    <p>A prototype of the <a href="<?php print $root; ?>pdb/index.php">package database</a>
    is now online.
    </p>
  <a name="2001-07-09 Version 0.2.3 is released"><span class="news_date">2001-07-09: </span><span class="news_headline">Version 0.2.3 is released</span></a><?php gray_line(); ?>
    <p>Get it from the <a href="<?php print $root; ?>download.php">download page</a>. This
    version fixes the dpkg download problems many of you were having.
    </p>
  <a name="2001-07-03 Packaging Manual updated"><span class="news_date">2001-07-03: </span><span class="news_headline">Packaging Manual updated</span></a><?php gray_line(); ?>
    <p>The <a href="<?php print $root; ?>doc/packaging/index.php">Packaging Manual</a> was
    updated to include all recently added fields.
    </p>
  <a name="2001-06-30 Web site restructuring"><span class="news_date">2001-06-30: </span><span class="news_headline">Web site restructuring</span></a><?php gray_line(); ?>
    <p>A major restructuring of the web site has started. The non-Fink-specific
    documents were removed because I don't have the time to maintain them. All
    documentation will be consolidated in the new <a href="<?php print $root; ?>doc/index.php">
    Documentation section</a>.
    </p>
  <a name="2001-06-24 Version 0.2.2 is released"><span class="news_date">2001-06-24: </span><span class="news_headline">Version 0.2.2 is released</span></a><?php gray_line(); ?>
    <p>Version 0.2.2 is finally released. Get it from the <a href="<?php print $root; ?>download.php">download page</a>. Be sure to read the notes
    about X11 in the INSTALL file.
    </p>
  <a name="2001-05-19 CVS instructions updated"><span class="news_date">2001-05-19: </span><span class="news_headline">CVS instructions updated</span></a><?php gray_line(); ?>
    <p>The <a href="<?php print $root; ?>fink/cvs.php">CVS instructions</a> have
    been updated for Fink 0.2.x.
    </p>
  <a name="2001-04-26 FAQ online"><span class="news_date">2001-04-26: </span><span class="news_headline">FAQ online</span></a><?php gray_line(); ?>
    <p>
      This site now sports a <a href="<?php print $root; ?>faq/index.php">FAQ section</a>. Not much content yet, but it's here to stay. 
    </p>
  <a name="2001-04-20 Version 0.2.0 is released"><span class="news_date">2001-04-20: </span><span class="news_headline">Version 0.2.0 is released</span></a><?php gray_line(); ?>
    <p>
      It now uses dpkg for binary package management. You can get it from the download page, but be aware that this version is not yet as stable as the 0.1.x series. 
    </p>
  <a name="2001-04-15 Released version 0.1.8a"><span class="news_date">2001-04-15: </span><span class="news_headline">Released version 0.1.8a</span></a><?php gray_line(); ?>
    <p>
      Released version 0.1.8a, fixing install problems. You only need this if you downloaded 0.1.8 and had install problems (&quot;stow not found&quot;). Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
  <a name="2001-04-14 Version 0.1.8 is out"><span class="news_date">2001-04-14: </span><span class="news_headline">Version 0.1.8 is out</span></a><?php gray_line(); ?>
    <p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
  <a name="2001-03-30 Porting notes updated"><span class="news_date">2001-03-30: </span><span class="news_headline">Porting notes updated</span></a><?php gray_line(); ?>
    <p>
      The <a href="<?php print $root; ?>darwin/porting.php">porting notes</a> have been updated with information on Mac OS X Final. 
    </p>
  <a name="2001-03-30 Version 0.1.7 is out!"><span class="news_date">2001-03-30: </span><span class="news_headline">Version 0.1.7 is out!</span></a><?php gray_line(); ?>
    <p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
  <a name="2001-03-24 Mac OS X is released!"><span class="news_date">2001-03-24: </span><span class="news_headline">Mac OS X is released!</span></a><?php gray_line(); ?>
    <p>
      Expect Fink packages to be adapted to the final release within the next one or two weeks. 
    </p>
  <a name="2001-03-15 Libtool page updated"><span class="news_date">2001-03-15: </span><span class="news_headline">Libtool page updated</span></a><?php gray_line(); ?>
    <p>
      Updated the <a href="<?php print $root; ?>darwin/libtool.php">libtool page</a> with a revised patch that does full shared library versioning. 
    </p>
  <a name="2001-03-08 Version 0.1.6 is out"><span class="news_date">2001-03-08: </span><span class="news_headline">Version 0.1.6 is out</span></a><?php gray_line(); ?>
    <p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
  


<?
include "footer.inc";
?>

