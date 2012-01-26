<?
$title = "i18n - Annexe";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2011/10/28 15:50:45';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="i18n Contents"><link rel="prev" href="resources.php?phpLang=fr" title="Autres ressources">';


include_once "header.fr.inc";
?>
<h1>i18n - 5. Annexe</h1>


<h2><a name="cvs-codes">5.1 Codes CVS</a></h2>

<p>Quand vous mettrez à jour votre copie locale par CVS, vous verrez parfois des lettres devant les noms de fichiers. Voici ce qu'elles signifient :</p>
<ul>
<li><b>P :</b> il existe une nouvelle version du fichier créée par une rustine.</li>
<li><b>U :</b> il existe une nouvelle version du fichier créée par téléchargement.</li>
<li><b>M :</b> la version dans votre copie locale a été modifiée.</li>
<li><b>C :</b> Votre version est en conflit avec celle du serveur. Vous devez résoudre le conflit en éditant le fichier et en intégrant vos modifications. <p>Pour ce faire, vous pouvez utiliser :</p>
<pre>rm fichier; cvs update fichier</pre>
<p>où <code>fichier</code> représente le fichier concerné, puis appliquez les modifications à partir de la copie de sauvegarde de votre fichier que CVS a créée sous le nom de <code>.#fichier-version</code></p> où <b>version</b> est le numéro de révision avant la mise à jour.</li>
<li><b>? :</b> le fichier n'est ni sur le serveur, ni dans la liste des fichiers à ignorer.</li>
<li><b>A :</b> le fichier a été ajouté, mais le commit n'a pas encore eu lieu.</li>
<li><b>R :</b> le fichier a été supprimé, mais le commit n'a pas encore eu lieu.</li>
</ul>


<? include_once "../../footer.inc"; ?>


