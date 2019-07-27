<?php
$title = "Paquets - Compilateurs";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/07/27 6:50:00';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="next" href="reference.php?phpLang=fr" title="Référence"><link rel="prev" href="fslayout.php?phpLang=fr" title="Organisation des fichiers">';


include_once "header.fr.inc";
?>
<h1>Paquets - 5. Compilateurs</h1>


<p>Fink utilise la famille des compilateurs gcc, tel qu'ils sont fournis par Apple Computer sur le site Apple Developer Connection. Il existe différentes versions de gcc et chaque système Mac OS X en comporte, en général, plusieurs.</p>
<p>Cette partie explique quelques-unes des façons dont Fink gère ces différentes versions de gcc. Un courriel posté sur la liste de diffusion de Fink comporte <a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg11877.html"> de plus amples explications</a>.</p>

<h2><a name="versions">5.1 Versions du compilateur</a></h2>
<p>Comme ces compilateurs évoluent, il y a plusieurs "distributions" de fink différentes pour s'adapter à ces changements.</p>
<p>Chaque distribution comporte certaines valeurs par défaut pour les compilateurs gcc et g++, qui correspondent à ceux qu'un utilisateur compilant à partir des sources est censé avoir installés. Vous pouvez donc compter sur le fait qu'un appel direct à "gcc" ou "g++" à partir d'un paquet utilisera ces valeurs par défaut. Si vous avez besoin d'utiliser une valeur différente (par exemple, durant la transition vers une nouvelle distribution), le fichier .info du paquet doit le spécifier en utilisant les versions binaires fournies par Apple. La façon exacte de le faire dépend du système de compilation du logiciel, mais pour de nombreux paquets, on peut utiliser les champs fink <code>SetCC</code> et <code>SetCXX</code> à cette fin. Par exemple, vous pouvez passer à la version 3.3 du compilateur g++ avec le champ <code>SetCXX: g++-3.3</code>. Vérifiez le résultat lors de la compilation afin de vous assurer que le bon compilateur est utilisé.</p>
<p>La distribution 10.1 part du principe que la version du compilateur est la version 2.95 ; la distribution 10.2 que la version du compilateur est la version 3.1 ; les distributions 10.2-gcc3.3 et 10.3 que la version du compilateur est la version 3.3. Pour la distribution 10.4-transitional, c'est un peu plus compliqué : g++-3.3 est utilisé avec gcc-4.0. Cela changera de nouveau dans la distribution 10.4 où l'on utilisera gcc-4.0 et g++-4.0.</p>
<p>À partir de la distribution 10.4-transitional, une nouvelle méthode a été introduite pour assurer la sélection du bon compilateur g++. Durant la compilation, un répertoire <code>/sw/var/lib/fink/path-prefix-g++-XXX</code> (où XXX est le numéro de version) est ajouté au PATH. Ce répertoire contient des scripts shell qui se charge de sélectionner la bonne version de g++.</p>

<h2><a name="abi">5.2 L'ABI g++</a></h2>
<p>L'ABI g++ a changé trois fois depuis la naissance de Mac OS X : elle est différente pour les versions 2.95, 3.1, 3.3 et 4.0. Ces différentes ABI ne sont pas compatibles entre elles, et toute bibliothèque utilisant du code C++ et liée à un projet doit être compilée avec la même ABI que celle en cours d'utilisation.</p>
<p>Fink garde trace de l'ABI g++ à l'aide du champ GCC. Ce champ doit être défini par tout paquet qui invoque les compilateurs g++ ou c++. Il NE doit PAS être défini pour les paquets qui n'invoquent pas ces compilateurs. Quand un changement d'ABI intervient, il faut vérifier le champ GCC de toutes les dépendances d'un paquet. Quand toutes les dépendances ont été mises à jour, le paquet lui-même peut être mis à jour. Les versions des dépendances doivent être modifiées pour assurer que les utilisateurs aient bien toutes les dépendances correctes mises à jour avant de tenter de compiler la nouvelle version d'un paquet.</p>
<p>Si un petit nombre de paquets dépendent uniquement les uns des autres, on peut laisser la version de l'ABI précédente en place, s'ils ne sont pas prêts pour la mise à jour. Quand la mise à jour aura lieu, ils seront tous mis à jour en même temps avec une version correcte sur tous les paquets. C'est pourquoi il est préférable de ne mettre à jour les paquets qu'au moment de la distribution.</p>
<p>Fink utilise le champ GCC pour s'assurer que les utilisateurs ont bien la bonne version du compilateur g++ installée sur leur système. Si le champ GCC est défini par le paquet, fink vérifie que la commande <code>gcc_select</code> a reçu la valeur en cours. Cette valeur est 3.3 pour les versions 10.2 et 10.3 de Mac OS X, et 4.0 pour la version 10.4 de Mac OS X. La commande <code>gcc_select</code> n'était pas disponible antérieurement à la version 10.2 de Mac OS X.</p>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="reference.php?phpLang=fr">6. Référence</a></p>
<?php include_once "../../footer.inc"; ?>


