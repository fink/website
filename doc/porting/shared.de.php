<?php
$title = "Porting - Gemeinsam benutzter Code";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/03/10 22:48:59';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Porting Contents"><link rel="next" href="libtool.php?phpLang=de" title="GNU libtool"><link rel="prev" href="basics.php?phpLang=de" title="Grundlagen">';


include_once "header.de.inc";
?>
<h1>Porting - 2. Gemeinsam benutzter Code</h1>
    
    
    <h2><a name="lib-and-mod">2.1 Gemeinsam benutzte Bibliotheken vs. Ladbare Module</a></h2>
      
      <p>
        Ein Mach-O Feature erwischt viele ganz kalt: Die strikte Unterscheidung
        zwischen gemeinsam genutzten Bibliotheken und dynamisch ladbaren
        Modulen. Auf ELF-Systemen sind die beiden gleich; jeder gemeinsam
        benutzter Code kann als Bibliothek und als ladbares Mudol genutzt
        werden. Benutzen sie das Kommando
        <code>otool -hv <b>some_file</b></code>, um den Dateityp der Datei
        <code>some_file</code> heraus zu finden.
      </p>
      <p>
        Gemeinsam genutzte Mach-O Bibliotheken haben den Dateityp MH_DYLIB und
        die Dateiendung <code>.dylib</code>. Gegen sie kann ein programm mit
        den üblichen Linkeroptionen gelinkt werden, also <code>-lfoo</code> für
        libfoo.dylib. Sie können jedoch nicht als Modul geladen werden.
        (Randnotiz: Gemeinsam genutzte Bibliotheken können dynamisch über eine
        API geladen werden. Aber die API unterscheidet sich von der API für
        Bundles und die Semantik machen sie nutzlos for eine Emulation von
        <code>dlopen()</code>. Vor allem können gemeinsam genutzte Bibliotheken
        nicht wieder ausgeladen werden.)
      </p>
      <p>
        Ladbare Module heißen in Mach-O-Sprech Bundles. Ihr Dateityp ist
        MH_BUNDLE. Da sich keine Komponente  darum kümmert, ist die
        Dateierweiterung beliebig wählbar. Die Erweiterung <code>.bundle</code>
        wird von Apple empfohlen, aber die meisten portierten Programme benutzen
        aus Kompatibilitätsgründen <code>.so</code>. Bundles können dynamisch
        über die dyld API geladen und wieder ausgeladen werden. Ein Wrapper um
        diese API emuliert <code>dlopen()</code>. Gegen Bundles kann man nicht
        linken wie wenn sie gemeinsame genutzte Bibliotheken wären. Aber ein
        Bundle kann gegen vorhandene, gemeinsam genutzte Bibliotheken gelinkt
        werden; diese werden dann automatisch mit dem Bundle geladen.
      </p>
    
    <h2><a name="version">2.2 Versionsnummerierung</a></h2>
      
      <p>
        Auf Elf-Systemen wird normalerweise die Versionsnummer am Ende des
        Dateinamens der gemeinsame genutzten Bibliothek nach der Erweiterung
        angehängt, z. B. <code>libqt.so.2.3.0</code>. Bei Darwin steht
        die Versionsnummer zwischen Bibliotheksnamen und Erweiterung, also
        <code>libqt.2.3.0.dylib</code>. Beachten sie, dass sie deshalb
        beim Linken eine bestimmte Version der Bibliothek angeben können, im
        obigen Beispiel mit <code>-lqt.2.3.0</code>.
      </p>
      <p>
        Bei der Erstellung einer gemeinsam genutzten Bibliothek kann man einen
        Namen vergeben, mit dem zur Laufzeit nach der Bibliothek gesucht werden
        kann. Dies ist gängige Praxis und ermöglicht es, dass mehrere
        Haupt-Versionen einer Bibliothek gleichzeitig installiert sind. AUf
        ELF-Systemen nennt man diesen Namen <code>soname</code>. Unter Darwin
        kommt dazu, dass man den vollständigen Pfad zu der Bibliothek angeben
        kann und auch sollte. Die "rpath"-Optionen und das
        ldconfig/ld.so.cache-System werden dadurch überflüssig. Soll eine
        Bibliothek benutzt werden, die noch nicht installiert ist, kann man die
        Umgebungsvariable DYLD_LIBRARY_PATH. Details dazu stehen in der
        man-Seite von dyld.
      </p>
      <p>
        Im Gegensatz zu ELF-Systemen erlaubt das Mach-O Format erlaubt auch die
        tatsächliche Überprüfung der Nebenversion. Jede Mach-O Bibliothek hat
        zwei Versionsnummern, die "aktuelle" Version und die "kompatible". Beide
        Nummern bestehen aus drei durch Punkte getrennte Zahlen. z. B. 1.4.2.
        Die erste Zahl darf nicht Null sein. Die zweite und dritte Zahl können
        ausgelassen werden und werden dann als Null angenommen. Ist überhaupt
        keine Zahl angegeben, wird die Version auf 0.0.0 gesetzt. Dies ist
        quasi ein Joker und passt auf alles.
      </p>
      <p>
        Die "aktuelle" Version dient nur zur Information; während die
        "kompatible" Version für die Überprüfung wie folgt verwendet wird: Wird
        ein Program gelinkt, wird die Versionsinformation der Bibliothek in das
        Programm kopiert. Wird das Programm ausgeführt, wird die Version im
        Programm mit der aus der Bibliothek verglichen, die geladen wird.
        Die Version der Bibliothek muss mit der aus dem Programm übereinstimmen
        oder höher sein. Ist dies nicht der Fall, bricht dyld das Programm ab
        und erzeugt einen Laufzeit-Fehler.
      </p>
    
    <h2><a name="cflags">2.3 Compiler-Optionen</a></h2>
      
      <p>
        Auf Darwin ist die Voreinstellung so, dass positionsunabhängiger Code
        (PIC) erzeugt wird. Tatsächlich ist PowerPC-Code so entworfen, dass er
        von vorne herein positionsunabhängig ist und damit keine Leistungs- oder
        Speicherplatz-Nachteil verbunden ist. Man muss deshalb nicht extra eine
        Option PIC angeben, wenn man eine gemeinsam genutzte Bibliothek oder
        ein Modul compiliert. Allerdings erlaubt der Linker keine
        "common" Symbole in gemeinsam genutzten Bibliotheken. Man
        muss also die Compiler-Option <code>-fno-common</code> angeben.
      </p>
    
    <h2><a name="build-lib">2.4 Eine gemeinsam genutzte Bibliothek erzeugen</a></h2>
      
      <p>
        Will man eine gemeinsam genutzte Bibliothek erzeugen, ruft man den
        Compilertreiber mit der Option <code>-dynamiclib</code> auf. Am besten
        versteht man dies an einem ausführlichen Beispiel. Es wird eine
        Bibliotheknamen libfoo aus den Quellcode-Dateien
        <code>source.c</code> und <code>code.c</code> erzeugt.
        Die Versionsnummer ist 2.4.5, mit 2 als der Hauptversionsnummer (wegen
        inkompatiblen Änderungen der API), 4 die Nebenversionsnummer (wegen
        aufwärtskompatiblen Änderungen der API) und 5 ist die Revisionsnummer
        für die Behebung von Fehlern (manchmal wird dies auch die
        "teeny" Revisionsnummer genannt, für vollkompatible
        Änderungen.). Die Bibliothek hängt von keiner anderen ab und wird in
        <code>/usr/local/lib</code> installiert.
      </p>
<pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -dynamiclib -install_name /usr/local/lib/libfoo.2.dylib \
-compatibility_version 2.4 -current_version 2.4.5 \
-o libfoo.2.4.5.dylib source.o code.o
rm -f libfoo.2.dylib libfoo.dylib
ln -s libfoo.2.4.5.dylib libfoo.2.dylib
ln -s libfoo.2.4.5.dylib libfoo.dylib</pre>
      <p>
        Beachten sie bitte, welche Teile der Versionsnummer an welcher Stelle
        verwendet werden. Linkt man gegen die Bibliothek, verwendet man
        normalerweise die Option <code>-lfoo</code>, die auf den Symlink
        <code>libfoo.dylib</code> zugreift. Unabhängig welcher Symlink
        oder welche tatsächliche Datei angegeben wird, wird der
        <code>install_name</code> in das Programm eingetragen. Dies bedeutet,
        dass der der "höhere" (weniger versionsspezifische) Symlink
        <code>libfoo.dylib</code> nach dem Kompilieren gelöscht werden
        kann. In einer Aktualisierung der Bibliothek auf dem Niveau der
        Nebenversion, muss man nur das Ziel des Symlinks
        <code>libfoo.2.dylib</code> ändern, dass von dynamischen
        Laufzeitlinker benutzt wird.
      </p>
    
    <h2><a name="build-mod">2.5 Ein Modul erzeugen</a></h2>
      
      <p>
        Will man ein ladbares Modul erzeugen, ruft man den Compilertreiber mit
        der Option <code>-bundle</code> auf. Benutzt das Modul Symbole des
        Wirtprogramms muss auch die Option <code>-undefined suppress</code>
        angegeben werden, damit undefinierte Symbole erlaubt sind und auch die
        Option <code>-flat_namespace</code>, damit der neue Linker ab Mac OS X
        10.1 zufrieden ist. Ein ausführliches Beispiel:
      </p>
<pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -bundle -flat_namespace -undefined suppress \
-o mymodule.so source.o code.o</pre>
      <p>
        Beachten sie, dass es keine Versionsnummerierung gibt. Theoretisch kann
        dies gemacht werden, in der Praxis ist das aber unbedeutend. Beachten
        sie außerdem, dass es keine Einschränkungen für den Namen des Bundle
        gibt. Einige Pakete ziehen es vor, dem Namen ein "lib" voran
        zu stellen, weil das z. B. auf anderen Systemen verlangt wird. Dies ist 
        alles unkritisch, weil ein Programm den vollständigen Namen benutzt, 
        wenn das Modul geladen wird.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="libtool.php?phpLang=de">3. GNU libtool</a></p>
<?php include_once "../../footer.inc"; ?>


