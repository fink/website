<?
$title = "Guide utilisateur - Paquets";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/06/08 18:41:30';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="next" href="upgrade.php?phpLang=fr" title="Mise à niveau de Fink"><link rel="prev" href="install.php?phpLang=fr" title="Première installation">';


include_once "header.fr.inc";
?>
<h1>Guide utilisateur - 3. Installation de paquets</h1>



<p>Maintenant que vous avez ce que l'on pourrait appeler une installation Fink, ce chapitre vous explique comment installer les paquets pour lesquels vous vous êtes donné tout ce mal. Avant de passer à l'explication proprement dite de l'installation des paquets à partir des distributions source ou binaire, il convient de noter certains points importants qui s'appliquent aux deux types d'installation.</p>

<h2><a name="bin-dselect">3.1 Installation de paquets binaires avec dselect</a></h2>

<p><code>dselect</code> est un programme qui vous permet de naviguer dans la liste des paquets disponibles et de choisir ceux que vous voulez installer. Il tourne sous Terminal.app, en mode plein écran, et utilise un système de navigation rudimentaire basé sur les touches du clavier. Comme tous les autres outils de gestion de paquets, <code>dselect</code> nécessite les privilèges du super-utilisateur ; vous devez donc soit devenir super-utilisateur avant de l'utiliser, soit utiliser sudo :  </p>
<pre>sudo dselect</pre>
<p><b>Note :</b> <code>dselect</code> ne cohabite pas très bien avec l'application Terminal de Mac OS X. Vous devez exécuter les commandes suivantes avant de l'utiliser, ou les mettre dans le fichier de démarrage approprié  (<code>.cshrc</code> ou <code>.profile</code>) :</p>
<p>utilisateurs de tcsh :</p>
<pre>setenv TERM xterm-color</pre>
<p>utilisateurs de bash :</p>
<pre>export TERM=xterm-color</pre>
<p>Le menu principal vous laisse le choix entre plusieurs actions :</p>
<ul>
<li>
<p><b>[A]ccess - Accès</b> - permet de configurer la méthode d'accès au réseau. <b>Il n'est pas nécessaire d'exécuter cette commande</b>, car Fink effectue la configuration à votre place. En fait, vous devez éviter d'utiliser cette option, car vous risqueriez en le faisant de remplacer la configuration par défaut, qui fonctionne, par une configuration qui ne fonctionne pas.</p>
</li>
<li>
<p><b>[U]pdate- Mise à jour</b> - permet de télécharger la liste des paquets disponibles sur le site de Fink. Cette commande n'installe et ne met à jour aucun paquet, elle ne fait que mettre à jour les listes utilisées par le navigateur de paquets. 
Vous devez l'utiliser au moins une fois après avoir installé Fink.</p>
</li>
<li>
<p><b>[S]elect - Sélection</b> - donne accès à la liste des paquets et permet de sélectionner / désélectionner les paquets que vous désirez. De plus amples détails seront donnés plus loin.</p>
</li>
<li>
<p><b>[I]nstall - Installation</b> - c'est là que tout se passe. Les articles de menus ci-dessus n'affectent que les listes de paquets de dselect et le le statut de la base de données. Cette commande va télécharger et installer les paquets sélectionnés auparavant. Elle supprime aussi les paquets désélectionnés dans le navigateur.</p>
</li>
<li>
<p><b>[C]onfig - Configuration</b> et <b>[R]emove - Suppression</b>. Ce sont d'anciennes commandes qui datent de la période antérieure à apt. Vous n'en avez pas besoin, mais elles ne sont pas dangereuses.</p>
</li>
<li>
<p><b>[Q]uit - Quitter</b> - commande qui dit bien ce qu'elle veut dire.</p>
</li>
</ul>
<p>Vous passerez la plupart de votre temps dans le navigateur de paquets de dselect, que vous pouvez activer par le menu "[S]elect". Avant d'afficher la liste des paquets, dselect affiche un écran d'aide. Vous pouvez appuyer sur la touche 'k' pour avoir la liste complète des raccourcis clavier ou appuyez sur la barre d'espacement pour obtenir la liste des paquets.</p>
<p>Vous pouvez vous déplacer dans la liste en utilisant les flèches directionnelles haute et basse. La sélection se fait à l'aide des touches '+' et '-'. Quand vous sélectionnez un paquet qui dépend d'autres paquets, dselect affiche une liste des dépendances requises. Dans la plupart des cas, il vous suffit d'appuyer sur la touche retour chariot pour entériner les choix de dselect. Vous pouvez aussi modifier les choix de dselect dans la liste de dépendances (par exemple, choisir un autre paquet pour une dépendance virtuelle), ou appuyez sur 'Majuscules-R' pour retourner à l'état précédent. Vous quitterez la liste des dépendances et la liste principale des paquets en appuyant sur la touche retour chariot. Quand vous avez fini vos sélections, quittez la liste principale et utilisez le menu "[I]nstall" pour installer les paquets.</p>

