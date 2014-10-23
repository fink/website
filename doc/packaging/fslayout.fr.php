<?php
$title = "Paquets - Organisation des fichiers";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:16';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="next" href="compilers.php?phpLang=fr" title="Compilateurs"><link rel="prev" href="policy.php?phpLang=fr" title="Règles de distribution des paquets">';


include_once "header.fr.inc";
?>
<h1>Paquets - 4. Organisation des fichiers</h1>



<p>Les règles d'organisation des fichiers suivantes font partie intégrante des règles de construction des paquets de Fink.</p>

<h2><a name="fhs">4.1 Hiérarchie standard des fichiers</a></h2>
<p>Fink suit l'esprit de <a href="http://www.pathname.com/fhs/">Filesystem Hierarchy Standard</a> - Norme de hiérarchie du système de fichiers, ou FHS en raccourci. Il ne peut qu'en suivre l'esprit car FHS a été conçu pour les vendeurs de systèmes qui ont le contrôle des arborescences <code>/</code> et <code>/usr</code>. Fink n'est qu'une distribution supplémentaire qui ne contrôle que son répertoire (ou préfixe) d'installation. Les exemples ci-dessous utilisent le préfixe par défaut, soit <code>/sw</code>.</p>

<h2><a name="dirs">4.2 Répertoires</a></h2>
<p>Les fichiers doivent être placés dans les sous-répertoires suivant de l'arborescence :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Répertoire</th><th align="left">Utilisation</th></tr><tr valign="top"><td><code>/sw/bin</code></td><td>
<p>Ce répertoire est dédié aux exécutables généraux. Il n'existe pas de sous-répertoire.</p>
</td></tr><tr valign="top"><td><code>/sw/sbin</code></td><td>
<p>Ce répertoire correspond aux exécutables pour administrateurs système. Les démons lancés en tâche de fond y sont placés. Il n'y a pas de sous-répertoire.</p>
</td></tr><tr valign="top"><td><code>/sw/include</code></td><td>
<p>Ce répertoire stocke les headers C et C++. On peut créer autant de sous-répertoires que nécessaire. Si un paquet installe des headers qui peuvent être confondus avec des headers standard C, les headers du paquet <b>doivent</b> être installés dans un sous-répertoire.</p>
</td></tr><tr valign="top"><td><code>/sw/lib</code></td><td>
<p>Ce répertoire est destiné aux fichiers de données et bibliothèques dépendants de l'architecture du système. Les bibliothèques statiques et partagées doivent être placées dans <code>/sw/lib</code>, sauf s'il existe une bonne raison pour ne pas le faire. C'est également là que sont placés les exécutables qui ne doivent pas être directement lancés par l'utilisateur (dans le cas contraire, ils sont placés dans libexec).</p>
<p>On peut créer un sous-répertoire spécifique à un paquet, afin d'y mettre des données privées ou des modules chargeables. Pensez à utiliser des noms de répertoire qui garantissent la compatibilité entre versions. Il est bon d'utiliser le numéro de version majeur du paquet dans le nom du sous-répertoire ou à un niveau inférieur de la hiérarchie ; par exemple, <code>/sw/lib/perl5</code> ou <code>/sw/lib/apache/1.3</code>. Faites attention si vous utilisez le type d'hôte dans le nom des répertoires créés. Un sous-répertoire nommé <code>powerpc-apple-darwin1.3.3</code> ne garantit pas la compatibilité entre versions ; utilisez plutôt <code>powerpc-apple-darwin1.3</code> ou <code>powerpc-apple-darwin</code>.</p>
</td></tr><tr valign="top"><td><code>/sw/lib/ppc64</code>
<code>/sw/lib/x86_64</code></td><td>
<p>Ce répertoire est dédié aux bibliothèques 64-bit. Le répertoire <code>/sw/lib/ppc64</code> est utilisé sous architecture powerpc et le répertoire <code>/sw/lib/x86_64</code> sous architecture i386. Les bibliothèques combinées (fat) doivent être enregistrées dans le répertoire <code>/sw/lib</code>.</p>
</td></tr><tr valign="top"><td><code>/sw/share</code></td><td>
<p>Ce répertoire sert aux fichiers de données indépendants de l'architecture. Les mêmes règles que celles en vigueur pour <code>/sw/lib</code> s'appliquent ici. Quelques sous-répertoires courants sont décrits ci-dessous.</p>
</td></tr><tr valign="top"><td><code>/sw/share/man</code></td><td>
<p>Ce répertoire contient les pages de manuel. Son arborescence suit celle des sections courantes. Chaque programme installé dans <code>/sw/bin</code> et <code>/sw/sbin</code> doit avoir une page de manuel associée dans ce répertoire.</p>
</td></tr><tr valign="top"><td><code>/sw/share/info</code></td><td>
<p>Ce répertoire contient la documentation en format Info (produit à partir de sources Texinfo). La maintenance du fichier <code>dir</code> est automatisée par la version Debian du programme <code>install-info</code> (qui fait partie du paquet <code>dpkg</code>). Utilisez le champ de description <code>InfoDocs</code> pour générer le code approprié utilisé par les scripts de paquet <code>postinst</code> et <code>prerm</code>. Fink s'assure qu'aucun paquet n'installe un fichier <code>dir</code> de lui-même. Il n'y a pas de sous-répertoire.</p>
</td></tr><tr valign="top"><td><code>/sw/share/doc</code></td><td>
<p>Ce répertoire contient la documentation autre que les pages de manuel ou les documents Info. Les fichiers README, LICENSE et COPYING sont placés dans ce répertoire. Chaque paquet doit y créer un sous-répertoire, dont le nom est basé sur celui du paquet. Le nom du sous-répertoire ne doit pas contenir de numéro de version (sauf s'il fait lui-même partie du nom du paquet). Conseil : utilisez <code>%n</code>.</p>
</td></tr><tr valign="top"><td><code>/sw/share/locale</code></td><td>
<p>Ce répertoire contient les catalogues de messages de traduction.</p>
</td></tr><tr valign="top"><td><code>/sw/var</code></td><td>
<p>Le répertoire <code>var</code> contient les données variables. Ceci inclut les répertoires spool (fichiers en attente de traitement), les fichiers verrous (lock), les bases de données des variables d'état (db), les données variables des jeux (games) et les fichiers d'historique (log).</p>
</td></tr><tr valign="top"><td><code>/sw/etc</code></td><td>
<p>Ce répertoire contient les fichiers de configuration. Quand un paquet possède plus d'un ou deux fichiers de configuration, un sous-répertoire doit être créé. Le nom du sous-répertoire doit être celui du paquet ou d'un de ses programmes, de façon à l'identifier facilement.</p>
</td></tr><tr valign="top"><td><code>/sw/src</code></td><td>
<p>Ce répertoire sert à stocker et compiler le code source. Un paquet ne doit rien installer dans ce répertoire.</p>
</td></tr><tr valign="top"><td><code>/sw/Applications</code></td><td>
<p>This directory is for storing OS X-style applications which are launched by double-clicking rather than from the command line.</p>
</td></tr><tr valign="top"><td><code>/sw/Library/Frameworks</code></td><td>
<p>This directory is for storing OS X-style frameworks, sometimes used by OS X-style applications.</p>
</td></tr></table>

<h2><a name="avoid">4.3 À éviter</a></h2>
<p>Aucun autre répertoire que ceux mentionnés ci-dessus ne doit être créé dans <code>/sw</code>. En particulier, les répertoires suivant ne doivent pas être utilisés : <code>/sw/man</code>, <code>/sw/info</code>, <code>/sw/doc</code>, <code>/sw/libexec</code> et <code>/sw/lib/locale</code>.</p>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="compilers.php?phpLang=fr">5. Compilateurs</a></p>
<?php include_once "../../footer.inc"; ?>


