<?
$title = "Passare al metodo Rsync Upgrade";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2004/11/07 14:20:46 $';

include "header.inc";
?>

<h1>Passare al metodo Rsync Upgrade</h1>

<p>
L'aggiornamento del gestore pacchetti attraverso rsync, è
un'alternativa all'aggiornamento attraverso il metodo CVS.  Se avete problemi con CVS,
infatti, 
non vi sarà possibile aggiornarlo con il metodo CVS!
</p><p>
Se avete problemi di aggiornamento, dovreste come prima cosa ottenere i
tarball per fink (versioen 0.14.0 o successiva) da
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">il 
SourceForge File List page per Fink</a>.
Usare <code> tar xfz </code> per decomprimere, quindi <code>cd</code>
nella directory creata, eseguire il comando
<code>./inject.pl</code>
</p>
<p>Così facendo dovreste aver installato l'ultima versione.  Dopo questo passaggio,
eseguite il comando <code>fink selfupdate-rsync</code> che passerà automaticamente al nuovo metodo.
 Fatto questo, potrete aggiornare il tutto usando il semplice comando <code>fink selfupdate</code>
</p>


<?
include "footer.inc";
?>