<h2><a name="bin-apt">3.2 Installation de paquets binaires avec apt-get</a></h2>

<p><code>dselect</code> ne télécharge pas les paquets lui-même.   Il utilise apt pour ce faire.   Si vous préférez utiliser une interface en ligne de commande, vous pouvez accéder à apt directement avec la commande <code>apt-get</code>.</p>
<p>Tout comme avec dselect, vous devez d'abord télécharger la liste des paquets disponibles avec cette commande :</p>
<pre>sudo apt-get update</pre>
<p>Comme le menu "[U]pdate - Mise à jour" dans dselect, cette commande ne fait que mettre à jour la liste des paquets disponibles, mais ne met pas à jour les paquets eux-mêmes sur votre ordinateur. Pour installer un paquet, il suffit de donner son nom à apt-get comme dans la commande suivante :</p>
<pre>sudo apt-get install lynx</pre>
<p>Si apt-get détecte que le paquet requiert certaines dépendances, il vous en affiche la liste et vous demande de confirmer. Puis il télécharge et installe les paquets choisis. La suppression de paquets est tout aussi simple :</p>
<pre>sudo apt-get remove lynx</pre>
<p>      </p>

<h2><a name="bin-exceptions">3.3 Installation de paquets dépendants non disponibles dans la distribution binaire</a></h2>

<p>Parfois, lors de l'installation d'un paquet binaire, il arrive qu'un message s'affiche vous signalant qu'une dépendance ne peut être installée, par exemple :</p>
<pre>Sorry, but the following packages have unmet
dependencies:
foo: Depends: bar (&gt;= version) but it is
not installable
E: Sorry, broken packages</pre>
<p>Dans ce cas, cela veut dire que le paquet que vous tentez d'installer dépend d'un autre paquet qui ne peut être distribué sous forme binaire à cause d'une restriction de licence. Vous devez alors installer la dépendance sous sa forme source (voir la section suivante).</p>

<h2><a name="src">3.4 Installation de paquets binaires et de source avec fink</a></h2>

<p>L'outil <code>fink</code> vous permet d'installer des paquets non encore disponibles dans la <a href="intro.php?phpLang=fr#src-vs-bin">distribution binaire</a>.</p>
<p>Tout d'abord, vous devez installer une version adéquate des Developer Tools (outils de développement) sur votre système. Ceux-ci sont disponibles gratuitement après enregistrement sur <a href="http://connect.apple.com">http://connect.apple.com</a>.</p>
<p>Pour obtenir la liste des paquets disponibles à partir des sources, utilisez l'outil <code>fink</code> :</p>
<pre>fink list</pre>
<p>La première colonne de la liste affiche le statut d'installation (vide si le paquet n'est pas installé, <code>i</code> s'il est installé et <code>(i)</code> s'il existe une version plus récente que la version installée. La seconde colonne donne le nom du paquet, la troisième sa version et la dernière une brève description. Vous pouvez obtenir une description plus détaillée d'un paquet particulier avec la commande 
"describe" ( ou "info") :</p>
<pre>fink describe xmms</pre>
<p>Si vous voulez installer un paquet, utilisez la commande 
"install" :</p>
<pre>fink install wget-ssl</pre>
<p>La commande <code>fink</code> vérifie tout d'abord que toutes les "dépendances" requises sont présentes sur votre système. Si ce n'est pas le cas, elle vous demandera de confirmer l'installation de celles qui sont manquantes. Ensuite, elle télécharge le code source, le décompresse, lui applique des rustines, le compile et installe le paquet résultant sur votre système. Tout ceci peut prendre un certain temps. Si des erreurs se produisent durant le processus, consultez tout d'abord les 
<a href="http://fink.sourceforge.net/faq/">QFP</a>.</p>
<p>À partir de la version 0.23.0 de <code>fink</code>, vous pouvez télécharger des paquets binaires pré-compilés, s'ils sont disponibles, au lieu de les compiler vous-même. Il suffit pour cela d'utiliser l'option <a href="usage.php?phpLang=fr#options">--use-binary-dist (ou -b)</a> de <code>fink</code>. Cela vous permettra de gagner beaucoup de temps. Par exemple :</p>
<pre>fink --use-binary-dist install wget-ssl</pre>
<p>ou</p>
<pre>fink -b install wget-ssl</pre>
<p>charge d'abord toutes les dépendances de wget-ssl disponibles dans la distribution binaire et ne compile que celles qui ne le sont pas à partir du source. Vous pouvez activer de façon permanente cette option dans le <a href="conf.php?phpLang=fr">fichier de configuration de Fink</a> (fink.conf) ou en exécutant la commande <code>fink configure</code>.</p>
<p>Vous trouverez de plus amples informations sur l'outil <code>fink</code> dans le chapitre <a href="usage.php?phpLang=fr">"Utilisation de l'outil fink en ligne de commande"</a>.</p>

