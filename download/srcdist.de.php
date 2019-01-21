<?php
$title = "Quelltext Version Download";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2019/01/19 10:11:22 $';

include "header.inc";
include "../fink_version.inc";
?>

<h1>Download der Quelltext-Version von Fink</h1>

<!--monipol: As instructions for 10.6 were 'hidden' below 10.5, I've copied and
pasted them here with the title 10.6. -->

<h2>OS X 10.4 und später:</h2>

<p>Der Source-Tarball enthält den <em>Fink</em>-Paketmanager. Mit dessen Hilfe 
können sie nach der Installation Paketbeschreibungen und Patches beziehen.
Diese werden verwendet, um Software aus den Projekt-Repositories oder den 
Mirrors des Fink-Projekts herunterzuladen und auf ihrem Computer zu erstellen 
und zu installieren.</p>

<!--akh: edit web/fink_version.inc to update the information hencefort -->

<p><em>Fink <?php print $fink_tool_version; ?></em> wurde am  
<?php print $fink_tool_release_date; ?> offiziell veröffentlicht.</p>

<ul>
  <li>
Nehmen sie für macOS 10.9-10.14
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-" . $fink_tool_version . ".tar.gz", "fink-" . $fink_tool_version . ".tar.gz", "/downloads/FinkSOURCE") ?> - <?php echo $fink_tool_tarball_k ?><br>
  </li>
Nehmen sie für OS X 10.7-8, use
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.38.7.tar.gz", "fink-0.38.7.tar.gz", "/downloads/FinkSOURCE") ?> - 1185K<br>
	 </li>
     <li>
Nehmen sie für OS X 10.6
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.36.5.tar.gz", "fink-0.36.5.tar.gz", "/downloads/FinkSOURCE") ?> - 1176K<br>
     </li>
     <li>
Nehmen sie für OS X 10.5
  <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.34.10.tar.gz", "fink-0.34.10.tar.gz", "/downloads/FinkSOURCE") ?> - 1268K<br>
     </li>
     <li>
Nehmen sie für OS X 10.4
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.30.2.tar.gz", "fink-0.30.2.tar.gz", "/downloads/FinkSOURCE") ?> - 1188K<br>
     </li>
</ul>

<p>Sie müssen auch für ihr System die entsprechenden Command-Line-Tools für 
Xcode installieren, (siehe: 
<a href="./index.de.php#additionaldownloads">Schnellanleitung</a>),  
das wie folgt gemacht werden kann:</p>
<ul>
<li><p><em>10.9-10.14:  </em>Führen sie <code>sudo xcode-select --install</code> im 
Terminal aus und wählen sie den Install-Knopf aus.</p></li>
<li><p><em>10.9-10.14:  </em>Manueller Download von developer.apple.com.  Achten 
sie auf die richtige Version für ihre Version von Mac OS X.</p></li>
<li><p><em>10.7-10.8:  </em>Installieren sie das komplette Xcode. Man kann die 
Command-Line-Tools über den <em>Downloads</em>-Reiter in den 
<strong>Voreinstellungen</strong> von Xcode installieren.</p></li>
<li><p><em>10.6:  </em>Installieren sie das komplette Xcode.</p></li>
</ul>
<p>Installieren sie das komplette Xcode auf 10.7-10.14, indem sie folgende 
Befehle ausführen:</p>
<pre>sudo xcode-select -switch /Applications/Xcode.app/Contents/Developer</pre>
<p>wobei sie <em>/Applications</em> mit dem tatsächlichen Pfad zur Xcode-App 
ersetzen müssen.</p>
<p>Sie müssen auch <pre>sudo xcodebuild -license</pre> ausführen, um die 
Lizenzbedingungen für Xcode zu akzeptieren. Nur so funktioniert der Nutzer 
'build', der von Fink eingerichtet und verwendet wird.</p> 
<p></p>
<p>Packen sie nun das Archiv <?php print $fink_tool_version; ?>.tar.gz aus, falls 
es nicht automatisch erfolgte, mit anderen Worten, führen sie folgende Befehle 
in einem Terminalfenster aus (Ab hier wird angenommen, dass der Download in 
das übliche Verzeichnis erfolgte. Wenn nicht, müssen sie die Befehle 
entsprechend anpassen.):</p>

<pre>cd $HOME/Downloads</pre>
<p>gefolgt von</p>
<pre>tar -xvf fink-<?php print $fink_tool_version; ?>.tar.gz</pre>
<p>oder</p>
<pre>tar -xvf fink-<?php print $fink_tool_version; ?>.tar</pre>
<p>wobei die Wahl davon abhängt, ob das Archiv zum Beispiel von Safari bereits 
teilweise oder ganz ausgepackt wurde.</p>

<p>Führen sie dann folgende Befehle:</p>

<pre>cd fink-<?php print $fink_tool_version; ?></pre>
<pre>./bootstrap</pre>
<p>im Terminal aus, um das das Fink-Basissystem zu installieren. Wollen sie ein 
anderes Verzeichnis als die Voreinstellung <em>/sw</em> verwenden, geht das mit</p>
<pre>./bootstrap /path</pre>
<p>(Ersetzen sie <em>/path</em> mit dem Verzeichnis ihrer Wahl).</p>
<p>Führen sie nach dem Abschluss der Installation folgendes Kommando aus:</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>Dies setzt die Umgebung (environment) für Fink (unter der Annahme, dass Fink 
in /sw installiert ist).  Öffnet man ein neues Terminalfenster, benutzt die 
Sitzung die neuen Einstellungen der Umgebung. Sind <em>fink</em> und die anderen 
Basis-Pakete installiert, laden folgende Kommandos Paketbeschreibungen und 
Patches herunter:</p>

