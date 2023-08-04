<?php
$title = "Running X11 - Anderes";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Running X11 Contents"><link rel="next" href="trouble.php?phpLang=de" title="Probleme mit XFree86 beheben"><link rel="prev" href="run-xfree86.php?phpLang=de" title="X11 starten">';


include_once "header.de.inc";
?>
<h1>Running X11 - 5. Andere Möglichkeiten mit X11 </h1>
    
    
    <h2><a name="vnc">5.1 VNC</a></h2>
      
      <p>
        VNC ist eine netzwerktransparentes System für grafische
        Darstellungen mit Ähnlichkeiten zu X11. Allerdings arbeitet es
        auf einem niedrigeren Ebene, was die Implementierung vereinfacht.
        Mit dem Xvnc-Server und einem Mac OS X Display-Klienten kann man
        X11-Programme mit Mac OS X ausführen. Fink hat ein X11-basiertes
        Paket für einige Platformen. Lesen sie die Einträge auf
        folgender <a href="http://pdb.finkproject.org/pdb/browse.php?summary=vnc">Seite</a>
        durch.
      </p>
      <p></p>
    
    <h2><a name="weirdx">5.2 WeirdX</a></h2>
      
      <p>
        <a href="http://www.jcraft.com/weirdx/">WeirdX</a> ist ein in
        Java geschriebener X11-Server. Es unterstützt auch den "rootless"
        Modus. Quellcode und eine java jar-Datei gibt es auf der Webseite.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="trouble.php?phpLang=de">6. Probleme mit XFree86 beheben</a></p>
<?php include_once "../../footer.inc"; ?>


