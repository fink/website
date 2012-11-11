<?
$title = "Utilisation de X11 - Installation de X11";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=fr" title="Lancement de X11"><link rel="prev" href="history.php?phpLang=fr" title="Historique">';


include_once "header.fr.inc";
?>
<h1>Utilisation de X11 - 3. Récupération et installation de X11</h1>


<h2><a name="fink">3.1 Installation de X11 via Fink</a></h2>

<p>Fink vous permet d'installer X11 de nombreuses façons ; entre autres,  il fournit aussi ses propres paquets XFree86. Si vous utilisez, <code>fink install ...</code>, il téléchargera le code source et le compilera sur votre ordinateur. Si vous utilisez <code>apt-get install ...</code> ou l'interface <code>dselect</code>, il téléchargera des paquets binaires précompilés, identiques à ceux de la distribution officielle XFree86.</p>
<p><b>Notes générales</b> :</p>
<ul><li>Tous les paquets X11 disponibles actuellement via Fink gèrent à la fois les opérations plein écran et sans racine, ainsi que OpenGL.</li>
<li><b>Note importante</b> : certains fichiers ne sont pas situés au même endroit dans les différentes versions de X11. Cela signifie, qu'en général, si vous tentez de passer à une version inférieure de X11, les binaires (programmes exécutables, etc...) ne fonctionneront plus. Vous devrez alors reconstruire les paquets concernés par ce phénomène.
<p>L'inverse n'est pas vrai : les paquets construits avec une ancienne version de X11 fonctionnent en général avec une version ultérieure.</p>
<p>Pour 10.3 et 10.4, la hiérarchie X11 (postériorité du code source) est la suivante :</p>
<pre>xorg &gt; xfree86 &gt; X11 d'Apple</pre>
</li></ul>
<p><b>Utilisateurs 10.4</b> :</p>
<p>Vous pouvez installer la version 4.5.0-23 de XFree86 à partir du source. Vous devez installer les deux paquets <code>xfree86</code> et <code>xfree86-shlibs</code> pour obtenir une installation parfaitement fonctionnelle.</p>
<p>Vous pouvez aussi installer la version X11 de X.org (version 6.8.2-35 à la date de rédaction de ce manuel) à l'aide des paquets <code>xorg</code> et <code>xorg-shlibs</code>, situés dans l'arborescence instable. Cette version de X11 est similaire à la version 4.5 de XFree86, mais elle corrige certains bogues, apporte de nouvelles fonctionnalités et supprime certaines parties de code sur lesquels il existe des problèmes de licence.</p>
<p><b>Utilisateurs 10.3</b> :</p>
<p>Vous pouvez installer la version 4.4.0-13 (celle qui est dans la distribution binaire à la date de rédaction de ce manuel) ou la version 4.5.0-13 (celle qui est disponible sous forme source). Les paquets <code>xfree86</code> et <code>xfree86-shlibs</code> sont tous les deux nécessaires à une installation complètement fonctionnelle.</p>
<p>Vous pouvez aussi installer la version X11 de X.org (version 6.8.2 à la date de rédaction de ce manuel) à l'aide des paquets <code>xorg</code> et <code>xorg-shlibs</code>, comme indiqué ci-dessus..</p>

<p><b>Utilisateurs 10.2</b> :</p>
<p>Les utilisateurs de la version Mac OS X 10.2 peuvent installer la version 4.3 sous forme source ou binaire, et la version 4.4 à partir de l'arborescence instable. Comme indiqué ci-dessus, vous devrez installer les deux paquets <code>xfree86</code> et <code>xfree86-shlibs</code>.</p>

<p>XFree86 4.2.1.1 est aussi disponible pour les utilisateurs de Mac OS X 10.2, sous forme <code>normale</code> ou <code>avec processus légers (-threaded)</code>, bien que ces versions soient considérées comme obsolètes (les versions ultérieures de X11 gèrent toutes les processus légers). Les paquets <code>xfree86-base</code>, <code>xfree86-base-shlibs</code>, <code>xfree86-shlibs</code> et <code>xfree86-rootless-shlibs</code> - ou leurs équivalents pour <code>processus légers (-threaded)</code> - doivent tous être installés pour obtenir une version fonctionnelle de XFree86. De plus, il faut installer les paquets <code>xfree86-base-dev</code> et <code>xfree86-rootless-dev</code> packages - ou leurs équivalents pour <code>processus légers (-threaded)</code> - pour empêcher Fink d'installer une version plus récente.</p>

<p><b>Utilisateurs 10.1</b> :</p>
<p>Vous ne pouvez installer que la version 4.2.0 de la distribution binaire. Il faudra installer les paquets <code>xfree86-base</code> et <code>xfree86-rootless</code>.</p>

