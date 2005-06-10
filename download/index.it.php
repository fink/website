<?
$title = "Download Quick Start";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2005/06/10 01:44:27 $';

include "header.inc";
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
<? 
include "../fink_version.inc";
?>

<ol>
<li><p>
Download dell' installer disk image:<br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Installer.dmg?download">Fink
<? print $fink_version; ?> Binary Installer</a> - <? print $dmg_size; ?><br>
(10.3 users - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.7.2-Installer.dmg?download">Fink
0.7.2</a>)<br>
(10.2 users - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.4-Installer.dmg?download">Fink
0.6.4</a>)<br>
(10.1 users - use <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink
0.4.1</a>)
</p>
</li>
<li><p>
Doppio-click "Fink-<? print $fink_version; ?>-Installer.dmg" per montare il disco immagine,
quindi doppio-click sul pacchetto "Fink <? print $fink_version; ?> Installer.pkg" situato all'interno. Seguire le istruzione date a monitor.
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
</p>
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
<li>Per installarli da binari, selezionate il pacchetto, e usate Binary->Install.</p></li>
<li>Per installare da codice, selezionate il pacchetto, e usate Source->Install</li>
</ul>
</li>
<li>
<p>Usare apt-get. Apt-get scaricherà ed installerà i pacchetti per voi, risparmiando il tempo di compilazione.  Potete anche usare il metodo binary di Fink Commander (descritto sopra) se non avete i Developer Tools installati.</p>
<p>Per aggiornare <code>fink</code> aprite una finestra di Terminal.app e scrivete <code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>Una volta aggiornato <code>fink</code>, potete installare gli altri pacchetti, usando la stessa sintassi, e.g <code>sudo apt-get install gimp</code> per installare Gimp.  Notate, comunque, che non tutti i pacchetti di fink sono disponibili in forma binaria.</p>
</li>
<li>
<p>Installare da codice. Per aggiornare <code>fink</code> effettuate <code>fink selfupdate</code>.  Una volta lanciato lanciato, selezionare l'opzione (1), "rsync".  Questo aggiornerà automaticamente il pacchetto <code>fink</code>.</p>
<p>Una volta che <code>fink</code> è aggiornato, potete usare "<code>fink install</code>" per scaricare e compilare il codice sorgente.  Per esempio, per installare Gimp, effettuate <code>fink install gimp</code>.</p> 
</li> 
</ul>

</li> 
</ol>

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
href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">qui</a>.
</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
