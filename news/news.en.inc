<a name="2006-01-10%20Fink%20ready%20for%20XCode%202.2%20(but%20not%20for%20Intel)."><span class="news-date">2006-01-10: </span><span class="news-headline">Fink ready for XCode 2.2 (but not for Intel).</span></a><?php gray_line(); ?>
<p>
Fink is now ready for XCode 2.2, with the exception of the openoffice.org 
packages (which are expected to function again when we switch to the 10.4
tree).  Users are encouraged to upgrade to XCode 2.2 whenever they wish;
XCode 2.2 will be required for running the 10.4 tree when it is released.
</p>
<p>
On the other hand, in spite of today's announcements from Apple, Fink is
not ready to run on Intel processors.  The Fink team hopes to have an
Intel-ready version of fink released within a few weeks; the Fink team does 
not advise early recipients of new iMacs to install Fink on them, but suggests
waiting until the new version of fink is ready.
</p>
<p>Fink package maintainers please take note of the new <code>Architecture</code> field, now documented in the packaging manual.
</p>
<a name="2005-11-16%20XCode%202.2%20(10.4%20only)."><span class="news-date">2005-11-16: </span><span class="news-headline">XCode 2.2 (10.4 only).</span></a><?php gray_line(); ?>
<p>
The Fink team has had reports of some build problems with the XCode 2.2 compilers.  Until these are sorted out, we recommend that users hold off on upgrading XCode.
</p>
<p>
For those who have already installed XCode 2.2 and don't want to revert to 2.1, your participation in the effort to find packages that don't work and to fix them so that they do is welcomed!
</p>

<a name="2005-06-09%20New%20Fink%20releases."><span class="news-date">2005-06-09: </span><span class="news-headline">New Fink releases.</span></a><?php gray_line(); ?>
<p>
Three new Fink releases are 
<a href="<?php print $root; ?>download/index.php">available</a>
 today: version 0.8.0 (for 10.4),
version 0.7.2 (for 10.3), and version 0.6.4 (for 10.2).
All three releases include source files, binary packages, and a Fink
installer for new users.
</p>
<p>
The new release for 10.4 includes all currently-available "stable" packages
in source and binary form: there are 1565 of these, which constitutes more
than 80% of the 1909 packages available in the 10.3 release.  Work continues
by the fink developers on bringing more of the stable packages to Tiger.
</p>
<p>
The new release for 10.2 will be the last official release for that
version of Mac OS X.  Although no further updates (not even security
updates) will be provided by the Fink team, we anticipate that the
0.6.4 release will be usable for years to come.
</p>
<p>
Users upgrading to 10.4 can now simply issue a 
<code>fink selfupdate</code> command, followed by
<code>sudo /sw/lib/fink/postinstall.pl</code> (for first-time updaters
on 10.4), <code>fink scanpackages</code> and <code>sudo apt-get update</code>.
We don't recommend bootstrapping at the moment, since bootstrapping does
not work with the newly-released XCode 2.1 from Apple.
</p>
<p>
Note added 6/19/05: If the Fink-0.8.0 binary installer complains that the
volume does not support symlinks, try launching Disk Utility (from the 
Utilities folder inside the Applications folder), selecting the 
problematic volume and clicking on "repair disk permissions."  Also, the installer requires you to have administrative privileges, so be sure that you're running it as such a user.
</p>
<p>Note added 6/30/05:  To avoid contamination with obsolete headers and the like, we recommend that people who want to build packages from source should perform a clean install of XCode via running the <code>/Developer/Tools/uninstall-devtools.pl</code> script.  For best results, you may want to do this before updating your OS.</p>

