<?
$title = "Utilisation de X11 - Installation de XFree86";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/04/08 08:01:50';
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
    
    <h2><a name="official-binary">3.3 The Official Binaries</a></h2>
      
      <p>
The XFree86 project has an official binary distribution of XFree86
4.2.0, which can be upgraded to 4.2.1.1 with patches.
You can find it on your local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
the directory <code>4.2.0/binaries/Darwin-ppc-5.x</code>.
Be sure to get the <code>Xprog.tgz</code> and <code>Xquartz.tgz</code>
tarballs even though they are marked as optional.
If you're unsure what you need, just download the whole directory.
Run the <code>Xinstall.sh</code> script as root to install the stuff.
(You might want to read the <a href="http://www.xfree86.org/4.2.0/Install.html">official
instructions</a> before installing.)   If you prefer, you can use the <a href="http://prdownloads.sourceforge.net/xonx/XInstall_10.1.sit?download">binary</a> from XonX, which uses identical source but is easier to use.  In either case, download, unzip and run the following upgrades:</p>
      <ol>
        <li>10.1 users: <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.1.zip?download">4.2.0 -&gt; 4.2.0.1 upgrade</a>.  10.2 users:  <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.2.zip?download">4.2.0 -&gt; 4.2.0.1 upgrade</a>
        </li>
        <li>10.1 and 10.2 users:  <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.1.1.zip?download">4.2.0.1 -&gt; 4.2.1.1 upgrade</a>
        </li>
      </ol>
      <p>There is an official binary distribution of XFree86
4.3.0, as well, on the<a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirrors</a> in
the directory <code>4.3.0/binaries/Darwin-ppc-6.x</code>.
Be sure to get the <code>Xprog.tgz</code> and <code>Xquartz.tgz</code>
tarballs even though they are marked as optional.
If you're unsure what you need, just download the whole directory.
Run the <code>Xinstall.sh</code> script as root to install the stuff.
(You might want to read the <a href="http://www.xfree86.org/4.3.0/Install.html">official
instructions</a> before installing.)</p>
      <p>Whichever version you install, you've now got XFree86 with a server that can do fullscreen, or 
rootless under Mac OS X.
</p>
    
    <h2><a name="official-source">3.4 The Official Source</a></h2>
      
      <p>
If you've got the time to spare, you can build XFree86 4.2.0 from
source.
You can find the source on you local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
the directory <code>4.2.0/source</code>.
Grab all three <code>X420src-#.tgz</code> tarballs and extract them in
the same directory.
You can customize the build by putting macro definitions in the file
<code>config/cf/host.def</code> in the XFree86 source tree.

See
<code>config/cf/darwin.cf</code> for some hints.
(Note: Only the macros that have an #ifndef check around them can be
overwritten in host.def.)
</p>
      <p>
When you're happy with your configuration, compile and install XFree86
with the following commands:
</p>
      <pre>make World
sudo make install install.man</pre>
      <p>To update to 4.2.1.1, follow the instructions in the <a href="#official-binary">Official Binaries</a> section.</p>
      <p>To install 4.3.0, follow the above instructions, replacing "2" with "3", but don't do the 4.2.1.1 update procedure.</p>
      <p>
As with the official binaries, you've now got XFree86 with a server
that can do fullscreen, or rootless under Mac OS X.
</p>
    
    <h2><a name="latest-cvs">3.5 The Latest Development Source</a></h2>
      
      <p>
If you have not only time, but also some nerves to spare you can get
the latest development version of XFree86 from the public CVS
repository.
Note that the code is under constant development; what you get today
is usually not the same as what you got yesterday.
</p>
      <p>
To install, follow the <a href="http://www.xfree86.org/cvs/">XFree86
CVS</a> instructions to download the <code>xc</code> module.
Then, follow the source build instructions above.
</p>
    
    <h2><a name="macgimp">3.6 MacGimp</a></h2>
      
      <p>
The downloadable installer which was offered by the MacGimp people 
during 2001
did not contain XFree86.
(It would overwrite some XFree86 configuration files, though.)
</p>
      <p>
