<?php
$title = "Paket erstellen";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/03/10 22:52:23';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="intro.php?phpLang=de" title="Einführung">';


include_once "header.de.inc";
?>
<h1>Ein Fink-Paket erstellen</h1>
<p>
Diese Anleitung beschreibt, wie man eine Paketbeschreibung für den Paketmanager
Fink erstellt.
Es beschreibt ebenso die Politik und Richtlinien für die Fink Distribution.
Sowohl das Format der Paketbeschreibung als auch die Distributionspolitik sind
in Entwicklung. Achten sie also auf "Last changed"-Informationen und CVS Tipps
zu dieser Seite, wenn es um Aktualisierungen geht.
Diese Beschreibung hier bezieht sich auf Formate und Richtlinien für Version
0.9.0 und höher des Paketmanagers fink.
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
	<li><a href="intro.php?phpLang=de"><b>1 Einführung</b></a><ul><li><a href="intro.php?phpLang=de#def1">1.1 Was ist ein Paket?</a></li><li><a href="intro.php?phpLang=de#ident">1.2 Identifikation eines Pakets</a></li></ul></li><li><a href="format.php?phpLang=de"><b>2 Paketbeschreibungen</b></a><ul><li><a href="format.php?phpLang=de#trees">2.1 Baum Layout</a></li><li><a href="format.php?phpLang=de#format">2.2 Datei-Format</a></li><li><a href="format.php?phpLang=de#percent">2.3 Prozent-Erweiterungen</a></li></ul></li><li><a href="policy.php?phpLang=de"><b>3 Packaging Policy</b></a><ul><li><a href="policy.php?phpLang=de#licenses">3.1 Package Licenses</a></li><li><a href="policy.php?phpLang=de#openssl">3.2 The GPL and OpenSSL</a></li><li><a href="policy.php?phpLang=de#prefix">3.3 Base System Interference</a></li><li><a href="policy.php?phpLang=de#sharedlibs">3.4 Shared Libraries</a></li><li><a href="policy.php?phpLang=de#perlmods">3.5 Perl Modules</a></li><li><a href="policy.php?phpLang=de#emacs">3.6 Emacs Policy</a></li><li><a href="policy.php?phpLang=de#sources">3.7 Source Policy</a></li><li><a href="policy.php?phpLang=de#downloading">3.8 File Download Policy</a></li></ul></li><li><a href="fslayout.php?phpLang=de"><b>4 Filesystem Layout</b></a><ul><li><a href="fslayout.php?phpLang=de#fhs">4.1 The Filesystem Hierarchy Standard</a></li><li><a href="fslayout.php?phpLang=de#dirs">4.2 The Directories</a></li><li><a href="fslayout.php?phpLang=de#avoid">4.3 Things to Avoid</a></li></ul></li><li><a href="compilers.php?phpLang=de"><b>5 Compilers</b></a><ul><li><a href="compilers.php?phpLang=de#versions">5.1 Compiler Versions</a></li><li><a href="compilers.php?phpLang=de#abi">5.2 The g++ ABI</a></li></ul></li><li><a href="reference.php?phpLang=de"><b>6 Reference</b></a><ul><li><a href="reference.php?phpLang=de#build">6.1 The Build Process</a></li><li><a href="reference.php?phpLang=de#fields">6.2 Fields</a></li><li><a href="reference.php?phpLang=de#splitoffs">6.3 SplitOffs</a></li><li><a href="reference.php?phpLang=de#scripts">6.4 Scripts</a></li><li><a href="reference.php?phpLang=de#patches">6.5 Patches</a></li><li><a href="reference.php?phpLang=de#profile.d">6.6 Profile.d scripts</a></li></ul></li></ul>
<!--Generated from $Fink: packaging.de.xml,v 1.1 2015/03/10 22:52:23 k-m_schindler Exp $-->
<?php include_once "../../footer.inc"; ?>


