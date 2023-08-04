<?php
$title = "Installation - Schnellanleitung";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2015/11/01 02:12:02';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Installation Contents"><link rel="next" href="install-first.php?phpLang=de" title="Erst-Installation"><link rel="prev" href="index.php?phpLang=de" title="Installation Contents">';


include_once "header.de.inc";
?>
<h1>Installation - 1. Schnellanleitung</h1>




<p>
Dieser Abschnitt ist für die ungeduldigen, die keine Zeit haben, alles über die
Welt der Kommandozeile zu erlernen und denen es egal ist, wenn sie nicht
verstehen, was sie eigentlich tun.
</p>
<p>
Wenn sie die eigentliche Anleitung suchen, springen sie zum
<a href="install-first.php?phpLang=de">nächsten Abschnitt</a>.
(Sie können diesen Abschnitt immer noch als Beispiel verwenden.)
</p>


<h2><a name="req">1.1 Voraussetzungen</a></h2>
<p>
Sie brauchen:
</p>
<ul>
<li><p>
Ein installiertes Mac OS X, Version 10.9 oder später.
</p></li>
<li><p>
Als nächstes brauchen sie die Xcode Command Line Tools. Dieses Paket wird
installiert, indem man es entweder direkt von developer.apple.com herunter lädt,
oder das Kommando</p>
<pre>xcode-select --install</pre>
<p>ausführt und den Button <b>Install</b> in dem Fenster auswählt, das
aufgemacht wird. Mit diesem Kommando kann man die Tools auch aktualisieren,
insbesondere wenn es Probleme gibt.</p>
<p>Bei einem manuellen Download, achten sie darauf, dass die Tools zur Version
von OS X und Xcode (falls vorhanden) passen.</p>
<p>Sie müssen die Xcode-Lizenz als Administrator akzeptieren. Führen sie
dazu folgendes Kommando aus:</p>
<pre>sudo xcodebuild -license</pre>
<p>blättern sie ans Ende des Texts und geben sie</p>
<pre>agree</pre>
<p>ein.</p>
<p>Einige Pakete erfordern ein vollständige Installation von Xcode.</p>
</li>
<li><p>Java. Geben sie das Kommando</p>
<pre>javac</pre>
<p>in einem Fenster der Terminal.app. Das sollte ausreichen, damit das System
alles herunter lädt.</p></li>
<li><p>
Viele andere Tools kommen mit OS X, beispielsweise perl und curl.
</p></li>
<li><p>
Internet-Zugang.
Alle Quellcodes werden von Spiegel-Servern herunter geladen.
</p></li>
<li><p>
Geduld. Das Erstellen von einige großen Paketen braucht Zeit. Das kann Stunden
oder sogar Tage dauern.
</p></li>
</ul>


<h2><a name="scripted-install">1.2 Erstmalige Installation:
Super-Schnellanleitung</a></h2>
<p>
Laden sie das
<a href="https://raw.githubusercontent.com/fink/scripts/master/srcinstaller/Install%20Fink.tool">
Install Fink.tool</a> Skript herunter und starten sie es mit einem
Doppelklick. Das wird das Herunterladen der nächsten Schritten automatisieren.
</p>
<p>
Das Skript muss manchmal anhalten, damit sie etwas erledigen. Sollte das der Fall
sein, starten sie das Skript erneut.
</p>

<h2><a name="install">1.3 Erstmalige Installation: Schnellanleitung</a></h2>
<p>
Beginnen sie, indem sie die Datei
<code>fink-0.45.4.tar.gz</code> in ihr Heimatverzeichnis
kopieren (Möglicherweise wird sie als
<code>fink-0.45.4.tar</code> angezeigt, falls sie die Datei
mit Safari herunter geladen haben).
Starten sie dann das Programm Terminal.app und folgen sie der Sitzung weiter
unten. Die Computer-Ausgabe ist in <code>normal face</code> angezeigt, ihre
Eingabe in <code><b>bold face</b></code> (oder auf andere Weise hervor
gehoben). Die tatsächlichen Eingabe-Prompts der Shell mag variieren und einige
Teile der Ausgabe wurden weg gelassen (<code>...</code>).
</p>
<p>Bemerkung: Nachdem sie die Installation gestartet haben, erscheint
möglicherweise ein Dialogfenster, in dem sie gefragt werden, ob sie XQartz
installieren wollen. Wenn sie das wollen, dann machen sie das. Sie werden dazu
die Installation von Fink nicht unterbrechen werden müssen.</p>
<pre>[frodo:~] testuser% <b>tar xf fink-0.45.4.tar.gz</b>
[frodo:~] testuser% <b>cd fink-0.45.4</b>
[frodo:~/fink-0.45.4] testuser% <b>./bootstrap</b>

