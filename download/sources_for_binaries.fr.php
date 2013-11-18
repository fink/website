<?
$title = "Getting the Source Files for Binary Packages";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2013/11/18 20:22:21 $';

include "header.inc";
?>

<h1>Obtention des fichiers sources correspondant aux paquets binaires</h1>
<p>Fink permet d'installer des versions précompilées des paquets de l'arborescence "stable", lorsque leur licence l'autorise. La plupart de ces paquets sont publiés sous licence publique GPL (GPL) et le projet Fink prend au sérieux ses obligations vis-à-vis de cette licence.
</p>
<p>Les <a href="http://bindist.finkmirrors.net/">Répertoires archives</a> permettent à l'utilisateur d'obtenir ces paquets binaires ou les fichiers sources, les rustines et les instructions de compilation correspondant à ces paquets. Le processus est, en général, automatique : quand fink télécharge un paquet binaire fourni par le projet Fink, il est téléchargé à partir de ces répertoires archives ; lorsqu'il télécharge un fichier source, il est généralement téléchargé à partir du dépôt source de ces répertoires archives (via les miroirs sources "Maître"). Les répertoires archives permettent d'obtenir les fichiers manuellement, en particulier les paquets binaires, ainsi que leurs fichiers sources associés.</p>
<p>Les répertoires archives sont organisés de la manière suivante : chaque "distribution" (spécifique à une version donnée de Mac OS X) est divisée en sections "main" et "crypto" ; celles-ci sont à leur tour subdivisées. Les répertoires <code>binary-darwin-<em>architecture</em></code>, où architecture correspond à "powerpc" ou "i386" par exemple, contiennent les paquets binaires ; ces répertoires sont eux-mêmes subdivisés par thèmes. Les répertoires <code>finkinfo</code> contiennent les fichiers d'instruction de compilation, les rustines et les répertoires <code>source</code> qui hébergent les fichiers sources.</p>
<p>De cette façon, l'utilisateur peut obtenir à partir du nom d'un paquet non seulement les sources, mais aussi tous les fichiers nécessaires - rustines, instructions de compilation - utilisés pour créer la version binaire. La syntaxe utilisée dans les fichiers de compilation est expliquée en détail dans <a href="../doc/packaging/index.php">Construction de paquets</a>. Notez que certains fichiers de compilation sont utilisés pour construire plusieurs paquets. On peut rechercher le fichier de compilation d'un paquet donné soit dans un répertoire particulier en balayant tous les fichiers de compilation, soit dans <a href="http://pdb.finkproject.org/pdb/index.php">Paquets</a> en recherchant son paquet "Parent".</p>
<p>Enfin, l'installeur Fink, qui utilise l'application Installer d'Apple pour installer un squelette pour fink, est distribué via la page <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">Files</a> du projet Fink sur SourceForge.net. Comme tels, les fichiers sources des paquets binaires inclus dans l'installeur sont aussi hébergés sur Sourceforge.net : l'installeur est inclus dans le paquet "distribution" et les fichiers sources dans les paquets "miscellaneous/bootstrap" et "fink".</p>

<?
include "footer.inc";
?>
