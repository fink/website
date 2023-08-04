<?php
$title = "Paquets - Référence";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:54:31';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="prev" href="compilers.php?phpLang=fr" title="Compilateurs">';


include_once "header.fr.inc";
?>
<h1>Paquets - 6. Référence</h1>


<h2><a name="build">6.1 Construction d'un paquet</a></h2>
<p>Pour comprendre l'utilité de certains des champs, vous devez d'abord savoir comment Fink construit un paquet. La construction se déroule en cinq phases : décompression, application des rustines, compilation, installation et construction proprement dite. L'exemple ci-dessous correspond à une installation dans <code>/opt/sw</code> du paquet gimp-1.2.1-1.</p>
<p>Lors de la <b>phase de décompression</b>, le répertoire <code>/opt/sw/src/fink.build/gimp-1.2.1-1</code> est créé et l'archive tar y est décompressée (il peut y avoir plusieurs archives tar). Dans la plupart des cas, un répertoire gimp-1.2.1, contenant le source, sera créé ; toutes les étapes suivantes seront exécutées dans ce répertoire (par exemple <code>/opt/sw/src/fink.build/gimp-1.2.1-1/gimp-1.2.1</code>). Les champs SourceDirectory, NoSourceDirectory et Source<b>N</b>ExtractDir permettent de contrôler quels sont les répertoires à utiliser.</p>
<p>Lors de la <b>phase d'application des rustines</b>, le code source est modifié par les rustines, pour qu'il compile sous Darwin. Les actions dérivées des champs UpdateConfigGuess, UpdateLibtool, Patch et PatchScript sont exécutées dans l'ordre d'énumération de ces champs.</p>
<p>Lors de la <b>phase de compilation</b>, le source est configuré et compilé. En général, cela correspond au lancement du script <code>configure</code> avec certains paramètres, puis à l'exécution de la commande <code>make</code>. Voir la description du champ CompileScript pour de plus amples informations. Si les séries de tests sont activées (nouvelle fonctionnalité accessible en mode mainteneur dans la version 0.25 de fink), le script TestScript est lancé juste après le script CompileScript.</p>
<p>Lors de la <b>phase d'installation</b>, le paquet est installé dans un répertoire temporaire, <code>/opt/sw/src/fink.build/root-gimp-1.2.1-1</code> (= %d). (Notez la partie "root-"). Tous les fichiers qui sont normalement installés dans <code>/opt/sw</code> sont installés dans <code>/opt/sw/src/fink.build/root-gimp-1.2.1-1/opt/sw</code> (= %i = %d%p). Voir la description du champ InstallScript pour de plus amples informations.</p>
<p>(<b>À partir de fink 0.9.9.</b>, il est possible de générer plusieurs paquets à partir d'une seule description de paquet en utilisant le champ <code>SplitOff</code>. À la fin de la phase d'installation, des répertoires d'installation distincts sont créés pour chaque paquet à construire et les fichiers sont placés dans le répertoire approprié).</p>
<p>Lors de la <b>phase de construction</b>, un fichier binaire (.deb) est construit à partir du répertoire temporaire. On ne peut agir directement sur cette étape, néanmoins différentes informations issues de la description du paquet sont utilisées afin de générer un fichier de <code>contrôle</code> pour dpkg.</p>

<h2><a name="fields">6.2 Champs</a></h2><p>Nous avons classé les champs en plusieurs catégories. Cette liste n'est pas forcément exhaustive. <code>:-)</code></p>
<p><b>Données initiales :</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>Package</td><td>
<p>Nom du paquet. Peut contenir des minuscules, des nombres ou les caractères spéciaux suivants : '.', '+' et '-'. Pas de trait de soulignement ('_'), ni de majuscules. Champ obligatoire.</p>
<p>Seuls les raccourcis %N, %{Ni}, %type_raw[] et %type_pkg[] sont applicables à ce champ.</p>
<p>Selon les règles de Fink, un paquet donné doit toujours être compilé avec les mêmes options activées. Si un paquet peut avoir plusieurs variantes (voir la documentation sur le champ <code>Type</code>), vous devez encoder les informations concernant la variante dans le champ <code>Package</code> (voir la documentation sur le raccourci %type_pkg[]). De cette façon, chaque variante possédera un nom unique. Le nom du paquet indique quelles variantes sont incluses. Notez que l'usage des raccourcis %type_pkg[] et %type_raw[] dans le nom du paquet est récent et grandement incompatible avec les anciennes versions de fink ; les descriptions de ces paquets doivent être insérés dans un champ <code>InfoN</code> avec N&gt;=2.</p>
</td></tr><tr valign="top"><td>Version</td><td>
<p>Le numéro de version en amont. Même limitations que pour le champ Package. Champ obligatoire.</p>
<p>Notez que certains programmes utilisent une numérotation de version non standard qui peut provoquer des problèmes de tri, ou bien utilisent des caractères non autorisés dans ce champ. Dans ce cas, vous devez convertir la valeur de la version originale en une valeur acceptable qui permette de trier les versions correctement. Si vous ne savez pas comment les versions seront triées, utilisez la commande <code>dpkg</code> à l'invite d'un shell. Par exemple :</p>
<pre>
dpkg --compare-versions 1.2.1 lt 1.3 &amp;&amp; echo "vrai"
</pre>
<p>imprimera "vrai" car le numéro de version "1.2.1" est inférieur au numéro de version "1.3". Voir la page de manuel <code>dpkg</code> pour de plus amples informations.</p>
</td></tr><tr valign="top"><td>Revision</td><td>
<p>Le numéro de révision du paquet. Incrémentez ce numéro quand vous faites une nouvelle description pour la même version en amont. Les numéros de révision commencent à 1. Champ obligatoire.</p>
<p> Les règles de Fink stipule vous <b>devez</b> incrémenter le champ <code>Revision</code> <b>chaque fois</b> que vous changez un fichier <code>.info</code>, si les changements entraînent une modification de la forme binaire (compilée) du paquet (le fichier <code>.deb</code>). Cela s'applique aux changements opérés dans le champ <code>Depends</code> ou les autres champs incluant une liste de paquets, ainsi qu'à l'ajout, la suppression ou le changement de nom des paquets splitoff, ou bien encore le déplacement de fichiers d'un splitoff à un autre. Quand la migration d'un paquet vers une nouvelle arborescence (par exemple de 10.2 à 10.3) conduit à des modifications de cette nature, vous devez incrémenter le champ <code>Revision</code> de 10 unités dans la nouvelle arborescence, de façon à garder la possibilité de mises à jour ultérieures dans l'arborescence la plus ancienne.</p>
</td></tr><tr valign="top"><td>Architecture</td><td>
<p>Liste d'architectures système basées sur la CPU et séparées par des virgules sur lesquelles le paquet et tout paquet splitoff sont censés tourner. Pour le moment, les seules valeurs valides sont <code>powerpc</code> et <code>i386</code>. Si ce champ est présent et non vide après vérification conditionnelle, fink ignorera la ou les descriptions de paquet(s) correspondante(s) si l'architecture système de la machine locale n'est pas comprise dans la liste. Si le champ est omis ou s'il est vide, le paquet est géré comme si toutes les architectures système étaient reconnues. Introduit dans une version CVS de fink postérieure à la version 0.24.11.</p>
<p>Pour l'instant, l'utilisation la plus courante de ce champ est prévue pour les paquets qui requièrent un compilateur antérieur à gcc-4.0 (ou pour les paquets qui en dépendent). Dans ce cas, la valeur du champ sera <code>powerpc</code>.
</p>
<p>Ce champ admet la syntaxe conditionnelle standard pour toute valeur de la liste. Les raccourcis clavier peuvent y être utilisés (voir le champ <code>Depends</code> pour de plus amples informations). Il s'ensuit que certaines variantes peuvent être restreintes à certaines architectures systèmes. Par exemple :</p>
<pre>
  Package: foo-pm%type_pkg[perl]
  Type: perl (5.8.1 5.8.4 5.8.6)
  Architecture: (%type_pkg[perl] = 581) powerpc
</pre>
<p>est interprété comme une variante foo-pm581 pour l'architecture système <code>powerpc</code>, le champ restant vide pour toute autre variante. N'oubliez pas que le fait d'omettre une certaine valeur d'architecture ne signifie pas que le paquet n'est pas censé tourner sur l'architecture système en question.</p>
</td></tr><tr valign="top"><td>Distribution</td><td>
<p>
A comma-separated list of distribution(s) for which the package
(and any splitoff packages) are intended.
At present, the only valid values for distribution are
<code>10.4</code>,
<code>10.5</code>,
<code>10.6</code>,
<code>10.7</code>,
<code>10.8</code>,
<code>10.9</code>,
<code>10.10</code>,
<code>10.11</code>,
<code>10.12</code>,
<code>10.13</code>,
<code>10.14</code>,
<code>10.14.5</code>,
and <code>10.15</code>
. If this field is present and not blank after
conditional handling, fink will ignore the package description(s) if
the local machine distribution is not listed. If the field is omitted
or the value is blank, all distributions are assumed.
(Introduced in fink 0.26.0.)
</p>
<p>
Since Fink's <code>10.9</code> through <code>10.14.5</code> distributions share
a common set of finkinfo files, the most common use of this field will be for 
packages which are suitable for one of those distributions but not the
other.
</p>
<p>
This field supports the standard conditional syntax for any value in
the value list and percent-expansions can be used (see
the <code>Depends</code> field for more information). In this manner,
certain variants can be restricted to certain architectures. For
example:
</p>
<pre>
  Package: foo-pm%type_pkg[perl]
  Type: perl (5.8.1 5.8.6)
  Distribution: (%type_pkg[perl] = 581) 10.3, (%type_pkg[perl] = 581) 10.4
</pre>
<p>
will result in the field for the foo-pm581 variant
being <code>10.3, 10.4</code> and the field being blank for the 
foo-pm586 variant.
</p>
<p>Since python 2.5 is not available in the 10.7+ distributions, and the
available perl versions vary by distribution, these package types provide
a common use of this field.  For reference, we note the availabilty of
various perl versions in the 10.3 through 13.0 distributions
(<b>bolded</b> systems indicate system-perl at that version):
</p>
<pre>
    perl 5.6.0:  10.3
    perl 5.8.0:  10.3
    perl 5.8.1:  <b>10.3</b>, 10.4
    perl 5.8.4:  10.3, 10.4
    perl 5.8.6:  10.3, <b>10.4</b>, 10.5
    perl 5.8.8:        10.4, <b>10.5</b>, 10.6
    perl 5.10.0:             10.5, <b>10.6</b>
    perl 5.12.3:                         <b>10.7</b>, 10.8, 10.9
    perl 5.12.4:                         10.7, <b>10.8</b>, 10.9
    perl 5.16.2:                         10.7, 10.8, <b>10.9</b>, 10.10, 10.11, 10.12, 10.13
    perl 5.18.2:                         10.7, 10.8, 10.9, <b>10.10</b>, <b>10.11</b>, <b>10.12</b>, <b>10.13</b>, <b>10.14</b>, 10.14.5, 10.15, 11.0, 11.3, 12.0, 13.0
    perl 5.18.4:                                     10.9, 10.10, 10.11, 10.12, 10.13, 10.14, <b>10.14.5</b>, <b>10.15</b>, 11.0, 11.3, 12.0, 13.0
    perl 5.28.2:                                     10.9, 10.10, 10.11, 10.12, 10.13, 10.14, 10.14.5, 10.15, <b>11.0</b>, 11.3, 12.0, 13.0
    perl 5.30.2:                                     10.9, 10.10, 10.11, 10.12, 10.13, 10.14, 10.14.5, 10.15, 11.0, <b>11.3</b>, 12.0, 13.0
    perl 5.30.3:                                     10.9, 10.10, 10.11, 10.12, 10.13, 10.14, 10.14.5, 10.15, 11.0, 11.3, <b>12.0</b>, <b>13.0</b>
</pre>
<p>A way to include all variants in a single finkinfo file is as follows.
</p>
<pre>
  Package: foo-pm%type_pkg[perl]
  Type: perl (5.6.0 5.8.0 5.8.1 5.8.4 5.8.6 5.8.8 5.10.0 5.12.3)
  Distribution: &lt;&lt;
   (%type_pkg[perl] = 560) 10.3, (%type_pkg[perl] = 580) 10.3, 
   (%type_pkg[perl] = 581) 10.3, (%type_pkg[perl] = 581) 10.4, 
   (%type_pkg[perl] = 584) 10.3, (%type_pkg[perl] = 584) 10.4, 
   (%type_pkg[perl] = 586) 10.3, (%type_pkg[perl] = 586) 10.4, (%type_pkg[perl] = 586) 10.5,
   (%type_pkg[perl] = 588) 10.4, (%type_pkg[perl] = 588) 10.5, (%type_pkg[perl] = 588) 10.6,
   (%type_pkg[perl] = 5100) 10.5, (%type_pkg[perl] = 5100) 10.6,
   (%type_pkg[perl] = 5123) 10.7
  &lt;&lt;
</pre>
<p>Note that we do not include old
distributions, such as 10.2 or 10.4-transitional, since the versions of
fink which are relevant for them do not recognize this field.
</p>
</td></tr><tr valign="top"><td>Epoch</td><td>
<p><b>Introduit à partir de fink 0.12.0.</b> Ce champ facultatif peut être utilisé pour spécifier l'ère du paquet (défaut 0 si ce champ n'est pas renseigné). Pour de plus amples informations, voir <a href="http://www.debian.org/doc/debian-policy/ch-controlfields.html#s-f-Version">Debian Policy Manual</a>. Comme Fink et quelques-uns des outils Debian sous-jacents utilisent nom-version-revision comme identifiant unique d'un paquet, vous ne devez pas créer deux paquets qui ne diffèrent que par le numéro d'ère.</p>
<p>Quant elle est utilisée dans la version, l'ère apparaît avant la valeur de la version, séparée d'elle par deux-points (1:3.14-2). Notez que l'ère ne fait partie ni de <code>%v</code>, ni de <code>%f</code>. Si vous ajoutez un champ ère au fichier de description d'un paquet, vous pouvez être amené à l'introduire également dans ses dépendances. Par exemple, si vous ajoutez <code>Epoch: 1</code> à foo et que foo-dev déclare <code>Depends: foo-shlibs (= %v-%r)</code>, vous devez le changer en <code>Depends: foo-shlibs (= %e:%v-%r)</code>.
</p>
</td></tr><tr valign="top"><td>Description</td><td>
<p>Courte description du paquet (répond à la question qu'est-ce c'est ?). C'est une description d'une ligne qui est affichée sous forme de liste, elle doit donc être courte et bien ciblée. Elle peut avoir moins de 45 caractères, mais ne peut dépasser 60 caractères. Il n'est pas nécessaire d'indiquer le nom du paquet, il sera affiché de toute façon. Champ obligatoire.</p>
</td></tr><tr valign="top"><td>Type</td><td>
<p>Peut être <code>bundle</code>. Les paquets lots sont utilisés pour regrouper plusieurs paquets. Ils n'ont que des dépendances, mais ni code ni fichiers installés. Les champs Source, PatchScript, CompileScript, InstallScript et ceux qui leur sont liés sont ignorés pour ce type de paquets.</p>
<p><code>nosource</code> est un type très voisin. Il sert à indiquer qu'il n'y a pas d'archive tar source. Rien n'est téléchargé et la phase de décompression crée simplement un répertoire vide. Néanmoins, les phases d'application de rustine, de compilation et d'installation sont exécutées normalement. De cette façon, on peut incorporer tout le code avec une rustine, ou créer quelques répertoires avec InstallScript. À partir de la version 0.18.0 de fink, on peut utiliser <code>Source: none</code> pour obtenir le même résultat. Ceci permet d'utiliser "Type" pour d'autres usages (<code>Type: perl</code>, etc...).</p>
<p>À partir de fink 0.9.5, il existe un type <code>perl</code>, qui permet d'offrir un choix de valeurs par défaut pour les scripts de compilation et d'installation. À partir de fink 0.13.0, il existe une nouvelle variante de ce type, <code>perl $version</code>, où $version est une version spécifique de perl, constituée de trois chiffres séparés par un point, par exemple : <code>perl 5.6.0</code>.</p>
<p>Dans une version CVS postérieure à fink-0.19.2, l'utilisation de langage/langage-version a été généralisée pour permettre à tout mainteneur de définir des types et sous-types associés et ainsi d'utiliser plus d'un type par paquet. Les types et sous-types sont des chaînes de caractères arbitraires ; toutefois, les blancs sont interdits et les parenthèses, virgules, crochets et signe pourcentage ne doivent pas être utilisés. Les raccourcis ne sont pas interprétés et le type (mais non le sous-type) est converti en minuscules. Les valeurs du type sont définies dans une liste , chaque valeur étant séparée de la suivante par des virgules ; chaque valeur peut elle-même avoir une liste de sous-types associés séparés par des blancs.</p>
<p>De plus, il existe un concept de "variantes", qui permet de décrire dans un fichier .info unique une famille de paquets étroitement liés, ayant chacun des options différentes activées. La clé de ce processus est l'utilisation d'une liste de sous-types. Au lieu d'une simple chaîne de caractères, on utilise une liste de chaînes de caractères séparés par des blancs et mise entre parenthèses. Fink clone le fichier de description du paquet pour chaque sous-type de la liste et remplace cette liste par un unique sous-type dans le clone. Par exemple :</p>
<pre>Type: perl (5.6.0 5.8.1)</pre>
<p>provoque la création de deux descriptions de paquet, une qui se comporte comme si on avait <code>Type: perl 5.6.0</code> et l'autre comme si on avait <code>Type: perl 5.8.1</code>. Le sous-type spécial "(boolean)" est un raccourci pour une liste contenant le type lui-même et un point. Ainsi les deux formes suivantes sont identiques :</p>
<pre>
Type: -x11 (boolean)
Type: -x11 (-x11 .)
</pre>
<p>L'interprétation de la liste de sous-types / clonage du paquet est récursive. S'il y a plusieurs types avec des listes de sous-types, on obtient toutes les combinaisons possibles :</p>
<pre>Type: -ssl (boolean), perl (5.6.0 5.8.1)</pre>
<p>Dans les autres champs, on accède à un sous-type donné de variante en utilisant les fonctions de pseudo-hachage %type_raw[] et %type_pkg[]. Voici deux exemples de fragments de fichiers .info :</p>
<pre>
Info2: &lt;&lt;
Package: foo-pm%type_pkg[perl]
Type: perl (5.6.0 5.8.1)
Depends: perl%type_pkg[perl]-core
 &lt;&lt;
