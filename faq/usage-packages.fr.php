<?
$title = "Q.F.P. - Utilisation (2)";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/09/07 05:44:41';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="prev" href="usage-general.php?phpLang=fr" title="Problème généraux d\'utilisation de paquets">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 9. Problèmes d'utilisation spécifiques à certains paquets</h1>


<a name="xmms-quiet">
<div class="question"><p><b><? echo FINK_Q ; ?>9.1: Aucun son n'est disponible avec XMMS</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Vérifiez que vous avez sélectionné "eSound Output Plugin" dans les préférences de XMMS. Pour d'obscures raisons, c'est le plugin d'écriture sur le disque qui est sélectionné par défaut.</p><p>Si cela ne résout pas le problème ou si XMMS se plaint qu'il ne peut trouver votre carte son, essayez ceci :</p><ul>
<li>Vérifiez que la sortie son n'est pas réglée sur silence dans Mac OS X.</li>
<li>Lancez <code>esdcat /usr/libexec/config.guess</code> (ou choisissez n'importe quel autre fichier de taille significative). Si vous entendez un petit bruit, cela signifie que eSound fonctionne et que XMMS devrait fonctionner, lui aussi, à condition d'être configuré correctement. Si vous n'entendez rien, esd ne fonctionne pas pour une raison indéterminée. Vous pouvez tenter de le lancer manuellement via <code>esd &amp;</code>, puis analysez les messages.</li>
<li>S'il ne fonctionne toujours pas, vérifiez les permissions de <code>/tmp/.esd</code> et <code>/tmp/.esd/socket</code>. Le possesseur doit être votre compte utilisateur. Si ce n'est pas le cas, tuez esd s'il est en cours de fonctionnement, supprimez le répertoire en tant que super-utilisateur (<code>sudo rm -rf /tmp/.esd</code>), puis redémarrez esd (en tant qu'utilisateur lambda, pas en tant que super-utilisateur).</li>
</ul><p>Notez que esd est conçu pour être lancé par un utilisateur lambda, pas par le super-utilisateur. Il communique, en général, via la socket système <code>/tmp/.esd/socket</code>. Vous n'avez besoin des options <code>-tcp</code> et <code>-port</code> que si vous voulez lancer des clients esd sur une autre machine du réseau.</p><p>Certains personnes ont signalé que XMMS se plantait ou se bloquait sur 10.1. Il n'y a pas eu d'analyse ou de solution à ce phénomène à ce jour.</p></div>
</a>
<a name="nedit-window-locks">
<div class="question"><p><b><? echo FINK_Q ; ?>9.2: Lors de la modification d'un fichier dans nedit, si l'on tente d'ouvrir un autre fichier, sa fenêtre apparaît mais elle ne répond pas.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> C'est un problème connu qui se produit avec des versions récentes de <code>nedit</code> et <code>lesstif</code> sur toutes les plates-formes. La solution est d'ouvrir une nouvelle fenêtre avec File--&gt;New, puis d'ouvrir le nouveau fichier sur lequel vous voulez travailler.</p><p>Ce problème est résolu dans la version <code>nedit-5.3-6</code>, qui dépend d'<code>openmotif3</code> et non plus de <code>lesstif</code>.</p></div>
</a>
<a name="xdarwin-start">
<div class="question"><p><b><? echo FINK_Q ; ?>9.3: XDarwin quitte immédiatement après lancement.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Pas de panique. Vous trouverez dans le document Utilisation de X11 une large section <a href="http://fink.sourceforge.net/doc/x11/trouble.php#immediate-quit">résolution de problèmes</a> à ce sujet.</p></div>
</a>
<a name="no-server">
<div class="question"><p><b><? echo FINK_Q ; ?>9.4: Au démarrage de XDarwin, le message suivant apparaît : "xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Tout d'abord, vérifiez que vous sourcez init.sh dans le fichier de démarrage de X <code>~/.xinitrc</code>.</p><p>Sous Jaguar, il arrive parfois que tous les paquets <code>xfree86</code> soient compilés, mais que seuls les paquets <code>xfree86-base</code> et <code>xfree86-base-shlibs</code> soient installés. Vérifiez que les paquets <code>xfree86-rootless</code> et <code>xfree86-rootless-shlibs</code> sont installés. Si ce n'est pas le cas, lancez <code>fink install xfree86-rootless</code>. Cela devrait résoudre le problème.</p><p>Si ces paquets sont installés, essayez <code>fink rebuild xfree86-rootless</code>. Si cela ne marche pas, vérifiez que <code>/usr/bin/X11R6</code> est dans votre PATH.</p></div>
</a>
<a name="xterm-error">
<div class="question"><p><b><? echo FINK_Q ; ?>9.5: Le lancement de xterm échoue avec le message suivant : "dyld: xterm Undefined symbols: xterm undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib".</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Cela se produit lorsque l'on utilise une version 10.1 de XFree86 sur 10.2. Vous devez passer à une version 10.2.</p><p>Si vous utilisez les paquets Fink <code>xfree86</code>, vous pouvez passer à une version plus récente de la façon habituelle ("<code>fink selfupdate-cvs ; fink update-all</code>" pour une installation à partir du source,  <code>fink selfupdate ; sudo apt-get update; sudo apt-get dist-upgrade</code>" pour une installation à partir des binaires.</p><p>Si vous avez installé XFree86 par d'autres moyens, vous trouverez les rustines qui vous permettront de faire la mise à jour sur le <a href="http://mrcla.com/XonX">site web de XonX</a>.</p></div>
</a>
<a name="libXmuu">
<div class="question"><p><b><? echo FINK_Q ; ?>9.6: Au démarrage de XFree86, l'un des messages d'erreur suivants apparaît : "dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib" ou "dyld: xinit can't open library: /usr/X11R6/lib/libXext.6.dylib"</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Un fichier censé être installé par <code>xfree86-base-(threaded)-shlibs</code> manque. Vous devez l'installer via <code>fink reinstall xfree86-base-shlibs</code> (<code>fink reinstall xfree86-base-threaded-shlibs</code> si vous utilisez les paquets XFree86 avec gestion des processus légers) pour les utilisateurs des sources, ou <code>sudo apt-get install --reinstall xfree86-base-shlibs</code> pour les utilisateurs de binaires.</p></div>
</a>
<a name="apple-x-bugs">
<div class="question"><p><b><? echo FINK_Q ; ?>9.7: Après installation de XFree86 et son remplacement par X11 d'Apple, tous les programmes se plantent.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Premièrement, si vous aviez installé précédemment les versions "avec processus légers" (threaded) des paquets Fink XFree86, vous devez recompiler l'application qui se plante. Certains programmes vérifie la disponibilité des processus légers lors de la compilation et à partir de là supputent que les processus légers sont toujours disponibles.</p><p>Deuxièmement, il se peut que vous soyez tombé sur un bogue d'Apple X11. Au moment où cette page a été écrite, un certain nombre de bogues étaient connus d'Apple et en en cours de résolution.</p><p>Si vous vous posez des questions sur X11 d'Apple qui ne sont pas liées à Fink, voyez la <a href="http://www.lists.apple.com/x11-users">liste de discussion officielle d'Apple sur X11</a>. Il est aussi conseillé de soumettre les bogues découverts dans X11 via le <a href="http://developer.apple.com/bugreporter">moteur de rapport de bogues</a> d'Apple.</p></div>
</a>
<a name="apple-x-delete">
<div class="question"><p><b><? echo FINK_Q ; ?>9.8: Comment avoir sous X11 d'Apple le même comportement de la touche suppr que sous XDarwin ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Certains utilisateurs ont signalé que la touche <code>suppr</code> se comporte différemment sous XDarwin et sous X11 d'Apple. On peut rectifier cela en ajoutant les lignes suivantes au fichier de démarrage approprié de X :</p><p> <b>.Xmodmap :</b>
</p><pre>keycode 59 = Delete</pre><p> <b>.Xresources :</b>
</p><pre>xterm*.deleteIsDEL: true 
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?</pre><p> <b>.xinitrc :</b>
</p><pre>xrdb -load $HOME/.Xresources 
xmodmap $HOME/.Xmodmap</pre><p></p></div>
</a>
<a name="gnome-two">
<div class="question"><p><b><? echo FINK_Q ; ?>9.9: Après passage de GNOME 1.x à GNOME 2.x, <code>gnome-session</code> n'ouvre plus de gestionnaire de fenêtres.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Alors que, sous GNOME 1.x, <code>gnome-session</code> invoque automatiquement le gestionnaire de fenêtres <code>sawfish</code>, sous GNOME 2.x, vous devez vous-même appeler un gestionnaire de fenêtres dans le fichier <code>~/.xinitrc</code> avant de lancer <code>gnome-session</code>, par exemple :</p><pre>... 
exec metacity &amp; exec gnome-session</pre><p>Note : ceci n'est plus vrai pour <b>GNOME 2.4</b>. Le lancement de <code>gnome-session</code> invoque un gestionnaire de fenêtres.</p></div>
</a>
<a name="apple-x11-no-windowbar">
<div class="question"><p><b><? echo FINK_Q ; ?>9.10: Après passage à X11 d'Apple sous Panther, les barres de titre de fenêtre n'apparaissent plus.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Vous n'êtes pas passé à la version "X11 1.0 - XFree86 4.3.0" incluse dans Panther. Vous devez installer X11 à partir de X11.pkg qui est situé sur le disque 3.</p></div>
</a>
<a name="apple-x11-wants-xfree86">
<div class="question"><p><b><? echo FINK_Q ; ?>9.11: Après installation de X11 d'Apple, Fink continue à vouloir installer XFree86 ou X.org.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Il faut envisager deux hypothèses :</p><ul>
<li>
<b>Vous faites une installation à partir des binaires :</b>
<p>Si vous utilisez une version récente de <code>fink</code> (c'est-à-dire &gt;= 0.18.3-1), la solution consiste, en général, à réinstaller le paquet X11User, car l'installeur omet parfois d'installer certains fichiers. Vous devrez peut-être effectuer la réinstallation plusieurs fois. L'exécution de :</p>
<pre>fink list -i system-xfree86</pre>
<p>doit faire apparaître l'installation effective des paquets <code>system-xfree86</code> et <code>system-xfree86-shlibs</code>.</p>
<p>Si la réinstallation du paquet X11User ne suffit pas à résoudre le problème, consultez les instructions <a href="#special-x11-debug">débogage spécial</a> ci-dessous.</p>
<p>Si vous utilisez une version antérieure du paquet <code>fink</code>, il suffit, en général, de mettre à jour <code>fink</code>, par exemple via :</p>
<pre>sudo apt-get update
sudo apt-get install fink</pre>
</li>
<li>
<b>Vous faites une installation à partir du source :</b>
<p>Si vous utilisez une version récente de <code>fink</code>, cette erreur signifie, en général, que vous devez installer ou réinstaller le paquet X11SDK, qui est <b>obligatoire</b> pour compiler les paquets à partir des sources. Vous le trouverez sur le CD XCode de Panther ou dans le répertoire XCode Tools du DVD de Tiger. Il <b>n'</b>est <b>pas</b> installé par défaut quand on installe XCode sous Panther. Il doit être soit installé en personnalisant l'installation de XCode, soit en double-cliquant sur X11SDK.pkg, fichier situé dans le répertoire <code>Packages</code> du CD XCode. Par contre, il <b>est</b> installé par défaut quand on installe XCode sous Tiger (même si X11User n'est pas installé), mais il est possible que l'installeur oublie un fichier.</p>
<p>Si les CD ou DVD de XCode ne vous ont pas été livrés avec l'ordinateur, il est fort probable qu'un disque image contenant, entre autres, le fichier <code>X11SDK.pkg</code> existe quelque part sur votre ordinateur. Cherchez dans le répertoire <code>/Applications/Installers</code> un disque image XCode. Le fichier <code>X11User.pkg</code> est probablement lui aussi dans ce répertoire.</p>
<p>Si le problème persiste, exécutez :</p>
<pre>fink list -i system-xfree86  </pre>
<p>Cela devrait faire apparaître l'installation effective des paquets <code>system-xfree86</code>, <code>system-xfree86-shlibs</code> et <code>system-xfree86-dev</code>. Si le paquet <code>-dev</code> n'apparaît pas, réinstallez X11SDK, car il arrive que l'installeur d'Apple omette des fichiers. Il se peut que vous deviez faire la réinstallation plusieurs fois. Si l'un des deux autres paquets n'apparaît pas, réinstallez le paquet X11User (pour les mêmes raisons).</p>
<p><b>Note pour les utilisateurs de Jaguar (X11 bêta 3)</b> : vous ne pouvez pas utiliser XCode, vous devez donc avoir déjà téléchargé le paquet X11SDK correspondant à votre système. Comme la date limite d'utilisation de X11 bêta 3 est dépassée, vous ne pouvez plus télécharger le paquet X11SDK ni le paquet X11User correspondant. Vous devez vous en tenir à l'installation de paquets binaires X11, ou bien installer XFree86 ou X.org, ou encore passer à Panther.</p>
<p>Si vous utilisez une version de <code>fink</code> antérieure à la version 0.17, vous devez mettre à jour <code>fink</code>, par exemple :</p>
<pre>fink selfupdate</pre> 
(en supposant que vous faites la mise à jour via CVS ou via rsync et que vous n'utilisez pas les mises à jour ponctuelles).
<p>Si ceci ne résout pas le problème, consultez les instructions <a href="#special-x11-debug">débogage spécial</a> ci-dessous.</p>
</li>
</ul></div>
</a>
<a name="wants-xfree86-on-upgrade">
<div class="question"><p><b><? echo FINK_Q ; ?>9.12: Après passage de la version 10.2 de Fink à la version 10.2-gcc3.3 ou 10.3, Fink veut installer XFree86 ou X.org alors que X11 d'Apple est déjà installé.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Il se peut que vous deviez supprimer un des paquets fantômes antérieurs : <code>system-xfree86</code>, <code>system-xfree86-42</code> ou <code>system-xfree86-43</code>. Fink sait maintenant reconnaître si vous avez une version de X11 installée manuellement, par exemple celle d'Apple, et génère des paquets virtuels. Comme d'autres paquets dépendent de <code>system-xfree86</code>, vous devez utiliser la commande :</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
 system-xfree86-43</pre><p>pour supprimer les versions obsolètes. Vous pouvez vérifier votre installation en lançant :</p><pre>fink list -i system-xfree86</pre><p>et vous assurer que les paquets <code>system-xfree86</code> et <code>system-xfree86-shlibs</code>sont présents. Si vous avez installé le X11SDK, vous devez aussi avoir le paquet <code>system-xfree86-dev</code>.</p><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p><p>Si le problème persiste, voir plus haut <a href="#apple-x11-wants-xfree86">Fink continue à vouloir installer XFree86 ou X.org</a>.</p></div>
</a>
<a name="special-x11-debug">
<div class="question"><p><b><? echo FINK_Q ; ?>9.13: Problèmes persistents entre X11 et Fink</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si les solutions données aux sections <a href="#apples-x11-wants-xfree86">Fink continue à vouloir installer XFree86 ou X.org</a> or <a href="#wants-xfree86-on-upgrade">Fink veut installer XFree86</a> ne résolvent pas votre problème, ou ne sont pas applicables à votre cas, vous devrez supprimer entièrement X11 et tous les paquets fantômes antérieurs ainsi que les paquets relatifs à X11, qu'ils soient installés partiellement ou non  :</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43 xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless \
xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg
fink selfupdate; fink index</pre><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p><p>(Vous verrez peut-être apparaître un message généré par la première ligne vous indiquant que vous tentez de supprimer des paquets qui ne sont pas installés). Réinstallez ensuite X11 d'Apple (et le X11SDK, si besoin est) ou XFree86 ou encore X.org.</p><p>Si le problème persiste et que vous utilisez <code>fink-0.19.0</code> ou une version postérieure, vous pouvez lancer :</p><pre>fink-virtual-pkgs --debug</pre><p>pour savoir quels sont les paquets manquants.</p><p>Si vous utilisez une version antérieure de <code>fink</code>, vous pouvez télécharger et lancer un script Perl, écrit par Martin Costabel, qui fournit les mêmes informations.</p><ul>
<li>Vous le trouverez ici : <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
</li>
<li>Sauvegardez-le où vous voulez.</li>
<li>Lancez-le dans une fenêtre de terminal ainsi :
<pre>perl fink-x11-debug</pre>
</li>
</ul></div>
</a>
<a name="tiger-gtk">
<div class="question"><p><b><? echo FINK_Q ; ?>9.14: Après passage à Tiger (Mac OS X 10.4), des erreurs à propos de <code>_EVP_idea_cbc</code> apparaissent chaque fois qu'on utilise une application gtk.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ceci était, apparemment, dû à un bogue dans l'éditeur de liens dynamique de Tiger (au moins jusque dans la version 10.4.1), mais il semble être corrigé dans la version 10.4.3. Fink proposait une solution dans le fichier <code>base-files-1.9.7-1</code> et les versions suivantes.</p><p>Si vous n'êtes pas passé à Tiger et/ou n'avez pas mis à jour <code>base-files</code>, vous pouvez corriger ce problème en préfixant le nom du logiciel que vous souhaitez lancer avec :</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>Par exemple si vous voulez utiliser <code>gnucash</code>, utilisez :</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>Cette méthode fonctionne pour les applications lancées à partir du menu Applications de X11 d'Apple ou à partir du terminal.</p><p>Vous pouvez aussi déclarer la variable au niveau global (par exemple dans votre script de démarrage et/ou dans votre fichier<code>.xinitrc</code>, ce qui peut-être nécessaire pour faire tourner GNOME). Mettez : </p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>dans votre fichier <code>.xinitrc</code> (quel que soit votre shell d'ouverture de session) ou dans le fichier <code>.profile</code> (ou tout autre script de démarrage) pour les utilisateurs de <b>bash</b>.</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>est la commande équivalente à utiliser, par exemple dans votre fichier <code>.cshrc</code> pour les utilisateurs de <b>tcsh</b>.</p><p>Note :  ceci est fait automatiquement quand on installe une version suffisamment récente du fichier <code>base-files</code>.</p></div>
</a>
<a name="yelp">
<div class="question"><p><b><? echo FINK_Q ; ?>9.15: Impossible d'accéder à l'aide dans aucune application GNOME</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Vous devez installer le paquet <code>yelp</code>. Ce paquet n'est pas inséré dans le fagot GNOME, car il utilise des outils cryptographiques, et nous avons décidé de ne pas installer l'ensemble de GNOME dans la branche cryptographique, juste pour pouvoir utiliser le système d'aide.</p></div>
</a>

<? include_once "../footer.inc"; ?>


