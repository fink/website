<?
$title = "Running X11 - Troubleshooting";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/07/28 20:06:10';

$metatags = '<link rel="start" href="index.php" title="Running X11 Contents"><link rel="contents" href="index.php" title="Running X11 Contents"><link rel="prev" href="other.php" title="Other X11 Possibilities">';

include "header.inc";
?>

<h1>Running X11 - Troubleshooting and Tips</h1>



<a name=""><h2>When I launch XDarwin, it quits almost immediately</h2></a>
<p>
This usually happens when your <tt><nobr>.xinitrc</nobr></tt> isn't set up
correctly.
See also: <a href="run-xfree86.php#xinitrc">The .xinitrc File</a>.
</p>
<p>
What happens is that the <tt><nobr>.xinitrc</nobr></tt> is run and for some
reason terminates almost immediately.
<tt><nobr>xinit</nobr></tt> interprets this as "the user's session has ended"
and kills XDarwin.
Some common problems that lead to this:
</p>
<ul>

<li><p>
All apps are started in the background.
Instead the last one must be started if the foreground (no
<tt><nobr>&amp;</nobr></tt> at the end of the line), or better with
<tt><nobr>exec</nobr></tt>.
</p></li>

<li><p>
The app that should run in the foreground can't be found.
This can happen when you give just the name without the path
(e.g. <tt><nobr>xterm</nobr></tt>), but forget to set the shell's search path
(environment variable PATH).
Neither /usr/X11R6/bin nor /sw/bin are in the default path.
If you use Fink, just add an <tt><nobr>source /sw/bin/init.sh</nobr></tt> to
the start of the <tt><nobr>.xinitrc</nobr></tt>.
To set the path manually, use this piece:
</p>
<pre>PATH=$PATH:/usr/X11R6/bin
export PATH</pre>
</li>

<li><p>
The app that should run in the foreground doesn't start or quits
immediately for some other reason.
There are many possibilities here, like missing libraries or missing
configuration files.
WindowMaker for instance requires that you run
<tt><nobr>wmaker.inst</nobr></tt> once before using it.
A good troubleshooting tactic in this situation is to replace the
forground app with <tt><nobr>xterm</nobr></tt> and launch it manually from the
xterm that comes up.
This way you can see diagnostic messages.
</p></li>

</ul>
<p>
Of course, there's always the last reason: a bug in XDarwin.
But most of the time, it really boils down to one of the above, even
when XDarwin crashes after some seconds.
</p>



<a name="black"><h2>Black icons in the GNOME panel</h2></a>
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
To turn it off in the server, the server must be recompiled with a
special configuration setting; this is not practical for most users.
</p>
<p>
To turn the extension off in the clients, you can pass the
<tt><nobr>--no-xshm</nobr></tt> command line option when you start the
application.
In the case of the GNOME panel, you must edit your GNOME session file
(<tt><nobr>~/.gnome/session</nobr></tt>).
Be sure to pick the right section and add the <tt><nobr>--no-xshm</nobr></tt>
to the <tt><nobr>RestartCommand</nobr></tt> line, like in this example:
</p>
<pre>7,id=11c0a80208000099479218400000018970007
7,RestartStyleHint=2
7,Priority=40
7,Program=panel
7,CurrentDirectory=/Users/chrisp
7,CloneCommand=panel
7,RestartCommand=panel --sm-client-id 11c0a80208000099479218400000018970007 --no-xshm</pre>



<a name="terminal-app"><h2>Launching X11 apps from Terminal.app</h2></a>
<p>
To launch X11 applications from a Terminal.app window, you must set
the environment variable "DISPLAY".
This variable tells the applications where to find the X11 window
server.
In the default setup - XDarwin runs on the same machine, your shell is
tcsh - you can set the variable as follows:
</p>
<pre>setenv DISPLAY :0.0</pre>
<p>
A nice setup is to have XDarwin.app started when you log in (settable
in the Login panel of the System Preferences) and add the following to
your .cshrc:
</p>
<pre>if (! $?DISPLAY) then
  setenv DISPLAY :0.0
endif</pre>
<p>
This sets DISPLAY automatically in every shell.
It doesn't override the current value when DISPLAY is already set,
though.
This way you can still run X11 applications remotely or through ssh
with X11 tunneling.
</p>



<a name="keyboard"><h2>The keyboard doesn't work in XFree86</h2></a>
<p>
This is a known problem that so far seems to affect only portables
(PowerBook, iBook).
The problem is that the kernel's keymapping (which XFree86 read to
generate its own keymapping) sometimes is empty.
As a workaround, you can tell XFree86 to load a keymapping from a file
instead.
Under Mac OS X, go to the XDarwin preferences dialog, check the "Load
from file" checkbox and select the keymapping file to load.
After restarting XDarwin, your keyboard should mostly work (see
below).
</p>
<p>
If you're starting XFree86 from the command line, you can pass the
name of the keymapping file to load as an option, as in:
</p>
<pre>startx -- -keymap USA.keymapping</pre>



<a name="delete-key"><h2>The Backspace key doesn't work</h2></a>
<p>
This happens when you use the "Load keymapping from file" option
described above.
The mapping files describe the backspace key as "Delete", not as
"Backspace".
You can correct that by putting the following line in your .xinitrc
file:
</p>
<pre>xmodmap -e "keycode 59 = BackSpace"</pre>



<a name="locale"><h2>"Warning: locale not supported by C library"</h2></a>
<p>
These messages are quite common, but harmless.
It just means what it says - internationalization is not supported
through the standard C library, the program will use the default
messages, usually in English.
You can get rid of the messages by unsetting the environment variable
LANG.
Note that this will also turn internationalization off in programs
that actually support it (via gettext/libintl).
Example for .xinitrc:
</p>
<pre>unset LANG</pre>
<p>
Example for .cshrc:
</p>
<pre>unsetenv LANG</pre>






<?
include "footer.inc";
?>
