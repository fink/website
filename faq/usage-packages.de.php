<?php
$title = "F.A.Q. - Benutzung (2)";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2015/06/06 19:19:29';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="prev" href="usage-general.php?phpLang=de" title="Benutzung von Paketen - Allgemein">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 9. Benutzung von Paketen - Bestimmte Pakete</h1>
    
    
    
    <a name="xmms-quiet">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.1: Ich bekommen keinen Ton von XMMS</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Überprüfen sie, dass in den Einstellungen von XMMS das "eSound
          Output Plugin" ausgewählt ist. Aus unerfindlichem Grund wird der
          disk writer als Voreinstellung eingestellt.</p><p>Ist immer noch kein Ton zu hören oder wenn sich XMMS beklagt, dass es
          die Soundkarte nicht finden kann, können sie folgendes probieren:</p><ul>
          <li>Überprüfen sie zuerst, ob nicht der Ton in OS X ausgestellt
            ist.</li>
          <li>Führen sie das Kommando <code>esdcat
            /usr/libexec/config.guess</code> (oder irgendeine andere Datei von
          normaler Größe) aus. Hören sie ein kurzes Geräusch, dann funktioniert
          eSound und XMMS sollte auch funktionieren, wenn es richtig konfiguriert
          ist. Hören sie überhaupt nichts, funktioniert esd aus irgendeinem
          Grund nicht. Sie können versuchen, es manuell mit dem Kommando
          <code>esd &amp;</code> zu starten und die Meldungen abwarten.</li>
          <li>Wenn es immer noch nicht funktioniert, überprüfen sie die
            Zugriffsrechte der Dateien <code>/tmp/.esd</code> und
            <code>/tmp/.esd/socket</code>. Sie sollten normalen Nutzern
            gehören. Gehören sie nicht ihnen, brechen sie esd ab, wenn es läuft,
            löschen sie das Verzeichnis als root (<code>sudo
            rm -rf /tmp/.esd</code>), starten esd noch einmal (als normaler
            Nutzer, nicht als root).</li>
        </ul><p>Beachten sie, dass esd entworfen wurde, um unter einem normalen
          Nutzerkonto und nicht unter root zu laufen. Normalerweise kommuniziert
          es über den file system socket <code>/tmp/.esd/socket</code>. Sie
          brauchen die Optionen <code>-tcp</code> und <code>-port</code> nur,
          wenn sie esd-Klienten auf anderen Rechnern über ein Netzwerk laufen
          lassen wollen.</p><p>Es gab auch Berichte, dass XMMS auf OS X 10.1 abstürzt oder
          einfriert. Dieses Problem ist weder analysiert noch behoben.</p></div>
    </a>
    <a name="nedit-window-locks">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.2: Wenn ich eine Datei mit nedit editiere und eine weitere Datei öffne,
          erscheint ein Fenster, das aber nicht auf Eingaben reagiert.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Dies ist ein bekanntes Problem, das mit neueren Version von
          <code>nedit</code> und <code>lesstif</code> auf allen
          Plattformen auftritt. Die Lösung ist, ein neues Fenster mit
          File--&gt;New zu öffnen und dann die nächste Datei, die man bearbeiten
          will, zu öffnen.</p><p>Das ist in der Version <code>nedit-5.3-6</code> behoben, das
          von <code>openmotif3</code> und nicht von
          <code>lesstif</code> abhängt.</p></div>
    </a>
    <a name="xdarwin-start">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.3: Hilfe! Wenn ich XDarwin starte, bricht es sofort ab!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Nur keine Panik. Das Dokument über X11 hat ein ausführliches
          Kapitel über
          <a href="/doc/x11/trouble.php#immediate-quit">ausführliches Kapitel</a>
          zu diesem Problem.</p></div>
    </a>
    <a name="no-server">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.4: Wenn ich versuche, XDarwin zu starten, erhalte ich die Fehlermeldung
          "xinit: No such file or directory (errno 2): no server
          "/usr/X11R6/bin/X" in PATH".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Überprüfen sie zuerst, dass source init.sh in ihrem X startup
          <code>~/.xinitrc</code> steht.</p><p>Unter Jaguar werden manchmal alle <code>xfree86</code> Pakete
          erstellt, aber nur <code>xfree86-base</code> und
          <code>xfree86-base-shlibs</code> installiert. Überprüfen sie, ob die
          Pakete <code>xfree86-rootless</code> und
          <code>xfree86-rootless-shlibs</code> installiert sind. Wenn nicht,
          sollte das Kommando <code>fink install xfree86-rootless</code> die
          Probleme beheben.</p><p>Sind die Pakete installiert, dann versuchen sie ein <code>fink
          rebuild xfree86-rootless</code>. Sollte das auch nicht funktionieren,
          überprüfen sie ob sie <code>/usr/bin/X11R6</code> in ihrer
          Umgebungsvariable PATH steht.</p></div>
    </a>
    <a name="apple-x-delete">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.5: Ich möchte, dass die Löschen-Taste in Apples X11.app sich so wie in
          XDarwin verhält.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Einige Nutzer berichteten, dass sich die <code>Löschen</code>-Taste
          in XDarwin und Apples X11 unterschiedlich verhalten. Dies kann so
          behoben werden, indem man folgende Zeilen in die entsprechende
          X Startup-Datei einfügt:</p><p><b>.Xmodmap:</b></p><pre>keycode 59 = Delete</pre><p><b>.Xresources:</b></p><pre>xterm*.deleteIsDEL: true
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?</pre><p><b>.xinitrc</b></p><pre>xrdb -load $HOME/.Xresources
xmodmap $HOME/.Xmodmap</pre></div>
    </a>
    <a name="apple-x11-wants-xfree86">
      
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.6: Ich habe Probleme mit X11 und Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Es könnte zwei verschieden Ursachen haben.</p><ul>
          <li><b>Sie installieren binäre Dateien:</b>
            <p>Normalerweise müssen sie das Paket X11User erneut installieren,
              denn der Installer vergisst manchmal eine Datei zu installieren.
              Man muss dies manchmal mehrmals wiederholen. Das Kommando</p>
