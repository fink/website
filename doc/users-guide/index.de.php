<?php
$title = "Benutzerhandbuch";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:49:23';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="next" href="intro.php?phpLang=de" title="Einführung">';


include_once "header.de.inc";
?>
<h1>Fink Benutzerhandbuch</h1>
  <p>Achtung: die deutsche Version dieses Dokuments ist nicht mit der Englische Version synchron.</p>
    <p>Dieses Dokument gibt einen Überblick über alle Features von Fink.
(Die folgenden, älteren Dokumente geben einen etwas breiteren Blick auf Fink
<a href="/doc/install/index.php">Installation</a>,
<a href="/doc/usage/index.php">Nutzung</a>
und die ReadMe.rtf, welche sich auf dem Medium der Binärdistribution befindet.)
Überprüfen Sie außerdem den
<a href="/doc/">Dokumentationsteil</a> der Webseite, er hat auch einige nützliche Dokumente.</p>
	<h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=de"><b>1 Einführung</b></a><ul><li><a href="intro.php?phpLang=de#what">1.1 Was ist Fink?</a></li><li><a href="intro.php?phpLang=de#req">1.2 Voraussetzungen</a></li><li><a href="intro.php?phpLang=de#supported-os">1.3 Unterstützte Systeme</a></li><li><a href="intro.php?phpLang=de#src-vs-bin">1.4 Quellcode vs. Binärpakete</a></li></ul></li><li><a href="install.php?phpLang=de"><b>2 Erste Installation</b></a><ul><li><a href="install.php?phpLang=de#bin">2.1 Installation der Binary-Distribution</a></li><li><a href="install.php?phpLang=de#src">2.2 Installation der Source-Distribution</a></li><li><a href="install.php?phpLang=de#setup">2.3 Einrichten Ihrer Umgebung</a></li></ul></li><li><a href="packages.php?phpLang=de"><b>3 Pakete Installieren</b></a><ul><li><a href="packages.php?phpLang=de#bin-dselect">3.1 Binary-Pakete mit dselect Installieren</a></li><li><a href="packages.php?phpLang=de#bin-apt">3.2 Binary-Pakete mit apt-get Installieren</a></li><li><a href="packages.php?phpLang=de#bin-exceptions">3.3 Paketabhängigkeiten ohne verfügbares Binary-Paket</a></li><li><a href="packages.php?phpLang=de#src">3.4 Binäre und Quellcode-Pakete mit fink installieren</a></li><li><a href="packages.php?phpLang=de#fink-commander">3.5 Fink Commander</a></li><li><a href="packages.php?phpLang=de#available-versions">3.6 Verfügbare Versionen</a></li><li><a href="packages.php?phpLang=de#x11">3.7 Mit X11 Klarkommen</a></li></ul></li><li><a href="upgrade.php?phpLang=de"><b>4 Fink Aktualisieren</b></a><ul><li><a href="upgrade.php?phpLang=de#bin">4.1 Aktualisieren von Binary-Paketen</a></li><li><a href="upgrade.php?phpLang=de#src">4.2 Aktualisieren der Source-Distribution</a></li><li><a href="upgrade.php?phpLang=de#mix">4.3 Aktualisieren einer gemischten Distribution (Binary und Source)</a></li></ul></li><li><a href="conf.php?phpLang=de"><b>5 Die Fink-Konfigurationsdatei</b></a><ul><li><a href="conf.php?phpLang=de#about">5.1 Über fink.conf</a></li><li><a href="conf.php?phpLang=de#syntax">5.2 fink.conf Syntax</a></li><li><a href="conf.php?phpLang=de#required">5.3 Erforderliche Einstellungen</a></li><li><a href="conf.php?phpLang=de#optional">5.4 Optionale Nutzereinstellungen</a></li><li><a href="conf.php?phpLang=de#downloading">5.5 Download Einstellungen</a></li><li><a href="conf.php?phpLang=de#mirrors">5.6 Mirror Einstellungen</a></li><li><a href="conf.php?phpLang=de#developer">5.7 Entwicklereinstellungen</a></li><li><a href="conf.php?phpLang=de#advanced">5.8 Erweiterte Einstellungen</a></li><li><a href="conf.php?phpLang=de#sourceslist">5.9 Verwaltung von apts sources.list</a></li></ul></li><li><a href="usage.php?phpLang=de"><b>6 Das fink-Tool über die Kommandozeile benutzen</b></a><ul><li><a href="usage.php?phpLang=de#using">6.1 Das fink-Tool benutzen</a></li><li><a href="usage.php?phpLang=de#options">6.2 Globale Optionen</a></li><li><a href="usage.php?phpLang=de#install">6.3 install</a></li><li><a href="usage.php?phpLang=de#remove">6.4 remove</a></li><li><a href="usage.php?phpLang=de#purge">6.5 purge</a></li><li><a href="usage.php?phpLang=de#update-all">6.6 update-all</a></li><li><a href="usage.php?phpLang=de#list">6.7 list</a></li><li><a href="usage.php?phpLang=de#apropos">6.8 apropos</a></li><li><a href="usage.php?phpLang=de#describe">6.9 describe</a></li><li><a href="usage.php?phpLang=de#plugins">6.10 plugins</a></li><li><a href="usage.php?phpLang=de#fetch">6.11 fetch</a></li><li><a href="usage.php?phpLang=de#fetch-all">6.12 fetch-all</a></li><li><a href="usage.php?phpLang=de#fetch-missing">6.13 fetch-missing</a></li><li><a href="usage.php?phpLang=de#build">6.14 build</a></li><li><a href="usage.php?phpLang=de#rebuild">6.15 rebuild</a></li><li><a href="usage.php?phpLang=de#reinstall">6.16 reinstall</a></li><li><a href="usage.php?phpLang=de#configure">6.17 configure</a></li><li><a href="usage.php?phpLang=de#selfupdate">6.18 selfupdate</a></li><li><a href="usage.php?phpLang=de#selfupdate-rsync">6.19 selfupdate-rsync</a></li><li><a href="usage.php?phpLang=de#selfupdate-git">6.20 selfupdate-git</a></li><li><a href="usage.php?phpLang=de#index">6.21 index</a></li><li><a href="usage.php?phpLang=de#validate">6.22 validate</a></li><li><a href="usage.php?phpLang=de#scanpackages">6.23 scanpackages</a></li><li><a href="usage.php?phpLang=de#cleanup">6.24 cleanup</a></li><li><a href="usage.php?phpLang=de#dumpinfo">6.25 dumpinfo</a></li><li><a href="usage.php?phpLang=de#show-deps">6.26 show-deps</a></li></ul></li></ul>
<!--Generated from $Fink: uguide.de.xml,v 1.13 2023/08/04 4:49:23 nieder Exp $-->
<?php include_once "../../footer.inc"; ?>


