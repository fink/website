<?
$title = "Utilisation de X11 - Installation de XFree86";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/04/21 07:27:20';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=fr" title="Starting XFree86"><link rel="prev" href="history.php?phpLang=fr" title="Historique">';

include_once "header.inc";
?>

<h1>Utilisation de X11 - 3 Récupération et installation de XFree86</h1>
    
    
    <h2><a name="fink">3.1 Installation via Fink</a></h2>
      
      <p>
Fink vous permet d'installer X11 comme vous voulez, mais il fournit aussi ses propres paquets XFree86. Si vous utilisez, <code>fink install ...</code>, il téléchargera le code source et le compilera sur votre ordinateur. Si vous utilisez <code>apt-get install ...</code> ou l'interface <code>dselect</code>, il téléchargera des paquets binaires précompilés, identiques à ceux de la distribution officielle XFree86.
</p>
      <p>
Le paquet <code>xfree86-base</code> contient l'ensemble de XFree86 4.2.1.1 (4.2.0 pour les utilisateurs de 10.1), sauf le serveur XDarwin.  
Le paquet <code>xfree86-rootless</code> est le serveur de la version standard, stable de  XFree86 4.2.1.1. Il gère à la fois les modes plein écran et racine, ainsi qu'OpenGL.
(Au début, Fink avait aussi un paquet <code>xfree86-server</code> qui ne fournissait que le mode plein écran, mais ce n'est plus nécessaire.)
Vous pouvez aussi installer le serveur vous-même ; voir plus bas. Dans ce cas, vous devez installer <code>xfree86-base</code>, sinon Fink viendra écraser le serveur installé précédemment. Notez que la version stable actuelle de <code> xfree86-base</code> (4.2.1.1-3) génère <code>xfree86-rootless</code>, <code>xfree86-base-shlibs</code> et <code>xfree86-rootless-shlibs</code> pendant la compilation. Dans ce cas, les quatre paquets doivent être installés pour avoir une configuration valide de XFree86.
</p>
      <p>Les paquets <code> xfree86-base-threaded</code> et <code>xfree86-rootless-threaded</code> sont similaires aux précédents, mais ont été modifiés pour gérer les processus légers, nécessaires à un petit nombre d'applications, tel <code>xine</code>.</p>
      <p>XFree86 4.2.11 (sans gestion des processus légers) est considérée comme la version de base stable de XFree86 à utiliser avec Fink sur 10.2. XFree86 4.3.0 est disponible, mais elle est plus expérimentale, et n'était disponible que dans la branche instable à l'époque où ce document a été écrit. Elle gère nativement les processus légers et est plus rapide que la version 4.2.1.1.  Pour installer cette version, vous devez installer le paquet <code>xfree86</code>. Notez que, dans cette version, il n'y a plus de séparation entre paquet -base et paquet -rootless, bien que les librairies soient regroupées dans un paquet <code>xfree86-shlibs</code>. Si vous compilez des binaires avec la version 4.3, ils peuvent ne pas fonctionner sur 4.2.1.1 ou Apple X11, tenez-en compte.</p>
      <p>
        <b>Utilisateurs 10.3 :</b> Vous devez installer la version 4.3.99.16-2 ou ultérieure, qui sont des pré-versions de XFree86-4.4. Si vous travaillez à partir de la distribution binaire, assurez-vous que vous mettez à jour les descriptions de paquets (par exemple via <code>sudo apt-get update</code>).</p>
    
    <h2><a name="apple-binary">3.2 Binaires d'Apple</a></h2>
      
      <p>
Le 7 janvier 2003, Apple a mis à disposition <a href="http://www.apple.com/macosx/x11/">une implémentation X11 personnalisée et basée sur XFree86-4.2</a>, qui incluait un rendu Quartz et l'accélération OpenGL. Une nouvelle version est sortie le 10 Février 2003, qui comportait des fonctionnalités supplémentaires et des corrections de bogues. Une troisième version (la Bêta 3) est sortie le 17 mars 2003 avec de nouvelles fonctionnalités et des corrections de bogues. Cette version peut être utilisée sur Jaguar.
</p>
      <p>Le 24 octobre 2003, Apple a sorti Panther (10.3), qui inclut sa propre version de X11. Cette version est basée sur XFree86-4.3.</p>
      <p>
Pour utiliser les binaires d'Apple, vous devez d'une part vous assurer que le paquet <b>X11 User</b> est installé et, d'autre part <a href="http://fink.sourceforge.net/doc/users-guide/upgrade.php">mettre à jour</a> Fink.</p>
      <p>Avec <code>fink-0.16.2</code>, vous devez aussi installer le paquet <b>X11 SDK</b>. Ensuite, Fink créera un paquet virtuel <code>system-xfree86</code>.
      </p>
      <p>Avec <code>fink-0.17.0</code> et les versions ultérieures, n'installez le paquet X11 SDK que si vous souhaitez construire des paquets à partir du source. Dans ce cas, même si vous n'avez pas installé le SDK, il y aura création des paquets virtuels <code>system-xfree86</code> et <code>system-xfree86-shlibs</code>, ce dernier correspondant aux librairies partagées. Si vous installez le SDK, il y aura création d'un paquet <code>system-xfree86-dev</code>, représentant les headers.
</p>
      <p>
Si vous avez déjà installé une distribution XFree86, que ce soit avec Fink ou non, vous pouvez suivez les  <a href="inst-xfree86.php?phpLang=fr#switching-x11">instructions de remplacement d'un paquet X11 par un autre</a>. Supprimez vos paquets existants, puis installez X11 d'Apple (et, éventuellement, X11 SDK).
</p>
      <p>
Notes au sujet de l'utilisation de X11 d'Apple :
</p>
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
          <p>
            <code>quartz-wm</code> ne gère pas complètement les astuces des gestionnaires de fenêtres Gnome/KDE. Vous observerez peut-être des comportements étranges dans des fenêtres qui ne devraient pas avoir d'ornements, mais en ont pourtant.</p>
        </li>
        <li>
          <p>X11 d'Apple ne respecte pas, par défaut, les configurations d'environnement de Fink. Pour démarrer des applications installées via Fink (par exemple : gestionnaires de fenêtres,  gnome-session ou d'autres applications situées dans le répertoire <code>/sw/bin</code>), placez la ligne suivante dans les premières lignes du fichier <code>~/.xinitrc</code> (c'est-à-dire après l'initialisation "<code>#!/bin/sh</code>", mais avant de démarrer tout autre programme) :</p>
          <pre> . /sw/bin/init.sh
</pre>
          <p>de façon à ce que votre environnement Fink soit initialisé. Note : <code>init.sh</code> est utilisé au lieu de <code>init.csh</code>, car <code>.xinitrc</code> est lancé par <code>sh</code> au lieu de <code>tcsh</code>.</p>
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
      </ul>
    
    <h2><a name="official-binary">3.3 Binaires officiels</a></h2>
      
      <p>Le projet XFree86 comprend une distribution binaire officielle de XFree86 4.2.0, qui peut être mise au niveau 4.2.1.1 à l'aide de rustines. Vous la trouverez sur votre <a href="http://www.xfree86.org/MIRRORS.shtml">miroir XFree86</a> local dans le répertoire <code>4.2.0/binaries/Darwin-ppc-5.x</code>. Téléchargez les fichiers archives tar <code>Xprog.tgz</code> et <code>Xquartz.tgz</code> bien qu'ils soient mentionnés comme optionnels. Si vous ne savez pas quels fichiers sont nécessaires, téléchargez tout le répertoire. Lancez le script <code>Xinstall.sh</code> en tant que super-utilisateur pour installer l'ensemble. (Nous vous conseillons de lire les <a href="http://www.xfree86.org/4.2.0/Install.html">instructions officielles</a> avant l'installation). Vous pouvez aussi, si vous le souhaitez, utiliser le <a href="http://prdownloads.sourceforge.net/xonx/XInstall_10.1.sit?download">binaire</a> de XonX, qui a un source identique mais est plus facile à utiliser. Dans les deux cas, téléchargez, décompressez et lancez les mises à niveau suivantes :</p>
      <ol>
        <li>Utilisateurs 10.1 : <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.1.zip?download">mise à niveau 4.2.0 -&gt; 4.2.0.1</a>.  Utilisateurs 10.2:  <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.2.zip?download">mise à niveau 4.2.0 -&gt; 4.2.0.1</a>
        </li>
        <li>Utilisateurs 10.1 et 10.2 :  <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.1.1.zip?download">mise à niveau 4.2.0.1 -&gt; 4.2.1.1</a>
        </li>
      </ol>
      <p>Il existe aussi une distribution binaire officielle de XFree86 4.3.0 sur les <a href="http://www.xfree86.org/MIRRORS.shtml">miroirs XFree86</a> dans le répertoire <code>4.3.0/binaries/Darwin-ppc-6.x</code>. Téléchargez les fichiers archives tar <code>Xprog.tgz</code> et <code>Xquartz.tgz</code> bien qu'ils soient mentionnés comme optionnels. Si vous ne savez pas quels fichiers sont nécessaires, téléchargez tout le répertoire. Lancez le script <code>Xinstall.sh</code> en tant que super-utilisateur pour installer l'ensemble. (Nous vous conseillons de lire les <a href="http://www.xfree86.org/4.3.0/Install.html">instructions officielles</a> avant l'installation.)</p>
      <p>Quelle que soit la version que vous avez installée, vous aurez alors XFree86 avec un serveur plein écran ou sans racine sous Mac OS X.</p>
    
    <h2><a name="official-source">3.4 Source Officiel</a></h2>
      
      <p>Si vous avez du temps à perdre, vous pouvez compiler XFree86 4.2.0 à partir du source.
      Vous trouverez le source sur un des miroirs cités sur <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> dans le répertoire <code>4.2.0/source</code>.
Téléchargez les trois archives tar <code>X420src-#.tgz</code> et décompressez-les dans un même répertoire.
Vous pouvez adapter la compilation à vos besoins en plaçant des définitions de macros dans le fichier <code>config/cf/host.def</code> situé dans l'arborescence source de XFree86.

Voir le fichier <code>config/cf/darwin.cf</code> pour quelques explications.
(Note : Seules les macros insérées dans un #ifndef peuvent être modifiées dans host.def.)
</p>
      <p>
Quand vous aurez fini la configuration, compilez et installez XFree86 à l'aide des commandes suivantes :
</p>
      <pre>make World
sudo make install install.man</pre>
      <p>Pour passer en version 4.2.1.1, suivez les instructions de la section <a href="#official-binary">Binaires officiels</a>.</p>
      <p>Pour installer la version 4.3.0, suivez les instructions ci-dessus en remplaçant "2" par "3", et n'utilisez surtout pas la procédure de mise à jour 4.2.1.1.</p>
      <p>
Tout comme avec les binaires officiels, vous obtiendrez XFree86 avec un serveur en mode plein écran ou sans racine sous Mac OS X.
</p>
    
    <h2><a name="latest-cvs">3.5 Source le plus récent</a></h2>
      
      <p>
Si vous avez le temps et des nerfs à toute épreuve, vous pouvez utiliser la dernière version de développement de XFree86 via le référentiel public CVS.
Notez que le code est mis à jour constamment ; d'un jour à l'autre il est modifié.
</p>
      <p>
Afin de l'installer, suivez les instructions sur <a href="http://www.xfree86.org/cvs/">XFree86 CVS</a> pour télécharger le module <code>xc</code>.
Puis suivez les instructions de compilation du source ci-dessus.
</p>
    
    <h2><a name="macgimp">3.6 MacGimp</a></h2>
      
      <p>
L'installeur téléchargeable qui fut proposé par l'équipe MacGimp en 2001 ne contenait pas XFree86. (Il écrasait, malgré tout, certains fichiers de configuration de XFree86.)
</p>
      <p>
Le CD vendu par <a href="http://www.macgimp.com/">MacGimp, Inc.</a> contient une version de XFree86. Toutefois, il est impossible de déterminer laquelle ; c'est probablement un mélange des versions 4.0.3, 4.1.0 et d'une version de développement. Le serveur fonctionne en mode sans racine, à partir d'une rustine datant d'avant la version 4.1.0.
</p>
    
    <h2><a name="switching-x11">3.7 Remplacement de X11</a></h2>
      
      <p>
Si vous avez installé l'un des paquets X11 de Fink, mais que, pour une raison ou une autre, vous décidez de le supprimer pour le remplacer par un autre, la procédure à suivre est simple. Vous devez forcer la suppression des anciens paquets, puis installer les nouveaux de façon à préserver la cohérence de la base de données dpkg.
</p>
      <p>
Il y a deux façons de le faire :
</p>
      <ol>
        <li>
          <p>Via FinkCommander</p>
          <p>
Si vous utilisez  <a href="http://finkcommander.sourceforge.net/">FinkCommander</a>, vous pouvez forcer la suppression via le menu. Par exemple, si vous avez installé <code>xfree86-rootless</code> et que vous vouliez installer la version gérant les processus légers, sélectionnez les paquets <code>xfree86-rootless</code>, <code>xfree86-rootless-shlibs</code>, <code>xfree86-base</code> et <code>xfree86-base-shlibs</code>, puis lancez :
  </p>
          <pre>Source -&gt; Force Remove</pre>
        </li>
        <li>
          <p>Manuellement via la ligne de commande</p>
          <p>
Pour faire une suppression manuelle, utilisez <code>dpkg</code> avec l'option --force-depends :
  </p>
          <pre>sudo dpkg -r --force-depends xfree86-rootless\ 
xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
          <p>
Notez que si vous utilisez des applications qui nécessitent la version de XFree86 qui gère les processus légers, vous risquez d'avoir quelques problèmes avec la base de données dpkg, si vous supprimez de force cette version et installez un autre paquet XFree86 ou un paquet fantôme le représentant.
  </p>
        </li>
      </ol>
      <p>Si vous utilisez une version de X11 qui n'a pas été installé via Fink, vous devez la supprimer via la ligne de commande :</p>
      <pre>sudo rm -rf /usr/X11R6 /etc/X11</pre>
      <p>Ceci est vrai pour tout paquet X11 non installé via Fink. Vous devez aussi supprimer <code>XDarwin.app</code> ou <code>X11.app</code>, suivant l'installation effectuée. Examinez le fichier <code>.xinitrc</code> quand vous supprimez X11 d'Apple pour vous assurer qu'il ne lance pas <code>quartz-wm</code>.  Vous pouvez ensuite installer la nouvelle variante X11 désirée, manuellement ou via Fink.</p>
    
    <h2><a name="fink-summary">3.8 Résumé des paquets Fink disponibles</a></h2>
      
      <p>
Voici un court résumé des options d'installation et des paquets Fink à installer :
</p>
      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Type d'installation</th><th align="left">Paquets Fink</th></tr><tr valign="top"><td>4.2.x compilé via Fink</td><td>
            <p>
              <code>xfree86-base</code> et <code>xfree86-rootless</code> (et les paquets <code>-shlibs</code> associés)</p>
            <p>ou <code>xfree86-base-threaded</code> et <code>xfree86-rootless-threaded</code> (et les paquets <code>-shlibs</code> associés)</p>
          </td></tr><tr valign="top"><td>4.3.x compilé via Fink</td><td>
            <p>
              <code>xfree86</code> et <code>xfree86-shlibs</code>
            </p>
          </td></tr><tr valign="top"><td>Binaires officiels 4.x </td><td>
            <p>
              <code>system-xfree86</code> seulement (+ paquets associés)</p>
          </td></tr><tr valign="top"><td>4.x compilé à partir du source ou de la dernière version CVS</td><td>
            <p>
              <code>system-xfree86</code> seulement (+ paquets associés)</p>
          </td></tr><tr valign="top"><td>4.2.x d'Apple</td><td>
            <p>
              <code>system-xfree86</code> seulement (+ paquets associés)
</p>
          </td></tr><tr valign="top"><td>4.3.x d'Apple</td><td>
            <p>
              <code>system-xfree86</code> seulement (+ paquets associés)
</p>
          </td></tr></table>
    
  <p align="right">
Next: <a href="run-xfree86.php?phpLang=fr">4 Starting XFree86</a></p>

<? include_once "footer.inc"; ?>
