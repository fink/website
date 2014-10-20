<?
$title = "Benutzerhandbuch - fink-Tool";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2014/10/20 11:41:47';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="prev" href="conf.php?phpLang=de" title="Die Fink-Konfigurationsdatei">';


include_once "header.de.inc";
?>
<h1>Benutzerhandbuch - 6. Das fink-Tool über die Kommandozeile benutzen</h1>
    
    
    <h2><a name="using">6.1 Das fink-Tool benutzen</a></h2>
      
      <p>Das <code>fink</code>-Tool nutzt verschiedene Befehle als Suffix, um auf Pakete der Source-Distribution angewandt zu werden. Einige benötigen mindestens ein Paketname, aber können auch mit mehrere Paketnamen auf einmal umgehen. Sie können einfach den Paketnamen (z.B. gimp), einen vollständigen, zugelassenen Namen mit der Version (z.B. gimp-1.2.1) oder einen Namen mit Version und Revision (z.B. gimp-1.2.1-3) angeben. Fink wird automatisch die aktuellste, verfügbare Version und Revision aussuchen, falls sie jeweils nicht angegeben sind. Andere haben verschiedene Optionen.</p>
      <p>Es folgt eine Auflistung der Befehl für das <code>fink</code>-Tool:</p>
    
    
    <h2><a name="options">6.2 Global options</a></h2>
      
      <p>
There are some options, which apply to all fink commands. If you 
type <code>fink --help</code> you get the list of options: 
      </p>
      <p>(as of <code>fink-0.26.0</code>)</p>
      <p><b>-h, --help</b> - displays help text.
</p>
      <p><b>-q, --quiet</b>  - causes <code>fink</code> to be less verbose, opposite of <b>--verbose</b>.  Overrides the <a href="conf.php?phpLang=de#optional">Verbose</a> flag in <code>fink.conf</code>.
</p>
      <p><b>-V, --version</b> - display version information.
</p>
      <p><b>-v, --verbose</b> - causes  <code>fink</code> to be more verbose, opposite of <b>--quiet</b>.  Overrides the <a href="conf.php?phpLang=de#optional">Verbose</a> field in <code>fink.conf.</code>
</p>
      <p><b>-y, --yes</b> - assume default answer for all interactive 
                        questions.
</p>
      <p><b>-K, --keep-root-dir</b>   - Causes <code>fink</code> not to delete the
                        <code>root-[name]-[version]-[revision]</code>
		        directory in the <a href="conf.php?phpLang=de#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=de#developer">KeepRootDir</a> field in <code>fink.conf</code>.
</p>
      <p><b>-k, --keep-build-dir</b>  - Causes <code>fink</code> not to delete the
                        <code>[name]-[version]-[revision]</code>
                        directory in the <a href="conf.php?phpLang=de#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=de#developer">KeepBuildDir</a> field in <code>fink.conf</code>.</p>
      <p><b>-b, --use-binary-dist</b> - download pre-compiled packages from the binary 
                        distribution if available (e.g. to reduce compile
		        time or disk usage).
		        Note that this mode instructs fink to download the
                        version it wants if that version is available for
		        download; it does not cause fink to choose a version
    		        based on its binary availability.  Corresponds to the <a href="conf.php?phpLang=de#downloading">UseBinaryDist</a> flag in <code>fink.conf</code>.
</p>
      <p><b>--no-use-binary-dist</b>  - Don't use pre-compiled binary packages from the binary 
		        distribution, opposite of the --use-binary-dist flag. 
                        This is the default unless overridden by setting <code>UseBinaryDist: true </code>in 
                        the <code>fink.conf</code> configuration file. 
</p>
      <p><b>--build-as-nobody</b>     - Drop to a non-root user when performing the unpack,
                        patch, compile, and install phases. Note that packages
                        built with this option may be non-functional. You
                        should use this mode for package development and 
                        debugging only.
