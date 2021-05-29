<?php
$title = "Paquets - Règles";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2021/05/27 20:26:32';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="next" href="fslayout.php?phpLang=fr" title="Organisation des fichiers"><link rel="prev" href="format.php?phpLang=fr" title="Descriptions de paquets">';


include_once "header.fr.inc";
?>
<h1>Paquets - 3. Règles de distribution des paquets</h1>


<h2><a name="licenses">3.1 Licences de paquets</a></h2>
<p>Les paquets inclus dans Fink ont différents types de licences. La plupart d'entre elles stipulent une restriction sur la redistribution des sources complètes et particulièrement sur la distribution des binaires. Certains paquets ne peuvent être inclus dans la distribution binaire de Fink à cause de ces licences restrictives. C'est pourquoi il est essentiel que les mainteneurs de paquets vérifient, scrupuleusement, les licences de leurs paquets.</p>
<p>Chaque paquet distribué en tant que binaire doit contenir une copie de la licence. Elle doit être installée dans le répertoire de documentation, c'est à dire dans <code>%p/share/doc/%n</code>. (Dans InstallScript, il faut, évidemment, utiliser %i au lieu de %p. Le champ DocFiles gère les détails automatiquement). S'il n'y a pas de licence explicite dans le source original, placez un fichier texte contenant une note à propos du statut du paquet. La plupart des licences requièrent que celle-ci accompagne toute distribution. La règle de Fink est de toujours faire ainsi, même si ce n'est pas explicitement requis.</p>
<p>Pour automatiser le plus possible la maintenance de la distribution binaire, tout paquet distribué doit avoir un champ <code>License</code>. Ce champ indique la nature de la licence et est utilisé pour décider quels paquets font partie de la distribution et quels paquets doivent en être exclus. Le champ ne peut exister que si les termes réels de la licence sont inclus dans le paquet binaire, comme expliqué ci-dessus.</p>
<p>Pour que le champ <code>License</code> ait une utilité, n'utilisez qu'une seule des valeurs prédéfinies suivantes. Si vous construisez un paquet qui ne rentre pas dans ces catégories, demandez de l'aide sur la liste des développeurs.</p>
<ul>
<li><code>GPL</code> - la licence générale publique GNU. Cette licence requiert que le source soit accessible au même endroit que le binaire.</li>
<li><code>LGPL</code> - la licence publique GNU moins générale. Cette licence requiert que le source soit accessible au même endroit que le binaire.</li>
<li><code>GPL/LGPL</code> - c'est un cas spécial pour les paquets dans lesquels une partie est sous licence GPL (par exemple les exécutables) et une autre partie est sous licence LGPL (par exemple les bibliothèques).</li>
<li><code>BSD</code> - pour les licences style BSD. Ceci inclue la licence BSD dite "original", la licence BSD "modified" et la licence MIT. La licence Apache compte aussi parmi les licences BSD. Avec ces licences, la distribution du code source est optionnelle. </li>
<li><code>Artistic</code> - pour la licence "Artistic" et ses dérivées.</li>
<li><code>Artistic/GPL</code> - licence duale, combinée Artistic/GPL.</li>
<li><code>GNU Free Documentation License</code> et <code>Linux Documentation Project</code> - si la documentation incluse dans un paquet l'est explicitement sous une de ces licences, alors ce sera indiqué par l'ajout de <code>/GFDL</code> ou <code>/LDP</code> au code de la licence, ce qui donne l'une des combinaisons autorisées suivantes : "GFDL", "GPL/GFDL", "LGPL/GFDL", "GPL/LGPL/GFDL", "LDP", ou "GPL/LGPL/LDP". </li>
<li><code>DFSG-Approved</code> - pour les paquets qui suivent les règles du <a href="http://www.debian.org/social_contract">Pacte social Debian</a>.
</li>
<li><code>OSI-Approved</code> - pour les autres licences Open Source approuvées par l'Initiative Open Source (OSI) <a href="http://www.opensource.org/"></a>. L'une des règles de l'OSI est que la libre distribution de binaires et de sources est autorisée. Ce code peut aussi servir de cadre aux paquets à licence duale.</li>
<li><code>Restrictive</code> - pour les licences restrictives. Utilisez ceci pour les paquets qui sont accessibles en tant que sources à usage libre auprès de l'auteur, mais dont la libre redistribution n'est pas autorisée. </li>
<li><code>Restrictive/Distributable</code> - pour des licences restrictives qui admettent une distribution des binaires et du source. Utilisez ceci pour les paquets qui sont accessibles en tant que sources auprès de l'auteur, autorisent la distribution du source et des binaires, mais ont des restrictions qui en font des licences non open-sources.</li>
<li><code>Commercial</code> - pour des licences restrictives de type commercial. Utilisez ceci pour des paquets de type commercial ( par exemple graticiels, partagiciels qui n'autorisent pas la libre redistribution du source ou des binaires.</li>
<li><code>Public Domain</code> - pour des paquets qui sont dans le domaine public, c'est-à-dire que l'auteur a abandonné ses droits sur le code. Ces paquets n'ont aucune licence d'aucune sorte et tout un chacun peut en faire ce que bon lui semble.</li>
</ul>

<h2><a name="openssl">3.2 La licence GPL et OpenSSL</a></h2>
<p>(Changement de règle à dater d'avril 2005).</p>
<p>En raison d'une incompatibilité manifeste entre la licence d'OpenSSL et les licences GPL et LGPL, les paquets de Fink sous licence originale GPL ou LGPL qui sont liés à <code>openssl</code> doivent avoir une licence "Restrictive". En conséquence, le projet Fink ne distribuera pas les binaires de ces paquets. Toutefois les utilisateurs sont libres de les compiler à partir du source.</p>
<p>Nous encourageons les mainteneurs à indiquer la licence originale du paquet dans le champ <code>DescPackaging</code>.</p>

<h2><a name="prefix">3.3 Interférence avec le système de base</a></h2>
<p>Fink est une distribution additionnelle qui est installée dans un répertoire distinct du système de base. Il est essentiel qu'un paquet n'installe aucun fichier en dehors du répertoire de Fink.</p>
<p>Il peut y avoir des exceptions quand on ne peut faire autrement, par exemple avec XFree86. Dans ce cas, le paquet doit tester l'existence de fichiers avant l'installation et refuser de s'installer si cela amène à écraser des fichiers déjà existants. Le paquet doit s'assurer que tous les fichiers qu'il aura installés en dehors du répertoire de Fink seront supprimés lorsque le paquet lui-même sera éliminé, ou que ces fichiers ne causeront aucun problème s'ils sont laissés sur place (c'est-à-dire qu'ils devront tester l'existence des binaires avant de les appeler, etc...).</p>

<h2><a name="sharedlibs">3.4 Bibliothèques partagées</a></h2>
<p>Fink a de nouvelles règles en ce qui concerne les bibliothèques partagées, règles qui prennent effet à compter de février 2002. Cette partie de la documentation donne des explications sur la version 4 de ces règles, qui coïncide avec la publication de la distribution 0.5.0 de Fink,

as modified in December, 2006 to handle 64bit libraries
and from January, 2008 to handle private shared libraries. (In addition,
the discussion was updated in June, 2008 to eliminate obsolete references to a
transitional period for implementing the shared libraries policy.)
We begin with a quick summary, and then discuss things in more detail.

Nous commencerons par un bref résumé, puis nous passerons à une revue de détails.
</p>
<p>Tout paquet qui construit des bibliothèques partagées et qui doit gérer ses bibliothèques partagées conformément aux règles de Fink. Ceci signifie :</p>
<ul>
<li>vérifier, à l'aide de <code>otool -L</code> (ou de <code>otool64 -L</code> pour les bibliothèques 64bit), que le nom d'installation de chaque bibliothèque, ses numéros de versions de compatibilité et actuels sont corrects</li>
<li>mettre les bibliothèques partagées dans un paquet séparé (exception faite pour les liens de libfoo.dylib vers nom d'installation), et inclure le champ <code>Shlibs</code> dans ce paquet</li>
<li>mettre les headers et les liens finaux venant de libfoo.dylib dans un paquet caractérisé par <code>BuildDependsOnly: True</code>, et prévoir qu'aucun autre paquet ne dépendra de lui.</li>
</ul>

<p>Note that a package may also install private shared libraries, which
are not intended to be linked from any other package.  In this case, the
libraries need not go into a separate package, but a <code>Shlibs</code>
field must still be part of the package containing shared libraries.  Also,
maintainers should try to avoid storing a final link from libfoo.dylib
in the main library directory <code>%i/lib</code> 
(or its 64-bit equivalent), to prevent
other programs from accidentally linking to this library.
</p>
<p>Un mainteneur, qui a de bonnes raisons de s'écarter de ces règles et ne scinde pas le paquet, devra expliquer pourquoi dans le champ DescPackaging.</p>
<p>Pour certains paquets, tout peut être fait avec un paquet principal et un paquet -shlibs ; dans d'autres cas, vous aurez besoin d'un troisième paquet. Le nouveau champ <code>SplitOff</code> facilite ce processus.</p>
<p>Quand trois paquets sont nécessaires, il y a deux façons différentes de les nommer, suivant que les bibliothèques (option 1) ou les binaires (option 2) sont les fonctionnalités les plus importantes du paquet. 
Pour l'option 1, utilisez le schéma suivant :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Paquet</th><th align="left">Contenu</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td>
<p>Librairies partagées</p>
</td></tr><tr valign="top"><td><code>foo</code></td><td>
<p>Headers</p>
</td></tr><tr valign="top"><td><code>foo-bin</code></td><td>
<p>Binaires, etc...</p>
</td></tr></table>
<p>Pour l'option 2, utilisez :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Paquet</th><th align="left">Contenu</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td>
<p>Librairies partagées</p>
</td></tr><tr valign="top"><td><code>foo-dev</code></td><td>
<p>Headers</p>
</td></tr><tr valign="top"><td><code>foo</code></td><td>
<p>Binaires, etc...</p>
</td></tr></table>
<p><b>Règles détaillées</b></p>
<p>Nous allons désormais discuter de tout cela en détails. Comme exemples des règles en action, voir les paquets libpng, libjpeg et libtiff.</p>
<p>Les logiciels portés sur Darwin doivent, autant que possible, construire des bibliothèques partagées. (Les mainteneurs de paquets sont libres de construire des bibliothèques statiques, si cela s'avère plus approprié pour leurs paquets ; ils peuvent aussi soumettre des paquets contenant uniquement des bibliothèques statiques, s'ils le souhaitent). 
Quand on construit des bibliothèques partagées

<b>deux</b> paquets - nommés foo et foo-shlibs -, étroitement liés, doivent être construits. Les bibliothèques partagées vont dans foo-shlibs, et les headers dans foo. Ces deux paquets peuvent être réalisés avec un seul fichier .info, en utilisant le champ <code>SplitOff</code>, comme indiqué ci-dessous. (En fait, il est souvent nécessaire de construire plus de deux paquets à partir du source, et cela peut être fait en utilisant <code>SplitOff2</code>, <code>SplitOff3</code>, etc...)</p>
<p>

Each software package for which public shared libraries are built must have
a <b>major version number</b> N, which is included in the shared
library's filename (for example, <code>libbar.N.dylib</code>).

Le numéro de version majeure n'est censé changer que lorsqu'un changement irréversible se produit dans l'API de la bibliothèque. Fink utilise la convention de nommage suivante : si le nom en amont du paquet est bar, alors les paquets fink sont appelés barN et barN-shlibs. (Ceci n'est appliqué rigoureusement qu'à de nouveaux paquets ou lorsque le numéro de version majeure change). Par exemple, le numéro de version majeure pour le paquet pré-existant libpng était 2, mais les versions récentes de la bibliothèque ont pour numéro de version majeure 3. Il y a donc, maintenant, 4 paquets fink pour gérer ceci : libpng, libpng-shlibs, libpng3, libpng3-shlibs. Seul libpng ou libpng3 peut être installé à un moment donné, mais libpng-shlibs et libpng3-shlibs peuvent être installés en même temps. (Notez que deux fichiers .info suffisent à construire ces quatre paquets).</p>
<p>La bibliothèque partagée elle-même et certains fichiers liés seront placés dans le paquet barN-shlibs ; les fichiers "include" et un certain nombre d'autres fichiers seront placés dans le paquet barN. Il ne peut y avoir de recouvrement de fichiers entre ces deux paquets, et tout ce qui est placé dans barN-shlibs doit avoir un nom chemin qui, d'une façon ou d'une autre, contienne le numéro de version majeure N. Dans de nombreux cas, votre paquet aura besoin de certains fichiers à l'exécution, fichiers qui sont généralement installés dans <code>%i/lib/bar/</code> ou <code>%i/share/bar/</code> ; vous devrez adapter les chemins d'installation à <code>%i/lib/bar/N/</code> ou <code>%i/share/bar/N/</code>.</p>
<p>Tous les autres paquets dépendant de bar, version majeure N, devront utiliser les dépendances :</p>
<pre>
  Depends: barN-shlibs
  BuildDepends: barN
</pre>
<p>
It is not be permitted for 
another package to depend on barN itself.  (Although there may still be
a few such dependencies involving packages which were in place prior to 
February, 2002.)  This is
signaled to other developers by a boolean field
</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>dans la description du paquet barN.</p>
<p>Si votre paquet inclut à la fois des bibliothèques partagées et des binaires, et si les binaires doivent être présents à l'exécution (et pas seulement à la compilation), alors les binaires doivent être regroupés dans un troisième paquet, qui peut être appelé barN-bin. Les autres paquets peuvent dépendre de barN-bin comme de barN-shlibs.</p>
<p>Lors de la construction de bibliothèques partagées de version majeure N, il est important que le "nom d'installation" soit <code>%p/lib/libbar.N.dylib</code>. Vous trouverez le nom d'installation en exécutant <code>otool -L</code> (ou <code>otool64 -L</code>pour les bibliothèques 64bit) sur votre bibliothèque. Le fichier bibliothèque réel doit être installé sous le nom de :</p>
<pre>
  %i/lib/libbar.N.x.y.dylib
</pre>
<p>et votre paquet doit créer des liens symboliques :</p>
<pre>
  %i/lib/libbar.N.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/libbar.dylib -&gt; %p/lib/libbar.N.x.y.dylib
</pre>
<p>from the install_name path and from the linking path to the actual
library.  (The first will not be needed if the library is in fact
installed at the install_name path, which is becoming more common.)
</p>
<p>Si la bibliothèque statique est aussi construite, elle doit être installée sous le nom de :</p>
<pre>
  %i/lib/bar.a
</pre>
<p>Si le paquet utilise libtool, ceci est généralement géré automatiquement, mais, dans tous les cas, vous devez vérifier que tout s'est passé correctement. Vous devez aussi vérifier que la version courante et la version de compatibilité sont définies de façon appropriée à vos bibliothèques partagées. On peut trouver les numéros de version avec la commande <code>otool -L</code> (ou la commande <code>otool64 -L</code> pour les bibliothèques 64bit).</p>
<p>Les fichiers sont scindés entre les deux paquets comme suit :</p>
<ul>
<li>  dans le paquet barN-shlibs :
<pre>
  %i/lib/libbar.N.x.y.dylib
  %i/lib/libbar.N.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/libbar/N/*
  %i/share/bar/N/*
  %i/share/doc/barN-shlibs/*
</pre>
</li>
<li>  dans le paquet barN :
<pre>
  %i/include/*
  %i/lib/libbar.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/libbar.a
  %i/share/doc/barN/*
  autres fichiers, si nécessaire
</pre>
</li>
</ul>
<p>Notez que les deux paquets doivent contenir des informations sur la licence, mais que les répertoires contenant les fichiers de documentation (DocFiles) sont différents.</p>
<p>Tout ceci est facile à réaliser en utilisant le champ <code>SplitOff</code>. Voici comment l'exemple ci-dessus serait (partiellement) implémenté :</p>
<pre>
Package: barN
Version: N.x.y
Revision: 1
License: GPL
Depends: barN-shlibs (= %v-%r)
BuildDependsOnly: True
DocFiles: COPYING
SplitOff: &lt;&lt;
  Package: barN-shlibs
  Files: lib/libbar.N.x.y.dylib lib/libbar.N.dylib lib/bar/N
  DocFiles: COPYING
&lt;&lt;
</pre>
<p>Durant l'exécution du champ <code>SplitOff</code>, les fichiers et les répertoires spécifiés sont déplacés du répertoire d'installation %I du paquet principal vers le répertoire d'installation %i du paquet splitoff. (Il y a une convention similaire pour les noms : %N est le nom du paquet principal, et %n est le nom du paquet actif). La commande <code>DocFiles</code> place ensuite une copie de la documentation dans <code>%i/share/doc/barN-shlibs</code>.</p>
<p>Notez que nous avons inclus la version courante exacte de barN-shlibs comme dépendance du paquet principal barN (qui peut être abrégé en %N-shlibs (= %v-%r) ). Ceci assure que les versions correspondent, et garantit aussi que barN "hérite" automatiquement de toutes les dépendances de barN-shlibs.</p>
<p><b>Le champ BuildDependsOnly</b></p>
<p>Lors de mises à jour de bibliothèques, il est souvent nécessaire d'avoir deux versions des headers pendant une période de transition. L'une d'entre elles est utilisée pour compiler certaines choses, l'autre pour en compiler d'autres. C'est pourquoi, les paquets contenant des headers doivent être construits avec soin. Si foo-dev et bar-dev contiennent tous les deux des headers qui se recouvrent, alors foo-dev doit déclarer :</p>
<pre>
  Conflicts: bar-dev
  Replaces: bar-dev
</pre>
<p>de même, bar-dev déclare des Conflicts/Replaces sur foo-dev.</p>
<p>De plus, les deux paquets doivent déclarer :</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>Ceci empêche d'autres paquets de dépendre de foo-dev ou de bar-dev, car de telles dépendances enrayeraient le mécanisme du Conflicts/Replaces.</p>
<p>Il existe certains paquets contenant des headers et pour lesquels il ne semble pas approprié de déclarer une valeur "true" pour BuildDependsOnly. Dans ce cas, le paquet doit déclarer : </p>
<pre>
  BuildDependsOnly: False
</pre>
<p>et la raison pour laquelle cela est fait doit être mentionnée dans le champ DescPackaging.</p>
<p>Le champ BuildDependsOnly ne doit être mentionné dans le fichier .info du paquet que si ce paquet contient des headers installés dans /sw/include.</p>
<p>À partir de la version 0.20.5 de fink, "fink validate" affichage un message pour tout .deb qui contient des headers et au moins une dylib, et qui ne donne pas la valeur "true" ou "false" au champ BuildDependsOnly. (Il est possible que, dans les versions postérieures de fink, ce message soit étendu aux cas des .deb contenant des headers et une bibliothèque statique). </p>
<p>
  The goal of the Shared Library Policy is to allow assure
  compatibility between libraries supplied by one package and
  libraries or programs that use them in a different package. Some
  packages may have shared libraries that are not designed to be used
  by other packages. Common situations include a suite of programs
  that come with a back-end library of utility functions or a program
  that comes with plugins to handle various features. Because these
  libraries are "private" to the package that has them, they do not
  require being packaged with separate -shlibs
  or <code>BuildDependsOnly</code> SplitOffs.
</p>
<p><b>Le champ Shlibs :</b></p>
<p>En sus de placer les bibliothèques partagées dans le bon paquet, suivant en cela la version 4 de cette règle, vous devez également déclarer toutes les bibliothèques partagées en utilisant le champ <code>Shlibs</code>. Ce champ contient une ligne distincte pour chaque bibliothèque partagée ; la ligne comprend le <code>nom d'installation</code> de la bibliothèque.

If the library is public, its <code>Shlibs</code> entry also
lists the <code>-compatibility_version</code>, versioned
dependency information specifying the Fink package which provides
this library at this compatibility version, and the library
architecture.

Cette architecture peut avoir pour valeur "32", "64", "32-64" ou même ne pas exister ; dans ce dernier cas, elle prend la valeur "32" par défaut. La dépendance doit être déclarée sous la forme <code> foo (&gt;= version-révision)</code> où <code>version-révision</code> correspond à la <b>première</b> version du paquet de Fink qui fournit cette bibliothèque (avec cette version de compatibilité). Par exemple, une déclaration :</p>
<pre>
  Shlibs: &lt;&lt;
    %p/lib/libbar.1.dylib 2.1.0 bar1 (&gt;= 1.1-2) 32
  &lt;&lt;
</pre>
<p>indique qu'une bibliothèque 32bit, dont le <code>nom d'installation</code> est %p/lib/libbar.1.dylib et <code>la version de compatibilité </code> est 2.1.0, a été installée à partir de la version 1.1-2 du paquet <b>bar1</b>. De plus, cette déclaration équivaut à la promesse du mainteneur qu'une bibliothèque 32 bit avec ce nom et une version de compatibilité au moins égale à 2.10 sera toujours présente dans les versions ultérieures du paquet <b>bar1</b>.</p>
<p>Notez l'utilisation de %p dans le nom de la bibliothèque, ce qui permet à tous les utilisateurs de Fink de trouver le bon <code>nom d'installation</code>, quel que soit le préfixe qu'ils ont choisi.</p>
<p>Quand un paquet est mis à jour, on copie tout simplement le champ <code>Shlibs</code> dans la nouvelle version/révision du paquet. L'exception à cette règle survient quand la <code>version de compatibilité</code> est incrémentée : dans ce cas, le numéro de version
dans les informations de dépendance doit être changé pour la version/révision courante (celle qui est la première à fournir la bibliothèque avec le nouveau numéro de version de compatibilité).</p>

<p>
The <code>Shlibs</code>
entry for a private library uses a different syntax:
</p>
<pre>
  Shlibs: &lt;&lt;
    !%p/lib/%N/libbar.1.dylib
  &lt;&lt;
</pre>
<p>The leading exclamation point indicates that this is a private library,
and since the other information is not relevant in this case, it is 
not included.</p>
<p>Note that in this example, the private shared library has been placed
in its own subdirectory <code>%N</code> of the 
<code>%i/lib</code> directory (which was named after the
package).  This is a recommended procedure for private libraries,
as an additional safety measure, to prevent other packages from accidentally
linking to this library.
</p>

<p><b>Mesures à prendre quand le numéro de version majeure change :</b></p>
<p>Si le numéro de version majeure change de N à M, vous devez créer deux nouveaux paquets barM et barM-shlibs. Le paquet barM-shlibs ne peut recouvrir le paquet barN-shlibs, puisque de nombreux utilisateurs installeront les deux simultanément. Dans le paquet barM, vous devez utiliser les dépendances :</p>
<pre>
  Conflicts: barN
  Replaces: barN
</pre>
<p>et vous devez modifier barN, de façon similaire, pour inclure les dépendances :</p>
<pre>
  Conflicts: barM
  Replaces: barM
</pre>
<p>Les utilisateurs verront alors barN et barM apparaître et disparaître au gré de la construction de divers paquets dépendant de l'une ou l'autre version de la bibliothèque partagée, tandis que barN-shlibs et barM-shlibs resteront installés de façon permanente.</p>
<p><b>Paquets contenant des fichiers binaires et des bibliothèques :</b></p>
<p>Quand un paquet en amont contient tout à la fois des fichiers binaires et des public bibliothèques, la construction des paquets fink doit être menée avec soin. Dans certains cas, les seuls fichiers binaires seront des fichiers du genre <code>foo-config</code>, qui sont censés n'être utilisés qu'à la compilation, et jamais à l'exécution. Dans ces cas, les binaires peuvent aller avec les headers dans le paquet <code>foo</code>.</p>
<p>Dans d'autres cas, les fichiers binaires seront nécessaires à d'autres paquets pendant l'exécution, et devront être regroupés dans un paquet fink séparé avec un nom du type <code>foo-bin</code>. Le paquet <code>foo-bin</code> doit dépendre du paquet <code>foo-shlibs</code>, et les mainteneurs d'autres paquets doivent être encouragés à utiliser :</p>
<pre>
  Depends: foo-bin
  BuildDepends: foo
</pre>
<p>ainsi la gestion de foo-shlibs sera assurée implicitement.</p>
<p>Néanmoins, la mise à jour pose un problème dans ce cas, puisque les utilisateurs ne seront pas invités à installer <code>foo-bin</code>. Pour résoudre ce problème, tant que tous les autres mainteneurs de paquets n'ont pas révisé leur paquets comme indiqué ci-dessus, votre paquet <code>foo</code> peut stipuler :</p>
<pre>
  Depends: foo-shlibs (= version.exacte), foo-bin
</pre>
<p>Ceci forcera l'installation de foo-bin sur la plupart des systèmes, jusqu'au moment où les mainteneurs de paquets auront mis à jour leurs paquets qui dépendent de <code>foo</code>.</p>

<p>
  As of fink-0.28.0 (released in January 2008), the format of
  the <code>Shlibs</code> entry for a "private" shared library has
  changed (see earlier discussion of the difference between a public
  and a private shared library). Note that the Shared Library Policy
  has always required all shared libraries to be listed; the change
  here is only in the syntax of the <code>Shlibs</code> field. Because
  this type of shared library is not designed to be used by external
  packages, there is no need to document its compatilibity or other
  versioning. Instead, an exclamation-mark is used.  For example,
  if <code>libquux.3.dylib</code> is
  the <code>install_name</code> of a private shared library, it would
  be listed as follows:
</p>
<pre>
  Shlibs: &lt;&lt;
    !%p/lib/libquux.3.dylib
  &lt;&lt;
</pre>

<h2><a name="perlmods">3.5 Modules Perl</a></h2>
<p>La réglementation de Fink pour les modules perl, effective à partir de mai 2003, a été modifiée en avril 2004.</p>
<p>Traditionnellement, les paquets Fink pour les modules Perl avaient un suffixe <code>-pm</code>, et étaient compilés en utilisant la directive <code>Type: perl</code>, qui place les modules Perl dans <code>/sw/lib/perl5</code> et/ou dans <code>/sw/lib/perl5/darwin</code>. Avec la nouvelle réglementation, cet emplacement n'est autorisé que pour les modules perl qui sont indépendants de la version de perl utilisée pour les compiler (et qui ne dépendent pas d'autres modules perl dépendants des versions).</p>
<p>Les modules Perl qui sont dépendants des versions sont les modules dits XS, qui contiennent fréquemment du code C compilé ainsi que des routines écrites en langage Perl. Il y a de nombreuses façons de les reconnaître, notamment par la présence d'un fichier avec un suffixe <code>.bundle</code>.</p>
<p>Un module perl qui dépend des versions doit être construit en utilisant un binaire dont le nom comporte le numéro de version de perl, comme <code>perl5.6.0</code>, et doit stocker ses fichiers dans des sous-répertoires des répertoires standards de perl ; les noms de ces sous-répertoires doivent comporter le numéro de version de perl, comme <code>/sw/lib/perl5/5.6.0</code> et <code>/sw/lib/perl5/5.6.0/darwin</code>. Par convention, les noms des paquets utilisent le suffixe <code>-pm560</code> pour un module Perl de version 5.6.0. Des conventions de stockage et de nommage similaires s'imposent pour les autres versions de perl, qui incluent perl 5.6.1 (dans les seules branches 10.2), perl 5.8.0 (dans les seules branches 10.3), perl 5.8.1, perl 5.8.4 et perl 5.8.6.</p>
<p>La directive <code>Type: perl 5.6.0</code> utilise automatiquement le binaire dont le nom comporte le numéro de version de perl et stocke les fichiers dans les bons sous-répertoires. (Cette directive est disponible à partir de la version 0.13.0 de fink).</p>
<p>Sous la réglementation de mai 2003, il était permis de créer un paquet <code>-pm</code>, qui est essentiellement un paquet "lot", qui charge la variante <code>-pm560</code> ou une autre variante existante. Cette stratégie est déconseillée sous la réglementation d'avril 2004, et sera complètement interdite après une période de transition. (La seule exception sera le paquet <code>storable-pm</code> qui doit se présenter sous cette forme pour le bootstrap).</p>
<p>À partir de la version 0.20.2 de fink, le paquet virtuel system-perl "fournit" automatiquement certains modules perl quand la version de Perl présente sur le système est supérieure ou égale à 5.8.0. Dans le cas de system-perl-5.8.1-1, ces modules sont les suivants : <b>attribute-handlers-pm581, cgi-pm581, digest-md5-pm581, file-spec-pm581, file-temp-pm581, filter-simple-pm581, filter-util-pm581, getopt-long-pm581, i18n-langtags-pm581, libnet-pm581, locale-maketext-pm581, memoize-pm581, mime-base64-pm581, scalar-list-utils-pm581, test-harness-pm581, test-simple-pm581, time-hires-pm581.</b> (Cette liste était légèrement différente dans la version 0.20.1 de fink ; les mainteneurs de paquet sont invités à vérifier que c'est bien sur la nouvelle liste qu'ils se basent).</p>
<p>Effective à partir de la version 0.13.0 de fink, la commande <code>fink validate</code>, quand elle est appliquée à un fichier <code>.deb</code>, teste si le paquet fink est un module XS qui a été installé dans un répertoire dont le nom ne comporte pas le numéro de version, et, génère, dans ce cas, une alerte.</p>
<p>Les utilisateurs peuvent avoir plusieurs versions de perl installées au même moment. C'est pourquoi tout paquet de module basé sur une version de perl doit être écrit de tel sorte qu'il permette d'installer concurremment une autre version du même module. Il faut donc prendre soin d'éviter tout conflit d'installation dû à des noms identiques lors de l'installation des pages de manuel, des binaires ou autres scripts exécutables. Il est interdit de mettre dans un paquet un nom de fichier se terminant par -pm<b>XYZ</b> si le chemin complet du fichier est identique dans une autre version <b>XYZ</b>. L'utilisation de <code>Replaces</code> pour permettre de remplacer des fichiers de nom identique dans des modules correspondant à des versions de perl différentes n'est plus autorisée. En ce qui concerne les pages de manuel, voici la solution de remplacement à partir de mars 2005: on a définit dans Fink des emplacements différents pour le MANPATH : <code>%p/lib/perl5/X.Y.Z/man</code> pour chaque version perl-X.Y.Z. Il n'est plus besoin de créer des paquets SplitOff -man ou -doc mutuellement exclusifs. Par exemple, pour éviter des conflits entre uri-pm581 et uri-pm586, la page de manuel nommée <code>URI.3pm</code> est installée sous le nom <code>%p/lib/perl5/5.8.1/man/man3/URI.3pm</code> pour la version 5.8.1 et sous le nom <code>%p/lib/perl5/5.8.6/man/man3/URI.3pm</code> pour la version 5.8.6. Notez que les scripts par défaut générés par <code>Type: perl X.Y.Z</code> n'ont pas changé, vous devez donc installer les man pages manuellement dans <code>InstallScript</code>. Si, par ailleurs, vous n'utilisez pas un script hautement personnalisé, vous pouvez toujours utiliser le script par défaut, puis déplacer les fichiers manuellement :</p>
<pre>
%{default_script}
mv %i/share/man %i/lib/perl5/5.8.1
</pre>
<p>
Cela déplacera toutes les pages de manuel. Si vous ne désirez déplacer qu'une section des pages de manuel (par exemple, la section 3, page de manuel du module, mais pas la section, page de manuel des scripts), vous pouvez utiliser l'approche suivante :</p>
<pre>
%{default_script}
mkdir -p %i/lib/perl5/5.8.1/man
mv %i/share/man/man3 %i/lib/perl5/5.8.1/man
</pre>
<p>Si votre paquet comporte des exécutables, par exemple des scripts démo ou des utilitaires dans <code>%p/bin</code>, vous avez plusieurs options. L'une d'entre elle est de mettre ces fichiers (et leurs pages de manuel et autres fichiers associés) dans un paquet splitoff %N-bin. L'utilisation des champs <code>Conflicts</code> et <code>Replaces</code> assurera que l'installation des différentes versions de perl de ces paquets, qui contiennent des fichiers de même nom, est mutuellement exclusive. L'utilisateur peut installer de nombreuses versions différentes des modules de runtime basées sur des versions différentes de perl et décider laquelle choisir à tout moment pour exécuter un script. Par exemple, Tk.pm comporte un exécutable <code>ptksh</code>. La collection des paquets tk-pm* peut être construite de la façon suivante :</p>
<pre>
Info2: &lt;&lt;
Package: tk-pm%type_pkg[perl]
Type: perl (5.8.1 5.8.4 5.8.6)
InstallScript: &lt;&lt;
  %{default_script}
  mkdir -p %i/lib/perl5/%type_raw[perl]/man
  mv %i/share/man/man3 %i/lib/perl5/%type_raw[perl]/man
&lt;&lt;
SplitOff: &lt;&lt;
  Package: %N-bin
  Depends: %N
  Conflicts: %{Ni}5.8.1, %{Ni}5.8.4, %{Ni}5.8.6
  Replaces: %{Ni}5.8.1, %{Ni}5.8.4, %{Ni}5.8.6
  Files: bin share/man/man1
&lt;&lt;
&lt;&lt;
</pre>
<p>Une autre solution est de renommer les scripts et leurs pages de manuel de façon à y inclure la version de perl. Cette méthode assure qu'il n'y a jamais de conflit, il n'est donc pas besoin d'utiliser des splitoffs %N-bin mutuellement exclusifs :
</p>
<pre>
Info2: &lt;&lt;
Package: tk-pm%type_pkg[perl]
Type: perl (5.8.1 5.8.4 5.8.6)
InstallScript: &lt;&lt;
  %{default_script}
  mkdir -p %i/lib/perl5/%type_raw[perl]/man
  mv %i/share/man/man3 %i/lib/perl5/%type_raw[perl]/man
  mv %i/bin/ptksh %i/bin/ptksh%type_raw[perl]
  mv %i/share/man/man1/ptksh.1 %i/share/man/man1/ptksh%type_raw[perl].1
&lt;&lt;
&lt;&lt;
</pre>
<p>L'utilisateur accède à la version de ptksh correspondant à la version de perl désirée. On peut aussi utiliser <code>update-alternatives</code> pour permettre aux utilisateurs d'accéder à ces versions par leurs noms génériques (pas de mention de version de perl dans le nom).</p>
<p>De même, à partir de mars 2005, l'emplacement des pages de manuel et des modules installés par les paquets fink pour perl lui-même (paquets perlXYZ et perlXYZ-core pour des versions de perl différentes de celle fournie par Apple) a changé. Par conséquent, aucun autre paquet de fink fournissant des versions de mises à jour des modules core perl ne doit énumérer des paquets perlXYZ ou perlXYZ-core dans un champ <code>Replaces</code>.</p>

<h2><a name="emacs">3.6 Règles Emacs</a></h2>
<p>Le projet Fink a choisi de suivre les règles du projet Debian en ce qui concerne emacs, avec quelques différences. (Vous trouverez les règles Debian sur <a href="http://www.debian.org/doc/packaging-manuals/debian-emacs-policy">http://www.debian.org/doc/packaging-manuals/debian-emacs-policy</a>). Il existe deux différences dans les règles de Fink. Premièrement, ces règles ne s'appliquent, à l'heure actuelle, qu'aux paquets 
<code>emacs21</code>, <code>emacs22</code> et <code>emacs21</code> de fink. (Ceci pourra changer à l'avenir). Deuxièmement, contrairement aux règles Debian, les paquets Fink peuvent installer des objets directement dans /sw/share/emacs/site-lisp.</p>





<h2><a name="sources">3.7 Source Policy</a></h2>
    <p>Sources should normally be downloaded from the location(s) that the upstream
    developer(s) use, and any modifications for Fink should be done through the use
    of a PatchFile and/or a PatchScript.  Do not make changes manually and use a changed
    source archive as a <code>Source</code> in your Fink packaging.</p>
    <p>If a VCS checkout (e.g. from <b>git</b> or <b>svn</b>) is to be used, e.g.
    because a project doesn't do formal releases, or a fix for a particular issue has
    been added between releases of a package, an acceptable source can be generated
    via the following method:</p>
    <ol>
        <li>Check out the package, preferably at a definite revision of the VCS.</li>
        <li>Make an archive from the VCS checkout (e.g. <b>zip</b>, <b>tar</b>, <b>tar.gz</b>,
        or <b>tar.bz2</b>).
            <p>Give the tarball a unique version.  For example, you can include the VCS revision in the archive name, e.g.
            <code>foo-0svn1234.tar.gz</code> for a package that doesn't make releases, or
            <code>bar-1.2.3+svn4567.tar.bz2</code> for a Fink package which is between
            upstream releases.</p></li>
        <li>Use the same <code>Version</code> in your <code>.info</code> file.</li>
        <li>It is also useful to put the commands that you ran to generate the source tarball in the
        <code>DescPackaging</code> field.</li>
        <li>Upload the tarball to a public download site where users can use <code>fink</code> to download it.
        If you don't have ready access to one, ask on the
        <a href="mailto:fink-devel@lists.sourceforge.net">Fink developers mailing list</a> or
        <a href="https://web.libera.chat/#fink">the #fink IRC channel</a>,
        and someone should be able to help.</li>
    </ol>


<h2><a name="downloading">3.8 File Download Policy</a></h2>
    <p>Packages are not to download any files during the unpack, patch, compile, install,
    or build phases of the <a href="reference.php?phpLang=fr#build">build process</a>.  Any large patches (i.e.
    larger than can be accommodated conveniently in a PatchFile) that need to be applied should
    set up as additional Sources in accordance with the <a href="policy.php?phpLang=fr#sources">
    Source Policy.</a></p>
    <p>Packages may download data in a PostInstScript after they have been installed on the system,
    under some limited circumstances:</p>
    <ul>
        <li>No updates to the package itself are allowed.</li>
        <li>The nature of the data is such that it couldn't easily be packaged for Fink.  E.g.
        virus definitions for <code>clamav</code> can be downloaded during this phase,
        because they change continually.</li>
    </ul>
    <p>If you are unsure, contact <a href="mailto:fink-core@lists.sourceforge.net">the Fink Core
    Team</a>.</p> 





<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="fslayout.php?phpLang=fr">4. Organisation des fichiers</a></p>
<?php include_once "../../footer.inc"; ?>