<h2><a name="apple-binary">3.2 Binaires d'Apple</a></h2>

<p>Le 7 janvier 2003, Apple a mis à disposition <a href="http://www.apple.com/macosx/x11/">une implémentation X11 personnalisée basée sur XFree86-4.2</a>, qui incluait un rendu Quartz et l'accélération OpenGL. Une nouvelle version est sortie le 10 Février 2003, qui comportait des fonctionnalités supplémentaires et des corrections de bogues. Une troisième version (la Bêta 3) est sortie le 17 mars 2003 avec de nouvelles fonctionnalités et des corrections de bogues. Cette version peut être utilisée sur Jaguar.</p>
<p>Le 24 octobre 2003, Apple a sorti Panther (10.3), qui inclut sa propre version de X11. Cette version est basée sur XFree86-4.3.</p>
<p>Le 29 avril 2005, Apple a sortiTiger (10.4), qui inclut sa propre version de X11. Cette version est basée sur XFree86-4.4.</p>
<p>Pour utiliser les binaires d'Apple, vous devez d'une part vous assurer que le paquet <b>X11 User</b> est installé et, d'autre part <a href="/doc/users-guide/upgrade.php">mettre à jour</a> Fink.</p>
<p>Avec <code>fink-0.16.2</code>, vous devez aussi installer le paquet <b>X11 SDK</b>. Ensuite, Fink créera un paquet virtuel <code>system-xfree86</code>.</p>
<p>Avec <code>fink-0.17.0</code> et les versions ultérieures, n'installez le paquet X11 SDK que si vous souhaitez construire des paquets à partir du source. Dans ce cas, même si vous n'avez pas installé le SDK, il y aura création des paquets virtuels <code>system-xfree86</code> et <code>system-xfree86-shlibs</code>, ce dernier correspondant aux librairies partagées. Si vous installez le SDK, il y aura création d'un paquet <code>system-xfree86-dev</code>, représentant les headers.</p>
<p>Si vous avez déjà installé une distribution XFree86, que ce soit avec Fink ou non, vous pouvez suivez les  <a href="inst-xfree86.php?phpLang=fr#switching-x11">instructions de remplacement d'un paquet X11 par un autre</a>. Supprimez vos paquets existants, puis installez X11 d'Apple (et, éventuellement, X11 SDK).</p>
<p>Notes au sujet de l'utilisation de X11 d'Apple :</p>
<ul>
<li>
<p>Le paquet <code>autocutsel</code> n'est plus nécessaire. Vous devez le désactiver avant de démarrer X11 d'Apple, dans le cas où il serait activé.</p>
</li>
<li>
<p>X11 d'Apple utilise votre fichier de configuration <code>~/.xinitrc</code>, s'il existe. Si vous voulez profiter au maximum de l'intégration Quartz, utilisez <code>/usr/X11R6/bin/quartz-wm</code> comme gestionnaire de fenêtres, ou supprimez complètement votre fichier <code>~/.xinitrc</code>.</p>
<p>Si vous voulez simplement pouvoir copier-coller, mais désirez utiliser un autre gestionnaire de fenêtres, vous pouvez vous baser sur l'exemple suivant :</p>
<pre>/usr/X11R6/bin/quartz-wm --only-proxy &amp;
exec /sw/bin/fvwm2</pre>
<p>Vous pouvez, bien entendu, utiliser un autre gestionnaire de fenêtres, <code>startkde</code>, etc...</p>
</li>
<li>
<p><code>quartz-wm</code> ne gère pas complètement les astuces des gestionnaires de fenêtres Gnome/KDE. Vous observerez peut-être des comportements étranges dans des fenêtres qui ne devraient pas avoir d'ornements, mais en ont pourtant.</p>
</li>
<li>
<p>X11 d'Apple ne respecte pas, par défaut, les configurations d'environnement de Fink. Pour démarrer des applications installées via Fink (par exemple : gestionnaires de fenêtres,  gnome-session ou d'autres applications situées dans le répertoire <code>/sw/bin</code>), placez la ligne suivante dans les premières lignes du fichier <code>~/.xinitrc</code> (c'est-à-dire après l'initialisation "<code>#!/bin/sh</code>", mais avant de démarrer tout autre programme) :</p>
<pre> . /sw/bin/init.sh
</pre>
<p>de façon à ce que votre environnement Fink soit initialisé. <b>Note</b> : <code>init.sh</code> est utilisé au lieu de <code>init.csh</code>, car <code>.xinitrc</code> est lancé par <code>sh</code> au lieu de <code>tcsh</code>.</p>
</li>
<li>
<p>Les applications qui appellent d'autres programmes situés dans l'arborescence de Fink pour réaliser certaines de leurs fonctions doivent subir un traitement spécial pour que l'on puisse les appeler à partir du menu Applications. Au lieu de mettre le chemin complet du fichier, par exemple :</p>
<pre>/sw/bin/emacs</pre>
<p>vous devez utiliser une commande semblable à la suivante, si vous utilisez le shell bash :</p>
<pre>. /sw/bin/init.sh ; emacs</pre>
<p>et si vous utilisez le shell tcsh, une commande semblable à celle-ci :</p>
<pre>source /sw/bin/init.csh ; emacs</pre>
<p>Ceci garantit que l'application aura un PATH correct. Vous pouvez utiliser cette syntaxe pour toute application installée via Fink.</p>
</li>
<li>
<p>Si vous tentez de compiler un paquet avec X11 d'Apple et que vous obtenez une erreur du genre suivant :</p>
<pre>ld: err.o illegal reference to symbol: _XSetIOErrorHandler 
defined in indirectly referenced dynamic library 
/usr/X11R6/lib/libX11.6.dylib</pre>
<p>assurez-vous alors que le drapeau <code>-lX11</code> existe à l'édition de liens. Vérifiez les options de compilation de votre paquet pour voir comment fournir ce paramètre.</p>
</li>
<li>
<p>Si vous utilisez le paquet <code>xfree86</code> et que vous changiez plus tard pour X11 d'Apple (sur 10.2.x ou 10.3.x), vous devez recompiler tout paquet compilé antérieurement avec <code>xfree86</code>, car les binaires sont incompatibles.</p>
</li>
<li><p><b>Utilisateurs 10.3 et 10.4 uniquement</b> : on peut utiliser le serveur d'affichage d'Apple et son gestionnaire de fenêtres avec XFree86 ou X.org. Si vous installez le paquet <code>applex11tools</code>, Fink installera tout ce qui est nécessaire pour ce faire à condition que le paquet X11User.pkg soit installé.</p></li>
</ul>
<p>Pour de plus amples informations sur l'utilisation de X11 d'Apple, voir cet <a href="http://developer.apple.com/darwin/runningx11.html">article</a> sur Apple Developer Connection.</p>

<h2><a name="official-binary">3.3 Binaires officiels</a></h2>

<p>Le projet XFree86 comprend une distribution binaire officielle de XFree86 4.5. Vous la trouverez sur votre <a href="http://www.xfree86.org/mirrors/">miroir XFree86</a> local dans le répertoire <code>4.5.0/binaries/Darwin-ppc-6.x</code> (ou <code>4.5.0/binaries/Darwin-ppc-5.x</code> pour Mac OS X 10.1). Téléchargez les fichiers archives tar <code>Xprog.tgz</code> et <code>Xquartz.tgz</code> bien qu'ils soient mentionnés comme "optionnels". Si vous ne savez pas quels fichiers sont nécessaires, téléchargez tout le répertoire. Lancez le script <code>Xinstall.sh</code> en tant que super-utilisateur pour installer l'ensemble. (Nous vous conseillons de lire les <a href="http://www.xfree86.org/4.5.0/Install.html">instructions officielles</a> avant l'installation).</p>

<p>Quelle que soit la version que vous avez installée, vous aurez alors XFree86 avec un serveur plein écran ou sans racine sous Mac OS X.</p>

<h2><a name="official-source">3.4 Source Officiel</a></h2>

<p>Si vous avez du temps à perdre, vous pouvez compiler XFree86 4.5.0 à partir du source. Vous trouverez le source sur un des miroirs cités sur <a href="http://www.xfree86.org/mirrors/">XFree86 mirror</a> dans le répertoire <code>4.5.0/source</code>.
Téléchargez les sept archives tar <code>XFree86-4.5.0-src-#.tgz</code> et décompressez-les dans un même répertoire. Vous pouvez adapter la compilation à vos besoins en plaçant des définitions de macros dans le fichier <code>config/cf/host.def</code> situé dans l'arborescence source de XFree86.

Voir le fichier <code>config/cf/darwin.cf</code> pour quelques explications. (<b>Note</b> : seules les macros insérées dans un #ifndef peuvent être modifiées dans host.def).</p>
<p>Quand vous aurez fini la configuration, compilez et installez XFree86 à l'aide des commandes suivantes :</p>
<pre>make World
sudo make install install.man</pre>

<p>Tout comme avec les binaires officiels, vous obtiendrez XFree86 avec un serveur en mode plein écran ou sans racine sous Mac OS X.</p>

<h2><a name="latest-cvs">3.5 Source le plus récent</a></h2>

<p>Si vous avez le temps et des nerfs à toute épreuve, vous pouvez utiliser la dernière version de développement de XFree86 via le référentiel public CVS. Notez que le code est mis à jour constamment ; d'un jour à l'autre il est modifié.</p>
<p>Afin de l'installer, suivez les instructions sur <a href="http://www.xfree86.org/cvs/">XFree86 CVS</a> pour télécharger le module <code>xc</code>. Puis suivez les instructions de compilation du source ci-dessus.</p>



    
<h2><a name="switching-x11">3.6 Remplacement de X11</a></h2>

<p>Si vous avez installé l'un des paquets X11 de Fink, mais que, pour une raison ou une autre, vous décidez de le supprimer pour le remplacer par un autre, la procédure à suivre est simple. Vous devez forcer la suppression des anciens paquets, puis installer les nouveaux de façon à préserver la cohérence de la base de données dpkg.</p>
<p>Il y a deux façons de le faire :</p>
<ol>
<li>
<p>Via FinkCommander</p>
<p>Si vous utilisez  <a href="http://finkcommander.sourceforge.net/">FinkCommander</a>, vous pouvez forcer la suppression via le menu. Par exemple, si vous avez installé <code>xfree86-rootless</code> et que vous vouliez installer la version gérant les processus légers, sélectionnez les paquets <code>xfree86-rootless</code>, <code>xfree86-rootless-shlibs</code>, <code>xfree86-base</code> et <code>xfree86-base-shlibs</code>, puis lancez :</p>
<pre>Source -&gt; Force Remove</pre>
</li>
<li>
<p>Manuellement via la ligne de commande</p>
<p>Pour faire une suppression manuelle, utilisez <code>dpkg</code> avec l'option --force-depends :</p>
<pre>sudo dpkg -r --force-depends xfree86-rootless\ 
xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
<p>Notez que si vous utilisez des applications qui nécessitent la version de XFree86 qui gère les processus légers, vous risquez d'avoir quelques problèmes avec la base de données dpkg, si vous supprimez de force cette version et installez un autre paquet XFree86 ou un paquet fantôme le représentant.</p>
</li>
</ol>
<p>Si vous utilisez une version de X11 qui n'a pas été installé via Fink, vous devez la supprimer via la ligne de commande :</p>
<pre>sudo rm -rf /usr/X11R6 /etc/X11</pre>
<p>Ceci est vrai pour tout paquet X11 non installé via Fink. Vous devez aussi supprimer <code>XDarwin.app</code> ou <code>X11.app</code>, suivant l'installation effectuée. Examinez le fichier <code>.xinitrc</code> quand vous supprimez X11 d'Apple pour vous assurer qu'il ne lance pas <code>quartz-wm</code>.  Vous pouvez ensuite installer la nouvelle variante X11 désirée, manuellement ou via Fink.</p>

<h2><a name="fink-summary">3.7 Résumé des paquets Fink disponibles</a></h2>

<p>Voici un court résumé des options d'installation et des paquets Fink à installer :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Type d'installation</th><th align="left">Paquets Fink</th></tr><tr valign="top"><td>XFree86 version 4.4.0 ou 4.5.0 (utilisateurs 10.3 et 10.4)</td><td>
<p><code>xfree86</code> et <code>xfree86-shlibs</code></p>
</td></tr><tr valign="top"><td>X.org-6.8.2 (utilisateurs 10.3 et 10.4)</td><td>
<p><code>xorg</code> et <code>xorg-shlibs</code></p>
</td></tr><tr valign="top"><td>X11 d'Apple (toutes versions)</td><td>
<p><code>system-xfree86</code> et <code>system-xfree86-shlibs</code> (et <code>system-xfree86-dev</code> pour construire les paquets basés sur X11)</p>
</td></tr><tr valign="top"><td>Binaires officiels XFree86 4.x</td><td>
<p><code>system-xfree86</code> et <code>system-xfree86-shlibs</code> (et <code>system-xfree86-dev</code> pour construire les paquets basés sur X11)</p>
</td></tr><tr valign="top"><td>XFree86 version 4.x compilé à partir du source ou de la dernière version CVS</td><td>
<p><code>system-xfree86</code> et <code>system-xfree86-shlibs</code> (et <code>system-xfree86-dev</code> pour construire les paquets basés sur X11)</p>
</td></tr><tr valign="top"><td>XFree86 version 4.2.1.x (utilisateurs 10.2 uniquement) ou 4.2.0 (utilisateurs 10.1 uniquement)</td><td>
<p><code>xfree86-base</code> et <code>xfree86-rootless</code> (et les paquets <code>-shlibs</code> associés)</p>
<p>ou <code>xfree86-base-threaded</code> et <code>xfree86-rootless-threaded</code> (et les paquets <code>-shlibs</code> associés)</p>
</td></tr></table>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=fr">4. Lancement de X11</a></p>
<? include_once "../../footer.inc"; ?>


