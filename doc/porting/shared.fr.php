<?
$title = "Portage - Code partagé";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/03/22 00:01:29';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Portage Contents"><link rel="next" href="libtool.php?phpLang=fr" title="GNU libtool"><link rel="prev" href="basics.php?phpLang=fr" title="Notions de base">';

include_once "header.inc";
?>

<h1>Portage - 2 Code partagé</h1>
		
		

		<h2><a name="lib-and-mod">2.1 Librairies partagées ou modules chargeables</a></h2>
			
			

			<p>Une caractéristique de Mach-O, qui surprend beaucoup de gens, est la distinction stricte entre les librairies partagées et les modules chargeables dynamiquement. Sur les systèmes ELF, cette distinction n'existe pas ;  n'importe quelle partie de code partagé peut être utilisée comme librairie ou chargée dynamiquement.</p>

			<p>Les librairies partagées de Mach-O ont un type de fichier MH_DYLIB et une extension <code>.dylib</code>. Elles peuvent être liées avec les options statiques habituelles de l'éditeur de liens, par exemple <code>-lfoo</code> pour libfoo.dylib. Toutefois, elles ne peuvent pas être chargées en tant que modules. (Note subsidiaire : les librairies partagées peuvent être chargées dynamiquement par le biais d'une API. Néanmoins, cette API est différente de l'API pour les lots et sa sémantique la rend inutilisable pour une émulation dlopen(). En particulier,  les librairies partagées ne peuvent être déchargées).</p>

			<p>Les modules chargeables sont appelés "lots" dans le jargon Mach-O. Ils ont un type de fichier MH_BUNDLE. Ils peuvent avoir n'importe quelle extension, car aucun des éléments concernés n'en tient compte. Apple recommande l'extension <code>.bundle</code>, mais la plupart des logiciels portés utilisent <code>.so</code> au nom de la compatibilité. Les lots peuvent être chargés dynamiquement et déchargés via les API dyld, et il existe une interface qui émule <code>dlopen()</code> au sommet de l'API. Il est impossible de lier des lots comme s'ils étaient des librairies partagées. Toutefois, il est possible de lier un lot avec des librairies partagées réelles ; celles-ci sont automatiquement chargées lorsque le lot est chargé.</p>

		

		<h2><a name="version">2.2 Numérotation de version</a></h2>
			

			<p>Sur un système ELF, les numéros de versions sont, en général, ajoutés au nom de la librairie partagée, par exemple : <code>libqt.so.2.3.0</code>. Sur Darwin, les numéros de version sont placés entre le nom de la librairie et l'extension, par exemple : <code>libqt.2.3.0.dylib</code>. Notez que cela vous permet de demander une version spécifique de librairie à l'édition de liens, en utilisant <code>-lqt.2.3.0</code> dans l'exemple ci-dessus.</p>

			<p>Lorsque vous créez une librairie partagée, vous pouvez indiquer un nom à utiliser lors de la recherche de la librairie à l'exécution. C'est une pratique usuelle et cela permet d'installer plusieurs versions majeures d'une librairie en même temps. C'est ce qu'on appelle le <code>soname</code> sur les systèmes ELF. Sur Darwin, la différence est que vous pouvez (et devez) indiquer le chemin complet en même temps que le nom du fichier. Ceci élimine la nécessité des options "rpath" et du système de cache ldconfig/ld.so.cache. Pour utiliser une librairie qui n'est pas encore installée, vous pouvez définir la valeur de la variable d'environnement DYLD_LIBRARY_PATH ; voir la man page dyld pour de plus amples informations.</p>

			<p>Le format Mach-O permet aussi un vrai contrôle du numéro de version mineure, inconnu sur les systèmes ELF. Chaque librairie Mach-O portent deux numéros de versions : une version "courante" et une version "compatible". Les deux numéros de versions sont constitués de trois chiffres séparés par des points, par exemple 1.4.2. Le premier chiffre ne peut être nul. Les second et troisième peuvent être omis, ils ont alors la valeur zéro. Quand aucune version n'est spécifiée, le numéro par défaut est 0.0.0, ce qui est une sorte de valeur passe-partout.</p>

			<p>La version "courante" n'est donnée qu'à titre d'information. La version "compatible" sert au contrôle décrit ci-après. Quand un exécutable est lié, le numéro de version de la librairie est copié dans l'exécutable. Lorsque l'exécutable est lancé, le numéro de version copié dans l'exécutable est comparé à celui de la librairie utilisée. dyld génère une erreur d'exécution et arrête l'exécution du programme, sauf si le numéro de version de la librairie utilisée est égal ou supérieur à celui utilisé durant l'édition de liens.</p>

		

		<h2><a name="cflags">2.3 Options de compilation</a></h2>
			

			<p>Par défaut, Darwin génère du code indépendant de la position (PIC). En fait, le code PowerPC est indépendant de la position par construction, si bien qu'il n'y a ni perte de place, ni dégradation de performance. Vous n'avez donc pas besoin de spécifier l'option PIC lors de la compilation d'une librairie partagée ou d'un module. Toutefois, l'éditeur de liens n'admet pas les symboles "common" dans les librairies partagées, si bien que vous devez utiliser l'option de compilation <code>-fno-common</code>.</p>

		

		<h2><a name="build-lib">2.4 Construction d'une librairie partagée</a></h2>
			

			<p>Pour construire une librairie partagée, vous invoquez le compilateur avec l'option <code>-dynamiclib</code>. Voici un exemple qui permettre de mieux comprendre le processus. Nous allons construire une librairie appelée libfoo, composée des fichiers sources source.c et code.c. Le numéro de version est 2.4.5, où 2 est le numéro de révision majeure (changement d'API incompatible), 4 est le numéro de révision mineure (compatible avec un retour à une API antérieure) et 5 est le compteur de révision des bogues (on l'appelle parfois une  mini-révision, elle indique des changements totalement compatibles avec l'API). La librairie ne dépend d'aucune autre librairie partagée et sera installée dans /usr/local/lib.</p>

<pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -dynamiclib -install_name /usr/local/lib/libfoo.2.dylib \
 -compatibility_version 2.4 -current_version 2.4.5 \
 -o libfoo.2.4.5.dylib source.o code.o
rm -f libfoo.2.dylib libfoo.dylib
ln -s libfoo.2.4.5.dylib libfoo.2.dylib
ln -s libfoo.2.4.5.dylib libfoo.dylib</pre>
<p>
Observez quelles sont les parties du numéro de version qui sont utilisées et où elles le sont.
Notez aussi que l'éditeur de liens statiques utilisera le lien symbolique libfoo.dylib,
tandis que l'éditeur de liens dynamique utilisera le lien symbolique libfoo.2.dylib.
Il est possible de faire pointer ces liens symboliques sur différentes révisions mineures de la librairie.
</p>



<h2><a name="build-mod">2.5 Construction d'un module</a></h2>
<p>
Pour construire un module chargeable, vous invoquez le compilateur avec l'option <code>-bundle</code>.
Si le module utilise des symboles provenant du programme hôte, vous aurez à spécifier <code>-undefined suppress</code> pour autoriser des symboles non définis, ainsi que <code>-flat_namespace</code>, indispensable avec le nouvel éditeur de liens de Mac OS X 10.1.
Petit exemple explicatif :
</p>
<pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -bundle -flat_namespace -undefined suppress \
 -o mymodule.so source.o code.o</pre>
<p>
Remarquez qu'aucun numéro de version n'est utilisé.
Il est possible, en théorie, d'en utiliser un, mais, en pratique, cela ne présente aucun intérêt.
Notez aussi qu'il n'y a pas de restriction de nom pour les lots.
Quelques paquets placent un "lib" avant le nom, car certains systèmes l'exigent ; cela ne présente aucun risque.
</p>



<p align="right">
Next: <a href="libtool.php?phpLang=fr">3 GNU libtool</a></p>

<? include_once "footer.inc"; ?>