Fink must be installed and run with superuser (root) privileges
...
Choose a method: [1] <b>1</b>

sudo /Users/testuser/fink-0.45.4/bootstrap .sudo '/sw'
Password: <b>(your normal password here)</b>
...
OK, I'll ask you some questions and update the configuration file in
'/sw/etc/fink.conf'.

In what additional directory should Fink look for downloaded tarballs? [] <b>(press return)</b>

Which directory should Fink use to build packages? (If you don't know what this
means, it is safe to leave it at its default.) [] <b>(press return)</b>

"Fink can set the UID and GID of its build user dynamically...
...Allow Fink to set the UID/GID dynamically? [Y] <b>(press return)</b>

(1)	Quiet (do not show download statistics)
(2)	Low (do not show tarballs being expanded)
(3)	Medium (will show almost everything)
(4)	High (will show everything)

How verbose should Fink be? [2] <b>(press return)</b>

Proxy/Firewall settings
Enter the URL of the HTTP proxy to use, or 'none' for no proxy. The URL
should start with http:// and may contain username, password or port
specifications. [none] <b>(press return)</b>
Enter the URL of the proxy to use for FTP, or 'none' for no proxy. The URL
should start with http:// and may contain username, password or port
specifications. [none] <b>(press return)</b>
Use passive mode FTP transfers (to get through a firewall)? [Y/n] <b>(press return)</b>

Enter the maximum number of simultaneous build jobs.
...
Maximum number of simultaneous build jobs: [&lt;number of cpus&gt;] <b>(press return)</b>

Mirror selection
Choose a continent:
...
<b>(enter the numbers corresponding to your location)</b>
...
Writing updated configuration to '/sw/etc/fink.conf'...
Bootstrapping a base system via /sw/bootstrap.
...
<b>(take a coffee break while Fink downloads and compiles the base packages)</b>
...

You should now have a working Fink installation in '/sw'.
[frodo:~/fink-0.45.4] testuser% <b>cd</b>
[frodo:~] testuser% <b>rm -r fink-0.45.4</b>
[frodo:~] testuser% <b>/sw/bin/pathsetup.sh</b></pre>
<p>
Das letzte Kommando führt ein kleines Skript aus, das Unix-Pfade (und anderes)
einrichtet. Nach der Abfrage Änderungen vornehmen zu dürfen läuft es in den
meisten Fällen voll automatisch. Tritt ein Fehler auf, müssen sie die Dinge
selbst einrichten (siehe weiter unten).
</p>
<p>
(Wenn sie die Dinge selbst einrichten und csh oder tcsh nutzen, versichern sie
sich, dass das Kommando <code>source /sw/bin/init.csh</code> beim Start der
Shellausgeführt wird, entweder durch .login, .cshrc, .tcshrc oder was sonst auch
immer angemessen ist. Benutzen sie bash oder eine ähnliche Shell, brauchen sie
<code>. /sw/bin/init.sh</code> und legen sie es da ab, wo es ausgeführt wird wie
.bashrc oder .profile.)
</p>
<p>
Haben sie die Pfade gesetzt, öffnen sie ein neues Fenster in Terminal.app und
schließen sie alle anderen. Das ist alles. Sie haben ein minimales Fink-System
installiert.
</p>
<p>
Bevor sie weitere Pakete installieren können, müssen sie ihre Beschreibungen
herunter laden. Geben sie dafür in dem neuen Fenster von Terminal.app folgenden
Befehl ein:
</p>
<pre>[frodo:~] testuser% <b>fink selfupdate-rsync</b>
Password: <b>(your normal password here)</b>
Please note: the simple command 'fink selfupdate' should be used for routine
updating; you only need to use a command like 'fink selfupdate-cvs' or 'fink
selfupdate --method=rsync' if you are changing your update method.
...
<b>(wait for the downloads to finish)</b></pre>
<p>oder auch</p>
<pre>[frodo:~] testuser% <b>fink selfupdate-cvs</b>
Password: <b>(your normal password here)</b>

Please note: the simple command 'fink selfupdate' should be used for routine
updating; you only need to use a command like 'fink selfupdate-cvs' or 'fink
selfupdate --method=rsync' if you are changing your update method. 

