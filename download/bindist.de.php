<?
$title = "Download der Binär-Version von Fink";
$cvs_author = '$Author: g5cpu $';
$cvs_date = '$Date: 2004/04/13 15:52:54 $';

include "header.inc";
?>

<h1>Download der Binär-Version von Fink</h1>

<p>
Die Binär-Version von Fink spart Ihnen die Mühe, die Programme auf Ihrer eigenen lokalen Maschine zu kompillieren.
Nach der Installation des Basis-Systems mit Hilfe des Installationspaketes, können Sie vorkompilierte Binärpakete mit den Tools deselect und apt-get herunterladen.
Allerdings ist nur ein Teil der Pakete als Binärpakete verfügbar, die übrigen müssen Sie mit Hilfe der Quelldaten selbst erstellen.
Dies hat vor allem rechtliche Gründe, die mit den entsprechenden Paketen verbunden sind.
</p>
<? 
include "../fink_version.inc";
?>
<p>
<b>Status:</b>
Die Binär-Installation von Fink <? print $fink_version; ?> wurde veröffentlicht.
Die Binär-Version ist vollständig.
</p>
<ul>
<li><a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Installer.dmg?download">Fink
<? print $fink_version; ?> Binary Installer</a> - <? print $dmg_size; ?>, komprimmiertes .dmg Disk-Image</li>
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


<?
include "footer.inc";
?>
