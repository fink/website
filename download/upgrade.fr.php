<?php
$title = "Tableau de mises à jour";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:38 $';

include "header.inc";
?>

<h1>Tableau de mises à jour de Fink</h1>
<p>Pour les versions de Mac OS X >= 10.2</p>
<h3>Invariance de la version du système Mac OS X</h3>
<p>Toutes les versions en cours de Fink peuvent être mises à jour vers la plus récente correspondant à la version de Mac OS X, c'est-à-dire qu'il <strong>ne faut pas</strong> utiliser le nouvel installeur.</p>
<p>Si vous ignorez la version de Fink en votre possession, exécutez "<code>fink --version</code>" dans une fenêtre du Terminal.</p>
<p>Vous pouvez la comparer à la version la plus récente disponible pour votre OS dans la <a href="../../pdb/package.php/fink">base de données des paquets</a>.</p>
<h2>Mise à jour binaire</h2>
<p>Mettez à jour via<tt>dselect</tt> : choisissez "[U]pdate (mise à jour)" puis "[I]nstall (installation)", ou bien exécutez "<tt>sudo apt-get update ; sudo apt-get dist-upgrade</tt>".</p>
<p>Ou bien dans <em>FinkCommander</em>, choisissez "Update (mise à jour)" suivi de "Dist-Upgrade (mise à jour de la distribution)" dans le menu <tt>Binary (binaire)</tt>.</p>
<h2>Mise à jour du source</h2>
<p>Exécutez "<tt>fink selfupdate</tt>".</p>
<p>Ou bien dans <em>FinkCommander</em>, exécutez Source->selfupdate.</p>
<h3>Nouvelle version du système Mac OS X</h3>
<p>Chaque mise à jour de Mac OS X requiert une stratégie différente. Des instructions spécifiques sont indiquées sur la <a href="http://fink.sourceforge.net/">page d'accueil</a> pour résoudre les éventuels problèmes.</p> 
<h2>Mise à jour binaire</h2>
<ol>
<li>Mettez à jour Fink comme indiqué ci-dessus dans la partie <em>Mise à jour binaire</em> de la section <em>Invariance de la version du système Mac OS X</em> pour obtenir la dernière version de Fink correspondant à la version de votre système Mac OS X.</li>
<li>Si vous envisagez de compiler à partir des sources, vous devez supprimer les anciens Outils de développement en exécutant "<tt>/Developer/Tools/uninstall-devtools.pl</tt>" dans une fenêtre de Terminal.</li>
<li>Mettez à jour votre système Mac OS X.</li>
<li>Mettez à jour Fink et le reste des paquets de nouveau, comme indiqué ci-dessus.</li>
<li>Puis, lorsque vous voudrez compiler un paquet à partir des sources, installez une version des Outils de Développement (XCode) compatible avec votre système Mac OS X.</li>
</ol>
<p></p>
<h2>Mise à jour du source</h2>
<p>La stratégie générale (valable pour toutes les versions de système Mac OS X à la date d'écriture de ce manuel) est la suivante :</p>
<ol><li>Mettez à jour Fink à la dernière version compatible avec votre système Mac OS X, comme indiqué dans la partie <em>Mise à jour du source</em> dans la section <em>Invariance de la version du système Mac OS X</em>. Il n'est pas nécessaire d'activer l'arborescence instable.</li>  
<li>Supprimez les anciens Outils de Développement en exécutant "<tt>/Developer/Tools/uninstall-devtools.pl</tt>" dans une fenêtre de Terminal.</li>
<li>Mettez à jour votre système Mac OS X.</li>
<li>Installez une version appropriée des Outils de Développement (XCode).</li>
<li>Exécutez "<tt>/sw/lib/fink/postinstall.pl</tt>" dans une fenêtre de Terminal. Cela redirige Fink vers la distribution adéquate pour votre version de système Mac OS X.</li>
<li>Exécutez "<tt>fink scanpackages</tt>" dans une fenêtre de Terminal, ou bien "Source->scanpackages" pour les utilisateurs de Fink Commander.</li>
<li>Exécutez "<tt>sudo apt-get update</tt>" dans une fenêtre de Terminal, ou bien Binary->update pour les utilisateurs de Fink Commander.</li>
<p>Les deux commandes précédentes suppriment les erreurs relatives à la distribution binaire.</p>
<li>Exécutez "<tt>fink selfupdate</tt>" dans une fenêtre de Terminal, ou bien Source->selfupdate pour les utilisateurs de Fink Commander.</li>
<li>Exécutez "<tt>fink update-all</tt>" dans une fenêtre de Terminal, ou bien Source->update-all pour les utilisateurs de Fink Commander.
<p>Ceci est nécessaire pour s'assurer que tous les paquets tourneront effectivement sur la version de votre système Mac OS X. Il se peut que vous deviez relancer cette commande pour arriver à ce que tous les nouveaux paquets soient construits.</p></li></ol>
<p>Note : il existe <a href=./upgrade-old.fr.php>ici</a> une version antérieure de ce document. Elle n'est valable que pour les anciennes versions de Fink.</p>

<?php
include "footer.inc";
?>
