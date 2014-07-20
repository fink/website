<?
$title = "Passage à la mise à niveau par Rsync";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2014/07/20 12:44:12 $';

include "header.inc";
?>

<h1>Passage à la mise à jour par Rsync</h1>

<p>
Le gestionnaire de paquets fink offre maintenant la possibilité
d'une mise à jour par rsync comme alternative à CVS.
Mais si vous avez des difficultés avec CVS, vous ne pourrez pas utiliser
CVS pour réaliser la mise à jour du gestionnaire de paquets.
</p><p>
Si vous avez des difficultés pour mettre à niveau fink, vous devrez d'abord récupérer l'archive tar de fink  (version 0.14.0 ou plus récente). Vous la trouverez sur la <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">page de la liste des fichiers Fink sur SourceForge</a>.
Utilisez <code> tar -xfz </code> pour décompacter l'archive, puis <code>cd</code>
pour vous placer dans le répertoire ainsi créé, et exécutez la commande
<code>./inject.pl</code>
</p>
<p>Ceci devrait installer le dernier gestionnaire de paquets.  Après l'installation,
la commande <code>fink selfupdate-rsync</code> vous fera basculer
vers la nouvelle méthode.  Une fois réalisé ce changement de méthode de mise à jour, 
vous pourrez faire les mises à jour suivantes par la simple commande
<code>fink selfupdate.</code>
</p>


<?
include "footer.inc";
?>
