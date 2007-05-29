<?
$title = "Benutzerhandbuch - fink.conf";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2007/05/29 03:58:51';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="next" href="usage.php?phpLang=de" title="Das fink-Tool über die Kommandozeile benutzen"><link rel="prev" href="upgrade.php?phpLang=de" title="Fink Aktualisieren">';


include_once "header.de.inc";
?>
<h1>Benutzerhandbuch - 5. Die Fink-Konfigurationsdatei</h1>
    
    
    
      <p>
Dieses Kapitel erklärt die möglichen Einstellung in der Fink-Konfigurationsdatei (fink.conf) und wie sie das Verhalten von Fink beeinflussen, speziell das Kommandozeilentool <code>fink</code> (d.h. das Nutzen der Source-Distribution).
</p>
    
    <h2><a name="about">5.1 Über fink.conf</a></h2>
      
      <p>
Wenn Fink zum ersten Mal installiert wird, möchte es Antworten zu Fragen bekommen, um die Konfigurationsdatei einzurichten, wie z.B. welche <a href="#mirrors">Mirrors</a> Sie zum Herunterladen von Dateien nutzen möchten oder wie Rechte eines Super-user erworben werden können. Sie können diesen Vorgang nochmals durchlaufen, indem Sie den Befehl <code>fink configure</code> aufrufen. Um einige Wahlmöglichkeiten zu erhalten, müssten Sie die Datei <b>fink.conf</b> per Hand editieren. Im allgemeinen sind diese Optionen für fortgeschrittene Benutzer gedacht.
</p>
      <p>
Die Datei <b>fink.conf</b> befindet sich hier: <code>/sw/etc/fink.conf</code>;  Sie können diese mit Ihrem Lieblingseditor bearbeiten. Sie werden allerdings die Rechte eines super-user benötigen.
</p>
    
    <h2><a name="syntax">5.2 fink.conf Syntax</a></h2>
      
      <p>
Ihre fink.conf besteht aus mehreren Zeilen, im Format:</p>
      <pre>OptionsName: Wert</pre>
      <p>Optionen sind jeweils immer eine je Zeile, und der Name der Option ist vom Wer mit einem : und einem Leerzeichen getrennt. Der Inhalt des Wertes hängt von der Option ab, aber er ist normalerweise eine Wahrheitswert (Boolean), also "True" oder "False", eine Zeichenkette (String) oder eine Liste von Wörtern voneinander durch ein Leerzeichen getrennt. Zum Beispiel:
</p>
      <pre>
BooleanOption: True
StringOption: Something
ListOption: Option1 Option2 Option3
</pre>
    
    <h2><a name="required">5.3 Erforderliche Einstellungen</a></h2>
      
      <p>
      Einige Einstellungen in der <b>fink.conf</b> sind zwingend. Ohne Sie kann Fink nicht funktionstüchtig sein. Die folgenden Einstellungen gehören in diese Kategorie.
      </p>
      <ul>
        <li>
          <p>
            <b>Basepath:</b> path</p>
          <p>
Gibt Fink an, wo es installiert wurde. Standardwert ist <b>/sw</b>, es sei denn, Sie haben den Pfad im Zuge der ersten Installation geändert. Sie sollten diesen Wert nach der Installation <b>nicht</b> mehr ändern - es würde <b>fink</b> verwirren.</p>
        </li>
      </ul>
    
    <h2><a name="optional">5.4 Optionale Nutzereinstellungen</a></h2>
      
      <p>
Es gibt verschiedene optionale Einstellungen, welche die Nutzer anpassen können, um das Verhalten von Fink zu ändern.
</p>
      <ul>
        <li>
          <p>
            <b>RootMethod:</b> su, sudo oder none</p>
          <p>Für einige Operationen benötigt Fink die Rechte eines Super-users. Anerkannte Werte sind <b>sudo</b> oder <b>su</b>. Sie können den Wert auch auf <b>none</b> setzen, dann müssen Sie Fink als Root selber starten. Der Standardwert ist <b>sudo</b>, und in den meisten Fällen braucht er nicht verändert werden.</p>
        </li>
        <li>
          <p>
            <b>Trees:</b> Liste der Bäume</p>
          <p>Verfügbare Bäume sind:</p>
          <pre>
