<a name="2006-02-21%20Preliminary%20version%20of%20Fink%20on%20Intel"><span class="news-date">2006-02-21: </span><span class="news-headline">Preliminary version of Fink on Intel</span></a><?php gray_line(); ?>
<p>
A preliminary version of Fink for the Intel architecture is now ready.
No binary packages are available, and things are still rough around
the edges, but it should be usable if you are patient!
</p>
<p>
To install, you need to get the file <code>fink-0.24.12.tar.gz</code>
from <a href="http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043">the
Sourceforge file release page for Fink</a>, expand the file, and
run the command <code>./bootstrap.sh</code> .  At the end of the
bootstrap process, run <code>fink selfupdate</code> and you'll get
the currently available packages.
</p>
<p>
At last check, there were about 1750 packages in the "stable" tree, but
about 150 of those did not build.  When things are truly stable, another
annoucement will be made here.
</p>
<a name="10/01/2006%20Fink%20est%20pr%C3%AAt%20pour%20XCode%202.2%20(mais%20par%20pour%20Intel)."><span class="news-date">10/01/2006: </span><span class="news-headline">Fink est prêt pour XCode 2.2 (mais par pour Intel).</span></a><?php gray_line(); ?>
<p>Fink est maintenant prêt pour XCode 2.2, à l'exception des paquets openoffice.org (nous espérons qu'ils fonctionneront de nouveau quand nous passerons à l'arborescence 10.4). Nous encourageons les utilisateurs à passer à la version 2.2 de XCode s'ils le désirent ; XCode 2.2 devra être installé quand l'arborescence 10.4 sera mise à disposition.</p>
<p>D'un autre côté et malgré l'annonce qu'Apple a faite aujourd'hui, Fink n'est pas prêt à tourner sur des processeurs Intel. L'équipe de Fink espère avoir une version prête pour Intel dans quelques semaines ; nous suggérons aux heureux bénéficiaires d'un nouvel iMac de ne pas y installer Fink tout de suite, mais d'attendre que la nouvelle version de Fink soit prête.</p>
<p>Les mainteneurs de paquets Fink doivent tenir compte du nouveau champ <code>Architecture</code>, dont l'usage est expliqué dans le guide d constructions de paquets.</p>
<a name="16/11/2005%20XCode%202.2%20(utilisateurs%20Mac%20OS%20X%2010.4%20uniquement)"><span class="news-date">16/11/2005: </span><span class="news-headline">XCode 2.2 (utilisateurs Mac OS X 10.4 uniquement)</span></a><?php gray_line(); ?>
<p>L'équipe Fink a eu vent de problèmes de compilation avec XCode 2.2. Nous vous recommandons de vous abstenir de mettre à jour XCode tant que ces problèmes ne seront pas résolus.</p>
<p>Ceux qui ont déjà installé XCode 2.2 et ne souhaitent pas revenir à la version 2.1 sont cordialement invités à nous aider à trouver les paquets qui ne fonctionnent pas et à faire en sorte qu'ils marchent.</p>

