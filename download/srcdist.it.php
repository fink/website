<?
$title = "Source Release Download";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2005/09/15 01:56:35 $';

include "header.inc";
?>

<h1>Download Fink Source Release</h1>

<p>
La source release contiene il gestore pacchetti fink pi?le descrizioni
e gli aggiornamenti.
Scaricherà il codice sorgente dai siti di distribuzione ufficiali
e li compilerà sulla vostra macchina.
</p>
<? 
include "../fink_version.inc";
?>

<p>
Fink <? print $fink_version; ?> è stato ufficialmente rilasciato il 
<? print $release_date; ?>.

</p>
<ul>
<!-- start translation -->
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full-XCode-2.1.tar.gz">Fink
<? print $release_version; ?></a> (for OS X 10.4 with XCode 2.1)
- 6241K, .tar.gz format</li>
<!-- end translation -->
</ul>

<p>
<b>Importante:</b>
Non estraete gli archivi con StuffIt, facendo questo potreste corrompere dei nomi.
Usate invece il comando da terminale <tt>tar</tt>.
Le istruzioni le trovate nell'Installer Document.
</p>

<p>
L'installazione e le istruzioni sono all'interno del
tarball.
Per favore leggete di seguito - Fink non è un programma un-click-e-fatto.
I documenti README, INSTALL e USAGE sono scritti in plain text (per
essere letti da linea di comando) e in HTML (per essere letti in un browser
e per essere stampati).
Sono anche disponibili online alla <a
href="../doc/index.php">documentazione</a>.
</p>
<p>
Per essere informato sul rilascio di nuove versioni, sottoscrivetevi alla <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>


<?
include "footer.inc";
?>
