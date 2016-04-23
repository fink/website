<?php
$title = "Sicherheitspolitik - Aktualisierungen";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/24 00:08:32';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Sicherheitspolitik Contents"><link rel="next" href="notification.php?phpLang=de" title="Benachrichtigungen verschicken"><link rel="prev" href="sources.php?phpLang=de" title="Quellen für Sicherheitslücken">';


include_once "header.de.inc";
?>
<h1>Sicherheitspolitik - 4. Sicherheitsaktualisierungen</h1>
    
    
    <h2><a name="procedure">4.1 Sicherheitsrelevante Aktualisierungen durchführen</a></h2>
      
      <p>Sicherheitsrelevante Aktualisierungen sollen nur angewandt werden,
        wenn sie vom ursprünglichen Autor, der die Software erstellt hat,
        bestätigt werden. Vor einer Aktualisierung <b>müssen</b>
        folgende Bedingungen erfüllt sein:</p>
      <ul>
        <li>Der ursprüngliche Autor der Software kontaktierte den
          Paket-Betreuer oder das <b>Fink Core Team</b> direkt und teilt
          einen Patch oder anderen Workaround für die Sicherheitslücke
          mit.</li>
        <li>Eine der obigen Quellen hat ein Sicherheits-Bulletin mit
          aktualisierten Quellen für die Software eines Fink-Pakets heraus
          gegeben.</li>
        <li>Ein Patch wurde von einer der folgenden Quellen heraus gegeben:
          BUGTRAQ, FULLDISC, SF-INCIDENTS, VULN-DEV.</li>
        <li>Ein offizielles Sicherheits-Bulletin wurde veröffentlicht und
          erhielt CVE Candidate status, das die CVE Sicherheitslücke
          beschreibt und einen Workaround, Patch oder Link zu
          aktualisierten Quellen enthält.</li>
        <li>Der Paket-Betreuer oder das <b>Fink Core Team</b> wurde im
          voraus benachrichtigt und erhielt direkt einen Patch oder
          Workaround für die Sicherheitslücke mit der Bitte, aktiv zu
          werden.</li>
      </ul>
    
    <h2><a name="moving">4.2 Verschieben von unstable nach stable</a></h2>
      
      <p>Sicherheitsrelevante Aktualisierungen für ein bestimmtes Paket
        werden zuerst im unstable Baum durchgeführt. Nach einer Wartezeit
        von weniger als <b>12</b> Stunden werden die .info und .patch
        Dateien des Pakets auch in den stable Baum kopiert. Die Wartezeit
        soll für eine Überprüfung genutzt werden, ob das aktualisierte
        Paket funktioniert und die Sicherheitsaktualisierung keine neuen
        Probleme mit sich bringt.</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="notification.php?phpLang=de">5. Benachrichtigungen verschicken</a></p>
<?php include_once "../../footer.inc"; ?>