<pre>fink list -i system-xfree86</pre>
       	    <p>sollte zeigen, dass die Pakete <code>system-xfree86</code> und
              <code>system-xfree86-shlibs</code> installier sind, und</p>
<pre>fink list x11</pre>
      	    <p>sollte zeigen dass die virtuellen Pakete <code>x11-shlibs</code>
              und <code>x11</code> installiert sind.</p>
	          <p>Sollte die erneute Installation des Pakete X11User nicht
              funktionieren, lesen sie untern das Kapitel mit den
              <a href="#special-x11-debug">special debug</a>
              Instruktionen.</p>
          </li>
          <li><b>Sie installieren aus Quell-Code:</b>
            <p>Normalerweise bedeutet dieser Fehler, dass sie X11SDK (erneut)
              installieren müssen, wenn sie Pakete aus Quell-Code erstellen
              wollen. Es ist in dem Ordner Xcode Tools der Tiger DVD oder
              (Optional Installs/)Xcode Tools/Packages auf der Leopard DVD(s).
              Das Kommando</p>
<pre>fink list -i system-xfree86  </pre>
            <p>sollte die Pakete <code>system-xfree86</code>,
              <code>system-xfree86-shlibs</code> und
              <code>system-xfree86-dev</code> als installiert anzeiten. Fehlt
              das Paket <code>-dev</code>, installieren sie die X11SDK erneut,
              denn der Apple Installer vergisst eine Datei. Manchmal muss dies
              wiederholt werden. Fehlt eines der beiden anderen, dann
              installieren sie aus demselben Grund das Paket X11User. Jetzt
              sollte das Kommando</p>
