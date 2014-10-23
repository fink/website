<?php
$title = "Portage - Préparation pour 10.4";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:16';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Portage Contents"><link rel="prev" href="preparing-10.3.php?phpLang=fr" title="Préparation pour la version 10.3">';


include_once "header.fr.inc";
?>
<h1>Portage - 6. Préparation pour la version 10.4</h1>


<h2><a name="perl">6.1 Perl</a></h2>
<p><code>/usr/bin/perl</code> correspond maintenant à perl 5.8.6 ; la couche architecturale est toujours "darwin-thread-multi-2level".</p>

<h2><a name="typedef">6.2 Nouvelles définitions de symboles</a></h2>
<p>Dans Mac OS X 10.4, de nombreux symboles ont changé de types. Si vous aviez précédemment défini un type explicitement, comme, par exemple, <code>socklen_t</code> en tant que <code>int</code>, cette définition risque de ne plus être correcte.</p>

<h2><a name="system-libs">6.3 Nouvelles librairies système intégrées</a></h2>
<p>La fonction <code>poll()</code> dans Mac OS X 10.3 n'était qu'une émulation reposant sur <code>select()</code>. Sous Mac OS X 10.4, <code>poll()</code> est une vraie fonction implantée dans le noyau, mais elle est boguée lorsqu'elle est utilisée avec des sockets. Il vaut mieux l'ignorer complètement. On a appliqué sur le paquet glib2 de Fink une rustine qui permet d'utiliser une émulation complètement fonctionnelle. Vous ne courez donc aucun risque à utiliser l'implantation de fonctions similaires à poll de cette librairie.</p>


<?php include_once "../../footer.inc"; ?>


