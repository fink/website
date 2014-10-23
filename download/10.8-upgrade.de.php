<?php
$title = "Anleitung zur Aktualisierung unter Mac OS X 10.8";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>

<h1>Anleitung zur Aktualisierung unter Mac OS X 10.8</h1>
<h2>Von 10.7 nach 10.8</h2>
<ol>
  <li>
    Führen sie vor der Installation von 10.8 das Kommando
    <pre>fink selfupdate</pre> (mit rsync oder CVS) aus, um die
    neueste Version von <code>fink</code> zu erhalten.
  </li>
  <li>
    Falls noch nicht erfolgt, installieren sie Xcode 5.1.0 oder zumindest
    die Command Line Tools für Mountain Lion.  Auch wenn sie Xcode 5.1.0
    haben, müssen die Command Line Tools installiert werden, selbst wenn
    sie bereits unter Lion installiert waren.
  </li>
  <li>
    Führen sie das Kommando <pre>sudo xcodebuild -license</pre> aus, um die
    Lizenz für Xcode zu akzeptieren.
  </li>
  <li>
    Aktualisieren sie das Betriebsystem.
  </li>
  <li>
    Führen sie das Kommando <pre>fink configure</pre> aus, um den Finks
    Nutzer "build" zu reaktivieren.  Apple löscht unsere Nutzer, aber aus
    unerfindlichen Gründen nicht unsere Gruppen.
  </li>
  <li>
    Führen sie das Kommando <pre>fink reinstall fink</pre> aus, um auf die
    Distribution für 10.8 zu zeigen.
  </li>
  <li>
    Optional: 
    <p>
      Haben sie <code>-pm5123</code> Pakete installiert, führen sie bitte 
      das Kommando <pre>fink install perl5123-core</pre> aus.
    </p>
    <p>
      Haben sie <code>passwd-*</code> Pakete installiert, führen sie bitte 
      das Kommando 
      <pre>fink list -it passwd | cut -f2 | xargs fink reinstall</pre>
      aus.
  </li>
</ol>
<p>
  Haben sie mit einer alten Fink Version von 10.7 auf 10.8 aktualisiert,
  müssen sie zuerst eine neuere Version installieren, bevor sie weiter
  machen können.
</p>
<ol>
  <li>
    Laden sie eine Version von  
    <a href="https://raw.github.com/fink/fink/master/perlmod/Fink/Services.pm">
    Services.pm</a> herunter, die ausreichend aktuell ist.
  </li>
  <li>
    Bewegen diese nach <filename>/sw/lib/perl5/Fink</p>
  </li>
  <li>
    Führen sie <pre>fink selfupdate</pre> aus
  </li>
  <li>
    Machen sie bei Punkt 2 der obigen Liste weiter.
  </li>
</ol>

<h2>Von 10.6 und früher nach 10.8:</h2>
<p>
  Es gibt keinen unterstützten Weg für Fink von 10.6 (oder früher) nach
  10.8.
</p>
<p>
  Die Anleitung hier ist eine Übertragung der auf dem <a
  href="http://finkers.wordpress.com/2011/09/26/fink-and-lion/">Fink
  blog</a>.  Die Einträge dort beschreiben die Aktualisierung mit mehr
  Details.
</p>
<p>
  Dieser Prozess sammelt eine Liste der Pakete, die auf 10.6 (32 oder 64
  bit) installiert sind und speichert sie für die spätere Verwendung bei
  der Installation von Fink auf 10.8.
</p>
<p>
  Befolgen sie die folgenden Anweisungen, um die Liste der Pakete zu
  erstellen:
</p>
<ol>
  <li>
    Benutzen sie  
    <pre>grep -B1 "install ok installed" /sw/var/lib/dpkg/status | grep Package | cut -d: -f2 > fink_packages.txt</pre>
    um die Paketinformationen in einer Datei zu speichern.
  </li>
  <li>
    Installieren sie OS X 10.8 und Xcode 4.5.2 oder zumindest die Command
    Line Tools.
  </li>
  <li>
    Löschen sie das Fink-Verzeichnis, z. B. mit 
    <pre>sudo rm -rf /sw</pre>.
  </li>
  <li>
    <a href="./srcdist.php">Installieren sie Fink</a> auf ihrem neuen 10.8
    System.
  </li>
  <li>
    Führen sie das Kommando <pre>cat fink_packages.txt | xargs fink install</pre>
    aus, damit die neue Installation von Fink die Pakete installiert, die
    vorher unter 10.6 installiert waren.
  </li>
</ol>
<p>
  Nicht alle Pakete, die unter 10.6 zur Verfügung standen, gibt es auch
  für 10.8, weil es einige Änderungen im System gibt.  Es wird daran
  gearbeitet, möglichst viele der Pakete wieder verfügbar zu machen.  Ist
  ihr Lieblingspaket auf 10.8 noch nicht verfügbar, kontaktieren sie den
  Maintainer des Pakets und fragen sie ihn, ob es nach 10.8 übernommen
  werden kann.
</p>

<?php
include "footer.inc";
?>
<?php include_once "../phpLang.inc.php"; ?>
