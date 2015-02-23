<?php
$title = "Running X11 - Einführung";
$cvs_author = 'Author: KMS';
$cvs_date = 'Date: 2013/01/03 18:17:34';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Running X11 Contents"><link rel="next" href="history.php?phpLang=de" title="Geschichte"><link rel="prev" href="index.php?phpLang=de" title="Running X11 Contents">';


include_once "header.de.inc";
?>
<h1>Running X11 - 1. Einführung</h1>
    
    
    <h2><a name="def-x11">1.1 Was ist X11?</a></h2>
      
      <p>
        Das <a href="http://www.x.org/">X Window System</a> Version 11
        oder kurz X11 ist ein System für die grafische Darstellung mit
        einer netzwerktauglichen Klienten-Server-Architektur. Mit X11
        können Programme einzelne Pixel, Linien, Texte, Bilder usw. auf
        einem Bildschirm darstellen. X11 enthält darüber hinaus auch
        Bibliotheken, um Elemente von Nutzerschnittstellen, wie
        Schaltknöpfe, Textfelder, usw. darzustellen.
      </p>
      <p>
        X11 ist quasi das Standard-Grafiksystem in der Unixwelt. Es ist
        bei Linux, den *BSDs und den meisten kommerziellen Unix-Varianten
        dabei. Auch die Desktopumgebungen wie CDE, KDE und Gnome bauen auf
        X11 auf.
      </p>
    
    <h2><a name="def-macosx">1.2 Was ist Mac OS X?</a></h2>
      
      <p>
        <a href="http://www.apple.com/macosx/">Mac OS X</a> ist ein
        Betriebsystem von <a href="http://www.apple.com/">Apple</a>.
        Wie sein Vorläufer (NeXTStep und OpenStep) basiert es auf BSD und
        ist damit auch eine Unix-Variante. Allerdings hat es sein eigenes
        System für die grafische Darstellung, namens Quartz. Sein
        Aussehen und Verhalten wird als Aqua bezeichnet, wobei die beiden
        Namen oft wechselseitig verwendet werden.
      </p>
    
    <h2><a name="def-darwin">1.3 Was ist Darwin?</a></h2>
      
      <p>
        <a href="http://opendarwin.org/">Darwin</a> ist die
        "abgespeckte" Version von Mac OS X, kostenlos und mit komplettem
        Quellcode. Quartz, Aqua und noch einge weitere Technologien
        gehören nicht dazu und es hat auch nur die Text-Konsole.
      </p>
    
    <h2><a name="def-xfree86">1.4 Was ist XFree86?</a></h2>
      
      <p>
        <a href="http://www.xfree86.org/">XFree86</a> ist eine
        Open-Source Implementation von X11. Ursprünglich wurde es für
        Intel x86 PCs entwickelt. So erhielt es auch seinen Namen. Jetzt
        läuft es aber auf vielen Architekturen und Betriebsystemen,
        einschließlich OS/2, Darwin, Mac OS X und Windows.
      </p>
      <p>
        Die X11-Distributionen von Apple auf OS 10.2, 10.3 und 10.4 leiten
        sich von XFree86 ab.
      </p>
    
    <h2><a name="def-xorg">1.5 Was ist X.org?</a></h2>
      
      <p>
        <a href="http://www.x.org/wiki/">X.org</a> ist eine
        Open-Source Implementation von X11 und der Nachfolger von XFree86
        und hat es auch fast überall ersetzt.
      </p>
      <p>
        Die X11-Distributionen von Apple auf OS 10.5 und 10.6 leiten sich
        von X.org ab, ebenso <a href="http://xquartz.macosforge.org/trac/wiki">XQuartz</a>. Die
        X11-Distributionen von Apple auf OS 10.7 leitet sich wiederum von
        XQuartz ab.
      </p>
    
    <h2><a name="def-xquartx">1.6 Was ist XQuartz?</a></h2>
      
      <p>
        <a href="http://xquartz.macosforge.org/trac/wiki">XQuartz</a>
        ist eine X11-Distributionen für OS 10.5 und neuer, das einige
        Features mehr enthält, als das normale X11 auf 10.5-10.7. Auf
        10.5 ersetzt XQuartz die X11-Distribution des Systems, während auf
        10.6 and 10.7 Xquartz und die X11-Distribution des Systems
        koexistieren, indem sie in verschiedenen Pfaden installiert werden.
        Auf 10.8 <b>ist</b> Xquartz die Standard X11-Distribution.
      </p>
    
    <h2><a name="client-server">1.7 Klient und Server</a></h2>
      
      <p>
        X11 hat eine Klienten-Server-Architektur. Ein zentrales Program
        erledigt das tatäschliche Zeichnen und koordiniert den Zugriff von
        mehreren Programmen - der Server. Ein Programm, das über X11
        zeichnen möchte, verbindet sich mit dem Server und teilt ihm mit,
        was gezeichnet werden soll. Die Programme werden folglich in der
        X11-Umgebung Klienten genannt.
      </p>
      <p>
        Bei X11 können Server und Klienten auf verschiedenen Rechnern
        laufen, wobei es dann häufig zu Missverständnissen kommt. In
        einer Umgebung mit Arbeitsplatzrechner und Serverrechnern läuft
        der X11-Display-Server auf dem Arbeitsplatzrechner und das Programm
        (und damit der Klient) auf dem Serverrechner. Wenn also vom
        "Server" die Rede ist, geht es um den X11-Display-Server und nicht
        um den Serverrechner, der im Schrank versteckt ist.
      </p>
    
    <h2><a name="rootless">1.8 Was bedeutet rootless?</a></h2>
      
      <p>
        Etwas Hintergrund:
        X11 modelliert den Bildschirm als eine Hierarchie von Fenster, die
        sich gegenseitig enthalten. An der Spitze steht ein spezielles
        Fenster von der Größe des Bildschirms und enthält alle anderen
        Fenster. Dieses Fenster enthält den Hintergrund und wird
        Wurzelfenster oder "root window" genannt.
      </p>
      <p>
        Zurück zum Thema:
        Wie jede grafische Umgebung wurde X11 so geschrieben, dass es
        vollständige und ausschließliche Kontrolle über den Bildschirm
        hat. In Mac OS X hat aber bereits Quartz die Kontrolle über den
        Bildschirm. Deshalb müssen einige Vorkehrungen getroffen werden,
        damit die beiden neben einander laufen können.
      </p>
      <p>
        Eine Variante ist, dass sich die beiden abwechseln. Jede Umgebung
        hat vollständige Kontrolle über Bildschirm, aber es ist immer nur
        eine der beiden sichtbar und der Benutzer schaltet zwischen den
        beiden um. Diese Lösung nennt man Vollbild- oder "rooted" Modus,
        weil in diesem Modus X11 ein ganz normales Wurzelfenster ("root
        window") hat, das sich genau wie auf anderen Unix-Systemen
        verhält.
      </p>
      <p>
        Die andere Variante ist eine Fenster-für-Fenster-Mischung der
        beiden Umgebungen. Dadurch muss man nich zwischen den beiden hin
        und her schalten. Damit gibt es auch kein X11 Wurzelfenster, weil
        Quartz bereits den Hintergrund verwaltet. Da es kein sichtbares
        Wurzelfenster gibt, nennt man diesen Modus wurzellos ("rootless").
        Dies ist der komfortabelste Modus, um X11 auf Mac OS X zu benutzen.
      </p>
    
    <h2><a name="wm">1.9 Was ist die Fensterverwaltung?</a></h2>
      
      <p>
        Bei den meisten grafischen Umgebungen bestimmt das System das
        Aussehen der Fenster (Titelzeile, Schaltknöpfe, usw.). X11 ist da
        anders. Bei X11 werden die Fensterrahmen (auch Dekoration genannt)
        von einem separaten Programm erstellt, der Fensterverwaltung. In
        vielerlei Hinsicht ist die Fensterverwaltung auch nur ein weiterer
        Klient. Sie wird genau so gestartet und sendet über die gleichen
        Kanäle Mitteilungen an den X11-Server.
      </p>
      <p>
        Man kann aus einer großen Anzahl von Fensterverwaltungen
        auswählen. <a href="http://www.xwinman.org/">xwinman.org</a>
        ist eine sehr umfassende Liste. Bei den beliebtesten kann man das
        Aussehen über <a href="http://www.themes.org/">themes</a>
        verändern. Bei vielen Fensterverwaltungen gibt es noch
        zusätzlich Funktionen, wie PopUp-Menus im Wurzelfenster, ein Dock
        oder Startknöpfe.
      </p>
      <p>
        Viele Fensterverwaltungen gibt es als Pakete in Fink. Die folgende
        Seite zeigt die <a href="http://pdb.finkproject.org/pdb/browse.php?sec=x11-wm">aktuelle
        Liste</a>.
      </p>
    
    <h2><a name="desktop">1.10 Was sind Quartz/Aqua, Gnome und KDE?</a></h2>
      
      <p>
        Alle sind Schreibtischumgebungen und es gibt noch viele andere.
        Sie stellen den Programmen Frameworks zur Verfügung, so dass ihr
        Aussehen, ihre Bedienung und Verhalten visuell konsistent ist.
        Ein Beispiel:
      </p>
      <p>Grafiksystem: X11</p>
      <p>Fensterverwaltung: <a href="http://sawmill.sourceforge.net/">sawfish</a></p>
      <p>Schreibtischumgebung: <a href="http://www.gnome.org/">Gnome</a></p>
      <p>
        Die Grenze zwischen Grafiksystem, Fensterverwaltung und
        Schreibtisch sind fließend, weil die gleichen oder zumindest
        ähnliche Funktionen in dem einem oder anderen oder sogar in
        mehreren realisiert sein kann. Deshalb kann es durchaus sein,
        dass eine Fensterverwaltung nicht zusammen mit einer bestimmten
        Schreibtischumgebung benutzt werden kann.
      </p>
      <p>
        Viele Programme sind für eine bestimmte Schreitischumgebung
        geschrieben. Meistens reicht es deshalb aus, die Bibliotheken
        für die Schreibtischumgebung zu installieren. Das Programm
        funktioniert dann mit keinen oder nur geringen Einschränkungen.
        Ein Beispiel ist die zunehmende <a href="http://pdb.finkproject.org/pdb/section.php/gnome">Auswahl an
        GNOME-Programmen</a>, die auch ohne die Schreibtischumgebung
        GNOME verwendet werden können. Unglücklicherweise ist man bei
        den <a href="http://www.kde.org/">KDE-Programmen</a> noch
        nicht <a href="/faq/usage-fink.php#kde">ganz so weit</a>.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="history.php?phpLang=de">2. Geschichte</a></p>
<?php include_once "../../footer.inc"; ?>


