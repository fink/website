<a name="18/11/2007%20Site%20PDB"><span class="news-date">18/11/2007: </span><span class="news-headline">Site PDB</span></a><?php gray_line(); ?>
    <p>L'interface web de gestion des paquets ne marche plus. La base de données est arrêtée suite à des mises à jour matériels et logiciels du serveur. Nous travaillons pour rétablir ce serveur dès que possible. Désolé pour la gêne occasionée.</p>
  <a name="26/10/2007%20Support%20de%20Leopard"><span class="news-date">26/10/2007: </span><span class="news-headline">Support de Leopard</span></a><?php gray_line(); ?>
    <p>Le projet Fink annonce le commencement du support pour Leopard (Mac OS X 10.5).</p>
<p>Les utilisateurs de 10.5 démarrant une nouvelle arborescence Fink devront le faire via bootstrap, tant qu'une distribution binaire ne sera pas disponible. <a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">Téléchargez la version 0.27.7 de Fink</a>.</p>
<p>La mise à jour de 10.4 vers 10.5 pour Fink peut s'effectuer en exécutant la commande <code>fink selfupdate</code> pour installer fink-0.27.7. Si vous êtes déjà sous 10.5, vérifiez d'abord que Xcode 3.0 est installé. Une fois 10.5 installé, exécutez ensuite <code>fink reinstall fink</code>.</p>
<p>La mise à jour de 10.3 vers 10.5 n'est pas encore prête. Si vous êtes impatient(e), vous devrez alors démarrer une nouvelle arborescence via bootstrap avec <code>fink-0.27.7</code>.</p>
<p><b>Actualisé le 29 octobre:</b> Attention, pour les utilisateurs qui installent la mise à jour Leopard, exécuter la commande <code>fink cleanup</code> supprimera <b>l'ensemble</b> de vos fichiers .deb. La prochaine version de Fink corrigera ce problème.</p>
<a name="04/03/2007%20Probl%C3%A8mes%20avec%20tar"><span class="news-date">04/03/2007: </span><span class="news-headline">Problèmes avec tar</span></a><?php gray_line(); ?>
<p>Certains utilisateurs de la branche instable rencontre des difficultés lors de la génération de paquets de grandes tailles, en ayant des avertissements comme <b>tar: File changed as we read it</b>, ce qui empêche la création du paquet .deb.
</p><p>
L'équipe travaille actuellement sur la résolution définitive de ce problème. Pour l'instant, les utilisateurs confrontés à cette situtation peuvent la contourner en exécutant la commande <code>fink install tar-1.15.1-14</code>. Il peut s'avérer nécessaire de renouveler cette étape après chaque commande <code>fink update-all</code>. 
</p><p>
Une annonce sera postée ici même dès la correction effectuée.
</p>
<p><b>Actualisé le 16 mars:</b> la nouvelle version de <code>dpkg</code> résout ce problème. Les utilisateurs peuvent exécuter normalement leurs commandes de mises à jour.
</p>
		
