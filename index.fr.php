<?
$title = "Accueil";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2006/07/22 20:15:15 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, une distribution de logiciels Unix pour Mac OS X et Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, logiciel, distribution, Fink">
';

include dirname(__FILE__) . "/header.inc";
?>

<p>Le projet Fink a pour but d'ouvrir toutes grandes les portes du monde des logiciels <a href="http://www.opensource.org/">Open Source</a> Unix à <a href="http://www.opensource.apple.com/">Darwin</a> et à
<a href="http://www.apple.com/macosx/">Mac OS X</a>. Nous modifions les logiciels Unix pour qu'ils compilent et tournent sur Mac OS X (nous les "portons") et en faisons une distribution cohérente téléchargeable. Fink utilise des outils de gestion de paquets binaires <a href="http://www.debian.org/">Debian</a>, tels dpkg et apt-get. Vous avez le choix entre le téléchargement des paquets binaires précompilés ou la construction des paquets à partir des sources. <a href="about.php">Voir la suite...</a></p>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">
<h1><a href="http://feeds.feedburner.com/FinkProjectNews-fr" title="Abonnez-vous aux Nouvelles du Projet Fink" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"/></a>
&nbsp;Dernières nouvelles</h1>

<?
// Include news items
include dirname(__FILE__) . "/news/news.fr.inc";
?>
<div align="right"><a href="news/index.php?phpLang=fr">Nouvelles archivées...</a></div>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
<h1>Statut</h1>
<? 
include dirname(__FILE__) . "/fink_version.inc";
?>
<p>La version <? print $fink_version ?> de Fink est disponible depuis le <? print convert_date_to_locale($release_date) ?>. Cette version comprend le source et les paquets binaires, ainsi que des installeur binaires pour PowerPC et Intel, l'ensemble est conçu pour tourner sur Mac OS X 10.4. Les versions 0.7.2 (pour Mac OS X 10.3), 0.6.4 (pour Mac OS X 10.2) et 0.4.1 (pour Mac OS X 10.1) restent disponibles pour les utilisateurs de ces systèmes.</p>
<h1>Ressources</h1>
<p>Si vous avez besoin d'aide, allez sur la <a href="help/index.php">page d'aide</a>. Cette page vous présente aussi divers moyens d'apporter votre soutien au projet et d'envoyer un retour d'informations.</p>
<p> L'accès aux fichiers sources correspondant aux paquets binaires distribués par le projet Fink est expliqué sur <a href="download/sources_for_binaries.php">cette page</a>.</p>
<p>Le projet Fink est hébergé par <a href="http://sourceforge.net/">SourceForge</a>. Outre l'hébergement du site et des fichiers de téléchargement, SourceForge fournit au projet les ressources suivantes :</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">Page de sommaire du projet SourceForge</a></li>
<li><a href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Soumission ou affichage de bogues</a></li>
<li><a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Demande d'intégration d'un nouveau paquet dans Fink</a></li>
<li><a href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Demande d'intégration d'une nouvelle fonctionnalité dans le programme fink</a></li>
<li><a href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Soumission d'un nouveau paquet Fink (pour les développeurs occasionnels)</a></li>
<li><a href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Soumission d'une rustine pour le programme fink</a></li>
<li><a href="lists/index.php">Listes de diffusion</a></li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">navigation en ligne</a>, <a href="doc/cvsaccess/index.php">instructions d'accès</a>)</li>
</ul>
<p>Veuillez noter que pour utiliser certaines de ces ressources (par exemple, envoyer un rapport de bogue ou demander l'intégration d'un nouveau paquet dans Fink), vous devez vous connecter à votre compte SourceForge. Si vous n'en avez pas, vous pouvez en obtenir un gratuitement sur le <a href="http://sourceforge.net/">site web de SourceForge</a>.</p>
<p>Autres ressources non hébergées sur SourceForge :</p>
<ul>
<li><a href="http://wiki.finkproject.org/">Le wiki du développeur Fink</a> (location nouveau).<li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include dirname(__FILE__) . "/footer.inc";
?>
