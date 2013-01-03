<?
$title = "Running X11";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2013/01/03 18:17:34';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="intro.php?phpLang=en" title="Introduction">';


include_once "header.en.inc";
?>
<h1>Running X11 on Darwin and Mac OS X</h1>
    <p>
      This document is about running X11  on Apple's Mac
      OS X and Darwin systems.
      It gives an introduction and a history of development, then goes on to
      describe the current situation and the X11 options available.
    </p>
  <h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=en"><b>1 Introduction</b></a><ul><li><a href="intro.php?phpLang=en#def-x11">1.1 What is X11?</a></li><li><a href="intro.php?phpLang=en#def-macosx">1.2 What is Mac OS X?</a></li><li><a href="intro.php?phpLang=en#def-darwin">1.3 What is Darwin?</a></li><li><a href="intro.php?phpLang=en#def-xfree86">1.4 What is XFree86?</a></li><li><a href="intro.php?phpLang=en#def-xorg">1.5 What is X.org?</a></li><li><a href="intro.php?phpLang=en#def-xquartx">1.6 What is XQuartz?</a></li><li><a href="intro.php?phpLang=en#client-server">1.7 Client and Server</a></li><li><a href="intro.php?phpLang=en#rootless">1.8 What does rootless mean?</a></li><li><a href="intro.php?phpLang=en#wm">1.9 What is a window manager?</a></li><li><a href="intro.php?phpLang=en#desktop">1.10 What are Quartz/Aqua, Gnome, and KDE?</a></li></ul></li><li><a href="history.php?phpLang=en"><b>2 History</b></a><ul><li><a href="history.php?phpLang=en#early">2.1 The early days</a></li><li><a href="history.php?phpLang=en#xonx-forms">2.2 XonX forms</a></li><li><a href="history.php?phpLang=en#root-or-not">2.3 To root or not to root</a></li><li><a href="history.php?phpLang=en#apple-x11-distros">2.4 Apple's X11 distributions</a></li></ul></li><li><a href="inst-xfree86.php?phpLang=en"><b>3 Getting and Installing X11</b></a><ul><li><a href="inst-xfree86.php?phpLang=en#apple-binary">3.1 Apple's Distributions</a></li><li><a href="inst-xfree86.php?phpLang=en#fink">3.2 Using X11 via Fink</a></li></ul></li><li><a href="run-xfree86.php?phpLang=en"><b>4 Starting X11</b></a><ul><li><a href="run-xfree86.php?phpLang=en#display-server">4.1 Starting the Display Server</a></li><li><a href="run-xfree86.php?phpLang=en#xinitrc-d">4.2 Customizing startup using the .xinitrc.d directory</a></li><li><a href="run-xfree86.php?phpLang=en#xinitrc">4.3 The .xinitrc File</a></li><li><a href="run-xfree86.php?phpLang=en#xinitrc-pkg">4.4 The 'xinitrc' package</a></li></ul></li><li><a href="other.php?phpLang=en"><b>5 Other X11 Possibilities</b></a><ul><li><a href="other.php?phpLang=en#vnc">5.1 VNC</a></li><li><a href="other.php?phpLang=en#weirdx">5.2 WeirdX</a></li></ul></li><li><a href="trouble.php?phpLang=en"><b>6 Troubleshooting XFree86</b></a><ul><li><a href="trouble.php?phpLang=en#immediate-quit">6.1 When I launch X11, it quits
or crashes almost immediately</a></li><li><a href="trouble.php?phpLang=en#locale">6.2 "Warning: locale not supported by C library"</a></li></ul></li><li><a href="tips.php?phpLang=en"><b>7 Usage Tips</b></a><ul><li><a href="tips.php?phpLang=en#menu-items">7.1 Launching X11 apps from the Applications menu</a></li><li><a href="tips.php?phpLang=en#terminal-app">7.2 Launching X11 apps from Terminal.app</a></li><li><a href="tips.php?phpLang=en#open">7.3 Launching Aqua apps from an xterm</a></li><li><a href="tips.php?phpLang=en#copy-n-paste">7.4 Copy and Paste</a></li></ul></li></ul>
<!--Generated from $Fink: x11.en.xml,v 1.25 2013/01/03 18:17:34 alexkhansen Exp $-->
<? include_once "../../footer.inc"; ?>


