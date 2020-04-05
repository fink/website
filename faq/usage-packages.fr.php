<?php
$title = "Q.F.P. - Utilisation (2)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/04/05 5:48:20';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="prev" href="usage-general.php?phpLang=fr" title="Problèmes généraux d\'utilisation de paquets">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 9. Problèmes d'utilisation spécifiques à certains paquets</h1>


<a name="xmms-quiet">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.1: Aucun son n'est disponible dans XMMS. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Vérifiez que vous avez sélectionné "eSound Output Plugin" dans les préférences de XMMS. Pour d'obscures raisons, c'est le plugin d'écriture sur le disque qui est sélectionné par défaut.</p><p>Si cela ne résout pas le problème ou si XMMS se plaint qu'il ne peut trouver votre carte son, essayez ceci :</p><ul>
<li>Vérifiez que la sortie son n'est pas réglée sur silence dans Mac OS X.</li>
<li>Lancez la commande <code>esdcat /usr/libexec/config.guess</code> ou fournissez à la commande esdcat n'importe quel autre fichier de taille significative. Si vous entendez un petit bruit, cela signifie que eSound fonctionne et que XMMS devrait fonctionner, lui aussi, à condition d'être configuré correctement. Si vous n'entendez rien, cela signifie que la commande esd ne fonctionne pas pour une raison indéterminée. Vous pouvez tenter de la lancer manuellement via la commande <code>esd &amp;</code>, puis analysez les messages.</li>
<li>Si eSound ne fonctionne toujours pas, vérifiez les permissions des fichiers <code>/tmp/.esd</code> et <code>/tmp/.esd/socket</code>. Le propriétaire doit être votre compte utilisateur. Si ce n'est pas le cas, tuez le démon esd s'il est en cours de fonctionnement, supprimez le répertoire en tant que super-utilisateur via la commande <code>sudo rm -rf /tmp/.esd</code>, puis redémarrez esd (en tant qu'utilisateur lambda, pas en tant que super-utilisateur).</li>
</ul><p>Notez que esd est conçu pour être lancé par un utilisateur lambda, pas par le super-utilisateur. Il communique, en général, via la socket système <code>/tmp/.esd/socket</code>. Vous n'avez besoin des options <code>-tcp</code> et <code>-port</code> que si vous voulez lancer des clients esd sur une autre machine du réseau.</p><p>Certaines personnes ont signalé que XMMS se plantait ou se bloquait sur 10.1. Il n'y a pas eu à ce jour d'analyse ou de solution à ce phénomène.</p></div>
</a>
<a name="nedit-window-locks">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.2: Lors de la modification d'un fichier dans nedit, si l'on tente d'ouvrir un autre fichier, sa fenêtre apparaît mais elle ne répond pas. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> C'est un problème connu qui se produit avec des versions récentes de <code>nedit</code> et <code>lesstif</code> sur toutes les plates-formes. La solution est d'ouvrir une nouvelle fenêtre via le menu File--&gt;New, puis d'ouvrir le nouveau fichier sur lequel vous voulez travailler.</p><p>Ce problème est résolu dans la version <code>nedit-5.3-6</code>, qui dépend d'<code>openmotif3</code> et non plus de <code>lesstif</code>.</p></div>
</a>
<a name="xdarwin-start">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.3: XDarwin quitte immédiatement après lancement. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Pas de panique. Vous trouverez dans le document Utilisation de X11 une large section <a href="/doc/x11/trouble.php#immediate-quit">résolution de problèmes</a> à ce sujet.</p></div>
</a>
<a name="no-server">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.4: Au démarrage de XDarwin, un message indique que le fichier xinit est introuvable et qu'il n'existe pas de server X accessible dans le répertoire /usr/X11R6/bin (message en anglais : "xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH"). Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Tout d'abord, vérifiez que vous sourcez init.sh dans le fichier de démarrage de X <code>~/.xinitrc</code>.</p><p>Sous Jaguar, il arrive parfois que tous les paquets <code>xfree86</code> soient compilés, mais que seuls les paquets <code>xfree86-base</code> et <code>xfree86-base-shlibs</code> soient installés. Vérifiez que les paquets <code>xfree86-rootless</code> et <code>xfree86-rootless-shlibs</code> sont installés. Si ce n'est pas le cas, lancez <code>fink install xfree86-rootless</code>. Cela devrait résoudre le problème.</p><p>Si ces paquets sont installés, essayez la commande <code>fink rebuild xfree86-rootless</code>. Si cela ne marche pas, vérifiez que le répertoire <code>/usr/bin/X11R6</code> est dans votre PATH.</p></div>
</a>

<a name="apple-x-delete">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.5: Comment avoir sous X11 d'Apple le même comportement de la touche suppr que sous XDarwin ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Certains utilisateurs ont signalé que la touche <code>suppr</code> se comporte différemment sous XDarwin et sous X11 d'Apple. On peut rectifier cela en ajoutant les lignes suivantes au fichier de démarrage approprié de X :</p><p>Dans le fichier <b>.Xmodmap</b>, rajoutez la ligne :</p><pre>keycode 59 = Delete</pre><p>Dans le fichier <b>.Xresources</b>, rajoutez les lignes :</p><pre>xterm*.deleteIsDEL: true 
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?</pre><p>Dans le fichier <b>.xinitrc</b>, rajoutez les lignes :</p><pre>xrdb -load $HOME/.Xresources 
xmodmap $HOME/.Xmodmap</pre><p></p></div>
</a>
<a name="gnome-two">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.6: Après passage de GNOME 1.x à GNOME 2.x, le programme <code>gnome-session</code> n'ouvre plus de gestionnaire de fenêtres. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Alors que, sous GNOME 1.x, <code>gnome-session</code> invoque automatiquement le gestionnaire de fenêtres <code>sawfish</code>, sous GNOME 2.x, vous devez vous-même appeler un gestionnaire de fenêtres dans le fichier <code>~/.xinitrc</code> avant de lancer <code>gnome-session</code>, par exemple :</p><pre>... 
exec metacity &amp; exec gnome-session</pre><p>Note : ceci n'est plus vrai pour <b>GNOME 2.4</b>. Le lancement de <code>gnome-session</code> invoque un gestionnaire de fenêtres.</p></div>
</a>
<a name="apple-x11-no-windowbar">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.7: Après passage à X11 d'Apple sous Panther, les barres de titre de fenêtre n'apparaissent plus. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Vous n'êtes pas passé à la version "X11 1.0 - XFree86 4.3.0" incluse dans Panther. Vous devez installer X11 à partir du paquet X11.pkg qui est situé sur le disque 3.</p></div>
</a>
<a name="apple-x11-wants-xfree86">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.8: I'm having problems with X11 and Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> There are two possibilities to consider.</p><ul>
          <li>
            <b>You are installing from binaries:</b>
            <p>Typically what you need to do is reinstall the X11User package,
	    since the installer application occasionally misses installing a file.
	    You may need to repeat this multiple times. Running</p>
	    <pre>fink list -i system-xfree86</pre>
	    <p>should show that the <code>system-xfree86</code> and
	    <code>system-xfree86-shlibs</code> packages are installed, and</p>
	    <pre>fink list x11</pre>
	    <p>should indicate that the <code>x11-shlibs</code> and <code>x11</code> virtual
	    packages are present.</p>
	    <p>If reinstalling the X11User package doesn't work, then consult the
	    <a href="#special-x11-debug">special debug</a> instructions,
	    below.</p>
          </li>
          <li>
            <b>You are installing from source:</b>
	    <p>Typically this error means that you need to (re)install the X11SDK,
	    which is <b>mandatory</b> if you want to build packages from source.
            It is in the Xcode Tools folder of a Tiger DVD, or (Optional
            Installs/)Xcode Tools/Packages on your Leopard DVD(s). If you
            run</p>
            <pre>fink list -i system-xfree86  </pre>
            <p>it should show the <code>system-xfree86</code>,
	    <code>system-xfree86-shlibs</code>, and <code>system-xfree86-dev</code>
	    packages as installed.  If the <code>-dev</code> package is missing,
	    reinstall the X11SDK, since sometimes the Apple Installer misses a
	    file.  You may need to keep doing this.  If either of the other two
	    are missing, then reinstall the X11User package (same reason).  At
	    this point</p>
	    <pre>fink list x11</pre>
	    <p>should indicate that the <code>x11-dev</code>, <code>x11-shlibs</code>,
	    and <code>x11</code> virtual packages are present.</p>
	    <p>If reinstalling the X11SDK or X11User package doesn't work, then consult the
	    <a href="#special-x11-debug">special debug</a> instructions,
	    below.</p>
           </li>
        </ul></div>
    </a>
    
<a name="special-x11-debug">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.9: Des problèmes persistent entre X11 et Fink. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Si les solutions données aux sections <a href="#apple-x11-wants-xfree86">Fink continue à vouloir installer XFree86 ou X.org</a> ou <a href="#wants-xfree86-on-upgrade">Fink veut installer XFree86</a> ne résolvent pas votre problème, ou ne sont pas applicables à votre cas, vous devrez supprimer entièrement X11 et tous les paquets fantômes antérieurs ainsi que les paquets relatifs à X11, qu'ils soient installés partiellement ou non via les commandes:</p><p>On Leopard, use</p><pre>
sudo pkgutil --forget com.apple.pkg.X11User
sudo pkgutil --forget com.apple.pkg.X11SDKLeo
</pre><p>Then, on either 10.4 or 10.5, run</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43 xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless \
xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg
fink selfupdate; fink index</pre><p>(the first line may give you warnings about trying to remove
	nonexistent packages).  Then, reinstall Apple's X11 (and the X11SDK, if
	needed), or,
	if you're on 10.4, an alternative X11 implementation, like XFree86 or X.org.</p><p>If you are still having problems then you can run</p><pre>fink-virtual-pkgs --debug</pre><p>pour savoir quels sont les paquets manquants.</p><p>Si vous utilisez une version antérieure de <code>fink</code>, vous pouvez télécharger et lancer un script Perl, écrit par Martin Costabel, qui fournit les mêmes informations.</p><ul>
