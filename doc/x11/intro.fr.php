<?php
$title = "Utilisation de X11 - Intro";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="history.php?phpLang=fr" title="Historique"><link rel="prev" href="index.php?phpLang=fr" title="Utilisation de X11 Contents">';


include_once "header.fr.inc";
?>
<h1>Utilisation de X11 - 1. Introduction</h1>


<h2><a name="def-x11">1.1 Qu'est-ce que X11 ?</a></h2>

<p>Le <a href="http://www.x.org/">système X Window</a> Version 11, ou X11 en raccourci, est un système d'affichage graphique avec une architecture client-serveur transparente au réseau. Il permet aux applications de tracer sur l'écran des pixels, des lignes, du texte, des images, etc... X11 comprend aussi des librairies supplémentaires qui permettent aux applications de tracer des éléments d'interfaces utilisateur, c'est-à-dire des boutons, des champs texte, etc...</p>
<p>X11 est, de facto, le système graphique standard du monde Unix. Il est livré avec Linux, les variantes *BSD et la plupart des variantes Unix commerciales. Les environnements de bureaux, tels CDE, KDE et GNOME, s'exécutent sous X11.</p>

<h2><a name="def-macosx">1.2 Qu'est-ce que Mac OS X ?</a></h2>

<p><a href="http://www.apple.com/macosx/">Mac OS X</a> est un système opératoire conçu par <a href="http://www.apple.com/">Apple</a>. Comme ses prédécesseurs NeXTStep et OpenStep, il est basé sur BSD et fait donc partie de la famille des systèmes opératoires Unix. Néanmoins, il possède un système d'affichage graphique propriétaire. Le moteur graphique est appelé Quartz et l'interface Aqua, bien que les deux noms soient souvent utilisés de manière interchangeable.</p>

<h2><a name="def-darwin">1.3 Qu'est-ce que Darwin ?</a></h2>

<p><a href="http://opendarwin.org/">Darwin</a> est, à la base, une version réduite de Mac OS X, disponible gratuitement avec son code source. Il ne contient ni Quartz, ni Aqua, ni aucune des technologies qui leur sont rattachées. Par défaut, il ne fournit qu'une console texte.</p>

<h2><a name="def-xfree86">1.4 Qu'est-ce que XFree86 ?</a></h2>

<p><a href="http://www.xfree86.org/">XFree86</a> est une implémentation open source de X11. Au départ, elle a été développée pour tourner sous PC Intel x86, d'où son nom. De nos jours, elle tourne sur de nombreuses architectures et systèmes opératoires, entre autres OS/2, Darwin, Mac OS X et Windows.</p>

<h2><a name="def-xtools">1.5 Qu'est-ce que Xtools ?</a></h2>

<p>Xtools est un produit de <a href="http://www.tenon.com/">Tenon Intersystems</a>. Basé sur XFree86, c'est une version de X11 pour Mac OS X.</p>
<p><b>Note</b> : son développement a, semble-t-il, été stoppé quelque temps avant la publication de Mac OS 10.3.</p>

<h2><a name="client-server">1.6 Client et Serveur</a></h2>

<p>X11 possède une architecture client-serveur. Un programme central réalise la partie graphique et coordonne l'accès des différentes applications, c'est le serveur. Une application qui veut exécuter une fonction graphique sous X11 se connecte au serveur et lui indique ce qu'il faut dessiner. Ces applications sont appelées clients dans le monde X11.</p>
<p>Sous X11, le serveur et les clients peuvent être situés sur des machines différentes, ce qui conduit parfois à une confusion de terminologie. Dans un environnement constitué de stations de travail et de serveurs, on exécute le serveur d'affichage X11 sur la station de travail et les applications (les clients X) sur la machine serveur. Ainsi, lorsque l'on parle de "serveur", on entend par là le serveur d'affichage X11, et non pas la machine cachée dans un placard.</p>

<h2><a name="rootless">1.7 Que signifie sans racine (rootless) ?</a></h2>