fink is setting your default update method to cvs

Fink has the capability to run the CVS commands as a normal user. That has some
advantages - it uses that user's CVS settings files and allows the package
descriptions to be edited and updated without becoming root. Please specify the
user login name that should be used: [&lt;your username&gt;] <b>(press return)</b>

For Fink developers only: Enter your SourceForge login name to set up full CVS
access. Other users, just press return to set up anonymous read-only access.
[anonymous] <b>(press return)</b>

Checking to see if we can use hard links to merge the existing tree. Please
ignore errors on the next few lines.
Now logging into the CVS server. When CVS asks you for a password, just press
return (i.e. the password is empty).
/usr/bin/su hansen -c 'cvs -d":pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink" login'
Logging in to :pserver:anonymous@fink.cvs.sourceforge.net:2401/cvsroot/fink
CVS password: <b>(press return)</b>
Logging in to :pserver:anonymous@fink.cvs.sourceforge.net:2401/cvsroot/fink
...
<b>(wait for the downloads to finish)</b></pre>
<p>
vor allem, wenn sie einen Proxy nutzen.
</p>
<p>
Sie können jetzt Pakete mit dem Kommando <code>fink</code> installieren, zum
Beispiel:
</p>
<pre>[frodo:~] testuser% <b>fink install gimp2</b>
Password:
Scanning package description files..........
Information about 6230 packages read in 1 seconds.

fink needs help picking an alternative to satisfy a virtual dependency. The
candidates:

(1)	db51-aes: Berkeley DB embedded database - crypto
(2)	db51: Berkeley DB embedded database - non crypto

Pick one: [1] 
The following package will be installed or updated:
 gimp2
