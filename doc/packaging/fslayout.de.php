<?php
$title = "Paket erstellen - Dateisystem-Layout";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2021/05/27 20:26:32';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="compilers.php?phpLang=de" title="Compiler"><link rel="prev" href="policy.php?phpLang=de" title="Richtlinien zur Estellung von Paketen">';


include_once "header.de.inc";
?>
<h1>Paket erstellen - 4. Dateisystem-Layout</h1>




<p>
Die folgenden Richtlinien für das Layout der Dateiverzeichnisse sind Bestandteil
der Paket-Richtlinien von Fink.
</p>


<h2><a name="fhs">4.1 Hierarchie-Standard für Dateiverzeichnisse</a></h2>
<p>
Fink folgt dem Geist des
<a href="http://www.pathname.com/fhs/">Hierarchie-Standards für
Dateiverzeichnisse</a>, abgekürzt als FHS (Filesystem Hierarchy Standard).
Es kann diesen Standard nur nachempfinden, denn er setzt die Kontralle über
<code>/</code> und <code>/usr</code> voraus.
Fink ist aber ein Zusatz, der nur die Kontrolle über sein eigenes
Installationsverzeichnis hat. Die Beispiele verwenden den voreingestellten
Präfix <code>/sw</code>.
</p>



<h2><a name="dirs">4.2 Die Verzeichnisse</a></h2>
<p>
Dateien sollten in den Verzeichnissen wie folgt abgespeichert werden:
</p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td><code>/sw/bin</code></td><td>
<p>
Dieses Verzeichnis ist für allgemeine ausführbare Programme.
Es hat keine weiteren Unterverzeichnisse.
</p>
</td></tr><tr valign="top"><td><code>/sw/sbin</code></td><td>
<p>
Dieses Verzeichnis ist für Programme, die nur von Administratoren ausgeführt
werden.
Daemon-Programme, die im Hintergrund laufen, gehören hier her.
Es hat keine weiteren Unterverzeichnisse.
</p>
</td></tr><tr valign="top"><td><code>/sw/include</code></td><td>
<p>
Dieses Verzeichnis ist für C und C++ Header-Dateien.
Unterverzeichnisse können je nach Bedarf angelegt werden.
Installiert ein Paket Header-Dateien, die mit Standard C Header-Dateien
verwechselt werden könnten, <b>müssen</b> diese Header-Dateien in ein
Unterverzeichnis.
</p>
</td></tr><tr valign="top"><td><code>/sw/lib</code></td><td>
<p>
Dieses Verzeichnis ist für Daten-Dateien und Bibliotheken, die von der
Architektur abhängen.
Statische und dynamische Bibliotheken gehören direkt in
<code>/sw/lib</code>, außer es gibt sehr gute Gründe.
Ebenso gehören Programme hierher, die nicht direkt vom Nutzer ausgeführt werden
(üblicherweise befinden sich solche Programme in libexec).
</p>
<p>
Ein Paket darf Unterverzeichnisse für private Daten oder ladbare Module anlegen.
Achten sie darauf, dass die Namen der Unterverzeichnisse sinnvoll sind und der
Kompatibilität dienen.
Es ist durchaus sinnvoll, den Namen des Verzeichnisses umd die Hauptversion des
Pakets zu erweitern oder zusätzliche Unterverzeichnisse einzufügen, z. B.
<code>/sw/lib/perl5</code> oder <code>/sw/lib/apache/1.3</code>.
Aufpassen muss man, wenn der Typ des Rechners im Namen verwendet wird.
Ein Verzeichnis mit dem Namen <code>powerpc-apple-darwin1.3.3</code> kann leicht
zu Kompatibilitätsproblemen führen, die sich durch
<code>powerpc-apple-darwin1.3</code> oder <code>powerpc-apple-darwin</code>
leicht vermeiden lassen.
</p>
</td></tr><tr valign="top"><td><code>/sw/lib/ppc64</code>
<code>/sw/lib/x86_64</code></td><td>
<p>
Dieses Verzeichnis ist für 64-bit-Bibliotheken auf 32-bit-Systemen, mit
<code>/sw/lib/ppc64</code> für die PowerPC-Architektur und
<code>/sw/lib/x86_64</code> für die i386-Architektur.
Bibliotheken, die als "fat" erzeugt wurden, sollten aber in
<code>/sw/lib</code> abgespeichert werden und ein '32-64' in ihrem
Feld Shlibs eingetragen haben. Beachten sie, dass unter der x86_64-Architektur
64-bit-Bibliotheken in  <code>/sw/lib</code> werden.
</p>
</td></tr><tr valign="top"><td><code>/sw/share</code></td><td>
<p>
Dieses Verzeichnis ist für architektur-unabhängige Daten-Dateien. Es gelten
die selben Regeln wie für <code>/sw/lib</code>.
Einige Unterverzeichnisse werden im folgenden beschrieben.
</p>
</td></tr><tr valign="top"><td><code>/sw/share/man</code></td><td>
<p>
Dieses Verzeichnis enthält Dokumentationen als man-Pages.
Es ist weiter in die üblichen Abschnitte unterteilt.
Zu jedem Programm in  <code>/sw/bin</code> und
<code>/sw/sbin</code> sollte es hier eine entsprechende man-Page geben.
</p>
</td></tr><tr valign="top"><td><code>/sw/share/info</code></td><td>
<p>
Dieses Verzeichnis enthält Dokumentationen im Info format (erstellt aus
Texinfo Quellen).
Die Pflege der Datei <code>dir</code> ist automatisiert und erfolgt mit
Debians Version von <code>install-info</code> (Teil des Pakets
<code>dpkg</code>).
Verwenden sie das Feld <code>InfoDocs</code>, um entsprechenden Code für die
Skripte <code>postinst</code> und <code>prerm</code> automatisch zu erzeugen.
Fink kümmert sich darum, dass kein Paket eine eigene Datei <code>dir</code>
erzeugt.
Es gibt keine Unterverzeichnisse.
</p>
</td></tr><tr valign="top"><td><code>/sw/share/doc</code></td><td>
<p>
Dieses Verzeichnis enthält Dokumentationen, die weder als man-Page noch als
Info-Dokument vorliegen.
Die Dateien README, LICENSE und COPYING gehören z. B. hier her.
Jedes Paket muss hier sein eigenes Unterverzeichnis anlegen, das wie das Paket
benannt wird.
Die Namen der Unterverzeichnisse dürfen keine Versionsnummern enthalten, außer
wenn diese Nummern Teil des tatsächlichen Paketnamens sind.
Tipp: Verwenden sie einfach <code>%n</code>.
</p>
</td></tr><tr valign="top"><td><code>/sw/share/locale</code></td><td>
<p>
Dieses Verzeichnis enthält Kataloge mit Meldungen für die Internationalisierung.
</p>
</td></tr><tr valign="top"><td><code>/sw/opt</code></td><td>
<p>
In Verzeichnis <code>opt</code> werden "add-on" Programmpakete
abgespeichert, die aus irgendeinem Grund nicht die Standard-Verzeichnisse
<code>/sw/bin</code>, <code>/sw/lib</code>,
<code>/sw/include</code>, usw. nicht verwenden können.
Ein Paket, das in <code>/sw/opt</code> installiert wird, muss seine
statischen Dateien in einem separaten Unterverzeichnis
<code>/sw/opt/&lt;package&gt;</code> abspeichern, wobei
<code>&lt;package&gt;</code> ein Name ist, der das Programmpaket
beschreibt.
(Verfügbar ab Fink 0.29.7 oder später.)
</p>
</td></tr><tr valign="top"><td><code>/sw/var</code></td><td>
<p>
Im Verzeichnis <code>var</code> werden veränderliche Daten gespeichert.
Das umfasst Spool-Verzeichnisse, Lock-Dateien, Status-Datenbanken, Punktestände
von Spielen und Log-Dateien.
</p>
</td></tr><tr valign="top"><td><code>/sw/etc</code></td><td>
<p>
Diese Verzeichnis enthält Konfigurationsdateien.
Gehören zu einem Paket mehr als ein oder zwei Dateien, sollte ein
Unterverzeichnis angelegt werden.
Der Name des Unterverzeichnis muss den Namen des Pakets oder Programms
enthalten, damit es zugeordnet werden kann.
</p>
</td></tr><tr valign="top"><td><code>/sw/src</code></td><td>
<p>
In diesem Verzeichnis werden die Quell-Dateien gespeichert und erfolgt die
Codeerstellung. Vom den Paketen sollte hier nicht weiter installiert werden.
</p>
</td></tr><tr valign="top"><td><code>/sw/Applications</code></td><td>
<p>
In diesem Verzeichnis werden Programm mit einer graphischen Oberfläche im Stil
von OS X abgespeichert, die man normalerweise mit einem Doppelklick startet und
nicht von der Kommandozeile.
</p>
</td></tr><tr valign="top"><td><code>/sw/Library/Frameworks</code></td><td>
<p>
In diesem Verzeichnis werden Frameworks im OS X-Stil abgespeichert. Sie werden
manchmal von Programmen im OS X-Stil genutzt.
</p>
</td></tr></table>



<h2><a name="avoid">4.3 Was sollte man vermeiden?</a></h2>
<p>
Außer den oben genannten Unterverzeichnissen sollte es keine anderen im
Verzeichnis <code>/sw</code> geben.
Insbesondere die folgenden sind explizit nicht erlaubt:
<code>/sw/man</code>, <code>/sw/info</code>,
<code>/sw/doc</code>, <code>/sw/libexec</code> und
<code>/sw/lib/locale</code>.
</p>



<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="compilers.php?phpLang=de">5. Compiler</a></p>
<?php include_once "../../footer.inc"; ?>


