<?
$title = "Running X11";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/02/24 19:24:49';

$metatags = '<link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="intro.php" title="Introduction">';

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
<li><a href="intro.php"><b>1 Introduction</b></a></li>
<ul>
<li><a href="intro.php#def-x11">1.1 What is X11?</a></li>
<li><a href="intro.php#def-macosx">1.2 What is Mac OS X?</a></li>
<li><a href="intro.php#def-darwin">1.3 What is Darwin?</a></li>
<li><a href="intro.php#def-xfree86">1.4 What is XFree86?</a></li>
<li><a href="intro.php#def-xtools">1.5 What is Xtools?</a></li>
<li><a href="intro.php#client-server">1.6 Client and Server</a></li>
<li><a href="intro.php#rootless">1.7 What does rootless mean?</a></li>
<li><a href="intro.php#wm">1.8 What is a window manager?</a></li>
<li><a href="intro.php#desktop">1.9 What are Quartz/Aqua, Gnome, and KDE?</a></li>
</ul>
<li><a href="history.php"><b>2 History</b></a></li>
<ul>
<li><a href="history.php#early">2.1 The early days</a></li>
<li><a href="history.php#xonx-forms">2.2 XonX forms</a></li>
<li><a href="history.php#root-or-not">2.3 To root or not to root</a></li>
</ul>
<li><a href="inst-xfree86.php"><b>3 Getting and Installing XFree86</b></a></li>
<ul>
<li><a href="inst-xfree86.php#fink">3.1 Installing through Fink</a></li>
<li><a href="inst-xfree86.php#apple-binary">3.2 Apple's Binaries</a></li>
<li><a href="inst-xfree86.php#official-binary">3.3 The Official Binaries</a></li>
<li><a href="inst-xfree86.php#official-source">3.4 The Official Source</a></li>
<li><a href="inst-xfree86.php#latest-cvs">3.5 The Latest Development Source</a></li>
<li><a href="inst-xfree86.php#xonx-bin">3.6 The XonX binary test releases (XAqua,
XDarwin)</a></li>
<li><a href="inst-xfree86.php#macgimp">3.7 MacGimp</a></li>
<li><a href="inst-xfree86.php#rootless">3.8 Roaming Rootless Servers</a></li>
<li><a href="inst-xfree86.php#switching-x11">3.9 Replacing X11</a></li>
<li><a href="inst-xfree86.php#fink-summary">3.10 Fink package summary</a></li>
</ul>
<li><a href="run-xfree86.php"><b>4 Starting XFree86</b></a></li>
<ul>
<li><a href="run-xfree86.php#darwin">4.1 Darwin</a></li>
<li><a href="run-xfree86.php#macosx-41">4.2 Mac OS X + XFree86 4.x.0</a></li>
<li><a href="run-xfree86.php#xinitrc">4.3 The .xinitrc File</a></li>
</ul>
<li><a href="xtools.php"><b>5 Xtools</b></a></li>
<ul>
<li><a href="xtools.php#install">5.1 Installing Xtools</a></li>
<li><a href="xtools.php#run">5.2 Running Xtools</a></li>
<li><a href="xtools.php#opengl">5.3 OpenGL Notes</a></li>
</ul>
<li><a href="other.php"><b>6 Other X11 Possibilities</b></a></li>
<ul>
<li><a href="other.php#vnc">6.1 VNC</a></li>
<li><a href="other.php#wiredx">6.2 WiredX</a></li>
<li><a href="other.php#exodus">6.3 eXodus</a></li>
</ul>
<li><a href="trouble.php"><b>7 Troubleshooting XFree86</b></a></li>
<ul>
<li><a href="trouble.php#immedate-quit">7.1 When I launch XDarwin, it quits
or crashes almost immediately</a></li>
<li><a href="trouble.php#black">7.2 Black icons in the GNOME panel or in the
menu of a GNOME application</a></li>
<li><a href="trouble.php#keyboard">7.3 The keyboard doesn't work in XFree86</a></li>
<li><a href="trouble.php#delete-key">7.4 The Backspace key doesn't work</a></li>
<li><a href="trouble.php#locale">7.5 &quot;Warning: locale not supported by C library&quot;</a></li>
</ul>
<li><a href="tips.php"><b>8 Usage Tips</b></a></li>
<ul>
<li><a href="tips.php#terminal-app">8.1 Launching X11 apps from Terminal.app</a></li>
<li><a href="tips.php#open">8.2 Launching Aqua apps from an xterm</a></li>
<li><a href="tips.php#copy-n-paste">8.3 Copy and Paste</a></li>
</ul>
</ul><p>Generated from <i>$Fink: x11.xml,v 1.26 2003/02/24 19:24:49 alexkhansen Exp $</i></p>


<?
include "footer.inc";
?>

