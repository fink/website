<?php
$title = "Porting - libtool";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Porting Contents"><link rel="next" href="preparing-10.2.php?phpLang=de" title="Vorbereitungen für 10.2"><link rel="prev" href="shared.php?phpLang=de" title="Gemeinsam benutzter Code">';


include_once "header.de.inc";
?>
<h1>Porting - 3. GNU libtool</h1>
    
    
    
      <p>
        GNU Pakete, die Bibliotheken erstellen, nutzen GNU libtool, um die
        platformspezifischen Prozeduren für das Erstellen und die Installation
        der Bibliotheken zu verbergen.
      </p>
    
    <h2><a name="situation">3.1 Die Situation</a></h2>
      
      <p>Derzeit gibt es vier verschiedene Stränge von libtool:</p>
      <ul>
        <li><p>
          <b>libtool 1.3</b>:
          Der häufigste Strang. Die letzte Version dieses Strangs ist 1.3.5.
          Es kennt Darwin nicht und erzeugt nur statische Bibliotheken. Man
          kann es an der Präsenz der Dateien <code>ltconfig</code> und
          <code>ltmain.sh</code>im Quelltextbaum erkennen.
        </p></li>
        <li><p>
          <b>libtool 1.4</b>:
          Lange bearbeitet und vor kurzem als die neue stabile Version heraus
          gegeben. Dieser Strang hat eine bessere Integration von autoconf.
          Unglücklicherweise wird dadurch die Migration von 1.3 basierten
          Paketen nicht trivial. Es unterstützt Darwin 1.3 / Mac OS X 10.0
          und benötigt nur geringfügige Patches für Mac OS X 10.1.
          Man kann es daran erkennen, dass die  Datei
          <code>ltconfig</code> nicht vorkommt. Versionen, die sich als
          1.3b oder 1.3d ausgeben, sind tatsächlich Schnappschüsse aus der
          Entwicklung von 1.4 und mit Vorsicht zu genießen.
        </p></li>
        <li><p>
          <b>Der multi-Sprachen-Zweig</b>:
          Auch MLB genannt. Diese Version von libtool erhielt parallel die
          Unterstützung für C++ und Java (mittels gcj). Es wurde in den
          Hauptzweig der Entwicklung integriert. Aktuelle Versionen
          unterstützen Darwin 1.3 and Mac OS X 10.0. Den MLB Zweigkann man an
          der Präsenz der Dateien <code>ltcf-c.sh</code>,
          <code>ltcf-cxx.sh</code> und <code>ltcf-gcj.sh</code>
          erkennen.
        </p></li>
        <li><p>
          <b>Der aktuelle Zweig der Entwicklung</b>:
          Diese Version wird irgendwann als libtool 1.5 heraus gegeben werden.
          Sie resultiert aus der Integration des MLB Zweigs in 1.4 und
          unterstützt C, C++ and Java (mittels gcj). Unglücklicherweise, kann
          man diese Version nicht so einfach von der Version 1.4 unterscheiden.
          Leider muss man die Versionsnummer in der Datei
          <code>ltmain.sh</code> überprüfen.
        </p></li>
      </ul>
      <p>
        Zusammenfassend ist zu sagen, dass libtool 1.3.x und Pakete, die es
        nutzen (und das sind die meisten Pakete da draußen), einen Patch
        benötigen, wenn sie gemeinsam genutzte Bibliotheken auf Darwin erstellen
        wollen. Apples libtool in Mac OS X ist eine 1.3.5 Version mit Patches,
        das aber meistens nicht korrekt funktioniert. Christoph Pfisterer
        verbesserte den Patch mit fest eingestelltem, aber korrektem Pfad und
        mit voller Versionierung. Die Änderungen worden in die Upstream-Version
        von libtool übernommen und sind Teil der Version 1.4. Mitglieder des
        Fink-Teams machen weitere Verbesserungen und geben sie an die Betreuer
        von libtool weiter. Das Schema für die Versionierung ist über alle
        Versionen von libtool kompatibel.
      </p>
      <p>
        Randnotiz:
        Alle libtool Versionen enthalten die Bibliothek libltdl, die nur
        funktioniert, wenn auch dlcompat installiert ist. Ab Version 10.3 ist
        es in Mac OS X enthalten. Für frühere Versionen, kann man die
        "dlcompat" Familie an Paketen in Fink installieren.
      </p>
    
    <h2><a name="patch-135">3.2 Der 1.3.5 Patch</a></h2>
      
      <p>
        Erstellen sie libtool 1.3.5 selbst, müssen sie den folgenden
        <a href="/files/libtool-1.3.5-darwin.patch">Patch</a>
        <b>[aktualiisert am 9. 6. 2002]</b> auf den Quellcode von
        1.3.5 anwenden und dann die Dateien ltconfig und ltmain.sh löschen.
        (Sie werden aus den entsprechenden .in Dateien wieder erstellt, wenn
        man ./configure und make ausführt). Dies wird übrigens im aktuellen
        Fink-Paket von libtool 1.3.5 automatisch gemacht.
      </p>
      <p>
        Dies ist allerdings nur die halbe Arbeit - jedes Paket, das libtool
        verwendet kommt mit seinen eigenen Kopien von
        <code>ltconfig</code> und <code>ltmain.sh</code>. Man
        muss also auch diese in jedem paket ersetzen, wenn man es als
        gemeinsam genutzte Bibliothek erstellen will. Beachte sie bitte, dass
        dies vor dem Lauf von ./configure erfolgen muss. Zur Vereinfachung
        können sie die beiden Dateien hier bekommen:
        <a href="/files/ltconfig">ltconfig</a> (98K) und
        <a href="/files/ltmain.sh">ltmain.sh</a> (110K)
        <b>[beide aktualisiert am 9. 6. 2002]</b>.
      </p>
    
    <h2><a name="fixing-14x">3.3 1.4.x reparieren</a></h2>
      
      <p>
        Es sind mindestens drei Versionen von libtool 1.4.x im Umlauf (1.4.1,
        1.4.2 und spätere Schnappschüsse aus der Entwicklung). Sie haben auf
        Darwin alle Probleme, auch wenn die Details der Fixes unterschiedlich
        sind. Das "libtool14" Paket aus Fink hat alle notwendigen
        Änderungen. Sie müssen aber immer noch die Dateien
        <code>ltmain.sh</code> und <code>configure</code> in
        ihren Paketen ersetzen, damit sie erstellt werden können.
      </p>
      <ol>
        <li>
          <b>Das Problem mit flat_namespace </b>:
          Dieses Problem tritt nur auf, wenn sie libtool auf Mac OS X 10.1 oder
          später verwenden. Libtool versucht da die Option
          <code>-undefined suppress</code> zu verwenden, um nicht deklarierte
          Symbole zu erlauben. Dies kollidiert aber mit der Option
          <code>-flat_namespace</code>. Beginnend mit 10.1 funktioniert dies
          nicht mehr. Ein typischer Patch sieht so aus:
