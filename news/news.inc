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
	file <code>fink-0.22.1.tar.gz</code> .  Unpack this file with
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
	<a name="2004-04-06 Fink 0.6.3 and 0.7.0 released."><span class="news-date">2004-04-06: </span><span class="news-headline">Fink 0.6.3 and 0.7.0 released.</span></a><?php gray_line(); ?>
	<p>
The latest Fink releases, version 0.6.3 (for 10.2) and 0.7.0 (for 10.3), 
are now available for both source and binary users.  The 0.6.3 release has 
been built on <b>10.2</b>, while release 
0.7.0 has been built on <b>10.3</b>. This should facilitate better support for the different platforms. 
	</p>
	<p>
These new releases incorporate various fixes to the package manager, many previously 
unavailable binary packages have been added and problematic packages for 10.3 users have been rebuilt. 
	</p>
	<p>
To complete a new Fink installation you should follow the instructions posted 
<a href="<?php print $root; ?>download/index.php?phpLang=en">here</a>.
You may upgrade your existing Fink installation to the latest Fink release by following the instructions posted <a href="<?php print $root; ?>download/upgrade.php?phpLang=en">here</a>.

If you have questions or problems, please try the Fink mailing lists you can learn more about them 
<a href="<?php print $root; ?>lists/index.php?phpLang=en">here</a>.
		</p>
		<p>
Please make sure you pick the <b>appropriate installer</b> for your Platform.
Fink 0.6.3 will only install on Mac OS X 10.2.* while Fink 0.7.0 will only install on Mac OS X 10.3.* 
		</p>
	<p>
The Fink Team would like to thank its many contributors, frequent helpers 
and developers for making this release happen. 
We also thank our community, without their constant support and valuable 
pointers Fink would not be where we are now.. 

</p>


