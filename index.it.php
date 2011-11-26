<?
$title = "Home";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2011/11/26 17:53:53 $';
$is_home = 1;

$metatags = '<meta name="descrizione" content="Fink, una distribuzione di software Unix per Mac OS X e Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribuzione, Fink">
';

include dirname(__FILE__) . "/header.inc";
?>


<p>
Il progetto Fink vuole portare il mondo del software Unix
<a href="http://www.opensource.org/">Open Source</a> su
<a href="http://www.opensource.apple.com/">Darwin</a> e
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Noi modifichiamo software Unix in modo che si compili e che funzioni su Mac OS X
(questa procedura è chiamata "port")e lo rendiamo disponibile per aggiornamenti.
Fink usa gli strumenti <a href="http://www.debian.org/">Debian</a> come dpkg
e apt-get per avere una potente gestione dei pacchetti binari.
Potete usare lo strumento che preferite per scaricare i pacchetti precompilati o il codice sorgente da compilare. <a href="about.php">Più informazioni...</a>
</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>Notizie</h1>

<?
// Include news items
include dirname(__FILE__) . "/news/news.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=it">Vecchie notizie...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-unstable" title="Fink Package Updates (Unstable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Recent Package Updates</h1>

<?  include "package-updates.inc" ?>

<a href="package-updates.php">more...</a>

<h1>Stato</h1>
<? 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink currently supports OS X 10.7 (Lion), 10.6 (SnowLeopard), and 10.5 
(Leopard), and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="srcdist.php">source
release page</a>.
</p><p>
XCode must be installed before Fink.  For best results, 10.6 users are
encouraged to avoid upgrading XCode beyond version 3.2.6.   On the other
hand, 10.7 users must update XCode to version 4.1 or later (via the free download
from the AppStore).  Note that if you installed an earlier version of XCode
prior to updating, you need to <b>uninstall</b> the old version first, by
running <i>/Develper/Library/uninstall-devtools</i> .  You can determine
your current version of XCode by running <i>xcodebuild -version</i> .
</p>
<p>
<strong>10.5 Support:</strong> 
Users are encouraged to update to OS 10.5.2 or later, via Software Update, in order to get bugfixes and enhancements for X11.  Further updates continue to be made available on the <a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">XQuartz Update Page.</a>
(We are not currently supporting Xquartz on 10.6 or 10.7.)
      </p>

<h1>Risorse</h1>

<p>
Se sei in cerca di supporto, guarda <a
href="help/index.php">pagine di aiuto</a>.
Questa pagina comprende anche opzioni per aiutare il progetto e inviare un commento. 
</p>

<p>
Il progetto Fink è ospitato da
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
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">guarda
online</a>, <a href="doc/cvsaccess/index.php">istruzioni di accesso</a>)</li>
</ul>
<p>
Per favore ricorda che per usufruire di queste risorse (es., segnalare un bug o richiedere un nuovo pacchetto Fink),
dovrai essere registrato con un SourceForge account.  Se non ne hai uno, puoi iscriverti gratuitamente
su <a href="http://sourceforge.net/">SourceForge web site</a>.
</p>
<!-- start translation -->
<p>Additional resources hosted outside SourceForge include:</p>
<ul>
<li><a href="http://wiki.finkproject.org/">The Fink developer wiki</a> (now at a new location).</li>
</ul>
<!-- end translation -->

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include dirname(__FILE__) . "/footer.inc";
?>
