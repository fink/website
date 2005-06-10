<?
$title = "Utilisation de X11 - Lancement de X11";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2005/06/10 01:56:44';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="xtools.php?phpLang=fr" title="Xtools"><link rel="prev" href="inst-xfree86.php?phpLang=fr" title="Récupération et installation de X11">';


include_once "header.fr.inc";
?>
<h1>Utilisation de X11 - 4. Lancement de X11</h1>


<h2><a name="darwin">4.1 Darwin</a></h2>

<p>Sous Darwin, XFree86 se comporte comme sur n'importe quel autre système Unix. En général, on le lance à partir de la console avec la commande <code>startx</code> ; elle lance le serveur et un certain nombre de clients, tels le gestionnaire de fenêtres et un émulateur de terminal avec shell. Sous Darwin, il n'est pas nécessaire de fournir des paramètres, on peut simplement utiliser :</p>
<pre>startx</pre>
<p>Vous pouvez personnaliser le lancement en utilisant différents fichiers placés dans votre répertoire utilisateur. <code>.xinitrc</code> gère les clients à lancer. <code>.xserverrc</code> gère les options du serveur et peut aussi lancer un autre serveur. Si vous n'arrivez pas à démarrer correctement (vous obtenez un écran blanc ou XFree86 s'arrête immédiatement), vous pouvez commencer par déplacer ces fichiers ailleurs, pour tenter de résoudre le problème. Quand <code>startx</code> ne trouve pas ces fichiers, il utilise des paramètres par défaut qui devraient convenir.</p>
<p>Vous pouvez aussi démarrer le serveur directement avec l'une des options XDMCP, comme ceci :</p>
<pre>X -query remotehost</pre>
<p>Vous trouverez de plus amples informations dans la man page <code>Xserver</code>.</p>
<p>Enfin, il existe une option pour paramétrer <code>xdm</code> ; voir la man page pour de plus amples informations.</p>
<p><b>Note</b> : si vous utilisez Mac OS X antérieur à Panther, vous pouvez saisir <code>&gt;console</code> dans la fenêtre d'ouverture de session. Vous accéderez ainsi à une console texte équivalente à Darwin. Si aucun champ pour saisir un nom d'utilisateur n'apparaît dans la fenêtre d'ouverture de session, tapez simplement la première lettre du nom d'un utilisateur quelconque, puis appuyez simultanément sur alt-retour chariot. Vous pourrez alors utiliser n'importe quelle méthode de démarrage ci-dessus, à l'exception de <code>xdm</code>.</p>
<p><b>Note</b> : il est impossible de démarrer XFree86 à partir de la console sous Mac OS X Panther et suivant.</p>

<h2><a name="macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></h2>

<p>Il y a deux façons de lancer XFree86 sous Mac OS X. L'une est de double-cliquer sur l'application <code>XDarwin.app</code>, située dans le répertoire <code>Applications</code>. Vous pouvez alors choisir entre le mode plein écran et le mode sans racine dans la fenêtre de dialogue qui apparaît à l'écran au lancement. Vous pouvez désactiver cette fenêtre de dialogue et indiquer le mode de démarrage automatique souhaité dans les préférences de XDarwin.  </p>
<p>Avant la version 4.2.0, XDarwin démarrait automatiquement en mode plein écran, et il n'y avait aucun moyen de le faire démarrer en mode sans racine en double-cliquant sur l'application.</p>
<p>La seconde façon de démarrer XFree86 sous Mac OS X est de lancer la commande 
<code>startx</code> dans <code>Terminal.app</code>. Si vous démarrez le serveur de cette façon, vous devez lui indiquer qu'il fonctionnera en parallèle avec Quartz. Ce qui se fait en utilisant l'option <code>-fullscreen</code> :</p>
<pre>startx -- -fullscreen</pre>
<p>Le serveur démarre alors en mode plein écran, et les clients mentionnés dans le fichier <code>.xinitrc</code> sont lancés.  </p>
<p><b>Note</b> : antérieurement à la version 4.2, on utilisait l'option <code>-quartz</code> pour démarrer en mode plein écran.</p>
<p>Vous pouvez le lancer en mode sans racine avec l'option <code>-rootless</code> :</p>
<pre>startx -- -rootless</pre>
<p>L'option <code>-quartz</code> ne sert plus à passer en mode plein écran, mais à utiliser le mode défini dans les préférences.</p>
<p>À partir de la version 4.3, la fenêtre de dialogue de démarrage apparaît quand on utilise <code>startx</code> sans paramètres.</p>

