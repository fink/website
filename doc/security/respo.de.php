<?php
$title = "Sicherheitspolitik - Verantwortung";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/24 00:08:32';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Sicherheitspolitik Contents"><link rel="next" href="severity.php?phpLang=de" title="Antwortzeiten und sofortige Aktionen"><link rel="prev" href="index.php?phpLang=de" title="Sicherheitspolitik Contents">';


include_once "header.de.inc";
?>
<h1>Sicherheitspolitik - 1. Verantwortung</h1>
    
    
    <h2><a name="who">1.1 Wer ist verantwortlich?</a></h2>
      
      <p>Jedes Fink-Paket hat einen Betreuer. Man findet ihn, indem man
        das Kommando <code>fink info packagename</code> eingibt. Man erhält
        eine Liste, die in etwa so aussieht: Maintainer: Fink Core Group
        &lt;fink-core@lists.sourceforge.net&gt;. Dieser Betreuer hat
        die volle Verantwortung für seine Pakete.</p>
    
    <h2><a name="contact">1.2 Wen soll ich kontaktieren?</a></h2>
      
      <p>Treten bei der Software eines Fink-Pakets Sicherheitslücken
        auf, sollten sie den Paket-Betreuer und das <b>Fink Core Team</b>
        informieren. Die Email-Adresse des Betreuers steht im Paket-Info,
        die des <b>Fink Core Team</b> ist fink-core@lists.sourceforge.net
        </p>
    
    <h2><a name="prenotifications">1.3 Im-Voraus-Benachrichtigung</a></h2>
      
      <p>Bei schwerwiegenden Sicherheitslücken kann es erforderlich sein,
        den Paket-Betreuer im voraus zu benachrichtigen. Da es vorkommen
        kann, dass der Betreuer nicht rechtzeitig erreicht wird, sollte das
        <b>Fink Security Team</b> ebenfalls im voraus benachrichtigt
        werden. Die Email-Adressen der Teammitglieder sind weiter unten
        aufgeführt. Bitte beachten sie, dass
        fink-core@lists.sourceforge.net eine öffentlich archivierte
        Mailing-Liste ist und private Im-Voraus-Benachrichtigungen deshalb
        <b>nie</b> an diese Adresse geschickt werden dürfen.</p>
    
    <h2><a name="response">1.4 Antwort</a></h2>
      
      <p>Eingeschickte Berichte über Sicherheitslücken werden vom
        <b>Fink Core Team</b> beantwortet. Von jedem Betreuer wird von
        Fink verlangt, jede einzelne Sicherheitslücke zu bestätigen. In
        dem unwahrscheinlichen Fall, dass der Betreuer nicht erreichbar ist
        und der Betreuer den Bericht nicht innnerhalb von 24 Stunden
        bestätigt, soll eine Notiz an das <b>Fink Core Team</b> gehen,
        in dem das Team informiert wird, dass der Betreuer nicht
        antwortet.</p>
      <p>In dem Fall, dass sie versuchten, den Paket-Betreuer zu erreichen,
        aber das Mail-System einen Fehler bei der Zustellung meldet,
        sollten sie sofort das <b>Fink Core Team</b> darüber
        informieren, dass der Paket-Betreuer nicht erreicht werden konnte
        und dass das Paket unabhängig vom Betreuer aktualisiert werden
        muss.</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="severity.php?phpLang=de">2. Antwortzeiten und sofortige Aktionen</a></p>
<?php include_once "../../footer.inc"; ?>


