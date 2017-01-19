<?php
$title = "Nutzung";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2012/11/11 15:20:17';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink Nutzung</h1>
<!--Generated from $Fink: usage.xml,v 1.16 2012/11/11 15:20:17 kamischi Exp $--><h2><a name="">Pfade setzen</a></h2>
<p>
Damit man die Programme, die in Finks Verzeichnis-Hierarchie installiert sind,
und auch fink selbst benutzen kann muss die Umgebungvariable PATH (und einige
andere) entsprechend gesetzt werden.
Dies wird fÃ¼r sie mit Shell-Skripts erledigt.
Benutzen sie die Shell tcsh, fÃ¼gen sie folgendes in die Datei .cshrc ein:
</p>
<pre>source /sw/bin/init.csh</pre>
<p>
Ãnderungen in der Datei .cshrc wirken sich nur bei einer neuen Shell aus (d. h.
in einem neu geÃ¶ffneten Terminalfenster). Deshalb sollten sie das Kommando auch
in jedem Terminalfenster ausfÃ¼hren, das sie Ã¶ffneten, bevor sie die Datei
editierten.
Sie mÃ¼ssen auch das Kommando <code>rehash</code>, weil die Shell tcsh die Liste
der vorhandenen Kommmando intern zwischenspeichert.
</p>
<p>
Nutzen wie eine Art Bourne shell (z. B. sh, bash, zsh) fÃ¼hren sie statt dessen
folgendes Kommando aus:
</p>
<pre>source /sw/bin/init.sh</pre>
<p>
Anmerkung: Die Skripte fÃ¼gen auch /usr/X11R6/bin und /usr/X11R6/man zu ihrem
Pfad hinzu, so dass sie X11 benutzen kÃ¶nnen, falls installiert.
Pakete kÃ¶nnen ihrerseits eigene Einstellungen vornehmen. Das Paket qt fÃ¼gt zum
Beispiel die Umgebungsvariable QTDIR hinzu.
</p>
<h2><a name="">Fink benutzen</a></h2>
<p>
Fink hat mehrere Kommandos um Pakete zu bearbeiten. Alle brauchen mindestens
einen Paketnamen, kÃ¶nnen aber auch mehrere Pakete auf einmal bearbeiten. Sie
kÃ¶nnen den einfachen Paketnamen (z. B. gimp) angeben oder den vollstÃ¤ndig
spezifizierten mit Versionsnummer (z.B. gimp-1.2.1 oder gimp-1.2.1-3). Fink
wird automatisch die jeweils letzte Version und Revision auswÃ¤hlen, wenn keine
angegeben ist.
</p>
<p>
Im folgenden werden die Kommandos aufgelistet, die Fink versteht:
</p>
<h2><a name="">install</a></h2>
<p>
Mit dem Kommando install installiert man Pakete. Es lÃ¤dt das Paket herunter,
konfiguriert, Ã¼bersetzt und installiert es. Es wird auch alle AbhÃ¤ngigkeiten
automatisch installieren, fragt aber zur BestÃ¤tigung nach. Beispiel:
</p>
<pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
<p>
Aliase fÃ¼r das Kommando install: update, enable, activate und use.
(HauptsÃ¤chlich aus historischen GrÃ¼nden.)
</p>
<h2><a name="">remove</a></h2>
<p>
Das Kommando remove lÃ¶scht Pakete aus dem System, in dem das Kommando
'dpkg --remove' ausgefÃ¼hrt wird. Derzeit gibt es einige Haken: Es funktioniert
fÃ¼r Pakete, die Fink bekannt sind (d. h. das eine Datei .info vorhanden ist) und
es Ã¼berprÃ¼ft selbst keine AbhÃ¤ngigkeiten, sondern Ã¼berlÃ¤sst dies alles dem Tool
dpkg. Normalerweise ergeben sich jedoch daraus keine Probleme.
</p>
<p>
Das Kommando remove lÃ¶scht nur die installierten Dateien des Pakets, lÃ¤sst aber
die komprimierte Paketdatei .deb intakt. Das heiÃt, dass sie das Paket spÃ¤ter
erneut installieren kÃ¶nnen ohne erneut durch den Ãbersetzungsprozess gehen zu
mÃ¼ssen. Wird Plattenplatz benÃ¶tigt, kÃ¶nnen sie die .deb-Dateien im
Verzeichnisbaum /sw/fink/dists lÃ¶schen.
</p>
<p>
Aliase fÃ¼r das Kommando remove: disable, deactivate, unuse, delete und purge.
</p>
<h2><a name="">update-all</a></h2>
<p>
Das Kommando update-all aktualisiert alle Pakete auf die neueste Version. Es
benÃ¶tigt keine Liste der Pakete. Tippen sie einfach:
</p>
<pre>fink update-all</pre>
<h2><a name="">list</a></h2>
<p>
Das Kommando list erzeugt eine Liste aller verfÃ¼gbaren Pakete, ihren
Installations-Status, die aktuelle Version und eine kurze Beschreibung.
Ohne weitere Parameter listet es alle Pakete auf.
Sie kÃ¶nnen auch einen Namen oder ein Shellmuster angeben. Fink wird dann nur die
Pakete auflisten, die dazu passen.
</p>
<p>
In der ersten Spalte steht der Installations-Status, mit folgenden Bedeutungen
The first column displays the installation state with the following
meanings:
</p>
<pre>     nicht installiert
 i   die aktuelle Version ist installiert
