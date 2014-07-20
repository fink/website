<?
$title = "Anleitung zur Aktualisierung unter Mac OS X 10.6";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2014/07/20 12:08:04 $';

include "header.inc";
?>

<h1>Anleitung zur Aktualisierung unter Mac OS X 10.6</h1>
<h2>Wichtige Anmerkungen:</h2>
<p>Haben sie Xquartz 2.4 unter 10.5 installiert, wird es wahrscheinlich
einfacher sein, einen <a href="./srcdist.php">clean install</a> aus
den Quellen durchzuführen.
<p><br>
<p>Führen sie folgende Sequenz aus, um ihre Installation von Fink von
10.5/32 bit auf 10.6/32 bit zu aktualisieren (Es gibt keinen direkten Weg
von früheren Betriebsystemversionen):
</p>
<ol>
  <li>Vor der Installation von OS X 10.6, führen sie 
  <pre>fink selfupdate</pre> aus, wobei rsync oder cvs eingeschaltet ist,
  d. h. <pre>fink selfupdate-rsync</pre> oder 
  <pre>fink selfupdate-cvs</pre>.  Dies aktualisiert <em>fink</em> auf eine
  laufende Version.
  <br>
  Überprüfen sie die Version ihres Paketmanagers mittels 
  <pre>fink -V</pre>.  Die Version muss vor der Aktualisierung mindestens
  0.29.9 sein.
  <br>
  <strong>Machen sie auf keinen Fall weiter, wenn ihre Version niedriger
  ist als 0.29.9!</strong> Sie müssen diesen
  <a href="../faq/upgrade-fink.php#leopard-bindist1">Anweisungen</a> 
  folgen, um Fink zu aktualisieren.
  </li>
  <li>Editieren sie die Datei <em>/sw/etc/fink.conf</em> und fügen sie
  folgende Zeile ein: <strong>NoAutoIndex: true</strong>.  (Sie werden
  <em>sudo</em> oder eine ähnliche Methode brauchen, um die Rechte zu
  erhalten, die für das Editieren der Datei notwendig sind.)
  </li>
  <li>Installieren sie OS X 10.6 und Xcode 3.2 (oder eine spätere 
  Version).
  </li>
  <li>Führen sie das Kommando <pre>fink reinstall fink</pre> aus, damit
  <em>fink</em> erfährt, dass es jetzt auf 10.6 läuft.  (Bekommen sie eine
  Meldung über eine korrupte Paket-Datenbank, führen sie 
  <pre>fink index -f</pre> aus und versuchen sie diesen Schritt noch
  einmal.)
  </li>
  <li>Führen sie das Kommando <pre>fink update fink</pre> aus, damit sie
  das neueste <em>fink</em> für 10.6 erhalten.
  </li>
  <li>Führen sie das Kommando <pre>fink install perl588-core</pre> aus,
  wenn sie Fink-Pakete haben, die von Perl abhängen.  Die Perl-Version des
  Systems wurde beim Upgrade verändert.
  </li>
  <li>Entfernen sie die Zeile <strong>NoAutoIndex: true</strong> aus der
  Datei <em>fink.conf</em>.
  </li>
</ol>
<p>Nach dem Upgrade wollen sie vermutlich das Kommando <pre>fink
configure</pre> ausführen, um ein wenig aufzuräumen.
</p>

<?
include "footer.inc";
?>
