<?
$title = "Accueil";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2004/06/24 07:00:25 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, une distribution de logiciels Unix pour Mac OS X et Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, logiciel, distribution, Fink">
';

include "header.inc";
?>


<p>
Le projet Fink a pour but d'ouvrir toutes grandes les portes du monde des logiciels 
<a href="http://www.opensource.org/">Open Source</a> Unix à
<a href="http://www.opensource.apple.com/">Darwin</a> et à
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Nous modifions les logiciels Unix pour qu'ils compilent et tournent sur Mac OS X (nous les "portons") et en faisons une distribution cohérente téléchargeable.
Fink utilise des outils de gestion de paquets binaires <a href="http://www.debian.org/">Debian</a>, tels dpkg et apt-get.
Vous avez le choix entre le téléchargement des paquets binaires précompilés ou la construction des paquets à partir des sources.
<a href="about.php">Voir la suite...</a>
</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>Dernières nouvelles</h1>

<?
// Include news items
include $fsroot."news/news.fr.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php">Nouvelles archivées...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>Statut</h1>
<? 
include "fink_version.inc";
?>

<p>
Fink 0.6.3 (pour OS X 10.2) et Fink <? print $fink_version ?> ont été publiées le <? print convert_date_to_locale($release_date) ?>.  
Ces versions comprennent le source et les paquets binaires, ainsi que les installeurs binaires.
</p>

<h1>Ressources</h1>

<p>
Si vous avez besoin d'aide, allez sur la <a
href="help/index.php">page d'aide</a>.
Cette page vous présente aussi divers moyens d'apporter votre soutien au projet et d'envoyer un retour d'informations.
</p>

<p>
Le projet Fink est hébergé par <a href="http://sourceforge.net/">SourceForge</a>.
Outre l'hébergement du site et des fichiers de téléchargement, SourceForge fournit au projet les ressources suivantes :
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">Page de sommaire du projet SourceForge</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Soumission ou affichage de bogues</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Demande d'intégration d'un nouveau paquet dans Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Demande d'intégration d'une nouvelle fonctionnalité dans le programme fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Soumission d'un nouveau paquet Fink (pour les développeurs occasionnels)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Soumission d'une rustine pour le programme fink</a></li>
<li><a href="lists/index.php">Listes de diffusion</a></li>
<li>CVS (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink">navigation en ligne</a>, <a href="doc/cvsaccess/index.php">instructions d'accès</a>)</li>
</ul>
<p>
Veuillez noter que pour utiliser certaines de ces ressources (par exemple, envoyer un rapport de bogue ou demander l'intégration d'un nouveau paquet dans Fink), vous devez vous connecter à votre compte SourceForge. Si vous n'en avez pas, vous pouvez en obtenir un gratuitement sur le <a href="http://sourceforge.net/">site web de SourceForge</a>.
</p>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
