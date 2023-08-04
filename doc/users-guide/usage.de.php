<?php
$title = "Benutzerhandbuch - fink-Tool";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="prev" href="conf.php?phpLang=de" title="Die Fink-Konfigurationsdatei">';


include_once "header.de.inc";
?>
<h1>Benutzerhandbuch - 6. Das fink-Tool über die Kommandozeile benutzen</h1>
    
    
    <h2><a name="using">6.1 Das fink-Tool benutzen</a></h2>
      
      <p>Das <code>fink</code>-Tool nutzt verschiedene Befehle als Suffix, um auf Pakete der Source-Distribution angewandt zu werden. Einige benötigen mindestens ein Paketname, aber können auch mit mehrere Paketnamen auf einmal umgehen. Sie können einfach den Paketnamen (z.B. gimp), einen vollständigen, zugelassenen Namen mit der Version (z.B. gimp-1.2.1) oder einen Namen mit Version und Revision (z.B. gimp-1.2.1-3) angeben. Fink wird automatisch die aktuellste, verfügbare Version und Revision aussuchen, falls sie jeweils nicht angegeben sind. Andere haben verschiedene Optionen.</p>
      <p>Es folgt eine Auflistung der Befehl für das <code>fink</code>-Tool:</p>
    
    <h2><a name="options">6.2 Globale Optionen</a></h2>
      
      <p>
Einige Optionen gelten für alle fink Kommandos. Mit dem Aufruf <code>fink --help</code> erhält man eine Liste dieser Optionen:
      </p>
      <p>(ab <code>fink-0.26.0</code>)</p>
      <p><b>-h, --help</b> - gibt den Hilfetext aus.
</p>
      <p><b>-q, --quiet</b>  - macht <code>fink</code> weniger geschwätzig, das Gegenteil von <b>--verbose</b>.  Es überschreibt die <a href="conf.php?phpLang=de#optional">Verbose</a> Option in <code>fink.conf</code>.
</p>
      <p><b>-V, --version</b> - gibt die Versionsinformation aus.
</p>
      <p><b>-v, --verbose</b> - macht <code>fink</code> geschwätziger, das Gegenteil von <b>--quiet</b>.  Es überschreibt die <a href="conf.php?phpLang=de#optional">Verbose</a> Option in <code>fink.conf.</code>
</p>
      <p><b>-y, --yes</b> - übernehme die voreingestellte Antwort für alle Fragen.
</p>
      <p><b>-K, --keep-root-dir</b>   - macht, dass <code>fink</code> das Verzeichnis <code>root-[name]-[version]-[revision]</code> im <a href="conf.php?phpLang=de#optional">Buildpath</a> nach der Erstellung eines Pakets nicht löscht. Dies entspricht der <a href="conf.php?phpLang=de#developer">KeepRootDir</a> Option in <code>fink.conf</code>.
</p>
      <p><b>-k, --keep-build-dir</b>  - macht, dass <code>fink</code> das Verzeichnis <code>[name]-[version]-[revision]</code> im <a href="conf.php?phpLang=de#optional">Buildpath</a> ach der Erstellung eines Pakets nicht löscht. Dies entspricht der <a href="conf.php?phpLang=de#developer">KeepBuildDir</a> Option in <code>fink.conf</code>.
</p>
      <p><b>-b, --use-binary-dist</b> - lade vorübersetzte Pakete aus der Binärdistribution, wenn verfügbar (d. h. spare Übersetzungszeit und Plattenplatz). Beachten sie bitte, dass fink die Version herunter lädt, die es will und nicht eine auswählt, die eben binär verfügbar ist. Dies entspricht der <a href="conf.php?phpLang=de#downloading">UseBinaryDist</a> Option in <code>fink.conf</code>.
</p>
      <p><b>--no-use-binary-dist</b>  - Benutze keine vorübersetzte Pakete aus der Binärdistribution, das Gegenteil der --use-binary-dist Option. Dies ist die Voreinstellung, wenn nicht in der Konfigurationsdatei <code>fink.conf</code> die Option <code>UseBinaryDist: true </code> gesetzt ist.
</p>
      <p><b>--build-as-nobody</b>     - falle zurück auf einen non-root Nutzer für die unpack, patch, compile and install Phasen. Beachten sie, dass Pakete, die so erstellt wurden, nicht unbedingt funktionieren. Sie sollten diese Modus nur beim Entwickeln und Debugging von Paketen verwenden.
