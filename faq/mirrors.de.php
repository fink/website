<?php
$title = "F.A.Q. - Spiegelserver";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2015/06/06 19:19:29';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="upgrade-fink.php?phpLang=de" title="Fink aktualisieren(versions-spezifische Probleme)"><link rel="prev" href="relations.php?phpLang=de" title="Verbindungen zu anderen Projekten">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 3. Fink-Spiegelserver</h1>
    
    
    <a name="when-use">
      <div class="question"><p><b><?php echo FINK_Q ; ?>3.1: Was sind Fink-Spiegelserver?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fink-Spiegelserver sind rsync-Server, die die laufenden und stabilen
          Beschreibungsdateien spiegeln, mit denen Fink die Pakete aus den
          Quellen erstellt.</p></div>
    </a>
    <a name="why">
      <div class="question"><p><b><?php echo FINK_Q ; ?>3.2: Warum sollte ich rsync-Spiegelserver nutzen?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Rsync ist ein sehr schnelles Protokoll. Es aktualisiert die
          Paketbeschreibungen schneller als die alte Aktualisierung mit CVS.
          Darüber hinaus werden Aktualisierungen mit CVS immer sourceforge.net
          nutzen, während die Aktualisierung mit rsync von einem Spiegelserver
          in ihrer Nähe gemacht werden können.</p></div>
    </a>
    <a name="where">
      <div class="question"><p><b><?php echo FINK_Q ; ?>3.3: Wo finde ich mehr über Fink-Spiegelserver?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Alle Fink-Spiegelserver werden unter der Domäne finkmirrors.net
          zusammen geführt. Die Webseite
          <a href="http://finkmirrors.net/">finkmirrors.net</a>
          hat weitere Informationen.</p></div>
    </a>
    <a name="when-not">
      <div class="question"><p><b><?php echo FINK_Q ; ?>3.4: Ich bekomme keine Verbindung zu einem rsync-Spiegelserver. Was soll
          ich tun?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Manchmal verbieten sehr strenge Firewall-Regeln eine Verbindung zu
          rsync-Spiegelservern. In solchen Fällen verwenden sie einfach die
          CVS-Methode.</p></div>
    </a>
    <a name="otherinfogone">
      <div class="question"><p><b><?php echo FINK_Q ; ?>3.5: Nach der Umstellung auf rsync sind alle info-Dateien aus dem
          unbenutzten Baum weg.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Das ist normal. Die Aktualisierung mit rsync bearbeitet nur den
          aktiven Baum und wird alle Unterverzeichnisse von CVS löschen.</p></div>
    </a>
    <a name="howswitch">
      <div class="question"><p><b><?php echo FINK_Q ; ?>3.6: Wie kann ich zwischen den beiden Methoden hin- und herschalten?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Einfach mit den Kommandos <code>fink selfupdate-rsync</code>
          und <code>fink selfupdate-cvs</code>.</p></div>
    </a>
    <a name="Master">
      <div class="question"><p><b><?php echo FINK_Q ; ?>3.7: Was ist ein Spiegelserver für Distfiles?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Manchmal sind bestimmte Versionen von Quellen schwer zu erhalten.
          Spiegelserver für Distfiles behalten und spiegeln die Quellen, die
          Fink für seine Quell-Pakete benötigt.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="upgrade-fink.php?phpLang=de">4. Fink aktualisieren(versions-spezifische Probleme)</a></p>
<?php include_once "../footer.inc"; ?>


