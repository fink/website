<?
$title = "Download Überblick";
$cvs_author = '$Author: g5cpu $';
$cvs_date = '$Date: 2004/04/13 15:59:22 $';

include "header.inc";
?>

<h1>Download Überblick</h1>

<p>
Es gibt mehrere Möglichkeiten, um an Fink zu kommen.
Auf dieser Seite werden die verschiedenen Möglichkeiten und ihre - teilweise verwirrenden - Unterschiede erklärt.
Folgende zwei Dinge gilt es jedoch vorab zu beachten:
</p>

<p>
<b>Quell- und Binär-Pakete.</b>
Es gibt zwei verschiedene Arten von Paketen: Quell- und Binär-Pakete.
Ein Binär-Paket ist ein Paket-Archiv, das vorkompilierte Programme enthält, die, nachdem sie extrahiert (installiert) wurden, unmittelbar gestartet und genutzt werden können.
Ein Quell-Paket dagegen besteht aus dem Quellcode sowie Fink-spezifischen Anpassungen und Vorschriften zur Kompilierung.
Quell-Pakete brauchen einige Zeit zur Installation. Denn zur Erzeugung ausführbarer Programme, muss der Quellcode auf Ihrem Rechner kompiliert werden.
</p>

<p>
<b>Alle Fink-Installationen sind gleich.</b>
Egal wie Sie Fink installiert haben, Sie können Pakete stets mit Hilfe ihrer Quelldateien zu erzeugen.
Gleichermaßen können Sie heruntergeladene Binärpakete installieren, <u>solange Fink im Verzeichnis <tt>/sw</tt> installiert ist</u>.
Alles, was Sie tun müssen, ist entsprechende Tools und Update-Verfahren zu nutzen.
</p>

<p>
Welche Optionen gibt es nun?
</p>
<p>
Die <a href="bindist.php">Binär-Version</a> nutzt Binär-Pakete.
Hierzu gibt es ein grafisches Installations-Tool für die erstmalige Installation, einen Paket-Browser und ein Auswahl-Tool (dselect).
Es verfolgt den aktuellen, letzten Versionsstand. Allerdings braucht es normalerweise ein paar Tage, um nach der Veröffentlichung einer neuen Version auf den aktuellen Stand zu kommen. Gelegentlich gibt es auch Updates zwischen den Versionen.
Updates auf die aktuellen Versionen sind automatisch möglich - fordern Sie nur dselect oder apt-get auf, die aktuellen Paket-Verzeichnisse aus dem Netz zu laden.
Nachteil der Nutzung von Binär-Versionen ist die Tatsache, dass nicht alle Pakete in Binär-Form verfügbar sind.
Einige entsprechen nicht unseren Qualitätsstandards oder haben technische Mängel; manche dürfen auf Grund von Lizenzbeschränkungen nicht vertrieben werden; andere wiederum enthalten Kryptographie-Beschränkungen.
</p>
<p>
Die <a href="srcdist.php">Quelltext-Version</a> erzeugt und installiert alles (falls von Ihnen nicht anders bestimmt) mit Hilfe der Quelldateien. Sie wird mit Kommandozeilen-Skripts gesteuert.
Die Quelltext-Version kann sich selbst mit Hilfe des 'fink selfupdate'-Befehls auf den neusten Stand bringen.
Der Vorteil dieses Verfahrens ist die Verfügbarkeit aller Pakete, die als 'stable' deklariert sind.
Der Nachteil wurde bereits genannt - das Kompilieren benötig Zeit und Sie müssen die Befehle zu Installation der Pakete selbst eintippen.
</p>

<p>
Die eigentliche Entwicklung von Fink spielt sich in einem CVS-Repository ab. Diesen können Sie verfolgen, um immer auf dem neusten Stand zwischen den Versionen zu sein.
Die Benutzung funktioniert entsprechend der der Quelltext-Version, nur dass Sie die Paket-Beschreibungen über andere Kanäle erhalten (Sprich: 'fink selfupdate' funktioniert hier nicht.)
Für Details schauen Sie sich die <a href="../doc/cvsaccess/index.php">CVS Anleitung</a> an.
</p>
<?
include "footer.inc";
?>
