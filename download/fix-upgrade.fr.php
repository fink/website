<?
$title = "Réparation du chemin de mise à jour";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2004/11/29 04:27:34 $';

include "header.inc";
?>


<h1>Réparation du chemin de mise à jour</h1>

<p>Certaines versions de Fink posent des problèmes de mises à jour quand on utilise <code>fink selfupdate</code> (au lieu de CVS). On obtient un message indiquant que Fink est à jour, alors que (comme l'indique le message) la version installée n'est pas la plus récente. Voici comment procéder à la mise à jour dans un de ces cas particuliers :</p>
<ol>
<b><p>Fink-0.5.0a -> Fink-0.5.1</p></b>
<li><p>Installez une version plus ancienne du gestionnaire de paquets fink, en exécutant
les commandes suivantes dans une fenêtre de Terminal.app :</p>
<pre>curl -O http://us.dl.sourceforge.net/fink/direct_download/dists/fink-0.5.1/main/binary-darwin-powerpc/base/fink_0.11.1-10_darwin-powerpc.deb
sudo dpkg -i fink_0.11.1-10_darwin-powerpc.deb
rm fink_0.11.1-10_darwin-powerpc.deb</pre>
<li><p>Procédez ensuite à la mise à jour, comme d'habitude, en exécutant <code>fink selfupdate</code>.</p>
</ol>

<?
include "footer.inc";
?>
