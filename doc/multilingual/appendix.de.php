<?php
$title = "i18n - Anhang";
$cvs_author = 'Author: KMS';
$cvs_date = 'Date: 2012/11/11 15:20:15';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="i18n Contents"><link rel="prev" href="resources.php?phpLang=de" title="Zusätzliche Quellen">';


include_once "header.de.inc";
?>
<h1>i18n - 5. Anhang</h1>
    
    
    <h2><a name="cvs-codes">5.1 CVS codes</a></h2>
      
      <p>
      Aktualisiert man sein cvs checkout, stehen manchmal Buchstaben vor
      den Dateinamen. Damit werden folgende Zustände der Datei angezeigt:
      </p>
      <ul>
        <li>
        <b>P:</b> Es gibt eine neue Version der Datei mittels eines Patch.
        </li>
        <li>
        <b>U:</b> Es gibt eine neue Version der Datei mittels Download.
        </li>
        <li>
        <b>M:</b> Die Version in ihrem lokalen repository wurde verändert.
        </li>
        <li>
        <b>C:</b> Ihre Version steht im Konflikt mit der im entfernten
        repository. Sie sollten den Konflikt durch Editieren und
        Zusammenführen der Änderungen auflösen.
        <p>
        Sie haben folgende Möglichkeiten
        </p>
        <pre>rm file; cvs update file</pre>
        <p>
        wobei <code>file</code> die Datei ist. Danach muss man die
        Änderungen noch einmal vornehmen, die man aus der Sicherung der
        Datei <code>.#file-version</code> übernehmen kann, wobei
        <code>version</code> die Revision ist, mit der man angefangen hat.
        </p>
        </li>
        <li>
        <b>?:</b> Die Datei is nicht im entfernten Repository und auch
        nicht als zu ignorieren vermerkt.
        </li>
        <li>
        <b>A:</b> Die Datei wurde hinzugefügt, aber noch nicht hoch geladen.
        </li>
        <li>
        <b>R:</b> Die Datei wurde entfernt, aber das Entfernen noch nicht
        hoch geladen.
        </li>
      </ul>
    
  
<?php include_once "../../footer.inc"; ?>


