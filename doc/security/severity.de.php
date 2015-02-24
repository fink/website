<?php
$title = "Sicherheitspolitik - Antworten";
$cvs_author = 'Author: Nachteule';
$cvs_date = 'Date: 2009/03/31 01:41:35';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Sicherheitspolitik Contents"><link rel="next" href="sources.php?phpLang=de" title="Quellen für Sicherheitslücken"><link rel="prev" href="respo.php?phpLang=de" title="Verantwortung">';


include_once "header.de.inc";
?>
<h1>Sicherheitspolitik - 2. Antwortzeiten und sofortige Aktionen</h1>
    
    
    
      <p>Antwortzeiten und Aktionen hängen in großem Maße von der
        Schwere der Sicherheitslücke ab, das die Software in einem
        Fink-Paket verursacht. Das <b>Fink Core Team</b> wird sofort
        aktiv werden, wenn es zum Schluss kommt, dass die Gemeinschaft der
        Fink-Nutzer geschützt werden muss.</p>
    
    <h2><a name="resptimes">2.1 Antwortzeiten</a></h2>
      
      <p>Für jedes Paket sollte versucht werden, die folgenden
        Antwortzeiten einzuhalten. Bei entsprechenden Sicherheitslücken
        behält sich das <b>Fink Core Team</b> das Recht vor, sofort
        aktiv zu werden. In solchen Fällen wird dann ein Mitglied des
        Core Teams den Paket-Betreuer informieren. Beachten sie aber
        bitte, dass Fink ein Projekt ist, das von Freiwilligen getragen
        wird und deshalb letztlich keine Garantien gegeben werden
        können.</p>
      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Sicherheitslücken</th><th align="left">Antwortzeit</th></tr><tr valign="top"><td>remote Root-Exploit</td><td>
            <p>minimal: <b>sofort</b>; maximal: <b>12</b> Stunden.</p>
          </td></tr><tr valign="top"><td>lokaler Root-Exploit</td><td>
            <p>minimal: <b>12</b> Stunden; maximal: <b>36</b> Stunden.</p>
          </td></tr><tr valign="top"><td>remote DOS</td><td>
            <p>minimal: <b>6</b> Stunden; maximal: <b>12</b> Stunden.</p>
          </td></tr><tr valign="top"><td>lokaler DOS</td><td>
            <p>minimal: <b>24</b> Stunden; maximal: <b>72</b> Stunden.</p>
          </td></tr><tr valign="top"><td>remote Datenverlust</td><td>
            <p>minimal: <b>12</b> Stunden; maximal: <b>24</b> Stunden.</p>
          </td></tr><tr valign="top"><td>lokaler Datenverlust</td><td>
            <p>minimal: <b>24</b> Stunden; maximal: <b>72</b> Stunden.</p>
          </td></tr></table>
    
    <h2><a name="forced">2.2 Erzwungene Aktualisierungen</a></h2>
      
      <p>Ein Mitglied des <b>Fink Core Team</b> kann entscheiden, dass
        ein Paket aktualisiert werden muss, ohne dass eine Reaktion des
        Paket-Betreuers abgewartet wird. Dies wird erzwungenge
        Aktualisierung genannt. Wird die maximale Antwortzeit
        für eine bestimmte Sicherheitslücke in einem Fink-Paket
        überschritten, führt dies ebenfalls zu einer erzwungengen
        Aktualisierung.</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="sources.php?phpLang=de">3. Quellen für Sicherheitslücken</a></p>
<?php include_once "../../footer.inc"; ?>


