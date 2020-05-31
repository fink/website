<?php
$title = "F.A.Q. - Verbindungen";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="mirrors.php?phpLang=de" title="Fink-Spiegelserver"><link rel="prev" href="general.php?phpLang=de" title="Allgemeine Fragen">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 2. Verbindungen zu anderen Projekten</h1>
    
    
    <a name="upstream">
      <div class="question"><p><b><?php echo FINK_Q ; ?>2.1: Geben sie ihre Verbesserungen an die originalen Autoren weiter?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wir versuchen es. Manchmal ist es einfach und alle sind froh, wenn
          die nächste Version des Pakets veröffentlicht wird. Leider ist es aber
          nicht immer so einfach. Die üblichen Probleme:</p><ul>
          <li>Der Autor des Fink-Pakets ist sehr beschäftigt und hat keine Zeit
            die Verbesserungen und die Erklärungen dazu an die Original-Autoren
            zu schicken.</li>
          <li>Die Original-Autoren lehnen die Verbesserungen ab. Dafür gibt es
            jede Menge gute Gründe. Die meisten Original-Autoren wollen sauberen
            Code, saubere Tests der Konfiguration und Kompatibilität mit anderen
            Platformen.</li>
          <li>Die Original-Autoren akzeptieren die Verbesserungen, aber es
            dauert Wochen oder Monate, bis sie einen neue Version ihrer Software
            veröffentlichen.</li>
          <li>Die Software wurde von den Original-Autoren aufgegeben und es wird
            keine neue Version mehr davon geben, in die die Verbesserungen
            eingepflegt werden könnten.</li>
        </ul></div>
    </a>
    <a name="debian">
      <div class="question"><p><b><?php echo FINK_Q ; ?>2.2: Wie ist ihr Verhältnis zum Projekt Debian? Portieren sie Debian Linux
          nach Mac OS X?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Es gibt keine formelle Beziehung zwischen Fink und
          <a href="http://www.debian.org">Debian</a>.
          Fink ist <b>kein</b> Port der Debian-GNU/Linux-Distribution. Wir
          haben die Debian-Tools für die Paketverwaltung (dpkg, dselect und
          apt-get) portiert und benutzen diese Tools und das binäre .deb
          Paket-Format. Die eigentlichen Pakete sind für Mac OS X / Darwin
          maßgeschneidert und nutzt nicht das Quell-Paket-Format von Debian.</p></div>
    </a>
    <a name="apple">
      <div class="question"><p><b><?php echo FINK_Q ; ?>2.3: Wie ist ihr Verhältnis zu Apple?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
          <a href="http://www.apple.com/">Apple</a> kennt Fink und gab Fink
          als Teil seiner Open-Source-Anstrengungen einiges an Unterstützung.
          Im Sommer und Herbst 2001 erhielten wir eine Vorversion des neuen
          Mac OS X, damit die Anpassungen der Fink-Pakete zum
          Veröffentlichungstermin abgeschlossen sein können. Zitat:
          <b>"Hopefully it underscores the commitment that many suspect we're
          not willing to provide. We'll get better at the open source game over
          time."</b> Herzlichen Dank an Apple!</p></div>
    </a>
    <a name="darwinports">
      <div class="question"><p><b><?php echo FINK_Q ; ?>2.4: Wie ist ihr Verhältnis zu Darwinports?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Darwinports und Fink sind sich ergänzende Projekte und mehrere Leute
          unterstützen Projekte in Fink und DarwinPorts. Benjamin Reed ist zum
          Beispiel Autor der KDE-Pakete bei beiden. Darwinports und Fink
          profitieren wechselseitig von ihren Patches und es gibt Anstrengungen
          zu einer neuen Engine für Abhängigkeiten.</p><p>DarwinPorts beginnt von Grund auf neu mit einem anderen Ansatz für
          das System für die Erstellung der Pakete. Weitere Details dazu auf der
          Webseite
          <a href="http://darwinports.opendarwin.org/">the DarwinPorts homepage</a>
          .</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="mirrors.php?phpLang=de">3. Fink-Spiegelserver</a></p>
<?php include_once "../footer.inc"; ?>


