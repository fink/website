<?
$title = "Quelltext Version Download";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2007/06/14 07:31:01 $';

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
<p>The source tarball contains the <em>fink</em> package manager.  After you have installed it, you will be able to get package descriptions and patches.  It will use these to download the source code from the original distribution sites or the Fink project's mirrors and build them on your local machine.</p>
<!-- end translation -->
<? 
include "../fink_version.inc";
?>

<!--
<p>
Fink <? print $fink_version; ?> wurde am  
<? print $release_date; ?> offiziell veröffentlicht.
</p>
-->
<p><em>fink-0.27.1</em> wurde am  2007-03-19 offiziell veröffentlicht.</p>

<ul>
<!-- start translation -->
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full-XCode-2.1.tar.gz">Fink
<? print $release_version; ?></a> (for OS X 10.4 with XCode 2.1)
- 6241K, .tar.gz format</li>
<!-- end translation -->
</ul>

<p>
<b>Wichtig:</b>
Entpacken Sie die Datei nicht mit dem Programm  StuffIt, da er manche Dateinamen beschädigt.

Nutzen Sie stattdessen das Kommandozeilen-Tool<tt>tar</tt>.

In obiger Datei finden Sie umfangreiche Anleitungen zur Installation und Nutzung.
Bitte lesen Sie sie - Fink ist keine ein-Klick-und-fertig-Geschichte.
Die Dokumente README, INSTALL und USAGE stehen sowohl als reine Textdokumente (zum lesen in der Kommandozeile) als auch in Form von HTML (zum lesen im Browser und zum ausdrucken) zur Verfügung.
die Dokumente finden sie auch online im <a
href="../doc/index.php">Bereich Dokumentation</a>.
</p>
<!-- start translation -->
<p>After you have installed <em>fink</em> and the other base packages, the commands</p>
<pre>fink selfupdate-rsync</pre>
<p>or</p>
<pre>fink selfupdate-cvs</pre>
<p>will download the package description files and patches.</p>
<!-- end translation -->
<p>
Um über neue Versionen informiert zu werden, abonnieren Sie die<a
href="../lists/fink-announce.php">fink-announce Mailingliste</a>.
</p>


<?
include "footer.inc";
?>
