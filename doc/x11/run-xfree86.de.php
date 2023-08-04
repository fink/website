<?php
$title = "Running X11 - X11 starten";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/23 16:32:58';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Running X11 Contents"><link rel="next" href="other.php?phpLang=de" title="Andere Möglichkeiten mit X11 "><link rel="prev" href="inst-xfree86.php?phpLang=de" title="X11 beziehen und installieren">';


include_once "header.de.inc";
?>
<h1>Running X11 - 4. X11 starten</h1>
    
    
    <h2><a name="display-server">4.1 Den Display-Server starten</a></h2>
      
      <p>X11 kann unter Mac OS X auf drei Arten gestartet werden.</p>
      <p>
        Die erste Art ist die X11-Applikation zu starten, d. h. ein
        Doppelklick auf das Programm im Finder. Unter 10.5-10.7 ist das
        typischerweise
        <code>/Applications/Utilities/X11(.app)</code>, oder
        <code>/Applications/Utilities/XQuartz(.app)</code>, wenn
        man Xquartz benutzt (also unter 10.8).
      </p>
      <p>
        Die zweite Art ist die Eingabe des Kommandos <code>startx</code> in
        einem Terminalfenster.
      </p>
      <p>
        Die dritte Art ist, einfach ein Programm in einem Terminalfenster
        zu starten, das X11 benötigt. Ab 10.5 startet dies automatisch
        einen X11-Server.
      </p>
    
    <h2><a name="xinitrc-d">4.2 Modifikationen des Starts über das .xinitrc.d Verzeichnis</a></h2>
      
      <p>
        Für derzeitige Versionen von X11 ist die bevorzugte Methode seinen
        Start zu modifizieren, ein Verzeichnis
        <code>.xinitrc.d</code> im $HOME Verzeichnis anzulegen und
        mit ausführbaren Skripten zu füllen, die die Programme starten,
        die man beim Start haben möchte, einschließlich
        Fensterverwaltungen.
      </p>
      <p>
        <b>Wichtig:</b> Hinter Programmen, die keine Fensterverwaltungen
        sind, muss ein '&amp;'stehen. Andernfalls blockieren sie die
        Ausführung anderer Programme, auch Fensterverwaltungen.
        Fensterverwaltungen dürfen <b>kein</b> '&amp;' hinter ihrem
        Namen haben, ansonsten bleiben sie nicht laufen, außer es gibt
        eine Sessionverwaltung, die nach ihr startet. Das Programm
        <code>xinit</code> interpretiert diese Situation so, dass
        nach dem Ende der Session auch der X-Server beendet werden soll.
      </p>
      <p>
        Beispiel: Soll die Fensterverwaltung
        <code>WindowMaker</code> mit dem Start des X11-Server
        starten, geben sie folgende Komanndos ein:
      </p>
<pre>mkdir -p $HOME/.xinitrc.d
nano $HOME/.xinitrc.d/94-wmaker.sh</pre>
      <p>
        Sie können auch ihren Lieblingseditor statt nano verwenden.
        Tragen sie folgenden Inhalt in <code>94-wmaker.sh</code>
        ein:
      </p>
<pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
exec wmaker
</pre>
      <p>Speichern sie die Datei und führen sie folgendes Kommando aus:</p>
<pre>chmod a+x 94-wmaker.sh</pre>
      <p>
        Damit wird das Skript ausführbar. (<code>quartz-wm
        --only-proxy</code> wird in einem späteren Abschnitt diskutiert).
      </p>
      <p>
        Beispiel: Soll das Programm <code>xlogo</code> mit dem
        Start des X11-Server starten, geben sie folgende Komanndos ein:
      </p>
<pre>mkdir -p $HOME/.xinitrc.d
nano $HOME/.xinitrc.d/74-xlogo.sh</pre>
      <p>
        (wie oben: wenn sie wollen, nehmen sie ihren Lieblingseditor).
        Tragen sie folgenden Inhalt in <code>74-xlogo.sh</code>
        ein:
      </p>
<pre>. /sw/bin/init.sh
xlogo &amp;</pre>
      <p>Speichern sie die Datei und führen sie folgendes Kommando aus:</p>
