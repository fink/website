<?php
$title = "Aggiornare il kit per OS X 10.1";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:38 $';

include "header.inc";
?>


<h1>Aggiornamento per Mac OS X 10.1</h1>

<p>
Da quando le vecchie versioni di apt non funzionano su Mac OS X 10.1, qui
di seguito trovate una procedura per aggiornare un'installazione di Fink creata dal binary installer.
</p>
<p>
Una procedura molto simile pu|žessere usata per aggiornare installazioni molto vecchie di
Fink 0.2.x (incluso MacGIMP e la prima release di OpenOSX's GIMP
CD).
L'unica richiesta x?che Fink sia installato in <tt>/sw</tt> e
non in un'altra cartella.
Leggete <a href="#oldversion">di seguito</a>.
</p>

<h2>Fink 0.3.0 e superiore</h2>

<p>
Partendo con la versione 0.3.0, Fink x?pienamente compatibile con Mac OS X 10.1.
Quindi non avrete nulla di speciale da fare.
</p>

<h2>Fink 0.2.4 a 0.2.6</h2>

<p>
Questa procedura presume che abbiate installato Fink con il
binary installer ufficiale.
Il primo installere x?basato su Fink 0.2.4.
La procedura ha tre passaggi principali:
</p>
<ol>

<li><p>Ottenere un pacchetto apt decente.
Scaricate i pacchetti
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
e
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>.
In una finestra di Terminal.app, andate nella cartella dove avete scaricato questi file ed eseguite
questi comandi:
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb</pre>
<p>
(se state usando la bash shell, source /sw/bin/init.sh in alternativa)
</p>
<p>
Una volta installato apt, usate questi comandi per aggiornare le liste pacchetti:
</p>
<pre>rehash
fink scanpackages
sudo apt-get update</pre>
</li>

<li><p>Aggiornare i base packages.
å?importante avere l'ultima versione del gestore pacchetti installata,
quella che avete attualmente potrebbe avere bisogno di un aggiornamento.
</p>
<pre>sudo apt-get install base-files gettext dpkg fink</pre>
</li>

<li><p>Aggiornare il resto del sistema.
Potete fare questo attraverso <tt>dselect</tt> (raccomandato)
<b>o</b> con il comando apt:
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>

<h2><a name="oldversion">Fink 0.2.3 e precedenti</a></h2>

<p>
Questa procedura presuppone che abbiate installato una vecchia versione di Fink
(0.2.1 in molti casi) come parte di un'altro pacchetto, come l'installer di MacGIMP
o l'installer di OpenOSX's GIMP.
La procedura ha quattro passaggi principali:
</p>
<ol>

<li><p>Ottenere un recente pacchetto apt e pacchetti fink.
Scaricate i pacchetti
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>
e
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/fink_0.10.0-1_darwin-powerpc.deb">fink-0.10.0-1</a>.
In una finestra Terminal.app, andate nella cartella dove avete scaricato i file ed eseguite questi comandi per installare i pacchetti:
</p>
<pre>sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb
sudo dpkg -i fink_0.10.0-1_darwin-powerpc.deb</pre>
<p>
Una volta che sono installati, usate questi comandi per aggiornare le liste pacchetti:
</p>
<pre>rehash
fink scanpackages
sudo apt-get update</pre>
</li>

<li><p>Aggiornare altri pacchetti base.
å?importante avere l'ultima versione del gestore pacchetti installata,
quella che avete attualmente potrebbe contenere dei bug o avere bisogno di un aggiornamento.
</p>
<pre>sudo apt-get install base-files gettext dpkg</pre>
</li>

<li><p>Rendere X11 riordinato.
Prima di procedere dovete riordinare le dipendenze di X11.
Con i pacchetti MacGIMP e OpenOSX', avrete bisogno di un'installazione "manuale" di XFree86
(dal punto di vista di Fink, cosz?xH, quindi dovreste installare il pacchetto
<code>system-xfree86</code>:
</p>
<pre>sudo apt-get install system-xfree86</pre>
<p>
Se il pacchetto XFree86 installato x?molto vecchio, dovrete prima aggiornarlo,
e poi rieseguire i comandi sopra descritti.
</p>
</li>

<li><p>Aggiornare il resto del sistema.
Potete farlo attraverso <tt>dselect</tt> (raccomandato)
<b>o</b> attraverso il comando apt-get:
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>


<?php
include "footer.inc";
?>
