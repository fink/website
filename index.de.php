<?php
$title      = "Home";
$cvs_author = '$Author: nieder $';
$cvs_date   = '$Date: 2014/01/24 20:21:29 $';
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
Hierzu kommen bekannte <a href="http://www.debian.org/">Debian</a> Tools wie dpkg und apt-get zum Einsatz.
Die freiwilligen Mitarbeiter dieses Projektes kümmern sich auch um die Anpassung von Software, damit diese ohne Probleme auf Mac OS X nutzbar wird.
Dabei überlassen wir es dem Nutzer, ob er die Software selber kompiliert oder schon fertige Pakete installiert.
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
Fink currently supports OS X 10.9 (Mavericks), 10.8 (Mountain Lion), 10.7 (Lion), and 10.6 (Snow Leopard),
and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="download/srcdist.php">source
release page</a>.
</p>
<p>Xcode must be installed before Fink.</p>  
<p>
<strong>10.9 Support:</strong> 
10.9 users must install Xcode version 5.0.1 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 5.0 for Mavericks (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.4 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.8 Support:</strong> 
10.8 users must install Xcode version 4.4 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 4.4 for Mountain Lion (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences). Note that if you had an 
earlier version of Xcode than 4.3 installed prior to updating from 10.7, you need 
to <b>uninstall</b> the old version first by running 
<i>/Developer/Library/uninstall-devtools</i>. 
You can determine your current version of Xcode by running 
<i>xcodebuild -version</i> .</p>
<p>If you need X11 you should install Xquartz-2.7.2 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.7 Support:</strong> 
10.7 users must install or update Xcode to version 4.1 or later 
(via a free download from the AppStore), (version 4.6.3 is recommended) or must at least
install the Command Line Tools for 
Xcode 4.3 or later (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences (4.3 or later).  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall an outdated one, if needed.</p>
<p>We don't support Xquartz on 10.7, so don't remove Apple's official X11.</p>
<p>
<strong>10.6 Support:</strong>
For best results, 10.6 users are
encouraged to upgrade Xcode to version 3.2.6, or to version 4.2.1 if you
paid for a 4.x Developer preview.  Version 4.0.2 is known to have some
bugs in its linker that prevent certain packages from building.  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall it, if needed.</p>
<p>We don't support Xquartz on 10.6, so don't remove Apple's official X11.</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
<h1>Ressourcen</h1>

<p>
Wenn Sie Unterstützung suche, schauen sie auf der
<a href="help/index.php">Hilfe-Seite</a> nach.
Diese Seite gibt Ihnen auch Informationen, wie Sie dem
Projekt selber helfen bzw. Rückmeldung geben können.
</p>
<p>
Wenn Sie die Quelldateien suchen, welche zu den binären 
Dateien des Fink-Projekts gehören, schauen Sie bitte auf 
<a href="download/sources_for_binaries.php">dieser Seite</a>
nach einer Anleitung.
</p>
<p>
Das Fink-Projekt wird gehostet von 
<a href="http://sourceforge.net/">SourceForge</a>.
Zusätzlich zum Hosten dieser Webseite und den Downloads
stellt SourceForge folgende Dienste für das Projekt bereit:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">SourceForge Projekt Übersicht</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Bugs anschauen oder mitteilen</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Eine bestimmte Software fehlt in Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Funktionalität fehlt in Fink (das Programm)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Ein neues Fink-Paket abgeben (für nicht Kernentwickler)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Einen Patch für Fink (das Programm) abgeben</a></li>
<li><a href="lists/index.php">Mailing Listen</a></li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">online
lesen</a>, <a href="doc/cvsaccess/index.php">Zugangsdaten</a>)</li>
</ul>
<p>
Bitte beachten Sie, dass die Verwendung einiger dieser Dienste (z.B. Fehler melden oder neue Fink-Pakete
einreichen) eine Anmeldung mit Ihrem SourceForge Konto erfordert. Sollten Sie noch kein Konto haben
können Sie sich dieses kostenlos auf der <a href="http://sourceforge.net/">SourceForge</a> Seite anlegen.
</p>
<p>Weitere Dienste ausserhalb von SourceForge bereitgestellt:</p>
<ul>
    <li><a href="http://wiki.finkproject.org/">Das Fink Entwickler Wiki</a> (jetzt an einem neuen Platz).</li>
    <li>
        <a href="https://github.com/fink/fink">
            New github repository for the source code of the <code>fink</code> package manager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            New github repository for the <code>fink-mirrors</code> package.
        </a>
    </li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?php
require dirname(__FILE__) . "/footer.inc";
