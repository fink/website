<a name="21/08/2004"><span class="news-date">21/08/2004 : </span><span class="news-headline">Erreur dans fink version 0.22.0</span></a><?php gray_line(); ?>
	<p>
La version 0.22.0 du gestionnaire de paquets fink, qui a été disponible la semaine dernière pendant un court laps de temps  dans la branche instable, a un bogue qui empêche la mise à jour via rsync. Si vous avez installé cette version de fink, vous pouvez rétablir la situation en exécutant d'abord la commande <code>fink install fink-0.21.2-1</code>, qui installera la version inférieure disponible dans la branche stable, puis en lançant la commande <code>fink selfupdate</code>.
</p>
<p>
Si, pour une raison ou une autre, ces commandes ne fonctionnent pas, allez sur la <a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203">page de distribution du fichier fink sur sourceforge</a> et téléchargez le fichier <code>fink-0.22.1.tar.gz</code>. Décompressez-le en exécutant <code>tar xfz fink-0.22.1.tar.gz</code>, puis lancez la commande <code>./inject.pl</code> après vous être déplacé dans le répertoire fink-0.22.1.
</p>
<p>
L'équipe de fink vous prie d'accepter ses excuses pour cette erreur et remercie la communauté de ses utilisateurs de lui avoir rapidement signalé ce problème.</p>
<a name="01/08/2004 "><span class="news-date">01/08/2004 : </span><span class:"news-headline">Aidez-nous à améliorer la qualité de nos miroirs</span></a><?php gray_line(); ?>
<p>
La décision de Fink de construire petit à petit son propre réseau de miroirs a été payante. Pour continuer à offrir un service de haute qualité, nous devons faire croître notre réseau de miroirs. Cela fait un moment que nous ne vous avons pas sollicité dans ce sens, il est temps de le faire maintenant. Fink remercie tous ceux qui nous offert leurs ressources. Nous manquons, en particulier, de miroirs en Europe Centrale, en Russie et en Extrême-Orient. Si vous avez au moins deux Mb à consacrer à un miroir rsync, ou plus pour un miroir de fichiers de distribution, veuillez <a href="mailto:mirrors@finkmirrors.net">nous contacter</a>.
</p>
	<p>
Pour avoir une vue d'ensemble des différents types de miroirs que Fink propose, allez sur <a href="http://finkmirrors.net/">finkmirrors.net</a>. C'est la page officielle de tout ce qui se rapporte aux miroirs. Si vous pensez pouvoir offrir d'autres types de ressources, tel de l'espace web pour faire des tests, n'hésitez pas à <a href="mailto:mirrors@finkmirrors.net">nous contacter</a>.
	</p>
<a name="06/04/2004 "><span class="news-date">06/04/2004 : </span><span class="news-headline">Fink 0.6.3 et 0.7.0 sont disponibles</span></a><?php gray_line(); ?>
	<p>
Les dernières versions de Fink 0.6.3 (pour Mac OS 10.2) et 0.7.0 (pour Mac OS 10.3) sont, dès à présent, disponibles sous forme de sources ou de binaires.  La version 0.6.3 a été compilée sur <b>Mac OS 10.2</b>, tandis que la version 0.7.0 l'a été sur <b>Mac OS 10.3</b>. Cela devrait rendre la gestion des différentes plate-formes plus facile.
	</p>
	<p>
Dans ces nouvelles versions on a apporté différentes corrections au gestionnaire de paquets, ajouté de nombreux paquets binaires non disponibles sous cette forme auparavant, et recompilé certains paquets qui posaient des problèmes sur 10.3.
	</p>
	<p>
Pour faire une première installation de Fink, vous devez suivre les instructions données <a href="download/index.php?phpLang=fr">ici</a>.
Pour mettre à jour une installation de Fink existante, vous devez suivre les instructions données <a href="download/upgrade.php?phpLang=fr">là</a>.
Si vous vous posez des questions ou rencontrez des problèmes à cette occasion, utilisez les listes de diffusion de Fink. Vous en saurez plus <a href="lists/index.php?phpLang=fr">ici</a>.
		</p>
		<p>
Vérifiez que vous avez téléchargé le <b>bon installeur</b> pour votre plate-forme. Fink 0.6.3 ne s'installe que sur Mac OS X 10.2.*, et Fink 0.7.0 ne s'installe que sur Mac OS X 10.3.*.
		</p>
	<p>
L'équipe Fink remercie toutes les personnes sans qui cette version n'aurait pas vu le jour : ses nombreux contributeurs, toutes les personnes qui apportent leur aide régulièrement ainsi que les développeurs.
Nous remercions aussi notre communauté. Sans son soutien constant et ses conseils judicieux, Fink n'en serait pas là aujourd'hui. 
</p>
<a name="19/02/2004 "><span class="news-date">19/02/2004 : </span><span class="news-headline">Hissez vos couleurs</span></a><?php gray_line(); ?>
	<p>
Grâce à Baba Yoshihiko, Fink a pris les mesures nécessaires pour autoriser son internationalisation. 
L'amélioration de l'infrastructure nous permet d'offrir un site web multilingue à nos visiteurs du monde entier. 
</p>
<p>
Cela signifie que nous avons besoin de volontaires. Le site web de Fink doit être traduit dans la langue désirée.
Une traduction en japonais est en cours et Michèle Garoche est responsable de la traduction française.
En quelle langue êtes-vous prêt à traduire ?
</p>
<p>
Si vous voulez devenir membre de l'équipe d'internationalisation ou que vous souhaitez donner votre avis sur le site web, n'hésitez pas à vous abonner à la nouvelle liste de diffusion.
Pour ce faire, allez sur la <a href="lists/index.php?phpLang=fr">page des listes de diffusion</a>. Le texte de l'annonce émise sur les listes de diffusion de Fink se trouve <a href="http://article.gmane.org/gmane.os.apple.fink.devel/7554">ici</a>.
</p>