<h2><a name="fink-commander">3.5 Fink Commander</a></h2>

<p>Fink Commander est une interface Aqua aux outils <code>apt-get</code> et <code>fink</code>.  Le menu Binary (binaire) vous permet d'effectuer des opérations sur la distribution binaire, et le menu Source vous offre les mêmes possibilités pour la distribution source.</p>
<p>Fink Commander est inclus dans l'installeur binaire de Fink. Pour le télécharger séparément (dans le cas où vous avez effectué un bootstrap de Fink à partir du source), ou pour de plus amples informations, allez sur le <a href="http://finkcommander.sourceforge.net">site web de Fink Commander</a>.</p>

<h2><a name="available-versions">3.6 Versions disponibles</a></h2>

<p>Lorsque vous voulez installer un paquet, vous devez d'abord rechercher dans la <a href="http://fink.sourceforge.net/pdb/index.php">base de données des paquets</a> s'il est disponible via Fink. Les éventuelles versions disponibles apparaissent dans plusieurs lignes d'un tableau. Voici à quoi elles correspondent :</p>
<ul>
<li>Distribution binaire
<ol>
<li><p><b>0.4.1 :</b> c'est la version qui peut être installée à partir des binaires pour Mac OS X 10.1.</p></li>
<li><p><b>0.6.4 :</b> c'est la version qui peut être installée à partir des binaires pour Mac OS X 10.2.</p></li>
<li><p><b>0.7.2 :</b> c'est la version de base qui peut être installée à partir des binaires pour Mac OS X 10.3. Si vous <a href="upgrade.php?phpLang=fr">mettez à niveau</a> Fink, il se peut qu'il existe une version plus récente pour certains paquets.</p></li>
<li><p><b>0.8.1 :</b> c'est la version de base qui peut être installée à partir des binaires pour Mac OS X 10.4. Si vous <a href="upgrade.php?phpLang=fr">mettez à niveau</a> Fink, il se peut qu'il existe une version plus récente pour certains paquets.</p></li>
</ol>
</li>
</ul>
<ul>
<li>Distributions CVS/rsync
<ol>
<li><p><b>10.2-gcc3.3 stable :</b> c'est la version stable la plus récente qui puisse être installée à partir du source pour Mac OS X 10.2 avec la mise à jour de <code>gcc 3.3</code> contenue dans les Developer Tools. Pour installer cette version, il vous faut activer (si ce n'est déjà fait) l'accès par <a href="http://fink.sourceforge.net/doc/cvsaccess/index.php">CVS</a> ou rsync. Si vous n'avez pas mis à jour <code>gcc 3.3</code>, il se peut que cette version (ou peut-être même le paquet) n'apparaisse pas dans la liste.</p>
<p>Note : au contraire d'autres projets, Fink distribue les versions les plus récentes des paquets via CVS, tout comme les versions qui requièrent encore certains tests (voir la section instable plus loin). L'activation de CVS ou de rsync vous donne accès aux nouvelles versions binaires des paquets avant que la distribution binaire ne soit mise à jour.</p></li>
<li><p><b>10.3 stable :</b> c'est la version la plus récente qui puisse être installée à partir du source sur Mac OS X 10.3.</p></li> 
<li><p><b>10.4-transitional stable :</b> c'est la version la plus récente qui puisse être installée à partir du source de l'arborescence stable sur Mac OS X 10.4 pour les utilisateurs qui sont passés de la version système Mac OS X 10.3 à Mac OS X 10.4. Pour machine avec processeur PowerPC uniquement</p></li> 
<li><p><b>10.4/powerpc stable :</b> c'est la version la plus récente qui puisse être installée à partir du source de l'arborescence stable sur Mac OS X 10.4 pour les utilisateurs qui installent fink pour la première fois. Pour machine avec processeur PowerPC uniquement.</p></li>
<li><p><b>10.4/intel stable :</b> c'est la version la plus récente qui puisse être installée à partir du source de l'arborescence stable sur Mac OS X 10.4 pour les utilisateurs dont la machine a un processeur Intel.</p></li>
<li><p><b>10.2-gcc3.3 unstable :</b> c'est la version instable la plus récente qui puisse être installée à partir du source sur Mac OS X 10.2 avec <code>gcc 3.3</code>.  Pour installer cette version, suivez les <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">instructions</a> sur l'installation des paquets instables.</p>
<p>Note : instable ne veut pas nécessairement dire non utilisable, cependant sachez que vous installez ces paquets à vos risques et périls.</p>
</li>
<li><b>10.3 unstable :</b> c'est la version la plus récente qui puisse être installée à partir du source de l'arborescence instable sur Mac OS X 10.3.</li>
<li><b>10.4-transitional unstable :</b> c'est la version la plus récente qui puisse être installée à partir du sourcede l'arborescence instable sur Mac OS X 10.4 pour les utilisateurs qui sont passés de la version système Mac OS X 10.3 à Mac OS X 10.4. Pour machine avec processeur PowerPC uniquement.</li>
<li><p><b>10.4/powerpc unstable :</b> c'est la version la plus récente qui puisse être installée à partir du source de l'arborescence instable sur Mac OS X 10.4 pour les utilisateurs qui installent fink pour la première fois. Pour machine avec processeur PowerPC uniquement.</p></li>
<li><p><b>10.4/intel unstable :</b> c'est la version la plus récente qui puisse être installée à partir du source de l'arborescence instable sur Mac OS X 10.4 pour les utilisateurs dont la machine a un processeur Intel.</p></li>
</ol>
</li>
</ul>

