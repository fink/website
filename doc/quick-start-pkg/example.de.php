<?php
$title = "Packaging Tutorial - Beispiel";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:18:11';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Packaging Tutorial Contents"><link rel="prev" href="howtostart.php?phpLang=de" title="Der Anfang">';


include_once "header.de.inc";
?>
<h1>Packaging Tutorial - 2. Beispiel - das Maxwell Paket</h1>
    
    
    
    
    
    <h2><a name="Basics">2.1 Grundlagen</a></h2>
      
      <p>
        Als erstes Maxwell. Öffnen sie einen Editor und es kann los gehen. Sie wissen den
        Namen des Pakets, seine Version und wo man den Quellcode-Tarball bekommt. Tragen
        sie dies in ihr Editorfenster ein:
      </p>
<pre>
Package: maxwell
Version: 0.5.1
Revision: 1
Source: mirror:sourceforge:%n/%n-%v.tar.gz
</pre>
      <p>
        Package und Version sind offensichtlich, aber welche Bedeutung haben die
        beiden anderen Felder? Revision ist die "version" des Fink-Pakets
        während Version die Upstream-Version des Quellcodes ist. Da es der erste
        Versuch ist, ein Paket für maxwell-0.5.1 zu erstellen, bekommt das Paket die
        Revisionsnummer 1.
      </p>
      <p>
        Das Feld Source gibt an, wo <code>fink</code> den Quellcode-Tarball abholen soll.
        <a href="http://sourceforge.net">Sourceforge</a> hat ein weltweites System
        von Spiegelservern, das auch von <code>fink</code> benutzt werden kann. Deshalb
        lautet der Eintrag <code>mirror:sourceforge:</code>. <code>%n</code>
        wird zum Namen des Pakets erweitert, also maxwell, und <code>%v</code> zur
        Upstream-Version des Quellcodes, also 0.5.1.
      </p>
      <p>
        Jetzt können sie die Datei als <code>maxwell.info</code> im Verzeichnis
        <code>/opt/sw/fink/dists/local/main/finkinfo/</code> soeichern. Danach können
        sie mit <code>fink validate</code> schauen, wie weit sie gekommen sind.
      </p>
<pre>
finkdev% fink validate maxwell.info
Validating package file maxwell.info...
Error: Required field "Maintainer" missing. (maxwell.info)
</pre>
      <p>
        Oha. Sieht also so aus, dass wohl noch einige Felder fehlen. Fügen sie folgendes
        hinzu:
      </p>
<pre>
Maintainer: John Doe &lt;jdoe@example.com&gt;
HomePage: http://maxwell.sourceforge.net
License: MIT
</pre>
      <p>
        Tragen sie sich als Betreuer des Fink-Pakets maxwell ein, ebenso seine
        Homepage. Auf der Projektseite bei sourceforge können sie heraus finden,
        dass der Quellcode unter MIT-Lizenz vertrieben wird. Machen sie den
        entsprechenden Eintrag. Der nächste Versuch ergibt:
      </p>
<pre>
finkdev% fink validate maxwell.info
Validating package file maxwell.info...
Warning: Unknown license "MIT". (maxwell.info)
Error: No MD5 checksum specified for "source". (maxwell.info)
Error: No package description supplied. (maxwell.info)
</pre>
      <p>
        Mist. Es scheint eher schlechter als besser zu werden, aber geben sie nicht
        auf und schauen sie in der <a href="/doc/packaging/policy.php#licenses">Anleitung für die Paketerstellung</a>
        nach, welche Lizensen erlaubt sind. Eine MIT-Lizenz wird mit OSI-Approved
        abgedeckt, wie man bei dem Link <a href="http://www.opensource.org/">OSI</a>
        nachschauen kann. Den Einzeiler für die Beschreibung des Pakets kann man sich
        auch von der Homeoage bei sourceforge holen. Machen sie folgende Einträge:
      </p>
<pre>
License: OSI-Approved
Description: Mac OS X S.M.A.R.T. Tool
</pre>
      <p>
        Aber wie löst man das Problem mit der MD5-Prüfsumme? Dazu kann man einfach
        mit <code>fink</code> den Quellcode holen:
      </p>
