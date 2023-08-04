<?php
$title = "Running X11 - Tipps";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Running X11 Contents"><link rel="prev" href="trouble.php?phpLang=de" title="Probleme mit XFree86 beheben">';


include_once "header.de.inc";
?>
<h1>Running X11 - 7. Tipps für die Benutzung</h1>
    
    
    <h2><a name="menu-items">7.1 X11-Programme aus dem Menu "Programme" starten</a></h2>
      
      <p>
        Programme, die andere Fink-Programme für Teilaufgaben aufrufen,
        brauchen eine Ergänzung, wenn man sie aus dem Menu "Programme"
        starten möchte. Anstatt den ganzen Pfad zu der Datei anzugeben,
        also
      </p>
<pre>/opt/sw/bin/emacs</pre>
      <p>sollte man z. B. bei bash besser folgendes eintragen:</p>
<pre>. /opt/sw/bin/init.sh ; emacs</pre>
      <p>und bei tcsh:</p>
<pre>source /opt/sw/bin/init.csh ; emacs</pre>
      <p>
        Damit ist sicher gestellt, dass das Programm die korrekte
        PATH-Information hat. Diese Syntax kann man für jedes Programm
        verwenden, das mit Fink installiert wurde.
      </p>
      <p>
        <b>Beachte:</b> Anscheinend kann man doch nicht alle Programme so
        starten.
      </p>
    
    <h2><a name="terminal-app">7.2 X11-Programme aus Terminal.app starten</a></h2>
      
      <p>
        Der Start von X11-Programmen aus einem Fenster der Terminal(.app)
        (oder jedem anderen nicht-X11-Terminal) erfolgt bei den aktuellen
        Version von X11 ab 10.5 direkt. Geben sie den Namen des Programms
        genau so ein, wie für ein Kommandozeilenprogramm und OS X wird
        fall nötig X11 starten und dann ihre Programm.
      </p>
      <p>
        <b>Wichtig:</b> Vor OS X 10.5 musste man die Environment-Variable
        <code>DISPLAY</code> in der Terminalsession setzen, damit sie mit
        X11 Verbindung aufnimmt. Tun sie das <b>auf keinen Fall</b> auf
        OS X 10.5 und neuer, denn OS X setzt dies automatisch auf den
        richtigen Wert.
      </p>
    
    <h2><a name="open">7.3 Aqua-Programme aus xterm starten</a></h2>
      
      <p>
        Wollen sie Aqua-Programme aus <code>xterm</code> oder jeder anderen
        Shell starten, geben sie das Kommando <code>open</code> ein.
        Einige Beispiele:
      </p>
<pre>open /Applications/TextEdit.app
open SomeDocument.rtf
open -a /Applications/TextEdit.app index.html</pre>
      <p>
        Das zweite Beispiel öffnet das Dokument mit dem Programm, das mit
        ihm assoziiert ist; im dritten Beispiel wird das Programm explizit
        angegeben.
      </p>
      <p>
        Das Kommando <code>launch</code> aus dem Fink-Paket <b>launch</b>
        funktioniert genauso, bietet aber noch einige zusätzliche
        Funktionen.
      </p>
    
    <h2><a name="copy-n-paste">7.4 Kopieren und Einfügen</a></h2>
      
      <p>
        Im allgemeinen funktionieren Kopieren und Einfügen zwischen der
        Aqua- und der X11- Umgebung, wenn auch nicht zu 100%. Emacs ist
        dafür bekannt, dass es hinsichtlich der aktuellen Auswahl
        "wählerisch" ist. Aus der Classic-Umgebung funktionieren Kopieren
        und Einfügen nicht.
      </p>
      <p>
        In jedem Fall muss man die jeweiligen Methoden der Umgebung nutzen,
        in der man gerade ist. Will man Text aus Aqua nach X11
        transferieren, drücken sie Command-C in Aqua, bringen das
        Zielfenster ganz nach vorne und drücken den "mittleren" Maustaste,
        d. h. Option-Klick auf einer Maus mit nur einer Taste, für das
        Einfügen (Dazu muss "Emulate three button mouse" in den
        X11-Einstellungen eingeschaltet sein). Will man Text aus X11 nach
        Aqua transferieren, wählen sie den Text in X11 aus und drücken
        sie Command-C für das Kopieren und dann Command-V in Aqua für das
        Einfügen. Je nach Version von OS X und X11, funktioniert auch die
        Kopieren-Funktionen, um eine Auswahl zu kopieren.
      </p>
      <p>
        Das X11-System hat tatsächlich mehrere Clipboards (Eigentlich in
        X11 "cut buffers" genannt) und einige Programme haben etwas
        seltsame Vorstellungen, welche man nehmen soll. Deshalb hat z. B.
        Einfügen in GNU Emacs oder XEmacs nicht funktioniert. Die
        Fensterverwaltung <code>quartz-wm</code> von Apple bügelt einige
        der Synchronisationsprobleme zwischen den Puffern aus. Wollen sie
        eine andere Fensterverwaltung verwenden, können sie die Vorteile
        von <code>quartz-wm</code> auf 10.5-10.7 immer noch ausnutzen, in
        dem sie die Option <code>--only-proxy</code> verwenden:
      </p>
<pre>...
quartz-wm --only proxy &amp;
exec &lt;your window manager here&gt;
</pre>
      <p>
        Beachte: Diese Option wird von <code>quartz-wm</code> ab
        Xquartz-2.7.x nicht mehr unterstützt.
      </p>
      <p>
        Das Programm <code>autocutsel</code> ist veraltet, steht aber auf
        10.5 und 10.6 immer noch zur Verfügung, wenn sie <code>quartz-wm
        --only proxy</code> nicht verwenden wollen. Es synchronisiert
        automatisch zwischen den beiden Ausschneide-Puffern. Wenn sie es
        benutzen wollen, installieren sie das Fink-Paket
        <b>autocutsel</b> und ergänzen sie ihre Datei
        <code>.xinitrc</code> oder seine eigene in
        <code>.xinitrc.d</code> um diese Shellskript:
      </p>
<pre>autocutsel &amp;</pre>
      <p>
        Beachten sie, dass das Programm läuft, <b>bevor</b> die
        Fensterverwaltung gestartet wird und nicht beendet wird, also nicht
        einfach am Ende dazu schreiben. Dort wird es nie ausgeführt.
      </p>
      <p>
        Wenn es Probleme mit Kopieren und Einfügen von Aqua nach X11 und
        anders herum gibt sollten sie es einfach noch einmal probieren.
        Manchmal erfolgt das Kopieren nicht sofort. Klappt das immer noch
        nicht, dann probieren sie es über ein drittes Programm, z. B.
        TextEdit oder Terminal auf der Seite von Aqua und nedit oder xterm
        auf der Seite von X11. Nach allgemeiner Erfahrung gibt es immer
        eine Lösung.
      </p>
    
  
<?php include_once "../../footer.inc"; ?>


