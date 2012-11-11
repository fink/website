<?
$title = "Running X11 - Starting X11";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="xtools.php?phpLang=en" title="Xtools"><link rel="prev" href="inst-xfree86.php?phpLang=en" title="Getting and Installing X11">';


include_once "header.en.inc";
?>
<h1>Running X11 - 4. Starting X11</h1>
    
    
    <h2><a name="darwin">4.1 Darwin</a></h2>
      
      <p>
On pure Darwin, XFree86 behaves like on any other Unix.
The usual way to start it is via <code>startx</code> from the console;
that starts both the server and some initial clients like the window
manager and a terminal emulator with a shell.
On pure Darwin it is not necessary to specify any parameters, so you
can just type:
</p>
      <pre>startx</pre>
      <p>
You can customize what is started through several files in your home
directory.
<code>.xinitrc</code> controls what clients get started.
<code>.xserverrc</code> controls server options and may even
start a different server.
If you're having trouble (as in, you only get a blank screen or
XFree86 drops you right back to the console), you can start
troubleshooting by moving these files out of the way.
When <code>startx</code> doesn't find these files, it will use safe
defaults that should always work.
</p>
      <p>
Alternatively, you can start the server directly with one of the XDMCP
options, like this:
</p>
      <pre>X -query remotehost</pre>
      <p>
Details about this can be found in the <code>Xserver</code> manual
page.
</p>
      <p>
Finally, there is the option to set up <code>xdm</code>; read its
manual page for details.
</p>
      <p>
Note: If you're running Mac OS X anterior to Panther, you can type <code>&gt;console</code>
at the login window and you'll get a text console that is
equivalent to pure Darwin.
In case you don't see a field to enter a user's name in the login window, just type the first letter of whichever user's name, following by option-return.
You can use all of the start methods outlined above, with the
exception of <code>xdm</code>.
</p>
      <p>
Note: If you are running Mac OS X Panther or later, you cannot start XFree86 from the console window.
</p>
    
    <h2><a name="macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></h2>
      
       <p>
There are basically two ways to start XFree86 under Mac OS X.
One is double-clicking the <code>XDarwin.app</code> application in your
<code>Applications</code> folder.  This will let you choose between full 
screen and rootless mode in a dialog at startup. You can disable 
the dialog and set XDarwin always to use the mode of your 
choice in the Preferences dialog.  
</p>
      <p>
Prior to 4.2.0 it would fire up fullscreen mode automatically, 
and there was no way to get rootless mode by double-clicking 
the application.
</p>
      <p>
The other way to start XFree86 under Mac OS X is via
<code>startx</code> from <code>Terminal.app</code>.
If you start the server this way, you must tell it that it should run
in parallel with Quartz.
You do this by passing the <code>-fullscreen</code> option, like this:
</p>
      <pre>startx -- -fullscreen</pre>
      <p>
That will start up the server in fullscreen mode, 
plus the clients in your <code>.xinitrc</code>.  
</p>
      <p>
NOTE: prior to 4.2, <code>-quartz</code> was used for fullscreen mode.
</p>
      <p>

You can start it in rootless mode with the 
<code>-rootless</code> option:</p>
      <pre>startx -- -rootless</pre>
      <p>
The <code>-quartz</code> option no longer selects fullscreen mode,
but rather uses the default mode set in the preferences.
</p>
      <p>As of version 4.3, if you use <code>startx</code> without arguments, the startup dialog box will come up.</p>
    
    <h2><a name="starting-xorg">4.3 Starting X.org</a></h2>
      
     <p>X.org works identically to XFree86 in all respects.</p>
    
    <h2><a name="starting-apples-x11">4.4 Starting Apple's X11</a></h2>
      
       <p>
	Functionally, Apple's X11 works similarly to XFree86 (e.g. using a <code>.xinitrc</code> file to control the clients that are launched on startup).  The normal way to run it is by double-clicking the <code>X11.app</code> icon (whose default location is <code>/Applications/Utilities</code>).  You can use <code>startx</code>, as well, but it doesn't have a commmand-line option to set the display mode; <code>X11.app</code> will start up in whatever mode was previously set in its Preferences.</p>
