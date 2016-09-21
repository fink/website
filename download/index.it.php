<?php
$title = "Download Quick Start";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2016/09/21 15:16:02 $';

include_once "header.inc";
include_once "../fink_version.inc";
?>

<h1>Fink Downloads</h1>
<p>
Esistono vari metodi per installare o aggiornare Fink.
Per i nuovi utenti, sono raccomandate le istruzioni di avvio rapido.
Comunque, date uno sguardo alla <a href="overview.php">panoramica</a> ed all'
<a href="upgrade.php">aggiornamento matrice</a>.
</p>

<h2>Avvio Rapido</h2>
<p>
Nuovo a Fink?  Queste istruzioni di avvio rapido sono presenti allo scopo di rendervi
l'avvio rapido con le binary release.
</p>

<ol>
<li>
<p>
10.6, 10.7, 10.8, 10.9, 10.10, 10.11, and 10.12 users:  There is not currently a binary installer, and you will need to follow the <A href="srcdist.php">source install</A> instructions instead.<br>

10.5 users: Download dell' installer disk image:<br>
<?php analytics_download_link("http://prdownloads.sourceforge.net/fink/Fink-" . $fink_version . "-PowerPC-Installer.dmg?download", "Fink " . $fink_version . " Binary Installer (PowerPC)", "/downloads/FinkPPC")   ?> - <?php echo $dmg_size ?><br>
<?php analytics_download_link("http://prdownloads.sourceforge.net/fink/Fink-" . $fink_version . "-Intel-Installer.dmg?download",   "Fink " . $fink_version . " Binary Installer (Intel)",   "/downloads/FinkINTEL") ?> - <?php echo $intel_dmg_size ?><br>
(10.4 users - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.8.1-PowerPC-Installer.dmg?download">Fink
0.8.1 (PowerPC)</a> or <a href="http://prdownloads.sourceforge.net/fink/Fink-0.8.1-Intel-Installer.dmg?download">Fink
0.8.1 (Intel)</a>)<br>
(10.3 users - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.7.2-Installer.dmg?download">Fink
0.7.2</a>)<br>
(10.2 users - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.4-Installer.dmg?download">Fink
0.6.4</a>)<br>
(10.1 users - use <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink
0.4.1</a>)
</p>
</li>
<li><p>
Doppio-click "Fink-<?php print $fink_version; ?>-Installer.dmg" per montare il disco immagine,
quindi doppio-click sul pacchetto "Fink <?php print $fink_version; ?> Installer.pkg" situato all'interno. Seguire le istruzione date a monitor.
</p></li>
<li><p>
Alla fine dell'installazione, verrà lanciata l'utility pathsetup.
Vi verranno chiesti i permessi di root prima che la vostra configurazione di shell venga modificata. Quando l'utility avrà completato l'operazione, avrete completato il processo.
</p></li>
<li><p>
Se qualcosa andasse storto durante questo processo, potete riprovare lanciando l'applicazione 
pathsetup posizionata nel disco di installazione, o lanciando il comando (nella finestra di Terminal.app) 
</p><pre>/sw/bin/pathsetup.sh</pre><p>
(Questo passaggio dovrebbe essere effettuato da tutti gli utenti del computer: 
ogn utente deve effettuare questo comando per usare Fink.)
</p><p>
Se pathsetup genera degli errori, consultate la documentazione, 
particolarmente la sezione 
<a href="../doc/users-guide/install.php#setup">
2.3 "Impostare l'Environment"</a> della Guida Utente.</p>
</li>
<li><p>
Aprite una nuova finestra Terminal.app ed eseguite il seguente comando: "<code>fink scanpackages; fink index</code>", o usate l'applicazione inclusa Fink Commander GUI (che deve essere posizionata in una directory reale del vostro computer, non su un disco immagine) ed eseguite i seguenti comandi dal suo menu:  <em>Source->scanpackages</em> seguito da <em>Source->Tools->index</em>.
</p></li>
<li><p>Una volta che questi due comandi sono terminati dovrete aggiornare il <code>fink</code> package, nel caso in cui ci siano stati grossi cambiamenti rispetto all'ultima release.  Dopo aver fatto questo potrete procedere all'installazione di altri paccchetti.  Esistono vari metodi:
<ul>
<li>
<p>Usare Fink Commander per selezionare ed installare pacchetti. Fink Commander è un semplice GUI per Fink. E' un metodo raccomandato ai neofiti, o agli utenti che non sono a loro agio con la linea di comando.  Fink Commander ha i menu Binary e Source. Dovrete installare dai Binary se i Developer Tools non sono installati, o non volete compilare i programmi voi stessi.</p>
<ul><li><p>La sequenza per aggiornare <code>fink</code> usando Fink Commander dai binari:</p>
<ol>
<li>Binary->Update descriptions</li>
<li>Selezionare il pacchetto <code>fink</code>.</li>
<li>Binary->Install</li>
</ol></li>
<li><p>La sequenza raccomandata attraverso Fink Commander per aggiornare <code>fink</code>è la seguente:</p>
<ol>
<li>Source->Selfupdate</li> 
<li>Tools->Interact with Fink...
<li>Siate sicuri che "Accept default response" sia selezionato, e cliccate "Submit".</li>
<li><code>fink</code> e altri pacchetti base saranno compilati automaticamente</li>
</ol></li></ul>
<p>Ora che avete aggiornato <code>fink</code>, potete installare gli altri pacchetti.</p>  
<ul>
<li>Per installarli da binari, selezionate il pacchetto, e usate Binary->Install.</li>
<li>Per installare da codice, selezionate il pacchetto, e usate Source->Install</li>
</ul>
</li>
<li>
<p>Usare apt-get. Apt-get scaricherà ed installerà i pacchetti per voi, risparmiando il tempo di compilazione.  Potete anche usare il metodo binary di Fink Commander (descritto sopra) se non avete i Developer Tools installati.</p>
<p>Per aggiornare <code>fink</code> aprite una finestra di Terminal.app e scrivete <code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>Una volta aggiornato <code>fink</code>, potete installare gli altri pacchetti, usando la stessa sintassi, e.g <code>sudo apt-get install gimp</code> per installare Gimp.  Notate, comunque, che non tutti i pacchetti di fink sono disponibili in forma binaria.</p>
</li>
<li>
<p>Installare da codice. Per aggiornare <code>fink</code> effettuate <code>fink selfupdate</code> (<!--start translation -->requires the XCode Tools [Developer Tools on 10.2] to be installed<!-- end translation -->).
.  Una volta lanciato lanciato, selezionare l'opzione (1), "rsync".  Questo aggiornerà automaticamente il pacchetto <code>fink</code>.</p>
<p>Una volta che <code>fink</code> è aggiornato, potete usare "<code>fink install</code>" per scaricare e compilare il codice sorgente.  Per esempio, per installare Gimp, effettuate <code>fink install gimp</code>.</p> 
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
Per altre informazioni, visitate le <a
href="../faq/index.php">Frequently Asked Questions</a> e la <a
href="../doc/index.php">documentazione</a>.
Se le vostre domande non trovano risposta in queste pagine, controllate <a
href="../help/index.php"> la pagina di aiuto</a>.
</p>
<p>
Per essere informati di nuovi aggiornamenti, sottoscrivetevi alla <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>

<p>
Il codice sorgente per i pacchetti presenti nell'installer disk image può essere scaricato da
<a
href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<?php print $fink_version; ?>/main/source/base/">qui</a>.
</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?php
include "footer.inc";
?>