<pre>fink selfupdate-rsync</pre>
<pre>fink index -f</pre>
<p>oder</p>
<pre>fink selfupdate-git</pre>
<pre>fink index -f</pre>

<p><code>rsync</code> ist für die meisten die bessere Wahl als <code>git</code>.</p>

<p>In obiger Datei finden sie umfangreiche Anleitungen zur Installation und Nutzung.
Bitte lesen sie sie - Fink ist keine ein-Klick-und-fertig-Geschichte.
Die Dokumente README, INSTALL und USAGE stehen sowohl als reine Textdokumente 
(zum Lesen in der Kommandozeile) als auch in Form von HTML (zum Lesen im Browser 
und zum Ausdrucken) zur Verfügung. Die Dokumente finden sie auch online im 
<a href="../doc/index.php">Bereich Dokumentation</a>.
</p>

<p>
Um über neue Versionen informiert zu werden, abonnieren sie die <a
href="../lists/fink-announce.php">fink-announce Mailingliste</a>.
</p>

<h2>OS X 10.5 Point Release:</h2>

<p>Dieses Quelltext-Point-Release enthält den <em>Fink</em>-Paketmanager sowie 
Paketbeschreibungen und Patches. Es lädt den Quelltet von der originalen 
Distributionsseite und erstellt sie auf ihrem lokalen Computer.
</p>

<p><em>Fink <?php print $fink_version; ?></em> wurde am  
<?php print $release_date; ?> offiziell veröffentlicht.</p>

<ul><li>
<?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-" . $fink_version . "-full.tar.gz", "fink-" . $fink_version . "-full.tar.gz", "/downloads/FinkFullSOURCE") ?> - 3524k<br>
</ul>

<p>Sie müssen auch für ihr System die entsprechenden Command-Line-Tools für 
Xcode installieren, (siehe: 
<a href="./index.de.php#additionaldownloads">Schnellanleitung</a>)</p>

<p>Packen sie nun das Archiv tar.gz mit folgendem Kommando aus, falls es nicht 
bereits automatisch erfolgte:</p>

<pre>tar -xvzf fink-<?php print $fink_version; ?>-full.tar.gz</pre>

<p>oder mit</p>

<pre>tar -xvf fink-<?php print $fink_version; ?>-full.tar</pre>

<p>falls es schon teilweise entpackt wurde. Wechseln sie dann in einem 
Terminalfenster in das erstellte <em>fink-<?php print $fink_version;
?></em> Verzeichnis und führen sie</p>

<pre>./bootstrap</pre>

<p>aus, um das Boostrapping zu starten, womit die Basisinstallation von Fink 
erfolgt.  Wollen sie ein anderes Verzeichnis als die Voreinstellung <em>/sw</em> 
verwenden, geht das mit</p>
<pre>./bootstrap /path</pre>
<p>(Ersetzen sie <em>/path</em> mit dem Verzeichnis ihrer Wahl).</p>
<!-- akh: I got a note from Trevor Harmon that the 0.28.0 bootstrap automagically runs pathsetup.sh
     rangerrick: but that is not true!  ;) -->

<p>Führen sie nach dem Abschluss der Installation folgendes Kommando aus:</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>Dies setzt die Umgebung (environment) für Fink (unter der Annahme, dass Fink 
in /sw installiert ist).  Öffnet man ein neues Terminalfenster, benutzt die 
Sitzung die neuen Einstellungen der Umgebung. Sind <em>fink</em> und die anderen 
Basis-Pakete installiert, laden folgende Kommandos Paketbeschreibungen und 
Patches herunter:</p>

<pre>fink selfupdate</pre>

<p>entweder mit der Option <em>rsync</em> oder <em>git</em> gefolgt von</p>

<pre>fink index -f</pre>

<p>gefolgt von</p>

<pre>fink selfupdate-rsync</pre>

<p>oder</p>

<pre>fink selfupdate-git</pre>

<p>Alles aber unter der Voraussetzung, dass sie ursprünglich 
<strong>nicht</strong> die Methode "point release" ausgewählt haben. 
<code>rsync</code> ist für die meisten die bessere Wahl als <code>git</code>.</p>

<p>In obiger Datei finden sie umfangreiche Anleitungen zur Installation und Nutzung.
Bitte lesen sie sie - Fink ist keine ein-Klick-und-fertig-Geschichte.
Die Dokumente README, INSTALL und USAGE stehen sowohl als reine Textdokumente 
(zum Lesen in der Kommandozeile) als auch in Form von HTML (zum Lesen im Browser 
und zum Ausdrucken) zur Verfügung. Die Dokumente finden sie auch online im 
<a href="../doc/index.php">Bereich Dokumentation</a>.
</p>

<p>
Um über neue Versionen informiert zu werden, abonnieren sie die <a
href="../lists/fink-announce.php">fink-announce Mailingliste</a>.
</p>

<?php
include "footer.inc";
?>
