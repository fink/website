<?
$title = "Paquets - Règles";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/09/07 15:35:17';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="next" href="fslayout.php?phpLang=fr" title="Organisation des fichiers"><link rel="prev" href="format.php?phpLang=fr" title="Descriptions de paquets">';


include_once "header.fr.inc";
?>
<h1>Paquets - 3. Règles de distribution des paquets</h1>



<h2><a name="licenses">3.1 Licences de paquets</a></h2>
<p>
Les paquets inclus dans Fink ont différents types de licences.
La plupart d'entre elles stipulent une restriction sur la redistribution des sources complètes et particulièrement sur la distribution des binaires.
Certains paquets ne peuvent être inclus dans la distribution binaire de Fink à cause de ces licences restrictives.
C'est pourquoi il est essentiel que les mainteneurs de paquets vérifient,  scrupuleusement, les licences de leurs paquets.
</p>
<p>
Chaque paquet distribué en tant que binaire doit contenir une copie de la licence.
Elle doit être installée dans le répertoire de documentation, c'est à dire dans <code>%p/share/doc/%n</code>.
(Dans InstallScript, il faut, évidemment, utiliser %i au lieu de %p.
Le champ DocFiles gère les détails automatiquement.)
S'il n'y a pas de licence explicite dans le source original, placez un fichier texte contenant une note à propos du statut du paquet.
La plupart des licences requièrent que celle-ci accompagne toute distribution.
La règle de Fink est de toujours faire ainsi, même si ce n'est pas explicitement requis.
</p>
<p>
Pour automatiser le plus possible la maintenance de la distribution binaire, tout paquet distribué doit avoir un champ <code>License</code>.
Ce champ indique la nature de la licence et est utilisé pour décider quels paquets font partie de la distribution et quels paquets doivent en être exclus.
Le champ ne peut exister que si les termes réels de la licence sont inclus dans le paquet binaire, comme expliqué ci-dessus.
</p>
<p>
Pour que le champ <code>License</code> ait une utilité, n'utilisez qu'une seule des valeurs prédéfinies suivantes.
Si vous construisez un paquet qui ne rentre pas dans ces catégories, demandez de l'aide sur la liste des développeurs.
</p>
<ul>

<li><code>GPL</code> - la licence générale publique GNU.
Cette licence requiert que le source soit accessible au même endroit que le binaire.</li>

<li><code>LGPL</code> - la licence publique GNU moins générale.
Cette licence requiert que le source soit accessible au même endroit que le binaire.</li>

<li><code>GPL/LGPL</code> - c'est un cas spécial pour les paquets dans lesquels une partie est sous licence GPL (par exemple les exécutables) et une autre partie est sous licence LGPL (par exemple les librairies).</li>

<li><code>BSD</code> - pour les licences style BSD.
Ceci inclue la licence BSD dite "original", la licence BSD "modified" et la licence MIT. La licence Apache compte aussi parmi les licences BSD. Avec ces licences, la distribution du code source est optionnelle.
</li>

<li><code>Artistic</code> - pour la licence "Artistic" et ses dérivées.</li>

<li><code>Artistic/GPL</code> - licence duale, combinée Artistic/GPL.</li> 

<li><code>GNU Free Documentation License</code> et <code>Linux
Documentation Project</code> - si la documentation incluse dans un paquet l'est explicitement sous une de ces licences, alors ce sera indiqué par l'ajout de <code>/GFDL</code> ou <code>/LDP</code> au code de la licence, ce qui donne l'une des combinaisons autorisées suivantes : "GFDL", "GPL/GFDL", "LGPL/GFDL", "GPL/LGPL/GFDL", "LDP", ou "GPL/LGPL/LDP".
</li>

<li><code>OSI-Approved</code> - pour les autres licences Open Source approuvées par l'Initiative Open Source (OSI) <a href="http://www.opensource.org/"></a>. L'une des règles de l'OSI est que la libre distribution de binaires et de sources est autorisée. Ce code peut aussi servir de cadre aux paquets à licence duale.</li>

<li><code>Restrictive</code> - pour les licences restrictives.
Utilisez ceci pour les paquets qui sont accessibles en tant que sources à usage libre auprès de l'auteur, mais dont la libre redistribution n'est pas autorisée. </li>

