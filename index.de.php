<?
$title = "Home";
$cvs_author = '$Author: dmalloc $';
$cvs_date = '$Date: 2004/03/03 12:37:33 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, eine Distribution von Unix Software für den Mac OS X und Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include "header.inc";
?>

<p>
Das Fink Projekt hat es sich zur Aufgabe gemacht die Welt der Unix 
<a href="http://www.opensource.org/">Open Source</a> Software auf
<a href="http://www.opensource.apple.com/">Darwin</a> und
<a href="http://www.apple.com/macosx/">Mac OS X</a> zur Verfügung zu stellen.
Durch Anpassung der original Unix Software, so daß dieses auf Mac OS X ausführbar. Diese portierte Software wird als eine in sich geschlossene Distribution zur Verfügung gestellt.
Fink nutzt so bewährte <a href="http://www.debian.org/">Debian</a> wie dpkg und apt-get um ein professionelles Paket-Management zu gewährleisten. 
Es ist dem Nutzer überlassen ob die Pakete in Ihrer binären Form installiert werden oder selber kompiliert. 
<a href="about.php">Mehr zum Thema...</a>
</p>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>News</h1>

<?
// Include news items
include $fsroot."news/news.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php">Older News...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>Status</h1>
<? 
include "fink_version.inc";
?>

<p>
Fink <? print $fink_version ?> wurde am <? print $release_date ?> veröffentlicht.  
Diese Version beinhaltet source und binäre Pakete, sowie ein Installationsprogramm. 
Diese Version wurde auf OS X 10.2 mit dem gcc 3.3 compiler gebaut, und sollte auf OS X 10.3 lauffähig sein.
</p>

<h1>Ressourcen</h1>

<p>
Sie brauchen <a
href="help/index.php">Hilfe?</a>.
Diese Seiten erklären wie Sie Hilfe bekommen aber auch helfen können.
</p>

<p>
Das Fink Projekt wird unterstützt von 
<a href="http://sourceforge.net/">SourceForge</a>.
Zusätzlich dazu wird von SourceForge noch eine Reihe anderer Dienste zur Verfügung gestellt.
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">SourceForge Projekt Übersicht</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Bugs anschauen oder mitteilen.</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Bitte ein Paket zu portieren</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Bitte um ein Feature welches noch nicht vorhanden ist</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Ein neues Fink Paket abgeben</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">einen Patch für fink (das Programm) abgeben</a></li>
<li><a href="lists/index.php">Mailing Listen</a></li>
<li>CVS (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink">online lesen
</a>, <a href="doc/cvsaccess/index.php">Zugangsdaten</a>)</li>
</ul>
<p>
Bitte seien Sie sich im Klaren darüber, daß manche Feature, wie zum Beispiel das mitteilen eines Bugs oder die Bitte um ein neues Feature, es notwendig machen eine funktionierende SourceForge Mitgliedschaft zu haben. Sollten Sie noch keinen Login besitzen so können Sie sich einen Zugang, kostenlos, bei <a href="http://sourceforge.net/">SourceForge</a> holen.
</p>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
