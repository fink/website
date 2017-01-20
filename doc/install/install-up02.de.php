<?php
$title = "Installation - Sauber";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2015/11/01 02:12:02';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Installation Contents"><link rel="prev" href="install-up03.php?phpLang=de" title="Fink aktualisieren">';


include_once "header.de.inc";
?>
<h1>Installation - 4. Sauberes Aktualisieren</h1>




<p>
	Es gibt Situationen, die normalerweise nicht jeden Tag auftreten, in denen man
  Fink ein zweites Mal installieren muss.
</p>


<h2><a name="cleaninst">4.1 Situationen, die ein sauberes Reinstall erfordern</a></h2>
<ul>
  <li>
    <p>Sie wollen Fink in einen anderen Pfad verschieben.</p>
  </li>
  <li>
    <p>
      Sie wollen oder haben bereits OS X auf eine Version aktualisiert, für die
      Fink keinen Aktualisierungsweg anbietet
    </p>
    <p>- 10.4 -&gt; 10.6+</p>
    <p>- 10.5 -&gt; 10.7+</p>
    <p>- 10.6 -&gt; 10.7+</p>
    <p>- 10.8- -&gt; 10.9+</p>
  </li>
  <li>
    <p>
      Ihre Fink-Installation hat Bibliotheken verlinkt, z. B. mit MacPorts oder
      in <code>/usr/local</code>, die auf ihrem Rechner gelöscht wurden
      und infolge davon Bibliotheken oder Programme zerstört sind.
    </p>
  </li>
</ul>


<h2><a name="backup">4.2 Sicherungskopie für Zeitersparnis</a></h2>
<p>
Will man nach einer Re-Installation von Fink Zeit sparen, kann man eine Liste
der installierten Pakete erhalten. Folgende Kommandos in ein Terminal-Fenster
eingegeben funktionieren, sogar wenn die Fink-Tools nicht vorhanden sind.
</p>
<pre>grep -B1 "install ok installed" /sw/var/lib/dpkg/status \
| grep "^Package:" | cut -d: -f2 | cut -d\  -f2 &gt; finkinst.txt</pre>
<p>
Dies wird die Liste ihrer Pakete in der Datei <code>finkinst.txt</code>
im aktuellen Arbeitsverzeichnis abspeichern.
</p>
<p>
Sie können auch die Quellen in <code>/sw/src</code> in ein anderes
Verzeichnis verschieben oder kopieren, so dass sie die Zeit für das Herunterladen
der Quellen sparen können, wenn sie ihre Fink-Distribution wieder einrichten.
</p>
<p>
Sollten sie globale Änderungen in einem ihrer Pakete gemacht haben, in dem sie
Konfigurationsdateien in <code>/sw/etc</code>, geändert haben, dann
können sie diese Dateien sichern.
</p>


<h2><a name="removing">4.3 Ein altes Fink löschen</a></h2>
<p>
Haben sie alles in einer <a href="#backup">Sicherungskopie</a>
gesichert, können sie ihre Fink-Distribution entfernen. Löschen sie
<code>/sw</code> sowie alles in <code>/Applications/Fink</code>
entweder im Finder oder in der Kommandozeile:
</p>
<pre>sudo rm -rf /sw /Applications/Fink/*</pre>
<p>
(Ersetzen sie <code>/sw</code> durch ihren aktuellen Fink-Baum).
</p>


<h2><a name="reinstalling">4.4 Fink erneut installieren</a></h2>
<p>
Folgen sie als erstes den Anweisungen im Abschnitt
<a href="install-first.php?phpLang=de">Erst-Installation</a>.
</p>
<p>
  Nachdem sie die Paketbeschreibungen herunter geladen haben, verschieben sie
  die Quellen, die sie <a href="#backup">gesichert</a> haben in
  <code>/sw/src</code> entweder mit dem Finder oder in der Kommandozeile:
</p>
<pre>sudo cp /path/to/backup/* /sw/src</pre>
<p>
  (Wie üblich, ersetzen sie <code>/sw</code> mit ihrem tatsächlichen
  Fink-Baum). Wenn sie wollen, können sie <code>fink configure</code> verwenden,
  um den Pfad zu ihrem Sicherungsverzeichnis anzugeben:
</p>
<pre>In what additional directory should Fink look for downloaded tarballs? [] 
<b>(enter your backup directory at the prompt)</b>. 
</pre>
<p>
  Anmerkung: Dies erfordert, dass der gesamte Pfad zum Sicherungsverzeichnis und
  das Verzeichnis selbst von allen (world) gelesen werden kann.
</p>
<p>
  Sie können zu diesem Zeitpunkt auch die globalen Konfigurationsdateien
  einspielen. Anmerkung: Wir raten dringend die Datei
  <code>/sw/etc/fink.conf</code> aus einer früheren Installation wegen
  Inkompatibilitäten <b>nicht</b> zurück zu spielen. Sie können die Datei
  mit einem Texteditor öffnen und entsprechende Werte nach
  <code>fink configure</code> eingeben.
</p>




<?php include_once "../../footer.inc"; ?>


