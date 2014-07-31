<?
$title = "Download Quick Start";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2014/07/31 10:42:28 $';

include_once "header.inc";
include_once "../fink_version.inc";
?>

<h1>Fink Download</h1>
<p>
Es gibt verschiedene Möglichkeiten, Fink zu installieren und zu aktualisieren.
Für neue Nutzer empfehlen wir diese Quick-Start-Anleitung.
Fortgeschrittene Nutzer schauen sich am besten den 
<a href="overview.php">Überblick</a> und die
<a href="upgrade.php">Upgrade Matrix</a> an.
</p>

<h2>Quick Start</h2>
<p>
Sie möchten Fink zum ersten mal installieren? Diese Quick-Start-Anleitung hilft 
Ihnen, einen schnellen Einstieg zu finden.
</p>
<ol>
<li>
<p>
10.6, 10.7, 10.8 und 10.9 Nutzer: Derzeit gibt es keine binäre Installation und 
sie müssen statt dessen der Anleitung 
<A href="srcdist.php">Quellcode-Installation</A> folgen.<br>

10.5 Nutzer: Laden sie sich das Installations-Disc-Image herunter:<br>
<? analytics_download_link("http://prdownloads.sourceforge.net/fink/Fink-" . $fink_version . "-PowerPC-Installer.dmg?download", "Fink " . $fink_version . " Binary Installer (PowerPC)", "/downloads/FinkPPC")   ?> - <?= $dmg_size ?><br>
<? analytics_download_link("http://prdownloads.sourceforge.net/fink/Fink-" . $fink_version . "-Intel-Installer.dmg?download",   "Fink " . $fink_version . " Binary Installer (Intel)",   "/downloads/FinkINTEL") ?> - <?= $intel_dmg_size ?>

