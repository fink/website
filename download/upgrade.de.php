<?
$title = "Upgrade-Matrix";
$cvs_author = '$Author: g5cpu $';
$cvs_date = '$Date: 2004/04/13 15:52:54 $';

include "header.inc";
?>

<h1>Fink Upgrade-Matrix</h1>

<p>
Seit der Version 0.2.0 kann jede Fink Version auf den neusten Versionsstand gebracht bzw. aktualisiert werden.
Dies beinhaltet sogar die GIMP-Installationen von MacGIMP.com und OpenOSX.com;
die ersten Versionen der beiden basierten auf Fink 0.2.1.
Die folgende Tabelle hilft Ihnen, Ihre Fink-Installation zu aktualisieren.
</p>
<p>
Wenn Sie nicht genau wissen, welche Fink-Version bei Ihnen läuft, führen Sie folgenden Befehl im Terminal aus: "<code>fink --version</code>".
</p>
<p>
Wenn Sie von eine Fink Version vor 0.3.1 aktualisieren möchten und tetex bei Ihnen installiert ist, sollten sie den Befehl "fink remove tetex" vor dem Upgrade ausführen.  (Möglicherweise müssen Sie außerdem die Pakete, die auf tetex basieren, wie z.B. lyx, entfernen, bevor Sie tetex selbst löschen können.)
Nach der Aktualisierung von Fink können Sie tetex und die darauf basierenden Pakete natürlich wieder installieren.
</p>
<? 
include "../fink_version.inc";
?>

<p>
Bedingt durch die Reorganisation der SourceForge Webseite im Frühjahr 2002 und die Verschiebung unserer Binär-Version im Sommer 2002, ist die Aktualisierung etwas kompliziert geworden. Bitte befolgen die Aktualisierungsanleitung sehr genau, um ein erfolgreiches Upgrade sicherzustellen.
Für Binär- und Quelltext-Installationen finden Sie getrennte Anleitungen.
</p>
<p>Sollten Sie Schwierigkeiten bei der Aktualisierung der Quelltext-Version haben, schauen Sie sich <a href="fix-upgrade.php">diese spezielle Anleitung an.</a></p>
<?
it_start();
it_item('<b>Aktuelle Installation (Binär-Version)</b>', '<b>Aktualisierungsmethode</b>');
it_item("Fink, offizielle binäre Version 0.5.x",
  '<p>Einfache Aktualisierung mit Hilfe von <tt>dselect</tt>: Wählen Sie "[U]pdate",
  anschließend "[I]nstall".
Oder im <tt>FinkCommander</tt>, wählen Sie "Update" anschließend
"Dist-Upgrade" (beide im <tt>Binär</tt>-Menü).</p>');
it_item("Fink, offizielle binäre Version 0.3.x bis 0.4.x",
  '<p>Aktualisierung entweder entsprechend der <a href="10.1-upgrade.php">Upgrade
  Anleitung für 10.1</a> oder der <a href="10.2-upgrade.php">Upgrade
  Anleitung für 10.2</a>.</p>');
it_item("Fink, offizielle binäre Version 0.2.x",
  '<p>Nutzen Sie das <a href="puma-kit.php">Original 10.1 Upgrade Kit</a>.  (Das Fink-Team kann diesen Aktualisierungpfad nicht länger testen.)</p>');
it_item("MacGIMP- oder OpenOSX.com- Installation unter Fink 0.2.1",
  '<p>Nutzen Sie das <a href="puma-kit.php">Original 10.1 Upgrade Kit</a>.  (Das Fink-Team kann diesen Aktualisierungpfad nicht länger testen.)
  Stellen Sie sicher, dass Sie das <code>system-xfree86</code> Paket installieren, bevor Sie die restlichen Pakete aktualisieren</p>');
  
it_item('<b>Aktuelle Installation (Quelltext-Version - source release)</b>', '<b>Aktualisierungsmethode</b>');
it_item("Fink, Quelltext-Version 0.2.5 oder neuer",
  '<p>Starten Sie "<tt>fink selfupdate</tt>". Falls Sie von 10.1 nach 10.2 aktualisieren möchten, müssen Sie diesen Schritt zwei mal durchführen, um vollständig aktualisiert zu haben.</p>');
it_item("Fink, Quelltext-Version  0.2.4 oder älter (bis zu 0.2.0)",
  "<p>Für ein Upgrade unter OS X 10.1, 
laden Sie das <a
  href=\"http://prdownloads.sourceforge.net/fink/packages-0.4.1.tar.gz\">Paket-Archiv</a> herunter, entpacken Sie es mit Hilfe des <tt>tar</tt> Tools und führen Sie folgenden Befehl innerhalb des packages-0.4.1-Verzeichnisses aus: \"<code>./inject.pl</code>\" </p><p>
Für ein Upgrade unter OS X 10.2, laden Sie das <a
  href=\"http://prdownloads.sourceforge.net/fink/dists-$fink_version.tar.gz\">dists-Archiv
  </a> herunter, entpacken Sie es mit Hilfe des <tt>tar</tt> tools und führen Sie folgenden Befehl innerhlab des dists-$fink_version -Verzeichnisses aus:
  \"<code>./inject.pl</code>\" </p>");
it_end();
?>


<?
include "footer.inc";
?>
