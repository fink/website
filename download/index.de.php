<?
$title = "Download Quick Start";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2004/11/26 08:25:50 $';

include "header.inc";
?>


<h1>Fink Download</h1>
<p>
Es gibt verschiedene Möglichkeiten, Fink zu installieren und zu aktualisieren.
Für neue Nutzer ist diese Quick-Start-Anleitung zu empfehlen.
Fortgeschrittene Nutzer schauen sich am besten den <a href="overview.php">Überblick</a> und die
<a href="upgrade.php">Upgrade Matrix</a> an.
</p>

<h2>Quick Start</h2>
<p>
Sie möchten Fink zum ersten mal installieren? Diese Quick-Start-Anleitung hilft Ihnen, einen schnellen Einstieg zu finden.
</p>
<? 
include "../fink_version.inc";
?>

<ol>
<li><p>
Laden Sie sich das Installations-Disc-Image herunter:<br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Installer.dmg?download">Fink
<? print $fink_version; ?> Binary Installer</a> - <? print $dmg_size; ?><br>
(10.2 Nutzer - nehmen stattdessen  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.3-Installer.dmg?download">Fink
0.6.3</a>)<br>
(10.1 Nutzer - nehmen stattdessen <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink
0.4.1</a>)
</p>
</li>
<li><p>
Doppel-Klick auf "Fink-<? print $fink_version; ?>-Installer.dmg", um das Image zu mounten,
anschließend Doppel-Klick auf das "Fink <? print $fink_version; ?> Installer.pkg" Paket. Folgen Sie den Anweisungen auf dem Bildschirm.
</p></li>
<li><p>
Vor Ende der Installation öffnet sich das Terminal und das pathsetup.command-Script wird automatisch gestartet. Nach erfolgreicher Genehmigung, werden Ihre Shell-Konfigurations-Dateien angepasst. Wenn das Script beendet ist, schließt sich das Fenster und Sie können loslegen!
</p></li>
<li><p>
Sollte währenddessen irgendetwas schief laufen, können Sie versuchen, das Skript erneut auszuführen, indem Sie entweder die pathsetup.command-Datei auf der Installations-Disc starten oder indem Sie im Terminal folgenden Befehl eingeben:
</p><pre>open /sw/bin/pathsetup.command </pre><p>(Diese Eingabe sollte im Übrigen von jedem Benutzer ihres Systems durchgeführt werden: Jeder Benutzer muss das pathsetup.command-Skript unter seinem Profil ausführen.)
</p><p>
Sollte das Skript (pathsetup.command) eine Fehlermeldung ausgeben, schauen Sie in die Dokumentation, hier insbesondere  
<a href="../doc/users-guide/install.php#setup">Kapitel 2.3 "Konfiguration der Umgebung"</a> des Benutzerhandbuchs.</p>
</li>
<li><p>
Öffnen Sie ein Terminal Fenster und führen Sie Folgendes aus: "<code>fink scanpackages; fink index</code>", oder nutzen Sie die enthaltene Fink Commander GUI Anwendung (die in einen Ordner Ihres Systems verschoben werden muss und nicht aus dem Disc-Image gestartet werden kann) und führen Sie im dortigen Menü die folgenden Befehle aus:  <em>Source->scanpackages</em> gefolgt von <em>Source->Tools->index</em>.
</p>
</li>
<li><p>Nachdem die beiden Befehle ausgeführt wurden, sollten Sie das <code>fink</code>-Paket aktualisieren, falls es seit dem letzten Release erhebliche Änderungen gegeben haben sollte. Anschließend können Sie weitere Pakete installieren. Hierzu gibt es verschiedene Möglichkeiten:
<ul>
<li>
<p>Nutzung des mitgelieferten Fink Commander zur Auswahl und zur Installtion der Pakete. Fink Commander bietet eine einfach zu bedienende grafische Benutzeroberfläche (GUI) für Fink. Diese Methode ist für Neulinge und Benutzer, die mit der Kommandozeile weniger gut zu Recht kommen, zu empfehlen. Fink Commander hat Binär- und Source- Menüs. Sie sollten die Binärdateien installieren, wenn Sie die Developer Tools nicht installiert haben oder Pakete nicht selber erstellen wollen.</p>
<ul><li><p>Folgende Schritte müssen durchgeführt werden, um per Fink Commander <code>fink</code> die Binärdateien zu installieren:</p>
<ol>
<li>Binär->Update descriptions</li>
<li>Wählen Sie das <code>fink</code>-Paket aus.</li>
<li>Binär->Install</li>
</ol></li>
<li><p>So sollte ein <code>fink</code>-Update durchgeführt werden:</p>
<ol>
<li>Source->Selfupdate</li> 
<li>Werkzeuge->Eingabe an Fink senden...
<li>Sorgen Sie dafür, dass "Vorschlag von Fink verwenden" ausgewählt ist und klicken Sie "OK".</li>
<li><code>fink</code> und weitere Basis-Pakete werden installiert (build) und automatisch ausgeführt.</li>
</ol></li></ul>
<p>Nachdem Sie nun das <code>fink</code>-Update durchgeführt haben, können Sie weitere Pakete installieren.</p>  
<ul>
<li>Um Pakete mit Hilfe der Binärdateien zu installieren, wählen Sie das Paket aus und führen Sie anschließend Binär->Install aus.</li>
<li>Um Pakete mit Hilfe der Quelldateien zu installieren, wählen sie das Paket aus und führen Sie anschließend Source->Install aus.</li>
</ul>
</li>
<li>
<p>Nutzung von apt-get. Apt-get läd und installiert Binärdateien für Sie und spart so die Zeit, die Quelldateien selber zu kompilieren. Wenn Sie die Developer Tools nicht installiert haben, ist dies neben der Nutzung des Fink Commanders mit Binärdateien (siehe oben) die einzige Möglichkeit, Pakete zu installieren.</p>
<p>Um <code>fink</code> zu aktualisieren, öffnen Sie ein Terminal-Fenster und geben sie Folgendes ein:<code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>Nach dem Update von <code>fink</code>, können sie weitere Pakete installieren, indem sie die gleiche Syntax benutzen, z.B. <code>sudo apt-get install gimp</code>, um Gimp zu installieren. Beachten Sie allerdings, dass nicht alle Pakete als Binärdateien zur Verfügung stehen.</p>
</li>
<li>
<p>Installation mit Hilfe der Quelldateien. Für ein <code>fink</code>-Update führen Sie <code>fink selfupdate</code> aus. Falls gefragt, wählen Sie (1), "rsync". Damit führen sie automatisch ein Update des <code>fink</code>-Paketes durch.</p>
<p>Nach dem Update von <code>fink</code>, können Sie <code>fink install</code> nutzen, um Quelldateien zu laden und zu kompillieren. Um zum Beispiel Gimp zu installieren, führen Sie <code>fink install gimp</code> aus.</p> 
</li> 
</ul>

</li> 
</ol>

<p>
Weitere Informationen finden Sie unter <a
href="../faq/index.php">Frequently Asked Questions</a> und unter <a
href="../doc/index.php">Dokumentation</a>.
Sollten Ihre Fragen in diesen Dokumenten noch nicht beantwortet werden, schauen Sie sich die <a
href="../help/index.php">Hilfe Seite</a> an.
</p>
<p>
Um über neue Versionen informiert zu werden, abonnieren Sie die <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>

<p>
Der Quellcode der Pakete der Installations-Disc kann <a
href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">hier</a> heruntergeladen werden.

</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
