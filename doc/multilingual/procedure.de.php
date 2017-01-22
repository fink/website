<?php
$title = "i18n - Aktualisierung";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/19 15:28:47';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="i18n Contents"><link rel="next" href="resources.php?phpLang=de" title="Zusätzliche Quellen"><link rel="prev" href="files.php?phpLang=de" title="Die Dokumentationsdateien">';


include_once "header.de.inc";
?>
<h1>i18n - 3. Dokumente aktualisieren</h1>
    
    
    
      <p>
      Die englische Dokumentation muss zuerst aktualisiert werden, weil sie
      die Basis ist. Die Aktualisierung kann von einem Mitglied des
      i18n-Teams (also englische Dokumentatoren) oder einem Mitglied des
      Core-Teams kommen.
      </p>
      <p>
      Damit alles glatt geht, sollte wie folgt vorgegangen werden:
      </p>
    
    <h2><a name="call-to-translate">3.1 Aufruf für Übersetzungen</a></h2>
      
      <p>
      Wird ein neues Dokument erstellt oder erfolgen Änderungen der
      englischen Dokumentation, sollte eine Nachricht in der Mailing-Liste
      fink-18n verfasst werden, die alle Übersetzer darüber informiert.
      Die Nachricht sollte folgendes enthalten:
      </p>
      <ul>
        <li>
        Eine Notiz in der Betreffzeile, dass dies eine Aufforderung zur
        Übersetzung ist, also "[translation]" oder
        "[translation-delayed]", wenn die englische Dokumentation
        verzögert online gestellt wird.
        </li>
        <li>
        Zusätzlich sollte der Dateiname der Basisdatei in der Nachricht
        enthalten sein.
        </li>
        <li>
        Ein komplettes diff sollte enthalten sein, also:
        <pre>diff -Nru3 -r<b>last_revision</b> r<b>head</b></pre>
        damit man die Änderungen in ihrem Kontext sehen kann.
        </li>
      </ul>
      <p>
      Notiz: Lädt man eine xml-Datei hoch wird automatisch eine Nachricht
      auf fink-commits erzeugt, die alle Kriterien erfüllt. Das
      einfachste ist deshalb, diese Nachricht mit einem angepassten Betreff
      weiter zu leiten. Sind allerdings viele Änderungen gemacht wurden,
      klappt das leider nicht.
      </p>
    
    <h2><a name="doc-updates">3.2 Neues Dokument</a></h2>
      
      <p>
      Die englische Version des Dokuments wird <a href="files.php?phpLang=de#committing">hoch geladen</a> und <a href="files.php?phpLang=de#website">aktiviert</a> und <a href="#new-translations">übersetzt</a> wie unten beschrieben.
      </p>
      <p>
      <b>Notiz</b>: Befindet sich das neue Dokument in einem neuen
      Ordner, sollten sie den neuen Ordner im Makefile hinzufügen, der im
      Ordner <code>xml</code> ist. Ansonsten wird die Erstellung
      der Dokumentaion nicht erfolgreich sein
      </p>
    
    <h2><a name="new-translation">3.3 Neue Übersetzungen</a></h2>
      
      <p>
      Der Team-Leiter einer Sprache (oder sonst jemand mit CVS-Zugang)
      <a href="files.php?phpLang=de#committing">lädt</a> jedes
      Dokument hoch und <a href="files.php?phpLang=de#website">aktiviert</a> es, sobald es fertig ist.
      </p>
      <p>
      Diese Klassifizierung umfasst:
      </p>
      <ul>
        <li>Das erste Mal, dass eine Übersetzung eines Dokuments verfasst wird.</li>
        <li>Teilweise Übersetzung eines existierenden Dokuments.</li>
        <li>Übersetzung eines neuen, englischen Dokuments</li>
      </ul>
    
    <h2><a name="prompt-update">3.4 Sofortige Aktualisierung der existierenden Dokumentation</a></h2>
      
      <p>
      Die englische Basisdokumentation wird <a href="files.php?phpLang=de#committing">hoch geladen</a> und sofort <a href="files.php?phpLang=de#website">aktiviert</a>. Wer die
      xml-Dateien geändert hat, sollte auch die HTML- und PHP-Dateien hoch
      laden und aktivieren. Die Übersetzungsteams aktualisieren dann ihre
      Versionen, <a href="files.php?phpLang=de#committing">laden</a><b> alle </b> Dateien (XML und
      PHP) hoch und <a href="files.php?phpLang=de#activate">aktivieren</a> dann die Änderungen.
     </p>
      <p>
      <b>Niemals</b> die erzeugten php-Dateien ändern; statt dessen
      immer die xml-Datei ändern.
      </p>
      <p>
      <b>Überprüfen</b>, dass die Zeile mit cvsid am Anfang der xml-Datei
      nicht aufgeteilt ist.
      </p>
      <p>
      <b>Notizen:</b>
      </p>
      <ol>
        <li>
        Änderungen in der Internationalisierung-Anleitung (diese Dokument)
        werden <b>immer</b> nach diesem Schema gemacht, weil sie alle
        Übersetzungsteams betreffen.
        </li>
        <li>
        Änderungen der statischen Dokumente (php-Dateien, die nicht aus
        xml-Dateien erzeugt werden) werden auch <b>immer</b> nach diesem
        Schema gemacht, weil es schwierig ist, sie mit einer <a href="#delayed-update">Verzögerung</a> zu aktivieren.
        </li>
      </ol>
    
    <h2><a name="delayed-update">3.5 Verzögerte Aktualisierung existierender Dokumente (nur für
      Dateien, die aus xml-Dateien erzeugt werden)</a></h2>
      
      <p>
      In diesem Fall wird die englische Version der xml-Datei <a href="files.php?phpLang=de#committing">hoch geladen</a>, aber
      <b>nicht</b> die php- und html-Dateien, d.h. Stopp nach Schritt 5
      unter Dynamisch in Kapitel <a href="files.php?phpLang=de#committing">2.9</a>. Alle Übersetzer erledigen ihre
      Arbeit und <a href="files.php?phpLang=de#committing">laden</a>
      innerhalb eines vereinbarten Zeitraums <b>nur</b> ihre xml-Datei hoch
      (d.h. genau wie für Englisch). Alle php- und html-Dateien
      werden erzeugt, hoch geladen und gleichzeitig von einer Person,
      sprich jemand aus dem i18n-Core-Team, zu einem vereinbarten Zeitpunkt
      <a href="files.php?phpLang=de#website">aktiviert</a>.
    </p>              
    
    <h2><a name="summary">3.6 Für Entwickler und Dokumentatoren für Englisch</a></h2>
      
      <p>
      Derzeit wird bei allen Dokumenten nach dem Schema <a href="#prompt-update">sofortige Aktualisierung</a> verfahren,
      außer es liegen wirklich gewichtige Gründe für eine Ausnahme vor.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="resources.php?phpLang=de">4. Zusätzliche Quellen</a></p>
<?php include_once "../../footer.inc"; ?>


