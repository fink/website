<?php
$title = "F.A.Q. - Übersetzen (1)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 04:42:29';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="comp-packages.php?phpLang=de" title="Probleme beim Übersetzen - Bestimmte Pakete"><link rel="prev" href="usage-fink.php?phpLang=de" title="Fink installieren, benutzen und pflegen">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 6. Probleme beim Übersetzen - Allgemein</h1>
    
    
    
    <a name="compiler">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.1: Ein configure-Skript beklagt sich, dass es keinen "acceptable cc"
          findet. Was bedeutet das?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Lesen sie bitte das nächste Mal die Dokumentation. Sie müssen die
          Apple Developer Tools installieren, um Pakete aus den Quellen zu
          übersetzen, denn sie enthalten auch den C Compiler, <code>cc</code>.</p></div>
    </a>
    <a name="cvs">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.2: Nach dem Kommando "fink selfupdate-cvs" erhalte ich die Nachricht:
          "cvs: Command not found."</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Sie müssen die Apple Developer Tools installieren.</p></div>
    </a>
    <a name="missing-make">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.3: Ich erhalte Fehlermeldungen mit <code>make</code>
        </b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die Fehlermeldung</p><pre>make: command not found</pre><p>oder</p><pre>Can't exec "make":
No such file or directory at /opt/sw/lib/perl5/Fink/Services.pm line 190.</pre><p>bedeuten, dass sie die Apple Developer Tools installieren müssen.</p><p>Lautet die Fehlermeldung</p><pre>make: illegal option -- C</pre><p>, dann haben sie die GNU-Version von <code>make</code> aus den
          Developer Tools durch die BSD-Version ersetzt. Viele Pakete benötigen
          aber spezielle Optionen der GNU-Version. Überprüfen sie, dass
          <code>/usr/bin/make</code> ein Symlink auf <code>gnumake</code>, und
          nicht auf <code>bsdmake</code> ist. Außerdem sollte
          <code>/usr/local/bin/</code> nicht auch noch eine Version von
          <code>make</code> enthalten.</p></div>
    </a>
    <a name="head">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.4: Das Kommando head erzeugt seltsame Fehlermeldungen. Was ist
          kaputt?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Sieht die Meldung so aus:</p><pre>Unknown option: 1 Usage: head [-options] &lt;url&gt;...</pre><p>gefolgt von einer Liste mit Optionsbeschreibungen, dann ist das
          Programm <code>head</code> zerschossen. Das passiert, wenn sie die
          Perl libww Bibliothek auf einer HFS+ Systempartition installieren.
          Dabei wird versucht, ein neues Kommando <code>/usr/bin/HEAD</code>
          zu erzeugen, wodurch das existierende Kommando <code>head</code>
          überschrieben wird, weil das File-System Groß- und Kleinschreibung
          nicht unterscheidet. Das Kommando <code>head</code> ist ein Standard,
          der in vielen Shell-Skripten und Makefiles verwendet wird. Für die
          Benutzung von Fink benötigen sie das originale <code>head</code>.</p><p>Das Boot-Skript überprüft das, aber der Fehler kann auch dann
          auftreten, wenn sie die binäre Distribution für die erstmalige
          Installation verwenden oder libwww nach Fink installieren.</p><p>Es wurde auch schon berichtet, dass das Problem bei der Installation
          von <code>/opt/sw/bin/HEAD</code> (Nicht durch ein Fink-Paket)
          auftritt. Das kann leicht durch Umbenennen behoben werden.</p></div>
    </a>
    <a name="also_in">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.5: Wenn ich versuche, ein Paket zu installieren, erhalte ich eine
          Fehlermeldung, dass versucht wird, eine Datei zu überschreiben, die
          zu einem anderen Paket gehört.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Dies passiert manchmal bei Splitoff-Paketen (also die mit den
          Endungen  -dev, -shlibs, usw.), wenn eine Datei aus einem Splitoff in
          ein anderes verschoben wird (z. B. von <code>foo</code> nach
          <code>foo-shlibs</code>). Da die beiden Dateien letztlich dieselbe
          ist, können sie die Datei mit folgendem Kommado überschreiben:</p><pre>sudo dpkg -i --force-overwrite <b>filename</b></pre><p>wobei <b>filename</b> die .deb-Datei ist, die das Paket enthält,
          das sie installieren wollen.</p></div>
    </a>
    <a name="mv-failed">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.6: Was bedeutet "execution of mv failed, exit code 1", wenn ich
          versuche, ein Paket zu installiere?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wenn sie StuffIt Pro installiert haben, könnte es sein, dass sie den
          Modus "Archive Via Real Name" eingeschaltet haben. Überprüfen sie die
          Einstellungen von StuffIt und schalten sie "ArchiveViaRealName" ab.
          Der Modus enthält eine fehlerhafte Reimplementierung einiger wichtiger
          Systemaufrufe, die merkwürdige und transiente Fehler wie diesen zur
          Folge haben.</p><p>Andernfalls bedeutet ein Fehler mit <code>mv</code> meistens
          dass schon vorher ein Fehler aufgetreten ist, der Prozess aber nicht
          abgebrochen wurde. Suchen sie im Protokoll nach den Dateien, die zum
          Fehler führen, z. B. so etwas:</p><pre>mv /opt/sw/src/root-foo-0.1.2-3/opt/sw/lib/libbar*.dylib \
