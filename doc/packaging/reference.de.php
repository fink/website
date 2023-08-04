<?php
$title = "Paket erstellen - Referenz";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:54:31';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="prev" href="compilers.php?phpLang=de" title="Compiler">';


include_once "header.de.inc";
?>
<h1>Paket erstellen - 6. Referenz</h1>



<h2><a name="build">6.1 Der Build-Prozess</a></h2>
<p>
Für das Verständnis einiger Felder, muss man einige Details über den
Build-Prozess von Fink wissen: Der Build-Prozess besteht aus fünf Phasen:
Auspacken, patchen, compilieren, installieren und erstellen (build). Die
Pfade des nachfolgenden Beispiel sind für eine Installation in
<code>/opt/sw</code> und für das Paket gimp-1.2.1-1.
</p>
<p>
In der <b>Auspack-Phase</b> wird das Verzeichnis
<code>/opt/sw/src/fink.build/gimp-1.2.1-1</code> erzeugt und der
Quell-Tarball oder mehrere darin ausgepackt. Das erzeugt meistens ein
Verzeichnis gimp-1.2.1, das die Quellen enthält. Alle folgenden Schritte
erfolgen in diesem Verzeichnis, also in
<code>/opt/sw/src/fink.build/gimp-1.2.1-1/gimp-1.2.1</code>. Details
dieser Phase können über die Felder SourceDirectory, NoSourceDirectory und
Source<b>N</b>ExtractDir kontrolliert werden.
</p>
<p>
In der <b>Patch-Phase</b> werden die Quelldateien gepacht, so dass das Paket
auf Darwin/Mac OS X erstellt werden kann. Die Aktionen werden über die Felder
UpdateConfigGuess, UpdateLibtool, Patch und PatchScript genau in dieser
Reihenfolge ausgeführt.
</p>
<p>
In der <b>Compile-Phase</b> werden die Quelldateien konfiguriert und
compiliert. Normalerweise bedeutet dies, dass das Skript <code>configure</code>
mit einigen Parametern und dann das Kommando <code>make</code> ausgeführt
werden. Details dazu stehen in der Beschreibung des Felds CompileScript.
Sind Tests für die Erstellung aktiviert (ein neues Feature in Fink 0.25, derzeit
wird es im Betreuer-Modus aktiviert), wird das Test-Skript direkt nach dem
Compile-Skript ausgeführt.
</p>
<p>
In der <b>Installationsphase</b> wird das Paket in einem temporären
Verzeichnis, <code>/opt/sw/src/fink.build/root-gimp-1.2.1-1</code> (= %d),
installiert. (Beachten sie den Teil "root-" im Namen.) Alle Dateien, die
normalerweise in <code>/opt/sw</code> installiert würden, werden stattdessen
in <code>/opt/sw/src/fink.build/root-gimp-1.2.1-1/opt/sw</code> (= %i = %d%p)
installiert. Weitere Details stehen in der Beschreibung des Felds InstallScript.
</p>
<p>
(<b>In Fink 0.9.9 eingeführt.</b>
Man kann mit einer einzigen Paketbeschreibung mehrere Pakete erzeugen, indem man
das Feld <code>SplitOff</code> benutzt. Gegen Ende der Installationsphase wird
für jedes Paket ein separates Installationsverzeichnis erzeugt und die Dateien
dann in das jeweilige Verzeichnis verschoben.)
</p>
<p>
In der <b>Erstellungsphase</b> wird eine binäre Datei (.deb) aus dem
temporären Installationsverzeichnis erzeugt. Diese Phase kann nicht direkt
beeinflusst werden, aber diverse Informationen aus der Paketbeschreibung werden
verwendet um eine Datei <code>control</code> für dpkg zu erstellen.
</p>



<h2><a name="fields">6.2 Felder</a></h2>
<p>
Die Felder wurden in mehrere Kategorien eingeteilt. Es kann auch sein, dass
das eine oder andere Feld nicht beschrieben ist. <code>:-)</code>
</p>
<p><b>Start Daten:</b></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Package</td><td>
<p>
Der Paketname.
Er kann Kleinbuchstaben, Zahlen und die Sonderzeichen '.', '+' und '-'
enthalten, aber keine Unterstriche ('_') oder Grossbuchstaben.
Ein Pflichtfeld.
</p>
<p>
Eine Prozenterweiterung wird in diesem Feld nur für %N, %{Ni}, %type_raw[],
und %type_pkg[] vorgenommen.
</p>
<p>
Gemäß den Richtlinien für Finkpakete, muss ein Paket immer mit den gleichen
Optionen übersetzt werden. Bei verschiedenen Varianten eines Pakets (siehe die
Dokumentation zum Feld <code>Type</code>) muss man die jeweilige Variante in das
Feld <code>Package</code> einpflegen (siehe die Dokumentation für die
Prozenterweiterung %type_pkg[]). Auf diese Weise erhält jede Variante einen
eindeutigen Namen und die Namen zeigen, welche Varianten zur Verfügung stehen.
Beachten sie, dass die Prozenterweiterung %type_pkg[] und %type_raw[] relativ
neu sind und total inkompatibel mit älteren Versionen von Fink. Deshalb müssen
solche Paketbeschreibungen in ein Feld <code>InfoN</code> mit N ≥ 2 eingebettet
werden.
</p>
</td></tr><tr valign="top"><td>Version</td><td>
<p>
Die upstream-Versionsnummer.
Es gelten die gleichen Einschränkungen wie für das Feld Package
Ein Pflichtfeld.
</p>
<p>
Beachten sie, dass einige Programm seltsame Schemen für ihre Versionsnummern
verwenden, die die Sortierung durcheinander bringen oder Zeichen enthalten, die
nicht erlaubt sind. In diesen Fällen muss sie den upstream-Wert so umwandeln,
dass er nur erlaubte Zeichen enthält und eine korrekte Sortierung ermöglicht.
Wenn sie sich über die Sortierung von Zeichenketten nicht sicher sind, können
sie das Kommando <code>dpkg</code> für einen Test verwenden. Im folgenden
Beispiel
</p>
<pre>  dpkg --compare-versions 1.2.1 lt 1.3 &amp;&amp; echo "true"</pre>
<p>
wird "true" ausgegeben, weil die Zeichenkette "1.2.1" vor
"1.3" kommt. Mehr Details gibt es auf der man-Page von
<code>dpkg</code>.
</p>
</td></tr><tr valign="top"><td>Revision</td><td>
<p>
Die Revision des Pakets.
Erhöhen sie diese Zahl, wenn sie eine neue Paketbeschreibung für dieselbe
upstream-Version erstellen.
Revisionsnummern beginnen mit 1.
Ein Pflichtfeld.
</p>
<p>
Finks Richtlinien verlangen, dass die Revisionsnummer <b>jedes</b> Mal erhöht
werden muss, wenn Änderungen in der Datei <code>.info</code> Änderungen
in der binären (kompilierten) Form des Pakets (die Datei
<code>.deb</code>) zur Folge haben. Beispiele sind Änderungen im
Feld <code>Depends</code> oder in anderen Paketlisten, Hinzufügen, Entfernen
oder Umbenennen von SplitOff-Paketen oder Dateien zwischen diesen hin und her
schieben. Erfordert die Migration eines Paket in einen neuen Baum (z. B. von
10.2 nach 10.3) solche Änderungen, sollten sie die Revision um 10 oder mehr
im neuen Baum erhöhen, damit noch Platz für Änderungen im alten Baum bleibt.
</p>
</td></tr><tr valign="top"><td>Architecture</td><td>
<p>
Dies ist Komma-separierte Liste der Architekturen, für die das Paket (und jedes
SplitOff-Paket in der Beschreibung) vorgesehen ist.
Die gültigen Architekturen sind ab Fink-0.29.5 <code>powerpc</code>,
<code>i386</code> und <code>x86_64</code>.
Ist dieses Feld vorhanden und auch nach Auswertungen von Bedingungen nicht leer,
ignoriert Fink die Paketbeschreibung, wenn die lokal vorhandene Architektur
nicht aufgelistet ist. Ist das Feld weg gelassen oder der Wert leer, werden
alle Architekturen akzeptiert.
</p>
<p>
Ein häufiger Grund für dieses Feld ist, dass ein Paket einen Compiler vor
gcc-4.0 benötigt (oder auch Pakete, die von solchen Paketen abhängen) und für
die Architektur <code>powerpc</code> ist.
</p>
<p>
Diese Feld unterstützt auch die Standardsyntax für Bedingungen für jeden Wert in
der Werteliste. Ebenso können Prozenterweiterungen verwendet werden (Beim Feld
<code>Depends</code> werden weitere Details beschrieben). Damit können bestimmte
Varianten auf bestimmte Architekturen beschränkt werden. Im folgenden Beispiel:
</p>
<pre>  Package: foo-pm%type_pkg[perl]
  Type: perl (5.8.8 5.10.0)
  Architecture: (%type_pkg[perl] = 5100) x86_64</pre>
<p>
ist die Variante foo-pm5100 für <code>x86_64</code> und bei der Varianten
foo-pm588 bleibt das Feld leer, d. h. diese Variante ist für alle Architekturen.
</p>
<p>
Das Beispiel oben zeigt eine recht verbreitete Verwendung des Felds: Da einige
Module auf 10.6 nicht mit dem System-Perl 5.10.0 als 32-bit (i386) erstellt
werden können, schränkt dieses Feld die Perl-Pakete mit mehreren Typen auf
bestimmte Systeme ein.
</p>
</td></tr><tr valign="top"><td>Distribution</td><td>
<p>
Dies ist Komma-separierte Liste der Distributionen für die das Paket (und jedes
SplitOff-Paket in der Beschreibung) vorgesehen ist.
Derzeit sind die gültigen Distributionen
<code>10.4</code>,
<code>10.5</code>,
<code>10.6</code>,
<code>10.7</code>,
<code>10.8</code>,
<code>10.9</code>,
<code>10.10</code>,
<code>10.11</code>,
<code>10.12</code>,
<code>10.13</code>,
<code>10.14</code>,
<code>10.14.5</code>,
and <code>10.15</code>
. Ist dieses Feld vorhanden und auch nach Auswertungen von Bedingungen nicht leer,
ignoriert Fink die Paketbeschreibung, wenn die lokal vorhandene Distribution
nicht aufgelistet ist. Ist das Feld weg gelassen oder der Wert leer, werden
alle Distributionen akzeptiert.
(Eingeführt in Fink 0.26.0.)
</p>
<p>
Seit den Fink-Distributionen für <code>10.9</code> durch <code>10.14.5</code> teilen sie sich ein gemeinsames Set an finkinfo-Dateien. Eine
übliche Verwendung des Felds ist, die Distributionen auszuklammern, für die
das Paket nicht erstellt werden kann.
</p>
<p>
Diese Feld unterstützt auch die Standardsyntax für Bedingungen für jeden Wert in
der Werteliste. Ebenso können Prozenterweiterungen verwendet werden (Beim Feld
<code>Depends</code> werden weitere Details beschrieben). Damit können bestimmte
Varianten auf bestimmte Distributionen beschränkt werden. Im folgenden Beispiel:
</p>
<pre>  Package: foo-pm%type_pkg[perl]
  Type: perl (5.12.3 5.12.4)
  Distribution: (%type_pkg[perl] = 5123) 10.7, (%type_pkg[perl] = 5123) 10.8</pre>
<p>
ist die Variante foo-pm5123 für die Distributionen <code>10.7, 10.8</code>
und bei der Varianten foo-pm5124 bleibt das Feld leer, d. h. diese Variante ist
für alle Distributionen.
</p>
<p>
Da die Python-Version 2.5 für die Distributionen 10.7+ nicht zur Verfügung steht
und die Perl-Versionen von Distrivution zu Distribution variieren, wird diese
Feld in diesen Paketen häufig vor. Als Referenz beschreiben wir hier die
Verfügbarkeit verschiedener Perl-Versionen für die Distributionen 10.3 bis 13.0
(<b>Fett</b>-gedruckte Systeme zeigen die Version von Sytem-Perl an):
</p>
<pre>
    perl 5.6.0:  10.3
    perl 5.8.0:  10.3
    perl 5.8.1:  <b>10.3</b>, 10.4
    perl 5.8.4:  10.3, 10.4
    perl 5.8.6:  10.3, <b>10.4</b>, 10.5
    perl 5.8.8:        10.4, <b>10.5</b>, 10.6
    perl 5.10.0:             10.5, <b>10.6</b>
    perl 5.12.3:                         <b>10.7</b>, 10.8, 10.9
    perl 5.12.4:                         10.7, <b>10.8</b>, 10.9
    perl 5.16.2:                         10.7, 10.8, <b>10.9</b>, 10.10, 10.11, 10.12, 10.13
    perl 5.18.2:                         10.7, 10.8, 10.9, <b>10.10</b>, <b>10.11</b>, <b>10.12</b>, <b>10.13</b>, <b>10.14</b>, 10.14.5, 10.15, 11.0, 11.3, 12.0, 13.0
    perl 5.18.4:                                     10.9, 10.10, 10.11, 10.12, 10.13, 10.14, <b>10.14.5</b>, <b>10.15</b>, 11.0, 11.3, 12.0, 13.0
    perl 5.28.2:                                     10.9, 10.10, 10.11, 10.12, 10.13, 10.14, 10.14.5, 10.15, <b>11.0</b>, 11.3, 12.0, 13.0
    perl 5.30.2:                                     10.9, 10.10, 10.11, 10.12, 10.13, 10.14, 10.14.5, 10.15, 11.0, <b>11.3</b>, 12.0, 13.0
    perl 5.30.3:                                     10.9, 10.10, 10.11, 10.12, 10.13, 10.14, 10.14.5, 10.15, 11.0, 11.3, <b>12.0</b>, <b>13.0</b>
