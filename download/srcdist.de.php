<?
$title = "Quelltext Version Download";
$cvs_author = '$Author: g5cpu $';
$cvs_date = '$Date: 2004/04/13 15:52:54 $';

include "header.inc";
?>

<h1>Download der Quell-Version von Fink</h1>

<p>
Die Quell-Version von Fink enthält den fink Paketmanager sowie Paketbeschreibungen und Patches.
Diese Version lädt den Quellcode von der Original Veröffentlichungsseite und kompiliert und installiert ihn auf ihrem lokalen Rechner.
</p>
<? 
include "../fink_version.inc";
?>

<p>
Fink <? print $fink_version; ?> wurde am  
<? print $release_date; ?> offiziell veröffentlicht.

</p>
<ul>
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full.tar.gz">Fink
<? print $release_version; ?></a> - 3497K, .tar.gz format</li>
</ul>

<p>
<b>Wichtig:</b>
Entpacken Sie die Datei nicht mit dem Programm  StuffIt, da er manche Dateinamen beschädigt.

Nutzen Sie stattdessen das Kommandozeilen-Tool<tt>tar</tt>.
</p>

<p>
In obiger Datei finden Sie umfangreiche Anleitungen zur Installation und Nutzung.
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
