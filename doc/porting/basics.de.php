<?php
$title = "Porting - Grundlagen";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Porting Contents"><link rel="next" href="shared.php?phpLang=de" title="Gemeinsam benutzter Code"><link rel="prev" href="index.php?phpLang=de" title="Porting Contents">';


include_once "header.de.inc";
?>
<h1>Porting - 1. Grundlagen</h1>
    
    
    <h2><a name="heritage">1.1 Der Ursprung von Darwin</a></h2>
      
      <p>
				Darwin ist ein unixoides Betriebsystem das sich aus NeXTStep /
				OpenStep entwickelte. Der Legende nach entstammt es ursprünglich
				von 4.4BSD Lite. Das BSD-Erbe ist immer noch spürbar.
				Tatsächlich wurde Darwin mit Code aus FreeBSD und NetBSD
				modernisiert.
      </p>
      <p>
				Darwins kernel basiert auf einer Kombination aus Mach 3.0, BSD und
				proprietären Funktionen wie die objekt-orientiert Treiberschicht
				IOKit. Obwohl Mach ursprünglich ein Micro-Kernel-Design hat, ist
				der darüber liegende BSD-Kernel monolithisch. Die beiden sind
				jetzt so ineinander verwoben, dass man sie wohl als einen einzigen
				monolithischen Kernel bezeichnen muss.
      </p>
      <p>
				Die Tools und Bibliotheken der Nutzerebene von Darwin sind meistens
				BSD-Varianten, im Gegensatz zu den GNU-Varianten von Linux.
				Allerdings is Apple nicht ganz so streng wie die anderen BSDs und
				macht auch häufig Kompromisse. Apple vertreibt beispielsweise
				sowohl BSD make als auch GNU make, mit GNU make als Voreinstellung.
      </p>
    
    <h2><a name="compiler">1.2 Der Compiler und andere Tools</a></h2>
      
      <p>
				Kurzfassung: Der Compiler is eine gcc Variante, aber installiert
				als <code>cc</code>. Dementsprechend muss man Makefiles anpassen.
				Die meisten Pakete erstellen keine gemeinsam genutzten
				Bibliotheken. Treten Fehler bei Makros auf, setzen sie die Option
				<code>-no-cpp-precomp</code>.
      </p>
      <p>
				Langfassung: Die Compiler-Tool-Chain in den Mac OS X Developer
				Tools ist ein seltsames Ungeheuer. Der Compiler basiert auf der
				gcc 2.95.2 Suite und hat Modifikationen für die Unterstützung der
				Sprache Objective C und noch einige Darwin-Spezialitäten. Vom
				Precompiler (<code>cpp</code>) gibt es zwei Versionen. Die eine
				ist der Standard-Precompiler (aus gcc 2.95.2), die andere wurde
				eigens von Apple entwickelt und unterstützt vorkompilierte Header.
				Die letzte Version ist die Voreinstellung, weil sie schneller ist.
				Allerdings kompiliert nicht jedes Programm mit Apples Precompiler
				und man muss die Option <code>-no-cpp-precomp</code> für den
				Standard-Precompiler einschalten. (Beachte: Die frühere
				Empfehlung war, die Option <code>-traditional-cpp</code> zu
				verwenden. Die Semantik dieser Option hat sich aber mit GCC 3
				geändert, so dass ihre Verwendung zu Abbrüchen führt. Die
				Option <code>-no-cpp-precomp</code> hingegen funktioniert sowohl
				mit den derzeitigen Developer Tools als auch mit zukünftigen
				Compilers, die auf GCC 3.0 basieren.)
      </p>
      <p>
				Der Assembler basiert auf gas 1.38, aber der Linker basiert nicht
				auf GNU Tools. Das ist ein Problem bei der Erstellung von
				gemeinsam benutzten Bibliotheken, weil GNU-libtools und configure-
				Skripte den Apple-Linker nicht korrekt aufrufen können.
      </p>
    
    <h2><a name="host-type">1.3 Wirtsystem</a></h2>
      
      <p>
				Kurzfassung: Bricht configure mit dem Meldung 'Can't determine host
				type' ab, dann kopieren sie die Dateien config.guess und config.sub
				aus dem Verzeichnis /usr/share/libtool (/usr/libexec für OS X 
				Versionen vor 10.2) in das derzeitige Verzeichnis.
      </p>
      <p>
				Langfassung: In der GNU-Welt wird ein kanonisches Format für die
				Angabe von Systemen verwendet, das aus folgenden drei Teilen
				besteht: CPU-Typ, Hersteller und Betriebsystem. Manchmal folgt
				noch ein vierter Teil. Dann beschreibt der dritte Teil den Kernel
				und der vierte Teil das Betriebsystem. Alle Teile werden klein
				geschrieben und mit Bindestrichen verbunden. Einige Beispiele:
				<code>i586-pc-linux-gnu</code>, <code>hppa1.1-hp-hpux10.20</code>,
				<code>sparc-sun-solaris2.6</code>. Für Mac OS X 10.0 lautet die
				Angabe <code>powerpc-apple-darwin1.3</code>, Mac OS X 10.2
				Versionen sind <code>powerpc-apple-darwin6.x.0</code> und 10.3
				<code>powerpc-apple-darwin7.x.0</code>, wobei "x" von der
				genauen Version abhängt.
      </p>
      <p>
				Viele Pakete, die autoconf benutzen, wollen wissen, für welches
				System kompiliert wird. (Randnotiz: für die Unterstützung von
				Cross-Compiling und Portierung, gibt es tatsächlich 3 Systeme: das
				Wirtsystem, das Erstellungsystem und das Zielsystem. Meistens sind
				sie das selbe.)  Man kann das Wirtsystem dem configure-Skript
				übergeben oder man kann es raten lassen.
      </p>
      <p>
				Das configure-Skript benutzt zwei Partnerskripte, um das Wirtsystem
				zu bestimmen. <code>config.guess</code> versucht, das
				Wirtsystem zu bestimmen. <code>config.sub</code> wird
				benutzt, um das Wirtsystem zu validieren und kanonisch zu machen.
				Diese Skripte werden als separate Einheiten gepflegt, aber sind in
				jedem Paket enthalten, das sie benutzt. Bis vor kurzem erkannten
				diese Skripte Darwin oder Mac OS X nicht. Liegt so ein Paket vor,
				muss man config.guess und config.sub ersetzen. Glücklicherweise
				hat Apple funktionierende Versionen im Verzeichnis
				/usr/share/libtool (/usr/libexec für Mac OS X vor 10.2), so dass
				man sie einfach von dort kopieren kann.
      </p>
      <p>
				Wenn sie ein Fink-Paket erstellen, können sie die Felder
				<code>UpdateConfigGuess</code> und/oder
				<code>UpdateConfigGuessInDirs</code> in ihrer
				<code>.info</code> Paketbeschreibung für eine automatische
				Aktualisierung benutzen.
      </p>
    
    <h2><a name="libraries">1.4 Bibliotheken</a></h2>
      
      <p>
				Kurzfassung: Man kann, muss aber nicht, die Option <code>-lm</code>
				aus Makefiles entfernen.
      </p>
      <p>
				Langfassung: Mac OS X hat keine separaten libc, libm, libcurses,
				libpthread oder ähnliche Bibliotheken. Statt dessen sind sie alle
				Teil der Systembibliothek libsystem. (In früheren Versionen war
				es tatsächlich das Framework System.)  Darüber hinaus hat Apple
				entsprechende Symlinks im Verzeichnis /usr/lib angelegt, sodass
				auch die Option -lm funktioniert. Die einzige Ausnahme ist
				<code>-lutil</code>. Auf anderen Systemen enthält libutil
				Funktionen für Pseudoterminals und die Abrechnung von Logins. Diese
				Funktionen sind in libSystem, aber es gibt einfach keinen Symlink für
        für ein libutil.dylib.
      </p>
    
    <h2><a name="other-sources">1.5 Andere Informationsquellen</a></h2>
      
      <p>
        Eine weitere Quelle für die Portierung ist das Wiki bei
        <a href="http://www.metapkg.org/wiki">MetaPkg Wiki</a>.
      </p>
      <p>
        Sie können auch die Apple Technical Note
        <a href="http://developer.apple.com/technotes/tn2002/tn2071.html">TN2071</a>
        mit dem Titel "Porting Command Line Unix Tools to Mac OS X" lesen.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="shared.php?phpLang=de">2. Gemeinsam benutzter Code</a></p>
<?php include_once "../../footer.inc"; ?>