</p>
      <p><b>-m, --maintainer</b>
            - (<code>fink-0.25</code> and later) Perform actions useful to package maintainers: run validation on
           the <code>.info</code> file before building and on the <code>.deb</code> after building a
           package; turn certain build-time warnings into fatal errors; (<code>fink-0.26</code> and later) run the test suites as specified in the  field.  This sets <b>--tests</b> and <b>--validate</b> to <code>on</code>.</p>
      <p><b>--tests[=on|off|warn]</b>         - (<code>fink-0.26.0</code> and later) Causes <code>InfoTest</code> fields to be activated and test suites specified
           via <code>TestScript</code> to be executed (see the <a href="../packaging/reference.php#fields">Fink Packaging Manual</a>).  If no argument is given to this
           option or if the argument is <code>on</code> then failures in test suites will
           be considered fatal errors during builds.  If the argument is <code>warn</code>
           then failures will be treated as warnings.</p>
      <p><b>--validate[=on|off|warn]</b> -
           Causes packages to be validated during a build.  If no argument is
           given to this option or if the argument is <code>on</code> then validation failures will be considered fatal errors during builds.  If the argument is <code>warn</code> then failures will be treated as warnings.</p>
      <p><b>-l, --log-output</b>
            - Save a copy of the terminal output during each package building
           process. By default, the file is stored in
           <code>/tmp/fink-build-log_[name]-[version]-[revision]_[date]-[time]</code> but
           one can use the <b>--logfile</b> flag to specify an alternate filename.</p>
      <p><b>--no-log-output</b>
            - Don't save a copy of the output during package-building, opposite
           of the <b>--log-output</b> flag. This is the default.</p>
      <p><b>--logfile=filename</b>
            - Save package build logs to the file <code>filename</code> instead of the default
           file (see the <b>--log-output</b> flag, which is implicitly set by the
           <b>--logfile</b> flag). You can use percent-expansion codes to include
           specific package information automatically. A complete list of percent-expanions is available in the <a href="../packaging">Fink Packaging Manual</a>; some common percent-expansions are:</p>
      <ul>
        <li>                 <b>%n</b>    - package name
                 </li>
        <li><b>%v</b>    - package version
                 </li>
        <li><b>%r</b>    - package revision</li>
      </ul>
      <p><b>-t, --trees=expr</b>
           - Consider only packages in trees matching <b>expr</b>.

           The format of expr is a comma-delimited list of tree specifica-
           tions. Trees listed in <code>fink.conf</code> are compared against <b>expr</b>.  Only
           those which match at least one tree specification are considered by
           <code>fink</code>, in the order of the first specifications which they match. If
           no <b>--trees</b> option is used, all trees listed in <code>fink.conf</code> are
           included in order.

           A tree specification may contain a slash (/) character, in which
           case it requires an exact match with a tree. Otherwise, it matches
           against the first path-element of a tree. For example,
           <b>--trees=unstable/main</b> would match only the <b>unstable/main</b> tree,
           while <b>--trees=unstable</b> would match both unstable/main and
           <b>unstable/crypto</b>.

           There exist magic tree specifications which can be included in
           <b>expr</b>:</p>
      <ul>
        <li><b>status</b>
                       - Includes packages in the dpkg status database.

                 </li>
        <li><b>virtual</b>
                       - Includes virtual packages which reflect the capabili-
                       ties of the system.
</li>
      </ul>
      <p>Exclusion of (or failure to include) these magic trees is currently
           only supported for operations which do not install or remove packages.</p>
      <p><b>-T, --exclude-trees=expr</b>
           Consider only packages in trees not matching expr.

           The syntax of expr is the same as for <b>--trees</b>, including the magic
           tree specifications. However, matching trees are here excluded
           rather than included. Note that trees matching both <b>--trees</b> and
           <b>--exclude-trees</b> are excluded.
</p>
      <p> Examples of <b>--trees</b> and --exclude-trees:

                 </p>
      <ul>
        <li><code>fink --trees=stable,virtual,status install <b>foo</b></code> 
                       <p>Install <b>foo</b> as if <code>fink</code> was using the stable tree, even
                       if unstable is enabled in <code>fink.conf</code>.
</p></li>
        <li><code>fink --exclude-trees=local install <b>foo</b></code> 
                       <p>Install the version of <b>foo</b> in Fink, not the locally
                       modified version.

</p></li>
        <li><code>fink --trees=local/main list -i</code>
                       <p>List the locally modified packages which are installed.</p></li>
      </ul>
      <p>Most of these options are self-explanatory. Many can also be set in the 
<a href="conf.php?phpLang=de">Fink configuration file</a> (<code>fink.conf</code>) if you want 
to set them permanently and not just for that invocation of <code>fink</code>.</p>
    
    
    <h2><a name="install">6.3 install</a></h2>
      
      <p>Der <b>install</b>-Befehl wird verwendet, um Pakete zu installieren. Es lädt, konfiguriert, erstellt und installiert die Pakete, die Sie angeben. Es installiert auch vorausgesetzte Pakete automatisch, fragt Sie aber davor nach einer Bestätigung. Beispiel:</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      
      <p>Use of the <a href="#options">--use-binary-dist</a> option with <code>fink install</code> can speed the build process for complicated packages by quite a lot.</p>
      
      <p>Aliases für den Befehl install: <b>update, enable, activate, use</b> (die meisten aus historischen Gründen).</p>
    
    <h2><a name="remove">6.4 remove</a></h2>
      
      <p>Der remove-Befehl entfernt Pakete von Ihrem System, wenn Sie '<code>dpkg --remove</code>' aufrufen. Die aktuelle Implementation hat einige Schwachstellen: es überprüft nicht die Abhängigkeiten selbst, sondern überlässt dies dem dpkg-Tool (allerdings sollte das kein Problem darstellen).</p>
      <p>Der <b>remove</b>-Befehl entfernt nur die eigentlichen Dateien, lässt aber die  <code>.deb</code>-Datei der komprimierten Pakete unberührt. Das bedeutet, dass Sie die Pakete später wieder installieren können, ohne diese neu kompilieren zu müssen. Wenn Sie den Plattenplatz benötigen, können Sie die <code>.deb</code>-Datei vom <code>/sw/fink/dists</code>-Baum löschen.</p>
      
      <p>These flags can be used with the <b>fink remove</b> command
