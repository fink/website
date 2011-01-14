<?
$title = "F.A.Q. - Usage (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2011/01/14 01:35:40';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="prev" href="usage-general.php?phpLang=en" title="Package Usage Problems - General">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 9. Package Usage Problems - Specific Packages</h1>
    
    
    
    <a name="xmms-quiet">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.1: I get no sound from XMMS</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Make sure you have the "eSound Output Plugin" selected in the XMMS
        preferences. For some strange reason, it selects the disk writer
        plugin as the default.</p><p>If you still get no sound output or XMMS complains that it can't
        find your sound card try this:</p><ul>
          <li>Make sure you haven't muted sound output in Mac OS X.</li>
          <li>Run <code>esdcat /usr/libexec/config.guess</code> (or any other
          file of a decent size). If you hear a short noise, eSound works and
          XMMS should work too if it's configured correctly. If you don't hear
          anything, esd isn't working for some reason. You can try to start it
          up manually with <code>esd &amp;</code> and watch the messages.</li>
          <li>If it still doesn't work, check the permissions on
          <code>/tmp/.esd</code> and <code>/tmp/.esd/socket</code>. Those
          should have your normal user account as the owner. If they aren't
          owned by you, kill esd if it's running, remove the directory as root
          (<code>sudo rm -rf /tmp/.esd</code>), then start esd again (as a
          normal user, not as root).</li>
        </ul><p>Note that esd is designed to be run by a normal user, not by root.
        It usually communicates via the file system socket
        <code>/tmp/.esd/socket</code>. You only need the <code>-tcp</code> and
        <code>-port</code> switches if you want to run esd clients on another
        machine over the network.</p><p>There have also been reports of XMMS crashing or freezing on 10.1.
        We don't have an analysis or a fix yet.</p></div>
    </a>
    <a name="nedit-window-locks">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.2: If I am editing a file in nedit, when I open another file its
        window pops up but is unresponsive.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is a known problem that occurs with recent versions of
        <code>nedit</code> and <code>lesstif</code> on all
        platforms. The workaround is to open a new window with File--&gt;New,
        then open the next file you want to work on.</p><p>This is now fixed in <code>nedit-5.3-6</code>, which
        depends on <code>openmotif3</code> rather than
        <code>lesstif</code>.</p></div>
    </a>
    <a name="xdarwin-start">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.3: Help! When I start XDarwin, it immediately quits!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Don't Panic. The Running X11 document now has an extensive <a href="http://www.finkproject.org/doc/x11/trouble.php#immediate-quit">troubleshooting
        section</a> for this common problem.</p></div>
    </a>
    <a name="no-server">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.4: When I try to start XDarwin I get the message "xinit: No such file
        or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> First, make sure you are sourcing init.sh in your X startup
        <code>~/.xinitrc</code>.</p><p>In Jaguar, sometimes all of the <code>xfree86</code> packages get
        built, but only <code>xfree86-base</code> and
        <code>xfree86-base-shlibs</code> are installed. Check whether you have
        <code>xfree86-rootless</code> and <code>xfree86-rootless-shlibs</code>
        installed. If not, then <code>fink install xfree86-rootless</code>
        should do the trick.</p><p>If you do have it installed, then try <code>fink rebuild
        xfree86-rootless</code>. If that doesn't work, verify that you have
        <code>/usr/bin/X11R6</code> in your PATH.</p></div>
    </a>
    <a name="apple-x-delete">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.5: I want the delete key in Apple's X11.app to behave like that in
        XDarwin.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Some users have reported that the behavior of the
        <code>delete</code> key is different between XDarwin and Apple X11.
        This can be rectified by adding lines to the appropriate X startup
        files:</p><p>
          <b>.Xmodmap:</b>
        </p><pre>keycode 59 = Delete</pre><p>
          <b>.Xresources:</b>
        </p><pre>xterm*.deleteIsDEL: true 
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?</pre><p>
          <b>.xinitrc</b>
        </p><pre>xrdb -load $HOME/.Xresources 
