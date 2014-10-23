<?php
$title = "Réparation du chemin de mise à jour";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>


<h1>Mise à jour des sources après mise à jour de Mac OS X</h1>
<p>Après avoir mis à jour Mac OS X, la première chose à faire pour mettre à jour Fink via les sources est d'exécuter la commande <code>fink selfupdate</code> de façon à vous assurer que la version du paquet <code>fink</code> installée est compatible avec la nouvelle version du système. Ensuite il faut exécuter <code>sudo /sw/lib/fink/postintstall.pl</code>. Ceci permet de faire pointer Fink sur la distribution adéquate pour le système MAC OS X installé.</p>
<p>Si vous utilisez l'option <em>UseBinaryDist</em>, vous devez exécuter <code>sudo apt-get update</code> de façon à ce que la liste des paquets binaires correspondant à votre système soit utilisée. Enfin, que vous utilisiez ou non l'option <em>UseBinaryDist</em>, vous devez  exécuter <code>fink selfupdate</code> une deuxième fois, car la première exécution n'a téléchargé que les paquets destinés à la version précédente de votre système. </p>

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

<?php
include "footer.inc";
?>