<pre>
diff -Naur gdk-pixbuf-0.16.0.old/configure gdk-pixbuf-0.16.0.new/configure
--- gdk-pixbuf-0.16.0.old/configure	Wed Jan 23 10:11:48 2002
+++ gdk-pixbuf-0.16.0.new/configure	Thu Jan 31 03:19:54 2002
@@ -3334,7 +3334,7 @@
;;

darwin* | rhapsody*)
-    allow_undefined_flag='-undefined suppress'
+    allow_undefined_flag='-flat_namespace -undefined suppress'
# FIXME: Relying on posixy $() will cause problems for
#        cross-compilation, but unfortunately the echo tests do not
#        yet detect zsh echo's removal of \ escapes.
</pre>
        </li>
        <li>
          <b>Das Problem mit ladbaren Modulen</b>:
          Dieses Problem entsteht durch nicht-Standard Verhalten von zsh (Das
          ist die voreingestellte Shell in 10.0 und 10.1; mit 10.2 ist es bash).
          Die Behandlung von Anführungszeichen verhindert, dass unter zsh
          ladbare Module korrekt erstellt werden. Statt dessen werden gemeinsam
          genutzte Bibliotheken erstellt (im Gegensatz zu Linux sind diese unter
          Darwin völlig unterschiedlich). Ein typischer Fix ist (kann aber nicht
          unmodifiziert verwendet werden):
