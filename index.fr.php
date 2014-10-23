<?php
$title = "Accueil";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:09:50 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, une distribution de logiciels Unix pour Mac OS X et Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, logiciel, distribution, Fink">
';

require dirname(__FILE__) . "/header.inc";
?>


<p>
Le projet Fink a pour but d'ouvrir toutes grandes les portes du monde des logiciels
<a href="http://www.opensource.org/">Open Source</a> Unix à
<a href="http://www.opensource.apple.com/">Darwin</a> et à
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Nous modifions les logiciels Unix pour qu'ils compilent et tournent sur Mac OS X
(nous les "portons") et en faisons une distribution cohérente
téléchargeable.
Fink utilise des outils de gestion de paquets binaires
<a href="http://www.debian.org/">Debian</a>, tels dpkg et apt-get.
Vous avez le choix entre le téléchargement des paquets binaires
précompilés ou la construction des paquets à partir des sources.
<a href="about.php">Voir la suite...</a>
</p>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-fr" title="Abonnez-vous aux Nouvelles du Projet Fink" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Dernières nouvelles</h1>
<?php
// Include news items
require dirname(__FILE__) . "/news/news.fr.inc";
?>
<div align="right"><a href="news/index.php?phpLang=fr">Nouvelles archivées...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Fink Package Updates (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Recent Package Updates</h1>

<?php include "package-updates.inc" ?>

<a href="package-updates.php">more...</a>
</tr><tr valign="top"><td width="50%">
<h1>Statut</h1>
<?php 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink currently supports OS X 10.9 (Mavericks), 10.8 (Mountain Lion), 10.7 (Lion), and 10.6 (Snow Leopard),
and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="download/srcdist.php">source
release page</a>.
</p>
<p>Xcode must be installed before Fink.</p>  
<p>
<strong>10.9 Support:</strong> 
10.9 users must install Xcode version 5.0.1 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 5.0 for Mavericks (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.4 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.8 Support:</strong> 
10.8 users must install Xcode version 4.4 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 4.4 for Mountain Lion (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences). Note that if you had an 
earlier version of Xcode than 4.3 installed prior to updating from 10.7, you need 
to <b>uninstall</b> the old version first by running 
<i>/Developer/Library/uninstall-devtools</i>. 
You can determine your current version of Xcode by running 
<i>xcodebuild -version</i> .</p>
<p>If you need X11 you should install Xquartz-2.7.2 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.7 Support:</strong> 
10.7 users must install or update Xcode to version 4.1 or later 
(via a free download from the AppStore), (version 4.6.3 is recommended) or must at least
install the Command Line Tools for 
Xcode 4.3 or later (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences (4.3 or later).  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall an outdated one, if needed.</p>
<p>We don't support Xquartz on 10.7, so don't remove Apple's official X11.</p>
<p>
<strong>10.6 Support:</strong>
For best results, 10.6 users are
encouraged to upgrade Xcode to version 3.2.6, or to version 4.2.1 if you
paid for a 4.x Developer preview.  Version 4.0.2 is known to have some
bugs in its linker that prevent certain packages from building.  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall it, if needed.</p>
<p>We don't support Xquartz on 10.6, so don't remove Apple's official X11.</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
<h1>Ressources</h1>

<p>
Si vous avez besoin d'aide, allez sur la <a
href="help/index.php">page d'aide</a>.
Cette page vous présente aussi divers moyens d'apporter votre soutien au projet et
d'envoyer un retour d'informations.
</p>
<p>
L'accès aux fichiers sources correspondant aux paquets
binaires distribués par le projet Fink est expliqué sur
<a href="download/sources_for_binaries.php">cette page
</a>.
</p>
<p>
Le projet Fink est hébergé par
<a href="http://sourceforge.net/">SourceForge</a>.
Outre l'hébergement du site et des fichiers de téléchargement,
SourceForge fournit au projet les ressources suivantes:
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
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">navigation
en ligne</a>, <a href="doc/cvsaccess/index.php">instructions d'accès</a>)</li>
</ul>
<p>
Veuillez noter que pour utiliser certaines de ces ressources (par exemple, envoyer un rapport de bogue ou demander l'intégration d'un nouveau paquet dans Fink),
vous devez vous connecter à votre compte SourceForge. Si vous n'en avez pas, vous pouvez en obtenir un gratuitement
sur le <a href="http://sourceforge.net/">site web de SourceForge</a>.
</p>
<p>Autres ressources non hébergées sur SourceForge:</p>
<ul>
    <li><a href="http://wiki.finkproject.org/">Le wiki du développeur Fink</a> (location nouveau).</li>
    <li>
        <a href="https://github.com/fink/fink">
            New github repository for the source code of the <code>fink</code> package manager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            New github repository for the <code>fink-mirrors</code> package.
        </a>
    </li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?php
include dirname(__FILE__) . "/footer.inc";
?>
