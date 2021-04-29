<?php
$title = "Paket erstellen - Paketbeschreibungen";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2021/04/28 19:08:00';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="policy.php?phpLang=de" title="Richtlinien zur Estellung von Paketen"><link rel="prev" href="intro.php?phpLang=de" title="Einführung">';


include_once "header.de.inc";
?>
<h1>Paket erstellen - 2. Paketbeschreibungen</h1>



<h2><a name="trees">2.1 Verzeichnis-Layout</a></h2>
<p>
Paketbeschreibungen werden aus dem Verzeichnis <code>finkinfo</code> gelesen,
der sich im Verzeichnis <code>/sw/fink/dists</code> befindet. Die
Einstellung "Trees" in der Datei <code>/sw/etc/fink.conf</code>
bestimmt, welche Verzeichnisse gelesen werden.
Der Name der Paketbeschreibungsdatei besteht aus dem vollständigen Paketnamen
und dem Suffix ".info".
Ab Fink 0.26.0 gibt es mehre Möglichkeiten für den Dateinamen: Empfohlen wird
der kürzeste Name, der konsistent mit anderen Paketen ist, die benötigt werden.
Der Dateiname hat folgende Form: der unveränderliche Paketname, optional die
Architektur, optional die Distribution, optional Version oder Version-Revision,
alle durch Bindestriche getrennt und abgeschlossen mit ".info".
Die Komponenten "Architektur" und "Distribution" sind nur erlaubt, wenn die
entsprechenden Felder auch in der Beschreibung vorkommen und exakt einen Wert
zugewiesen haben.
</p>
<p>
Der Baum der Paketveschreibungen ist in mehreren Ebenen von Verzeichnissen
organisiert. Die Verzeichnisse von oben nach unten:
</p>
<ul>
<li><code>dists</code> ist der Anfang. Das Verzeichnis <code>dists</code>
  wird für die Debian Tools benötigt. In neueren Version von Fink ist dies ein
  Symlink zu einem Verzeichnis mit einem distributionsbezogenem Namen.</li>
<li>Die Distributionen. Es gibt <code>stable</code>, <code>unstable</code> und
  <code>local</code>. Das Verzeichnis <code>local</code> wird vom lokalen
  Administrator/Nutzer verwaltet. Die Verzeichnisse <code>stable</code> und
  <code>unstable</code> gehören Fink.</li>
<li>Der Baum. Der Baum enthält die meisten Pakete. Vor dem 1. Juli 2010 wurde
  cryptographische Software in einem separaten Baum namens <code>crypto</code>
  gehalten. Aber jetzt sind diese Pakete auch im Baum <code>main</code>.</li>
<li><code>finkinfo</code>vs. <code>binary-darwin-powerpc</code>.
  <code>finkinfo</code> enthält die Fink-Paketbeschreibungen und Patch-Dateien,
  während das Verzeichnis <code>binary-darwin-powerpc</code> die binären
  <code>.deb</code> Pakete enthält.</li>
<li>Sections. Das Verzeichnis <code>main</code> ist weiter thematisch
  unterteilt, damit es handhabbar bleibt.</li>
</ul>



<h2><a name="format">2.2 Datei-Format</a></h2>
<p>
Die Paketbeschreibungsdateien sind einfache Listen von Schlüssel-Wert-Paaren,
auch Felder genannt.
Jede Zeile beginnt mit einem Schlüssel, der mit einem Doppelpunkt (:)
abgeschlossen wird. Darauf folgt direkt der Wert, also so:
</p>
<pre>Schlüssel: Wert</pre>
<p>
Es gibt zwei Schreibweisen für Felder, die sich über mehrere Zeilen
erstrecken.
</p>
<p>
Die bevorzugte Schreibweise is so wie die here-document-Syntax in
Shell-Skripten. Bei dieser Syntax beginnt die erste Zeile mit dem Schlüssel,
gefolgt von <code>&lt;&lt;</code> als Wert.
Alle nachfolgenden Zeilen werden als eigentlicher Wert behandelt bis eine Zeile
folgt, die nur <code>&lt;&lt;</code> enthält.
Das Beispiel von oben sieht nun so aus:
</p>
<pre>InstallScript: &lt;&lt;
mkdir -p %i/share/man
make install prefix=%i mandir=%i/share/man
mkdir -p %i/share/doc/%n
install -m 644 COPYING %i/share/doc/%n
&lt;&lt;</pre>
<p>
Einrückungen in diesem Format sind optional, können aber für eine erhöhte
Lesbarkeit verwendet werden.
</p>
<p>
Die here-document-Syntax kann verschachtelt sein. Dies wird oft in den Feldern
<code>SplitOff</code> oder <code>SplitOff<b>N</b></code> verwendet.
Diese Felder enthalten weitere Felder (mehrere Zeilen) und diese Syntax erlaubt,
dass auch diese Unterfelder ihrerseits mehrere Zeilen hat. Derselbe Abschluss
mit <code>&lt;&lt;</code> wird bei dem sub-here-document benutzt.
Hier ein Beispiel:
</p>
<pre>SplitOff: &lt;&lt;
  Package: %N-shlibs
  InstallScript: &lt;&lt;
    ln -s %p/lib/libfoo.2.dylib %i/lib/libfoo.%v.dylib
  &lt;&lt;