<br>
(10.4 Nutzer - nehmen statt dessen  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.8.1-PowerPC-Installer.dmg?download">Fink
0.8.1 (PowerPC)</a> oder <a href="http://prdownloads.sourceforge.net/fink/Fink-0.8.1-Intel-Installer.dmg?download">Fink
0.8.1 (Intel)</a> )<br>
(10.3 Nutzer - nehmen statt dessen  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.7.2-Installer.dmg?download">Fink
0.7.2</a>)<br>
(10.2 Nutzer - nehmen statt dessen  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.4-Installer.dmg?download">Fink
0.6.4</a>)<br>
(10.1 Nutzer - nehmen statt dessen <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink
0.4.1</a>)
</p>
</li>
<li><p>
Doppel-Klick auf "Fink-<? print $fink_version; ?>-Installer.dmg", um das Image 
zu mounten, anschließend Doppel-Klick auf das "Fink <? print $fink_version; ?> 
Installer.pkg" Paket. Folgen sie den Anweisungen auf dem Bildschirm.
</p></li>
<li><p>
Vor Ende der Installation öffnet sich das Terminal und das pathsetup.sh-Script 
wird automatisch gestartet. Nach erfolgreicher Genehmigung werden ihre 
Shell-Konfigurations-Dateien angepasst. Am Ende des Script schließt sich das 
Fenster und sie können loslegen!
</p></li>
<li><p>
Sollte während dessen irgendetwas schief laufen, können sie versuchen, das 
Skript erneut auszuführen, indem sie entweder das pathsetup Programm auf der 
Installations-Disc starten oder indem sie im Terminal folgenden Befehl eingeben:
</p><pre>open /sw/bin/pathsetup.sh </pre><p>
(Diese Eingabe sollte im Übrigen von jedem Benutzer ihres Systems durchgeführt 
werden: Jeder Benutzer muss pathsetup unter seinem Nutzerkonto ausführen.)
</p><p>
Sollte das Skript pathsetup eine Fehlermeldung ausgeben, schauen sie in die 
Dokumentation, hier insbesondere  
<a href="../doc/users-guide/install.php#setup">Kapitel 2.3 "Konfiguration der Umgebung"</a> 
des Benutzerhandbuchs.</p>
</li>
<li><p>
Öffnen sie ein Terminal Fenster und führen sie Folgendes aus: 
"<code>fink scanpackages; fink index</code>", oder nutzen sie die enthaltene 
Fink Commander GUI Anwendung (die in einen Ordner ihres Systems verschoben 
werden muss und nicht aus dem Disc-Image gestartet werden kann) und führen sie 
im dortigen Menü die folgenden Befehle aus: <em>Source->scanpackages</em> 
gefolgt von <em>Source->Tools->index</em>.
</p>
</li>
<li><p>Nachdem die beiden Befehle ausgeführt wurden, sollten sie das 
<code>fink</code>-Paket aktualisieren, falls es seit dem letzten Release 
erhebliche Änderungen gegeben haben sollte. Anschließend können sie weitere 
Pakete installieren. Hierzu gibt es verschiedene Möglichkeiten:
<ul>
<li>
<p>Nutzung des mitgelieferten Fink Commander zur Auswahl und zur Installtion der 
Pakete. Fink Commander bietet eine einfach zu bedienende grafische 
Benutzeroberfläche (GUI) für Fink. Diese Methode ist für Neulinge und Benutzer, 
die mit der Kommandozeile weniger gut zu Recht kommen, zu empfehlen. Fink 
Commander hat Binär- und Source-Menüs. Sie sollten die Binärdateien 
installieren, wenn sie die Developer Tools nicht installiert haben oder Pakete 
nicht selber erstellen wollen.</p>
<ul><li><p>Folgende Schritte müssen durchgeführt werden, um per Fink Commander 
<code>fink</code> die Binärdateien zu installieren:</p>
<ol>
<li>Binär->Update descriptions</li>
<li>Wählen sie das <code>fink</code>-Paket aus.</li>
<li>Binär->Install</li>
</ol></li>
<li><p>So sollte ein <code>fink</code>-Update durchgeführt werden:</p>
<ol>
<li>Source->Selfupdate</li> 
<li>Werkzeuge->Eingabe an Fink senden...
<li>Sorgen sie dafür, dass "Vorschlag von Fink verwenden" ausgewählt ist und 
klicken sie "OK".</li>
<li><code>fink</code> und weitere Basis-Pakete werden installiert (build) und 
automatisch ausgeführt.</li>
</ol></li></ul>
<p>Nachdem sie nun das <code>fink</code>-Update durchgeführt haben, können sie 
weitere Pakete installieren.</p>  
<ul>
<li>Um Pakete mit Hilfe der Binärdateien zu installieren, wählen sie das Paket 
aus und führen sie anschließend Binär->Install aus.</li>
<li>Um Pakete mit Hilfe der Quelldateien zu installieren, wählen sie das Paket 
aus und führen sie anschließend Source->Install aus.</li>
</ul>
</li>
<li>
<p>Nutzung von apt-get. Apt-get läd und installiert Binärdateien für sie und 
spart so die Zeit, die Quelldateien selber zu kompilieren. Wenn sie die 
Developer Tools nicht installiert haben, ist dies neben der Nutzung des Fink 
Commanders mit Binärdateien (siehe oben) die einzige Möglichkeit, Pakete zu 
installieren.</p>
<p>Um <code>fink</code> zu aktualisieren, öffnen sie ein Terminal-Fenster und 
geben sie Folgendes ein:
<code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>Nach dem Update von <code>fink</code>, können sie weitere Pakete 
installieren, indem sie die gleiche Syntax benutzen, z.B. 
<code>sudo apt-get install gimp</code>, um Gimp zu installieren. Beachten sie 
allerdings, dass nicht alle Pakete als Binärdateien zur Verfügung stehen.</p>
</li>
<li>
<p>Installation mit Hilfe der Quelldateien (setzt voraus, dass die XCode Tools 
[Developer Tools unter 10.2] installiert sind).
Für ein <code>fink</code>-Update führen sie <code>fink selfupdate</code> aus. 
Falls gefragt, wählen sie (1), "rsync". Damit führen sie automatisch ein Update 
des <code>fink</code>-Paketes durch.</p>
<p>Nach dem Update von <code>fink</code>, können sie <code>fink install</code> 
nutzen, um Quelldateien zu laden und zu kompillieren. Um zum Beispiel Gimp zu 
installieren, führen sie <code>fink install gimp</code> aus.</p> 
</li> 
</ul>

</li> 
</ol>