<pre>fink list x11</pre>
      	    <p>anzeigen, dass die virtuellen Pakete <code>x11-dev</code>,
              <code>x11-shlibs</code> und <code>x11</code> installiert sind.</p>
	          <p>Führt die erneute Installation der Pakete X11SDK oder X11User
              nicht zum Erfolg, lesen sie unten die ausführlichen
              <a href="#special-x11-debug">special debug</a>
              Instruktionen.</p>
           </li>
        </ul></div>
    </a>
    <a name="special-x11-debug">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.7: Ich habe immer noch Probleme mit X11 und Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wenn die Hinweise im Kapitel <a href="#apple-x11-wants-xfree86">Ich habe Probleme mit X11 und
          Fink</a> nicht helfen oder nicht zu den Problemen passen, kann es
          sein, dass sie die gesamte X11-Installation löschen müssen und ebenso
          alte Platzhalter-Pakete und teilweise oder vollständig installierte
          Pakete mit X11-Bezug:</p><p>Benutzen sie unter Leopard diese Kommandos:</p><pre>sudo pkgutil --forget com.apple.pkg.X11User
sudo pkgutil --forget com.apple.pkg.X11SDKLeo</pre><p>Dann auf 10.4 oder 10.5 führen sie diese Sequenz aus:</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg \
 /Library/Receipts/X11Update*.pkg
fink selfupdate; fink index</pre><p>(Die erste Zeile kann Warnungen zur Folge haben, dass sie versuchen,
          Pakete zu löschen, die nicht installiert sind.) Installieren sie dann
          erneut Apples X11 und, wenn benötigt auch X11SDK oder auf 10.4
          eine alternative X11 Implementation wie XFree86 oder X.org.</p><p>Wenn sie immer noch Probleme haben, können sie folgendes Kommando
          ausführen</p><pre>fink-virtual-pkgs --debug</pre><p>um Informationen zu erhalten, was fehlt.</p><p>Benutzen sie eine frühere Version von <code>fink</code>, dann gibt es
          dafür ein Perl-Skript (Dank an Martin Costabel), das sie herunter
          laden und dann ausführen können.</p><ul>
          <li>Laden sie es von hier herunter:
            <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
          </li>
          <li>Speichern sie es, wo immer sie es wollen.</li>
          <li>Führen sie das Skript im Terminal aus:
<pre>perl fink-x11-debug</pre>
          </li>
        </ul></div>
    </a>
    <a name="tiger-gtk">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.8: Nach der Aktualisierung auf Tiger (OS 10.4), bekomme ich immer
          Fehlermeldung mit <code>_EVP_idea_cbc</code>, sobald ich ein GTK-
          Programm starte.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die Ursache ist ein Fehler in Tigers dynamic linker (aktuell bis
          10.4.1), der aber in 10.4.3 behoben ist. Fink hat eine Lösung im Paket
          <code>base-files-1.9.7-1</code> oder später.</p><p>Wenn sie Tiger und/oder das Paket <code>base-files</code> noch nicht
          aktualisiert haben, können sie das Problem umgehen, in dem sie dem
          Namen der Programme folgendes voranstellen:</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>Wenn sie also <code>gnucash</code> starten wollen, verwenden sie:</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>Diese Methode funktioniert bei Programmen, egal ob sie im
          Programme-Menu in Apples X11 oder in einem Terminal gestartet
          werden.</p><p>Vielleicht finden sie es besser, dies global zu setzen (z. B. in
          ihrem Startup-Skript und/oder ihrem <code>.xinitrc</code>, das beim
          Start von GNOME verwendet wird). Fügen sie</p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>in ihrer Datei <code>.xinitrc</code> dazu (unabhängig von ihrer
          Login-Shell) oder der Datei <code>.profile</code> (oder andere
          Startup-Skripte) für <b>bash</b>-Nutzer und:</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>ist das entsprechende Kommando für die Datei <code>.cshrc</code>
          für <b>tcsh</b>-Nutzer.</p><p>Anmerkung: This wird automatisch erledigt, wenn sie ein ausreichend
          aktuelles <code>base-files</code> installieren.</p></div>
    </a>
    <a name="yelp">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.9: Ich erhalte in GNOME-Programmen keine Hilfe.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Sie müssen das Paket <code>yelp</code> installieren. Diese Paket
          wurde nicht in das GNOME-Bundle aufgenommen, weil es Kryptographie
          enthält und man nicht das gesamte GNOME-Bundle in den crypto-Baum
          verschieben wollte, nur damit man das Hilfe-System von GNOME nutzen
          kann.</p></div>
    </a>
  
<?php include_once "../footer.inc"; ?>


