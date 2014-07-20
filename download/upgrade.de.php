<?
$title = "Aktualisierungsmatrix";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2014/07/20 14:29:35 $';

include "header.inc";
?>

<h1>Fink Aktualisierungsmatrix</h1>
<p>(Für OS X Versionen >= 10.2)</p>
<h3>Gleiches Betriebsystem:</h3>
<p>
  Alle derzeitigen Versionen von Fink können direkt zur neuesten Version
  der entsprechenden Version von Mac OS X aktualisiert werden, d. h. laden
  sie den neuen Installer <strong>nicht</strong> herunter.
</p>
<p>
  Überprüfen sie den Version von Fink, indem sie in einem Terminalfenster
  das Kommando "<code>fink --version</code>" ausführen.
</p>
<p>
  Sie können diese Version mit der neuesten für ihr Betriebsystem in der
  <a href="../../pdb/package.php/fink">Paket-Datenbank</a> vergleichen.
</p>
<h2>Binäre Aktualisierungen</h2>
<p>
  Aktualisieren sie mittels
  <tt>dselect</tt>: Choose "[U]pdate", then "[I]nstall"
  oder indem sie
  "<tt>sudo apt-get update ; sudo apt-get dist-upgrade</tt>"
  ausführen.
</p>
<p>
  Sie können auch im <em>FinkCommander</em> "Update" gefolgt von
  "Dist-Upgrade" ausführen (beide im <tt>Binär</tt>-Menue).
</p>
<h2>Quelltext-Aktualisierung</h2>
<p>
  Führen sie "<tt>fink selfupdate</tt>" aus.
</p>
<p>
  Sie können auch im <em>FinkCommander</em> Source -> Selfupdate ausführen.
</p>
<h3>Neue Betriebsystemversion:</h3>
<p>
  Für jede Aktualisierung von OS X gibt es eine andere Strategie.  Die
  entsprechenden Anweisungen werden auf
  <a href="http://fink.sourceforge.net/">main page</a>
  veröffentlicht.
</p>
<h2>Binäre Aktualisierung</h2>
<ol>
  <li>
    Aktualisieren sie Fink wie oben im Punkt <em>Binäre Aktualisierung</em> 
    unter <em>Gleiches Betriebsystem</em> beschrieben auf die neueste
    Version ihres Betriebsystems.
  </li>
  <li>
    Wollen sie zu einem Zeitpunkt von den Quelltexten erstellen, sollten
    sie die alten Developer-Tools mit dem Terminal-Kommando
    "<tt>/Developer/Tools/uninstall-devtools.pl</tt>"
    löschen.
  </li>
  <li>
    Aktualisieren sie ihr Betriebsystem.
  </li>
  <li>
    Aktualisieren sie Fink und den Rest ihrer Pakete, wie oben beschrieben.
  </li>
  <li>
    Wenn sie irgend etwas aus den Quellen erstellen wollen, installieren
    sie die Version der Developer Tools (XCode), die zu ihrem Betriebsystem
    passt.
  </li>
</ol>
<p></p>
<h2>Quelltext-Aktualisierung</h2>
<p>
  Die allgemeine Strategie, die für alle unterstützen
  Betriebsystemversion funktioniert, sieht wie folgt aus:
</p>
<ol>
  <li>
    Aktualisieren sie Fink zur letzten Version, die auf ihrem Betriebsystem
    unterstützt wird (wie oben im Punkt <em>Quelltext-Aktualisierung</em>
    unter <em>Gleiches Betriebsystem</em> beschrieben).  Sie müssen den
    Baum "unstable" nicht einschalten.
  </li>
  <li>
    Löschen sie ihre alten Developer Tools, indem sie das Kommando
    "<tt>/Developer/Tools/uninstall-devtools.pl</tt>"
    in einem Terminal ausführen.
  </li>
  <li>
    Aktualisieren sie ihr Betriebsystem.
  </li>
  <li>
    Installieren sie die entsprechende Version der Developer Tools (XCode).
  </li>
  <li>
    Führen sie das Kommando 
    "<tt>/sw/lib/fink/postinstall.pl</tt>"
   in einem Terminal aus.  Dies verweist Fink auf die richtige Distribution
   für ihre Version des Betriebsystems.
  </li>
  <li>
    Führen sie das Kommando 
    "<tt>fink scanpackages</tt>"
   in einem Terminal aus (Im FinkCommander: Source -> Scanpackages).
  </li>
  <li>
    Führen sie das Kommando 
    "<tt>sudo apt-get update</tt>"
    in einem Terminal aus (Im FinkCommander: Binär -> Update).
    <br>
    (Die zwei Kommandos beheben Fehler der binären Distribution.)
  </li>
  <li>
    Führen sie das Kommando 
    "<tt>fink selfupdate</tt>"
    in einem Terminal aus (Im FinkCommander: Source -> Selfupdate).
  </li>
  <li>
    Führen sie das Kommando 
    "<tt>fink update-all</tt>"
    in einem Terminal aus (Im FinkCommander: Source -> update-all).
    <p>
    Damit wird sicher gestellt, dass alle Pakete auf dem neuen System
    laufen können.  Manchmal muss der Befehl mehrmals ausgeführt werden,
    damit alle Pakete neu erstellt werden.
    </p>
  </li>
</ol>

<p>
  Anmerkung: Eine Vorgängerversion diese Dokuments für ältere Versionen
  von Fink gibt es <a href=upgrade-old.en.php>hier</a>.
</p>

<?
include "footer.inc";
?>
