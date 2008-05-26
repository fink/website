<?
$title = "Paquets - Intro";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2008/05/26 01:47:14';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="next" href="format.php?phpLang=fr" title="Descriptions de paquets"><link rel="prev" href="index.php?phpLang=fr" title="Paquets Contents">';


include_once "header.fr.inc";
?>
<h1>Paquets - 1. Introduction</h1>


<h2><a name="def1">1.1 Qu'est-ce qu'un paquet ?</a></h2>
<p>Un paquet est un logiciel qui forme une unité atomique. Un paquet contient en général un programme exécutable, les fichiers de données dont il a besoin et des catalogues de message pour l'internationalisation et la documentation. Dans Fink, les paquets peuvent exister sous deux formes : la description de paquet et le paquet binaire prêt à installer.</p>
<p>La description de paquet est un fichier texte compréhensible par un être humain qui contient tout ce qui est nécessaire pour construire le paquet, c'est-à-dire pour créer le paquet binaire. Les informations contenues dans la description de paquet comprennent des métainformations (comme le nom du paquet et une description de son objet), l'URL du source code et les instructions nécessaires à la configuration, compilation et construction du paquet. La description peut être accompagnée d'une rustine.</p>
<p>Un paquet binaire est une archive qui contient effectivement les fichiers qui constituent le paquet, c'est-à-dire les exécutables, les fichiers de données, les catalogues de messages, les bibliothèques, les fichiers include, etc... Le paquet peut aussi contenir des métainformations pour le paquet lui-même. 
L'installation d'un paquet binaire consiste simplement à le dépaqueter, puisqu'il est déjà dans un format prêt à l'emploi. Comme Fink construit les paquets avec le gestionnaire de paquets dpkg, les paquets binaires ont le format dpkg et ont une extension .deb.</p>

<h2><a name="ident">1.2 Identification d'un paquet</a></h2>
<p>Un paquet est identifié par trois éléments : le nom du paquet, la version et la révision. Tous ces éléments peuvent contenir des lettres minuscules (a-z), des nombres (0-9), des tirets (-) sauf les numéros de révision, des signes plus (+) et des points (.). Les autres caractères sont interdits. En particulier, on ne peut utiliser de majuscules et de tiret de soulignement.</p>
<p>Le nom du paquet est tout simplement le nom du logiciel, par exemple openssh. La version, aussi appelée version en amont, est l'identifiant de version du paquet original. On peut utiliser des lettres dans la version, par exemple 2.9p1. fink et dpkg les trient correctement. La révision est un compteur qui est incrémenté quand la description du paquet change. Il démarre à 1 et doit être remis à 1 quand la version en amont change. La révision ne doit pas contenir de tiret. Le nom complet du paquet est constitué de la concaténation de ces trois éléments, séparés par des tirets, par exemple openssh-2.9p1-2.</p>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="format.php?phpLang=fr">2. Descriptions de paquets</a></p>
<? include_once "../../footer.inc"; ?>


