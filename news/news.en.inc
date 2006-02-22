<a name="2006-02-21 Preliminary version of Fink on Intel"><span class="news-date">2006-02-21: </span><span class="news-headline">Preliminary version of Fink on Intel</span></a><?php gray_line(); ?>
<p>
A preliminary version of Fink for the Intel architecture is now ready.
No binary packages are available, and things are still rough around
the edges, but it should be usable if you are patient!
</p>
<p>
To install, you need to get the file <code>fink-0.24.12.tar.gz</code>
from <a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043">the
Sourceforge file release page for Fink</a>, expand the file, and
run the command <code>./bootstrap.sh</code> .  At the end of the
bootstrap process, run <code>fink selfupdate</code> and you'll get
the currently available packages.
</p>
<p>
At last check, there were about 1750 packages in the "stable" tree, but
about 150 of those did not build.  When things are truly stable, another
annoucement will be made here.
</p>
<a name="2006-01-10 Fink ready for XCode 2.2 (but not for Intel)."><span class="news-date">2006-01-10: </span><span class="news-headline">Fink ready for XCode 2.2 (but not for Intel).</span></a><?php gray_line(); ?>
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
<a name="2005-11-16 XCode 2.2 (10.4 only)."><span class="news-date">2005-11-16: </span><span class="news-headline">XCode 2.2 (10.4 only).</span></a><?php gray_line(); ?>
<p>
The Fink team has had reports of some build problems with the XCode 2.2 compilers.  Until these are sorted out, we recommend that users hold off on upgrading XCode.
</p>
<p>
For those who have already installed XCode 2.2 and don't want to revert to 2.1, your participation in the effort to find packages that don't work and to fix them so that they do is welcomed!
</p>


