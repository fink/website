<?
$title = "Téléchargement de la version binaire";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2011/10/26 18:29:04 $';

include "header.inc";
?>

<h1>Téléchargement de la version binaire de Fink</h1>

<p>La version binaire de Fink vous évite la pénible tâche de compiler les programmes sur votre machine locale. Après l'installation d'un système de base avec le paquet d'installation, vous pourrez télécharger des paquets binaires précompilés à partir du site de Fink avec les outils en ligne de commande <code>dselect</code> et <code>apt-get</code>. Seule une partie des paquets est disponible en tant que paquets binaires ; les autres doivent être compilés à partir du source, de la même façon que la version source. Ceci est dû principalement à des restrictions d'usage légales concernant les paquets manquants.</p>
<? 
include "../fink_version.inc";
?>
<p>
<b>Statut :</b> 
nous avons posté un installeur pour Fink <? print $fink_version; ?> (OS X 10.5).
</p>
<ul>
<li><a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-PowerPC-Installer.dmg?download">Installeur binaire Fink <? print $fink_version; ?> pour PowerPC</a> - <? print $dmg_size; ?>, image disque compressée .dmg</li>
<li><a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Intel-Installer.dmg?download">Installeur binaire Fink <? print $fink_version; ?> pour Intel</a> - <? print $intel_dmg_size; ?>, image disque compressée .dmg</li>
<li><a href="http://prdownloads.sourceforge.net/fink/direct_download/">Distribution archivée</a> - vous y trouverez les paquets binaires et le source correspondant.</li>
</ul>
<p>La documentation est encore incomplète à l'heure actuelle. L'image disque de l'installeur contient quelques notes (Fink ReadMe.rtf) et une copie du Guide de l'utilisateur Fink en cours de rédaction. De plus amples informations sont disponibles sur le site web <a href="../doc/index.php">section documentation</a>.</p>
<p>Pour vous tenir informé des nouvelles versions, abonnez-vous à la <a href="../lists/fink-announce.php">liste de diffusion fink-announce</a>.</p>
<?
include "footer.inc";
?>
