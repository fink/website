<a name="20/09/2004 Fink 0.7.1 est disponible"><span class="news-date">20/09/2004 : </span><span class="news-headline">Fink 0.7.1 est disponible</span></a><?php gray_line(); ?>
<p>La dernière version de Fink, 0.7.1 (pour 10.3) est maintenant disponible sous forme de sources ou de binaires. Cette tourne sur les versions Panther (10.3) de Mac OS X. La version 0.6.3 reste disponible pour les utilisateurs des versions Jaguar (10.2) de Mac OS X.</p>
<p>Elle intégre diverses corrections du gestionnaire de paquets. De plus, de nombreux paquets, auparavant indisponibles sous forme binaire, ont été ajoutés, ce qui porte le total des binaires disponibles à 1650. Ils comprennent, en autres, les binaires de KDE 3.1.4 et ceux de GNOME 2.4.</p>
<p>Pour installer Fink pour la première fois, veuillez suivre les instructions données <a href="<?php print $root; ?>download/index.php?phpLang=fr">ici</a>. Pour mettre à jour Fink, servez-vous de la version installée sur votre système. Vous trouverez la liste des différences entre les versions 0.7.0 et 0.7.1 sur cette <a href="<?php print $root; ?>http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable%26cmp=0%26tree2=0.7.0-stable%26splitoffs=on%26sort=name">page</a>.</p>
<p>Si vous vous posez des questions ou rencontrez des difficultés, n'hésitez pas à vous servir des listes de diffusion de Fink. Vous en trouverez le détail <a href="<?php print $root; ?>lists/index.php?phpLang=fr">ici</a>.</p>
<p>Vérifiez que vous avez choisi le <em>bon installeur</em> pour votre plate-forme. Fink 0.6.3 n'est installable que sur Mac OS X 10.2.*, tandis que Fink 0.7.1 ne convient que pour Mac OS X 10.3.*.</p>
<p>L'équipe Fink remercie toutes les personnes sans lesquelles cette version n'aurait pas vu le jour : ses nombreux contributeurs, toutes les personnes qui apportent leur aide régulièrement ainsi que les développeurs. Nous remercions aussi notre communauté d'avoir téléchargé la version 0.7.0 précédente plus de 130 000 fois. Sans son soutien constant et ses conseils judicieux, Fink n'en serait pas là aujourd'hui.</p>

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
