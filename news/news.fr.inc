<a name="2004-11-20 Solution to gcc problems."><span class="news-date">2004-11-20: </span><span class="news-headline">Solution to gcc problems.</span></a><?php gray_line(); ?>
<p>
Apple has released the November 2004 gcc3 updater, available (upon free 
registration) at connect.apple.com.  This updater fixes the problems with
the gcc3 compiler in XCode 1.5.  If you are using XCode 1.5, you should 
install this updater.  (The updater will update correctly for users with
an untouched XCode 1.5, and also for users who installed the workaround which
the fink project had previously recommended.)
</p><p>
We would like to thank Apple for responding to our reports about this
matter, and working to resolve it as quickly as possible.
</p>


<a name="15/10/2004 Résolution de problèmes concernant gcc"><span class="news-date">15/10/2004: </span><span class="news-headline">Résolution de problèmes concernant gcc</span></a><?php gray_line(); ?>
<p>Il s'avère que la version de gcc incluse dans XCode 1.5 produit des résultats incorrects avec du code C++ dans certains cas. Fink possède maintenant un mécanisme pour en avertir l'utilisateur et refusera bientôt d'utiliser cette version "vérolée" pour compiler les paquets qui présentent ce problème.</p>
<p>Si vous êtes déjà passé à la version 1.5 de XCode, vous trouverez une solution décrite <a href="http://article.gmane.org/gmane.os.apple.fink.beginners/13580">ici</a> ou <a href="http://article.gmane.org/gmane.os.apple.fink.beginners/14200">là</a>.</p>
<p>Si vous n'avez pas encore mis à jour XCode, il vous est conseillé de ne pas le faire tant que ce problème ne sera pas résolu.</p>
<a name="20/09/2004 Fink 0.7.1 est disponible"><span class="news-date">20/09/2004: </span><span class="news-headline">Fink 0.7.1 est disponible</span></a><?php gray_line(); ?>
<p>La dernière version de Fink, 0.7.1 (pour 10.3) est maintenant disponible sous forme de sources ou de binaires. Cette tourne sur les versions Panther (10.3) de Mac OS X. La version 0.6.3 reste disponible pour les utilisateurs des versions Jaguar (10.2) de Mac OS X.</p>
<p>Elle intégre diverses corrections du gestionnaire de paquets. De plus, de nombreux paquets, auparavant indisponibles sous forme binaire, ont été ajoutés, ce qui porte le total des binaires disponibles à 1650. Ils comprennent, en autres, les binaires de KDE 3.1.4 et ceux de GNOME 2.4.</p>
<p>Pour installer Fink pour la première fois, veuillez suivre les instructions données <a href="http://fink.sourceforge.net/download/index.php?phpLang=fr">ici</a>. Pour mettre à jour Fink, servez-vous de la version installée sur votre système. Vous trouverez la liste des différences entre les versions 0.7.0 et 0.7.1 sur cette <a href="http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable&amp;cmp=0&amp;tree2=0.7.0-stable&amp;splitoffs=on&amp;sort=name">page.</a></p>
<p>Si vous vous posez des questions ou rencontrez des difficultés, n'hésitez pas à vous servir des listes de diffusion de Fink. Vous en trouverez le détail <a href="http://fink.sourceforge.net/lists/index.php?phpLang=fr">ici</a>.</p>
<p>Vérifiez que vous avez choisi le <b>bon installeur</b> pour votre plate-forme. Fink 0.6.3 n'est installable que sur Mac OS X 10.2.*, tandis que Fink 0.7.1 ne convient que pour Mac OS X 10.3.*.</p>
<p>L'équipe Fink remercie toutes les personnes sans lesquelles cette version n'aurait pas vu le jour : ses nombreux contributeurs, toutes les personnes qui apportent leur aide régulièrement ainsi que les développeurs. Nous remercions aussi notre communauté d'avoir téléchargé la version 0.7.0 précédente plus de 130 000 fois. Sans son soutien constant et ses conseils judicieux, Fink n'en serait pas là aujourd'hui.</p>

