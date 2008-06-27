<?
$title = "Benutzerhandbuch - Installation";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2008/06/27 00:55:00';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="next" href="packages.php?phpLang=de" title="Pakete Installieren"><link rel="prev" href="intro.php?phpLang=de" title="Einführung">';


include_once "header.de.inc";
?>
<h1>Benutzerhandbuch - 2. Erste Installation</h1>
    
    
    
      <p>
Während der ersten Installation, wird ein Basissystem mit den Werkzeugen für die Paketverwaltung auf Ihrem Rechner installiert. Danach müssen Sie Ihre Shellumgebung einrichten, so dass die von Fink installierte Software genutzt werden kann.
Sie brauchen dies nur einmal tun; Sie können auf jede neuere Fink-Installation (ab Version 0.2.0) aktualisieren, ohne Fink neu installieren zu müssen. Das wird im Kapitel <a href="upgrade.php?phpLang=de">Aktualisieren</a> behandelt.
</p>
      <p>
Sobald sie die Werkzeuge für die Paketverwaltung installiert haben, können Sie diese  für die Installation weiterer Software verwenden. Mehr dazu im Kapitel <a href="packages.php?phpLang=de">Pakete Installieren</a>.

</p>
    
    <h2><a name="bin">2.1 Installation der Binary-Distribution</a></h2>
      
      <p>
Die Binary-Distribution kommt in Form eines Mac OS X-Installationspaketes (.pkg), eingepackt in ein Diskimage (.dmg).
Nachdem dieses von der <a href="http://www.finkproject.org/download/bindist.php">Download-Seite</a> heruntergeladen ist (Sie müssen eventuell die "Verknüpfte Datei laden unter..."- oder die "Link auf Datenträger downloaden"-Funktion Ihres Browsers nutzen), müssen Sie diese Datei doppel-klicken, um sie zu mounten. Öffnen Sie dann das "Fink 0.x.x Installer"-Medium, welches entweder auf dem Desktop oder in einem Fenster des Finders auf der Sidebar erscheint, nachdem es vom Festplatten-Dienstprogramm (Disk Copy auf OS Versionen älter als 10.3) verifiziert worden ist. Dort drinnen finden Sie dann einige Dokumentationsdateien und ein Installationspaket. Doppel-klicken Sie dieses Installationspaket und folgen Sie den Anweisungen auf dem Bildschirm.</p>
      <p>
Sie werden nach dem Administratorpasswort gefragt und einige Text zu lesen bekommen. Bitte lesen Sie diese - sie können aktueller als dieses Nutzerhandbuch sein. Wenn der Installer nach einem Laufwerk, auf welchem die Installation erfolgen soll, fragt, gehen Sie sicher, dass Sie Ihr Systemvolume (das, auf welchem Sie Mac OS X installiert haben) auswählen. Wenn Sie das falsche Laufwerk wählen, wird die Installation fortgesetzt, aber Fink wird anschließend nicht funktionieren. Wenn die Installation beendet ist, fahren Sie mit dem Abschnitt <a href="#setup">Einrichten Ihrer Umgebung</a> fort.</p>
    
    <h2><a name="src">2.2 Installation der Source-Distribution</a></h2>
      
      <p>
Die Source-Distribution kommt als ein übliches Unix-tarball (.tar.gz) daher. Es beinhaltet nur den <code>fink</code> Paketmanager und seine Paketbeschreibungen; es lädt die Quelldateien der Pakete bei Bedarf herunter. Sie können es hier herunterladen:
<a href="http://www.finkproject.org/download/srcdist.php">Download-Seite</a>.
Es ist wichtig, daass Sie nicht den StuffIt Expander zum Entpacken des tar-Archivs verwenden. Aus irgendeinen Grund kann StuffIt noch mit keinen langen Dateinamen umgehen. Falls StuffIt Expander das Archiv schon entpackt hat, löschen sie den Ordner, welchen er erstellt hat.
</p>
      <p>
Die Source-Version muss über die Kommandozeile installiert werden. Also öffnen Sie Terminal.app und wechseln Sie zu dem Verzeichnis, wo Sie das fink-0.x.x-full.tar.gz-Archiv gespeichert haben. 

(Note: If you have OS X 10.4 and XCode 2.1, you should use
<code>fink-0.8.0-full-XCode-2.1.tar.gz</code> instead, and make
the appropriate changes below.)

Der folgende Befehl entpackt das Archiv:
</p>
      <pre>tar -xzf fink-0.x.x-full.tar.gz</pre>
      <p>