local/main      - beliebige lokale Pakete, die Sie installieren wollen
local/bootstrap - Pakete, die während der Installation von genutzt wurden
stable/crypto   - stabile, kryptographische Pakete
stable/main     - weitere stabile Pakete
unstable/crypto - instabile, kryptographische Pakete
unstable/main   - weitere instabile Pakete
</pre>
          <p>
Sie können auch Ihre eigenen Bäume in das Verzeichnis <code>/sw/fink/dists</code> für Ihre Bedürfnisse hinzufügen, dies ist aber nicht notwendig in den meisten Situationen. Die Standardbäume sind "local/main local/bootstrap
stable/main". Diese Liste sollte mit der Datei <code>/sw/etc/apt/sources.list</code> synchronisiert sein. (Ab <code>fink</code> 0.21.0 wird das für Sie automatisch gemacht.)</p>

<p>The order of the trees is meaningful, as packages from later trees in the list may
override packages from earlier ones.</p>

        </li>
        <li>
          <p>
            <b>Distribution:</b> 10.1, 10.2, 10.2-gcc3.3, 10.3 oder 10.4</p>
          <p>Fink muss wissen, welche Version Sie von Mac OS X laufen haben. MaxcOS X 10.0 und frühere Versionen werden nicht und 10.1 und 10.2 wird nicht länger von der dieser Version von Fink unterstützt. 
          
          Mac OS X 10.2 users are restricted to fink-0.24.7, released in June 2005.
          
          Dieses Feld wird mit dem Skript <code>/sw/lib/fink/postinstall.pl</code> gesetzt. Sie sollten diesen Wert nicht manuell verändern.
</p>
        </li>
        <li>
          <p>
            <b>FetchAltDir:</b> Pfad</p>
          <p>Normalerweise wird <code>fink</code> die Quellen, die es herunterlädt, in <code>/sw/src</code> speichern. Sie können ein alternatives Verzeichnis bestimmen, in welchem nach heruntergeladenen Quelldateien gesucht wird, wenn Sie diesen Wert setzen. Zum Beispiel:
</p>
          <pre>FetchAltDir: /usr/src</pre>
        </li>
        <li>
          <p>
            <b>Verbose:</b> eine Zahl von 0 bis 3</p>
          <p>Diese Option bestimmt, wie viel Informationen Fink ausgibt, während es beschäftigt ist. Die Werte sind:
<b>0</b>
            Quiet (Leise) (zeigt keine Informationen über Downloads an)
<b>1</b>
            Low (Niedrig) (zeigt keine Informationen über das Auspacken von  Tarballs an)
<b>2</b>
            Medium (Medium) (zeigt fast alles an)
<b>3</b>
            High (Hoch) (zeigt alles an).
Der Standardwert ist 1.
</p>
        </li>
        
        <li><p><b>SkipPrompts:</b> a comma-delimited list</p><p>(<code>fink-0.25</code> and later) This option instructs <code>fink</code> to refrain from asking for input when
           the user does not want to be prompted. Each prompt belongs to a
           category. If a prompt's category is in the SkipPrompts list then
           the default option will be chosen within a very short period of
           time.</p><p>Currently, the following categories of prompts exist:</p><p><b>fetch</b> - Downloads and mirrors</p><p><b>virtualdep</b> - Choosing between alternative packages</p><p> By default, no prompts are skipped.</p></li>
        
        <li>
          <p>
            <b>NoAutoIndex:</b> boolean</p>
          <p>Fink speichert die Paketbeschreibungen in /sw/var/db/fink.db zwischen, um es von dort aus zu lesen, jedes Mal wenn es aufgerufen wird. Fink überprüft, ob der Paketindex aktualisiert werden muss, es sei denn, dieser Wert ist auf "True" gesetzt. Der Standardwert ist "False", und es wird nicht empfohlen, dass Sie ihn verändern. Falls Sie es tun, sollten Sie den Befehl <code>fink index</code> per Hand ausführen, um den Index zu aktualisieren.
</p>
        </li>
        <li>
          <p>
            <b>SelfUpdateNoCVS:</b> boolean</p>
          <p>Der Befehl <code>fink selfupdate</code> aktualisiert Finks Paketmanager auf das aktuellste Release. Diese Option stellt sicher, dass dazu nicht das Concurrent Version System (CVS) verwendet wird, wenn der Wert auf "True" gesetzt ist. Er wird automatisch durch den Befehl <code>fink
