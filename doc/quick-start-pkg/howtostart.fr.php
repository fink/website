<?
$title = "Tutoriel d'empaquetage - Préliminaires";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/10/02 17:04:37';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Tutoriel d\'empaquetage Contents"><link rel="next" href="example.php?phpLang=fr" title="Exemple - le paquet Maxwell"><link rel="prev" href="index.php?phpLang=fr" title="Tutoriel d\'empaquetage Contents">';


include_once "header.fr.inc";
?>
<h1>Tutoriel d'empaquetage - 1. Préliminaires</h1>



<h2><a name="Learn">1.1 Apprentissage des bases</a></h2>
<p><b>Note :</b> dans ce document, nous supposons que <code>fink</code> est installé dans <code>/sw</code> - son emplacement par défaut. Quand vous verrez un bloc de code semblable à celui-ci :</p>
<pre>
finkdev% unecommandequelconque
</pre>
<p>vous devrez alors saisir <code>unecommandequelconque</code> dans Terminal.app ou dans tout autre terminal sur votre Mac.</p>
<p>Vous devez d'abord assimiler quelques concepts de base sur la création de paquets pour Fink. Nous nous suggérons :</p>
<ul>
<li>de lire <a href="http://fink.sourceforge.net/doc/UsingFink.pdf">Utilisation de Fink : un guide pour le développeur</a> (fichier pdf 2MB) - diapositives d'une présentation lors de la <a href="http://conferences.oreillynet.com/macosx2002/">Conférence O'Reilly Mac OS X</a>.
</li>
<li>




de lire et de tenter de comprendre l'<a href="example.php?phpLang=fr#basics">exemple donné ici</a>.</li>
<li>d'étudier d'autres paquets situés dans le répertoire <code>/sw/fink/dists/unstable/main/finkinfo/</code> ou dans le <a href="http://fink.cvs.sourceforge.net/fink/dists/10.3/unstable/">répertoire central CVS en ligne</a> et de prendre un (ou plusieurs) fichier(s) info comme point de départ.</li>
<li>de rechercher dans le <a href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Traqueur de soumissions de paquets</a> si quelqu'un a déjà essayé de construire le même paquet ou dans le <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Traqueur de demandes de paquets</a> s'il existe déjà une requête pour ce paquet. Vous y trouverez une mine de renseignements.</li>
<li>de feuilleter le <a href="http://fink.sourceforge.net/doc/packaging/index.php">Guide de création de paquets</a> si vous souhaitez de plus amples informations sur un sujet particulier.</li>
</ul>