</p>
      <pre>-h,--help             - Show the options which are available.
-r,--recursive        - Also remove packages that depend on the package(s) to
                        be removed (i.e. overcome the above-mentioned flaw).</pre>
      
      <p>Aliases: <b>disable, deactivate, unuse, delete</b>.</p>
    

    <h2><a name="purge">6.5 purge</a></h2>
      
      <p>The <b>purge</b> command purges packages from the system. This is
the same as the <b>remove</b> command except that it removes configuration
files as well.</p>
      <p>This command takes the:</p>
      <pre>-h,--help
-r,--recursive</pre>
      <p>options.</p>
    
    <h2><a name="update-all">6.6 update-all</a></h2>
      
      <p>This command updates all installed packages to the latest version. It
does not need a package list, so you just type:</p>
      <pre>fink update-all</pre>
      <p><a href="#options">--use-binary-dist</a> is also useful with this command.</p>
    

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
      
      <p>List the (optional) plugins available to the <code>fink</code> program.  Currently lists the notification mechanisms and the source-tarball
           checksum algorithms.</p>
    
	
    <h2><a name="fetch">6.11 fetch</a></h2>
      
      <p>
Lädt die angegebenen Pakete herunter, installiert sie aber nicht. Dieser Befehl lädt die Tarball-Dateien, sogar wenn Sie zuvor heruntergeladen wurden.
</p>

      <p>The following flags can be used with the <code>fetch</code> command:</p>
      <pre>-h,--help		Show the options which are available.
-i,--ignore-restrictive	Do not fetch packages that are &amp;quot;License: Restrictive&amp;quot;.
                      	Useful for mirrors, because some restrictive packages
                      	do not allow source mirroring.
-d,--dry-run		Just display information about the file(s) that would
			be downloaded for the package(s) to be fetched; do not
			actually download anything.
-r,--recursive		Also fetch packages that are dependencies of the
			package(s) to be fetched.</pre>

    
    <h2><a name="fetch-all">6.12 fetch-all</a></h2>
      
      <p>
Lädt <b>alle</b> Quelldateien herunter. Wie <a href="#fetch">fetch</a> lädt es die Tarball-Dateien auch herunter, sollten sie zuvor schon heruntergeladen worden sein.
</p>
      
      <p>These flags can be used with the <code>fink fetch-all</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
      
    
    <h2><a name="fetch-missing">6.13 fetch-missing</a></h2>
      
      <p>Lädt <b>all</b> fehlenden Quelldateien herunter. Dieser Befehl lädt nur die Dateien heruntern, die nicht auf dem Computer vorhanden sind.</p>
      
      <p>These flags can be used with the <code>fink fetch-missing</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
      
    
    <h2><a name="build">6.14 build</a></h2>
      
      <p>Erstellt ein Paket, aber installiert es nicht. Wie gewöhnlich werden die Quell-Tarballs heruntergeladen, wenn Sie nicht gefunden werden können. Das Resultat des Befehls ist ein installierbares -deb-Paket, welches Sie später schnell mit dem install-Befehl installieren können. Dieser Befehl wird nichts tun, wenn die .deb-Datei bereits existiert. Beachten Sie, dass die vorausgesetzten Pakete dennoch <b>installiert</b> und nicht nur erstellt werden.</p>
    
    <h2><a name="rebuild">6.15 rebuild</a></h2>
      
      <p>Erstellt ein Paket (wie der build-Befehl), ignoriert und überschreibt aber die vorhandene .deb-Datei. Wenn Sie ein Paket installieren, wird die neu erstellte .deb-Datei auch via <code>dpkg</code> auf Ihr System installiert. Sehr nützlich während der Paketentwicklung.</p>
      
      <p>The <a href="#options">--use-binary-dist option</a> is applicable here.</p>
      
    
    <h2><a name="reinstall">6.16 reinstall</a></h2>
      
      <p>Wie der Befehl install installiert reinstall ein Paket. Allerdings tut es dies via <code>dpkg</code>, auch wenn es schon installiert ist. Sie können diesen Befehl nutzen, wenn Sie Paketdateien aus Versehen gelöscht haben, und Sie die Standardeinstellungen zurück haben wollen.</p>
    
    <h2><a name="configure">6.17 configure</a></h2>
      
      <p>
