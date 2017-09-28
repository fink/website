<a name="2017-09-28%20Fink%20for%20High%20Sierra%20(10.13)"><span class="news-date">2017-09-28: </span><span class="news-headline">Fink for High Sierra (10.13)</span></a><?php gray_line(); ?>
  <p>Because of a recent Sourceforge outage, we haven't been able to do a proper <code>fink</code> 
  release that supports High Sierra.  However, since the <code>fink</code> source on 
  Github isn't affected by this, it is possible to get a pre-release version out of our
  <code>git</code> repository and install that.</p>
  <p>The following sequence of steps should allow you to update your Fink installation
  on 10.9 (Mavericks) or later for High Sierra.  10.8 (Mountain Lion) or earlier 
  have no supported upgrade path.</p>
  <p>0) Don't update your OS yet!</p>
  <p>1) Download a copy of the 
  <a href="https://github.com/fink/fink/archive/master.zip">repository archive</a> and
  uncompress it if your browser doesn't do that automatically.</p>
  <p>2) Open a Terminal window and change to the resulting <code>fink-master</code> directory
  e.g. <code>cd ~/Downloads/fink-master</code> .</p>
  <p>3) Run the command <code>sudo ./inject.pl</code> to update <code>fink</code>.</p>
  <p>4) Update your OS to High Sierra.</p>
  <p>5) Open a Terminal window and run <code>fink reinstall fink</code> to reset your distribution.</p>
  <p></p>
  <p>For new installs on High Sierra:</p>
  <p>1) Install the Xcode 9 command-line tools by running <code>sudo xcode-select --install</code> 
  in a Terminal window.</p>
  <p>2) Install the latest JDK from Oracle, e.g. by running <code>javac</code> in a Terminal 
  window.</p>
  <p>3) Follow steps 1-2) from the upgrade instructions above.</p>
  <p>4) Run <code>sudo ./bootstrap</code></p>
  <p>5) The default bootstrap operation will error out at the end for the time being, until 
  an official High Sierra binary distribution has been uploaded.  Go ahead and run <code>
  /sw/bin/pathsetup.sh</code> as usual, however.</p>
 <a name="2016-11-12%20fink-0.41.1%20ver%C3%B6ffentlicht"><span class="news-date">2016-11-12: </span><span class="news-headline">fink-0.41.1 veröffentlicht</span></a><?php gray_line(); ?>
   <p>Das Fink-Projekt veröffentlichte <code>fink-0.41.1</code>. Es unterstützt
     OS X 10.12.1 und hilft bei Anpassungen der libXt-Bibliothek aus XQuartz,
     indem die Quartz-Version aus <code>system-xfree86*</code> Paketen verwendet
     wird.
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
 
