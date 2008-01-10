<a name="10/12/2007%20Leopard,%20X11,%20et%20Fink"><span class="news-date">10/12/2007: </span><span class="news-headline">Leopard, X11, et Fink</span></a><?php gray_line(); ?>
	<p>Les utilisateurs voulant mettre à jour leur installation X11 sous Leopard 
	doivent s'assurer de télécharger  <a href="http://xquartz.macosforge.org/%20%20%20downloads/Xquartz-1.3.0-apple-fink.bz2">une mise à jour Xquartz compatible 
	avec Fink</a>.  Les utilisateurs qui ont déjà appliqué la mise à jour 
	X11-2.1.0.1.pkg disponible depuis macosxforge.org <b>doivent</b> installer 
	cette version non obstrusive d'Xquartz pour que Fink fonctionne 
	correctement.
	  (Note: there is an X11-2.1.1.pkg release pending which will remove the need to patch your Xquartz.  If you install X11 2.1.1 or later, <b>do not</b> apply the Xquartz patch.)</p>
    <p><b>Mise à jour, 2007-12-11:</b> La version 2.1.1 de X11 <a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">est maintenant
disponible sur la page de téléchargement de XQuartz</a>. Les utilisateurs
qui ont déjà installé le fichier X11-2.1.0.1.pkg et/ou la rustine
Xquartz-1.3.0-apple-fink depuis macosxforge.org doivent faire une mise
à jour vers la version 2.1.1 ou une version plus récente, pour que
Fink fonctionne correctement. Cette version remplace toutes les
versions précédentes, y compris la version spécifique à Fink.</p>
  <a name="18/11/2007%20Site%20PDB"><span class="news-date">18/11/2007: </span><span class="news-headline">Site PDB</span></a><?php gray_line(); ?>
    <p>L'interface web de gestion des paquets ne marche plus. La base de données est arrêtée suite à des mises à jour matériels et logiciels du serveur. Nous travaillons pour rétablir ce serveur dès que possible. Désolé pour la gêne occasionée.</p>
<p><b>Actualisé le 12 décembre:</b> La base de données des paquets est 
rétablie, et l'interface web est à nouveau opérationnelle, avec de nouvelles 
fonctionnalités.</p>
  <a name="26/10/2007%20Support%20de%20Leopard"><span class="news-date">26/10/2007: </span><span class="news-headline">Support de Leopard</span></a><?php gray_line(); ?>
    <p>Le projet Fink annonce le commencement du support pour Leopard (Mac OS X 10.5).</p>
<p>Les utilisateurs de 10.5 démarrant une nouvelle arborescence Fink devront le faire via bootstrap, tant qu'une distribution binaire ne sera pas disponible. <a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">Téléchargez la version 0.27.7 de Fink</a>.</p>
<p>La mise à jour de 10.4 vers 10.5 pour Fink peut s'effectuer en exécutant la commande <code>fink selfupdate</code> pour installer fink-0.27.7. Si vous êtes déjà sous 10.5, vérifiez d'abord que Xcode 3.0 est installé. Une fois 10.5 installé, exécutez ensuite <code>fink reinstall fink</code>.</p>
<p>La mise à jour de 10.3 vers 10.5 n'est pas encore prête. Si vous êtes impatient(e), vous devrez alors démarrer une nouvelle arborescence via bootstrap avec <code>fink-0.27.7</code>.</p>
<p><b>Actualisé le 29 octobre:</b> Attention, pour les utilisateurs qui installent la mise à jour Leopard, exécuter la commande <code>fink cleanup</code> supprimera <b>l'ensemble</b> de vos fichiers .deb. La prochaine version de Fink corrigera ce problème.</p>