<pre>
finkdev% fink fetch maxwell
/usr/bin/sudo /opt/sw/bin/fink  fetch maxwell
Reading package info...
Updating package index... done.
Information about 3377 packages read in 30 seconds.
WARNING: No MD5 specified for Source of package maxwell-0.5.1-1 \
Maintainer: John Doe &lt;jdoe@example.com&gt;
curl -f -L -O http://distfiles.opendarwin.org/maxwell-0.5.1.tar.gz
% Total    % Received % Xferd  Average Speed          Time             Curr.
Dload  Upload Total    Current  Left    Speed
0     0    0     0    0     0      0      0 --:--:--  0:00:00 --:--:--     0
curl: (22) The requested URL returned error: 404
### execution of curl failed, exit code 22
Downloading the file "maxwell-0.5.1.tar.gz" failed.

(1)      Give up
(2)      Retry the same mirror
(3)      Retry another mirror from your continent
(4)      Retry another mirror
(5)      Retry using next mirror set "sourceforge"

How do you want to proceed? [3] 5
curl -f -L -O http://west.dl.sourceforge.net/sourceforge/maxwell/maxwell-0.5.1.tar.gz
% Total    % Received % Xferd  Average Speed          Time             Curr.
Dload  Upload Total    Current  Left    Speed
100  7856  100  7856    0     0  19838      0  0:00:00  0:00:00  0:00:00 6511k
</pre>
      <p>
        Der Tarball konnte noch nicht von den Fink-Spiegeln geholt werden, weil
        das Paket noch nicht akzeptiert wurde. Deshalb müssen sie auf den nächsten
        Satz von Spiegeln wechseln. Weitere Information dazu stehen in der
        <a href="/faq/comp-general.php#master-problems">FAQ</a>.
      </p>
      <p>
        Jetzt kann man die md5-Prüfsumme mit dem Kommando
        <code>md5sum /opt/sw/src/maxwell-0.5.1.tar.gz</code> erhalten und in der
        .info-Datei eintragen:
      </p>
<pre>
Source-MD5: ce5c354b2fed4e237524ad0bc59997a3
</pre>
      <p>Und jetzt klappt es auch mit <code>fink validate</code>, yippee!</p>
    
    <h2><a name="build">2.2 Paket erstellen</a></h2>
      
      <p>Jetzt können sie einfach versuchen, das Paket zu erstellen:</p>
<pre>
finkdev% fink -m --build-as-nobody rebuild maxwell
/usr/bin/sudo /opt/sw/bin/fink  build maxwell
Reading package info...
Updating package index... done.
Information about 3498 packages read in 32 seconds.
The following package will be built:
maxwell
gzip -dc /opt/sw/src/maxwell-0.5.1.tar.gz | /opt/sw/bin/tar -xvf -  \
--no-same-owner --no-same-permissions
maxwell-0.5.1/
maxwell-0.5.1/LICENSE
maxwell-0.5.1/Makefile
maxwell-0.5.1/maxwell.8
maxwell-0.5.1/maxwell.c
maxwell-0.5.1/README
./configure --prefix=/opt/sw
Can't exec "./configure": No such file or directory at \
/opt/sw/lib/perl5/Fink/Services.pm line 403.
</pre>
      <p>
        Das hat wohl noch nicht so gut geklappt. Lesen sie bitte nach, was in der
        Datei <code>/opt/sw/src/maxwell-0.5.1-1/maxwell-0.5.1/README</code>
        steht. Üblicherweise steht da in etwa:
      </p>
<pre>
To build type 'make'.

To install in /usr/local type 'sudo make install', to install elsewhere, type
'sudo make install prefix=/elsewhere'
</pre>
      <p>
        Mit anderen Worten: Man kann nicht die voreingestellten Skripte nehmen,
        sondern muss eigene version von CompileScript und InstallScript eintragen:
      </p>
<pre>
CompileScript: make
InstallScript: &lt;&lt;
#! /bin/sh -ev
make install prefix=%i
&lt;&lt;
</pre>
      <p>
        Man muss <code>prefix=%i</code> verwenden, denn <code>fink</code> erstellt
        die binäre .deb-Datei aus den Dateien in <code>%i</code>. Später werden diese
        Dateien mit dem Befehl <code>fink install maxwell</code> in <code>%p</code>
        installiert. Die Voreinstellung für <code>%p</code> ist
        <code>/opt/sw</code>. Weitere Details über <code>%p</code> und
        <code>%i</code> stehen in der <a href="/doc/packaging/format.php#percent">Anleitung für die Paketerstellung</a>.
      </p>
      <p>
        Normalerweise werden die Zeilen in den Skriptfeldern Zeile für Zeile an die
        Shell übergeben, aber mit der Zeile <code>#! /bin/sh -ev</code> lässt
        <code>fink</code> das Ganze als ein separates Skript ausführen.
        Der Parameter <code>-e</code> bedeutet "die on error" und
        <code>-v</code> bedeutet "verbose".
      </p>
      <p>Ein erneuter Versuch, das Paket zu erstellen und zu validieren:</p>
