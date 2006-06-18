<?
$title = "Download Quick Start";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2006/06/18 18:15:32 $';

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
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-PowerPC-Installer.dmg?download">Fink
<? print $fink_version; ?> Binary Installer (PowerPC)</a> - <? print $dmg_size; ?><br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Intel-Installer.dmg?download">Fink
<? print $fink_version; ?> Binary Installer (Intel)</a> - <? print $intel_dmg_size; ?><br>
(10.3 Nutzer - nehmen stattdessen  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.7.2-Installer.dmg?download">Fink
0.7.2</a>)<br>
(10.2 Nutzer - nehmen stattdessen  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.4-Installer.dmg?download">Fink
0.6.4</a>)<br>
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
<p>Installation mit Hilfe der Quelldateien  (<!--start translation -->requires the XCode Tools [Developer Tools on 10.2] to be installed<!-- end translation -->).
Für ein <code>fink</code>-Update führen Sie <code>fink selfupdate</code> aus. Falls gefragt, wählen Sie (1), "rsync". Damit führen sie automatisch ein Update des <code>fink</code>-Paketes durch.</p>
<p>Nach dem Update von <code>fink</code>, können Sie <code>fink install</code> nutzen, um Quelldateien zu laden und zu kompillieren. Um zum Beispiel Gimp zu installieren, führen Sie <code>fink install gimp</code> aus.</p> 
</li> 
</ul>

</li> 
</ol>
<!-- start translation -->
<h2>Additional Things to Install</h2>
<h3>XCode Tools/Developer Tools</h3>
<p>You may find that only using binary packages limits the utility of Fink.  There are fewer packages available in binary format than from source, and the binary versions are generally older.  To build packages from source, you will need to install the Developer Tools (known as the XCode Tools for Mac OS 10.3 and later).</p>
<p>Although a Developer Tools/XCode Tools version usually comes with your OS install media, you'll probably want a newere one.  Go to <a href="http://connect.apple.com">the Apple Developer Connection</a> to download a newer version (and any updates) after free registration.</p>
<table>
  <caption>Recommended Developer Tools  versions by OS</caption>
  <tbody>
    <tr>
      <td>10.2</td>
      <td>December 2002 Developer Tools and August 2003 <code>gcc3.3</code> updater</td>
    </tr>
    <tr>
      <td>10.3</td>
      <td>XCode 1.5 and the November 2004 <code>gcc3.3</code> updater</td>
    </tr>
    <tr>
      <td>10.4 on PowerPC</td>
      <td>XCode 2.2.1, and the XCode Legacy Tools (for packages that need <code>gcc3.1</code> or <code>gcc2.95</code> to build)</td>
    </tr>
    <tr>
      <td>10.4 on Intel</td>
      <td>XCode 2.2.1</td>
    </tr>
  </tbody>
</table>
<h3>X11</h3>
      <p>Almost all of the applications on Fink that have graphical user interfa
ces (GUIs) require some flavor of X11 (since most were originally developed on p
latforms that only had that as a GUI option).</p>
      <p>Apple provides its own X11 distribution for OS 10.3 and 10.4.  This is
the easiest option with which to get started.  They have elected to split it int
o two parts:</p>
      <ul>
        <li>The <em>X11User</em> package contains everything you need just to ru
n Apple's X11.  It is available on your OS install media for 10.3 and 10.4 as an
 optional install.</li>
        <li>The
<em>X11SDK</em>
package contains the development headers.  You need this if you want to build an
ything from source that uses X11.  This package is available as part of the XCod
e Tools, and installed by default with XCode 2.x.</li>
</ul>
<p>Once you've installed X11 Fink should automatically register it.  If you're having problems check out the <a href="http://fink.sourceforge.net/faq/usage-packages.php#apple-x11-wants-xfree86">FAQ entry</a> on X11 installation problems</p>
<h2>Further information</h2>
<!-- end translation -->
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
