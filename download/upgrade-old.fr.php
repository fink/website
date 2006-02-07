<?
$title = "Tableau de mises à jour";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2006/02/07 15:02:16 $';

include "header.inc";
?>

<h1>Tableau de mises à jour de Fink</h1>

<p>
Toute version de Fink depuis la 0.2.0 peut être mise à jour vers la plus récente.
Ceci vaut même pour l'installation de GIMP à partir de MacGIMP.com et d'OpenOSX.com ; leurs premières versions sont toutes deux fondées sur Fink 0.2.1.
Le tableau suivant vous aidera à trouver la meilleure méthode de mise à jour de votre installation Fink.
</p>
<p>
Si vous ignorez la version de Fink en votre possession, exécutez "<code>fink --version</code>" dans une fenêtre du Terminal.
</p>
<p>
Si vous actualisez Fink à partir d'une version antérieure à 0.3.1 et que tetex est installé, vous devez exécuter la commande "fink remove tetex" avant d'effectuer la mise à jour. (Il se peut que vous deviez supprimer les paquets dépendant de tetex, comme lyx, avant de pouvoir désinstaller tetex.)
Après quoi, vous pourrez réinstaller tetex ainsi que les autres paquets supprimés.
</p>
<? 
include "../fink_version.inc";
?>

<p>
La réorganisation du site de SourceForge au printemps 2002 et le déplacement des binaires durant l'été 2002, ont rendu les mises à jour un peu plus délicates.
Pour réussir votre mise à jour, nous vous conseillons de suivre scrupuleusement les instructions de mises à jour.
Il y a des instructions différentes pour les sources et pour les binaires.
</p>
<p>Si vous rencontrez des problèmes dans la mise à jour de sources, consultez <a href="fix-upgrade.php">ces instructions particulières.</a></p>
<?
it_start();
it_item('<b>Installation courante (version binaire)</b>', '<b>Méthode de mise à jour</b>');
it_item("Distribution binaire officielle de Fink, version 0.5.x",
  '<p>Réalisez la mise à jour normalement avec <tt>dselect</tt> : choisissez "[U]pdate",
  puis "[I]nstall".
Ou bien dans <tt>FinkCommander</tt>, lancez "Update" suivie de
"Dist-Upgrade" (toutes deux se trouvent dans le menu <tt>Binary</tt>).</p>');
it_item("Distribution binaire officielle de Fink, version 0.3.x ou 0.4.x",
  '<p>Faites la mise à jour en utilisant soit les <a href="10.1-upgrade.php">
  instructions de mise à jour pour la 10.1</a> ou les <a href="10.2-upgrade.php">instructions
   de mise à jour pour la 10.2</a>.</p>');
it_item("Distribution binaire officielle de Fink, version 0.2.x",
  '<p>Essayez le <a href="puma-kit.php"> kit originel de mise à jour 10.1</a>.  (Les personnes en charge de la maintenance de Fink ne sont plus en mesure de tester cette version.)</p>');
it_item("Installations MacGIMP ou OpenOSX.com de Fink 0.2.1",
  '<p>Essayez le <a href="puma-kit.php">kit originel de mise à jour 10.1</a>.   (Les personnes en charge de la maintenance de Fink ne sont plus en mesure de tester cette version.)
  Assurez-vous d\'installer le paquet <code>system-xfree86</code> avant de procéder à la mise à jour de l\'ensemble des paquets.</p>');
it_item('<b>Installation courante (version source)</b>', '<b>Méthode de mise à jour</b>');
it_item("Sources Fink version 0.2.5 ou ultérieures",
  '<p>Lancez "<tt>fink selfupdate</tt>".  Si vous effectuez la mise à jour de la 10.1 à la 10.2, 
  vous devrez le faire deux fois pour une mise à jour complète.</p>');
it_item("Sources Fink version 0.2.4 ou antérieures (jusqu'à la 0.2.0)",
  "<p>Si la mise à jour s'effectue sous la OS X 10.1, téléchargez les <a href=\"http://prdownloads.sourceforge.net/fink/packages-0.4.1.tar.gz\">paquets </a>, décompactez-les avec l'utilitaire <tt>tar</tt> et exécutez \"<code>./inject.pl</code>\" dans le répertoire packages-0.4.1.</p><p>
Si vous réalisez la mise à jour sous OS X 10.2, téléchargez la <a href=\"http://prdownloads.sourceforge.net/fink/dists-$fink_version.tar.gz\">distribution</a>, décompactez-la avec l'utilitaire <tt>tar</tt> et exécutez \"<code>./inject.pl</code>\" dans le répertoire dists-$fink_version.</p>");
it_end();
?>


<?
include "footer.inc";
?>
