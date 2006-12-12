<?
$title = "Guide utilisateur - Mise à niveau";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/12/12 20:59:32';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="next" href="conf.php?phpLang=fr" title="Fichier de Configuration de Fink"><link rel="prev" href="packages.php?phpLang=fr" title="Installation de paquets">';


include_once "header.fr.inc";
?>
<h1>Guide utilisateur - 4. Mise à niveau de Fink</h1>



<p>Ce chapitre explique les procédures utilisées pour mettre à niveau votre installation de Fink à la toute dernière version.</p>

<h2><a name="bin">4.1 Mise à niveau à partir de paquets binaires</a></h2>

<p>Si vous utilisez exclusivement la distribution binaire, vous n'avez pas à suivre une procédure de mise à niveau particulière. Il vous suffit d'utiliser l'outil que vous préférez pour récupérer la liste des paquets les plus récents et lui laisser mettre à jour tous les paquets.</p>
<p>Avec dselect, il suffit d'appuyer sur la touche "[U] - Mise à jour", puis sur "[I] - Installation". Vous pouvez, bien sûr, utiliser "[S] - Sélectionner" entre les deux commandes pour vérifier les choix faits et rechercher de nouveaux paquets.</p>
<p>Avec apt, lancez <code>apt-get update</code> pour récupérer la liste des paquets les plus récents, puis <code>apt-get upgrade</code> pour mettre à jour tous les paquets qui peuvent l'être.</p>
<p>Avec Fink Commander, sélectionnez Binary-&gt;Update descriptions pour mettre à jour la liste des paquets, puis Binary-&gt;Dist-Upgrade packages pour mettre à jour les paquets eux-mêmes.</p>
<p>Pour de plus amples informations, en particulier sur la mise à niveau des versions de Fink antérieure à la version 0.3.0, voir la 
<a href="http://fink.sourceforge.net/download/upgrade.php">Matrice de mise à niveau</a>.</p>

<h2><a name="src">4.2 Mise à niveau de la distribution source</a></h2>

<p>La procédure de mise à niveau se déroule en deux temps si vous utilisez la distribution source. Dans un premier temps, vous téléchargez les descriptions de paquets sur votre ordinateur. Dans un deuxième temps, ces descriptions de paquets sont utilisées pour recompiler les paquets ; le code source est téléchargé, si besoin est.</p>
<p>Si vous avez Fink 0.2.5 ou une version ultérieure, vous pouvez réaliser la première partie de la procédure en lançant <code>fink selfupdate</code>. Cette commande vérifie sur le site web de Fink s'il existe une nouvelle version, la télécharge automatiquement et installe les descriptions de paquets. Avec les versions récentes de la commande <code>fink</code>, vous pouvez récupérer les descriptions de paquets via CVS ou rsync. CVS est un serveur de contrôle de version sur lequel sont stockées et gérées les descriptions de paquets. L'utilisation de CVS présente l'avantage qu'il est continuellement mis à jour, mais il faut savoir qu'il n'existe qu'un seul serveur CVS et qu'il peut devenir non fiable lorsqu'il subit un trafic intense. C'est pourquoi nous recommandons à l'utilisateur moyen de se servir de rsync. Il existe différents miroirs pour rsync et le seul désavantage de cette méthode est qu'il faut compter environ une heure pour que les descriptions de paquets parviennent sur les miroirs rsync après leur mise à jour sur CVS. </p>
<p>(si vous avez des problèmes lors d'une mise à niveau à partir d'une installation source, consultez <a href="http://fink.sourceforge.net/download/fix-upgrade.php">ces instructions spéciales</a>.)</p>
<p>Si vous avez une version de Fink antérieure à 0.2.5, vous devez télécharger les descriptions de paquets vous-même. Allez dans la <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">zone de téléchargement</a> et cherchez l'archive tar la plus récente nommée packages-0.x.x.tar.gz dans le module "distribution". Téléchargez-la et installez-la comme suit :</p>
<pre>tar -xzf packages-0.x.x.tar.gz
cd packages-0.x.x
./inject.pl</pre>
<p>Après la mise à jour des descriptions de paquets (quelle que soit la méthode employée), vous devrez mettre à jour tous les paquets à l'aide de la commande <code>fink update-all</code>.</p>
<p>Pour mettre à jour la distribution source avec Fink Commander, sélectionnez Source-&gt;Selfupdate pour télécharger les nouvelles descriptions de paquets, puis Source-&gt;Update-all pour mettre à jour les paquets obsolètes.</p>

<h2><a name="mix">4.3 Mélange de binaires et de source</a></h2>

<p>Si vous utilisez des paquets binaires précompilés pour certains logiciels et que vous en construisez d'autres à partir du source, vous devrez exécuter les séquences d'instructions des deux méthodes pour mettre à jour votre installation Fink. Tout d'abord, utilisez <code>dselect</code> ou <code>apt-get</code> pour récupérer les versions binaires les plus récentes des paquets, puis utilisez <code>fink selfupdate</code> et <code>fink update-all</code> pour récupérer les descriptions de paquets et mettre à jour les autres paquets.</p>
<p>À partir de la version 0.23.0 de <code>fink</code>, le fait d'utiliser l'option UseBinaryDist (configurable soit avec l'option <a href="usage.php?phpLang=fr#options">--use-binary-dist (ou -b)</a> ou bien dans le <a href="conf.php?phpLang=fr">fichier de configuration de Fink</a>) met à jour automatiquement les descriptions source et binaires lors de l'exécution de la commande <code>fink selfupdate</code>. Dans ce cas, il n'est pas nécessaire d'exécuter la commande <code>apt-get</code>.</p>
<p>Si vous utilisez Fink Commander, sélectionnez Binary-&gt;Update descriptions (Binaire-&gt;Mise à jour des descriptions) pour mettre à jour la liste des paquets, puis Binary-&gt;Dist-Upgrade packages (Binaire-&gt;Mise à jour des paquets de la distribution) pour obtenir les nouvelles versions. Exécutez ensuite Source-&gt;Selfupdate (Source-&gt;Mise à jour automatique) pour télécharger les nouveaux fichiers info des paquets, puis Source-&gt;Update-all (Source-&gt;Tout mettre à jour). Voir les sections précédentes pour de plus amples informations.</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="conf.php?phpLang=fr">5. Fichier de Configuration de Fink</a></p>
<? include_once "../../footer.inc"; ?>


