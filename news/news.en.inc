<a name="2006-07-01%20July%20is%20%22Fink%20Update%20Month%22"><span class="news-date">2006-07-01: </span><span class="news-headline">July is "Fink Update Month"</span></a><?php gray_line(); ?>
      <p>
Fink users on PowerPC machines are advised to update their copies of
fink from the old "10.4-transitional" tree to the more recent "10.4"
tree.  We plan to discontinue the 10.4-transitional tree
by the end of July, 2006.
</p><p>
Some background: along with OS X 10.4 came a new version of the g++ compiler
(one of the workhorses of Fink), which produced code that was binary
incompatible with previous versions.  Fink, when using the 10.4-transitional 
tree, mixes the new gcc-4.0 compiler with the older g++-3.3 compiler.
This strategy gave us some extra time to make packages compatible with
g++-4.0.  The time has now come to complete that transition, and rely
exclusively on the newer tree.  The update, however, is slightly
complicated since all packages using or providing g++ libraries must
be rebuilt in the correct order.
</p><p>
If you are using OS X 10.4, you can
find out if you need to update your Fink installation
by running the command
<code>fink --version</code>.  If the Distribution version is 0.8.1.cvs
or 0.8.1.rsync, you do <b>not</b> need to update.  However, if the 
Distribution version is 0.8.0.cvs or 0.8.0.rsync, you should update,
as described below.
</p>
<p>
Many users will prefer to remove their fink installations and
start anew with the 0.8.1 installer.  Others will prefer to use the 
<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.3.tar.gz?download">10.4-update 
tarball (v. 0.3)</a> (around 12 MB), which includes 
precompiled versions of the basic fink packages as well as a script which
will attempt to update an existing fink installation.  Please consult
the README file which you will find within the 10.4-update directory 
(after unpacking the tarball) for further instructions.
</p>
<a name="2006-06-15%20New%20Fink%20release."><span class="news-date">2006-06-15: </span><span class="news-headline">New Fink release.</span></a><?php gray_line(); ?>
      <p>
A new Fink release for OS X 10.4 (Tiger) is 
<a href="<?php print $root; ?>download/index.php">available</a>
 today: version 0.8.1, which can be installed on either Intel or PowerPC
hardware.
The release includes source files, binary packages, and  Fink
installers for both kinds of hardware.
</p>
      <p>
Fink on the Intel platform is still considered "beta" quality, and a number of
packages (particularly packages in the "unstable" tree) either do not compile,
or compile but do not run.  Work to improve this situation is ongoing.
</p>
<p>
Fink users on PowerPC whose existing fink installation uses the 
10.4-transitional tree (from the 0.8.0 distribution) may upgrade in
one of two ways.  The upgrade process is problematic, due to the change
in ABI of g++ libraries which requires many libraries to be recompiled.
Many users will simply wish to remove their fink installations and
start anew with the 0.8.1 installer.  Others may wish to use the new
<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.3.tar.gz?download">10.4-update tarball (v. 0.3)</a> (around 12 MB), which includes 
precompiled versions of the basic fink packages as well as a script which
will attempt to update an existing fink installation.
</p>
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
    
