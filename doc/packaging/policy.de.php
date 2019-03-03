<?php
$title = "Paket erstellen - Richtlinien";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/03/03 15:39:00';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="fslayout.php?phpLang=de" title="Dateisystem-Layout"><link rel="prev" href="format.php?phpLang=de" title="Paketbeschreibungen">';


include_once "header.de.inc";
?>
<h1>Paket erstellen - 3. Richtlinien zur Estellung von Paketen</h1>



<h2><a name="licenses">3.1 Paket-Lizenzen</a></h2>
<p>
Die Pakete in Fink stehen unter sehr verschiedenen Lizenzen.
Die meisten beinhalten Restriktionen im Hinblick auf Weiterverteilung der
kompletten Quellen und vor allem der Binärprogramme.
Einige Pakete können wegen solcher Restriktionen nicht Teil von Finks
Binär-Distribution sein.
Deshalb ist es sehr wichtig, dass man als Betreuer eines Pakets die Lizenzen
seines Pakets sorgfältig prüft.
</p>
<p>
Jedes Paket, das als Binärpaket verteilt werden soll, muss eine Kopie der Lizenz
enthalten.
Die Kopie muss im Verzeichnis doc installiert werden,
also in <code>%p/share/doc/%n</code>.
(Im InstallScript muss natürlich %i anstelle von %p verwendet werden.
Das Feld DocFiles erledigt dies automatisch.)
Gibt es keine explizite Lizenz in den originalen Quellen, fügen sie eine
kleine Textdatei bei, in der sie die Situation des pakets beschreiben.
Die meisten Lizenzen verlangen, dass jede Distribution die Lizenz enthält.
Finks Richtlinien ist, dies immer zu tun, auch wenn es nicht explizit verlangt
wird.
</p>
<p>
Für die automatische Verwaltung der binären Distributions ist es erforderlich,
dass jedes Paket, das damit verteilt werden soll, auch das Feld
<code>License</code> gesetzt hat.
Dieses Feld beschreibt die Art der Lizenz und entscheidet darüber, ob ein
Paket in die binäre Distribution aufgenommen wird oder zurück gehalten wird.
Das Feld soll auch nur präsent sein, wenn das binäre Paket auch den eigentlichen
Text der Lizenz enthält, wie oben beschrieben.
</p>
<p>
Das Feld <code>License</code> ist nur brauchbar, wenn einer der folgenden
vordefinierten Werte benutzt wird.
Erstellen sie ein Paket, das nicht in eine dieser Kategorien fällt, dann fragen
sie auf der developer Mailing-Liste um Hilfe.
</p>
<ul>
<li><code>GPL</code> - die GNU General Public Lizenz.
  Diese Lizenz verlangt, dass der Quell-Code am selben Ort wie das Programm
  zur Verfügung steht.</li>
<li><code>LGPL</code> - die GNU Lesser General Public Lizenz.
  Diese Lizenz verlangt, dass der Quell-Code am selben Ort wie das Programm
  zur Verfügung steht.</li>
<li><code>GPL/LGPL</code> - Dies ist ein Spezialfall für Pakete, bei denen ein
  Teil (z. B. das Programm) unter der GPL steht und ein anderer Teil (z. B. die
  Bibliothek) unter der LGPL steht.</li>
<li><code>BSD</code> - für Lizenzen im BSD-Stil.
  Sie umfasst die sogenannte "originale" BSD-Lizenz, die "modifizierte"
  BSD-Lizenz und die MIT-Lizenz. Auch die Apache-Lizenz zählt als BSD-Lizenz.
  Die Distribution der Quellen ist bei diesen Lizenzen optional.</li>
<li><code>Artistic</code> - für die Artistic-Lizenz und davon abgeleitete.</li>
<li><code>Artistic/GPL</code> - Duale Lizenz nach Artistic und GPL.</li>
<li><code>GNU Free Documentation Lizenz</code> und <code>Linux Documentation
  Project</code> - steht die Dokumentation zu einem Paket explizit unter einer
  dieser Lizenzen, dann hängen sie <code>/GFDL</code> oder <code>/LDP</code> an.
  Das ergibt eine der folgenden Kombinationen: "GFDL", "GPL/GFDL", "LGPL/GFDL",
  "GPL/LGPL/GFDL", "LDP" oder "GPL/LGPL/LDP".
</li>
<li><code>DFSG-Approved</code> - für Software, die folgende Richtlinien einhält:
  <a href="http://www.debian.org/social_contract">Debian Social
  Contract</a>.
</li>
<li><code>OSI-Approved</code> - für andere Open-Source-Lizenzen, die von
  folgender Initiative akzeptiert wurde:
  <a href="http://www.opensource.org/">Open Source Initiative</a>
  Eine der Bedingungen von OSI ist, dass die Verteilung von Binärprogrammen und
  Quellen frei erlaubt ist. Dieser Wert kann auch als Schirm für Pakete mit
  Doppellizenz verwendet werden.</li>
<li><code>Restrictive</code> - für einschränkende Lizenzen.
  Benutzen sie diese Lizenz für Pakete, die man von ihren Autoren als Quell-Code
  zur freien Benutzung erhalten kann, aber nicht frei verteilen darf.</li>
<li><code>Restrictive/Distributable</code> - für einschränkende Lizenzen, die
  aber die Verteilung von Quellen und Binärprogrammen erlauben.
  Benutzen sie diese Lizenz für Pakete, die man von ihren Autoren als Quell-Code
  zur freien Benutzung erhalten kann und auch die Verteilung von Quell-Code und
  Binärprogramm erlauben, aber sonstige Einschränkungen haben, die sie zu
  non-open-source-Lizenzen machen.</li>
