<?
$title = "Running X11 - Tips";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/05/21 15:36:55';

$metatags = '<link rel="contents" href="index.php" title="Running X11 Contents"><link rel="prev" href="trouble.php" title="Troubleshooting XFree86">';

include "header.inc";
?>

<h1>Running X11 - 8 Usage Tips</h1>


<h2><a name="terminal-app">8.1 Launching X11 apps from Terminal.app</a></h2>

<p>
To launch X11 applications from a Terminal.app window, you must set
the environment variable &quot;DISPLAY&quot;.
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

<h2><a name="open">8.2 Launching Aqua apps from an xterm</a></h2>

<p>
One way to launch Aqua applications from an xterm (or any other shell,
actually) is the <code>open</code> command.
Some examples:
</p>
<pre>open /Applications/TextEdit.app
open SomeDocument.rtf
open -a /Applications/TextEdit.app index.html</pre>
<p>
The second example opens the document in the application that is
associated with it, the third example explicitly gives an application
to use.
</p>

<h2><a name="copy-n-paste">8.3 Copy and Paste</a></h2>

<p>
Copy and Paste generally works between the Aqua and X11 environments.
There are still some bugs.
Emacs is reported to be picky about the current selection.
Copy and paste from Classic to X11 doesn't work.
</p>
<p>
Anyway, the trick is to use the respective methods of the environment
you're in.
To transfer text from Aqua to X11, use Cmd-C in Aqua, then bring the
destination window to the front and use the &quot;middle mouse button&quot;, i.e. Option-click
on a single-button mouse (this can be configured 
under XDarwin's Preferences), to paste.
To transfer text from X11 to Aqua, simply select the text with the
mouse in X11, then use Cmd-V in Aqua to paste it.
</p>
<p>
The X11 system actually has several separate clipboards (called &quot;cut
buffers&quot; in X11 speak), and some applications have weird views which
one should be used.
In particular, pasting into GNU Emacs or XEmacs sometimes doesn't work
because of this.
The program <code>autocutsel</code> can help here; it automatically
synchronizes the two main cut buffers.
To run it, install the autocutsel Fink package and add the following
line to your .xinitrc:
</p>
<pre>autocutsel &amp;</pre>
<p>
(Make sure it's <b>before</b> the line that exec's the window
manager and never returns! Don't just add it at the end, it won't
be executed.)
</p>
<p>If you are using Apple's X11, then you can use Command-C or Edit-&gt;Copy, as 
usual for Mac apps, to copy text to the clipboard.  However, pasting 
from the clipboard to Apple X11 via Command-V doesn't work yet.</p>




<?
include "footer.inc";
?>