(i)  installiert, es gibt aber eine neuere Version</pre>
<p>
Einige Beispiele:
</p>
<pre>fink list            - liste alle Pakete auf
fink list bash       - Ã¼berprÃ¼fe die VerfÃ¼gbarkeit von bash und dessen Version
fink list "gnome*"   - liste alle Pakete auf, deren Namen mit 'gnome' beginnt</pre>
<p>
Die AnfÃ¼hrungszeichen im letzten Beispiel werden benÃ¶tigt, damit die Shell das
Muster nicht selbst interpretiert.
</p>
<h2><a name="">describe</a></h2>
<p>
Das Kommando describe erzeugt die lange Beschreibung des Pakets, dessen Namen
sie in der Kommandozeile angegeben haben.
Beachten sie, dass nicht alle Pakete eine lange Beschreibung haben.
</p>
<p>
Aliase fÃ¼r das Kommando describe: desc, description und info
</p>
<h2><a name="">fetch</a></h2>
<p>
Das Kommando fetch lÃ¤dt die angegebenen Pakete herunter, installiert sie aber
nicht. Ist ein Tarballs bereits vorhanden, wird in einem Dialog abgefragt, ob
das existierende durch ein frisch herunter geladenes ersetzt werden soll.
</p>
<h2><a name="">fetch-all</a></h2>
<p>
Das Kommando fetch-all lÃ¤dt die Quellcode-Dateien fÃ¼r <b>alle</b> Pakete
herunter. Wie beim Kommando fetch wird in einem Dialog abgefragt, ob
existierende Dateien durch frisch herunter geladene ersetzt werden sollen.
</p>
<h2><a name="">fetch-missing</a></h2>
<p>
Das Kommando fetch-missing lÃ¤dt die Quellcode-Dateien fÃ¼r <b>alle</b> Pakete
herunter, die noch nicht vorhanden sind.
</p>
<h2><a name="">build</a></h2>
<p>
Das Kommando build erzeugt ein Paket, installiert es aber nicht. Wie Ã¼blich
werden Quellcode-Dateien herunter geladen, wenn sie nicht gefunden werden.
Das Ergebnis dieses Kommandos ist eine installierbare .deb-Paketdatei, die man
spÃ¤ter schnell mit dem Kommando install installieren kann. Existiert die
.deb-Paketdatei bereits, passiert nichts. Beachten sie, dass AbhÃ¤ngigkeiten
nicht nur erzeugt sondern <b>installiert</b> werden.
</p>
<h2><a name="">rebuild</a></h2>
<p>
Das Kommando rebuild erzeugt ein Paket wie das Kommando build. Es ignoriert und
Ã¼berschreibt aber eine existierende .deb-Paketdatei. Ist das Paket installiert,
wird die neue .deb-Paketdatei im System mit dpkg installiert. Das Kommando
rebuild ist bei der Entwicklung von Paketen sehr nÃ¼tzlich.
</p>
<h2><a name="">reinstall</a></h2>
<p>
Das Kommando reinstall installiert ein Paket wie das Kommando install mittels
dpkg, aber auch wenn es bereits installiert ist. Das ist vor allem dann nÃ¼tzlich,
wenn man aus Versehen Paketdateien gelÃ¶scht oder Konfigurationsdateien geÃ¤ndert
hat und die Voreinstellung wieder zurÃ¼ck haben mÃ¶chte.
</p>
<h2><a name="">configure</a></h2>
<p>
Das Kommando configure startet den Konfigurationsprozess fÃ¼r Fink erneut.
Unter anderem kann man so die Einstellungen fÃ¼r Spiegelserver und Proxy Ã¤ndern.
</p>
<h2><a name="">selfupdate</a></h2>
<p>
Das Kommando selfupdate automatisiert das Aktualisieren auf eine neue Version
von Fink.
Es sieht auf der Webseite von Fink nach, ob es eine neuere Version gibt.
Dann lÃ¤dt es die Paketbeschreibungen herunter und aktualisiert die zentralen
Kernpakete, einschlieÃlich fink selbst.
Mit diesem Kommando kann man nur auf regulÃ¤re Versionen aktualisieren. Sie
kÃ¶nnen es aber verwenden, um von einer cvs-Version auf eine spÃ¤tere regulÃ¤re
Version zu aktualisieren. Es wird sich weigern, abzulaufen, wenn sie /sw/fink so
aufgesetzt haben, dass es Paketbeschreibungen direkt von CVS herunter lÃ¤dt.
</p>
<h2><a name="">Weitere Fragen</a></h2>
<p>
Haben sie weitere Fragen, die in diesem Dokument nicht beantwortet wurden, lesen
sie bitte die FAG auf der Fink-Webseite:
<a href="/faq/">/faq/</a>.
Sollte dies ihre Frage immer noch nicht beantworten, abonnieren sie die
Email-Liste fÃ¼r Fink-Nutzer
<a href="/lists/fink-users.php">/lists/fink-users.php</a>
und fragen sie dort.
</p>

<?php include_once "../footer.inc"; ?>