<pre>chmod a+x 74-xlogo.sh</pre>
      <p>Damit wird das Skript ausführbar.</p>
      <p>
        Erstellen sie die beiden Skripts, resultiert daraus, dass beim
        Start von X11 das Programm <code>xlogo</code> ausgeführt
        wird und dann die Fensterverwaltung<code>wmaker</code>.
      </p>
      <p>
        Beispiel: Vollständige GNOME-Session. Erzeugen sie die
        ausführbare Datei <code>94-gnome-session.sh</code> mit
        folgendem Inhalt:
      </p>
<pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-session</pre>
      <p>
        Beispiel: "rootless" GNOME-Session. Erzeugen sie die ausführbare
        Datei <code>94-gnome-panel.sh</code> mit folgendem Inhalt:
      </p>
<pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-panel</pre>
      <p>
        Beispiel: KDE3. Erzeugen sie die ausführbare Datei
        <code>94-startkde.sh</code> mit folgendem Inhalt:
      </p>
<pre>. /sw/bin/init.sh
exec startkde</pre>
      <p>
        (startkde startet automatisch eine Fensterverwaltung und nutzt
        <code>quartz-wm --only-proxy</code>)
      </p>
      <p>
        Beispiel: KDE4. Erzeugen sie die ausführbare Datei
        <code>94-startkde.sh</code> mit folgendem Inhalt:
      </p>
<pre>. /sw/bin/init.sh
exec /sw/opt/kde4/x11/bin/startkde</pre>
      <p><b>Beachte:</b></p>
      <ul>
        <li>
          Beginnen sie jedes Skript mit <code>. /sw/bin/init.sh</code>.
          Damit wird sicher gestellt, dass auch Programme aus dem Fink-Baum
          gefunden werden.
        </li>
        <li>
          Die Skirpte werden in ASCII Reihenfolge ausgeführt. Benutzen
          sie Prefixes, um die Reihenfolge zu ändern, wie oben mit '74'und
          '94'.
        </li>
        <li>
          Die Skripte müssen ausführbar sein und die Datei-Endung
          <code>.sh</code> haben. Mit einer Änderung der "execute
          permissions" kann man die Ausführung der Skripte und Programme
          steuern, ohne die Skripte zu löschen.
        </li>
        <li>
          Fink's <code>xinitrc</code> Paket, das in den
          Abhängigkeitsketten von GNOME und KDE ist, überschreibt das
          voreingestellte Verhalten von X11, zum Beispiel das für
          Nutzer-Modifikationen. Wir empfehlen, dieses Verhalten wieder
          einzuschalten, wie im Abschnitt über das <a href="#xinitrc-pkg">Fink Paket 'xinitrc'</a> beschrieben.
        </li>
      </ul>
    
    <h2><a name="xinitrc">4.3 Die Datei .xinitrc</a></h2>
      
      <p>
        <b>Notiz:</b> Es ist besser, mit Skripten im Verzeichnis
        <a href="#xinitrc-d">$HOME/.xinitrc.d</a> zu arbeiten.
      </p>
      <p>
        Existiert eine Datei mit dem Namen <code>.xinitrc</code> im
        Heimatverzeichnis, wird sie benutzt, um X-Klienten zu starten, eine
        Fensterverwaltung, einige xterm Terminals oder eine
        Schreibtischumgebung wie GNOME. Die Datei
        <code>.xinitrc</code> ist ein
        <code>/bin/sh</code>-Skript mit den Kommandos dafür. Das
        übliche <code>#!/bin/sh</code> in der ersten Zeile wird nicht
        benötigt; die Datei muss auch nicht ausführbar sein.
        <code>xinit</code> wird die Datei immer mit der Shell
        <code>/bin/sh</code> ausführen.
      </p>
      <p>
        Gibt es keine Datei <code>.xinitrc</code> im
        Heimat-Verzeichnis und auch kein Verzeichnis <a href="#xinitrc-d">$HOME/.xinitrc.d</a>, dann benutzt X11 die
        Voreinstellungen in der Datei
        <code>/usr/X11/lib/X11/xinit/xinitrc</code>. Die
        Voreinstellungen kann man auch gut als Ausgangspunkt für eine
        eigene Datei .xinitrc verwenden: </p>
