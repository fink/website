<a name="2003-11-17 Fink 0.6.2 released"><span class="news-date">2003-11-17: </span><span class="news-headline">Fink 0.6.2 released</span></a><?php gray_line(); ?>
        <p>The latest Fink release, version 0.6.2, is now available
for both source and binary users.  This is a bug-fix release, intended
to address two problems: the dselect/user deletion bug, and a 
problem with ownership of files.  The dselect bug was addressed by
updating the fink, dpkg, and apt packages.  After updating to 0.6.2,
it is safe to once again use dselect.  However, if you ran dselect
at any time since 0.6.0, you should carefully check the integrity
of the file at <code>/sw/etc/apt/sources.list</code>.  If you have
any doubts about this file, you should replace it with
<a href="<?php print $root; ?>files/sources.list">the default sources.list file</a>.
</p>
<p>Users who have installed binary files from the 0.6.1 distribution
may find that certain files in their Fink installation are owned
by UID 2011 rather than by root.  To correct this problem,
run the command:</p>
<pre>sudo find /sw/ -user 2011 -exec chown root:admin {} \;</pre>
<p>This release, like the previous one, was built on OS X 10.2
using the gcc 3.3 compiler, and runs fine with some exceptions* on OS X 10.3.  Most Fink 
users who upgrade to 10.3 will continue to
want to only use the binaries from this
new distribution for now, while the Fink team continues to modify
Fink packages for 10.3.
</p>
<p>*Exceptions include: emacs, qt.
</p>
	<a name="2003-11-04 User Deletion Bug/ Dselect Troubles"><span class="news-date">2003-11-04: </span><span class="news-headline">User Deletion Bug/ Dselect Troubles</span></a><?php gray_line(); ?>
<p><b>Quick Summary: DO NOT USE DSELECT,</b> and if you've used it,
check your /sw/etc/apt/sources.list file carefully.</p>
		<p>Users who have bootstrapped or installed Fink 0.5.3 or Fink 0.6.0
		on Mac OS X 10.3 could exhibit a problem where all users get deleted
		from the netinfo database, and you become unable to log in.
We believe that this problem can only occur if you've used dselect.</p>
		<p>If you are using Mac OS X 10.3, please be sure you're using the
		latest Fink version to avoid the issue.  To make sure you don't have
		upgrade problems, check your <code>/sw/etc/apt/sources.list</code>
		file.  You will need to modify it if it contains <code>deb</code>
		lines that point to "release" or "current" without a version number.
		In other words, if your <code>sources.list</code> file contains
		these lines:</p>
		<pre>deb http://us.dl.sourceforge.net/fink/direct_download release main
deb http://us.dl.sourceforge.net/fink/direct_download current main</pre>
		<p>...you should change them to this:</p>
		<pre>deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main</pre>
		<p>We are working on updating the repository to make sure that even
		if you update you don't get the broken code, and to
repair dselect, but in the meantime,
		make sure your <code>sources.list</code> file has the correct entries.</p>
<p>Other users have experienced problems with dselect itself, particularly
complaints about a missing "darwin" package.  If you are running dselect
under 10.3 and you <b>don't</b> get this warning, then your 
<code>sources.list</code> file is likely to be corrupted and you should
repair it as above.
</p>
	<a name="2003-11-01 Fink 0.6.1 released"><span class="news-date">2003-11-01: </span><span class="news-headline">Fink 0.6.1 released</span></a><?php gray_line(); ?>
        <p>The latest Fink release, version 0.6.1, is now available
for both source and binary users.  This release was built on OS X 10.2
using the gcc 3.3 compiler, and runs well on OS X 10.3.  Most Fink
users who upgrade to 10.3 will want to only use the binaries from this
new distribution for now, while the Fink team continues to modify
Fink packages for 10.3.
</p><p>
If you wish to access the 
new binaries, use apt-get, dselect, or the binary mode of
FinkCommander.  Unless you are interested in helping the Fink team
to test packages which are compiled on 10.3, 
do not use the command-line <code>fink</code> program to do your
installations for the
next few weeks.
</p>
<p>The simplest way to upgrade a binary installation is to run
"sudo apt-get update".  Further details and
other issues related to upgrading Fink to 10.3 are addressed on the
<a href="<?php print $root; ?>download/10.3-upgrade.php">Special 10.3 upgrade page.</a>
</p><p>
Before using the latest version of
the command-line <code>fink</code> program 
under OS X 10.2, be sure to install the August2003gccUpdater, available
after free registration from connect.apple.com.
</p>
                
