<?
$title = "Download Overview";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2004/11/07 14:20:46 $';

include "header.inc";
?>

<h1>Download Overview</h1>

<p>
Ci sono vari modi per ottenere Fink.
Questa pagina proverà ad esporvi le varie opzioni e le loro
- spesso confuse - differenze.
Ma prima, due importanti concetti da fissare:
</p>

<p>
<b>Codice contro Paccehtti binari.</b>
Un pacchetto può essere di due tipi: codice e binario.
Un pacchetto binario è un pacchetto contenente programmi precompilati.
Potete usarlo immediatamente, ha solo bisogno di essere scaricato ed estratto
(installato).
Un codice pacchetto contiene il codice sorgente del programma, specifiche
patches di Fink e istruzioni per la compilazione.
I codici pacchetto richiedono del tempo per l'installazione perchè il codice sorgente
compilato sul vostro computer per produrre programmi eseguibili necessita di molto lavoro (automatico).
</p>

<p>
<b>Tutte le installazioni Fink sono create in ugual modo.</b>
Non importa il modo in cui avete installato Fink, avrete sempre la possibilità di scegliere di compilare
un pacchetto specifico da codice.
Nello stesso modo, avrete sempre la possibilità di scegliere di compilare pacchetti binari scaricati
<u>come se Fink fosse installato all'interno di esso <tt>/sw</tt></u>.
Tutto quello che dovete fare è usare gli strumenti adatti e le procedure di aggiornare.
</p>

<p>
Ora, quali sono le opzioni disponibili?
</p>

<p>
La <a href="bindist.php">release binaria</a> usa pacchetti binari precompilati.
Viene fornita con un installer grafico per la prima installazione
e un selettore pacchetti per la loro gestione (dselect).
Esso traccia le ultime novità riguardanti il codice; a volte ha bisogno di qualche giorno per
conoscere la data di rilascio dell'ultima versione del codice.
Occasionalmente, ci sono degli aggiornamenti fra una release e l'altra.
L'aggiornamento a nuove release è automatico - basta usare dselect o apt-get per
per aggiornare.
La nota negativa dei pacchetti binari è che non tutti i pacchetti sono disponibili
sotto forma di pacchetti binari.
Alcuni non arrivano al uno standard di qualità o hanno problemi tecnici, altri
non possono essere distribuiti a causa delle licenze, e altri sono
coperti da esportazione usando la crittografia.
</p>

<p>
Il <a href="srcdist.php">rilascio di codice sorgente</a> contiene
il codice ed è compilato da script a linea di comando.
Il codice sorgente può essere aggiornato all'ultima versione con il comando
'fink selfupdate'.
La nota positiva è che avrai a disposizione TUTTI i pacchetti testati
e segnati come "stable".
La nota negativa, come già accennato prima, riguarda il tempo
di compilazione e la necessità di lavorare in linea di comando.
</p>

<p>
Lo sviluppo attuale di distribuzioni Fink avviene attraverso il repertorio CVS.
Avete la possibilità di tracciare lo sviluppo fra una release e l'altra.
L'uso è equivalente a quello del codice sorgente, solo che dovrete ottenere le descrizioni
pacchetti attraverso alti modi.
(Attenzione: 'fink selfupdate' non esegue questo compito.)
Consultate <a href="../doc/cvsaccess/index.php">istruzioni CVS</a> per
maggiori dettagli.
</p>


<?
include "footer.inc";
?>
