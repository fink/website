<?php
$title = "Running X11 - Probleme beheben";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Running X11 Contents"><link rel="next" href="tips.php?phpLang=de" title="Tipps für die Benutzung"><link rel="prev" href="other.php?phpLang=de" title="Andere Möglichkeiten mit X11 ">';


include_once "header.de.inc";
?>
<h1>Running X11 - 6. Probleme mit XFree86 beheben</h1>
    
    
    <h2><a name="immediate-quit">6.1 Starte ich X11, wird es sofort beendet oder es stürzt ab.</a></h2>
      
      <p>
        Zu allererst: Nur keine Panik!  Bei X11 kann einiges schief gehen
        und vieles davon führt zu einem Abbruch beim Start. Es ist also
        nicht wirklich ungewöhnlich. In diesem Abschnitt werden
        möglichst alle Fälle beschrieben, mit denen man rechnen muss.
        Als erstes muss man sich um folgende zwei Informationen kümmern:
      </p>
      <p>
        <b>Die version des Display-Server.</b> Die Version des
        Display-Server findet man im Finder, wenn man <b>einmal</b> auf
        das Symbol von X11 oder XQuartz klickt und dann "Informationen" aus
        dem Menu "Ablage" auswählt. Dasselbe erreicht man auch mit
        Command-I.
      </p>
      <p>
        <b>Fehlermeldungen.</b>
        Fehlermeldungen sind von enormer Bedeutung, um das jeweilige
        Problem einzugrenzen. Wie die Fehlermeldungen ausgegeben werden,
        hängt davon ab, wie sie X11 gestartet haben. Haben sie
        <code>startx</code> in einem Terminalfenster eingegeben, werden
        Fehlermeldungen direkt in gleichen Fenster ausgegeben. Oft muss
        man zum Lesen nach oben blättern. Haben sie X11 durch einen
        Doppleklick von X11 or XQuartz gestartet, landen die
        Fehlermeldungen im System-Log, den man mit dem Programm "Konsole"
        aus dem Ordner "Dienstprogramme" lesen kann. Man muss aufpassen,
        dass man die richtigen Meldungen liest, also die letzten.
      </p>
      <p>
        Im folgenden einige Fehlermeldungen. In vielen Fällen ist die
        deutsche Übersetzung nicht bekannt, weshalb normalerweise das
        englische Original beschrieben wird.
      </p>
<pre>_XSERVTransmkdir: Owner of /tmp/.X11-unix should be set to root</pre>
<pre>_IceTransmkdir: Owner of /tmp/.ICE-unix should be set to root</pre>
      <p>
        Klassifizierung: Harmlos.
        X11 erzeugt versteckte Verzeichniss in /tmp, um "Socket-Dateien"
        für lokale Verbindungen zu speichern. Aus Sicherheitsgründen
        gibt X11 diesen Verzeichnissen den Eigentümer "root". Sie haben
        aber sowieso Schreibzugriff für alle, so dass X11 ohne Probleme
        läuft. (Notiz: Es ist recht schwierig, diesen Verzeichnissen den
        Eigentümer "root" zu geben, weil Mac OS X bei einem Neustart /tmp
        löscht und X11 nicht mit "root"-Rechten läuft und auch nicht
        muss.)
      </p>
<pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>
      <p>
        Klassifizierung: Meistens harmlos.
        Dieser Fehler hat anscheinend keinerlei Auswirkungen. Sie können
        den Fehler durch Eingabe des Kommandos <code>touch
        .Xauthority</code> im Heimatverzeichnis los werden.
      </p>
<pre>Gdk-WARNING **: locale not supported by C library</pre>
      <p>
        Klassifizierung: Harmlos.
        Es bedeutet genau das, was es sagt und verhindert nicht das normale
        Funktionieren eines Programms. Weitere Information dazu finden sie
        weiter unten im Agbschnitt <a href="#locale">Locale</a>.
      </p>
<pre>Warning: no access to tty (Inappropriate ioctl for device).
Thus no job control in this shell.</pre>
      <p>
        Klassifizierung: Meistens harmlos.
        X11 startet im Hintergrund eine interaktive Shell, um die
        Startdatei des Klienten (.xinitrc) auszuführen. Dadurch braucht
        man keine Kommandos um den Pfad "PATH" zu setzen. Einige Shells
        beschweren sich, dass es keine Verbindung zu einem echten Terminal
        gibt, was aber ignoriert werden kann, weil diese Shell keine
        Job-Kontrolle durch Eingabe oder ähnliches benötigt.
      </p>
<pre>The XKEYBOARD keymap compiler (xkbcomp) reports:
&gt; Error:            Can't find file "unknown" for geometry include
&gt;                   Exiting
&gt;                   Abandoning geometry file "(null)"
Errors from xkbcomp are not fatal to the X server</pre>
      <p>
        Klassifizierung: Meistens harmlos.
        Wie die Nachricht sagt, ist der Fehler nicht fatal. So weit
        bekannt, nutzt X11 auf Mac OS X keine XKB-Erweiterungen. Einige
        Klienten-Programme können aber dennoch versuchen, diese
        Erweiterungen zu verwenden ...
      </p>
<pre>startx: Command not found.</pre>
      <p>
        Klassifizierung: Fatal.
        Dieser Fehler kann auftreten, wenn Initialisierungsdateien nicht so
        aufgesetzt sind, dass das Verzeichnis mit den X11-Programmen, also
        <code>/usr/X11/bin</code> nicht in der Pfad-Variablen PATH
        eingetragen ist. Die Einstellung in Fink is normalerweise so, dass
        dies automatisch der Fall ist. Deshalb ist dieser Fehler ein
        Hinweis darauf, dass die Fink-Umgebung noch nicht richtig
        aufgesetzt ist. Führt man das Kommando
      </p>
