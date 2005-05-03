<?
$title = "News";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2005/05/01 06:05:05';
$metatags = '';

include_once "header.inc";
?>

<a name="29/04/2005%20Fink%20et%20Tiger"><span class="news-date">29/04/2005: </span><span class="news-headline">Fink et Tiger</span></a><?php gray_line(); ?>
<p>Fink fonctionnne sous Mac OS X 10.4 ! Voici les différentes façons de faire la mise à jour :</p>
<ul>
<li>Un installeur binaire sera disponible d'ici quelques semaines pour les utilisateurs de binaires.</li>
<li>Nous recommandons aux utilisateurs de la branche stable de supprimer fink en utilisant la commande <code>sudo rm -Rf /sw</code>, puis d'amorcer l'installation de la version 0.23.9 de fink avec le fichier compressé <a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043&amp;release_id=323774">fink-0.23.9.tar.gz</a>. Téléchargez ce fichier et décompressez-le via la commande <code>tar -xvzf fink-0.23.9.tar.gz</code>. Exécutez ensuite la commande <code>./bootstrap.sh</code> dans le répertoire <code>fink-0.23.9</code> nouvellement créé. Enfin, lancez la commande <code>fink selfupdate</code>.</li>
<li>Les utilisateurs de la branche instable peuvent faire la mise à jour via <code>fink selfupdate</code> si leur version de fink est inférieure à la version 0.24.5. Elle sera alors installée. Après passage à la version 10.4 de Mac OS X, vérifiez d'abord que vous avez la bonne version de fink en exécutant <code>fink --version</code>. Si la version est inférieure à 0.24.5, lancez <code>fink selfupdate</code>. Réinstallez ensuite le paquet fink via la commande <code>fink reinstall fink</code>, suivie de <code>fink selfupdate</code>.</li>
</ul>
<p>Tous les paquets ne fonctionnent pas encore sous Mac OS X 10.4, mais la situation va s'améliorer au fil des semaines. La branche stable contient, à l'heure actuelle, nettement moins de paquets que sous Mac OS X 10.3, mais tous ceux qui sont présents devraient compiler sans problèmes.</p>
<p>Il reste bien sûr quelques petits défauts à corriger. Nous recommandons aux utilisateurs, dont le travail dépend du bon fonctionnement de certaines applications, de vérifier sur les listes de diffusion si les applications en question ont été testées avant de faire la mise à jour.</p>
<a name="20/11/2004%20Solution%20aux%20probl%C3%A8mes%20gcc"><span class="news-date">20/11/2004: </span><span class="news-headline">Solution aux problèmes gcc</span></a><?php gray_line(); ?>
<p>Apple a publié une mise à jour de gcc3 en novembre 2004 (November 2004 gcc3 updater). Elle est disponible sur connect.apple.com après enregistrement gratuit. Cette mise à jour résout les problèmes du compilateur gcc3 dans XCode 1.5. Si vous utilisez ce dernier, vous devez installer la mise à jour. Elle s'effectuera correctement, que vous ayez ou non installé précédemment la solution recommandée par Fink.</p>
<p>Remercions Apple d'avoir répondu à nos rapports sur ce sujet et d'avoir travaillé à la résolution de ce problème aussi rapidement que possible.</p>


<a name="15/10/2004%20R%C3%A9solution%20de%20probl%C3%A8mes%20concernant%20gcc"><span class="news-date">15/10/2004: </span><span class="news-headline">Résolution de problèmes concernant gcc</span></a><?php gray_line(); ?>
<p>Il s'avère que la version de gcc incluse dans XCode 1.5 produit des résultats incorrects avec du code C++ dans certains cas. Fink possède maintenant un mécanisme pour en avertir l'utilisateur et refusera bientôt d'utiliser cette version "vérolée" pour compiler les paquets qui présentent ce problème.</p>
<p>Si vous êtes déjà passé à la version 1.5 de XCode, vous trouverez une solution décrite <a href="http://article.gmane.org/gmane.os.apple.fink.beginners/13580">ici</a> ou <a href="http://article.gmane.org/gmane.os.apple.fink.beginners/14200">là</a>.</p>
<p>Si vous n'avez pas encore mis à jour XCode, il vous est conseillé de ne pas le faire tant que ce problème ne sera pas résolu.</p>
<a name="20/09/2004%20Fink%200.7.1%20est%20disponible"><span class="news-date">20/09/2004: </span><span class="news-headline">Fink 0.7.1 est disponible</span></a><?php gray_line(); ?>
<p>La dernière version de Fink, 0.7.1 (pour 10.3) est maintenant disponible sous forme de sources ou de binaires. Cette tourne sur les versions Panther (10.3) de Mac OS X. La version 0.6.3 reste disponible pour les utilisateurs des versions Jaguar (10.2) de Mac OS X.</p>
<p>Elle intégre diverses corrections du gestionnaire de paquets. De plus, de nombreux paquets, auparavant indisponibles sous forme binaire, ont été ajoutés, ce qui porte le total des binaires disponibles à 1650. Ils comprennent, en autres, les binaires de KDE 3.1.4 et ceux de GNOME 2.4.</p>
<p>Pour installer Fink pour la première fois, veuillez suivre les instructions données <a href="http://fink.sourceforge.net/download/index.php?phpLang=fr">ici</a>. Pour mettre à jour Fink, servez-vous de la version installée sur votre système. Vous trouverez la liste des différences entre les versions 0.7.0 et 0.7.1 sur cette <a href="http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable&amp;cmp=0&amp;tree2=0.7.0-stable&amp;splitoffs=on&amp;sort=name">page.</a></p>
<p>Si vous vous posez des questions ou rencontrez des difficultés, n'hésitez pas à vous servir des listes de diffusion de Fink. Vous en trouverez le détail <a href="http://fink.sourceforge.net/lists/index.php?phpLang=fr">ici</a>.</p>
<p>Vérifiez que vous avez choisi le <b>bon installeur</b> pour votre plate-forme. Fink 0.6.3 n'est installable que sur Mac OS X 10.2.*, tandis que Fink 0.7.1 ne convient que pour Mac OS X 10.3.*.</p>
<p>L'équipe Fink remercie toutes les personnes sans lesquelles cette version n'aurait pas vu le jour : ses nombreux contributeurs, toutes les personnes qui apportent leur aide régulièrement ainsi que les développeurs. Nous remercions aussi notre communauté d'avoir téléchargé la version 0.7.0 précédente plus de 130 000 fois. Sans son soutien constant et ses conseils judicieux, Fink n'en serait pas là aujourd'hui.</p>
<a name="23/08/2004%20Probl%C3%A8mes%20avec%20XCode%201.5"><span class="news-date">23/08/2004: </span><span class="news-headline">Problèmes avec XCode 1.5</span></a><?php gray_line(); ?>
	<p>
Ces derniers jours, on nous a signalé que certains paquets de fink ne peuvent être compilés correctement avec XCode 1.5. Si vous n'avez pas encore effectué la mise à jour vers XCode 1.5, nous vous conseillons d'attendre pour le faire que ce problème soit résolu.
</p>
<p>
Si vous rencontrez des problèmes lors de la compilation d'un paquet sous XCode 1.5, alors que ce même paquet se compile correctement sous XCode 1.2, veuillez le signaler sur la liste de diffusion fink-devel. (En général, on trouve certains symboles manquants lors d'une compilation avec g++). Les paquets qui semblent souffrir de ce problème sont, pour l'heure, les suivants : octave, singular-factory, singular-libfac et peut-être sdl.
</p>
	<a name="21/08/2004%20Erreur%20dans%20fink%20version%200.22.0"><span class="news-date">21/08/2004: </span><span class="news-headline">Erreur dans fink version 0.22.0</span></a><?php gray_line(); ?>
	<p>
La version 0.22.0 du gestionnaire de paquets fink, qui a été disponible la semaine dernière pendant un court laps de temps  dans la branche instable, a un bogue qui empêche la mise à jour via rsync. Si vous avez installé cette version de fink, vous pouvez rétablir la situation en exécutant d'abord la commande <code>fink install fink-0.21.2-1</code>, qui installera la version inférieure disponible dans la branche stable, puis en lançant la commande <code>fink selfupdate</code>.
</p>
<p>
Si, pour une raison ou une autre, ces commandes ne fonctionnent pas, allez sur la <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">page de distribution du fichier fink sur sourceforge</a> et téléchargez le fichier <code>fink-0.22.1.tar.gz</code>. Décompressez-le en exécutant <code>tar xfz fink-0.22.1.tar.gz</code>, puis lancez la commande <code>./inject.pl</code> après vous être déplacé dans le répertoire fink-0.22.1.
</p>
<p>
L'équipe de fink vous prie d'accepter ses excuses pour cette erreur et remercie la communauté de ses utilisateurs de lui avoir rapidement signalé ce problème.</p>
	<a name="01/08/2004%20Aidez-nous%20%C3%A0%20am%C3%A9liorer%20la%20qualit%C3%A9%20de%20nos%20miroirs"><span class="news-date">01/08/2004: </span><span class="news-headline">Aidez-nous à améliorer la qualité de nos miroirs</span></a><?php gray_line(); ?>
	<p>
La décision de Fink de construire petit à petit son propre réseau de miroirs a été payante. Pour continuer à offrir un service de haute qualité, nous devons faire croître notre réseau de miroirs. Cela fait un moment que nous ne vous avons pas sollicité dans ce sens, il est temps de le faire maintenant. Fink remercie tous ceux qui nous offert leurs ressources. Nous manquons, en particulier, de miroirs en Europe Centrale, en Russie et en Extrême-Orient. Si vous avez au moins deux Mb à consacrer à un miroir rsync, ou plus pour un miroir de fichiers de distribution, veuillez <a href="mailto:mirrors@finkmirrors.net">nous contacter</a>.
</p>
	<p>
