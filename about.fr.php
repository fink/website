<?
$title = "À propos de Fink";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2004/03/03 15:34:41 $';

include "header.inc";
?>


<h1>À propos de Fink</h1>

<h2>Qu'est ce que Fink ?</h2>

<p>
Fink est un projet qui vise à ouvrir toutes grandes les portes du monde des logiciels 
<a href="http://www.opensource.org/">Open Source</a> Unix à 
<a href="http://www.opensource.apple.com/">Darwin</a> et 
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Ceci se traduit par deux objectifs principaux.
Tout d'abord, nous modifions les logiciels Open Source existants pour qu'ils puissent compiler et tourner sous Mac OS X.
(Ce processus s'appelle le portage).
Ensuite, nous mettons le résultat de la première étape à disposition d'utilisateurs occasionnels sous la forme d'une distribution cohérente et facile d'emploi, équivalente à ce dont disposent les utilisateurs Linux.
(Ce processus s'appelle l'empaquetage.)
Le projet propose aussi bien des paquets binaires précompilés qu'un système complètement automatisé de construction des paquets à partir des sources.
</p>
<p>
Pour atteindre ces objectifs, Fink repose sur les outils de gestion de paquets du projet <a href="http://www.debian.org/">Debian</a> - <code>dpkg</code>, <code>dselect</code> et <code>apt-get</code>.
Fink y ajoute son propre gestionnaire de paquets, appelé (oh ! surprise) <code>fink</code>.
On peut considérer <code>fink</code> comme un moteur de construction - il part des descriptions de paquets pour produire des paquets binaires .deb.
Au cours de ce processus, il récupère le source sur Internet, lui applique éventuellement des rustines, puis le configure et construit le paquet.
Enfin, il crée, à partir du paquet, une archive prête à être installée par <code>dpkg</code>.
</p>
<p>
Comme Fink s'installe sur la couche Mac OS X, il est régi par des règles strictes pour éviter des interférences avec le système sous-jacent.
C'est pourquoi Fink gère une arborescence particulière de répertoires et fournit l'infrastructure pour s'en servir facilement.
</p>


<h2>Pourquoi utiliser Fink ?</h2>

<p>
Cinq raisons majeures d'utiliser Fink pour installer des logiciels Unix sur votre Mac :
</p>

<p>
<b>Fonctionnalités accrues.</b>
Mac OS X ne comprend qu'une collection réduite d'outils en ligne de commande.
Fink la complète et l'améliore, et propose aussi toute une série d'applications graphiques développées pour Linux ou d'autres variantes d'Unix.
</p>

<p>
<b>Commodité.</b>
Avec Fink, le processus de compilation est entièrement automatisé ; vous n'avez pas à manipuler les Makefiles ou les scripts de configuration, ni à modifier leurs paramètres.
Le système de dépendances se charge de vérifier que toutes les librairies nécessaires sont présentes. Nos paquets sont généralement configurés de telle sorte que vous ayez accès au maximum de fonctionnalités.
</p>

<p>
<b>Sécurité.</b>
Les parties vulnérables de votre système Mac OS X ne sont jamais touchées par Fink, grâce à ses règles strictes de non-interférence.
Vous pouvez mettre à jour Mac OS X sans crainte que cela ait une incidence sur Fink et vice-versa.
Le système de gestion de paquets vous permet également de supprimer en toute sécurité les logiciels dont vous n'avez plus besoin. 
</p>

<p>
<b>Cohérence.</b>
Fink n'est pas une simple collection de paquets choisis au hasard, c'est une distribution cohérente.
Les fichiers sont installés à des endroits bien spécifiques.
Les fichiers de documentation sont toujours à jour.
Il existe une interface unifiée pour contrôler les processus serveur ; et de nombreuses autres procédures, dont la plupart tournent pour vous sans même que vous vous en aperceviez.
</p>

<p>
<b>Flexibilité.</b>
Vous ne téléchargez et n'installez que les programmes dont vous avez besoin.
Fink vous laisse le choix entre installer XFree86 ou d'autres solutions X11 exactement comme vous le voulez.
Si vous ne voulez pas installer X11, cela ne pose pas de problèmes.
</p>


<p>
<a href="index.php">Retour à la page d'accueil</a> -
<a href="download/index.php">Téléchargement</a>
</p>


<?
include "footer.inc";
?>
