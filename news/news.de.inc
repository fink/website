<a name="2016-11-12%20fink-0.41.0%20ver%C3%B6ffentlicht"><span class="news-date">2016-11-12: </span><span class="news-headline">fink-0.41.0 veröffentlicht</span></a><?php gray_line(); ?>
  <p>Das Fink-Projekt veröffentlichte <code>fink-0.41.1</code>. Es hilft bei
  Anpassungen and die libXt Bibliothek aus XQuartz, indem die Quartz-Version aus
  <code>system-xfree86*</code> Paketen verwendet wird, und auch OS X 10.12.1
  unterstützt.
  </p>
 <a name="2016-09-20%20fink-0.41.0%20ver%C3%B6ffentlicht"><span class="news-date">2016-09-20: </span><span class="news-headline">fink-0.41.0 veröffentlicht</span></a><?php gray_line(); ?>
  <p>Das Fink-Projekt veröffentlichte <code>fink-0.41.0</code> für die
  Unterstützung von Sierra (10.12). Diese Ausgabe unterstützt offiziell
  10.9.0 - 10.12.0. Wie immer wurden mehrere Fehler behoben und Verbesserungen
  vorgenommen. Für die Aktualisierung von 10.9 oder 10.10 auf 10.12 wird
  folgende Befehls-Sequenz empfohlen:</p>
  <p>0) Beginn mit 10.9 oder 10.10.</p>
  <p>1) <code>fink cleanup --deb</code></p>
  <p>2) <code>fink selfupdate</code></p>
  <p>4) Aktualisierung auf 10.12</p>
  <p>5) <code>fink reinstall fink</code></p>
  <p>Sollten sie OS X vor Fink aktualisiert haben, schauen sie, ob sie
  <code>fink-0.41.0</code> für ihre frühere Distribution mit
  <code> sudo apt-get update ; sudo apt-get install fink </code> installieren
  und dann mit <code>fink reinstall fink</code> die Distribution wechseln können.
  </p>
  <p>Andernfalls können sie dieses
  <a href="http://bindist.finkmirrors.net/10.12/dists/stable/main/binary-darwin-x86_64/base/fink_0.41.0-111_darwin-x86_64.deb">
  .deb Archiv</a> herunter laden und aus dem Download-Ordner mit
  <code>sudo dpkg -i fink_0.41.1-111_darwin-x86_64.deb</code> installieren und
  dann die Distribution mit <code>fink reinstall fink</code> aktualisieren.
  </p>
 <a name="2016-08-13%20fink-0.39.5%20ver%C3%B6ffentlicht"><span class="news-date">2016-08-13: </span><span class="news-headline">fink-0.39.5 veröffentlicht</span></a><?php gray_line(); ?>
   <p>Das Fink-Projekt veröffentlichte <code>fink-0.39.5</code> für 10.9-10.11.
   Diese Ausgabe unterstützt offiziell 10.9.0 - 10.11.6. Wie immer wurden mehrere
   Fehler behoben und Verbesserungen vorgenommen. Darüber hinaus wird von
   <code>otool</code> auf <code>otool-classic</code> umgestellt, um mit Xcode 8
   kompatibel zu sein.</p>
 