<h2 id="additionaldownloads">Zusätzlich zu installieren</h2>
<h3>XCode Tools/Developer Tools</h3>
<p>Für die derzeit unterstützen Versionen von Mac OS X, muss man die Pakete aus 
dem Quellcode erstellen. Dafür benötigt man die Developer Tools (Xcode) von Apple.</p>
<p>Besuchen sie die <a href="http://developer.apple.com">Entwickler-Seiten von Apple</a>, 
registrieren sie sich kostenlos und laden sie Xcode über den Mac App Store.</p>
<table>
  <caption>Empfohlene Version der Developer Tools (Xcode)</caption>
  <tbody>
    <tr>
        <td>10.9</td>
        <td>Die Command Line Tools für Mavericks - spät im Oktober 2013; optional 
        Xcode 5.0.1<br>
        Die Command Line Tools kann man mit dem Kommando
        <code>xcode-select --install</code> in den Voreinstellungen von Xcode 
        herunter laden oder in einem separaten Paket.</td>
    </tr>
    <tr>
        <td>10.8</td>
        <td>Die Command Line Tools für Mountain Lion - Oktober 2013; optional 
        Xcode 5.0.1<br>
        Die Command Line Tools kann man in den Voreinstellungen von Xcode 
        herunter laden oder in einem separaten Paket.</td>
    </tr>
    <tr>
        <td>10.7</td>
        <td>Die Command Line Tools für Lion - April 2013; optional Xcode 4.6.3<br>
        Die Command Line Tools kann man in den Voreinstellungen von Xcode 
        herunter laden oder in einem separaten Paket.</td>
    </tr>
    <tr>
        <td>10.6</td>
        <td>Xcode 3.2.6 (Xcode 4.2 gibt es nur für kostenpflichtige 
        Apple-Developer-Konten) </td>
    </tr>
    <tr>
      <td>10.5</td>
      <td>Xcode 3.1.4</td>
    </tr>
    <tr>
      <td>10.4</td>
      <td>Xcode 2.5</td>
    </tr>
  </tbody>
</table>
<h3>X11</h3>
<p>Die meisten Programme unter Fink mit einer grafischen Nutzeroberfläche (GUI) 
  benötigen X11, denn die meisten wurden für eine Plattform entwickelt, für die 
  X11 die einzige Option für eine GUI ist.</p>
<p>Apple stellt eine eigene X11-Distribution zur Verfügung und dies ist die 
  einfachste Option für einen Anfang. Apple hat sich entschieden, die 
  Distribution in folgende zwei Teile aufzuteilen:</p>
<ul>
  <li>Das <em>X11User</em> Paket enthält alles nötige für das Ablaufen von 
  Apples X11. Es steht auf der Installations-CD für 10.4 als optionale 
  Installation zur Verfügung. Ab 10.5 wird es automatisch installiert.</li>
  <li>Das <em>X11SDK</em> Paket enthält die Header-Dateien für das Programmieren.
  Es wird benötigt, sobald ein Programm aus dem Quellcode erstellt werden soll, 
  das X11 benutzt. Dieses Paket ist als Teil der Xcode Tools erhältlich und wird 
  ab Xcode 2.x automatisch installiert.</li>
  <li>Das <em>2006 X11 Update</em> für 10.4 (erhältlich über Software Update oder 
  manuelles Herunterladen) wird unterstützt.</li>
  <li>Alle offiziellen Updates für X11 auf 10.5 - 10.7 werden unterstützt.</li>
  <li>Die <em>Xquartz X11 Distribution</em> von
  <a href="http://xquartz.macosforge.org">macosforge.org</a> wird nur 
  auf 10.5 (Xquartz version 2.6.3 und früher). Dort ersetzt es das offizielle 
  X11. Auf 10.8 und 10.9 <em>ist</em> es das offizielle X11. Es hat keine 
  separaten Pakete für Laufzeit- und Header-Pakete.</li>
</ul>
<p>Sobald X11 installiert ist, sollte Fink es automatische erkennen. Treten 
  dennoch Probleme auf, schauen sie bitte auf der Seite  
  <a href="http://www.finkproject.org/faq/usage-packages.php?phpLang=en#apple-x11-wants-xfree86">FAQ entry</a> 
  on X11 installation problems</p> nach.
<h2 id="furtherinfo">Weitere Informationen</h2>
<p>
Weitere Informationen finden sie unter <a
href="../faq/index.php">Frequently Asked Questions</a> und unter <a
href="../doc/index.php">Dokumentation</a>.
Sollten ihre Fragen in diesen Dokumenten noch nicht beantwortet werden, schauen 
sie sich die <a href="../help/index.php">Hilfe Seite</a> an.
</p>
<p>
Um über neue Versionen informiert zu werden, abonnieren sie die 
<a href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>

<p>
Der Quellcode der Pakete der Installations-Disc kann <a
href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">hier</a> 
herunter geladen werden.

</p>

<?
include "footer.inc";
?>
