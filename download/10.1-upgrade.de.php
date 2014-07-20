<?
$title = "Anleitung zur Aktualisierung der Binärversion unter Mac OS X 10.1";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2014/07/20 00:04:08 $';

include "header.inc";
?>


<h1>Anleitung zur Aktualisierung der Binärversion unter Mac OS X 10.1</h1>

<p>
Ausgehend von der offiziellen Binärversion von Fink, Versionsnummer 0.3.x
oder höher verfahren Sie wie folgt, um Fink zu aktualisieren:
</p>
<p>Es sind mehrere Schritte:
</p>
<ol>

<li><p>Besorgen Sie sich das aktuelle apt-Paket.
Laden sie das
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
und das
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>
Paket herunter.
Öffnen Sie ein Terminal-Fenster, gehen Sie in das Verzeichnis, in dem die
heruntergeladenen Dateien liegen, und führen Sie folgende Befehle aus:
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb</pre>
<p>
(Sollten Sie bash als Shell nutzen, ersetzen Sie den ersten Befehl durch
source /sw/bin/init.sh)
</p>
</li>
<li><p>
Nachdem apt installiert ist, führen Sie folgende Befehle aus, um ein apt
und Ihre installierten Pakete zu aktualisieren:
</p>
<pre>sudo apt-get update
sudo apt-get dist-upgrade
sudo apt-get update
sudo apt-get install storable-pm</pre>
</li>

<li><p>Abschließend aktualisieren Sie die Paket-Beschreibungen mit
folgenden Befehlen:
</p>
<pre>sudo touch /sw/fink/stamp-rel-0.3.0
fink selfupdate</pre>
</li>

</ol>



<?
include "footer.inc";
?>
