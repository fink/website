<?php
$title = "Running X11 - Starting X11";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="other.php?phpLang=en" title="Other X11 Possibilities"><link rel="prev" href="inst-xfree86.php?phpLang=en" title="Getting and Installing X11">';


include_once "header.en.inc";
?>
<h1>Running X11 - 4. Starting X11</h1>
    
    
    <h2><a name="display-server">4.1 Starting the Display Server</a></h2>
      
      <p>
        There are basically three ways to start X11 under Mac OS X.
      </p>
      <p>
        One is by running the application bundle, e.g. via double-clicking the app in the Finder.
        This is typically <code>/Applications/Utilities/X11(.app)</code>, if you are on
        10.5-10.7, or <code>/Applications/Utilities/XQuartz(.app)</code> if you're using
        Xquartz (e.g. on 10.8).
      </p>
      <p>
        Another way is via entering 
        the <code>startx</code> command from a terminal window.
      </p>
      <p>
        The third method is to attempt to run a program that needs X11 from a terminal window.
        on 10.5 and later this will automatically start an X11 server.
      </p>
    
    <h2><a name="xinitrc-d">4.2 Customizing startup using the .xinitrc.d directory</a></h2>
      
      <p>
        The preferred method in current versions of X11 to customize your startup is to create a
        directory named <code>.xinitrc.d</code> at the top of your home directory, and to
        fill that with executable scripts to run programs that you want to use at startup, including window
        managers
      </p>
      <p>
        <b>Important:</b> make sure to put an '&amp;'; after the names of programs that
        aren't window managers, or they will block other programs, including a window manager,
        from being run.  Also make sure that window managers do <b>not</b> have an
        '&amp;' after their names or they won't remain running, unless there is a session manager.
        that is set to run after them.  The <code>xinit</code>
        program interprets such a condition that as "the session has ended, I should kill the X server
        now, too".
      </p>
      <p>
        Example:  to run the <code>WindowMaker</code> window manager on startup, start
        with the following commands:
      </p>
      <pre>mkdir -p $HOME/.xinitrc.d
nano $HOME/.xinitrc.d/94-wmaker.sh</pre>
      <p>
        (or use your favorite editor).  Then put the following contents in
        <code>94-wmaker.sh</code>:</p>
      <pre>. /opt/sw/bin/init.sh
quartz-wm --only-proxy &amp;
exec wmaker
      </pre>
      <p>Save the file, then use</p>
      <pre>chmod a+x 94-wmaker.sh</pre>
      <p>to make the script executable (<code>quartz-wm --only-proxy</code> will be discussed in a
      later section).</p>
      <p>
        Example:  to run the <code>xlogo</code> program on startup, start
        with the following commands:
      </p>
      <pre>mkdir -p $HOME/.xinitrc.d
nano $HOME/.xinitrc.d/74-xlogo.sh</pre>
      <p>
        (again, feel free to use your favorite editor).  Then put the following contents in
        <code>74-xlogo.sh</code>:</p>
      <pre>. /opt/sw/bin/init.sh
xlogo &amp;</pre>
      <p>Save the file, then use</p>
      <pre>chmod a+x 74-xlogo.sh</pre>
      <p>to make the script executable.</p>
      <p>
        If you were to create both scripts above, the result would be that X11 would start up, run
        <code>xlogo</code>, and then the <code>wmaker</code> window manager.
      </p>
      <p>
        Example: full GNOME session.  Create an executable <code>94-gnome-session.sh</code>
        with the following contents:
      </p>
      <pre>. /opt/sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-session</pre>
      <p>
        Example: rootless GNOME session.  Create an executable <code>94-gnome-panel.sh</code>
        with the following contents:
      </p>
      <pre>. /opt/sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-panel</pre>
      <p>
        Example: KDE3.  Create an executable <code>94-startkde.sh</code> with the following
        contents:
      </p>
      <pre>. /opt/sw/bin/init.sh
exec startkde</pre>
      <p>
        (startkde automatically starts a window manager and uses <code>quartz-wm --only-proxy</code>)
      </p>
      <p>
        Example: KDE4.  Create an executable <code>94-startkde.sh</code> with the following
        contents:
      </p>
      <pre>. /opt/sw/bin/init.sh
