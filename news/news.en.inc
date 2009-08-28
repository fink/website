<a name="2009-08-28%20Fink%20on%2010.6."><span class="news-date">2009-08-28: </span><span class="news-headline">Fink on 10.6.</span></a><?php gray_line(); ?>
      <p>
Fink is ready to be used on Snow Leopard (OS X v. 10.6).  Users will
need to choose between a 32-bit version of fink and a 64-bit version of fink
for 10.6.
The 32-bit version has more packages available at the present time, but
the 64-bit version represents the future direction for OS X and for fink;
individual users must make this decision on their own.  It will <b>not</b>
be possible to "upgrade" from 32-bit to 64-bit (or vice versa), without
completely reinstalling fink.
</p><p>
At the moment, two methods are available for installing Fink on Snow Leopard.
A binary installer is not available, so it is important to
<b>first install XCode from the Optional Installs folder on the Snow
Leopard disk.</b>
Users wanting the 64-bit version, or users upgrading directly from 10.4 or
earlier, must bootstrap fink from the distribution tarball (version
0.29.9 or later), available at <a href="<?php print $root; ?>http://sourceforge.net/projects/fink/files/fink/0.29.8/fink-0.29.8.tar.gz/download">sourceforge.net</a>; installation instructions are
<a href="<?php print $root; ?>download/srcdist.php">here</a>.
On the other hand, users can upgrade directly from
10.5 to the 32-bit version, following the instructions below.
(One warning: users who have installed a development version of fink
from CVS rather than a released version may encounter trouble; please
downgrade your fink to a released version, and remove stray .deb files
of higher versions, before beginning.)
</p><p>
To upgrade, follow a four step process.
<b>Step 1:</b> edit the file <code>/sw/etc/fink.conf</code>,
adding a line to it which reads <code>NoAutoIndex: true</code>  (You may
need to use <code>sudo</code> to obtain the correct permissions to edit
this file.)  <b>Step 2:</b> 
run the command <code>fink reinstall fink</code> in
order to tell fink that you are now on 10.6.  (If you encounter a message
about package database corruption, run <code>fink index -f</code> and
try this step again.)  <b>Step 3:</b> 
run the command <code>fink update
fink</code> to get the latest fink for 10.6.  <b>Step 4:</b> run the command
<code>fink install perl588-core</code> to replace the version of perl
which Apple changed during the OS X upgrade, in case you have 
fink packages which depend on it.
</p><p>After the upgrade, you may wish to run <code>fink configure</code>
to do some cleanup.
</p><p>Almost all of the packages in fink's stable tree will compile on
10.6, but be warned that only a fraction of the 10.5 packages are currently
available for 10.6.  In the near future, fink's package database will be
updated to include information about packages for 10.6; you can check there
to see if your favorite package is ready.
</p>
<a name="2009-07-25%20Fink%20Core%20Group%20changes."><span class="news-date">2009-07-25: </span><span class="news-headline">Fink Core Group changes.</span></a><?php gray_line(); ?>
      <p>
The Fink Core Group announces two new members: Alexander Hansen (<b>akh</b>)
and Augusto Devegili (<b>monipol</b>), both of whom have been very active
in fink.  Please join us in welcoming the new members!
</p><p>
The Group also announces that Christian Schaffner has stepped down,
returning to "ordinary member" status.  We thank Christian for his help
on the team over the past several years.
</p><p>
Members of the Fink project are working hard to provide user support,
to keep Fink up to date, and to prepare for the upcoming Snow Leopard
release.  More volunteers are always needed, so please consider
getting involved at some level!
</p>
<a name="2008-07-23%20End%20of%2010.3%20support."><span class="news-date">2008-07-23: </span><span class="news-headline">End of 10.3 support.</span></a><?php gray_line(); ?>
      <p>
The Fink project is no longer able to offer support for users of Fink
on Mac OS X 10.3. In reality there has been very little support for
some time, so this announcement simply formalizes that fact.
</p><p>
This means that there will not be any further updates, not even
security updates, for Mac OS X 10.3 users. Their existing
installations will continue to work, but the software that is
installed will not be updated.
</p><p>
We believe that the majority of our users are using Mac OS X 10.4 or
10.5 and hope that this does not inconvenience too many people. 
</p>

