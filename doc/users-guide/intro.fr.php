<?
$title = "Guide utilisateur - Introduction";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2005/02/01 08:33:58';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="next" href="install.php?phpLang=fr" title="Première installation"><link rel="prev" href="index.php?phpLang=fr" title="Guide utilisateur Contents">';


include_once "header.fr.inc";
?>
<h1>Guide utilisateur - 1. Introduction</h1>


<h2><a name="what">1.1 Qu'est-ce que Fink ?</a></h2>

<p>Fink est une distribution de logiciels Unix Open Source pour Mac OS X et Darwin. Il apporte à votre Mac une large palette d'outils en ligne de commandes et de logiciels graphiques libres développés pour Linux ou pour d'autres systèmes opératoires similaires.</p>

<h2><a name="req">1.2 Configuration requise</a></h2>

<p>Vous devez disposer au moins :</p>
<ul>
<li>
<p>D'un système Mac OS X installé, version 10.2 ou postérieure, ou des versions Darwin correspondantes. Il est <b>impossible</b> de faire fonctionner Fink sous des versions antérieures de l'un ou l'autre de ces systèmes. Voir ci-dessous pour de plus amples informations sur les systèmes supportés.</p>
</li>
<li>
<p>D'un accès Internet. Le code source et les paquets binaires sont récupérés à partir des sites Internet de téléchargement.</p>
</li>
</ul>
<p>Si vous comptez utiliser la distribution source (voir plus loin), vous devez aussi avoir :</p>
<ul>
<li>
<p>Les outils de développement. Sous Mac OS X, installez le paquet Developer.pkg à partir du CD DeveloperTools. Notez que la version des outils de développement doit correspondre à celle de Mac OS X. Sous Darwin, les outils de développement sont inclus dans l'installation par défaut.</p>
<p>Il est utile d'installer les Outils de Développement, même si vous ne comptez pas construire les paquets à partir du source. Certains des programmes installés par le paquet Developer.pkg sont en fait des outils de ligne de commande à portée générale. Le fonctionnement de certains paquets dépend de ces outils.</p>
</li>
<li>
<p>De la patience. Compiler plusieurs gros paquets prend du temps. Il peut s'agir de plusieurs heures, voire de plusieurs jours.</p>
</li>
</ul>

<h2><a name="supported-os">1.3 Systèmes supportés</a></h2>

<p><b>Mac OS X 10.3</b> est le meilleur système opératoire pour faire tourner Fink. Tous les développeurs s'en servent et les paquets sont testés sur ce système. On considère qu'il est "complètement supporté et testé", bien qu'il puisse y avoir quelques problèmes de compilation résiduels pour certains paquets isolés.</p>
<p><b>Mac OS X 10.2</b> est toujours supporté, mais certains paquets récents peuvent ne pas avoir de versions 10.2 disponibles.</p>
<p><b>Mac OS X 10.1</b> est encore supporté dans une certaine mesure. Pour cette version, vous ne pouvez utiliser que Fink 0.4.1 et aucune autre version ultérieure.</p>
<p>Darwin 7.0.1 est la version Darwin correspondant à Mac OS X 10.3, et <b>Darwin 6.0.2</b> est celle correspondant à Mac OS X 10.2. Elles fonctionnent en général, mais ne sont pas aussi bien testées que les systèmes Mac OS X purs utilisés par la plupart des gens. Il se peut que vous ayez des problèmes avec des paquets qui utilisent des fonctionnalités spécifiques à Mac OS X - les paquets concernés comprennent XFree86 et probablement esound.</p>

<h2><a name="src-vs-bin">1.4 Source ou binaire</a></h2>

<p>Les logiciels sont écrits ("développés") avec des langages de programmation lisibles par des êtres humains ; sous cette forme, ils sont appelés "code source". Avant qu'un ordinateur puisse réellement faire tourner un programme, il doit être transformé en instructions machine de bas niveau (non lisibles par la plupart des gens). Ce processus s'appelle la "compilation" et le programme résultant est appelé 
"exécutable" ou "binaire". (Le processus est aussi appelé "build", parce qu'il comporte d'autres étapes que la compilation.)</p>
<p>Quand vous achetez un logiciel commercial, vous n'avez pas accès au code source - les SSII le considère comme un secret de fabrication. Vous n'avez que l'exécutable prêt à fonctionner, vous n'avez donc aucun moyen de modifier le programme et de savoir ce qu'il fait réellement.</p>
<p>Il n'en va pas de même avec les logiciels <a href="http://www.opensource.org/">Open Source</a>. Comme son nom l'indique en anglais, le code source est ouvert à tous et peut donc être vu et modifié. En fait, la plupart des logiciels Open Source sont distribués sous forme de code source par leurs auteurs et vous devez les compiler sur votre ordinateur pour obtenir un exécutable.</p>
<p>Fink vous laisse le choix entre les deux formes source ou binaire. La distribution "source" récupère le source original, l'adapte à Mac OS X et aux règles de Fink et le compile sur votre ordinateur. Ce processus est complètement automatisé, mais dure un certain temps. À l'inverse, la distribution "binaire" récupère sur le site de Fink des paquets déjà compilés, ce qui fait gagner le temps de la compilation. 
En fait, il est possible de marier les deux formes à volonté. Ce guide vous indique comment le faire.</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="install.php?phpLang=fr">2. Première installation</a></p>
<? include_once "../../footer.inc"; ?>