</pre>
<pre>
Info2: &lt;&lt;
Package: bar%type_pkg[-x11]
Type: -x11 (boolean)
Depends: (%type_raw[-x11] = -x11) x11
CompileScript:  &lt;&lt;
  #!/bin/bash -ev
  if [ "%type_raw[-x11]" == "-x11" ]; then
    ./configure %c --with-x11
  else
    ./configure %c --without-x11
  fi
  make
&lt;&lt;
&lt;&lt;
</pre>
<p>À partir de la version 0.26.0 de fink, il existe un champ spécial <code>Type: -64bit</code> qui contrôle un nouveau raccourci <code>%lib</code> et modifie la valeur par défaut du drapeau <code>LDFLAGS</code>. Quand on combine ce champ avec la construction %type_num[], ceci permet de construire à partir d'un seul fichier .info les versions 32-bit et 64-bit d'une bibliothèque. Voici un exemple :</p>
<pre>
Info2: &lt;&lt;
Package: foo%type_pkg[-64bit]
Type: -64bit (boolean)
Depends: (%type_raw[-64bit] = -64bit) 64bit-cpu
ConfigureParams: --libdir='${prefix}/%lib'
SplitOff: &lt;&lt;
 Package: %N-shlibs
 Files: %lib/libfoo.*.dylib
 Shlibs: &lt;&lt;
    %p/%lib/libfoo.1.dylib 1.0.0 %n (&gt;= 1.0-1) %type_num[-64bit]
  &lt;&lt;
&lt;&lt;
&lt;&lt;
</pre>
</td></tr><tr valign="top"><td>License</td><td>
<p>Ce champ indique la nature de la licence sous laquelle le paquet est distribué. Sa valeur doit être l'une de celles décrites plus haut dans la section <a href="policy.php?phpLang=fr#licenses">Licences de paquet</a>. De plus, ce champ ne doit être renseigné que si le paquet respecte effectivement les règles de construction des paquets, c'est-à-dire installe une copie de la licence dans le répertoire doc.</p>
</td></tr><tr valign="top"><td>Maintainer</td><td>
<p>Nom et adresse e-mail de la personne responsable du paquet. Ce champ est obligatoire et ne doit mentionner qu'un nom et qu'une adresse e-mail sous le format suivant :</p>
<pre>Prénom Nom &lt;utilisateur@hôte.domaine.com&gt;</pre>
</td></tr><tr valign="top"><td>InfoN</td><td>
<p>Ce champ permet à fink d'implémenter des changements de syntaxe incompatibles avec les versions précédentes dans les fichiers de description de paquet. Une version donnée de fink est configurée avec un nombre entier maximum "N", qu'il sait gérer. Tout paquet dont le champ InfoN est supérieur à ce nombre sera ignoré. Il ne faut donc utiliser ce mécanisme que dans les cas d'absolue nécessité, faute de quoi on priverait de ces paquets les personnes utilisant des versions plus anciennes de fink. Quand un autre champ doit utiliser un numéro InfoN spécifique, mention en est faite dans la description du champ. Pour utiliser ce mécanisme, il faut insérer l'ensemble de la description du paquet dans le champ InfoN. Voir plus haut la section "Format de fichier" pour une description de la syntaxe des champs constitués de plusieurs lignes. Voici les fonctionnalités ajoutées à chaque niveau InfoN, ainsi que la version la plus ancienne de fink qui les gère :</p>
<ul>
<li>
<code>Info2</code> (fink &gt;= 0.20.0) : capacité à interpréter les raccourcis dans le champ <code>Package</code> principal du fichier .info et à utiliser les raccourci <code>%type_*</code> dans le champ <code>Package</code> des paquets <code>SplitOff</code> (et <code>SplitOff<b>N</b></code>).
</li>
<li>
<code>Info3</code> (fink&gt;=0.25.0) : possibilité d'utiliser des retraits significatifs dans les fichiers .info, arrêt de la gestion des lignes multiples de la norme RFC-822, possibilité de mettre des commentaires dans les champs de listes de paquets.
</li>