<h2><a name="Make">1.2 Création d'un paquet</a></h2>
<p>Sauvegardez le nouveau fichier info (et le fichier rustine si nécessaire) dans le répertoire <code>/sw/fink/dists/local/main/finkinfo/</code>. Le fichier doit avoir pour nom <code>nomdupaquet.info</code> (et la rustine doit s'appeler <code>nomdupaquet.patch</code>), où <code>nomdupaquet</code> est le nom de votre paquet. Si ce répertoire n'existe pas, vous devez le créer.</p>
<p><b>Note importante :</b> vérifiez que <code>fink</code> est à jour en exécutant la commande :</p>
<pre>
finkdev% fink selfupdate
</pre>
<p>Vérifiez que <code>fink</code> trouve votre paquet en exécutant :</p>
<pre>
finkdev% fink list nomdupaquet
</pre>
<p>S'il n'apparaît pas, vous devez modifier le <a href="http://fink.sourceforge.net/doc/users-guide/conf.php#optional">fichier de configuration de fink</a>, de sorte que l'arborescence locale soit prise en compte.</p>
<p>Vous devrez peut-être réindexer les paquets en exécutant :</p>
<pre>
finkdev% fink index
</pre>
<p>Si vous souhaitez de plus amples informations, lisez le <a href="http://fink.sourceforge.net/doc/packaging/index.php">Guide de création de paquets</a> ou utilisez l'une ou l'autre des différentes <a href="http://fink.sourceforge.net/help/index.php">sources d'aide</a>. Vous devez aussi vous abonner à la liste de diffusion <a href="http://fink.sourceforge.net/lists/index.php">fink-devel</a>.</p>

<h2><a name="Validate">1.3 Validation d'un paquet</a></h2>
<p>Pendant le processus de validation de votre paquet, vous devez régler le niveau de verbosité de <code>fink</code> à la plus haute valeur possible. Voir la section <a href="http://fink.sourceforge.net/doc/users-guide/conf.php#optional">fichier de configuration de fink</a> pour savoir comment le changer.</p>
<p>Vérifiez que votre paquet est valide en exécutant :</p>
<pre>
finkdev% fink validate nomdupaquet.info
</pre>
<p>Si c'est le cas, essayez de construire le paquet en exécutant :</p>
<pre>
finkdev% fink -m --build-as-nobody rebuild nomdupaquet
</pre>
<p>Observez attentivement les messages d'erreur or d'attention du processus de construction. Assurez-vous, en particulier, que tout s'installe dans le répertoire de destination (qui est <code>/sw/src/root-nomdupaquet-%v-%r/sw</code>) à partir duquel <code>fink</code> construit le paquet binaire. Rien ne doit être installé directement dans <code>/sw</code>.</p>
<p>Si vous utilisez l'option <code>--keep-build-dir</code> ou <code>-k</code> de <code>fink</code>, le répertoire de construction sera conservé. C'est là que <code>fink</code> décompresse le fichier source téléchargé et que le paquet est construit. Cela vous aidera à déboguer le processus de construction. Voir <code>man fink</code> pour de plus amples informations.</p>
<p>Vous pouvez aussi utiliser l'option <code>--keep-root-dir</code> ou <code>-K</code>, elle permet de conserver le répertoire de destination. C'est là que <code>fink</code> construit l'arborescence d'installation du paquet. La comparaison entre les répertoires de construction et d'installation peut aider à déboguer la phase d'installation.</p>
<p>Si la construction du paquet se passe bien, vérifiez le contenu du paquet binaire en exécutant :</p>
<pre>
finkdev% dpkg -c /sw/fink/dists/local/main/binary-darwin-powerpc/nomdupaquet.deb
</pre>
<p>Vérifiez que tous les fichiers qui sont censés être dans le paquet se trouvent bien dans le fichier .deb. Rappel : assurez-vous que rien n'est installé directement dans <code>/sw</code>.</p>
<p>Vous pouvez maintenant valider le paquet binaire en exécutant :</p>
<pre>
finkdev% fink validate /sw/fink/dists/local/main/binary-darwin-powerpc/nomdupaquet.deb
</pre>
<p>Si tout est correct, installez le paquet avec :</p>
<pre>
finkdev% fink install nomdupaquet
</pre>
<p>et testez les fonctionnalités de votre paquet.</p>
<p>Si le processus échoue lors d'une des étapes ci-dessus, essayez de corriger les erreurs et recommencez le processus à partir de l'étape <code>fink validate</code>.</p>

<h2><a name="Submit">1.4 Soumission de votre paquet</a></h2>
<p>Si toutes les étapes de vérification de votre paquet énoncées ci-dessus ont été franchies avec succès, vous pouvez soumettre le fichier info (et le fichier patch s'il existe) au <a href="http://sourceforge.net/tracker/?func=add&amp;group_id=17203&amp;atid=414256">Traqueur de soumissions de paquets</a>.</p>
<p>Une personne se chargera d'examiner votre soumission et d'ajouter le paquet à la branche instable de Fink, si le paquet semble correct. Sinon, on vous demandera de mettre le paquet en accord avec les règles de Fink.</p>
<p><b>Note :</b></p>
<ul>
<li>Si possible, ajoutez plusieurs éléments à la fois à la même soumission (c'est-à-dire les fichiers info et patch).</li>
<li>Ajoutez un commentaire mentionnant que votre paquet est prévu pour l'arborescence <code>10.2-gcc3.3</code>, <code>10.3</code>  ou pour les deux</li>
<li>Indiquez dans quelle <code>section</code> (graphics, sci, etc...) vous pensez qu'il doit être mis</li>
<li>Notez que vous avez exécuté <code>fink validate</code> sur les fichiers info et .deb.</li>
<li>Positionnez le champ <code>Group</code> de l'élément sur <code>Undergoing Validation</code> à la création de l'élément. Repositionnez-le sur <code>Undergoing Validation</code> quand vous modifiez les fichiers après qu'un examinateur de soumissions de paquets vous ait demandé de corriger des problèmes dans votre paquet.</li>
</ul>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="example.php?phpLang=fr">2. Exemple - le paquet Maxwell</a></p>
<? include_once "../../footer.inc"; ?>


