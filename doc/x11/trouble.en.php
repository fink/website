<?

$title = "Running X11 - Troubleshooting";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2004/02/29 22:31:42';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=en\" title=\"Running X11 Contents\">\n\t<link rel=\"next\" href=\"tips.php?phpLang=en\" title=\"Usage Tips\">\n\t<link rel=\"prev\" href=\"other.php?phpLang=en\" title=\"Other X11 Possibilities\" />";

include_once "header.en.inc"; 
?><h1>Running X11 - 7 Troubleshooting XFree86</h1>
    
    
    <h2><a name="immedate-quit">7.1 When I launch XDarwin, it quits
or crashes almost immediately</a></h2>
      
      <p>
First of all: Don't Panic!
There are lots of things than can go wrong with XFree86, and a good
number of them can cause startup failures.
Further, it is not unusual that XDarwin crashes when it experiences
startup problems.
This section tries to provide a comprehensive list of problems you may
come across.
But first, you need to gather two important pieces of information:
</p>
      <p>
        <b>XDarwin version.</b>
You can find the XDarwin version in the Finder by clicking
<b>once</b> on the XDarwin icon and then selecting "Show Info"
from the menu.
The version is only incremented when a new binary test release is made
by the XonX project, so "1.0a1" may actually be any version between
1.0a1 and 1.0a2.
</p>
      <p>
        <b>Error messages.</b>
These are essential in pinpointing the particular problem you
experience.
How you get the error messages depends on how you started XDarwin.
If you ran <code>startx</code> from a Terminal window, you'll have the
messages right there in that window.
Remember that you can scroll up.
If you started XDarwin by double-clicking the icon, the messages end
up in the system log, which you can access through the Console
application in the Utilities folder.
Be sure to pick the right set of messages, i.e. the last one.
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
wipes out /tmp on reboots and XDarwin doesn't run with root privileges
and doesn't need to.)
</p>
      <pre>QuartzAudioInit: AddIOProc returned 1852797029</pre>
      <pre>-[NSCFArray objectAtIndex:]: index (2) beyond bounds (2)</pre>
      <pre>kCGErrorIllegalArgument : CGSGetDisplayBounds (display 35434400)</pre>
      <pre>No core keyboard</pre>
      <p>
Class: Bogus.
These are follow-up errors that result when the server tries to reset
itself after a previous error.
During that, another copy of the startup banner is printed, followed
by one or more of the above messages because resetting the server
doesn't really work in the affected versions of XDarwin.
So when you see messages like these, scroll up in the Terminal
resp. Console window and look for another set of banner and messages.
This affects all versions up to and including XDarwin 1.0a3; it was
fixed after 1.0a3 was released.
</p>
      <pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>
      <p>
Class: Mostly harmless.
It is unknown where these messages come from and they seem to have no
impact on operations.
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
      <pre>Gdk-WARNING **: locale not supported by Xlib, locale set to C
Gdk-WARNING **: can not set locale modifiers</pre>
      <p>
Class: Bad, but not fatal.
These messages may appear in addition to the one above.
This indicates that XFree86's locale data files are not present.
It appears that this happens unreproducably when building XFree86 from
source.
Most applications will still work, GNU Emacs is a noteable exception.
</p>
      <pre>Unable to open keymapping file USA.keymapping.
Reverting to kernel keymapping.</pre>
      <p>
Class: Often fatal.
This can happen with XDarwin 1.0a1, with the "Load from file"
keymapping option enabled.
That version needs a full path when the file to load is set via the
Preferences dialog, but searches automatically when it is passed on
the command line.
The message will usually be followed by the "assert" message shown
below.
To fix this, follow the directions below.
</p>
      <pre>Fatal server error:
assert failed on line 454 of darwinKeyboard.c!</pre>
      <pre>Fatal server error:
Could not get kernel keymapping! Load keymapping from file instead.</pre>
      <p>
