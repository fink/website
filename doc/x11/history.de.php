<?php
$title = "Running X11 - Geschichte";
$cvs_author = 'Author: KMS';
$cvs_date = 'Date: 2013/01/03 18:17:34';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Running X11 Contents"><link rel="next" href="inst-xfree86.php?phpLang=de" title="X11 beziehen und installieren"><link rel="prev" href="intro.php?phpLang=de" title="Einführung">';


include_once "header.de.inc";
?>
<h1>Running X11 - 2. Geschichte</h1>
    
    
    
      <p>[Entschuldigen bitte den epischen Tonfall.]</p>
    
    <h2><a name="early">2.1 Die frühen Tage</a></h2>
      
      <p>
        Am Anfang war die Leere. Darwin war noch in seinen Kindertagen,
        Mac OS X noch sehr in Entwicklung und es gab keine Implementierung
        von X11.
      </p>
      <p>
        Dann trat John Carmack auf und portierte XFree86 auf Mac OS X
        Server, zu der Zeit das einzige Betriebsystem der Darwin-Familie.
        Später wurde der Port von Dave Zarzycki auf XFree86 4.0 und Darwin
        1.0 aktualisiert. Die Patches wurden in das CVS-Repository von
        Darwin übernommen und wo sie in eine Art Dornröschenschlaf
        fielen.
      </p>
    
    <h2><a name="xonx-forms">2.2 XonX Formulare</a></h2>
      
      <p>
        Eines schönen Tages kam ein Prinz namens Torrey T. Lyons, küsste
        die Darwin-Patches und erweckte sie so aus ihrem
        Dornröschenschlaf. Schließlich gab er ihnen im offiziellen
        XFree86 CVS-Repository eine neue Heimat. Das geschah zur Zeit von
        Mac OS X Public Beta und Darwin 1.2. XFree86 4.0.2 funktionierte
        einwandfrei auf Darwin, aber auf Mac OS X mussten sich die Nutzer aus
        Aqua ausloggen und es von der Konsole aus starten. Deshalb versammelte
        Torrey das <a href="http://mrcla.com/XonX/">XonX-Team</a> um
        sich und begann, XFree86 auf Mac OS X zu portieren.
      </p>
      <p>
        Zur selben Zeit begann Tenon, mit XFree86 4.0 als Ausgangsbasis
        ihre Xtools zu erstellen.
      </p>
    
    <h2><a name="root-or-not">2.3 To root or not to root</a></h2>
      
      <p>
        Bald gelang es dem XonX-Team, dass XFree86 im Vollbildmodus
        parallel zu Quartz läuft und veröffentlichten Testversionen für
        risikofreudige Nutzer. Die Testversionen wurde XFree86-Aqua
        genannt oder kurz XAqua. Mit Torrey in der Führung wurden
        Änderungen direkt in das CVS-Repository von XFree86 übernommen,
        was zur Version 4.1.0 führte.
      </p>
      <p>
        Am Anfang wurde die Schnittstelle zu Quartz mit einem kleinen
        Programm namens Xmaster.app realisiert. Es war zunächst in Carbon
        geschrieben, später dann in Cocoa. Dieser Code wurde dann in den
        tatsächlichen X-Server integriert und XDarin.app war geboren. Ab
        diesem Zeitpunkt wurden auch "shared" Bilbiotheken unterstützt und
        Tenon konnte überzeugt werden, die gleichen Patches statt eigener
        zu verwenden, um binäre Kompatibilität zu erreichen. Sogar im
        Hinblick auf einen "rootless" Modus wurden unter Verwendung der
        Carbon API große Fortschritte erreicht, aber war es zu spät für
        XFree86 4.1.0. Aber der "rootless" Patch war da und kursierte im
        Internet. Als XFree86 4.1.0 heraus kam und nur den Vollbild Modus
        hatte, wurde die Arbeit am "rootless" Modus fortgesetzt, aber jetzt
        unter Verwendung der Cocoa API. Ein experimenteller "rootless"
        Modus fand so seinen Weg in das CVS-Repository von XFree86.
      </p>
      <p>
        Inzwischen wurden von Apple Mac OS X 10.0 und Darwin 1.3
        veröffentlicht. Einige Wochen später folgte Tenon mit Xtools
        1.0.
      </p>
      <p>
        Die Entwicklung schritt fort und der "rootless" Modus wurde in
        XFree86 integriert, so dass bei der Veröffentlichung von XFree86
        4.2.0 im Januar 2002, die Darwin/Mac OS X Version vollständig in
        die offizielle Distribution von XFree86 integriert war.
      </p>
    
    <h2><a name="apple-x11-distros">2.4 Apples X11-Distributionen</a></h2>
      
      <p>
        Am 7. Januar 2003 gab Apple eine Beta-Version ihrer eigenen
        X11-Implementation für OS 10.2 heraus. Sie basierte auf
        XFree86-4.2 und hatte Quartz-Rendering und beschleunigtes OpenGL.
        Am 10. Februar 2003 wurde eine neue Version mit zusätzlichen
        Features und Bugfixes heraus gegeben. Die dritte Version, also
        Beta 3, folgte am 17. März 2003 mit weiteren Features und
        Bugfixes.
      </p>
      <p>
        Am 24. Oktober 2003 gab Apple Panther (Mac OS X 10.3) heraus, das
        als erste Version Apples eigene X11-Distribution enthielt, die auf
        XFree86-4.3 basierte.
      </p>
      <p>
        Am 29. April 2005 gab Apple Tiger (Mac OS X 10.4) heraus, das eine
        X11-Distribution enthielt, die auf XFree86-4.4 basierte.
      </p>
      <p>
        Am 26. Oktober 2007 gab Apple Leopard (Mac OS X 10.5) heraus, das
        eine X11-Distribution enthielt, die auf X.org-7.2 basierte.
      </p>
      <p>
        Am 28. August 2009 gab Apple Snow Leopard (Mac OS X 10.6) heraus,
        das eine X11-Distribution enthielt, die auf X.org-7.2 basierte.
      </p>
      <p>
        Am 20. Juli 2011 gab Apple Lion (Mac OS X 10.7) heraus, das eine
        X11-Distribution enthielt, die auf XQuartz-2.6.4 basierte.
      </p>
      <p>
        Am 25. Juli 2012 gab Apple Mountain Lion (Mac OS X 10.8) heraus.
        Für diese Version ist XQuartz-2.7.2 oder später die richtige
        X11-Distribution.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="inst-xfree86.php?phpLang=de">3. X11 beziehen und installieren</a></p>
<?php include_once "../../footer.inc"; ?>