<pre>
finkdev% fink validate maxwell.info
Validating package file maxwell.info...
Package looks good!
finkdev% fink -m --build-as-nobody rebuild maxwell
/usr/bin/sudo /opt/sw/bin/fink  build maxwell
Reading package info...
Updating package index... done.
Information about 3498 packages read in 32 seconds.
The following package will be built:
maxwell
gzip -dc /opt/sw/src/maxwell-0.5.1.tar.gz | /opt/sw/bin/tar -xvf -  \
--no-same-owner --no-same-permissions
maxwell-0.5.1/
maxwell-0.5.1/LICENSE
maxwell-0.5.1/Makefile
maxwell-0.5.1/maxwell.8
maxwell-0.5.1/maxwell.c
maxwell-0.5.1/README
make
cc  -L/opt/sw/lib -c -o maxwell.o maxwell.c
cc  -I/opt/sw/include -o maxwell -framework IOKit -framework CoreFoundation maxwell.o
/bin/rm -rf /opt/sw/src/root-maxwell-0.5.1-1
/bin/mkdir -p /opt/sw/src/root-maxwell-0.5.1-1/opt/sw
/bin/mkdir -p /opt/sw/src/root-maxwell-0.5.1-1/DEBIAN
/var/tmp/tmp.1.A3sRc2
#! /bin/sh -ev
make install prefix=/opt/sw/src/root-maxwell-0.5.1-1/opt/sw
/usr/bin/install -d -m 755 /opt/sw/src/root-maxwell-0.5.1-1/opt/sw/doc/maxwell
/usr/bin/install -m 644 LICENSE /opt/sw/src/root-maxwell-0.5.1-1/opt/sw/doc/maxwell/LICENSE
/usr/bin/install -m 644 README /opt/sw/src/root-maxwell-0.5.1-1/opt/sw/doc/maxwell/README
/usr/bin/install -d -m 755 /opt/sw/src/root-maxwell-0.5.1-1/opt/sw/bin
/usr/bin/install -m 755 maxwell /opt/sw/src/root-maxwell-0.5.1-1/opt/sw/bin/maxwell
/usr/bin/install -d -m 755 /opt/sw/src/root-maxwell-0.5.1-1/opt/sw/man/man8
/usr/bin/install -m 644 maxwell.8 /opt/sw/src/root-maxwell-0.5.1-1/opt/sw/man/man8/maxwell.8
/bin/rm -f /opt/sw/src/root-maxwell-0.5.1-1/opt/sw/info/dir \
/opt/sw/src/root-maxwell-0.5.1-1/opt/sw/info/dir.old \
/opt/sw/src/root-maxwell-0.5.1-1/opt/sw/share/info/dir \
/opt/sw/src/root-maxwell-0.5.1-1/opt/sw/share/info/dir.old
Writing control file...
Finding prebound objects...
Writing dependencies...
Writing package script postinst...
dpkg-deb -b root-maxwell-0.5.1-1 /opt/sw/fink/dists/local/main/binary-darwin-powerpc
dpkg-deb: building package `maxwell' in \
`/opt/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb'.
</pre>
      <p>
        Anscheinend hat Fink alles am korrekten Platz installiert:
        <code>/opt/sw/src/root-maxwell-0.5.1-1</code>, von wo aus das Binärpaket
        <code>maxwell_0.5.1-1_darwin-powerpc.deb</code> erstellt wurde.
      </p>
      <p>
        Bitte beachten sie auch, wie <code>fink</code> automatisch einige Optionen
        für den Compiler setzt, wie den Zugang zu anderen Fink-Paketen
        (also <code>-I/opt/sw/include</code>).
      </p>
      <p>Schauen sie noch nach, was das binäre Paket enthält:</p>
