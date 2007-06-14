<a name="2007-03-04%20Problems%20with%20tar"><span class="news-date">2007-03-04: </span><span class="news-headline">Problems with tar</span></a><?php gray_line(); ?>
<p>Some users of fink's unstable tree are having sporadic difficulties
at the end of building large packages, getting reports like
<b>tar: File changed as we read it</b> which causes the .deb file
not to be built.
</p><p>
The fink team is currently studying this problem to determine a permanent
fix.  For the time being, users experiencing this problem can work around
it by issuing the command <code>fink install tar-1.15.1-14</code>.  It
may be necessary to issue that command after each <code>fink update-all</code>
command, as well.
</p><p>Once the fink team has determined how to solve this problem 
permanently, another announcement will be made here.
</p>
<p><b> Update: 16 March 2007: </b> The new version of fink's 
<code>dpkg</code> package resolves this problem.  Unstable users can
now run the update commands normally.
</p>
		<a name="19/08/2006%20Serveur%20inacessible%20-%20Solutions"><span class="news-date">19/08/2006: </span><span class="news-headline">Serveur inacessible - Solutions</span></a><?php gray_line(); ?>
<p><b>Mise à jour du 21/08/2006 </b> : le serveur est de nouveau accessible.</p>
<p>Le serveur qui héberge quatre services fink important (mise à jour via rsync, distribution binaire, "serveur maître" des fichiers sources et base de données des paquets) est inaccessible en ce moment. Nous espérons qu'il sera de nouveau fonctionnel lundi 21 août. Voici les solutions provisoires à votre disposition pendant l'indisponibilité du serveur.</p>
<p>Pour mettre à jours fink, vous devez soit choisir un miroir rsync différent du miroir primaire (voir le paragraphe suivant, soit utilisez la commmande <code>fink selfupdate-cvs</code>. Cette commande ne doit être utilisée qu'une seule fois ; les mises à jour suivantes se feront automatiquement via CVS. Quand le serveur sera de nouveau fonctionnel, vous pourrez revenir à la mise à jour via rsync en exécutant la commande <code>fink selfupdate-rsync</code>.</p>
<p>Pour pallier l'absence de distribution binaire et celle du "serveur primaire" des fichiers sources, exécutez la commande <code>fink configure</code>. Acceptez les réponses par défaut à toutes les questions, sauf à celles-ci: "Fink doit-il télécharger les paquets pré-compilés de la distribution binaire s'ils existent ?" (en anglais "Should Fink try to download pre-compiled packages from the binary distribution if available?"). Répondez alors "no" (en français "non") pour désactiver la distribution binaire. "Voulez-vous changer les miroirs ?" (en anglais "Do you want the change the mirror settings?"). Répondez "yes" (en français "oui"). "Dans quel ordre les miroirs doivent-ils être utilisés pour le téléchargement des sources ?" (en anglais ("What mirror order should fink use when downloading sources?". Répondez "2: Search Master Mirrors last" (en français "2 : Rechercher sur les miroirs maîtres en dernier lieu") pour désactiver l'utilisation automatique du serveur miroir maître). Enfin, si vous décidez de continuer à faire les mises à jour via rsync, vous devez choisir un autre miroir que rsync://master.us.finkmirrors.net/finkinfo/ en réponse à la question "Choisissez un miroir pour 'les mises à jour rsync'" (en anglais "Choose a mirror for 'RSync SelfUpdate'". Malheureusement, il se peut qu'aucun autre choix ne vous soit possible si vous habitez aux États-Unis.</p>
<p>Enfin, pour utiliser la base de données des paquets pendant la période d'indisponibilité du serveur, connectez-vous à <a href="http://lists.finkproject.org/pdb">cette copie de sauvegarde de la base de données des paquets</a>. Sachez, toutefois, qu'elle a quelques semaines de retard.</p>

<p><b> Update: 2 June 2007.</b>  Due to changes to the behavior of <code>sudo</code> on 10.4.9, the update script needs a bit of assistance.  Switching to a superuser prompt first via <code>sudo -s</code> will suffice.</p>

<a name="24/07/2006%20Rappel%20:%20l'arborescence%20%2210.4-transitional%22%20ne%20sera%20plus%20g%C3%A9r%C3%A9e%20au%201er%20ao%C3%BBt%202006"><span class="news-date">24/07/2006: </span><span class="news-headline">Rappel : l'arborescence "10.4-transitional" ne sera plus gérée au 1er août 2006</span></a><?php gray_line(); ?>
<p>L'arborescence "10.4-transitional" fut créée pour résoudre de façon provisoire les incompatibilités entre binaires construits à partir de GCC 3.3 (le compilateur par défaut du système Mac OS X 10.3) et GCC 4.0 (le compilateur par défaut du système Mac OS X 10.4). À présent que Fink utilise GCC 4.0, l'arborescence "10.4-transitional" sera gelée à partir du 1er août 2006. Seule l'arborescence "10.4" sera gérée à partir de cette date.</p>
<p><b>Si la commande "fink --version" a pour résultat "0.8.1.cvs" ou "0.8.1.rsync", vous n'avez rien à faire.</b></p>
<p>Comme nous l'avons déjà écrit <a href="<?php print $root; ?>news/#2006-07-01%20July%20is%20%22Fink%20Update%20Month%22">précédemment</a>, il y a deux façcons de passer à l'arborescence "10.4".</p>
<p>Le moyen le plus simple est de supprimer l'installation de Fink et d'en récréer une nouvelle en utilisant l'installeur 0.8.1 disponible sur la <a href="<?php print $root; ?>download">page de téléchargement</a>.</p>
<p>Un autre moyen consiste à télécharger le <a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">script de mise à jour</a> et de lire les instructions dans le fichier README pour mettre à jour l'installation existante sans la supprimer. Cette méthode reconstruit l'installation Fink à partir du source et met à jour toute l'installation. Notez que le processus peut prendre un certain temps selon l'installation.</p>
<p>Nous avons reçu des rapports très encourageants sur l'utilisation du script ; de nombreux utilisateurs sont déjà passés à la nouvelle arborescence. Si vous rencontrez des problèmes, veuillez en faire part sur les <a href="<?php print $root; ?>lists">listes de discussions</a>.
</p>