Pour avoir une vue d'ensemble des différents types de miroirs que Fink propose, allez sur <a href="http://finkmirrors.net/">finkmirrors.net</a>. C'est la page officielle de tout ce qui se rapporte aux miroirs. Si vous pensez pouvoir offrir d'autres types de ressources, tel de l'espace web pour faire des tests, n'hésitez pas à <a href="mailto:mirrors@finkmirrors.net">nous contacter</a>.
	</p>
	<a name="06/04/2004%20Fink%200.6.3%20et%200.7.0%20sont%20disponibles"><span class="news-date">06/04/2004: </span><span class="news-headline">Fink 0.6.3 et 0.7.0 sont disponibles</span></a><?php gray_line(); ?>
	<p>
Les dernières versions de Fink 0.6.3 (pour 10.2) et 0.7.0 (pour 10.3) sont, dès à présent, disponibles sous forme de sources ou de binaires.  La version 0.6.3 a été compilée sur <b>10.2</b>, tandis que la version 0.7.0 l'a été sur <b>10.3</b>. Cela devrait rendre la gestion des différentes plate-formes plus facile.
	</p>
	<p>
Dans ces nouvelles versions on a apporté différentes corrections au gestionnaire de paquets, ajouté de nombreux paquets binaires non disponibles sous cette forme auparavant, et recompilé certains paquets qui posaient des problèmes sur 10.3.
	</p>
	<p>
Pour faire une première installation de Fink, vous devez suivre les instructions données <a href="<?php print $root; ?>download/index.php?phpLang=fr">ici</a>.
Pour mettre à jour une installation de Fink existante, vous devez suivre les instructions données <a href="<?php print $root; ?>download/upgrade.php?phpLang=fr">là</a>.

Si vous vous posez des questions ou rencontrez des problèmes à cette occasion, utilisez les listes de diffusion de Fink. Vous en saurez plus <a href="<?php print $root; ?>lists/index.php?phpLang=fr">ici</a>.
		</p>
		<p>
Vérifiez que vous avez téléchargé le <b>bon installeur</b> pour votre plate-forme. Fink 0.6.3 ne s'installe que sur Mac OS X 10.2.*, et Fink 0.7.0 ne s'installe que sur Mac OS X 10.3.*.
		</p>
	<p>
L'équipe Fink remercie toutes les personnes sans qui cette version n'aurait pas vu le jour : ses nombreux contributeurs, toutes les personnes qui apportent leur aide régulièrement ainsi que les développeurs.
Nous remercions aussi notre communauté. Sans son soutien constant et ses conseils judicieux, Fink n'en serait pas là aujourd'hui. 
</p>
<a name="19/02/2004%20Hissez%20vos%20couleurs"><span class="news-date">19/02/2004: </span><span class="news-headline">Hissez vos couleurs</span></a><?php gray_line(); ?>
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
Pour ce faire, allez sur la <a href="<?php print $root; ?>lists/index.php?phpLang=fr">page des listes de diffusion</a>. Le texte de l'annonce émise sur les listes de diffusion de Fink se trouve <a href="http://article.gmane.org/gmane.os.apple.fink.devel/7554">ici</a>.
</p>
<a name="02/02/2004%20La%20mise%20%C3%A0%20jour%20de%20Java%201.4.2%20supprime%20Java%20SDK"><span class="news-date">02/02/2004: </span><span class="news-headline">La mise à jour de Java 1.4.2 supprime Java SDK</span></a><?php gray_line(); ?>
	<p>
Si vous aviez installé Java 1.4.1 et Java SDK, la mise à jour Java 1.4.2 d'Apple met Java runtime en version 1.4.2, mais <b>supprime</b> Java runtime 1.4.1 et le SDK <b>sans</b> mettre à jour le JDK.  Pour construire des paquets Java dans Fink, vous devez <a href="http://connect.apple.com/">aller sur connect.apple.com et télécharger Java 1.4.2 SDK</a> (enregistrement gratuit obligatoire).
	</p>
	<a name="18/01/2004%20Mise%20%C3%A0%20jour%20des%20binaires%2010.3"><span class="news-date">18/01/2004: </span><span class="news-headline">Mise à jour des binaires 10.3</span></a><?php gray_line(); ?>
	<p>
De nombreux fichiers binaires pour 10.3 ont été mis à jour, ce qui élimine des problèmes avec qt et kde, entre autres. Pour accéder aux nouveaux fichiers, mettez à jour l'index de vos fichiers binaires en exécutant la commande <code>sudo apt-get update</code> .  Ensuite, vous pourrez utiliser apt-get, dselect ou FinkCommander pour installer les fichiers binaires comme d'habitude.
	</p>
	<a name="10/01/2004%20Envie%20d'installer%20GNOME%202.4%20?"><span class="news-date">10/01/2004: </span><span class="news-headline">Envie d'installer GNOME 2.4 ?</span></a><?php gray_line(); ?>
	<p>
Grâce à la nouvelle équipe GNOME de Fink et au travail intense de notre nouveau constructeur de paquets Keith Conger et du mainteneur de GNOME 1.x maintainer Masanori Sekino, GNOME 2.4 vient d'être placée dans l'arborescence instable 10.3.
	</p>
	<p>
Vous n'avez qu'à le récupérer ; dédiez, si vous le pouvez, un peu de votre temps libre au test de ces paquets si vous avez déjà configuré Fink pour l'arborescence instable. De nombreux changements ont eu lieu ; il y a donc des chances pour que la mise à jour ou l'installation de la nouvelle version de GNOME posent quelques problèmes. Si c'est le cas, vous pouvez joindre l'équipe GNOME à <a href="mailto:fink-gnome-core@lists.sourceforge.net">fink-gnome-core@lists.sourceforge.net</a>.
Envoyez-lui aussi un rapport quand tout s'est bien passé. Plus nous recevrons de rapports favorables, plus vite nous pourrons mettre GNOME 2.4 dans l'arborescence stable.
	</p>
	<p>
