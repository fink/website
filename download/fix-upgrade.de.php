<?
$title = "Reparieren der Aktualisierungsfunktion";
$cvs_author = '$Author: g5cpu $';
$cvs_date = '$Date: 2004/04/13 15:52:54 $';

include "header.inc";
?>


<h1>Reparieren der Aktualisierungsfunktion</h1>

<p>
Beim Versuch mit Hilfe des <code>fink selfupdate</code>-Befehls eine Fink-Installation zu aktualisieren, treten bei bestimmten Fink-Versionen Probleme auf (ausgenommen CVS).
Das Ergebnis dieses Befehls ist die Meldung, dass das die bestehende Installation der neuesten Version entspricht, obwohl (wie die Meldung ebenfalls zeigt) die bestehende Version älter ist als die neueste.
Verfahren Sie in diesem Falle wie folgt, um Fink erfolgreich zu aktualisieren:
</p>
<ol>

<li><p>Installieren Sie eine ältere Version des Fink Paket-Managers, indem Sie die folgenden Befehle im Terminal ausführen:
</p>
<pre>curl -O http://us.dl.sourceforge.net/fink/direct_download/dists/fink-0.5.1/main/binary-darwin-powerpc/base/fink_0.11.1-10_darwin-powerpc.deb
sudo dpkg -i fink_0.11.1-10_darwin-powerpc.deb
rm fink_0.11.1-10_darwin-powerpc.deb</pre>
<li><p>
Anschließend aktualisieren Sie Fink wie gewöhnlich mit Hilfe des <code>fink selfupdate</code>-Befehls.
</p>

</ol>



<?
include "footer.inc";
?>
