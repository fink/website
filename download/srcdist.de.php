<?
$title = "Quelltext Version Download";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2014/07/31 12:31:49 $';

include "header.inc";
?>

<h1>Download der Quelltext-Version von Fink</h1>

<!--monipol: As instructions for 10.6 were 'hidden' below 10.5, I've copied and
pasted them here with the title 10.6. -->

<h2>OS X 10.4 und später:</h2>

<p>Der Source-Tarball enthält den <em>Fink</em>-Paketmanager. Mit dessen Hilfe 
können Sie nach der Installation Paketbeschreibungen und Patches beziehen.
Diese werden verwendet, um Software aus den Projekt-Repositories oder den 
Mirrors des Fink-Projekts herunterzuladen und auf Ihrem Computer zu erstellen 
und zu installieren.</p>

<!--akh: edit web/fink_version.inc to update the information hencefort -->

<p>
<em>Fink <? print $fink_version; ?></em> wurde am  
<? print $release_date; ?> offiziell veröffentlicht.</p>

<ul>
  <li>
Nehmen sie für OS X 10.7-10.9 
<a href="http://downloads.sourceforge.net/fink/fink-<? print $fink_tool_version; ?>.tar.gz"
onClick="pageTracker._trackPageview('/downloads/FinkSOURCE');"> fink-<? print $fink_tool_version; ?></a>
- <? print $fink_tool_tarball_k; ?>, .tar.gz Format
  </li>
  <li>
Nehmen sie für OS X 10.6 
<a href="http://downloads.sourceforge.net/fink/fink-0.36.5.tar.gz"
onClick="pageTracker._trackPageview('/downloads/FinkSOURCE');"> fink-0.36.5</a>
- 1176K, .tar.gz Format
     </li>
     <li>
Nehmen sie für OS X 10.5 
<a href="http://downloads.sourceforge.net/fink/fink-0.34.10.tar.gz"
onClick="pageTracker._trackPageview('/downloads/FinkSOURCE');"> fink-0.34.10</a>
- 1268K, .tar.gz Format
     </li>
     <li>
Nehmen sie für OS X 10.4 
<a href="http://downloads.sourceforge.net/fink/fink-0.30.2.tar.gz"
onClick="pageTracker._trackPageview('/downloads/FinkSOURCE');"> fink-0.30.2</a>
- 1188K, .tar.gz Format
     </li>
</ul>

<p>Sie müssen auch für ihr System die entsprechenden Command-Line-Tools für 
Xcode installieren, (siehe: 
<a href="./index.de.php#additionaldownloads">Schnellanleitung</a>),  
das wie folgt gemacht werden kann:</p>
<ul>
<li><p><em>nur 10.9:  </em>Führen sie <code>xcode-select --install</code> im 
Terminal aus und wählen sie den Install-Knopf aus.</p></li>
<li><p><em>10.9-10.7:  </em>Manueller Download von developer.apple.com.  Achten 
sie auf die richtige Version für ihre Version von Mac OS X.</p></li>
<li><p><em>10.9-10.7:  </em>Installieren sie das komplette Xcode. Man kann die 
Command-Line-Tools über den <em>Downloads</em>-Reiter in den 
<strong>Voreinstellungen</strong> von Xcode installieren.</p></li>
<li><p><em>10.6-:  </em>Installieren sie das komplette Xcode.</p></li>
</ul>
<p>Installieren sie das komplette Xcode auf 10.7-10.9, sollten sie folgende 
Befehle ausführen:</p>
<pre>xcode-select -switch /path/to/Xcode.app/Contents/Developer</pre>
<p>wobei sie <em>/path/to</em> mit dem tatsächlichen Pfad zur Xcode-App 
ersetzen müssen.</p>
<p>Sie müssen auch <pre>sudo xcodebuild -license</pre> ausführen, um die 
Lizenzbedingungen für Xcode zu akzeptieren. Nur so funktioniert der Nutzer 
'build', der von Fink eingerichtet und verwendet wird.</p> 
<p></p>
<p>Packen sie nun das Archiv <? print $fink_tool_version; ?>.tar.gz aus, falls 
es nicht automatisch erfolgte, mit anderen Worten, führen sie folgende Befehle 
in einem Terminalfenster aus (Ab hier wird angenommen, dass der Download in 
das übliche Verzeichnis erfolgte. Wenn nicht, müssen sie die Befehle 
entsprechend anpassen.):</p>

<pre>cd $HOME/Downloads</pre>
<p>gefolgt von</p>
<pre>tar -xvf <? print $fink_tool_version; ?>.tar.gz</pre>
<p>or</p>
<pre>tar -xvf <? print $fink_tool_version; ?>.tar</pre>
<p>wobei die Wahl davon abhängt, ob das Archiv zum Beispiel von Safari bereits 
teilweise oder ganz ausgepackt wurde.</p>