<li>
<code>Info4</code> (fink&gt;=0.26.2): adds %V expansion, and permits
<code>%lib</code> in <code>ConfigureParams</code> field.
</li>

</ul>
</td></tr></table>
<p><b>Dépendances :</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>Depends</td><td>
<p>Liste de paquets à installer pour que le paquet puisse compiler. L'interprétation des raccourcis a lieu dans ce champ (tout comme dans les autres champs de cette catégorie : BuildDepends, RuntimeDepends, Provides, Conflicts, Replaces, Recommends, Suggests et Enhances). C'est, en général, une liste de noms de paquets séparés par des virgules, mais Fink gère maintenant les clauses de choix et de version avec la même syntaxe que dpkg. En voici un exemple :</p>
<pre>Depends: daemonic (&gt;= 20010902-1), emacs | xemacs</pre>
<p>Notez qu'on ne peut indiquer de réelles options de dépendances. Si un paquet fonctionne avec ou sans un autre paquet, vous devez soit vous assurer que l'autre paquet n'est pas utilisé, même s'il est présent, soit l'ajouter à la liste des dépendances. Si vous voulez donner à l'utilisateur le choix entre les deux options, faîtes deux paquets distincts, par exemple : wget et wget-ssl.</p>
<p>Ordre des opérations : le "OU" logique (liste de choix exclusifs) a priorité sur le "ET" logique entre chaque paquet (ou jeu de choix) dans la liste séparée par des virgules. À moins de mettre des parenthèses comme celles utilisées en arithmétique, il n'y a aucun moyen de spécifier des groupes de choix ou de changer l'ordre des opérations dans le champ <code>Depends</code> et les champs similaires.</p>
<p>À partir d'une version CVS postérieure à la version 0.18.2 de fink, on peut utiliser des dépendances conditionnelles. Celles-ci sont indiquées en plaçant <code>(chaîne1 opérateur chaîne2)</code> avant le nom du paquet. L'interprétation des raccourcis se fait normalement, puis les deux chaînes sont comparées en fonction de l'<code>opérateur</code> utilisé, qui peut être : &lt;&lt;, &lt;=, =, !=, &gt;&gt;, &gt;=. Le paquet qui suit n'est considéré comme une dépendance que si la comparaison est vraie.</p>
<p>Vous pouvez utiliser ce format pour simplifier la maintenance de paquets similaires. Par exemple, elinks et elinks-ssl peuvent avoir :</p>
<pre>Depends: (%n = elinks-ssl) openssl097-shlibs, expat-shlibs</pre>
<p>Ce qui a le même effet que si elinks avait :</p>
<pre>Depends: expat-shlibs</pre>
<p>et elinks-ssl avait :</p>
<pre>Depends: openssl097-shlibs, expat-shlibs</pre>
<p>Vous pouvez aussi utiliser un autre type de syntaxe : <code>(chaîne de caractères)</code>, qui est "vrai" si la <code>chaîne de caractères</code> est non nulle. Par exemple :</p>
<pre>
Package: nethack%type_pkg[-x11]
Type: -x11 (boolean)
Depends: (%type_pkg[-x11]) x11
</pre>
<p>indiquera une dépendance du paquet x11 pour la variante nethack-x11, mais pas pour la variante nethack.</p>
<p>Notez que quand on utilise les champs Depends/BuildDepends pour les paquets de bibliothèques partagées, alors qu'il existe plus d'une version majeure disponible, il <b>ne faut pas</b> utiliser la syntaxe suivante :</p>
<pre>
Package: foo
Depends: id3lib3.7-shlibs | id3lib3.7-shlibs
BuildDepends: id3lib3.7-dev | id3lib4-dev
</pre>
<p>même si le paquet peut fonctionner avec l'une ou l'autre bibliothèque. Il faut en choisir une (de préférence, la version la plus élevée possible) et s'y tenir dans l'ensemble du paquet.</p>
<p>Comme cela a été expliqué dans la section <a href="policy.php?phpLang=fr#sharedlibs">Librairies partagées</a>, un seul des paquets -dev peut être installé à un instant donné, et chacun possède des liens de même nom qui peuvent se référer à des noms de fichiers différents dans le paquet associé -shlibs. Lors de la compilation du paquet foo, le nom réel du fichier (dans le paquet -shlibs) est codé en dur dans le binaire foo. Cela signifie que le paquet résultant nécessite le paquet -shlibs associé au -dev qui était installé au moment de la compilation. En conséquence, on ne peut indiquer dans le champ <code>Depends</code> que l'un quelconque des paquets est requis.</p>
<p>Auparavant, les paquets non essentiels dépendaient implicitement des paquets essentiels ; ce n'est plus vrai.</p>
</td></tr><tr valign="top"><td>BuildDepends</td><td>
<p><b>Introduit dans fink 0.9.0.</b> Liste de dépendances utilisées uniquement lors de la compilation. Il sert à spécifier des outils (par exemple flex) qui doivent être présents pour compiler les paquets, mais qui ne sont pas nécessaires à l'exécution. Utilise la même syntaxe que Depends. Si les séries de tests sont activées, les dépendances du champs <code>TestDepends</code> sont ajoutés à cette liste.</p>
</td></tr><tr valign="top"><td>RuntimeDepends</td><td>
<p><b>Introduit dans fink 0.32.0.</b>

A list of dependencies that is applied at run time only,
that is, when the package is being installed.
This can be used to list packages that must be present to
run the package, but which are not used at build time.
Supports the same syntax as Depends.

