<?
$title = "Q.F.P. - Miroirs";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/12/10 19:14:17';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="upgrade-fink.php?phpLang=fr" title="Mise à jour de Fink (Résolution de problèmes spécifiques à une version donnée)"><link rel="prev" href="relations.php?phpLang=fr" title="Relations avec d\'autres projets">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 3. Miroirs de Fink</h1>


<a name="when-use">
<div class="question"><p><b><? echo FINK_Q ; ?>3.1: Qu'est-ce qu'un miroir Fink ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Un miroir Fink est un serveur rsync qui reflète les fichiers de description actuels et stables que Fink utilisent pour construire les paquets à partir du source.
</p></div>
</a>
<a name="why">
<div class="question"><p><b><? echo FINK_Q ; ?>3.2: Pourquoi utiliser des miroirs rsync ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Rsync est un protocole très rapide. Il met à jour les fichiers de description plus vite que l'ancienne méthode de mise à jour via CVS. De plus, les mises à jour via CVS sont toujours faites à partir de sourceforge.net, tandis que les mises à jour via rsync peuvent être faites à partir d'un miroir proche de votre lieu de téléchargement.</p></div>
</a>
<a name="where">
<div class="question"><p><b><? echo FINK_Q ; ?>3.3: Où trouver de plus amples informations sur les miroirs Fink ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Tous les miroirs Fink sont fusionnés sous le nom de domaine finkmirrors.net. Vous trouverez de plus amples informations sur le site web http://finkmirrors.net/.</p></div>
</a>
<a name="when-not">
<div class="question"><p><b><? echo FINK_Q ; ?>3.4: Il est impossible de se connecter au serveur rsync. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Il arrive que certains murs pare-feu particulièrement efficaces vous empêchent de vous connecter à des services rsync. Dans ce cas, continuez à utiliser la méthode CVS.</p></div>
</a>
<a name="otherinfogone">
<div class="question"><p><b><? echo FINK_Q ; ?>3.5: Après passage à la méthode rsync, tous les fichiers info des arborescences inutilisées ont disparu. Que se passe-t-il ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> C'est normal. La méthode rsync ne met à jour que l'arborescence active, par exemple 10.3, et supprime tous les répertoires CVS.</p></div>
</a>
<a name="howswitch">
<div class="question"><p><b><? echo FINK_Q ; ?>3.6: Comment passer d'une méthode à une autre à volonté ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> En utilisant fink selfupdate-rsync pour passer à la méthode rsync ou fink selfupdate-cvs pour passer à la méthode CVS.</p></div>
</a>
<a name="status">
<div class="question"><p><b><? echo FINK_Q ; ?>3.7: Comment connaître l'état actuel des miroirs rsync ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Allez sur http://finkmirrors.net/status.html</p></div>
</a>
<a name="Master">
<div class="question"><p><b><? echo FINK_Q ; ?>3.8: Qu'est-ce qu'un miroir Distfiles ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Il est parfois difficile de trouver une version précise d'un source sur Internet. Les miroirs Distfiles stockent les paquets source nécessaires à fink pour construire ses paquets source. Ils font aussi office de miroir.</p></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade-fink.php?phpLang=fr">4. Mise à jour de Fink (Résolution de problèmes spécifiques à une version donnée)</a></p>
<? include_once "../footer.inc"; ?>


