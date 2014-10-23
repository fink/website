<?php
$title = "Download der Binär-Version von Fink";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>

<h1>Download der Binär-Version von Fink</h1>

<p>
Die Binär-Version von Fink spart Ihnen die Mühe, die Programme auf Ihrer eigenen lokalen Maschine zu kompillieren.
Nach der Installation des Basis-Systems mit Hilfe des Installationspaketes, können Sie vorkompilierte Binärpakete mit den Tools deselect und apt-get herunterladen.
Allerdings ist nur ein Teil der Pakete als Binärpakete verfügbar, die übrigen müssen Sie mit Hilfe der Quelldaten selbst erstellen.
Dies hat vor allem rechtliche Gründe, die mit den entsprechenden Paketen verbunden sind.
</p>
<?php
include "../fink_version.inc";
?>
<p>
<b>Status:</b>
Die Binär-Installation von Fink <?php print $fink_version; ?> (OS X 10.5) wurde veröffentlicht.
</p>
<ul>
<li><a href="http://prdownloads.sourceforge.net/fink/Fink-<?php print $fink_version; ?>-PowerPC-Installer.dmg?download">Fink
<?php print $fink_version; ?>Binary Installer (PowerPC)</a> - <?php print $dmg_size; ?>, komprimmiertes .dmg Disk-Image</li>
<li><a href="http://prdownloads.sourceforge.net/fink/Fink-<?php print $fink_version; ?>-Intel-Installer.dmg?download">Fink
<?php print $fink_version; ?>Binary Installer (Intel)</a> - <?php print $intel_dmg_size; ?>, komprimmiertes .dmg Disk-Image</li>
<li><a href="http://prdownloads.sourceforge.net/fink/direct_download/">Schauen Sie in das Veröffentlichungsarchiv</a> - hier finden Sie die Binärpakete und den dazugehörigen Quellcode.</li>
</ul>
<p>
Die Dokumentation ist noch spärlich.
Das Installations-Disk-Image enthält ein paar Anmerkungen (Fink ReadMe.rtf) und eine Kopie des vorläufigen Fink Benutzerhandbuchs.
Umfangreichere Informationen finden Sie auf dieser Website im<a
href="../doc/index.php">Bereich Dokumentation</a>.
</p>
<p>
Um über neue Versionen informiert zu werden, abonnieren Sie die<a
href="../lists/fink-announce.php">fink-announce Mailingliste</a>.
</p>


<?php
include "footer.inc";
?>
