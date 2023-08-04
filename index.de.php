<?php
$title      = "Home";
$cvs_author = '$Author: nieder $';
$cvs_date   = '$Date: 2019/02/25 22:41:00 $';
$is_home    = 1;

$metatags = '<meta name="description" content="Fink, eine Distribution von Unix Software für den Mac OS X und Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

require dirname(__FILE__) . "/header.inc";
?>


<p>
Fink hat es sich zur Aufgabe gemacht, ein System zur Verfügung zu stellen, das es einfach macht,
<a href="http://www.opensource.org/">Open Source</a> Software auf
<a href="http://www.opensource.apple.com/">Darwin</a> und
<a href="http://www.apple.com/macosx/">Mac OS X</a> zu verwalten und zu installieren.
Hierzu kommen bekannte <a href="http://www.debian.org/">Debian</a> Tools wie
dpkg und apt-get zum Einsatz. Die freiwilligen Mitarbeiter dieses Projektes
kümmern sich auch um die Anpassung von Software, damit diese ohne Probleme auf
Mac OS X nutzbar wird. Dabei überlassen wir es dem Nutzer, ob er die Software
selber kompiliert oder schon fertige Pakete installiert.
<a href="about.php">Mehr zum Thema...</a>
</p>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1><a href="<?php print $rdf_file; ?>" title="Abonnieren Sie unseren feed, Fink-Projekt News" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;News</h1>
<?php
// Include news items
require dirname(__FILE__) . "/news/news.de.inc";
?>
<div align="right"><a href="<?php print $root; ?>news/index.php?phpLang=de">Ältere News...</a></div>

