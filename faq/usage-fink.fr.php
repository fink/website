<?
$title = "Q.F.P. - Utilisation de Fink";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/03/27 09:39:14';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="comp-general.php?phpLang=fr" title="Compile Problems - General"><link rel="prev" href="upgrade-fink.php?phpLang=fr" title="Mise à jour de Fink (Résolution de problèmes spécifiques à une version donnée)">';

include_once "header.inc";
?>

<h1>Q.F.P. - 5 Installer, Utiliser et Entretenir Fink</h1>
    
    
    <a name="what-packages">
      <div class="question"><p><b>Q5.1: Comment savoir quels sont les paquets gérés par Fink ?</b></p></div>
      <div class="answer"><p><b>A:</b> Depuis Fink 0.2.3, il y a la commande list.  Elle produit une liste
	de tous les paquets connus de votre installation de Fink.
	Exemple:</p><pre>fink list</pre><p>Si vous utilisez la distribution binaire, <code>dselect</code> vous donne une liste des paquets disponibles dans laquelle vous pouvez naviguer. Remarque : vous devez utiliser la commande sudo si vous voulez sélectionner et installer des paquets avec dselect.</p><p>Il y a aussi la <a href="http://fink.sourceforge.net/pdb/">base de données de paquets</a> sur le site web. </p></div>
    </a>
    <a name="proxy">
      <div class="question"><p><b>Q5.2: Comment configurer fink pour utiliser un proxy HTTP quand on est derrière un mur pare-feu ?</b></p></div>
      <div class="answer"><p><b>A:</b> La commande <code>fink</code> permet de prendre en compte des réglages de proxy qui seront utilisés par  <code>wget</code>/<code>curl</code>. Si on ne vous a pas posé de question sur vos réglages de proxies lors de la première installation, vous pouvez taper <code>fink configure</code> pour les régler. Vous pouvez aussi utiliser cette commande à n'importe quel moment pour reconfigurer la commande <code>fink</code>. Si vous avez suivi les instructions du guide d'installation et utilisé <code>/sw/bin/init.csh</code> (ou <code>/sw/bin/init.sh </code>), alors <code>apt-get</code> et <code>dselect</code> utiliseront aussi ces réglages de proxies. Assurez-vous d'avoir bien indiqué le protocole utilisé, par exemple :</p><pre>ftp://proxy.yoursite.somewhere</pre><p>Si vous avez toujours des problèmes, allez dans Préférences système, cliquez sur Réseaux, sélectionnez l'onglet proxies et vérifiez que la case "Utiliser le mode FTP passif (PASV)" est cochée.</p></div>
    </a>
    <a name="firewalled-cvs">
      <div class="question"><p><b>Q5.3: Comment mettre à jour les paquets disponibles sur CVS lorsqu'on utilise un firewall ?</b></p></div>
      <div class="answer"><p><b>A:</b> Le paquet<b> cvs-proxy</b> peut créer un tunnel à travers les proxies HTTP.</p><ul>
          <li><p>Tout d'abord, téléchargez les fichiers <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink/dists/10.2/unstable/main/%20finkinfo/devel/">cvs-proxy</a> (un fichier .info et un fichier .patch) et placez-les dans votre arborescence locale. (c'est-à-dire /sw/fink/dists/local/main/finkinfo/).</p></li>
          <li><p>Installez le paquet <b>cvs-proxy</b> avec la commande :</p>
	  <p><code>fink install <b>cvs-proxy</b></code></p></li>
          <li><p>Les paquets sont alors mis à jour avec les commandes :</p>
	  <p><code>fink selfupdate-cvs</code></p>
	  <p><code>fink update-all</code></p></li>
        </ul><p>Si Fink n'est pas configuré pour utiliser un proxy, changez les
	réglages en utilisant :</p><p><code>fink configure</code>.</p></div>
    </a>
    <a name="moving">
      <div class="question"><p><b>Q5.4: Est-il possible de déplacer Fink vers un autre dossier après
	l'installation ?</b></p></div>
      <div class="answer"><p><b>A:</b> Non. Vous pouvez bien sûr déplacer les fichiers en utilisant
	mv ou le Finder, mais 99% des programmes ne fonctionneront plus si vous faites cela. En effet, la majorité des programmes Unix utilisent des chemins d'accès directement inclus dans le fichier binaire pour accéder,entre autres, à des données et des librairies.</p></div>
    </a>
    <a name="moving-symlink">
      <div class="question"><p><b>Q5.5: Est-ce que Fink fonctionnera correctement si on le déplace après installation et que l'on crée un lien symbolique vers l'ancien emplacement ?</b></p></div>
      <div class="answer"><p><b>A:</b> Peut-être. On peut supposer que le fonctionnement sera correct dans l'ensemble, mais il y aura certainement des problèmes ici ou là.</p></div>
    </a>
    <a name="removing">
      <div class="question"><p><b>Q5.6: Comment désinstaller la totalité de Fink ?</b></p></div>
      <div class="answer"><p><b>A:</b> Presque tous les fichiers installés par fink se trouvent dans le répertoire /sw (ou bien l'endroit où vous avez choisi de faire l'installation). Donc, pour supprimer Fink, entrez cette commande :</p><pre>sudo rm -rf /sw</pre><p>La seule exception concerne XFRee86. Si vous avez installé XFree86 via Fink (vous avez, par exemple,  installé le paquet <code>xfree86</code> ou <code>xfree86-rootless</code>, au lieu d'utiliser <code>system-xfree86</code>) et que vous voulez le supprimer, vous devrez aussi saisir ceci :</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>Si vous ne pensez pas réinstaller Fink, vous pourrez aussi
	supprimer la ligne "<code>source /sw/bin/init.csh</code>" que
	vous aviez ajoutée dans le fichier <code>.cshrc</code> ou la ligne "<code>source /sw/bin/init.sh</code>" que vous aviez ajoutée dans le fichier <code>.bashrc</code>, suivant vos réglages, en utilisant un éditeur de texte.</p></div>
    </a>
    <a name="bindist">
      <div class="question"><p><b>Q5.7: La base de données des paquets sur le site web mentionne le paquet xxx, mais apt-get ou dselect eux ne le mentionnent pas. Qui a raison ?</b></p></div>
      <div class="answer"><p><b>A:</b> Ils ont tous raison. La <a href="http://fink.sourceforge.net/pdb/">base de données des paquets</a> donne la liste de tous les paquets, même ceux qui sont encore dans la section instable.  Les outils <code>dselect</code> et <code>apt-get</code>, de leur côté, donnent la liste des paquets disponibles en tant que binaires précompilés. De nombreux paquets ne sont pas disponibles sous forme précompilée via ces outils pour diverses raisons. Un paquet doit être dans la section "stable" de la dernière mise à jour de Fink pour être pris en compte, et il doit, de plus, passer avec succès un certain nombre de tests relatifs aux règles de fink et aux restrictions de licences et brevets.</p><p>Si vous voulez installer un paquet qui n'est pas disponible via <code>dselect</code> / <code>apt-get</code>, vous devez le compiler à partir du code source en utilisant <code>fink install <b>nom_du_paquet</b></code>. Vérifiez que vous avez installé les Developer Tools avant d'essayer ceci. (S'il n'y a pas d'installeur pour les Developer Tools dans votre répertoire <code>/Applications</code> , vous pouvez les télécharger gratuitement sur <a href="http://connect.apple.com/">Apple Developer Connection</a> après enregistrement). Voir aussi la question à propos des instables ci-dessous.</p></div>
	</a>
    <a name="unstable">
      <div class="question"><p><b>Q5.8: Comment installer un paquet instable quand la commande fink ne le trouve pas ('no package found') ?</b></p></div>
      <div class="answer"><p><b>A:</b> Assurez-vous d'abord de savoir ce que signifie 'instable'. Peu de
	personnes ont testés les paquets instables. C'est pourquoi Fink
	ne recherche pas dans cette arborescence par défaut. Si vous décidez
	d'activer l'arborescence instable, pensez à envoyer un courriel au responsable du paquet si quelque chose fonctionne (ou ne fonctionne pas). Ce sont vos réactions qui nous permettent de décider si un paquet peut entrer dans l'arborescence stable ! Pour connaître le mainteneur du paquet, lancez la commande <code>fink info &lt;nom_du_paquet&gt;</code>.</p><p>Les paquets ont souvent des dépendances, et les paquets dans l'arborescence instable dépendent souvent d'autres paquets de cette même arborescence. Il est donc conseillé d'activer la totalité de l'arborescence instable.</p><p>Si vous voulez que Fink utilise toute l'arborescence instable, modifiez le fichier <code>/sw/etc/fink.conf</code> : ajoutez <code>unstable/main</code> et <code>unstable/crypto</code> à la ligne <code>Trees:</code>, puis exécutez <code>fink selfupdate; fink index</code>.</p><p>Si vous ne voulez qu'un ou deux paquets instables spécifiques, vous devez changer vos réglages pour utiliser la mise à jour CVS (c'est-à-dire utiliser <code>fink selfupdate-cvs</code>), car rsync met seulement à jour les arborescences activées dans le fichier <code>fink.conf</code>. Éditez <code>/sw/etc/fink.conf</code> et ajoutez <code>local/main</code> à la ligne <code>Trees:</code>, si elle n'y figure pas déjà. Vous devrez alors exécuter <code>fink selfupdate</code> pour télécharger les fichiers de description des paquets. Copiez ensuite les fichiers <code>.info</code> qui vous intéressent (et leurs fichiers <code>.patch</code> associés, s'ils existent) à partir de  <code>/sw/fink/dists/unstable/main/finkinfo</code> (ou  <code>/sw/fink/dists/unstable/crypto/finkinfo</code>) dans <code>/sw/fink/dists/local/main/finkinfo</code>. Notez cependant que votre paquet peut dépendre d'autres paquets (ou de versions particulières) qui sont uniquement présents dans l'arborescence instable. Vous devrez alors déplacer aussi leurs fichiers <code>.info</code> et <code>.patch</code> associés. Après avoir déplacé tous les fichiers, lancez la commande <code>fink index</code> pour que l'index des paquets disponibles de Fink soit mis à jour. Vous pourrez ensuite utiliser rsync à nouveau (<code>fink selfupdate-rsync</code>) si vous le désirez.</p></div>
    </a>
   <a name="sudo">
      <div class="question"><p><b>Q5.9: Comment ne plus avoir à saisir mon mot de passe après la
	commande sudo ?</b></p></div>
      <div class="answer"><p><b>A:</b> Si vous n'êtes pas paranoïaque, vous pouvez configurer sudo pour qu'il ne vous demande pas votre mot de passe. Pour cela, modifiez
	<code>/etc/sudoers</code> en tant que super-utilisateur et ajoutez la ligne suivante :</p><pre>username ALL = NOPASSWD: ALL</pre><p>Remplacez bien sûr <code>username</code> par votre nom
	d'utilisateur. Cette ligne vous permet d'exécuter n'importe quelle
	commande avec sudo sans saisir votre mot de passe.</p></div>