The CD that <a href="http://www.macgimp.com/">MacGimp, Inc.</a>
offers for sale reportedly contains XFree86.
It's not quite clear what version it is; it may be a mix of
4.0.3, 4.1.0 and a development snapshot.
The server does rootless mode, using a patch from the time before
4.1.0.
</p>
    
    <h2><a name="switching-x11">3.7 Replacing X11</a></h2>
      
      <p>
If you have already installed one of the Fink X11 packages but for one reason or another
have decided you need to remove one and replace it with another, the procedure is pretty
straightforward.  You will have to force a removal of the old packages, and then install the
new, to keep your dpkg database consistent.
</p>
      <p>
There are two different ways to do this:
</p>
      <ol>
        <li>
          <p>Use FinkCommander</p>
          <p>
   If you are using <a href="http://finkcommander.sourceforge.net/">FinkCommander</a>, you
   can force removal through the menu.  For example, if you have
   <code>xfree86-rootless</code> installed, but want the threaded version, you
   can select your <code>xfree86-rootless</code>,
   <code>xfree86-rootless-shlibs</code>, <code>xfree86-base</code>, and
   <code>xfree86-base-shlibs</code> packages, and then run:
  </p>
          <pre>Source -&gt; Force Remove</pre>
        </li>
        <li>
          <p>Manually Remove from the Command-Line</p>
          <p>
   To manually, remove them, you use the <code>dpkg</code> with the --force-depends
   option, like so:
  </p>
          <pre>sudo dpkg -r --force-depends xfree86-rootless\ 
xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
          <p>
   Note that if you have apps that require threaded XFree86, you may have trouble with your
   dpkg database if you force remove it and install a different XFree86 package or placeholder
   package.
  </p>
        </li>
      </ol>
      <p>If, on the other hand, you have an X11 version that was not installed via Fink, you'll need to remove it via the command line:</p>
      <pre>sudo rm -rf /usr/X11R6 /etc/X11</pre>
      <p>The above holds true for removing any flavor of X11 that you didn't install through Fink.  You will also need to remove <code>XDarwin.app</code> | 
<code>X11.app</code>, depending on what you had installed.  Make sure to check your <code>.xinitrc</code> if you are removing Apple's X11 to 
make sure that you aren't trying to run <code>quartz-wm</code>.  You can now install whatever new X11 variety you want, manually or via Fink.</p>
    
    <h2><a name="fink-summary">3.8 Fink package summary</a></h2>
      
      <p>
A quick summary of the install options and the Fink packages you
should install:
</p>
      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Install Type</th><th align="left">Fink packages</th></tr><tr valign="top"><td>4.2.x built via Fink</td><td>
            <p>
              <code>xfree86-base</code> and <code>xfree86-rootless</code> (and their <code>-shlibs</code>)</p>
            <p>or <code>xfree86-base-threaded</code> and <code>xfree86-rootless-threaded</code> (and <code>-shlibs</code>)</p>
          </td></tr><tr valign="top"><td>4.3.x built via Fink</td><td>
            <p>
              <code>xfree86</code> and <code>xfree86-shlibs</code>
            </p>
          </td></tr><tr valign="top"><td>4.x official binaries</td><td>
            <p>
              <code>system-xfree86</code> only (+splitoffs)</p>
          </td></tr><tr valign="top"><td>4.x built from source, or from the latest CVS source</td><td>
            <p>
              <code>system-xfree86</code> only (+splitoffs)</p>
          </td></tr><tr valign="top"><td>4.2.x from Apple</td><td>
            <p>
              <code>system-xfree86</code> only (+splitoffs)
</p>
          </td></tr><tr valign="top"><td>4.3.x from Apple</td><td>
            <p>
              <code>system-xfree86</code> only (+splitoffs)
</p>
          </td></tr></table>
    
  <p align="right">
Next: <a href="run-xfree86.php?phpLang=fr">4 Starting XFree86</a></p>

<? include_once "footer.inc"; ?>
