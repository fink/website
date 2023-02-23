<?php
$title = "Source Release Download";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2019/01/19 10:11:12 $';

include "header.inc";
include "../fink_version.inc";
?>

<h1>Download Fink Source Release</h1>
<!--AKH 2007-05-31.  Fix when we have a release tarball that works with OS > 10.4.9
<p>
La source release contiene il gestore pacchetti fink pi?le descrizioni
e gli aggiornamenti.
Scaricherà il codice sorgente dai siti di distribuzione ufficiali
e li compilerà sulla vostra macchina.
</p>
-->
<!-- start translation -->
<p>The source tarball contains the <em>fink</em> package manager.  After you have installed it, you will be able to get package descriptions and patches.  It will use these to download the source code from the original distribution sites or the Fink project's mirrors and build them on your local machine.</p>
<!-- end translation -->
<?php
include "../fink_version.inc";
?>
<!--
<p>
Fink <?php print $fink_version; ?> è stato ufficialmente rilasciato il 
<?php print $release_date; ?>.
</p>
-->
<p><em>fink-0.28.0</em> è stato ufficialmente rilasciato il 2007-11-02.</p>
<ul>
<li><a href="https://downloads.sourceforge.net/fink/fink-0.28.0.tar.gz">fink-0.28.0</a> - 1308K, .tar.gz format</li>
</ul>

<p>
<!-- <b>Importante:</b>
Non estraete gli archivi con StuffIt, facendo questo potreste corrompere dei nomi.
Usate invece il comando da terminale <tt>tar</tt>.
Le istruzioni le trovate nell'Installer Document. -->

<!-- start translation -->
You will also need to install the Xcode Tools (c.f. <a href="./index.en.php" >the Quick Start page</a>).</p>
  <p>Unpack the tar.gz archive if this hasn't been done automatically, e.g. via</p>
<pre>tar -xvzf fink-0.28.0.tar.gz</pre>

<p>in a terminal window.  Then, in a terminal window, change to the resulting <em>fink-0.28.0</em> directory, and use</p>
<pre>./bootstrap</pre>
<p>to start the boostrapping operation, which will install the Fink base setup.</p>
<p>After you have installed <em>fink</em> and the other base packages, the commands</p>
<pre>fink selfupdate-rsync</pre>
<p>or</p>
<pre>fink selfupdate-git</pre>

<p>will download the package description files and patches.</p>
<!-- end translation -->

<p>L'installazione e le istruzioni sono all'interno del
tarball.
Per favore leggete di seguito - Fink non è un programma un-click-e-fatto.
I documenti README, INSTALL e USAGE sono scritti in plain text (per
essere letti da linea di comando) e in HTML (per essere letti in un browser
e per essere stampati).
Sono anche disponibili online alla <a
href="../doc/index.php">documentazione</a>.
</p>
<!-- start translation -->
<p>After you have installed <em>fink</em> and the other base packages, the commands</p>
<pre>fink selfupdate-rsync</pre>
<p>or</p>
<pre>fink selfupdate-git</pre>
<p>will download the package description files and patches.</p>
<!-- end translation -->
<p>
Per essere informato sul rilascio di nuove versioni, sottoscrivetevi alla <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>


<?php
include "footer.inc";
?>
