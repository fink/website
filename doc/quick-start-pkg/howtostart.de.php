<?php
$title = "Packaging Tutorial - Der Anfang";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/03/05 23:40:46';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Packaging Tutorial Contents"><link rel="next" href="example.php?phpLang=de" title="Beispiel - das Maxwell Paket"><link rel="prev" href="index.php?phpLang=de" title="Packaging Tutorial Contents">';


include_once "header.de.inc";
?>
<h1>Packaging Tutorial - 1. Der Anfang</h1>
    
    
    <h2><a name="Learn">1.1 Grundlagen</a></h2>
      
      <p>
        <b>Beachten sie:</b> In diesem Dokument wird davon ausgegangen, dass
        <code>fink</code> im Verzeichnis <code>/sw</code> installiert ist,
        entsprechend der Voreinstellungen. Ein Block mit Code wie dieser
      </p>
<pre>
finkdev% somecommand
</pre>
      <p>
        bedeutet, dass sie das Kommando <code>somecommand</code> in einem Fenster von
        Terminal.app oder einem anderen Terminalprogramm ihres Macs eingeben müssen.
      </p>
      <p>
        Zuerst müssen sie einige grundlegende Konzepte über das Erstellen von Fink-Paketen
        verstehen. Wir schlagen folgendes vor:
      </p>
      <ul>
        <li>
          Lesen sie folgende Folien
          <a href="/doc/UsingFink.pdf">Using Fink: A Developer's How To</a>
          (2 MB pdf-Datei) durch. die auf der
          <a href="http://conferences.oreillynet.com/macosx2002/">O'Reilly Mac OS X Conference</a>
          präsentiert wurden.
        </li>
        <li>
          
          
          
          
          Lesen sie <a href="example.php?phpLang=de#basics">folgendes Beispiel</a>
          durch und versuchen sie es auch zu verstehen.
        </li>
        <li>
          Schauen sie in andere, ähnliche Pakete im Verzeichnis
          <code>/sw/fink/dists/stable/main/finkinfo/</code> oder
          im
          <a href="http://fink.cvs.sourceforge.net/fink/dists/">online CVS-Repository</a>.
          Nehmen sie eine oder mehrere Dateien als Ausgangspunkt für ihr eigenes Paket.
        </li>
        <li>
          Durchsuchen sie den
          <a href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Package Submission Tracker</a>,
          ob bereits jemand anderer bereits versuchte, das Paket zu erstellen oder ob jemand im
          <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package Request Tracker</a>
          darum gebeten hat, es zu erstellen. Oft findet man wertvolle Informationen.
        </li>
        <li>
          Schauen sie vielleicht in der
          <a href="/doc/packaging/index.php">Anleitung für die Paketerstellung</a>
          nach, wenn sie denken, dass sie weitere Details brauchen.
        </li>
      </ul>
    
    <h2><a name="Make">1.2 Paket erstellen</a></h2>
      
      <p>
        Speichern sie ihre info-Datei (falls benötigt auch die patch-Datei) im Verzeichnis
        <code>/sw/fink/dists/local/main/finkinfo/</code>. Der Name der Datei sollte
        <code>paketname.info</code> sein (und <code>paketname.patch</code>).
        paketname ist der Name ihres Pakets. Existiert das Verzeichnis nicht, müssen sie
        es erzeugen. Paketname sollte klein geschrieben sein.
      </p>
      <p>
        <b>Beachten sie bitte:</b>
        Versichern sie sich, dass <code>fink</code> aktuell ist, indem sie folgende
        Kommandos ausführen:
      </p>
<pre>
finkdev% fink selfupdate
</pre>
      <p>Danach:</p>
<pre>
finkdev% fink configure
</pre>
      <p>
        Setzen sie dabei die Ausführlichkeits-Stufe auf den höchsten Wert. Aktivieren
        sie Mac OS X - Versionen bis 10.6 den unstable Baum. Danach sollten sie mit dem
        folgenden Kommando überprüfen, ob <code>fink</code> ihr Paket findet:
      </p>
<pre>
finkdev% fink list paketname
</pre>
      <p>
        Sollte ihr Paket nicht aufgeführt werden, müssen sie die
        <a href="/doc/users-guide/conf.php#optional">Konfigurationsdatei von Fink</a>
        ergänzen, so dass ihr lokaler Baum berücksichtigt wird.
      </p>
      <p>Vielleicht müssen sie auch den Index der Pakete mit folgendem Kommando
        aktualisieren:</p>
<pre>
finkdev% fink index
</pre>
      <p>
        Benötigen sie mehr Details, schauen sie bitte in der
        <a href="/doc/packaging/index.php">Anleitung für die Paketerstellung</a>
        nach oder nutzen sie eine der folgenden
        <a href="/help/index.php">Hilfequellen</a>.
        Sie sollten auch die <a href="/lists/index.php">fink-devel</a>
        Mailing-Liste abonnieren.
      </p>
    
    <h2><a name="Validate">1.3 Validieren sie ihr Paket</a></h2>
      
      <p>
        Während der Validierung sollten sie die Ausführlichkeits-Stufe von
        <code>fink</code> auf den höchsten Wert setzen. Schauen sie im Abschnitt
        <a href="/doc/users-guide/conf.php#optional">Konfigurationsdatei von Fink</a>
        nach, wie man die Ausführlichkeits-Stufe verändert.
      </p>
      <p>Überprüfen sie mit folgendem Kommando, ob ihr Paket validiert werden kann:</p>