<h2><a name="x11">3.7 Implémentation de X11</a></h2>

<p>De nombreux paquets de Fink requièrent que X11 soit installé. C'est pourquoi l'une des premières choses à faire est de choisir quelle implémentation vous désirez.</p>
<p>Comme il existe plusieurs implémentations possibles de X11 sur Mac OS X (X11 d'Apple, XFree86, X.org) et plusieurs façons de les installer (manuellement ou via Fink), vous avez le choix entre plusieurs paquets - un par type d'implémentation/installation. Voici la liste des paquets disponibles et des méthodes d'installation de X11 :</p>
<ul>
<li>
<p><b>xfree86, xfree86-shlibs :</b> installez ces deux paquets pour XFree86 4.3.0 (uniquement pour Mac OS X 10.2), 4.4.0 (pour Mac OS X 10.2 ou Mac OS X 10.3) ou 4.5.0 (pour Mac OS X 10.3 ou Mac OS X 10.4).</p>
</li>
<li>
<p><b>xorg, xorg-shlibs :</b> (pour Mac OS X 10.3 ou Mac OS X 10.4). Installez ces deux paquets pour avoir la version 6.8.2 de la distribution X11 de X.org.10.1 ou 10.2). Ce paquet correspond à une installation.</p>
</li>
<li>
<p><b>system-xfree86 + -shlibs, -dev :</b> ces paquets sont générés automatiquement (avec Fink 0.6.2 ou une version ultérieure) quand vous installez X11 d'Apple ou que vous installez manuellement XFree86 ou X.org. Ils tiennent lieu alors de paquets fantômes pour les dépendances.</p>
</li>
<li>
<p><b>xfree86-base, xfree86-rootless [-threaded] + -shlibs, -dev :</b> (uniquement pour Mac OS X 10.1 ou Mac OS X 10.2). Ces paquets installent une version complète de XFree86 4.2.1.1 (4.2.0 sur Mac OS X 10.1). La variante <code>-threaded</code> était fournie pour les applications qui l'exigeaient. Cette fonctionnalité est incorporée par défaut dans les versions ultérieures de XFree86. Les paquets <code>-rootless</code> inclut le serveur d'affichage XDarwin - le nom est resté le même.</p>
<p>Vous devez installer les six paquets pour construire des paquets basés sur X11 à partir des sources.</p>
</li>

</ul>
<p>Pour de plus amples informations sur l'installation et l'utilisation de X11, voir le document <a href="http://fink.sourceforge.net/doc/x11/">X11 sur Darwin et Mac OS X</a>.</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade.php?phpLang=fr">4. Mise à niveau de Fink</a></p>
<? include_once "../../footer.inc"; ?>


