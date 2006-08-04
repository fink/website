<a name="2006-07-24%20Reminder:%20%2210.4-transitional%22%20Tree%20Unsupported%20on%20August%201st,%202006"><span class="news-date">2006-07-24: </span><span class="news-headline">Reminder: "10.4-transitional" Tree Unsupported on August 1st, 2006</span></a><?php gray_line(); ?>
			<p>
				The "10.4-transitional" tree was created as an interim solution to the issues of
				incompatibilities between binaries made using GCC 3.3 (the default Mac OS X 10.3
				compiler) and GCC 4.0 (the default Mac OS X 10.4 compiler).  Now that the work to
				move Fink to using GCC 4.0 is essentially finished, we will be stopping official
				support of the "10.4-transitional" tree in favor of the "10.4" tree as of August
				1st, 2006.
			</p>
			<p><b>You should not need to do anything if "fink --version" prints "0.8.1.cvs" or "0.8.1.rsync".</b></p>
			<p>
				As we mentioned <a href="<?php print $root; ?>news#2006-07-01%20July%20is%20%22Fink%20Update%20Month%22">previously</a>,
				there are 2 ways to make the switch to the supported "10.4" tree.
			</p>
			<p>
				The simplest way is to remove your Fink installation by deleting it and
				installing fresh using the 0.8.1 installer available from the <a href="<?php print $root; ?>download">download page</a>.
			</p>
			<p>
				Alternately, to preserve your Fink installation, download the
				<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">upgrade script</a>
				and read the README for instructions on how to upgrade your existing installation in-place.
				This will re-build your Fink installation from source, upgrading everything in the process.
				Be warned, it can take a lot of time, depending on your fink installation!
			</p>
			<p>
				Feedback on the upgrade script has been very positive; many users have already
				made the switch.  If you have problems, please feel free to mail your issues to
				the <a href="<?php print $root; ?>lists">discussion lists</a>.
			</p>
		<a name="2006-07-24%20Fink%20Birds-of-a-Feather%20at%20OSCON%202006"><span class="news-date">2006-07-24: </span><span class="news-headline">Fink Birds-of-a-Feather at OSCON 2006</span></a><?php gray_line(); ?>
			<p>Are you at OSCON 2006?  Want to meet up?</p>
			<p>
				<a href="mailto:oscon2006@racoonfink.com">Benjamin Reed</a> (RangerRick on #fink)
				is at OSCON and is interested in meeting anyone who wants to hang out and talk about
				Fink, or even just meet for the heck of it.
			</p>
			<p>
				Meet us in room F150 on Wednesday, July 26th at 8:30pm and we'll talk about Fink,
				Mac OS X, and anything else that takes our fancy.
			</p>
		<a name="01/07/2006%20Juillet,%20%22mois%20de%20mise%20%C3%A0%20jour%20de%20Fink%22"><span class="news-date">01/07/2006: </span><span class="news-headline">Juillet, "mois de mise à jour de Fink"</span></a><?php gray_line(); ?>
<p>Les utilisateurs de Fink sur machines PowerPc qui utilisent l'arborescence "10.4-transitional" doivent passer à l'arborescence "10.4". Nous avons prévu de geler l'arborescence 10.4-transitional à la fin du mois de Juillet.</p>
<p>Historique : le système Mac OS X 10.4 a introduit une nouvelle version du compilateur g++ (l'une des bêtes de somme de Fink). Cette version du compilateur produit du code incompatible avec les versions précédentes du compilateur. Dans l'arborescence 10.4-transitional, Fink mélange du code produit par le nouveau compilateur gcc-4.0 et du code produit par l'ancien compilateur g++-3.3. Cette stratégie a permis de dégager du temps pour rendre les paquets compatibles avec le compilateur g++-4.0. L'heure est maintenant venue de clore cette période transitoire et de ne plus utiliser que la nouvelle arborescence. Néanmoins, la mise à jour est compliquée du fait que tous les paquets qui utilisent ou fournissent des librairies g++ doivent être recompilés dans un certain ordre.</p>
<p>Si vous utilisez Mac OS X 10.4, vous pouvez déterminer si vous devez faire cette mise à jour en exécutant la commande <code>fink --version</code>. Si la version de distribution est la version "0.8.1.cvs" ou "0.8.1.rsync", vous <b>n'avez pas besoin</b> de faire la mise à jour. Mais si la version de distribution est la version "0.8.0.cvs" ou "0.8.0.rsync", vous <b>devez</b> effectuer la mise à jour comme décrit ci-dessous.</p>
<p>Certains utilisateurs préfèreront supprimer leur installation fink et réinstaller une nouvelle distribution avec l'installeur 0.8.1. D'autres préfèreront utiliser le <a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">paquet de mise à jour 10.4 (v. 0.4)</a> (environ 12 Mo), qui comprend des versions précompilées des paquets de base de fink ainsi qu'un script de mise à jour de l'installation existante. Voir les instructions détaillées dans le fichier README qui se trouve dans le répertoire 10.4-update après décompression du paquet.</p>
<p>Note : les utilisateurs de Fink qui passent du système Mac OS X 10.3 au système Mac OS X 10.4 peuvent utiliser les mêmes procédures : soit supprimer complètement leur installation de fink et réinstaller une nouvelle distribution, soit utiliser le paquet le mise à jour 10.4. Le script de mise à jour ne doit pas être exécuté avant d'avoir mis à jour Mac OS X.</p>

