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

<a name="2004-02-19 Raise your Flag."><span class="news-date">2004-02-19: </span><span class="news-headline">Raise your Flag.</span></a><?php gray_line(); ?>
	<p>
Thanks to Baba Yoshihiko, Fink has now taken the necessary steps to allow for 
internationalisation efforts. 
The improved infrastructure enables us to display a multilingual web-site to our visitors from all over the world. 
</p>
<p>
This also means that we need volunteers. The Fink web-site needs to be translated into the language of your choice. 
A translation into Japanese is being worked on and the translation into French has been taken over by Michele Garoche. 
Which language are you willing to translate?
</p>
<p>
If you are willing to become a member of the internationalisation team or wish to provide feedback on 
the web-site feel free to join the new mailing-list.
You can do so by going to our <a href="<?php print $root; ?>lists/index.php">mailing-lists page</a>. The full announcement on the existing 
mailing lists can be read <a href="http://article.gmane.org/gmane.os.apple.fink.devel/7554">here</a>.
</p>
<a name="2004-02-02 Java 1.4.2 Update Removes Java SDK"><span class="news-date">2004-02-02: </span><span class="news-headline">Java 1.4.2 Update Removes Java SDK</span></a><?php gray_line(); ?>
	<p>
If you previously had Java 1.4.1 and the Java SDK installed, the new
Java 1.4.2 update from apple will upgrade the Java runtime to 1.4.2,
but will <b>remove</b> the previous 1.4.1 Java runtime and
SDK <b>without</b> upgrading the JDK.  To build Java packages in Fink
you will need to <a href="http://connect.apple.com/">go to
connect.apple.com and download the Java 1.4.2 SDK</a> (free
registration required).
	</p>
	
