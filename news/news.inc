<a name="2003-11-30 There they are! New mirrors.."><span class="news-date">2003-11-30: </span><span class="news-headline">There they are! New mirrors..</span></a><?php gray_line(); ?>
		<p>
	Thank you, thank you, thank you. What a great community we have.
	Thank you for providing us with more mirrors. 
		</p>
		<p>
	Matthew Healey, member of the Western <a href="http://www.wamug.org.au">
	Australian</a> Macintosh User Group, and their 
	ISP <a href="http://www.extremedsl.com.au">extremedsl</a>
	are providing Fink with a full mirror in Perth, Australia. This is our first
	mirror in down under, thus I am pleased to welcome them to the family.
	Furthermore the <a href="http://www.mirror.ac.uk">UKMIRROR</a> service 
	has accepted us, making distfile services available for Fink 
	on 21 load balanced server.
		</p>
		<p>
	We are very happy about this development, but we still need more rsync mirrors.
	Thus, once more, if you feel like helping, please visit 
	<a href="http://finkmirrors.net">finkmirrors.net</a> and get in touch.
		</p>
		<a name="2003-11-24 More mirrors....pretty please?"><span class="news-date">2003-11-24: </span><span class="news-headline">More mirrors....pretty please?</span></a><?php gray_line(); ?>
	<p>While we welcome our latest full mirror in Norway, sponsored by Havar Valeur, 
        we crave more. To improve our service to all of you, we would like to ask that
        you evaluate carefully if you maybe do have the resources to become a mirror. 
        </p>    
        <p>     
        All it takes is a 10Mbit link, around 100MB of disk space  and some bandwidth you are 
        willing to share for Fink. The exact setup instructions for rsync mirrors can be found 
        <a href="http://finkmirrors.net/rsync.html">here</a>. Especially mirrors in
        Asia, Australia, New Zealand, South Europe and Middle Europe are welcome, since we have none in 
        those regions yet. If you feel generous and wish to donate even more resources, please visit
        <a href="http://finkmirrors.net">finkmirrors.net</a> to learn about your options.
        </p>    
        <p>     
        The current status of all available rsync mirrors can be viewed on the finkmirrors.net pages as well.
        We hope to improve this service in the future, yet this depends on your willingness to help us out. 
        We are looking forward to many new applications and thank our community in advance. 
        </p>    
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
	
