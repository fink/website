<?
$title = "Source Release Download";
$cvs_author = '$Author: claudio87 $';
$cvs_date = '$Date: 2004/11/27 09:40:02 $';

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
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full.tar.gz">Fink
<? print $release_version; ?></a> - 3497K, .tar.gz format</li>
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