</pre>
<p>
Eine Möglichkeit, alle unterstützten Varianten in einer einzigen finkinfo-Datei
einzuschließen, ist diese:
</p>
<pre>  Package: foo-pm%type_pkg[perl]
  Type: perl (5.8.8 5.10.0 5.12.3 5.12.4 5.16.2)
  Distribution: &lt;&lt;
   (%type_pkg[perl] = 588) 10.6,
   (%type_pkg[perl] = 5100) 10.6,
   (%type_pkg[perl] = 5123) 10.7, (%type_pkg[perl] = 5123) 10.8, (%type_pkg[perl] = 5123) 10.9,
   (%type_pkg[perl] = 5124) 10.7, (%type_pkg[perl] = 5124) 10.8, (%type_pkg[perl] = 5124) 10.9,
   (%type_pkg[perl] = 5162) 10.7, (%type_pkg[perl] = 5162) 10.8, (%type_pkg[perl] = 5162) 10.9
  &lt;&lt;</pre>
<p>
Beachten sie, dass wir alte Distributionen, wie 10.2 oder 10.4-transitional,
nicht einschließen, denn die Finkversionen für diese Distributionen unterstützen
dieses Feld nicht.
</p>
</td></tr><tr valign="top"><td>Epoch</td><td>
<p>
<b>Eingeführt in Fink 0.12.0.</b>
Diese optionale Feld kann dazu benutzt werden, die Epoche eines Pakets zu
beschreiben. (Ist es nicht angegeben, ist die Voreinstellung 0). Weitere Details
stehen im
<a href="http://www.debian.org/doc/debian-policy/ch-controlfields.html#s-f-Version">Debian
Policy Manual</a>.
Da Fink und die dahinter stehenden Debian-Tools als eindeutigen Bezeichner für
ein Paket die Abfolge Name-Version-Revision nehmen, darf man keine Pakete
definieren, die sich lediglich in der Epoche unterscheiden.
</p>
<p>
In einer Zeichenkette für die Version kommt die Epoche vor der Version,
abgetrennt durch ein Semikolon (1:3.14-2). Beachten sie, dass das Feld Epoche
weder in <code>%v</code> noch in <code>%f</code> enthalten ist. Fügt man das
Feld Epoche in einer Paketbeschreibung hinzu, muss man auch die Abhängigkeiten
aktualisieren. Fügt man z. B. in einem Paket <code>Epoch: 1</code> hinzu und das
Splitoff foo-dev deklariert <code>Depends: foo-shlibs (= %v-%r)</code>, muss man
das zu <code>Depends: foo-shlibs (= %e:%v-%r)</code> aktualisieren.
</p>
</td></tr><tr valign="top"><td>Description</td><td>
<p>
Eine kurze Beschreibung des Pakets (Was ist es?). Diese Beschreibung ist
einzeilig und wird in Überscihtslisten verwendet. Deshalb muss es kurz und
informativ sein. Die Becshreibung soll kürzer als 45 Zeichen sein und muss
kürzer als 60 Zeichen sein. Der Paketname muss in diesem Feld nicht vorkommen -
diese Beschreibung wird immer im entsprechenden Kontext verwendet.
Ein Pflichtfeld.
</p>
</td></tr><tr valign="top"><td>Type</td><td>
<p>
Dieses Feld kann auf <code>bundle</code> gesetzt werden.
Bundle-Pakete werden dazu benutzt, einen Satz von Paketen in einer Gruppe
zusammen zu fassen. Ein Bundle-Paket hat nur Abhängigkeiten, aber keinen Code
oder installierte Dateien. Die Felder Source, PatchScript, CompileScript,
InstallScript und verwandte Felder werden für Bundle-Pakete ignoriert.
</p>
<p>
Das Feld <code>nosource</code> ist ähnlich. Es bedeutet, dass es keinen
Quellcode-Tarball gibt, nichts herunter geladen wird und die Auspack-Phase nur
ein leeres Verzeichnis erzeugt.
Die Phasen Patch, Compile und Install werden aber normal ausgeführt.
Man kannn also den ganzen Code in der Patchphase erzeugen und im InstallSkript
einige Verzeichnisse erzeugen.
Ab Fink 0.18.0 kann man das selbe Verhalten auch mit den Feld
<code>Source: none</code> erzeugen. Dann kann man ds Feld Type für andere
Zwecke benutzen(<code>Type: perl</code>, usw.)
</p>
<p>
Ab Fink 0.9.5 gibt es den Typ <code>perl</code>, durch den alternative
Voreinstellungen in den Compile- und Install-Skripten verwendet werden.
Ab Fink 0.13.0 gibt es eine weitere Variante diesen Typs
<code>perl $version</code>, bei dem $version ein bestimmte Version von Perl ist
die aus 3 Zahlen besteht, die mit Punkten getrennt werden, z. B.
<code>perl 5.6.0</code>.
</p>
<p>
Seit einer CVS-Version von Fink nach Fink-0.19.2 wurde die Verwendung von
Sprache/Sprachenversion verallgemeinert, so dass Paketbetreuer Typen und
Subtypen definieren können und ein Paket mehr als einen Typ haben können.
Typ und Subtyp sind beliebige Zeichenketten ohne Leerzeichen (Klammern,
Kommata und Prozentzeichen sollten ebenfalls nicht benutzt werden);
die Prozenterweiterung wird NICHT angewendet und der Typ (aber nicht der Subtyp)
wird in Kleinbuchstaben konvertiert. Mehrere Typen (jeder mit einem optionalen,
leerzeichen-separierten Subtyp) werden komma-separiert aufgelistet.
</p>
<p>
Zusätzlich existiert das Konzept von "variants", bei dem in einer
einzigen .info-Datei eine Familie von Paketen beschrieben werden, bei denen
verschiedene Optionen eingeschaltet sind. Der Schlüssel zu dem ganzen Prozess
ist eine Liste von Subtypen. Statt einer einzigen Zeichenkette nutzt man eine
Leerzeichen-separierte Liste von Zeichenketten in Klammern. Fink erzeugt für
jeden Subtyp in der Liste einen Klon und ersetzt die Liste mit dem jeweiligen
Subtyp, z. B.:
</p>
<pre>Type: perl (5.12.3 5.12.4)</pre>
<p>
ergibt zwei Paketbeschreibungen, eine die sich verhält als ob
<code>Type: perl 5.12.3</code> und eine andere als ob
<code>Type: perl 5.12.4</code> gesetzt ist. Die spezielle Subtypliste
"(boolean)" steht für eine Liste, die den Typ selbst und einen Punkt
enthält. Folgende zwei Formen sind identisch:
</p>
<pre>Type: -x11 (boolean)
Type: -x11 (-x11 .)</pre>
<p>
Die Erweiterung der Subtyp-Liste und das Klonieren der Pakete ist rekursiv.
Stehen mehrere Typen in der Subtyp-Liste erhält man alle Kombinationen:
</p>
<pre>Type: -ssl (boolean), perl (5.12.3 5.12.4)</pre>
<p>
Man kann eine bestimmte Subtyp-Variante in anderen Felder mit
%type_raw[] und %type_pkg[] verwenden. Im folgenden zwei Beispiele mit
.info-Fragmenten:
</p>
<pre>Info2: &lt;&lt;
Package: foo-pm%type_pkg[perl]
Type: perl (5.12.3 5.12.4)
Depends: perl%type_pkg[perl]-core
 &lt;&lt;</pre>
<pre>Info2: &lt;&lt;
Package: bar%type_pkg[-x11]
Type: -x11 (boolean)
Depends: (%type_raw[-x11] = -x11) x11
CompileScript:  &lt;&lt;
  #!/bin/bash -ev
  if [ "%type_raw[-x11]" == "-x11" ]; then
    ./configure %c --with-x11
  else
    ./configure %c --without-x11
  fi
  make
&lt;&lt;
&lt;&lt;</pre>
<p>
Ab Fink 0.26.0 gibt es den speziellen <code>Type: -64bit</code>, der die
neue Prozenterweiterung <code>%lib</code> einführt und auch die Voreinstellung
für <code>LDFLAGS</code> ändert. Kombiniert mit der neuen Konstruktion
%type_num[] kann man so in einer einzigen .info-Datei sowohl 32-bit als auch
64-bit Versionen einer Bibliothek erzeugen.
Hier ein Beispiel:
</p>
<pre>Info2: &lt;&lt;
Package: foo%type_pkg[-64bit]
Type: -64bit (boolean)
Depends: (%type_raw[-64bit] = -64bit) 64bit-cpu
ConfigureParams: --libdir='${prefix}/%lib'
SplitOff: &lt;&lt;
 Package: %N-shlibs
 Files: %lib/libfoo.*.dylib
 Shlibs: &lt;&lt;
    %p/%lib/libfoo.1.dylib 1.0.0 %n (&gt;= 1.0-1) %type_num[-64bit]
  &lt;&lt;
&lt;&lt;
&lt;&lt;</pre>
<p>
Beachten sie, dass <code>Type: -64bit</code> für die x86_64-Architektur nicht
angemessen ist, denn dafür ist die Voreinstellung, dass 64-bit Bibliotheken
erstellt und in <code>%i/lib</code> abgespeichert werden.
</p>

</td></tr><tr valign="top"><td>License</td><td>
<p>
Dieses Feld spezifiziert die Lizenz, unter der das Paket vertrieben werden kann.
Der Wert muss einer aus dem Kapitel
<a href="policy.php?phpLang=de#licenses">Packet-Lizensen</a>
weiter oben in diesem Dokument sein.
Zusätzlich darf dieses Feld nun verwendet werden, wenn das Paket auch
tatsächlich die Richtlinien dafür einhält, d. h. eine Kopie der Lizenz im
Verzeichnis doc des Pakets installiert.
</p>
</td></tr><tr valign="top"><td>Maintainer</td><td>
<p>
Name und Email-Adresse der Person, die für das Paket verantwortlich ist
Das Feld ist ein pflichtfeld und es darf nue ein Name und eine Adresse im
folgenden Format angegeben werden:
</p>
<pre>Vorname Familienname &lt;Nutzer@host.domain.com&gt;</pre>
</td></tr><tr valign="top"><td>InfoN</td><td>
<p>
Diese Feld erlaubt Fink Syntaxänderungen in den Paketbeschreibungen zu
implementieren, die nicht rückwärtskompatibel sind. Eine gegebene Version von
Fink ist auf die maximale Zahl "N" gesetzt, die für sie machbar ist. Pakete
mit einem höheren N werden ignoriert. Deshalb sollte dieser Mechanismus nur
verwendet werden, wenn es notwendig ist. Ansonsten werden Nutzer mit älteren
Finkversionen unnötigerweise ausgeschlossen. Verwenden sie diesen Mechanismus,
indem sie die gesamte Paketbeschreibung in das Feld InfoN einschließen.
Sie können bei Datei-Format weiter oben nachschauen, wie die Syntax für
mehrzeilige Felder aussieht.
Es folgen die Features des jeweiligen InfoN-Niveau und die erste Version von
Fink, die es unterstützt:
</p>
<ul>
<li><code>Info2</code> (fink ≥ 0.20.0): Die Möglichkeit, Prozenterweiterung im
  Hauptfeld <code>Package</code> der .info-Datei und die Prozenterweiterung
  <code>%type_*</code> im Feld <code>Package</code> von <code>SplitOff</code>-
  (und <code>SplitOff<b>N</b></code>-)Paketen zu nutzen.</li>
<li><code>Info3</code> (fink ≥ 0.25.0): Schönes Einrücken in .info-Dateien,
  keine Unterstützung für Mehrfachzeilen nach RFC-822 und Kommentare in den
  Feldern pkglist.</li>
<li><code>Info4</code> (fink ≥ 0.26.2): fügt die Erweiterung %V hinzu und
  erlaubt <code>%lib</code> im Feld <code>ConfigureParams</code>.</li>
</ul>
</td></tr></table>

