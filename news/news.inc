<a name="2004-09-20 Fink 0.7.1 released."><span class="news-date">2004-09-20: </span><span class="news-headline">Fink 0.7.1 released.</span></a><?php gray_line(); ?>
<p>
The latest Fink release, version 0.7.1 (for 10.3),
is now available for both source and binary users. This release is meant for Panther (10.3)  based
Mac OS X versions.  The 0.6.3 release remains available for Jaguar (10.2) based Mac OS X versions. 
</p>

<p>
This new release incorporates various fixes to the package manager, 
and many previously
unavailable binary packages have been added resulting in a total of 1650 binary packages. This includes
binaries for KDE 3.1.4 and GNOME 2.4.
</p>

<p>
To complete a new Fink installation you should follow the instructions posted
<a href="<?php print $root; ?>download/index.php">here</a>.
You may upgrade your existing Fink to the latest Fink using your current installation.

A full list of the differences between 0.7.0 and 0.7.1 can be viewed by visiting this

<a href="<?php print $root; ?>http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable&cmp=0&tree2=0.7.0-stable&splitoffs=on&sort=name">page.</a>
</p>

<p>
If you have questions or problems, please try the Fink mailing lists.  You can learn more about them
<a href="<?php print $root; ?>lists/index.php">here</a>.
</p>

<p>
Please make sure you pick the <b>appropriate installer</b> for your platform.
Fink 0.6.3 will only install on Mac OS X 10.2,* while Fink 0.7.1 will only install on Mac OS X 10.3.*
</p>

        <p>
The Fink Team would like to thank its many contributors, frequent helpers
and developers for making this release happen.
We also thank our community for downloading the prior release 0.7.0 more than 130,000 times. 
Without their constant support and valuable pointers, Fink would not be where we are now.
</p>

<a name="2004-08-23 Problems with XCode 1.5"><span class="news-date">2004-08-23: </span><span class="news-headline">Problems with XCode 1.5</span></a><?php gray_line(); ?>
	<p>
	In the past few days, there have been reports that some fink packages 
	do not compile correctly using XCode 1.5.  If you have not already
	upgraded to XCode 1.5, we suggest that you wait until this issue
	is resolved before doing so.
	</p><p>
	If you are having problems with a package which compiled under
	XCode 1.2 but does not compile correctly under XCode 1.5, 
	please report the package to
	the fink-devel mailing list.  (The usual symptom is: some symbols
	are  missing after compiling with g++.)  
	Packages already known to have this problem include
	octave, singular-factory, singular-libfac, and possibly sdl.
	</p>
	<a name="2004-08-21 Error in fink-0.22.0"><span class="news-date">2004-08-21: </span><span class="news-headline">Error in fink-0.22.0</span></a><?php gray_line(); ?>
	<p>
	The fink-0.22.0 package manager, which was available briefly in the 
	unstable tree this past week, had a bug which prevents further
	updating via rsync.  If you installed this version of fink, you
	can recover by running the command 
	<code>fink install fink-0.21.2-1</code> which will downgrade fink
	to the version in the stable tree, and subsequently running
	<code>fink selfupdate</code>
	</p><p>
	If for any reason those commands don't work, go to 
	<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203">the 
	fink file release page at sourceforge</a> and download the
	file <code>fink-0.22.1.tar.gz</code> (or a more recent, i.e.,
	higher numbered, version).  Unpack this file with
	<code>tar xfz fink-0.22.1.tar.gz</code> , and then from within the
	fink-0.22.1 directory, run the command <code>./inject.pl</code>
	</p>
	<p>
	The fink team apologizes for the error, and thanks the user 
	community for bringing it to our attention quickly.
	</p>
	
