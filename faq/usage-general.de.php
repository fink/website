<?php
$title = "F.A.Q. - Benutzung (1)";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2015/06/06 19:19:29';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="usage-packages.php?phpLang=de" title="Benutzung von Paketen - Bestimmte Pakete"><link rel="prev" href="comp-packages.php?phpLang=de" title="Probleme beim Übersetzen - Bestimmte Pakete">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 8. Benutzung von Paketen - Allgemein</h1>
    
    
    
    <a name="xlocale">
      <div class="question"><p><b><?php echo FINK_Q ; ?>8.1: Ich erhalte viele Meldungen der Art "locale not supported by C
          library". Ist das schlimm?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Es ist nicht weiter schlimm. Es bedeutet lediglich, dass das Programm
          die voreingestellten englischen Meldungen, Datumsformate usw. benutzen
          wird. Ansonsten wird das Program ganz normal funktionieren. Die Seite
          <a href="/doc/x11/trouble.php#locale">Probleme beheben</a>
          hat weitere Details.</p></div>
    </a>
    <a name="passwd">
      <div class="question"><p><b><?php echo FINK_Q ; ?>8.2: Plötzlich gibt es eine ganze Reihe von seltsamen Nutzern auf meinem
          System. Die Namen sind "mysql", "pgsql" und "games". Wo kommen die
          denn her?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Sie haben mit Fink ein Paket installiert, das von einem anderen Paket
          abhängt, das passwd heisst. Diese Paket installiert aus
          Sicherheitsgründen eine Reihe von extra Nutzern auf ihrem System. Auf
          allen Unix-Systemen gehören Dateien und Prozessen bestimmten
          "Eigentümern", wodurch System-Administratoren Feinabstimmungen über
          Zugriffsrechte und damit der Systemsicherheit vornehmen können.
          Programme wie apache und mysql benötigen einen Eigentümer und eine
          Zuordnung dieser Daemons zu root ist unsicher. Stellen sie sich doch
          nur vor, dass apache kompromittiert wurde und als root auch noch auf
          alle Dateien ihres Systems zugreifen kann. Für diesen Zweck gibt es
          das Paket passwd, mit dem diese extra Nutzer eingerichtet werden, die
          von bestimmten Fink-Paketen benötigt werden.</p><p>Es sieht zunächst alarmierend aus, wenn plötzlich eine Reihe
          unerwarteter Nutzer in den Systemeinstellungen -&gt; Nutzer auftauchen.
          Aus folgenden Gründen auf keinen Fall die Nutzer löschen:</p><ul>
          <li>Offensichtlich haben sie ein Paket installiert, das die Nutzer
            benötigt. Diese Nutzer zu löschen wird wohl nicht sinnvoll sein,
            oder?</li>
          <li>Es gibt sowieso einige extra Nutzer im System, von denen sie
            bisher vermutlich nichts mitbekommen haben: www, daemon und nobody
            sind nur einige davon. Ihre Anwesenheit ist Konvention auf jedem
            Unix-System. Das Paket passwd fügt einige hinzu, die von Apple nicht
            zur Verfügung gestellt werden. Sie können sich die Nutzer mit dem
            Tool NetInfo Manager.app oder mit dem Kommando
            <code>niutil -list . /users</code> ansehen.</li>
          <li>Sollten sie diese Nutzer entgegen unserem Rat doch löschen wollen,
            dann seien sie extrem vorsichtig. Löscht man sie über die
            Systemeinstellungen, dann werden die Dateien und Ordner, die bisher
            diesen Nutzern zugeordnet waren, einem zufälligen Administrator
            zugeordnet. Dabei kam es in der Vergangenheit dazu, dass die
            Zugriffsrechte der Administratorkonten so verstellt wurden, dass
            nichts mehr ging. Das ist ein Fehler in den Systemeinstellungen und
            wurde auch als Bugreport an Apple gemeldet. Besser ist es diese
            Nutzer mit dem Programm NetInfo Manager.app oder dem Kommando
            <code>niutil</code> zu löschen. Lesen sie auf jeden Fall die
            man-Pages für <code>niutil</code> und machen sie sich über NetInfo
            kundig.</li>
        </ul><p>Fink fragt <b>ausdrücklich</b> während der Installation des Pakets
          passwd um ihre Erlaubnis, diese Nutzer einzurichten. So sehr sollten
          sie also nicht über die Präsenz dieser Nutzer überrascht sein.</p></div>
    </a>
    <a name="compile-myself">
      <div class="question"><p><b><?php echo FINK_Q ; ?>8.3: Wie übersetze ich ein Program selbst, das Pakete aus Fink benutzt?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wenn sie etwas selbst außerhalb von Fink übersetzen wollen, müssen
          dem Compiler und dem Linker mitgeteilt werden, wo die von Fink
          installierten Header-Dateien und Bibliotheken sind. Man muss dem
          Compiler die erforderliche Architektur mitteilen. Wird ein Programm
          mit dem üblichen configure/make Prozess erzeugt, muss man folgende
          Umgebungsvariablen setzen:</p><p>-bash-</p><pre>export CFLAGS=-I/sw/include
