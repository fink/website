<?php
$title = "Lies-Mich";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/17 21:14:26';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink Lies-Mich</h1>
<!--Generated from $Fink: readme.de.xml,v 1.1 2015/02/17 21:14:26 k-m_schindler Exp $-->
<p>
Dies ist Fink, ein Paketmanager, der die ganze Welt an
Open-Source-Programmen auf Darwin und Mac OS X zur Verfügung stellt.
</p>
<p>
Fink bearbeitet mittels dpkg eine separate Verzeichnishierarchie. Es lädt
die originalen Quellen herunter, passt sie je nach Notwendigkeit an,
konfiguriert sie für Darwin, übersetzt und installiert sie. Die
Informationen über Verfügbarkeit und benötigte Anpassungen (die
"Paketbeschreibungen") werden separat gehalten, sind aber normalerweise in
der Distribution enthalten. Der tatsächliche Quellcode wird je nach
Bedarf aus dem Internet geladen.
</p>
<p>
Obwohl Fink nicht vollständig ausgereift ist und noch immer scharfe Kanten
und fehlende Feature hat, wird es von sehr vielen Leute äußerst erfolgreich
eingesetzt. Lesen sie bitte die Anleitungen sorgfältig und seien sie
bitte nicht zu überrascht, wenn einmal etwas nicht so funktioniert, wie
sie es erwartet haben. Für die meisten Fehler gibt es gute Erklärungen, wie
man sie beheben kann; schauen sie die Webseiten durch, wenn sie Hilfe
brauchen.
</p>
<p>
Fink steht unter den Lizenzbedingungen der GNU General Public License.
Für weitere details lesen sie bitte die Datei COPYING.
</p>
<h2><a name="req">Voraussetzungen</a></h2>
<p>
Sie brauchen:
</p>
<ul>
<li><p>
Ein installiertes Mac OS X, Version 10.7 oder höher.
</p></li>
<li><p>
Ohne die Xcode Command Line Tools geht gar nichts. Unter Mac OS X 10.7 und
10.8 kann man dieses Paket im Programm Xcode über dem Menüpunkt
"Preferences" bei "Downloads" unter "Components" direkt von
developer.apple.com herunter laden. Unter Mac OS X 10.9 und 10.10 muss man
das Kommando
</p>
<pre>xcode-select --install</pre>
<p>
ausführen und den Knopf <b>Install</b> in dem Fenster anklicken, das
aufgeht oder man installiert das komplette Programm Xcode, je nach eigener
Vorliebe. Das obige Kommando benutzt man auch für ein Update der Tools,
vor allem dann, wenn es Probleme beim Erstellen von Paketen gibt.
</p>
<p>
Bei einem manuellen Download muss man darauf achten, dass die Versionen der
Tools und Mac OS X und falls installiert auch von Xcode zusammen passen.
</p></li>
<li><p>Java. Die Eingabe von</p>
<pre>javac</pre>
<p>
in einem Fenster des Programms Terminal sollte ausreichen, damit das System
Java für sie herunter lädt und installiert.
</p></li>
<li><p>
Internet Zugang. Die Quellcodes werden von "Spiegel"-Seiten herunter
geladen.
</p></li>
<li><p>
Geduld. Das Erstellen dauert bei einigen sehr großen Paketen ganz schön
lange. Je nach Rechnerleistung kann es Stunden oder in Extremfällen sogar
Tage dauern. Vieles ist aber auch in Minuten erledigt.
</p></li>
</ul>
<h2><a name="install">Installation</a></h2>
<p>
Die Installation ist im Detail in der Datei "INSTALL" beschrieben. Bitte
sorgfältig lesen, denn das ganze ist nicht trivial. Auch ein Upgrade ist
dort beschrieben.
</p>
<h2><a name="usage">Benutzung von Fink</a></h2>
<p>
Die Datei "USAGE" beschreibt, wie man die Pfade einstellen muss und wie man Pakete
installiert und entfernt. Sie enthält auch eine komplette Liste der Kommandos.
</p>
<h2><a name="questions">Weitere Frage?</a></h2>
<p>
Sollte diese Dokumentation ihre Frage nicht beantworten, besuchen sie die
Webseite von Fink
<a href="/">/</a>
vor allem die Hilfe-Seite:
<a href="/help/">/help/</a>.
Dort gibt es weitere Dokumentationen und Hinweise, wenn sie weitere
Unterstützung brauchen.
</p>
<p>
Möchten sie selbst etwas zu Fink beitragen, dann folgenden sie den Links
auf der Hilfe-Seite. Beispiele sind das Testen oder Erstellen von Paketen.
</p>
<h2><a name="uptodate">Informiert bleiben</a></h2>
<p>
Die Webseite des Projekts ist
<a href="/">/</a>.
</p>
<p>
Wollen sie über neue Versionen informiert werden, besuchen sie die Seite
<a href="/lists/fink-announce.php">http://finkproject.org/lists/fink-announce.php</a>
und abonnieren sie die Mailing-Liste "fink-announce". Sie ist moderiert
und hat wenig Meldungen.
</p>

<?php include_once "../footer.inc"; ?>


