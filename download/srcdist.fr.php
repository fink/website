<?
$title = "Téléchargement de la version source";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2006/06/16 00:05:40 $';

include "header.inc";
?>

<h1>Téléchargement de la version source de Fink</h1>

<p>
La version source contient le gestionnaire de paquets fink, les descriptions des paquets et leurs rustines.
Elle permet de télécharger les sources depuis les sites de distribution
originaux et de les compiler sur votre ordinateur.
</p>
<? 
include "../fink_version.inc";
?>

<p>
La version <? print $fink_version; ?> de Fink a été officiellement mise à disposition des utilisateurs le <? print $release_date; ?>.

</p>
<ul>
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full.tar.gz">Fink
<? print $release_version; ?></a>- 6786K, format .tar.gz</li>
</ul>

<p>
<b>Important :</b>
Ne pas extraire l'archive en utilisant Stuffit : cela corrompt certains
noms de fichiers.
Utilisez plutôt l'utilitaire <tt>tar</tt> en ligne de commande.
Les instructions sont dans le document d'installation.
</p>

<p>
Les instructions d'installation et d'utilisation sont contenues dans
l'archive tar de la distribution.
Lisez-les : Fink ne s'installe pas en un seul clic !
Les documents README, INSTALL et USAGE sont fournis sous format texte (pour lecture en ligne de commande) et sous format HTML (pour lecture via un navigateur et impression).
Ils sont aussi disponibles en ligne dans la <a
href="../doc/index.php">section documentation</a>.
</p>
<p>
Pour être tenu informé des nouvelles versions, abonnez-vous à la <a
href="../lists/fink-announce.php">liste de diffusion fink-announce</a>.
</p>


<?
include "footer.inc";
?>
