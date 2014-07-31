<?php
$title      = "About";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date   = '$Date: 2014/07/31 08:59:06 $';

require "header.inc";
?>

<h1>Über Fink</h1>

<h2>Was ist Fink?</h2>

<p>
Fink ist ein Projekt, das es sich zur Aufgabe gemacht hat, die ganze Welt der Unix 
<a href="http://www.opensource.org/">Open Source</a> Software auf
<a href="http://www.opensource.apple.com/">Darwin</a> und
<a href="http://www.apple.com/macosx/">Mac OS X</a> zu bringen.
Daraus ergeben sich für uns 2 Hauptziele:
Erstens, bereits existierende Open Source Software so zu modifizieren, dass Sie unter Mac OS X compiliert bzw. ausgeführt werden kann.
(Diesen Prozess nennt man "Portieren".)
Zweitens, die Ergebnisse dem Gelegenheitsnutzern zugänglich zu machen, als eine zusammenhängende, komfortable Distribution, die den Gewohnheiten der Linux Nutzer entspricht.
(Dieser Prozess wird "Packaging" genannt.)
Das Projekt bietet sowohl vorkompilierte Binär-Pakete als auch ein vollautomatisiertes System, das es ermöglicht, direkt von den Quellcodes zu kompilieren.
</p>
<p>
Um diese Ziele zu erreichen, vertraut Fink auf die exzellenten Paket-Management-Tools, die vom
<a href="http://www.debian.org/">Debian</a> Projekt entwickelt wurden : <code>dpkg</code>, 
<code>dselect</code> und <code>apt-get</code>.
Darüber hinaus bietet Fink seinen eigenen Paket-Manager an, genannt <code>fink</code>(welch Überraschung!).
Man kann <code>fink</code> als eine "build engine" ansehen - es benutzt die Paketbeschreibungen und erstellt daraus binäre .deb Pakete.
Während dieses Prozesses lädt es den originalen Quellcode aus dem Internet, führt wenn nötig Patches aus und geht dann durch den gesamten Konfigurations- und Build-Prozess des Pakets.
Zuletzt packt es die Ergebnisse in ein Archiv, das dann von <code>dpkg</code> installiert werden kann.
</p>
<p>
Da Fink auf Mac OS X aufbaut, gilt die strikte Regel, zu verhindern, dass es dem Basissystem irgendwie in die Quere kommt.
Daraus folgt, dass Fink in einer eigenständigen Ordnerstruktur residiert, und die Infrastruktur für eine einfache Benutzung anbietet.</p>

<h2>Warum sollte ich Fink benutzen?</h2>

<p>
Fünf Gründe, warum Sie Fink benutzen sollten, um Unix-Software auf Ihrem Mac zu installieren:
</p>
<p>
<b>Leistung.</b>
Mac OS X beinhaltet nur ein paar grundlegende Kommandozeilen-Tools.
Fink bietet Ihnen verbesserte Versionen für diese Tools und eine Auswahl an grafischen Anwendungen, die für Linux und andere Unix-Varianten entwickelt wurden.
</p>
<p>
<b>Bedienerfreundlichkeit.</b>
Da der Prozess des Kompilierens mit Fink komplett automatisiert wird, müssen Sie sich nie wieder um Makefiles oder Konfigurations-Skripte und ihre Parameter kümmern.
Alle Paket-Abhängigkeiten werden automatisch aufgelöst und es wird dafür gesorgt, dass alle Bibliotheken vorhanden sind.
Unsere Pakete sind normalerweise so eingerichtet, dass sie die maximalen Features unterstützen.
</p>
<p>
<b>Sicherheit.</b>
Durch die Politik des strikten Nicht-Veränderns irgendwelcher System-Dateien, stellt Fink sicher, dass die gefährdeten Teile Ihres Mac OS X Systems nicht angefasst werden.
Sie können Mac OS X aktualisieren, ohne Angst haben zu müssen, dass es Fink in die Quere kommt und umgekehrt.
Zudem ermöglicht Ihnen das Paket-System, Software, die Sie nicht mehr benötigen, sicher und vollständig zu entfernen.
</p>
<p>
<b>Geschlossenheit.</b>
Fink ist nicht einfach eine zufällige Ansammlung von Paketen sondern eine geschlossene Distribution.
Installierte Dateien werden an vorhersagbare Orte abgelegt.
Dokumentationen werden aktuell gehalten.
Es existiert eine einheitliche Oberfläche, um Server-Prozesse zu kontrollieren.
Und noch vieles mehr. Das meiste davon arbeitet verborgen unter der Oberfläche.
</p>
<p>
<b>Flexibilität.</b>
Sie laden und installieren nur die Programme, die sie benötigen.
Fink gibt Ihnen die Freiheit, XFree86 oder andere X11 Lösungen auf jede mögliche Art zu installieren.
Wenn Sie X11 gar nicht wollen, ist das auch in Ordnung.
</p>
<p>
<a href="index.php?phpLang=de">Zurück zur Homepage</a> -
<a href="download/index.php?phpLang=de">Download</a>
</p>

<?
require "footer.inc";
?>