Pour ceux d'entre vous qui ne lisent pas nos listes de diffusion, <a href="http://fink.sourceforge.net/lists/index.php?phpLang=fr">qu'attendez-vous pour vous abonner</a> ?
	Voici un lien vers des 
	<a href="http://article.gmane.org/gmane.os.apple.fink.gnome/57/match=gnome">instructions</a> détaillées d'installation ou de mise à jour de GNOME. Vous y trouverez aussi la liste des nouvelles fonctionnalités.
	</p>
	<a name="02/01/2004%20Les%20douze%20coups%20de%20minuit%20ont%20sonn%C3%A9%20!"><span class="news-date">02/01/2004: </span><span class="news-headline">Les douze coups de minuit ont sonné !</span></a><?php gray_line(); ?>
	<p>
	Bonne année à tous de la part de toute l'équipe.
	</p>
	<p>
	L'année passée a été une bonne année pour Fink. Nous avons eu du mal à intégrer les changements introduits par Apple, mais nous avons aussi découvert que nous avions une communauté formidable prête à patienter très longtemps pour nous soutenir.
	C'est pourquoi nous vous disons "Merci". Le projet Fink avance principalement grâce au soutien et aux encouragements extraordinaires que nous recevons de nos utilisateurs.
	</p>
	<p>
	En 2004, la tendance devrait s'accélérer. Il y a quelques petites choses intéressantes en vue : GNOME 2.4, une nouvelle version de KDE, des changements majeurs dans le gestionnaire de paquets, et une restructuration de l'organisation.
	Nous espérons pouvoir étendre le projet par des conférences développeurs, des rencontres et un CD dans votre magasin préféré.
	</p>
	<p>
	Les grandes ambitions peuvent se révéler catastrophiques, c'est pourquoi nous les réaliserons en douceur, mais nous comptons toujours sur votre soutien cette année. Dites-nous ce que vous pensez de Fink ; si vous l'aimez ou non ; proposez-nous des idées d'amélioration. Prêtez-nous vos ressources et sponsorisez un mirroir ou du matériel. Consacrez un peu de votre temps à améliorer le gestionnaire de paquets ou à ajouter un logiciel en créant un fichier info. Faîtes-vous plaisir en navigant sur ce site. Nous sommes heureux de nous mettre au service d'une communauté aussi agréable. Nous espérons que nous vous ferons franchir, à vous et votre Macintosh, l'année 2004 sans encombres.
	</p>
	<a name="28/12/2004%20Joyeux%20No%C3%ABl%20et%20bonne%20ann%C3%A9e"><span class="news-date">28/12/2004: </span><span class="news-headline">Joyeux Noël et bonne année</span></a><?php gray_line(); ?>
		<p>
 L'équipe Fink et moi-même vous souhaitons un joyeux Noël et de bonnes vacances. Nous nous réjouissons à l'avance de cette nouvelle année pendant laquelle nous pourrons aider la communauté Macintosh à se développer dans le monde UNIX avec Mac OS X.
 		</p>
		<p>
 Puissent tous vos voeux se réaliser, que le monde devienne meilleur et que la paix et la compréhension y règnent ne serait-ce que pendant ces quelques jours.
		</p>
		<p>
 Profitez de cette pause et encore meilleurs voeux pour la nouvelle année.
 Ne nous abandonnez pas, nous comptons sur votre soutien.
		
		</p>
	<a name="30/11/2003%20Encore%20de%20nouveaux%20miroirs%20!"><span class="news-date">30/11/2003: </span><span class="news-headline">Encore de nouveaux miroirs !</span></a><?php gray_line(); ?>
		<p>
			Merci, merci, merci ! Quelle formidable communauté ! Merci de nous offrir toujours plus de sites miroirs. 
		</p>
		<p>
			Matthew Healey, membre du Western <a href="http://www.wamug.org.au"> Australian</a>
			Macintosh User Group, et son fournisseur d'accès <a href="http://www.extremedsl.com.au">
				extremedsl</a> nous offrent un miroir complet à Perth, en Australie. Il s'agit de notre premier miroir à l'autre bout du monde, je suis donc d'autant plus heureux de l'accueillir dans notre famille. Le service <a href="http://www.mirror.ac.uk">UKMIRROR</a> nous a, par ailleurs, accepté, rendant les distributions de Fink disponibles sur 21 serveurs à charge partagée. 
		</p>
		<p>
			Nous en sommes très heureux, mais nous sommes toujours à la recherche de nouveaux miroirs basés sur rsync. Si vous désirez nous aider, allez sur <a href="http://finkmirrors.net">finkmirrors.net</a> et entrez contact avec nous. 
		</p>
		<a name="24/11/2003%20Un%20autre%20miroir....%20Mais%20est-ce%20bien%20suffisant%20?"><span class="news-date">24/11/2003: </span><span class="news-headline">Un autre miroir.... Mais est-ce bien suffisant ?</span></a><?php gray_line(); ?>
		<p>
			Nous souhaitons la bienvenue à notre nouveau miroir situé en Norvège, sponsorisé par Havar Valeur, mais nous faisons encore appel à votre générosité. Pour améliorer le service qui vous est destiné, nous vous demandons de bien vouloir regarder si vous ne pourriez pas devenir miroir. 
		</p>
		<p>
			Il suffit de posséder un lien à 10 Mbit/s, environ 100 Mo d'espace disque disponible et de la bande passante à partager avec Fink. Les instructions précises pour la mise en place de rsync sont disponibles <a href="http://finkmirrors.net/rsync.html">ici</a>. Nous recherchons, en particulier, des miroirs en Asie, en Australie, en Nouvelle Zélande, en Europe méridionale et en Europe centrale : nous n'en avons encore aucun dans ces régions. Si vous vous sentez d'humeur particulièrement généreuse et désirez faire davantage, allez sur <a href="http://finkmirrors.net">finkmirrors.net</a> pour découvrir les options qui s'offrent à vous. 
		</p>
		<p>
			Vous pouvez connaître, à tout instant, l'état de nos miroirs rsync sur finkmirrors.net. Nous comptons améliorer ce service par la suite, ce qui ne pourra être fait que grâce à la bonne volonté de chacun. Nous pensons à de nombreuses autres applications et remercions d'avance l'ensemble de notre communauté. 
		</p>
		<a name="17/11/2003%20Fink%200.6.2%20est%20disponible"><span class="news-date">17/11/2003: </span><span class="news-headline">Fink 0.6.2 est disponible</span></a><?php gray_line(); ?>
		<p>
			Les binaires et sources de la dernière version de Fink, numérotée 0.6.2, sont maintenant disponibles. Il s'agit d'une version destinée à corriger deux bogues de la version précédente : celui de la suppression utilisateur / dselect, ainsi qu'un problème d'autorisations attribuées aux fichiers. Le bogue dselect a été résolu en mettant à jour les paquets fink, dpkg et apt. Après mise à jour en version 0.6.2, vous pourrez utiliser de nouveau dselect sans problème. Cependant, si vous avez utilisé dselect sous une version  au moins égale à la version 0.6.0, vérifiez l'intégrité du fichier <code>/sw/etc/apt/sources.list</code>. Si vous avez le moindre doute concernant ce fichier, nous vous recommandons de le remplacer par <a href="<?php print $root; ?>files/sources.list">le fichier sources.list par défaut</a>. 
		</p>
		<p>
			Les utilisateurs qui ont installé des fichiers binaires à partir de la distribution 0.6.1 pourraient constater que certains fichiers Fink appartiennent à l'utilisateur UID 20011 et non à l'utilisateur root. Pour corriger ce problème, lancez la commande :
		</p>
<pre>
sudo find /sw/ -user 2011 -exec chown root:admin {} \;
</pre>
		<p>
			Cette version, comme la précédente, a été créée sous Mac OS X 10.2 et compilée avec gcc 3.3. Elle fonctionne correctement, à quelques exceptions* près, sous Mac OS X 10.3. La plupart des utilisateurs passant sous Mac OS X 10.3 devront utiliser les binaires de cette nouvelle distribution pour l'instant, tandis que l'équipe de Fink continue d'adapter les paquets Fink à Mac OS X 10.3. 
		</p>
		<p>
			*Quelques exceptions : emacs, qt. 
		</p>
		<a name="04/11/2003%20Risque%20de%20suppression%20d'utilisateur%20/%20Probl%C3%A8mes%20avec%20Dselect"><span class="news-date">04/11/2003: </span><span class="news-headline">Risque de suppression d'utilisateur / Problèmes avec Dselect</span></a><?php gray_line(); ?>
		<p>
			<b>En bref : N'UTILISEZ PAS DSELECT</b>, et si vous avez eu le malheur de le faire, vérifiez, dès maintenant, le contenu de votre fichier /sw/etc/apt/sources.list.
		</p>
		<p>
			Les utilisateurs qui ont fait un bootstrap ou installé Fink 0.5.3 ou Fink 0.6.0 sous Mac OS X 10.3 pourraient rencontrer un problème majeur : tous les utilisateurs pourraient être effacés de la base netinfo, rendant l'ouverture de session impossible. Nous pensons que ce problème ne survient que lors de l'utilisation de dselect.
		</p>
		<p>
			Si vous utilisez Mac OS X 10.3, procédez à l'installation de la toute dernière version de Fink pour éviter une telle déconvenue. Pour vous assurer que vous n'avez pas de problème de mise à jour rampant, vérifiez le contenu du fichier <code>/sw/etc/apt/sources.list</code>. Vous devrez le modifier s'il contient des lignes commençant par <code>deb</code> et pointant vers "release" ou "current" sans numéro de version spécifié. En d'autres termes, si votre fichier <code>sources.list</code> contient des lignes semblables aux lignes suivantes :
		</p>
<pre>
deb http://us.dl.sourceforge.net/fink/direct_download release main 
deb http://us.dl.sourceforge.net/fink/direct_download current main
</pre>
		<p>
			vous devrez les modifier comme suit :
		</p>