<li><code>Restrictive/Distributable</code> - pour des licences restrictives qui admettent une distribution des binaires et du source.
Utilisez ceci pour les paquets qui sont accessibles en tant que sources auprès de l'auteur, autorisent la distribution du source et des binaires, mais ont des restrictions qui en font des licences non open-sources.</li>

<li><code>Commercial</code> - pour des licences restrictives de type commercial.
Utilisez ceci pour des paquets  de type commercial ( par exemple graticiels, partagiciels qui n'autorisent pas la libre redistribution du source ou des binaires.</li>

<li><code>Public Domain</code> - pour des paquets qui sont dans le domaine public, c'est-à-dire que l'auteur a abandonné ses droits sur le code. Ces paquets n'ont aucune licence d'aucune sorte et tout un chacun peut en faire ce que bon lui semble.</li>
</ul>


<h2><a name="prefix">3.2 Interférence avec le système de base</a></h2>
<p>
Fink est une distribution additionnelle qui est installée dans un répertoire distinct du système de base.
Il est essentiel qu'un paquet n'installe aucun fichier en dehors du répertoire de Fink.
</p>
<p>
Il peut y avoir des exceptions quand on ne peut faire autrement, par exemple avec XFree86.
Dans ce cas, le paquet doit tester l'existence de fichiers avant l'installation et refuser de s'installer si cela amène à écraser des fichiers déjà existants.
Le paquet doit s'assurer que tous les fichiers qu'il aura installés en dehors du répertoire de Fink seront supprimés lorsque le paquet lui-même sera éliminé, ou que ces fichiers ne causeront aucun problème s'ils sont laissés sur place (c'est-à-dire qu'ils devront tester l'existence des binaires avant de les appeler, etc...).
</p>