<li>Vous le trouverez sur <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
</li>
<li>Sauvegardez-le où vous voulez.</li>
<li>Lancez-le dans une fenêtre de terminal via la commande :
<pre>perl fink-x11-debug</pre>
</li>
</ul></div>
</a>
<a name="tiger-gtk">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.10: Après passage à Tiger (Mac OS X 10.4), des erreurs à propos de <code>_EVP_idea_cbc</code> apparaissent chaque fois qu'on utilise une application Gtk. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ceci était, apparemment, dû à un bogue dans le chargeur de liens dynamiques de Tiger (au moins jusqu'à la version 10.4.1), mais il semble être corrigé dans la version 10.4.3. Fink proposait une solution dans le fichier <code>base-files-1.9.7-1</code> et les versions suivantes.</p><p>Si vous n'êtes pas passé à Tiger et/ou n'avez pas mis à jour le paquet <code>base-files</code>, vous pouvez corriger ce problème en préfixant le nom du logiciel que vous souhaitez lancer avec le fragment de code suivant :</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>Par exemple si vous voulez lancer <code>gnucash</code>, utilisez la commande :</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>Cette méthode fonctionne pour les applications lancées à partir du menu Applications de X11 d'Apple ou à partir du terminal.</p><p>Vous pouvez aussi déclarer la variable au niveau global (par exemple dans votre script de démarrage et/ou dans votre fichier<code>.xinitrc</code>, ce qui peut-être nécessaire pour faire tourner GNOME). Mettez le fragment de code suivant :</p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>dans votre fichier <code>.xinitrc</code> (quel que soit votre shell d'ouverture de session) ou dans le fichier <code>.profile</code> (ou tout autre script de démarrage) pour les utilisateurs de <b>bash</b>.</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>est la commande équivalente à utiliser, par exemple dans votre fichier <code>.cshrc</code> pour les utilisateurs de <b>tcsh</b>.</p><p>Note : ceci est fait automatiquement quand on installe une version suffisamment récente du fichier <code>base-files</code>.</p></div>
</a>
<a name="yelp">
<div class="question"><p><b><?php echo FINK_Q ; ?>9.11: Il est impossible d'accéder à l'aide dans aucune application GNOME. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Vous devez installer le paquet <code>yelp</code>. Ce paquet n'est pas inséré dans le fagot GNOME, car il utilise des outils cryptographiques, et nous avons décidé de ne pas installer l'ensemble de GNOME dans la branche cryptographique, juste pour pouvoir utiliser le système d'aide.</p></div>
</a>

<?php include_once "../footer.inc"; ?>


