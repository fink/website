<?
$title = "Guide utilisateur - Installation";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/02 17:42:23';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="next" href="packages.php?phpLang=fr" title="Installation de paquets"><link rel="prev" href="intro.php?phpLang=fr" title="Introduction">';

include_once "header.inc";
?>

<h1>Guide utilisateur - 2 Première installation</h1>
    
    
    
      <p>
Lors de la première installation, un système de base, comprenant les outils de gestion de paquets, est installé sur votre machine.
Ensuite, vous devez définir votre environnement shell pour utiliser les logiciels installés par Fink.
Cette procédure ne se fait qu'à la première installation ; à partir de la version 0.2.0, vous pouvez mettre à niveau Fink sans le réinstaller.
La procédure de mise à niveau est expliquée au <a href="upgrade.php?phpLang=fr">chapitre Mise à niveau</a>.
</p>
      <p>
Après que les outils de gestion de paquets sont installés, vous pouvez les utiliser pour installer d'autres logiciels.
La procédure est expliquée au <a href="packages.php?phpLang=fr">chapitre Installation de Paquets</a>.
</p>
    
    <h2><a name="bin">2.1 Installation de la distribution binaire</a></h2>
      
      <p>
La distribution binaire se fait sous forme d'une image disque (.dmg) contenant un paquet d'installation Mac OS X (.pkg).
Après téléchargement de l'image disque à partir de la 
<a href="http://fink.sourceforge.net/download/bindist.php">page de téléchargement</a>
(vous devrez peut-être utiliser les fonctions "Téléchargez le fichier lié sous..." ou "Téléchargez sur le disque"), double-cliquez dessus pour la monter. 
Ouvrez l'icône disque  "Fink 0.x.x Installer" qui apparaît sur votre bureau (ou dans le répertoire de téléchargement que vous avez choisi) après vérification du fichier par Utilitaire de disque (ou Images disques pour les versions antérieures à 10.3).
Vous trouverez, à l'intérieur, des documents et un paquet d'installation.
Double-cliquez sur le paquet d'installation et suivez les instructions qui apparaîtront à l'écran.
</p>
      <p>
Un mot de passe administrateur vous sera demandé et un texte s'affichera.
Lisez-le - il se peut qu'il soit plus récent que ce guide utilisateur.
Quand l'installeur vous demandera de choisir un disque d'installation, assurez-vous que vous cliquez sur le volume système (celui sur lequel vous avez installé Mac OS X).
Si vous choisissez un autre volume, l'installation s'effectuera, mais Fink ne fonctionnera pas.
Quand le processus d'installation sera terminé, suivez les instructions de la section
<a href="#setup">Définition de votre environnement</a>.
</p>
    
    <h2><a name="src">2.2 Installation de la distribution source</a></h2>
      
      <p>
La distribution source se fait sous forme d'une archive standard tar Unix (.tar.gz).
Elle ne contient que le gestionnaire de paquets <code>fink</code> et les descriptions de paquets. Les sources des paquets seront téléchargés à la demande.
L'archive est disponible sur la 
<a href="http://fink.sourceforge.net/download/srcdist.php">page de téléchargements</a>.
N'utilisez surtout pas StuffIt Expander pour extraire l'archive tar.
StuffIt ne gère toujours pas correctement les noms de fichiers longs.
Si StuffIt Expander a déjà extrait les fichiers de l'archive, mettez à la poubelle le répertoire qu'il a créé.
</p>
      <p>
La version source doit être installée à partir de la ligne de commande. Ouvrez donc Terminal.app et déplacez-vous dans le répertoire où se trouve l'archive fink-0.x.x-full.tar.gz.
La commande suivante extrait l'archive :
</p>
      <pre>tar -xzf fink-0.x.x-full.tar.gz</pre>
      <p>
Elle crée un répertoire qui porte le même nom que l'archive.
Ici, nous l'appellerons <code>fink-0.x.x-full</code>.
Déplacez-vous dans ce répertoire et lancez le script bootstrap :
</p>
      <pre>cd fink-0.x.x-full
./bootstrap.sh</pre>
      <p>