/opt/sw/src/root-foo-shlibs-0.1.2-3/opt/sw/lib/ 
mv: cannot stat `/opt/sw/src/root-foo-0.1.2-3/opt/sw/lib/libbar*.dylib': 
No such file or directory 
### execution of mv failed, exit code 1 
Failed: installing foo-0.1.2-3 failed</pre><p>In diesen Fällen, suchen sie nach der Datei
          <code>libbar</code> weiter zurück im Protokoll des
          Build-Prozesses.</p></div>
    </a>
    <a name="node-exists">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.7: Ich kann ein Paket nicht installieren oder aktualisieren, weil ich
          die Fehlermeldung erhalte, dass ein "node" bereits existiert.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Diese Fehlermeldungen sehen so aus:</p><pre>Failed: Internal error: node for system-xfree86 already exists</pre><p>Das Problem ist, dass der Abhängigkeits-Motor verwirrt ist, weil es
          Änderungen in der Paket-Info-Datei gibt. Beheben sie den Fehler so:</p><ul>
          <li>
            <p>Erzwingen sie das Löschen des Paket. Mit dem Beispiel von oben,
              wäre das:</p>
<pre>sudo dpkg -r --force-all system-xfree86</pre>
          </li>
          <li>
            <p>Versuchen sie noch einmal das Paket zu installieren oder
              aktualisieren. Irgendwann kommt ein Prompt "virtual dependency"
              mit dem Paket, das sie gerade gelöscht haben. Wählen sie es aus
              und es wird erneut installiert.</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local-libs">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.8: Ich habe gehört, dass Bibliotheken und Header-Dateien, die in
          /usr/local installiert sind, manchmal Probleme machen. Stimmt das?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Dies ist ein sehr häufiges Probelm, weil die configure-Skripte der
          Pakete Header-Dateien und Bibliotheken in
          <code>/usr/local</code> finden und sie denen aus dem
          Fink-Baum vorziehen. Häufig zeigen sich diese Fehler erst, wenn das
          Erstellen des Pakets diagnostiziert wird, z. B.:</p><pre>Looking for incorrect headers in 44 dependency files...
	 ./objs/.libs/ftgzip.d uses /usr/local/include/zconf.h
	 ./objs/.libs/ftgzip.d uses /usr/local/include/zlib.h
Please fix build process to get consistent use of fink's headers.</pre><p>Treten Probleme auf, die in keinem FAQ-Eintrag erwähnt werden, dann
          sollten sie nachschauen, ob Bibliotheken in
          <code>/usr/local/lib</code> oder Header-Dateien in
          <code>/usr/local/include</code> sind.</p><p>Sind Header-Dateien und/oder Bibliotheken in
          <code>/usr/local</code>, dann benennen sie
          <code>/usr/local</code> in etwas anderes um, also:</p><pre>sudo mv /usr/local /usr/local.moved</pre><p>Erzeugen sie ihr Paket, dann können die Umbenennung von
          <code>/usr/local</code> wieder rückgängig machen:</p><pre>sudo mv /usr/local.moved /usr/local</pre><p>Starting with macOS 10.14, it's sometimes not possible to rename <code>/usr/local</code>. If you get an error when renaming <code>/usr/local</code> directly, then rename the subdirectories inside it instead:</p><pre>
        sudo mv /usr/local/include /usr/local/include.moved
        sudo mv /usr/local/lib /usr/local/lib.moved
        </pre><p>do your build, and then you can put <code>/usr/local/include</code> and <code>/usr/local/lib</code>
        back:</p><pre>
        sudo mv /usr/local/include.moved /usr/local/include
        sudo mv /usr/local/lib.moved /usr/local/lib
        </pre></div>
    </a>
    <a name="toc-out-of-date">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.9: Wenn ich versuche, ein Paket zu erzeugen, bekomme ich die
          Fehlermeldung, "table of contents" ist veraltet. Was muss ich tun?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Das Protokoll gibt Hinweise darauf, was zu tun ist, z. B.:</p><pre>ld: table of contents for archive:
/opt/sw/lib/libintl.a is out of date; 
rerun ranlib(1) (can't load from it)</pre><p>Sie müssen also (als root) ranlib mit der Bibliothek ausführen, die
          Probleme macht. Im obigen Beispiel wäre das:</p><pre>sudo ranlib /opt/sw/lib/libintl.a</pre></div>
    </a>
    <a name="fc-atlas">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.10: Fink Commander bleibt hängen, wenn ich versuche das Paket atlas zu
          installieren.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Das kommt daher, dass in einem der Schritte bei Bau von
          <code>atlas</code> ein Prompt ausgegeben wird, der von Fink Commander
          nicht angezeigt wird. Sie müssen statt dessen das Kommando
          <code>fink install atlas</code> ausführen.</p></div>
    </a>
    <a name="basic-headers">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.11: Ich erhalte Fehlermeldungen, dass die Dateien
          <code>stddef.h</code>, <code>wchar.h</code>,
          <code>stdlib.h</code> oder <code>crt1.o</code> fehlen
          oder dass der <q>C compiler cannot create executables</q>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Typischerweise heisst das, dass essentielle Header-Dateien fehlen,
          die im Paket DevSDK der Developer Tools enthalten sind. Überprüfen
          sie, ob <code>/Library/Receipts/DevSDK.pkg</code> auf ihrem
          System vorhanden ist. Wenn nicht, dann starten sie den Installer für
          die Developer Tools ein weiteres Mal und installieren sie das Paket
          DevSDK mittels Custom Install.</p><p>Der Fehler <q>cannot create executables</q> kann auch
          auftreten, wenn die Version ihrer Developer Tools nur für ein älteres
          OS X gültig ist.</p></div>
    </a>
    <a name="multiple-dependencies">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.12: Ich kann nicht aktualisieren, denn Fink meldet "unable to resolve
          version conflict on multiple dependencies".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Zur Behebung dieses Fehlers, versuchen sie, ein einziges Paket zu
          aktualisieren. Dann können sie "fink update-all" noch einmal
          probieren. Wenn sie die Meldung immer noch bekommen, wiederholen sie
          die Prozedur.</p></div>
    </a>
    <a name="dpkg-parse-error">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.13: Ich kann gar nichts installieren und bekommen nur die Fehlermeldung:
          "dpkg: parse error, in file `/opt/sw/var/lib/dpkg/status'"!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Dies bedeutet, dass die dpkg-Datenbank irgendwie beschädigt wurde,
          meist durch einen Absturz oder ähnlich schlimmes. Häufig ist ein
          Buildlock damit verbunden, z. B.:</p><pre>package `fink-buildlock-foo-1.2.3-4':  missing version</pre><p>(selbstverständlich muss der Name <code>foo-1.2.3-4</code>
          durch den ersetzt werden, für den der Fehler auftritt).</p><p>Sollte dies passieren, müssen sie die Datei
          <code>/opt/sw/var/lib/dpkg/status</code> als root editieren.
          Gehen sie zu der Zeile, die in der Fehlermeldung steht. Dort sollte
          ein Paket mit dem Namen <code>fink-buildlock-foo-1.2.3-4</code>
          stehen, dessen Feld <code>Status</code> markiert ist</p><pre>install ok installed</pre><p>Ändern sie dies zu</p><pre>purge ok not-installed</pre><p>Unter Umständen steht auch Müll in diesem Fall. Dies können sie
          beheben, in dem sie die Datei mit ihrer vorigen Version
          überschreiben:</p><pre>sudo cp /opt/sw/var/lib/dpkg/status-old /opt/sw/var/lib/dpkg/status</pre><p>Sie müssen allerdings die Pakete, die sie kurz vorher installiert
          haben, erneut installieren.</p></div>
    </a>
    <a name="freetype-problems">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.14: Ich erhalte einen Fehler mit freetype.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Es gibt damit mehrere verschiedene Fehler. Sieht er so aus:</p><pre>/usr/bin/ld: can't locate file for: -lfreetype</pre><p>überprüfen sie, ob sie ein zusätzliches Programm
          <code>freetype-config</code> haben, in dem sie dieses Kommando
          ausführen:</p><pre>where freetype-config</pre><p>wenn sie <code>tcsh</code> benutzen, oder</p><pre>type -a freetype-config</pre><p>wenn sie <code>bash</code> benutzen. Man weiß, dass das
          Framework Mono <code>/usr/bin/freetype-config</code>
          installiert, das ein Symlink auf eine Datei in diesem Framework
          ist.</p><p>Sieht ihr Fehler so aus:</p><pre>/opt/sw/include/pango-1.0/pango/pangoft2.h:52:
error: parse error before '*' token 
/opt/sw/include/pango-1.0/pango/pangoft2.h:57:
error: parse error before '*' token
/opt/sw/include/pango-1.0/pango/pangoft2.h:61: 
error: parse error before '*' token 
/opt/sw/include/pango-1.0/pango/pangoft2.h:86: 
error: parse error before "pango_ft2_font_get_face"
/opt/sw/include/pango-1.0/pango/pangoft2.h:86: 
warning: data definition has no type or storage class 
make[2]: *** [rsvg-gz.lo] Error 1
make[1]: *** [all-recursive] Error 1 
make: *** [all-recursive-am] Error 2 
### execution of make failed, exit code 2 
Failed: compiling librsvg2-2.4.0-3 failed</pre><p>oder</p><pre>In file included from vteft2.c:32:
vteglyph.h:64: error:
parse error before "FT_Library" 
vteglyph.h:64: warning: 
no semicolon at end of struct or union vteft2.c: 
In function `_vte_ft2_get_text_width': 
vteft2.c:236: error: 
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_get_text_height':
vteft2.c:244: error: 
dereferencing pointer to incomplete type
vteft2.c: In function `_vte_ft2_get_text_ascent': 
vteft2.c:252: error:
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_draw_text': 
vteft2.c:294: error: 
dereferencing pointer to incomplete type 
vteft2.c:295: error: 
dereferencing pointer to incomplete type
make[2]: *** [vteft2.lo] Error 1 
make[1]: *** [all-recursive] Error 1 
make: *** [all] Error 2 
### execution of make failed, exit code 2
Failed: compiling vte-0.11.10-3 failed</pre><p>oder</p><pre>checking for freetype-config.../usr/X11R6/bin/freetype-config
checking For sufficiently new FreeType (at least 2.0.1)... no 
configure: error: pangoxft 
Pango backend found but did not find freetype libraries 
make: *** No targets specified and no makefile found. Stop. 
### execution of LD_TWOLEVEL_NAMESPACE=1 failed, exit code 2 
Failed: compiling gtk+2-2.2.4-2 failed</pre><p>Das Problem ist ein Konflikt zwischen den Header-Dateien aus den
          Paketen <code>freetype</code> oder <code>freetype-hinting</code>
          und der <code>freetype2</code> Header-Datei, die in X11 oder XFree86
          enthalten ist.</p><pre>fink remove freetype freetype-hinting</pre><p>wird löschen, was auch immer installiert ist. Sieht der Fehler aber
          so aus:</p><pre>ld: Undefined symbols: _FT_Access_Frame</pre><p>ist das dafür typisch, das noch Dateien von einer früheren
          Installation von X11 übrig sind. Installieren sie das X11 SDK
          erneut.</p></div>
    </a>
    <a name="dlfcn-from-oo">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.15: Ich bekommen Fehler mit 'Dl_info'.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Sieht der Fehler so aus:</p><pre>unix_dl.c: In function `rep_open_dl_library':
