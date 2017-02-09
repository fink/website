<?php
$title = "F.A.Q.";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2015/06/06 19:19:29';
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
          erkennt den Wechsel nicht.</a></li><li><a href="usage-fink.php?phpLang=de#seg-fault">5.25 Ich erhalte Fehlermeldungen von <code>gzip</code>,
          <code>dpkg-deb</code> oder anderen Programmen aus dem Paket
          <code>fileutils</code>! Hilfe!</a></li><li><a href="usage-fink.php?phpLang=de#pathsetup-keeps-running">5.26 When I open a Terminal window, I get a message that "Your
        environment seems to be correctly set up for Fink already.", and it
        logs out.</a></li><li><a href="usage-fink.php?phpLang=de#ext-drive">5.27 Ich habe Fink nicht auf der Haupt-Partition installiert und ich kann
          das Paket Fink nicht aus dem Quellen aktualisieren. Die
          Fehlermeldungen enthalten <q>chowname</q>.</a></li><li><a href="usage-fink.php?phpLang=de#mirror-gnu">5.28 Fink weigert sich, meine Pakete zu aktualisieren, weil es den 'gnu'
          Spiegelserver nicht finden kann.</a></li><li><a href="usage-fink.php?phpLang=de#cant-move-fink">5.29 Ich kannn Fink nicht aktualisieren, weil ich /sw/fink nicht aus dem
          Weg räumen kann.</a></li><li><a href="usage-fink.php?phpLang=de#fc-cache">5.30 Ich erhalte diese Fehlermeldung: "No fonts found".</a></li><li><a href="usage-fink.php?phpLang=de#non-admin-installer">5.31 Ich kann Fink nicht mit dem Installerpaket installieren, weil ich den
          Fehler "volume doesn't support symlinks" erhalte.</a></li><li><a href="usage-fink.php?phpLang=de#wrong-arch">5.32 Ich kann Fink nicht aktualisieren, weil <q>package architecture
          (darwin-i386) does not match system (darwin-powerpc).</q></a></li></ul></li><li><a href="comp-general.php?phpLang=de"><b>6 Compile Problems - General</b></a><ul><li><a href="comp-general.php?phpLang=de#compiler">6.1 A configure script complains that it can't find an "acceptable cc".
        What's that?</a></li><li><a href="comp-general.php?phpLang=de#cvs">6.2 When I try a "fink selfupdate-cvs" I get this message: "cvs:
        Command not found."</a></li><li><a href="comp-general.php?phpLang=de#missing-make">6.3 I'm getting an error message involving <code>make</code>
        </a></li><li><a href="comp-general.php?phpLang=de#head">6.4 I'm getting a strange usage message from the head command. What's
        broken?</a></li><li><a href="comp-general.php?phpLang=de#also_in">6.5 When I try to install a package I get an error message about trying
        to overwrite a file that is in another package.</a></li><li><a href="comp-general.php?phpLang=de#mv-failed">6.6 What does "execution of mv failed, exit code 1" mean when I try to
        build a package?</a></li><li><a href="comp-general.php?phpLang=de#node-exists">6.7 I can't install a package | update because I get a message that a
        "node" already exists.</a></li><li><a href="comp-general.php?phpLang=de#usr-local-libs">6.8 I've heard that libraries and headers installed under /usr/local
          sometimes cause build problems for Fink. Is this true?</a></li><li><a href="comp-general.php?phpLang=de#toc-out-of-date">6.9 When I try to build a package, I get a message that a "table of
        contents" is out of date. What do I need to do?</a></li><li><a href="comp-general.php?phpLang=de#fc-atlas">6.10 Fink Commander hangs when I try to install atlas.</a></li><li><a href="comp-general.php?phpLang=de#basic-headers">6.11 I get messages saying that I'm missing <code>stddef.h</code>
          | <code>wchar.h</code> | <code>stdlib.h</code> |
          <code>crt1.o</code>, or that my <q>C compiler cannot
            create executables</q>.</a></li><li><a href="comp-general.php?phpLang=de#multiple-dependencies">6.12 I can't update, because Fink is "unable to resolve version conflict
        on multiple dependencies".</a></li><li><a href="comp-general.php?phpLang=de#dpkg-parse-error">6.13 I can't install anything because I get "dpkg: parse error, in file
        `/sw/var/lib/dpkg/status'"!</a></li><li><a href="comp-general.php?phpLang=de#freetype-problems">6.14 I get errors involving freetype.</a></li><li><a href="comp-general.php?phpLang=de#dlfcn-from-oo">6.15 I get build errors involving `Dl_info'.</a></li><li><a href="comp-general.php?phpLang=de#gcc2">6.16 Fink says I'm missing <code>gcc2</code> or
          <code>gcc3.1</code> but I can't seem to
        install it.</a></li><li><a href="comp-general.php?phpLang=de#system-java">6.17 Fink says <code>Failed: Can't resolve dependency
          "system-java-dev"</code>, but there's no such package.</a></li><li><a href="comp-general.php?phpLang=de#dpkg-split">6.18 When I try to install anything, I get <q>dpkg (subprocess):
          failed to exec dpkg-split to see if it's part of a multiparter: No
          such file or directory</q>.  How do I fix this?</a></li><li><a href="comp-general.php?phpLang=de#xml-parser">6.19 I get the following message: <q>configure: error: XML::Parser
          perl module is required for intltool</q>.  What do I do about it?</a></li><li><a href="comp-general.php?phpLang=de#master-problems">6.20 I'm trying to download a package, but Fink goes to some weird site
          with <q>distfiles</q> in its name, and the file isn't there.</a></li><li><a href="comp-general.php?phpLang=de#compile-options">6.21 I want Fink to use different options in building a package.</a></li><li><a href="comp-general.php?phpLang=de#alternates">6.22 Whenever I try to build from source, Fink keeps waffling between
          alternate versions of the same library.</a></li><li><a href="comp-general.php?phpLang=de#python-mods">6.23 I get errors involving <code>MACOSX_DEPLOYMENT_TARGET </code>when I
          try to build a Python module.</a></li><li><a href="comp-general.php?phpLang=de#libtool-unrecognized-dynamic">6.24 I get <q>unrecognized option `-dynamic'</q> errors from
      <code>libtool</code>.</a></li><li><a href="comp-general.php?phpLang=de#missing-usr-include-headers">6.25 I get a message about missing headers in <code>/usr/include</code></a></li><li><a href="comp-general.php?phpLang=de#pkginfo">6.26 When I try to update an app package on Yosemite, I see errors
          involving a PkgInfo file</a></li></ul></li><li><a href="comp-packages.php?phpLang=de"><b>7 Compile Problems - Specific Packages</b></a><ul><li><a href="comp-packages.php?phpLang=de#libgtop">7.1 A package fails to build with errors involving
        <code>sed</code>.</a></li><li><a href="comp-packages.php?phpLang=de#Leopard-libXrandr">7.2 I can't install <b>gtk+2</b> on OS 10.5</a></li><li><a href="comp-packages.php?phpLang=de#xml-sax-expat">7.3 I get errors involving <code>_Perl_Gthr_key_ptr</code> when installing
        an xml-sax-pm package</a></li><li><a href="comp-packages.php?phpLang=de#malloc-symlink">7.4 I can't build a Fink <code>gcc</code> package due to "conflicting types
        for 'pointer_t'"</a></li><li><a href="comp-packages.php?phpLang=de#all-others">7.5 I'm having issues with a package that isn't listed here.</a></li></ul></li><li><a href="usage-general.php?phpLang=de"><b>8 Package Usage Problems - General</b></a><ul><li><a href="usage-general.php?phpLang=de#xlocale">8.1 I'm getting lots of messages like "locale not supported by C
          library". Is that bad?</a></li><li><a href="usage-general.php?phpLang=de#passwd">8.2 There are suddenly a number of strange users on my system, with
        names like "mysql", "pgsql", and "games". Where did they come
        from?</a></li><li><a href="usage-general.php?phpLang=de#compile-myself">8.3 How do I compile something myself using Fink-installed
        software?</a></li><li><a href="usage-general.php?phpLang=de#apple-x11-applications-menu">8.4 I can't run any of my Fink-installed applications using the
        Applications menu in Apple X11.</a></li><li><a href="usage-general.php?phpLang=de#x-options">8.5 I'm bewildered by the X11 options: Apple X11, XFree86, etc. What
        should I install?</a></li><li><a href="usage-general.php?phpLang=de#no-display">8.6 When I try to run an application, I get a message that says "cannot
        open display:". What do I need to do?</a></li><li><a href="usage-general.php?phpLang=de#suggest-package">8.7 I don't see my favorite program in Fink. How do I suggest a new
        package for inclusion in Fink?</a></li><li><a href="usage-general.php?phpLang=de#virtpackage">8.8 What are all these <code>system-*</code> "virtual
	  packages" that are sometimes present, but that I can't
	  seem to install or remove myself?</a></li></ul></li><li><a href="usage-packages.php?phpLang=de"><b>9 Package Usage Problems - Specific Packages</b></a><ul><li><a href="usage-packages.php?phpLang=de#xmms-quiet">9.1 I get no sound from XMMS</a></li><li><a href="usage-packages.php?phpLang=de#nedit-window-locks">9.2 If I am editing a file in nedit, when I open another file its
        window pops up but is unresponsive.</a></li><li><a href="usage-packages.php?phpLang=de#xdarwin-start">9.3 Help! When I start XDarwin, it immediately quits!</a></li><li><a href="usage-packages.php?phpLang=de#no-server">9.4 When I try to start XDarwin I get the message "xinit: No such file
        or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</a></li><li><a href="usage-packages.php?phpLang=de#apple-x-delete">9.5 I want the delete key in Apple's X11.app to behave like that in
        XDarwin.</a></li><li><a href="usage-packages.php?phpLang=de#apple-x11-wants-xfree86">9.6 I'm having problems with X11 and Fink.</a></li><li><a href="usage-packages.php?phpLang=de#special-x11-debug">9.7 I'm still having problems with X11 and Fink.</a></li><li><a href="usage-packages.php?phpLang=de#tiger-gtk">9.8 After updating to Tiger (OS 10.4), whenever I use a GTK app, I get
          errors involving <code>_EVP_idea_cbc</code>.</a></li><li><a href="usage-packages.php?phpLang=de#yelp">9.9 I can't get the help to work for any GNOME application.</a></li></ul></li></ul>
<!--Generated from $Fink: faq.de.xml,v 1.125 2015/06/06 19:19:29 kamischi Exp $-->
<?php include_once "../footer.inc"; ?>


