<?
$title = "Portage - Notions de base";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/03/25 02:58:58';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Portage Contents"><link rel="next" href="shared.php?phpLang=fr" title="Code partagé"><link rel="prev" href="index.php?phpLang=fr" title="Portage Contents">';

include_once "header.inc";
?>

<h1>Portage - 1 Notions de base</h1>
		
		

		<h2><a name="heritage">1.1 D'où vient Darwin ?</a></h2>

			<p>Darwin est un système d'exploitation de type Unix qui est issu de NeXTStep/OpenStep. La tradition veut qu'il fut initialement créé à partir de la version 4.4BSD Lite. L'héritage du système BSD est encore apparent, en fait, récemment, Darwin a été modernisé avec du code FreeBSD et NetBSD.</p>

			<p>Le noyau Darwin est construit sur une combinaison de Mach 3.0 et de BSD, ainsi que sur des fonctionnalités propriétaires comme la couche de pilote orientée objet IOKit. Bien que Mach ait, au départ, une structure de micro-noyau, le noyau BSD qui est installé au-dessus est monolithique, et les deux sont si imbriqués maintenant que l'on peut considérer l'ensemble comme un seul noyau monolithique.</p>

			<p>Les outils utilisateur et les librairies fournies avec Darwin sont, pour la plupart, issues de BSD par opposition à ceux de Linux qui sont des outils GNU. Toutefois, Apple n'est pas aussi strict que d'autres systèmes BSD et a fait des compromis utiles. Par exemple, Apple fournit aussi bien make BSD que make GNU, la commande make de GNU étant celle installée par défaut.</p>
		
		

		<h2><a name="compiler">1.2 Le compilateur et les outils</a></h2>
			
			
			<p>En bref : le compilateur est un dérivé de gcc, mais installé en tant que <code>cc</code> ; vous pouvez avoir besoin de faire des rustines sur des Makefiles. La plupart des paquets ne construiront pas de librairies partagées. Si vous voyez des erreurs relatives à des macros, utilisez l'option <code>-no-cpp-precomp</code>.</p>

			<p>En détail : le chaînage des outils de compilation des Mac OS X Developer Tools est une drôle de bête. Le compilateur est basé sur la suite gcc 2.95.2, avec des modifications pour gérer le langage Objective C et quelques bizarreries de Darwin. Le préprocesseur (<code>cpp</code>) existe en deux versions. L'une correspond au précompilateur standard (issu de gcc 2.95.2),  l'autre est un  précompilateur spécial écrit par Apple, avec gestion des headers précompilés. Ce dernier est celui utilisé par défaut, car il est plus rapide. Toutefois, certains codes ne compilent pas avec le précompilateur Apple, c'est pourquoi vous devez vous servir de l'option <code>-no-cpp-precomp</code> pour utiliser le précompilateur standard. (Note : Je recommandais, auparavant, l'option <code>-traditional-cpp</code>. La sémantique de cette option a légèrement changé avec GCC 3, empêchant la compilation de la plupart des paquets qui l'utilise. <code>-no-cpp-precomp</code> a l'effet désiré aussi bien sur les Developer Tools actuels que sur les futurs compilateurs basés sur GCC 3.)</p>

			<p>L'assembleur est soi-disant basé sur gas 1.38. L'éditeur de liens n'est pas basé sur les outils GNU. Cela pose problème lorsqu'on construit des librairies partagées, étant donné que GNU libtool et les scripts de configuration qu'il génère ne savent pas comment se comporter avec l'éditeur de liens d'Apple.</p>
		
		

		<h2><a name="host-type">1.3 Le type de la machine hôte</a></h2>
			
			
			<p>En bref : si configure échoue avec un message d'erreur 'Can't determine host type' - Impossible de déterminer le type d'hôte, copiez config.guess et config.sub, situés dans /usr/share/libtool (/usr/libexec pour des versions antérieures au 10.2), dans le répertoire courant.</p>

			<p>En détail : le monde GNU utilise un format canonique pour spécifier les types de systèmes. Ce format comporte trois parties : le type de la cpu, le fabricant et le système d'exploitation. Parfois, une quatrième partie est ajoutée - dans ce cas la troisième partie indique le noyau, tandis que la quatrième indique l'OS. Toutes les parties sont en minuscules et sont concaténées en utilisant des tirets. Quelques exemples : <code>i586-pc-linux-gnu</code>, <code>hppa1.1-hp-hpux10.20</code>, <code>sparc-sun-solaris2.6</code>. Le type d'hôte pour Mac OS X 10.0 est <code>powerpc-apple-darwin1.3</code>.</p>

			<p>De nombreux paquets utilisant autoconf doivent connaître le type d'hôte du système sur lesquels ils sont compilés. (Note subsidiaire : il existe, en fait, trois types - hôte, build et cible - pour pouvoir gérer la compilation croisée et le portage. En général, ils sont tous les trois identiques). Vous pouvez soit passer le type d'hôte en paramètre au script configure, soit laisser le script déterminer le type d'hôte.</p>

			<p>Le script configure utilise deux autres scripts pour déterminer les types d'hôtes. <code>config.guess</code> essaie de deviner le type d'hôte, <code>config.sub</code> est utilisé pour valider et donner une forme canonique au type d'hôte. Ces scripts sont maintenus en tant qu'entités séparées, mais sont inclus dans tout paquet qui les utilise. Naguère encore, ces scripts ignoraient totalement Darwin ou Mac OS X. Si vous êtes en présence d'un paquet qui ne reconnaît pas Darwin, vous devez remplacer les config.guess et config.sub inclus dans le paquet. Heureusement, Apple a placé des versions fonctionnelles de ces scripts dans /usr/share/libtool (/usr/libexec pour pre-10.2 OS), il vous suffit donc de les recopier à partir de là.</p>

		

		<h2><a name="librairies">1.4 Librairies</a></h2>
			

			<p>En bref : Vous pouvez tranquillement supprimer <code>-lm</code> des Makefiles, mais vous n'y êtes pas obligé.</p>

			<p>En détail : Mac OS X ne possède pas de librairies libc, libm, libcurses, libpthread, etc... séparées. Elles font toutes parties intégrantes de la librairie système, libSystem. (Dans les versions antérieures, c'était la structure System). Toutefois, Apple a placé des liens symboliques dans /usr/lib, donc l'édition de liens avec  <code>-lm</code> fonctionne. La seule exception est <code>-lutil</code>. Sur d'autres systèmes, libutil contient des fonctions relatives aux pseudo-terminaux et à la gestion des ouvertures de connexion. Ces fonctions font partie de libSystem, mais il n'y a pas de lien symbolique pour fournir libutil.dylib.</p>

		

		<h2><a name="other-sources">1.5 Autres sources d'information</a></h2>
			

			<p>Une autre source d'information pour le portage est le Wiki <a href="http://www.metapkg.org/wiki"> MetaPkg Wiki</a>.</p>

			<p>Vous pouvez aussi lire la note technique d'Apple <a href="http://developer.apple.com/technotes/tn2002/tn2071.html">TN2071</a> : "Porting Command Line Unix Tools to Mac OS X" sur le portage d'outils Unix en ligne de commande sous Mac OS X.</p>

		

	<p align="right">
Next: <a href="shared.php?phpLang=fr">2 Code partagé</a></p>

<? include_once "footer.inc"; ?>