</a>
    <a name="exec-init-csh">
      <div class="question"><p><b>Q5.10: À l'exécution de init.csh ou init.sh, un message d'erreur "Permission denied" apparaît. Que se passe-t-il ?</b></p></div>
      <div class="answer"><p><b>A:</b> init.csh et init.sh ne doivent pas être exécutés comme les commandes habituelles. Ces fichiers définissent des variables d'environnement, tels PATH ou MANPATH, dans votre shell. Pour avoir un effet durable sur votre shell, il faut utiliser la commande <code>source</code> pour csh/tcsh ou la commande <code>.</code> pour bash/zsh, comme ceci :</p><p>pour csh/tcsh :</p><pre>source /sw/bin/init.csh</pre><p>pour bash/zsh :</p><pre>. /sw/bin/init.sh</pre></div>
    </a>
    <a name="dselect-access">
      <div class="question"><p><b>Q5.11: Pourquoi est-il impossible de télécharger des paquets après avoir utilisé le menu "[A]ccess" dans dselect ?</b></p></div>
      <div class="answer"><p><b>A:</b> Vous avez certainement fait pointer apt sur un miroir Debian, qui
	ne contient, bien sûr, aucun des fichiers de Fink. Vous pouvez corriger
	cela manuellement ou via dselect. Pour le faire manuellement, modifiez
	en tant que super-utilisateur le fichier <code>/sw/etc/apt/sources.list </code>dans un éditeur de texte. Supprimez les lignes qui mentionnent debian.org et remplacez-les par celles-ci :</p><pre>deb http://us.dl.sourceforge.net/fink/direct_download release main crypto