<li><code>Commercial</code> - für einschränkende, kommerzielle Lizenzen.
  Benutzen sie diese Lizenz für kommerzielle Pakete (z. B. Freeware oder
  Shareware), die die freie Verteilung von Quell-Code oder BinärProgrammen
  nicht zulassen.</li>
<li><code>Public Domain</code> - für Pakete, die Gemeingut sind, d. h. deren
  Autoren ihr Urheberrecht an dem Code aufgegeben haben. Diese Pakete haben
  überhaupt keine Lizenz und jeder kann damit machen, was er will.</li>
</ul>



<h2><a name="openssl">3.2 Die GPL und OpenSSL</a></h2>
<p>(Änderung der Richtlinien ab April 2005.)</p>
<p>
Wegen einer offensichtlichen Inkompatibilität zwischen der OpenSSL-Lizenz und
den GPL- und LGPL-Lizenzen werden Pakete, die OpenSSL-Bibliotheken linken aber
unter der GPL- oder LGPL-Lizenz stehen, als "Restrictive" klassiert. Als
Konsequenz davon wird das Fink-Projekt solche Pakete nicht als Binär-Pakete
anbieten, obwohl es Nutzern frei steht, die Pakete aus den Quellen zu erstellen.
</p>
<p>
Paket-Betreuer sind aufgefordert, die Original-Lizenz des Pakets im Feld
<code>DescPackaging</code> zu vermerken.
</p>



<h2><a name="prefix">3.3 Störungen des Basis-Systems</a></h2>
<p>
Fink ist eine zusätzliche Distribution, die in einem extra Verzeichnis, getrennt
vom Basis-System (OS X) installiert wird.
Es ist von von entscheidender Bedeutung, dass ein Paket keine Dateien außerhalb
von Finks Verzeichnis installiert.
</p>
<p>
Ausnahmen können nur dann gemacht werden, wenn es wirklich nicht anders möglich
ist, z. B. bei XFree86.
In diesen Fällen muss das Paket vor der Installation überprüfen, ob Dateien
vorhanden sind und die Installation verweigern, wenn es vorhandene Dateien
überschreiben würde.
Das Paket muss auch sicher stellen, dass alle Dateien, die außerhalb von Finks
Verzeichnis installiert werden, auch wieder gelöscht werden, wenn das Paket
entfernt wird oder dass sie keinen Schaden verursachen, wenn sie verbleiben (d.
h., dass sie die Präsenz von Programmen überprüfen müssen, bevor sie sie
aufrufen und ähnliches).
</p>



<h2><a name="sharedlibs">3.4 Dynamische Bibliotheken</a></h2>
<p>
Im Februar 2002 traten Finks Richtlinien zu dynamischen Bibliotheken in Kraft.
Dieser Abschnitt der Dokumentation beschreibt die Version 4 dieser Richtlinien
(die mit der Veröffentlichung von Finks 0.5.0 Distribution zusammen fällt.), wie
im Dezember 2006 modifiziert um 64-bit Bibliotheken und im Januar 2008 um
private Bibliotheken zu behandeln. (Außerdem wurde die Diskussion im Juni 2008
aktualisiert, um veraltete Referenzen zu löschen, die aus einer Übergangszeit
stammte, in der die Richtlinien zu dynamischen Bibliotheken implementiert
wurde.) Wir beginnen mit einer kurzen Zusammenfassung und werden die Details
danach diskutieren.
</p>
<p>
Jedes Paket, das dynamische Bibliotheken erstellt, sollte Finks Richtlinien dazu
einhalten. Das bedeutet:
</p>
<ul>
<li>Überprüfen sie mit <code>otool -L</code> (oder <code>otool64 -L</code> für
    64-bit Bibliotheken auf 10.4) dass der install_name jeder Bibliothek und die
    aktuelle Versionsnummer korrekt sind.</li>
<li>Verschieben sie alle öffentlichen dynamischen Bibliotheken gehören in ein
  extra Paket (außer den Links von der libfoo.dylib auf den install_name) und
  fügen sie in diesem Paket das Feld <code>Shlibs</code> hinzu.</li>
<li>Verschieben die Header-Dateien und die finalen Links von der libfoo.dylib in
  ein Paket, das als <code>BuildDependsOnly: True</code> klassifiziert ist und
  planen sie, dass kein anderes Paket von diesem abhängt.</li>
</ul>
<p>
Beachten sie bitte, dass ein Paket auch private dynamische Bibliotheken
installieren kann, die nicht von andern Paketen verlinkt werden sollen. In
diesem Fall müssen die Bibliotheken in ein extra Paket, das aver ebenfalls
das Feld <code>Shlibs</code> haben muss. Außerdem sollte man vermeiden, einen
finalen Link von der libfoo.dylib in das Haupt-Bibliotheksverszeichnis
<code>%i/lib</code> (oder seinem 64-bit Äquivalenz) zu legen. So soll
verhindert werden, dass diese Bibliothek unabsichtlich verlinkt wird.
</p>
<p>
Sollte ein Paketbetreuer gute Gründe haben, von dieser Richtlinie abzuweichen,
sollten diese im Feld <code>DescPackaging:</code> eingetragen werden.
</p>
<p>
Für einige Pakete kann alles mit einem Hauptpaket und einem -shlibs-Paket gelöst
werden. In anderen Fällen braucht man noch mindestens ein drittes Paket. Mit dem
neuen Feld <code>SplitOff</code> geht das recht leicht.
</p>
<p>
Werden drei Pakete benötigt, kann man sie auf zwei Arten benennen, je nachdem ob
die Bibliotheken (Option 1) oder die Binärprogramme (Option 2) das wichtigste am
Paket sind. Bei Option 1 sieht das Layout so aus:
</p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>Dynamische Bibliotheken</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>Header-Dateien</p></td></tr><tr valign="top"><td><code>foo-bin</code></td><td><p>Binärprogramme, usw.</p></td></tr></table>