The following 308 additional packages will be installed:
 aalib aalib-bin aalib-shlibs asciidoc atk1 atk1-shlibs autoconf2.6
 automake1.11 automake1.11-core blt-dev blt-shlibs boost1.46.1.cmake
 boost1.46.1.cmake-shlibs cairo cairo-shlibs celt-dev celt-shlibs cmake
 cpan-meta-pm5124 cpan-meta-requirements-pm5124 cpan-meta-yaml-pm
 cyrus-sasl2-dev cyrus-sasl2-shlibs daemonic db51-aes db51-aes-shlibs db53-aes
 db53-aes-shlibs dbus dbus-glib1.2-dev dbus-glib1.2-shlibs dbus1.3-dev
 dbus1.3-shlibs dirac-dev dirac-shlibs docbook-bundle docbook-dsssl-ldp
 docbook-dsssl-nwalsh docbook-dtd docbook-xsl doxygen expat1 expat1-shlibs
 exporter-pm extutils-cbuilder-pm extutils-command-pm extutils-install-pm
 extutils-makemaker-pm extutils-makemaker-pm5124 extutils-manifest-pm
 file-copy-recursive-pm file-temp-pm5124 fink-package-precedence flag-sort
 fltk-x11 fltk-x11-shlibs fontconfig-config fontconfig2-dev fontconfig2-shlibs
 freeglut freeglut-shlibs freetype219 freetype219-shlibs gawk gconf2-dev
 gconf2-shlibs gd2 gd2-bin gd2-shlibs gdbm3 gdbm3-shlibs getoptbin
 gettext-tools ghostscript ghostscript-fonts giflib giflib-bin giflib-shlibs
 gimp2-shlibs glib2-dev glib2-shlibs glitz glitz-shlibs gmp5 gmp5-shlibs
 gnome-doc-utils gnutls-2.12 gnutls-2.12-shlibs graphviz graphviz-shlibs grep
 gtk+2 gtk+2-dev gtk+2-shlibs gtk-doc gtkglext1 gtkglext1-shlibs gts75
 gts75-shlibs guile18 guile18-dev guile18-libs guile18-shlibs ilmbase
 ilmbase-shlibs intltool40 iso-codes jack-dev jack-shlibs json-pp-pm lame-dev
 lame-shlibs lcms lcms-shlibs libavcodec52-shlibs libavformat52-shlibs
 libavutil50-shlibs libbabl0.1.0-dev libbabl0.1.0-shlibs libbonobo2
 libbonobo2-dev libbonobo2-shlibs libcelt0.2-dev libcelt0.2-shlibs libcroco3
 libcroco3-shlibs libdatrie1 libdatrie1-shlibs libexif12 libexif12-shlibs
 libflac8 libflac8-dev libgcrypt libgcrypt-shlibs libgegl0.1.0-dev
 libgegl0.1.0-shlibs libgettext3-dev libgettext3-shlibs libgettextpo2-dev
 libgettextpo2-shlibs libglade2 libglade2-shlibs libgmpxx5-shlibs libgpg-error
 libgpg-error-shlibs libgsf1.114-dev libgsf1.114-shlibs libgsm1-dev
 libgsm1-shlibs libhogweed-shlibs libidl2 libidl2-shlibs libidn libidn-shlibs
 libjasper.1 libjasper.1-shlibs libjpeg libjpeg-bin libjpeg-shlibs libjpeg8
 libjpeg8-shlibs liblzma5 liblzma5-shlibs libming1-dev libming1-shlibs libmng2
 libmng2-shlibs libncursesw5 libncursesw5-shlibs libogg libogg-shlibs
 liboil-0.3 liboil-0.3-shlibs libopencore-amr0 libopencore-amr0-shlibs
 libopenexr6-shlibs libopenjpeg libopenjpeg-shlibs libopenraw1-dev
 libopenraw1-shlibs libpaper1-dev libpaper1-shlibs libpcre1 libpcre1-shlibs
 libpng14 libpng14-shlibs libpng15 libpng15-shlibs libpng3 libpng3-shlibs
 librarian.08-shlibs librsvg2 librsvg2-shlibs libschroedinger
 libschroedinger-shlibs libsigsegv2 libsigsegv2-shlibs libsndfile1-dev
 libsndfile1-shlibs libsoup2.4.1-ssl libsoup2.4.1-ssl-shlibs libspeex1
 libspeex1-shlibs libspiro0 libspiro0-shlibs libtasn1-3 libtasn1-3-shlibs
 libthai libthai-dev libthai-shlibs libtheora0 libtheora0-shlibs
 libtheoradec1-shlibs libtheoraenc1-shlibs libtiff libtiff-bin libtiff-shlibs
 libtool2 libtool2-shlibs libvorbis0 libvorbis0-shlibs libvpx libwmf
 libwmf-shlibs libx264-115-dev libx264-115-shlibs libxml2 libxml2-bin
 libxml2-py27 libxml2-shlibs libxslt libxslt-bin libxslt-shlibs lua51 lua51-dev
 lua51-shlibs lynx m4 nasm netpbm10 netpbm10-shlibs nettle4a nettle4a-shlibs
 ocaml openexr openexr-dev openjade openldap24-dev openldap24-shlibs opensp-bin
 opensp5-dev opensp5-shlibs openssl100-dev openssl100-shlibs orbit2 orbit2-dev
 orbit2-shlibs pango1-xft2-ft219 pango1-xft2-ft219-dev pango1-xft2-ft219-shlibs
 parse-cpan-meta-pm passwd-core passwd-messagebus pixman pixman-shlibs
 pkgconfig poppler-data poppler4 poppler4-glib poppler4-glib-shlibs
 poppler4-shlibs popt popt-shlibs python27 python27-shlibs rarian rarian-compat
 readline5 readline5-shlibs readline6 readline6-shlibs sdl sdl-shlibs
 sgml-entities-iso8879 shared-mime-info sqlite3-dev sqlite3-shlibs swig
 system-openssl-dev tcltk tcltk-dev tcltk-shlibs test-harness-pm5124
 test-simple-pm5124 texi2html texinfo version-pm5124
 version-requirements-pm5124 xdg-base xft2-dev xft2-shlibs xinitrc
 xml-parser-pm5124 xmlto xvidcore xvidcore-shlibs xz yasm
The following 2 packages might be temporarily removed:
 lcms tcltk-dev
Do you want to continue? [Y/n]
...</pre>
<p>
Sollte diese Anleitung nicht funktionieren, müssen sie sich die Zeit nehmen, den
Rest dieses Dokuments durchlesen sowie die <a href="/faq/">online FAQ</a>.
Sie können auch Fragen auf der
<a href="/lists/fink-users.php">fink-users mailing list</a> stellen.
Rechnen sie aber damit, dass sie auf diese Dokumentation verwiesen werden, vor
allem wenn ihr Problem und seine Lösung hier ausführlich beschrieben ist.
</p>


<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="install-first.php?phpLang=de">2. Erst-Installation</a></p>
<?php include_once "../../footer.inc"; ?>


