<?
$title = "News";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/05/30 21:21:02';

$metatags = '';

include "header.inc";
?>

<span class="news_date">2002-05-30: </span><span class="news_headline">New news system active!</span><?php gray_line(); ?>
    <p>
      The new news system is now active! Enjoy. 
    </p>
  <span class="news_date">2002-05-29: </span><span class="news_headline">KDE support</span><?php gray_line(); ?>
    <p>
      Fink <a href="<?php print $root; ?>news/kde.php">announces support</a> for <a href="http://www.kde.org">KDE</a>. Packages are available in the unstable distribution, as well as pre-built binaries. For more information on installing and running it, see the full <a href="<?php print $root; ?>news/kde.php">KDE Support In Fink</a> announcement. 
    </p>
  <span class="news_date">2002-05-03: </span><span class="news_headline">Bug in passwd package</span><?php gray_line(); ?>
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
  <span class="news_date">2002-04-18: </span><span class="news_headline">Fink 0.4.0 released</span><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, as well as many of the binary packages. As usual, the rest of the binaries will be made available during the next few days. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
    </p>
  <span class="news_date">2002-01-16: </span><span class="news_headline">Fink 0.3.2a is released</span><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <span class="news_date">2002-01-09: </span><span class="news_headline">Fink 0.3.2 is released</span><?php gray_line(); ?>
    <p>
      The source release is available now, the binary installer will follow soon. The bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <span class="news_date">2002-01-08</span><?php gray_line(); ?>
    <p>
      Due to a faulty script, the whole fink website, including our binary distro, has been wiped! This means you can't use the binary distro right now. I am working as quick as I can on uploading the new Fink 0.3.2 binary distro. In addition, the package database is not working for now. Please bear with us. 
    </p>
  <span class="news_date">2001-12-16: </span><span class="news_headline">Yes, we are alive!</span><?php gray_line(); ?>
    <p>
      Despite the fact that no news were listed here for over a month, the fink project was quite busy in the recent time. Sadly, our leader, Christoph, left us last month. But despite this, development is going on actively. 
    </p>
    <p>
      Version 0.9.5 of the Fink package manager was recently released, and many updated and new packages are in our <a href="<?php print $root; ?>doc/cvsaccess/index.php">CVS</a>. 
    </p>
  <span class="news_date">2001-11-04: </span><span class="news_headline">Fink 0.3.1 is released</span><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the recently updated <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <span class="news_date">2001-11-02</span><?php gray_line(); ?>
    <p>
      The <a href="<?php print $root; ?>doc/x11/index.php">Running X11</a> document has had a significant update. The troubleshooting section now has a comprehensive list of XDarwin error messages with explanations. 
    </p>
  <span class="news_date">2001-10-31</span><?php gray_line(); ?>
    <p>
      <a href="http://www.macosxhints.com/">MacOSXHints</a> has posted an <a href="http://homepage.mac.com/rgriff/xdarwin.html">installation guide</a> for XFree86, Fink, Window Maker and The GIMP. 
    </p>
  <span class="news_date">2001-10-23</span><?php gray_line(); ?>
    <p>
      In addition to ripping off Fink packages and breaking the GPL, the ports collection at <a href="http://macosx.forked.net/">forked.net</a> has just gone commercial. More details soon. 
    </p>
  <span class="news_date">2001-10-03</span><?php gray_line(); ?>
    <p>
      The binary distribution update is now complete. The <a href="<?php print $root; ?>news/puma.php">10.1 compatibility report</a> has been updated to reflect the fixes in Fink 0.3.0. 
    </p>
  <span class="news_date">2001-09-30: </span><span class="news_headline">Fink 0.3.0 is released</span><?php gray_line(); ?>
    <p>
      The source release, the binary installer and a binary upgrade kit for broken-by-10.1 installations are available in the new <a href="<?php print $root; ?>download/index.php">download section</a>. The bulk of the binary distribution will be updated gradually over the next few days, as usual. 
    </p>
  <span class="news_date">2001-04-26</span><?php gray_line(); ?>
    <p>
      This site now sports a <a href="<?php print $root; ?>faq/index.php">FAQ section</a>. Not much content yet, but it's here to stay. 
    </p>
  <span class="news_date">2001-04-20: </span><span class="news_headline">Version 0.2.0 is released</span><?php gray_line(); ?>
    <p>
      It now uses dpkg for binary package management. You can get it from the download page, but be aware that this version is not yet as stable as the 0.1.x series. 
    </p>
  <span class="news_date">2001-04-15: </span><span class="news_headline">Released version 0.1.8a</span><?php gray_line(); ?>
    <p>
      Released version 0.1.8a, fixing install problems. You only need this if you downloaded 0.1.8 and had install problems (&quot;stow not found&quot;). Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
  <span class="news_date">2001-04-14: </span><span class="news_headline">Version 0.1.8 is out</span><?php gray_line(); ?>
    <p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
  <span class="news_date">2001-03-30: </span><span class="news_headline">Porting notes updated; Version 0.1.7 is out!</span><?php gray_line(); ?>
    <p>
      The <a href="<?php print $root; ?>darwin/porting.php">porting notes</a> have been updated with information on Mac OS X Final. 
    </p>
    <p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
  <span class="news_date">2001-03-24: </span><span class="news_headline">Mac OS X is released!</span><?php gray_line(); ?>
    <p>
      Expect Fink packages to be adapted to the final release within the next one or two weeks. 
    </p>
  <span class="news_date">2001-03-15: </span><span class="news_headline">Libtool page updated</span><?php gray_line(); ?>
    <p>
      Updated the <a href="<?php print $root; ?>darwin/libtool.php">libtool page</a> with a revised patch that does full shared library versioning. 
    </p>
  <span class="news_date">2001-03-08: </span><span class="news_headline">Version 0.1.6 is out</span><?php gray_line(); ?>
    <p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
  


<?
include "footer.inc";
?>