<p><b>Abhängigkeiten:</b></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Depends</td><td>
<p>
Dieses Feld enthält die Liste der Pakete, die installiert werden müssen, bevor
das Paket erstellt werden kann. Die Prozenterweiterung kann in diesem Feld
verwendet werden (genau wie auch in den anderen Feldern dieser Sektion:
BuildDepends, RuntimeDepends, Provides, Conflicts, Replaces, Recommends,
Suggests und Enhances). Normalerweise ist es eine Komma-separierte Liste mit
den Paketnamen, aber Fink unterstützt in der gleichen Syntax wie dpkg auch
Alternativen und Versionen.
Ein Beispiel mit allen Varianten:
</p>
<pre>Depends: &lt;&lt;
	daemonic (&gt;= 20010902-1),
	emacs | xemacs
&lt;&lt;</pre>
<p>
Das Layout ist das bevorzugte Format für das Feld <code>Depends</code> und
ähnliche Felder. Das Feld benutzt die Zeichen <code>&lt;&lt;</code> für
Mehrfachzeilen. Jedes Paket steht in alphabetischer Ordnung in einer separaten,
eingerückten Zeile. Hat das Feld nur einen einzigen Eintrag, kann auch das
vereinfachte Format <code>Field: value</code> verwendet werden.
</p>
<p>
Beachten sie, dass es keine Möglichkeit für optionale Abhängigkeiten gibt.
Funktioniert ein Paket sowohl mit als auch ohne ein anderes Paket, dann müssen
sie sicher stellen, dass das Paket auch nicht verwendet wird, auch wenn es
vorhanden ist. Andernfalls müssen sie das Paket in das Feld <code>Depends</code>
aufnehmen.
Wollen sie beide Optionen anbieten, müssen sie zwei separate Pakete erstellen,
z. B. wget und wget-ssl.
</p>
<p>
Ausführungsreihenfolge der Operationen: Ein logisches "OR" (Liste der
Alternativen) hat höhere Priorität (verknüpft enger) als ein logisches
"AND" zwischen den Paketen (oder einem Satz an Alternativen) in der
Komma-separierten Liste. Anders als die Verwendung von Klammern in
arithmetischen Ausdrücken gibt es im Feld <code>Depends</code> und verwandten
Feldern keine Möglichkeit für alternative Paketgruppen oder für die eine
Änderungen der Ausführungsreihenfolge der Operationen.
</p>
<p>
Beginnend mit einer post-0.18.2 CVS-Version of Fink kann man bedingte
Abhängigkeiten verwenden. Diese kann man dadurch ausdrücken, dass man
<code>(Zeichenkette1 op Zeichenkette2)</code> vor den Paketnamen platziert. Die
Prozenterweiterung wird wie gewohnt ausgeführt und dann werden die beiden
Zeichenketten, von denen keine leer sein kann, mit Hilfe eines der Operatoren
<code>op</code> (&lt;&lt;, &lt;=, =, !=, &gt;&gt;, &gt;=) verglichen. Das
folgende Paket wird nur berücksichigt, wenn der Vergleich wahr ist.
</p>
<p>
Sie können dieses Format nutzen, um die Pflege mehrerer ähnlicher Pakete zu
vereinfachen. Beide Pakete elinks und elinks-ssl könnten z. B. folgendes
auflisten:
</p>
<pre>Depends: &lt;&lt;
	expat-shlibs,
	(%n = elinks-ssl) openssl097-shlibs
&lt;&lt;</pre>
<p>Das hätte den gleichen Effekt, wie wenn elinks folgendes auflisten würde:</p>
<pre>Depends: expat-shlibs</pre>
<p>und elinks-ssl dieses:</p>
<pre>Depends: expat-shlibs, openssl097-shlibs</pre>
<p>
In einer alternativen Syntax, könnenten sie auch eine
<code>(Zeichenkette)</code> angeben, womit sie wahr ist, wenn die
<code>Zeichenkette</code> nicht leer ist, z. B.:
</p>
<pre>Package: nethack%type_pkg[-x11]
Type: -x11 (boolean)
Depends: (%type_pkg[-x11]) x11</pre>
<p>
Dies würde das Paket x11 als Abhängigkeit für die Variante nethack-x11 setzen,
aber nicht die Variante nethack.
</p>
<p>
Beachten sie folgendes: Verwenden sie die Felder Depends/BuildDepends für
dynamische Bibliothekspakete, für die es mehrere Hauptversionen gibt, dürfen
sie folgendes <b>nicht</b> deklarieren:
</p>
<pre>  Package: foo
  Depends: id3lib3.7-shlibs | id3lib4-shlibs
  BuildDepends: id3lib3.7-dev | id3lib4-dev</pre>
<p>
auch wenn ihr Paket mit jeder Bibliothek funktionieren sollte. Sie müssen eine
auswählen (vorzugsweise die mit der höchsten Version, die verwendet werden kann)
und verwenden sie in ihrem Paket diese Version durchgängig.
</p>
<p>
Wie im Kapitel über die Richtlinien über
<a href="policy.php?phpLang=de#sharedlibs">dynamische Bibliotheken</a>
erklärt, kann immer nur ein Paket -dev installiert sein und jedes hat Links
mit dem gleichen Namen, die auf verschiedene Dateinamen im zugehörigen Paket
-shlibs zeigen können. Kompiliert man das Paket foo, wird der tatsächliche
Dateiname (im Paket -shlibs) fest in das Binärprogramm foo übernommen. Dies
bedeutet, dass das Paket genau dieses bestimmte Paket -shlibs benötigt, das zu
dem Paket -dev gehört, das zur Compile-Zeit installiert war. Deshalb kann
das Feld <code>Depends</code> nicht so aussehen, dass irgendeines ausreicht.
</p>
<p>
In der Vergangenheit hingen nicht-eseentielle Pakete implizit von essentiellen
ab; dies ist nicht mehr der Fall.
</p>
</td></tr><tr valign="top"><td>BuildDepends</td><td>
<p>
<b>Eingeführt in Fink 0.9.0.</b>
Eine Liste mit Abhängigkeiten, die nur für die Erstellungsphase gilt.
Man kann sie nutzen, um Tools aufzulisten (z. B. flex), die man für das
Erstellen des Pakets benötigt, aber nicht zur Laufzeit.
Es hat die gleiche Syntax wie das Feld <code>Depends</code>. Sind die
Test-Suites beim Erstellen eines Pakets aktiviert, werden die Abhängigkeiten
des Felds <code>TestDepends</code> dem Feld <code>BuildDepends</code> hinzu
gefügt.
</p>
</td></tr><tr valign="top"><td>RuntimeDepends</td><td>
<p>
<b>Eingeführt in Fink 0.32.0.</b>
Eine Liste mit Abhängigkeiten, die nur für die Laufzeit gilt, also wenn
das Paket installiert ist.
Dieses Feld kann genutzt werden, um Pakete aufzulisten, die man zur Laufzeit
benötigt, aber nicht beim Erstellen des Pakets.
Es hat die gleiche Syntax wie das Feld <code>Depends</code>.
</p>
</td></tr><tr valign="top"><td>Provides</td><td>
<p>
Eine komma-separierte Liste von Paketnamen, die dieses Paket zur Verfügung
stellt.
Wenn ein Paket namens "pine" <code>Provides: mailer</code> deklariert, dann ist
jede Abhängigkeit von einem Paket "mailer" erfüllt, wenn "pine" installiert ist.
Meisten wird man diese Pakete auch in den Feldern <code>Conflicts</code>
und <code>Replaces</code> auflisten.
</p>
<p>
Beachten sie bitte, dass im Feld <code>Provides</code> keine Versionen verwendet
werden können. Die Pakete erben weder die Version des Elternpakets noch ist eine
Syntax für die Angabe einer Version definiert. Darüber hinaus gilt eine
Abhängigkeit mit einer bestimmten Version als nicht erfüllt. Damit ist es
relativ gefährlich, wenn mehrere Varianten dasselbe Paket in
<code>Provides</code> deklarieren, weil die Versionsabhängigkeit nicht
berücksichtigt werden kann. Deklarieren z. B. sowohl das Paket foo-gnome als
auch das Paket foo-nognome ein <code>Provides: foo</code>, ist die Abhängigkeit
<code>Depends: foo (&gt; 1.1)</code> in einem anderen Paket nicht erfüllt.
</p>
</td></tr><tr valign="top"><td>Conflicts</td><td>
<p>
Eine komma-separierte Liste von Paketnamen, die nicht gleichzeitig mit diesem
Paket installiert sein dürfen.
Virtuellen Pakete ist es erlaubt, Pakete aufzulisten, die auch im Feld
<code>Provides</code> stehen; sie werden entsprechend behandelt.
Dieses Feld unterstützt auch versionierte Abhängigkeiten wie das Feld
<code>Depends</code>, aber keine Alternativen (das wäre auch nicht sinnvoll).
Ist ein Paket in seinem eigenen Feld <code>Conflicts</code> aufgelistet,
wird es ohne eine Meldung aus der Liste entfernt (eingeführt in einer
post-0.18.2 CVS-Version von Fink.).
</p>
<p>
<b>Bitte beachten:</b> Fink selbst ignoriert dieses Feld, aber es wird an dpkg
weitergegeben und entsprechend ausgewertet. Damit gilt es nur für die Laufzeit
und nicht während der Erstellungszeit von Fink.
</p>
</td></tr><tr valign="top"><td>BuildConflicts</td><td>
<p>
Eine Liste von Paketnamen, die nicht installiert sein dürfen, während dieses
Paket compiliert wird. Man kann es dazu benutzten, dass <code>./configure</code>
oder der Compiler unerwünschte Bibliotheks-Header erkennt oder um zu
verhindern, dass eine Version eines Tools verwendet wird, von dem bekannt ist,
dass es fehlerhaft ist (z. B. ein Fehler in einer bestimmten Version von sed).
Sind bei der Erstellung eines Pakets die Test-Suites aktiviert, werden zu dieser
Liste die Pakete vom Feld <code>TestConflicts</code> hinzugefügt.
</p>
</td></tr><tr valign="top"><td>Replaces</td><td>
<p>
Dieses Feld wird zusammen mit dem Feld <code>Conflicts</code> benutzt, wenn ein
Paket nicht nur die Funktion eines anderen Pakets übernimmt, sondern auch einige
gemeinsamen Dateien hat.
Ohne dieses Feld erzeugt dpkg bei der Installation einen Fehler, weil die
Dateien immer noch Besitz eines anderen Pakets sind.
Es ist auch ein Hinweis, dass die zwei Pakete echte Alternativen sind und eines
gegen das andere ausgetauscht werden kann.
Ist ein Paket in seinem eigenen Feld<code>Replaces</code> aufgelistet,
wird es ohne eine Meldung aus der Liste entfernt (eingeführt in einer
post-0.18.2 CVS-Version von Fink.).
</p>
<p>
<b>Bitte beachten:</b> Fink selbst ignoriert dieses Feld, aber es wird an dpkg
weitergegeben und entsprechend ausgewertet. Damit gilt es nur für die Laufzeit
und nicht während der Erstellungszeit von Fink.
</p>
</td></tr><tr valign="top"><td>Recommends, Suggests, Enhances</td><td>
<p>
Diese Felder deklarieren zusätzliche Beziehungen im selben Stil wie die anderen
Felder.
Diese drei Beziehungen haben auf die tatsächliche Installation mit
<code>dpkg</code> oder <code>apt-get</code> keinen Einfluss.
Sie werden aber von <code>dselect</code> und ähnlichen Frontends genutzt, um
dem Nutzer sinnvolle Vorschäge anzubieten.
</p>
</td></tr><tr valign="top"><td>Pre-Depends</td><td>
<p>
Eine spezielle Variante des Felds <code>Depends</code> mit strengerer Semantik.
Dieses Feld darf nur benutzt werden, wenn der Fall auf der
Developer-Email-Liste diskutiert wurde und Konsens erreicht wurde, dass es
wirklich notwendig ist.
</p>
</td></tr><tr valign="top"><td>Essential</td><td>
<p>
Ein boolscher Wert, der essentielle Pakete markiert. Essentielle Pakete werden
im Bootstrap-Prozess installiert. <code>dpkg</code> weigert sich essentielle
Pakete von dem System zu entfernen, so lange keine speziellen Flags gesetzt
sind, um dies zu übergehen.
In der Vergangenheit hingen nicht-essentielle Pakete implizit von den
essentiellen ab; dies ist aber nicht mehr der Fall.
</p>
</td></tr><tr valign="top"><td>BuildDependsOnly</td><td>
<p>
<b>Eingeführt in Fink 0.9.9.</b>
Ein boolscher Wert, der anzeigt, dass kein anderes Paket von diesem abhängen
darf, zulässig ist nur ein BuildDepend.
Im Unterschied zu den üblichen boolschen Feldern, gibt es für
<code>BuildDependsOnly</code> drei Zustände. Undefiniert (überhaupt nicht
angegeben) unterscheidet sich von einer Deklarierung als falsch. Weitere Details
sind im Kapitel
<a href="policy.php?phpLang=de#sharedlibs">Dynamische Bibliotheken</a>
beschrieben.
</p>
<p>
Ab Fink 0.20.5 werden die Präsenz/Absenz des Felds und wenn der Wert gesetzt
ist, der Wert in die .deb Datei aufgenommen, wenn das Paket erstellt wird.
<b>Deshalb muss man die Revisionsnummer des Pakets erhöhen, wenn man den Wert
von BuildDependsOnly ändert oder das Feld hinzufügt oder löscht.</b>
</p>
</td></tr></table>

