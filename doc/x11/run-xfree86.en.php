<?
$title = "Running X11 - Starting XFree86";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/05/22 03:06:12';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="xtools.php?phpLang=en" title="Xtools"><link rel="prev" href="inst-xfree86.php?phpLang=en" title="Getting and Installing XFree86">';

include_once "header.inc";
?>

<h1>Running X11 - 4 Starting XFree86</h1>
    
    
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
Note: If you are running Mac OS X Panther, you cannot start XFree86 from the console window.
</p>

    <h2><a name="macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></h2>
      
      <p>
There are basically two ways to start XFree86 under Mac OS X.
One is double-clicking the XDarwin.app application in your
Applications folder.  This will let you choose between full 
screen and rootless mode in a dialog at startup. You can disable 
the dialog and set XDarwin to always use the mode of your 
choice in the Preferences dialog.  
</p>
      <p>
Prior to 4.2.0 it would fire up fullscreen mode automatically, 
and there was no way to get rootless mode by double-clicking 
the application.
</p>
      <p>
The other way to start XFree86 under Mac OS X is via
<code>startx</code> from Terminal.app.
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
If the server you have supports rootless operation, 
you can start it in rootless mode with the 
<code>-rootless</code> option:</p>
      <pre>startx -- -rootless</pre>
      <p>
The <code>-quartz</code> option no longer selects fullscreen mode,
but rather uses the default mode set in the preferences.
</p>
      <p>As of 4.3, if you use <code>startx</code> without arguments, the startup dialog box will come up.</p>
    
    <h2><a name="xinitrc">4.3 The .xinitrc File</a></h2>
      
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
directory, XFree86 will use its default file,
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
A simple example that starts up GNOME:
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
 <p>To start GNOME 2.2 under Apple's X11, use the following sequence:</p>    
 <pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-session
</pre> 
<p>To start GNOME 2.4 under Apple's X11, metacity is started up automatically, so the sequence is:</p>    
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
   
  <p align="right">
Next: <a href="xtools.php?phpLang=en">5 Xtools</a></p>

<? include_once "footer.inc"; ?>
