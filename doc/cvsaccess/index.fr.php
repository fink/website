<?
$title = "Accès CVS à Fink";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/03/16 06:43:56';
$metatags = '';


include_once "header.inc";
?>
<h1>Configuration de l'accès à Fink via CVS</h1>
<!--Generated from $Fink: cvs.fr.xml,v 1.3 2004/03/16 06:43:56 michga Exp $-->
<p>
Fink est développé via CVS.
Cela vous permet de rester à jour entre deux versions et d'avoir toujours les paquets les plus récents.
Cette page vous explique comment configurer une installation Fink existante pour qu'elle puisse être mise à jour via CVS.
Les informations ci-dessous sont applicables à Fink 0.3.x et ultérieure.
</p>
<h2><a name="">Structure CVS de Fink</a></h2>
<p>Fink comporte plusieurs modules CVS. Le module <code>dists</code> (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink/dists/">ViewCVS</a>)
contient les descriptions de paquets et les rustines pour OS X 10.2 et supérieure. Il existe d'autres modules pour les développeurs de Fin. Vous pouvez les afficher, mais ils n'ont aucun intérêt pour la plupart des utilisateurs.</p>
<h2><a name="">Mise à jour des descriptions de paquets</a></h2>
<p>Auparavant, la procédure était compliquée ; mais, avec la version actuelle de Fink, elle s'est grandement simplifiée. Il faut suffit de lancer cette commande :
</p>
<pre>fink selfupdate-cvs</pre>
<p>Fink exécute alors automatiquement toutes les étapes nécessaires. Il récupère les descriptions de paquets les plus récentes et met à jour un certain nombre de paquets fondamentaux (dont le gestionnaire de paquets Fink).
</p>
<p>Si vous êtes derrière un mur pare-feu, consultez <a href="http://fink.sourceforge.net/faq/usage-fink.php#proxy">QFP 3.2</a>.
</p>
<p>Après avoir ainsi mis à jour les descriptions de paquets, vous pouvez mettre à jour les paquets. Pour ce faire, lancez la commande suivante :
</p>
<pre>fink update-all</pre>
<h2><a name="">Mise à jour du gestionnaire de paquets</a></h2>
<p>
<b>Note:</b> Depuis le 20 septembre 2001, il n'est plus utile d'effectuer une mise à jour spéciale pour le gestionnaire de paquets ; il est traité comme n'importe quel autre paquet.
Il est, cependant, toujours possible de le mettre à jour directement via CVS, bien que cela ne soit vraiment utile qu'aux personnes qui créent des paquets.
</p>

<p>Le gestionnaire de paquets doit être mis à jour dans un répertoire distinct à l'aide du script <code>inject.pl</code>. Ce script met dans votre arborescence Fink les descriptions de paquets et les archives tar de fink et des paquets fondamentaux, puis les compile.</p>
<p>La première, vous devez utiliser un répertoire temporaire
(nommé <code>tempdir</code> par exemple) vide (ou qui ne contient pas lui-même un sous-répertoire 'fink'). Voici la procédure à employer :</p>
<pre>cd tempdir
cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login
cvs -z3 -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co fink
cd fink
./inject.pl</pre>
<p>La commande login vous demandera un mot de passe - contentez d'appuyer sur la touche retour chariot. Vous pouvez supprimer le répertoire temporaire à la fin de la procédure, mais si vous le conservez, les mises à jour suivantes en seront facilitées. La procédure sera alors :</p>
<pre>cd tempdir/fink
cvs -z3 update -d
./inject.pl</pre>

<? include_once "../../footer.inc"; ?>