<p>Contexte : X11 modélise l'écran comme une arborescence de fenêtres contenues les unes dans les autres. À la racine de l'arborescence se trouve une fenêtre spéciale de la taille de l'écran et qui contient toutes les autres fenêtres. Cette fenêtre contient le fond du bureau et est appelée la "fenêtre racine".</p>
<p>Maintenant, revenons à nos moutons : comme tout environnement graphique, X11 a été écrit pour fonctionner seul et prendre le contrôle de l'écran tout entier. Sous Mac OS X, Quartz contrôle déjà l'écran, aussi il faut prendre des dispositions pour que les deux environnements puissent fonctionner en même temps.</p>
<p>L'un des moyens de faire cela est de faire fonctionner les deux environnements à tour de rôle. À chaque environnement est affecté un écran, mais seul l'un d'entre eux est visible à un moment donné, et l'utilisateur peut basculer de l'un à l'autre. C'est ce qu'on appelle le mode plein-écran ou mode racine. Il est appelé ainsi car il y a alors sur l'écran X11 une fenêtre racine parfaitement normale qui fonctionne exactement comme sur les autres systèmes.</p>
<p>L'autre moyen consiste à mêler les fenêtres des deux environnements. Cela élimine la nécessité de basculer entre les deux écrans. Cela élimine aussi la fenêtre racine de X11, car Quartz se charge déjà du fond de bureau. Comme il n'y aucune fenêtre racine (visible), ce mode est appelé "sans racine". C'est la façon la plus agréable d'utiliser X11 sous Mac OS X.</p>

<h2><a name="wm">1.8 Qu'est-ce qu'un gestionnaire de fenêtres ?</a></h2>

<p>Dans la plupart des environnements graphiques, l'aspect des cadres de fenêtres (barre de titre, bouton de fermeture, etc...) est défini par le système. Sous X11, il en va autrement. Dans cet environnement, les cadres de fenêtres (aussi nommés "ornements") sont fournis par un programme distinct, appelé le gestionnaire de fenêtres. À bien des égards, le gestionnaire de fenêtres n'est autre qu'une application client ; il est lancé de la même façon et dialogue avec le serveur X au travers des mêmes canaux.</p>
<p>Vous avez le choix entre une multitude de gestionnaires de fenêtres. Le site <a href="http://www.xwinman.org/">xwinman.org</a> en donne la liste complète. Les plus populaires sont ceux qui permettent à l'utilisateur de personnaliser leur apparence via ce qu'on appelle des <a href="http://www.themes.org/">thèmes</a>. La plupart des gestionnaires de fenêtres fournissent d'autres fonctionnalités, comme les menus déroulants dans la fenêtre racine, les docks et les boutons de lancement.</p>
<p>De nombreux gestionnaires de fenêtres ont été compilés pour Fink ; en voici la <a href="http://pdb.finkproject.org/pdb/section.php/x11-wm">liste actuelle</a>.</p>

<h2><a name="desktop">1.9 Que sont Quartz/Aqua, Gnome et KDE ?</a></h2>

<p>Ce sont des environnements de bureau ; il y en a bien d'autres. Leur but est de proposer un cadre aux applications, de telle sorte que leur aspect et leur comportement présentent une constante visuelle. Par exemple :</p>
<p>un moteur graphique : X11</p>
<p>un gestionnaire de fenêtre : <a href="http://sawmill.sourceforge.net/">sawfish</a></p>
<p>un bureau : <a href="http://www.gnome.org/">Gnome</a></p>
<p>La frontière entre moteur d'affichage graphique, gestionnaire de fenêtres et bureau est floue, car une même fonctionnalité (ou une fonctionnalité similaire) peut être implémentée par l'un de ces environnements ou plusieurs d'entre eux. C'est une des raisons pour laquelle un gestionnaire de fenêtres particulier peut ne pas fonctionner avec un environnement de bureau donné.</p>
<p>De nombreuses applications sont développées pour être intégrées dans un environnement de bureau spécifique. Très souvent, il suffit d'installer les librairies de l'environnement de bureau (et les librairies sous-jacentes) avec lesquelles l'application a été développée pour qu'elle fonctionne (quasi) sans perte de fonctionnalités. Par exemple, un nombre de plus en plus grand d'<a href="http://pdb.finkproject.org/pdb/section.php/gnome">applications GNOME</a> fonctionnent hors de l'environnement GNOME. Malheureusement, <a href="/faq/usage-fink.php#kde">ce n'est pas encore le cas</a> pour les <a href="http://www.kde.org/">applications KDE</a>.</p>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="history.php?phpLang=fr">2. Historique</a></p>
<?php include_once "../../footer.inc"; ?>