deb http://us.dl.sourceforge.net/fink/direct_download current main crypto</pre><p>
	(Si vous vivez en Europe, remplacez <code>us.dl.sourceforge.net</code>
	par <code>eu.dl.sourceforge.net</code>)</p><p>Pour modifier avec dselect, relancez "[A]ccess", choisissez la méthode "apt" et entrez les informations suivantes :</p><p>URL: http://us.dl.sourceforge.net/fink/direct_download - Distribution: release - Components: main crypto</p><p>Ensuite, spécifiez que vous voulez ajouter une autre source et
	répétez la procédure avec "current" à la place de "release".</p><p>Une version modifiée du paquet apt (contenant le script de
	configuration en tant que plug-in de dselect) est en cours de
	développement dans CVS.</p></div>
    </a>
    <a name="cvs-busy">
      <div class="question"><p><b>Q5.12: When I try to run <q>fink selfupdate</q> or "fink
        selfupdate-cvs", I get the error "<code>Updating using CVS failed.
        Check the error messages above.</code>"</b></p></div>
      <div class="answer"><p><b>A:</b> If the message is</p><pre>Can't exec "cvs": No such file or directory at 
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>then you need to install the Developer Tools.</p><p>If, on the other hand, the last line is</p><pre>### execution of su failed, exit code 1</pre><p>you'll need to look further back in the output to see the error. If
        you see a message that your connection was refused:</p><pre>(Logging in to anonymous@cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to cvs.sourceforge.net:2401 failed: 
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.</pre><p>or a message like the following:</p><pre>cvs [update aborted]: recv() from server cvs.sourceforge.net: 
Connection reset by peer 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>or</p><pre>cvs [update aborted]: End of file received from server</pre><p>or</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>then it's likely that the cvs servers are overloaded and you have
        to try the update later.</p><p>Another possibility is that you have some bad permissions in your
        CVS directories, in which case you get "Permission denied"
        messages:</p><pre>cvs update: in directory 10.2/stable/main: 
cvs update: cannot open CVS/Entries for reading: No such file or directory
cvs server: Updating 10.2/stable/main 
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo: 
No such file or directory 
### execution of su failed, exit code 1 Failed: 
Updating using CVS failed. Check the error messages above.</pre><p>In this case you need to reset your cvs directories. Use the
        command:</p><pre>sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {}\
; fink selfupdate-cvs</pre><p>If, you don't see either of the above messages, then this almost
        always means you've modified a file in your /sw/fink/dists tree and
        now the maintainer has changed it. Look further back in the
        selfupdate-cvs output for lines that start with "C", like so:</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info 
... (other info and patch files) ... 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>The "C" means CVS had a conflict in trying to update the latest
        version.  The fix is to delete any files that show up as starting with "C" in
        the output of selfupdate-cvs, and try again:</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre></div>
    </a>
    <a name="kernel-panics">
      <div class="question"><p><b>Q5.13: When I use Fink, my whole machine freezes up/kernel panics/dies.
        Help!</b></p></div>
      <div class="answer"><p><b>A:</b> A number of recent reports on the <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users
        mailing list</a> have indicated problems (including kernel panics
        and infinite hangs during patching) when using Fink to compile
        packages while anti-virus software is installed. You may need to
        switch off any anti-virus software before using Fink.</p></div>
    </a>
    <a name="not-found">
      <div class="question"><p><b>Q5.14: I'm trying to install a package, but Fink can't download it. The
        download site shows a later version number of the package than what
        Fink has. What do I do?</b></p></div>
      <div class="answer"><p><b>A:</b> The package sources get moved around by the upstream sites when new
        versions are released.</p><p>The first thing you should do is run <code>fink selfupdate</code>.
        It may be that the package maintainer has already fixed this, and you
        will get an updated package description with either a more recent
        version or a revised download URL.</p><p>If this doesn't work, most sources are available on <a href="http://distfiles.master.finkmirrors.net/">http://distfiles.master.finkmirrors.net/</a>
        (thanks to Rob Braun) , and you can run <code>fink configure</code> to
        choose to search "Master" source mirrors so that Fink will
        automatically look there.</p><p>If this doesn't work, please let the package maintainer (available
        from "<code>fink describe <b>packagename</b>
          </code>") know that the
        URL is broken; not all maintainers read the mailing lists all of the
        time.</p><p>To get a usable source, first try hunting around the remote site in
        other directories for the same version of the source that Fink wants
        (e.g. in an "old" directory). Keep in mind, though, that some remote
        sites like to trash the old versions of their packages. If the
        official site doesn't have it, then try a web search--sometimes there
        are unofficial sites that have the tarball you want. Another place to
        look is <a href="http://us.dl.sourceforge.net/fink/direct_download/source/">http://us.dl.sourceforge.net/fink/direct_download/source/</a>,
        which is where Fink stores sourcefiles from packages that have been
        released in binary form. If all of the above fail, then you might
        consider posting on the <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users
        mailing list</a> to ask if anybody has the old source available to
        give you.</p><p>Once you locate the proper source tarball, download it manually,
        and then move the file into your Fink source location (i.e. for a
        default Fink install, "<code>sudo mv <b>package-source.tar.gz</b>
        /sw/src/</code>". Then use '<code>fink install <b>packagename</b>
          </code>' as normal.</p><p>If you can't get the source file, then you'll have to wait for the
        maintainer to deal with the problem. They may either post a link to
        the old source, or update the .info and .patch files to use the newer
        version.</p></div>
    </a>
    <a name="fink-not-found">
      <div class="question"><p><b>Q5.15: I get "command not found" errors when I run Fink or anything that I
        installed with Fink.</b></p></div>
      <div class="answer"><p><b>A:</b> If this always happens, then you may have inadvertently modified (or failed to modify) your startup scripts. Run the
        <code>/sw/bin/pathsetup.command</code> script (either by
        double-clicking in the Finder or in a terminal), which will attempt to
        detect your startup configuration. You'll then need to open a new
        terminal session so that your environment settings are loaded.  <b>Note:</b>  for <code>fink-0.18.3</code> and <code>fink-0.19.2</code>, the script has been changed to <code>/sw/bin/pathsetup.sh</code>, and must be run in a terminal.</p><p>On the other hand, if you only have problems in the Apple X11
        terminal, this probably means that you need to create a <a href="http://fink.sourceforge.net/doc/x11/run-xfree86.php#xinitrc">.xinitrc</a>
        file and add the line</p><pre>. /sw/bin/init.sh</pre><p>near the beginning (i.e. before any programs get run). Restart X11
        (if running) after you do this.</p></div>
    </a>
    <a name="invisible-sw">
      <div class="question"><p><b>Q5.16: I want to hide /sw in the Finder to keep users from damaging the
        Fink setup.</b></p></div>
      <div class="answer"><p><b>A:</b> You can indeed do this. If you have the Development Tools
        installed, then you can run the following command:</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>This makes /sw invisible, just like the standard system folders
        (/usr, etc.). If you don't have the Developer Tools, there are various
        third-party applications that let you manipulate file attributes--you
        need to set /sw to be invisible.</p></div>
    </a>
    <a name="install-info-bad">
      <div class="question"><p><b>Q5.17: I can't install anything, because I get the following error:
        "install-info: unrecognized option `--infodir=/sw/share/info'"</b></p></div>
      <div class="answer"><p><b>A:</b> This usually is due to a problem in your PATH. In a terminal window
        type:</p><pre>printenv PATH</pre><p>If <code>/sw/sbin</code> doesn't appear at all, then you
        need to set your environment up as per the <a href="http://fink.sourceforge.net/doc/users-guide/install.php#setup">instructions</a>
        in the Users Guide. If <code>/sw/sbin</code> is there, but
        there are other directories ahead of it (e.g.
        <code>/usr/local/bin</code>), then you will either want to
        reorder your PATH so that <code>/sw/sbin</code> is near the
        beginning, or if you really need the other directory to be before
        <code>/sw/sbin</code>, then you'll want to temporarily rename
        the other <code>install-info</code> when you use Fink.</p></div>
    </a>
    <a name="bad-list-file">
      <div class="question"><p><b>Q5.18: I can't install or remove anything, because of a problem with a
        "files list file".</b></p></div>
      <div class="answer"><p><b>A:</b> Typically these errors take the form:</p><pre>files list file for package <b>packagename</b> contains empty filename</pre><p>or</p><pre>files list file for package <b>packagename</b> is missing final newline</pre><p>This can be fixed, with a little work. If you have the .deb file
        for the offending package currently available on your system, then
        check its integrity by running</p><pre>dpkg --contents <b>full-path-to-debfile</b>
        </pre><p>e.g.</p><pre>dpkg --contents /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</pre><p>If you get back a listing of directories and files, then your .deb
        is OK. If the output is something other than directories and files, or
        if you don't have the .deb file, you can still proceed because the
        error doesn't interfere with builds.</p><p>If you have been installing from the binary distribution or you
        know for sure that the version in the binary distribution is the same
        as what you have installed (e.g. by checking the <a href="http://fink.sourceforge.net/pdb/index.php">package
        database</a>), then you can get a .deb file by running <code>sudo
        apt=get install --reinstall --download-only <b>packagename</b>
          </code>. Otherwise you can build one yourself by running <code>fink
        rebuild <b>packagename</b>
          </code>, but it won't install yet.</p><p>Once you have a valid .deb file, then you can reconstitute the
        file. First become root by using <code>sudo -s</code> (enter your
        administrative user password if necessary), and then use the following
        command:</p><pre>dpkg -c <b>full-path-to-debfile</b> | awk '{if ($6 == "./"){ print "/."; } \
else if (substr($6, length($6), 1) == "/")\
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}'\ 
&gt; /sw/var/lib/dpkg/info/<b>packagename</b>.list</pre><p>e.g.</p><pre>dpkg -c /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb | awk \
'{if ($6 == "./") { print "/."; } \
else if (substr($6, length($6), 1) == "/") \
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}' \ 
&gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p>What this does is to extract the contents of the .deb file, remove
        everything but the filenames, and write these to the .list file.</p></div>
    </a>
    <a name="error-nineteen">
      <div class="question"><p><b>Q5.19: When I use the Fink binary installer package, I get a big "19" in
        the window and can't install anything.</b></p></div>
      <div class="answer"><p><b>A:</b> The number 19 appears because your OS X system is localized to a
        language other than English. (This is a bug in Apple's Installer, that
        it doesn't just show you the English-language error message.)</p><p>The English language error message corresponding to number 19
        is</p><p>"A root directory /sw exists. Please see the Read Me file for
        update instructions, or for information on installing Fink on a
        separate volume."</p><p>You may be getting this error if you've used Fink before, and
        didn't delete <code>/sw</code>. If you haven't installed Fink
        before, the most likely cause of this is that you installed the Virex
        program available for free to .Mac users. As explained on Fink's
        webpage, Virex is incompatible with Fink (due to the Virex folks
        having made errors in the way they set things up).</p></div>
    </a>
    <a name="dselect-garbage">
      <div class="question"><p><b>Q5.20: I get a bunch of garbage when I select packages in
        <code>dselect</code>. How can I use it?</b></p></div>
      <div class="answer"><p><b>A:</b> There are issues between <code>dselect</code> and
        <code>Terminal.app</code>. A workaround is to enter the
        following command</p><p>tcsh users:</p><pre>setenv TERM xterm-color</pre><p>bash users:</p><pre>export TERM=xterm-color</pre><p>before you run <code>dselect</code>. You may want to put
        this in your startup file (e.g. <code>.cshrc</code> |
        <code>.profile</code>) so that it gets run all of the time.</p></div>
    </a>
    <a name="perl-undefined-symbol">
      <div class="question"><p><b>Q5.21: Why do I get a bunch of "dyld: perl undefined symbols" errors when
        I run Fink commands?</b></p></div>
      <div class="answer"><p><b>A:</b> If you see an error sequence like the following:</p><pre>dyld: perl Undefined symbols: 
_Perl_safefree
_Perl_safemalloc 
_Perl_saferealloc 
_Perl_sv_2pv 
_perl_call_sv
_perl_eval_sv 
_perl_get_sv</pre><p>then what has probably happened is that you updated Perl to a new
        version and now <code>storable-pm</code> needs to be updated.
        You should update Fink. During the process you will be prompted to
        install either <code>perl-core</code> or
        <code>system-perl</code>; choose the latter. In addition,
        <code>storable-pm</code> should also get updated.</p><p>For OS 10.1.x, perform the following commands (you'll need the
        Developer Tools):</p><pre>sudo mv /sw/lib/perl5/darwin/Storable.pm /tmp 
sudo mv /sw/lib/perl5/darwin/auto/Storable /tmp 
fink rebuild storable-pm 
fink selfupdate-cvs</pre></div>
    </a>
    <a name="cant-upgrade">
      <div class="question"><p><b>Q5.22: I can't seem to update Fink's version.</b></p></div>
      <div class="answer"><p><b>A:</b> There are <a href="http://fink.sourceforge.net/download/fix-upgrade.php">special
        instructions</a> to follow under these circumstances.</p></div>
    </a>
    <a name="spaces-in-directory">
      <div class="question"><p><b>Q5.23: Can I put Fink in a volume or directory with a space in its
        name?</b></p></div>
      <div class="answer"><p><b>A:</b> We recommend against putting your Fink directory tree inside a
        directory with spaces in its name. It's just not worth the hassle.</p></div>
    </a>
    <a name="packages-gz">
      <div class="question"><p><b>Q5.24: When I try to do a binary update, there are many messages with
        "File not found"</b></p></div>
      <div class="answer"><p><b>A:</b> If you see something like the following:</p><pre>Err file: local/main Packages 
File not found 
Ign file: local/main Release 
Err file: stable/main Packages 
File not found 
Ign file: stable/main Release 
Err file: stable/crypto Packages 
File not found 
Ign file: stable/crypto Release 
Hit http://us.dl.sourceforge.net 10.3/release/main Packages 
Hit http://us.dl.sourceforge.net 10.3/release/main Release 
Hit http://us.dl.sourceforge.net 10.3/release/crypto Packages 
Hit http://us.dl.sourceforge.net 10.3/release/crypto Release 
Hit http://us.dl.sourceforge.net 10.3/current/main Packages 
Hit http://us.dl.sourceforge.net 10.3/current/main Release 
Hit http://us.dl.sourceforge.net 10.3/current/crypto Packages 
Hit http://us.dl.sourceforge.net 10.3/current/crypto Release 
Failed to fetch file:/sw/fink/dists/local/main/binary-darwin-powerpc/Packages
File not found 
Failed to fetch file:/sw/fink/dists/stable/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch file:/sw/fink/dists/stable/crypto/binary-darwin-powerpc/Packages
File not found 
Reading Package Lists... Done 
Building Dependency Tree...Done 
E: Some index files failed to download, 
they have been ignored, or old ones used instead. 
update available list script returned error exit status 1.</pre><p>then all you need to do is run <code>fink scanpackages</code>. This
        generates the files that aren't being found.</p></div>
    </a>
    <a name="wrong-tree">
      <div class="question"><p><b>Q5.25: I've changed my OS | Developer Tools, but Fink doesn't recognize
        the change.</b></p></div>
      <div class="answer"><p><b>A:</b> When changing the Fink distribution (of which the source and binary
        distros are subsets), Fink needs to be told that this has happened. To
        do this, you can run a script that normally gets run when you first
        install Fink:</p><pre>/sw/lib/fink/postinstall.pl</pre><p>Doing this will point Fink to the correct place.</p></div>
    </a>
    <a name="seg-fault">
      <div class="question"><p><b>Q5.26: I get errors with <code>gzip</code> | <code>dpkg-deb</code>I
        applications from the<code> fileutils </code>package! Help!</b></p></div>
      <div class="answer"><p><b>A:</b> Errors of the form:</p><pre>gzip -dc /sw/src/dpkg-1.10.9.tar.gz | /sw/bin/tar -xf - 
### execution of gzip failed, exit code 139</pre><p>or</p><pre>gzip -dc /sw/src/aquaterm-0.3.0a.tar.gz | /sw/bin/tar -xf -
gzip: stdout: Broken pipe 
### execution of gzip failed, exit code 138</pre><p>or</p><pre>dpkg-deb -b root-base-files-1.9.0-1 /sw/fink/dists/unstable/main/binary-darwin-powerpc/base

### execution of dpkg-deb failed, exit code 1
Failed: can't create package base-files_1.9.0-1_darwin-powerpc.deb</pre><p>or segmentation faults when running utilities from<code>
        fileutils</code>, e.g. <code>ls</code> or <code>mv</code>, are likely
        to be due to a prebinding error in a library, and can be fixed by
        running</p><pre>sudo /sw/var/lib/fink/prebound/update-package-prebinding.pl -f</pre></div>
    </a>
    <a name="pathsetup-keeps-running">
      <div class="question"><p><b>Q5.27: When I open a Terminal window, I get a message that "Your
        environment seems to be correctly set up for Fink already.", and it
        logs out.</b></p></div>
      <div class="answer"><p><b>A:</b> What happened is that somehow the OSX Terminal program has been
        told to run <code>/sw/bin/pathsetup.command</code> every time you log
        in. You can fix this by removing the Preferences file,
        <code>~/Library/Preferences/com.apple.Terminal.plist</code>.</p><p>If you have other preferences that you want to keep, you can edit
        the file with a text editor and remove the reference to
        <code>/sw/bin/pathsetup.command</code>.</p></div>
    </a>
  <p align="right">
Next: <a href="comp-general.php?phpLang=fr">6 Compile Problems - General</a></p>

<? include_once "footer.inc"; ?>