xmodmap $HOME/.Xmodmap</pre><p></p></div>
    </a>
    <a name="apple-x11-wants-xfree86">
      
      <div class="question"><p><b><? echo FINK_Q ; ?>9.6: I'm having problems with X11 and Fink.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There are two possibilities to consider.</p><ul>
          <li>
            <b>You are installing from binaries:</b>
            <p>Typically what you need to do is reinstall the X11User package,
	    since the installer application occasionally misses installing a file.
	    You may need to repeat this multiple times. Running</p>
	    <pre>fink list -i system-xfree86</pre>
	    <p>should show that the <code>system-xfree86</code> and
	    <code>system-xfree86-shlibs</code> packages are installed, and</p>
	    <pre>fink list x11</pre>
	    <p>should indicate that the <code>x11-shlibs</code> and <code>x11</code> virtual
	    packages are present.</p>
	    <p>If reinstalling the X11User package doesn't work, then consult the
	    <a href="#special-x11-debug">special debug</a> instructions,
	    below.</p>
          </li>
          <li>
            <b>You are installing from source:</b>
	    <p>Typically this error means that you need to (re)install the X11SDK,
	    which is <b>mandatory</b> if you want to build packages from source.
            It is in the Xcode Tools folder of a Tiger DVD, or (Optional
            Installs/)Xcode Tools/Packages on your Leopard DVD(s). If you
            run</p>
            <pre>fink list -i system-xfree86  </pre>
            <p>it should show the <code>system-xfree86</code>,
	    <code>system-xfree86-shlibs</code>, and <code>system-xfree86-dev</code>
	    packages as installed.  If the <code>-dev</code> package is missing,
	    reinstall the X11SDK, since sometimes the Apple Installer misses a
	    file.  You may need to keep doing this.  If either of the other two
	    are missing, then reinstall the X11User package (same reason).  At
	    this point</p>
	    <pre>fink list x11</pre>
	    <p>should indicate that the <code>x11-dev</code>, <code>x11-shlibs</code>,
	    and <code>x11</code> virtual packages are present.</p>
	    <p>If reinstalling the X11SDK or X11User package doesn't work, then consult the
	    <a href="#special-x11-debug">special debug</a> instructions,
	    below.</p>
           </li>
        </ul></div>
    </a>
    <a name="special-x11-debug">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.7: I'm still having problems with X11 and Fink.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If the hints in the  <a href="#apple-x11-wants-xfree86">Fink tries to install XFree86 or X.org</a> entry don't help, or aren't applicable to your situation, you may need to flush out your X11 installation and remove any old placeholders and partially/fully installed X11-related packages:</p><p>On Leopard, use</p><pre>
sudo pkgutil --forget com.apple.pkg.X11User
sudo pkgutil --forget com.apple.pkg.X11SDKLeo
</pre><p>Then, on either 10.4 or 10.5, run</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg \
 /Library/Receipts/X11Update*.pkg
fink selfupdate; fink index</pre><p>(the first line may give you warnings about trying to remove
	nonexistent packages).  Then, reinstall Apple's X11 (and the X11SDK, if
	needed), or,
	if you're on 10.4, an alternative X11 implementation, like XFree86 or X.org.</p><p>If you are still having problems then you can run</p><pre>fink-virtual-pkgs --debug</pre><p>to get information about what's missing.</p><p>If you are running an earlier version of <code>fink</code>, then
        there is a Perl script (courtesy of Martin Costabel) that you can
        download and run to get the same information.</p><ul>
          <li>Get it here: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
          </li>
          <li>Save it wherever you like.</li>
          <li>Run it in a terminal window via <pre>perl fink-x11-debug</pre>
          </li>
        </ul></div>
    </a>
    <a name="tiger-gtk">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.8: After updating to Tiger (OS 10.4), whenever I use a GTK app, I get errors involving <code>_EVP_idea_cbc</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is caused by an apparent bug in Tiger's dynamic linker (current as of 10.4.1), but looks to be fixed in 10.4.3, and Fink has had a workaround in the guise of <code>base-files-1.9.7-1</code> or later.</p><p>If you haven't updated Tiger and/or <code>base-files</code> yet, you can work around this issue by prefixing the name of the software you want to run as follows:
</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>E.g., if you want to use <code>gnucash</code>, you'd use</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>This method works for applications that are launched via the Application Menu in Apple's X11 as well as a terminal.</p><p>You may find it preferable to set this globally (e.g. in your startup script, and/or in your <code>.xinitrc</code>, which you may need to do to run GNOME).  Put</p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>in your <code>.xinitrc</code> (regardless of your login shell) or your <code>.profile</code> (or other startup script) for <b>bash</b> users and:</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>is the corresponding command to use in e.g. your <code>.cshrc</code> file for <b>tcsh</b> users.</p><p>Note:  this will automatically be done if you install a recent enough <code>base-files</code>.
	</p></div>
    </a>
    <a name="yelp">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.9: I can't get the help to work for any GNOME application.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You need to install the <code>yelp</code> package.  This package was not placed within the GNOME bundle because it uses cryptography, and it was decided not to place all of GNOME in the crypto tree just to use the help system.</p></div>
    </a>
  
<? include_once "../footer.inc"; ?>


