<?
$title = "Tableau de mises à jour";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2006/01/16 23:26:45 $';

include "header.inc";
?>

<h1>Tableau de mises à jour de Fink</h1>

<p>Toutes les versions en cours de Fink peuvent être mises à jour vers la plus récente correspondant à la version de Mac OS X, c'est-à-dire qu'il <strong>ne faut pas</strong> utiliser le nouvel installeur.</p>
<p>Si vous ignorez la version de Fink en votre possession, exécutez "<code>fink --version</code>" dans une fenêtre du Terminal.</p>
<p>Vous pouvez la comparer à la version la plus récente disponible pour votre OS dans la <a href="../../pdb/package.php/fink">base de données des paquets</a>.</p>

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
