<?
$title = "F.A.Q. - Usage (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2006/12/09 20:09:42';
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
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Don't Panic. The Running X11 document now has an extensive <a href="http://fink.sourceforge.net/doc/x11/trouble.php#immediate-quit">troubleshooting
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
    
    <a name="xterm-error">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.5: xterm fails with "dyld: xterm Undefined symbols: xterm undefined
        reference to _tgetent expected to be defined in
        /usr/lib/libSystem.B.dylib".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is caused by using a 10.1 version of XFree86 on 10.2. You must
        upgrade to a 10.2 version.</p><p>If you are using the Fink <code>xfree86</code> packages, then you
        can get an upgrade by the usual means ("<code>fink selfupdate-cvs ;
        fink update-all</code>" for installation from source, "<code>fink
        selfupdate ; sudo apt-get update; sudo apt-get dist-upgrade</code>"
        for installation from binaries.</p><p>If you have installed XFree86 by other means, you can find patches
        to bring you up to date at the <a href="http://mrcla.com/XonX">XonX
        web site</a>.</p></div>
    </a>
    <a name="libXmuu">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.6: When I try to start XFree86 I get one of the following errors:
        "dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib" or
        "dyld: xinit can't open library: /usr/X11R6/lib/libXext.6.dylib"</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You are missing a file that is supposed to be installed by
        <code>xfree86-base-(threaded)-shlibs</code>. You should reinstall it
        using <code>fink reinstall xfree86-base-shlibs</code> (<code>fink
        reinstall xfree86-base-threaded-shlibs</code> if you are using the
        threaded XFree86 packages) for source, or <code>sudo apt-get install
        --reinstall xfree86-base-shlibs</code> for binaries.</p></div>
    </a>
    <a name="apple-x-bugs">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.7: I had Fink's XFree86 installed, and I've replaced it with Apple's
        X11, and now everything's crashing!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> First of all, if you previously had the "threaded" versions of
        Fink's XFree86 packages installed, you may need to rebuild the
        application that is crashing. Some programs check for the availability
        of threading at build time, and then from then on believe that
        threading is available to them.</p><p>Secondly, you may have just hit an Apple X11 bug. As of the time of
        this writing, a number of bugs are known by the Apple team and are
        being worked on.</p><p>If you have general questions regarding Apple's X11 that are not
        really related to Fink, you may want to check <a href="http://www.lists.apple.com/x11-users">Apple's official discussion
        list on X11</a>. They also have also recommended that bugs in X11
        be <a href="http://developer.apple.com/bugreporter">submitted to the
        Apple bug reporter</a>.</p></div>
    </a>
    <a name="apple-x-delete">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.8: I want the delete key in Apple's X11.app to behave like that in
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
    <a name="gnome-two">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.9: I upgraded from GNOME 1.x to GNOME 2.x and now
        <code>gnome-session</code> won't open a window manager.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> While under GNOME 1.x <code>gnome-session</code> invokes the
        <code>sawfish</code> window manager automatically, under GNOME 2.x,
        you'll have to call a window manager in <code>~/.xinitrc</code> before
        running <code>gnome-session</code>, e.g.:</p><pre>... 
exec metacity &amp; exec gnome-session</pre><p>Note:  this is no longer true for <b>GNOME 2.4</b>.  Running <code>gnome-session</code> invokes a window manager.</p></div>
    </a>
    <a name="apple-x11-no-windowbar">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.10: I upgraded to Apple's X11 in Panther and now my window title bars
        are missing.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You didn't upgrade X11 to version "X11 1.0 - XFree86 4.3.0"
        included with Panther. You can install X11 from X11.pkg on Disk 3.</p></div>
    </a>
    <a name="apple-x11-wants-xfree86">
      
      <div class="question"><p><b><? echo FINK_Q ; ?>9.11: I installed Apple's X11 but Fink keeps asking to install
        XFree86 or X.org.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There are two possibilities to consider.</p><ul>
          <li>
            <b>You are installing from binaries:</b>
            <p>If you have a current version of <code>fink</code> (&gt;=0.18.3-1), typically what you need to do is reinstall the X11User package, since the installer application occasionally misses installing a file.  You may need to do this multiple times. Running</p>
	    <pre>fink list -i system-xfree86</pre>
	    <p>should show that the <code>system-xfree86</code> and <code>system-xfree86-shlibs</code> packages are installed. If reinstalling the X11User package doesn't work, then consult the <a href="#special-x11-debug">special debug</a> instructions, below.</p>
            <p>If you are running an earlier version of the <code>fink</code> package, then updating <code>fink</code> may solve your problem immediately, e.g. via</p>
            <pre>sudo apt-get update
sudo apt-get install fink</pre>
          </li>
          <li>
            <b>You are installing from source:</b>
	    <p>If you have a current version of <code>fink</code>, then typically this error means that you need to (re)install the X11SDK, which is <b>mandatory</b> if you want to build packages from source. It is on the Panther Xcode CD or in the XCode Tools folder of a TIger DVD, and is <b>not</b> installed by default when you install XCode on Panther--it has to be installed either with a custom Xcode install, or by clicking on the <code>X11SDK pkg</code> icon in the <code>Packages</code> folder of the XCode CD.  It <b> is</b>, on the other hand, installed by default when you install Xcode on Tiger (even if X11User isn't present), but it's still possible for the Installer program to miss a file.  </p><p>If your computer didn't come with XCode media, then a disk image for it, containing <code>X11SDK.pkg</code> among other things, is quite likely present on your computer somewhere--check for a directory like <code> /Applications/Installers </code> for an XCode disk image.  <code>X11User.pkg</code> may be present in that directory as well. </p>
	    <p>If you are still having problems, run </p>
            <pre>fink list -i system-xfree86  </pre>
            <p>It should show the <code>system-xfree86</code>, <code>system-xfree86-shlibs</code>, and <code>system-xfree86-dev</code> packages as installed.  If the <code>-dev</code> package is missing, reinstall the X11SDK, since sometimes the Apple Installer misses a file.  You may need to keep doing this.  If either of the other two are missing, then reinstall the X11User package (same reason).</p>
            <p>
              <b>Note for Jaguar (X11 beta 3) users</b>:  As you aren't using XCode, you need to have already downloaded a copy of the proper X11SDK package on your system.  Since X11 beta 3 is expired, its X11SDK package (as well as the X11User package) is no longer available for download.  You'll either have to restrict yourself to installing X11 applications via the binary distribution, install XFree86 or X.org, or update to Panther.</p>
            <p>If you are running a version of <code>fink</code> prior to 0.17 then you should update
          <code>fink</code>, e.g. via a </p>
            <pre>fink selfupdate</pre>(assuming that you have either CVS or rsync updating turned on and aren't just using point releases).<p>If you're still having problems, then consult the <a href="#special-x11-debug">special debug</a> instructions, below.</p>
          </li>
        </ul></div>
    </a>
    <a name="wants-xfree86-on-upgrade">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.12: I switched from the 10.2 Fink version to 10.2-gcc3.3 or 10.3, I have Apple's X11, and Fink asks me to install XFree86 or X.org.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You may need to remove one of the old place-holder packages: <code>system-xfree86</code>, <code>system-xfree86-42</code>, or <code>system-xfree86-43</code>.  Fink now figures out if you have a manually installed X11 flavor, e.g. Apple's, and generates virtual packages. Because other packages depend on <code>system-xfree86</code>, you must use the command</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43</pre><p>to remove the out-of-date versions.

You can check your installation by running</p><pre>fink list -i system-xfree86</pre><p>and checking to see that the <code>system-xfree86</code> and <code>system-xfree86-shlibs</code> packages are present.  If you installed the X11SDK, then you should also see <code>system-xfree86-dev</code>.</p><p>If you are still having problems then refer to the <a href="#apple-x11-wants-xfree86">Fink wants XFree86 or X.org</a> entry, above.</p></div>
    </a>
    <a name="special-x11-debug">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.13: I'm still having problems with X11 and Fink.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If the hints in the  <a href="#apples-x11-wants-xfree86">Fink tries to install XFree86 or X.org</a> or <a href="#wants-xfree86-on-upgrade">X11 and upgrade from 10.2</a> entries don't help, or aren't applicable to your situation, you may need to flush out your X11 installation and remove any old placeholders and partially/fully installed X11-related packages:</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg
fink selfupdate; fink index</pre><p>(the first line may give you warnings about trying to remove nonexistent packages).  Then, reinstall Apple's X11 (and the X11SDK, if needed), or an alternative X11 implementation, like XFree86 or X.org.</p><p>If you are still having problems and you are running
        <code>fink-0.19.0</code> or later then you can run</p><pre>fink-virtual-pkgs --debug</pre><p>to get information about what's missing.</p><p>If you are running an earlier version of <code>fink</code>, then
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
      <div class="question"><p><b><? echo FINK_Q ; ?>9.14: After updating to Tiger (OS 10.4), whenever I use a GTK app, I get errors involving <code>_EVP_idea_cbc</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is caused by an apparent bug in Tiger's dynamic linker (current as of 10.4.1), but looks to be fixed in 10.4.3, and Fink has had a workaround in the guise of <code>base-files-1.9.7-1</code> or later.</p><p>If you haven't updated Tiger and/or <code>base-files</code> yet, you can work around this issue by prefixing the name of the software you want to run as follows:
</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>E.g., if you want to use <code>gnucash</code>, you'd use</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>This method works for applications that are launched via the Application Menu in Apple's X11 as well as a terminal.</p><p>You may find it preferable to set this globally (e.g. in your startup script, and/or in your <code>.xinitrc</code>, which you may need to do to run GNOME).  Put</p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>in your <code>.xinitrc</code> (regardless of your login shell) or your <code>.profile</code> (or other startup script) for <b>bash</b> users and:</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>is the corresponding command to use in e.g. your <code>.cshrc</code> file for <b>tcsh</b> users.</p><p>Note:  this will automatically be done if you install a recent enough <code>base-files</code>.
	</p></div>
    </a>
    <a name="yelp">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.15: I can't get the help to work for any GNOME application.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You need to install the <code>yelp</code> package.  This package was not placed within the GNOME bundle because it uses cryptography, and it was decided not to place all of GNOME in the crypto tree just to use the help system.</p></div>
    </a>
  
<? include_once "../footer.inc"; ?>