<pre>
finkdev% dpkg -c \
/opt/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb
drwxr-xr-x root/admin        0 2004-07-15 09:40:38 ./
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/bin/
-rwxr-xr-x root/admin    29508 2004-07-15 09:40:39 ./opt/sw/bin/maxwell
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/doc/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/doc/maxwell/
-rw-r--r-- root/admin     1076 2004-07-15 09:40:39 ./opt/sw/doc/maxwell/LICENSE
-rw-r--r-- root/admin     1236 2004-07-15 09:40:39 ./opt/sw/doc/maxwell/README
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/man/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/man/man8/
-rw-r--r-- root/admin     1759 2004-07-15 09:40:39 ./opt/sw/man/man8/maxwell.8
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/var/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/var/lib/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/var/lib/fink/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/var/lib/fink/prebound/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./opt/sw/var/lib/fink/prebound/files/
-rw-r--r-- root/admin       16 2004-07-15 09:40:39 ./opt/sw/var/lib/fink/prebound/files/maxwell.pblist
</pre>
      <p>
        Sieht gut aus, oder? Aber es bleibt noch zu verifizieren, ob das Paket die
        Regeln von Fink für Pakete einhält. Validieren sie das Paket mit dem Kommando:
      </p>
<pre>
finkdev% fink validate \
/opt/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb
Validating .deb file \
/opt/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb...
Warning: File installed into deprecated directory /opt/sw/doc/
Offender is /opt/sw/doc/
Warning: File installed into deprecated directory /opt/sw/doc/
Offender is /opt/sw/doc/maxwell/
Warning: File installed into deprecated directory /opt/sw/doc/
Offender is /opt/sw/doc/maxwell/LICENSE
Warning: File installed into deprecated directory /opt/sw/doc/
Offender is /opt/sw/doc/maxwell/README
Warning: File installed into deprecated directory /opt/sw/man/
Offender is /opt/sw/man/
Warning: File installed into deprecated directory /opt/sw/man/
Offender is /opt/sw/man/man8/
Warning: File installed into deprecated directory /opt/sw/man/
Offender is /opt/sw/man/man8/maxwell.8
</pre>
      <p>
        Oha. Noch stimmt etwas nicht. Schauen sie noch einmal in der
        <a href="/doc/packaging/fslayout.php#fhs">Anleitung für die Paketerstellung</a>
        nach. Da steht, dass Seiten für man in <code>/opt/sw/share/man</code>
        installiert werden müssen und Dateien wie <code>README</code> in
        <code>/opt/sw/share/doc/%n</code>. Schaut man sich den
        <code>Makefile</code> von maxwell an, sieht man, dass mandir und datadir
        gesetzt werden können:
      </p>
<pre>
prefix = /usr/local
mandir = ${prefix}/man
man8dir = ${mandir}/man8
bindir = ${prefix}/bin
datadir = ${prefix}/doc/maxwell
</pre>
      <p>Das einfachste ist es, den InstallScript abzuändern:</p>
<pre>
make install prefix=%i mandir=%i/share/man datadir=%i/share/doc/%n
</pre>
      <p>und das Paket neu zu erstellen:</p>
<pre>
finkdev% fink -m --build-as-nobody rebuild maxwell
</pre>
      <p>
        (Man muss <code>fink rebuild</code> nehmen, weil <code>fink build</code>
        nichts bewirken würde, weil das Paket bereits erfolgreich erstellt wurde.)
      </p>
      <p>
        Überprüfen sie den Inhalt der .deb-Datei (mit <code>dpkg -c</code>) und
        und schauen wie, wo die Dateien jetzt installiert werden. Dann validieren die
        .deb-Datei mit <code>fink validate</code>. Ist alles in Ordnung, können sie das
        Paket mit diesem Kommando installieren:
      </p>
<pre>
finkdev% fink install maxwell
/usr/bin/sudo /opt/sw/bin/fink  install maxwell
Information about 3377 packages read in 30 seconds.
The following package will be installed or updated:
maxwell
dpkg -i /opt/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb
Selecting previously deselected package maxwell.
(Reading database ... 56046 files and directories currently installed.)
Unpacking maxwell (from .../maxwell_0.5.1-1_darwin-powerpc.deb) ...
Setting up maxwell (0.5.1-1) ...
</pre>
      <p>Jetzt kann man das Programm mit diesem Kommando ausführen:</p>
<pre>
finkdev% maxwell
</pre>
      <p>
        Gratuliere. Sie haben ihr erstes Fink-Paket erstellt! Jetzt können sie
        es selbst versuchen, indem sie dieser
        <a href="/doc/quick-start-pkg/index.php">Einführung</a> vom Anfang
        an folgen.
      </p>
      <p>Wir sind auf ihre Beiträge zu Fink gespannt!</p>
    
  
<?php include_once "../../footer.inc"; ?>


