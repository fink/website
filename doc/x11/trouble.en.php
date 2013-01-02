<?
$title = "Running X11 - Troubleshooting";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2013/01/02 02:49:03';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="tips.php?phpLang=en" title="Usage Tips (*Update Pending*)"><link rel="prev" href="other.php?phpLang=en" title="Other X11 Possibilities">';


include_once "header.en.inc";
?>
<h1>Running X11 - 6. Troubleshooting XFree86 (*Currently being updated*)</h1>
    
    
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
XDarwin 1.0a2 and later launch an interactive shell behind the scenes
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
initialization files are not set up to add /usr/X11R6/bin to the PATH
variable.
If you use Fink and haven't changed your default shell, adding the
line <code>source /sw/bin/init.csh</code> to <code>.cshrc</code>
in your home directory (as recommended by the Fink instructions) should
be sufficient.
</p>
      <pre>_XSERVTransSocketUNIXCreateListener: ...SocketCreateListener() failed
_XSERVTransMakeAllCOTSServerListeners: server already running</pre>
      <pre>Fatal server error:
Cannot establish any listening sockets - Make sure an X server isn't already
running</pre>
      <p>
Class: Fatal.
This can happen when you accidentally run several instances of XDarwin
at once,
or maybe after an unclean shutdown (i.e. crash) of XDarwin.
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
The client programs can't connect to the display server (XDarwin)
because they use bogus authentication data.
This can be caused by some VNC installations,
by running X11-based apps through sudo,
and probably some other freak accidents.
The usual fix is to delete the .Xauthority file (which stores the
authentication data) in your home directory and re-create an empty
file:
</p>
      <pre>cd
rm .Xauthority
touch .Xauthority</pre>
      
      <p>
        <b>No message.</b>
      </p>
      <p>
Another common cause for X11 startup failures is an incorrect startup file.  If the window manager
listed in <code>$HOME/.xinitrc</code> doesn't exist, then 
What happens is that the <code>.xinitrc</code> is run and for some
reason terminates almost immediately.
<code>xinit</code> interprets this as "the user's session has ended"
and kills XDarwin.
See the <a href="run-xfree86.php?phpLang=en#xinitrc">.xinitrc
section</a> for more details.
Remember to set up the PATH and to have one long-lived program that is
not started in the background.
It is a good idea to add <code>exec xterm</code> as a fallback when
your window manager or similar can't be found.
</p>
    
    <h2><a name="black">6.2 Black icons in the GNOME panel or in the
menu of a GNOME application</a></h2>
      
      <p>
A common problem is that icons or other images are displayed as black
rectangles or black outlines.
Ultimately, this is caused by limitations in the operating system
kernel.
The problem has been reported to Apple, but so far they seem unwilling
to fix it; see the filed <a href="http://www.opensource.apple.com/bugs/X/Kernel/2691632.html">Darwin
bug report</a> for details.
</p>
      <p>
The current situation is that the MIT-SHM extension of the X11
protocol is practically unusable on Darwin and Mac OS X.
There are two ways to turn the protocol extension off: in the server
or in the clients.
The XFree86 servers installed by Fink (i.e. the xfree86-server and
xfree86-rootless packages) have it turned off.
The GIMP and the GNOME panel have been inoculated as well.
If you experience black icons in another application, start that
application with the <code>--no-xshm</code> command line option.
</p>
    
    <h2><a name="keyboard">6.3 The keyboard doesn't work in XFree86</a></h2>
      
      <p>
This is a known problem that so far seems to affect only portables
(PowerBook, iBook).
To work around this, the "Load from file" keymapping option was
implemented.
Nowadays it has become the default because the old method (reading the
mapping from the kernel) stopped working with Mac OS X 10.1.
If you haven't enabled the option already, you can do so in the
XDarwin preferences dialog.
Check the "Load from file" checkbox and select the keymapping file to
load.
After restarting XDarwin, your keyboard should mostly work (see
below).
</p>
      <p>
If you're starting XFree86 from the command line, you can pass the
name of the keymapping file to load as an option, as in:
</p>
      <pre>startx -- -quartz -keymap USA.keymapping</pre>
    
    <h2><a name="delete-key">6.4 The Backspace key doesn't work</a></h2>
      
      <p>
This can happen when you use the "Load keymapping from file" option
described above.
The mapping files describe the backspace key as "Delete", not as
"Backspace".
You can correct that by putting the following line in your .xinitrc
file:
</p>
      <pre>xmodmap -e "keycode 59 = BackSpace"</pre>
      <p>
If I remember correctly, XDarwin 1.0a2 and later have code that
correctly maps the Backspace key automatically.
</p>
    
    <h2><a name="locale">6.5 "Warning: locale not supported by C library"</a></h2>
      
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
(10.1 only) Use the <code>libxpg4</code> Fink package.
It builds a small library that contains working locale functions and
arranges that it is loaded before the system libraries (using the
DYLD_INSERT_LIBRARIES environment variable).
You may have to set the LANG environment variable to a fully qualified
value, e.g. <code>de_DE.ISO_8859-1</code> instead of <code>de</code>
or <code>de_DE</code>.
</p>
        </li>
        <li>
          <p>
Ask Apple to include proper locale support in a future version of Mac
OS X.
</p>
        </li>
      </ul>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="tips.php?phpLang=en">7. Usage Tips (*Update Pending*)</a></p>
<? include_once "../../footer.inc"; ?>


