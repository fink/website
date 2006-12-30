<?
$title = "Q.F.P. - Utilisation de Fink";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/12/30 08:42:55';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="comp-general.php?phpLang=fr" title="Problèmes généraux de compilation"><link rel="prev" href="upgrade-fink.php?phpLang=fr" title="Mise à jour de Fink (Résolution de problèmes spécifiques à une version donnée)">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 5. Installation, Utilisation et Mise à jour de Fink</h1>


<a name="what-packages">
<div class="question"><p><b><? echo FINK_Q ; ?>5.1: Comment savoir quels sont les paquets gérés par Fink ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Depuis la version 0.2.3 de Fink, la commande list vous permet de le savoir. Cette commande produit une liste de tous les paquets connus de votre installation de Fink. Exemple :</p><pre>fink list</pre><p>Si vous utilisez la distribution binaire, <code>dselect</code> vous donne une liste des paquets disponibles dans laquelle vous pouvez naviguer. Remarque : vous devez utiliser la commande sudo si vous voulez sélectionner et installer des paquets avec dselect.</p><p>Il y a aussi la <a href="http://fink.sourceforge.net/pdb/">base de données de paquets</a> sur le site web.</p></div>
</a>
<a name="proxy">
<div class="question"><p><b><? echo FINK_Q ; ?>5.2: Comment configurer fink pour utiliser un proxy HTTP quand on est derrière un mur pare-feu ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> La commande <code>fink</code> permet de prendre en compte des réglages de proxy qui seront utilisés par <code>wget</code> et <code>curl</code>. Si on ne vous a pas posé de question sur vos réglages de proxies lors de la première installation, vous pouvez taper <code>fink configure</code> pour les régler. Vous pouvez aussi utiliser cette commande à n'importe quel moment pour reconfigurer la commande <code>fink</code>. Si vous avez suivi les instructions du guide d'installation et utilisé <code>/sw/bin/init.csh</code> (ou <code>/sw/bin/init.sh</code>), alors <code>apt-get</code> et <code>dselect</code> utiliseront aussi ces réglages de proxies. Assurez-vous d'avoir bien indiqué le protocole utilisé, par exemple :</p><pre>ftp://proxy.votresite.quelquepart</pre><p>Si vous avez toujours des problèmes, allez dans Préférences système, cliquez sur Réseaux, sélectionnez l'onglet proxies et vérifiez que la case "Utiliser le mode FTP passif (PASV)" est cochée.</p></div>
</a>
<a name="firewalled-cvs">
<div class="question"><p><b><? echo FINK_Q ; ?>5.3: Comment mettre à jour les paquets disponibles sur CVS lorsqu'on utilise un mur pare-feu ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Le paquet<b> cvs-proxy</b> peut créer un tunnel à travers les proxies HTTP.</p><ul>
<li><p>Installez le paquet <b>cvs-proxy</b> avec la commande :</p>
<p><code>fink --use-binary-dist install <b>cvs-proxy</b></code></p></li>
<li><p>Passez à la mise à jour via cvs avec la commande :</p>
<p><code>fink selfupdate-cvs</code></p></li>
</ul><p>Si Fink n'est pas configuré pour utiliser un proxy, changez les réglages en utilisant :</p><p><code>fink configure</code>.</p></div>
</a>
<a name="moving">
<div class="question"><p><b><? echo FINK_Q ; ?>5.4: Est-il possible de déplacer Fink vers un autre dossier après l'installation ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Non. Vous pouvez bien sûr déplacer les fichiers en utilisant mv ou le Finder, mais 99% des programmes ne fonctionneront plus si vous faites cela. En effet, la majorité des programmes Unix utilisent des chemins d'accès directement inclus dans le fichier binaire pour accéder,entre autres, à des données et des bibliothèques.</p></div>
</a>
<a name="moving-symlink">
<div class="question"><p><b><? echo FINK_Q ; ?>5.5: Est-ce que Fink fonctionnera correctement si on le déplace après installation et que l'on crée un lien symbolique vers son ancien emplacement ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Peut-être. On peut supposer que le fonctionnement sera correct dans l'ensemble, mais il y aura certainement des problèmes ici ou là.</p></div>
</a>
<a name="removing">
<div class="question"><p><b><? echo FINK_Q ; ?>5.6: Comment désinstaller Fink complètement ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Presque tous les fichiers installés par fink se trouvent dans le répertoire /sw (ou bien l'endroit où vous avez choisi de faire l'installation). Donc, pour supprimer Fink, entrez cette commande :</p><pre>sudo rm -rf /sw</pre><p>Les seules exceptions à cette règle concernent XFRee86 et X.org. Si vous avez installé un serveur X via Fink (vous avez, par exemple, installé le paquet <code>xfree86</code> ou <code>xfree86-rootless</code>, ou encore <code>xorg</code> au lieu d'utiliser <code>system-xfree86</code>) et que vous voulez le supprimer, vous devrez aussi saisir ceci :</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>Si vous ne pensez pas réinstaller Fink, vous pouvez aussi supprimer, en utilisant un éditeur de texte, la ligne "<code>source /sw/bin/init.csh</code>" que vous aviez ajoutée dans le fichier <code>.cshrc</code> ou la ligne "<code>source /sw/bin/init.sh</code>" que vous aviez ajoutée dans le fichier <code>.bashrc</code>, selon vos réglages.</p></div>
</a>
<a name="bindist">
<div class="question"><p><b><? echo FINK_Q ; ?>5.7: La base de données des paquets sur le site web mentionne le paquet xxx, mais apt-get ou dselect eux ne le mentionnent pas. Qui a raison ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ils ont tous raison. La <a href="http://fink.sourceforge.net/pdb/">base de données des paquets</a> donne la liste de tous les paquets, même ceux qui sont encore dans la section instable. Les outils <code>dselect</code> et <code>apt-get</code>, de leur côté, donnent la liste des paquets disponibles en tant que binaires précompilés. De nombreux paquets ne sont pas disponibles sous forme précompilée via ces outils pour diverses raisons. Un paquet doit être dans la section "stable" de la dernière mise à jour de Fink pour être pris en compte, et il doit, de plus, passer avec succès un certain nombre de tests relatifs aux règles de fink et aux restrictions de licences et brevets.</p><p>Si vous voulez installer un paquet qui n'est pas disponible via <code>dselect</code> ou <code>apt-get</code>, vous devez le compiler à partir du code source en utilisant <code>fink install <b>nom_du_paquet</b></code>. Vérifiez que vous avez installé les Developer Tools avant d'essayer ceci. (S'il n'y a pas d'installeur pour les Developer Tools dans votre répertoire <code>/Applications</code> , vous pouvez les télécharger gratuitement sur <a href="http://connect.apple.com/">Apple Developer Connection</a> après enregistrement). Voir aussi la question suivante à propos des paquets instables.</p></div>
</a>
<a name="unstable">
<div class="question"><p><b><? echo FINK_Q ; ?>5.8: Comment installer un paquet instable quand la commande fink ne le trouve pas (message en anglais : 'no package found') ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Assurez-vous d'abord de savoir ce que signifie 'instable'. Il existe de nombreuses raisons pour lesquelles un paquet de l'arborescence instable n'est pas mis dans l'arborescence stable. Il se peut qu'il souffre de problèmes connus, qu'il y ait des erreurs de validation, ou simplement qu'un nombre insuffisant de personnes ait signalé qu'il fonctionne correctement. C'est pourquoi Fink ne recherche pas dans cette arborescence par défaut.</p><p>Si vous décidez d'activer l'arborescence instable, pensez à envoyer un courriel au responsable du paquet si quelque chose fonctionne (ou ne fonctionne pas). Ce sont vos réactions qui nous permettent de décider si un paquet peut entrer dans l'arborescence stable ! Pour connaître le mainteneur du paquet, lancez la commande <code>fink info &lt;nom_du_paquet&gt;</code>.</p><p><b>À partir de la version </b><code>0.26.0 de fink</code> : vous pouvez activer l'arborescence instable via la commande <code>fink configure</code>. Il vous faudra ensuite exécuter les commandes : <code>fink selfupdate; fink index; fink scanpackages</code>. <b>Note</b> : il faut activer également la mise à jour via rsync ou cvs pour obtenir les nouvelles descriptions de paquets.</p><p>Si vous avez une version de fink antérieure à la version 0.26.0, modifiez le fichier <code>/sw/etc/fink.conf</code> : ajoutez <code>unstable/main</code> et <code>unstable/crypto</code> à la ligne <code>Trees:</code>, puis exécutez les commandes <code>fink selfupdate; fink index; fink scanpackages</code>.</p><p>Notez également que, si vous ne souhaitez installer que quelques paquets instables spécifiques et leurs dépendances, vous ne devez pas utiliser la commande <code>update-all</code> tant que vous n'êtes pas revenu à l'utilisation de l'arborescence stable.</p></div>
</a>
<a name="unstable-onepackage">
<div class="question"><p><b><? echo FINK_Q ; ?>5.9: Faut-il <b>vraiment</b> activer toute l'arborescence instable pour n'installer qu'un seul paquet instable ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Non, mais c'est fortement recommandé. Le mélange des genres peut créer des effets inattendus et rendre difficile un éventuel débogage.</p><p>Ceci dit, si vous ne voulez installer qu'un ou deux paquets instables spécifiques, vous devez changer vos réglages pour utiliser la mise à jour CVS (c'est-à-dire utiliser <code>fink selfupdate-cvs</code>), car rsync ne met à jour que les arborescences activées dans le fichier <code>fink.conf</code>. Éditez le fichier <code>/sw/etc/fink.conf</code> et ajoutez <code>local/main</code> à la ligne <code>Trees:</code>, si elle n'y figure pas déjà. Vous devrez alors exécuter <code>fink selfupdate</code> pour télécharger les fichiers de description des paquets. Copiez ensuite les fichiers <code>.info</code> qui vous intéressent (et leurs fichiers <code>.patch</code> associés, s'ils existent) à partir des sous-répertoires du répertoire <code>/sw/fink/dists/unstable/main/finkinfo</code> (ou à partir du répertoire <code>/sw/fink/dists/unstable/crypto/finkinfo</code>) dans le répertoire <code>/sw/fink/dists/local/main/finkinfo</code>. Notez cependant que votre paquet peut dépendre d'autres paquets (ou de versions particulières de paquets) qui sont uniquement présents dans l'arborescence instable. Vous devrez alors déplacer aussi leurs fichiers <code>.info</code> et <code>.patch</code> associés. Après avoir déplacé tous les fichiers, lancez la commande <code>fink index</code> pour que l'index des paquets disponibles de Fink soit mis à jour. Vous pourrez ensuite utiliser rsync à nouveau (<code>fink selfupdate-rsync</code>) si vous le désirez.</p></div>
</a>
<a name="sudo">
<div class="question"><p><b><? echo FINK_Q ; ?>5.10: Comment ne plus avoir à saisir son mot de passe après la commande sudo ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous n'êtes pas paranoïaque, vous pouvez configurer sudo pour qu'il ne vous demande pas votre mot de passe. Pour cela, mettez-vous en mode super-utilisateur et lancez <code>visudo</code>, puis ajoutez la ligne suivante :</p><pre>nomutilisateur ALL = NOPASSWD: ALL</pre><p>Remplacez bien sûr <code>nomutilisateur</code> par votre nom d'utilisateur. Cette ligne vous permet d'exécuter n'importe quelle commande avec sudo sans saisir votre mot de passe.</p></div>
</a>
<a name="exec-init-csh">
<div class="question"><p><b><? echo FINK_Q ; ?>5.11: À l'exécution de init.csh ou de init.sh, un message d'erreur signale que l'autorisation est refusée (message en anglais "Permission denied") . Que se passe-t-il ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> init.csh et init.sh ne doivent pas être exécutés comme les commandes habituelles. Ces fichiers définissent des variables d'environnement, tels PATH ou MANPATH, dans votre shell. Pour avoir un effet durable sur votre shell, il faut utiliser la commande <code>source</code> pour csh et tcsh ou la commande <code>.</code> pour bash et zsh, comme ceci :</p><p>pour csh/tcsh :</p><pre>source /sw/bin/init.csh</pre><p>pour bash/zsh :</p><pre>. /sw/bin/init.sh</pre></div>
</a>
<a name="dselect-access">
<div class="question"><p><b><? echo FINK_Q ; ?>5.12: Pourquoi est-il impossible de télécharger des paquets après avoir utilisé le menu "[A]ccess" dans dselect ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Vous avez certainement fait pointer apt sur un miroir Debian, qui ne contient, bien sûr, aucun des fichiers de Fink. Vous pouvez corriger cela manuellement ou via dselect. Pour le faire manuellement, modifiez en tant que super-utilisateur le fichier <code>/sw/etc/apt/sources.list </code>dans un éditeur de texte. Supprimez les lignes qui mentionnent debian.org et remplacez-les par celles-ci :</p><pre>deb http://us.dl.sourceforge.net/fink/direct_download release \
main crypto
deb http://us.dl.sourceforge.net/fink/direct_download current main \
crypto</pre><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p><p>(Si vous vivez en Europe, remplacez <code>us.dl.sourceforge.net</code> par <code>eu.dl.sourceforge.net</code>)</p><p>Pour modifier avec dselect, relancez "[A]ccess", choisissez la méthode "apt" et entrez les informations suivantes :</p><p>URL: http://us.dl.sourceforge.net/fink/direct_download - Distribution: release - Components: main crypto</p><p>Ensuite, spécifiez que vous voulez ajouter une autre source et répétez la procédure avec "current" à la place de "release".</p><p>Une version modifiée du paquet apt (contenant le script de configuration en tant que plug-in de dselect) est en cours de développement dans CVS.</p></div>
</a>
<a name="cvs-busy">
<div class="question"><p><b><? echo FINK_Q ; ?>5.13: Lors de l'exécution de <q>fink selfupdate</q> ou de "fink selfupdate-cvs", un message signale que la mise à jour via CVS a échoué et qu'il faut examiner les messages d'erreur situés au-dessus de cette ligne (message en anglais "<code>Updating using CVS failed. Check the error messages above.</code>"). Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si le message est le suivant :</p><pre>Can't exec "cvs": No such file or directory at 
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>alors vous devez installer les Developer Tools.</p><p>Si, par contre, la dernière ligne est la suivante :</p><pre>### execution of su failed, exit code 1</pre><p>vous devrez regarder plus haut pour voir l'erreur. Si vous voyez un message précisant que votre connection à été refusée :</p><pre>(Logging in to anonymous@fink.cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to fink.cvs.sourceforge.net:2401 failed: 
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access \
failed.</pre><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p><p>ou bien un message comme le suivant :</p><pre>cvs [update aborted]: recv() from server fink.cvs.sourceforge.net: 
Connection reset by peer 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>ou :</p><pre>cvs [update aborted]: End of file received from server</pre><p>ou encore :</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>alors il est possible que le serveur CVS soit surchargé. Il vous faudra réessayer plus tard.</p><p>Il se peut que les permissions soient mal définies dans votre dossier CVS et que vous n'y ayez pas accès, ce qui génère des messages de "refus d'autorisation" (message en anglais :"Permission denied") :</p><pre>cvs update: in directory 10.2/stable/main: 
cvs update: cannot open CVS/Entries for reading: No such file or \
directory
cvs server: Updating 10.2/stable/main 
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission \
denied
cvs [update aborted]: cannot make directory \
10.2/stable/main/finkinfo: 
No such file or directory 
### execution of su failed, exit code 1 Failed: 
Updating using CVS failed. Check the error messages above.</pre><p>Dans ce cas-là, vous devez réinitialiser votre répertoire CVS. Pour ce faire, utilisez la commande :</p><pre>sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {}\
; fink selfupdate-cvs</pre><p>Si vous ne voyez aucun des messages ci-dessus, il est très probable que vous ayez modifié un fichier dans l'arborescence /sw/fink/dists et que le mainteneur ait modifié ce fichier. Regardez de nouveau dans le message apparu après selfupdate-cvs les lignes commençant par "C", comme :</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info 
... (other info and patch files) ... 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>La lettre "C" signifie que CVS a rencontré un problème en essayant de mettre à jour la dernière version. La solution consiste à retirer tous les fichiers info ou patch correspondant aux lignes commençant par "C" dans le message de sortie de selfupdate-cvs, et à essayer de nouveau. Par exemple :</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre></div>
</a>
<a name="kernel-panics">
<div class="question"><p><b><? echo FINK_Q ; ?>5.14: Lors de l'utilisation de Fink, ma machine se fige, entre en panique noyau ou bien plante. À l'aide !</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> À l'automne 2002, de nombreuses personnes ont signalé sur la liste de diffusion <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users</a> des problèmes (y compris des paniques noyau ou des suspensions infinies lors de l'application d'une rustine) quand on utilise Fink pour compiler des paquets, alors qu'un anti-virus est installé. Il faut alors désactiver l'anti-virus avant d'utiliser Fink.</p></div>
</a>
<a name="not-found">
<div class="question"><p><b><? echo FINK_Q ; ?>5.15: Lors de l'installation d'un paquet, Fink ne peut le télécharger. Le site de téléchargement indique une version du paquet plus récente que celle de Fink. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Les sources du paquet sont déplacées par les sites en amont quand de nouvelles versions sont publiées.</p><p>La première chose à faire est d'exécuter <code>fink selfupdate</code>. Il est possible que le responsable du paquet ait déjà pris ce changement en compte. Vous obtiendrez alors une mise à jour de la description du paquet soit avec une version plus récente, soit avec une nouvelle URL de téléchargement.</p><p>Si cela ne marche pas, la plupart des sources sont accessibles sur <a href="http://distfiles.master.finkmirrors.net/">http://distfiles.master.finkmirrors.net/</a> (grâce à Rob Braun), et vous pouvez exécuter <code>fink configure</code> pour choisir les miroirs source "Master", afin que Fink s'y réfère automatiquement.</p><p>Si cela ne marche pas, veuillez informer le mainteneur du paquet (disponible via "<code>fink describe <b>nom_du_paquet</b></code>") que l'URL n'est pas valide. Tous les mainteneurs ne lisent pas la liste de diffusion régulièrement.</p><p>Pour obtenir un source utilisable, recherchez d'abord dans les autres répertoires du site distant la version du source que Fink recherche. (par exemple dans un répertoire "old"). Rappelez-vous, cependant, que certains sites distants ne conservent pas les anciennes versions de leurs paquets. Si le site officiel ne l'a pas, recherchez sur la toile - il arrive parfois que des sites non officiels aient l'archive tar que vous cherchez. Recherchez aussi sur <a href="http://us.dl.sourceforge.net/fink/direct_download/source/">http://us.dl.sourceforge.net/fink/direct_download/source/</a>. C'est là que Fink sauvegarde les fichiers source des paquets qui ont été distribués sous forme binaire. Si rien de ce qui précède ne fonctionne, postez alors un message sur la liste de diffusion <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users</a> pour demander si quelqu'un peut mettre à votre disposition l'ancien source.</p><p>Une fois l'archive tar adéquate repérée, téléchargez-la manuellement et placez-la dans le répertoire des sources de Fink (c'est-à-dire pour l'installation par défaut de Fink, utilisez la commande "<code>sudo mv <b>package-source.tar.gz</b> /sw/src/</code>". Puis utilisez la commande '<code>fink install <b>nom_du_paquet</b></code>' comme d'habitude.</p><p>Si vous n'arrivez pas à obtenir le fichier source, vous devrez alors attendre que le mainteneur se charge du problème. Il peut soit poster un lien vers une source ancienne, soit mettre à jour les fichiers .info et .patch pour utiliser la nouvelle version.</p></div>
</a>
<a name="fink-not-found">
<div class="question"><p><b><? echo FINK_Q ; ?>5.16: Le message "commande non trouvée" apparaît au lancement de Fink ou de tout autre paquet installé via Fink (message en anglais "command not found"). Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si cela se produit systématiquement, vous avez probablement modifié involontairement (ou omis de modifier) vos scripts de démarrage. Lancez le script <code>/sw/bin/pathsetup.sh</code> (soit en double-cliquant dans le Finder, soit dans une fenêtre de terminal). Le script tentera de deviner votre shell par défaut et y ajoutera une commande de chargement du script d'initialisation du shell de Fink dans votre configuration shell. Vous devrez alors ouvrir une nouvelle session de terminal, de façon à ce que vos paramètres d'environnement soient pris en compte. <b>Note</b> : dans certaines versions anciennes de fink, ce script s'appelle <code>pathsetup.command</code> au lieu de <code>pathsetup.sh</code>. Pour modifier le script de démarrage, vous pouvez également lancer l'application <code>pathsetup.app</code>, qui se trouve dans l'image disque de la distribution binaire de Fink.</p><p>Par contre, si cela ne se produit que dans le terminal X11 d'Apple, la meilleure solution est de modifier la définition de "Terminal" dans le menu Applications via le sous-menu <b>Applications-&gt;Personnaliser le menu...</b>. Au lieu de :</p><pre>xterm</pre><p>mettez :</p><pre>xterm -ls</pre><p>dans le champ commande. Ici, <code>ls</code> signifie <q>login shell (c'est-à-dire shell d'ouverture de session)</q>. Il en résulte que tous les paramètres de votre ouverture de session sont utilisés (tout comme dans le Terminal de Mac OS X).</p><p>Les scripts <code>/sw/bin/init.*</code> font beaucoup plus qu'ajouter le répertoire <code>/sw/bin</code> à votre variable d'environnement PATH. La plupart des paquets ne fonctionnent pas correctement si ces scripts n'ont pas été lancés au démarrage.</p></div>
</a>
<a name="invisible-sw">
<div class="question"><p><b><? echo FINK_Q ; ?>5.17: Est-il possible de masquer le répertoire /sw dans le Finder pour éviter que les utilisateurs ne modifient les réglages de Fink ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Oui. Si vous avez installé les Developer Tools, utilisez la commande suivante :</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>Cela a pour effet de rendre invisible le répertoire /sw, tout comme le sont les autres répertoires standards utilisés par le système (/usr, etc...). Si vous n'avez pas installé les Developer Tools, il existe plusieurs applications de tierce-partie qui vous permettent de changer les attributs des fichiers - vous devez rendre le répertoire /sw invisible.</p></div>
</a>
<a name="install-info-bad">
<div class="question"><p><b><? echo FINK_Q ; ?>5.18: Il est impossible d'installer quoi que ce soit. Un message signale que l'option infodir n'est pas reconnue par la commande install-info (message en anglais "install-info: unrecognized option `--infodir=/sw/share/info'"). Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ceci est généralement lié à un problème sur la variable d'environnement PATH. Lancez dans une fenêtre de terminal :</p><pre>printenv PATH</pre><p>Si <code>/sw/sbin</code> n'apparaît pas, vous devrez alors modifier vos variables d'environnement comme expliqué dans les <a href="http://fink.sourceforge.net/doc/users-guide/install.php#setup">instructions</a> du Guide de l'Utilisateur. Si <code>/sw/sbin</code> est bien là, mais qu'il y a d'autres répertoires avant (par exemple <code>/usr/local/bin</code>), vous devrez alors réordonner votre variable d'environnement PATH pour que <code>/sw/sbin</code> soit proche du début. Si vous voulez cependant que les autres répertoires soit avant <code>/sw/sbin</code>, et qu'ils contiennent des répertoires appelés eux aussi install-info, il faudra alors renommer temporairement ces sous-répertoires <code>install-info</code> quand vous utiliserez Fink.</p></div>
</a>
<a name="bad-list-file">
<div class="question"><p><b><? echo FINK_Q ; ?>5.19: Il est impossible d'installer ou de supprimer quoi que ce soit à cause d'un problème de listes de fichiers de paquets (messages en anglais contenant "files list file"). Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> En général, ces erreurs sont de la forme :</p><pre>files list file for package <b>nom_du_paquet</b> contains empty filename</pre><p>ou</p><pre>files list file for package <b>nom_du_paquet</b> is missing final newline</pre><p>Cela peut être corrigé relativement facilement. Si vous avez sur votre système le fichier .deb du paquet posant problème, vérifiez son intégrité en tapant la commande suivante :</p><pre>dpkg --contents <b>chemin_complet_du_fichier_deb</b></pre><p>par exemple :</p><pre>dpkg --contents /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin\
-powerpc.deb</pre><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p><p>Si vous obtenez une liste de répertoires et de fichiers, votre fichier .deb est valide. Si, par contre, le résultat est différent ou si vous n'avez pas le fichier .deb, vous pouvez continuer car cette erreur n'interfère pas avec les éléments compilés.</p><p>Si vous avez fait l'installation à partir de la distribution binaire, ou bien si vous êtes certain que la version que vous avez installée est identique à celle de la distribution (vous l'avez vérifié dans la <a href="http://fink.sourceforge.net/pdb/index.php"> base de données des paquets</a>), alors vous pouvez télécharger un fichier .deb en lançant <code>sudo apt=get install --reinstall --download-only <b>nom_du_paquet</b></code>. Vous pouvez aussi le compiler vous-même avec la commande <code>fink rebuild <b>nom_du_paquet</b></code>, mais cela ne l'installera pas.</p><p>Quand vous aurez un fichier .deb valide, vous pouvez reconstituer le fichier. Tout d'abord, mettez-vous en mode super-utilisateur en utilisant la commande <code>sudo -s</code> (saisissez votre mot de passe administrateur si nécessaire), puis utilisez la commande suivante :</p><pre>dpkg -c <b>chemin_complet_du_fichier_deb</b> | awk '{if ($6 == "./")\
{ print "/."; } \
else if (substr($6, length($6), 1) == "/")\
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}'\ 
&gt; /sw/var/lib/dpkg/info/<b>nom_du_paquet</b>.list</pre><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p><p>par exemple :</p><pre>dpkg -c /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb | \
awk \
'{if ($6 == "./") { print "/."; } \
else if (substr($6, length($6), 1) == "/") \
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}' \ 
&gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p><p>Cela a pour effet d'extraire le contenu du fichier .deb, de tout supprimer sauf les noms de fichiers, puis de les écrire dans le fichier .list.</p></div>
</a>
<a name="dselect-garbage">
<div class="question"><p><b><? echo FINK_Q ; ?>5.20: La commande <code>dselect</code> produit un tas de lignes incompréhensibles. Comment éviter cela ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> <code>dselect</code> et <code>Terminal.app</code> communiquent assez mal. Pour résoudre ce problème, vous pouvez lancer cette commande :</p><p>Utilisateurs de tcsh :</p><pre>setenv TERM xterm-color</pre><p>Utilisateurs de bash :</p><pre>export TERM=xterm-color</pre><p>avant de lancer <code>dselect</code>. Vous pouvez mettre ceci dans votre fichier de démarrage (par exemple <code>.cshrc</code> ou <code>.profile</code>) pour que cela se fasse automatiquement.</p></div>
</a>
<a name="perl-undefined-symbol">
<div class="question"><p><b><? echo FINK_Q ; ?>5.21: Pourquoi des erreurs du chargeur de liens dynamiques signalant des symboles perl non définis apparaissent à l'utilisation de commandes de Fink (message en anglais  "dyld: perl undefined symbols") ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Obsolète</p><p>Si vous voyez une erreur analogue à la suivante :</p><pre>dyld: perl Undefined symbols:
_Perl_safefree
_Perl_safemalloc
_Perl_saferealloc
_Perl_sv_2pv
_perl_call_sv
_perl_eval_sv
_perl_get_sv</pre><p>alors vous avez certainement mis à jour Perl et vous devez aussi mettre à jour <code>storable-pm</code>. Vous devez mettre à jour Fink. Pendant la mise à jour, il va vous être demandé d'installer soit <code>perl-core</code>, soit <code>system-perl</code> ; choisissez <code>system-perl</code>. De plus, <code>storable-pm</code> doit aussi être mis à jour.</p><p>Pour OS 10.1.x, utilisez les commandes suivantes (il vous faut les Developer Tools) :</p><pre>sudo mv /sw/lib/perl5/darwin/Storable.pm /tmp
sudo mv /sw/lib/perl5/darwin/auto/Storable /tmp
fink rebuild storable-pm
fink selfupdate-cvs</pre></div>
</a>
<a name="cant-upgrade">
<div class="question"><p><b><? echo FINK_Q ; ?>5.22: Il est impossible de mettre à jour Fink. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Suivez les <a href="http://fink.sourceforge.net/download/fix-upgrade.php">instructions spéciales</a> dans ce cas.</p><p>Quand ni l'exécution de la commande <code>fink selfupdate</code>, ni celle des commandes <code>sudo apt-get update ; sudo apt-get dist-upgrade</code> n'aboutissent à la mise à jour effective de Fink, vous devez télécharger une nouvelle version du paquet <code>fink</code> de la manière suivante :</p><ul>
<li><b>10.3.x :</b> (distribution 0.7.1)
<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/\
fink-0.7.1-updates/main/binary-darwin-powerpc\
/base/fink_0.22.4-1_darwin-powerpc.deb
sudo dpkg -i fink_0.22.4-1_darwin-powerpc.deb
rm fink_0.22.4-1_darwin-powerpc.deb
fink selfupdate</pre></li>
<li><b>10.2.x :</b> (distribution 0.6.3)
<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/\
fink-0.6.3/release/main/binary-darwin-powerpc/base\
/fink_0.18.3-1_darwin-powerpc.deb
sudo dpkg -i fink_0.18.3-1_darwin-powerpc.deb
rm fink_0.18.3-1_darwin-powerpc.deb
fink selfupdate</pre></li>
</ul><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p></div>
</a>
<a name="spaces-in-directory">
<div class="question"><p><b><? echo FINK_Q ; ?>5.23: Est-il possible d'installer Fink sur un volume ou dans un répertoire contenant un espace dans le nom ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Nous déconseillons de le faire. Le jeu n'en vaut vraiment pas la chandelle.</p></div>
</a>
<a name="packages-gz">
<div class="question"><p><b><? echo FINK_Q ; ?>5.24: Lors de la mise à jour binaire, de nombreux messages signalant qu'un fichier est introuvable ou qu'il est impossible d'obtenir le status de la liste d'un paquet source apparaissent (messages en anglais "File not found" ou "Couldn't stat package source list file"). Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous voyez ceci :</p><pre>
Err file: local/main Packages
File not found
Ign file: local/main Release
Err file: stable/main Packages
File not found
Ign file: stable/main Release
Err file: stable/crypto Packages
File not found
Ign file: stable/crypto Release
...
Failed to fetch file:/sw/fink/dists/local/main/binary-darwin-\
powerpc/Packages
File not found
Failed to fetch file:/sw/fink/dists/stable/main/binary-darwin-\
powerpc/Packages
File not found
Failed to fetch file:/sw/fink/dists/stable/crypto/binary-darwin\
-powerpc/Packages
File not found
Reading Package Lists... Done
Building Dependency Tree... Done
E: Some index files failed to download, 
they have been ignored, or old ones used instead.
update available list script returned error exit status 1.
</pre><p>Exécutez simplement <code>fink scanpackages</code>. Cela générera les fichiers introuvables.</p><p>Si l'erreur est du genre :</p><pre>
W: Couldn't stat source package list file: unstable/main Packages
(/sw/var/lib/apt/lists/_sw_fink_dists_unstable_main_binary-darwin-
powerpc_Packages) - stat (2 No such file or directory)
</pre><p>Vous devez exécuter :</p><pre>
sudo apt-get update
fink scanpackages
</pre><p>pour corriger définitivement le problème.</p><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p></div>
</a>
<a name="wrong-tree">
<div class="question"><p><b><? echo FINK_Q ; ?>5.25: Après mise à jour du système ou des Developer Tools, Fink ne reconnaît pas les changements apportés par ces mises à jour. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Lorsque vous changez la distribution de Fink (dont la distribution source et la distribution binaire sont des sous-ensembles), il faut le préciser à Fink. Pour cela, vous pouvez lancer le script qui est généralement exécuté lors de la première installation de Fink :</p><pre>/sw/lib/fink/postinstall.pl</pre><p>Fink pointera alors à l'endroit approprié.</p></div>
</a>
<a name="seg-fault">
<div class="question"><p><b><? echo FINK_Q ; ?>5.26: Des erreurs apparaissent lors de l'utilisation de <code>gzip</code> ou de <code>dpkg-deb</code> inclus dans le paquet <code>fileutils</code>. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Les erreurs de la forme :</p><pre>gzip -dc /sw/src/dpkg-1.10.9.tar.gz | /sw/bin/tar -xf -
### execution of gzip failed, exit code 139</pre><p>ou :</p><pre>gzip -dc /sw/src/aquaterm-0.3.0a.tar.gz | /sw/bin/tar -xf -
gzip: stdout: Broken pipe
### execution of gzip failed, exit code 138</pre><p>ou encore :</p><pre>dpkg-deb -b root-base-files-1.9.0-1
/sw/fink/dists/unstable/main/binary-darwin-powerpc/base
### execution of dpkg-deb failed, exit code 10
Failed: can't create package base-files_1.9.0-1_darwin-powerpc.deb</pre><p>ou des fautes de segmentation lors de l'utilisation d'utilitaires inclus dans <code>fileutils</code>, par exemple <code>ls</code> ou <code>mv</code>, sont généralement dues à une erreur de lien pré-encodé dans une bibliothèque. Vous pouvez la corriger avec la commande suivante :</p><pre>sudo /sw/var/lib/fink/prebound/update-package-prebinding.pl -f</pre></div>
</a>
<a name="pathsetup-keeps-running">
<div class="question"><p><b><? echo FINK_Q ; ?>5.27: À l'ouverture d'une fenêtre de Terminal, un message signale que "l'environnement a déjà été modifié pour Fink", puis le Terminal se déconnecte (message en anglais "Your environment seems to be set up for Fink already"). Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ce qui se passe ici est que, d'une façon ou d'une autre, l'application Terminal.app a été chargée d'exécuter <code>/sw/bin/pathsetup.command</code> à chaque connexion. Vous pouvez corriger cela en supprimant le fichier de préférences, <code>~/Library/Preferences/com.apple.Terminal.plist</code>.</p><p>Si vous voulez conserver certaines préférences, vous pouvez modifier le fichier avec un éditeur de texte classique et supprimer la référence à <code>/sw/bin/pathsetup.command</code>.</p></div>
</a>
<a name="ext-drive">
<div class="question"><p><b><? echo FINK_Q ; ?>5.28: Quand Fink n'est pas installé sur la partition principale du disque, il est impossible de mettre à jour le paquet fink à partir du source. Des erreurs concernant <q>chowname</q> apparaissent. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si le message d'erreur ressemble à celui-ci :</p><pre>This first test is designed to die, so please ignore the error
message on the next line.
# Looks like your test died before it could output anything.
./00compile............................ok
./Base/initialize......................ok
./Base/param...........................ok
./Base/param_boolean...................ok
./Command/cat..........................ok
./Command/chowname.....................#   
Failed test (./Command/chowname.t at line 27)
#     got: 'root'
#     expected: 'nobody'</pre><p>vous devez exécuter <b>Lire les informations</b> (Cmd-I quand l'icône de la partition ou du disque est selectionnée) sur le disque (ou la partition) sur lequel (laquelle) Fink est installé et décocher l'option "Ignorer les autorisations de ce volume".</p></div>
</a>
<a name="mirror-gnu">
<div class="question"><p><b><? echo FINK_Q ; ?>5.29: Fink refuse de mettre à jour les paquets. Il semble ne pas trouver le miroir 'gnu'. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si un message d'erreur se terminant par :</p><pre>Failed: No mirror site list file found for mirror 'gnu'.</pre><p>apparaît, il est plus que probable que vous deviez mettre à jour le paquet <code>fink-mirrors</code> via, par exemple :</p><pre>fink install fink-mirrors</pre></div>
</a>
<a name="cant-move-fink">
<div class="question"><p><b><? echo FINK_Q ; ?>5.30: Il est impossible de mettre à jour Fink, car le répertoire /sw/fink ne peut être déplacé. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> L'erreur suivante :</p><pre>Failed: Can't move "/sw/fink" out of the way.</pre><p>est due, en général, à des permissions erronées dans un des répertoires temporaires créés durant l'exécution de <code>selfupdate</code>. Supprimez-les via la commande :</p><pre>sudo rm -rf /sw/fink.tmp /sw/fink.old</pre></div>
</a>
<a name="four-oh-three">
<div class="question"><p><b><? echo FINK_Q ; ?>5.31: Des erreurs de type 403 apparaissent lors de l'utilisation des commandes <code>apt-get</code> et <code>dselect</code> ou du menu binaire de Fink Commander. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Les serveurs de téléchargement de SourceForge ne sont pas toujours disponibles, c'est pourquoi nous sommes en train de changer de serveur pour la distribution binaire.</p><ul>
<li>Si vous avez installé les Outils de Développement (Developer Tools), installez la dernière version (&gt;= 0.24.4.1) du paquet <code>fink-mirrors</code>, puis réinstallez <code>fink</code>, soit via la commande :
<pre>fink reinstall fink</pre>
<p>ou via la commande :</p>
<pre>sudo apt-get install --reinstall fink</pre>
<p>si vous ne souhaitez pas utiliser la distribution source.</p>
</li>
<li>Si vous n'avez pas installé les Outils de Développement (Developer Tools), vous devez changer votre configuration comme suit. Modifiez le fichier <code>sources.list</code> en tant que super-utilisateur, via la commande :
<pre>sudo pico /sw/etc/apt/sources.list</pre>
<p>Utilisez votre éditeur de texte préféré compatible avec des fins de ligne Unix. Changez les lignes qui commencent par "Official binary distribution:" ainsi :</p>
<pre># Official binary distribution: download location for packages
# from the latest release
deb http://bindist.finkmirrors.net/bindist 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://bindist.finkmirrors.net/bindist 10.3/current main crypto</pre>
<p>On suppose ici que vous tournez sous Mac OS X 10.3. Si ce n'est pas le cas, remplacez <code>10.3</code> dans le code ci-dessus par la version de votre système.</p>
<p>Puis sauvegardez le fichier et quittez l'éditeur de texte. Enfin mettez à jour la liste des paquets binaires.</p>
</li>
</ul></div>
</a>
<a name="fc-cache">
<div class="question"><p><b><? echo FINK_Q ; ?>5.32: Un message signalant qu'"aucune police n'est trouvée" apparaît (message en anglais : "No fonts found"). Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous voyez le message suivant (signalé uniquement sous Mac OS X 10.4 jusqu'à présent) :</p><pre>
No fonts found; this probably means that the fontconfig
library is not correctly configured. You may need to
edit the fonts.conf configuration file. More information
about fontconfig can be found in the fontconfig(3) manual
page and on http://fontconfig.org.
</pre><p>corrigez l'erreur en exécutant :</p><pre>sudo fc-cache</pre></div></a>
<a name="non-admin-installer">
<div class="question"><p><b><? echo FINK_Q ; ?>5.33: Il est impossible d'installer Fink à partir du paquet d'installation, le message "Ce volume ne gère pas les liens symboliques" apparaît. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ce message signifie, généralement, que vous essayez de faire touner l'installeur Fink en tant qu'utilisateur sans privilèges administratifs. Assurez-vous soit de vous connecter dans l'écran de démarrage en tant qu'utilisateur ayant ces privilèges, soit de choisir dans le Finder (à l'aide du menu de changement rapide de session) un utilisateur ayant ces privilèges avant de lancer l'installeur de Fink.</p><p>Si vous avez des problèmes alors que vous utilisez un compte d'administrateur, il est probable que cela soit dû à des permissions incorrectes au niveau le plus haut de la hiérarchie des dossiers. Pour les réparer, utilisez l'Utilitaire de disque d'Apple, situé dans le sous-répertoire Utilitaires du répertoire Applications ; sélectionnez le disque dur en question, choisissez l'onglet <b>S.O.S.</b> et cliquez sur <b>Réparez les autorisations du disque</b>.</p></div></a>
<a name="wrong-arch">
<div class="question"><p><b><? echo FINK_Q ; ?>5.34: Un message signalant une contradiction entre l'architecture du paquet et celle du système empêche de mettre à jour fink (message en anglais <q>package architecture (darwin-i386) does not match system (darwin-powerpc)</q>). Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> L'architecture du paquet ne correspond pas à celle de votre système. Cette erreur se produit lorsque vous utilisez un paquet d'installation PowerPc sur une machine Intel. Vous devez alors supprimer votre installation de Fink :</p><pre>sudo rm -rf /sw</pre><p>Puis téléchargez l'image disque pour machines Intel à partir des <a href="http://fink.sourceforge.net/download/index.php">pages de téléchargement</a>.</p></div></a>
 <a name="sf-cvs-2006">
<div class="question"><p><b><? echo FINK_Q ; ?>5.35: Il est impossible d'exécuter une mise à jour via cvs. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> If vous obtenez des messages d'erreurs contenant les lignes suivantes :</p><pre>
cvs [update aborted]: connect to cvs.sourceforge.net(66.35.250.207):
2401 failed: Operation timed out
</pre><p>Cela provient d'une récente restructuration des serveurs CVS sur sourceforge.net. Les fichiers Fink sont maintenant accessibles à partir de <code>fink.cvs.sourceforge.net</code>. Vous devez mettre à jour le <code>paquet fink-mirrors</code> via les outils binaires suivants :</p><pre>
sudo apt-get update ; sudo apt-get install fink-mirrors
</pre></div></a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="comp-general.php?phpLang=fr">6. Problèmes généraux de compilation</a></p>
<? include_once "../footer.inc"; ?>


