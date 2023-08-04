<?php
$title = "Paket erstellen - Einführung";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2021/05/27 20:26:32';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="format.php?phpLang=de" title="Paketbeschreibungen"><link rel="prev" href="index.php?phpLang=de" title="Paket erstellen Contents">';


include_once "header.de.inc";
?>
<h1>Paket erstellen - 1. Einführung</h1>



<h2><a name="def1">1.1 Was ist ein Paket?</a></h2>
<p>
Ein Paket besteht aus Software, die eine abgeschlossene Einheit bildet. Ein
typisches Paket enthält ein Program, dafür benötigte Dateien und Kataloge mit
Meldungen für die Internationalisierung und Dokumentation. In Fink können Pakete
in zwei Formen vorliegen: Die Paketbeschreibung und die binäre, direkt
installierbare Paket-Datei.
</p>
<p>
Die Paketbeschreibung ist eine lesbare Textdatei, die alles enthält, um das
Paket zu erstellen, d. h. die binäre Paket-Datei zu erzeugen.
Die Paketbeschreibung enthält Meta-Daten (Paketnamen und Beschreibungsprosa),
die URL des Quell-Codes und die Instruktionen für die Konfiguration, das
Compilieren und das "Einpacken" des Pakets. Zu der Paketbeschreibung kann auch
eine Patch-Datei gehören.
</p>
<p>
Die binäre Paket-Datei is ein Dateiarchiv, das die eigentlichen Dateien des
Pakets enthält, also das Binärprogram, Dateien, Kataloge mit Meldungen,
Bibliotheken, Include-Dateien, usw.
Die Paket-Datei enthält auch Meta-Daten über das Paket.
Installation eines binären Pakets bedeutet im wesentlichen Auspacken des
Inhalts, weil alles bereits vorbereitet ist.
Fink nutzt den Paketmanager dpkg. Deshalb haben die binären Paket-Datei das
Format dpkg und den Datei-Suffix .deb.
</p>



<h2><a name="ident">1.2 Identifikation eines Pakets</a></h2>
<p>
Die Identifikation eines Pakets ergibt sich aus drei Zeichnfolgen: Paketname,
Version und Revision.
Alle können Kleinbuchstaben, Zahlen, Bindestriche (nicht in der Revision),
Pluszeichen und Punkte enthalten. Andere Zeichen sind nicht erlaubt.
Insbesondere Großbuchstaben und Unterstriche sind nicht erlaubt.
</p>
<p>
Der Paketname is einfach der Name der Software, z. B. openssh.
Die Version, auch Upstream-Version genannt, ist die Version des ursprünglichen
Software-Pakets.
Buchstaben sind in der Version erlaubt, z. B. 2.9p1.
Sowohl Fink als auch dpkg wissen, wie man diese richtig sortiert.
Die Revision ist ein Zähler, der erhöht wird, wenn sich die Paketbeschreibung
ändert.
Sie beginnt mit 1 und sollte auf 1 zurückgesetzt werden, wenn sich die
Upstream-Version ändert.
Die Revision darf keine Bindestriche enthalten.
Der vollständige Name ergibt sich aus der Verkettung der drei mit Bindestrichen
dazwischen, z. B. openssh-2.9p1-2.
</p>



<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="format.php?phpLang=de">2. Paketbeschreibungen</a></p>
<?php include_once "../../footer.inc"; ?>