<h2><a name="starting-xorg">4.3 Lancement de X.org</a></h2>

<p>X.org marche en tout point de façon identique à XFree86.</p>

<h2><a name="starting-apples-x11">4.4 Lancement de X11 d'Apple</a></h2>

<p>X11 d'Apple fonctionne de la manière similaire à XFree86 (c'est-à-dire qu'il utilise un fichier <code>.xinitrc</code> pour contrôler les clients lancés au démarrage). On le lance normalement en double-cliquant sur l'icône de <code>X11.app</code> (situé dans le répertoire <code>/Applications/Utilitaires</code>). Vous pouvez aussi utiliser <code>startx</code>, mais il n'existe pas d'option en ligne de commande pour choisir le mode d'affichage ; dans ce cas, <code>X11.app</code> démarre dans le mode précédemment choisi dans ses préférences.</p>
<p>Par défaut, le gestionnaire de fenêtres est <code>quartz-wm</code>d'Apple. Vous pouvez passer de mode plein écran en mode sans racine en changeant l'option correspondante dans les préférences de <b>X11.app</b>. Il n'est pas nécessaire de redémarrer pour que le changement ait lieu. Néanmoins, ceci ne fonctionne pas avec <code>quartz-wm</code>, il faut choisir un autre gestionnaire de fenêtres (par exemple dans <code>.xinitrc</code>).</p>
 
 <h2><a name="applex11tools">4.5 applex11tools</a></h2>

<p>Le paquet <code>applex11tools</code> de Fink vous permet d'utiliser <code>X11.app</code> et <code>quartz-wm</code> sous Mac OS X 10.3 et suivant avec XFree86 4.4 et suivant ou X.org.</p>
<p>Pour installer ce paquet, vous devez activer la <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">branche instable</a> et avoir installé le paquet <code>X11User.pkg</code> dans la hiérarchie <code>/Users</code> ou <code>/Volumes</code>. <code>X11.app</code> sera installé dans le dossier <code>Applications</code> de l'arborescence Fink. Vous pourrez alors utilisé soit <code>X11.app</code> ou <code>XDarwin.app</code>.</p>
<h2><a name="xinitrc">4.6 Fichier .xinitrc</a></h2>