</p>
      <p><b>-m, --maintainer</b>
            - (<code>fink-0.25</code> und neuer) folgende Aktionen, die für die Maintainer von Paketen hilfriech sind, werden ausgeführt: Validiere vor der Paketerstellung die
        <code>.info</code> Datei und nach der Paketerstellungn die <code>.deb</code> Datei; behandle bestimmte Warnungen der Erstellungsphase wie fatale Fehler; (<code>fink-0.26</code> und neuer) durchlaufe die Test Suites wie in dem entsprechenden Feld angegeben. Dies setzt <b>--tests</b> und <b>--validate</b> auf <code>on</code>.
      </p>
      <p><b>--tests[=on|off|warn]</b>         - (<code>fink-0.26.0</code> und neuer) macht, dass die <code>InfoTest</code> Felder aktiviert werden und die Test Suites, die in <code>TestScript</code> angegeben sind, ausgeführt werden (siehe auch <a href="../packaging/reference.php#fields">Fink Packaging Manual</a>). Ohne ein Argument für diese Option oder wenn das Argument <code>on</code> ist, dann werden Fehler in den Test Suites während der Paketerstellung wie fatale Fehler behandelt. Ist das Argument <code>warn</code>, werden Fehler wie Warnungen behandelt.
      </p>
      <p><b>--validate[=on|off|warn]</b> -
           macht, dass Pakete bei ihrer Erstellung validiert werden. Ohne ein Argument für diese Option oder wenn das Argument <code>on</code> ist, dann werden Fehler in den Test Suites während der Paketerstellung wie fatale Fehler behandelt. Ist das Argument <code>warn</code>, werden Fehler wie Warnungen behandelt.
      </p>
      <p><b>-l, --log-output</b>
            - speichere die Terminalausgabe für jeden Prozess der Paketerstellung. Die Voreinstellung ist, die Datei als <code>/tmp/fink-build-log_[name]-[version]-[revision]_[date]-[time]</code> zu speichern, aber mittels <b>--logfile</b> kann man einen alternativen Dateinamen angeben.
      </p>
      <p><b>--no-log-output</b>
            - kein Speichern der Terminalausgabe bei der Paketerstellung. Das Gegenteil der <b>--log-output</b> Option. Dies ist die Voreinstellung.</p>
      <p><b>--logfile=filename</b>
            - abspeichern der Paketerstellungsprotokolls in der Datei mit dem Namen <code>filename</code> und nicht mit der Voreinstellung (siehe die Option <b>--log-output</b>, die implizit mit der Option <b>--logfile</b> gesetzt wird). Sie können Prozent-Erweiterungscodes verwenden, um bestimmte Paketinformationen automatisch einzufügen. Die komplette Liste der Prozent-Erweiterungscodes findet man im <a href="../packaging">Fink Packaging Manual</a>; häufig verwendete Prozent-Erweiterungscodes sind:</p>
      <ul>
        <li><b>%n</b> - Paketname</li>
        <li><b>%v</b> - Paketversion</li>
        <li><b>%r</b> - Paketrevision</li>
      </ul>
      <p><b>-t, --trees=expr</b>
           - nur Pakete in Bäumen berücksichtigen, die zu <b>expr</b> passen.

Das Format des Ausdrucks is eine mit Komma getrennte Liste von Bäumen. Die Bäume in <code>fink.conf</code> werden mit <b>expr</b> verglichen. Nur solche Bäume, die mit einer Spezifikation übereinstimmen, werden von <code>fink</code> berücksichtigt und zwar in der Reihenfolge der Spezifikation, mit der sie als erste übereinstimmen. Ohne die Option <b>--trees</b> werden alle Bäume aus <code>fink.conf</code> der Reihe nach berücksichtigt.