<pre>/opt/sw/bin/pathsetup.sh</pre>
      <p>
        in einem Terminalfenster aus und startet ein neues Fenster, ist der
        Fehler meistens behoben.
      </p>
<pre>_XSERVTransSocketUNIXCreateListener: ...SocketCreateListener() failed
_XSERVTransMakeAllCOTSServerListeners: server already running</pre>
<pre>Fatal server error:
Cannot establish any listening sockets - Make sure an X server isn't already
running</pre>
      <p>
        Klassifizierung: Fatal.
        Dieser Fehler tritt auf, wenn zufällig mehrere Instanzen von X11
        zur selben Zeit laufen oder wenn X11 durch einen Absturz nicht
        sauber beendet wurde. Es kann auch an einem Problem mit
        Zugriffsrechten auf Sockets für lokale Verbindungen liegen. Sie
        können versuchen, das Problem mit dem Kommando <code>rm -rf
        /tmp/.X11-unix</code> zu beheben. Ansonsten bleibt noch ein
        Neustart von Mac OS X, bei dem /tmp automatisch aufgeräumt und der
        Netzwerk-Stack zurückgesetzt wird.
      </p>
<pre>Xlib: connection to ":0.0" refused by server
Xlib: Client is not authorized to connect to Server</pre>
      <p>
        Klassifizierung: Fatal.
        Das Klienten-Programm bekommt keine Verbindung mit dem
        Display-Server (X11 oder XQuartz), weil die Daten für die
        Authentifizierung nicht stimmen. Dies wird durch einige
        Installationen von VNC verursacht, indem sie X11-basierte Programme
        mittels <code>sudo</code> laufen lassen oder auch durch sonstige
        schräge Einstellungen. Normalerweise lässt sich dieser Fehler
        dadurch beheben, im Homeverzeichnis die Datei
        <code>.Xauthority</code> zu löschen (in ihr werden die
        Daten für die Authentifizierung abgespeichert) und eine neue,
        leere Datei zu erzeugen:
      </p>
<pre>cd
rm .Xauthority
touch .Xauthority</pre>
      <p></p>
      <p><b>Kein offensichtlicher Fehler:</b></p>
      <p>
        Klassifizierung: Fatal.
        Der wohl häufigste Fehler beim Start von X11 ist eine fehlerhafte
        Start-Datei. Typischerweise ist eine Fensterverwaltung aus
        <code>$HOME/.xinitrc</code> oder
        <code>$HOME/.xinitrc.d</code> nicht installiert, nicht im
        PATH, läuft im Hintergrund statt im Vordergrund, weil ein '&amp;'
        am Ende der Zeile steht. Wie auch immer läuft <code>xinit</code>
        bis zum Ende der Datei und interpretiert dies als Ende der
        Nutzer-Session und beendet X11. Wird eine Programm nicht gefunden,
        gibt es dazu eine Fehlermeldung im Terminalfenster oder dem
        Konsolen-Log. Hat aber die letzte Datei ein '&amp;', gibt es keine
        Fehlermeldung, sondern X11 hört einfach auf. In den Abschnitten
        <a href="run-xfree86.php?phpLang=de#xinitrc-d">.xinitrc.d</a>
        und <a href="run-xfree86.php?phpLang=de#xinitrc">Die Datei
        .xinitrc</a> stehen weitere Details dazu.
      </p>
      <p>
        Wollen sie das verhindern, vergessen sie nicht in der Start-Datei
        die Pfad-Variable PATH mit folgendem Kommando zu setzen:
      </p>
<pre>. /opt/sw/bin/init.sh</pre>
      <p>
        Außerdem sollte die Start-Datei mit einem langlebigen Programm
        enden, das nicht im Hintergrund läuft, z. B. einer Fenster- oder
        Sessionverwaltung ohne '&amp;'. Zur Sicherheit kann man auch ein
        <code>exec xterm</code> als Rückfalloption hinzu fügen, falls die
        Fensterverwaltung nicht gefunden wird, weil sie sie z. B. selbst
        entfernt haben.
      </p>
    
    <h2><a name="locale">6.2 "Warning: locale not supported by C library"</a></h2>
      
      <p>
        Diese Warnungen sind recht häufig, aber harmlos. Sie bedeuten
        genau das, was sie sagen - Internationalisierung wird nicht durch
        Standard C-Bibliotheken unterstützt und das Programm wird die
        normalen englischen Text, Datumsformate und so weiter benutzen. Es
        gibt mehrere Möglichkeiten damit umzugehen:
      </p>
      <ul>
        <li><p>Ignorieren sie einfach die Meldung.</p></li>
        <li>
          <p>
            Verhindern sie die Meldungen in dem sie die
            Environment-Variable LANG löschen. Beachten sie, dass dies
            auch die Internationalisierung in Programmen ausschaltet, die
            sie über gettext/libintl unterstützen. Ein Beispiel für
            .xinitrc:
          </p>
<pre>unset LANG</pre>
          <p>Ein Beispiel für .cshrc:</p>
<pre>unsetenv LANG</pre>
        </li>
        <li>
          <p>
            Bitten sie Apple, dass sie eine zukünftige Version von Mac OS
            X um eine ordentliche Unterstützung von locale ergänzen.
          </p>
        </li>
      </ul>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="tips.php?phpLang=de">7. Tipps für die Benutzung</a></p>
<?php include_once "../../footer.inc"; ?>


