<?
$title = "Benutzerhandbuch - fink-Tool";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/09/28 05:43:09';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="prev" href="conf.php?phpLang=de" title="Die Fink-Konfigurationsdatei">';


include_once "header.de.inc";
?>
<h1>Benutzerhandbuch - 6. Das fink-Tool über die Kommandozeile benutzen</h1>
    
    
    <h2><a name="using">6.1 Das fink-Tool benutzen</a></h2>
      
      <p>Das <code>fink</code>-Tool nutzt verschiedene Befehle als Suffix, um auf Pakete der Source-Distribution angewandt zu werden. Einige benötigen mindestens ein Paketname, aber können auch mit mehrere Paketnamen auf einmal umgehen. Sie können einfach den Paketnamen (z.B. gimp), einen vollständigen, zugelassenen Namen mit der Version (z.B. gimp-1.2.1) oder einen Namen mit Version und Revision (z.B. gimp-1.2.1-3) angeben. Fink wird automatisch die aktuellste, verfügbare Version und Revision aussuchen, falls sie jeweils nicht angegeben sind. Andere haben verschiedene Optionen.</p>
      <p>Es folgt eine Auflistung der Befehl für das <code>fink</code>-Tool:</p>
    
    <h2><a name="install">6.2 install</a></h2>
      
      <p>Der install-Befehl wird verwendet, um Pakete zu installieren. Es lädt, konfiguriert, erstellt und installiert die Pakete, die Sie angeben. Es installiert auch vorausgesetzte Pakete automatisch, fragt Sie aber davor nach einer Bestätigung. Beispiel:</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      <p>Aliases für den Befehl install: update, enable, activate, use (die meisten aus historischen Gründen).</p>
    
    <h2><a name="remove">6.3 remove</a></h2>
      
      <p>Der remove-Befehl entfernt Pakete von Ihrem System, wenn Sie '<code>dpkg --remove</code>' aufrufen. Die aktuelle Implementation hat einige Schwachstellen: So funktioniert der Befehl nur mit Paketen, die das <code>fink</code>-Tool kennt (d.h. wo eine .info-Datei vorhanden ist); und es überprüft nicht die Abhängigkeiten selbst, sondern überlässt dies dem dpkg-Tool (allerdings sollte das kein Problem darstellen).</p>
      <p>Der remove-Befehl entfernt nur die eigentlichen Dateien, lässt aber die  .deb-Datei der komprimierten Pakete unberührt. Das bedeutet, dass Sie die Pakete später wieder installieren können, ohne diese neu kompilieren zu müssen. Wenn Sie den Plattenplatz benötigen, können Sie die .deb-Datei vom <code>/sw/fink/dists</code>-Baum löschen.</p>
      <p>Aliases: disable, deactivate, unuse, delete.</p>
    
    <h2><a name="update-all">6.4 update-all</a></h2>
      
      <p>This command updates all installed packages to the latest version. It
does not need a package list, so you just type:</p>
      <pre>fink update-all</pre>
    
    <h2><a name="list">6.5 list</a></h2>
      
      <p>Dieser Befehl erstellt eine Liste aller verfügbarer Pakete, mit dem Stand der Installation, die aktuellste Version und eine kurze Beschreibung. Wenn Sie den Befehl ohne Parameter aufrufen, listet fink alle verfügbaren Pakete auf. Sie können auch einen Namen oder eine Shell-Strukur (pattern) übergeben, und fink wird alle passenden Pakete auflisten.
</p>
      <p>
Die erste Spalte zeigt den Installationszustand mit den folgenden Bedeutungen:
</p>
      <pre>
     nicht installiert
 i   aktuellste Version ist installiert
(i)  installiert, es ist aber eine aktuellere Version verfügbar
</pre>
      <p>
Es gibt auch einige Parameter (flags) für den <code>fink list</code>-Befehl</p>
      <pre>
-h,--help
	  Zeigt die verfügbaren Optionen.