Die Spezifikation eines Baums kann das Zeichen "/" enthalten. Dies erfordert eine exakte Übereinstimmung. Andernfalls stimmt es mit dem ersten Pfadelement des Baums überein. Z. B. stimmt <b>--trees=unstable/main</b> nur mit dem Baum <b>unstable/main</b> überein, während <b>--trees=unstable</b> sowohl mit <b>unstable/main</b> als auch mit <b>unstable/crypto</b> überein stimmt.
Es gibt magische Spezifikationen, in <b>expr</b> enthalten sein können:</p>
      <ul>
        <li><b>status</b> - Pakete aus der dpkg status Datenbank.</li>
        <li><b>virtual</b> - Alle virtuellen Pakete, die die Fähigkeiten des Systems wiedergeben.</li>
      </ul>
      <p>Ausschluss dieser magischen Bäume (oder das Misslingen des Einschlusses) wird derzeit nur für Operationen unterstützt, die keine Pakete installieren oder entfernen.
      </p>
      <p><b>-T, --exclude-trees=expr</b>
           Berücksichtige nur Pakete in Bäumen, die nicht mit dem Ausdruck expr übereinstimmen.

           Die Syntax von expr ist die gleich wie für <b>--trees</b>, einschließlich der magischen Baumspezifikationen. Allerdings werden die Bäume ausgeschlossen. Beachte sie bitte, dass Bäume, die sowohl mit <b>--trees</b> und <b>--exclude-trees</b> überein stimmen, ausgeschlossen werden.
      </p>
      <p> Beispiel für <b>--trees</b> und --exclude-trees:
      </p>
      <ul>
        <li><code>fink --trees=stable,virtual,status install <b>foo</b></code> 
                       <p>Installiere <b>foo</b> wie wenn <code>fink</code> den stable Baum benutzt würde, selbst wenn der unstable Baum in <code>fink.conf</code> eingeschaltet ist.
</p></li>
        <li><code>fink --exclude-trees=local install <b>foo</b></code>
          <p>Installiere die Version von <b>foo</b> in Fink und nicht die lokal modifizierte Version.
          </p>
        </li>
        <li><code>fink --trees=local/main list -i</code>
           <p>Liste die lokal modifizierten Pakete auf, die installiert sind.
           </p>
        </li>
      </ul>
      <p>Die meisten der Optionen sind selbsterklärend. Die meisten können auch in der <a href="conf.php?phpLang=de">Konfigurationsdatei von Fink</a> (<code>fink.conf</code>) gesetzt werden, wenn man sie dauerhaft einschlaten möchte und nicht nur für den jeweiligen Aufruf von <code>fink</code>.
      </p>
    
    <h2><a name="install">6.3 install</a></h2>
      
      <p>Der <b>install</b>-Befehl wird verwendet, um Pakete zu installieren. Es lädt, konfiguriert, erstellt und installiert die Pakete, die Sie angeben. Es installiert auch vorausgesetzte Pakete automatisch, fragt Sie aber davor nach einer Bestätigung. Beispiel:</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      <p>Die Benutzung der Option <a href="#options">--use-binary-dist</a> bei <code>fink install</code> kann den Prozess der Paketerstellung bei komplizierten Paketen erheblich beschleunigen.</p>
      <p>Aliases für den Befehl install: <b>update, enable, activate, use</b> (die meisten aus historischen Gründen).</p>
    
    <h2><a name="remove">6.4 remove</a></h2>
      
      <p>Der remove-Befehl entfernt Pakete von Ihrem System, wenn Sie '<code>dpkg --remove</code>' aufrufen. Die aktuelle Implementation hat einige Schwachstellen: es überprüft nicht die Abhängigkeiten selbst, sondern überlässt dies dem dpkg-Tool (allerdings sollte das kein Problem darstellen).</p>
      <p>Der <b>remove</b>-Befehl entfernt nur die eigentlichen Dateien, lässt aber die  <code>.deb</code>-Datei der komprimierten Pakete unberührt. Das bedeutet, dass Sie die Pakete später wieder installieren können, ohne diese neu kompilieren zu müssen. Wenn Sie den Plattenplatz benötigen, können Sie die <code>.deb</code>-Datei vom <code>/sw/fink/dists</code>-Baum löschen.</p>
      <p>Diese Optionen können mit dem Kommando <b>fink remove</b> verwendet werden.
</p>
      <pre>-h,--help             - zeige die verfügbaren Optionen.
        -r,--recursive        - entferne auch die Pakete, die von dem Paket abhängen, das entfernt werden soll (mit anderen Worten: Überwinde das oben dargestellte Problem).</pre>
      <p>Aliases: <b>disable, deactivate, unuse, delete</b>.</p>
    
    <h2><a name="purge">6.5 purge</a></h2>
      
      <p>Das Kommando <b>purge</b> entfernt Pakete aus dem System. Es macht das gleich wie das Kommando <b>remove</b>, außer dass es auch Konfigurationsdateien löscht.</p>
      <p>Dieses Kommando akzeptiert die Optionen:</p>
      <pre>-h,--help