<pre>cp /usr/X11/lib/X11/xinit/xinitrc ~/.xinitrc</pre>
      <p>
        Damit auch Fink-Programme in <code>.xinitrc</code>
        funktionieren, sollte gleich am Anfang der Datei die Zeile <code>.
        /sw/bin/init.sh</code> stehen, damit die Umgebung korrekt
        aufgesetzt wird.
      </p>
      <p>
        Man kann so ziemlich alles in die Datei
        <code>.xinitrc</code> schreiben, aber einiges sollte man
        dabei doch beachten. Erstens: Die Shell, die die Datei abarbeitet,
        wartet bis bei jedem Programm bis es beendet wird, bevor das
        nächste Programm gestartet wird. Sollen mehrere Programme
        parallel laufen, muss man der Shell mitteilen, sie in den
        Hintergrund zu verschieben, indem man am Ende der Zeile ein
        <code>&amp;</code> anhängt.
      </p>
      <p>
        Zweitens: <code>xinit</code> Wartet bis das Skript in
        <code>.xinitrc</code> beendet ist und inerpretiert diese
        Situation, dass die Session beendet ist und der X-Server jetzt auch
        beendet werden soll. Dies bedeutet, dass das letzte Kommando in
        <code>.xinitrc</code> nicht im Hintergrund ablaufen sollte
        und ein langlebiges Programm sein sollte. Üblicherweise ist es
        die Fensterverwaltung oder die Schreibtischumgebung. Tatsächlich
        gehen die meisten Fensterverwaltungen und Schreibtischumgebungen
        davon aus, dass <code>xinit</code> auf ihr Ende wartet und dies
        für den "Log Out" Eintrag in ihren Menus nutzen. (Notiz: Man kann
        etwas Speicher und CPU-Last zu sparen, wenn man <code>exec</code>
        an den Anfang der letzten Zeile schreibt, so wie in den folgenden
        Beispielen.)
      </p>
      <p>
        Beispiel: Schalte die X11-Klingel aus, starte einige Klienten und
        zum Schluss die Fensterverwaltung "Enlightenment":
      </p>
<pre>. /sw/bin/init.sh

xset b off

xclock -geometry -0+0 &amp;
xterm &amp;
xterm &amp;

exec enlightenment</pre>
      <p>Beispiel: GNOME starten:</p>
<pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-session</pre>
<p>Zum Schluss: KDE3 starten:</p>
<pre>. /sw/bin/init.sh
exec startkde</pre>
    
    <h2><a name="xinitrc-pkg">4.4 Das Fink-Paket 'xinitrc'</a></h2>
      
      <p>
        Manche Fink-Pakete müssen beim Start von X11 einige Aktionen
        ausführen. Dafür gibt es ein Paket namens <code>xinitrc</code>
        (zugegebenermaßen etwas verwirrend). Eine Nebenwirkung bei der
        Installation dieses Pakets, das in der Abhängigkeitskette von
        GNOME und KDE ist, dass die <a href="#xinitrc-d">voreingestellte</a> Ausführung der Skripte
        in <code>$HOME/.xinitrc.d</code>. Es gibt einige Methoden,
        mit denen man den Start von X11 modifizieren kann <b>und</b>
        Fink-Paketen erlauben kann, ihre Start-Aktionen auszuführen:
      </p>
      <ul>
        <li>
          <p>
            Das Paket <code>xinitrc</code> enthält Einsprungspunkte für
            Administratoren. Erzeugen sie die Datei
            <code>/sw/etc/xinitrc-last-hook</code> als
            Administrator mit folgendem Inhalt:
          </p>
<pre>#!/bin/sh
. /usr/X11/lib/X11/xinit/xinitrc.d/98-user.sh</pre>
          <p>
            Damit hat man das <a href="#xinitrc-d">urspüngliche</a> Verhalten, dass im
            Verzeichnis <code>$HOME/.xinitrc.d</code> nach
            ausführbaren Skripten gesucht wird.
          </p>
        </li>
        <li>
          <p>
            Erzeugen sie die Datei <code>$HOME/.xinitrc</code> wie
            im Abschnitt <a href="#xinitrc">.xinitrc</a>
            beschrieben. Finks Paket <code>xinitrc</code> überschreibt
            die Voreinstellung des Systems mit seiner eigenen Version und
            damit nutzt man die Version von Fink.
          </p>
          <p>
            Der richtige Platz für zusätzliche Programme, die sofort
            ausgeführt werden sollen, ist vor folgender Zeile:
          </p>
<pre># start the window manager</pre>
        </li>
      </ul>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="other.php?phpLang=de">5. Andere Möglichkeiten mit X11 </a></p>
<?php include_once "../../footer.inc"; ?>


