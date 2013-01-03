<?
$title = "Running X11 - Troubleshooting";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2013/01/03 18:17:34';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="tips.php?phpLang=en" title="Usage Tips"><link rel="prev" href="other.php?phpLang=en" title="Other X11 Possibilities">';


include_once "header.en.inc";
?>
<h1>Running X11 - 6. Troubleshooting XFree86</h1>
    
    
    <h2><a name="immediate-quit">6.1 When I launch X11, it quits
or crashes almost immediately</a></h2>
      
      <p>
        First of all: Don't Panic!
        There are lots of things than can go wrong with X11, and a good
        number of them can cause startup failures.
        Further, it is not unusual that X11 crashes when it experiences
        startup problems.
        This section tries to provide a comprehensive list of problems you may
        come across.
        But first, you need to gather two important pieces of information:
      </p>
      <p>
        <b>Display server version.</b>
        You can find the version of the display server in the Finder by clicking
        <b>once</b> on the X11 or XQuartz icon and then selecting "Get Info"
        from the menu.
      </p>
      <p>
        <b>Error messages.</b>
These are essential in pinpointing the particular problem you
experience.
How you get the error messages depends on how you started X11.
If you ran <code>startx</code> from a Terminal window, you'll have the
messages right there in that window.
Remember that you can scroll up.
If you started X11 by double-clicking the X11 or XQuartz icon, the messages end
up in the system log, which you can access through the Console
application in the Utilities folder.
Be sure to pick the right set of messages, e.g. the last one.
</p>
      <p>
We'll start with a list of the messages you may see:
</p>
      <pre>_XSERVTransmkdir: Owner of /tmp/.X11-unix should be set to root</pre>
      <pre>_IceTransmkdir: Owner of /tmp/.ICE-unix should be set to root</pre>
      <p>
Class: Harmless.
X11 creates hidden directories in /tmp to store the socket "files" for
local connections.
For security reasons, X11 prefers if these directories are owned by
root, but since they are world-writable anyway it will still run
without any problems.
(Note: It's quite hard to have these dirs owned by root, as Mac OS X
wipes out /tmp on reboots and X11 doesn't run with root privileges
and doesn't need to.)
    </p>
      <pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>
      <p>
        Class: Mostly harmless.
        This issue seems to have no impact on operations.
        You can get rid of them by running <code>touch .Xauthority</code> in
        your home directory.
    </p>
      <pre>Gdk-WARNING **: locale not supported by C library</pre>
      <p>
Class: Harmless.
This just means what it says and won't keep the application from
working.
For more information, <a href="#locale">see below</a>.
</p>
       <pre>Warning: no access to tty (Inappropriate ioctl for device).
Thus no job control in this shell.</pre>
      <p>
Class: Mostly harmless.
X11 launches an interactive shell behind the scenes
to run your client startup file (.xinitrc).
This was done so that you don't have to add statements to set up PATH
in that file.
Some shells complain that they're not connected to a real terminal,
but that can be ignored since that shell instance is not used for
anything that requires job control or the like.
</p>
      <pre>The XKEYBOARD keymap compiler (xkbcomp) reports:
&gt; Error:            Can't find file "unknown" for geometry include
&gt;                   Exiting
&gt;                   Abandoning geometry file "(null)"
Errors from xkbcomp are not fatal to the X server</pre>
      <p>
Class: Mostly harmless.
As the message says, it is not fatal.
To my knowledge, X11 on Macs doesn't use the XKB extension at all.
Probably some client program tries to use it anyway...
</p>
      <pre>startx: Command not found.</pre>
      <p>
        Class: Fatal.
        This can happen when your shell
        initialization files are not set up to add the X11 executable directory, e.g.
        <code>/usr/X11/bin</code>, to the PATH variable.  Fink is normally set
        up to do this automatically, so this may indicate that your Fink environment
        isn't being loaded.  Running</p>
      <pre>/sw/bin/pathsetup.sh</pre>
      <p>
        in a terminal window, and then starting a new window, will typically resolve this.
      </p>
      <pre>_XSERVTransSocketUNIXCreateListener: ...SocketCreateListener() failed
_XSERVTransMakeAllCOTSServerListeners: server already running</pre>
      <pre>Fatal server error:
Cannot establish any listening sockets - Make sure an X server isn't already
running</pre>
      <p>
Class: Fatal.
This can happen when you accidentally run several instances of X11
at once,
or maybe after an unclean shutdown (i.e. crash) of X11.
It might also be a file permission problem with the sockets for local
connections.
You can try to clean that up with <code>rm -rf /tmp/.X11-unix</code>.
Restarting the computer also helps in most cases (Mac OS X
automatically cleans up /tmp when it boots, and the network stack is
reset).
</p>
      <pre>Xlib: connection to ":0.0" refused by server
Xlib: Client is not authorized to connect to Server</pre>
      <p>
Class: Fatal.
The client programs can't connect to the display server (X11 or XQuartz)
because they use bogus authentication data.
This can be caused by some VNC installations,
by running X11-based apps through <code>sudo</code>,
and probably some other freak accidents.
The usual fix is to delete the <code>.Xauthority</code> file (which stores the
authentication data) in your home directory and re-create an empty
file:
</p>
      <pre>cd
rm .Xauthority
touch .Xauthority</pre>
      <p></p>
        <p><b>Possibly no obvious error:</b></p>
      <p>
Class: Fatal.
Probably the common cause for X11 startup failures is an incorrect startup file.
Typically, a window manager listed in <code>$HOME/.xinitrc</code> or
<code>$HOME/.xinitrc.d</code> doesn't get run due to
having been uninstalled, or not being in the PATH, or runs in
the background rather than the foreground due to having an '&amp;' at the end of its
line.  In any case, <code>$HOME/.xinitrc</code> reaches its end, <code>xinit</code>
interprets this as "the user's session has ended", and kills X11.  If the executable cannot be found,
there will be an error message to that effect in the terminal window or console log.  On the other hand,
if the last file has an '&amp;', there will be no error, but X11 will quit.
See the sections on <a href="run-xfree86.php?phpLang=en#xinitrc-d">.xinitrc.d</a> and
<a href="run-xfree86.php?phpLang=en#xinitrc">the .xinitrc file </a> for more details.</p>      
<p>To avoid this, remember to set up the PATH using</p>
<pre>. /sw/bin/init.sh</pre>
<p>in your startup files, 
and also to end with a long-lived program that is
not started in the background, e.g. a window manager or session manager with no '&amp;'.
You might also add <code>exec xterm</code> as a fallback for when
your window manager or other long-lived item can't be found, e.g. if you remove it.
</p>
    
     <h2><a name="locale">6.2 "Warning: locale not supported by C library"</a></h2>
      
      <p>
These messages are quite common, but harmless.
It just means what it says - internationalization is not supported
through the standard C library, the program will use the default
English messages, date formats, and so on.
There are several ways to deal with this:
</p>
      <ul>
        <li>
          <p>
Just ignore the messages.
</p>
        </li>
        <li>
          <p>
Get rid of the messages by unsetting the environment variable LANG.
Note that this will also turn internationalization off in programs
that actually support it (via gettext/libintl).
Example for .xinitrc:
</p>
          <pre>unset LANG</pre>
          <p>
Example for .cshrc:
</p>
          <pre>unsetenv LANG</pre>
        </li>
        <li>
          <p>
Ask Apple to include proper locale support in a future version of Mac
OS X.
</p>
        </li>
      </ul>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="tips.php?phpLang=en">7. Usage Tips</a></p>
<? include_once "../../footer.inc"; ?>