Class: Fatal.
Changes Apple made in Mac OS X 10.1 broke the code in XFree86 that
reads the keyboard layout from the operating system kernel;
the message above is the result of that.
You must use the "Load from file" keymapping option on Mac OS X 10.1.
The setting is in the XDarwin Preferences dialog.
Be sure that a file is selected (i.e. use the "Pick file" button) -
simply activating the check box may not be sufficient with some
versions of XDarwin.
If you can't get to the Preferences dialog because XDarwin closes
before you get a chance, run it from Terminal with the command
<code>startx -- -quartz -keymap USA.keymapping</code>.
This usually allows XDarwin to start up, and you can then make the
permanent choice in the Preferences dialog.
</p>
      <pre>Fatal server error:
Could not find keymapping file .</pre>
      <p>Class: Fatal (as it says).  This error is due to the absence of the keymapping files under Panther.  You need to install <code>xfree86-4.3.99-16</code> or later, since these versions don't need the keymapping files.</p>
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
      <pre>Fatal server error:
failed to connect as window server!</pre>
      <p>
Class: Fatal.
This means that the console-mode server (for pure Darwin) got started
while you were logged into Aqua.
Usually this happens when you installed the official XFree86 binary
distribution and left out the Xquartz.tgz tarball.
It can also happen when the symlinks in /usr/X11R6/bin are messed up
or when you issue the command <code>XDarwin</code> in a Terminal
window to start the server (you should use startx instead in that
case, see <a href="run-xfree86.php?phpLang=en">Starting XFree86</a>).
</p>
      <p>
In any case, you can run <code>ls -l /usr/X11R6/bin/X*</code> and
check the output.
You should see four relevant entries:
<code>X</code>, a symlink pointing at <code>XDarwinStartup</code>;
<code>XDarwin</code>, an executable file (this is the console
mode server);
<code>XDarwinQuartz</code>, a symlink pointing at
<code>/Applications/XDarwin.app/Contents/MacOS/XDarwin</code>;
and <code>XDarwinStartup</code>, a small executable file.
If any of these are missing or pointing at different files, you need
to fix that.
How you do that depends on the method you used to install XFree86.
See the <a href="inst-xfree86.php?phpLang=en#rootless">Roaming
Rootless Servers</a> section for more hints.
</p>
      <pre>The XKEYBOARD keymap compiler (xkbcomp) reports:
&gt; Error:            Can't find file "unknown" for geometry include
&gt;                   Exiting
&gt;                   Abandoning geometry file "(null)"
Errors from xkbcomp are not fatal to the X server</pre>
      <p>
Class: Mostly harmless.
As the message says, it is not fatal.
To my knowledge, XDarwin doesn't use the XKB extension at all.
Probably some client program tries to use it anyway...
</p>
      <pre>startx: Command not found.</pre>
      <p>
Class: Fatal.
This can happen with XDarwin 1.0a2 and 1.0a3 when your shell
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
by running XDarwin through sudo,
and probably some other freak accidents.
The usual fix is to delete the .Xauthority file (which stores the
authentication data) in your home directory and re-create an empty
file:
</p>
      <pre>cd
rm .Xauthority
touch .Xauthority</pre>
      <p>
Another common cause for XFree86 startup failures is an incorrect
<code>.xinitrc</code> file.
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
    
    <h2><a name="black">7.2 Black icons in the GNOME panel or in the
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
The GIMP and the GNOME panel have been innoculated as well.
If you experience black icons in another application, start that
application with the <code>--no-xshm</code> command line option.
</p>
    
    <h2><a name="keyboard">7.3 The keyboard doesn't work in XFree86</a></h2>
      
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
    
    <h2><a name="delete-key">7.4 The Backspace key doesn't work</a></h2>
      
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
    
    <h2><a name="locale">7.5 "Warning: locale not supported by C library"</a></h2>
      
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
    
  <p align="right">
Next: <a href="tips.php?phpLang=en">8 Usage Tips</a></p><? include_once "../../footer.inc"; ?>