<pre>
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main 
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main
</pre>
		<p>
			Nous travaillons à la mise à jour du référentiel pour éviter la diffusion de code incorrect à la suite d'une mise à jour. Nous sommes en train de corriger le bogue de dselect mais, en attendant, vérifiez le contenu du fichier <code>sources.list</code>.
		</p>
		<p>
			D'autres utilisateurs ont eu des problèmes avec dselect ; celui-ci  prévient de l'absence d'un paquet "darwin". Si vous lancez dselect sous Mac OS X 10.3 et si vous <b>NE VOYEZ PAS</b> un tel avertissement, alors votre fichier <code>sources.list</code> est probablement corrompu et doit être réparé comme expliqué plus haut. 
		</p>
		<a name="01/11/2003%20Fink%200.6.1%20est%20disponible"><span class="news-date">01/11/2003: </span><span class="news-headline">Fink 0.6.1 est disponible</span></a><?php gray_line(); ?>
		<p>
			La dernière version de Fink, numérotée 0.6.1, est maintenant disponible sous forme de sources et de binaires. Cette version a été réalisée sous Mac OS X 10.2 et compilée avec gcc 3.3. Elle fonctionne correctement sous Mac OS X 10.3. La plupart des utilisateurs passant sous Mac OS X 10.3 devront utiliser les binaires de cette nouvelle distribution pour l'instant, tandis que l'équipe de Fink continue d'adapter les paquets Fink à Mac OS X 10.3.
		</p>
		<p>
			Pour accéder aux nouveaux binaires, utiliser apt-get, dselect, ou le mode binaire de FinkCommander. A moins de vouloir aider l'équipe de Fink à tester des paquets compilés spécialement pour Mac OS X 10.3, n'utilisez pas l'outil <code>fink</code> pour réaliser des installations pendant les prochaines semaines. 
		</p>
		<p>
			Pour mettre à jour une installation binaire, la méthode la plus simple est de lancer "sudo apt-get update". Vous trouverez de plus amples informations sur la mise à jour de Fink sous Mac OS X 10.3, ainsi que sur les problèmes qu'elle soulève sur la <a href="<?php print $root; ?>download/10.3-upgrade.php">page spéciale de mise à jour Mac OS X 10.3.</a>
		</p>
		<p>
			Avant d'utiliser la dernière version de l'outil en ligne de commande <code>fink</code> sous Mac OS X 10.2, vérifiez que vous avez bien installé le paquet August2003gccUpdater, disponible sur connect.apple.com après enregistrement gratuit. 
		</p>
		<a name="31/10/2003%20Joyeuses%20f%C3%AAtes%20d'Halloween%20et%20bienvenue%20aux%20nouveaux%20miroirs"><span class="news-date">31/10/2003: </span><span class="news-headline">Joyeuses fêtes d'Halloween et bienvenue aux nouveaux miroirs</span></a><?php gray_line(); ?>
		<p>
			Nous souhaitons à tous de joyeuses fêtes d'Halloween. 
		</p>
		<p>
			Et bienvenue dans la famille Fink aux nouveaux miroirs. Basé à Rijeka, en Croatie, un nouveau miroir intégral nous a rejoint. Il a été sponsorisé par le groupe utilisateur Apple <a href="http://mac.dir.hr/">Jabucnjak</a>. Il s'agit de notre premier miroir en Europe, et gageons qu'il ne sera pas le dernier. 
		</p>
		<p>
			Dave Schroeder de l'<a href="http://mirror.services.wisc.edu/">Université du Wisconsin</a> à Madison sponsorise un serveur maître dédié sur une ligne à 100Mbit. A. J. Wright et <a href="http://sunsite.utk.edu/">SunSITE@UTK</a> nous aident à mettre en place un autre serveur intégral aux États-Unis. 
		</p>
		<p>
			Ce qui élève le nombre total de miroirs intégraux à 4 et le nombre de miroirs rsync à 5. Nous sommes heureux d'avoir une communauté si fantastique avec nous, mais je sais que nous ne sommes pas au bout du compte. Je ne cesserai de vous harceler jusqu'à ce que Fink possède au moins un miroir dans chaque état des États-Unis. Épaulé par une communauté d'exception, je ne suis pas trop inquiet. Je pense pouvoir atteindre très bientôt cet objectif. 
		</p>
		<p>
			Toc, toc, toc ! Comme les enfants le jour d'Halloween, nous frappons à votre porte et vous réclamons ... des miroirs. À votre bon coeur, administrateurs de réseaux, remplissez notre corbeille. Vous trouverez des informations sur la création d'un miroir sur le <a href="http://finkmirrors.net">site officiel des miroirs</a>. 
		</p>
		<a name="25/10/2003%20Viens%20voir,%20un%20logo%20pour%20Fink"><span class="news-date">25/10/2003: </span><span class="news-headline">Viens voir, un logo pour Fink</span></a><?php gray_line(); ?>
		<p>
			Comme vous l'avez certainement remarqué, Fink possède un logo, choisi à la suite du <a href="<?php print $root; ?>logo.php">concours de logo</a> qui s'est tenu au début de cette année. Ce nouveau logo officiel est affiché depuis le 24 octobre. Ceux qui veulent connaître les raisons de son choix et le nom du vainqueur du concours peuvent se reporter à la rubrique <a href="pr/index.php">relation-presse</a>.
			</p>
		<p>
			L'explication est accompagnée d'une reproduction du logo à plus grande échelle, ce qui permet d'en apprécier les détails. Notre nouveau logo nous plaît et nous espérons qu'il vous plaira aussi. 
		</p>
		<p>
			IMPORTANT: Nous ne possédons pas d'accord de licence en bonne et due forme pour le nouveau logo, nous sommes donc dans l'incapacité d'accorder la permission de le distribuer. Pour l'instant, il ne peut figurer que sur les pages du site internet de Fink. Merci de votre compréhension. 
		</p>
		<a name="24/10/2003%20Mise%20%C3%A0%20jour%20gcc%203.3%20et/ou%20Mac%20OS%20X%2010.3"><span class="news-date">24/10/2003: </span><span class="news-headline">Mise à jour gcc 3.3 et/ou Mac OS X 10.3</span></a><?php gray_line(); ?>
		<p>
			Fink peut maintenant être mis à jour pour profiter du compilateur gcc 3.3, ou pour fonctionner sous Mac OS X 10.3, si cette dernière version est installée. Les paquets binaires correspondant à ces mises à jour ne sont, cependant, pas encore disponibles. Si vous faites un usage intensif des paquets binaires, il est peut-être préférable d'attendre quelques jours avant de procéder à la mise à jour. 
		</p>
		<p>
			La mise à jour des Developer Tools d'Apple d'août 2003 devra impérativement être appliquée AVANT de procéder à la mise à jour de Fink, si la dernière mise à jour des Developer Tools installée sur votre machine est datée de juin 2003. Sous Mac OS X 10.3, n'oubliez pas d'installer XCode à partir du CD XCode avant de procéder à la mise à jour de Fink. 
		</p>
		<p>
			Pour mettre à jour Fink, il vous suffit de lancer la commande "fink selfupdate". La dernière version du gestionnaire de paquets fink détecte automatiquement les versions de Mac OS X et de gcc installées et se comporte en conséquence. 
		</p>
		<p>
			Pour faire une installation complète de Fink sous Mac OS X 10.3, nous vous recommandons de <a href="http://fink.sourceforge.net/download/srcdist.php">faire un bootstrap à partir des sources</a>, en utilisant l'archive fink-full-0.6.0.tar.gz disponible sur <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">la page des téléchargements de Fink</a> sur sourceforge. XCode doit être installé pour ce faire. 
		</p>
		<p>
			Notez qu'après installation de la version 0.15.0 de Fink, ou d'une version ultérieure, il n'est plus nécessaire  d'installer le paquet system-xfree86. Fink peut déterminer automatiquement la version de system-xfree86 à utiliser, si vous n'avez encore aucun paquet X11 de fink installé. Si vous avez installé antérieurement un paquet system-xfree86, lancez la commande suivante : 
		</p>
<pre>
sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \ 
system-xfree86-43; fink selfupdate; fink index
</pre>
		<p>
			L'équipe de Fink travaille sur l'adaptation des paquets à Mac OS X 10.3, mais la plupart d'entre eux fonctionnent déjà sur le nouveau système.
		</p>
		<a name="2003-10-23%20Say%20Hello%20to%20Mirror%20Numero%20Uno"><span class="news-date">2003-10-23: </span><span class="news-headline">Say Hello to Mirror Numero Uno</span></a><?php gray_line(); ?>
	<p>You are too late. Rus Foster from <a href="http://www.jvds.com">JVDS</a>
	beat you all to it. He is the first one to provide us with resources 
	for a Fink rsync mirror.
	The mirror is located in Atlanta, GA and is updated every two hours, at 35 minutes past.
	</p>
	<p>For those of you who are still waiting, join in. The more mirrors we have
	the faster you can rsync your info files. As per usual, updated and current
	information on the mirror structure can be found on <a href="http://finkmirrors.net"> Finkmirrors.net </a>
	</p>
		<a name="2003-10-22%20Mirror,%20mirror%20on%20the%20wall..."><span class="news-date">2003-10-22: </span><span class="news-headline">Mirror, mirror on the wall...</span></a><?php gray_line(); ?>
	<p>..who will mirror Fink above all? There is a new player on the turf
	and it belongs to the Fink team. <a href="http://finkmirrors.net"> Finkmirrors.net</a> tells you everything you wanted to know about mirroring Fink and its related resources on your Server. As our mirror structure will hopefully grow in the future, this web-site will also hold information about each individual mirror.
	</p>
	<p>To ensure that our service remains as stable as possible and to distribute the load imposed onto our main rsync server, we are looking for rsync mirrors or full mirrors. Those of you who are willing to share resources will find all the necessary information on <a href="http://finkmirrors.net"> Finkmirrors.net</a>. 
</p>
<p>
UPDATE: Yes, I screwed up when I initially installed the DNS records. If you cannot connect please try again later. I am very sorry for this inconvenience. Thank you for your understanding.
</p>
<a name="2003-10-12%20New%20update%20method%20available"><span class="news-date">2003-10-12: </span><span class="news-headline">New update method available</span></a><?php gray_line(); ?>
<p>The latest version of the fink package manager offers a new update
method, <code>fink selfupdate-rsync</code>, as an alternative to the
CVS updates which have been so problematic in the past few months.
If you have difficulty updating to the new version, please follow
<a href="http://fink.sourceforge.net/download/rsync-upgrade.php">these 
special update instructions</a>.
</p>
<p>In addition, this version of the fink package manager is compatible
with last summer's Developer Tools updates.  After installing both the new
package manager and the Developer Tools update, 
fink will ask you to reset your gcc version whenever
that is necessary.</p>
	<a name="2003-09-02%20Logo%20contest%20ends"><span class="news-date">2003-09-02: </span><span class="news-headline">Logo contest ends</span></a><?php gray_line(); ?>
<p>The Logo contest held by Fink, announced <a href="http://fink.sourceforge.net/logo.php">here</a>,
ended yesterday. With over 80 different proposals from countries all over the world we 
consider the contest a big success.  
In the next couple of days all the submitted entries will be put on-line in a publicly accessible gallery and more details on the participants shall be published. For those who are 
curious and cannot wait may have a look at an incomplete <a href="http://nour.net/logo/incomplete.html">preview</a>.</p>
<p>Fink is proud to be part of such a supportive community and would like to thank those who submitted entries and <a href="http://www.macwelt.de">MacWelt</a> for their continued support.
</p>
	<a name="2003-08-18%20Source%20files%20from%20ftp.gnu.org"><span class="news-date">2003-08-18: </span><span class="news-headline">Source files from ftp.gnu.org</span></a><?php gray_line(); ?>
<p>As announced in <a href="http://www.cert.org/advisories/CA-2003-21.html">this CERT 
advisory</a>, it has recently been discovered that
the ftp servers for GNU software were compromised back in March, 
although it is not believed that any of the source code housed there
was affected.
</p><p>
Fink relies on MD5 checksums when downloading software, and we have had
no reports of incorrect checksums in Fink packages.  The Free Software
Foundation is in the process of verifying the integrity of all of the
source code distributed from that ftp site.  As of this writing, the source
code for the following Fink packages have not yet been verified:
<code>autoconf2.54</code>,
<code>emacs21</code>,
<code>gprolog</code>,
<code>groff</code>,
<code>guile16</code>,
<code>help2man</code>,
<code>jwhois</code>,
<code>libtool14</code>,
<code>libosip1</code>,
<code>sed</code>,
<code>slib</code>.
It may be difficult to install those packages at present.
</p>
                <a name="2003-06-26%20Developer%20Tools%20Update."><span class="news-date">2003-06-26: </span><span class="news-headline">Developer Tools Update.</span></a><?php gray_line(); ?>
