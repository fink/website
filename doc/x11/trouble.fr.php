<?
$title = "Utilisation de X11 - Résolution de problèmes";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/05/13 01:48:06';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="tips.php?phpLang=fr" title="Usage Tips"><link rel="prev" href="other.php?phpLang=fr" title="Autres possibilités pour X11">';

include_once "header.inc";
?>

<h1>Utilisation de X11 - 7 Résolution de problèmes engendrés par XFree86</h1>
    
    
    <h2><a name="immedate-quit">7.1 Après lancement, XDarwin se termine ou se plante quasi immédiatement</a></h2>
      
      <p>
Tout d'abord : pas de panique ! Il existe un grand nombre de choses qui peuvent ne pas fonctionner correctement avec XFree86 ; et un bon nombre d'entre elles peuvent causer des problèmes de démarrage. De plus, quand XDarwin rencontre des problèmes au démarrage, il est fréquent qu'il se plante. Cette section tente de fournir une liste exhaustive des problèmes que vous pouvez rencontrer. Mais, tout d'abord, vous devez collecter deux informations importantes.
</p>
      <p>
        <b>Version de X.</b>
Vous obtiendrez la version de XDarwin en cliquant <b>une seule fois</b> sur l'icône de XDarwin dans le Finder, puis en choisissant "Lire les informations" à partir du menu (raccourci Cmd-I). Le numéro de version n'est incrémenté que lorsqu'une nouvelle version de test binaire est produite par le projet XonX ; autrement dit, "1.0a1" correspond à n'importe quelle version entre 1.0a1 et 1.0a2.
</p>
      <p>
        <b>Messages d'erreur.</b>
Ils sont essentiels à la compréhension du problème auquel vous êtes confronté. Leur emplacement dépend de la façon dont vous avez lancé XDarwin. Si vous avez lancé <code>startx</code> dans une fenêtre de Terminal, les messages apparaissent directement dans cette fenêtre. Vous pouvez utiliser les barres de défilement. Si vous avez lancé XDarwin en double-cliquant sur son icône, les messages apparaissent dans les logs système, auxquels vous avez accès via l'application Console, située dans le répertoire Utilities (situé dans le répertoire Applications). Assurez-vous que vous récupérez les bons messages, c'est-à-dire les derniers.
</p>
      <p>
Commençons par une liste des messages possibles :
</p>
      <pre>_XSERVTransmkdir: Owner of /tmp/.X11-unix should be set to root</pre>
      <pre>_IceTransmkdir: Owner of /tmp/.ICE-unix should be set to root</pre>
      <p>
Sévérité : inoffensif.
X11 crée des répertoires cachés dans /tmp pour stocker les "fichiers"  socket utilisés pour les connexions locales. Pour des raisons de sécurité, X11 s'attend à ce que le possesseur de ces répertoires soit le super-utilisateur ; mais, comme ils sont accessibles en écriture par tout utilisateur, X11 fonctionne sans problèmes. (Note : il est très difficile de définir le super-utilisateur comme possesseur de ces répertoires, car Mac OS X vide /tmp lors du redémarrage et XDarwin ne fonctionne pas, en temps normal, - et n'a pas besoin de fonctionner - avec les privilèges de super-utilisateur.)
</p>
      <pre>QuartzAudioInit: AddIOProc returned 1852797029</pre>
      <pre>-[NSCFArray objectAtIndex:]: index (2) beyond bounds (2)</pre>
      <pre>kCGErrorIllegalArgument : CGSGetDisplayBounds (display 35434400)</pre>
      <pre>No core keyboard</pre>
      <p>
Sévérité : bogue.
Ce sont des erreurs qui apparaissent quand le serveur tente de se rétablir après une erreur précédente. Durant ce processus, une nouvelle copie de la bannière de démarrage est imprimée, suivie d'un ou plusieurs messages semblables à ceux indiqués ci-dessus, car la procédure de rétablissement du serveur ne fonctionne pas correctement dans certaines versions de XDarwin. Quand vous voyez apparaître ce type de messages, utilisez les barres de défilement dans la fenêtre de Terminal ou dans la fenêtre de Console pour rechercher plus haut une autre bannière de démarrage suivie d'autres messages. Ce bogue affecte toutes les versions de XDarwin jusqu'à la version 1.0a3 ; il a été résolu après la publication de la version 1.0a3.
</p>
      <pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>
      <p>