Führt den Konfigurationsprozess nochmal aus. So können Sie Ihre Mirror-Server und Proxy-Einstellungen unter anderen ändern.</p>
	  
      <p><b>New in</b> <code>fink-0.26.0</code>: This command will also let you turn on the unstable trees if desired.</p>
      
    
    <h2><a name="selfupdate">6.18 selfupdate</a></h2>
      
      <p>
      Dieser Befehl automatisiert die Aktualisierung von Fink auf eine neues Release. Es überprüft die Fink-Webseite, um zu sehen, ob eine neue Version verfügbar ist. Wenn dies so ist, lädt es die Paketbeschreibungen und Updates der core-Pakete einschließlich von <code>fink</code> selber. Dieser Befehl kann auf reguläre Releases aktualisieren, es kann aber auch Ihren <code>/sw/fink/dists</code>-Verzeichnisbaum für direktes CVS einrichten. Das bedeutet, dass Sie dann auf die aktuellsten Versionen aller Pakete zugreifen können.</p>

      <p>If the <a href="#options">--use-binary-dist option</a> is enabled, the list of available packages in the binary distribution is also updated.</p>
    
    <h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use rsync to update its package list.</p>
      <p>This is the recommended way to update Fink when building from source.</p>
      <p><b>Note:</b>  rsync updates only update the active <a href="conf.php?phpLang=de#optional">trees</a> (e.g. if unstable isn't turned on in <code>fink.conf</code> the list of unstable packages won't be updated.</p>
    
    <h2><a name="selfupdate-cvs">6.20 selfupdate-cvs</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use CVS access to update its package list.</p>
      <p>CVS updating is deprecated, except for developers and those people who are behind firewalls that disallow rsync.</p>
    

    <h2><a name="index">6.21 index</a></h2>
      
      <p>
      Erneuert den Paket-Zwischenspeicher (Cache). Sie brauchen diesen Befehl normalerweise nicht ausführen, da <code>fink</code> automatisch kontrolliert, wann es aktualisert werden muss.
</p>
    
    <h2><a name="validate">6.22 validate</a></h2>
      
      <p>
      Dieser Befehl führt verschiedene Kontrollen über die <code>.info</code>- und <code>.deb</code>-Dateien durch. Paket-Maintainer sollten ihre Paketbeschreibungen und die korrespondierenden Pakete vor dem Hochladen damit überprüfen.
</p>

	  <p>The following optional options may be used:</p>
      <pre>-h,--help            - Show the options which are available.
-p,--prefix          - Simulate an alternate Fink basepath prefix (%p) within
                      the files being validated.
--pedantic, --no-pedantic
                     - Control the display of nitpicky formatting warnings.
                      --pedantic is the default.</pre>

      <p>
   Aliases: <b>check</b>
</p>
    
    <h2><a name="scanpackages">6.23 scanpackages</a></h2>
      
      
      <p>Updates the <code>apt-get</code> database of debs; defaults to updating all of the trees, but may be restricted to a set of one or more trees given as arguments.</p>
      
    
    <h2><a name="cleanup">6.24 cleanup</a></h2>
      
      
      <p>
   Removes obsolete and temporary files. 
   This can reclaim large amounts of disk space.  One or more modes may be specified:</p>
      <pre>--debs               - Delete .deb files (compiled binary package archives)
                       corresponding to versions of packages that are neither
                       described by a package description (.info) file in the
                       currently-active trees nor presently installed.
--sources,--srcs     - Delete sources (tarballs, etc.) that are not used by
                       any package description (.info) file in the currently-
                       active trees.
--buildlocks, --bl   - Delete stale buildlock packages.
--dpkg-status        - Remove entries for packages that are not installed from
                       the dpkg "status" database.
--obsolete-packages  - Attempt to uninstall all installed packges that are
                       obsolete. (new in fink-0.26.0)
--all                - All of the above modes. (new in fink-0.26.0)</pre>
      <p>If no mode is specified, <code>--debs --sources</code> is the default action. </p>
      <p>In addition, the following options may be used:</p>
      <pre>-k,--keep-src        - Move old source files to /sw/src/old/ instead of deleting them.
-d,--dry-run         - Print the names of the files that would be deleted, but
                       do not actually delete them.
-h,--help            - Show the modes and options which are available.</pre>
    
    
    <h2><a name="dumpinfo">6.25 dumpinfo</a></h2>
      
      <p>
    Only available in <code>fink</code> newer than version 0.21.0
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
      
      <p>Only available in fink-0.23-6 and later.</p>
      <p>Displays a human-readable list of the compile-time (build) and run-
           time (installation) dependencies of the listed package(s).</p>
    
    
  
<? include_once "../../footer.inc"; ?>


