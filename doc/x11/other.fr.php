<?php
$title = "Utilisation de X11 - Autres X11";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="trouble.php?phpLang=fr" title="Résolution de problèmes engendrés par XFree86"><link rel="prev" href="xtools.php?phpLang=fr" title="Xtools">';


include_once "header.fr.inc";
?>
<h1>Utilisation de X11 - 6. Autres possibilités pour X11</h1>


<h2><a name="vnc">6.1 VNC</a></h2>

<p>VNC est un système d'affichage graphique en réseau d'architecture semblable à celle de X11. Néanmoins, il fonctionne à un niveau plus bas, rendant son implémentation plus facile. Avec le serveur Xvnc et un client d'affichage Mac OS X, on peut exécuter des applications X11 sous Mac OS X. La <a href="http://www.cdc.noaa.gov/~jsw/macosx_xvnc/">page Xvnc</a> de Jeff Whitaker vous fournira de plus amples informations à ce sujet.</p>

<h2><a name="wiredx">6.2 WiredX</a></h2>

<p><a href="http://www.jcraft.com/wiredx/">WiredX</a> est un serveur X11 écrit en Java. Il gère aussi le mode sans racine. Un paquet d'installation Installer.app est disponible sur son site web.</p>

<h2><a name="exodus">6.3 eXodus</a></h2>

<p>D'après son site web, <a href="http://www.powerlan-usa.com/exodus/">eXodus 8</a> de Powerlan USA fonctionne en natif sur Mac OS X. On ne sait pas sur quel code il se base, ni s'il gère les clients locaux, ni comment il les gère. En conséquence, Fink ne peut fournir un support adapté à eXodus. Si vous avez de plus amples informations à ce sujet, n'hésitez pas à nous le faire savoir.</p>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="trouble.php?phpLang=fr">7. Résolution de problèmes engendrés par XFree86</a></p>
<?php include_once "../../footer.inc"; ?>