Sévérité : quasi inoffensif.
On ne sait pas d'où viennent ces messages et ils semblent n'avoir aucune incidence sur le déroulement des opérations. Vous pouvez les éliminer en exécutant <code>touch .Xauthority</code> dans votre répertoire utilisateur.
</p>
      <pre>Gdk-WARNING **: locale not supported by C library</pre>
      <p>
Sévérité : inoffensif.
Cela signifie que la librairie C ne gère pas votre locale, mais cela n'empêche pas l'application de fonctionner. Pour de plus amples informations, <a href="#locale">voir ci-dessous</a>.
</p>
      <pre>Gdk-WARNING **: locale not supported by Xlib, locale set to C
Gdk-WARNING **: can not set locale modifiers</pre>
      <p>
Sévérité : pas bon, mais non fatal.
Ces messages peuvent apparaître à la suite du précédent. Ceci signifie que les fichiers de données locale de XFree86 n'existent pas sur votre système. Il semble que le message apparaisse de façon erratique quand on compile XFree86 à partir du source. La plupart des applications fonctionnent, mais GNU Emacs fait partie des exceptions.
</p>
      <pre>Unable to open keymapping file USA.keymapping.
Reverting to kernel keymapping.</pre>
      <p>
Sévérité : souvent fatal.
Ceci peut se produire avec XDarwin 1.0a1, quand l'option "Load from file" est activée. Cette version requiert un chemin complet quand le fichier de mappage clavier est chargé via le dialogue de Préférences, mais exécute une recherche automatique quand l'option "-keymap" est utilisée en ligne de commande. Ce message est généralement suivi du message "assert" suivant. Pour résoudre le problème, suivez les instructions ci-dessous.
</p>
      <pre>Fatal server error:
assert failed on line 454 of darwinKeyboard.c!</pre>
      <pre>Fatal server error:
Could not get kernel keymapping! Load keymapping from file instead.</pre>
      <p>
Sévérité : fatal.
Les modifications qu'Apple a fait dans Mac OS X 10.1 ont entraîné des répercutions sur le fonctionnement de XFree86. En effet, celui-ci lit normalement les symboles clavier à partir du noyau du système opératoire. Le message ci-dessus en est la conséquence. Vous devez utiliser l'option de mappage de clavier "Load from file" sur Mac OS X 10.1. Cette option est accessible à partir du dialogue de Préférences de XDarwin. N'oubliez pas de choisir un fichier (c'est-à-dire utilisez le bouton "Pick file"). Cocher la case peut s'avérer insuffisant avec certaines versions de XDarwin. Si vous ne pouvez pas accéder au dialogue de Préférences, parce que XDarwin quitte avant que vous puissiez y accéder, exécutez 
<code>startx -- -quartz -keymap USA.keymapping</code> dans une fenêtre de Terminal. Ceci permet, en général, de lancer XDarwin ; il vous suffit ensuite d'aller dans le dialogue de Préférences et d'y activer le mappage du clavier pour que ce choix devienne permanent.
</p>
      <pre>Fatal server error:
Could not find keymapping file .</pre>
      <p>Sévérité : fatal (comme indiqué). Cette erreur est due à l'absence de fichiers de mappage clavier sous Panther. Vous devez installer <code>xfree86-4.3.99-16</code> ou une version postérieure, car ces versions ne nécessitent pas de fichiers de mappage clavier.</p>
      <pre>Warning: no access to tty (Inappropriate ioctl for device).
Thus no job control in this shell.</pre>
      <p>
Sévérité : quasi inoffensif.
XDarwin 1.0a2 et les versions suivantes lancent un shell interactif en arrière-plan pour exécuter le fichier de démarrage client (.xinitrc). Ceci afin que vous n'ayez pas besoin d'ajouter des commandes de définition de votre PATH dans ce fichier. Certains shells signalent qu'ils ne sont pas connectés à un vrai terminal ; ce message peut être ignoré, car cette instance de shell n'est pas utilisée pour exécuter quoi que ce soit qui requière un contrôle de tâches ou quelque chose de similaire.
</p>
      <pre>Fatal server error:
failed to connect as window server!</pre>
      <p>