exec /opt/sw/opt/kde4/x11/bin/startkde</pre>
      <p><b>Notes:</b></p>
      <ul>
        <li>
          Starting each script with <code>. /opt/sw/bin/init.sh</code> ensures that programs which require
          other items from the Fink tree can find them.
        </li>
        <li>
          The scripts are processed in ASCII order, so use prefixes to change that, as per the '74'
          and '94' above.
        </li>
        <li>
          The scripts must be executable and have a <code>.sh</code> extension.  Changing the
          execute permissions provides a method to alter which programs are run without deleting
          the scripts.
        </li>
        <li>
          Fink's <code>xinitrc</code> package, which is in the dependency chain for GNOME and
          KDE, overrides some of the default X11 lookup behavior, including that for user customization.
          We recommend that you restore it as discussed in the <a href="#xinitrc-pkg">Fink
          'xinitrc' package section</a>.
        </li>
      </ul>
    
    <h2><a name="xinitrc">4.3 The .xinitrc File</a></h2>
      
      <p>
        <b>Note:</b>  the use of scripts in <a href="#xinitrc-d">$HOME/.xinitrc.d</a> is
        preferred.
      </p>
      <p>
        If a file named <code>.xinitrc</code> exists in your home
        directory, it will be used to start some initial X clients, e.g. the
        window manager and some xterms or a desktop environment like GNOME.
        The <code>.xinitrc</code> file is a <code>/bin/sh</code>
        script that contains the commands to do this.  
        It is <b>not</b> necessary to put the usual <code>#!/bin/sh</code>
        in the first line or to set the executable bit on the file;
        <code>xinit</code> will always run it through the <code>/bin/sh</code> shell.
      </p>
      <p>
        When there is no <code>.xinitrc</code> file in your home
        directory, and if <a href="#xinitrc-d">$HOME/.xinitrc.d</a> is not present, then
        X11 will use its default file,
        <code>/usr/X11/lib/X11/xinit/xinitrc</code>.
        You can use the default file as a starting point for your own
        .xinitrc:
      </p>
      <pre>cp /usr/X11/lib/X11/xinit/xinitrc ~/.xinitrc</pre>
      <p>
        To ensure reliable operation of Fink programs in <code>.xinitrc</code>, you should
        put <code>. /opt/sw/bin/init.sh</code> right at the beginning of the file to make sure the
        environment is set up correctly.
      </p>
      <p>
        You can put fairly arbitrary commands in an <code>.xinitrc</code>,
        but there are some caveats.
        First, the shell that interprets the file will by default wait for
        every program to finish before it starts the next one.
        If you want several programs to run in parallel, you must tell the
        shell to put them "in the background" by adding a <code>&amp;</code> at
        the end of the line.
      </p>
      <p>
        Second, <code>xinit</code> waits for the <code>.xinitrc</code>
        script to finish and interprets that as "the session has ended, I should
        kill the X server now, too".
        This means that the last command of your <code>.xinitrc</code>
        must not be run in the background and it should be a long-living program.
        Customarily, the window manager or session manager is used for this purpose.
        In fact, most window managers or session managers assume that <code>xinit</code> is
        waiting for them to finish and use this to make the "Log out" entry in
        their menus work.
        (Note: To save some memory and CPU cycles, you can put an
        <code>exec</code> before the last line like in the examples below.)
      </p>
      <p>
        Example:  turn the X11 bell off, starts some clients and finally execute the Enlightenment
        window manager:</p>
      <pre>. /opt/sw/bin/init.sh

xset b off

xclock -geometry -0+0 &amp;
xterm &amp;
xterm &amp;

exec enlightenment</pre>
      <p>Example: start GNOME:</p>
      <pre>. /opt/sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-session</pre>
      <p>Finally, to start KDE3:</p>
      <pre>. /opt/sw/bin/init.sh
exec startkde
</pre>
    
    <h2><a name="xinitrc-pkg">4.4 The 'xinitrc' package</a></h2>
      
      <p>
        Certain Fink packages need to be able to perform actions upon X11 startup.  To allow them to
        do this, there is a package called <code>xinitrc</code> (somewhat confusing, admittedly). 
        One side effect of installing this package, which is in the dependency chains of GNOME and KDE,
        is to circumvent the <a href="#xinitrc-d">default</a> behavior of using scripts from
        <code>$HOME/.xinitrc.d</code>.  There are currently a couple of methods available to
        allow user customization of the X11 startup <b>and</b> allow Fink packages to do their
        startup tasks:
      </p>
      <ul>
        <li>
          <p>
            The <code>xinitrc</code> package provides adminstrator entry points. Create the file
            <code>/opt/sw/etc/xinitrc-last-hook</code> as a superuser, and
            give it the following contents:
          </p>
          <pre>#!/bin/sh
. /usr/X11/lib/X11/xinit/xinitrc.d/98-user.sh</pre>
          <p>
            This will restore the <a href="#xinitrc-d">default</a> behavior of looking in
            <code>$HOME/.xinitrc.d</code> for executable scripts.
          </p>
        </li>
        <li>
          <p>
            Create a <code>$HOME/.xinitrc</code> as per the <a href="#xinitrc">.xinitrc</a>
            section above.  Fink's <code>xinitrc</code> package overwrites the system's default
            version with its own, and so you will be using Fink's version.
          </p>
          <p>
            The appropriate place to add additional programs that you want to run is immediately above
            the line that says 
          </p>
          <pre># start the window manager</pre>
        </li>
      </ul>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="other.php?phpLang=en">5. Other X11 Possibilities</a></p>
<?php include_once "../../footer.inc"; ?>