Le script effectue quelques vérifications sur votre système et utilise sudo pour acquérir les privilèges de super-utilisateur - pour ce faire, vous devrez fournir votre mot de passe.
Ensuite, vous devrez indiquer le chemin d'installation.
Vous devez utiliser le chemin par défaut -
<code>/sw</code>, sauf si vous avez de bonnes raisons de faire autrement.
Seul le chemin par défaut vous permettra d'installer des paquets binaires ultérieurement.
C'est pourquoi tous les exemples de ce guide utilise ce chemin ; modifiez le chemin en conséquence si vous utilisez un autre chemin.
</p>
      <p>
Ensuite, vous devrez configurer Fink.
Vous devrez répondre à des questions concernant votre proxy, les miroirs et la verbosité des messages.
Si vous ne comprenez pas une question, appuyez sur la touche retour chariot pour accepter le choix par défaut.
Vous pourrez ultérieurement changer la configuration en utilisant la commande <code>fink
configure</code>.
</p>
      <p>
Quand le script bootstrap aura toutes les informations nécessaires, il commencera à télécharger le code source du système de base et le compilera.
Le processus continuera sans interaction de votre part.
Ne vous inquiétez pas si vous voyez que certains paquets sont compilés deux fois.
Ceci est nécessaire car, pour construire un paquet binaire du gestionnaire de paquets, il faut d'abord que le gestionnaire de paquets existe.
</p>
      <p>
À la fin du bootstrap, enchaînez sur la section 
<a href="#setup">Définition de votre environnement</a>.
</p>
    
    <h2><a name="setup">2.3 Définition de votre environnement</a></h2>
      
      <p>
Pour pouvoir utiliser les logiciels installés dans l'arborescence de répertoires de Fink, y compris les programmes de gestion de paquets, vous devez définir la variable d'environnement PATH
(et quelques autres variables).
Dans la plupart des cas, vous le ferez à l'aide de la commande :
</p>
      <pre>open /sw/bin/pathsetup.command</pre>
      <p>ou pour <code>fink-0.18.3</code> ou <code>fink-0.19.2</code>, en lançant (exactement comme indiqué ci-dessous) :
</p>
      <pre>/sw/bin/pathsetup.sh</pre>
      <p>
Néanmoins, si cela ne fonctionne pas, vous pouvez configurer ces paramètres vous-même. La façon de le faire dépend du shell que vous utilisez.
Vous déterminerez le shell utilisé en ouvrant un terminal et en utilisant la commande :
</p>
      <pre>echo $SHELL</pre>
      <p>
 Si le résultat est "csh" ou "tcsh", c'est que vous utilisez le shell C. Si le résultat est bash, zsh, sh, ou quelque chose de similaire, vous utilisez vraisemblablement une variante du shell Bourne.
</p>
      <ul>
        <li>
          <p>
            Shell Bourne (par défaut sur Mac OS X 10.3 et versions suivantes) </p>
          <p>
   Si vous utilisez un shell de type Bourne (sh, bash, zsh), ajoutez la ligne suivante au fichier <code>.profile</code> de votre répertoire utilisateur (s'il existe déjà un fichier <code>.bash_profile</code> dans ce répertoire, vous devez l'utilisez au lieu du fichier <code>.profile</code>) :
  </p>
          <pre>. /sw/bin/init.sh</pre>
          <p>
   Si vous ne savez pas comment ajouter la ligne, utilisez ces commandes :
  </p>
          <pre>cd
pico .profile</pre>
          <p>
   Vous serez alors dans un éditeur de texte plein-écran (une fenêtre plein-écran de terminal), et il vous suffira de saisir la ligne <code>. /sw/bin/init.sh</code>.  Ne vous inquiétez pas si vous voyez une note disant  "New file".  N'oubliez pas d'appuyer au moins une fois sur la touche retour chariot après la ligne saisie, puis appuyez successivement sur les touches Ctrl-O, Retour chariot et Ctrl-X pour sortir de l'éditeur.
  </p>
        </li>
        <li>
          <p>
            Shell C (défaut sur Mac OS X 10.2 et versions antérieures) </p>
          <p>
   Si vous utilisez tcsh, ajoutez la ligne suivante au fichier <code>.cshrc</code> de votre répertoire utilisateur :
  </p>
          <pre>source /sw/bin/init.csh</pre>
          <p>
   Si vous ne savez pas comment ajouter la ligne, utilisez les commandes suivantes :
  </p>
          <pre>cd
