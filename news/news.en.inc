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

<a name="2005-04-29%20Fink%20and%20Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink and Tiger.</span></a><?php gray_line(); ?>
<p>
Fink can be used on OS X 10.4!  There are several ways you can update:
</p><ul>
<li>
A binary installer will be available within a few weeks, for binary-only
users.  In the meantime, new users should bootstrap fink 0.23.10, just
as stable users, below.
</li><li>
For users of the stable tree, we recommend that you delete your current
fink with <code>sudo rm -Rf /sw</code> and then "bootstrap" an
installation of fink-0.23.10 using
<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043&amp;release_id=326600">
fink-0.23.10.tar.gz</a>--download that file and expand it, 
eg. via
<code>tar -xvzf fink-0.23.10.tar.gz</code>.  After running the command
<code> ./bootstrap.sh </code> in the resulting
<code>fink-0.23.10</code> directory,
you'll need to run <code>fink selfupdate</code>
</li><li>
For users of the unstable tree, you may be able to upgrade just by running 
<code>fink selfupdate</code> if your version of fink is less than 0.24.6.  
It will install fink-0.24.6 for you.  After upgrading to 10.4, first check 
that you have the right version of fink by issuing <code>fink --version</code>
.  If your version is less than 0.24.6, run <code>fink selfupdate</code> to 
get the right version of fink.  Then, whether you selfupdated or not, 
reinstall the fink package using <code>fink rebuild fink</code>, 
and follow that with another <code>fink selfupdate</code>.
</li>
</ul>
<p>Not all packages are working yet under 10.4, but that situation will
improve over the next several weeks.  The stable tree contains substantially
fewer packages than in 10.3, but all of them should compile.
</p>
<p>Of course, some wrinkles still need to be ironed out.  We encourage 
users with mission-critical applications to check in on the mailing 
lists to verify whether anyone has had experience with the package in 
question before upgrading.</p>

<a name="2004-11-20%20Solution%20to%20gcc%20problems."><span class="news-date">2004-11-20: </span><span class="news-headline">Solution to gcc problems.</span></a><?php gray_line(); ?>
<p>
Apple has released the November 2004 gcc3 updater, available (upon free 
registration) at connect.apple.com.  This updater fixes the problems with
the gcc3 compiler in XCode 1.5.  If you are using XCode 1.5, you should 
install this updater.  (The updater will update correctly for users with
an untouched XCode 1.5, and also for users who installed the workaround which
the fink project had previously recommended.)
</p><p>
We would like to thank Apple for responding to our reports about this
matter, and working to resolve it as quickly as possible.
</p>



