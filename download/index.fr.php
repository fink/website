<?
$title = "TÃ©lÃ©chargement rapide";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2004/04/08 22:00:19 $';

include "header.inc";
?>


<h1>TÃ©lÃ©chargement de Fink</h1>
<p>
Il y a de nombreuses faÃ§ons d'installer ou de mettre Ã  niveau Fink.
Nous conseillons aux nouveaux utilisateurs de suivre les instructions de tÃ©lÃ©chargement rapide figurant ci-dessous.
Pour les autres, voyez les <a href="overview.php">gÃ©nÃ©ralitÃ©s</a> et la
<a href="upgrade.php">matrice de mise Ã  niveau</a>.
</p>

<h2>TÃ©lÃ©chargement rapide</h2>
<p>
C'est votre premier essai sous Fink ?  Ces instructions vont vous aider Ã  charger rapidement la version binaire.
</p>
<? 
include "../fink_version.inc";
?>

<ol>
<li><p>
TÃ©lÃ©chargez l'image disque de l'installeur :<br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Installer.dmg?download">Installeur binaire Fink
<? print $fink_version; ?></a> - <? print $dmg_size; ?><br>
(utilisateurs de la version 10.2 - utilisez  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.3-Installer.dmg?download">Fink0.6.3</a>)<br>
(utilisateurs de la version 10.1  - utilisez <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink0.4.1</a>)
</p>
</li>
<li><p>
Double-cliquez sur "Fink-<? print $fink_version; ?>-Installer.dmg" pour monter l'image disque, puis double-cliquez sur le paquet "Fink <? print $fink_version; ?> Installer.pkg" Ã  l'intÃ©rieur de l'image. Suivez les instructions qui s'affichent sur l'Ã©cran.
</p></li>
<li><p>
Ã la fin de l'installation, le script pathsetup s'exÃ©cutera. On vous demandera la permission d'Ã©diter vos fichiers de configuration de shell. Quand le script aura terminÃ©, la configuration sera terminÃ©e et vous pourrez continuer !
</p></li>
<li><p>
Si quelque chose ne se passe pas bien durant le processus, vous pouvez relancer l'application pathsetup Ã  partir de l'image disque de l'installeur, ou exÃ©cuter la commande suivante : 
</p><pre>/sw/bin/pathsetup.sh <RETURN></pre><p>
dans une fenÃªtre de Terminal.app.
(Cette Ã©tape doit Ãªtre rÃ©pÃ©tÃ©e pour tout utilisateur de votre systÃ¨me : chaque utilisateur doit exÃ©cuter pathsetup dans son propre compte.)
</p><p>
Si pathsetup gÃ©nÃ¨re des messages d'erreur, consultez la documentation, en particulier la 
<a href="../doc/users-guide/install.php#setup">section 2.3 "DÃ©finition de votre environnement"</a> du Guide de l'utilisateur.</p>
</li>
<li><p>
Ouvrez une nouvelle fenÃªtre de Terminal.app et exÃ©cutez la commande suivante : "<code>fink scanpackages; fink index</code>", ou utilisez l'application graphique Fink Commander incluse (elle doit Ãªtre placÃ©e dans un rÃ©pertoire rÃ©el sur votre systÃ¨me, et non pas lancÃ©e Ã  partir de l'image disque) et lancez les commandes suivantes Ã  partir de son menu : <em>Source->scanpackages</em> suivie de <em>Source->Tools->index</em>.
</p>
</p></li>
<li><p>Quand ces deux commandes auront Ã©tÃ© exÃ©cutÃ©es, vous devrez mettre Ã  jour le paquet  <code>fink</code>, au cas oÃ¹ il y aurait eu des changements importants depuis la derniÃ¨re version. Ensuite, vous pourrez installer d'autres paquets. Il y a plusieurs maniÃ¨res de le faire :
<ul>
<li>
<p>Utiliser Fink Commander pour choisir et installer des paquets. Fink Commander fournit une interface graphique pour Fink simple Ã  utiliser. C'est la mÃ©thode recommandÃ©e pour les nouveaux utilisateurs, ou les utilisateurs qui ne se sentent pas Ã  l'aise en ligne de commande. Fink Commander a des menus pour les sources et les binaires. Vous devez installer les binaires si vous n'avez pas installÃ© les Developer Tools ou si vous ne voulez pas compiler les paquets vous-mÃªme.
</p>
<ul><li><p>La sÃ©quence Ã  exÃ©cuter dans Fink Commander pour mettre Ã  jour <code>fink</code> Ã  partir des binaires est la suivante :</p>
<ol>
<li>Binary->Update descriptions</li>
<li>Choisissez le paquet <code>fink</code></li>
<li>Binary->Install</li>
</ol></li>
<li><p>La sÃ©quence Ã  exÃ©cuter dans Fink Commander pour mettre Ã  jour <code>fink</code> Ã  partir du source est la suivante :</p>
<ol>
<li>Source->Selfupdate</li> 
<li>Tools->Interact with Fink...
<li>Assurez-vous que  "Accept default response" est sÃ©lectionnÃ© et cliquez sur "Submit".</li>
<li><code>fink</code> et d'autres paquets fondamentaux seront compilÃ©s et lancÃ©s automatiquement.</li>
</ol></li></ul>
<p>Maintenant que vous avez mis Ã  jour <code>fink</code>, vous pouvez installer d'autres paquets.</p>  
<ul>
<li>Pour installer un paquet Ã  partir des binaires, sÃ©lectionnez le paquet et utilisez Binary->Install.</p></li>
<li>Pour installer un paquet Ã  partir du source, sÃ©lectionnez le paquet et utilisez Source->Install</li>
</ul>
</li>
<li>
<p>Utiliser apt-get. Apt-get rÃ©cupÃ¨re et installe les paquets binaires, ce qui vous Ã©vite de perdre du temps Ã  les compiler. Vous devez utiliser cette mÃ©thode ou la mÃ©thode binaire de Fink Commander (voir ci-dessus) si vous n'avez pas installÃ© les Developer Tools.</p>
<p>Pour mettre Ã  jour <code>fink</code>, ouvrez une fenÃªtre de Terminal.app et saisissez <code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>Quand <code>fink</code> sera mis Ã  jour, vous pourrez alors installer d'autres paquets, en utilisant la mÃªme syntaxe, comme dans <code>sudo apt-get install gimp</code> pour installer the Gimp.  Notez, toutefois, que tous les paquets Fink n'existent pas sous forme binaire.</p>
</li>
<li>
<p>Installer Ã  partir du source. Pour mettre Ã  jour <code>fink</code>, exÃ©cutez <code>fink selfupdate</code>.  Choisissez l'option (1), "rsync" lorsqu'on vous demandera la mÃ©thode de mise Ã  jour. Cela mettra automatiquement Ã  jour le paquet <code>fink</code>.</p>
<p>AprÃ¨s mise Ã  jour de <code>fink</code>, vous pourrez utiliser "<code>fink install</code>" pour rÃ©cupÃ©rer et compiler Ã  partir des sources. Par exemple, exÃ©cutez <code>fink install gimp</code> pour installer the Gimp.</p> 
</li> 
</ul>

</li> 
</ol>

<p>
Pour de plus amples informations, voyez les <a
href="../faq/index.php">Questions frÃ©quemment posÃ©es</a> et la <a
href="../doc/index.php">section documentation</a>.
Si vous ne trouvez pas rÃ©ponse Ã  vos questions dans ces documents, voyez la <a
href="../help/index.php">page d'aide</a>.
</p>
<p>
Pour vous tenir informÃ© des nouvelles versions, abonnez-vous Ã  la <a
href="../lists/fink-announce.php">liste de diffusion fink-announce</a>.
</p>

<p>
Le code source des paquets dans l'image disque de l'installeur peut Ãªtre tÃ©lÃ©chargÃ© Ã  partir d'<a
href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">ici</a>.
</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
