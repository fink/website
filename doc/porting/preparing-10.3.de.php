<?php
$title = "Porting - Vorbereitungen für 10.3";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Porting Contents"><link rel="next" href="preparing-10.4.php?phpLang=de" title="Vorbereitungen für 10.4"><link rel="prev" href="preparing-10.2.php?phpLang=de" title="Vorbereitungen für 10.2">';


include_once "header.de.inc";
?>
<h1>Porting - 5. Vorbereitungen für 10.3</h1>
    
    
    <h2><a name="perl">5.1 Perl</a></h2>
      
      <p>
        In OS X 10.2, <code>/usr/bin/perl</code> war perl 5.6.0
        und der die Architektur hieß "darwin". In OS X
        10.3, <code>/usr/bin/perl</code> wurde auf perl 5.8.1
        aktualisiert und die Architektur in
        "darwin-thread-multi-2level" umbenannt. Diese Änderungen
        <b>sollten</b> bei der normalen Verwendung von perl bei der
        Erstellungen von Paketen keine Probleme verursachen, weil jede Version
        von perl weiß, wo sie ihre eigenen Modulen findet. Paketbetreuer, die
        diesen Regeln <a href="/doc/packaging/policy.php#perlmods">Perl Modules packaging
        policy</a> folgen und auch der Dokumentation zu
        <code>CompileScript</code> und <code>InstallScript</code> folgen, haben
        bereits alles richtig aufgesetzt.
      </p>
    
    <h2><a name="typedef">5.2 Neue Definitionen von Symbolen</a></h2>
      
      <p>
        Beginnend mit Mac OS X 10.3 gibt es jetzt eine vollständige Definition
        des Typs <code>socklen_t</code>. FÜgen sie folgendes für eine
        Typdefinition zu ihrem Programm hinzu:
      </p>
<pre>
#include &lt;sys/types.h&gt;
#include &lt;sys/socket.h&gt;
</pre>
    
    <h2><a name="system-libs">5.3 Neue Systembibliotheken</a></h2>
      
      <p>
        Mac OS X 10.3 enthält einige neue Bibliotheken, die vorher nicht
        vorhanden waren und deshalb bisher als Fink-Pakete zur Verfügung
        gestellt wurden:
      </p>
      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>libpoll</td><td>
            <p>
              Die Dateien <code>/usr/lib/libpoll.dylib</code> und
              <code>/usr/include/poll.h</code> sind jetzt in Mac OS X
              enthalten, aber die Implementation der Bibliothek ist
              unvollständig. Reicht die Bibliothek dennoch für ihre Zwecke aus,
              können sie die Abhängigkeiten in von den Fink-Paketen
              "libpoll" und "libpoll-shlibs" entfernen. Der
              Code der Bibliotheken wurde in libSystem gepackt, das automatisch
              gelinkt wird. Deshalb wird <code>-lpoll</code> nicht mehr
              benötigt, wenn sie die OS X Implementation benutzen wollen.
              Beachten sie, dass OS X die Datei
              <code>libpoll.dylib</code> enthält, so dass die Option
              <code>-lpoll</code> zu unterschiedlichen Ergebnissen führen kann,
              je nachdem ob das Fink Paket "libpoll" installiert ist
              oder nicht.
            </p>
          </td></tr><tr valign="top"><td>libdl</td><td>
            <p>
              Die Dateien <code>/usr/lib/libdl.dylib</code> und
              <code>/usr/include/dlfcn.h</code> sind jetzt vorhanden und
              man sollte die Abhängigkeiten von den Fink-Paketen
              "dlcompat", "dlcompat-dev" und
              "dlcompat-shlibs" nicht mehr benötigen. Die Code der
              Bibliotheken wurde in libSystem gepackt, das automatisch
              gelinkt wird. Deshalb wird <code>-ldl</code> nicht mehr
              benötigt, wenn sie die OS X Implementation benutzen wollen (Es
              macht aber nichts, wenn sie es dennoch angeben).
            </p>
          </td></tr><tr valign="top"><td>GNU getopt</td><td>
            <p>
              Diese Bibliothek wurde einschließlich der Funktion
              <code>getopt_long()</code> in libSystem und
              <code>/usr/include/getopt.h</code> realisiert, so dass man
              die Fink-Pakete "libgnugetopt" und
              "libgnugetopt-shlibs" nicht mehr als Abhängigkeiten
              benötigt. LibSystem wird automatisch gelinkt und
              <code>/usr/include</code> wird automatisch durchsucht, so
              dass sie die Optionen <code>-lgnugetopt</code> und
              <code>-I/opt/sw/include/gnugetopt</code> nicht mehr benötigen. Sie
              wurden bisher verwendet, um "libgnugetopt" aus Fink zu
              verwenden.
            </p>
          </td></tr></table>
      <p>
        Migrieren sie ein Paket nach OS X 10.3, versuchen sie diese veralteten
        Abhängigkeiten zu entfernen, denn diese Pakete werden vermutlich in der
        Zukunft entfernt. Dies bedeutet, dass sie ja nach Baum verschiedene
        Paketbeschreibungen anlegen müssen. Beachten sie auch, dass die
        <code>Revision</code> immer erhöht werden muss, wenn sie Änderungen in
        einem Paket vornehmen. Dadurch ist es für einen Nutzer, der von OS X
        10.2 auf 10.3 aktualisiert, so, dass er ein 10.3-spezifissches Paket
        als ein "neueres" als sein vorhandenes für 10.2 sehen wird.
        Es ist Konvention, dass die <code>Revision</code> bei Änderungen im
        Zusammenhang mit einer Migration zu einem höheren Baum um 10 erhöht wird
        damit noch Platz für zukünftige Aktualisierungen im niedrigeren Baum
        ist.
      </p>
      <p>
        Beim Test eines migirierten Pakets müssen sie darauf achten, dass sie
        alle Pakete löschen, deren <code>BuildDepends</code> sie entfernt haben.
        Andernfalls kann es sein, dass der Compiler immer noch die Bibliotheken
        aus Fink verlinkt.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="preparing-10.4.php?phpLang=de">6. Vorbereitungen für 10.4</a></p>
<?php include_once "../../footer.inc"; ?>