selfupdate-cvs</code> gesetzt, so dass Sie ihn nicht per Hand ändern brauchen.</p>
        </li>
        <li>
	  <p>
	    <b>Buildpath:</b> Pfad</p>
	  <p>Fink muss mehrere temporäre Verzeichnisse für jedes Paket, welches von Quellcode kompiliert wird, erstellen. Der voreingestellte Ort wäre <code>/sw/src</code> on Panther and earlier, and 
<code>/sw/src/fink.build</code> on Tiger. Wenn Sie es möchten, können Sie den Pfad hier einstellen. Für mehr Informationen über diese temporären Verzeichnisse lesen Sie die Beschreibungen über die Felder <code>KeepRootDir</code> und <code>KeepBuildDir</code> später in diesem Dokument.
	    </p>
	    
	    <p>On Tiger, it is recommended that the Buildpath end with <code>.noindex</code>
or <code>.build</code>. Otherwise, Spotlight will attempt to index the temporary files in
the Buildpath, slowing down builds.
    	</p>
    	
	</li>

        <li><p><b>Bzip2Path:</b> the path to your <code>bzip2</code> (or compatible) binary
          </p><p>(<code>fink-0.25</code> and later) The Bzip2Path option lets you override the default path for the
           <code>bzip2</code> command-line tool.  This allows you to specify an alternate
           location to your <code>bzip2</code> executable, pass optional command-line
           options, or use a drop-in replacement like <code>pbzip2</code> for decompressing
           <code>.bz2</code> archives.</p></li>

      </ul>
    
    <h2><a name="downloading">5.5 Download Einstellungen</a></h2>
      
      <p>Es gibt verschiedene Einstellungen, die die Art und Weise, wie Fink Paketdaten herunterlädt, beeinflussen.</p>
      <ul>
        <li>
          <p>
            <b>ProxyPassiveFTP:</b> boolean</p>
          <p>Diese Option veranlasst Fink, den "passiven" Modus für FTP-Downloads zu verwenden. Einige FTP-Server oder Netzwerkkonfigurationen erfordern  es, den Wert dieser Option auf "True" zu setzen. Es wird empfohlen diese Option auf "True" zu belassen, da "aktives" FTP veraltet ist.
