<?php
$title = "Running X11 - X11 installieren";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/23 16:32:58';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Running X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=de" title="X11 starten"><link rel="prev" href="history.php?phpLang=de" title="Geschichte">';


include_once "header.de.inc";
?>
<h1>Running X11 - 3. X11 beziehen und installieren</h1>
    
    
    <h2><a name="apple-binary">3.1 Apples Distributionen</a></h2>
      
      <p>
        Alle Version von OS X, die derzeit von Fink unterstützt werden,
        benutzen eine X11-Distribution von Apple. Die unterstützten
        Konfigurationen sind: </p>
      <ul>
        <li>
          <p>
            <b>10.5:</b> Fink unterstützt das eingebaute X11 und
            XQuartz-2.6.3 oder früher.
          </p>
          <p>
            <b>Beachte:</b> Apples X11 auf 10.6 hat Bibliotheken mit
            älteren Versionen als bei XQuartz-2.4. Eine Installation von
            XQuartz macht deshalb eine Aktualisierung von 10.5 auf 10.6
            kompliziert.
          </p>
        </li>
        <li>
          <p>
            <b>10.6:</b> Fink unterstützt nur das eingebaute X11. Man
            muss davon ausgehen, dass die Fink-Pakete nur mit dem
            eingebauten X11 erstellt werden können. Deshalb muss man bei
            der Installation von XQuartz dafür sorgen, dass das eingebaute
            X11 installiert bleibt.
          </p>
        </li>
        <li>
          <p>
            <b>10.7:</b> Fink unterstützt nur das eingebaute X11. Man
            muss davon ausgehen, dass die Fink-Pakete nur mit dem
            eingebauten X11 erstellt werden können. Deshalb muss man bei
            der Installation von XQuartz dafür sorgen, dass das eingebaute
            X11 installiert bleibt.
          </p>
        </li>
        <li>
          <p>
            <b>10.8:</b> Fink unterstützt nur XQuartz-2.7.2 und neuer.
          </p>
        </li>
      </ul>
      <p>
        Will man Pakete mit dem eingebauten X11 auf 10.5-10.7 und Xcode
        &lt;= 4.2.1 erstellen, muss man sicher stellen, dass auch das X11
        SDK installiert ist (auch wenn das normalerweise der Fall ist.).
        XQuartz-Nutzer auf 10.5 sollten es aber <b>auf keinen Fall</b>
        installieren, weil XQuartz bereits alles enthält. Auf 10.7
        enthalten die Command Line Tools für Xcode &gt;= 4.3 das X11 SDK.
        Auf 10.8 muss man nur XQuartz installieren.
      </p>
      <p>
        Alle X11 Pakete bieten Vollbild- und "rootless" Modus und
        unterstützen OpenGL.
      </p>
      <p>
        Weitere Informationen zur Benutzung von Apples X11 stehen in diesem
        <a href="http://developer.apple.com/darwin/runningx11.html">Artikel</a>
        der Apple Developer Connection.
      </p>
    
    <h2><a name="fink">3.2 Benutzung von X11 unter Fink</a></h2>
      
      <p>
        Fink verfolgt the Status von X11 über einige virtuelle Pakete.
        Die wichtigsten sind:
      </p>
      <ul>
        <li><code>system-xfree86-shlibs</code>, "shared" Bibliotheken</li>
        <li><code>system-xfree86</code>, ausführbare Programme</li>
        <li><code>x11-shlibs</code>, ebenfalls "shared" Bibliotheken</li>
        <li><code>x11</code>, ebenfalls ausführbare Programme</li>
        <li><code>system-xfree86-dev</code>, Header-Dateien</li>
        <li><code>x11-dev</code>, ebenfalls Header-Dateien</li>
      </ul>
      <p>
        Notiz: Die Existenz separater
        <code>system-xfree86*</code>- und <code>x11*</code>-Familien ist
        ein Erbe aus Zeiten vor 10.5, als Fink noch seine eigenen
        X11-Pakete enthielt, die ebenfalls die <code>x11</code>-Familie zur
        Verfügung stellten. </p>
      <p>
        Fehlt eines dieser Pakete, dann fehlen Dateien aus der X11
        Installation, die sie (nach-)installieren müssen. Fehlen zum
        Beispiel <code>x11-dev</code> oder <code>system-xfree86-dev</code>,
        wurde meistens vergessen, das X11 SDK zu installieren.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=de">4. X11 starten</a></p>
<?php include_once "../../footer.inc"; ?>


