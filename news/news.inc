<span class="news_date">2002-10=30: </span><span class="news_headline">Don't reuse binary installer</span><?php gray_line(); ?>
  <p>
  Users are cautioned to use the binary installer for Fink 0.4.1 <b>only
once</b> on a given machine.  Due to an apparent bug in Apple's
Installer.app program, attempting a second installation on the same
machine can result in permissions being altered in the machine's root
directory, in some cases leaving the machine in a non-bootable state.
</p><p> If Installer.app presents you with an &quot;Upgrade&quot; button rather
than an &quot;Install&quot; button when installing Fink 0.4.1, <b>do not proceed
any further!</b> </p>
<p>A new version of the binary installer for Fink 0.4.1 is being tested
which will avoid the problem of the machine not booting, but even
once the new version is available users are advised to only &quot;Install&quot;,
not &quot;Upgrade.&quot;
</p><span class="news_date">2002-09-28: </span><span class="news_headline">Fink 0.4.1 released</span><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
    </p>
    <p>
    This is the <b>last release for Mac OS X 10.1</b>. Future versions of Fink will <b>not</b> officially support Mac OS X 10.1 anymore, we are gearing all our efforts towards 10.2.
    </p>
    <p>
    At the same time, this release is not meant for Mac OS X 10.2. Fink 0.5.0. which is targeted for October, will be geared towards 10.2. In the meantime refer to the news item below on how to upgrade Fink for 10.2.
    </p>
  <span class="news_date">2002-09-27: </span><span class="news_headline">Possible conflicts with anti-virus software</span><?php gray_line(); ?>
<p> A number of recent reports on the 
<a href="<?php print $root; ?>http://www.mail-archive.com/fink-users@lists.sourceforge.net/">fink-users
mailing list</a> have indicated problems (including kernel panics and
infinite hangs during patching) when using Fink to compile packages while
anti-virus software is installed.  You may need to switch off any anti-virus
software before using Fink.
</p>
