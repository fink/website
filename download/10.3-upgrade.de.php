<?
$title = "Anleitung zur Aktualisierung unter  Mac OS X 10.3";
$cvs_author = '$Author: g5cpu $';
$cvs_date = '$Date: 2004/04/13 15:52:55 $';

include "header.inc";
?>


<h1>Anleitung zur Aktualisierung unter  Mac OS X 10.3</h1>

<p>Es ist nun möglich, beim fink-Upgrade alle Vorteile des gcc 3.3-Compilers zu nutzen, oder - falls installiert - OS X 10.3 zu nutzen.
Sowohl die Nutzer der Quelltext- als auch die der Binär-Version können Sie ihre Fink-Installationen entsprechend aktualisieren; allerdings ist die Binär-Version zur Zeit wesentlich stabiler und zuverlässiger als die Quelltext-Version.
</p><p>
Sollten Sie dieses Upgrade (Quelltext-Version) durchführen wollen und sollten Sie gleichzeitig das Update der Developer Tools von Apple vom Juni 2003 durchgeführt haben, müssen Sie das Update der Developer Tools vom August 2003 installieren BEVOR Sie Fink aktualisieren können.
Sorgen Sie unter 10.3 dafür, dass Sie XCode von der XCode-disc installieren, bevor Sie Fink aktualisieren.
</p><p>
Der Befehl "fink selfupdate" sollte die Aktualisierung für Sie leisten. Die aktuelle Version des Fink Paket-Managers erkennt automatisch welche Mac OS X- und welche gcc-Version bei Ihnen installiert ist und stellt sich darauf selbstständig ein.
</p><p>
Wenn Sie eine Fink-Neu-Installation auf einem  10.3-System durchführen wollen, empfehlen wir Ihnen eine
<extlink url="http://fink.sourceforge.net/download/srcdist.php">Installation auf Basis der Quelltextversion,</extlink> mit Hilfe der Datei fink-full-0.6.1.tar.gz, die sie auf der  <extlink
url="http://sourceforge.net/project/showfiles.php?group_id=17203">Sourceforge 
Download Seite von Fink finden.</extlink> Hierfür benötigen Sie außerdem XCode.
</p><p>
Beachten Sie außerdem die Tatsache, dass Sie bei einer Fink Version 0.15.0 oder höher system-xfree86 nicht mehr installieren müssen. Fink kann Ihr system-xfree86 automatisch ermitteln, wenn Sie noch keine fink x11 Pakete installiert haben. sollten Sie ein altes system-xfree86-Paket jeglicher Art installiert haben, führen Sie folgenden Befehl aus:
</p>
<pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43; fink selfupdate; fink index</pre>
<p>
Das fink-Team arbeitet weiterhin daran, dass die Pakete unter 10.3 funktionieren. Viele Pakete laufen bereits jetzt.
</p>

<?
include "footer.inc";
?>
