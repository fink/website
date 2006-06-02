<a name="2006-05-10%20CVS%20Troubles"><span class="news-date">2006-05-10: </span><span class="news-headline">CVS Troubles</span></a><?php gray_line(); ?>
      <p>
As many Fink users are aware, the Fink CVS repository at sourceforge.net
has not been fully functional since March 30.  The anonymous CVS access
has not been updated since then, and as of several days ago, the developers
are also unable to update CVS in any form.
</p><p>
As we understand the current plans of sourceforge's staff (outlined
briefly on their <a href="http://sourceforge.net/docman/display_doc.php?docid=2352&amp;group_id=1">site
status page</a>), the old CVS servers will never be brought back in
their current form.  This is likely to mean disruption for fink users,
but at present, we cannot say what form this disruption will take.
</p><p>
Our current advice to fink users is to switch to the 'rsync' method of
updating (by running the command 'fink selfupdate-rsync').  This will at
least give you a fink installation which is current up through May 7.
If a full update to the new CVS situation turns out to be impossible
via fink's normal selfupdate command, we will post instructions here
on how to update when they become available.
</p>
<p>Update 5/24/06: CVS is now functioning again, and users using the rsync
method of selfupdating are getting up-to-date content.  If you are using
the cvs method, and can't (or don't wish to) switch to rsync, you should
download the file <code>fink-mirrors-0.24.15.2.tar.gz</code> from <a href="http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=69685">the
Sourceforge file release page</a>, expand the file, and run the command
<code>./inject.pl</code> from within the <code>fink-mirrors-0.24.15.2</code> directory.  After this has been done, the <code>fink selfupdate</code> command
should again work normally.
</p>
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

