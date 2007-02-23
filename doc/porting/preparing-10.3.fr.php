<?
$title = "Portage - Préparation pour 10.3";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:55';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Portage Contents"><link rel="next" href="preparing-10.4.php?phpLang=fr" title="Préparation pour la version 10.4"><link rel="prev" href="preparing-10.2.php?phpLang=fr" title="Préparation pour la version 10.2">';


include_once "header.fr.inc";
?>
<h1>Portage - 5. Préparation pour la version 10.3</h1>


<h2><a name="perl">5.1 Perl</a></h2>
<p>Sous Mac OS X 10.2, <code>/usr/bin/perl</code> correspondait à la version 5.6.0 de perl et l'architecture était représentée par la chaîne de caractères "darwin". Sous Mac OS X 10.3, <code>/usr/bin/perl</code> correspond à la version 5.8.1 de perl, et l'architecture est représentée par la chaîne de caractères "darwin-thread-multi-2level". Ces changements n'affectent <b>probablement</b> pas l'utilisation courante de l'exécutable perl lors de la création de paquets, car chaque exécutable perl sait où trouver ses propres modules. Les mainteneurs de paquets de module perl ("-pm") qui suivent les <a href="http://www.finkproject.org/packaging/policy.php#perlmods">règles d'empaquetage des modules perl</a> en vigueur et celles des scripts <code>CompileScript</code> et <code>InstallScript</code> n'ont pas de souci à se faire.</p>

<h2><a name="typedef">5.2 Nouvelles définitions de symboles</a></h2>
<p>À partir de Mac OS X 10.3, il existe une définition complète du type <code>socklen_t</code> type. Pour l'utiliser, il faut ajouter au programme :</p>
<pre>
#include &lt;sys/types.h&gt;
#include &lt;sys/socket.h&gt;
</pre>

<h2><a name="system-libs">5.3 Nouvelles librairies systèmes incorporées</a></h2>
<p>Mac OS X 10.3 comprend plusieurs librairies qui n'existaient pas dans les versions précédentes du système, et étaient donc fournies en tant que paquets Fink. Il s'agit de :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Librairies</th><th align="left">Notes</th></tr><tr valign="top"><td>libpoll</td><td>
<p>Les fichiers <code>/usr/lib/libpoll.dylib</code> et <code>/usr/include/poll.h</code> sont toujours inclus, toutefois l'implémentation de cette librairie sous Mac OS X n'est pas complète. Si elle correspond à vos besoins, vous pouvez supprimer les dépendances des paquets Fink "libpoll" et "libpoll-shlibs". Le code de la librairie est incorporé dans libSystem ; cette librairie est toujours liée automatiquement. Cela signifie que le drapeau <code>-lpoll</code> n'est pas nécessaire si vous désirez utiliser l'implémentation Mac OS X. Sachez que Mac OS X fournit un fichier <code>libpoll.dylib</code> ; il se peut donc que <code>-lpoll</code> donne un résultat différent selon que le paquet Fink "libpoll" est installé ou non.</p>
</td></tr><tr valign="top"><td>libdl</td><td>
<p>Les fichiers <code>/usr/lib/libdl.dylib</code> et <code>/usr/include/dlfcn.h</code> sont inclus maintenant ; il n'y a donc plus besoin de dépendre des paquets Fink "dlcompat", "dlcompat-dev" et "dlcompat-shlibs". Le code de la librairie est incorporé dans libSystem ; cette librairie est toujours liée automatiquement. Cela signifie que le drapeau <code>-ldl</code> n'est plus nécessaire (mais son utilisation n'a aucun effet).</p>
</td></tr><tr valign="top"><td>GNU getopt</td><td>
<p>Cette librairie, qui comprend la fonction <code>getopt_long()</code>, a été incorporée dans libSystem et <code>/usr/include/getopt.h</code> ; vous n'avez donc pas besoin d'utiliser les paquets Fink "libgnugetopt" et "libgnugetopt-shlibs". Comme libSystem est automatiquement liée et que le répertoire <code>/usr/include</code> fait partie des répertoires automatiques de recherche des headers, vous pouvez supprimer tous les drapeaux <code>-lgnugetopt</code> et <code>-I/sw/include/gnugetopt</code> qui avaient été ajoutés pour permettre d'accéder au paquet Fink "libgnugetopt".</p>
</td></tr></table>
<p>Lors de la migration d'un paquet vers Mac OS X 10.3, essayez de supprimer ces dépendances obsolètes, car il se peut que ces paquets soient supprimés des arborescences futures. Cela signifie qu'il faut un fichier de description différent pour chaque arborescence. Comme toujours, le champ <code>Revision</code> doit être incrémenté lors de changements faits sur un paquet. De cette façon, les utilisateurs qui passent de Mac OS X 10.2 à Mac OS X 10.3 voient les paquets spécifiques à la branche 10.3 comme "plus récents" que les paquets de l'arborescence 10.2. Par convention, le champ <code>Revision</code> doit être incrémenté de 10 unités lors d'une migration vers un arbre plus récent de façon à laisser une marge pour pouvoir mettre à jour les paquets des branches moins récentes.</p>
<p>Lors du test d'un paquet en migration, n'oubliez pas de désinstaller les paquets que vous avez supprimé du champ <code>BuildDepends</code>, pour éviter que le compilateur lie avec les librairies Fink installées.</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="preparing-10.4.php?phpLang=fr">6. Préparation pour la version 10.4</a></p>
<? include_once "../../footer.inc"; ?>


