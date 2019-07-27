<?php
$title = "Paket erstellen";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/07/27 6:50:00';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="intro.php?phpLang=de" title="Einführung">';


include_once "header.de.inc";
?>
<h1>Ein Fink-Paket erstellen</h1>
<p>
Diese Anleitung beschreibt, wie man eine Paketbeschreibung für den Paketmanager
Fink erstellt.
Es beschreibt ebenso die Richtlinien für die Fink-Distribution.
Sowohl das Format der Paketbeschreibung als auch die Distributionspolitik sind
in Entwicklung. Achten sie also auf "Last changed"-Informationen und CVS Tipps
zu dieser Seite, wenn es um Aktualisierungen geht.
Diese Beschreibung hier bezieht sich auf Formate und Richtlinien für Version
0.9.0 und höher des Paketmanagers Fink.
</p>
<p>
Beabsichtigen sie Pakete für Fink zu erstellen, ist es sinnvoll die Mailing-Liste
<a href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a>
zu abonnieren.
Wenn sie einfach bei Fink mithelfen wollen und sie sich fit fühlen, können sie
<a href="http://pdb.finkproject.org/pdb/nomaintainer.php">ein Paket aus dieser
Liste übernehmen</a>, das derzeit ohne Betreuer ist.
</p>
<h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=de"><b>1 Einführung</b></a><ul><li><a href="intro.php?phpLang=de#def1">1.1 Was ist ein Paket?</a></li><li><a href="intro.php?phpLang=de#ident">1.2 Identifikation eines Pakets</a></li></ul></li><li><a href="format.php?phpLang=de"><b>2 Paketbeschreibungen</b></a><ul><li><a href="format.php?phpLang=de#trees">2.1 Verzeichnis-Layout</a></li><li><a href="format.php?phpLang=de#format">2.2 Datei-Format</a></li><li><a href="format.php?phpLang=de#percent">2.3 Prozent-Erweiterungen</a></li></ul></li><li><a href="policy.php?phpLang=de"><b>3 Richtlinien zur Estellung von Paketen</b></a><ul><li><a href="policy.php?phpLang=de#licenses">3.1 Paket-Lizenzen</a></li><li><a href="policy.php?phpLang=de#openssl">3.2 Die GPL und OpenSSL</a></li><li><a href="policy.php?phpLang=de#prefix">3.3 Störungen des Basis-Systems</a></li><li><a href="policy.php?phpLang=de#sharedlibs">3.4 Dynamische Bibliotheken</a></li><li><a href="policy.php?phpLang=de#perlmods">3.5 Perl-Module</a></li><li><a href="policy.php?phpLang=de#emacs">3.6 Emacs-Richtlinien</a></li><li><a href="policy.php?phpLang=de#sources">3.7 Quelldateien-Richtlinien</a></li><li><a href="policy.php?phpLang=de#downloading">3.8 Datei-Download-Richtlinien</a></li></ul></li><li><a href="fslayout.php?phpLang=de"><b>4 Dateisystem-Layout</b></a><ul><li><a href="fslayout.php?phpLang=de#fhs">4.1 Hierarchie-Standard für Dateiverzeichnisse</a></li><li><a href="fslayout.php?phpLang=de#dirs">4.2 Die Verzeichnisse</a></li><li><a href="fslayout.php?phpLang=de#avoid">4.3 Was sollte man vermeiden?</a></li></ul></li><li><a href="compilers.php?phpLang=de"><b>5 Compiler</b></a><ul><li><a href="compilers.php?phpLang=de#versions">5.1 Compilerversionen</a></li><li><a href="compilers.php?phpLang=de#abi">5.2 Die g++ ABI</a></li></ul></li><li><a href="reference.php?phpLang=de"><b>6 Referenz</b></a><ul><li><a href="reference.php?phpLang=de#build">6.1 Der Build-Prozess</a></li><li><a href="reference.php?phpLang=de#fields">6.2 Felder</a></li><li><a href="reference.php?phpLang=de#splitoffs">6.3 SplitOffs</a></li><li><a href="reference.php?phpLang=de#scripts">6.4 Skripte</a></li><li><a href="reference.php?phpLang=de#patches">6.5 Patches</a></li><li><a href="reference.php?phpLang=de#profile.d">6.6 Profile.d scripts</a></li></ul></li></ul>
<!--Generated from $Fink: packaging.de.xml,v 1.3 2019/07/27 6:50:00 nieder Exp $-->
<?php include_once "../../footer.inc"; ?>


