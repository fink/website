<?
$title = "Généralités sur les téléchargements";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2004/03/05 01:42:46 $';

include "header.inc";
?>

<h1>Généralités sur les téléchargements</h1>

<p>
Il y a différentes manières de récupérer Fink.
Cette page vous explique les différentes options qui se présentent à vous ainsi que les différences - parfois peu claires - entre elles.
Mais, tout d'abord, vous devez prendre conscience de deux choses importantes :
</p>

<p>
<b>Source ou paquets binaires ?</b>
Un paquet peut se présenter sous deux formes différentes : la forme source ou la forme binaire.
Un paquet binaire est une archive de paquet contenant des programmes précompilés prêts à fonctionner.
Vous pouvez l'utiliser immédiatement, il suffit de le télécharger et de l'extraire (de l'installer).
Un paquet source comprend le code source original, des rustines spécifiques à Fink et des instructions de compilation.
Il faut du temps pour installer un paquet source, car le code source doit être compilé sur votre ordinateur pour produire un programme exécutable.
</p>

<p>
<b>Toutes les installations Fink sont équivalentes.</b>
Quelle que soit la façon dont vous installez Fink, vous  pourrez toujours compiler un paquet spécifique à partir de son source.
De même, vous pourrez toujours installer les paquets binaires que vous téléchargez <u>à condition que Fink soit installé dans le répertoire <tt>/sw</tt></u>.
Il vous suffit, pour cela, d'utiliser les outils appropriés et les procédures de mise à jour adéquates.
</p>

<p>
Quelles sont donc les options d'installation de paquets à votre disposition ?
Les voici, de la plus pratique à la plus avant-gardiste :
</p>

<p>
La <a href="bindist.php">version binaire</a> utilise des paquets binaires.
Elle comprend un installeur graphique pour la première installation et une application qui permet de visualiser et choisir les paquets (dselect).
Elle s'ajuste à la dernière version source ; cela prend en général quelques jours lorsqu'une nouvelle version source est mise à disposition.
Il y a parfois des mises à jour entre les versions.
La mise à jour des nouvelles versions est automatique - utilisez dselect ou apt-get pour récupérer les dernières listes de paquets.
Le désavantage de la version binaire est que tous les paquets ne sont pas disponibles sous forme binaire.
Certains ne correspondent pas à notre standard de qualité, d'autres ne peuvent être distribués sous forme binaire en raison de licences restrictives, et d'autres tombent sous le coup de restrictions à l'exportation (cryptographie).
</p>

<p>
La <a href="srcdist.php">version source</a> compile tout à partir du source (sauf si vous choisissez une autre option) et est contrôlée par des scripts en ligne de commande.
Elle peut se mettre à jour automatiquement à la dernière version avec la commande 'fink selfupdate'.
L'avantage de cette méthode est que vous avez accès à tous les paquets dits 'stable'.
Le désavantage, déjà mentionné, est que la compilation à partir des sources prend du temps et que vous devez taper des commandes pour installer les paquets.
</p>

<p>
Le développement de la distribution Fink se fait sur un serveur CVS.
Vous pouvez la récupérer pour rester à l'avant-garde entre deux versions. 
Son utilisation est la même que celle de la version source, mais vous obtiendrez les descriptions de paquets par d'autres voies.
(Lisez : 'fink selfupdate' ne fonctionne pas dans ce cas.)
Voir les <a href="../doc/cvsaccess/index.php">instructions CVS</a> pour de plus amples informations.
</p>


<?
include "footer.inc";
?>
