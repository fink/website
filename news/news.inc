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
	<a name="2004-08-01 Improving our mirrors. Can you help?"><span class="news-date">2004-08-01: </span><span class="news-headline">Improving our mirrors. Can you help?</span></a><?php gray_line(); ?>
	<p>
	Fink's decision to gradually build its own network of mirrors
	has paid off. To make sure that we can continue to offer
	a high quality service we need to improve our mirror network.
	It has been some time since we last asked for more mirrors. 
	It is time to do so again. Fink is very grateful for the resources 
	granted to us by our community. To further improve our service to the 
	community we require an even better mirror system. We especially lack 
	mirrors in central Europe, Russia and the Far East. If you feel that 
	you have at least two Mbit to spare for a rsync mirror, or more to offer 
	a distfiles mirror, please <a href="mailto:mirrors@finkmirrors.net">contact us</a>.
	</p>
	<p>
	 To get a better understanding of the different types of mirrors 
	 Fink offers, please review <a href="http://finkmirrors.net/">finkmirrors.net</a>. This is the official homepage for all mirror related issues.
	 If you feel that you can offer other types of resources, 
	 web-space for testing as an example, please do not hesitate in <a href="mailto:mirrors@finkmirrors.net">contacting us</a> as well.
	</p>
	