<p><b>Auspack-Phase:</b></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>CustomMirror</td><td>
<p>
Eine Liste der Spiegelserver: Jeder Spiegelserver steht im folgenden Format in
einer separaten Zeile: <code>&lt;location&gt;: &lt;url&gt;</code>.
<b>location</b> kann ein Kontinent-Code (z. B. <code>nam</code>), ein
Länder-Code (z. B. <code>nam-us</code>) oder irgendetwas anderes sein; Die
Spiegelserver werden in der gegebenen Reihenfolge ausprobiert.
Ein Beispiel:
</p>
<pre>CustomMirror: &lt;&lt;
nam-US: ftp://ftp.fooquux.com/pub/bar
asi-JP: ftp://ftp.qiixbar.jp/pub/mirror/bar
eur-DE: ftp://ftp.barfoo.de/bar
Primary: ftp://ftp.barbarorg/pub/
&lt;&lt;</pre>
<p>
Die Standard-Codes für Kontinent und Land stehen in der Datei
<code>/opt/sw/lib/fink/mirror/_keys</code>, Teil der Pakete fink oder
fink-mirrors.
</p>
</td></tr><tr valign="top"><td>Source</td><td>
<p>
Eine URL zu dem Quell-Tarball. Es sollte eine HTTP- oder eine FTP-URL sein, aber
Fink kümmert sich nicht weiter darum, sondern reicht die URL an wget weiter.
Diese Feld unterstützt ein spezielles URL-Schema für Spiegelserver:
<code>mirror:&lt;Spiegelname&gt;:&lt;Relativpfad&gt;</code>. Daraufhin wird
der <b>Spiegelname</b> in Finks Konfiguration nachgeschaut, der Teil
<b>Relativpfad</b> angehängt und als tatsächliche URL verwendet. Die bekannten
<b>Spiegelnamen</b> sind in der Datei
<code>/opt/sw/lib/fink/mirror/_list</code> aufgelistet, die Teil des Pakets
fink oder fink-mirrors ist. Alternative dazu kann auch <code>custom</code> als
<b>Spiegelname</b> verwendet werden und dann wird Fink das Feld
<code>CustomMirror</code> dazu auswerten.
Bevor die URL verwendet wird, kommt die Prozenterweiterung zum Tragen. Bedenken
sie, dass %n alle Datenvarianten %type_ einschließt. Es kann deshalb günstiger
sein, hier %{ni} zu verwenden (eventuell mit einigen spezifischen %type_
Erweiterungen).
</p>
<p>
Ab Fink 0.18.0 hat <code>Source: none</code> die spezielle Bedeutung, dass es
keine Quelldateien zum Herunterladen gibt. Weitere Details dazu stehen in der
Beschreibung des Felds <code>Type</code>.
Der Wert <code>gnu</code> ist eine Abkürzung für
<code>mirror:gnu:%n/%n-%v.tar.gz</code> und <code>gnome</code> für
<code>mirror:gnome:stable/sources/%n/%n-%v.tar.gz</code>. Die Voreinstellung
ist <code>%n-%v.tar.gz</code> (also manuelles Herunterladen).
Diese Form einer implizit-definierten <code>Source</code> is obsolet (explizit
angegebene einfach Namen für manuelles herunterladen ist immer noch in Ordnung).
</p>
<p>
Quellen, die nur für die Testsuite benötigt werden, sollten im Feld
<code>TestSource</code> und verwandten Felder im Block <code>InfoTest</code>
aufgelistet werden.
</p>
</td></tr><tr valign="top"><td>Source<b>N</b></td><td>
<p>
Enthält ein Paket mehrere Tarballs, muss man sie mit diesen zusätzlichen Feldern
aufführen, beginnend mit N = 2. Der erste Tarball (der auch als der
Haupt-Tarball betrachtet werden kann) steht also im Feld <code>Source</code>,
der 2. im Feld <code>Source2</code> und so weiter. Die Regeln sind die gleichen
wie für Source, nur dass die Abkürzungen "gnu" und "gnome" nicht ausgewertet
werden, denn das wäre sowieso nutzlos. Beginnend mit einer CVS-Version von Fink
nach 0.19.2 können sie beliebige (und nicht notwendigerweise aufeinander
folgende) Werte mit N ≥ 2 verwenden, aber keine Dubletten.
</p>
</td></tr><tr valign="top"><td>SourceDirectory</td><td>
<p>
Diese Feld wird benötigt, wenn der Tarball in ein einziges Verzeichnis
ausgepackt wird, dessen Namen sich aber vom Rumpf des Tarball-Namens
unterscheidet. Ein Tarball mit dem Namen "foo-1.0.tar.gz" wird normalerweise in
ein Verzeichnis "foo-1.0" ausgepackt. Ist das nicht der Fall, so kann man den
Namen mit diesem Feld angeben. Prozenterweiterung wird in diesem Feld
ausgeführt.
</p>
</td></tr><tr valign="top"><td>NoSourceDirectory</td><td>
<p>
Setzen sie diesen boolschen Parameter auf wahr (true), wenn der Tarball nicht in
ein einziges Verzeichnis ausgepackt wird. Ein Tarball mit dem Namen
"foo-1.0.tar.gz" wird normalerweise in ein Verzeichnis "foo-1.0" ausgepackt.
Werden aber die Dateien des Tarballs nur in das aktuelle Verzeichnis ausgepackt,
nutzen sie dieses Feld und setzen sie den Wert auf wahr (true).
</p>
</td></tr><tr valign="top"><td>Source<b>N</b>ExtractDir</td><td>
<p>
Normalerweise wird ein zusätzlicher Tarball in dasselbe Verzeichnis wie der
Haupt-Tarball ausgepackt. Muss er aber in ein spezifisches Unterverzeichnis
ausgepackt werden, können sie dies in diesem Fald angeben. Source2ExtractDir
bezieht sich erwartungsgemäß auf den Tarball in Source2. Beispiele dafür sind in
den Paketen ghostscript, vim und tetex.
</p>
</td></tr><tr valign="top"><td>SourceRename</td><td>
<p>
Mit diesem Feld kann man eine Quell-Tarball umbenennen. Das ist vor allem dann
nützlich, wenn die Version der Quelle im Namen des Verzeichnis des Servers
steht, der Tarball aber für alle Versionen gleich heißt, z. B.
<code>http://www.foobar.org/coolapp/1.2.3/source.tar.gz</code>. Die
damit verbundenen Probleme kann man wie folgt umgehen:
</p>
<pre>SourceRename: %n-%v.tar.gz</pre>
<p>
In diesem Beispiel würde z. B. der Tarball unter dem Namen
<code>/opt/sw/src/coolapp-1.2.3.tar.gz</code> abgespeichert werden, genau so
wie man es erwarten würde.
</p>
</td></tr><tr valign="top"><td>Source<b>N</b>Rename</td><td>
<p>
Dieses Feld erfüllt die gleiche Funktion, nur dass es sich auf Tarballs bezieht,
die in den entsprechenden Feldern <code>Source<b>N</b></code> stehen.
Beispiele dafür finden sie in den Paketbeschreibungen context oder hyperref.
</p>
</td></tr><tr valign="top"><td>Source-MD5</td><td>
<p>
<b>Eingeführt in Fink 0.10.0.</b>
In diesem Feld müssen sie die MD5 Checksum der Quelldatei eintragen. Fink
benutzt diese Information um falsche Quelldateien zu entdecken, d. h. Tarballs,
die nicht mit denen übereinstimmen, die der Paket-Betreuer verwendet hat.
Häufige Ursachen für dieses Problem sind: unvollständig herunter geladene
Dateien, Austausch des Tarball Upstream ohne Ankündigung, Trojanerangriff oder
ähnliches und alles mögliche andere.
</p>
<p>Ein typisches Beispiel sieht so aus:</p>
<pre>Source-MD5: 4499443fa1d604243467afe64522abac</pre>
<p>
Für die Berechnung der Checksum kann man das Tool <code>md5sum</code> verwenden.
Die Checksum des Tarball <code>/opt/sw/src/apache_1.3.23.tar.gz</code> kann
man mit dem folgenden Kommando berechnen (einschließlich der Ausgabe):
</p>
<pre>fingolfin% md5sum /opt/sw/src/apache_1.3.23.tar.gz 
4499443fa1d604243467afe64522abac  /opt/sw/src/apache_1.3.23.tar.gz</pre>
<p>Wie man sieht ist der Wert links genau die Summe, die man braucht.</p>
</td></tr><tr valign="top"><td>Source<b>N</b>-MD5</td><td>
<p>
<b>Eingeführt in Fink 0.10.0.</b>
Dieses Feld hat denselben Zweck wie das Feld <code>Source-MD5</code>, mit dem
Unterschied, dass es für die MD5 Checksum der Tarballs der entsprechenden Felder
<code>Source<b>N</b></code> ist.
</p>
</td></tr><tr valign="top"><td>Source-Checksum</td><td>
<p>
Alternative method to list the checksum for a source file. This field
takes a hash type, followed by the actual checksum. For example:
</p>
<pre>Source-Checksum: SHA256(5048f1c8fc509cc636c2f97f4b40c293338b6041a5652082d5ee2cf54b530c56)</pre>
<p>
Current valid checksums are <code>MD5</code>, <code>SHA1</code>, and
<code>SHA256</code>. The <code>shasum</code> tool can be used to
calculate SHA checksums:</p>
<pre>$ shasum -a 256 /opt/sw/src/libexif-0.6.22.tar.xz 
5048f1c8fc509cc636c2f97f4b40c293338b6041a5652082d5ee2cf54b530c56  /opt/sw/src/libexif-0.6.22.tar.xz
</pre>
<p>
The <code>Source-Checksum</code> field should only be used once per
.info file. If both the <code>Source-MD5</code> and
<code>Source-Checksum</code> fields are present,
<code>Source-Checksum</code> takes precedence.
</p>
</td></tr><tr valign="top"><td>Source<b>N</b>-Checksum</td><td>
<p>
This is just the same as the <code>Source-Checksum</code> field, except that it
is used to specify the checksum of the tarball specified by the
corresponding <code>Source<b>N</b></code> field.
</p>
</td></tr><tr valign="top"><td>TarFilesRename</td><td>
<p>
<b>Eingeführt in Fink 0.10.0.</b>
Dieses Feld bezieht sich nur auf Quelldateien im tar-Format.
</p>
<p>
Mit diesem Feld kann man Dateien in einem gegebenen Quell-Tarball während des
Auspackens umbenennen. Dies behebt die Probleme, die damit zusammenhängen, dass
das HFS+ Dateisystem Groß- und Kleinschreibung nicht unterscheidet und z. B.
die Dateien <code>install</code> und <code>INSTALL</code> auf
dem Standard Mac OS X eine Kollission verursachen. Mit diesem Feld kann man
dieses Problem beheben ohne dass man einen neuen Tarball erstellen muss (was
in der Vergangenheit die einzige Lösung war.).
</p>
<p>
In diesem Feld können sie einfach eine Liste an Dateien aufführen, die umbenannt
werden sollen. Man kann auch Wildcards benutzen. Standard ist einfach eine
Umbennung mit angehängtem <code>_tmp</code>. Dies kann man mit derselben
Syntax wie in den Feldern <code>Files</code> und <code>DocFiles</code>
überschreiben, nämlich mit dem alten Dateinamen, gefolgt von einem : und dann
dem neuen Dateinamen.
Ein Beispiel:
</p>
<pre>TarFilesRename: foo bar.* qux:quux
Tar2FilesRename: directory/INSTALL:directory/INSTALL.txt</pre>
</td></tr><tr valign="top"><td>Tar<b>N</b>FilesRename</td><td>
<p>
<b>Eingeführt in Fink 0.10.0.</b>
Dieses Feld ist genau wie das Feld <code>TarFilesRename</code> mit dem
Unterschied, dass es auf den Tarball angewendet wird, der im entsprechenden
Feld <code>Source<b>N</b></code> steht.
</p>
</td></tr></table>