<pre>
finkdev% fink validate /sw/fink/dists/local/main/finkinfo/paketname.info
</pre>
      <p>Ist ihr Paket validiert, versuchen sie es mit diesem Kommando zu erstellen:</p>
<pre>
finkdev% fink -m --build-as-nobody rebuild paketname
</pre>
      <p>
        Durchsuchen sie die Ausgabe des Prozesses sorgfältig nach Fehlern und Warnungen.
        Achten sie insbesondere darauf, dass alles in das richtige Zielverzeichnis
        installiert wird, nämlich <code>/sw/src/root-paketname-%v-%r/sw</code>.
        Von dort erstellt <code>fink</code> das binäre Paket. Nichts darf direkt in das
        Verzeichnis <code>/sw</code> installiert werden.
      </p>
      <p>
        Mit der <code>fink</code>-Option <code>--keep-build-dir</code> oder
        <code>-k</code> wird das Verzeichnis, in dem das Paket erstellt wurde, nicht
        gelöscht, sondern bleibt erhalten. Hierhin hat <code>fink</code> den Quelltext
        entpackt und das Paket erstellt. Dies kann dabei helfen, Fehler bei der
        Erstellung zu beheben. Geben sie das Kommando <code>man fink</code> für weitere
        Details ein.
      </p>
      <p>
        Mit der <code>fink</code>-Option <code>--keep-root-dir</code> or <code>-K</code>
        wird auch das Zielverzeichnis nicht gelöscht, sondern bleibt erhalten.
        hier erstellt <code>fink</code> den Installations-Baum des Pakets. Fehler
        während der Installation kommt man oft durch einen Vergleich des Verzeichnisses
        für das Erstellen und dem Zielverzeichnis auf die Spur.
      </p>
      <p>
        Wird das Paket erfolgreich erstellt, überprüfen sie das Binärpaket mit folgendem
        Kommando:
      </p>
<pre>
finkdev% dpkg -c /sw/fink/dists/local/main/binary-darwin-powerpc/paketname.deb
</pre>
      <p>
        Überprüfen sie, dass alle Dateien auch tatsächlich in der .deb Datei sind.
        Ein weiteres Mal: Nichts darf direkt in das Verezichnis <code>/sw</code>
        installiert werden.
      </p>
      <p>Jetzt kann man auch das binäre Paket mit diesem Kommando validieren:</p>
<pre>
finkdev% fink validate /sw/fink/dists/local/main/binary-darwin-powerpc/paketname.deb
</pre>
      <p>Ist alles in Ordnung, können sie das Paket installieren</p>
<pre>
finkdev% fink install paketname
</pre>
      <p>und die Funktionalität ihres Paket überprüfen.</p>
      <p>
        Klappt einer der Schritte nicht, versuchen sie, den Fehler zu beheben und
        beginnen sie noch einmal von vorne mit dem Schritt <code>fink validate</code>.
      </p>
    
    <h2><a name="Submit">1.4 Paket einreichen</a></h2>
      
      <p>
        Hat ihr Paket alle überprüfungen überstanden, können sie ihre info-Datei
        (falls benötigt auch die patch-Datei) im
        <a href="http://sourceforge.net/tracker/?func=add&amp;group_id=17203&amp;atid=414256">Package Submission Tracker</a>
        einreichen.
      </p>
      <p>
        Einer der Paket-Reviewer wird sich ihr Paket anschauen und es zu dem
        entsprechenden Paket-Baum hinzufügen (bis 10.6: unstable-Baum), wenn er es
        als in Ordnung einschätzt. Falls nicht, werden sie gebeten, das Paket Fehler zu
        beheben und es in Einklang mit der Paket-Politik zu bringen.
      </p>
      <p><b>Wichtig:</b></p>
      <ul>
        <li>
          Wenn irgendwie praktikabel, laden sie mehrere Dateien (also info- und patch-Datei)
          eine nach der anderen in den selben Trackereintrag hoch.
        </li>
        <li>
          Vermerken für welchen Baum oder Bäume (10.x) das Paket eingereicht wird.
        </li>
        <li>
          Vermerken sie, in welche <code>Kategorie</code> (graphics, sci, etc.) ihrer Meinung
          nach das Paket gehört.
        </li>
        <li>
          Geben sie an, ob sie das Kommando <code>fink validate</code> mit ihren info- und
          deb-Dateien ausgeführt haben.
        </li>
        <li>
          Setzen sie das Feld <code>Group</code> des Trackereintrags auf
          <code>Undergoing Validation</code>, wenn sie einen neuen Eintrag erstellen.
          Vergessen sie nicht, es auch dann wieder auf <code>Undergoing Validation</code>
          zurück zu stellen, wenn sie ein Problem behoben haben, das von einem Reviewer
          gefunden und bemängelt wurde.
        </li>
        <li>
          Setzen sie das Feld <code>Category</code> des Trackereintrags auf den korrekten Wert.
        </li>
      </ul>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="example.php?phpLang=de">2. Beispiel - das Maxwell Paket</a></p>
<?php include_once "../../footer.inc"; ?>


