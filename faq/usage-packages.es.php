<?
$title = "P.M.F. - Usage (2)";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/15 18:35:34';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="P.M.F. Contents"><link rel="prev" href="usage-general.php?phpLang=es" title="Package Usage Problems - General">';


include_once "header.es.inc";
?>
<h1>P.M.F. - 9. Package Usage Problems - Specific Packages</h1>
    
    
    <a name="xmms-quiet">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.1:  No me sale sonido de XMMS.</b></p></div>
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
      <div class="question"><p><b><? echo FINK_Q ; ?>9.2: Cuando estoy editando un archivo en nedit, si abro otro archivo su ventana aparece pero no me responde.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is a known problem that occurs with recent versions of
        <code>nedit</code> and <code>lesstif</code> on all
        platforms. The workaround is to open a new window with File--&gt;New,
        then open the next file you want to work on.</p><p>This is now fixed in <code>nedit-5.3-6</code>, which
        depends on <code>openmotif3</code> rather than
        <code>lesstif</code>.</p></div>
    </a>
    <a name="xdarwin-start">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.3: Ayuda! Cuando abro XDarwin, inmediatamente se cuelga!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Don't Panic. The Running X11 document now has an extensive <a href="http://fink.sourceforge.net/doc/x11/trouble.php#immediate-quit">troubleshooting
        section</a> for this common problem.</p></div>
    </a>
    <a name="no-server">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.4: Cuando intento abrir XDarwin me sale el siguiente mensaje: "xinit: No such file  or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</b></p></div>
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
      <div class="question"><p><b><? echo FINK_Q ; ?>9.5: xterm falla con: "dyld: xterm Undefined symbols: xterm undefined  reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is caused by using a 10.1 version of XFree86 on 10.2. You must
        upgrade to a 10.2 version.</p><p>If you are using the Fink <code>xfree86</code> packages, then you
        can get an upgrade by the usual means ("<code>fink selfupdate-cvs ;
        fink update-all</code>" for installation from source, <code>fink
        selfupdate ; ; sudo apt-get update; sudo apt-get dist-upgrade</code>"
        for installation from binaries.</p><p>If you have installed XFree86 by other means, you can find patches
        to bring you up to date at the <a href="http://mrcla.com/XonX">XonX
        web site</a>.</p></div>
    </a>
    <a name="libXmuu">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.6: Cuando quiero abrir XFree86 aparece uno de los siguientes errores: "dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib" or  "dyld: xinit can't open library: /usr/X11R6/lib/libXext.6.dylib"</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You are missing a file that is supposed to be installed by
        <code>xfree86-base-(threaded)-shlibs</code>. You should reinstall it
        using <code>fink reinstall xfree86-base-shlibs</code> (<code>fink
        reinstall xfree86-base-threaded-shlibs</code> if you are using the
        threaded XFree86 packages) for source, or <code>sudo apt-get install
        --reinstall xfree86-base-shlibs</code> for binaries.</p></div>
    </a>
    <a name="apple-x-bugs">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.7: Tenía instalado XFree86 de Fink, lo reemplacé con el X11 de Apple, y ahora todo se cuelga!</b></p></div>
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
      <div class="question"><p><b><? echo FINK_Q ; ?>9.8: Quiero que la tecla para borrar en el X11 de Apple se comporte como la tecla en Xdarwin.</b></p></div>
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
      <div class="question"><p><b><? echo FINK_Q ; ?>9.9:  Actualicé GNOME 1.x a GNOME 2.x y ahora <code>gnome-session</code> no abre al gestor de ventanas.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> While under GNOME 1.x <code>gnome-session</code> invokes the
        <code>sawfish</code> window manager automatically, under GNOME 2.x,
        you'll have to call a window manager in <code>~/.xinitrc</code> before
        running <code>gnome-session</code>, e.g.:</p><pre>... 
exec metacity &amp; exec gnome-session</pre><p>Note:  this is no longer true for <b>GNOME 2.4</b>.  Running <code>gnome-session</code> invokes a window manager.</p></div>
    </a>
    <a name="apple-x11-no-windowbar">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.10: He actualizado al X11 de Apple en Panther y ahora las barras de los títulos de las ventanas han desaparecido.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You didn't upgrade X11 to version "X11 1.0 - XFree86 4.3.0"
        included with Panther. You can install X11 from X11.pkg on Disk 3.</p></div>
    </a>
    <a name="apple-x11-wants-xfree86">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.11: Instalé el X11 de Apple en Panther pero Fink aun insiste en querer instalar xfree86.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There are two possibilities to consider.</p><ul>
          <li>
            <b>You are installing from binaries:</b> If you are running a
          version of the <code>fink</code> package that is earlier than 0.17.0
          (such as the version that comes with the Fink-0.6.2 installer), then
          updating fink may solve your problem immediately, e.g.
          via<pre>sudo apt-get update
sudo apt-get install fink</pre>
          </li>
          <li>
            <b>You are installing from source: </b>You should first update
          <code>fink</code>, e.g. via a <pre>fink selfupdate</pre>Then you need to (re)install the X11SDK, which
          is on the Xcode CD, and is <b>not</b> installed by default. Even
          if you install XCode, the X11SDK is <b>not</b> installed by
          default. It has to be installed either with a custom Xcode install,
          or by clicking on the <code>X11SDK</code> pkg in the
          <code>Packages</code> folder.</li>
        </ul><p>For either case, you can check your installation by running</p><pre>fink-virtual-pkgs</pre><p>and checking to see that the
        <code>Package: system-xfree86 </code>and <code>Package: system-xfree86-shlibs</code> (as well as the <code>Package: system-xfree86-dev</code>, if you've installed the SDK) sections are
        present and that the <code>Provides:</code> lines contain
        <code>x11 </code>and <code>x11-shlibs</code> (and
        <code>x11-dev</code>), respectively</p><p>If you don't see everything properly installed, the safest way to
        fix this error is to remove all older copies of xfree86 or
        system-xfree86 and reinstall Apple's X11 (and the X11SDK, if you're
        going to be installing packages from source). You may see warnings
        from the first line, which you can ignore:</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \ 
xfree86-base xfree86-base-shlibs; rm -rf /Library/Receipts/X11SDK.pkg \
/Library/Receipts/X11User.pkg; fink selfupdate; fink index</pre><p>Then, reinstall X11 from the third Panther CD (and the X11SDK from the
        Xcode CD).</p><p>Note: <code>system-xfree86</code> no longer requires the X11SDK for
        binary installs if you have <code>fink-0.17.0</code> or later.</p><p>If you are still having problems and you are running
        <code>fink-0.19.0</code> or later then you can run</p><pre>fink-virtual-pkgs --debug</pre><p>to get information about what's missing. </p><p>If you are running an earlier version of <code>fink</code>, then
        there is a Perl script (courtesy of Martin Costabel) that you can
        download and run to get the same information.</p><ul>
          <li>Get it here: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
          </li>
          <li>Save it wherever you like.</li>
          <li>Run it in a terminal window via <pre>perl fink-x11-debug</pre>
          </li>
        </ul></div>
    </a>
    <a name="apple-x11-beta-wants-xfree86">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.12:  Instalé el X11 de Apple con la version 10.2-gcc3.3 de Fink pero Fink continua pidiéndome que instale xfree86.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There are two possibilities to consider.</p><ul>
          <li>
            <b>You are installing from binaries:</b> If you are running a
          version of the <code>fink</code> package that is earlier than 0.17.0
          (such as the version that comes with the Fink-0.6.2 installer), then
          updating fink may solve your problem immediately, e.g.
          via<pre>sudo apt-get update 
sudo apt-get install fink</pre>
          </li>
          <li>
            <b>You are installing from source: </b>You should first update
          <code>fink</code>, e.g. via a <pre>fink selfupdate</pre>Then you need to (re)install the X11SDK, which
          you should have downloaded when you downloaded your beta copy of
          Apple's X11.</li>
        </ul><p>For either case, you can check your installation by running</p><pre>fink-virtual-pkgs</pre><p>and checking to see that the
        <code>Package: system-xfree86</code>and <code>Package:
        system-xfree86-shlibs</code> (as well as the <code>Package:
        system-xfree86-dev</code>, if you've installed the SDK) sections are
        present and the <code>provides:</code> lines contain
        <code>x11 </code>and <code>x11-shlibs</code> (and
        <code>x11-dev</code>), respectively</p><p>If you don't see everything properly installed, the safest way to
        fix this error is to remove all older copies of xfree86 or
        system-xfree86 and reinstall Apple's X11 (and the X11SDK, if you're
        going to be installing packages from source). You may see warnings
        from the first line, which you can ignore:</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xfree86-base xfree86-base-shlibs; rm -rf /Library/Receipts/X11SDK.pkg \
/Library/Receipts/X11User.pkg; fink selfupdate; fink index</pre><p>Then, reinstall X11 (and the X11SDK, if needed).</p><p>Note: <code>system-xfree86</code> no longer requires the X11SDK for
        binary installs if you have <code>fink-0.17.0</code> or later.</p><p>If you are still having problems and you are running
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
    <a name="wants-xfree86-on-upgrade">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.13: Cambié la version de Fink 10.2 a 10.2-gcc3.3 ó 10.3, tengo instalado el X11 de Apple, y Fink me pide que instale XFree86.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You may need to remove one of the old place-holder packages: <code>system-xfree86</code>, <code>system-xfree86-42</code>, or <code>system-xfree86-43</code>.  Fink now figures out if you have a manually installed X11 flavor, e.g. Apple's, and generates virtual packages. Because other packages depend on <code>system-xfree86</code>, you must use the command</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43</pre><p>to remove the out-of-date versions.

You can check your installation by running</p><pre>fink-virtual-pkgs</pre><p>and checking to see that the <code>Package: system-xfree86</code> and <code>Package: system-xfree86-shlibs</code> sections are present and their provides: lines contains <code>x11</code> and <code>x11-shlibs</code>, respectively.  If you installed the X11SDK, then you should also see <code>Package: system-xfree86-dev</code>.</p><p>If you are still having problems then refer to the <a href="#apple-x11-wants-xfree86">Fink wants XFree86 on 10.3</a> or <a href="#apple-x11-beta-wants-xfree86">Fink wants Xfree86 on 10.2-gcc3.3</a> entries, above.</p></div>
    </a>
  
<? include_once "../footer.inc"; ?>