-t,--tab
	  Gibt die Liste in einem durch Tabs getrennten Format aus,
	  was nützlich ist, wenn Sie die Ausgabe durch ein Skript
	  verarbeiten lassen wollen.
-i,--installed
	  Zeigt nur die Pakete, die aktuell installiert sind.
-o,--outdated
	  Zeigt nur die Pakete, die veraltet sind.
-u,--uptodate
	  Zeigt nur die Pakete, die up to date sind.
-n,--notinstalled
	  Zeigt die Pakete, die nicht installiert sind.
-s=expr,--section=expr
	  Zeigt nur die Pakete in den Rubriken, die auf den
	  regulären Ausdruck passen.
-w=xyz,--width=xyz
	  Stellt die Breite der dann so formatierten Ausgabe ein.
	  xyz ist entweder ein numerischer Wert oder auto.
	  auto setzt die Breite auf die Breite des Terminalfensters.
	  Standard ist auto.
</pre>
      <p>
Einige Anwendungsbeispiele:
</p>
      <pre>
fink list                 - listet alle Packete auf.
fink list bash            - überprüft ob bash in welcher version verfübar ist.
fink list --outdated      - listet alle die Pakete auf, die veraltet sind.
fink list --section=kde   - listet alle Pakete in der kde-Rubrik auf.
fink list "gnome*"        - listet alle die Pakete auf, die mit 'gnome' beginnen.
</pre>
      <p>
      
Die Anführungsstriche im letzten Beispiel sind notwendig, um die Shell davon abzuhalten, die Struktur selber zu interpretieren.
</p>
    
    <h2><a name="apropos">6.6 apropos</a></h2>
      
      <p>
Dieser Befehl verhält sich fast identisch wie <code>fink list</code>. Der größte merkliche Unterschied ist, dass <code>fink apropos</code> auch die Paketbeschreibungen durchsucht, um Pakete zu finden. Der zweite Unterschied ist, dass der Suchstring angegeben werden muss und nicht optional ist.
</p>
      <pre>
fink apropos irc          - listet alle Pakete auf, in denen 'irc' im Namen oder in der Beschreibung vorkommt.
fink apropos -s=kde irc   - wie oben aber auf die kde-Rubrik beschränkt.
</pre>
    
    <h2><a name="describe">6.7 describe</a></h2>
      
      <p>
Dieser Befehl gibt eine Beschreibung für das Paket an, welches Sie per Kommandozeile angeben. Beachten Sie, dass nur ein kleiner Teil der Pakete zur Zeit eine Beschreibung hat.
</p>
      <p>
Aliases: desc, description, info
</p>
    
    <h2><a name="fetch">6.8 fetch</a></h2>
      
      <p>
Lädt die angegebenen Pakete herunter, installiert sie aber nicht. Dieser Befehl lädt die Tarball-Dateien, sogar wenn Sie zuvor heruntergeladen wurden.
</p>
    
    <h2><a name="fetch-all">6.9 fetch-all</a></h2>
      
      <p>
Lädt <b>alle</b> Quelldateien herunter. Wie fetch lädt es die Tarball-Dateien auch herunter, sollten sie zuvor schon heruntergeladen worden sein.
</p>
    
    <h2><a name="fetch-missing">6.10 fetch-missing</a></h2>
      
      <p>Lädt <b>all</b> fehlenden Quelldateien herunter. Dieser Befehl lädt nur die Dateien heruntern, die nicht auf dem Computer vorhanden sind.</p>
    
    <h2><a name="build">6.11 build</a></h2>
      
      <p>Erstellt ein Paket, aber installiert es nicht. Wie gewöhnlich werden die Quell-Tarballs heruntergeladen, wenn Sie nicht gefunden werden können. Das Resultat des Befehls ist ein installierbares -deb-Paket, welches Sie später schnell mit dem install-Befehl installieren können. Dieser Befehl wird nichts tun, wenn die .deb-Datei bereits existiert. Beachten Sie, dass die vorausgesetzten Pakete dennoch <b>installiert</b> und nicht nur erstellt werden.</p>
    
    <h2><a name="rebuild">6.12 rebuild</a></h2>
      
      <p>Erstellt ein Paket (wie der build-Befehl), ignoriert und überschreibt aber die vorhandene .deb-Datei. Wenn Sie ein Paket installieren, wird die neu erstellte .deb-Datei auch via <code>dpkg</code> auf Ihr System installiert. Sehr nützlich während der Paketentwicklung.</p>
    
    <h2><a name="reinstall">6.13 reinstall</a></h2>
      
      <p>Wie der Befehl install installiert reinstall ein Paket. Allerdings tut es dies via <code>dpkg</code>, auch wenn es schon installiert ist. Sie können diesen Befehl nutzen, wenn Sie Paketdateien aus Versehen gelöscht haben, und Sie die Standardeinstellungen zurück haben wollen.</p>
    
    <h2><a name="configure">6.14 configure</a></h2>
      
      <p>
