<?php
$title = "Herunterladen der Quelltext-Dateien für binäre Pakete";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:38 $';

include "header.inc";
?>

<h1>Herunterladen der Quelltext-Dateien für binäre Pakete</h1>

<p>
  Fink stellt vorübersetzte Version seiner "stabilen" Pakete für die
  automatische Installation zur Verfügung (soweit die Lizenz eines Pakets
  dies erlaubt).  Viele Pakete stehen und der GNU Public License (GPL) und
  das Projekt Fink nimmt die Verpflichtungen aus der GPL sehr ernst.
</p>
<p>
  Mit dem <a href="http://bindist.finkmirrors.net/">Archiv-Browser</a> kann
  eine Nutzer die binären Pakete erhalten, aber auch die Quelltexte,
  Patches und Anweisungen für das Erstellen.  Normalerweise erfolgt dies
  automatisch: Lädt Fink ein binäres Paket vom Projekt Fink herunter,
  erfolgt dies aus seinem Archiv, bei Quelltexten häufig aus seinem
  Quelltextarchiv (über die "Master" Quelltext-Mirror).  Mit dem
  Archiv-Browser kann man alles auch manuell herunter laden, unabhängig
  davon, ob sich um binäre Pakete oder zugehörige Quelltext-Pakete
  handelt.
</p>
<p>
  Der Archiv-Browser ist hierarchisch gegliedert: Jede "Distribution" im
  Archiv (die für eine bestimmte Version von OS&nbsp;X spezifisch ist) ist
  in die Sektionen "crypto" und "main" unterteilt, die jeweils weiter
  unterteilt sind.  Die Verzeichnisse
  <code>binary-darwin-<em>architecture</em></code> enthalten die binären
  Pakete, wiederum nach weiteren Gebieten unterteilt.  Die Verzeichnisse
  <code>finkinfo</code> enthalten die Dateien mit den Anweisungen für das
  Erstellen von Paketen und die Patch-Dateien.  Die Verzeichnisse
  <code>source</code> enthalten die Quelltext-Dateien.
</p>
<p>
  Kennt man den Namen eines Pakets, kann man deshalb nicht nur die
  Quelltext-Datei sondern auch alle notwendigen Patch-Dateien und
  Anweisungen für das Erstellen einsehen, wie sie für das Erstellen des
  binären Pakets verwendet wurden.  Die Syntax für die Anweisungen ist
  sorgfältig im
  <a href="../doc/packaging/index.php">Fink Packaging Manual</a>
  dokumentiert.
  (Anmerkung: Einige der Anweisungsdateien werden für das Erstellen von
  mehr als einem Paket verwendet.  Dann muss man entweder alle Dateien in
  einem Verzeichnis durchsuchen oder man such in der
  <a href="http://pdb.finkproject.org/pdb/index.php">Online Paket Datenbank</a>
  und bestimmt so die "Eltern" des gesuchten Pakets.
</p>
<p>
  Eine letzte Anmerkung: Der Fink-Installer (Er verwendet Apples Installer
  Program für die Installation eines Basis-Fink Setup) steht auf
  <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">Finks
  Datei-Release-Seite bei Sourceforge.net</a> 
  bereit.  Die Quelltext-Dateien für die darin enthaltenen binären
  Pakete gibt es auch bei Sourceforge.net: Der Installer ist im Release
  "distribution", und die Quelltext-Dateien in den Releases
  "miscellaneous/bootstrap" und "fink".
</p>

<?php
include "footer.inc";
?>