-r,--recursive</pre>
      <p>.</p>
    
    <h2><a name="update-all">6.6 update-all</a></h2>
      
      <p>Diese Kommando aktualisiert all instalierten Pakete auf ihre neueste Version. Es benötigt keine Liste der Pakete, sondern man gibt einfach folgendes ein:</p>
      <pre>fink update-all</pre>
      <p><a href="#options">--use-binary-dist</a> ist auch bei diesem Kommando nützlich.</p>
    
    <h2><a name="list">6.7 list</a></h2>
      
      <p>Dieser Befehl erstellt eine Liste aller verfügbarer Pakete, mit dem Stand der Installation, die aktuellste Version und eine kurze Beschreibung. Wenn Sie den Befehl ohne Parameter aufrufen, listet fink alle verfügbaren Pakete auf. Sie können auch einen Namen oder eine Shell-Strukur (pattern) übergeben, und fink wird alle passenden Pakete auflisten.
</p>
      <p>
Die erste Spalte zeigt den Installationszustand mit den folgenden Bedeutungen:
</p>
      <pre>    nicht installiert
 i   aktuellste Version ist installiert
(i)  installiert, es ist aber eine aktuellere Version verfügbar
 p  a virtual package provided by a package that is installed</pre>
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
-s expr,--section=expr
	  Zeigt nur die Pakete in den Rubriken, die auf den
	  regulären Ausdruck passen.
-m expr,--maintainer=expr
          Show only packages with the maintainer  matching the
          regular expression expr.
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
fink list --tab --outdated | cut -f 2 
                          - listet alle die Pakete auf, die veraltet sind.
fink list --section=kde   - listet alle Pakete in der kde-Rubrik auf.
fink list --maintainer=fink-devel
                          - list the packages with no maintainer
fink --trees=unstable list --maintainer=fink-devel
                          - list the packages with no maintainer, but only in the unstable tree.
fink list "gnome*"        - listet alle die Pakete auf, die mit 'gnome' beginnen.
</pre>
      <p>
      
Die Anführungsstriche im letzten Beispiel sind notwendig, um die Shell davon abzuhalten, die Struktur selber zu interpretieren.
</p>
    
    <h2><a name="apropos">6.8 apropos</a></h2>
      
      <p>
Dieser Befehl verhält sich fast identisch wie <a href="#list">fink list</a>. Der größte merkliche Unterschied ist, dass <code>fink apropos</code> auch die Paketbeschreibungen durchsucht, um Pakete zu finden. Der zweite Unterschied ist, dass der Suchstring angegeben werden muss und nicht optional ist.
</p>
      <pre>
fink apropos irc          - listet alle Pakete auf, in denen 'irc' im Namen oder
                            in der Beschreibung vorkommt.
fink apropos -s=kde irc   - wie oben aber auf die kde-Rubrik beschränkt.
</pre>
    
    <h2><a name="describe">6.9 describe</a></h2>
      
      <p>
Dieser Befehl gibt eine Beschreibung für das Paket an, welches Sie per Kommandozeile angeben. Beachten Sie, dass nur ein kleiner Teil der Pakete zur Zeit eine Beschreibung hat.
</p>
      <p>
Aliases: <b>desc, description, info</b>
</p>
    
    <h2><a name="plugins">6.10 plugins</a></h2>
      
      <p>Liste die (optionalen) Plugins auf, die für <code>fink</code> zur Verfügung stehen. Derzeit werden der Mechanismus für Benachrichtigungen und der Prüfsummen-Algorithmus für Quell-Tarballs aufgelistet.</p>
    
    <h2><a name="fetch">6.11 fetch</a></h2>
      
      <p>
Lädt die angegebenen Pakete herunter, installiert sie aber nicht. Dieser Befehl lädt die Tarball-Dateien, sogar wenn Sie zuvor heruntergeladen wurden.
</p>
      <p>Die folgenden Optionen können mit dem Kommando <code>fetch</code> verwendet werden:</p>
      <pre>-h,--help		Zeigt die verfügbaren Optionen.
-i,--ignore-restrictive	Hole keine Pakete mit der &amp;quot;License: Restrictive&amp;quot;.
                      	Nützlich für Spiegelserver, weil einige restriktive Pakete das Spiegeln der Quellen nicht erlauben.