pico .cshrc</pre>
          <p>
  Vous serez alors dans un éditeur de texte plein-écran (une fenêtre plein-écran de terminal), et il vous suffira de saisir la ligne <code>source /sw/bin/init.sh</code>.  Ne vous inquiétez pas si vous voyez une note disant  "New file".  N'oubliez pas d'appuyer au moins une fois sur la touche retour chariot après la ligne saisie, puis appuyez successivement sur les touches Ctrl-O, Retour chariot et Ctrl-X pour sortir de l'éditeur.
 </p>
          <p>Vous devrez éditer d'autres fichiers dans les cas suivants :</p>
          <ol>
            <li>
              <p>Vous avez un fichier <code>~/.tcshrc</code>.</p>
              <p>Un tel fichier est parfois créé par des applications de tierce partie, ou vous pouvez l'avoir créé vous-même.
  Si tel est le cas, <code>~/.tcshrc</code> est lu, mais
  <code>~/.cshrc</code> est ignoré.
  Nous vous recommandons d'éditer le fichier <code>~/.tcshrc</code>, comme expliqué ci-dessus pour le fichier 
  <code>~/.cshrc</code>, et d'ajouter la ligne suivante à la fin : </p>
              <pre>source ~/.cshrc</pre>
              <p>De cette façon, si jamais vous supprimez le fichier <code>~/.tcshrc</code>, vous pourrez toujours faire tourner Fink.</p>
            </li>
            <li>
              <p>Vous avez suivi les instructions figurant dans le fichier <code>/usr/share/tcsh/examples/README</code>.</p>
              <p>Vous avez donc créé deux fichiers <code>~/.tcshrc</code> et <code> ~/.login</code> .  Dans ce cas,  <code>~/.login</code>, qui est lu après <code>~/.tcshrc</code>, source le fichier  <code>/usr/share/tcsh/examples/login</code>.  Ce dernier contient une ligne qui écrase la définition précédente de votre variable d'environnement PATH.  Vous devez alors créer un répertoire <code>~/Library/init/tcsh/path</code>:</p>
              <pre>mkdir -p ~/Library/init/tcsh
  pico ~/library/init/tcsh/path</pre>
              <p>et y intégrez la ligne suivante :</p>
              <pre>source ~/.cshrc</pre>
              <p>Vous devrez aussi modifier le fichier .tcshrc, comme expliqué au-dessus, de façon à ce que votre PATH soit correctement défini dans les cas où le fichier <code>~/.login</code> n'est pas lu.</p>
            </li>
          </ol>
          <p>
Les changements dans .cshrc (et dans les autres fichiers de démarrage) n'affectent que les nouveaux shells (les nouvelles fenêtres de Terminal). 
Vous devez donc aussi exécuter cette commande dans toutes les fenêtres de Terminal que vous avez ouvertes avant d'éditer le fichier.
Vous devez aussi exécuter la commande <code>rehash</code>, car tcsh cache la liste des commandes disponibles.
  </p>
        </li>
      </ul>
      <p>
Notez que les scripts ajoutent <code>/usr/X11R6/bin</code> et
<code>/usr/X11R6/man</code> à votre PATH pour que vous puissiez utilisez X11 lorsqu'il sera installé.
Les paquets Fink peuvent définir eux-mêmes des variables, tel le paquet qt qui définit la variable d'environnement QTDIR.
</p>
      <p>
Quand vous aurez fini de définir votre environnement, allez au chapitre 
<a href="packages.php?phpLang=fr">Installation de paquets</a> pour savoir comment installer des paquets réellement utiles avec les outils de gestion de paquets inclus dans Fink.
</p>
    
  <p align="right">
Next: <a href="packages.php?phpLang=fr">3 Installation de paquets</a></p>

<? include_once "footer.inc"; ?>
