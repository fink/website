<?
$title = "Q.F.P. - Généralités";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/10/17 19:47:54';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="relations.php?phpLang=fr" title="Relations avec d\'autres projets"><link rel="prev" href="index.php?phpLang=fr" title="Q.F.P. Contents">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 1. Questions générales</h1>


<a name="what">
<div class="question"><p><b><? echo FINK_Q ; ?>1.1: Qu'est-ce que Fink ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
La raison d'être de Fink est d'offrir un maximum de logiciels UNIX sur Mac OS X, ce qui  se traduit par deux objectifs principaux :  
</p><p>
L'objectif principal est de porter des logiciels sur Mac OS X. Cela signifie que nous prenons des logiciels Open Source Unix et corrigeons ce qui est nécessaire pour qu'ils compilent et tournent sur Mac OS X. Parfois la tâche est simple, mais elle peut être très difficile, voire impossible, pour certains paquets. Nous essayons de fournir des outils et des documents pour la simplifier.
</p><p>
L'objectif secondaire est de mettre le résultat à disposition d'utilisateurs occasionnels.  Pour ce faire, nous créons une distribution en utilisant des outils de gestion de paquets portés depuis Linux, à savoir <code>dpkg</code> et
<code>apt-get</code>, écrit par et pour le projet <a href="http://www.debian.org/">Debian GNU/Linux</a>. La distribution binaire utilise le format de paquet <code>.deb</code>. Pour construire les paquets à partir du source, nous utilisons notre propre outil, nommé <code>fink</code>, qui construit ces fichiers de paquet <code>.deb</code>.
</p></div>
</a>
<a name="naming">
<div class="question"><p><b><? echo FINK_Q ; ?>1.2: Que signifie Fink ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Rien en particulier, ce n'est qu'un nom, même pas un acronyme.</p><p>En fait, Fink est le mot allemand désignant un fringillidé, une espèce d'oiseau. Je cherchais un nom pour le projet et le nom du système opératoire, Darwin, m'a fait penser à Charles Darwin, aux îles Galápagos et à l'évolution des espèces. Je me suis souvenu, qu'à l'école, nous avions étudié un passage sur les fringillidés pseudo-darwiniens et leurs becs, d'où le nom...</p></div>
</a>
<a name="bsd-ports">
<div class="question"><p><b><? echo FINK_Q ; ?>1.3: En quoi Fink se différencie-t-il du mécanisme de portage BSD (qui comprend OpenPackages et GNU-Darwin) ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Avantages principaux de Fink :</p><ul>
<li>
<p>
Il est écrit en Perl, pas en make/shell. Il ne repose donc pas sur des fonctionnalités inhérentes à BSD make. Il n'y a donc pas besoin de marquer les paquets qui doivent utiliser GNU make à la construction.
</p>
</li>
<li>
<p>
dpkg fournit une gestion sophistiquée des paquets binaires : mise à jour facile, gestion spéciale des fichiers de configuration, paquets virtuels et autres fonctions avancées.
</p>
</li>
<li>
<p>
Fink n'installe rien dans /usr/local à moins d'une requête explicite et ne nécessite pas de jongler avec /usr/bin/make ou d'autres commandes fournis par le système. Cela rend son utilisation plus sûre et réduit au minimum les interférences avec Mac OS X et les paquets de tierce partie.
</p>
</li>
</ul></div>
</a>
<a name="usr-local">
<div class="question"><p><b><? echo FINK_Q ; ?>1.4: Pourquoi Fink n'installe rien dans /usr/local ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Il y a plusieurs raisons à cela, mais toutes reposent sur le fait  que "cela occasionnerait des failles dans le système".</p><p>Première raison : les logiciels de tierce partie. /usr/local est réservé à l'installation des logiciels qui ne font pas partie du système fourni par le vendeur initial. C'est donc l'endroit idéal pour installer quelque chose. Mais, c'est aussi là que d'autres vendeurs installeront leurs logiciels. La plupart des routines d'installation viendront écraser ce qui y est déjà - cela est vrai aussi pour dpkg. On peut, bien sûr, choisir de ne pas installer de logiciels de tierce partie dans /usr/local. Malheureusement, la plupart des routines d'installation ne signalent pas à l'avance ce qu'elles installent ni où elles l'installent.</p><p>Deuxième raison : /usr/local/bin est dans le PATH par défaut. Il s'ensuit que votre shell trouve les programmes installés sans que vous ayez à intervenir. A contrario, vous devrez intervenir si vous ne souhaitez pas utiliser ces programmes. Au pire, cela affecte le système lui-même -  de nombreuses parties du système reposent sur des scripts shell.</p><p>Troisième raison : l'ensemble des outils de compilation effectuent leurs recherches dans /usr/local par défaut. Le compilateur cherche les headers dans /usr/local/include et l'éditeur de liens cherche les librairies dans /usr/local/lib. C'est quelquefois très pratique, mais très difficile à désactiver si le besoin s'en fait sentir. On peut facilement désactiver le compilateur en mettant dans /usr/local/include un fichier parasite auquel on donne le nom de <code>stdio.h</code>.</p><p>Ceci dit, il est possible d'installer Fink dans  /usr/local. Le script d'installation vous avertira que, si vous le faites, ce sera à vos risques et périls, mais continuera l'installation après votre accord.</p></div>
</a>
<a name="why-sw">
<div class="question"><p><b><? echo FINK_Q ; ?>1.5: Pourquoi avoir choisi /sw ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ce choix est tout-à-fait arbitraire, mais il est vraisemblable qu'il demeure le même, au moins dans un avenir prévisible, tant pour des raisons pratiques (mise à niveau) que par le fait qu'il n'entre en conflit avec aucun autre système de paquets.</p></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="relations.php?phpLang=fr">2. Relations avec d'autres projets</a></p>
<? include_once "../footer.inc"; ?>


