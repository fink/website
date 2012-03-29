<?
$title = "Quelltext Version Download";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2012/03/29 00:09:30 $';

include "header.inc";
?>

<h1>Download der Quell-Version von Fink</h1>
<!--AKH 2007-05-31.  Fix when we have a release tarball that works with OS > 10.4.9
<p>
Die Quell-Version von Fink enthält den fink Paketmanager sowie Paketbeschreibungen und Patches.
Diese Version lädt den Quellcode von der Original Veröffentlichungsseite und kompiliert und installiert ihn auf ihrem lokalen Rechner.
</p>
-->
<!-- start translation -->
<p>Der Source-Tarball enthält den Fink-Paketmanager. Mit dessen Hilfe können Sie nach der Installation Paketbeschreibungen und Patches beziehen.
Diese werden verwendet, um Software aus den Projekt-Repositories oder den Mirrors des Fink-Projekts herunterzuladen und auf Ihrem Computer zu installieren.
</p>
<? 
include "../fink_version.inc";
?>

<!--
<p>
Fink <? print $fink_version; ?> wurde am  
<? print $release_date; ?> offiziell veröffentlicht.
</p>
-->
<p><em>fink-0.28.0</em> wurde am  2007-11-02 offiziell veröffentlicht.</p>

<ul>
<!-- start translation -->
<!--<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full-XCode-2.1.tar.gz">Fink
<? print $fink_version; ?></a> (for OS X 10.4 with XCode 2.1)
- 6241K, .tar.gz format</li>-->
<li><a href="http://downloads.sourceforge.net/fink/fink-0.28.0.tar.gz" onClick="pageTracker._trackPageview('/downloads/FinkSOURCE');">fink-0.28.0</a> - 1308K, .tar.gz format</li>
<!-- end translation -->
</ul>

<p>
<!-- <b>Wichtig:</b>
Entpacken Sie die Datei nicht mit dem Programm  StuffIt, da er manche Dateinamen beschädigt.

Nutzen Sie stattdessen das Kommandozeilen-Tool<tt>tar</tt>. -->

<!-- start translation -->
Bitte installieren Sie außerdem  die Xcode Tools (siehe auch <a href="./index.en.php" >the Quick Start page</a>).</p>
  <p>Entpacken Sie das tar.gz-Archiv (falls nicht automatisch geschehen) mit folgendem Befehl aus dem Terminal:</p>
<pre>tar -xvzf fink-0.28.0.tar.gz</pre>

<p>Wechseln Sie in das entpackte Verzeichnis fink-0.28.0 und führen Sie</p>
<pre>./bootstrap</pre>
<p>aus, um das das Fink-Grundsystem zu installieren.</p>
<p>Nach der Installation von Fink und den weiteren Basispaketen führen Sie bitte einen der folgenden Befehle aus, um die Paketbeschreibungen und Pasches herunterzuladen:</p>
<pre>fink selfupdate-rsync</pre>
<pre>fink selfupdate-cvs</pre>
<!-- end translation -->

<p>In obiger Datei finden Sie umfangreiche Anleitungen zur Installation und Nutzung.
Bitte lesen Sie sie - Fink ist keine ein-Klick-und-fertig-Geschichte.
Die Dokumente README, INSTALL und USAGE stehen sowohl als reine Textdokumente (zum lesen in der Kommandozeile) als auch in Form von HTML (zum lesen im Browser und zum ausdrucken) zur Verfügung.
die Dokumente finden sie auch online im <a
href="../doc/index.php">Bereich Dokumentation</a>.
</p>
<p>
Um über neue Versionen informiert zu werden, abonnieren Sie die<a
href="../lists/fink-announce.php">fink-announce Mailingliste</a>.
</p>


<?
include "footer.inc";
?>
