<a name="23/08/2004 Problèmes avec XCode 1.5"><span class="news-date">23/08/2004 : </span><span class="news-headline">Problèmes avec XCode 1.5</span></a><?php gray_line(); ?>
<p>
Ces derniers jours, on nous a signalé que certains paquets de fink ne peuvent être compilés correctement avec XCode 1.5. Si vous n'avez pas encore effectué la mise à jour vers XCode 1.5, nous vous conseillons d'attendre pour le faire que ce problème soit résolu.
</p>
<p>
Si vous rencontrez des problèmes lors de la compilation d'un paquet sous XCode 1.5, alors que ce même paquet se compile correctement sous XCode 1.2, veuillez le signaler sur la liste de diffusion fink-devel. (En général, on trouve certains symboles manquants lors d'une compilation avec g++). Les paquets qui semblent souffrir de ce problème sont, pour l'heure, les suivants : octave, singular-factory, singular-libfac et peut-être sdl.
</p>
<a name="21/08/2004 Erreur dans fink version 0.22.0"><span class="news-date">21/08/2004 : </span><span class="news-headline">Erreur dans fink version 0.22.0</span></a><?php gray_line(); ?>
	<p>
La version 0.22.0 du gestionnaire de paquets fink, qui a été disponible la semaine dernière pendant un court laps de temps  dans la branche instable, a un bogue qui empêche la mise à jour via rsync. Si vous avez installé cette version de fink, vous pouvez rétablir la situation en exécutant d'abord la commande <code>fink install fink-0.21.2-1</code>, qui installera la version inférieure disponible dans la branche stable, puis en lançant la commande <code>fink selfupdate</code>.
</p>
<p>
Si, pour une raison ou une autre, ces commandes ne fonctionnent pas, allez sur la <a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203">page de distribution du fichier fink sur sourceforge</a> et téléchargez le fichier <code>fink-0.22.1.tar.gz</code>. Décompressez-le en exécutant <code>tar xfz fink-0.22.1.tar.gz</code>, puis lancez la commande <code>./inject.pl</code> après vous être déplacé dans le répertoire fink-0.22.1.
</p>
<p>
L'équipe de fink vous prie d'accepter ses excuses pour cette erreur et remercie la communauté de ses utilisateurs de lui avoir rapidement signalé ce problème.</p>
<a name="01/08/2004 Aidez-nous à améliorer la qualité de nos miroirs"><span class="news-date">01/08/2004 : </span><span class:"news-headline">Aidez-nous à améliorer la qualité de nos miroirs</span></a><?php gray_line(); ?>
<p>
La décision de Fink de construire petit à petit son propre réseau de miroirs a été payante. Pour continuer à offrir un service de haute qualité, nous devons faire croître notre réseau de miroirs. Cela fait un moment que nous ne vous avons pas sollicité dans ce sens, il est temps de le faire maintenant. Fink remercie tous ceux qui nous offert leurs ressources. Nous manquons, en particulier, de miroirs en Europe Centrale, en Russie et en Extrême-Orient. Si vous avez au moins deux Mb à consacrer à un miroir rsync, ou plus pour un miroir de fichiers de distribution, veuillez <a href="mailto:mirrors@finkmirrors.net">nous contacter</a>.
</p>
	<p>
Pour avoir une vue d'ensemble des différents types de miroirs que Fink propose, allez sur <a href="http://finkmirrors.net/">finkmirrors.net</a>. C'est la page officielle de tout ce qui se rapporte aux miroirs. Si vous pensez pouvoir offrir d'autres types de ressources, tel de l'espace web pour faire des tests, n'hésitez pas à <a href="mailto:mirrors@finkmirrors.net">nous contacter</a>.
	</p>