</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Fink Paket Aktualisierungen (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png"alt="" style="border:0"></a>
&nbsp;Aktuelle Paket-Updates</h1>

<?php  require "package-updates.inc" ?>

<a href="package-updates.php">mehr...</a>
</tr><tr valign="top"><td width="50%">
<h1>Status</h1>
<?php 
require dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Derzeit unterstützt Fink macOS 10.15 (Catalina), macOS 10.14 (Mojave), macOS 10.13 (High Sierra), 
macOS 10.12 (Sierra), OS X 10.11 (El Capitan), OS X 10.10 (Yosemite), und OS X 10.9 (Mavericks).
Es läuft auch weiterhin auf älteren Versionen von OS X, obwohl
dafür keine offiziellen Updates mehr bereit gestellt werden.
Die Installationsanweisung befindet sich auf der
<a href="download/srcdist.php">source release page</a>.
</p>
<p>Xcode muss vor Fink installiert werden.</p>
<p>
<strong>Unterstützung von 10.15:</strong> 
10.13 and 10.14 users must install Xcode version 10.3 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 10.3 (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.11 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>Unterstützung von 10.13 and 10.14:</strong> 
10.13 and 10.14 users must install Xcode version 10.1 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 10.1 (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.11 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>Unterstützung von 10.12:</strong>
Nutzer von 10.12 müssen Xcode, Version 8.0 oder später installieren
(über den kostenlosen Download aus dem AppStore).
Alternativ können auch die Command Line Tools aus
Xcode 6.0 für Sierra verwendet werden (mittels <i>xcode-select --install</i> installieren,
oder von <a href="http://developer.apple.com">Apple</a>) herunter laden.</p>
<p>Wird X11 benötigt, sollte Xquartz-2.7.7 oder später von
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a> installiert werden.</p>
<p>
<strong>Unterstützung von 10.11:</strong>
Nutzer von 10.11 müssen Xcode, Version 7.0 oder später installieren
(über den kostenlosen Download aus dem AppStore).
Alternativ können auch die Command Line Tools aus
Xcode 7.0 für El Capitan verwendet werden (mittels <i>xcode-select --install</i> installieren,
oder von <a href="http://developer.apple.com">Apple</a>) herunter laden.</p>
<p>Wird X11 benötigt, sollte Xquartz-2.7.7 oder später von
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a> installiert werden.</p>
<p>
<strong>10.10 Support:</strong>
Nutzer von 10.10 müssen Xcode, Version 6.0 oder später installieren
(über den kostenlosen Download aus dem AppStore).
Alternativ können auch die Command Line Tools aus
Xcode 6.0 für Yosemite verwendet werden (mittels <i>xcode-select --install</i> installieren,
oder von <a href="http://developer.apple.com">Apple</a>) herunter laden.</p>
<p>Wird X11 benötigt, sollte Xquartz-2.7.7 oder später von
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a> installiert werden.</p>
<p>
<strong>Unterstützung von 10.9:</strong>
Nutzer von 10.9 müssen Xcode, Version 5.0.1 oder später installieren 
(über den kostenlosen Download aus dem AppStore; Version 5.0.2 wird empfohlen).
Alternativ können auch die Command Line Tools aus
Xcode 5.0 für Mavericks verwendet werden (mittels <i>xcode-select --install</i> installieren,
oder von <a href="http://developer.apple.com">Apple</a>) herunter laden.</p>
<p>Wird X11 benötigt, sollte Xquartz-2.7.4 oder später von
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a> installiert werden.</p>
<p>
<strong>Unterstützung von 10.8:</strong> 
Nutzer von 10.8 müssen Xcode, Version 4.4 oder später installieren 
(über den kostenlosen Download aus dem AppStore; Version 5.0.2 wird empfohlen).
Alternativ können auch die Command Line Tools aus
Xcode 4.4 für Mountain Lion (von <a href="http://developer.apple.com">Apple</a> herunter laden
oder über die Voreinstellungen von Xcode installieren). Hinweis: War vor dem Update auf 10.7 eine
frühere Version als 4.3 von Xcode installiert, muss diese mittels
<i>/Developer/Library/uninstall-devtools</i> <b>deinstalliert</b> werden.
Die Version des aktuell installierten Xcode erhält man mittels
<i>xcodebuild -version</i> .</p>
<p>Wird X11 benötigt, sollte Xquartz-2.7.2 oder später von 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a> installiert werden.</p>
<p>
<strong>Unterstützung von 10.7:</strong> 
Nutzer von 10.7 müssen Xcode, Version 4.1 oder später installieren 
(über den kostenlosen Download aus dem AppStore; Version 4.6.3 wird empfohlen).
Alternativ können auch die Command Line Tools aus
Xcode 4.3 oder später (von <a href="http://developer.apple.com">Apple</a> herunter laden
oder über die Voreinstellungen von Xcode installieren (4.3 oder später). Bei Bedarf folgen sie bitte
der Anleitung für <strong>10.8</strong> für die Überprüfung der Version von Xcode und wie eine
alte Version deinstalliert wird.</p>
<p>Xquartz wird für 10.7 nicht unterstützt. Entfernen sie deshalb auf keinen Fall das offizielle X11 von Apple.</p>
<p>
<strong>Unterstützung von 10.6:</strong>
Das beste Ergebnis erhält man unter 10.6 mit einem
Upgrade von Xcode auf Version 3.2.6 oder 4.2.1, wenn man
für den 4.x Developer-Preview behahlt hat. Für Version 4.0.2 ist bekannt,
dass ein Bug im Linker bei einigen Paketen ihre Erstellung verhindert. Folgen sie bitte
der Anleitung für <strong>10.8</strong> für die Überprüfung der Version von Xcode und wie eine
alte Version deinstalliert wird.</p>
<p>Xquartz wird für 10.6 nicht unterstützt. Entfernen sie deshalb auf keinen Fall das offizielle X11 von Apple.</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
<h1>Ressourcen</h1>

<p>
Wenn Sie Unterstützung suchen, schauen sie auf der
<a href="help/index.php">Hilfe-Seite</a> nach.
Diese Seite gibt Ihnen auch Informationen, wie Sie dem
Projekt selber helfen bzw. Rückmeldung geben können.
</p>
<p>
Wenn Sie die Quelldateien suchen, die zu den binären
Dateien des Fink-Projekts gehören, schauen Sie bitte auf 
<a href="download/sources_for_binaries.php">dieser Seite</a>
nach einer Anleitung.
</p>
<p>
Das Fink-Projekt wird gehostet von 
<a href="http://sourceforge.net/">SourceForge</a>.
Zusätzlich zum Hosten dieser Webseite und den Downloads
stellt SourceForge und GitHub folgenden Dienste für das Projekt bereit:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">SourceForge Projekt-Übersicht</a></li>
<li><a
href="https://github.com/fink/fink/issues">Bugs anschauen oder mitteilen</a></li>
<li><a
href="https://sourceforge.net/p/fink/package-requests/">Eine bestimmte Software fehlt in Fink</a></li>
<li><a
href="https://sourceforge.net/p/fink/feature-requests/">Funktionalität fehlt in Fink (das Programm)</a></li>
<li><a
href="https://github.com/fink/fink-distributions/pulls">Ein neues Fink-Paket abgeben (für nicht Kernentwickler)</a></li>
<li><a
href="https://github.com/fink/fink/pulls">Einen Patch für Fink (das Programm) abgeben</a></li>
<li><a href="lists/index.php">Mailing Listen</a></li>
<li>Git (<a href="https://github.com/fink/">online
lesen</a>, <a href="doc/gitaccess/index.php">Zugangsdaten</a>)</li>
</ul>
<p>
Bitte beachten Sie, dass die Verwendung einiger dieser Dienste (z.B. Fehler melden oder neue Fink-Pakete
einreichen) eine Anmeldung mit Ihrem SourceForge-Konto erfordert. Sollten Sie noch kein Konto haben,
können Sie sich dieses kostenlos auf der <a href="http://sourceforge.net/">SourceForge</a> Seite anlegen.
</p>
<p>Weitere Dienste, die ausserhalb von SourceForge bereitgestellt werden:</p>
<ul>
    <li><a href="http://wiki.finkproject.org/">Das Fink Entwickler Wiki</a> (jetzt an einem neuen Platz).</li>
    <li>
        <a href="https://github.com/fink/fink">
            Neues github repository für den Quellcode des <code>fink</code> Paketmanager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            Neues github repository für das Paket <code>fink-mirrors</code>.
        </a>
    </li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?php
require dirname(__FILE__) . "/footer.inc";