<p><b>Patch-Phase:</b></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>UpdateConfigGuess</td><td>
<p>
Ein boolscher Wert. Ist er auf wahr (true) gesetzt, werden die Dateien
config.guess und config.sub im Verzeichnis build durch Versionen ersetzt, die
Darwin kennen. Dies erfolgt in der Patch-Phase bevor das PatchSkript ausgeführt
wird. Benutzen sie dies <b>NUR</b>, wenn sie sich sicher sind, dass es
benötigt wird, d. h. wenn das configure-Skript mit der Fehlermeldung "unknown
host" abbricht.
</p>
</td></tr><tr valign="top"><td>UpdateConfigGuessInDirs</td><td>
<p>
<b>Eingeführt in einer post-0.9.0 CVS-Version.</b>
Eine Liste von Unterverzeichnissen.
Es macht das gleiche wie das Feld UpdateConfigGuess, aber für Pakete mit
veralteten config.guess-Dateien in mehreren Verzeichnissen überall im Baum der
Quellen.
Früher musste man die Dateien von Hand im Patchskript an die richtigen Stellen
kopieren.
Mit diesem Feld muss man nur noch die Verzeichnisse auflisten.
Benutzen sie <code>.</code>, um auch die Dateien im Verzeichnis build zu
ersetzen.
</p>
</td></tr><tr valign="top"><td>UpdateLibtool</td><td>
<p>
Ein boolscher Wert. Ist er auf wahr (true) gesetzt, werden die Dateien ltconfig
und ltmain.sh im Verzeichnis build durch Versionen ersetzt, die Darwin kennen.
Dies erfolgt in der Patch-Phase bevor das PatchSkript ausgeführt wird. Benutzen
sie dies <b>NUR</b>, wenn sie sich sicher sind, dass es benötigt wird. Einige
Pakete kann man beschädigen, wenn man die libtool-Skripte mit unpassenden
Versionen überschreibt. Für weitere Details lesen sie die Seiten über
<a href="/doc/porting/libtool.php">libtool</a>.
</p>
</td></tr><tr valign="top"><td>UpdateLibtoolInDirs</td><td>
<p>
<b>Eingeführt in einer post-0.9.0 CVS-Version.</b>
Eine Liste von Unterverzeichnissen.
Es macht das gleiche wie das Feld UpdateLibtool, aber für Pakete mit veralteten
libtool-1.3.x-Skripten in mehreren Verzeichnissen überall im Baum der
Quellen.
Früher musste man die Dateien von Hand im Patchskript an die richtigen Stellen
kopieren.
Mit diesem Feld muss man nur noch die Verzeichnisse auflisten.
Benutzen sie <code>.</code>, um auch die Dateien im Verzeichnis build zu
ersetzen.
</p>
</td></tr><tr valign="top"><td>UpdatePoMakefile</td><td>
<p>
Ein boolscher Wert.
Ist er auf wahr (true) gesetzt, wird die Datei
<code>Makefile.in.in</code> im Unterverzeichnis <code>po</code>
durch eine angepasste Version ersetzt.
Dies erfolgt in der Patch-Phase bevor das PatchSkript ausgeführt wird.
</p>
<p>
Die angepasste Version respektiert DESTDIR sorgt dafür, dass Kataloge mit
Meldungen im Verzeichnis <code>/opt/sw/share/locale</code> landen und nicht
in <code>/opt/sw/lib/locale</code>.
Bevor sie dieses Feld benutzen, überprüfen sie, dass das Paket nicht beschädigt
wird und überhaupt notwendig ist.
Sie können sich mit dem Tool <code>diff</code> die Unterschiede zwischen der V
ersion des Pakets und der in Fink (in <code>/opt/sw/lib/fink/update</code>)
anzeigen lassen.
</p>
</td></tr><tr valign="top"><td>Patch</td><td>
<p>
Der Dateiname eines Patch, der mit dem Kommando
<code>patch -p1 &lt;<b>patch-file</b></code> angewendet wird. Dies sollte
einfach ein Dateiname sein. Der zugehörige Pfad (das gleiche Verzeichniss, in
dem die .info-Datei steht) wird automatisch davor gestellt. Prozenterweiterung
wird in diesem Feld ausgeführt. Ein typischer Wert ist einfach
<code>%f.patch</code> oder <code>%n.patch</code>. Der Patch wird in einem
separaten Schritt angewandt, bevor das Patch-Skript (wenn vorhanden) ausgeführt
wird.
</p>
<p>
Beachten sie, dass %n allen Datenvarianten %type_ einschließt. Es kann deshalb
günstiger sein, hier %{ni} zu verwenden (eventuell mit einigen spezifischen
%type_ Erweiterungen). Es ist einfacher, eine einzige Patchdatei zu pflegen und
dann variantenspezifische Änderungen im Patch-Skript zu machen als separate
Patchdateien für jede Variante zu pflegen.
</p>
<p>
Ab Fink-0.29.0 sollte dieses Feld nicht benutzt werden. Nutzen sie statt dessen
das Feld <code>PatchFile</code>. Die Unterstützung für das Feld
<code>Patch</code> wird in Zukunft entfernt werden.
</p>

</td></tr><tr valign="top"><td>PatchFile</td><td>
<p>
Syntax für dieses Feld ist die gleiche wie für das Feld <code>Patch</code>.
Der komplette Pfad für diese Datei erhält man über die Prozenterweiterung
<code>%{PatchFile}</code>. Sie sollten <code>%a</code> nicht verwenden.
Im Unterschied zum Feld <code>Patch</code>, wird <code>PatchFile</code> im
Patch-Skript verwendet. Fink überprüft, ob die Datei existiert, lesbar ist und
seine Checksum mit dem Wert im Feld <code>PatchFile-MD5</code> übereinstimmt.
</p>
<p>
Man kann die Felder <code>Patch</code> und <code>PatchFile</code> in der
gleichen Paketbeschreibung verwenden. Jedes Paket, das das Feld
<code>PatchFile</code> verwendet, muss auch wenigstens
<code>BuildDepends: fink (&gt;= 0.24.12)</code> deklarieren. Muss man aus
anderen Gründen eine höhere Version angeben, ist dies auch in Ordnung.
</p>
</td></tr><tr valign="top"><td>PatchFile<b>N</b></td><td>
<p>
Hat ein Paket mehrere Patch-Dateien, muss man sie in zusätzlichen Feldern
deklarieren, mit N = 2 anfangend. Die erste Patch-Datei steht als in
<code>PatchFile</code>, die zweite in <code>PatchFile2</code> uns so weiter.
Jedes Paket, das das Feld <code>PatchFile<b>N</b></code> verwendet, muss auch
wenigstens <code>BuildDepends: fink (&gt;= 0.30.0)</code> deklarieren.  Muss
man aus anderen Gründen eine höhere Version angeben, ist dies auch in Ordnung.
</p>
</td></tr><tr valign="top"><td>PatchFile-MD5</td><td>
<p>
Hier steht die MD5-Checksum einer Datei des Felds <code>PatchFile</code>.
Dieses Feld ist obligatorisch, wenn man das Feld <code>PatchFile</code> benutzt.
(Eingeführt in Fink-0.24.12)
</p>
</td></tr><tr valign="top"><td>PatchFile<b>N</b>-MD5</td><td>
<p>
Hier steht die MD5-Checksum einer Datei des Felds
<code>PatchFile<b>N</b></code>. Dieses Feld ist obligatorisch, wenn man das
Feld <code>PatchFile</code> benutzt.
(Eingeführt in Fink-0.30.0)
</p>
</td></tr><tr valign="top"><td>PatchScript</td><td>
<p>
Eine Liste von Kommandos, die in der Patch-Phase ausgeführt werden. Hierhin
gehören Kommandos, mit denen man die Paketquellen patched oder irgendwie
modifiziert. Weitere Details dazu stehen weiter unten im Abschnitt
<a href="reference.php?phpLang=de#scripts">Anmerkungen zu Skripten</a>.
Bevor die Kommandos ausgeführt werden, wird die
<a href="format.php?phpLang=de#percent">Prozenterweiterung</a> ausgeführt.
Existiert das Feld <code>PatchFile</code>, ist das
Standard-<code>PatchScript</code>:
</p>
<pre>patch -p1 &lt; %{PatchFile}</pre>
<p>
Bei einem oder mehreren Feldern <code>PatchFile<b>N</b></code>, wird
entsprechend dem Bedarf folgendes an das Skript angehängt:
</p>
<pre>patch -p1 &lt; %{PatchFile<b>N</b>}</pre>
<p>
Gibt es kein Feld <code>PatchFile</code>, ist das Standardskript leer. Bei einem
expliziten Feld <code>PatchScript</code> muss man auch die
<code>PatchFile(s)</code> explizit anwenden.
</p>
</td></tr></table>

<p><b>Compile-Phase:</b></p>



<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Set<b>ENVVAR</b></td><td>
<p>
Hiermit kann man Umgebungsvariablen für die Compile- und Installations-Phase
setzen. Damit kann man Compiler-Flags z. B. an Configure-Skripte und Makefiles
übergeben. Derzeit werden folgende Variablen unterstützt:
CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, DYLD_LIBRARY_PATH, JAVA_HOME,
LD, LDFLAGS, LIBRARY_PATH, LIBS, MACOSX_DEPLOYMENT_TARGET, MAKE, 
MFLAGS, MAKEFLAGS.
Für den angegebenen Wert kann die Prozenterweiterung aus dem letzten Kapitel
genutzt werden: Ein häufiges Beispiel:
</p>
<pre>SetLDFLAGS: -Wl,-strip_dead_dylibs</pre>
<p>
Einige Umgebungsvariablen haben einen Standardwert. Gibt man für diese einen
Wert an, werden sie dem Standardwert voran gestellt.
Die vorbesetzten  Variablen und ihre Standardwerte sind:
</p>
<pre>CPPFLAGS: -I%p/include
LDFLAGS: -L%p/lib</pre>
<p>
Beginnend mit Fink 0.26.0, gibt es eine Ausnahme von diesen Standards:
Ist der <code>Type: -64bit</code> auf <code>-64bit</code> gesetzt, dann ist der
Standardwert von <code>LDFLAGS</code> auf <code>-L%p/%lib -L%p/lib</code>
gesetzt.
</p>
<p>
MACOSX_DEPLOYMENT_TARGET ist auf einen Standardwert gesetzt, der von der
Version von OS X abhängt, aber setzt man es für ein Paket auf einen anderen
Wert, so wird der Standardwert überschrieben.
</p>

</td></tr><tr valign="top"><td>NoSet<b>ENVVAR</b></td><td>
<p>
Setzt man dies auf wahr (true), dann werden die Standardwerte für die Variablen
mit Voreinstellungen (wie CPPFLAGS, LDFLAGS, CXXFLAGS) nicht gesetzt. Soll zum
Beispiel LDFLAGS nicht gesetzt werden, erreicht man dies mit
<code>NoSetLDFLAGS: true</code> .
</p>
</td></tr><tr valign="top"><td>UseMaxBuildJobs</td><td>
<p>
Wenn auf wahr (true) gesetzt, wird <code>-j<b>N</b></code> für das
Compile-Skript und das Test-Skript an die Umgebungsvariable MAKEFLAGS angehängt.
N ist der Wert des Felds MaxBuildJobs in der Datei
<code>fink.conf</code>. Dieser Wert wird an die Variable MAKEFLAGS auch
angehängt, wenn das Feld <code>NoSetMAKEFLAGS: true</code> gesetzt ist. Ab der
Fink-Version 0.31.2 ist die Voreinstellung <code>True</code>, wenn das Feld
nicht angegeben oder leer ist.
</p>
</td></tr><tr valign="top"><td>BuildAsNobody</td><td>
<p>
Ab Version 0.33.0 wird Fink als <code>root</code> und nicht als Nutzer
<code>fink-bld</code> mit wenigen Privilegien ausgeführt, wenn das Feld
<code>BuildAsNobody</code> auf <code>false</code> gesetzt ist.
Ist das Feld nicht vorhanden, ist die Voreinstellunge für den Wert wahr
<code>true</code>, das Paket wird also als Nutzer <code>fink-bld</code>
erstellt.
</p>
<p>In früheren Versionen von Fink bleibt dieses Feld folgenloss.</p>
</td></tr><tr valign="top"><td>ConfigureParams</td><td>
<p>
Zusätzliche Parameter, die an das Configure-Skript durchgereicht werden.
(Weitere Details dazu gibt es beim Compile-Skript)
Außer für Pakete des Typs <code>Type: Perl</code> wird der Parameter
<code>--prefix=%p</code> dem Wert vorangestellt.
Ab Fink &gt; 0.13.7 funktioniert dieses Feld auch für Perlmodule mit dem Feld
<code>Type: Perl</code>; der Perl-Standard Makefile.PL wird dem Wert des Felds
<code>ConfigureParams</code> voran gestellt.
</p>
<p>
Sind bei der Paketserstellung die Test-Suites aktiviert wird der Wert des Felds
<code>TestConfigureParams</code> den normalen <code>ConfigureParams</code>
Werten angehängt.
</p>
<p>
Beginnend mit Fink-0.22.0 unterstützt dieses Feld auch Bedingungen. Die Syntax
ist die gleiche wie im Feld <code>Depends</code> und anderen Feldern mit
Paketlisten. Die Bedingungen gilt nur für das leerzeichenbegrenzte
"Wort" hinter der Bedingung. Ein Beispiel:
</p>
<pre>Type: -x11 (boolean)
ConfigureParams: --mandir=%p/share/man (%type_pkg[-x11]) --with-x11 --disable-shared</pre>
<p>
reicht die Parameter <code>--mandir</code> und <code>--disable-shared</code>
immer weiter, <code>--with-x11</code> aber nur für die -x11 Variante.
</p>
<p>
Dieses Feld unterstützt, Parameter in mehreren Zeilen mit einer
Mehrzeilen-Deklaration zu schreiben. Dieses Feld wird wie eine
Shell-Kommandozeile behandelt und benutzt <code>\</code>, um Zeilen zu trennen:
</p>
<pre>ConfigureParams: &lt;&lt;
	--mandir=%p/share/man \
	(%type_pkg[-x11]) --with-x11 \
	--disable-shared