<p><b>Quick Summary: DO NOT INSTALL THIS UPDATE.</b></p>
               <p>
Apple has released a patch to the December 2002 
Developer Tools which includes gcc 3.3,
their new compiler.
</p><p>
Fink does not yet support compiling with gcc 3.3.  In addition, it is important
not to "mix and match" between compilers:  all C++ code in fink packages
needs to be compiled
with the same compiler.
</p><p>
For this reason, the Fink team recommends that if you update your
Developer Tools with the new patch, you should be careful to run
<code>sudo gcc_select 3</code>
prior to any "fink build" or "fink install" commands.
</p>
<p><b>Update 30 June 2003:</b> A 
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=2680195&amp;forum_id=2056">problem
has now been detected</a> with
the new assembler program which the update installs, which may prevent
certain Fink packages from being compiled at all if you install this
update.  
</p>
<p><b>Generally, Fortran programs will break if you install the update;
the breakage does not stop by simply switching back to gcc 3.1.</b>
The Fink team is working on a workaround for this problem, but until it
is ready, if you need Fortran-related programs you should not install
the update.</p>

                <a name="2003-06-20%20Darwin%20packaging%20groups%20to%20coordinate%20efforts."><span class="news-date">2003-06-20: </span><span class="news-headline">Darwin packaging groups to coordinate efforts.</span></a><?php gray_line(); ?>
               <p>
The <a href="http://fink.sourceforge.net">Fink</a>, 
<a href="http://www.gentoo.org">Gentoo</a>, 
and 
<a href="http://opendarwin.org/projects/darwinports/">DarwinPorts</a> 
projects are pleased to announce the formation of  a cooperative development 
alliance forged to facilitate delivery of freely available software to 
Mac OS X.  Under this new alliance, the projects will share information and 
coordinate efforts for porting software to 
Apple's <a href="http://www.apple.com/macosx">Mac OS X</a> 
and <a href="http://www.apple.com/darwin">Darwin</a> operating 
systems.  Members of the alliance will share information using 
the <a href="http://www.metapkg.org">www.metapkg.org</a> Web 
site,  which  will provide a home for this cooperative effort. 
</p>
                <a name="2003-06-16%20Fink%20logo%20contest%20begins."><span class="news-date">2003-06-16: </span><span class="news-headline">Fink logo contest begins.</span></a><?php gray_line(); ?>
               <p>Fink and 
<a href="http://www.macwelt.de/">MacWelt</a> have managed to organize a logo contest.
For the next six weeks everyone is invited to submit their logo creations. 
Fink needs a new face and with your help we might just get one.  We are curious to see what you imagine Fink to be as a graphical representation.
The initial announcement by Macnews is in German, for those of you not capable of reading German a translated version can be found
 <a href="http://fink.sourceforge.net/logo.php">here</a>. 
                </p>
<p>
Fink and MacWelt hope that many of you will participate as we might just find some prices for the winners. Good luck and.... start drawing.
</p>
                <a name="2003-05-05%20KDE%203.1.1%20Binaries%20Available"><span class="news-date">2003-05-05: </span><span class="news-headline">KDE 3.1.1 Binaries Available</span></a><?php gray_line(); ?>
	       <p>KDE 3.1.1 binaries are now available.  Since they
have been released after 0.5.2 came out, you will need to update
your package descriptions by running <code>sudo apt-get update</code>
(or equivalent) before they will be available for installation.
For pointers to the changes and security fixes in this release,
see <a href="http://sourceforge.net/mailarchive/forum.php?thread_id=2068947&amp;forum_id=2022">the
announcement</a>.
</p>

		<a name="2003-04-16%20Virex%20problem%20resolved"><span class="news-date">2003-04-16: </span><span class="news-headline">Virex problem resolved</span></a><?php gray_line(); ?>
	       <p>McAfee has released Virex 7.2.1, which no longer
overwrites the main Fink directory <code>/sw</code>.  Fink users should
continue to avoid Virex 7.2.
</p><p>Early reports indicate that upgrading Virex from 7.2 to 7.2.1
still leaves some problems however.  If you upgrade Virex with Fink not
installed, and subsequently
wish to install Fink, you will need to delete the <code>/sw</code>
directory by hand before installing.  And if you upgrade Virex with
Fink already installed, you should immediately run
<b>
fink reinstall openssl-shlibs dlcompat-shlibs curl-ssl-shlibs
</b>
to restore files which the Virex upgrade may have deleted.
</p>

		<a name="2003-04-14%20Fink%200.5.2%20released"><span class="news-date">2003-04-14: </span><span class="news-headline">Fink 0.5.2 released</span></a><?php gray_line(); ?>
	       <p>Fink is proud to announce that the Fink binary distribution 0.5.2 is available from the <a href="http://fink.sourceforge.net/download.php">download</a> page.
		With over 190 new binary packages, KDE, KOffice and KDevelop binaries amongst other various improvements this is a recommended download for any new and all existing Fink users.
		The full announcement can be read on the <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-announce">fink-announce</a> mailing list.
		</p>
<p>(If you are having trouble upgrading a source installation, consult
<a href="http://fink.sourceforge.net/download/fix-upgrade.php">these
special instructions</a>.)</p>

		<a name="2003-04-09%20Interview%20on%20OSNews.com"><span class="news-date">2003-04-09: </span><span class="news-headline">Interview on OSNews.com</span></a><?php gray_line(); ?>
	<p><a href="http://osnews.com/">OSNews.com</a> today is featuring a
	<a href="http://osnews.com/story.php?news_id=3236">mini-interview</a> with
	one of our project leaders, Max Horn. It contains some rather unusual questions,
	so even if you know Fink fairly well, you might find it informative.
</p><a name="2003-03-29%20KDE%203.1.1%20Final%20In%20Unstable"><span class="news-date">2003-03-29: </span><span class="news-headline">KDE 3.1.1 Final In Unstable</span></a><?php gray_line(); ?>
	<p>KDE 3.1.1 is now in Fink unstable.  The full announcement can be
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=1898907&amp;forum_id=2022">read here</a>.
	Improvements over 3.1 final include many upstream bugfixes,
	build improvements, koffice bugfixes, kmail crash fixes,
	and other miscellaneous updates.  Binary packages will not
	be available in time for the next binary distribution, but
	will be released as an update shortly thereafter.
</p><a name="2003-03-18%20KDE%203.1%20Final%20In%20Stable"><span class="news-date">2003-03-18: </span><span class="news-headline">KDE 3.1 Final In Stable</span></a><?php gray_line(); ?>
	<p>KDE 3.1 is now in Fink stable.  The full announcement can be
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=1833081&amp;forum_id=2022">read here</a>.
	Improvements over 3.1 beta1 include an updated audio driver, 
	faster startup times, cleaned up fink package info, support
	for Apple X11's window manager, and many bugfixes.  Binary
	packages will be available in the next binary distribution
	release.
</p><a name="2003-03-17%20Apple%20X11%20Beta%203%20Released"><span class="news-date">2003-03-17: </span><span class="news-headline">Apple X11 Beta 3 Released</span></a><?php gray_line(); ?>
	<p><a href="http://www.apple.com/macosx/x11/download/">A new
version of Apple's X11 for Mac OS X is available</a>.  It fixes a number
of bugs including a few that can cause problems with building Fink packages.
It is recommended that all Fink users who are using Apple X11 upgrade.
A new version of the system-xfree86 package has been released to unstable
that takes the new Apple X11 into account.  It should be appearing in stable
shortly.
</p><a name="2003-02-14%20New%20version%20of%20FinkCommander"><span class="news-date">2003-02-14: </span><span class="news-headline">New version of FinkCommander</span></a><?php gray_line(); ?>
        <p><a href="http://finkcommander.sourceforge.net/">FinkCommander</a>,
 a separate project which provides a GUI for Fink,
has released version 0.5.0, their first Jaguar-only version.  The new
version includes a package browser which allows you to view the files 
that Fink has installed for a particular package, as well as <a href="http://finkcommander.sourceforge.net/pages/VERSION_HISTORY.html">many 
other improvements.</a>
</p><a name="2003-02-07%20DO%20NOT%20INSTALL%20VIREX%207.2"><span class="news-date">2003-02-07: </span><span class="news-headline">DO NOT INSTALL VIREX 7.2</span></a><?php gray_line(); ?>
        <p>
        The Virex 7.2 package, currently being distributed free to all .Mac 
members, has a serious conflict with Fink.  <b>Fink users should not install 
Virex 7.2 under any circumstances.</b>
  Installing it after Fink is installed
will damage your Fink installation; installing it prior to Fink will make
it impossible to install Fink without damaging Virex.
</p><p>
This bug has been <a href="http://forums.mcafeehelp.com/viewtopic.php?t=6318&amp;sid=33d08f3c34f7e09dc546aa1ddf1c299c">reported 
to Virex's manufacturer.</a>  We will keep the
Fink community informed about the situation as it develops.
</p><a name="2003-01-26%20Apple%20X11%20Library%20Warning"><span class="news-date">2003-01-26: </span><span class="news-headline">Apple X11 Library Warning</span></a><?php gray_line(); ?>
	<p>
	While Apple's X11 works just fine with existing binaries, it