Sévérité : fatal.
Cela signifie que le serveur a démarré en mode console (pour Darwin seul), alors que vous étiez connecté sous Aqua. Ceci arrive lorsque vous installez la distribution officielle binaire XFree86 et que vous oubliez d'installer l'archive tar Xquartz.tgz. Cela peut aussi survenir quand les liens symboliques dans /usr/X11R6/bin ne pointent pas sur les bons fichiers et quand vous lancez la commande <code>XDarwin</code> dans une fenêtre de Terminal pour démarrer le serveur (vous devez utiliser startx dans ce cas, voir <a href="run-xfree86.php?phpLang=fr">Lancement de XFree86</a>).
</p>
      <p>
Vous pouvez toujours lancer la commande <code>ls -l /usr/X11R6/bin/X*</code> et vérifier son résultat. Vous devez voir quatre lignes remarquables :
<code>X</code>, un lien symbolique pointant sur <code>XDarwinStartup</code> ; <code>XDarwin</code>, un fichier exécutable (c'est le serveur en mode console) ; <code>XDarwinQuartz</code>, un lien symbolique pointant sur <code>/Applications/XDarwin.app/Contents/MacOS/XDarwin</code> ; et <code>XDarwinStartup</code>, un petit fichier exécutable. Si l'un de ces fichiers manque ou ne pointe pas sur le bon fichier, vous devez corriger l'erreur. La façon de le faire dépend de la méthode que vous avez utilisée pour installer XFree86. Si vous avez installé XFree86 via Fink, vous devez réinstaller le paquet <code>xfree86</code> (ou <code>xfree86-rootless</code> pour Mac OS 10.2 ou versions antérieures). Si vous l'avez installé manuellement, vous devez récupérer les fichiers à partir d'une copie de Xquartz.tgz.
</p>
      <pre>The XKEYBOARD keymap compiler (xkbcomp) reports:
&gt; Error:            Can't find file "unknown" for geometry include
&gt;                   Exiting
&gt;                   Abandoning geometry file "(null)"
Errors from xkbcomp are not fatal to the X server</pre>
      <p>
Sévérité : quasi inoffensif.
Cette erreur n'est pas fatale. À ma connaissance, XDarwin n'utilise pas du tout l'extension XKB. Il est probable qu'un programme client tente, malgré tout, de l'utiliser...
</p>
      <pre>startx: Command not found.</pre>
      <p>
Sévérité : fatal.
Ceci arrive avec XDarwin 1.0a2 et 1.0a3 quand les fichiers d'initialisation de votre shell ne comprennent aucune commande pour ajouter le chemin /usr/X11R6/bin à la variable d'environnement PATH. Si vous utilisez Fink et que vous n'avez pas changer votre shell par défaut, il vous suffit d'ajouter la ligne <code>source /sw/bin/init.csh</code> au fichier <code>.cshrc</code> situé dans votre répertoire utilisateur, comme indiqué dans les instructions de Fink.
</p>
      <pre>_XSERVTransSocketUNIXCreateListener: ...SocketCreateListener() failed
_XSERVTransMakeAllCOTSServerListeners: server already running</pre>
      <pre>Fatal server error:
Cannot establish any listening sockets - Make sure an X server isn't already
running</pre>
      <p>
Sévérité : fatal.
Ceci arrive quand vous lancez involontairement plusieurs instances de XDarwin en même temps, ou après une déconnexion sauvage (un crash) de XDarwin. Cela peut provenir aussi d'un problème de permission sur les fichiers sockets utilisés pour les connexions locales. Vous pouvez tenter de résoudre le problème en exécutant <code>rm -rf /tmp/.X11-unix</code>. Le redémarrage de l'ordinateur résout aussi le problème dans la plupart des cas (Mac OS X vide automatiquement le répertoire /tmp lors du démarrage, et la pile réseau est redéfinie).
</p>
      <pre>Xlib: connection to ":0.0" refused by server
Xlib: Client is not authorized to connect to Server</pre>
      <p>
Sévérité : fatal.
Les programmes client sont incapables de se connecter au serveur d'affichage (XDarwin), car ils utilisent des données d'authentification incorrectes. La cause peut en être certaines installations VNC, le lancement de XDarwin via sudo, ou autres bizarreries. Pour résoudre le problème, il suffit de supprimer le fichier .Xauthority (qui stocke les données d'authentification) situé dans votre répertoire utilisateur et de recréer un fichier vide de la façon suivante :
</p>
      <pre>cd
rm .Xauthority
touch .Xauthority</pre>
      <p>
Une autre cause fréquente d'échec de démarrage de XFree86 est un fichier <code>.xinitrc</code> incorrect. Le fichier <code>.xinitrc</code> est lancé et, pour une raison inconnue, se termine quasi immédiatement. <code>xinit</code> interprète cette fin comme "une fin de session demandée par l'utilisateur" et tue XDarwin. Voir la <a href="run-xfree86.php?phpLang=fr#xinitrc">section Fichier .xinitrc</a> pour de plus amples informations. N'oubliez pas de définir le PATH et de choisir comme dernière commande un programme de longue durée ne tournant pas en arrière-plan. Conseil : ajoutez <code>exec xterm</code> comme roue de secours pour le cas où il serait impossible de trouver votre gestionnaire de fenêtres ou un programme équivalent.
</p>
    
    <h2><a name="black">7.2 Black icons in the GNOME panel or in the
menu of a GNOME application</a></h2>
      
      <p>
A common problem is that icons or other images are displayed as black
rectangles or black outlines.
Ultimately, this is caused by limitations in the operating system
kernel.
The problem has been reported to Apple, but so far they seem unwilling
to fix it; see the filed <a href="http://www.opensource.apple.com/bugs/X/Kernel/2691632.html">Darwin
bug report</a> for details.
</p>
      <p>
The current situation is that the MIT-SHM extension of the X11
protocol is practically unusable on Darwin and Mac OS X.
There are two ways to turn the protocol extension off: in the server
or in the clients.
The XFree86 servers installed by Fink (i.e. the xfree86-server and
xfree86-rootless packages) have it turned off.
The GIMP and the GNOME panel have been inoculated as well.
If you experience black icons in another application, start that
application with the <code>--no-xshm</code> command line option.
</p>
    
    <h2><a name="keyboard">7.3 The keyboard doesn't work in XFree86</a></h2>
      
      <p>
This is a known problem that so far seems to affect only portables
(PowerBook, iBook).
To work around this, the "Load from file" keymapping option was
implemented.
Nowadays it has become the default because the old method (reading the
mapping from the kernel) stopped working with Mac OS X 10.1.
If you haven't enabled the option already, you can do so in the
XDarwin preferences dialog.
Check the "Load from file" checkbox and select the keymapping file to
load.
After restarting XDarwin, your keyboard should mostly work (see
below).
</p>
      <p>
If you're starting XFree86 from the command line, you can pass the
name of the keymapping file to load as an option, as in:
</p>
      <pre>startx -- -quartz -keymap USA.keymapping</pre>
    
    <h2><a name="delete-key">7.4 The Backspace key doesn't work</a></h2>
      
      <p>
This can happen when you use the "Load keymapping from file" option
described above.
The mapping files describe the backspace key as "Delete", not as
"Backspace".
You can correct that by putting the following line in your .xinitrc
file:
</p>
      <pre>xmodmap -e "keycode 59 = BackSpace"</pre>
      <p>
If I remember correctly, XDarwin 1.0a2 and later have code that
correctly maps the Backspace key automatically.
</p>
    
    <h2><a name="locale">7.5 "Warning: locale not supported by C library"</a></h2>
      
      <p>
These messages are quite common, but harmless.
It just means what it says - internationalization is not supported
through the standard C library, the program will use the default
English messages, date formats, and so on.
There are several ways to deal with this:
</p>
      <ul>
        <li>
          <p>
Just ignore the messages.
</p>
        </li>
        <li>
          <p>
Get rid of the messages by unsetting the environment variable LANG.
Note that this will also turn internationalization off in programs
that actually support it (via gettext/libintl).
Example for .xinitrc:
</p>
          <pre>unset LANG</pre>
          <p>
Example for .cshrc:
</p>
          <pre>unsetenv LANG</pre>
        </li>
        <li>
          <p>
(10.1 only) Use the <code>libxpg4</code> Fink package.
It builds a small library that contains working locale functions and
arranges that it is loaded before the system libraries (using the
DYLD_INSERT_LIBRARIES environment variable).
You may have to set the LANG environment variable to a fully qualified
value, e.g. <code>de_DE.ISO_8859-1</code> instead of <code>de</code>
or <code>de_DE</code>.
</p>
        </li>
        <li>
          <p>
Ask Apple to include proper locale support in a future version of Mac
OS X.
</p>
        </li>
      </ul>
    
  <p align="right">
Next: <a href="tips.php?phpLang=fr">8 Usage Tips</a></p>

<? include_once "footer.inc"; ?>