&lt;&lt;</pre>
<p>
Beachten sie: Stellen sie bei mehreren Zeilen bedingte Parameter nicht in die
letzte Zeile. Ist die Bedingung falsch, dann wird der darauf folgende Parameter
nicht ausgewertet. Dieses führt dann zum Absturz der Shell.
</p>
</td></tr><tr valign="top"><td>GCC</td><td>
<p>
Dieses Feld deklariert die GCC-ABI, die in diesem Paket von C++ Code genutzt
wird. (Es ist notwendig, weil sich die ABI zweimal änderte und jede Bibliothek,
die sie in ihrem C++ Code verlinken, muss mit der selben ABI kompiliert werden
wie ihr Code.)
</p>
<p>
Die erlaubten Werte sind:
<code>2.95.2</code> (oder <code>2.95</code>), <code>3.1</code>, <code>3.3</code>
und <code>4.0</code>.
So weit uns bekannt, wollen die Autoren von GCC die GCC-ABI irgendwann stabil
halten; wir können nur hoffen, dass sie sich nicht erneut ändert.
</p>
<p>
Das Feld GCC hat keine Voreinstellung an sich, denn es wird ignoriert, wenn es
nicht gesetzt ist. Es gibt aber für jeden Baum einen erwarteten Wert für GCC,
der dem g++ Compiler für diesem Baum entspricht.
Die erwarteten Werte für die verschiedenen Paketbäume sind:
<code>2.95</code> im Baum 10.1, <code>3.1</code> im Baum 10.2,
<code>3.3</code> in den Bäumen 10.2-gcc3.3, 10.3 und 10.4-transitional und
<code>4.0</code> in den Bäumen 10.4 und 10.7.
</p>
<p>
Beachten sie, dass der Compiler im Paket angegeben werden muss, wenn er von dem
erwarteten abweicht. Typischerweise wird der Compiler durch Setzen der Flags
CC oder CXX geändert. Es sollte auch eine Abhängigkeit von einem der
(virtuellen) gcc-Pakete angegeben werden.
</p>
<p>
Ab Version 0.13.8 von Fink wird die Version von gcc mit <code>gcc_select</code>
überprüft, wenn dieses Feld gesetzt ist. Liegt eine falsche Version vor, bricht
Fink mit einem Fehler ab.
</p>
<p>
Dieses Feld wurde in Fink eingerichtet, um Betreuern zu helfen, den Übergängen
zwischen den gcc Compilern zu folgen, die binäre Inkompatibilitäten zwischen
Bibliotheken einführte, die C++ Code enthalten, die aber nicht durch aus
Versionen erkannt werden kann.
</p>
</td></tr><tr valign="top"><td>CompileScript</td><td>
<p>
Eine Liste von Kommandos, die in der Compile-Phase ausgeführt wird. Hierhin
gehören Kommandos, die ein Paket konfigurieren und compilieren. Weitere Details
dazu stehen weiter unten im Abschnitt
<a href="reference.php?phpLang=de#scripts">Anmerkungen zu Skripten</a>.
Bevor die Kommandos ausgeführt werden, wird die
<a href="format.php?phpLang=de#percent">Prozenterweiterung</a> ausgeführt.
Der Standard ist:
</p>
<pre>./configure %c
make</pre>
<p>
Dies ist für Pakete angemessen, die GNU autoconf benutzen. Für Pakete des Typs
perl (deklariert über das Feld Type) ohne Angabe der Perl-Version ist der
Standard ab Fink 0.13.4 folgender:
</p>
<pre>perl Makefile.PL PREFIX=%p \
  INSTALLPRIVLIB=%p/lib/perl5 \
  INSTALLARCHLIB=%p/lib/perl5/darwin \
  INSTALLSITELIB=%p/lib/perl5 \
  INSTALLSITEARCH=%p/lib/perl5/darwin \
  INSTALLMAN1DIR=%p/share/man/man1 \
  INSTALLMAN3DIR=%p/share/man/man3 \
  INSTALLSITEMAN1DIR=%p/share/man/man1 \
  INSTALLSITEMAN3DIR=%p/share/man/man3 \
  INSTALLBIN=%p/bin \
  INSTALLSITEBIN=%p/bin \
  INSTALLSCRIPT=%p/bin
make
make test</pre>
<p>
Ist der Typ <code>perl $version</code> mit angegebener Perl-Version
(<code>$version</code> könnte beispielsweise 5.6.0 sein), dann wird der Standard
dieses:
</p>
<pre>perl$version Makefile.PL \
  PERL=perl$version PREFIX=%p \
  INSTALLPRIVLIB=%p/lib/perl5/$version \
  INSTALLARCHLIB=%p/lib/perl5/$version/$perlarchdir \
  INSTALLSITELIB=%p/lib/perl5/$version \
  INSTALLSITEARCH=%p/lib/perl5/$version/$perlarchdir \
  INSTALLMAN1DIR=%p/share/man/man1 \
  INSTALLMAN3DIR=%p/share/man/man3 \
  INSTALLSITEMAN1DIR=%p/share/man/man1 \
  INSTALLSITEMAN3DIR=%p/share/man/man3 \
  INSTALLBIN=%p/bin \
  INSTALLSITEBIN=%p/bin \
  INSTALLSCRIPT=%p/bin
make
make test</pre>
<p>
wobei <code>$perlarchdir</code> für Versionen 5.8.0 und früher "darwin" ist und
"darwin-thread-multi-2level" für Versionen 5.8.1 und später.
</p>
</td></tr><tr valign="top"><td>NoPerlTests</td><td> 
<p>
<b>Eingeführt in Fink &gt; 0.13.7.</b>
Ein boolscher Wert speziell für Pakete mit Perl-Modulen. Wenn auf wahr gesetzt,
wird der Teil <code>make test</code> im <code>CompileScript</code> für dieses
bestimmte Perl-Modul-Paket ignoriert.
</p>
</td></tr></table>

<p><b>Test-Suites:</b></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>InfoTest</td><td>
<p>
<b>Eingeführt in Fink 0.25.</b>
Dieses Feld umfasst Informationen, die nur ausgeführt werden, wenn bei der
Erstellung eines Pakets die Test-Suites aktiviert sind. Es enthält andere
Felder. Ist es vorhanden, muss das Feld <code>TestScript</code> enthalten sein.
Alle anderen Felder sind optional. Die folgenden Felder sind innerhalb
<code>InfoTest</code> erlaubt:
</p>
<ul>
<li><code>TestScript</code>: Ein Skript, das die Test-Suite ausführt. Dieses
  Skript sollte mit einem Status 0 enden, wenn die Suite erfolgreich endet, mit
  einem Status 1 um Warnungen anzuzeigen oder jeder andere Wert, der Fehler
  anzeigt, die ernst genug für einen fatalen Abbruch sind. Wegen der
  Dreifach-Logik des Ausgangswert sollte er auf jeden Fall gesetzt werden.
  <code>make check</code> ist zum Beispiel ein schlechtes Skript, weil es mit
  dem Status 1 endet, wenn das Check-Ziel nicht existiert.
  <code>make check || exit 2</code> wäre schon ein besseres Skript.</li>
<li><code>TestConfigureParams</code>: Ein Wert, der an die
  <code>ConfigureParams</code> angehängt wird.</li>
<li><code>TestDepends</code> und <code>TestConflicts</code>: Listen der Pakete,
  die an Listen in <code>BuildDepends</code> oder <code>BuildConflicts</code>
  angehängt wird.</li>
<li><code>TestSource</code>: Extra Quellen, die für die Test-Suites benötigt
  werden. Alle verwandten Felder werden auch unterstützt. Man muss also auch
  <code>TestSource-MD5</code> oder <code>TestSource-Checksum</code> deklarieren. Die Felder <code>TestSourceN</code>
  und die entsprechenden Felder <code>TestSourceN-MD5</code>, <code>TestSourceN-Checksum</code>, 
  <code>TestTarFilesRename</code> usw. können ebenfalls vorhanden sein.</li>
<li><code>TestSuiteSize</code>: Beschreibt ungefähr wie lange das Ausführen der
  Test-Suites dauern wird. Erlaubte Werte sind <code>small</code>,
  <code>medium</code> und <code>large</code>. Gegenwärtig wird dieses Feld
  ignoriert.</li>
<li>Jedes andere Standardfeld. Ist ein Feld sowohl innerhalb als auch außerhalb
  von <code>InfoTest</code> deklariert, wird der Werte innerhalb von
  <code>InfoTest</code> den Wert von außerhalb ersetzen, wenn die Test-Suites
  aktiviert sind.</li>
</ul>
<p>Hier ein Beispiel:</p>
<pre>InfoTest: &lt;&lt;
    TestScript: make check || exit 2
    TestConfigureParams: --enable-tests
&lt;&lt;</pre>
</td></tr></table>

<p><b>Installationsphase:</b></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>UpdatePOD</td><td>
<p>
<b>Eingeführt in Fink 0.9.5.</b>
Ein boolscher Wert speziell Perl-Modul-Pakete.
Ist er auf wahr (true) gesetzt, wird Code zu den Skripten install, postrm und
postinst hinzu gefügt, der die .pod-Dateien aus den Perl-Paketen pflegt.
Dies schließt ein, das .pod-Datum in der zentralen Datei
<code>/opt/sw/lib/perl5/darwin/perllocal.pod</code> hinzu zu fügen oder
zu entfernen.
(Ist der Typ als <code>perl $version</code> mit einer bestimmten Perl-Version
wie 5.6.0 deklariert, werden diese Skripte angepasst, um die zentrale
.pod-Datei <code>/opt/sw/lib/perl5/$version/perllocal.pod</code> zu
bearbeiten.)
</p>
</td></tr><tr valign="top"><td>InstallScript</td><td>
<p>
Die Liste der Kommandos, die in der Installationsphase ausgeführt werden. Hier
stehen die Kommandos, die alle notwendigen Dateien in das temporäre
dpkg-Verzeichnis für das Paket kopieren. Weitere Details dazu stehen weiter
unten im Abschnitt
<a href="reference.php?phpLang=de#scripts">Anmerkungen zu Skripten</a>.
Bevor die Kommandos ausgeführt werden, wird die
<a href="format.php?phpLang=de#percent">Prozenterweiterung</a> ausgeführt.
Normalerweise ist der Standard:
</p>
<pre>make install prefix=%i</pre>
<p>
Dies ist für Pakete angemessen, die GNU autoconf benutzen. Für Pakete des Typs
perl (deklariert über das Feld Type) ohne Angabe der Perl-Version ist der
Standard ab Fink 0.13.4 folgender:
</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5 \
  INSTALLARCHLIB=%i/lib/perl5/darwin \
  INSTALLSITELIB=%i/lib/perl5 \
  INSTALLSITEARCH=%i/lib/perl5/darwin \
  INSTALLMAN1DIR=%i/share/man/man1 \
  INSTALLMAN3DIR=%i/share/man/man3 \
  INSTALLSITEMAN1DIR=%i/share/man/man1 \
  INSTALLSITEMAN3DIR=%i/share/man/man3 \
  INSTALLBIN=%i/bin \
  INSTALLSITEBIN=%i/bin \
  INSTALLSCRIPT=%i/bin</pre>
<p>
Ist der Typ <code>perl $version</code> mit angegebener Perl-Version
(<code>$version</code> könnte beispielsweise 5.6.0 sein), dann wird der Standard
dieses:
</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5/$version \
  INSTALLARCHLIB=%i/lib/perl5/$version/$perlarchdir \
  INSTALLSITELIB=%i/lib/perl5/$version \
  INSTALLSITEARCH=%i/lib/perl5/$version/$perlarchdir \
  INSTALLMAN1DIR=%i/share/man/man1 \
  INSTALLMAN3DIR=%i/share/man/man3 \
  INSTALLSITEMAN1DIR=%i/share/man/man1 \
  INSTALLSITEMAN3DIR=%i/share/man/man3 \
  INSTALLBIN=%i/bin \
  INSTALLSITEBIN=%i/bin \
  INSTALLSCRIPT=%i/bin</pre>
