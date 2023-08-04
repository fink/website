<?php
$title = "F.A.Q. - Fink aktualisieren";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 04:42:29';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="usage-fink.php?phpLang=de" title="Fink installieren, benutzen und pflegen"><link rel="prev" href="mirrors.php?phpLang=de" title="Fink-Spiegelserver">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 4. Fink aktualisieren(versions-spezifische Probleme)</h1>
    
    
    <a name="leopard-bindist1">
      <div class="question"><p><b><?php echo FINK_Q ; ?>4.1: Fink erkennt keine neuen Pakete, selbst nach einem selfupdate mit
          rsync oder cvs.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Das ist ein gängiges Problem, wenn man auf OS X 10.5 den binären
          Installer benutzt. Überprüfen sie die Version von Fink:</p><pre>fink --version</pre><p>Wenn sie derzeit die Version <code>fink-0.27.13-41</code> haben, das
          die Version ist, den der Installer verwendet, oder die Version
          <code>fink-0.27.16-41</code>, gibt es eine Reihe von Optionen.</p><ul>
          <li>
            <b>rsync (vorzugsweise):</b> Führen sie folgende Befehlssequenz
            aus:
<pre>fink selfupdate
fink selfupdate-rsync
fink index -f
fink selfupdate</pre>
	        </li>
	        <li>
	          <b>cvs (alternativ):</b> Führen sie folgende Befehlssequenz aus:
<pre>fink selfupdate-cvs
fink index -f
fink selfupdate</pre>
	        </li>
	      </ul><p>Beides wird die neueste Version von <code>fink</code>
          installieren.</p></div>
    </a>
    <a name="leopard-bindist2">
      <div class="question"><p><b><?php echo FINK_Q ; ?>4.2: Wenn ich versuche etwas zu installiere, bekommen ich die Meldung
          'Can't resolve dependency "fink (&gt;= 0.28.0)"'</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Aktualisieren sie Fink wie im
          <a href="#leopard-bindist1">vorigen Abschnitt</a>
          beschrieben.</p></div>
    </a>
    <a name="stuck-gettext">
      <div class="question"><p><b><?php echo FINK_Q ; ?>4.3: Fink verlangt, das Kommando 'sudo apt-get install
          libgettext3-dev=0.14.5-2' auszuführen, um inkonsistente Abhängigkeiten
          aufzulösen, aber alles steckt fest.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die Paketbeschreibung von <b>libgettext3</b> hat ein
          Zeitstempel-Problem. Version 0.14.5-2 ist veraltet. Führen sie
          folgende Kommandos aus:</p><pre>fink index -f
fink update libgettext3-dev</pre><p>Dies aktualisiert zuerst den Paketbeschreibungs-Cache und dann das
          Paket.</p></div>
    </a>
    <a name="stuck-dpkg">
      <div class="question"><p><b><?php echo FINK_Q ; ?>4.4: Fink meldet 'Can't resolve dependency "dpkg (&gt;= 1.10.21-1229)" für
          das Paket "dpkg-base-files-0.3-1"'. Wie löse ich das Problem?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die aktualisierte Paketbeschreibung von <b>dpkg</b> hat ein
          Zeitstempel-Problem. Führen sie folgende Kommandos aus:</p><pre>fink index -f
fink selfupdate</pre><p>Dies aktualisiert zuerst den Paketbeschreibungs-Cache und installiert
          dann <code>dpkg</code> und <code>dpkg-base-files</code>.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=de">5. Fink installieren, benutzen und pflegen</a></p>
<?php include_once "../footer.inc"; ?>


