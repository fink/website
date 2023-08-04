<?php
$title = "F.A.Q.";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="general.php?phpLang=de" title="Allgemeine Fragen">';


include_once "header.de.inc";
?>
<h1>Die Fink F.A.Q.</h1>
    <p>Die ist eine Liste der häufig gestellten Fragen über Fink. Wie in den
      meisten FAQs wurden einige tatsächlich gestellt, andere wurden ausgedacht.
      Diese Dokumentation wurde in einem ad-hoc, Frage-und-Antwort-Stil
      geschrieben.</p>
    <p>Diese FAQ hat mehrere Seiten, jeweils eine pro Abschnitt. Alle Fragen
      sind im Inhaltsverzeichnis aufgelistet und verlinkt.</p>
  <h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="general.php?phpLang=de"><b>1 Allgemeine Fragen</b></a><ul><li><a href="general.php?phpLang=de#what">1.1 Was ist Fink?</a></li><li><a href="general.php?phpLang=de#naming">1.2 Welche Bedeutung hat der Name Fink?</a></li><li><a href="general.php?phpLang=de#bsd-ports">1.3 Wie unterscheidet sich Fink vom BSD-Port-Mechanismus, einschließlich
          OpenPackages und GNU-Darwin?</a></li><li><a href="general.php?phpLang=de#usr-local">1.4 Warum installiert Fink nichts in /usr/local?</a></li><li><a href="general.php?phpLang=de#why-sw">1.5 Wieso /sw?</a></li></ul></li><li><a href="relations.php?phpLang=de"><b>2 Verbindungen zu anderen Projekten</b></a><ul><li><a href="relations.php?phpLang=de#upstream">2.1 Geben sie ihre Verbesserungen an die originalen Autoren weiter?</a></li><li><a href="relations.php?phpLang=de#debian">2.2 Wie ist ihr Verhältnis zum Projekt Debian? Portieren sie Debian Linux
          nach Mac OS X?</a></li><li><a href="relations.php?phpLang=de#apple">2.3 Wie ist ihr Verhältnis zu Apple?</a></li><li><a href="relations.php?phpLang=de#darwinports">2.4 Wie ist ihr Verhältnis zu Darwinports?</a></li></ul></li><li><a href="mirrors.php?phpLang=de"><b>3 Fink-Spiegelserver</b></a><ul><li><a href="mirrors.php?phpLang=de#when-use">3.1 Was sind Fink-Spiegelserver?</a></li><li><a href="mirrors.php?phpLang=de#why">3.2 Warum sollte ich rsync-Spiegelserver nutzen?</a></li><li><a href="mirrors.php?phpLang=de#where">3.3 Wo finde ich mehr über Fink-Spiegelserver?</a></li><li><a href="mirrors.php?phpLang=de#when-not">3.4 Ich bekomme keine Verbindung zu einem rsync-Spiegelserver. Was soll
          ich tun?</a></li><li><a href="mirrors.php?phpLang=de#otherinfogone">3.5 Nach der Umstellung auf rsync sind alle info-Dateien aus dem
          unbenutzten Baum weg.</a></li><li><a href="mirrors.php?phpLang=de#howswitch">3.6 Wie kann ich zwischen den beiden Methoden hin- und herschalten?</a></li><li><a href="mirrors.php?phpLang=de#Master">3.7 Was ist ein Spiegelserver für Distfiles?</a></li></ul></li><li><a href="upgrade-fink.php?phpLang=de"><b>4 Fink aktualisieren(versions-spezifische Probleme)</b></a><ul><li><a href="upgrade-fink.php?phpLang=de#leopard-bindist1">4.1 Fink erkennt keine neuen Pakete, selbst nach einem selfupdate mit
          rsync oder cvs.</a></li><li><a href="upgrade-fink.php?phpLang=de#leopard-bindist2">4.2 Wenn ich versuche etwas zu installiere, bekommen ich die Meldung
          'Can't resolve dependency "fink (&gt;= 0.28.0)"'</a></li><li><a href="upgrade-fink.php?phpLang=de#stuck-gettext">4.3 Fink verlangt, das Kommando 'sudo apt-get install
          libgettext3-dev=0.14.5-2' auszuführen, um inkonsistente Abhängigkeiten
          aufzulösen, aber alles steckt fest.</a></li><li><a href="upgrade-fink.php?phpLang=de#stuck-dpkg">4.4 Fink meldet 'Can't resolve dependency "dpkg (&gt;= 1.10.21-1229)" für
          das Paket "dpkg-base-files-0.3-1"'. Wie löse ich das Problem?</a></li></ul></li><li><a href="usage-fink.php?phpLang=de"><b>5 Fink installieren, benutzen und pflegen</b></a><ul><li><a href="usage-fink.php?phpLang=de#what-packages">5.1 Wie finde ich heraus, welche Pakete Fink zur Verfügung stellt?</a></li><li><a href="usage-fink.php?phpLang=de#proxy">5.2 Ich befinde mich hinter einer Firewall. Wie konfiguriere ich Fink,
          dass es einen HTTP-Proxy benutzt?</a></li><li><a href="usage-fink.php?phpLang=de#firewalled-cvs">5.3 Wie aktualisiere ich Pakete mit cvs, wenn ich mich hinter einer
          Firewall befinde?</a></li><li><a href="usage-fink.php?phpLang=de#moving">5.4 Kann ich Fink nach der Installation an eine andere Stelle
          verschieben?</a></li><li><a href="usage-fink.php?phpLang=de#moving-symlink">5.5 Funktioniert es, wenn man Fink nach der Installation verschiebt und
          dann einen symbolischen Link von der alten Stelle erzeugt?</a></li><li><a href="usage-fink.php?phpLang=de#removing">5.6 Wie kann ich Fink komplett deinstallieren?</a></li><li><a href="usage-fink.php?phpLang=de#bindist">5.7 Die Paket-Datenbank der Webseite listet das Paket xxx, aber apt-get
          und dselect kennen es nicht. Wer hat recht?</a></li><li><a href="usage-fink.php?phpLang=de#unstable">5.8 Ich möchte ein Paket aus dem "unstable" Baum installieren, aber Fink
          antwortet nur mit 'no package found'. Wie kann ich es installieren?</a></li><li><a href="usage-fink.php?phpLang=de#unstable-onepackage">5.9 Muss man <b>wirklich</b> alles aus dem "unstable" Baum
          installieren, obwohl ich nur ein Paket möchte?</a></li><li><a href="usage-fink.php?phpLang=de#sudo">5.10 Ich bin es leid, wieder und wieder für sudo mein Passwort einzugeben.
          Gibt es dafür eine Lösung?</a></li><li><a href="usage-fink.php?phpLang=de#exec-init-csh">5.11 Wenn ich die Dateien init.csh or init.sh ausführe, bekomme ich die
          Fehlermeldung "Permission denied". Was mache ich falsch?</a></li><li><a href="usage-fink.php?phpLang=de#dselect-access">5.12 Hilfe! Ich habe den Menue-Eintrag "[A]ccess" in dselect ausgewählt
          und jetzt kann ich keine Pakete mehr herunter laden!</a></li><li><a href="usage-fink.php?phpLang=de#cvs-busy">5.13 Führe ich das Kommando <q>fink selfupdate</q> oder
          <q>fink selfupdate-cvs</q> aus, erhalte ich die Fehlermeldung
          "<code>Updating using CVS failed. Check the error messages above.</code>"
        </a></li><li><a href="usage-fink.php?phpLang=de#kernel-panics">5.14 Benutze ich Fink, stürzt der Rechner ab, friert ein oder zeigt
          kernel panics. Hilfe!</a></li><li><a href="usage-fink.php?phpLang=de#not-found">5.15 Ich versuche ein Paket zu installieren, aber Fink kann es nicht
          herunter laden. Die Download-Seite zeigt eine neuere Version des
          Pakets an als die von Fink. Was mache ich jetzt?</a></li><li><a href="usage-fink.php?phpLang=de#fink-not-found">5.16 Führe ich Fink aus oder ein Programm, das ich mit Fink installiert,
          habe, kommt nur die Fehlermeldung "command not found".</a></li><li><a href="usage-fink.php?phpLang=de#invisible-sw">5.17 Ich möchte den Ordner /sw im Finder verstecken, damit Nutzer die
          Fink-Installation nicht so leicht beschädigen können.</a></li><li><a href="usage-fink.php?phpLang=de#install-info-bad">5.18 Ich kann nichts installieren, weil ich immer den folgenden Fehler
          bekomme: "install-info: unrecognized option
          `--infodir=/sw/share/info'"</a></li><li><a href="usage-fink.php?phpLang=de#bad-list-file">5.19 Ich kann nicht installieren oder löschen, weil ein Problem auftritt
          mit dem Text: "files list file".</a></li><li><a href="usage-fink.php?phpLang=de#dselect-garbage">5.20 Wenn ich in <code>dselect</code> Pakete auswähle, bekomme ich
          nur einen Haufen Müll. Wie kann ich es benutzen?</a></li><li><a href="usage-fink.php?phpLang=de#cant-upgrade">5.21 Ich kann anscheinend Finks Version nicht aktualisieren.</a></li><li><a href="usage-fink.php?phpLang=de#spaces-in-directory">5.22 Kann ich Fink in einem Ordner installieren, der ein Leerzeichen in
          seinem Namen hat?</a></li><li><a href="usage-fink.php?phpLang=de#packages-gz">5.23 Wenn ich eine binäre Aktualisierung machen, erhalte ich viele
          Fehlermeldungen mit "File not found" oder "Couldn't stat package
          source list file".</a></li><li><a href="usage-fink.php?phpLang=de#wrong-tree">5.24 Ich habe mein System oder die Developer Tools gewechselt, aber Fink
          erkennt den Wechsel nicht.</a></li><li><a href="usage-fink.php?phpLang=de#lost-command-line-tools">5.25 After installing a macOS update, Fink no longer recognizes my installed Command Line Tools.</a></li><li><a href="usage-fink.php?phpLang=de#seg-fault">5.26 Ich erhalte Fehlermeldungen von <code>gzip</code>,
          <code>dpkg-deb</code> oder anderen Programmen aus dem Paket
          <code>fileutils</code>! Hilfe!</a></li><li><a href="usage-fink.php?phpLang=de#pathsetup-keeps-running">5.27 When I open a Terminal window, I get a message that "Your
        environment seems to be correctly set up for Fink already.", and it
        logs out.</a></li><li><a href="usage-fink.php?phpLang=de#ext-drive">5.28 Ich habe Fink nicht auf der Haupt-Partition installiert und ich kann
          das Paket Fink nicht aus dem Quellen aktualisieren. Die
          Fehlermeldungen enthalten <q>chowname</q>.</a></li><li><a href="usage-fink.php?phpLang=de#mirror-gnu">5.29 Fink weigert sich, meine Pakete zu aktualisieren, weil es den
          'gnu'-Spiegelserver nicht finden kann.</a></li><li><a href="usage-fink.php?phpLang=de#cant-move-fink">5.30 Ich kannn Fink nicht aktualisieren, weil ich /sw/fink nicht aus dem
          Weg räumen kann.</a></li><li><a href="usage-fink.php?phpLang=de#fc-cache">5.31 Ich erhalte diese Fehlermeldung: "No fonts found".</a></li><li><a href="usage-fink.php?phpLang=de#non-admin-installer">5.32 Ich kann Fink nicht mit dem Installerpaket installieren, weil ich den
          Fehler "volume doesn't support symlinks" erhalte.</a></li><li><a href="usage-fink.php?phpLang=de#wrong-arch">5.33 Ich kann Fink nicht aktualisieren. Es bricht mit
          <q>package architecture (darwin-i386) does not match system
          (darwin-powerpc)</q> ab.</a></li></ul></li><li><a href="comp-general.php?phpLang=de"><b>6 Probleme beim Übersetzen - Allgemein</b></a><ul><li><a href="comp-general.php?phpLang=de#compiler">6.1 Ein configure-Skript beklagt sich, dass es keinen "acceptable cc"
          findet. Was bedeutet das?</a></li><li><a href="comp-general.php?phpLang=de#cvs">6.2 Nach dem Kommando "fink selfupdate-cvs" erhalte ich die Nachricht:
          "cvs: Command not found."</a></li><li><a href="comp-general.php?phpLang=de#missing-make">6.3 Ich erhalte Fehlermeldungen mit <code>make</code>
        </a></li><li><a href="comp-general.php?phpLang=de#head">6.4 Das Kommando head erzeugt seltsame Fehlermeldungen. Was ist
          kaputt?</a></li><li><a href="comp-general.php?phpLang=de#also_in">6.5 Wenn ich versuche, ein Paket zu installieren, erhalte ich eine
          Fehlermeldung, dass versucht wird, eine Datei zu überschreiben, die
          zu einem anderen Paket gehört.</a></li><li><a href="comp-general.php?phpLang=de#mv-failed">6.6 Was bedeutet "execution of mv failed, exit code 1", wenn ich
          versuche, ein Paket zu installiere?</a></li><li><a href="comp-general.php?phpLang=de#node-exists">6.7 Ich kann ein Paket nicht installieren oder aktualisieren, weil ich
          die Fehlermeldung erhalte, dass ein "node" bereits existiert.</a></li><li><a href="comp-general.php?phpLang=de#usr-local-libs">6.8 Ich habe gehört, dass Bibliotheken und Header-Dateien, die in
          /usr/local installiert sind, manchmal Probleme machen. Stimmt das?</a></li><li><a href="comp-general.php?phpLang=de#toc-out-of-date">6.9 Wenn ich versuche, ein Paket zu erzeugen, bekomme ich die
          Fehlermeldung, "table of contents" ist veraltet. Was muss ich tun?</a></li><li><a href="comp-general.php?phpLang=de#fc-atlas">6.10 Fink Commander bleibt hängen, wenn ich versuche das Paket atlas zu
          installieren.</a></li><li><a href="comp-general.php?phpLang=de#basic-headers">6.11 Ich erhalte Fehlermeldungen, dass die Dateien
          <code>stddef.h</code>, <code>wchar.h</code>,
          <code>stdlib.h</code> oder <code>crt1.o</code> fehlen
          oder dass der <q>C compiler cannot create executables</q>.</a></li><li><a href="comp-general.php?phpLang=de#multiple-dependencies">6.12 Ich kann nicht aktualisieren, denn Fink meldet "unable to resolve
          version conflict on multiple dependencies".</a></li><li><a href="comp-general.php?phpLang=de#dpkg-parse-error">6.13 Ich kann gar nichts installieren und bekommen nur die Fehlermeldung:
          "dpkg: parse error, in file `/sw/var/lib/dpkg/status'"!</a></li><li><a href="comp-general.php?phpLang=de#freetype-problems">6.14 Ich erhalte einen Fehler mit freetype.</a></li><li><a href="comp-general.php?phpLang=de#dlfcn-from-oo">6.15 Ich bekommen Fehler mit 'Dl_info'.</a></li><li><a href="comp-general.php?phpLang=de#gcc2">6.16 Fink behauptet, dass <code>gcc2</code> oder
          <code>gcc3.1</code> fehlen, es sieht nicht so aus, dass ich
          sie installieren kann.</a></li><li><a href="comp-general.php?phpLang=de#system-java">6.17 Fink beklagt sich mit: <code>Failed: Can't resolve dependency
          "system-java-dev"</code>, aber das Paket gibt es gar nicht.</a></li><li><a href="comp-general.php?phpLang=de#dpkg-split">6.18 Wenn ich ein Paket installieren möchte, bekomme ich
          <q>dpkg (subprocess): failed to exec dpkg-split to see if it's
          part of a multiparter: No such file or directory</q>. Wie behebe
          ich diesen Fehler?</a></li><li><a href="comp-general.php?phpLang=de#xml-parser">6.19 Ich bekommen folgende Fehler-Meldung: <q>configure: error:
          XML::Parser perl module is required for intltool</q>.  Was soll
          ich machen?</a></li><li><a href="comp-general.php?phpLang=de#master-problems">6.20 Wenn ich versuche, ein Paket herunter zu laden, geht Fink auf eine
          merkwürdige Seite mit <q>distfiles</q> im Namen und die Datei
          gibt es dort nicht.</a></li><li><a href="comp-general.php?phpLang=de#compile-options">6.21 Ich möchte, dass Fink andere Optionen beim Erstellen eines Pakets
        verwendet.</a></li><li><a href="comp-general.php?phpLang=de#alternates">6.22 Immer wenn ich Pakete aus Quellen erzeugen möchte, fragt Fink immer
        wieder nach alternativen Versionen der selben Bibliothek.</a></li><li><a href="comp-general.php?phpLang=de#python-mods">6.23 Versuche ich, ein Python-Modul zu erstellen, bekomme ich eine Fehlermeldung mit <code>MACOSX_DEPLOYMENT_TARGET </code>.</a></li><li><a href="comp-general.php?phpLang=de#libtool-unrecognized-dynamic">6.24 Ich bekomme von <code>libtool</code>den Fehler
        <q>unrecognized option `-dynamic'</q>.</a></li><li><a href="comp-general.php?phpLang=de#missing-usr-include-headers">6.25 Ich erhalte eine Fehlermeldung über fehlende Header in
        <code>/usr/include</code></a></li><li><a href="comp-general.php?phpLang=de#pkginfo">6.26 Wenn ich ein Paket mit app-Bundle unter Yosemite aktualisieren
          möchte, erhalte ich Fehler mit einer Datei PkgInfo.</a></li></ul></li><li><a href="comp-packages.php?phpLang=de"><b>7 Probleme beim Übersetzen - Bestimmte Pakete</b></a><ul><li><a href="comp-packages.php?phpLang=de#libgtop">7.1 Das Übersetzen eines Pakets bricht mit einer Fehlermeldung ab, in der
          <code>sed</code> vorkommmt.</a></li><li><a href="comp-packages.php?phpLang=de#Leopard-libXrandr">7.2 Ich kann <b>gtk+2</b> auf OS X 10.5 nicht installieren.</a></li><li><a href="comp-packages.php?phpLang=de#xml-sax-expat">7.3 Wenn ich ein Paket xml-sax-pm installiere, bekomme ich Fehlermeldungen
        mit <code>_Perl_Gthr_key_ptr</code>.</a></li><li><a href="comp-packages.php?phpLang=de#malloc-symlink">7.4 Ich kann das Finkpaket <code>gcc</code> wegen "conflicting types for
        'pointer_t'" nicht erstellen.</a></li><li><a href="comp-packages.php?phpLang=de#all-others">7.5 Ich habe mit Paketen Probleme, die hier nicht aufgeführt sind.</a></li></ul></li><li><a href="usage-general.php?phpLang=de"><b>8 Benutzung von Paketen - Allgemein</b></a><ul><li><a href="usage-general.php?phpLang=de#xlocale">8.1 Ich erhalte viele Meldungen der Art "locale not supported by C
          library". Ist das schlimm?</a></li><li><a href="usage-general.php?phpLang=de#passwd">8.2 Plötzlich gibt es eine ganze Reihe von seltsamen Nutzern auf meinem
          System. Die Namen sind "mysql", "pgsql" und "games". Wo kommen die
          denn her?</a></li><li><a href="usage-general.php?phpLang=de#compile-myself">8.3 Wie übersetze ich ein Program selbst, das Pakete aus Fink benutzt?</a></li><li><a href="usage-general.php?phpLang=de#apple-x11-applications-menu">8.4 Ich kann keines der Programme, die ich in Fink installiert habe, über
          das Programme-Menu (Applications) in Apples X11 starten.</a></li><li><a href="usage-general.php?phpLang=de#x-options">8.5 Ich durch die vielen Optionen für X11 (Apple X11, XFree86,
          etc. )verwirrt. Welche soll ich installieren?</a></li><li><a href="usage-general.php?phpLang=de#no-display">8.6 Wenn ich versuche, ein Programm zu starten, erhalte ich die
          Fehlermeldung: "cannot open display:". Was mucss ich tun?</a></li><li><a href="usage-general.php?phpLang=de#suggest-package">8.7 Ich finde mein Lieblingsprogramm nicht in Fink. Wie kann ich ein
          neues Programm für Fink vorschlagen?</a></li><li><a href="usage-general.php?phpLang=de#virtpackage">8.8 Was bedeuten all diese virtuellen Pakete <code>system-*</code>,
          die zwar immer mal wieder auftauchen, die ich aber selbst nicht
          installieren oder löschen kann?</a></li></ul></li><li><a href="usage-packages.php?phpLang=de"><b>9 Benutzung von Paketen - Bestimmte Pakete</b></a><ul><li><a href="usage-packages.php?phpLang=de#xmms-quiet">9.1 Ich bekommen keinen Ton von XMMS</a></li><li><a href="usage-packages.php?phpLang=de#nedit-window-locks">9.2 Wenn ich eine Datei mit nedit editiere und eine weitere Datei öffne,
          erscheint ein Fenster, das aber nicht auf Eingaben reagiert.</a></li><li><a href="usage-packages.php?phpLang=de#xdarwin-start">9.3 Hilfe! Wenn ich XDarwin starte, bricht es sofort ab!</a></li><li><a href="usage-packages.php?phpLang=de#no-server">9.4 Wenn ich versuche, XDarwin zu starten, erhalte ich die Fehlermeldung
          "xinit: No such file or directory (errno 2): no server
          "/usr/X11R6/bin/X" in PATH".</a></li><li><a href="usage-packages.php?phpLang=de#apple-x-delete">9.5 Ich möchte, dass die Löschen-Taste in Apples X11.app sich so wie in
          XDarwin verhält.</a></li><li><a href="usage-packages.php?phpLang=de#apple-x11-wants-xfree86">9.6 Ich habe Probleme mit X11 und Fink.</a></li><li><a href="usage-packages.php?phpLang=de#special-x11-debug">9.7 Ich habe immer noch Probleme mit X11 und Fink.</a></li><li><a href="usage-packages.php?phpLang=de#tiger-gtk">9.8 Nach der Aktualisierung auf Tiger (OS 10.4), bekomme ich immer
          Fehlermeldung mit <code>_EVP_idea_cbc</code>, sobald ich ein GTK-
          Programm starte.</a></li><li><a href="usage-packages.php?phpLang=de#yelp">9.9 Ich erhalte in GNOME-Programmen keine Hilfe.</a></li></ul></li></ul>
<!--Generated from $Fink: faq.de.xml,v 1.126 2020/05/31 13:43:40 nieder Exp $-->
<?php include_once "../footer.inc"; ?>


