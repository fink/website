<a name="2003-02-07 DO NOT INSTALL VIREX 7.2"><span class="news_date">2003-02-07: </span><span class="news_headline">DO NOT INSTALL VIREX 7.2</span></a><?php gray_line(); ?>
        <p>
        The Virex 7.2 package, currently being distributed free to all .Mac 
members, has a serious conflict with Fink.  <b>Fink users should not install 
Virex 7.2 under any circumstances.</b>
  Installing it after Fink is installed
will damage your Fink installation; installing it prior to Fink will make
it impossible to install Fink without damaging Virex.
</p><p>
This bug has been <a href="http://forums.mcafeehelp.com/viewtopic.php?t=6318&amp;sid=33d08f3c34f7e09dc546aa1ddf1c299c">reported 
to Virex's manufacturer.</a>  We will keep the
Fink community informed about the situation as it develops.
</p><a name="2003-01-26 Apple X11 Library Warning"><span class="news_date">2003-01-26: </span><span class="news_headline">Apple X11 Library Warning</span></a><?php gray_line(); ?>
	<p>
	While Apple's X11 works just fine with existing binaries, it
has a bug in the install name of the libraries that can cause some
software to build incorrectly, and will break forward-compatibility
with future X11 releases.
</p>
<p>
	Ben Hines has created a script (available <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/*checkout*/fink/fix-fink/install_name_fix.pl">here</a>) that you can use
that will fix the install_name entries in Apple's X11 libraries,
but it will not repair software you have already built against the
broken libraries.
</p>
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
enabling the unstable tree was the only way to gain access to
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
	