<pre>
diff -Naur gnome-core-1.4.0.6.old/configure gnome-core-1.4.0.6.new/configure
--- gnome-core-1.4.0.6.old/configure	Sun Jan 27 08:19:48 2002
+++ gnome-core-1.4.0.6.new/configure	Fri Feb  8 01:10:21 2002
@@ -4020,7 +4020,7 @@
# FIXME: Relying on posixy $() will cause problems for
#        cross-compilation, but unfortunately the echo tests do not
#        yet detect zsh echo's removal of \ escapes.
-    archive_cmds='$nonopt $(test "x$module" = xyes &amp;&amp; echo -bundle || echo -dynamiclib) ...'
+    archive_cmds='$nonopt $(test x$module = xyes &amp;&amp; echo -bundle || echo -dynamiclib) ...'
# We need to add '_' to the symbols in $export_symbols first
#archive_expsym_cmds="$archive_cmds"' &amp;&amp; strip -s $export_symbols'
hardcode_direct=yes
</pre>
          <p>
            Diese Problem ist in einigen post-1.4.2 Versionen von libtool
            behoben.
          </p>
        </li>
        <li>
          <b>Das Problem der convenience-Bibliothek</b>:
          Unter bestimmten Bedingungen, scheitert libtool
          convenience-Bibliotheken zu linken und berichtet "multiple
          definitions" Fehler. Anscheinenend wird dies durch einen
          grundlegenden Fehler von libtool verursacht. Vorerst gibt es folgende
          Lösung, auch wenn die nicht das tatsächliche Problem löst, sondern
          nur die Symptome beseitigt (Dank an Dave Vasilevsky):
<pre>
--- ltmain.sh.old       2002-04-27 00:01:23.000000000 -0400
+++ ltmain.sh   2002-04-27 00:01:45.000000000 -0400
@@ -2894,7 +2894,18 @@
if test -n "$export_symbols" &amp;&amp; test -n "$archive_expsym_cmds"; then
eval cmds=\"$archive_expsym_cmds\"
else
+         save_deplibs="$deplibs"
+         for conv in $convenience; do
+       tmp_deplibs=
+       for test_deplib in $deplibs; do
+         if test "$test_deplib" != "$conv"; then
+           tmp_deplibs="$tmp_deplibs $test_deplib"
+         fi
+       done
+       deplibs="$tmp_deplibs"
+         done
eval cmds=\"$archive_cmds\"
+         deplibs="$save_deplibs"
fi
save_ifs="$IFS"; IFS='~'
for cmd in $cmds; do
</pre>
        </li>
        <li>
          <b>Das Problem mit DESTDIR</b>:
          Bestimmte Pakete, die DESTDIR setzen und libtool 1.4.2 nutzen haben
          Probleme beim relinken. Die Probleme werden in folgenden Emails
          diskutiert:
          <p>
            <a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html</a>
          </p>
          <p>
            <a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html</a>
          </p>
          <p>
            <a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html</a>,
          </p>
          <p>and a patch for the problem is discussed in:</p>
          <p>
            <a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html</a>.
          </p>
        </li>
      </ol>
    
    <h2><a name="notes">3.4 Weitere Notizen</a></h2>
      
      <p>
        Weitere Information über libtool und seine Funktionsweise gibt es auf
        der
        <a href="http://www.gnu.org/software/libtool/libtool.html">libtool Homepage</a>.
      </p>
      <p>
        Randnotiz:
        Apples Developer Tools enthalten auch ein Program namens libtool, das
        vom Compiler benutzt wird, um gemeinsam genutzte Bibliotheken zu
        erstellen. Dieses hat jedoch überhaupt keinen Bezug zu GNU libtool.
        Das GNU libtool von Apple ist statt dessen als <code>glibtool</code>
        installiert. Seine Verwendung kann man erreichen, indem man GNU libtool
        mit <code>--program-transform-name=s/libtool/glibtool/</code>
        konfiguriert.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="preparing-10.2.php?phpLang=de">4. Vorbereitungen für 10.2</a></p>
<?php include_once "../../footer.inc"; ?>