-d,--dry-run		Gib nur Informationen über die Datei(en) aus, die für das Paket herunter geladen würden; lade aber nichts herunter.
-r,--recursive		Hole auch die Pakete, von denen das Paket abhängt.
</pre>
    
    <h2><a name="fetch-all">6.12 fetch-all</a></h2>
      
      <p>
Lädt <b>alle</b> Quelldateien herunter. Wie <a href="#fetch">fetch</a> lädt es die Tarball-Dateien auch herunter, sollten sie zuvor schon heruntergeladen worden sein.
</p>
      <p>Die folgenden Optionen können mit dem Kommando <code>fink fetch-all</code> verwendet werden:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
    
    <h2><a name="fetch-missing">6.13 fetch-missing</a></h2>
      
      <p>Lädt <b>all</b> fehlenden Quelldateien herunter. Dieser Befehl lädt nur die Dateien heruntern, die nicht auf dem Computer vorhanden sind.</p>
      <p>Die folgenden Optionen können mit dem Kommando <code>fink fetch-missing</code> verwendet werden:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
    
    <h2><a name="build">6.14 build</a></h2>
      
      <p>Erstellt ein Paket, aber installiert es nicht. Wie gewöhnlich werden die Quell-Tarballs heruntergeladen, wenn Sie nicht gefunden werden können. Das Resultat des Befehls ist ein installierbares -deb-Paket, welches Sie später schnell mit dem install-Befehl installieren können. Dieser Befehl wird nichts tun, wenn die .deb-Datei bereits existiert. Beachten Sie, dass die vorausgesetzten Pakete dennoch <b>installiert</b> und nicht nur erstellt werden.</p>
    
    <h2><a name="rebuild">6.15 rebuild</a></h2>
      
      <p>Erstellt ein Paket (wie der build-Befehl), ignoriert und überschreibt aber die vorhandene .deb-Datei. Wenn Sie ein Paket installieren, wird die neu erstellte .deb-Datei auch via <code>dpkg</code> auf Ihr System installiert. Sehr nützlich während der Paketentwicklung.</p>
      <p>Die <a href="#options">Option --use-binary-dist</a> kann hier verwendet werden.</p>
    
    <h2><a name="reinstall">6.16 reinstall</a></h2>
      
      <p>Wie der Befehl install installiert reinstall ein Paket. Allerdings tut es dies via <code>dpkg</code>, auch wenn es schon installiert ist. Sie können diesen Befehl nutzen, wenn Sie Paketdateien aus Versehen gelöscht haben, und Sie die Standardeinstellungen zurück haben wollen.</p>
    
    <h2><a name="configure">6.17 configure</a></h2>
      
      <p>
