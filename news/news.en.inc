<a name="2004-10-15 Workaround for gcc problems."><span class="news-date">2004-10-15: </span><span class="news-headline">Workaround for gcc problems.</span></a><?php gray_line(); ?>
<p>
The version of gcc included with XCode 1.5 is known to produce 
incorrect output from c++ code under certain circumstances.
Fink now has a mechanism to warn users about this, and Fink will soon
refuse
to use the "broken" gcc to compile packages which are known to
have this problem.
</p><p>
If you have already upgraded XCode to version 1.5, there is a workaround,
described <a href="<?php print $root; ?>http://article.gmane.org/gmane.os.apple.fink.beginners/13580"> here </a>
and <a href="<?php print $root; ?>http://article.gmane.org/gmane.os.apple.fink.beginners/14200"> here </a>.
</p><p> If you have not yet upgraded, you should consider remaining with
XCode version 1.2 until the problem has been resolved.
</p>


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

<a href="<?php print $root; ?>http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable%26cmp=0%26tree2=0.7.0-stable%26splitoffs=on%26sort=name">page.</a>
</p>

<p>
If you have questions or problems, please try the Fink mailing lists.  You can learn more about them
<a href="<?php print $root; ?>lists/index.php">here</a>.
</p>

<p>
Please make sure you pick the <b>appropriate installer</b> for your platform.
Fink 0.6.3 will only install on Mac OS X 10.2.*, while Fink 0.7.1 will only install on Mac OS X 10.3.*
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
	
