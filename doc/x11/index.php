<?
$title = "Running X11";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/10/31 16:05:18';

$metatags = '<link rel="start" href="index.php" title="Running X11 Contents"><link rel="next" href="intro.php" title="Introduction">';

include "header.inc";
?>

<h1>Running X11 on Darwin and Mac OS X</h1>
<p>
This document is about running X11 / XFree86 / Xtools on Apple's Mac
OS X and Darwin systems.
It gives an introduction and a history of development, then goes on to
describe the current situation and the many options you have to use
X11 with or without Fink.
</p>
<h2>Contents</h2><ul>
<li><a href="intro.php"><b>Introduction</b></a></li>
<ul>
<li><a href="intro.php#def-x11">What is X11?</a></li>
<li><a href="intro.php#def-macosx">What is Mac OS X?</a></li>
<li><a href="intro.php#def-darwin">What is Darwin?</a></li>
<li><a href="intro.php#def-xfree86">What is XFree86?</a></li>
<li><a href="intro.php#def-xtools">What is Xtools?</a></li>
<li><a href="intro.php#client-server">Client and Server</a></li>
<li><a href="intro.php#rootless">What does rootless mean?</a></li>
<li><a href="intro.php#wm">What is a window manager?</a></li>
</ul>
<li><a href="history.php"><b>History</b></a></li>
<ul>
<li><a href="history.php#early">The early days</a></li>
<li><a href="history.php#xonx-forms">XonX forms</a></li>
<li><a href="history.php#root-or-not">To root or not to root</a></li>
</ul>
<li><a href="inst-xfree86.php"><b>Getting and Installing XFree86</b></a></li>
<ul>
<li><a href="inst-xfree86.php#official-binary">The Official Binaries</a></li>
<li><a href="inst-xfree86.php#official-source">The Official Source</a></li>
<li><a href="inst-xfree86.php#latest-cvs">The Latest Development Source</a></li>
<li><a href="inst-xfree86.php#xonx-bin">The XonX binary test releases (XAqua,
XDarwin)</a></li>
<li><a href="inst-xfree86.php#fink">Installing through Fink</a></li>
<li><a href="inst-xfree86.php#macgimp">MacGimp</a></li>
<li><a href="inst-xfree86.php#rootless">Roaming Rootless Servers</a></li>
<li><a href="inst-xfree86.php#fink-summary">Fink package summary</a></li>
</ul>
<li><a href="run-xfree86.php"><b>Starting XFree86</b></a></li>
<ul>
<li><a href="run-xfree86.php#darwin">Darwin</a></li>
<li><a href="run-xfree86.php#macosx-41">Mac OS X + XFree86 4.1.0</a></li>
<li><a href="run-xfree86.php#macosx-42">Mac OS X + XFree86 CVS</a></li>
<li><a href="run-xfree86.php#xinitrc">The .xinitrc File</a></li>
</ul>
<li><a href="xtools.php"><b>Xtools</b></a></li>
<ul>
<li><a href="xtools.php#install">Installing Xtools</a></li>
<li><a href="xtools.php#run">Running Xtools</a></li>
<li><a href="xtools.php#opengl">OpenGL Notes</a></li>
</ul>
<li><a href="other.php"><b>Other X11 Possibilities</b></a></li>
<ul>
<li><a href="other.php#vnc">VNC</a></li>
<li><a href="other.php#wiredx">WiredX</a></li>
<li><a href="other.php#exodus">eXodus</a></li>
</ul>
<li><a href="trouble.php"><b>Troubleshooting XFree86</b></a></li>
<ul>
<li><a href="trouble.php#immedate-quit">When I launch XDarwin, it quits
or crashes almost immediately</a></li>
<li><a href="trouble.php#black">Black icons in the GNOME panel or in the
menu of a GNOME application</a></li>
<li><a href="trouble.php#keyboard">The keyboard doesn't work in XFree86</a></li>
<li><a href="trouble.php#delete-key">The Backspace key doesn't work</a></li>
<li><a href="trouble.php#locale">"Warning: locale not supported by C library"</a></li>
</ul>
<li><a href="tips.php"><b>Usage Tips</b></a></li>
<ul>
<li><a href="tips.php#terminal-app">Launching X11 apps from Terminal.app</a></li>
<li><a href="tips.php#open">Launching Aqua apps from an xterm</a></li>
<li><a href="tips.php#copy-n-paste">Copy and Paste</a></li>
</ul>
</ul><p>Generated from <i>$Fink: x11.xml,v 1.12 2001/10/31 16:05:18 chrisp Exp $</i></p>


<?
include "footer.inc";
?>