Führt den Konfigurationsprozess nochmal aus. So können Sie Ihre Mirror-Server und Proxy-Einstellungen unter anderen ändern.</p>
    
    <h2><a name="selfupdate">6.15 selfupdate</a></h2>
      
      <p>
      Dieser Befehl automatisiert die Aktualisierung von Fink auf eine neues Release. Es überprüft die Fink-Webseite, um zu sehen, ob eine neue Version verfügbar ist. Wenn dies so ist, lädt es die Paketbeschreibungen und Updates der core-Pakete einschließlich von <code>fink</code> selber. Dieser Befehl kann auf reguläre Releases aktualisieren, es kann aber auch Ihren <code>/sw/fink/dists</code>-Verzeichnisbaum für direktes CVS einrichten. Das bedeutet, dass Sie dann auf die aktuellsten Versionen aller Pakete zugreifen können.</p>
    
    <h2><a name="index">6.16 index</a></h2>
      
      <p>
      Erneuert den Paket-Zwischenspeicher (Cache). Sie brauchen diesen Befehl normalerweise nicht ausführen, da <code>fink</code> automatisch kontrolliert, wann es aktualisert werden muss.
</p>
    
    <h2><a name="validate">6.17 validate</a></h2>
      
      <p>
      Dieser Befehl führt verschiedene Kontrollen über die .info- und .deb-Dateien durch. Paket-Maintainer sollten ihre Paketbeschreibungen und die korrespondierenden Pakete vor dem Hochladen damit überprüfen.
</p>
      <p>
   Aliases: check
</p>
    
    <h2><a name="scanpackages">6.18 scanpackages</a></h2>
      
      <p>
   Ruft dpkg-scanpackages(8) mit den angegebenden Bäumen auf.
</p>
    
    <h2><a name="cleanup">6.19 cleanup</a></h2>
      
      <p>
      Entfernt überholte Paketdateien (.info, .patch, .deb), falls neuere Versionen verfügbar sind. So kann viel Plattenplatz zurückgewonnen werden.
</p>
    
    <h2><a name="dumpinfo">6.20 dumpinfo</a></h2>
      
      <p>
    Anmerkung: nicht verfügbar bis CVS-Version von Fink ab 0.20.0.
      </p>
      <p>
      Zeigt wie Fink die Teile einer .info-Datei analysiert. Verschiedene Felder und Prozentangaben werden gemäß der folgenden <b>Optionen</b> angezeigt:    </p>
      <pre>
-h, --help           - Zeigt die verfügbaren Optionen an.
-a, --all            - Zeigt alle Felder der Paketbeschreibungen.
                       Das ist der Standardmodus wenn keine --field
                       oder --percent-Parameter angegeben sind.
-f fieldname,        - Zeigt die angegebenen Feldnamen,
  --field=fieldname    in der gelisteten Reihenfolge.
-p key,              - Zeigt die angegebenen Prozentschlüssel
   --percent=key       in der gelisteten Reihenfolge.
      </pre>
    
  
<? include_once "../../footer.inc"; ?>


