<?
$title = "Home";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2004/11/07 14:35:26 $';
$is_home = 1;

$metatags = '<meta name="descrizione" content="Fink, una distribuzione di software Unix per Mac OS X e Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribuzione, Fink">
';

include "header.inc";
?>


<p>
Il progetto Fink vuole portare il mondo del software Unix
<a href="http://www.opensource.org/">Open Source</a> su
<a href="http://www.opensource.apple.com/">Darwin</a> e
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Noi modifichiamo software Unix in modo che si compili e che funzioni su Mac OS X
(questa procedura x?chiamata "port")e lo rendiamo disponibile per aggiornamenti.
Fink usa gli strumenti <a href="http://www.debian.org/">Debian</a> come dpkg
e apt-get per avere una potente gestione dei pacchetti binari.
You can choose whether you want to download precompiled binary
packages or build everything from source.
<a href="about.php">Pi?informazioni...</a>
</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>Notizie</h1>

<?
// Include news items
include $fsroot."news/news.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php">Vecchie notizie...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>Stata</h1>
<? 
include "fink_version.inc";
?>

<p>
Fink 0.6.3 (per OS X 10.2) e Fink <? print $fink_version ?> sono stati rilasciati il
<? print $release_date ?>.  
Questi rilasci comprendono codice e pacchetti binari cosz?come installatori precompilati. 
</p>

<h1>Risorse</h1>

<p>
Se sei in cerca di supporto, guarda <a
href="help/index.php">pagine di aiuto</a>.
Questa pagina comprende anche opzioni per aiutare il progetto e inviare un commento. 
</p>

<p>
Il progetto Fink x?ospitato da
<a href="http://sourceforge.net/">SourceForge</a>.
Oltre che ad ospitare il sito e i downloads, SourceForge
mette a disposizione le seguenti risorse per il progetto:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">SourceForge sommario del progetto</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Repertorio dei bug</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Richiesta di pacchetti che non sono presenti in Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Richiesta di caratteristiche non presenti fink (il programma)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Invio di un nuovo pacchetto Fink (sviluppatori non-core)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Invio di patch per Fink (il programma)</a></li>
<li><a href="lists/index.php">Mailing lists</a></li>
<li>CVS (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink">guarda
online</a>, <a href="doc/cvsaccess/index.php">istruzioni di accesso</a>)</li>
</ul>
<p>
Per favore ricorda che per usufruire di queste risorse (es., segnalare un bug o richiedere un nuovo pacchetto Fink),
dovrai essere registrato con un SourceForge account.  Se non ne hai uno, puoi iscriverti gratuitamente
su <a href="http://sourceforge.net/">SourceForge web site</a>.
</p>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