Dies erstellt ein Verzeichnis mit dem selben Namen des Archivs. Wir werden dafür hier den Platzhalter  <code>fink-0.x.x-full</code> verwenden. Wechseln Sie jetzt in das Verzeichnis und führen Sie das bootstrap-Script aus:
</p>
      <pre>cd fink-0.x.x-full
./bootstrap.sh</pre>
      <p>
Das Skript wird eine paar Kontrollen auf Ihrem System und sudo ausführen, um root zu bekommen - dies wird Sie nach Ihrem Passwort fragen. Dann wird Sie das Script nach dem Installationspfad fragen. Sofern Sie keinen guten Grund haben, sollten den Standardpfad wählen- <code>/sw</code>.
Nur so können Sie später auch Binärpakete installieren. Außerdem nutzen alle Beispiele diesen Pfad; achten Sie darauf diesen dann mit Ihren Installationspfad zu ersetzen, sollten Sie einen anderen gewählt haben.
</p>
      <p>
Es folgt die Konfiguration von Fink. Sie werden nach Dingen gefragt wie Proxy- und Mirror-Einstellungen und ob sie wortreiche Mitteilungen ("verbose") wünschen. Fall Sie eine Frage nicht verstehen, drücken Sie einfach Return, um die Standardwahl zu akzeptieren. Sie können diesen Vorgang später mit dem Befehl <code>fink configure</code> wiederholen.</p>
      <p>
Sobald das bootstrap-Script alle notwendigen Informationen bekommen hat, wird es den Quellcode für das Basissystem herunterladen und kompilieren. Von diesem Punkt an, wird keine weitere Interaktion nötig sein. Machen Sie sich keine Sorgen, falls manche Pakete mehrmals kompiliert werden. Dies ist notwendig, weil, um das Binärpaket der Paketverwaltung zu erstellen, erst die Paketverwaltung verfügbar sein muss.</p>
      <p>
Wenn das Skript beendet ist, fahren sie mit dem Abschnitt<a href="#setup">Einrichten Ihrer Umgebung</a> fort.
</p>
    
    <h2><a name="setup">2.3 Einrichten Ihrer Umgebung</a></h2>
      
      <p>
Um die Software, die in Finks Vereichnishierarchie installiert ist, einschließlich der Paketverwaltung selber, zu nutzen, müssen Sie die Umgebungsvariable PATH (und einige andere) entsprechend setzen. In den meisten Fällen können Sie das mit diesem Befehl tun:
</p>
      <pre>/sw/bin/pathsetup.sh</pre>

<p>Note that for some older versions of fink the program was called  <code>pathsetup.command</code>, and one could run it via <code>open /sw/bin/pathsetup.command</code>.</p>

<p>Falls es dennoch aus irgendeinen Grund nicht funktionieren sollte, können Sie es auch manuell konfigurieren. Allerdings hängt dies dann von der Shell ab, die Sie verwenden. Sie können herausfinden, welche Shell Sie verwenden, indem Sie im geöffneten Terminalfenster folgenden Befehl ausführen:
</p>
      <pre>echo $SHELL</pre>
      <p>
Sollte es "csh" oder "tcsh" ausgeben, nutzen Sie die C-Shell. Falls es "bash", "zsh", "sh" oder etwas ähnliches ausgibt, nutzen Sie wahrscheinlich eine Variante der Bourne-Shell.
</p>
      <ul>
        <li>
          <p>
            Bourne-Shell (voreingestellt unter Mac OS X 10.3 und später) </p>
          <p>
Wenn Sie eine Art Bourne-Shell nutzen (z.B. sh, bash, zsh), fügen Sie folgende Zeilen der Datei <code>.profile</code> in Ihrem Home-Verzeichnis hinzu (oder wenn Sie eine <code>.bash_profile</code>-Datei haben, sollte Sie diese stattdessen nutzen).
  </p>
          <pre>. /sw/bin/init.sh</pre>
          <p>
Wenn Sie nicht wissen, wie Sie die Zeile hinzufügen können, führen Sie diese Befehle aus:
  </p>
          <pre>cd
pico .profile</pre>
          <p>
Sie befinden sich nun in einem Vollbildschirm- (naja, Vollterminalfenster-) Texteditor und können einfach beginnen, die <code>. /sw/bin/init.sh</code>-Zeile einzutippen. Es ist okay, wenn eine Meldung erscheint, die "New file" ausgibt. Gehen Sie sicher, dass Sie nach der Zeile mindestens einmal Return gedrückt haben; dann drücken Sie ctrl-O, Return und ctrl-X, um aus dem Editor zu kommen.
  </p>
        </li>
        <li>
          <p>
            C-Shell (voreingestellt unter Mac OS X 10.2 und älter) </p>
          <p>