&lt;&lt;</pre>
<p>
In diesem Format werden Leerzeilen und Zeilen mit einem Hash (#) am Zeilenanfang
ignoriert. Groß-und Kleinschreibung wird beim Schlüssel (Feldnamen) nicht
beachtet, d. h. man kann <code>InstallScript</code>, <code>installscript</code>
oder <code>INSTALLSCRIPT</code>schreiben, wie man will. Allerdings wird die
erste Form mit Großbuchstaben wegen Lesbarkeit empfohlen.
Einige Felder akzeptieren boolesche Werte. Hier werden "true", "yes", "on" und
"1" (auch in Großschreibung) als wahr interpretiert, alle anderen Werte als
falsch.
</p>



<h2><a name="percent">2.3 Prozent-Erweiterungen</a></h2>
<p>
Zur Vereinfachung unterstützt Fink einen Satz an Erweiterungen, die in einigen
Feldern angewendet werden.
Mehrdeutigkeiten kann man verhinder, indem man mit geschweiften Klammern genau
anzeigt, welche Buchstaben für eine Prozent-Erweiterung genommen werden sollen.
<code>%{n}</code> hat zum Beispiel die gleiche Bedeutung wie <code>%n</code>.
Folgende Erweiterungen stehen zur Verfügung:
</p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left"></th><th align="left"></th></tr><tr valign="top"><td>%n</td><td>
<p>Der <b>n</b>ame des Pakets</p>
</td></tr><tr valign="top"><td>%N</td><td>
<p>
Der <b>N</b>ame des Elternpakets (der selbe wie %n außer innerhalb eines
<code>SplitOff</code>)
</p>
<p>
Anmerkung: Wenn ein Eltern-<code>Paket</code>-Feld %type_*[] enthält, dann
<b>werden</b> die Werte der Prozent-Erweiterung in %N in einem
<code>SplitOff</code>-Block mit eingeschlossen. (Schließlich sind sie Teil von
%n bei den Eltern.)
</p>
</td></tr><tr valign="top"><td>%e</td><td>
<p>Die <b>e</b>poche des Pakets</p>
</td></tr><tr valign="top"><td>%v</td><td>
<p>
Die <b>v</b>ersion des Pakets. Beachten sie, dass die Epoche nicht zu
<code>%v</code> gehört.
</p>
</td></tr><tr valign="top"><td>%V</td><td>
<p>
Die vollständige <b>V</b>ersion des Pakets, die automatisch die Epoche
enthält, wenn vorhanden. Beachten sie, dass diese Prozent-Erweiterung nur für
Pakete zur Verfügung steht, deren <code>InfoN</code>-Ebene mindestens 4 ist.
</p>
</td></tr><tr valign="top"><td>%r</td><td>
<p>Die <b>r</b>evision des Pakets</p>
</td></tr><tr valign="top"><td>%f</td><td>
<p>
Der vollständige (<b>f</b>ull) Paketname (%n-%v-%r). Beachten sie, dass die
Epoche nicht zu <code>%f</code> gehört.
</p>
</td></tr><tr valign="top"><td>%p, %P</td><td>
<p>
Der <b>p</b>refix wo Fink installiert ist, also <code>/sw</code>.
Sie dürfen nicht annehmen, dass alle Nutzer Fink in <code>/sw</code>
installiert haben, nutzen sie immer <code>%p</code> für den korrekten Pfad.
</p>
</td></tr><tr valign="top"><td>%d</td><td>
<p>
Im Verzeichnis <b>d</b>estination wird der Baum für ein Paket erstellt, z. B.
in <code>/sw/src/fink.build/root-gimp-1.2.1-1</code>. Dieses
temporäre Verzeichnis dient als Wurzelverzeichnis während der Installationsphase
beim Compilieren eines Pakets. Sie sollten nicht annehmen, dass
<code>root-%f</code> in <code>%p/src</code> ist, denn ein Nutzer
kann dieses Verzeichnis mit dem Feld <code>Buildpath</code> in der Datei
<code>/sw/etc/fink.conf</code> ändern.
</p>
</td></tr><tr valign="top"><td>%D</td><td>
<p>
Das Verzeichnis <b>D</b>estination für das Elternpaket (das selbe wie %d außer
innerhalb eines <code>SplitOff</code>)
</p>
</td></tr><tr valign="top"><td>%i</td><td>
<p>Der vollständige <b>i</b>nstallationsphase-Präfix, äquivalent zu %d%p</p>
</td></tr><tr valign="top"><td>%I</td><td>
<p>
Der <b>I</b>nstall-Präfix des Elternpakets, äquivalent zu %D%P (das selbe wie
%i außer innerhalb eines <code>SplitOff</code>)
</p>
</td></tr><tr valign="top"><td>%a</td><td>
<p>
Der Pfad, wo sich die P<b>a</b>tches befinden. Ab Fink-0.29.0 sollte diese
Variable nicht mehr benutzt werden. Nutzen sie <code>%{PatchFile}</code>, um auf
die <code>.patch</code>-Datei zuzugreifen. Die Unterstützung für
<code>%a</code> wird in der Zukunft entfernt werden.
</p>
</td></tr><tr valign="top"><td>%b</td><td>
<p>
Das Verzeichnis <b>b</b>uild, also
<code>/sw/src/fink.build/gimp-1.2.1-1/gimp-1.2.1</code>.
Sie sollten nicht annehmen, dass sich <code>%f</code> in
<code>%p/src</code> befindent, denn ein Nutzer kann dieses Verzeichnis
über das Feld <code>Buildpath</code> in der Datei
<code>/sw/etc/fink.conf</code> ändern.
Das innerste Verzeichnis wird nach dem Dateinamen der
<code>Quelle</code> benannt oder dem Wert des Felds <code>SourceDirectory</code>
(falls vorhanden) oder wird nicht verwendet wenn das Feld
<code>NoSourceDirectory</code> auf <code>true</code> gesetzt ist.
</p>
<p>
Anmerkung: Nutzen sie dies nur, wenn es gar nicht anders geht. Das Verzeichnis
build ist das aktuelle Verzeichnis, wenn Skripte ausgeführt werden; sie sollten
in Kommandos relative Pfadnamen verwenden.
</p>
</td></tr><tr valign="top"><td>%c</td><td>
<p>
Die <b>c</b>onfigure Parameter: <code>--prefix=%p</code> plus alles, was mit
ConfigureParams angegeben wurde. (Das Verhalten ist anders, wenn das Paket das
Feld <code>Type: perl</code> gesetzt hat. In diesem Fall werden die
Voreinstellungen für das Erstellen von Perl-Paketen anstatt von
<code>--prefix=%p</code> in der Definition von <code>%c</code> verwendet.)
</p>
</td></tr><tr valign="top"><td>%m</td><td>
<p>
Die Zeichenfolge für die Architektur der <b>m</b>achine. Dies ist nicht länger
durch den Typ der Maschine bestimmt, sondern eine Wahl des Nutzers bei der
Installation zwischen den Architekturen, die auf der Hardware des Nutzers
laufen können. Mögliche Werte sind 'powerpc' für PowerPC-Macs und 'i386' oder
'x86_64' für Intel-Macs. Die Auswahl 'x86_64' steht auf Intel-Macs nur zur
Verfügung, wenn der Mac 64-bit Bibliotheken und Programme ausführen kann.
(Dieser Werf wurde etwa in Fink-0.12 eingeführt, die aktuellen Beschreibung gilt
für Fink-0.29.5 und später.)
</p>
</td></tr><tr valign="top"><td>%%</td><td>
<p>
Das Zeichen Prozent (Ein Zeichen, das nicht erweitert wird, was auch immer
danach folgt). Die Erweiterung erfolgt streng von links nach rechts. Damit hat
%%n nichts mit dem Paketnamen zu tun, sondern bedeutet die Zeichenfolge %n. (In
Fink-0.18.0 eingeführt)
</p>
</td></tr><tr valign="top"><td>%type_raw[<b>type</b>], %type_pkg[<b>type</b>],
%type_num[<b>type</b>]</td><td>
<p>
pseudo-hashes, die den Subtyp für den angegebenen <b>type</b> zurückgeben.
Lesen sie die Dokumentation für das Feld <code>Type</code> weiter unten in
diesem Dokument. Die Form _raw ist die exakte Zeichenfolge des Subtyps, während
bei der Form _pkg alle Punkte entfernt wurden (entsprechend Finks Konventionen
für Paketnamen mit Sprachversionen und andere kluge Verwendungen). (Eingeführt
in einer post-0.19.2 CVS-Version von Fink.) Die Form -num wurde in Fink-0.26.0
eingeführt und entfernt alle Zeichen außer Zahlen aus dem Feld <code>Type</code>.
</p>
<p>
Beachten sie, dass <code>(%type_pkg[type])</code> direkt als Bedingung verwendet
werden kann, wenn das Feld <code>Type</code> den <b>type</b> als "Boolean"
deklariert. (Der boolesche Wert ist wahr oder falsch, je nachdem wie der
Subtype ausgerechnet wird.)
</p>
</td></tr><tr valign="top"><td>%{ni}, %{Ni}</td><td>
<p>
Der <b>i</b>nvariante Teil des Paket<b>n</b>amens. Sie sind wie %n and %N,
außer dass alle Teile von %type_pkg[] und %type_raw[] gelöscht sind.
(Eingeführt in einer post-0.19.2 CVS-Version von Fink) Sie sollten %{ni} und
%{Ni} verwenden, um Verwechslungen mit den Erweiterungen %n und %N zu verhindern.
</p>
</td></tr><tr valign="top"><td>%{default_script}</td><td>
<p>
Nur in den Feldern <code>PatchScript</code>, <code>CompileScript</code> und
<code>InstallScript</code> gültig. Es enthält den voreingestellten Inhalt dieser
Felder. Der Wert hängt oft vom Feld <code>Type</code> ab und ist immer definiert
(Er kann aber leer sein). Wird diese Erweiterung im <code>InstallScript</code>
eines <code>SplitOff</code> (oder <code>SplitOff<b>N</b></code>) verwendet,
gibt sie die Voreinstellung der Eltern zurück, selbst wenn die Voreinstellung
für das <code>InstallScript</code> in einem <code>SplitOff</code>-Paket leer
ist. (Eingeführt in Fink-0.20.6)
</p>
</td></tr><tr valign="top"><td>%{PatchFile}</td><td>
<p>
Der vollständige Pfad zu der Datei, die im Feld <code>PatchFile</code> angegeben
ist. (Eingeführt in Fink-0.24.12)
</p>
</td></tr><tr valign="top"><td>%{PatchFile<b>N</b>}</td><td>
<p>
Der vollständige Pfad zu der Datei, die im Feld <code>PatchFile<b>N</b></code>
angegeben ist. (Eingeführt in Fink-0.30.0)
</p>
</td></tr><tr valign="top"><td>%lib</td><td>
<p>
Ist der <code>Type: -64bit</code> als <code>-64bit</code> definiert, wird dies
unter der PowerPC-Architektur zu <b>lib/ppc64</b> erweitert und zu
<b>lib/x86_64</b> unter der i386-Architektur (Der korrekte Speicherort für
64-bit Bibliotheken auf einem 32-bit System); anderfalls wird es zu <b>lib</b>
erweitert. (Eingeführt in Fink-0.26.0)
</p>
<p>
Beachten sie, dass <code>%lib</code> im Feld <code>ConfigureParams</code>
nicht erlaubt ist, außer wenn die <code>InfoN</code>-Ebene mindestens 4 ist.
</p>
</td></tr></table>



<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="policy.php?phpLang=de">3. Richtlinien zur Estellung von Paketen</a></p>
<?php include_once "../../footer.inc"; ?>


