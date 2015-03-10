<?php
$title = "Porting";
$cvs_author = 'Author: Nachteule';
$cvs_date = 'Date: 2014/10/25 09:21:47';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Porting Contents"><link rel="next" href="basics.php?phpLang=de" title="Grundlagen">';


include_once "header.de.inc";
?>
<h1>Unix Programme nach Darwin und Mac OS X portieren</h1>
    <p>
			Dieses Dokument gibt Tipps, wie man ein Unix Programm nach Darwin und
			Mac OS X portiert. Das meiste trifft sowohl for die Mac OS X Version
			10.x.x und "reine" Darwin-Systeme zu. Der Einfachheit
			halber wird deshalb nur noch Darwin genannt; letztlich ist Mac OS X
			ja auch ein Obermenge von Darwin.
      Viele Detailinformationen sind leider nicht mehr aktuell, sondern
      beziehen sich auf ältere Versionen. Mit einer Aktualisierung sollte aber
      in der englischen Version begonnen werden.
    </p>
  <h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="basics.php?phpLang=de"><b>1 Grundlagen</b></a><ul><li><a href="basics.php?phpLang=de#heritage">1.1 Der Ursprung von Darwin</a></li><li><a href="basics.php?phpLang=de#compiler">1.2 Der Compiler und andere Tools</a></li><li><a href="basics.php?phpLang=de#host-type">1.3 Wirtsystem</a></li><li><a href="basics.php?phpLang=de#libraries">1.4 Bibliotheken</a></li><li><a href="basics.php?phpLang=de#other-sources">1.5 Andere Informationsquellen</a></li></ul></li><li><a href="shared.php?phpLang=de"><b>2 Gemeinsam benutzter Code</b></a><ul><li><a href="shared.php?phpLang=de#lib-and-mod">2.1 Gemeinsam benutzte Bibliotheken vs. Ladbare Module</a></li><li><a href="shared.php?phpLang=de#version">2.2 Versionsnummerierung</a></li><li><a href="shared.php?phpLang=de#cflags">2.3 Compiler-Optionen</a></li><li><a href="shared.php?phpLang=de#build-lib">2.4 Eine gemeinsam genutzte Bibliothek erzeugen</a></li><li><a href="shared.php?phpLang=de#build-mod">2.5 Ein Modul erzeugen</a></li></ul></li><li><a href="libtool.php?phpLang=de"><b>3 GNU libtool</b></a><ul><li><a href="libtool.php?phpLang=de#situation">3.1 Die Situation</a></li><li><a href="libtool.php?phpLang=de#patch-135">3.2 Der 1.3.5 Patch</a></li><li><a href="libtool.php?phpLang=de#fixing-14x">3.3 1.4.x reparieren</a></li><li><a href="libtool.php?phpLang=de#notes">3.4 Weitere Notizen</a></li></ul></li><li><a href="preparing-10.2.php?phpLang=de"><b>4 Vorbereitungen für 10.2</b></a><ul><li><a href="preparing-10.2.php?phpLang=de#bash">4.1 Die Shell bash</a></li><li><a href="preparing-10.2.php?phpLang=de#gcc3">4.2 Der gcc3 Compiler</a></li></ul></li><li><a href="preparing-10.3.php?phpLang=de"><b>5 Vorbereitungen für 10.3</b></a><ul><li><a href="preparing-10.3.php?phpLang=de#perl">5.1 Perl</a></li><li><a href="preparing-10.3.php?phpLang=de#typedef">5.2 Neue Definitionen von Symbolen</a></li><li><a href="preparing-10.3.php?phpLang=de#system-libs">5.3 Neue Systembibliotheken</a></li></ul></li><li><a href="preparing-10.4.php?phpLang=de"><b>6 Vorbereitungen für 10.4</b></a><ul><li><a href="preparing-10.4.php?phpLang=de#perl">6.1 Perl</a></li><li><a href="preparing-10.4.php?phpLang=de#typedef">6.2 Neue Definitionen von Symbolen</a></li><li><a href="preparing-10.4.php?phpLang=de#system-libs">6.3 Neue Systembibliotheken</a></li></ul></li></ul>
<!--Generated from $Fink: porting.de.xml,v 1.10 2014/10/25 09:21:47 Nachteule Exp $-->
<?php include_once "../../footer.inc"; ?>


