<a name="2003-01-21 Gnome, libpng, and the unstable tree"><span class="news_date">2003-01-21: </span><span class="news_headline">Gnome, libpng, and the unstable tree</span></a><?php gray_line(); ?>
	<p>
        A problem was uncovered today concerning the versions of imlib,
 libpng, and gnome in Fink's unstable tree.  The Fink team is hard at
 work addressing this problem.  As a workaround, users can downgrade
their imlib package to the stable version, &quot;<tt><nobr>fink install
 imlib-1.9.10-9</nobr></tt>&quot;, until the problem is fixed.
</p><p>
   Many Fink users may be using Fink's unstable tree without being
fully aware of what this entails.  For a few months in the fall,
enabling the unstable tree was the only was to gain access to
 10.2-compatible versions of Fink packages.  
<b>That is no longer the case.</b>
Fink users who do not wish to help the Fink team with testing should
disable their unstable tree.  To do this, edit the file
<tt><nobr>/sw/etc/fink.conf</nobr></tt> and remove the items
 <tt><nobr>unstable/main</nobr></tt> and <tt><nobr>unstable/crypto</nobr></tt> from the
 <tt><nobr>Trees</nobr></tt> line.
	</p>
<p>The Fink team appreciates those users who are willing to stick with
the unstable tree, even when there are problems like today's, and provide
the team with prompt feedback.  This is a community effort and we
appreciate your participation.
</p>
	<a name="2003-01-17 Anonymous CVS issues resolved"><span class="news_date">2003-01-17: </span><span class="news_headline">Anonymous CVS issues resolved</span></a><?php gray_line(); ?>
	<p>
	UPDATE: We are pleased to announce that SourceForge have resolved the issues with anonymous CVS access, and the selfupdate-cvs command should work again. Further details on the downtime can be found on the SourceForge.net <a href="http://sourceforge.net/docman/display_doc.php?docid=2352&amp;group_id=1#cvs">site status</a> page.
	</p>
	<a name="2003-01-07 Fink Interaction with Apple's X11 Public Beta"><span class="news_date">2003-01-07: </span><span class="news_headline">Fink Interaction with Apple's X11 Public Beta</span></a><?php gray_line(); ?>
	<p>
	Fink works just fine with the <a href="http://www.apple.com/macosx/x11/">public beta X11 release</a>
	with some caveats.  Please read <a href="<?php print $root; ?>doc/x11/inst-xfree86.php#apple-binary">the newly added Apple X11</a> section of the Fink X11 Documentation for details.</p>
	
