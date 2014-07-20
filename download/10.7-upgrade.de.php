<?
$title = "Anleitung zur Aktualisierung unter Mac OS X 10.7";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2014/07/20 10:42:33 $';

include "header.inc";
?>

<h1>Anleitung zur Aktualisierung unter Mac OS X 10.7</h1>
<h2>Wichtige Anmerkungen:</h2>

<p>Es gibt keinen unterstützen Weg für Fink von 10.6 (oder früher) zu
10.7. Es gibt Berichte über eine erfolgreiche Aktualisierung von einer 
10.6/64 bit Fink Installation zu 10.7, aber es gibt keine Garantie, dass 
der aktualisierte Fink Baum korrekt funktioniert. Eine Aktualisierung von 
10.6/i386 funktioniert definitiv nicht.</p>

<p>Die Anleitung hier ist eine Übertragung der auf dem  
<a href="http://finkers.wordpress.com/2011/09/26/fink-and-lion/">Fink blog</a>. 
Die Einträge dort beschreiben die Aktualisierung mit mehr Details.</p>

<p>Dieser Prozess sammelt eine Liste der Pakete, die auf 10.6 (32 oder 64 bit) 
installiert sind und speichert sie für die spätere Verwendung bei der 
Installation von Fink auf 10.7</p>

<p>Befolgen sie die folgenden Anweisungen, um die Liste der Pakete zu
erstellen:</p>

<ol>
	<li>Benutzen sie 
  <pre>grep -B1 "install ok installed" /sw/var/lib/dpkg/status | grep Package | cut -d: -f2 > fink_packages.txt</pre>, 
	um die Paketinformationen in einer Datei zu speichern.</li>
	<li>Installieren sie OS X 10.7 und Xcode 4.5.2 oder zumindest die Command
	Line Tools.</li>
	<li>Löschen sie das Fink-Verzeichnis, z. B. mit 
  <pre>sudo rm -rf /sw</pre>.</li>
	<li><a href="./srcdist.php">Installieren sie Fink</a> auf ihrem neuen 10.7
	System.</li>
	<li>Führen sie das Kommando: <pre>cat fink_packages.txt | xargs fink install</pre>
	aus, damit die neue Installation von Fink die Pakete installiert, die 
  vorher unter 10.6. installiert waren</li>
</ol>

<p>Nicht alle Pakete, die unter 10.6 zur Verfügung standen, gibt es auch
für 10.7, weil es einige Änderungen im System gibt.  Es wird daran
gearbeitet, möglichst viele der Pakete wieder verfügbar zu machen.  Ist ihr
Lieblingspaket auf 10.7 noch nicht verfügbar, kontaktieren sie den
Maintainer des Pakets und fragen sie ihn, ob es nach 10.7 übernommen werden
kann.</p>

<?
include "footer.inc";
?>