<p>während bei Option 2 das Layout so aussieht:</p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>Dynamische Bibliotheken</p></td></tr><tr valign="top"><td><code>foo-dev</code></td><td><p>Header-Dateien</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>Binärprogramme, usw.</p></td></tr></table>

<p><b>Die Richtlinien im Detail</b></p>
<p>
Wir werden nun die Dinge im Detail diskutieren. Als Beispiel können sie sich
die Pakete libpng, libjpeg und libtiff anschauen.
</p>
<p>
Software, die nach Darwin oder OS X portiert wird, sollte wenn immer auch
möglich dynamische Bibliotheken erstellen. (Paketbetreuern steht es frei, auch
statische Bibliotheken zu erstellen, wenn das für ihr Paket angemessen ist oder
auch ein Paket zu erstellen, das nur statische Bibliotheken enthält.)
Immer wenn dynamische Bibliotheken erzeugt werden, von denen man erwartet, dass
sie von anderen Paketen benutzt werden, sollten <b>zwei</b> Pakete mit den
Namen foo und foo-shlibs erstellt werden. Die dynamische Bibliotheke gehört in
foo-shlibs und die Header-Dateien in foo. Beide Pakete können in einer Datei
foo.info mit Hilfe des Felds <code>SplitOff</code> erzeugt werden, wie weiter
unten beschrieben.
(Tatsächlich müssen oft mehr als zwei Pakete aus den Quellen erzeugt werden. Das
kann leicht über die Felder <code>SplitOff2</code>, <code>SplitOff3</code> usw.
erreicht werden.)
</p>
<p>
Jedes Softwarepaket mit dynamischen Bibliotheken braucht eine
<b>Hauptversionsnummer</b> N, die in den Namen der Bibliothek eingefügt wird
(z. B. <code>libbar.N.dylib</code>).
Diese Hauptversionsnummer soll sich nur ändern, wenn sich die API der
Bibliothek so ändert, dass sie nicht mehr rückwärts-kompatibel ist. Fink benutzt
folgende Konvention für die Namensgebung: Ist der Upstream-Name bar, erhalten
die Fink-Pakete die namen barN und barN-shlibs. (Diese Regel gilt streng nur für
neue Pakete und Pakete, bei denen sich die Hauptversionsnummer ändert.) Ist z.
B. die Hauptversionsnummer des vorliegenden Pakets libpng eine 2 und die Nummer
der neuen Version eine 3, dann macht man daraus folgende vier Pakete: libpng,
libpng-shlibs, libpng3 und libpng3-shlibs.
Nur jeweils eines der Pakete libpng oder libpng3 kann installiert sein.
(Beachte, dass nur zwei2 .info-Dateien für die vier Pakete benötigt werden.)
</p>
<p>
Die eigentliche dynamische Bibliothek und einige dazu gehörige Dateien kommen
in das Paket barN-shlibs. Die "include" und andere Dateien kommen in das Paket
barN. Diese beiden Paketen haben keine gemeinsamen Dateien und alle Dateien in
barN-shlibs müssen die Hauptversionsnummer in Namen ihres Pfades haben. In
vielen Fällen braucht das Paket zur Laufzeit Dateien, die typischerweise in
<code>%i/lib/bar/</code> oder <code>%i/share/bar/</code>
installiert sind. Sie sollten deshalb die Installationspfade auf
<code>%i/lib/bar/N/</code> oder <code>%i/share/bar/N/</code>
einstellen.
</p>
<p>
Alle anderen Pakete, die von bar mit der Hauptversionsnummer N abhängen,
brauchen folgende Felder:
</p>
<pre>  Depends: barN-shlibs
  BuildDepends: barN</pre>
