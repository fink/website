<?php
$title = "Paket erstellen - Compiler";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/03/10 22:52:23';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="reference.php?phpLang=de" title="Reference"><link rel="prev" href="fslayout.php?phpLang=de" title="Dateisystem-Layout">';


include_once "header.de.inc";
?>
<h1>Paket erstellen - 5. Compiler</h1>




<p>
Fink verwendet die gcc-Familie an Compilers wie sie Apple durch die
Apple Developer Connection zur Verfügung stellt. Es gibt mehrere Versionen von
gcc und normalerweise stehen auf einem Mac OS X System mehr als eine Version
zur Verfügung.
</p>
<p>
Dieses Kapitel erläutert, wie Fink mit den verschiedenen Versionen von gcc
umgeht. Weitere Details können in dieser
<a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg11877.html">
Email</a>
an die Fink mailing list nachgelesen werden.
</p>


<h2><a name="versions">5.1 Compilerversionen</a></h2>
<p>
So wie sich gcc entwickelt hat, gab es verschiedene "Distributionen" von Fink,
um die damit verbundenen Änderungen und Probleme abzufangen.
</p>
<p>
Jede Fink-Distribution hat eine Voreinstellung für die gcc und g++ Compiler, von
denen jeder Nutzer normalerweise erwartet, dass sie installiert sind. Jeder kann
erwarten, dass bei einem direkten Aufruf von "gcc" und "g++" diese Versionen
starten. Benötigt man andere Version (z. B. beim Übergang auf eine neue
Distribution) muss das Paket in der .info-Datei die benötigte Version des
Apple-Compiler explizit angeben. Im Details hängt das von dem Build-System des
Pakets ab, aber in dem meisten Fällen können dafür die Felder <code>SetCC</code>
und <code>SetCXX</code> verwendet werden.
Will man z. B. auf die Version 3.3 des Compiler g++ wechseln dann muss man
<code>SetCXX: g++-3.3</code> eintragen. Überprüfen sie die Ausgabe beim
Erstellen des Pakets, ob die richtige Version verwendet wird.
</p>
<p>
Die Distribution 10.1 geht von der Version 2.95 des Compiler aus, die
Distribution 10.2 von der Version 3.2, die Distributionen 10.2-gcc3.3 und 10.3
von der Version 3.3. Für die Distribution 10.4-transitional ist es kompliziert,
weil g++-3.3 zusammen mit gcc-4.0 verwendet wird. Die Distributionen 10.4 und
10.5 verwenden gcc-4.0 und g++-4.0. Die Distribution 10.6 verwendet gcc-4.2,
während 10.7 bis 10.9  clang and clang++ als Voreinstellung verwenden. Bei 10.9
kommt eine weitere Änderung durch den Übergang von libstdc++ nach libc++ dazu.
</p>
<p>
Mit der Distribution 10.4-transitional wurde eine neute Methode eingeführt, mit
der sicher gestellt wird, dass der richtige g++ Compiler verwendet wird.
Während des Compilierens wird das Verzeichnis
<code>/sw/var/lib/fink/path-prefix-g++-XXX</code> (wobei xxx die Versionsnummer
ist) in der Pfadvariablen PATH eingetragen. In diesem Verzeichnis befinden sich
Shellskripte, die dafür sorgen, dass die richtige Version des g++ Compiler
aufgerufen wird.
</p>



<h2><a name="abi">5.2 Die g++ ABI</a></h2>
<p>
Die g++ Abi hat sich in der Zeit von OS X dreimal geändert: Sie ist für die
Versionen 2.95, 3.1, 3.3 and 4.0 unterschiedlich. Sie sind untereinander nicht
kompatibel und jede Bibliothek mit C++ Code, die sie in ihrem Projekt verlinken,
muss mit der selben ABI compiliert sein, wie das, was sie gerade compilieren.
</p>
<p>
Fink dokumentiert die g++ ABI mit dem Feld GCC. Dieses Feld sollte in allen
Paketen definiert sein, die die g++ oder c++ Compiler aufrufen.
(Es sollte NICHT in Paketen definiert sein, die diese Compiler nicht aufrufen.)
Sobald es eine Aktualisierung in der ABI gibt, müssen alle abhängigen Pakete auf
ihr GCC Feld überprüft werden. Erst wenn die alle aktualisiert sind, kann auch
das Paket selbst aktualisiert werden. Die Versionen der Pakete müssen erhöht
werden, damit Nutzer wirklich die richtige, aktualisierten Abhängigkeiten
installieren, bevor sie versuchen ihr Paket zu erstellen.
</p>
<p>
Eine kleine Gruppe an Paketen, die nur von sich selbst abhängen, können auch bei
einer Änderung der ABI bei der alten Version bleiben, wenn sie z. B. noch nicht
aktualisiert werdden. Werden sie dann aktualisiert, müssen sie alle zusammen mit
der richtigen Version der ABI ersetzt werden. Deshalb ist es am besten, dass man
die meisten Pakete sofort dann aktualisiert, wenn sich die Distribution ändert.
</p>
<p>
Fink benutzt das Feld GCC um sicher zu stellen, dass die richtiger Version des
g++ Compiler installiert ist. Ist das Feld GCC in einem Paket definiert,
überprüft Fink ob der Wert dazu passt, was man für die Version von OS X
erwartet, aso 3.3 für die OS X Versionen 10.2 und 10.3 und 4.0 für OS X 10.4 bis
OS X 10.9.
</p>



<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="reference.php?phpLang=de">6. Reference</a></p>
<?php include_once "../../footer.inc"; ?>


