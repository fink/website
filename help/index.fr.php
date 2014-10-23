<?php
$title = "Aide";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:12:46 $';

include "header.inc";
?>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>Obtenir de l'aide</h1>

<p>
Vous avez besoin que l'on vous aide à utiliser Fink ? Voici les options qui s'offrent à vous.
</p>

<p>
<b>Documentation.</b>
La <a href="../doc/index.php">section documentation</a> de ce site web contient un grand nombre de documents utiles. Bien sûr, ces documents sont constamment modifiés et un grand nombre sont incomplets, mais ils présentent tous un très grand intérêt.
</p>

<p>
<b>QFP.</b>
Vous trouverez la solution aux problèmes les plus courants dans les <a
href="../faq/index.php">QFP en ligne</a>.
</p>

<p>
<b>Listes de diffusion des utilisateurs.</b>
Si vous n'arrivez pas à résoudre votre problème tout seul, vous pouvez poser la question sur les listes de diffusion <a href="../lists/fink-beginners.php">fink-beginners</a> ou <a href="../lists/fink-users.php">fink-users</a>. Vous pouvez tout d'abord consulter les <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-beginners">archives fink-beginners</a> ou les <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">archives fink-users</a> - il est fastidieux de répondre toujours aux mêmes questions.
</p>
<p>
Quand vous signalez un problème, n'oubliez pas d'inclure toute information utile - nous ne pouvons pas vous aider si vous ne savez pas vous-même quel est le problème. Quelques informations à inclure : la version de Fink, la version de Mac OS X, les versions des paquets concernés, la commande fink qui échoue, tout message d'erreur semblant utile. Dites-nous aussi si vous avez installé d'autres applications provenant d'autres sources dans /usr/local ou si vous utilisez un compilateur personnalisé (par exemple gcc 3).
</p>

<p>
<b>Canal IRC.</b>
Il y a un canal <tt>#fink</tt> sur le réseau IRC <a href="http://freenode.net">freenode</a>. Vous pouvez y discuter avec d'autres utilisateurs et développeurs de Fink.
</p>

<p>
<b>Autres sites.</b>
Quelques liens vers des forums de discussion :
<a href="http://sourceforge.net/forum/?group_id=18034">Forums XonX sur SourceForge</a> -
<a href="http://www.xdarwin.org/forum/">forums xdarwin.org</a> -
<a href="http://forums.macnn.com/forumdisplay.php?forumid=54">forum Unix MacNN</a> - <a href="http://macosx.com/">macosx.com</a> (il y a plusieurs forums Unix sur ce site).
</p>
<p>
Quelques liens vers des sites contenant des informations plus ou moins utiles :
<a href="http://mrcla.com/XonX/">XonX</a> -
<a href="http://macgimp.org/">macgimp.org</a> -
<a href="http://macosx.org/">macosx.org</a> -
<a href="http://macosxhints.com/">macosxhints.com</a>.
</p>

</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>Offrir son aide</h1>

<p>
Fink est basé sur le volontariat. Voici comment <b>vous</b> pouvez nous aider.
</p>

<p>
<b>Retour sur expérience.</b>
Rien ne vaut les retours sur expérience des utilisateurs. Signaler un problème, rendre compte d'une réussite, faire des suggestions ou apporter une contribution sont toutes choses toujours bienvenues. Même si nous ne pouvons pas promettre de tout résoudre immédiatement, cela nous aide beaucoup de savoir quelles sont les parties de Fink qui demandent le plus d'attention de notre part.
</p>
<p>
Vous pouvez faire parvenir vos retours sur expérience via les <a href="../lists/index.php">listes de diffusion</a>, ou les différents traqueurs sur SourceForge (voir la page d'accueil pour les liens directs), ou encore directement aux mainteneurs de paquets.
</p>

<p>
<b>Prêche de la bonne parole.</b>
Si vous aimez Fink, parlez-en autour de vous. C'est utile pour vous, car cela permet de construire une communauté d'aide ; c'est utile pour le projet Fink, parce que les paquets sont mieux testés ; c'est utile pour le monde Unix en général, car cela permet la reconnaissance de Mac OS X en tant que système opératoire Unix digne de support.
</p>
<p>
Vous pouvez aussi <a href="http://www.apple.com/macosx/feedback/">dire à Apple</a> que vous appréciez les bases BSD de Mac OS X et que vous aimeriez qu'il continue dans ce sens en améliorant la couche BSD.
</p>

<p>
<b>Support.</b>
Si vous avez quelque expérience à partager, abonnez-vous à la liste de diffusion <a href="../lists/fink-users.php">fink-users</a> et aidez-nous à résoudre les problèmes soulevés par d'autre utilisateurs.
</p>

<p>
<b>Test des paquets.</b>
Téléchargez les descriptions de paquets les plus récentes à partir de <a href="../doc/cvsaccess/index.php">CVS</a>, configurez Fink pour <a
href="../faq/usage-fink.php#unstable">l'utilisation de la branche instable</a> et testez les paquets. La base de données des paquets donne la liste des <a href="../pdb/testing.php">paquets qui doivent être testés</a> sur une page à part. Vous pouvez envoyer des rapports de réussite ou d'échec au mainteneur du paquet ou à la liste de diffusion de votre choix.
</p>

<p>
<b>Documentation.</b>
Le projet est toujours à la recherche de personnes pour écrire la documentation. 
</p>

<p>
<b>Création de paquets.</b>
Si vous avez quelque expérience dans le domaine de l'installation d'application Unix à partir des sources, vous pouvez nous aider en créant de nouveaux paquets. Pour démarrer, lisez le <a href="../doc/quick-start-pkg/index.php">Tutoriel d'empaquetage</a>. Puis téléchargez le <a href="../doc/packaging/index.php">Guide de création de paquets</a> (Packaging manual), lisez-le attentivement, abonnez-vous à la liste de diffusion <a href="../lists/fink-devel.php">fink-devel</a> et postez vos paquets sur le <a href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">traqueur de proposition de paquets</a> (package submission tracker).
Notez que votre proposition a toutes les chances d'être rejetée ou traitée avec un niveau de priorité très bas, si elle ne respecte pas les normes de construction de paquets.
</p>


</td></tr></table>


<?php
include "footer.inc";
?>