<p>
Es ist für andere Pakete nicht erlaubt, direkt von barN abzuhängen. (Auch wenn
es noch einige Pakete mit solchen Abhängigkeiten aus der Zeit vor Februar 2002
geben kann). Dies wird in der Paketbeschreibung von barN mit dem boolschen Feld
BuildDependsOnly an die Betreuer anderer Pakete signalisiert:
</p>
<pre>  BuildDependsOnly: True</pre>
<p>
Enthält ihr Paket sowohl dynamische Bibliotheken und Binärdateien und die
Binärdateien werden zur Laufzeit benötigt und nicht nur bei der Erzeugung des
Pakets, dann müssen die Binärdateien zusätzlich zum Paket barN-shlibs in ein
drittes Paket mit dem Namen barN-bin gepackt werden.
</p>
<p>
Erstellt man eine dynamische Bibliothek mit der Hauptversionsnummer N, ist es
wichtig, dass der "install_name" der Bibliothek
<code>%p/lib/libbar.N.dylib</code> ist. (Sie können den "install_name"
mit dem Befehl <code>otool -L</code> oder <code>otool64 -L</code> für 64-bit
Bibliotheken auf 10.4 heraus finden.) Die tatsächliche Bibliothek kann an einer
anderen Stelle installiert sein.
</p>
<pre>  %i/lib/libbar.N.x.y.dylib</pre>
<p>und ihr Paket erzeugt symbolische Links:</p>
<pre>  %i/lib/libbar.N.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/libbar.dylib -&gt; %p/lib/libbar.N.x.y.dylib</pre>
<p>
aus dem install_name-Pfad und vom linking-Pfad zu der tatsächlichen
Bibliothek. (Das erste wird nicht benötigt, wenn die Bibliotheke tatsächlich
beim install_name-Pfad installiert ist, was zunehmend der Fall ist.)
</p>
<p>Wird auch eine statische Bibliothek erzeugt, wird sie hier installiert:</p>
<pre>  %i/lib/libbar.a</pre>
<p>
Verwendet das Paket libtool, wird dies alles automatisch erledigt, aber man
sollte auf jeden Fall überprüfen, dass dies auch korrekt gemacht wurde. Sie
sollten auch überprüfen, ob die current_version und die compatibility_version
für ihre dynamischen Bibliotheken richtig definiert wurden. (Diese werden
ebenso mit den Abfragen <code>otool -L</code> oder <code>otool64 -L</code> für
64-bit Bibliotheken angezeigt.)
</p>
<p>Die Dateien wird wie folgt zwischen den beiden Paketen aufgeteilt:</p>
<ul>
<li>im Paket barN-shlibs:
<pre>  %i/lib/libbar.N.x.y.dylib
  %i/lib/libbar.N.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/bar/N/*
  %i/share/bar/N/*
  %i/share/doc/barN-shlibs/*</pre></li>
<li>im Paket barN:
<pre>  %i/include/*
  %i/lib/libbar.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/libbar.a
  %i/share/doc/barN/*
  andere Dateien, falls vorhanden</pre></li>
</ul>
<p>
Beachten sie, dass beide Pakete die Dokumentation zu ihren Lizenzen benötigen,
die Verzeichnisse mit den DocFiles aber unterschiedlich sind.
</p>
<p>
Das macht man in der Praxis am einfachsten mit dem Feld <code>SplitOff</code>.
Das folgende Beispiel zeigt die wichtigsten Teile:
</p>
<pre>Package: barN
Version: N.x.y
Revision: 1
License: GPL
Depends: barN-shlibs (= %v-%r)
BuildDependsOnly: True
DocFiles: COPYING
SplitOff: &lt;&lt;
  Package: barN-shlibs
  Files: lib/libbar.N.x.y.dylib lib/libbar.N.dylib lib/bar/N
  DocFiles: COPYING
&lt;&lt;</pre>
<p>
Bei der Bearbeitung des Felds <code>SplitOff</code> werden die angegebenen
Dateien und Verzeichnisse aus dem Installationsverzeichnis %I des Hauptpakets in
das Installationsverzeichnis %i des SplitOff-Pakets verschoben. (Die Konvention
für Namen ist ähnlich: %N ist der Name des Hauptpakets und %n der Name des
aktuellen Pakets.)
Das Feld/Kommando <code>DocFiles</code> kopiert die Dokumentationsdateien in das
Verzeichnis <code>%i/share/doc/barN-shlibs</code>.
</p>
<p>
Beachten sie, dass die exakte Version von barN-shlibs als Abhängigkeit im
Hauptpaket barN steht (das mit %N-shlibs (= %v-%r) abgekürzt werden kann).
Damit wird sicher gestellt, dass die Versionen passen und dass das Paket barN
automatisch alle Abhängigkeiten von barN-shlibs "erbt".
</p>
<p><b>Das Feld BuildDependsOnly</b></p>
<p>
Werden Bibliotheken im Laufe der Zeit aktualisiert, ist es oft notwendig, zwei
Versionen der Header-Dateien während der Übergangsphase zur Verfügung zu haben.
Eine Version für das Übersetzen von dem einen und eine für das Übersetzen von
etwas anderem. Deshalb muss man bei der Erstellung der Pakete etwas aufpassen.
Enthalten die Pakete foo-dev und bar-dev überlappende Header, dann muss in
foo-dev folgendes deklariert werden:
</p>
<pre>  Conflicts: bar-dev
  Replaces: bar-dev</pre>
<p>und genau so, aber umgekehrt, in bar-dev.</p>
<p>
Darüber hinaus sollten beide Pakete das Feld BuildDependsOnly gesetzt haben.
</p>
<pre>  BuildDependsOnly: True</pre>
<p>
Dies verhindert, dass man Pakete erstellt, die von foo-dev oder bar-dev
abhängen, denn so etwas würde das problemlose Funktionieren des Methode
Conflicts/Replaces verhindern.
</p>
<p>
Es gibt manche Pakete mit Header-Dateien, für die es nicht in Ordnung ist,
BuildDependsOnly als wahr zu setzen. In diesen Fällen sollten sie das Feld
explizit auf falsch setzen:
</p>
<pre>  BuildDependsOnly: False</pre>
<p>und den Grund dafür im Feld DescPackaging angeben.</p>
<p>
Das Feld BuildDependsOnly sollte nur bei solchen Paketen stehen, die
Header-Dateien in <code>%i/include</code> (oder einem Unterverzeichnis)
installieren.
</p>
<p>
Ab Fink 0.20.5 erzeugt der Befehl "fink validate" eine Warnung für jede
.deb-Datei, die Header-Dateien und mindestens eine dynamische Bibliothek
enthält und das Feld BuildDependsOnly weder auf wahr noch falsch setzt.
(Es ist durchaus möglich, dass Fink in Zukunft dies auf Fälle von
.deb-Dateien ausdehnt, die Header-Dateien und statische Bibliotheken
enthält.)
</p>
<p>
Das Ziel der Reichtlinien über dynamische Bibiliotheken ist, dass die
Kompatibilität zwischen den Bibliotheken un dProgrammen in verschiedenen
Paketen gewährleistet ist.  Manche Pakete können Bibliotheken enthalten,
die gar nicht dafür gedacht sind, von anderne Programmen benutzt zu
werden.  Ein häufige Situation ist, dass eine Gruppe von Programmen eine
Backend-Bibliothek mit Hilfsprogrammen haben oder ein Programm, das mehrere
Plugins für bestimmte Features hat.  Da diese Bibliotheken quasi privat
für das Paket sind, braucht man dafür kein extra SplitOff -shlibs und auch
kein <code>BuildDependsOnly</code>.
</p>
<p><b>Das Feld Shlibs</b></p>
<p>
Zusätzlich dazu, dass dynamische Bibliotheken in ein extra Paket gehören,
müssen ab Version 4 dieser Richtlinien alle dynamische Bibliotheken im
Feld <code>Shlibs</code> eingetragen werden. Dieses Feld hat für jede dynamische
Bibliothek nur eine Zeile mit dem <code>-install_name</code> der Bibliothek.
Ist die Bibliothek öffentlich, steht in der Zeile auch die
<code>-compatibility_version</code>, Informationen zur Abhängigkeit mit Version
darüber, welches Fink-Paket die Bibliothek mit dieser
<code>-compatibility_version</code> enthält und die Architektur der Bibliothek.
(Die Architektur der Bibliothek kann "32", "64" oder "32-64" sein oder ganz
fehlen. Ist sie nicht explizit angegeben, wird die Voreinstellung genommen, d.h.
"32" für PowerPC und i386 und "64" für x86_64.) Die Abhängigkeit sollte in der
Form <code>foo (&gt;= version-revision)</code> angegeben sein, wobei sich
<code>foo (&gt;= version-revision)</code> auf die <b>erste</b> Version des
Finkpakets bezieht, das diese Bibliothek (mit der compatibility version) zur
Verfügung stellte. Das folgende Beispiel
</p>
<pre>  Shlibs: &lt;&lt;
  %p/lib/libbar.1.dylib 2.1.0 bar1 (&gt;= 1.1-2) 32
  &lt;&lt;</pre>
<p>
ist eine (32-bit) Bibliothek mit dem <code>-install_name</code>
%p/lib/libbar.1.dylib und der <code>-compatibility_version</code> 2.1.0, die
in der Version 1.1-2 des Pakets <b>bar1</b> zum ersten Mal angeboten wurde.
Außerdem impliziert die Deklaration, dass der Betreuer versichert, dass auch in
späteren Versionen des Pakets <b>bar1</b> eine 32-bit Bibliothek mit diesem
Namen und einer Kompatibilitätsversion von mindestens 2.1.0 angeboten wird.
</p>
<p>
Beachten sie die Verwendung von %p im Pfad der Bibliothek. Dadurch wird der
richtige <code>-install_name</code> von allen Finknutzern gefunden, egal ob sie
/sw oder einen anderen Präfix für Fink ausgewählt haben.
</p>
<p>
Wird ein Paket aktualisiert, kann meistens das Feld <code>Shlibs</code> einfach
in die nächste Version/Revision des Pakets kopiert werden. Nur wenn sich die
Kompatibilitätsversion erhöht, muss die Versionsnummer in der Abhängigkeit
auf die aktuelle Version/Revision geändert werden, denn hier muss die
Version/Revision stehen, in der die neue Kompatibilitätsversion der Bibliothek
zum ersten Mal angeboten wird.
</p>
<p>
Für private Bibliotheken ist die Syntax für den Eintrag im Feld
<code>Shlibs</code> eine andere:
</p>
<pre>  Shlibs: &lt;&lt;
    !%p/lib/%N/libbar.1.dylib
  &lt;&lt;</pre>
<p>
Das Ausrufungszeichen am Anfang steht für private Bibliothek. Weitere
Informationen über die Bibliothek sind nicht relevant und werden deshalb weg
gelassen.
</p>
<p>
Beachten sie, dass in diesem Beispiel die private Bibliothek in ein eigenes
Unterverzeichnis <code>%N</code> (das nach dem Namen des Pakets benannt
wurde) des Verzeichnisses <code>%i/lib</code> verschoben wird. Dies ist
unsere Empfehlung als zusätzlicher Schutzmechanismus, der verhindert, dass
andere Pakete diese Bibliothek aus Versehen verlinken.
</p>
<p>
<b>Was muss ich machen, wenn sich die Nummer der Hauptversion ändert?</b>
</p>
<p>
Ändert sich die Nummer der Hauptversion von N auf M, muss man zwei neue Pakete
barM und barM-shlibs erstellen. Das Paket barM-shlibs darf keine gemeinsamen
Dateien mit dem Paket barN-shlibs haben, weil viele Nutzer die beiden Pakete
gleichzeitig installieren werden. Im Paket barM sollte man folgende
Abhängigkeiten deklarieren:
</p>
<pre>  Conflicts: barN
  Replaces: barN</pre>
<p>
Im Paket barN muss man in entsprechender Weise, also umgekehrt, folgendes
einfügen
</p>
<pre>  Conflicts: barM
  Replaces: barM</pre>
<p>
Bei der Erstellung von anderen Paketen werden die Pakete barN und barM
ausgetauscht, je nachdem, welches von den beiden benötigt wird. Die Pakete
barN-shlibs und barM-shlibs bleiben hingegen die ganze Zeit installiert.
</p>
<p><b>Pakete mit Bibliotheken und Binärdateien:</b></p>
<p>
Enthält eine Upstream-Paket gleichzeitig Binärdateien und öffentliche
Bibliotheken, muss man bei der Erstellung der Finkpakete aufpassen. Manchmal
sind die Binärdateien lediglich <code>foo-config</code>, die nur in der
Erstellungs-Phase des Pakets benötigt werden und nie zur Laufzeit. In solchen
Fällen können diese Dateien zusammen mit den Header-Dateien in das Paket
<code>foo</code>.
</p>
<p>
In anderen Fällen werden die Binärdateien von anderen Paketen auch zur Laufzeit
benutzt. Dann müssen sie in ein separates Finkpaket abgetrennt werden, das man
z. B. <code>foo-bin</code> nennen kann. Das Paket <code>foo-bin</code> sollte
vom Paket <code>foo-shlibs</code> abhängen. Betreuer anderer Pakete sollten
aufgefordert werden, die Abhängigkeit von <code>foo-bin</code> in ihrem Paket
zu deklarieren:
</p>
<pre>  Depends: foo-bin
  BuildDepends: foo</pre>
<p>Damit ist die Abhängigkeit von foo-shlibs implizit enthalten.</p>
<p>
Allerdings ist die Aktualisierung in dieser Situation ein Problem, denn ein
Nutzer wird nicht aufgefordert werden, das Paket <code>foo-bin</code> zu
installieren. Eine Lösung, bis alle anderen Paketbetreuer ihre Pakete
wie oben beschrieben aktualisiert haben, können sie folgende Abhängigkeit in
ihrem Paket <code>foo</code> deklarieren:
</p>
<pre>  Depends: foo-shlibs (= exact.version), foo-bin</pre>
<p>
Dies erzwingt die Installation des Paket <code>foo-bin</code> auf den meisten
Systemen, solange bis die anderen Paketbetreuer ihre Pakete, die von
<code>foo</code> abhängen, aktualisiert haben.
</p>
<p>
Ab Fink 0.28.0 (veröffentlich im Januar 2008) hat sich das Format für einen
Eintrag im Feld <code>Shlibs</code> für private dynamische Bibliotheken
geändert. (Beachten sie bitte die obigen Erläuterungen zu den Unterschieden
zwischen privaten und öffentlichn dynamischen Bibliotheken.) Die Richtlinien für
dynamische Bibliotheken war schon immer so, dass alle dynamische Bibliotheken
aufgezählt werden müssen. Die Änderung betrifft nur das Feld
<code>Shlibs</code>. Da private Bibliotheken nicht von anderen Paketen benutzt
werden, ist es auch nicht notwendig, die Kompatibilitätsversion oder andere
Versionsinformationen anzugeben. Statt dessen wird ein Ausrufungszeichen
verwendet. Ist z. B. <code>libquux.3.dylib</code> der
<code>install_name</code> einer privaten dynamischen Bibliothek, würde sie so
aufgelistet werden:
</p>
<pre>  Shlibs: &lt;&lt;
    !%p/lib/libquux.3.dylib
  &lt;&lt;</pre>



<h2><a name="perlmods">3.5 Perl-Module</a></h2>
<p>
Die erste Version von Finks Richtlinien zu Perl-Modulen wurde im Mai 2003
implementiert und erhielt im April 2004 die erste Revision.
</p>
<p>
Ursprünglich hatten Fink-Pakete für Perl-Module den Suffix <code>-pm</code> und
wurden mit der Direktive <code>Type: perl</code> erstellt. Damit wurden die
Dateien der Module in <code>/sw/lib/perl5</code> und/oder
<code>/sw/lib/perl5/darwin</code> abgespeichert.
Nach den aktuellen Richtlinien gilt dies nur noch für Module, die unabhängig von
der Perlversion übersetzt wurden und die auch nicht von anderen
versionsabhängigen Modulen abhängen.
</p>
<p>
Versionsabhängige Perl-Module sind die sogenannten XS-Module, die oft
übersetzten C Code und Perl-Routinen enthalten. Man kann sie auf verschiedene
Weisen erkennen, z. B. daran, die sie eine datei mit dem Suffix
<code>.bundle</code> enthalten.
</p>
<p>
Ein versionsabhängiges Perl-Modul muss mit einer bestimmten binären Version von
Perl erstellt werden, z. B. <code>perl5.12.3</code>. Die erzeugten Dateien
müssen dann in einem versionierten Unterverzeichnis des
Standard-Perlverzeichnisses abgespeichert werden, z. B.
<code>/sw/lib/perl5/5.12.3</code> und
<code>/sw/lib/perl5/5.12.3/darwin</code>. Es ist Konvention, die Pakete
mit dem Suffix <code>-pm5123</code> zu benennen, wenn sie für die Version 5.12.3
von Perl erstellt wurden. Entsprechende Konventionen für das Abspeichern und
die Namen von Modulen sind perl 5.10.0 (nur für 10.6), perl 5.12.4 (but für
10.7) und perl 5.16.2 (nur für 10.7).
</p>
<p>
Die Direktive <code>Type: perl 5.12.3</code> führt automatisch dazu, dass
das versionierte binäre Perl verwendet wird und speichert die Dateien in den
richtigen Unterverzeichnissen ab. (Diese Direktive steht in Fink ab der Version
0.13.0 zur Verfügung.)
</p>
<p>
Die Richtlinien vom Mai 2003 erlaubten es, ein Paket <code>-pm</code> zu
erstellen, das eigentlich ein Paket-"Bündel" ist, das die Variante
<code>-pm560</code> oder je nach Verfügbarkeit eine andere lädt. Die Richtlinien
vom April 2004 raten davon ab und nach einer Übergangsphase wurde diese
Möglichkeit komplett verboten.
</p>
<p>
Ab der Version 0.20.2 von Fink stellt das Paket system-perl automatisch
bestimmte Perl-Module zur Verfügung, je nach Version von system-perl. Der Code,
mit der die Liste erstellt wird, steht in der Datei <code>VirtPackage.pm</code>,
die Bestandteil des Pakets <code>fink</code> ist.
</p>
<p>
Da verschiedene system-perl unterschiedliche Module zur Verfügung stellen, wird
Paketbetreuern empfohlen, dass sie die Liste überprüfen, wenn sie eines der
Perl-Module verwerden.
</p>
<p>
Ab der Version 0.13.0 von Fink überprüft das Kommando
<code>fink validate</code> bei einer <code>.deb</code>-Datei, ob das Finkpaket
ein XS-Module ist, das in einem nichtversionierten Verzeichnis abgespeichert ist
und gibt eine entsprechende Warnung aus.
</p>
<p>
Nutzer können mehrere Versionen von Perl gleichzeitig installiert haben. Deshalb
müssen versionsabhängige Modulpakete so geschireben sein, dass mehrere Versionen
des Pakets installiert sein können. Besondere aufpassen muss man bei der
Installation von man-Pages und binären oder anderen Programmen, damit wegen
Namenskollissionen keine Installationskonflikte auftreten.
Man darf in einem Paket, dessen Namen auf -pm<b>XYZ</b> endet, keine Dateien
haben, die für verschiedene <b>XYZ</b> die gleichen Pfadnamen haben. Auch ein
<code>Replaces</code> für das einfache Überschreiben der Dateien wird nicht mehr
akzeptiert. Ab März 2005 definiert Fink als einfache Lösung zusätzliche Plätze
im MANPATH: <code>%p/lib/perl5/X.Y.Z/man</code> für jedes perl-X.Y.Z.
Deshalb muss man keine extra SplitOff-Pakete -man oder -doc mehr erstellen, die
sich jeweils gegenseitig ausschließen. Die Konflikte zwischen uri-pm5124 und
uri-pm5162 werden z. B. so aufgelöst, dass die gleich man-Page
<code>URI.3pm</code> jeweils unter
<code>%p/lib/perl5/5.12.4/man/man3/URI.3pm</code> oder
<code>%p/lib/perl5/5.16.2/man/man3/URI.3pm</code> abgespeichert wird.
Beachten sie bitte, dass sich die Standard-Skripte für
<code>Type: perl X.Y.Z</code> nicht geändert haben und man deshalb die man-Pages
selbst im <code>InstallScript</code> suchen muss. Ist das Skript nicht
hochgradig kompliziert, dann kann man das Standard-Skript verwenden und die
Dateien einfach mit mv verschieben:
</p>
<pre>%{default_script}
mv %i/share/man %i/lib/perl5/5.12.4</pre>
<p>
Dies verschiebt alle man-Pages. Will man nur einen Abschnitt der man-Pages
verschieben (z. B. nur Abschnitt 3, die man-Pages für die Module und nicht die
man-Pages für Skripte in Abschnitt 1), funktioniert folgendes:
</p>
<pre>%{default_script}
mkdir -p %i/lib/perl5/5.12.4/man
mv %i/share/man/man3 %i/lib/perl5/5.12.4/man</pre>
<p>
Hat man Programme, z. B.Demo- und Hilfs-Skripte, in <code>%p/bin</code>,
gibt es mehrere Optionen. Eine ist, die Dateien zusammen mit den dazugehörigen
man-Pages und so weiter in ein SplitOff-Paket %N-bin zu packen. Mit den Feldern
<code>Conflicts</code> und <code>Replaces</code> muss man für den gegenseitigen
Austausch bei der Installation der Dateien für verschiedene Perlversionen
sorgen. Der Nutzer kann viele verschiedene Perlversionen der Laufzeit-Module
installieren und dann zu einer bestimmten Zeit die gewünschte Perlversion des
Skripts auswählen. Das Paket Tk.pm kommt z. B. mit dem Programm
<code>ptksh</code>. Der Satz an tk-pm* Paketen kann man wie folgt
erzeugen:
</p>
<pre>Info2: &lt;&lt;
Package: tk-pm%type_pkg[perl]
Type: perl (5.12.3 5.12.4 5.16.2)
InstallScript: &lt;&lt;
  %{default_script}
  mkdir -p %i/lib/perl5/%type_raw[perl]/man
  mv %i/share/man/man3 %i/lib/perl5/%type_raw[perl]/man
&lt;&lt;
SplitOff: &lt;&lt;
  Package: %N-bin
  Depends: %N
  Conflicts: %{Ni}5.12.3, %{Ni}5.12.4, %{Ni}5.16.2
  Replaces: %{Ni}5.12.3, %{Ni}5.12.4, %{Ni}5.16.2
  Files: bin share/man/man1
&lt;&lt;
&lt;&lt;</pre>
<p>
Die andere Option ist die Skripte und ihre man-Pages so umzubenennen, dass
die Namen die Perlversion enthalten. Bei dieser Optione kommt es erst gar nicht
zu einem Namenskonflikt, so dass die %N-bin SplitOffs sich nicht gegenseitig
ausschließen müssen:
</p>
<pre>Info2: &lt;&lt;
Package: tk-pm%type_pkg[perl]
Type: perl (5.12.3 5.12.4 5.16.2)
InstallScript: &lt;&lt;
  %{default_script}
  mkdir -p %i/lib/perl5/%type_raw[perl]/man
  mv %i/share/man/man3 %i/lib/perl5/%type_raw[perl]/man
  mv %i/bin/ptksh %i/bin/ptksh%type_raw[perl]
  mv %i/share/man/man1/ptksh.1 %i/share/man/man1/ptksh%type_raw[perl].1
&lt;&lt;
&lt;&lt;</pre>
<p>
Der Nutzer kann jederzeit das ptksh für ein bestimmtes Perl benutzen. Besonders
komfortabel für die Nutzer ist es, mit <code>update-alternatives</code> den
Aufruf auch mit dem allgemeinen Namen ohne Perlversion zu ermöglichen.
</p>
<p>
Ab März 2005 wurde auch der Platz für die man-Pages und die Module, die vom
Finkpaket für Perl selbst (also die Pakete perlXYZ und perlXYZ-core mit
Versionen, die vom der von Apple abweichen) geändert. Deshalb sollten andere
Finkpakete die aktualisierte Versionen von core-Perl-Modulen anbieten, die
Pakete perlXYZ oder perlXYZ-core nicht in ihrem Feld <code>Replaces</code>
auflisten.
</p>



<h2><a name="emacs">3.6 Emacs-Richtlinien</a></h2>
<p>
Das Finkprojekt hat entschieden, den Richtlinien des Debianprojekts zu Emacs zu
folgen mit wenigen kleinen Unterschieden.
(Das Dokument zu den Debian-Richtlinien gibt es hier:
<a href="http://www.debian.org/doc/packaging-manuals/debian-emacs-policy">
http://www.debian.org/doc/packaging-manuals/debian-emacs-policy</a>.)
Es gibt zwei Unterschiede bei den Richtlinien von Fink. Erstens gelten die
Richtlinien derzeit nur für die Pakete <code>emacs21</code>,
<code>emacs22</code> und <code>emacs23</code> und nicht für das
Paket xemacs. (Dies kann sich eines Tages ändern.) Zweitens dürfen Finkpakete im
Gegensatz zu den Debian-Richtlinien Dateien direkt im Verzeichnis
/sw/share/emacs/site-lisp installieren
</p>



<h2><a name="sources">3.7 Quelldateien-Richtlinien</a></h2>
<p>
Quelldateien sollen normalerweise von da herunter geladen werden, wo
Upstream-Entwickler sie anbieten. Jegliche Modifikation für das Finkpaket sollte
mit Patch-Dateien und/oder Patch-Skripten erfolgen. Man sollte also nicht die
Quelldateien abändern und im Finkpaket ein Archiv mit den geänderten Dateien
als <code>Source</code> verwenden.
</p>
<p>
Wird ein vcs Checkout verwendet (z. B. <b>git</b> oder <b>svn</b>), weil
z. B. das Projekt keine formalen Releases veröffentlicht oder eine wichtige
Problemlösung zwischen den Releases eingepflegt wurde, kann eine akzeptable
Quelle auf folgende Art und Weise erzeugt werden:
</p>
<ol>
<li>Führen sie ein Checkout des Pakets durch, vorzugsweise zu einer dezidierten
  Revision des VCS.</li>
<li>Erstellen sie ein Archiv aus dem VCS-Checkout (z. B. ein <b>zip</b>,
  <b>tar</b>, <b>tar.gz</b> oder <b>tar.bz2</b>).
  <p>Geben sie dem Tarball eine eindeutige Version. Sie können die
    VCS-Revision verwenden, wenn es überhaupt keine Releases des Pakets gibt,
    z. B. <code>foo-0svn1234.tar.gz</code> oder
    <code>bar-1.2.3+svn4567.tar.bz2</code> für eine Version zwischen
    zwei Releases.</p></li>
<li>Nutzen sie die gleiche <code>Version</code> in ihrer
  <code>.info</code>-Datei.</li>
<li>Es ist äußerst hilfreich, die Kommandos für die Erzeugung des
  Quelldatei-Tarballs im Feld <code>DescPackaging</code> zu dokumnetieren.</li>
<li>Laden sie den Tarball auf eine öffentliche Download-Seite hoch, wo Nutzer
  sie mit <code>fink</code> herunter laden können. Haben sie keinen
  entsprechenden Zugang, fragen sie in der
  <a href="mailto:fink-devel@lists.sourceforge.net">Fink developers
  Mailing-Liste</a> oder im
  <a href="http://webchat.freenode.net">IRC channel #fink</a>.
  nach und ihnen wird sicher geholfen werden.</li>
</ol>



<h2><a name="downloading">3.8 Datei-Download-Richtlinien</a></h2>
<p>
Pakete dürfen in den Phasen unpack, patch, compile, install oder den build
Phasen während des <a href="reference.php?phpLang=de#build">build-Prozess</a> keinerlei Dateien herunter laden. Alle
größeren Patches (also alles, was man nicht in einer üblichen Patchdatei
unterbringen kann) sollten als zusätzliche Quelldateien entsprechend den
<a href="policy.php?phpLang=de#sources">Quelldatei-Richtlinien</a>
aufgesetzt werden.
</p>
<p>
Unter bestimmten, eng umrissenen Umständen dürfen Pakete im PostInstScript
Dateien herunter laden, nachdem sie installiert sind:
</p>
<ul>
<li>Aktualisierungen der Pakete sind verboten.</li>
<li>Die Daten/Dateien sind so, dass sie nicht leicht in ein Finkpaket zu packen
  sind. Die Virusdefinitionen für <code>clamav</code> können z. B. im
  PostInstScript herunter geladen werden, weil sie sich laufend ändern.</li>
</ul>
<p>
Sind sie sich nicht sicher, dann schicken sie eine Email an das
<a href="mailto:fink-core@lists.sourceforge.net">Fink Core Team</a>.
</p>



<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="fslayout.php?phpLang=de">4. Dateisystem-Layout</a></p>
<?php include_once "../../footer.inc"; ?>