<p>Führen sie dann folgende Befehle:</p>

<pre>cd fink-<? print $fink_tool_version; ?></pre>
<pre>./bootstrap</pre>
<p>im Terminal aus, um das das Fink-Basissystem zu installieren. Wollen sie ein 
anderes Verzeichnis als die Voreinstellung <em>/sw</em>verwenden, geht das mit</p>
<pre>./bootstrap /path</pre>
<p>(Ersetzen sie <em>/path</em> mit dem Verzeichnis ihrer Wahl).</p>
<p>Führen sie nach dem Abschluss der Installation folgendes Kommando aus:</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>Dies setzt die Umgebung (environment) für Fink (unter der Annahme, dass Fink 
in /sw installiert ist).  Öffnet man ein neues Terminalfenster, benutzt die 
Sitzung die neuen Einstellungen der Umgebung. Sind <em>fink</em> und die anderen 
Basis-Pakete installiert, laden folgende Kommandos Paketbeschreibungen und 
Patches herunter:</p>

<pre>fink selfupdate-rsync</pre>
<pre>fink index -f</pre>
<p>oder</p>
<pre>fink selfupdate-cvs</pre>
<pre>fink index -f</pre>

<p><code>rsync</code> ist für die meisten die bessere Wahl als <code>cvs</code>.</p>


<p>In obiger Datei finden Sie umfangreiche Anleitungen zur Installation und Nutzung.
Bitte lesen Sie sie - Fink ist keine ein-Klick-und-fertig-Geschichte.
Die Dokumente README, INSTALL und USAGE stehen sowohl als reine Textdokumente 
(zum Lesen in der Kommandozeile) als auch in Form von HTML (zum Lesen im Browser 
und zum Ausdrucken) zur Verfügung. Die Dokumente finden sie auch online im 
<a href="../doc/index.php">Bereich Dokumentation</a>.
</p>

<p>
Um über neue Versionen informiert zu werden, abonnieren Sie die<a
href="../lists/fink-announce.php">fink-announce Mailingliste</a>.
</p>

<h2>OS X 10.5 point release:</h2>

<p>The source point release contains the <em>fink</em> package manager plus package
descriptions and patches.  It will download the source code from the original
distribution sites and build them on your local machine.
</p>

<p>Fink <? print $fink_version; ?> was officially released on
<? print $release_date; ?>.</p>

<ul><li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full.tar.gz" onClick="pageTracker._trackPageview('/downloads/FinkFullSOURCE');">Fink
<? print $fink_version; ?></a> - 3521K, .tar.gz format</li>
</ul>

<p>You will also need to install the Xcode Tools (c.f. <a href="./index.en.php#additionaldownloads">the Quick Start page</a>).</p>

<p>Unpack the tar.gz archive if this hasn't been done automatically, e.g.
via</p>

<pre>tar -xvzf fink-<? print $fink_version; ?>-full.tar.gz</pre>

<p>or</p>

<pre>tar -xvf fink-<? print $fink_version; ?>-full.tar</pre>

<p>if it has already been partially unpacked, in a terminal window.  Then, in a
terminal window, change to the resulting <em>fink-<? print $fink_version;
?></em> directory, and use</p>

<pre>./bootstrap</pre>

<p>to start the boostrapping operation, which will install the Fink base
setup.  If you would like to use a different location than the default 
<em>/sw</em>, you can do this via</p>
<pre>./bootstrap /path</pre>
<p>(replace <em>/path</em> with the directory you want to use).</p>
<!-- akh: I got a note from Trevor Harmon that the 0.28.0 bootstrap automagically runs pathsetup.sh
     rangerrick: but that is not true!  ;) -->

<p>After the installation is completed, running the command</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>will set up your environment for Fink (assuming you have installed Fink
under /sw).  If you open a new terminal window, the session will use these
environment settings.  Once you have installed <em>fink</em> and the other base
packages, the command sequence:</p>

<pre>fink selfupdate</pre>

<p>using any either the <em>rsync</em> or <em>cvs</em> options,
followed by</p>

<pre>fink index -f</pre>

<p>followed by</p>

<pre>fink selfupdate-rsync</pre>

<p>or</p>

<pre>fink selfupdate-cvs</pre>

<p>will download the package description files and patches, provided that you
<strong>do not</strong> select the "point release" method initially.  <em>rsync</em> is generally
preferable to <em>cvs</em> for most people.</p>

<p>Installation and usage instructions are inside the distribution tarball.
Please read them - Fink is not a one-click-and-done thing.  The documents
README, INSTALL and USAGE are provided as pure text (for reading from the
command line) and as HTML (for reading in a browser and for printing).  They
are also available online in the <a href="../doc/index.php">documentation
section</a>.
</p>

<p>To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>

<?
include "footer.inc";
?>
