<?
$title = "P.M.F. - Compiling (2)";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/15 18:35:34';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="P.M.F. Contents"><link rel="next" href="usage-general.php?phpLang=es" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php?phpLang=es" title="Compile Problems - General">';


include_once "header.es.inc";
?>
<h1>P.M.F. - 7. Compile Problems - Specific Packages</h1>
    
    
    <a name="libgtop">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.1: A Falla la compilación de un paquete con errores involucrando a <code>sed</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This can happen if your login script (e.g. <code>~/.cshrc</code>)
        does something that writes to the terminal, e.g "<code>echo
        Hello</code>" or <code>xttitle</code>. To get rid of the problem, the
        easy solution is to comment out the offending lines.</p><p>If you want to keep the echo, then you can do something like the
        following:</p><pre>if ( $?prompt) then 
	echo Hello 
endif</pre></div>
    </a>
    <a name="cant-install-xfree">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.2: Quiero cambiarme a los paquetes XFree86 de Fink, pero no puedo instalar <code>xfree86-base</code> - <code>xfree86</code>, porque existe un conflicto con <code>system-xfree86</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> All flavors of X11, unfortunately, really needs to be installed in
        /usr/X11R6. Because of this the Fink <code>xfree86-base</code> and
        <code>xfree86-rootless</code> packages install there, too. However,
        since Fink won't remove any files that aren't in its database, it
        won't automatically replace a non-Fink installation of X11.</p><p></p><p>Here's how to proceed:</p><p></p><p>
          <b>Note: 10.2.x users with up-to-date versions of Fink (&gt;=
        0.16.2) and 10.3.x users should skip step 1 below (it won't work
        anyway).</b>
        </p><p>1. Remove <code>system-xfree86</code>. If you don't have any
        packages that depend on X11, this is straightforward. Frequently,
        however, many packages that depend on X11 are installed. Rather than
        uninstalling all of them, you can use</p><p>
          <code>sudo dpkg --remove --force-depends system-xfree86</code>
        </p><p>to remove it, leaving everything in place. If you don't have
        <code>system-xfree86</code> installed then proceed to step 3.</p><p>2. Manually remove all of XFree86. This can be done with</p><p>
          <code>sudo rm -rf /Applications/XDarwin.app /usr/X11R6
        /etc/X11</code>
        </p><p>If you are switching from Apple X11, remove the X11 application,
        too.</p><p>3. To get XFree86-4.2.1, Install Fink's <code>xfree86-base</code>
        and <code>xfree86-rootless</code> packages by the usual means:
        "<code>fink install</code>" for source users, "<code>apt-get
        install</code>" or <code>dselect</code> for binaries.</p><p>-or-</p><p>3a. To get XFree86-4.3.x, install Fink's <code>xfree86</code>
        package, with "fink install xfree86"--this version isn't in the binary
        distro yet, and is currently only in the unstable tree [FAQ 3.9].</p></div>
    </a>
    <a name="change-thread-nothread">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.3: ¿Cómo puedo cambiar de la version non-threaded del paquete XFree86 de Fink a la version threaded  (o viceversa)?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you are running the Fink version of XFree86 and you want to
        switch between the threaded and non-threaded versions of Fink, you
        need to manually remove the old version. This is done at the
        command-line with the commands:</p><pre>sudo dpkg -r --force-depends xfree86-base 
sudo dpkg -r --force-depends xfree86-shlibs 
sudo dpkg -r --force-depends xfree86-rootless 
sudo dpkg -r --force-depends xfree86-rootless-shlibs</pre><p>or to delete the threaded versions:</p><pre>sudo dpkg -r --force-depends xfree86-base-threaded 
sudo dpkg -r --force-depends xfree86-shlibs-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs</pre><p>FinkCommander also has a way to remove packages. In the source
        window, select a package, and then in the <code>Source Menu</code> use
        "<code>Force Remove</code>."</p><p>If you are using system-xfree86, see the previous question for
        removing it.</p><p>Install the version of xfree86 you want:</p><p>
          <code>xfree86-base</code> and <code>xfree86-rootless</code>
        </p><p>
          <code>xfree86-base-threaded</code> and
        <code>xfree86-rootless-threaded</code>
        </p><p>by the usual means: "<code>fink install</code>" for source users,
        "<code>apt-get install</code>" or <code>dselect</code> for
        binaries.</p></div>
    </a>
    
    <a name="cctools">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.4: ¿Cuando intento instalar KDE, me sale el siguiente mensaje: 'Can't  resolve dependency "cctools (&gt;= 446-1)"'</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This somewhat cryptic message means you need to install the
        December 2002 Developer Tools.</p></div>
    </a>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=es">8. Package Usage Problems - General</a></p>
<? include_once "../footer.inc"; ?>



