<?
$title = "Running X11 - Starting XFree86";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/07/15 20:33:25';

$metatags = '<link rel="start" href="index.php" title="Running X11 Contents"><link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="xtools.php" title="Xtools"><link rel="prev" href="inst-xfree86.php" title="Getting and Installing XFree86">';

include "header.inc";
?>

<h1>Running X11 - Starting XFree86</h1>




<a name="darwin"><h2>Darwin</h2></a>
<p>
On pure Darwin, XFree86 behaves like on any other Unix.
The usual way to start it is via <tt><nobr>startx</nobr></tt> from the console;
that starts both the server and some initial clients like the window
manager and a terminal emulator with a shell.
On pure Darwin it is not necessary to specify any parameters, so you
can just type:
</p>
<pre>startx</pre>
<p>
You can customize what is started through several files in your home
directory.
<tt><nobr>.xinitrc</nobr></tt> controls what clients get started.
<tt><nobr>.xserverrc</nobr></tt> controls server options and may even start a
different server.
If you're having trouble (as in, you only get a blank screen or
XFree86 drops you right back to the console), you can start
troubleshooting by moving these files out of the way.
When <tt><nobr>startx</nobr></tt> doesn't find these files, it will use safe
defaults that should always work.
</p>
<p>
Alternatively, you can start the server directly with one of the XDMCP
options, like this:
</p>
<pre>X -query remotehost</pre>
<p>
Details about this can be found in the <tt><nobr>Xserver</nobr></tt> manual
page.
</p>
<p>
Finally, there is the option to set up <tt><nobr>xdm</nobr></tt>; read its
manual page for details.
</p>
<p>
Note: If you're running Mac OS X, you can type <tt><nobr>&gt;console</nobr></tt>
at the login window and you'll get a text console that is
equivalent to pure Darwin.
You can use all of the start methods outlined above, with the
exception of <tt><nobr>xdm</nobr></tt>.
</p>



<a name="macosx-41"><h2>Mac OS X + XFree86 4.1.0</h2></a>
<p>
This section describes starting the server from XFree86 4.1.0.
That also covers the rootless servers currently circulating; they are
based on a late development version of XFree86 4.1.0 and sufficiently
similar.
</p>
<p>
There are basically two ways to start XFree86 under Mac OS X.
One is double-clicking the XDarwin.app application in your
Applications folder.
When you start XFree86 this way it already knows you are running under
Quartz (or Aqua or whatever you choose to call the
graphical environment of Mac OS X).
It will fire up fullscreen mode automatically and start your clients
from the <tt><nobr>.xinitrc</nobr></tt> file.
However, there is no way to get rootless mode by double-clicking the
application.
</p>
<p>
The other way to start XFree86 under Mac OS X is via
<tt><nobr>startx</nobr></tt> from Terminal.app.
If you start the server this way, you must tell it that it should run
in parallel with Quartz.
You do this by passing the <tt><nobr>-quartz</nobr></tt> option, like this:
</p>
<pre>startx -- -quartz</pre>
<p>
That will start up the server in fullscreen mode, plus the clients in
your <tt><nobr>.xinitrc</nobr></tt>.
If the server you have supports rootless operation, you can start it
in rootless mode with the <tt><nobr>-rootless</nobr></tt> option:
</p>
<pre>startx -- -rootless</pre>



<a name="macosx-42"><h2>Mac OS X + XFree86 CVS</h2></a>
<p>
Recent development versions of XFree86 come with rootless mode built
in and let you choose between fullscreen and rootless mode in a dialog
at startup.
Just double-click the XDarwin.app application.
You can disable the dialog and set XDarwin to always use the mode of
your choice in the preferences.
</p>
<p>
You can still use startx and the command line options if you prefer.
The options to choose the mode have changed slightly.
The <tt><nobr>-quartz</nobr></tt> option no longer selects fullscreen mode, but
rather uses the default mode set in the preferences.
The <tt><nobr>-fullscreen</nobr></tt> option forces fullscreen mode, while
<tt><nobr>-rootless</nobr></tt> forces rootless mode.
</p>


<a name="xinitrc"><h2>The .xinitrc File</h2></a>
<p>
to be written...
</p>



<p align="right">
Next: <a href="xtools.php">Xtools</a></p>


<?
include "footer.inc";
?>
