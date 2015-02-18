<?php
$title = "Benutzerhandbuch - Aktualisieren";
$cvs_author = 'Author: kms';
$cvs_date = 'Date: 2014/10/20 11:41:47';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="next" href="conf.php?phpLang=de" title="Die Fink-Konfigurationsdatei"><link rel="prev" href="packages.php?phpLang=de" title="Pakete Installieren">';


include_once "header.de.inc";
?>
<h1>Benutzerhandbuch - 4. Fink Aktualisieren</h1>
    
    
    
      <p>
      Dieses Kapitel beschreibt, wie Sie vorgehen sollten, um Ihre Fink-Installation auf dem neuesten Stand zu halten.</p>
    
    <h2><a name="bin">4.1 Aktualisieren von Binary-Paketen</a></h2>
      
      <p>Wenn Sie ausschließlich die Binary-Distribution nutzen, gibt es keine separate Vorgehensweise für die Aktualisierung. Fragen Sie einfach über Ihr Lieblingswerkzeug die aktuellste Paketauflistung vom Server ab, und lassen Sie es alle Pakete aktualisieren.
</p>
      <p>
Bei dselect reicht es aus, "[U]pdate" und danach "[I]nstall" zu drücken. Natürlich können Sie dazwischen "[S]elect" ausführen, um die Paketauswahl, die Sie getroffen haben, zu überprüfen und über neue Pakete zu erfahren.
</p>
      <p>
Bei apt führen Sie <code>apt-get update</code> aus, um die aktuelle Auflistung aller Pakete zu bekommen, und dann <code>apt-get upgrade</code>, um dann die tatsächlichen Pakete zu aktualisieren, für die neue Versionen verfügbar sind.
</p>
      <p>
Im Fink Commander wählen Sie im Menü Binär Update descriptions, um die Auflistung der Pakete zu aktualisieren, und dann Dist-Upgrade packages auch im Binär-Menü, um die tatsächlichen Pakete mit neuen Versionen zu aktualisieren.
</p>
      <p>
Für mehr Informationen, speziell über das Aktualisieren unter Fink Versionen älter als 0.3.0, schauen Sie sich die <a href="/download/upgrade.php">Upgrade Matrix</a> an.
</p>
    
    <h2><a name="src">4.2 Aktualisieren der Source-Distribution</a></h2>
      
      <p>
Aktualisieren ist ein wenig komplizierter, wenn Sie die Source-Distribution verwenden. Die Verfahrensweise besteht aus zwei Schritten. Im ersten Schritt, laden Sie die aktuellsten Paketbeschreibungen auf Ihren Computer. Im zweiten Schritt werden diese Paketbeschreibungen genutzt, um neue Pakete zu kompilieren; der eigentliche Quellcode wird dann bei Bedarf heruntergeladen.
</p>
      <p>
Falls Sie Fink 0.2.5 oder neuer haben, kann der erste Schritt mit dem Ausführen von <code>fink selfupdate</code> vollbracht werden. Dieser Befehl wird die Fink-Webseite überprüfen, ob ein neues Punkt-Release verfügbar ist, und gegebenenfalls die Paketbeschreibungen herunterladen. In kürzlichen Versionen des Befehls <code>fink</code> haben Sie die Möglichkeit die Paketbeschreibungen direkt via CVS oder rsync herunterzuladen. CVS ist ein versionsgesteuertes Behältnis, wo die Paketbeschreibungen gespeichert und verwaltet werden. Der Einsatz von CVS hat den Vorteil, dass es kontinuierlich aktualisiert wird, aber der Nachteil ist, dass es nur einen einzigen CVS-Server für Fink gibt, so kann es sein, dass dieser manchmal nicht erreichbar ist, wenn es viel Traffic gibt. Deshalb empfehlen wir, dass die Benutzer im allgemeinen rsync nutzen. Für rsync gibt es zahlreiche Spiegelserver, und der einzige Nachteil ist, dass die Paketbeschreibungen mit einer Verzögerung von etwa einer Stunde auf die rsync-Server gespiegelt werden, nachdem sie zum CVS hinzugefügt worden.
</p>
      <p>(Falls Sie Probleme haben, die Source-Installation zu aktualisieren, werfen Sie einen Blick in <a href="/download/fix-upgrade.php">diese speziellen Anweisungen</a>.)</p>
      <p>
Wenn Sie eine Fink-Installation älter als Version 0.2.5 haben, müssen Sie die Paketbeschreibungen per Hand herunterladen. Besuchen Sie den <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">Download-Bereich</a> und suchen Sie die aktuellste Version der packages-0.x.x.tar.gz im Modul "distribution". Laden Sie es herunter, und installieren Sie es wie folgt:
</p>
      <pre>tar -xzf packages-0.x.x.tar.gz
cd packages-0.x.x
./inject.pl</pre>
      <p>
Sobald Sie Ihre Paketbeschreibungen aktualisiert haben (egal auf welcher Weise),  sollten Sie alle Pakete mit einem Mal mit dem Befehl <code>fink update-all</code> aktualisieren.
</p>
      <p>
Um die Source-Distribution mit dem Fink Commander zu aktualisieren, wählen Sie Source-&gt;Selfupdate, um die neuen Dateien mit den Paketinformationen herunterzuladen, und dann Source-&gt;Update-all, um die veralteten Pakete zu aktualisieren.</p>
    
    <h2><a name="mix">4.3 Aktualisieren einer gemischten Distribution (Binary und Source)</a></h2>
      
      <p>
Wenn Sie einige Pakete als vorkompilierte Binärdateien herunterladen und andere von Quellcode kompilieren, werden Sie beide oben erklärten Vorgehensweisen befolgen müssen, um Ihre Fink-Installation zu aktualisieren.  Das heißt, Sie verwenden erst <code>dselect</code> oder <code>apt-get</code>, um die aktuellsten Versionen der Pakete zu bekommen, die als Binärdateien verfügbar sind, und dann <code>fink selfupdate</code> und <code>fink update-all</code>, um die aktuellen Beschreibungen für die übrigen Pakete herunterzuladen. Wenn Sie den Fink Commander verwenden, folgen Sie den Erklärungen zur <a href="#bin">Binary-</a>- und dann zur <a href="#src">Source</a>-Distribution.
 </p>
<p>
Ab der Version 0.23.0 von Fink werden mit der Option UseBinaryDist sowohl die binäre als auch die Quell-Distribution aktualisiert, wenn man <code>fink selfupdate</code> aufruft. Die Option UseBinaryDist kann man mittels der <a href="usage.php?phpLang=de#options">Option --use-binary-dist (oder -b)</a> setzen oder in der <a href="conf.php?phpLang=de">Konfigurationsdatei von Fink</a>. Der zusätzliche Aufruf von <code>apt-get</code> ist nicht mehr nötig.
</p>
<p>
Benutzen sie Fink Commander, dann wählen sie für die Aktualisierung der Paketlisten den Menüpunkt Binary-&gt;Update descriptions aus und dann für die Aktualisierung der Pakete Binary-&gt;Dist-Upgrade packages. Danach lädt man die neuen Paketbeschreibungen mit Source-&gt;Selfupdate herunter und aktualisiert mit Source-&gt;Update-all (Details dazu stehen in den Abschnitten weiter oben).
</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="conf.php?phpLang=de">5. Die Fink-Konfigurationsdatei</a></p>
<?php include_once "../../footer.inc"; ?>