<p>S'il existe dans votre répertoire utilisateur un fichier nommé <code>.xinitrc</code>, il sera utilisé pour lancer quelques clients X au démarrage, tels le gestionnaire de fenêtre, quelques xterm ou un environnement de bureau comme GNOME. Le fichier <code>.xinitrc</code> est un script shell qui contient les commandes pour ce faire. Il <b>n'est pas</b> nécessaire de mettre le traditionnel <code>#!/bin/sh</code> dans la première ligne du fichier et de rendre exécutable le fichier ; xinit sait le lancer via un shell.</p>
<p>S'il n'existe pas de fichier <code>.xinitrc</code> dans votre répertoire utilisateur, X11 utilise le fichier par défaut <code>/private/etc/X11/xinit/xinitrc</code>. Vous pouvez vous servir de ce fichier comme base pour votre propre fichier .xinitrc :</p>
<pre>cp /private/etc/X11/xinit/xinitrc ~/.xinitrc</pre>
<p>Si vous utilisez Fink, vous devez sourcer <code>init.sh</code> en début de fichier pour garantir une définition corrrecte de votre environnement.</p>
<p>Vous pouvez mettre à peu près n'importe quelle commande dans un fichier <code>.xinitrc</code>, mais il faut tenir compte des éléments suivants. Tout d'abord, le shell qui interprète le fichier attend, par défaut, que chaque programme lancé soit terminé avant de lancer le suivant. Si vous voulez lancer plusieurs programmes en parallèle, vous devez indiquer au shell qu'il doit les faire tourner en "arrière-plan", en ajoutant un <code>&amp;</code> à la fin de la ligne.</p>
<p>Ensuite, <code>xinit</code> attend que le script <code>.xinitrc</code> se termine et interprète sa fin ainsi : "la session est terminée, je dois aussi tuer le serveur X maintenant". Cela signifie que la dernière commande du fichier <code>.xinitrc</code> ne doit pas tourner en arrière-plan et que cette commande doit être un programme de longue durée. En général, on utilise le gestionnaire de gestionnaire comme dernière commande. En fait, la plupart des gestionnaires de fenêtres partent du principe que <code>xinit</code> attend qu'ils se terminent et utilisent cela pour faire fonctionner l'article de menu  "Fin de session". (<b>Note</b> : pour restreindre l'usage de la mémoire et le nombre de cycles CPU, vous pouvez mettre un <code>exec</code> au début de la dernière ligne comme dans les exemples ci-dessous.)</p>
<p> Exemple de démarrage de GNOME :</p>
<pre>. /sw/bin/init.sh
exec gnome-session</pre>
<p>Exemple plus complexe pour les utilisateurs de bash qui suppriment les alertes X11, lance un certain nombre de clients et le gestionnaire de fenêtres Enlightenment :</p>
<pre>. /sw/bin/init.sh

xset b off

xclock -geometry -0+0 &amp;
xterm &amp;
xterm &amp;

exec enlightenment</pre>
<p>Pour démarrer GNOME 2.2 sous X11 d'Apple, utilisez les commandes suivantes :</p>    
 <pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-session
</pre> 
<p>Pour GNOME 2.4 sous X11 d'Apple, metacity est lancée automatiquement, les commandes sont donc réduites à :</p>    
 <pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
exec gnome-session
</pre> 
<p>Pour lancer KDE 3.2 (version &lt; 3.2.2-21) sous X11 d'Apple :</p>
<pre>. /sw/bin/init.sh
export KDEWM=kwin
quartz-wm --only-proxy &amp;
/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1
</pre>
<p>Et enfin pour lancer la toute dernière version de KDE sous X11 d'Apple :</p>
<pre>. /sw/bin/init.sh
/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1
</pre>

<h2><a name="oroborosx">4.7 OroborOSX</a></h2>

<p><a href="http://oroborosx.sourceforge.net">OroborOSX</a> est une solution de remplacement pour les serveurs d'affichage X11.app et XDarwin display servers. Elle nécessite l'installation préexistante de X11 pour fonctionner. <code>X11.app</code> et <code>XDarwin.app</code> continuent à fonctionner en sa présence.</p>
<p>Au lancement, <code>OroborOSX</code> lance son propre gestionnaire de fenêtres sans racine, mais ne lit ni le fichier <code>xinitrc</code> du système, ni le fichier <code>.xinitrc</code> de l'utilisateur. Après lancement, on peut activer l'option de menu correspondante pour exécuter le fichier <code>.xinitrc</code>. Néanmoins, <code>OroborOSX</code> a sa propre façon de définir les applicattions à lancer au démarrage. Il possède aussi un mécanisme de démarrage des applications X11 à partir du Finder via des scripts de démarrage.</p>  
<p>Pour de plus amples informations, allez sur la <a href="http://oroborosx.sourceforge.net">page d'accueil d'OroborOSX</a>.</p>
   
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="xtools.php?phpLang=fr">5. Xtools</a></p>
<? include_once "../../footer.inc"; ?>