<p>If you don't set up a different window manager you will be running Apple's <code>quartz-wm</code> window manager.  <b>X11.app</b>'s Preferences give the option to switch between fullscreen and rootless modes without restarting.  However, this doesn't work for quartz-wm; it is necessary to choose a different window manager (e.g. in <code>.xinitrc</code>)</p>
    
    <h2><a name="applex11tools">4.5 The applex11tools package</a></h2>
      
      <p>Fink's <code>applex11tools</code> package allows the use of <code>X11.app</code> and <code>quartz-wm</code> under OS 10.3 and later with XFree86 4.4 or later or X.org.</p>
      <p>To install this package you must enable the <a href="/faq/usage-fink.php#unstable">unstable tree</a>, and have <code>X11User.pkg</code> somewhere within <code>/Users</code> or <code>/Volumes</code>.  <code>X11.app</code> will be installed in the <code>Applications</code> folder within your Fink tree.  You can now use either <code>X11.app</code>  or <code>XDarwin.app</code>.</p>

    <h2><a name="xinitrc">4.6 The .xinitrc File</a></h2>
      
      <p>
If a file named <code>.xinitrc</code> exists in your home
directory, it will be used to start some initial X clients, e.g. the
window manager and some xterms or a desktop environment like GNOME.
The <code>.xinitrc</code> file is a shell script that contains
the commands to do this.
It is <b>not</b> necessary to put the usual <code>#!/bin/sh</code>
in the first line and to set the executable bit on the file;
xinit will still know how to run it through a shell.
</p>
      <p>
When there is no <code>.xinitrc</code> file in your home
directory, X11 will use its default file,
<code>/private/etc/X11/xinit/xinitrc</code>.
You can use the default file as a starting point for your own
.xinitrc:
</p>
      <pre>cp /private/etc/X11/xinit/xinitrc ~/.xinitrc</pre>
      <p>
If you're using Fink, you should source <code>init.sh</code> right at the beginning to make sure the environment is set up correctly.
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
Customarily, the window manager is used for this purpose.
In fact, most window managers assume that <code>xinit</code> is
waiting for them to finish and use this to make the "Log out" entry in
their menus work.
(Note: To save some memory and CPU cycles, you can put an
<code>exec</code> before the last line like in the examples below.)
</p>
      <p>
A simple example that starts up GNOME on XFree86 or Xorg:
</p>
      <pre>. /sw/bin/init.sh
exec gnome-session</pre>
      <p>A more complex example for bash users that turns the X11 bell off, starts some clients and finally executes the Enlightenment window manager:</p>
      <pre>. /sw/bin/init.sh

xset b off

xclock -geometry -0+0 &amp;
xterm &amp;
xterm &amp;

exec enlightenment</pre>
 
      <p>To start GNOME 2.4 and later under Apple's X11:</p>
      <pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
exec gnome-session
</pre>
      <p>To start KDE 3.2 (version &lt; 3.2.2-21) under Apple's X11</p>
      <pre>. /sw/bin/init.sh
export KDEWM=kwin
quartz-wm --only-proxy &amp;
/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1
</pre>
      <p>And finally to start the latest unstable version of KDE under Apple's X11:</p>
      <pre>. /sw/bin/init.sh
/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1
</pre>
    
    <h2><a name="oroborosx">4.7 OroborOSX</a></h2>
    
    <p><a href="http://oroborosx.sourceforge.net">OroborOSX</a> is an alternative to the X11.app and XDarwin display servers.  It requires a preexisting X11 installation to work.  <code>X11.app</code> or <code>XDarwin.app</code> continue to function, as well</p>
    <p>When run, <b>OroborOSX</b> starts its own rootless-only window manager, and doesn't read in either the system's <code>xinitrc</code> or user's <code>.xinitrc</code> files.  After starting, it does have a menu option to execute <code>.xinitrc</code>.  However, it does have its own method to set up applications to run when it starts.
It also provides a mechanism to start X11 applications from the Finder via startup scripts.</p>  
<p>For more information visit the <a href="http://oroborosx.sourceforge.net">OroborOSX homepage</a>.</p>
      
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="xtools.php?phpLang=en">5. Xtools</a></p>
<? include_once "../../footer.inc"; ?>


