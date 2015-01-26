<?php
$title = "Anleitung zur Aktualisierung unter Mac OS X 10.10";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2015/01/26 09:52:03 $';

include "header.inc";
?>

<h1>Anleitung zur Aktualisierung unter  Mac OS X 10.10</h1>
<h2>10.9 nach 10.10</h2>
<ol>
	<li>
		Bevor sie 10.10 installieren, führen sie das Kommando <pre>fink selfupdate</pre> 
		(mit rsync oder CVS) aus, um die neueste Version von <code>fink</code> zu erhalten.
	</li>
	<li>
		Aktualisieren sie das Betriebssystem.
	</li>
	<li>
		Wenn noch nicht erfolgt, installieren sie Xcode 6.1 oder zumindest seine Command 
		Line Tools für Yosemite.
		Ist Xcode 6.1 installiert, muss man immer noch die Command Line Tools erneut 
		installieren, selbst wenn sie bereits unter Mavericks installiert waren.
	</li>
	<li>
		Haben sie Xcode 6.1, führen sie <pre>sudo xcodebuild -license</pre> aus, um die
		Lizenz für Xcode zu akzeptieren. Wenn man nur die Command Line Tools verwendet, 
		ist dies nicht nötig.
	</li>
	<li>
		Führen sie das Kommando <pre>fink configure</pre> aus, um den Fink-Nutzer "build" 
		zu reaktivieren.  Apple löscht unsere Nutzer, aber aus unerfindlichen Gründen 
		nicht unsere Gruppen.
	</li>
	<li>
		Führen sie das Kommando <pre>fink reinstall fink</pre> aus, um auf die 
		Distribution für 10.10 zu zeigen.
	</li>
	<li>
		Optional: 
		<p>Führen sie das Kommando <pre>fink install perl5162-core</pre> aus, wenn sie 
		<code>-pm5162</code>-Pakete installiert haben.</p>
		<p>Führen sie das Kommando <pre>fink list -it passwd | cut -f2 | xargs fink reinstall</pre> 
		aus, wenn sie <code>passwd-*</code>-Pakete installiert haben.
	</li>
</ol>
<p>
	Aktualisiert man von 10.9 nach 10.10 mit einer fink Version, die 10.10 nicht 
	unterstützt, geht es nicht weiter. Der einfachste Option ist den Anweisungen unten zu 
	folgen und eine binäre Distribution zu verwenden, um Zeit zum erstellen der Pakete zu 
	sparen.
</p>

<h2>Von 10.8 und früher nach 10.10:</h2>
<p>Es gibt keinen unterstützten Weg für Fink von 10.8 (oder früher) nach 10.10.</p>

<p>Die Anleitung hier ist eine Übertragung der Anleitung auf dem <a
  href="http://finkers.wordpress.com/2011/09/26/fink-and-lion/">Fink blog</a>. 
  Die Einträge dort beschreiben die Aktualisierung mit mehr Details.</p>

<p>
  Dieser Prozess sammelt eine Liste der Pakete, die auf aktuell installiert sind und 
  speichert sie für die spätere Verwendung bei der Installation von Fink auf 10.10.
</p>
<p>
  Befolgen sie die folgenden Anweisungen, um die Liste der Pakete zu erstellen:
</p>
<ol>
  <li>
    Benutzen sie  
    <pre>grep -B1 "install ok installed" /sw/var/lib/dpkg/status | grep Package | cut -d: -f2 > fink_packages.txt</pre>
    um die Paketinformationen in einer Datei zu speichern.
  </li>
  <li>
    Bennen sie ihren Fink-Baum um, z. B. mit dem Kommando <pre>sudo mv /sw /sw.old</pre>.
  </li>
  <li>
    Installieren sie OS X 10.10 und Xcode 6.1 oder zumindest die Command Line Tools.
  </li>
  <li>
    <a href="./srcdist.php">Installieren sie Fink</a> auf ihrem neuen 10.10 System.
  </li>
  <li>
    Führen sie das Kommando <pre>cat fink_packages.txt | xargs fink install</pre>
    aus, damit die neue Installation von Fink die Pakete installiert, die
    vorher unter 10.8 oder früher installiert waren.
  </li>
  <li>
    Löschen sie das Fink-Verzeichnis, z. B. mit <pre>sudo rm -rf /sw.old</pre>.
  </li>
</ol>
<p>
  Nicht alle Pakete, die unter 10.8 und früher zur Verfügung standen, gibt es auch
  für 10.10, weil es einige Änderungen im System gibt.  Es wird daran
  gearbeitet, möglichst viele der Pakete wieder verfügbar zu machen.  Ist
  ihr Lieblingspaket auf 10.10 noch nicht verfügbar, kontaktieren sie den
  Maintainer des Pakets und fragen sie ihn, ob es nach 10.10 übernommen
  werden kann.
</p>

<?php
include "footer.inc";
?>
<?php include_once "../phpLang.inc.php"; ?>
