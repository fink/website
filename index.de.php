<?
$title = "Home";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2012/04/19 20:07:38 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, eine Distribution von Unix Software für den Mac OS X und Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include dirname(__FILE__) . "/header.inc";
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

<h1><a href="<? print $rdf_file; ?>" title="Abonnieren Sie unseren feed, Fink-Projekt News" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;News</h1>
<?
// Include news items
include dirname(__FILE__) . "/news/news.de.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=de">Ältere News...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Fink Paket Aktualisierungen (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png"alt="" style="border:0"></a>
&nbsp;Aktuelle Paket-Updates</h1>

<?  include "package-updates.inc" ?>

<a href="package-updates.php">mehr...</a>

<h1>Status</h1>
<? 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink currently supports OS X 10.7 (Lion), 10.6 (SnowLeopard), and 10.5 
(Leopard), and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="srcdist.php">source
release page</a>.
</p><p>
XCode must be installed before Fink.  For best results, 10.6 users are
encouraged to avoid upgrading XCode beyond version 3.2.6.   On the other
hand, 10.7 users must update XCode to version 4.1 or later (via the free download
from the AppStore).  Note that if you installed an earlier version of XCode
prior to updating, you need to <b>uninstall</b> the old version first, by
running <i>/Developer/Library/uninstall-devtools</i> .  You can determine
your current version of XCode by running <i>xcodebuild -version</i> .
</p>
<p>
<strong>10.5 Support:</strong> 
Users are encouraged to update to OS 10.5.2 or later, via Software Update, in order to get bugfixes and enhancements for X11.  Further updates continue to be made available on the <a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">XQuartz Update Page.</a>
(We are not currently supporting Xquartz on 10.6 or 10.7.)
      </p>

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
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include dirname(__FILE__) . "/footer.inc";
?>