<h2><a name="sharedlibs">3.3 Librairies partagées</a></h2>
<p>
Fink a de nouvelles règles en ce qui concerne les librairies partagées, règles qui prennent effet à compter de février 2002.
Cette partie de la documentation donne des explications sur la version 4 de ces règles, qui coïncide avec la publication de la distribution 0.5.0 de Fink.
Nous commencerons par un bref résumé, puis nous passerons à une revue de détails.
</p><p>
Tout paquet qui construit des librairies partagées et qui, soit (1) est placé  dans la branche stable, soit (2) est un nouveau paquet de Fink, doit gérer ses librairies partagées conformément aux règles de Fink. Ceci signifie :</p>
<ul>
<li>vérifier, à l'aide de <code>otool -L</code>, que le nom d'installation de chaque librairie, ses numéros de versions de compatibilité et actuels sont corrects</li>
<li>mettre les librairies partagées dans un paquet séparé (exception faite pour les liens de libfoo.dylib vers nom d'installation), et inclure le champ <code>Shlibs</code> dans ce paquet</li>
<li>mettre les headers et les liens finaux venant de libfoo.dylib dans un paquet caractérisé par <code>BuildDependsOnly: True</code>, et prévoir qu'aucun autre paquet ne dépendra de lui.</li>
</ul>
<p>
Un mainteneur, qui a de bonnes raisons de s'écarter de ces règles et ne scinde pas le paquet, devra expliquer pourquoi dans le champ DescPackaging.
</p><p>
Pour certains paquets, tout peut être fait avec un paquet principal et un paquet -shlibs ; dans d'autres cas, vous aurez besoin d'un troisième paquet. Le nouveau champ <code>SplitOff</code> facilite ce processus.
</p><p>
Quand trois paquets sont nécessaires, il y a deux façons différentes de les nommer, suivant que les librairies (option 1) ou les binaires (option 2) sont les fonctionnalités les plus importantes du paquet. 
Pour l'option 1, utilisez le schéma suivant :
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Paquet</th><th align="left">Contenu</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>Librairies partagées</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>Headers</p></td></tr><tr valign="top"><td><code>foo-bin</code></td><td><p>Binaires, etc...</p></td></tr></table>

<p>Pour l'option 2, utilisez :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Paquet</th><th align="left">Contenu</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>Librairies partagées</p></td></tr><tr valign="top"><td><code>foo-dev</code></td><td><p>Headers</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>Binaires, etc...</p></td></tr></table>

<p>
Avec l'option 2, il est plus difficile de mettre à jour un paquet existant : quand vous réalisez la mise à jour, vous devez ajouter <code>BuildDepends: foo-dev</code> à chaque paquet qui a un champ <code>Depends: foo</code>.
Autre problème de mise à jour à garder à l'esprit : un paquet qui dépend indirectement du vôtre (par l'intermédiaire d'un paquet tiers) peut nécessiter qu'on lui ajoute <code>BuildDepends: foo</code> ou <code>BuildDepends: foo-dev</code> pour assurer une mise à jour correcte. C'est à vous de veiller à ce que que le champ <code>BuildDepends</code> soit renseigné si nécessaire.
</p>
<p><b>Règles détaillées</b></p>
<p>
Nous allons désormais discuter de tout cela en détails, premièrement nous aborderons les règles applicables aux logiciels nouvellement portés, puis nous nous tournerons vers la question de la mise à  jour de paquets existant dans fink.  Comme exemples des règles en action, voir les paquets libpng, libjpeg et libtiff.
</p><p>
Les logiciels portés sur Darwin doivent, autant que possible, construire des librairies partagées.
(Les mainteneurs de paquets sont libres de construire des librairies statiques, si cela s'avère plus approprié pour leurs paquets; ils peuvent aussi soumettre des paquets contenant uniquement des librairies statiques, s'ils le souhaitent.)
Quand on construit des librairies partagées, <b>deux</b> paquets - nommés foo et foo-shlibs -, étroitement liés, doivent être construits. Les librairies partagées vont dans foo-shlibs, et les headers dans foo. 
Ces deux paquets peuvent être réalisés avec un seul fichier .info, en utilisant le champ <code>SplitOff</code>, comme indiqué ci-dessous.  
(En fait, il est souvent nécessaire de construire plus de deux paquets à partir du source, et cela peut être fait en utilisant <code>SplitOff2</code>, <code>SplitOff3</code>, etc...)
</p><p>
Chaque paquet logiciel pour lequel des librairies partagées peuvent être construites doit avoir un <b>numéro de version majeure</b> N.  Le numéro de version majeure n'est censé changer que lorsqu'un changement irréversible se produit dans l'API de la librairie.
Fink utilise la convention de nommage suivante : si le nom en amont du paquet est bar, alors les paquets fink sont appelés barN et barN-shlibs. (Ceci n'est appliqué rigoureusement qu'à de nouveaux paquets ou lorsque le numéro de version majeure change).
Par exemple, le numéro de version majeure pour le paquet pré-existant libpng était 2, mais les versions récentes de la librairie ont pour numéro de version majeure 3. Il y a donc, maintenant, 4 paquets fink pour gérer ceci : libpng, libpng-shlibs, libpng3, libpng3-shlibs.
Seul libpng ou libpng3 peut être installé à un moment donné, mais libpng-shlibs et libpng3-shlibs peuvent être installés en même temps.
(Notez que deux fichiers .info suffisent à construire ces quatre paquets.)
</p><p>
La librairie partagée elle-même et certains fichiers liés seront placés 
dans le paquet barN-shlibs ; les fichiers "include" et un certain nombre d'autres fichiers seront placés dans le paquet barN. Il ne peut y avoir de recouvrement de fichiers entre ces deux paquets, et tout ce qui est placé dans barN-shlibs doit avoir un nom chemin qui, d'une façon ou d'une autre, contienne le numéro de version majeure N. Dans de nombreux cas, votre paquet aura besoin de certains fichiers à l'exécution, fichiers qui sont généralement installés dans <code>%i/lib/bar/</code> ou <code>%i/share/bar/</code> ; vous devrez adapter les chemins d'installation à <code>%i/lib/bar/N/</code> ou <code>%i/share/bar/N/</code>.
</p><p>
Tous les autres paquets dépendant de bar, version majeure N, devront utiliser les dépendances :
</p>
<pre>
  Depends: barN-shlibs
  BuildDepends: barN
</pre>
<p>
Quand ce système sera complètement opérationnel, il ne sera plus permis à un autre paquet de dépendre de barN lui-même. (Pour des raisons de compatibilité arrière, de telles dépendances sont autorisées pour des paquets pré-existants.) Ceci est signalé aux autres développeurs par un champ de type booléen :
</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>
dans la description du paquet barN.
</p><p>
Si votre paquet inclut à la fois des librairies partagées et des binaires, et si les binaires doivent être présents à l'exécution (et pas seulement à la compilation), alors les binaires doivent être regroupés dans un troisième paquet, qui peut être appelé barN-bin.
Les autres paquets peuvent dépendre de barN-bin comme de barN-shlibs.
</p><p>
Lors de la construction de librairies partagées de version majeure N, il est important que le "nom d'installation" soit <code>%p/lib/bar.N.dylib</code>.  
(Vous pouvez trouver le nom d'installation en exécutant <code>otool -L</code> sur votre librairie.)
Le fichier librairie réel doit être installé sous le nom de :
</p>
<pre>
  %i/lib/bar.N.x.y.dylib
</pre>
<p>
et votre paquet doit créer des liens symboliques :
</p>
<pre>
  %i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
</pre>
<p>Si la librairie statique est aussi construite, elle doit être installée sous le nom de :
</p>
<pre>
  %i/lib/bar.a
</pre>
<p>
Si le paquet utilise libtool, ceci est généralement géré automatiquement, mais, dans tous les cas,  vous devez vérifier que tout s'est passé correctement.
Vous devez aussi vérifier que la version courante et la version de compatibilité sont définies de façon appropriée à vos librairies partagées. (On peut trouver les numéros de version avec la commande 
<code>otool -L</code>.)
</p><p>
Les fichiers sont scindés entre les deux paquets comme suit :
</p>
<ul>
<li>  dans le paquet barN-shlibs :
<pre>
  %i/lib/bar.N.x.y.dylib
  %i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar/N/*
  %i/share/bar/N/*
  %i/share/doc/barN-shlibs/*
</pre></li>
<li>  dans le paquet barN :
<pre>
  %i/include/*
  %i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar.a
  %i/share/doc/barN/*
  autres fichiers, si nécessaire
</pre></li></ul>
<p>
Notez que les deux paquets doivent contenir des informations sur la licence, mais que les répertoires contenant les fichiers de documentation (DocFiles) sont différents.
</p><p>
Tout ceci est facile à réaliser en utilisant le champ <code>SplitOff</code>. Voici comment l'exemple ci-dessus serait (partiellement) implémenté :
</p>
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
  Files: lib/bar.N.x.y.dylib lib/bar.N.dylib lib/bar/N
  DocFiles: COPYING
&lt;&lt;
</pre>
<p>
Durant l'exécution du champ <code>SplitOff</code>, les fichiers et les répertoires spécifiés sont déplacés du répertoire d'installation %I du paquet principal vers le répertoire d'installation %i du paquet splitoff.  (Il y a une convention similaire pour les noms : %N est le nom du paquet principal, et %n est le nom du paquet actif.)
La commande <code>DocFiles</code> place ensuite une copie de la documentation dans <code>%i/share/doc/barN-shlibs</code>.
</p><p>
Notez que nous avons inclus la version courante exacte de barN-shlibs comme dépendance du paquet principal barN (qui peut être abrégé en %N-shlibs (= %v-%r) ).
Ceci assure que les versions correspondent, et garantit aussi que barN "hérite" automatiquement de toutes les dépendances de barN-shlibs.
</p>
<p><b>Le champ BuildDependsOnly</b>
</p><p>
Lors de mises à jour de librairies, il est souvent nécessaire d'avoir deux versions des headers pendant une période de transition. L'une d'entre elles est utilisée pour compiler certaines choses, l'autre pour en compiler d'autres. C'est pouquoi, les paquets contenant des headers doivent être construits avec soin. Si foo-dev et bar-dev contiennent tous les deux des headers qui se recouvrent, alors foo-dev doit déclarer :
</p>
<pre>
  Conflicts: bar-dev
  Replaces: bar-dev
</pre>
<p>de même, bar-dev déclare des Conflicts/Replaces sur foo-dev.
</p><p>
De plus, les deux paquets doivent déclarer :
</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>Ceci empêche d'autres paquets de dépendre de foo-dev ou de bar-dev, car de telles dépendances enrayeraient le mécanisme du Conflicts/Replaces.
</p><p>
Il existe certains paquets contenant des headers et pour lesquels il ne semble pas approprié de déclarer une valeur "true" pour BuildDependsOnly to be true. Dans ce cas, le paquet doit déclarer : 
</p>
<pre>
  BuildDependsOnly: False
</pre>
<p>et la raison pour laquelle cela est fait doit être mentionnée dans le champ DescPackaging.
</p><p>
Le champ BuildDependsOnly ne doit être mentionné dans le fichier .info du paquet que si ce paquet contient des headers installés dans /sw/include.
</p><p>
À partir de la version 0.20.5 de fink, "fink validate" affichage un message pour tout .deb qui contient des headers et au moins une dylib, et qui ne donne pas la valeur "true" ou "false" au champ BuildDependsOnly. (Il est possible que, dans les versions postérieures de fink, ce message soit étendu aux cas des .deb contenant des headers et une librairie statique). 
</p>
<p><b>Le champ Shlibs :</b>
</p><p>
En sus de placer les librairies partagées dans le bon paquet, suivant en cela la version 4 de cette règle, vous devez également déclarer toutes les librairies partagées en utilisant le champ <code>Shlibs</code>.
Ce champ contient une ligne distincte pour chaque librairie partagée ; la ligne comprend le <code>nom d'installation</code> de la librairie, la <code>version de compatibilité</code>, et des informations de dépendance qui indiquent le paquet de Fink qui fournit cette librairie à cette version de compatibilité.
La dépendance doit être déclarée sous la forme <code> foo (&gt;= version-révision)</code> où <code>version-révision</code> correspond à la <b>première</b> version du paquet de Fink qui fournit cette librairie (avec cette version de compatibilité). Par exemple, une déclaration :</p>
<pre>
  Shlibs: &lt;&lt;
    %p/lib/bar.1.dylib 2.1.0 bar1 (&gt;= 1.1-2)
  &lt;&lt;
</pre>
<p>indique qu'une librairie, dont le <code>nom d'installation</code> est %p/lib/bar.1.dylib et <code>la version de compatibilité </code> est 2.1.0, a été installée à partir de la version 1.1-2 du paquet <b>bar1</b>.  De plus, cette déclaration équivaut à la promesse du mainteneur qu'une librairie avec ce nom et une version de compatibilité au moins égale à 2.10 sera toujours présente dans les versions ultérieures du paquet <b>bar1</b>.
</p><p>
Notez l'utilisation de %p dans le nom de la librairie, ce qui permet à tous les utilisateurs de Fink de trouver le bon <code>nom d'installation</code>, quel que soit le préfixe qu'ils ont choisi.
</p><p>
Quand un paquet est mis à jour, on copie tout simplement le champ <code>Shlibs</code> dans la nouvelle version/révision du paquet. L'exception à cette règle survient quand la <code>version de compatibilité</code> est incrémentée : dans ce cas, le numéro de version
dans les informations de dépendance doit être changé pour la version/révision courante (celle  qui est la première à fournir la librairie avec le nouveau numéro de version de compatibilité).
</p><p>
<b>Mesures à prendre quand le numéro de version majeure change :</b>
</p><p>
Si le numéro de version majeure change de N à M, vous devez créer deux nouveaux paquets barM et barM-shlibs. Le paquet barM-shlibs ne peut recouvrir le paquet barN-shlibs, puisque de nombreux utilisateurs installeront les deux simultanément.
Dans le paquet barM, vous devez utiliser les dépendances :
</p>
<pre>
  Conflicts: barN
  Replaces: barN
</pre>
<p>
et vous devez modifier barN, de façon similaire, pour inclure les dépendances :
</p>
<pre>
  Conflicts: barM
  Replaces: barM
</pre>
<p>
Les utilisateurs verront alors barN et barM apparaître et disparaître au gré de la construction de divers paquets dépendant de l'une ou l'autre version de la librairie partagée, tandis que barN-shlibs et barM-shlibs resteront installés de façon permanente.
</p><p>
<b>Mise à jour d'un paquet de fink existant :</b>
</p><p>
Le meilleur moyen de mettre à jour un paquet fink existant qui installe des librairies, qu'elles soient statiques ou partagées, est de créer une nouvelle version foo du paquet, accompagné d'un nouveau paquet foo-shlibs, qui satisfait aux règles ci-dessus.
Si des librairies partagées (ou d'autres fichiers présents maintenant dans foo-shlibs) étaient installées auparavant, ces nouveaux paquets doivent stipuler : 
</p>
<pre>
  Replaces: foo (&lt;&lt; earliest.compliant.version)
</pre>
<p>
de façon que la mise à jour soit transparente pour les utilisateurs.
(Vous <b>ne</b> devez <b>pas</b> utiliser "Conflicts: foo", car cela empêche la mise à jour.)
</p><p>
Après mise à jour, les paquets qui stipulent "Depends: foo" continueront à fonctionner normalement. Toutefois, vous devez contacter les mainteneurs de tous ces paquets fink et les presser de modifier leurs paquets pour qu'ils stipulent, dès que possible, "Depends: foo-shlibs, BuildDepends: foo".  
Vous ne pourrez pas créer de nouveaux paquets fooM, fooM-shlibs qui implémentent une version majeure de la librairie partagée tant qu'ils ne l'auront pas fait.
</p><p>
Les paquets fink existants qui n'ont pas utilisé le bon nom d'installation ou qui n'ont pas utilisé un nom correct ou des liens symboliques pour les libraires partagées doivent être mis à jour soigneusement, au cas par cas.
Si vous êtes embarrassé pour choisir une stratégie de mise à jour rendant vos paquets compatibles avec les nouvelles règles, parlez-en sur la liste de diffusion fink-devel.
</p><p>
<b>Paquets contenant des fichiers binaires et des librairies :</b>
</p><p>
Quand un paquet en amont contient tout à la fois des fichiers binaires et des librairies, la construction des paquets fink doit être menée avec soin. Dans certains cas, les seuls fichiers binaires seront des fichiers du genre <code>foo-config</code>, qui sont censés n'être utilisés qu'à la compilation, et jamais à l'exécution. Dans ces cas, les binaires peuvent aller avec les headers dans le paquet <code>foo</code>.
</p><p>
Dans d'autres cas, les fichiers binaires seront nécessaires à d'autres paquets pendant l'exécution, et devront être regroupés dans un paquet fink séparé avec un nom du type <code>foo-bin</code>.
Le paquet <code>foo-bin</code> doit dépendre du paquet <code>foo-shlibs</code>, et les mainteneurs d'autres paquets doivent être encouragés à utiliser :
</p>
<pre>
  Depends: foo-bin
  BuildDepends: foo
</pre>
<p>
ainsi la gestion de foo-shlibs sera assurée implicitement.
</p><p>
Néanmoins, la mise à jour pose un problème dans ce cas, puisque les utilisateurs ne seront pas invités à installer <code>foo-bin</code>. Pour résoudre ce problème, tant que tous les autres mainteneurs de paquets n'ont pas révisé leur paquets comme indiqué ci-dessus, votre paquet <code>foo</code> peut stipuler :
</p>
<pre>
  Depends: foo-shlibs (= exact.version), foo-bin
</pre>
<p>
Ceci forcera l'installation de foo-bin sur la plupart des systèmes, jusqu'au moment où les mainteneurs de paquets auront mis à jour leurs paquets qui dépendent de <code>foo</code>.
</p>


<h2><a name="perlmods">3.4 Modules Perl</a></h2>
<p>La réglementation de Fink pour les modules perl, effective à partir de mai 2003, a été modifiée en avril 2004.
</p><p>
Traditionnellement, les paquets Fink pour les modules Perl avaient un suffixe <code>-pm</code>, et  étaient compilés en utilisant la directive <code>Type: perl</code>, qui place les modules Perl dans <code>/sw/lib/perl5</code> et/ou dans <code>/sw/lib/perl5/darwin</code>.  Avec la nouvelle réglementation, cet emplacement n'est autorisé que pour les modules perl qui sont indépendants de la version de perl utilisée pour les compiler (et qui ne dépendent pas d'autres modules perl dépendants des versions).
</p><p>
Les modules Perl qui sont dépendants des versions sont les modules dits XS, qui contiennent fréquemment du code C compilé ainsi que des routines écrites en langage Perl.
Il y a de nombreuses façons de les reconnaître, notamment par la présence d'un fichier avec un suffixe <code>.bundle</code>.
</p><p>
Un module perl qui dépend des versions doit être construit en utilisant un binaire dont le nom comporte le numéro de version de perl, comme <code>perl5.6.0</code>, et doit stocker ses fichiers dans des sous-répertoires des répertoires standards de perl ; les noms de ces sous-répertoires doivent comporter le numéro de version de perl, comme <code>/sw/lib/perl5/5.6.0</code> et <code>/sw/lib/perl5/5.6.0/darwin</code>.
Par convention, les noms des paquets utilisent le suffixe <code>-pm560</code> pour un module Perl de version 5.6.0.  Des conventions de stockage et de nommage similaires s'imposent pour les autres versions de perl, qui incluent perl 5.6.1 (dans les seules branches 10.2), perl 5.8.0, perl 5.8.1 et perl 5.8.4 (bientôt disponible).  
</p><p>
La directive <code>Type: perl 5.6.0</code> utilise automatiquement le binaire dont le nom comporte le numéro de version de perl et stocke les fichiers dans les bons sous-répertoires.
(Cette directive est disponible à partir de la version 0.13.0 de fink.)
</p><p>
Sous la réglementation de mai 2003, il était permis de créer un paquet <code>-pm</code>, qui est essentiellement un paquet "lot", qui charge la variante <code>-pm560</code> ou une autre variante existante.
Cette stratégie est déconseillée sous la réglementation d'avril 2004, et sera complètement interdite après une période de transition. (La seule exception sera le paquet <code>storable-pm</code> qui doit se présenter sous cette forme pour le bootstrap).
</p>
<p>À partir de la version 0.20.2 de fink, le paquet virtuel system-perl "fournit" automatiquement certains modules perl quand la version de Peerl présente sur le système est supérieure ou égale à 5.8.0. Dans le cas de system-perl-5.8.1-1, ces modules sont les suivants : 
<b>attribute-handlers-pm581, cgi-pm581, digest-md5-pm581, file-spec-pm581, file-temp-pm581, filter-simple-pm581, filter-util-pm581, getopt-long-pm581, i18n-langtags-pm581, libnet-pm581, locale-maketext-pm581, memoize-pm581, mime-base64-pm581, scalar-list-utils-pm581, test-harness-pm581, test-simple-pm581, time-hires-pm581.</b>
(Cette liste était légèrement différente dans la version 0.20.1 de fink ; les mainteneurs de paquet sont invités à vérifier que c'est bien sur la nouvelle liste qu'ils se basent). 
</p>
<p>
Effective à partir de la version 0.13.0 de fink, la commande <code>fink validate</code>, quand elle est appliquée à un fichier <code>.deb</code>, teste si le paquet fink est un module XS qui a été installé dans un répertoire dont le nom ne comporte pas le numéro de version, et, génère, dans ce cas, une alerte.
</p>


<h2><a name="emacs">3.5 Règles Emacs</a></h2>
<p>Le projet Fink a choisi de suivre les règles du projet Debian en ce qui concerne emacs, avec quelques différences. (Vous trouverez les règles Debian sur <a href="http://www.debian.org/doc/packaging-manuals/debian-emacs-policy">http://www.debian.org/doc/packaging-manuals/debian-emacs-policy</a>.)
Il existe deux différences dans les règles de Fink. Premièrement, ces règles ne s'appliquent, à l'heure actuelle, qu'aux paquets emacs20 et emacs21 de fink. (Ceci pourra changer à l'avenir). Deuxièmement, contrairement aux règles Debian, les paquets Fink peuvent installer des objets directement dans /sw/share/emacs/site-lisp.
</p>


<p align="right"><? echo FINK_NEXT ; ?>:
<a href="fslayout.php?phpLang=fr">4. Organisation des fichiers</a></p>
<? include_once "../../footer.inc"; ?>


