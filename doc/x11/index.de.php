<?php
$title = "Running X11";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Running X11 Contents"><link rel="next" href="intro.php?phpLang=de" title="Einführung">';


include_once "header.de.inc";
?>
<h1>Running X11 on Darwin and Mac OS X</h1>
    <p>
      Diese Dokument beschreibt, wie man X11 auf Apples Mac OS X und Darwin
      laufen lässt. Nach einer Einführung wird die Geschichte
      beschrieben und dann die derzeitige Situation und die X11 Optionen,
      die zur Verfügung stehen.
    </p>
  <h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=de"><b>1 Einführung</b></a><ul><li><a href="intro.php?phpLang=de#def-x11">1.1 Was ist X11?</a></li><li><a href="intro.php?phpLang=de#def-macosx">1.2 Was ist Mac OS X?</a></li><li><a href="intro.php?phpLang=de#def-darwin">1.3 Was ist Darwin?</a></li><li><a href="intro.php?phpLang=de#def-xfree86">1.4 Was ist XFree86?</a></li><li><a href="intro.php?phpLang=de#def-xorg">1.5 Was ist X.org?</a></li><li><a href="intro.php?phpLang=de#def-xquartx">1.6 Was ist XQuartz?</a></li><li><a href="intro.php?phpLang=de#client-server">1.7 Klient und Server</a></li><li><a href="intro.php?phpLang=de#rootless">1.8 Was bedeutet rootless?</a></li><li><a href="intro.php?phpLang=de#wm">1.9 Was ist die Fensterverwaltung?</a></li><li><a href="intro.php?phpLang=de#desktop">1.10 Was sind Quartz/Aqua, Gnome und KDE?</a></li></ul></li><li><a href="history.php?phpLang=de"><b>2 Geschichte</b></a><ul><li><a href="history.php?phpLang=de#early">2.1 Die frühen Tage</a></li><li><a href="history.php?phpLang=de#xonx-forms">2.2 XonX Formulare</a></li><li><a href="history.php?phpLang=de#root-or-not">2.3 To root or not to root</a></li><li><a href="history.php?phpLang=de#apple-x11-distros">2.4 Apples X11-Distributionen</a></li></ul></li><li><a href="inst-xfree86.php?phpLang=de"><b>3 X11 beziehen und installieren</b></a><ul><li><a href="inst-xfree86.php?phpLang=de#apple-binary">3.1 Apples Distributionen</a></li><li><a href="inst-xfree86.php?phpLang=de#fink">3.2 Benutzung von X11 unter Fink</a></li></ul></li><li><a href="run-xfree86.php?phpLang=de"><b>4 X11 starten</b></a><ul><li><a href="run-xfree86.php?phpLang=de#display-server">4.1 Den Display-Server starten</a></li><li><a href="run-xfree86.php?phpLang=de#xinitrc-d">4.2 Modifikationen des Starts über das .xinitrc.d Verzeichnis</a></li><li><a href="run-xfree86.php?phpLang=de#xinitrc">4.3 Die Datei .xinitrc</a></li><li><a href="run-xfree86.php?phpLang=de#xinitrc-pkg">4.4 Das Fink-Paket 'xinitrc'</a></li></ul></li><li><a href="other.php?phpLang=de"><b>5 Andere Möglichkeiten mit X11 </b></a><ul><li><a href="other.php?phpLang=de#vnc">5.1 VNC</a></li><li><a href="other.php?phpLang=de#weirdx">5.2 WeirdX</a></li></ul></li><li><a href="trouble.php?phpLang=de"><b>6 Probleme mit XFree86 beheben</b></a><ul><li><a href="trouble.php?phpLang=de#immediate-quit">6.1 Starte ich X11, wird es sofort beendet oder es stürzt ab.</a></li><li><a href="trouble.php?phpLang=de#locale">6.2 "Warning: locale not supported by C library"</a></li></ul></li><li><a href="tips.php?phpLang=de"><b>7 Tipps für die Benutzung</b></a><ul><li><a href="tips.php?phpLang=de#menu-items">7.1 X11-Programme aus dem Menu "Programme" starten</a></li><li><a href="tips.php?phpLang=de#terminal-app">7.2 X11-Programme aus Terminal.app starten</a></li><li><a href="tips.php?phpLang=de#open">7.3 Aqua-Programme aus xterm starten</a></li><li><a href="tips.php?phpLang=de#copy-n-paste">7.4 Kopieren und Einfügen</a></li></ul></li></ul>
<!--Generated from $Fink: x11.de.xml,v 1.2 2023/08/04 5:08:13 nieder Exp $-->
<?php include_once "../../footer.inc"; ?>