</p>
        </li>
        <li>
          <p>
            <b>ProxyFTP:</b> url</p>
          <p>Wenn Sie einen FTP-Proxy verwenden, sollten Sie hier seine Adresse eintragen, zum Beispiel:</p>
          <pre>ProxyFTP: ftp://yourhost.com:2121/</pre>
          <p>Lassen Sie den Wert frei, wenn Sie keinen Proxy für FTP nutzen.</p>
        </li>
        <li>
          <p>
            <b>ProxyHTTP:</b> url</p>
          <p>Wenn Sie einen HTTP-Proxy verwenden, sollten Sie hier seine Adresse eintragen, zum Beispiel:</p>
          <pre>ProxyHTTP: http://yourhost.com:3128/</pre>
          <p>Lassen Sie den Wert frei, wenn Sie keinen Proxy für HTTP nutzen.</p>
        </li>
        <li>
          <p>
            <b>DownloadMethod:</b> wget, curl, axel oder axelautomirror</p>
          <p>Fink kann drei verschiedene Programme nutzen, um Dateien vom Internet herunterzuladen: <b>wget</b>, <b>curl</b> oder <b>axel</b>. Der Wert <b>axelautomirror</b> führt zur Verwendung eines experimentellen Modus des Programms <b>axel</b>, so dass der Server, der sich am nähesten befindet und eine bestimmte Datei hat, bestimmt wird. Das Verwendung weder von <b>axel</b> noch von <b>axelautomirror</b> ist zu diesem Zeitpunkt empfohlen. Der Standardwert ist <b>curl</b>. <b>Das Programm, welches Sie als DownloadMethod angeben, MUSS installiert sein.</b>
          
          (i.e. <code>fink</code> won't fall back to <b>curl</b> if you try to use a download application that isn't present.
          
          </p>
        </li>

        <li>
          <p>
            <b>SelfUpdateMethod:</b> point, rsync or cvs</p>
          <p>
<code>fink</code> can use some different methods to update the package info files.
<b>rsync</b> is the recommended setting; it uses rsync to download only
modified files in the <a href="#optional">trees</a> that you have enabled. Note that if you have
changed or added to files in the <code>stable</code> or <code>unstable</code> trees, using rsync will
delete them. Make a backup first, e.g. in your <code>local</code> tree. <b>cvs</b> will download using anonymous or
:ext: cvs access from the Fink repository. This has the disadvantage that cvs
can not switch mirrors; if the server is unavailable you will not be able to
update. <b>point</b> will download only the latest released version of the
packages. It is not recommended as your packages may be quite out of date.
          </p>
        </li>
        <li><p><b>SelfUpdateCVSTrees:</b> list of trees
           </p><p>(<code>fink-0.25</code> and later) By default, the <b>cvs</b> selfupdate method will update only the current
           distribution's tree.  This option overrides the list of distribu-
           tion versions that will be updated during a selfupdate.

           Please note that you will need a recent "cvs" binary installed if
           you wish to include directories that do not have CVS/ directories
           in their entire path (e.g., dists/local/main or similar).</p></li>
        <li>
          <p>
            <b>UseBinaryDist:</b> boolean</p>
          <p>
Causes <code>fink</code> to try to download pre-compiled binary packages from the binary
distribution if available and if the binary package is not already on the
system. This can save a lot of installation time and it is therefore 
recommended to set this option. Passing fink the 
<a href="usage.php?phpLang=de">--use-binary-dist</a> option (or the <code>-b</code> flag) has the same effect,  
but only operates on that single <code>fink</code> invocation.  Passing <code>fink</code> the
           <code>--no-use-binary-dist</code> flag overrides this, and compiles from source
           for that single <code>fink</code> invocation.
<b>Only available as of  fink version 0.23.0</b>.
          </p><p>Note that this mode instructs <code>fink</code> to download an available binary  
           if that version is the latest available version of the package; it does <b>not</b> cause <code>fink</code>
           to choose a version based on its binary availability.
</p>
        </li>

      </ul>
    
    <h2><a name="mirrors">5.6 Mirror Einstellungen</a></h2>
      
      <p>Software aus Internet herunterladen kann eine ermüdende Beschäftigung sein und oft sind Downloads nicht so schnell, wie man es sich wünschen würde. Mirror-Server (engl.: mirror = Spiegel) bieten Kopien von Dateien an, die auf zwar anderen Servern auch verfügbar sind, aber somit geographisch näher und somit schneller bei Ihnen sind. Außerdem reduzieren sie die Belastung auf primären Servern, z.B. <b>ftp.gnu.org</b>, und bieten eine Alternative, solle eine Server einmal nicht erreichbar sein.
      </p>
      <p>Um Fink den besten Mirror für Sie auswählen zu lassen, müssen Sie angeben, auf welchem Kontinent und in welchem Land Sie sich befinden. Falls ein Download von einem Server scheitert, werden Sie gefragt, ob Sie es von dem selben Server nochmals, von einem anderen Mirror im selben Land oder Kontinent oder einen anderen Mirror irgendwo auf der Welt versuchen möchten.</p>
      <p>Die Datei <b>fink.conf</b> beinhaltet die Einstellungen über die Mirror-Server, die Sie verwenden möchten.</p>
      <ul>
        <li>
          <p>
            <b>MirrorContinent:</b> Code aus drei Buchstaben</p>
          <p>Sie sollten diesen Wert mit dem Befehl <code>fink configure</code> ändern. Der dreibuchstabige Code kann in der Datei <code>/sw/lib/fink/mirror/_keys</code> gefunden werden. Wenn Sie zum Beispiel in Europa leben:</p>
          <pre>MirrorContinent: eur</pre>
        </li>
        <li>
          <p>
            <b>MirrorCountry:</b> Code aus sechs Buchstaben</p>
          <p>Sie sollten diesen Wert mit dem Befehl <code>fink configure</code> ändern. Der sechsbuchstabige Code kann in der Datei <code>/sw/lib/fink/mirror/_keys</code> gefunden werden. Wenn Sie zum Beispiel in Österreich leben:</p>
          <pre>MirrorCountry: eur-AT</pre>
        </li>
        <li>
          <p>
            <b>MirrorOrder:</b> MasterFirst, MasterLast, MasterNever oder ClosestFirst</p>
          <p>
          Fink unterstützt 'Master'-Mirrors, die gespiegelte Behälter von Quelldateien aller Fink-Pakete darstellen. Der Vorteil eines Master-Mirrors ist, dass die angeforderten URLs immer aufgelöst werden können. Sie können die Mirror-Server, die vom Fink-Team unterhalten werden, die originalen Quell-URLs oder externe Mirror-Server von Projekten wie Gnome, KDE oder Debian nutzen. Außerdem können Sie kombinierte Zusammenstellungen auswählen, welche dann nach Nähe geordnet durchsucht werden, wie oben beschrieben. Wenn Sie MasterFirst oder MasterLast angeben, können Sie als Nutzer später "skip ahead" wählen, und somit zum Master (oder nicht-Master)-Satz springen, falls der Download scheitert. Die Optionen sind:
</p>
          <pre>
MasterFirst - Durchsucht "Master"-Mirrors zuerst.
MasterLast - Durchsucht "Master"-Mirrors zuletzt.
MasterNever - Nutzt nie "Master"-Mirrors.
ClosestFirst - Durchsucht den nächsten Mirror zuerst (kombiniert alle Mirrors in einen Satz).
</pre>
        </li>
        
        <li><p><b>Mirror-rsync:</b>
           </p><p>(<code>fink-0.25.2</code> and later) When doing <code>fink selfupdate</code> with the <b>SelfupdateMethod</b> set to <code>rsync</code>,
           this is the rsync url to sync from.  This should be an anonymous
           rsync url, pointing to a directory which contains all the fink Dis-
           trubutions and Trees.
</p></li>
		
      </ul>
    
    <h2><a name="developer">5.7 Entwicklereinstellungen</a></h2>
      
      <p>Einige Optionen in der <b>fink.conf</b> sind nur für Entwickler nützlich. Wir empfehlen nicht, dass konventionelle Fink-Nutzer diese ändern. Die folgenden Optionen gehören in diese Kategorie.</p>
      <ul>
        <li>
          <p>
            <b>KeepRootDir:</b> boolean</p>
          <p>Veranlasst Fink ein temporäres Verzeichnis <code>root-[name]-[version]-[revision]</code> nach dem Erstellen des Paketes nicht zu löschen. Standardwert ist "False". <b>Seien Sie Vorsichtig, diese Option kann Ihre Festplatte sehr schnell füllen!</b> Wenn Sie <code>fink</code> den Parameter <b>-K</b> übergeben, hat es die selben Auswirkungen - allerdings nur für diesen <code>fink</code>-Aufruf.
          </p>
        </li>
        <li>
          <p>
            <b>KeepBuildDir:</b> boolean</p>
         <p>Veranlasst Fink ein temporäres Verzeichnis <code>[name]-[version]-[revision]</code> nach dem Erstellen des Paketes nicht zu löschen. Standardwert ist "False". <b>Seien Sie Vorsichtig, diese Option kann Ihre Festplatte sehr schnell füllen!</b> Wenn Sie <code>fink</code> den Parameter <b>-k</b> übergeben, hat es die selben Auswirkungen - allerdings nur für diesen <code>fink</code>-Aufruf.</p>
        </li>
      </ul>
    
    <h2><a name="advanced">5.8 Erweiterte Einstellungen</a></h2>
      
      <p>Es gibt einige andere Optionen, welche nützlich sein können, allerdings auch einiges Wissen voraussetzen.</p>
      <ul>
        <li>
          <p>
            <b>MatchPackageRegEx:</b> </p>
          <p>Veranlasst Fink dazu, nicht zu fragen, welches Paket es installieren soll, falls eins (und nur eins) mit dem folgenden Perlschen Regulären Ausdruck übereinstimmt. Beispiel</p>
          <pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>
          <p>stimmt mit Paketen, die auf '-ssl' enden oder exakt 'xfree86' oder 'xfree86-shlibs' heißen, überein.
          </p>
        </li>
        <li>
          <p>
            <b>CCacheDir:</b> path</p>
          <p>
          Falls das Fink-Paket <code>ccache-default</code> installiert ist, werden die Cache-Dateien, die beim Erstellen von Fink-Paketen anfallen, hier zwischengespeichert. Standardwert ist <code>/sw/var/ccache</code>. Wenn es auf <code>none</code> gesetzt ist, wird Fink nicht die Umgebungsvariable CCACHE_DIR setzen und ccache wird <code>$HOME/.ccache</code> nutzen - wobei Dateien womöglich mit Root als Eigentümer in Ihr Home-Verzeichis abgelegt werden.
          <b>Only available in fink newer than version 0.21.0</b>.</p>
        </li>
        
        <li><p><b>NotifyPlugin:</b> plugin</p><p>
           Specify a notification plugin to tell you when packages have been
           installed/uninstalled.  Defaults to Growl (requires <code>Mac::Growl</code> to
           operate).  Other plugins can be found in the
           <code>/sw/lib/perl5/Fink/Notify</code> directory.  On <code>fink-0.25</code> and later they are listed in the output of <code>fink plugins</code>.  See the <a href="http://wiki.finkproject.org/index.php/Fink:Notificati%20on_Plugins">Fink Developer Wiki</a> for more information.
</p></li>
        <li><p><b>AutoScanpackages:</b> boolean
           </p><p>When <code>fink</code> builds new packages, <code>apt-get</code> does not immediately know about
           them.  Historically, the command <code>fink scanpackages</code> had to be run
           for <code>apt-get</code> to notice the new packages, but now this happens auto
           matically. If this option is present and <b>false</b>, then <code>fink
           scanpackages</code> will no longer be run automatically after packages are
           built.  Defaults to <b>true</b>.
</p></li>
        <li><p><b>ScanRestrictivePackages:</b> boolean
           </p><p>When scanning the packages for <code>apt-get</code>, <code>fink</code> normally scans all
           packages in the current trees. However, if the resuting apt repository will be made publically available, the administrator may be
           legally obligated not to include packages with <code>Restrictive</code> or
           <code>Commercial</code> licenses. If this option is present and <b>false</b>, then Fink
           will omit those packages when scanning.</p></li>
		
      </ul>
    
    <h2><a name="sourceslist">5.9 Verwaltung von apts sources.list</a></h2>
      
      <p>Ab Version 0.21.0 kann Fink die Datei <code>/sw/etc/apt/sources.list</code> verwalten, die von apt genutzt wird, um Binärdateien für die Installation aufzufinden. Die Datei sources.list sieht normalerweise in etwa so aus, je nach Distribution und Bäume:</p>
<pre># Local modifications should either go above this line, or at the end.
#
# Default APT sources configuration for Fink, written by the fink program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in 
# /sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding Packages.gz files
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main crypto

# Put local modifications to this file below this line, or at the top.
</pre>
<p>Mit dieser Standarddatei schaut apt-get zuerst in Ihre lokale Installation nach bereits kompilierten Binärdateien und erst danach in die offizielle Binary-Distribution. Sie können dies ändern, in dem Sie Einträge an den Anfang der Datei (was dann zuerst durchsucht wird) oder an das Ende der Datei (was dann zuletzt durchsucht wird) setzen.</p>
<p>Wenn Sie Ihre Trees-Zeile oder die Distribution, die Sie verwenden, verändern, wird Fink automatisch den "Standard"-Anteil der Datei auf die korrespondierenden, neuen Werte setzen. Fink wird allerdings jegliche lokale Änderungen beibehalten, die Sie an der Datei vorgenommen haben, vorausgesetzt, dass Sie Ihre Änderungen an den Anfang der Datei (über der ersten Standardzeile) oder an das Ende der Datei (unter der letzten Standardzeile) setzen.
</p><p>
Anmerkung:  Wenn Sie die Datei <code>/sw/etc/apt/sources.list</code> vor dem Update auf Fink 0.21.0 geändert haben, werden Sie Ihre vorherige Datei hier gespeichert finden: <code>/sw/etc/apt/sources.list.finkbak</code>.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=de">6. Das fink-Tool über die Kommandozeile benutzen</a></p>
<? include_once "../../footer.inc"; ?>