has a bug in the install name of the libraries that can cause some
software to build incorrectly, and will break forward-compatibility
with future X11 releases.
</p>
<p>
	Ben Hines has created a script (available <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/*checkout*/fink/fix-fink/install_name_fix.pl">here</a>) that you can use
that will fix the install_name entries in Apple's X11 libraries,
but it will not repair software you have already built against the
broken libraries.
</p>
<p><b>Update 11 February 2003:</b> This script is not needed with 
version 0.2 of Apple's X11.app which was released yesterday.
</p>
<a name="2003-01-21%20Gnome,%20libpng,%20and%20the%20unstable%20tree"><span class="news-date">2003-01-21: </span><span class="news-headline">Gnome, libpng, and the unstable tree</span></a><?php gray_line(); ?>
	<p>
        A problem was uncovered today concerning the versions of imlib,
 libpng, and gnome in Fink's unstable tree.  The Fink team is hard at
 work addressing this problem.  As a workaround, users can downgrade
their imlib package to the stable version, "<code>fink install
 imlib-1.9.10-9</code>", until the problem is fixed.
</p><p>
   Many Fink users may be using Fink's unstable tree without being
fully aware of what this entails.  For a few months in the fall,
enabling the unstable tree was the only way to gain access to
 10.2-compatible versions of Fink packages.  
<b>That is no longer the case.</b>
Fink users who do not wish to help the Fink team with testing should
disable their unstable tree.  To do this, edit the file
<code>/sw/etc/fink.conf</code> and remove the items
 <code>unstable/main</code> and <code>unstable/crypto</code> from the
 <code>Trees</code> line.
	</p>
<p>The Fink team appreciates those users who are willing to stick with
the unstable tree, even when there are problems like today's, and provide
the team with prompt feedback.  This is a community effort and we
appreciate your participation.
</p>
	<a name="2003-01-17%20Anonymous%20CVS%20issues%20resolved"><span class="news-date">2003-01-17: </span><span class="news-headline">Anonymous CVS issues resolved</span></a><?php gray_line(); ?>
	<p>
	UPDATE: We are pleased to announce that SourceForge have resolved the issues with anonymous CVS access, and the selfupdate-cvs command should work again. Further details on the downtime can be found on the SourceForge.net <a href="http://sourceforge.net/docman/display_doc.php?docid=2352&amp;group_id=1#cvs">site status</a> page.
	</p>
	<a name="2003-01-07%20Fink%20Interaction%20with%20Apple's%20X11%20Public%20Beta"><span class="news-date">2003-01-07: </span><span class="news-headline">Fink Interaction with Apple's X11 Public Beta</span></a><?php gray_line(); ?>
	<p>
	Fink works just fine with the <a href="http://www.apple.com/macosx/x11/">public beta X11 release</a>
	with some caveats.  Please read <a href="<?php print $root; ?>doc/x11/inst-xfree86.php#apple-binary">the newly added Apple X11</a> section of the Fink X11 Documentation for details.</p>
	<a name="2003-01-07%20RSS%20Feeds%20available"><span class="news-date">2003-01-07: </span><span class="news-headline">RSS Feeds available</span></a><?php gray_line(); ?>
	<p>
	Thanks to Benjamin Reed, it is now possible to receive RSS 1.0 Feeds that contain a lot of valuable information.

<a href="<?php print $root; ?>news/fink-stable.rdf">fink-stable.rdf</a> will tell you about the changes and additions in the stable tree, reflecting packages which have been added or modified.
</p>
<p><a href="<?php print $root; ?>news/fink-unstable.rdf">fink-unstable.rdf</a> will tell you about changes or additions to the unstable tree and is most likely the most active RSS feed.
The above Feeds are automatically updated every 60 minutes to make sure that they keep you all on top of the latest development.
</p>
<p><a href="<?php print $root; ?>news/news.rdf">news.rdf</a> This feed reflects the contents of the Fink News Page. The Feed is updated as soon as a new item is added on the Website.
</p>
<a name="2002-12-22%20New%20Upgrade%20Matrix"><span class="news-date">2002-12-22: </span><span class="news-headline">New Upgrade Matrix</span></a><?php gray_line(); ?>
  <p>A new <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> is
  now available, for use in upgrading earlier versions of Fink to the
  current version, under either OS X 10.1 or OS X 10.2.  Users upgrading
  under 10.1 will be brought to Fink version 0.4.1a, while users
  upgrading under 10.2 will be brought to Fink version 0.5.0a.
  </p>
  <a name="2002-12-11%20New%20Upgrade%20Matrix%20coming"><span class="news-date">2002-12-11: </span><span class="news-headline">New Upgrade Matrix coming</span></a><?php gray_line(); ?>
  <p>The Fink team is aware of the shortcomings of the current
  <b>Upgrade Matrix</b> page, which is inadequate for upgrading
to Fink 0.5.0a.  Please be patient as we construct
  a new version of that page, whose existence will be announced
  here.  In the meantime, some of you may wish to use the <a href="news/jaguar.php">test version of the Jaguar updater</a> which was
made available on 2002-09-08.
  </p>
  <a name="2002-12-09%20Fink%200.5.0a%20Released"><span class="news-date">2002-12-09: </span><span class="news-headline">Fink 0.5.0a Released</span></a><?php gray_line(); ?>
  <p>
    Fink 0.5.0a for Mac OS X 10.2 is now complete. (Note: 0.5.0a is a final
    release, and replaces 0.5.0 which was never officially released.) This
    release includes over 700 
    binary packages for OS X 10.2 as well as over 1800 source packages of
    all kinds. 
  </p>
  <p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
  </p>
  <p>
  This release is for Mac OS X 10.2 only. 10.1 users should use Fink 0.4.1.
  </p>
  <a name="2002-11-11%20Update%20XFree86%20for%20use%20with%20OS%20X%2010.2.2"><span class="news-date">2002-11-11: </span><span class="news-headline">Update XFree86 for use with OS X 10.2.2</span></a><?php gray_line(); ?>
  <p>
Users should update their XFree86 installations to version 4.2.1.1
for use with OS X 10.2.2.  If you are using system-xfree86, you
can get the new version from the <a href="https://sourceforge.net/project/shownotes.php?release_id=118483">XonX 
project</a>.  If you are using Fink's
xfree86 packages, you should update to xfree86-base-4.2.1.1-1 and
xfree86-rootless-4.2.1.1-1.  These packages are recent additions to
the 10.2/unstable tree; to gain access to them, you may need to run 
"fink selfupdate-cvs" and/or enable the unstable tree
  </p>
  <a name="2002-10-30%20Don't%20reuse%20binary%20installer"><span class="news-date">2002-10-30: </span><span class="news-headline">Don't reuse binary installer</span></a><?php gray_line(); ?>
  <p>
  Users are cautioned to use the binary installer for Fink 0.4.1 <b>only
once</b> on a given machine.  Due to an apparent bug in Apple's
Installer.app program, attempting a second installation on the same
machine can result in permissions being altered in the machine's root
directory, in some cases leaving the machine in a non-bootable state.
</p><p> If Installer.app presents you with an "Upgrade" button rather
than an "Install" button when installing Fink 0.4.1, <b>do not proceed
any further!</b> </p>
<p>A new version of the binary installer for Fink 0.4.1 became available
on November 5.  The new version avoids
the problem of the machine not booting, but even with the new version,
users are advised to only "Install",
not "Upgrade."  (You can recognize the new version by its filesize of
12582912 bytes, while the old version had a filesize of 10541112 bytes.)
</p><a name="2002-09-28%20Fink%200.4.1%20released"><span class="news-date">2002-09-28: </span><span class="news-headline">Fink 0.4.1 released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
    </p>
    <p>
    This is the <b>last release for Mac OS X 10.1</b>. Future versions of Fink will <b>not</b> officially support Mac OS X 10.1 anymore, we are gearing all our efforts towards 10.2.
    </p>
    <p>
    At the same time, this release is not meant for Mac OS X 10.2. Fink 0.5.0. which is targeted for October, will be geared towards 10.2. In the meantime refer to the news item below on how to upgrade Fink for 10.2.
    </p>
  <a name="2002-09-27%20Possible%20conflicts%20with%20anti-virus%20software"><span class="news-date">2002-09-27: </span><span class="news-headline">Possible conflicts with anti-virus software</span></a><?php gray_line(); ?>
<p> A number of recent reports on the 
<a href="http://www.mail-archive.com/fink-users@lists.sourceforge.net/">fink-users
mailing list</a> have indicated problems (including kernel panics and
infinite hangs during patching) when using Fink to compile packages while
anti-virus software is installed.  You may need to switch off any anti-virus
software before using Fink.
</p><a name="2002-09-08%20Test%20version%20of%20Jaguar%20updater%20available"><span class="news-date">2002-09-08: </span><span class="news-headline">Test version of Jaguar updater available</span></a><?php gray_line(); ?>
		<p>
			A test version of the 10.2 updater for Fink is now available. The update process is somewhat complicated at the moment, but is explained in <a href="<?php print $root; ?>news/jaguar.php">step-by-step instructions for updating</a>. We also have separate <a href="<?php print $root; ?>news/jag-bootstrap.php">instructions to install Fink from scratch on 10.2</a>. 
		</p>
		<p>
			At the moment, approximately 800 out of 1150 Fink packages have been made ready for 10.2. However, virtually all of these packages are still being tested and have not yet been moved to the "stable" tree in the 10.2 section; moreover, binaries for 10.2 packages are not yet available. 
		</p>
	<a name="2002-08-20%20Mac%20OS%20X%2010.2%20/%20Jaguar"><span class="news-date">2002-08-20: </span><span class="news-headline">Mac OS X 10.2 / Jaguar</span></a><?php gray_line(); ?>
    <p>
      During the last few weeks, we got a lot of emails asking whether Fink will work Mac OS X 10.2.
    </p>
    <p>
      The answer is: Yes, we will support 10.2. However, due to some
      major changes in this new OS version, we had to make a lot of adjustments both
      to the Fink tool itself and to many packages. The current binary distribution,
      0.4.0a, will only work partially on 10.2. We are working on an upgrade guide,
      as well as a new Fink release, to support 10.2.
    </p>
	<p>
	 If you upgrade your system to 10.2 before the official Fink update for 10.2 is ready,
	 many Fink packages built on 10.1 are going to work fine, but others need to be rebuilt.
	 Some packages need special changes to build on 10.2. Adding "unstable/main" to your
	 list of trees in /sw/etc/fink.conf (see also the <a href="<?php print $root; ?>faq/usage-fink.php#unstable">FAQ</a>)
	 will give you access to the latest versions of packages, many of which include important
	 fixes for 10.2.
	</p>
    <p>
     As of now, please do not email us asking about 10.2 support. If you can't wait,
     consult the <a href="<?php print $root; ?>lists/index.php">mailing list archives</a> instead.
    </p>
  <a name="2002-08-06%20Fink%20package%20manager%200.10.0%20released"><span class="news-date">2002-08-06: </span><span class="news-headline">Fink package manager 0.10.0 released</span></a><?php gray_line(); ?>
    <p>
      Yesterday version 0.10.0 of the Fink package manager was released to the unstable tree, along with version 1.6 of the base-files package. All Fink users which are using the unstable tree are recommended to update to this version. The easiest way to do so usually is to run 'fink selfupdate-cvs' which will automatically take care of updating these essential packages.
    </p>
    <p>
      Please report any problems you encounter with this version via our bug tracker.
    </p>
    <p>
      An overview of what changed since version 0.9.12 can be found <a href="http://sourceforge.net/project/shownotes.php?release_id=103599">here.</a>
    </p>
  <a name="2002-07-17%20Binary%20distribution%20moves"><span class="news-date">2002-07-17: </span><span class="news-headline">Binary distribution moves</span></a><?php gray_line(); ?>
    <p>
      The Fink binary distribution has moved to a new location. All Fink users wishing to use the binary distribution will have to make sure they are using the new binary distribution (many of you already are using it, maybe without even noticing). If you want to know how to switch and why we do this, <a href="<?php print $root; ?>news/bindist_move.php">read more here.</a>.
    </p>
  <a name="2002-05-29%20KDE%20support"><span class="news-date">2002-05-29: </span><span class="news-headline">KDE support</span></a><?php gray_line(); ?>
    <p>
      Fink <a href="<?php print $root; ?>news/kde.php">announces support</a> for <a href="http://www.kde.org">KDE</a>. Packages are available in the unstable distribution, as well as pre-built binaries. For more information on installing and running it, see the full <a href="<?php print $root; ?>news/kde.php">KDE Support In Fink</a> announcement. 
    </p>
  <a name="2002-05-03%20Bug%20in%20passwd%20package"><span class="news-date">2002-05-03: </span><span class="news-headline">Bug in passwd package</span></a><?php gray_line(); ?>
    <p>
      All Fink users are urged to update their <b> passwd </b> package to version 20020329 or newer. Older versions of the <b> passwd </b> package are affected by a bug which could lead to the loss of all data on your hard disk if you remove system users created by Fink manually from the system via System Preferences. (Removing them via the NetInfo tool is safe.) You can check the version of your passwd package by entering <b> dpkg -s passwd</b>. If your version is outdated, you can update to the current one in two ways: 
    </p>
    <ul>
      <li>
        Via the binary distribution. First make sure you have the latest list of packages available: <b> sudo apt-get update</b>. Then you can perform the actual update: <b> sudo apt-get install passwd</b>. 
      </li>
      <li>
        Via the source distribution. First make sure you have the latest set of package descriptions: <b> fink selfupdate-cvs</b>. Then, update the passwd package: <b> fink update passwd</b> 
      </li>
    </ul>
    <p>
      See <a href="<?php print $root; ?>faq/usage-general.php#passwd">Fink's FAQ, question 6.3,</a> for more information about the passwd package. 
    </p>
  <a name="2002-04-18%20Fink%200.4.0%20released"><span class="news-date">2002-04-18: </span><span class="news-headline">Fink 0.4.0 released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, as well as many of the binary packages. As usual, the rest of the binaries will be made available during the next few days. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
    </p>
  <a name="2002-01-16%20Fink%200.3.2a%20is%20released"><span class="news-date">2002-01-16: </span><span class="news-headline">Fink 0.3.2a is released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2002-01-09%20Fink%200.3.2%20is%20released"><span class="news-date">2002-01-09: </span><span class="news-headline">Fink 0.3.2 is released</span></a><?php gray_line(); ?>
    <p>
      The source release is available now, the binary installer will follow soon. The bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2002-01-08%20Binary%20distribution%20lost"><span class="news-date">2002-01-08: </span><span class="news-headline">Binary distribution lost</span></a><?php gray_line(); ?>
    <p>
      Due to a faulty script, the whole fink website, including our binary distro, has been wiped! This means you can't use the binary distro right now. I am working as quick as I can on uploading the new Fink 0.3.2 binary distro. In addition, the package database is not working for now. Please bear with us. 
    </p>
  <a name="16/12/2001%20Non,%20nous%20ne%20sommes%20pas%20morts%20!"><span class="news-date">16/12/2001: </span><span class="news-headline">Non, nous ne sommes pas morts !</span></a><?php gray_line(); ?>
    <p>
     Malgré le fait qu'aucune nouvelle n'a été publiée le mois dernier, l'équipe du projet Fink a été fort occupée ces derniers temps. Malheureusement, notre chef, Christoph, nous a quittés le mois dernier. Le développement n'en continue pas moins.
    </p>
    <p>
      La version 0.9.5 du gestionnaire de paquet fink a récemment été publiée. De nombreux paquets ont été mis à jour et quantité d'autres ont été ajoutés. Vous les trouverez sur <a href="<?php print $root; ?>doc/cvsaccess/index.php">CVS</a>. 
    </p>
  <a name="2001-11-04%20Fink%200.3.1%20is%20released"><span class="news-date">2001-11-04: </span><span class="news-headline">Fink 0.3.1 is released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the recently updated <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2001-11-02%20Running%20X11%20document%20updated"><span class="news-date">2001-11-02: </span><span class="news-headline">Running X11 document updated</span></a><?php gray_line(); ?>
    <p>
      The <a href="<?php print $root; ?>doc/x11/index.php">Running X11</a> document has had a significant update. The troubleshooting section now has a comprehensive list of XDarwin error messages with explanations. 
    </p>
  <a name="2001-10-31"><span class="news-date">2001-10-31</span></a><?php gray_line(); ?>
    <p>
      <a href="http://www.macosxhints.com/">MacOSXHints</a> has
      posted an <a href="http://homepage.mac.com/rgriff/xdarwin.html">
      installation guide</a> for XFree86, Fink, Window Maker and The GIMP.
    </p>
  <a name="2001-10-23%20forked.net"><span class="news-date">2001-10-23: </span><span class="news-headline">forked.net</span></a><?php gray_line(); ?>
    <p>
      In addition to ripping off Fink packages and breaking the GPL, the ports
      collection at <a href="http://macosx.forked.net/">forked.net
      </a> has just gone commercial. More details soon. 
    </p>
  <a name="2001-10-03%20Binary%20distribution%20complete"><span class="news-date">2001-10-03: </span><span class="news-headline">Binary distribution complete</span></a><?php gray_line(); ?>
    <p>The binary distribution update is now complete.
    The <a href="<?php print $root; ?>news/puma.php">10.1 compatibility report</a> has been
    updated to reflect the fixes in Fink 0.3.0.
    </p>
  <a name="2001-09-30%20Fink%200.3.0%20is%20released"><span class="news-date">2001-09-30: </span><span class="news-headline">Fink 0.3.0 is released</span></a><?php gray_line(); ?>
    <p>The source release, the binary installer and a binary upgrade kit for
    broken-by-10.1 installations are available in the new <a href="download/index.php">download section</a>.
    The bulk of the binary distribution will be updated gradually over the
    next few days, as usual.
    </p>
  <a name="2001-09-26%20Mac%20OS%20X%2010.1%20released"><span class="news-date">2001-09-26: </span><span class="news-headline">Mac OS X 10.1 released</span></a><?php gray_line(); ?>
    <p>Mac OS X 10.1 has been officially released yesterday. Before you use Fink
    on 10.1, check out the <a href="<?php print $root; ?>news/puma.php">compatibility report</a>.
    <b>Update:</b> The apt-get issue has been solved, expect a new release
    this weekend.
    </p>
  <a name="2001-09-07%20Binary%20distribution%20fully%20updated"><span class="news-date">2001-09-07: </span><span class="news-headline">Binary distribution fully updated</span></a><?php gray_line(); ?>
    <p>The binary distribution is now fully updated to
    Fink 0.2.6. Enjoy.
    </p>
  <a name="2001-09-04%20Fink%200.2.6%20is%20released"><span class="news-date">2001-09-04: </span><span class="news-headline">Fink 0.2.6 is released</span></a><?php gray_line(); ?>
    <p>Fink 0.2.6 is released, fixing several bootstrap problems. The source
    release is available from the <a href="<?php print $root; ?>download.php">download page</a>
    or via the 'fink selfupdate' command. The binary release will follow soon.
    </p>
 <a name="2001-09-02%20Fink%20IRC%20Channel"><span class="news-date">2001-09-02: </span><span class="news-headline">Fink IRC Channel</span></a><?php gray_line(); ?>
    <p>Chat with the developers and other users! We now have a #fink channel
    on the <a href="http://openprojects.net/">openprojects.net</a>
    IRC network.
    </p>
 <a name="2001-08-25%20Fink%200.2.5%20was%20released"><span class="news-date">2001-08-25: </span><span class="news-headline">Fink 0.2.5 was released</span></a><?php gray_line(); ?>
    <p>The source release is
    available from the <a href="<?php print $root; ?>download.php">download page</a>, the
    binary release will follow soon.
    </p>
  <a name="2001-08-23%20OpenOSX.com"><span class="news-date">2001-08-23: </span><span class="news-headline">OpenOSX.com</span></a><?php gray_line(); ?>
    <p>OpenOSX.com refuses to give fair credit after using Fink to create GIMP
    CDs. Read Christoph's <a href="pr/openosx.php">public statement</a>
    on the issue.
    </p>
 <a name="2001-08-22%20New%20help%20page"><span class="news-date">2001-08-22: </span><span class="news-headline">New help page</span></a><?php gray_line(); ?>
    <p>The new <a href="help/index.php">help page</a> lists various ways
    to get help using Fink. It also lists some ideas how you can give back to
    the project.
    </p>
  <a name="2001-08-13%20Porting%20tips%20and%20X11%20document%20updated"><span class="news-date">2001-08-13: </span><span class="news-headline">Porting tips and X11 document updated</span></a><?php gray_line(); ?>
    <p>The <a href="<?php print $root; ?>doc/porting/index.php">porting tips</a> document has
    a new chapter on shared libraries and modules. The <a href="doc/x11/index.php">X11</a> document was also updated recently.
    </p>
  <a name="01/08/2001%20Version%200.2.4a%20is%20released"><span class="news-date">01/08/2001: </span><span class="news-headline">Version 0.2.4a is released</span></a><?php gray_line(); ?>
    <p>There was a bootstrapping problem in Fink 0.2.4. It is fixed in Fink
    0.2.4a. You only need this if you're doing a first time install, updates
    are not affected.
    </p>
  <a name="01/08/2001%20La%20version%200.2.4%20a%20%C3%A9t%C3%A9%20publi%C3%A9e"><span class="news-date">01/08/2001: </span><span class="news-headline">La version 0.2.4 a été publiée</span></a><?php gray_line(); ?>
    <p>La version 0.2.4 est disponible. Vous la trouverez sur la <a href="<?php print $root; ?>download.php">page de téléchargement</a>. Quelques paquets interessants : The GIMP 1.2.2, playback et enregistrement via esound (merci à Shawn Hsiao et Masanori Sekino pour la rustine CoreAudio), xmms 1.2.5.
    </p>
  <a name="19/07/2001%20Nouveau%20document%20:%20X11%20sur%20Darwin%20et%20Mac%20OS%20X"><span class="news-date">19/07/2001: </span><span class="news-headline">Nouveau document : X11 sur Darwin et Mac OS X</span></a><?php gray_line(); ?>
    <p>Un document détaillé <a href="<?php print $root; ?>doc/x11/index.php">X11 sur Darwin et Mac OS X</a> est disponible maintenant. Il a été écrit dans le but d'être utile à tout le monde, non pas seulement aux utilisateurs de Fink.</p>
  <a name="13/07/2001%20La%20base%20de%20donn%C3%A9es%20des%20paquets%20est%20maintenant%20en%20ligne"><span class="news-date">13/07/2001: </span><span class="news-headline">La base de données des paquets est maintenant en ligne</span></a><?php gray_line(); ?>
    <p>Un prototype de la <a href="pdb/index.php">base de données des paquets</a> est maintenant en ligne.</p>
  <a name="09/07/2001%20La%20version%200.2.3%20a%20%C3%A9t%C3%A9%20publi%C3%A9e"><span class="news-date">09/07/2001: </span><span class="news-headline">La version 0.2.3 a été publiée</span></a><?php gray_line(); ?>
    <p>Vous la trouverez sur la <a href="<?php print $root; ?>download.php">page de téléchargement</a>. Cette version corrige les problèmes de téléchargement dpkg que nombre d'entre vous ont rencontrés.</p>
  <a name="03/07/2001%20Mise%20%C3%A0%20jour%20du%20manuel%20d'empaquetage"><span class="news-date">03/07/2001: </span><span class="news-headline">Mise à jour du manuel d'empaquetage</span></a><?php gray_line(); ?>
    <p>Le <a href="<?php print $root; ?>doc/packaging/index.php">Manuel d'empaquetage</a> a été mis à jour pour tenir compte de tous les champs ajoutés récemment.</p>
  <a name="30/06/2001%20Restructuration%20du%20site%20web%20site"><span class="news-date">30/06/2001: </span><span class="news-headline">Restructuration du site web site</span></a><?php gray_line(); ?>
    <p>Une restructuration majeure du site web vient de commencer. Les documents non spécifiques à Fink ont été supprimés, car je n'ai pas le temps de les maintenir. L'ensemble de la documentation sera rassemblée dans une nouvelle <a href="<?php print $root; ?>doc/index.php">section Documentation</a>.</p>
  <a name="24/06/2001%20La%20version%200.2.2%20a%20%C3%A9t%C3%A9%20publi%C3%A9e"><span class="news-date">24/06/2001: </span><span class="news-headline">La version 0.2.2 a été publiée</span></a><?php gray_line(); ?>
    <p>La version 0.2.2 a été publiée. Vous la trouverez sur la <a href="<?php print $root; ?>download.php">page de téléchargement</a>. Veuillez lire les notes à propos de X11 dans le fichier INSTALL.</p>
  <a name="19/05/2001%20Mise%20%C3%A0%20jour%20des%20instructions%20CVS"><span class="news-date">19/05/2001: </span><span class="news-headline">Mise à jour des instructions CVS</span></a><?php gray_line(); ?>
    <p>Les <a href="<?php print $root; ?>fink/cvs.php">instructions CVS</a> ont été mises à jour pour la version 0.2.x de Fink.</p>
  <a name="26/04/2001%20Les%20QFP%20sont%20en%20ligne"><span class="news-date">26/04/2001: </span><span class="news-headline">Les QFP sont en ligne</span></a><?php gray_line(); ?>
    <p>Le site a maintenant une <a href="<?php print $root; ?>faq/index.php">section QFP</a>. Le contenu est encore un peu maigre, mais elle est faite pour durer.</p>
  <a name="20/04/2001%20La%20version%200.2.0%20est%20sortie"><span class="news-date">20/04/2001: </span><span class="news-headline">La version 0.2.0 est sortie</span></a><?php gray_line(); ?>
    <p>Elle utilise maintenant dpkg pour gérer les paquets binaires. Vous la trouverez sur la page de téléchargement. Néanmoins, vous devez savoir que cette version n'est pas encore aussi stable que la série des versions 0.1.x.</p>
  <a name="15/04/2001%20La%20version%200.1.8a%20a%20%C3%A9t%C3%A9%20publi%C3%A9e"><span class="news-date">15/04/2001: </span><span class="news-headline">La version 0.1.8a a été publiée</span></a><?php gray_line(); ?>
    <p>La version 0.1.8a, qui vient d'être publiée, corrige des problèmes d'installation. Vous n'en avez besoin que si vous aviez téléchargé la version 0.1.8 et que vous aviez rencontré des problèmes d'installation ("stow non trouvé"). Vous la trouverez sur <a href="<?php print $root; ?>download.php">la page de téléchargement</a>.</p>
  <a name="14/04/2001%20La%20version%200.1.8%20est%20sortie"><span class="news-date">14/04/2001: </span><span class="news-headline">La version 0.1.8 est sortie</span></a><?php gray_line(); ?>
    <p>Vous la trouverez sur la <a href="<?php print $root; ?>download.php">page de téléchargement</a>.</p>
  <a name="30/03/2001%20Mise%20%C3%A0%20jour%20des%20notes%20de%20portage"><span class="news-date">30/03/2001: </span><span class="news-headline">Mise à jour des notes de portage</span></a><?php gray_line(); ?>
    <p>Les <a href="<?php print $root; ?>darwin/porting.php">notes de portage</a> ont été enrichies d'informations concernant la version finale de Mac OS X.</p>
  <a name="30/03/2001%20La%20version%200.1.7%20est%20l%C3%A0%20!"><span class="news-date">30/03/2001: </span><span class="news-headline">La version 0.1.7 est là !</span></a><?php gray_line(); ?>
    <p>Vous la trouverez sur la <a href="<?php print $root; ?>download.php">page de téléchargement</a>. </p>
  <a name="24/03/2001%20Mac%20OS%20X%20est%20enfin%20l%C3%A0%20!"><span class="news-date">24/03/2001: </span><span class="news-headline">Mac OS X est enfin là !</span></a><?php gray_line(); ?>
    <p>Attendez-vous à l'adaptation des paquets de Fink à cette version finale dans les deux prochaines semaines.</p>
  <a name="15/03/2001%20Mise%20%C3%A0%20jour%20de%20la%20page%20de%20libtool"><span class="news-date">15/03/2001: </span><span class="news-headline">Mise à jour de la page de libtool</span></a><?php gray_line(); ?>
    <p>La <a href="<?php print $root; ?>darwin/libtool.php">page de libtool</a> a été mise à jour. Elle contient désormais une rustine modifiée qui utilise le numérotage de version des librairies partagées.</p>
  <a name="08/03/2001%20Mise%20%C3%A0%20disposition%20de%20la%20version%200.1.6"><span class="news-date">08/03/2001: </span><span class="news-headline">Mise à disposition de la version 0.1.6</span></a><?php gray_line(); ?>
    <p>Vous la trouverez sur la <a href="<?php print $root; ?>download.php">page de téléchargement</a>. </p>
  

<? include_once "footer.inc"; ?>