</p>
</td></tr><tr valign="top"><td>Provides</td><td>
<p>Liste de noms de paquets séparés par des virgules que ce paquet est censé "fournir". Si un paquet nommé "pine" indique <code>Provides: mailer</code>, alors toute dépendance à "mailer" est considérée comme satisfaite si "pine" est installé. En général, on énumère aussi ces paquets dans les champs "Conflicts" et "Replaces".</p>
<p>Notez qu'aucun numéro de version n'est associé aux éléments Provides. Ils n'héritent pas du paquet parent qui contient la liste Provides, et il n'existe aucune syntaxe permettant d'indiquer un numéro de version dans le champ Provides lui-même. En outre, une dépendance contenant un numéro de version n'est pas satisfaite par un paquet qui a un champ Provides contenant le paquet dépendant. En conséquence, le fait d'avoir plusieurs variantes avec un champ Provides qui inclut un même paquet peut être dangereux, car cela revient à interdire l'utilisation des numéros de versions dans les dépendances. Par exemple, si foo-gnome et foo-nognome ont tous les deux un champ "Provides: foo", tout autre paquet contenant un champ "Depends: foo (&gt; 1.1)" ne fonctionnera pas correctement.</p>
</td></tr><tr valign="top"><td>Conflicts</td><td>
<p>Liste de noms de paquets séparés par des virgules qui ne doivent pas être installés en même temps que le paquet. Pour les paquets virtuels, on peut énumérer dans ce champ les noms des paquets fournis ; ils seront gérés correctement. Ce champ gère aussi les clauses de versions tout comme le champ Depends, mais pas les clauses de choix (cela n'aurait aucun sens). Si un paquet est nommé dans son propre champ Conflicts, il sera supprimé de cette liste (sans avertissement). (Introduit dans une version CVS de fink postérieure à la version 0.18.2).</p>
<p><b>Note :</b> Fink lui-même ignore ce champ à l'heure actuelle. Néanmoins, il est passé à dpkg et est géré en conséquence. Bref, il n'a d'effet qu'à l'exécution, pas à la compilation.</p>
</td></tr><tr valign="top"><td>BuildConflicts</td><td>
<p>Liste de paquets qui ne doivent pas être installés lorsque le paquet est compilé. Ce champ peut être utilisé pour empêcher <code>./configure</code> ou le compilateur de détecter des headers debibliothèques ou pour éviter d'utiliser une certaine version d'un outil connue pour être boguée (par exemple, un bogue dans une certaine version de sed). Si les séries de tests sont activées, les paquets énumérés dans le champt <code>TestConflicts</code> sont ajoutés à cette liste.</p>
</td></tr><tr valign="top"><td>Replaces</td><td>
<p>Utilisé en général avec "Conflicts", quand le paquet non seulement remplace les fonctions du paquet en conflit, mais a aussi des fichiers en commun. Sans ce champ, dpkg pourrait générer des erreurs lors de la phase d'installation du paquet, car certains fichiers appartiendraient toujours à un autre paquet. C'est aussi l'indication que les deux paquets en cause sont équivalents l'un l'autre, et que l'un peut être remplacé par l'autre. Si un paquet est nommé dans son propre champ Replaces, il sera supprimé (sans avertissement) de cette liste. (Introduit dans une version CVS de fink postérieure à la version 0.18.2).</p>
<p><b>Note :</b> Fink lui-même ignore ce champ à l'heure actuelle. Néanmoins, il est passé à dpkg et est géré en conséquence. Bref, il n'a d'effet qu'à l'exécution, pas à la compilation.</p>
</td></tr><tr valign="top"><td>Recommends, Suggests, Enhances</td><td>
<p>Ces champs indiquent des relations supplémentaires spécifiques dans le même style que les autres champs de dépendances. Ces trois champs n'ont aucun effet sur l'installation via <code>dpkg</code> ou <code>apt-get</code>. Néanmoins, ils sont utilisés par <code>dselect</code> et d'autres interfaces pour aider l'utilisateur à faire des choix.</p>
</td></tr><tr valign="top"><td>Pre-Depends</td><td>
<p>Une variante spéciale du champ Depends avec une sémantique plus stricte. Ce champ ne doit être utilisé qu'après en avoir discuté sur la liste de développeurs et qu'il soit apparu évident que cela était nécessaire.</p>
</td></tr><tr valign="top"><td>Essential</td><td>
<p>Valeur booléenne qui signale les paquets essentiels. Ceux-ci sont installés lors du processus de bootstrap. <code>dpkg</code> refusera de supprimer les paquets essentiels du système, à moins d'utiliser des options spéciales, qui permettent de lever cette interdiction. Auparavant, les paquets non essentiels dépendaient implicitement des paquets essentiels ; ce n'est plus vrai.</p>
</td></tr><tr valign="top"><td>BuildDependsOnly</td><td>
<p><b>Introduit dans fink 0.9.9.</b> Valeur booléenne qui indique qu'aucun autre paquet ne doit avoir un champ Depends le mentionnant, seul le champ BuildDepends est autorisé. Contrairement aux autres champs booléens, <code>BuildDependsOnly</code> a trois valeurs : indéfini (non spécifié) n'a pas le même sens que faux. Voir la section <a href="policy.php?phpLang=fr#sharedlibs">Librairies partagées</a> pour de plus amples informations.</p>
<p>À partir de la version 0.20.5 de fink, la présence ou l'absence de ce champ, et sa valeur s'il est présent, sont sauvegardées dans le fichier .deb à la construction du paquet. Par conséquent, <b>si vous changez la valeur de BuildDependsOnly, ou si vous l'ajoutez ou le supprimez, vous devez incrémenter le numéro de révision</b> du paquet.</p>
</td></tr></table>
<p><b>Phase de décompression :</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>CustomMirror</td><td>
<p>Liste de sites miroirs. Chaque ligne correspond à un site miroir, sous le format suivant : <code>&lt;emplacement&gt;: &lt;url&gt;</code>. L'<b>emplacement</b> peut être un code continent (par exemple : <code>nam</code> - Amérique du Nord), un code pays (par exemple : <code>nam-us</code> - Amérique du Nord-États-Unis), ou bien autre chose ; les archives sont recherchées sur les miroirs dans l'ordre d'énumération de ces derniers. Exemple :</p>
<pre>CustomMirror: &lt;&lt;
nam-US: ftp://ftp.fooquux.com/pub/bar
asi-JP: ftp://ftp.qiixbar.jp/pub/mirror/bar
eur-DE: ftp://ftp.barfoo.de/bar
Primary: ftp://ftp.barbarorg/pub/
&lt;&lt;</pre>
<p>Les codes des continents et des pays se trouvent dans le fichier <code>/opt/sw/lib/fink/mirror/_keys</code>, qui est partie intégrante des paquets fink et fink-mirrors.</p>
</td></tr><tr valign="top"><td>Source</td><td>
<p>URL de l'archive tar du source. Ce doit être une URL HTTP ou FTP, mais Fink ne fait pas de vérification - il se contente de passer l'URL à wget. Ce champ gère un type spécial d'URL pour les miroirs : <code>miroir:&lt;nom-miroir&gt;:&lt;chemin-relatif&gt;</code>. Ainsi, la définition du miroir <b>nom-miroir</b> est récupérée dans le fichier de configuration de Fink, la partie <b>chemin-relatif</b> y est ajoutée, et c'est l'ensemble qui est utilisé comme réelle URL. Chaque <b>nom-miroir</b> reconnu est stocké dans le fichier <code>/opt/sw/lib/fink/mirror/_list</code>, qui fait partie du paquet fink ou du paquet fink-mirrors. Par ailleurs, l'utilisation de <code>custom</code> comme <b>nom-miroir</b> oblige Fink à utiliser le champ <code>CustomMirror</code>. L'interprétation des raccourcis a lieu avant utilisation de l'URL. N'oubliez pas que %n correspond à toutes les variantes du champ %type_, il est donc conseillé d'utiliser ici %{ni} (avec, éventuellement, des spécifications de %type_).</p>
<p>À partir de fink 0.18.0, <code>Source: none</code> indique qu'il n'y a pas de source à récupérer. Voir la description du champ <code>Type</code> pour de plus amples informations. La valeur <code>gnu</code> est un raccourci pour <code>mirror:gnu:%n/%n-%v.tar.gz</code> ; de même, <code>gnome</code> est un raccourci pour <code>mirror:gnome:stable/sources/%n/%n-%v.tar.gz</code>. La valeur par défaut est <code>%n-%v.tar.gz</code> (correspond à un téléchargement ordinaire). Cette forme de définition implicite pour <code>Source</code> est obsolète (il est toujours possible de fournir un nom de fichier explicite ou d'opérer un téléchargement manuel).</p>
<p>Les sources nécessaires à la seule exécution des séries de tests doivent être placés à l'intérieur d'un bloc <code>InfoTest</code> et utilisés les champs de type <code>TestSource</code>.</p>
</td></tr><tr valign="top"><td>Source<b>N</b></td><td>
<p>Quand un paquet est constitué de plusieurs archives tar, vous devez les énumérer en utilisant ces champs supplémentaires, où N commence à 2. Le premier fichier archive tar (sorte d'archive tar "principale") est indiqué dans <code>Source</code>, le second dans <code>Source2</code>, et ainsi de suite. Les règles sont les mêmes que celles en vigueur pour le champ Source, mais les raccourcis "gnu" et "gnome" ne sont pas interprétés - cela n'aurait aucune utilité par ailleurs. À partir d'une version CVS de fink postérieure à la version 0.19.2, vous pouvez utiliser n'importe quels nombres entiers N &gt;= 2 (non nécessairement consécutifs). Néanmoins, les doublons ne sont pas autorisés.</p>
</td></tr><tr valign="top"><td>SourceDirectory</td><td>
<p>Doit être utilisé quand la décompression de l'archive tar aboutit à la création d'un répertoire dont le nom est différent du nom de base de l'archive. En général, une archive tar nommée "foo-1.0.tar.gz" crée un répertoire nommé "foo-1.0". Si le répertoire créé porte un nom différent, indiquez-le dans ce champ. L'interprétation des raccourcis y est effectuée.</p>
</td></tr><tr valign="top"><td>NoSourceDirectory</td><td>
<p>Donnez à ce paramètre booléen la valeur "true" si la décompression de l'archive tar ne crée pas de répertoire. En général, une archive tar nommée "foo-1.0.tar.gz" crée un répertoire nommé "foo-1.0". Si les fichiers sont simplement décompressés dans le répertoire en cours, utilisez ce champ et donnez-lui la valeur "true".</p>
</td></tr><tr valign="top"><td>Source<b>N</b>ExtractDir</td><td>
<p>Normalement, une archive tar auxiliaire est extraite dans le même répertoire que l'archive tar principale. Si vous devez l'extraire dans un sous-répertoire spécifique, utilisez ce champ pour l'indiquer. Source2ExtractDir correspond, bien évidemment, à l'archive tar Source2. Voir ghostscript, vim et tetex comme exemples d'utilisation de ce champ.</p>
</td></tr><tr valign="top"><td>SourceRename</td><td>
<p>Ce champ renomme une archive tar à la volée. Ceci est utile, par exemple, lorsque la version du source est encodée dans le nom du répertoire du serveur, mais que l'archive elle-même porte le même nom pour toutes les versions, comme <code>http://www.foobar.org/coolapp/1.2.3/source.tar.gz</code>. Pour résoudre les problèmes que cela cause, vous pouvez utiliser quelque chose de similaire à :</p>
<pre>SourceRename: %n-%v.tar.gz</pre>
<p>Dans l'exemple ci-dessus, l'archive tar sera sauvegardée sous <code>/opt/sw/src/coolapp-1.2.3.tar.gz</code>.</p>
</td></tr><tr valign="top"><td>Source<b>N</b>Rename</td><td>
<p>Ce champ est semblable au champ <code>SourceRename</code>, mais il est utilisé pour renommer l'archive tar correspondant au champ <code>Source<b>N</b></code>. Voir context ou hyperref comme exemples d'utilisation de ce champ.</p>
</td></tr><tr valign="top"><td>Source-MD5</td><td>
<p><b>Introduit dans fink 0.10.0.</b> Vous pouvez indiquer dans ce champ la somme de contrôle MD5 du fichier source. La valeur sera alors utilisée par Fink pour détecter les fichiers sources incorrects, c'est-à-dire les archives tar qui ne correspondent pas à celles que le créateur du paquet a utilisées. Les causes les plus courantes de ce type de problème sont : téléchargement incomplet de l'archive, mainteneurs en amont ayant changé l'archive sans le signaler, chevaux de Troie ou attaques similaires, etc... </p>
<p>Exemple :</p>
<pre>Source-MD5: 4499443fa1d604243467afe64522abac</pre>
<p>La somme de contrôle est calculée avec l'outil <code>md5sum</code>. Si vous voulez calculer la somme de contrôle de l'archive tar <code>/opt/sw/src/apache_1.3.23.tar.gz</code>, exécutez la commande suivante (le résultat est affiché au-dessous) :</p>
<pre>fingolfin% md5sum /opt/sw/src/apache_1.3.23.tar.gz 
4499443fa1d604243467afe64522abac  /opt/sw/src/apache_1.3.23.tar.gz</pre>
<p>La valeur affichée à gauche correspond à la valeur recherchée.</p>
</td></tr><tr valign="top"><td>Source<b>N</b>-MD5</td><td>
<p><b>Introduit dans fink 0.10.0.</b> Ce champ est semblable au champ <code>Source-MD5</code>, mais il est utilisé pour indiquer la somme de contrôle MD5 de l'archive tar correspondant au champ <code>Source<b>N</b></code>.</p>
</td></tr><tr valign="top"><td>Source-Checksum</td><td>
<p>
Alternative method to list the checksum for a source file. This field
takes a hash type, followed by the actual checksum. For example:
</p>
<pre>Source-Checksum: SHA256(5048f1c8fc509cc636c2f97f4b40c293338b6041a5652082d5ee2cf54b530c56)</pre>
<p>
Current valid checksums are <code>MD5</code>, <code>SHA1</code>, and
<code>SHA256</code>. The <code>shasum</code> tool can be used to
calculate SHA checksums:</p>
<pre>$ shasum -a 256 /opt/sw/src/libexif-0.6.22.tar.xz 
5048f1c8fc509cc636c2f97f4b40c293338b6041a5652082d5ee2cf54b530c56  /opt/sw/src/libexif-0.6.22.tar.xz
</pre>
<p>
The <code>Source-Checksum</code> field should only be used once per
.info file. If both the <code>Source-MD5</code> and
<code>Source-Checksum</code> fields are present,
<code>Source-Checksum</code> takes precedence.
</p>
</td></tr><tr valign="top"><td>Source<b>N</b>-Checksum</td><td>
<p>
This is just the same as the <code>Source-Checksum</code> field, except that it
is used to specify the checksum of the tarball specified by the
corresponding <code>Source<b>N</b></code> field.
</p>
</td></tr><tr valign="top"><td>TarFilesRename</td><td>
<p><b>Introduit dans fink 0.10.0.</b> Ce champ ne s'applique qu'aux fichiers sources utilisant le format tar.</p>
<p>Avec ce champ, vous pouvez renommer les fichiers d'une archive tar donnée durant l'extraction. Ceci est très utile pour gérer les problèmes dus au fait que le système de fichiers HFS+ ne tient pas compte de la casse. En effet, sur un système standard Mac OS X, les fichiers <code>install</code> et <code>INSTALL</code> ne sont pas distinguables. L'utilisation de ce champ permet d'éviter ces problèmes sans avoir à changer l'archive tar (comme on le faisait auparavant dans de tels cas).</p>
<p>Indiquez juste la liste des fichiers à renommer dans ce champ. Vous pouvez utiliser des caractères joker. Par défaut, à tout fichier spécifié dans la liste est ajouté le suffixe <code>_tmp</code>. Vous pouvez modifier ce comportement en utilisant la même syntaxe que celles des champs <code>Files</code> et <code>DocFiles</code>, c'est-à-dire en écrivant l'ancien nom suivi de deux-points, puis du nouveau nom. Exemple :</p>
<pre>TarFilesRename: foo bar.* qux:quux
Tar2FilesRename: directory/INSTALL:directory/INSTALL.txt</pre>
</td></tr><tr valign="top"><td>Tar<b>N</b>FilesRename</td><td>
<p><b>Introduit dans fink 0.10.0.</b> Ce champ est similaire au champ <code>TarFilesRename</code>, mais il est utilisé pour renommer l'archive tar correspondant au champ <code>Source<b>N</b></code>.</p>
</td></tr></table>
<p><b>Phase d'application des rustines :</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>UpdateConfigGuess</td><td>
<p>Valeur booléenne. Si elle est vraie ("true"), les fichiers config.guess et config.sub présents dans le répertoire de compilation sont remplacés par des versions reconnaissant Darwin. Ce remplacement se produit lors de la phase d'application des rustines avant que le script PatchScript soit exécuté. <b>N'utilisez</b> ce champ quand cas d'absolue nécessité, c'est-à-dire lorsque le script configure se termine inopinément par un message "unknown host" (système inconnu).</p>
</td></tr><tr valign="top"><td>UpdateConfigGuessInDirs</td><td>
<p><b>Introduit dans une version CVS postérieure à la version 0.9.0.</b> Liste de sous-répertoires. A le même effet que UpdateConfigGuess, mais dans toute l'arborescence du source ; utile lorsque plusieurs fichiers config.guess existent dans différents répertoires du source. Auparavant, il fallait copier ou déplacer les fichiers dans le script PatchScript. Avec ce nouveau champ, il suffit de donner la liste des répertoires. Utilisez <code>.</code> pour mettre à jour les fichiers dans le répertoire de compilation.</p>
</td></tr><tr valign="top"><td>UpdateLibtool</td><td>
<p>Valeur booléenne. Si elle est vraie ("true"), les fichiers ltconfig et ltmain.sh présents dans le répertoire de compilation sont remplacés par des versions reconnaissant Darwin. Ce remplacement se produit lors de la phase d'application des rustines avant que le script PatchScript soit exécuté. <b>N'utilisez</b> ce champ quand cas d'absolue nécessité. Certains paquets ne fonctionnent plus lorsqu'on modifie la version des scripts libtool. Voir la <a href="/doc/porting/libtool.php">page libtool</a> pour de plus amples informations.</p>
</td></tr><tr valign="top"><td>UpdateLibtoolInDirs</td><td>
<p><b>Introduit dans une version CVS postérieure à la version 0.9.0.</b> Liste de sous-répertoires. A le même effet que UpdateLibtool ; utile lorsque plusieurs fichiers scripts libtool 1.3.x sont présents dans différents répertoires de l'arborescence du source. Auparavant, il fallait copier ou déplacer les fichiers dans le script PatchScript. Avec ce nouveau champ, il suffit de donner la liste des répertoires. Utilisez <code>.</code> pour mettre à jour les fichiers dans le répertoire de compilation.</p>
</td></tr><tr valign="top"><td>UpdatePoMakefile</td><td>
<p>Valeur booléenne. Si elle est vraie ("true"), le fichier <code>Makefile.in.in</code> présent dans le sous-répertoire <code>po</code> est remplacé par une version modifiée. Ce remplacement se produit lors de la phase d'application des rustines avant que le script PatchScript soit exécuté.</p>
<p>La version modifiée prend en compte DESTDIR et garantit que les catalogues de messages seront placés dans <code>/opt/sw/share/locale</code>, et non pas dans <code>/opt/sw/lib/locale</code>. Assurez-vous, avant d'utiliser ce champ, qu'il est absolument nécessaire et que le paquet continuera à fonctionner. Vous pouvez exécuter <code>diff</code> pour trouver les différences entre la version du paquet et celle de Fink (située dans <code>/opt/sw/lib/fink/update</code>).</p>
</td></tr><tr valign="top"><td>Patch</td><td>
<p>Le nom d'une rustine à appliquer avec <code>patch -p1 &lt;<b>nom-rustine</b></code>. Ne donnez que le nom du fichier ; le chemin est ajouté automatiquement devant le nom du fichier. L'interprétation des raccourcis y est effectuée, si bien qu'on trouve, en général : <code>%f.patch</code> ou <code>%n.patch</code>. La rustine est appliquée avant que le script PatchScript soit exécuté (s'il existe).</p>
<p>N'oubliez pas que %n inclut implicitement toutes les variantes %type_. Le cas échéant, utilisez %{ni} (éventuellement avec des variantes spécifiques %type_). Il est plus facile de gérer une seule rustine et de faire des changements spécifiques à certaines variantes dans le script <code>PatchScript</code> que de gérer une rustine par variante.</p>
</td></tr><tr valign="top"><td>PatchScript</td><td>
<p>Liste de commandes à exécuter lors de la phase d'application des rustines. C'est là où vous pouvez placer les commandes qui corrigent ou modifient le paquet source. Voir plus loin la <a href="reference.php?phpLang=fr#scripts">note au sujet des scripts</a>. L'<a href="format.php?phpLang=fr#percent">interprétation des raccourcis</a> a lieu avant que les commandes ne soient exécutées. Il n'existe pas de script par défaut.</p>
</td></tr></table>
<p><b>Phase de compilation :</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>Set<b>ENVVAR</b></td><td>
<p>Définit certaines variables d'environnement pendant les phases de compilation et d'installation. On peut utiliser ce champ pour passer des drapeaux de compilation, etc... aux scripts configure et aux Makefile. Les variables reconnues à l'heure actuelle sont : CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, DYLD_LIBRARY_PATH, JAVA_HOME, LD, LDFLAGS, LIBRARY_PATH, LIBS, MACOSX_DEPLOYMENT_TARGET, MAKE, MFLAGS, MAKEFLAGS. L'interprétation des raccourcis a lieu sur la valeur spécifiée, comme expliquée dans la section précédente. Exemple courant :</p>
<pre>SetCPPFLAGS: -no-cpp-precomp</pre>
<p>Certaines de ces variables ont des valeurs pré-établies par défaut. Si vous leur donnez une valeur, celle-ci sera ajoutée dans la liste devant la valeur par défaut. Les variables à valeur pré-établies sont les suivantes :</p>
<pre>
CPPFLAGS: -I%p/include
LDFLAGS: -L%p/lib
</pre>
<p>À partir de la version 0.26.0 de fink, il existe une exception à ces valeurs par défaut. Si le champ <code>Type: -64bit</code> a pour valeur <code>-64bit</code>, alors la valeur par défaut de la variable <code>LDFLAGS</code> est <code>-L%p/%lib -L%p/lib</code>.</p>
<p>Enfin, la variable MACOSX_DEPLOYMENT_TARGET a une valeur par défaut qui dépend de la version de Mac OS X en cours d'exécution, mais le fait d'affecter une valeur à cette variable pour un paquet donné remplace la valeur par défaut, elle ne vient pas s'ajouter devant la valeur par défaut.</p>
</td></tr><tr valign="top"><td>NoSet<b>ENVVAR</b></td><td>
<p>Quand la valeur de ce champ est true (vraie), les valeurs par défaut des variables à valeurs pré-établies, telles CPPFLAGS, LDFLAGS et CXXFLAGS mentionnées ci-dessus, sont désactivées. Autrement dit, si vous ne voulez pas que LDFLAGS ait une valeur par défaut, utilisez <code>NoSetLDFLAGS: true</code>.</p>
</td></tr><tr valign="top"><td>ConfigureParams</td><td>
<p>Paramètres supplémentaires à passer au script configure. (Voir CompileScript pour de plus amples informations). Pour les paquets qui ne sont pas de <code>Type: Perl</code>, le paramètre <code>--prefix=%p</code> est  ajouté avant la valeur de ce champ. À partir des versions de fink &gt; 0.13.7, ce champ fonctionne aussi avec les modules perl <code>Type: Perl</code> ; il ajoute les paramètres à la chaîne perl par défaut Makefile.PL.</p>
<p>Si les séries de tests sont activées, la valeur du champ <code>TestConfigureParams</code> est ajoutée à ces paramètres.</p>
<p>À partir de la version 0.22.0 de fink, ce champ gère les expressions conditionnelles. La syntaxe est la même que celle utilisée dans le champ <code>Depends</code> et les autres champs basés sur des listes de paquets. L'expression conditionnelle s'applique au "mot" délimité par des espaces suivant immédiatement l'expression. Par exemple :</p>
<pre>
Type: -x11 (boolean)
ConfigureParams: --mandir=%p/share/man (%type_pkg[-x11]) \
 --with-x11 --disable-shared
</pre>
<p>passera les drapeaux <code>--mandir</code> et <code>--disable-shared</code> dans tous les cas de figure, mais ne passera le drapeau <code>--with-x11</code> qu'à la seule variante -x11.</p>
</td></tr><tr valign="top"><td>GCC</td><td>
<p>Ce champ spécifie l'ABI-GCC utilisé par le code C++ du paquet (cela est indispensable, car l'ABI a changé deux fois au cours du temps; toute bibliothèque liée à du code C++ doit être compilée avec l'ABI résidant sur le système au moment de son utilisation).</p>
<p>Les valeurs autorisées sont les suivantes : <code>2.95.2</code> (ou <code>2.95</code>), <code>3.1</code>, <code>3.3</code> et <code>4.0</code>. Nous avons cru comprendre que les auteurs de GCC comptent stabiliser l'ABI-GCC à un moment donné ; nous espérons qu'elle ne changera pas de nouveau.</p>
<p>Le champ GCC n'a pas de valeur par défaut ; il est ignoré s'il n'est pas défini. Néanmoins il existe dans chaque arborescence une valeur attendue qui correspond au compilateur g++ par défaut pour cette arborescence. Ces valeurs sont les suivantes : <code>2.95</code> pour l'arborescence 10.1, <code>3.1</code> pour l'arborescence 10.2, <code>3.3</code> pour les arborescences 10.2-gcc3.3, 10.3 et 10.4-transitional, et <code>4.0</code> pour l'arborescence 10.4 à venir.</p>
<p>Notez que lorsque la valeur GCC est différente de la valeur par défaut, le compilateur doit être indiqué dans le paquet (en général, en utilisant les drapeaux CC ou CXX), et qu'une dépendance sur un des paquets (virtuels) gcc doit être spécifiée.</p>
<p>À partir de la version 0.13.8 de fink, quand ce champ est utilisé, la version de gcc est testée via <code>gcc_select</code>, et fink se termine avec un message d'erreur si la version requise n'est pas présente.</p>
<p>Ce champ a été ajouté pour faciliter la transition entre les compilateurs gcc, qui ont introduit une incompatibilité binaire entre bibliothèques ; cette incompatibilité concerne des parties de code C++ non reproduites dans les différentes versions.</p>
</td></tr><tr valign="top"><td>CompileScript</td><td>
<p>Liste de commandes à exécuter durant la phase de compilation. C'est là qu'il faut mettre les commandes de configuration et de compilation du paquet. Voir plus loin la <a href="reference.php?phpLang=fr#scripts">note au sujet des scripts</a>. L'<a href="format.php?phpLang=fr#percent">interprétation des raccourcis</a> a lieu avant que les commandes ne soient exécutées. Normalement, les commandes sont les suivantes :</p>
<pre>./configure %c
make</pre>
<p>Elles conviennent pour les paquets utilisant GNU autoconf. Pour ceux de type perl (indiqué via le champ Type) dont la version perl n'est pas indiquée, les commandes par défaut (à partir de la version 0.13.4 de fink) sont les suivantes :</p>
<pre>perl Makefile.PL PREFIX=%p \
 INSTALLPRIVLIB=%p/lib/perl5 \
 INSTALLARCHLIB=%p/lib/perl5/darwin \
 INSTALLSITELIB=%p/lib/perl5 \
 INSTALLSITEARCH=%p/lib/perl5/darwin \
 INSTALLMAN1DIR=%p/share/man/man1 \
 INSTALLMAN3DIR=%p/share/man/man3 \
 INSTALLSITEMAN1DIR=%p/share/man/man1 \
 INSTALLSITEMAN3DIR=%p/share/man/man3 \
 INSTALLBIN=%p/bin \
 INSTALLSITEBIN=%p/bin \
 INSTALLSCRIPT=%p/bin
make
make test</pre>
<p>Si le type est du style <code>perl $version</code> (où <code>$version</code> est, par exemple, 5.6.0), les commandes par défaut sont les suivantes :</p>
<pre>perl$version Makefile.PL \
 PERL=perl$version PREFIX=%p \
 INSTALLPRIVLIB=%p/lib/perl5/$version \
 INSTALLARCHLIB=%p/lib/perl5/$version/$perlarchdir \
 INSTALLSITELIB=%p/lib/perl5/$version \
 INSTALLSITEARCH=%p/lib/perl5/$version/$perlarchdir \
 INSTALLMAN1DIR=%p/share/man/man1 \
 INSTALLMAN3DIR=%p/share/man/man3 \
 INSTALLSITEMAN1DIR=%p/share/man/man1 \
 INSTALLSITEMAN3DIR=%p/share/man/man3 \
 INSTALLBIN=%p/bin \
 INSTALLSITEBIN=%p/bin \
 INSTALLSCRIPT=%p/bin
make
make test</pre>
<p>où <code>$perlarchdir</code> est "darwin" pour les versions antérieures ou égales à 5.8.0, "darwin-thread-multi-2level" pour les versions postérieures ou égales à 5.8.1.</p>
</td></tr><tr valign="top"><td>NoPerlTests</td><td> 
<p><b>Introduite dans une version de fink &gt; 0.13.7.</b> Valeur booléenne spécifique aux paquets de module perl. Si sa valeur est true (vraie), la partie <code>make test</code> de <code>CompileScript</code> est ignorée pour ce paquet.</p>
</td></tr></table>
<p><b>Séries de tests</b> :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>InfoTest</td><td>
<p><b>Introduit dans la version 0.25 de fink.</b> Ce champ englobe les données spécifiques à utiliser pour exécuter les séries de tests. Il contient d'autres champs. Si ce champ est présent, il <b>doit</b> inclure un champ <code>TestScript</code>. Tous les autres champs sont facultatifs. Les champs autorisés à l'intérieur du champ <code>InfoTest</code> sont les suivants :</p>
<ul>
<li><code>TestScript</code> : script d'exécution de la série de tests. Ce script doit retourner un statut de valeur 0 si la série de tests s'est déroulée sans incident, de 1 s'il y a des messages d'attention, et de n'importe quelle autre valeur si les incidents sont suffisamment sévères pour les considérer comme fatals. Du fait de cette logique à trois états, la valeur du statut doit être explicitement indiquée. Par exemple, <code>make check</code> n'est pas conforme à cette logique, puisqu'il retourne un statut de 1 si la cible à vérifier n'existe pas ; par contre, <code>make check || exit 2</code> respecte la logique à trois états.</li>
<li><code>TestConfigureParams</code> : valeur ajoutée au champ <code>ConfigureParams</code>.</li>
<li><code>TestDepends</code> et <code>TestConflicts</code> : liste des paquets à ajouter respectivement aux champs <code>BuildDepends</code> et <code>BuildConflicts</code>.</li>
<li><code>TestSource</code> : sources supplémentaires nécessaires pour exécuter la série de tests. Tous les champs liés à ce champ sont autorisés. On <b>doit</b> donc aussi utiliser le champ <code>TestSource-MD5</code> ou <code>TestSource-Checksum</code>. On peut aussi se servir des champs <code>TestSourceN</code> et <code>TestSourceN-MD5</code>, <code>TestSourceN-Checksum</code>, <code>TestTarFilesRename</code>, etc...</li>
<li><code>TestSuiteSize</code> : donne une idée approximative de la durée d'exécution de la série de tests. Les valeurs permises sont les suivantes : <code>small</code>, <code>medium</code> et <code>large</code>. Ce champ est pour l'instant ignoré.</li>
<li>Tout autre champ standard. Si un champ est indiqué à la fois à l'intérieur et à l'extérieur du bloc <code>InfoTest</code>, c'est sa valeur à l'intérieur du bloc <code>InfoTest</code> qui sera utilisée si la suite de tests est activée.</li>
</ul>
<p>Voici un exemple :</p>
<pre>InfoTest: &lt;&lt;
    TestScript: make check || exit 2
    TestConfigureParams: --enable-tests
&lt;&lt;</pre>
</td></tr></table>
<p><b>Phase d'installation :</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>UpdatePOD</td><td>
<p><b>Introduit dans la version 0.9.5 de fink.</b> Valeur booléenne réservée aux paquets de module perl. Si sa valeur est true (vraie), du code est ajouté aux scripts install, postrm et postinst, qui gèrent les fichiers .pod fournis par les paquets perl. En particulier, la date .pod est ajoutée et ôtée du fichier central <code>/opt/sw/lib/perl5/darwin/perllocal.pod</code>. (Si le type est du style <code>perl $version</code>, où $version est, par exemple, 5.6.0, les scripts sont adaptés pour gérer le fichier central .pod <code>/opt/sw/lib/perl5/$version/perllocal.pod</code>).</p>
</td></tr><tr valign="top"><td>InstallScript</td><td>
<p>Liste de commandes à exécuter durant la phase d'installation. C'est là où il faut mettre les commandes qui copient tous les fichiers requis dans le répertoire de construction du paquet. Voir plus loin la <a href="reference.php?phpLang=fr#scripts">note au sujet des scripts</a>. L'<a href="format.php?phpLang=fr#percent">interprétation des raccourcis</a> a lieu avant que les commandes ne soient exécutées. Normalement, on utilise :</p>
<pre>make install prefix=%i</pre>
<p>Ceci convient pour les paquets utilisant GNU autoconf. Pour ceux de type perl (indiqué via le champ Type) dont la version perl n'est pas indiquée, les commandes par défaut (à partir de la version 0.13.4 de fink) sont les suivantes :</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5 \
 INSTALLARCHLIB=%i/lib/perl5/darwin \
 INSTALLSITELIB=%i/lib/perl5 \
 INSTALLSITEARCH=%i/lib/perl5/darwin \
 INSTALLMAN1DIR=%i/share/man/man1 \
 INSTALLMAN3DIR=%i/share/man/man3 \
 INSTALLSITEMAN1DIR=%i/share/man/man1 \
 INSTALLSITEMAN3DIR=%i/share/man/man3 \
 INSTALLBIN=%i/bin \
 INSTALLSITEBIN=%i/bin \
 INSTALLSCRIPT=%i/bin</pre>
<p>Si le type est du style <code>perl $version</code> (où <code>$version</code> est, par exemple, 5.6.0), les commandes par défaut sont les suivantes :</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5/$version \
 INSTALLARCHLIB=%i/lib/perl5/$version/$perlarchdir \
 INSTALLSITELIB=%i/lib/perl5/$version \
 INSTALLSITEARCH=%i/lib/perl5/$version/$perlarchdir \
 INSTALLMAN1DIR=%i/share/man/man1 \
 INSTALLMAN3DIR=%i/share/man/man3 \
 INSTALLSITEMAN1DIR=%i/share/man/man1 \
 INSTALLSITEMAN3DIR=%i/share/man/man3 \
 INSTALLBIN=%i/bin \
 INSTALLSITEBIN=%i/bin \
 INSTALLSCRIPT=%i/bin</pre>
<p>où <code>$perlarchdir</code> est "darwin" pour les versions antérieures ou égales à 5.8.0, et "darwin-thread-multi-2level" pour les versions postérieures ou égales à 5.8.1.</p>
<p>Si le paquet l'admet, il est préférable d'utiliser <code>make install DESTDIR=%d</code>.</p>
</td></tr><tr valign="top"><td>AppBundles</td><td>
<p><b>Introduit dans une version postérieure à la version 0.23.1.</b> Ce champ installe le(s) lot(s) dans le répertoire <code>%p/Applications</code>. Il crée également un lien symbolique vers le répertoire <code>/Applications/Fink</code>. Exemple :</p>
<pre>AppBundles: build/*.app Foo.app</pre>
</td></tr><tr valign="top"><td>JarFiles</td><td>
<p><b>Introduit dans la version 0.10.0 de fink.</b> Champ similaire au champ DocFiles. Il installe les fichiers jar spécifiés dans <code>%p/share/java/%n</code>. Exemple :</p>
<pre>JarFiles: lib/*.jar foo.jar:fooBar.jar</pre>
<p>Cette commande installe tous les fichiers jar situés dans le répertoire lib, puis installe le fichier foo.jar sous le nom de fooBar.jar.</p>
<p>Elle garantit aussi que les fichiers jar (en fait, tous les fichiers d'extension .jar situés dans <code>%p/share/java/%n</code>) sont ajoutés à la variable d'environnement CLASSPATH. Ceci permet aux outils tels configure ou ant de détecter correctement les fichiers jar installés.</p>
</td></tr><tr valign="top"><td>DocFiles</td><td>
<p>Ce champ fournit un moyen simple d'installer les fichiers README et COPYING dans le répertoire doc du paquet, soit <code>%p/share/doc/%n</code>. Sa valeur consiste en une liste de fichiers séparés par des espaces. Vous pouvez copier les fichiers à partir de sous-répertoires du répertoire de compilation, ils seront placés dans le répertoire lui-même et non pas dans un sous-répertoire. Les caractères joker reconnus par le shell sont autorisés. On peut aussi renommer des fichiers à la volée en faisant suivre le nom du fichier de deux-points (:), puis du nouveau nom. Exemple :<code>libgimp/COPYING:COPYING.libgimp</code>. Ce champ ajoute les commandes <code>install</code> appropriées au script InstallScript.</p>
</td></tr><tr valign="top"><td>Shlibs</td><td>
<p><b>Introduit dans la version 0.11.0 de fink.</b> Ce champ déclare les bibliothèques partagées installées dans le paquet. 

There is one line for each shared library, which contains the <code>-install_name</code> of the library and information about its binary compatibility. 
Shared libraries that are "public" (i.e., provided for use by other packages) have, separated by whitespace after the filename, the <code>-compatibility_version</code>, versioned package dependency information specifying the Fink package which provides this library at this compatibility version, and the library architecture.

Cette architecture peut avoir pour valeur "32", "64", "32-64" ou même ne pas exister ; dans ce dernier cas, elle prend la valeur "32" par défaut. Les informations de dépendance doivent être spécifiées sous la forme <code> foo (&gt;= version-revision)</code>, où <code>version-revision</code> représente la <b>première</b> version d'un paquet Fink qui rend disponible cette bibliothèque (avec cette version de compatibilité). La déclaration Shlibs revient à dire que le mainteneur du paquet garantit qu'une bibliothèque portant ce nom et ayant une version de compatibilité au moins égale à <code>-compatibility_version</code> sera présente dans toutes les versions postérieures de ce paquet Fink.

Shared libraries that are "private" are denoted by an exclamation mark preceeding the filename, and no compatilibity or versioning information is given. See the <a href="policy.php?phpLang=fr#sharedlibs">Shared Library Policy</a> for more information.

</p>
</td></tr><tr valign="top"><td>RuntimeVars</td><td>
<p><b>Introduit dans fink 0.10.0.</b> Ce champ fournit un moyen pratique de donner une valeur statique à des variables d'environnement pendant l'exécution (si vous voulez avoir plus de latitude dans ce domaine, voir la <a href="#profile.d">section scripts profile.d</a>). À partir du moment où le paquet est installé, ces variables sont définies par les scripts <code>/opt/sw/bin/init.[c]sh</code>.</p>
<p>La valeur de la variable peut contenir des espaces (seuls les espaces de fin de chaîne sont supprimés) ; l'interprétation des raccourcis a eu lieu sur ce champ. Exemple :</p>
<pre>RuntimeVars: &lt;&lt;
 UneVariable: %p/Valeur
 UneAutreVariable: toto tata
&lt;&lt;</pre>
<p>définit deux variables d'environnement 'UneVariable' et 'UneAutreVariable' ; leurs valeurs seront respectivement '/opt/sw/Valeur' (si votre préfixe est /opt/sw) et 'toto tata'.</p>
<p>Ce champ ajoute les commandes appropriées au script InstallScript. Ces commandes ajoutent une ligne setenv/export pour chaque variable aux scripts profile.d du paquet ; vous pouvez donc spécifier vos propres commandes, elles ne seront pas remplacées. Les lignes sont ajoutées en début de scripts, vous pouvez donc utiliser ces variables dans vos scripts.</p>
</td></tr><tr valign="top"><td>SplitOff</td><td>
<p><b>Introduit dans fink 0.9.9.</b> Génère un second paquet à partir d'une seule exécution du couple compilation/installation. Pour avoir de plus amples informations sur la façon dont ce champ fonctionne, voir la <a href="#splitoffs">section splitoff</a> ci-dessous.</p>
</td></tr><tr valign="top"><td>SplitOff<b>N</b></td><td>
<p><b>Introduit dans fink 0.9.9.</b> Similaire au champ <code>SplitOff</code>, utilisé pour générer un N-ième paquet à partir d'une seule exécution du couple compilation/installation. À partir d'une version CVS de fink postérieure à la version 0.19.2, vous pouvez utiliser des valeurs entières (non nécessairement consécutives) de N &gt;= 2. Néanmoins, il ne peut pas y avoir de doublons.</p>
</td></tr><tr valign="top"><td>Files</td><td>
<p><b>Introduit dans fink 0.9.9.</b> Utilisé <b>uniquement</b> avec un champ <code>SplitOff</code> ou <code>SplitOff<b>N</b></code>, ce champ indique quels fichiers et répertoires doivent être déplacés du répertoire d'installation %I du paquet parent vers le répertoire d'installation en cours %i. Notez que le déplacement a lieu après l'exécution des scripts InstallScript et DocFiles du paquet parent, mais avant l'exécution des mêmes scripts du paquet en cours d'installation.</p>
</td></tr></table>
<p><b>Phase de construction :</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>PreInstScript, PostInstScript, PreRmScript, PostRmScript</td><td>
<p>Ces champs correspondent à des scripts shell qui seront appelés lors de l'installation, la mise à jour ou la suppression du paquet. Fink ajoute automatiquement l'en-tête du script shell <code>#!/bin/sh</code> et appelle <code>set -e</code>, de façon à ce que tout échec d'une commande entraîne 'arrêt immédiat du script. Fink ajoute aussi <code>exit 0</code> à la fin du script. Pour signaler une erreur, utilisez exit avec un code non nul. Le premier paramètre (<code>$1</code>) contient une valeur indiquant l'action à faire. Exemples de valeurs possibles : <code>install</code>, <code>upgrade</code>, <code>remove</code> et <code>purge</code>. Notez qu'il existe d'autres valeurs, utilisées lors des reprises sur erreur et du remplacement d'un paquet par un autre.</p>
<p>Ces différents scripts sont appelés lors des évènements suivants :</p>
<ul>
<li>PreInstScript : lors de la première installation d'un paquet et avant la mise à jour d'un paquet à la même version.</li>
<li>PostInstScript : après le dépaquetage et la définition des variables spécifiques au paquet.</li>
<li>PreRmScript : avant la suppression et la mise à jour d'un paquet à une version ultérieure.</li>
<li>PostRmScript : après la suppression et la mise à jour du paquet à une version ultérieure.</li>
</ul>
<p>Soyons plus clair. Une mise à jour invoque à la fois les scripts ...Inst de la nouvelle version et les scripts ...Rm de l'ancienne version. Vous trouverez de plus amples informations à ce sujet dans le <a href="http://www.debian.org/doc/debian-policy/ch-maintainerscripts.html">Chapitre 6</a> du Manuel des normes Debian.</p>
<p>L'interprétation des raccourcis a lieu dans ces scripts. Les commandes peuvent, en général, être lancées sans donner leur chemin complet.</p>
</td></tr><tr valign="top"><td>ConfFiles</td><td>
<p>Liste de fichiers séparés par des espaces. Ces fichiers sont des fichiers de configuration modifiables par l'utilisateur. L'interprétation des raccourcis a lieu sur ce champ. Le chemin complet des fichiers doit être indiqué, comme dans <code>%p/etc/%n.conf</code>. Ces fichiers sont traités de façon spéciale par dpkg. Quand un paquet est mis à jour et que le fichier de configuration a changé à la fois sur le disque et dans le paquet, dpkg demande à l'utilisateur quelle version il veut utiliser et sauvegarde l'ancien fichier. Quand un paquet est supprimé avec "remove", les fichiers de configuration ne sont pas supprimés. Pour les supprimer, il faut utiliser "purge".</p>
</td></tr><tr valign="top"><td>InfoDocs</td><td>
<p>Liste des documents Info que le paquet installe dans %p/share/info. 
Des commandes appropriées sont ajoutées aux scripts postinst et prerm pour mettre à jour le fichier de la hiérarchie Info <code>dir</code>. 
</p>


<p><b>Note:</b>  Only use the un-numbered file in the case of split Info
documents. E.g. if a package has:</p>
<pre>
foo.info
foo.info-1
foo.info-2
</pre>
<p>you should only use:</p>
<pre>
InfoDocs:  foo.info
</pre>


<p>
Cette fonctionnalité est en cours de développement, d'autres champs pourront être ajoutés à l'avenir pour une gestion plus précise.</p>
</td></tr><tr valign="top"><td>DaemonicFile</td><td>
<p>Décrit un service pour <code>daemonic</code>. <code>daemonic</code> est utilisé par Fink pour créer et supprimer des éléments à lancer au démarrage pour les processus démon (par exemple les serveurs web). La description est ajoutée au paquet sous la forme d'un fichier nommé <code>%p/etc/daemons/<b>nom</b>.xml</code>, où <b>nom</b> est indiqué par le champ DaemonicName et est réduit, par défaut, au nom du paquet. L'interprétation des raccourcis a lieu sur le contenu de ce champ. Notez que vous devez ajouter <code>daemonic</code> à la liste des dépendances, si votre paquet utilise ce champ.</p>
</td></tr><tr valign="top"><td>DaemonicName</td><td>
<p>Nom du fichier de description d'un service <code>daemonic</code>. Voir la description de DaemonicFile pour de plus amples informations.</p>
</td></tr></table>
<p><b>Autres informations :</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Champ</th><th align="left">Utilisation</th></tr><tr valign="top"><td>Homepage</td><td>
<p>URL de la page d'accueil du paquet en amont.</p>
</td></tr><tr valign="top"><td>DescDetail</td><td>
<p>Description plus détaillée que celle figurant dans le champ <code>Description</code> (répond aux questions : qu'est-ce que c'est ?, comment l'utiliser?). Les lignes multiples sont autorisées. Comme ce champ sera affiché sans que la longueur des lignes soit adaptée à la largeur de la fenêtre d'affichage, vous devez insérer des sauts de ligne, de façon à ce que les lignes ne dépassent pas 78 caractères (si possible).</p>
</td></tr><tr valign="top"><td>DescUsage</td><td>
<p>Information nécessaire à l'utilisation du paquet (répond à la question : comment l'utiliser ?). Exemple : "exécute wmaker.inst avant d'utiliser WindowMaker". Lignes multiples autorisées. Comme ce champ sera affiché sans que la longueur des lignes soit adaptée à la largeur de la fenêtre d'affichage, vous devez insérer des sauts de ligne, de façon à ce que les lignes ne dépassent pas 78 caractères (si possible).</p>
</td></tr><tr valign="top"><td>DescPackaging</td><td>
<p>Notes sur la construction du paquet. Les éléments du type : "rustine pour le Makefile de sorte que tout aille au bon endroit" sont placés dans ce champ. Lignes multiples autorisées.</p>
</td></tr><tr valign="top"><td>DescPort</td><td>
<p>Notes spécifiques au portage du paquet sur Darwin. Les éléments du type : "scripts config.guess et libtool scripts mis à jour, -no-cpp-precomp nécessaire" sont placés dans ce champ. Lignes multiples autorisées.</p>
</td></tr></table>
<h2><a name="splitoffs">6.3 Paquets multiples</a></h2>
<p>À partir de la version 0.9.9 de fink, on peut utiliser un seul fichier .info pour construire plusieurs paquets. La phase d'installation commence, comme pour tout autre type de paquet, par l'exécution des scripts <code>InstallScript</code> et <code>DocFiles</code>. Si un champ <code>SplitOff</code> ou <code>SplitOff<b>N</b></code> est présent, il y a création d'un répertoire d'installation supplémentaire. À l'intérieur des champs <code>SplitOff</code> et <code>SplitOff<b>N</b></code>, le nouveau répertoire d'installation est désigné par %i, tandis que le répertoire d'installation du paquet parent est désigné par %I.</p>
<p>Chaque champ <code>SplitOff</code> ou <code>SplitOff<b>N</b></code> doit contenir un certain nombre de champs qui lui sont propres. En fait, cela ressemble à une description de paquet ordinaire, mais certains champs sont omis. Voici les champs qui peuvent y figurer (classés par catégorie) :</p>
<ul>
<li>Données initiales : seul le champ <code>Package</code> doit être spécifié, tout le reste est hérité du paquet parent. Vous pouvez modifier les champs <code>Type</code> et <code>License</code> en déclarant ces champs dans les champs <code>SplitOff</code> et <code>SplitOff<b>N</b></code>. On peut utiliser les raccourcis ; il est préférable de mentionner le nom du paquet parent sous la forme %N.</li>
<li>Dépendances : tous les champs sont autorisés.</li>
<li>Phases de décompression, d'application des rustines, de compilation : ces champs n'ont pas de signification dans ce contexte et seront ignorés s'ils sont présents.</li>
<li>Phases d'installation et de construction : tous les champs sont autorisés à l'exception des champs SplitOff (un champ SplitOff ne peut contenir lui-même un autre champ SplitOff).</li>
<li>Données supplémentaires : elles sont héritées du paquet parent, mais peuvent être modifiées en déclarant le champ dans les champs <code>SplitOff</code> ou <code>SplitOff<b>N</b></code>.</li>
</ul>
<p>Comme %n-%v-%r représente l'identifiant unique d'un paquet, on ne peut avoir le même champ <code>Package</code> (avec les mêmes champs <code>Version</code> et <code>Revision</code>) dans un <code>SplitOff</code> (ou dans un <code>SplitOff<b>N</b></code>) d'un paquet multiple. Si l'on utilise des variantes, il faut se rappeler que chaque variante est considérée comme un paquet indépendant des autres. Il s'ensuit que la disposition suivante est interdite :</p>
<pre>
Package: mime-base64-pm%type_pkg[perl]
Type: perl (5.8.1 5.8.6)
SplitOff: &lt;&lt;
  Package: mime-base64-pm-bin
&lt;&lt;
</pre>
<p>Lors de la phase d'installation, les champs <code>InstallScript</code> et <code>DocFiles</code> du paquet parent sont exécutés en premier. Puis vient l'exécution des champs <code>SplitOff</code> et <code>SplitOff<b>N</b></code>. Pour chacun de ces champs à tour de rôle, la commande <code>Files</code> déplace les fichiers et répertoires spécifiés, du répertoire d'installation %I du paquet parent dans le répertoire de l'installation en cours %i. Puis les scripts <code>InstallScript</code> et <code>DocFiles</code> des paquets <code>SplitOff</code> et <code>SplitOff<b>N</b></code> sont exécutés.</p>
<p>À l'heure actuelle, le champ <code>SplitOff</code>, s'il existe, est exécuté en premier, suivi des champs <code>SplitOff<b>N</b></code> par ordre numérique. Néanmoins, cela pourrait changer dans le futur. Il est donc conseillé de ne pas utiliser :</p>
<pre>
SplitOff: &lt;&lt;
  Description: certains headers
  Files: include/foo.h include/bar.h
&lt;&lt;
SplitOff2: &lt;&lt;
  Description: tous les autres headers
  Files: include/*
&lt;&lt;
</pre>
<p>qui ne fonctionne correctement que si <code>SplitOff</code> est exécuté avant <code>SplitOff2</code>. Il vaut mieux donner la liste explicite des fichiers pour chaque champ (ou utiliser des noms de fichier plus explicites).</p>
<p>Lors de la phase de construction du paquet, les scripts pre/post install/remove de chacun des paquets sont construits à partir des commandes spécifiques de la phase de construction desdits paquets.</p>
<p>Chaque paquet à construire doit placer les fichiers de licence dans %i/share/doc/%n (avec %n ayant une valeur différente pour chaque paquet). Notez que <code>DocFiles</code> copie les fichiers au lieu de les déplacer ; il est donc possible d'installer une même copie de la documentation dans chacun des paquets en utilisant <code>DocFiles</code> plusieurs fois.</p>

<h2><a name="scripts">6.4 Scripts</a></h2>
<p>Les champs PatchScript, CompileScript et InstallScript vous permettent d'indiquer des commandes shell à exécuter. Le répertoire de construction (<code>%b</code>) est le répertoire en cours lors de l'exécution des scripts. Vous devez toujours utiliser des chemins relatifs ou des raccourcis pour les fichiers et répertoires de l'arborescence fink, et jamais des chemins absolus. Deux formats différents sont possibles pour ces champs.</p>
<p>Le champ peut être constitué d'une simple liste de commandes, un peu comme un script shell. Néanmoins, les commandes sont exécutées ligne après ligne via system(). Il en résulte que l'assignation de variables ou les changements de répertoire n'ont d'effet que pour les commandes résidant sur une même ligne. À partir d'une version CVS de fink postérieure à 0.18.2, vous pouvez ajuster la longueur des lignes de la même manière que dans les scripts shell : une barre oblique inversée (<code>\</code>) à la fin de la ligne indique que la ligne suivante est la suite de la ligne précédente.</p>
<p>Vous pouvez aussi insérer un script complet, en utilisant l'interpréteur que vous voulez. Comme avec tout autre script Unix, la première ligne doit commencer par <code>#!</code> suivi du chemin complet de l'interpréteur et des options désirées (exemple : <code>#!/bin/csh</code>, <code>#!/bin/bash -ev</code>, etc...). Dans ce cas, la totalité du champ *Script est déversée dans un fichier temporaire, qui est alors exécuté.</p>

<h2><a name="patches">6.5 Rustines</a></h2>
<p>Si votre paquet nécessite une rustine pour compiler sous Darwin (ou pour fonctionner avec fink), donnez à la rustine le même nom que celui indiqué dans la description du paquet, en utilisant l'extension ".patch" au lieu de ".info", et placez-la dans le même répertoire que le fichier .info. Si vous utilisez le nom complet du paquet dans le nom du fichier, indiquez-le dans le champ d'une des façons suivantes (elles sont équivalentes) :</p>
<pre>Patch: %f.patch</pre>
<pre>PatchScript: patch -p1 &lt;%a/%f.patch</pre>
<p>Si vous utilisez les nouvelles conventions de nommage d'un paquet unique, utilisez %n au lieu de %f. Ces deux champs ne sont pas exclusifs l'un de l'autre ; vous pouvez utiliser les deux et ils seront tous deux exécutés. Dans ce cas, le script PatchScript sera exécuté en dernier.</p>
<p>Comme il se peut que vous ayez besoin du préfixe choisi par l'utilisateur dans le fichier rustine, il est conseillé d'utiliser une variable telle <code>@PREFIX@</code> au lieu de <code>/opt/sw</code> dans la rustine et d'utiliser ensuite :</p>
<pre>PatchScript: sed 's|@PREFIX@|%p|g' &lt;%a/%f.patch | patch -p1</pre>
<p>Les rustines doivent être en format unidiff et sont, en général, créées en utilisant :</p>
<pre>diff -urN &lt;répertoiredusourceoriginel&gt; &lt;répertoiredusourcemodifié&gt;</pre>
<p>Si vous utilisez emacs pour modifier les fichiers, vous devez ajouter <code>-x'*~'</code> à la commande diff ci-dessus, pour exclure les fichiers de sauvegarde générés automatiquement.</p>
<p>Il faut aussi noter que les très grosses rustines ne doivent pas être mises dans cvs. Elles doivent être placées sur un serveur web/ftp et référencées en utilisant le champ <code>SourceN:</code>. Si vous n'avez pas de site web, les administrateurs du projet fink peuvent mettre le fichier à disposition à partir du site web de fink. Si votre rustine fait plus de 30Kb, vous devez la traiter comme un téléchargement distinct.</p>

<h2><a name="profile.d">6.6 Scripts profile.d</a></h2>
<p>Si votre paquet nécessite une initialisation à l'exécution (par exemple, pour définir des variables d'environnement), vous pouvez utiliser des scripts profile.d. Ces scripts sont sourcés par les scripts <code>/opt/sw/bin/init.[c]sh</code>. Normalement, tout utilisateur de fink charge ces scripts dans ses fichiers de démarrage de shell (<code>.cshrc</code> et équivalents). Votre paquet doit fournir deux variantes de scripts : l'une pour les shells compatibles avec sh (sh, zsh, bash, ksh, ...), l'autre pour les shells compatibles avec csh (csh, tcsh). Elles doivent être installées sous la forme <code>/opt/sw/etc/profile.d/%n.[c]sh</code> (où %n représente le nom du paquet). Il faut aussi positionner leurs bits de lecture et d'exécution (c'est-à-dire les installer avec -m 755), autrement elles ne seront pas chargées correctement.</p>
<p>Si vous n'avez besoin que d'initialiser certaines variables d'environnement (par exemple, définir QTDIR comme '/opt/sw'), vous pouvez utiliser le champ RuntimeVars, qui a été conçu exactement pour ce faire.</p>


<?php include_once "../../footer.inc"; ?>


