<?
$title = "F.A.Q. - Usage (1)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2005/09/06 01:28:56';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="usage-packages.php?phpLang=en" title="Package Usage Problems - Specific Packages"><link rel="prev" href="comp-packages.php?phpLang=en" title="Compile Problems - Specific Packages">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 8. Package Usage Problems - General</h1>
    
    
    
    <a name="xlocale">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.1: I'm getting lots of messages like "locale not supported by C
        library". Is that bad?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> It's not bad, it just means that the program will use the default
        English messages, date formats, etc. The program will function
        normally otherwise. The Running X11 document has <a href="http://fink.sourceforge.net/doc/x11/trouble.php#locale">details</a>.</p></div>
    </a>
    <a name="passwd">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.2: There are suddenly a number of strange users on my system, with
        names like "mysql", "pgsql", and "games". Where did they come
        from?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You have used Fink to install a package which is dependent on
        another package, passwd. passwd installs a number of extra users on
        your system for security reasons -- on Unix systems, files and
        processes belong to "owners", which allows system administrators to
        fine-tune the permissions and security of the system. Programs such as
        Apache and MySQL need an "owner", and it is insecure to assign these
        daemons to root (imagine what would happen if Apache were to be
        compromised and suddenly had write permission to all files on the
        system). Thus, the passwd package takes the work out of setting up
        these extra users for Fink packages that require this.</p><p>It can be alarming to discover suddenly a number of unexpected
        users in your "System Preferences: Users" pane (on 10.2.x) or "System Preferences: Accounts" pane (on 10.3.x), but suppress the urge 
        to delete them:</p><ul>
          <li>First of all, you have obviously chosen to install a package
          which requires their use, so deleting the user doesn't make much
          sense, does it?</li>
          <li>There are in fact a number of extra users already installed on
          Mac OS X that you may not have known about: www, daemon, nobody, are
          just a few of them. The presence of these extra users is a standard
          Unix convention for running certain services; the passwd package
          simply adds a couple of extra that Apple did not provide. You can
          see these Apple-installed users in NetInfo Manager.app, or by
          running <code>niutil -list . /users</code>
          </li>
          <li>If you do decide to delete these users, be very careful of how
          you go about it. Using the "System Preferences: Users" pane (on 10.2.x) or "System Preferences: Accounts" pane (on 10.3.x) will assign all of their files to a random administrator account, and
          there have been reports of havoc played with the administrator
          account's permissions. This is a bug with System Preferences, and
          has been submitted to Apple. A safer way to remove these users from
          your system is to do so from within NetInfo Manager.app or use the
          command line tool <code>niutil</code> in Terminal. Read the man page
          for <code>niutil</code> for more information about NetInfo.</li>
        </ul><p>Fink <b>does</b> request permission to install these additional
        users on your system during the installation of the passwd package, so
        this should not have come as a surprise.</p></div>
    </a>
    <a name="compile-myself">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.3: How do I compile something myself using Fink-installed
        software?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> When compiling something yourself outside of Fink, the compiler and
        linker need to be told where to find the Fink-installed libraries and
        headers. For a package that uses standard configure/make process, you
        need to set some environment variables:</p><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