unix_dl.c:328: warning: assignment discards qualifiers from pointer target type 
unix_dl.c: In function `rep_find_c_symbol': 
unix_dl.c:466: error: `Dl_info' undeclared (first use in this function)
unix_dl.c:466: error: (Each undeclared identifier is reported only once 
unix_dl.c:466: error: for each function it appears in.)
unix_dl.c:466: error: parse error before "info" 
unix_dl.c:467: error: `info' undeclared (first use in this function) 
make[1]: *** [unix_dl.lo] Error 1</pre><p>haben sie wahrscheinlich die Header-Datei
          <code>/usr/local/include/dlfcn.h</code>, die nicht mit Panther nicht
          kompatible ist. Verschieben sie die Datei.</p><p>Meistens wird sie von Open Office installiere und sie sollten die
          Header-Datei und die Bibliothek <code>/usr/local/lib/libdl.dylib</code>
          durch Symlinks zu den Dateien ersetzen, die in Panther enthalten
          sind.</p><pre>sudo ln -s /usr/include/dlfcn.h /usr/local/include/dlfcn.h
sudo ln -s /usr/lib/libdl.dylib /usr/local/lib/libdl.dylib</pre></div>
    </a>
    <a name="gcc2">
      
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.16: Fink behauptet, dass <code>gcc2</code> oder
          <code>gcc3.1</code> fehlen, es sieht nicht so aus, dass ich
          sie installieren kann.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> <code>gcc2</code> und <code>gcc3.1</code> sind
          virtuelle Pakete, die anzeigen, dass gcc-2.95 und gcc-3.1 auf dem
          System installiert sind. Installieren sie gcc2.95 und/oder gcc3.1 aus
          Xcode Tools (frühere Versionen von OS  X enthalten sie in der normalen
          Installation der Developer Tools).</p><p><b>Anmerkung: </b>Installiert man gcc2.95 und/oder gcc3.1
          verursacht dies keine Probleme bei der Installation des gcc3.3
          Compilers - sie können koexistieren.</p></div>
    </a>
    <a name="system-java">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.17: Fink beklagt sich mit: <code>Failed: Can't resolve dependency
          "system-java-dev"</code>, aber das Paket gibt es gar nicht.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> "system-java-dev" ist ein virtuelles Paket. Derzeit (Jan. 2011) tritt
          der Fehler auf Leopard und Snow Leopard auf, bei denen sich Apples
          Java-Pakete änderten.</p><p>Sie müssen das Paket <code>Java Developer Package</code>
          von
          <a href="http://connect.apple.com">Apple</a>
          herunter laden.</p><p>Dann überprüfen sie mit dem Kommando</p><pre>fink -V</pre><p>, dass die Version des Package Manager <b>0.29.15</b> oder höher
          ist.</p><p>Ist die Version von <code>fink</code> version älter,
          aktualisieren sie fink mit:</p><pre>fink selfupdate</pre><p>Zeigt ihre <code>Distributionsversion</code> <b>point</b>, wechseln
          sie auf <b>rsync</b> oder <b>cvs</b>, indem sie mit</p><pre>fink selfupdate-rsync</pre><p>oder</p><pre>fink selfupdate-cvs</pre><p>aktualisieren. Ist die Version von <code>fink</code>
          <b>0.29.99.cvs</b>, dann benutzen sie ein CVS checkout von
          <code>fink</code>, das man nicht aktualisieren kann und das
          deshalb hinter der aktuellen Version zurück bleibt. Wir empfehlen,
          diese Kommandos auszuführen:</p><pre>fink selfupdate ; fink dumpinfo -fallversions fink</pre><p>Dies wird folgende Ausgabe erzeugen:</p><pre>$ fink dumpinfo -fallversions fink
Scanning package description files..........
Information about 10146 packages read in 2 seconds.
allversions:
   	0.29.21-51
 bi	0.29.99.cvs-20110408.1821</pre><p>Wählen sie letzte Release-Version (eine ohne <b>.cvs</b>, z. B.
          die <b>0.29.21-51</b> von oben) und führen sie diese Kommando aus:</p><pre>fink install fink-version-revision</pre><p>Zum Beispiel:</p><pre>fink install fink-0.29.21-51</pre><p>um <code>fink-0.29.51</code> zu installieren.</p><p>Den Speicherplatz der CVS checkouts von <code>fink</code>
          bekommt man mit folgendem Befehl zurück:</p><pre>sudo rm /opt/sw/fink/10.4/local/injected/binary-darwin-&lt;architecture&gt;/*;
sudo rm /opt/sw/fink/10.4/local/injected/finkinfo/*;
fink index -f
fink scanpackages
sudo apt-get update
fink cleanup</pre><p>ersetzen sie &lt;architecture&gt; mit ihrer Architektur, also
          <b>powerpc</b>, <b>i386</b>, oder <b>x86_64</b>.</p></div>
    </a>
    <a name="dpkg-split">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.18: Wenn ich ein Paket installieren möchte, bekomme ich
          <q>dpkg (subprocess): failed to exec dpkg-split to see if it's
          part of a multiparter: No such file or directory</q>. Wie behebe
          ich diesen Fehler?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Im allgemeinen kann dies behoben werden, in dem man die Umgebung
          korrekt einrichtet, wie hier
          <a href="usage-fink.php?phpLang=de#fink-not-found">hier</a>
          beschrieben.</p></div>
    </a>
    <a name="xml-parser">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.19: Ich bekommen folgende Fehler-Meldung: <q>configure: error:
          XML::Parser perl module is required for intltool</q>.  Was soll
          ich machen?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Benutzen sie den unstable Baum, überprüfen sie, dass
          intltool-0.34.1 oder später installiert ist..</p><p>Andernfalls überprüfen sie, ob die richtige Variante des Pakets
          xml-parser-pm installiert ist, die zu der Perl-Version auf ihrem
          System passt. Auf Panther sollten sie zum Beispiel
          <code>xml-parser-pm581</code> statt <code>xml-parser-pm560</code>
          haben (Sie können auch den Platzhalter <code>xml-parser-pm</code>
          haben), weil sie <code>Perl-5.8.1</code> und nicht
          <code>Perl-5.6.0</code> haben. Benutzen sie auf Jaguar die
          Standard-Systemversion von Perl, haben sie die Variante
          <code>pm560</code>. Haben sie <code>Perl 5.8.0</code> installiert,
          haben sie die Variante <code>pm580</code>.</p></div>
    </a>
    <a name="master-problems">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.20: Wenn ich versuche, ein Paket herunter zu laden, geht Fink auf eine
          merkwürdige Seite mit <q>distfiles</q> im Namen und die Datei
          gibt es dort nicht.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Es ist folgendes passiert: Fink versuchte einen seiner
          <q>Master</q>-Spiegelserver zu nutzen. Sie wurden aufgesetzt,
          damit Quell-Dateien für Fink-Pakete auch zur Verfügung stehen, wenn
          sie auf den Originalseiten verschoben wurden. Meistens tritt dieser
          Fehler auf, wenn eine neue Version veröffentlicht wurde, die
          Quell-Dateien aber noch nicht auf die
          <q>Master</q>-Spiegelserver kopiert wurden.</p><p>Beheben sie das Problem, indem sie das Kommando
          <code>fink configure</code> ausführen und setzen sie die
          Suchreihenfolge auf "use Master mirrors last".</p></div>
  </a>
  <a name="compile-options">
    <div class="question"><p><b><?php echo FINK_Q ; ?>6.21: Ich möchte, dass Fink andere Optionen beim Erstellen eines Pakets
        verwendet.</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Als erstes sollten sie den Paket-Autor kontaktieren und ihn um eine
        Variante bitten. Das ist manchmal leicht. Meldet sich der Autor aber
        nicht, es gibt kein neues Paket oder wollen sie eine andere Option
        selbst probieren, schauen sie sich die folgenden zwei Kapitel an:
        <a href="/doc/quick-start-pkg/index.php">Packaging Tutorial</a>
        und <a href="/doc/packaging/index.php">Packaging Handbuch</a>.</p><p><b>Anmerkung: </b>Die Einstellungen von Fink sind bewusst so, dass
        alle offiziellen Binär-Programme identisch sind egal auf welchem
        Rechner sie erstellt wurden. Optimierungen für einen G5 Prozessor sind
        also in offiziellen Paketen nicht eingeschaltet. Wenn sie das brauchen,
        müssen sie das selbst machen.</p></div>
  </a>
  <a name="alternates">
    <div class="question"><p><b><?php echo FINK_Q ; ?>6.22: Immer wenn ich Pakete aus Quellen erzeugen möchte, fragt Fink immer
        wieder nach alternativen Versionen der selben Bibliothek.</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> In komplexen Erstellungsabhängigkeiten kommt es oft vor, dass ein Paket
        von einer bestimmten Version einer Bibliothek abhängt und andere Pakete
        von einer anderen Version (z. B: <code>db47</code> vs.
        <code>db44</code>). Folglich versucht Fink immer zu der Version zu
        wechseln, die wegen der Abhängigkeiten in dem Paket benötigt werden, die
        sie aktualisieren wollen.</p><p>Unglücklicherweise kann es wegen einiger Beschränkungen in Fink bei
        einem ausreichend kompliziertem <code>update-all</code> zu einer
        Fehlersituation mit folgender Meldung kommen:</p><pre>Fink::SysState: Could not resolve inconsistent dependencies</pre><p>Diese Situation kann mit folgenden Kommandos aufgelöst werden:</p><pre>fink scanpackages
sudo apt-get update
sudo apt-get install foo=1.23-4</pre><p>In manchen komplizierten Situationen kann es aber sein, dass dies noch
        nicht ausreicht. Dann müssen sie die Pakete eines nach dem anderen
        aktualisieren, zumindest ein Stück weit.</p></div>
  </a>
  <a name="python-mods">
    <div class="question"><p><b><?php echo FINK_Q ; ?>6.23: Versuche ich, ein Python-Modul zu erstellen, bekomme ich eine Fehlermeldung mit <code>MACOSX_DEPLOYMENT_TARGET </code>.</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wenn die Fehlermeldungen so aussehen:</p><pre>running build
running build_ext
Traceback (most recent call last):
  File "setup_socket_ssl.py", line 21, in ?
    depends = ['socketmodule.h'] )
  File "/opt/sw/src/root-python24-2.4.1-1/opt/sw/lib/python2.4/distutils/core.py", line 166, in setup
SystemExit: error: $MACOSX_DEPLOYMENT_TARGET mismatch: now "10.4" but "10.3" during configure
### execution of /opt/sw/bin/python2.4 failed, exit code 1</pre><p>liegt das Problem daran, dass das Paket <code>python2*</code> das
        aktuelle <code>MACOSX_DEPLOYMENT_TARGET</code> in eine
        Konfigurationsdatei schreibt, wenn es erzeugt wird und die python build
        utilities diesen Wert nehmen, wenn sie Module erstellen. Dadurch können
        Konflikte entstehen, wenn z. B. ein Paket <code>python24</code> unter
        10.4 von 10.3 stammt, weil entweder von 10.3 auf 10.4 oder über die
        binäre <b>10.4-transitional</b> Distribution aktualisiert wurde und
        dabei <code>python24</code> nicht erneut erstellt wurde, weil python von
        einem <code>MACOSX_DEPLOYMENT_TARGET</code> 10.3 ausgeht, das System
        aber 10.4 hat.</p><p>Die Lösung ist das problematische Paket <code>python</code> neu zu
        erstellen, also <code>fink rebuild python24</code> im obigen Beispiel.</p><p>Taucht der gleiche Fehler zur Laufzeit auf, dann erstellen sie zuerst
        das entsprechende Paket <code>python2*</code> erneut und dann das
        Modul.</p></div>
  </a>
  <a name="libtool-unrecognized-dynamic">
    <div class="question"><p><b><?php echo FINK_Q ; ?>6.24: Ich bekomme von <code>libtool</code>den Fehler
        <q>unrecognized option `-dynamic'</q>.</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Der Fehler:</p><pre> libtool: unrecognized option `-dynamic'</pre><p>bedeutet normalerweise, dass Apples
        <code>/usr/bin/libtool</code> durch <code>libtool</code>
        von GNU ersetzt haben. Unglücklicherweise machen die beiden
        <code>libtools</code> <b>nicht</b> das selbe.</p><p>Die einzige Lösung ist von irgend woher ein funktionierendes
        <code>libtool</code> von Apple zu bekommen. Es ist im Paket
        <code>DeveloperTools.pkg</code> der Xcode Tools enthalten und
        sie können das gesamte Paket erneut installieren, wenn sie zuerst seine
        Quittung in <code>/Library/Receipts</code> löschen (einfach in
        den Mülleimer ziehen oder mit dem Kommando <code>sudo rm -rf
        /Library/Receipts/DeveloperTools.pkg</code>).</p></div>
  </a>
  <a name="missing-usr-include-headers">
    <div class="question"><p><b><?php echo FINK_Q ; ?>6.25: Ich erhalte eine Fehlermeldung über fehlende Header in
        <code>/usr/include</code></b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wenn sie auf 10.9 oder 10.10 Fehlermeldungen wie</p><pre>The directory that should contain system headers does not exist:
  /usr/include</pre><p>oder</p><pre>cp: /usr/include/lber*.h: No such file or directory</pre><p>während der Erstellung erhalten, bedeutet das, dass sie eine Version
        der Xcode command-line tools von einer früheren OS X version verwenden.
        Versuchen sie, eine neuere Version aus dem App Store zu erhalten, mit
        <code>sudo xcode-select -install</code> zu aktualisieren oder von der
        Seite developer.apple.com herunter zu laden.</p></div>
    </a>
    <a name="pkginfo">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.26: Wenn ich ein Paket mit app-Bundle unter Yosemite aktualisieren
          möchte, erhalte ich Fehler mit einer Datei PkgInfo.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die Fehlermeldung sieht vermutlich so aus:</p><pre>Unpacking replacement wxmaxima-mac ...
/opt/sw/bin/dpkg: error processing /opt/sw/fink/dists/stable/main/binary-darwin-x86_64/sci/wxmaxima-mac_15.04.0-1_darwin-x86_64.deb (--install):
 unable to make backup link of `./opt/sw/Applications/wxMaxima.app/Contents/PkgInfo' before installing new version: Operation not permitted
/opt/sw/bin/dpkg-deb: subprocess paste killed by signal (Broken pipe: 13)</pre><p>Gegenwärtig muss man das problematische Paket entfernen (remove),
          womit auch die Datei PkgInfo gelöscht wird und dann die aktualisierte
          Version installieren.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="comp-packages.php?phpLang=de">7. Probleme beim Übersetzen - Bestimmte Pakete</a></p>
<?php include_once "../footer.inc"; ?>