export LDFLAGS=-L/sw/lib 
export CXXFLAGS=$CFLAGS 
export CPPFLAGS=$CXXFLAGS 
export ACLOCAL_FLAGS="-I /sw/share/aclocal"
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"
export PATH=/sw/var/lib/fink/path-prefix-10.6:$PATH
export MACOSX_DEPLOYMENT_TARGET=10.5</pre><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
setenv LDFLAGS -L/sw/lib 
setenv CXXFLAGS $CFLAGS 
setenv CPPFLAGS $CXXFLAGS 
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal"
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"
setenv PATH /sw/var/lib/fink/path-prefix-10.6:$PATH
setenv MACOSX_DEPLOYMENT_TARGET 10.5</pre><p>(Dies gilt für Systeme ab 10.5)</p><p>Es ist oft am einfachsten, die Umgebungsvariablen in den
          Startup-Dateien (also <code>.cshrc</code> oder
          <code>.profile</code>) einzutragen, so dass sie automatisch
          gesetzt werden. Verwendet ein Paket diese Variablen nicht, dann müssen
          sie die Optionen "-I/sw/include" (für Header-Dateien) und
          "-L/sw/lib" (für Bibliotheken) selbst in die Kommandos für das
          Übersetzen hinzufügen. Einige Pakete nutzen extra Variablen
          außerhalb des üblichen, wie die configure-Optionen EXTRA_CFLAGS oder
          --with-qt-dir=. "./configure --help" erzeugt normalerweise eine Liste
          der extra Optionen eines Pakets.</p><p>Oft muss man auch die Entwicklungspakete mit den Header-Dateien für
          das Bibliothekspaket installieren, das sie benutzen, z. B. das Paket
          <b>foo-1.0-1-dev</b> für das Bibliothekspaket
          <b>foo-1.0-1-shlibs</b>.</p></div>
    </a>
    <a name="apple-x11-applications-menu">
      <div class="question"><p><b><?php echo FINK_Q ; ?>8.4: Ich kann keines der Programme, die ich in Fink installiert habe, über
          das Programme-Menu (Applications) in Apples X11 starten.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Apples X11 protokolliert die Änderungen in der Fink-Umgebung nicht
          mit. Dies bedeutet, dass the Pfad im Programme-Menu nicht so gesetzt
          ist, dass Fink-Programme gefunden werden. Die Lösung ist dem Namen des
          Fink-Programms ein</p><pre>source /sw/bin/init.sh ;</pre><p>voran zu stellen. Wenn sie z. B. das mit fink installierte Gimp
          starten wollen, schreiben sie in den Eintrag für Gimp:</p><pre>source /sw/bin/init.sh ; gimp</pre><p>Sie können auch die Datei .xinitrc (in ihrem Nutzer-Verzeichnis)
          editieren und folgendes nach der ersten Zeile hinzufügen:</p><pre>source /sw/bin/init.sh</pre></div>
    </a>
    <a name="x-options">
      <div class="question"><p><b><?php echo FINK_Q ; ?>8.5: Ich durch die vielen Optionen für X11 (Apple X11, XFree86,
          etc. )verwirrt. Welche soll ich installieren?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Alle Optionen sind Variaten von XFree86, denn sie sind alle von
          XFree86-Code abgeleitet, wenn auch mit kleinen Unterschieden. Die
          Optionen sind für Panther und Jaguar unterschiedlich.</p><p>Unter Panther hat man die Wahl zwischen:</p><ul>
          <li>
            <p>Apples X11 (auf der dritten Disk), aber vergessen sie nicht, auch
              noch die X11 SDK zu installieren, die auf der XCode Disk ist,
              wenn sie auch Programme übersetzen wollen oder wenn sie vorhaben,
              andere Fink-Pakete aus den Quellen zu übersetzen, die ebenso von
              X11 abhängen.</p>
          </li>
          <li>
            <p>4.4.x erstellt mit Fink: Installieren sie die Pakete
              <code>xfree86</code> und <code>xfree86-shlibs</code>.</p>
          </li>
          <li>
            <p>X.org erstellt mit Fink: Installieren sie die Pakete
              <code>xorg</code> und <code>xorg-shlibs</code>.</p>
          </li>
        </ul><p>Unter Jaguar sind folgende Optionen beliebt und damit auch einige
          der Fink-Pakete:
        </p><ul>
          <li>
            <p>4.2.x erstellt mit Fink: Installieren sie die Pakete
              <code>xfree86-base</code> und <code>xfree86-rootless</code> oder
              <code>xfree86-base-threaded</code> und
              <code>xfree86-rootless-threaded</code> und die entsprechenden
              <code>-shlibs</code>-Pakete.</p>
          </li>
          <li>
            <p>4.3.x erstellt mit Fink: Installieren sie die Pakete
              <code>xfree86</code> und <code>xfree86-shlibs</code>.</p>
          </li>
          <li>
            <p>4.2.x von Apple (unter der Annahme, dass sie User- und SDK-Pakete
              installiert haben): Das Paket <code>system-xfree86</code> wird für
              die aktuelle Version von Fink automatisch erzeugt; installieren
              sie das Paket <b>nicht</b>. (Bemerkung: Die öffentliche
              Beta-Version von Apples X11 für Jaguar ist nicht mehr verfügbar,
              d. h., dass diese Option nur gegeben ist, wenn sie Apples X11
              installiert haben, als es noch zur Verfügung stand.)</p>
          </li>
        </ul><p>Es gibt noch anderen Optionen. Lesen sie die ausführlichere
          Dolkumentation in
          <a href="/doc/x11/index.php">Nutzung von X11</a>
          .</p></div>
    </a>
    <a name="no-display">
      <div class="question"><p><b><?php echo FINK_Q ; ?>8.6: Wenn ich versuche, ein Programm zu starten, erhalte ich die
          Fehlermeldung: "cannot open display:". Was mucss ich tun?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die Fehlermeldung bedeutet, dass ihr System keine Verbindung zu ihrem
          X-Bildschirm aufbaut. Gehen sie wie folgt vor::</p><p>1. Starten sie X (Apples X11, XFree86, ...).</p><p>2. Überprüfen sie, dass die Umgebungsvariable DISPLAY korrekt gesetzt
          ist. Mit den üblichen Einstellungen können sie das so machen:</p><pre>setenv DISPLAY :0</pre><p>wenn sie die Shell <code>tcsh</code> benutzen oder</p><pre>export DISPLAY=:0</pre><p>wenn sie die Shell <code>bash</code>benutzen.</p></div>
    </a>
    <a name="suggest-package">
      <div class="question"><p><b><?php echo FINK_Q ; ?>8.7: Ich finde mein Lieblingsprogramm nicht in Fink. Wie kann ich ein
          neues Programm für Fink vorschlagen?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Tragen sie ihren Wunsch auf Webseiten von Fink im
          <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package Request Tracker</a>
          ein.</p><p>Anmerkung: Dazu benötigen sie ein Konto bei SourceForge.</p></div>
    </a>
    <a name="virtpackage">
      
      <div class="question"><p><b><?php echo FINK_Q ; ?>8.8: Was bedeuten all diese virtuellen Pakete <code>system-*</code>,
          die zwar immer mal wieder auftauchen, die ich aber selbst nicht
          installieren oder löschen kann?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Pakete mit Namen wie <code>system-perl</code> sind reine Platzhalter.
          Sie enthalten keine tatsächlichen Dateien, sondern dienen nur als ein
          Mechanismus, um Fink Informationen über Programme zur Verfügung zu
          stellen, die manuell und außerhalb von Fink installiert wurden.</p><p>Beginnend mit OS X 10.3 sind die meisten Platzhalter-Pakete keine
          echten Pakete, sondern virtuelle, in denen Datenstrukturen über Pakete
          aus einer bestehenden Liste von Fink selbst gespeichert werden. Für
          jedes virtuelle Paket überprüft Fink die Präsenz bestimmter Dateien an
          bestimmten Plätzen und wenn sie gefunden werden, bekommt das virtuelle
          Paket den Status "installiert".</p><p>Mit dem Programm <code>fink-virtual-pkgs</code> aus dem Paket fink
          bekommen sie eine Liste der Programme, von denen Fink davon ausgeht,
          dass sie installiert sind. Mit der Option <code>--debug</code>
          erhalten sie die zusätzlich Information, welche Dateien überprüft hat,
          um den Status eines Pakets fest zu stellen.</p><p>Unglücklichweise ist es nicht vorgesehen, dass sie ein beliebiges
          Programm selbst installieren und fink dann feststellt, dass das
          Programm bereits installiert ist und die eigene Version nicht
          installiert. Es ist einfach viel zu kompliziert, für den allgemeinen
          Fall die configure- und compiler-Optionen, Pfadnamen und so weiter
          festzustellen oder zu überprüfen.</p><p>Es folgt die Liste der wichtigsten, virtuellen Pakete die Fink
          definiert (ab fink-0.19.2):</p><ul>
          <li>system-perl: [virtual package representing perl]
            <p>Steht für <code>/usr/bin/perl</code>. Es ist Teil der
              normalen OS X Installation. Zu diesem Paket gehören auch
              <code>system-perlXXX</code> und <code>perlXXX-core</code>, je nach
              Version X.X.X des Perl-Iinterpreters.</p>
          </li>
          <li>system-javaXXX: [virtual package representing Java X.X.X]
            <p>Steht für die Java Runtime Environment, die Teil von OS X
              (und auch in Apples Software-Aktualisierung) ist. Weitere
              Informationen stehen auf
              <a href="http://www.apple.com/java">Apples Java-Seite</a>
              .</p>
          </li>
          <li>system-javaXXX-dev: [virtual package representing Java X.X.X
            development headers]
            <p>Steht für die Java SDK, die man manuell von der Seite
              <a href="http://connect.apple.com">connect.apple.com</a>
              herunter laden (man muss sich registrieren, wenn auch kostenlos)
              und installieren muss. Haben sie ihr Java Runtime Environment
              nicht aktualisiert, wird ihr SDK möglicherweise nicht automatisch
              aktualisiert (und vielleicht sogar gelöscht!). Denken sie daran,
              dass sie die SDK überprüfen, wenn sie die Runtime Environment
              installiert oder aktualisiert haben. Je nachdem müssen sie die SDK
              herunter laden und installieren. Schauen sie sich auch das Kapitel
              <a href="comp-general.php?phpLang=de#system-java"> in dieser FAQ
              an</a>.</p>
          </li>
          <li>system-java3d: [virtual package representing Java3D]</li>
          <li>system-javaai: [virtual package representing Java Advanced Imaging]
            <p>Steht für die Java extensions für 3D-Grafik und Bildbearbeitung,
              die man manuell von Apple herunter laden und installieren muss.
              Weitere Informationen erhalten sie auf
              <a href="http://docs.info.apple.com/article.html?artnum=120289">Apples Web-Seite</a>
              .</p>
          </li>
          <li>system-xfree86: [placeholder for user installed x11]</li>
          <li>system-xfree86-shlibs: [placeholder for user installed x11 shared
            libraries]
            <p>Steht für Apples X11/XDarwin, ein optionaler Teil von OS X
              (X11User.pkg). Es liefert die virtuellen Pakete <code>x11</code>
              und <code>x11-shlibs</code>. Lesen sie dazu auch dieses Kapitel
              <a href="comp-packages.php?phpLang=de#cant-install-xfree">in
              dieser FAQ</a> durch.</p>
          </li>
          <li>system-xfree86-dev [placeholder for user installed x11 development
            tools]
            <p>Steht für Apples X11/XDarwin SDK, ein optionaler Teil von OS X
              (X11SDK.pkg). Es liefert das virtuelle Paket <code>x11-dev</code>.
              Lesen sie dazu auch dieses Kapitel<a href="comp-packages.php?phpLang=de#cant-install-xfree">in dieser FAQ</a> durch.</p>
          </li>
        </ul></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-packages.php?phpLang=de">9. Benutzung von Paketen - Bestimmte Pakete</a></p>
<?php include_once "../footer.inc"; ?>