setenv LDFLAGS -L/sw/lib 
setenv CXXFLAGS $CFLAGS 
setenv CPPFLAGS $CXXFLAGS 
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal" 
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"</pre><p>-bash-</p><pre>export CFLAGS=-I/sw/include 
export LDFLAGS=-L/sw/lib 
export CXXFLAGS=$CFLAGS 
export CPPFLAGS=$CXXFLAGS 
export ACLOCAL_FLAGS="-I /sw/share/aclocal" 
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"</pre><p>It is often easiest just to add these to your startup files (e.g.
        <code>.cshrc</code> | <code>.profile</code>) so they
        are set automatically. If a package does not use these variables, you
        may need to add the "-I/sw/include" (for headers) and "-L/sw/lib" (for
        libraries) to the compile lines yourself. Some packages may use
        similar non-standard variables such as EXTRA_CFLAGS or --with-qt-dir=
        configure options. "./configure --help" will usually give you a list
        of the extra configure options.</p><p>In addition, you may need to install the development headers (e.g.
        <b>foo-1.0-1-dev</b>) for the library packages that you are using,
        if they aren't already installed.</p></div>
    </a>
    <a name="apple-x11-applications-menu">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.4: I can't run any of my Fink-installed applications using the
        Applications menu in Apple X11.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Apple X11 doesn't keep track of the Fink environment settings,
        which means that the Applications menu doesn't have the PATH set
        correctly to find your Fink applications. The solution is to preface
        the name of a Fink-installed application with</p><pre>source /sw/bin/init.sh ;</pre><p>For example, if you want to run a Fink-installed GIMP, then put</p><pre>source /sw/bin/init.sh ; gimp</pre><p>in the Command field of your GIMP entry.</p><p>You can also edit your .xinitrc file (in your user directory) and
        add:</p><pre>source /sw/bin/init.sh</pre><p>after the first line.</p></div>
    </a>
    <a name="x-options">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.5: I'm bewildered by the X11 options: Apple X11, XFree86, etc. What
        should I install?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> All are variants on XFree86 (they're all based on the XFree86
        code), but have some slight differences between them. There are
  different options under Panther and under Jaguar.</p><p>Under Panther you have the choice between:</p><ul>
          <li>
            <p>     Apple's X11 (on the third disk). Don't forget to install the
  X11 SDK
  (on the XCode disk) if you want to compile programs or if you plan to
  install other X11-related Fink packages from source.</p>
          </li>
          <li>
            <p>        4.4.x built via Fink: install the <code>xfree86</code> and
  <code>xfree86-shlibs</code> packages </p>
          </li>
          <li>
            <p>       X.org built via Fink: install the <code>xorg</code> and
  <code>xorg-shlibs</code> packages </p>
          </li>
        </ul><p>Under Jaguar, the most popular choices, and the Fink packages to
          make them work are:</p><ul>
          <li>
            <p>4.2.x built via Fink: install <code>xfree86-base</code> and
          <code>xfree86-rootless</code> or <code>xfree86-base-threaded</code>
          and <code>xfree86-rootless-threaded</code> (and the respective
          <code>-shlibs</code>)</p>
          </li>
          <li>
            <p>4.3.x built via Fink: install the <code>xfree86</code> and
          <code>xfree86-shlibs</code> packages</p>
          </li>
          <li>
            <p>4.2.x from Apple (assuming you have the User + SDK packages installed): the <code>system-xfree86</code> package is automatically generated for current versions of Fink; do NOT install it. (Note that the public beta of Apple's X11 for Jaguar is no longer available, so this is only an option for you if you already have this installed, from the time in which it was available.)</p>
          </li>
        </ul><p>There are other options, as well. There is a more extensive
        treatment in the <a href="http://fink.sourceforge.net/doc/x11/index.php">Running X11
        document</a>.</p></div>
    </a>
    <a name="no-display">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.6: When I try to run an application, I get a message that says "cannot
        open display:". What do I need to do?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This error means that the system isn't connecting with your X
        display. Make sure you do the following:</p><p>1. Start X (Apple's X11, XFree86, ...).</p><p>2. Make sure your DISPLAY environment variable is set correctly. If
        you are using the default setup for X, you can do this with</p><pre>setenv DISPLAY :0</pre><p>if you are running <code>tcsh</code>, or</p><pre>export DISPLAY=:0</pre><p>if you're running <code>bash</code>.</p></div>
    </a>
    <a name="suggest-package">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.7: I don't see my favorite program in Fink. How do I suggest a new
        package for inclusion in Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Make the request on the <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package
        Request Tracker</a> on the Fink project page.</p><p>Note that you must have a SourceForge id to do so.</p></div>
    </a>
    <a name="virtpackage">
      
      <div class="question"><p><b><? echo FINK_Q ; ?>8.8: What are all these <code>system-*</code> "virtual
	  packages" that are sometimes present, but that I can't
	  seem to install or remove myself?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
	  Packages with names like <code>system-perl</code> are
	  placeholder packages. These do not contain actual files, but
	  merely serve as a mechanism for fink to know about programs
	  that have been installed manually outside of fink.
	</p><p>
	  Starting with the 10.3 distribution, most placeholders
	  aren't even real packages that you can install and remove.
	  Instead, they are "Virtual Packages", package data
	  structures generated by the fink program itself in response
	  to a preconfigured list of manually installed programs. For
	  each virtual package, fink checks for certain files in
	  certain locations, and if they are found, considers that
	  virtual package "installed".
	</p><p>
	  You can run the program <code>fink-virtual-pkgs</code>
	  (part of the fink package) to get a listing of exactly what
	  fink thinks is installed. Adding the <code>--debug</code>
	  flag will give lots of diagnostic information about exactly
	  what files fink is checking.
	</p><p>
	  Unfortunately, there is no mechanism by which you can
	  install an arbitrary program yourself (outside of fink) and
	  have fink recognize that program rather than trying to
	  install its own version of it. It's just too difficult in
	  the general case to be able to check configure and compiler
	  flags, pathnames, etc.
	</p><p>
	  Here are the most important virtual packages that fink
	  defines (as of fink-0.19.2):
	</p><ul>
          <li>system-perl: [virtual package representing perl]
	    <p>
	      Represents <code>/usr/bin/perl</code>, which is
	      part of the default OS X installation. This package also
	      provides <code>system-perlXXX</code> and
	      <code>perlXXX-core</code> according to the version X.X.X
	      of that perl interpreter.
	    </p>
          </li>
          <li>system-javaXXX: [virtual package representing Java X.X.X]
	    <p>
	      Represents the Java Runtime Environment, which is part of OS
	      X (and Apple's Software Update). See
	      <a href="http://www.apple.com/java">Apple's Java
	      page</a> for more information.
	    </p>
          </li>
          <li>system-javaXXX-dev: [virtual package representing Java X.X.X development headers]
	    <p>
	      Represents the Java SDK, which must be manually
	      downloaded from <a href="http://connect.apple.com">connect.apple.com</a>
	      (free registration required) and installed. If you have
	      updated your Java Runtime Environment, your SDK may not
	      be updated automatically (and may even be deleted!).
	      Remember to check for (and download and install if
	      necessary) the SDK after installing or upgrading your
	      Runtime Environment. See also <a href="comp-general.php?phpLang=en#system-java">this FAQ
	      entry</a>.
	    </p>
          </li>
          <li>system-java3d: [virtual package representing Java3D]</li>
          <li>system-javaai: [virtual package representing Java Advanced Imaging]
	    <p>
	      Represent Java extensions for 3D graphics and image
	      processing, which must be manually downloaded from Apple
	      and installed. See <a href="http://docs.info.apple.com/article.html?artnum=120289">Apple'
	      webpage</a> for more information.
	    </p>
          </li>
          <li>system-xfree86: [placeholder for user installed x11]</li>
          <li>system-xfree86-shlibs: [placeholder for user installed x11 shared libraries]
	    <p>
	      Represent Apple's X11/XDarwin, an optional part of OS X
	      (X11User.pkg). These packages provide <code>x11</code>
	      and <code>x11-shlibs</code>, respectively. See
	      also <a href="comp-packages.php?phpLang=en#cant-install-xfree">this FAQ entry</a>.
	    </p>
          </li>
          <li>system-xfree86-dev [placeholder for user installed x11 development tools]
	    <p>
	      Represents Apple's X11/XDarwin SDK, an optional part of
	      OS X (X11SDK.pkg). This package provides
	      <code>x11-dev</code>. See also <a href="comp-packages.php?phpLang=en#cant-install-xfree">this FAQ entry</a>.
	    </p>
          </li>
        </ul></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-packages.php?phpLang=en">9. Package Usage Problems - Specific Packages</a></p>
<? include_once "../footer.inc"; ?>