<p>
wobei <code>$perlarchdir</code> für Versionen 5.8.0 und früher "darwin" ist und
"darwin-thread-multi-2level" für Versionen 5.8.1 und später.
</p>
<p>
Wenn das Paket es unterstützt, ist es besser, stattdessen
<code>make install DESTDIR=%d</code> auzuführen.
</p>
</td></tr><tr valign="top"><td>AppBundles</td><td>
<p>
<b>Eingeführt in einer Version nach 0.23.1.</b>
Dieses Feld installiert das angegebene Applicationbundle bzw. mehrere im
Verzeichnis <code>%p/Applications</code>. Es wird auch ein Symlink im
Verzeichnis <code>/Applications/Fink</code> erzeugt.
Beispiel:
</p>
<pre>AppBundles: build/*.app Foo.app</pre>
</td></tr><tr valign="top"><td>JarFiles</td><td>
<p>
<b>Eingeführt in Fink 0.10.0.</b>
Das Feld ist irgendwie ähnlich wie das Feld DocFiles. Damit werden die
angegebenen jar-Dateien ins Verzeichnis <code>%p/share/java/%n</code>
installiert.
Beispiel:
</p>
<pre>JarFiles: lib/*.jar foo.jar:fooBar.jar</pre>
<p>
Damit werden alle jars im Verzeichnis lib installiert; die Datei foo.jar als
fooBar.jar.
</p>
<p>
Es bewirkt auch, dass diese jar-Dateien (genau: alle Dateien in
<code>%p/share/java/%n</code> mit der Endung .jar) an die
Umgebungsvariable CLASSPATH angehängt werden. Damit können Tools wie configure
oder ant die installierten jar-Dateien feststellen.
</p>
</td></tr><tr valign="top"><td>DocFiles</td><td>
<p>
Dieses Feld deklariert eine bequehme Art, Dateien wie README oder COPYING für
das Paket im doc-Verzeichnis <code>%p/share/doc/%n</code> zu
installieren. Der Wert ist eine leerzeichenseparierte Liste der Dateien. Man
kann Dateien aus Unterverzeichnissen des build-Verzeichnisses kopieren, aber sie
werden im doc-Verzeichnis und nicht einem Unterverzeichnis stehen. Shell
Wildcards sind erlaubt.
Es ist auch möglich, einzelne Dateien umzubenennen, indem man den neuen Namen
mit einem Doppelpunkt (:) anhängt, z. B.
<code>libgimp/COPYING:COPYING.libgimp</code>. Dieses Feld funktioniert, indem
entsprechende <code>install</code>-Kommandos im Installations-Skript angehängt
werden.
</p>
</td></tr><tr valign="top"><td>Shlibs</td><td>
<p>
<b>Eingeführt in Fink 0.11.0.</b>
Diess Feld deklariert dynamische Bibliotheken, die in dem Paket installiert
werden. Jede Bibliotheke steht in einer separaten Zeile die den
<code>install_name</code> der Bibliothek und Informationen über ihre binäre
Kompatibilität enthalten. Ist die Bibliothek öffentlich, steht in der Zeile auch
die <code>-compatibility_version</code>, Informationen zur Abhängigkeit mit
Version darüber, welches Fink-Paket die Bibliothek mit dieser
<code>compatibility_version</code> enthält und die Architektur der Bibliothek.
(Die Architektur der Bibliothek kann "32", "64" oder "32-64" sein oder ganz
fehlen. Ist sie nicht explizit angegeben, wird die Voreinstellung genommen, d.h.
"32" für PowerPC und i386 und "64" für x86_64.) Die Abhängigkeit sollte in der
Form <code>foo (&gt;= version-revision)</code> angegeben sein, wobei sich
<code>foo (&gt;= version-revision)</code> auf die <b>erste</b> Version des
Finkpakets bezieht, das diese Bibliothek (mit der compatibility version) zur
Verfügung stellte. Außerdem impliziert die Deklaration, dass der Betreuer
versichert, dass auch in späteren Versionen des Pakets eine Bibliothek mit
diesem Namen und dieser <code>-compatibility_version</code> angeboten wird.
Dem Namen von dynamischen Bibliotheken, die "privat" sein sollen, wird ein
Ausrufezeichen vorangestellt und keine Informationen zu Kompatibilität oder
Version werden angegeben. Weitere Details dazu stehen im Abschnitt
<a href="policy.php?phpLang=de#sharedlibs">dynamische Bibliotheken</a>.
</p>
</td></tr><tr valign="top"><td>RuntimeVars</td><td>
<p>
<b>Eingeführt in Fink 0.10.0.</b>
Dieses Feld deklariert eine bequehme Art, Umgebungsvariablen für die Laufzeit
einen statischen Wert zuzuweisen (Benötigen sie mehr Flexibilität, schauen sie
im Abschnitt <a href="#profile.d">profile.d Skripte</a> nach). Solange
das Paket installiert ist, werden diese Variablen im Skript
<code>/opt/sw/bin/init.[c]sh</code> gesetzt.
</p>
<p>
Der Wert ihrer Variablen kann Leerzeichen enthalten (Leerzeichen am Ende werden
abgeschnitten); Prozenterweiterung wird ausgeführt. In diesem Beispiel
</p>
<pre>RuntimeVars: &lt;&lt;
  SomeVar: %p/Value
  AnotherVar: foo bar
&lt;&lt;</pre>
<p>
werden zwei Umgebungsvariablen 'SomeVar' und 'AnotherVar' erzeugt und ihre Werte
auf '/opt/sw/Value' (oder wasauch immer ihr Präfix ist) und 'foo bar' gesetzt.
</p>
<p>
Dieses Feld funktioniert, in dem es die entsprechenden Kommandos im
Installations-Skript angehängt. Diese Kommandos fügen eine Zeile mit
setenv/export im Paket-Skript profile.d hinzu, so dass sie ihre eigenen
hinzufügen können, ohne dass sie überschrieben werden. Die Zeilen werden den
Skripten voran gestellt, so dass man die Variablen auch in den Skripten
verwenden kann.
</p>
</td></tr><tr valign="top"><td>SplitOff</td><td>
<p>
<b>Eingeführt in Fink 0.9.9.</b>
Erzeugen sie ein zweites Paket vom selben compile/install-Lauf. Schauen sie für
weitere Details im separaten Abschnitt
<a href="#splitoffs">Splitoff</a>
nach.
</p>
</td></tr><tr valign="top"><td>SplitOff<b>N</b></td><td>
<p>
<b>Eingeführt in Fink 0.9.9.</b>
Dies ist genau so wie <code>SplitOff</code>, um dritte, vierte usw. Pakete vom
selben compile/install-Lauf zu erzeugen. Beginnend mit einer CVS-Version von
Fink nach 0.19.2 können sie beliebige (und nicht notwendigerweise aufeinander
folgende) Werte mit N ≥ 2 verwenden, aber keine Dubletten.
</p>
</td></tr><tr valign="top"><td>Files</td><td>
<p>
<b>Eingeführt in Fink 0.9.9.</b>
Dieses Feld wird <b>nur</b> in den Feldern <code>SplitOff</code> oder
<code>SplitOff<b>N</b></code> verwendet. Es deklariert die Dateien und
Verzeichnisse, die vom Installationsverzeichnis des Pakets %I in das aktuelle
Installationsverzeichnis %i verschoben werden. Beachten sie, dass dies nach dem
Installations-Skript und dem Feld DocFiles des Elternpakets ausgeführt wird, aber
vor dem Installations-Skript und dem Feld DocFiles des aktuellen Pakets.
</p>
</td></tr></table>

<p><b>Erstellungsphase:</b></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>PreInstScript, PostInstScript, PreRmScript, PostRmScript</td><td>
<p>
Diese Felder enthalten Shell-Skripte, die ausgeführt werden, wenn ein Paket
installiert, aktualisiert oder entfernt wird.
Fink fügt automatisch den Shell-Skript-Header
<code>#!/bin/sh</code> ein und ruft <code>set -e</code> auf, so dass ein Fehler
eines Kommandos zum sofortigen Abbruch des Skripts führt.
Fink fügt auch ein <code>exit 0</code> am Ende ein.
Will man einen Fehler anzeigen, sollte man das Skript mit einem anderen Wert als
Null beenden.
Der erste Parameter (<code>$1</code>) ist auf einen Wert gesetzt, der anzeigt,
welche Aktion ausgeführt wird.
einige der möglichen Werte sind <code>install</code>, <code>upgrade</code>,
<code>remove</code> und <code>purge</code>.
Beachten sie, dass es noch andere Werte gibt, die benutzt werden, um Fehler
zurück zu verfolgen und wenn Pakete gegenseitig ausgetauscht werden müssen.
</p>
<p>Die Skripte werden zu folgenden Zeitpunkten ausgerufen:</p>
<ul>
<li>PreInstScript: Wenn das Paket zum ersten mal installiert wird und bevor es
  auf diese Version aktualisiert wird.</li>
<li>PostInstScript: Nach dem Auspacken und Einrichten des Pakets.</li>
<li>PreRmScript: Bevor das Paket entfernt oder auf eine neue Version
  aktualisiert wird.</li>
<li>PostRmScript: Nachdem das Paket entfernt oder auf eine neue Version
  aktualisiert wird.</li>
</ul>
<p>
Klarstellung: Bei einer Aktualisierung werden sowohl die ...Inst-Skripte der
neuen Version als auch die ...Rm-Skripte der alten Version ausgeführt.
Details dazu kann man im Debian Policy Manual nachlesen, im
To make it more clear, an upgrade invokes both the ...Inst scripts of
the new version and the ...Rm scripts of the old version.
<a href="http://www.debian.org/doc/debian-policy/ch-maintainerscripts.html">Kapitel 6</a>.
</p>
<p>
Prozenterweiterungen werden in diesen Skripten ausgeführt. Kommandos können ohne
den kompletten Pfad ausgeführt werden.
</p>
</td></tr><tr valign="top"><td>ConfFiles</td><td>
<p>
Eine leerzeichengetrennte list an Dateien von Konfigurationsdateien, die vom
Nutzer geändert werden können.
Prozenterweiterungen werden ausgeführt.
Die Dateien müssen mit einem absoluten Pfad angegeben werden,
d. h. <code>%p/etc/%n.conf</code>.
Die genannten Dateien werden von dpkg besonders behandelt.
Wird ein Paket aktualisiert und die Datei wurde sowohl auf der Festplatte als
auch im Paket geändert, wird der Nutzer gefragt, welche Version genutzt werden
soll. Von den Dateien werden Sicherungskopien (backups) angelegt.
Wird ein Paket entfernt (removed), bleiben die Konfigurationsdateien auf der
Festplatte erhalten.
Nur ein "purge" entfernt auch die Konfigurationsdateien.
</p>
</td></tr><tr valign="top"><td>InfoDocs</td><td>
<p>
Listet die Namen der Info-Dokumente, die das Paket in %p/share/info installiert.
Es wird entsprechender Code zu den Skripten postinst und prerm hinzugefügt, um
die Info-Verzeichnis-Datei <code>dir</code> zu aktualisieren.
</p>
<p>
<b>Anmerkung:</b> Nutzen sie nur die nicht-numerierten Dateien, wenn
Info-Dokumente ausgespalten werden. Hat z. B. ein Paket die Dateien
</p>
<pre>foo.info
foo.info-1
foo.info-2</pre>
<p>sollten sie nur diese aufführen:</p>
<pre>InfoDocs: foo.info</pre>
<p>
Dieses Feature ist immer noch im Fluss. Es können in Zukunft durchaus weitere
Felder für eine feinere Steuerung hinzu gefügt werden.
</p>
</td></tr><tr valign="top"><td>DaemonicFile</td><td>
<p>
Liefert Service-beschreibungen für <code>daemonic</code>.
<code>daemonic</code> wird von Fink benutzt, um StartupItems für daemon-Prozesse
(z. B. Web-Server) einzurichten oder zu entfernen.
Die Beschreibung wird dem Paket als Datei mit dem Namen
<code>%p/etc/daemons/<b>Name</b>.xml</code> hinzu gefügt, wobei <b>Name</b>
im Feld DaemonicName angegeben wird und als Standard den Paketnamen hat.
Prozenterweiterungen werden für dieses Feld ausgeführt.
Beachten sie, dass sie <code>daemonic</code> zur Liste im Feld dependency
hinzu fügen müssen, wenn ihr Paket es benutzt.
</p>
</td></tr><tr valign="top"><td>DaemonicName</td><td>
<p>
Ein Name für die Datei der <code>daemonic</code>-Service-Beschreibung.
Weitere Details stehen in der Beschreibung ders Felds DaemonicFile.
</p>
</td></tr></table>

<p><b>Zusätzliche Angaben:</b></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Homepage</td><td>
<p>Die URL der Upstream-Homepage des Pakets.</p>
</td></tr><tr valign="top"><td>DescDetail</td><td>
<p>
Eine ausführlichere Beschreibung des Pakets als im Feld <code>Description</code>
(was ist es und für was kann man es benutzen?).
Mehrfachzeilen sind hier erlaubt. Dieses Feld wird ohne Zeilenumbruch
dargestellt. Deshalb sollten sie manuell Zeilenenden einführen, um die
Zeilenlänge, wenn möglich, unter 79 Zeichen zu halten.
</p>
</td></tr><tr valign="top"><td>DescUsage</td><td>
<p>
Dieses Feld ist für Informationen, die man für die Benutzung des Pakets benötigt
(Wie benutze ich es?), z. B. "Führen sie wmaker.inst einmal aus, bevor sie
WindowMaker benutzen".
Mehrfachzeilen sind hier erlaubt. Dieses Feld wird ohne Zeilenumbruch
dargestellt. Deshalb sollten sie manuell Zeilenenden einführen, um die
Zeilenlänge, wenn möglich, unter 79 Zeichen zu halten.
</p>
</td></tr><tr valign="top"><td>DescPackaging</td><td>
<p>
Anmerkungen zum Erstellen der Paketbeschreibung. Sachen wie "Patches im
Makefile, damit alles an die richtige Stelle gepackt wird." kommen in dieses
Feld. Mehrfachzeilen sind hier erlaubt.
</p>
</td></tr><tr valign="top"><td>DescPort</td><td>
<p>
Anmerkungen spezifisch für die Portierung des Pakets nach Darwin. Sachen, wie
"config.guess und libtool Skripte aktualisiert, -no-cpp-precomp ist nötig"
gehören hier her. Mehrfachzeilen sind hier erlaubt.
</p>
</td></tr></table>



<h2><a name="splitoffs">6.3 SplitOffs</a></h2>
<p>
Ab Fink 0.9.9 kann eine einzige .info-Datei benutzt werden, um mehrere Pakete zu
erstellen.
Die Installationsphase beginnt wie üblich mit der Ausführung der Kommandos
<code>InstallScript</code> und <code>DocFiles</code>.
Ist ein Feld <code>SplitOff</code> oder <code>SplitOff<b>N</b></code>
vorhanden, werden weitere Installationsverzeichnisse angelegt. In den Feldern
<code>SplitOff</code> oder <code>SplitOff<b>N</b></code> werden die neuen
Installationsverzeichnisse mit %i abgekürzt, das Installationsverzeichnis des
Elternpakets mit %I.
</p>
<p>
In jedem Feld <code>SplitOff</code> und <code>SplitOff<b>N</b></code> müssen
bestimmte Felder vorhanden sein. Tatsächlich wird eine komplette Beschreibung
gespiegelt, bei der nur wenige Felder fehlen. Im folgenden die Felder, die in
den Unterbeschreibungen vorkommen können, nach Kategorien sortiert:
</p>
<ul>
<li>Start-Daten: Nur das Feld <code>Package</code> muss angegeben werden. Alle
  anderen Felder werden vom Elternpaket übernommen. Die Werte der Felder
  <code>Type</code> und <code>License</code> können innerhalb von
  <code>SplitOff</code> or <code>SplitOff<b>N</b></code> überschrieben werden.
  Prozenterweiterungen können benutzt werden. Oft ist es bequehm, für den Namen
  des Elternpakets %N zu verwenden.</li>
<li>Abhängigkeiten: Alle felder sind erlaubt.</li>
<li>Auspackphase, Patch-Phase und Compile-Phase: Diese Felder sind irrelevant
  und werden ignoriert.</li>
<li>Installationsphase und Build-Phase: Alle Felder sind erlaubt (außer dass
  SplitOffs keine weiteren SplitOffs enthalten können).</li>
<li>Zusätzliche Angaben: Sie werden vom Elternpaket geerbt. Die Werte können
  aber durch Deklaration des Felds in <code>SplitOff</code> oder
  <code>SplitOff<b>N</b></code> überschrieben werden.</li>
</ul>
<p>
%n-%v-%r wird als eindeutiger Bezeichner für ein Paket interpretiert. Deshalb
kann man das selbe <code>Paket</code> (mit der gleichen <code>Version</code> und
<code>Revision</code>) nicht als <code>SplitOff</code> (oder
<code>SplitOff<b>N</b></code>) deklarieren. Benutzen sie Varianten, müssen sie
beachten, dass jede Variante als unabhängiges Paket betrachtet wird. Die
folgende Konstruktion ist deshalb verboten:
</p>
<pre>Package: mime-base64-pm%type_pkg[perl]
Type: perl (5.12.3 5.12.4)
SplitOff: &lt;&lt;
  Package: mime-base64-pm-bin
&lt;&lt;</pre>
<p>
Während der Installationsphase werden zuerst die Felder
<code>InstallScript</code> und <code>DocFiles</code> des Elternpakets
ausgeführt. Danach werden die Felder <code>SplitOff</code> und
<code>SplitOff<b>N</b></code> prozessiert. In jedem SplitOff wird seinerseits
das Installscript ausgeführt. Das Feld <code>Files</code> bewirkt dann, dass die
aufgelisteteten Dateien und Verzeichnisse vom Installationsverzeichnis %I des
Elternpakets in das Installationsverzeichnis %i des SplitOff-Pakets. Danach
werden die Felder <code>DocFiles</code> und andere Installationsphasen-Felder
der <code>SplitOff</code> oder <code>SplitOff<b>N</b></code> Pakete
ausgeführt.
</p>
<p>
Zu diesem Zeitpunkt wird <code>SplitOff</code> ausgeführt (falls vorhanden) und
dann jedes Feld <code>SplitOff<b>N</b></code>, in der Reihenfolge der Zahl N.
Dies kann sich aber in Zukunft ändern. Folgendes Beispiel
</p>
<pre>SplitOff: &lt;&lt;
  Description: Some header files
  Files: include/foo.h include/bar.h
&lt;&lt;
SplitOff2: &lt;&lt;
  Description: All other header files
  Files: include/*
&lt;&lt;</pre>
<p>
funktioniert nur weil <code>SplitOff</code> vor <code>SplitOff2</code>
ausgeführt wird. Es ist deshalb besser, die Dateien explizit auf zu listen
(oder detailiertere Wildcards benutzen).
</p>
<p>
Während der Erstellungsphase werden die pre/post install/remove Skripte für
jedes SplitOff während der Erstellungsphase des jeweiligen SplitOff konstruiert,
je nachdem wie die Skripte für das SplitOff deklariert wurden.
</p>
<p>
Von jedem erstellten Paket wird verlangt, dass seine Lizenzierung im Verzeichnis
%i/share/doc/%n (das %n nimmt für jedes Paket einen anderen Wert an)
dokumentiert wird. Beachten sie, dass <code>DocFiles</code> die Dateien kopiert
und nicht verschiebt, so dass man identische Kopien der Dokumentation in jedes
Paket mehrfach installieren kann.
</p>



<h2><a name="scripts">6.4 Skripte</a></h2>
<p>
In den Feldern PatchScript, CompileScript und InstallScript kann man
Shell-Skripte deklarieren, die dann ausgeführt werden. Das build-Verzeichnis
(<code>%b</code>) ist das aktuelle Verzeichnis, in dem die Skripte
ausgeführt werden. Sie sollten immer relative Pfadnamen oder
Prozenterweiterungen für  Dateien und Verzeichnisse in der Fink-Hierarchie
angeben und keine absoluten Pfadnamen. Zwei Formen werden unterstützt.
</p>
<p>
Dieses Feld kann ein einfache List von Kommandos sein, ähnlich zu einem
Shell-Skripte. Die Kommandos werden jedoch mit system() Zeile für Zeile
ausgeführt. Setzt man Variablen oder wechselt das Verzeichnis, wirkt sich dies
nur für eben diese eine Zeile aus. Beginnend mit einer CVS-Version nach
Fink-0.18.2 kann man lange Zeilen wie in Shell-Skripten auf mehrere umbrechen:
Ein Backslash (<code>\</code>) am Ende der Zeile ist das Zeichen für die
Fortsetzung in der nächsten Zeile.
</p>
<p>
Alternativ dazu kann man ein komplettes Skript mit einem Interpreter eigener
Wahl hier einfügen. Wie in jedem Unix-Skript muss die erste Zeile mit
<code>#!</code> anfangen, gefolgt vom kompletten Pfadnamen für den Interpreter
und alle benötigten Flags (z. B. <code>#!/bin/csh</code>,
<code>#!/bin/bash -ev</code>, usw.). In diesen Fällen wird das komplette Feld
*Script in eine temporäre Datei kopiert und dann ausgeführt.
</p>



<h2><a name="patches">6.5 Patches</a></h2>
<p>
Braucht das Paket einen Patch, um für Darwin kompiliert zu werden (oder um mit
Fink zu funktionieren), benennen sie die Patch-Datei so wie die
Paketbeschreibung nur mit der Extension ".patch" statt ".info" und speichern sie
im gleichen Verzeichnis wie der .info-Datei.
Geben sie den Namen der Patch-Datei mit einer Zeile wie die folgende an:
</p>
<pre>PatchFile: %n.patch</pre>
<p>
(Für Pakette mit Varianten, kann es günstiger sein, <code>%{ni}.patch</code> zu
verwenden.)
Sie müssen auch die MD5-Summe der Patch-Datei im Feld <code>PatchFile-MD5</code>
angeben und folgendes deklarieren:
<code>BuildDepends: fink (&gt;= 0.24.12)</code> (oder eine spätere Finkversion).
</p>
<p>
Wird das Feld <code>PatchFile<b>N</b></code> verwendet, ist es üblich, die
Datei <code>%n-Zweck-des-Patch.patch</code> zu benennen, damit man das
leichter verfolgen kann. Man muss auch das Feld
<code>PatchFile<b>N</b>-MD5</code> angeben und folgendes deklarieren:
<code>BuildDepends: fink (&gt;= 0.30.0)</code> (oder eine spätere Finkversion).
</p>
<p>
Gibt es das Feld <code>PatchFile</code>, wird folgendes
Standard-<code>PatchScript</code>Skript ausgeführt:
</p>
<pre>PatchScript: patch -p1 &lt; %{PatchFile}</pre>
<p>
Mit <code>PatchFile<b>N</b></code> wird folgendes an das obige
Standard-<code>PatchScript</code> angehängt:
</p>
<pre>patch -p1 &lt; %{PatchFile<b>N</b>}</pre>
<p>
Dieses Standard-<code>PatchScript</code> wird überschrieben, wenn man ein
eigenes <code>PatchScript</code> deklariert (z. B. um eine Änderung in der
Patchdatei vorzunehmen, bevor sie angewandt wird).
</p>
<p>
Benötigt man in der Patch-Datei den vom Nutzer gewählten Präfix, wird empfohlen,
statt <code>/opt/sw</code> eine Variable wie <code>@PREFIX@</code> zu deklarieren
und so zu verwenden:
</p>
<pre>PatchScript: sed 's|@PREFIX@|%p|g' &lt; %{PatchFile} | patch -p1</pre>
<p>
Patches sollten im unidiff-Format sein und werden normalerweise mit folgendem
Kommandoerzeugt:
</p>
<pre>diff -urN &lt;originalsourcedir&gt; &lt;patchedsourcedir&gt;</pre>
<p>
Verwendet man emacs zum Edditieren der Dateien, kann man die Option
<code>-x'*~'</code> an das diff-Kommando anhängen, um automatisch erzeugte
Backup-Dateien zu unterdrücken.
</p>
<p>
Beachten sie bitte, dass sehr große Patches nicht in das CVS-Repository hoch
geladen werden sollten. Sie sollten auf einen web/ftp-Server hoch geladen und
in einem Feld <code>SourceN:</code> deklariert werden. Haben sie keinen
Webserver, können Administratoren von Fink die Datei auf der eigenen Seite von
Fink zur Verfügung stellen. Auch wenn ihr Patch größer als 30 KB ist, sollten
sie überlegen, einen separaten Downlaod zu erstellen.
</p>



<h2><a name="profile.d">6.6 Profile.d scripts</a></h2>
<p>
Benötigt ihr Paket einige Initialisierungen zur Laufzeit (z. B. Setzen von
Umgebungsvariablen), können sie profile.d-Skripte verwenden.
Diese Skript-Fragmente werden durch die Skripte
<code>/opt/sw/bin/init.[c]sh</code> "sourced". Normalerweise werden alle
Fink-Nutzer diese Skripte in ihren Shell-Startup-Skripte
(<code>.cshrc</code> und ähnliche Dateien) laden.
Ihr Paket muss jedes Skript in zwei Varianten zur Verfügung stellen: Eine für
sh-kompatible Shells (sh, zsh, bash, ksh, ...) und eine für csh-kompatible
Shells (csh, tcsh). Sie müssen als
<code>/opt/sw/etc/profile.d/%n.[c]sh</code> installiert werden (wobei %n wie
üblich für den Paketnamen steht).
Es müssen auch ihre executable und read Bits gesetzt werden (d. h. sie müssen
mit -m 755 installiert werden). Ansonsten werden sie nicht korrekt geladen
werden.
</p>
<p>
Muss man nur einige Umgebungsvariablen setzen (z. B. QTDIR auf '/opt/sw'), kann man
das Feld RuntimeVars benutzen; eine bequehme Art, genau dies zu erreichen.
</p>




<?php include_once "../../footer.inc"; ?>