Führt den Konfigurationsprozess noch einmal aus. So können Sie unter anderen Ihre Mirror-Server und Proxy-Einstellungen ändern.</p>
      <p><b>Neu in</b> <code>fink-0.26.0</code>: Wenn gewünscht, können sie mit diesem Kommando auch den unstable Baum einschalten.</p>
    
    <h2><a name="selfupdate">6.18 selfupdate</a></h2>
      
      <p>
      Dieser Befehl automatisiert die Aktualisierung von Fink auf eine neues Release. Es überprüft die Fink-Webseite, um zu sehen, ob eine neue Version verfügbar ist. Wenn dies so ist, lädt es die Paketbeschreibungen und Updates der core-Pakete einschließlich von <code>fink</code> selber. Dieser Befehl kann auf reguläre Releases aktualisieren, es kann aber auch Ihren <code>/sw/fink/dists</code>-Verzeichnisbaum für direktes Git einrichten. Das bedeutet, dass Sie dann auf die aktuellsten Versionen aller Pakete zugreifen können.</p>
      <p>Ist die <a href="#options">Option --use-binary-dist</a> eingeschaltet, wird auch die Liste der verfügbaren Pakete in der binären Distribution aktualisiert.</p>
    
    <h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>
      
      <p>Mit diesem Kommando verwendet <code>fink selfupdate</code> rsync, um die Paketliste zu aktualisieren.</p>
      <p>Das ist die Empfehlung, um Fink aus den Quellen zu aktualisieren.</p>
      <p><b>Beachte:</b>  rsync aktualisiert nur die aktiven <a href="conf.php?phpLang=de#optional">Bäume</a> (d.h. ist unstable in <code>fink.conf</code> nicht eingeschaltet, wird die Liste der unstable Pakete nicht aktualisiert.</p>
    
    <h2><a name="selfupdate-git">6.20 selfupdate-git</a></h2>
      
      <p>Mit diesem Kommando verwendet <code>fink selfupdate</code> Git, um die Paketliste zu aktualisieren.</p>
      <p>Von der Aktualisierung mit Git wird abgeraten. Ausnahmen sind Entwickler und Situationen, in denen eine Firewall den Zugriff mit rsync verhindert.</p>
    
    <h2><a name="index">6.21 index</a></h2>
      
      <p>
      Erneuert den Paket-Zwischenspeicher (Cache). Sie brauchen diesen Befehl normalerweise nicht ausführen, da <code>fink</code> automatisch kontrolliert, wann es aktualisert werden muss.
</p>
    
    <h2><a name="validate">6.22 validate</a></h2>
      
      <p>
      Dieser Befehl führt verschiedene Kontrollen über die <code>.info</code>- und <code>.deb</code>-Dateien durch. Paket-Maintainer sollten ihre Paketbeschreibungen und die korrespondierenden Pakete vor dem Hochladen damit überprüfen.
</p>
	  <p>Die folgenden Optionen können verwendet werden:</p>
      <pre>-h,--help            - Zeigt die verfügbaren optionen.
-p,--prefix          - Simuliert einen alternativen Basispfad für Fink mit dem Prefix (%p) innerhalb der Dateien, die validiert werden.
--pedantic, --no-pedantic
                     - Verhindere die Ausgabe pedantischer Formatwarnungen.
                      --pedantic ist die Voreinstellung.</pre>
      <p>
   Aliases: <b>check</b>
</p>
    
    <h2><a name="scanpackages">6.23 scanpackages</a></h2>
      
      <p>Aktualisiere die <code>apt-get</code> Datenbank der debs Dateien. Dies schliesst die normalerweise die Aktualisierung aller Bäume ein, kann aber auf einen oder mehrere Bäume beschränkt, die als Argument übergeben werden.</p>
    
    <h2><a name="cleanup">6.24 cleanup</a></h2>
      
      <p>
   Entfernt veraltete und temporäre Dateien und kann damit erheblichen Plattenplatz frei geben. Es können mehrere Modi angegeben werden:</p>
      <pre>--debs               - Lösche .deb Dateien (übersetzte binäre Paketarchive),
                       wenn sie weder in einer Paketbeschreibungsdatei (.info) im derzeit aktiven Baum vorkommen noch installiert sind.
--sources,--srcs     - Lösche Quelldateien (tarballs, etc.), die von keiner Paketbeschreibungsdatei (.info) im derzeit aktiven Baum benutzt werden.
--buildlocks, --bl   - Lösche alte buildlock Pakete.
--dpkg-status        - Lösche Einträge für Pakete, die nicht aus den dpkg Datenbank "status" installiert sind.
--obsolete-packages  - Versuche alle installierten, aber obsoleten Pakete zu deinstallieren. (neu in fink-0.26.0)
--all                - Alle obigen Modi. (neu in fink-0.26.0)</pre>
      <p>Ohne Angabe eines Modus ist <code>--debs --sources</code> die Voreinstellung. </p>
      <p>Zusätzlich können folgende Modi benutzt werden:</p>
      <pre>-k,--keep-src        - Verschiebe alte Quelldateien nach /sw/src/old/ anstatt sie zu löschen.
-d,--dry-run         - Gib die namen der Dateien aus, die gelöscht werden würden, aber lösche sie nicht.
-h,--help            - Zeige die verfügbaren Modi und Optionen.</pre>
    
    <h2><a name="dumpinfo">6.25 dumpinfo</a></h2>
      
      <p>
    Nur in <code>fink</code> Versionen neuer als 0.21.0 verfügbar
      </p>
      <p>
      Zeigt wie <code>fink</code> die Teile einer <code>.info</code>-Datei analysiert. Verschiedene Felder und Prozentangaben werden gemäß der folgenden <b>Optionen</b> angezeigt:    </p>
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
    
    <h2><a name="show-deps">6.26 show-deps</a></h2>
      
      <p>Nur in fink-0.23-6 und neuer verfügbar.</p>
      <p>Gib für eine Liste von Paketen eine für Menschen lesbare Liste der compile-time (build) Abhängigkeiten und der run-time (installation) Abhängigkeiten aus.</p>
    
  
<?php include_once "../../footer.inc"; ?>


