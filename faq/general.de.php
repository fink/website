<?php
$title = "F.A.Q. - Allgemeines";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2015/06/06 19:19:29';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="relations.php?phpLang=de" title="Verbindungen zu anderen Projekten"><link rel="prev" href="index.php?phpLang=de" title="F.A.Q. Contents">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 1. Allgemeine Fragen</h1>
    
    
    <a name="what">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.1: Was ist Fink?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fink will mehr Unix-Programme auf Mac OS X zur Verfügung stellen.
          Daraus ergeben sich zwei Ziele:</p><p>Das erste Ziel ist Programme nach Mac OS X zu portieren. Das bedeutet,
          dass wir Open-Source Unix-Programme hernehmen und alles korrigieren,
          damit sie auf Mac OS X übersetzt werden kann und lauft. Das ist bei
          manchen Paketen ganz leicht, bei anderen aber sehr schwierig oder gar
          unmöglich. Wo immer möglich, versucht Fink dies durch Hilfsmittel und
          Dokumentation zu erleichtern.</p><p>Das zweite Ziel ist, die Ergebnisse für normale Nutzer zur Verfügung
          stellen. Dazu wird eine sogenannte Distribution mit
          Paket-Management-Tools erzeugt, die von Linux nach Mac OS X portiert
          wurden, insbesondere <code>dpkg</code> und <code>apt-get</code>, die
          von und für das Projekt
          <a href="http://www.debian.org/">Debian GNU/Linux</a>
          geschrieben wurden. Die binäre Distribution benutzt das
          <code>.deb</code> Paketformat. Für die Erstellung der Pakete aus den
          Quellen verwenden wir unser eigene Tool, <code>fink</code>, das die
          <code>.deb</code> Paketdateien erzeugt.</p></div>
    </a>
    <a name="naming">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.2: Welche Bedeutung hat der Name Fink?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Keine. Es ist nicht einmal ein Akronym.</p><p>Wie sie wissen, ist ein Fink ein Vogel. Ausgehend vom Namen des
          Betriebssystem, Darwin, dachten die Gründer von Fink an Charles
          Darwin, die Galapagos-Inseln, Evolution, die Darwin-Finken und ihre
          Schnäbel im Schulbuch. Das ist alles.</p></div>
    </a>
    <a name="bsd-ports">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.3: Wie unterscheidet sich Fink vom BSD-Port-Mechanismus, einschließlich
          OpenPackages und GNU-Darwin?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die wichtigsten Vorteil:</p><ul>
          <li>
            <p>Fink ist in Perl geschrieben und nicht mit make/shell. Es
              verlässt sich folglich nicht auf Besonderheiten in BSD make und
              braucht keine Kennzeichen für Pakete, die GNU make benötigen.</p>
          </li>
          <li>
            <p>dpkg ist ein mächtiges Hilfsmittel für die Verwaltung binärer
              Pakete - einfache Updates, separate Behandlung von
              Konfigurationsdateien, virtuelle Pakete und weitere anspruchsvolle
              Abhängigkeiten.</p>
          </li>
          <li>
            <p>Fink installiert nichts in /usr/local außer es wird explizit
              verlangt. Es kommt ohne Tricksereien mit /usr/bin/make oder
              anderen Systemtools aus. Dadurch ist Fink sicherer zu benutzen und
              verringert Konflikte mit Mac OS X und Dritt-Software auf ein
              Minimum.</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.4: Warum installiert Fink nichts in /usr/local?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Es gibt mehrere Gründe, aber das gemeinsame für alle ist, dass sonst
          mehr oder weniger schlimme Abstürze passieren.</p><p>1. Grund: Dritt-Software. In /usr/local wird üblicherweise Software
          installiert, die nicht zum Ursprungs-System gehört. Deshalb sieht es
          zunächst wie ein guter Platz aus, aber Software von anderen wird
          ebenfalls dort installiert, dabei wird meistens einfach überschrieben,
          wenn etwas schon vorhanden ist, auch von dpkg. Man könnte natürlich
          auch irgendwo anders installieren, aber meistens wird dies bei der
          Installation nicht abgefragt.</p><p>2. Grund: /usr/local/bin ist Teil des Standard-PATH. Der Vorteil ist,
          dass alles von einer Shell gefunden wird. Es wird aber aufwändig, wenn
          man etwas ausschalten möchte und kann sich im Extremfall über
          Shell-Skripte sogar im System auswirken.</p><p>3. Grund: Die Compiler-Tools suchen standardmäßig in /usr/local. Der
          Compiler sucht in /usr/local/include nach Header-Dateien und der
          Linker in /usr/local/lib nach Bibliotheken. Das hört sich zunächst als
          sehr praktisch an, aber ausschalten ist sehr schwierig. Man kann den
          Compiler sehr leicht durcheinander bringen, indem man eine Datei mit
          Müll und dem Namen <code>stdio.h</code> in /usr/local/include
          ablegt.</p><p>Sie wurden gewarnt! Es ist möglich, dass Fink in /usr/local
          installiert. Das Installations-Skript wird sie ausdrücklich warnen,
          aber fortfahren, nachdem sie bestätigt haben, dass es auf ihr eigenes
          Risiko weiter machen soll.</p></div>
    </a>
    <a name="why-sw">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.5: Wieso /sw?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die Wahl war ziemlich willkürlich, aber es sieht danach aus, dass es
          in absehbarer Zukunft für updates so bleiben kann und vor Konflikten
          mit anderer Software sicher ist.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="relations.php?phpLang=de">2. Verbindungen zu anderen Projekten</a></p>
<?php include_once "../footer.inc"; ?>


