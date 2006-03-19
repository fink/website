<a name="2006-03-03%20Problem%20with%20Apple's%20latest%20Security%20Update"><span class="news-date">2006-03-03: </span><span class="news-headline">Problem with Apple's latest Security Update</span></a><?php gray_line(); ?>
      <p>
The Fink team has received reports of problems with the <code>rsync</code>
program which was modified by Apple's new Security Update 2006-001: for some
users, <code>fink selfupdate</code> fails to function after the Security
Update.  (The underlying cause appears to be a problem with the 
<code>--delete</code> option for <code>rsync</code>.)
</p>
      <p>
As a workaround, users can run <code>fink install rsync</code> to use
fink's rsync package rather than the Apple program.  Or, for those users
who need specific features of the Apple program (such as support for
Extended Attributes), another workaround is <code>fink selfupdate-cvs</code>
to switch from rsync to cvs updating.  
</p>
      <p>
This news item will be updated as the situation changes.
</p>
<p>Update 3/13/06: This has been resolved by security update 2006-002,
<a href="http://docs.info.apple.com/article.html?artnum=303453">according
to Apple's documentation</a>.
</p>
    <a name="2006-02-21%20Preliminary%20version%20of%20Fink%20on%20Intel"><span class="news-date">2006-02-21: </span><span class="news-headline">Preliminary version of Fink on Intel</span></a><?php gray_line(); ?>
<p>
A preliminary version of Fink for the Intel architecture is now ready.
No binary packages are available, and things are still rough around
the edges, but it should be usable if you are patient!
</p>
<p>
To install, you need to get the file <code>fink-0.24.12.tar.gz</code>
from <a href="http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043">the
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

