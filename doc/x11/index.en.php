<?

$title = "Running X11";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/02/26 00:14:54';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=en\" title=\"Running X11 Contents\" /><link rel=\"next\" href=\"intro.php?phpLang=en\" title=\"Introduction\" />";

include_once "header.en.inc"; 
?><h1>Running X11 on Darwin and Mac OS X</h1>
    <p>
This document is about running X11 / XFree86 / Xtools on Apple's Mac
OS X and Darwin systems.
It gives an introduction and a history of development, then goes on to
describe the current situation and the many options you have to use
X11 with or without Fink.
</p>
  <h2>Contents</h2><ul>
<li><a href="intro.php?phpLang=en"><b>1 Introduction</b></a></li>
<ul>
<li><a href="intro.php?phpLang=en#def-x11">1.1 What is X11?</a></li>
<li><a href="intro.php?phpLang=en#def-macosx">1.2 What is Mac OS X?</a></li>
<li><a href="intro.php?phpLang=en#def-darwin">1.3 What is Darwin?</a></li>
<li><a href="intro.php?phpLang=en#def-xfree86">1.4 What is XFree86?</a></li>
<li><a href="intro.php?phpLang=en#def-xtools">1.5 What is Xtools?</a></li>
<li><a href="intro.php?phpLang=en#client-server">1.6 Client and Server</a></li>
<li><a href="intro.php?phpLang=en#rootless">1.7 What does rootless mean?</a></li>
<li><a href="intro.php?phpLang=en#wm">1.8 What is a window manager?</a></li>
<li><a href="intro.php?phpLang=en#desktop">1.9 What are Quartz/Aqua, Gnome, and KDE?</a></li>
</ul>
<li><a href="history.php?phpLang=en"><b>2 History</b></a></li>
<ul>
<li><a href="history.php?phpLang=en#early">2.1 The early days</a></li>
<li><a href="history.php?phpLang=en#xonx-forms">2.2 XonX forms</a></li>
<li><a href="history.php?phpLang=en#root-or-not">2.3 To root or not to root</a></li>
</ul>
<li><a href="inst-xfree86.php?phpLang=en"><b>3 Getting and Installing XFree86</b></a></li>
<ul>
<li><a href="inst-xfree86.php?phpLang=en#fink">3.1 Installing through Fink</a></li>
<li><a href="inst-xfree86.php?phpLang=en#apple-binary">3.2 Apple's Binaries</a></li>
<li><a href="inst-xfree86.php?phpLang=en#official-binary">3.3 The Official Binaries</a></li>
<li><a href="inst-xfree86.php?phpLang=en#official-source">3.4 The Official Source</a></li>
<li><a href="inst-xfree86.php?phpLang=en#latest-cvs">3.5 The Latest Development Source</a></li>
<li><a href="inst-xfree86.php?phpLang=en#macgimp">3.6 MacGimp</a></li>
<li><a href="inst-xfree86.php?phpLang=en#switching-x11">3.7 Replacing X11</a></li>
<li><a href="inst-xfree86.php?phpLang=en#fink-summary">3.8 Fink package summary</a></li>
</ul>
<li><a href="run-xfree86.php?phpLang=en"><b>4 Starting XFree86</b></a></li>
<ul>
<li><a href="run-xfree86.php?phpLang=en#darwin">4.1 Darwin</a></li>
<li><a href="run-xfree86.php?phpLang=en#macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></li>
<li><a href="run-xfree86.php?phpLang=en#xinitrc">4.3 The .xinitrc File</a></li>
</ul>
<li><a href="xtools.php?phpLang=en"><b>5 Xtools</b></a></li>
<ul>
<li><a href="xtools.php?phpLang=en#install">5.1 Installing Xtools</a></li>
<li><a href="xtools.php?phpLang=en#run">5.2 Running Xtools</a></li>
<li><a href="xtools.php?phpLang=en#opengl">5.3 OpenGL Notes</a></li>
</ul>
<li><a href="other.php?phpLang=en"><b>6 Other X11 Possibilities</b></a></li>
<ul>
<li><a href="other.php?phpLang=en#vnc">6.1 VNC</a></li>
<li><a href="other.php?phpLang=en#wiredx">6.2 WiredX</a></li>
<li><a href="other.php?phpLang=en#exodus">6.3 eXodus</a></li>
</ul>
<li><a href="trouble.php?phpLang=en"><b>7 Troubleshooting XFree86</b></a></li>
<ul>
<li><a href="trouble.php?phpLang=en#immedate-quit">7.1 When I launch XDarwin, it quits
or crashes almost immediately</a></li>
<li><a href="trouble.php?phpLang=en#black">7.2 Black icons in the GNOME panel or in the
menu of a GNOME application</a></li>
<li><a href="trouble.php?phpLang=en#keyboard">7.3 The keyboard doesn't work in XFree86</a></li>
<li><a href="trouble.php?phpLang=en#delete-key">7.4 The Backspace key doesn't work</a></li>
<li><a href="trouble.php?phpLang=en#locale">7.5 "Warning: locale not supported by C library"</a></li>
</ul>
<li><a href="tips.php?phpLang=en"><b>8 Usage Tips</b></a></li>
<ul>
<li><a href="tips.php?phpLang=en#terminal-app">8.1 Launching X11 apps from Terminal.app</a></li>
<li><a href="tips.php?phpLang=en#open">8.2 Launching Aqua apps from an xterm</a></li>
<li><a href="tips.php?phpLang=en#copy-n-paste">8.3 Copy and Paste</a></li>
</ul>
</ul><p>Generated from <i>$Id: index.en.php,v 1.1 2004/02/28 16:24:18 babayoshihiko Exp $</i></p><? include_once "../../footer.inc"; ?>