Wenn Sie tcsh verwenden, fügen Sie die folgende Zeile in die Datei <code>.cshrc</code> in Ihrem Home-Verzeichnis ein:
  </p>
          <pre>source /sw/bin/init.csh</pre>
         
         <p>
Wenn Sie nicht wissen, wie Sie die Zeile hinzufügen können, führen Sie diese Befehle aus:
  </p>
          <pre>cd
pico .cshrc</pre>
          <p>
Sie befinden sich nun in einem Vollbildschirm- (naja, Vollterminalfenster-) Texteditor und können einfach beginnen, die <code>source /sw/bin/init.csh</code>-Zeile einzutippen. Es ist okay, wenn eine Meldung erscheint, die "New file" ausgibt. Gehen Sie sicher, dass Sie nach der Zeile mindestens einmal Return gedrückt haben; dann drücken Sie ctrl-O, Return und ctrl-X, um aus dem Editor zu kommen.
  </p>
<p>Es gibt einige gewöhnliche Situationen, in welchen Sie weitere Dateien ändern sollten:</p>
          <ol>
            <li>
              <p>Sie haben eine <code>~/.tcshrc</code>.</p>
              <p>Eine solche Datei wird gelegentlich von Third-Party-Software oder auch von Ihnen selber erstellt. In jedem Fall wird es passieren, dass <code>~/.tcshrc</code> gelesen wird und <code>~/.cshrc</code> ignoriert wird. Die empfohlene Herangehensweise ist, die <code>~/.tcshrc</code> auf einer gleichartigen Weise zu ändern, wie Sie  <code>~/.cshrc</code> oben geändert haben, und die folgende Zeile am Ende hinzufügen:</p>
              <pre>source ~/.cshrc</pre>
<p>So werden Sie in der Lage sein, Fink zu starten, auch wenn die <code>~/.tcshrc</code> gelöscht ist.</p>
            </li>
            <li>
<p>Sie haben die Anweisungen unter <code>/usr/share/tcsh/examples/README</code> befolgt.</p>
<p>Diese Anweisungen beinhalten die Erstellung von <code>~/.tcshrc</code> und <code>~/.login</code> . Das Problem in diesem Fall bezieht sich auf <code>~/.login</code>, welche nach <code>~/.tcshrc</code> und den Quellen in <code>/usr/share/tcsh/examples/login</code> ausgeführt wird. Die letzteren enthalten eine Zeile, die die zuvor eingerichtete PATH-Variable überschreibt. In diesem Fall sollten Sie die Datei <code>~/Library/init/tcsh/path</code> erstellen:</p>
            <pre>mkdir -p ~/Library/init/tcsh
  pico ~/library/init/tcsh/path</pre>
              <p>Fügen Sie dort folgendes ein:</p>
              <pre>source ~/.cshrc</pre>
              <p>Sie sollten auch Ihre .tcshrc wie oben in Punkt 1 ändern, so dass Ihr PATH korrekt gesetzt ist, falls Ihre <code>~/.login</code> nicht gelesen wird.</p>
            </li>
          </ol>
          <p>
Änderungen in der .cshrc (und anderen Startup-Dateien) haben nur auf neue Shells (z.B. neu geöffnete Terminalfenster) Auswirkungen. Also sollten Sie diesen Befehl auch in allen Terminalfenstern ausführen, welche Sie geöffnet haben, bevor Sie die Datei verändert haben. Sie sollten auch <code>rehash</code> ausführen, da tcsh die Liste verfügbarer Befehle intern zwischenspeichert.</p>
        </li>
      </ul>
      <p>
Beachten Sie, dass das <code>init.sh</code> und <code>init.csh</code> Script außerdem <code>/usr/X11R6/bin</code> und <code>/usr/X11R6/man</code> zu Ihrem PATH hinzufügt, so dass Sie den X11-Server nutzen können, wenn er installiert ist. Fink-Pakete haben die Möglichkeit selbst Einstellungen hinzuzufügen, z.B. setzt das qt-Paket die QTDIR-Umgebungsvariable.
</p>
      <p>
Ist die Umgebung dann eingerichtet, können Sie mit dem Kapitel <a href="packages.php?phpLang=de">Pakete Installieren</a> fortfahren, um zu sehen, wie Sie endlich nützliche Pakete mit Hilfe der in Fink enthaltenen Werkzeugen zur Paketverwaltung installieren können.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="packages.php?phpLang=de">3. Pakete Installieren</a></p>
<? include_once "../../footer.inc"; ?>


