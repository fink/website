<span class="news_date">2002-09-08: </span><span class="news_headline">Test version of Jaguar updater available</span><?php gray_line(); ?>
  <p> A test version of the 10.2 updater for Fink is now available.
The update process is somewhat complicated at the moment, but is
explained in  <a href="<?php print $root; ?>news/jaguar.php">step-by-step instructions
for updating</a>.
We also have separate <a href="<?php print $root; ?>news/jag-bootstrap.php">instructions
to install Fink from scratch on 10.2</a>.
</p><p> At the moment, approximately 800 out of 1150 Fink packages have
been made ready for 10.2.  However, virtually all of these packages are
still being tested and have not yet been moved to the &quot;stable&quot; tree in
the 10.2 section; moreover, binaries for 10.2 packages are not yet available.
</p><span class="news_date">2002-08-20: </span><span class="news_headline">Mac OS X 10.2 / Jaguar</span><?php gray_line(); ?>
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
  <span class="news_date">2002-08-06: </span><span class="news_headline">Fink package manager 0.10.0 released</span><?php gray_line(); ?>
    <p>
      Yesterday version 0.10.0 of the Fink package manager was released to the unstable tree, along with version 1.6 of the base-files package. All Fink users which are using the unstable tree are recommended to update to this version. The easiest way to do so usually is to run 'fink selfupdate-cvs' which will automatically take care of updating these essential packages.
    </p>
    <p>
      Please report any problems you encounter with this version via our bug tracker.
    </p>
    <p>
      An overview of what changed since version 0.9.12 can be found <a href="<?php print $root; ?>http://sourceforge.net/project/shownotes.php?release_id=103599">here.</a>
    </p>
  
