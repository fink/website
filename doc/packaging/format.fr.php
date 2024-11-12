<?php
$title = "Paquets - Descriptions de paquets";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2024/11/12 10:05:32';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="next" href="policy.php?phpLang=fr" title="Règles de distribution des paquets"><link rel="prev" href="intro.php?phpLang=fr" title="Introduction">';


include_once "header.fr.inc";
?>
<h1>Paquets - 2. Descriptions de paquets</h1>


<h2><a name="trees">2.1 Arborescence</a></h2>
<p>Les descriptions de paquets sont lues à partir des répertoires <code>finkinfo</code> situés dans le répertoire <code>/opt/sw/fink/dists</code>. La valeur de la variable "Trees" dans <code>/opt/sw/etc/fink.conf</code> contrôle quels répertoires sont lus. Le nom des fichiers de description de paquets doit être identique au nom complet du paquet suivi de l'extension ".info". 
À partir de fink 0.26.0, il existe plusieurs façons de spécifier le nom du fichier ; il est recommandé d'utiliser le nom le plus court compatible avec les autres paquets nécessaires. 
Le nom du fichier est de la forme : nom invariant du paquet, suivi éventuellement d'un tiret et de l'architecture, suivi éventuellement d'un tiret et de la distribution, suivi éventuellement d'un tiret et de la version ou du couple version-révision, et terminé par ".info". 
Les éléments "architecture" et "distributtion" ne sont autorisés que si leurs champs sont présents dans le paquet et qu'ils fournissent une seule et unique valeur.
</p>
<p>L'arborescence des descriptions de paquets comprend plusieurs niveaux de répertoires. En voici la liste de la racine au bas de l'arborescence :</p>
<ul>
<li><code>dists</code> est à la racine. Le répertoire <code>dists</code> est nécessaire pour les outils Debian.

In recent versions of fink, this is a symlink to a directory with a distribution-inspired name.

</li>
<li>La distribution. Il y en a trois : <code>stable</code>, <code>unstable</code> et <code>local</code>. Le répertoire <code>local</code> est sous le contrôle de l'utilisateur/administrateur local. Les répertoires <code>stable</code> et <code>unstable</code> font partie de Fink.</li>
<li>L'arbre.

The <code>main</code> tree contains the bulk of the packages. Prior to July 1, 2010, the Cryptographic software was kept in a separate tree, <code>crypto</code>, but this is now a section of the <code>main</code> tree.

</li>
<li><code>finkinfo</code> et <code>binary-darwin-powerpc</code>. <code>finkinfo</code> contient les descriptions de paquets Fink et leurs rustines, tandis que <code>binary-darwin-powerpc</code> contient les paquets binaires <code>.deb</code>.</li>
<li>Sections. L'arbre <code>main</code> est subdivisé en sections thématiques pour en faciliter la gestion.</li>
</ul>

<h2><a name="format">2.2 Format de fichier</a></h2>
<p>Les fichiers de description sont de simples listes de paires clés-valeurs, appelés également "champs". Chaque ligne commence par une clé, suivie de deux-points et d'une espace, puis de la valeur de clé :</p>
<pre>clé: valeur</pre>
<p>Il y a deux notations pour les champs qui peuvent s'étendre sur plusieurs lignes.</p>
<p>La notation recommandée est basée sur la syntaxe "here-document" - "données ci-après", utilisée dans les scripts shell. Dans cette syntaxe, la première ligne est composée de la clé, suivie du symbole redoublé <code>&lt;&lt;</code> comme valeur. Toutes les lignes suivantes sont considérées comme valeurs, jusqu'à la rencontre d'une ligne ne contenant que <code>&lt;&lt;</code>. L'exemple ci-dessus ressemble maintenant à :</p>
<pre>InstallScript: &lt;&lt;
mkdir -p %i/share/man
make install prefix=%i mandir=%i/share/man
mkdir -p %i/share/doc/%n
install -m 644 COPYING %i/share/doc/%n
&lt;&lt;</pre>
<p>Avec ce format, l'indentation est optionnelle, mais vous pouvez l'utiliser pour améliorer la lisibilité.</p>
<p>On peut imbriquer plusieurs "here-document". Cela arrive souvent dans un champ <code>SplitOff</code> ou <code>SplitOff<b>N</b></code>. Ces champs contiennent d'autres champs (à lignes multiples), et cette syntaxe permet aux sous-champs de contenir eux mêmes des lignes multiples. Le même code de terminaison <code>&lt;&lt;</code> est utilisé pour les sous-champs utilisant la syntaxe "here-document". En voici un exemple :</p>
<pre>
SplitOff: &lt;&lt;
  Package: %N-shlibs
  InstallScript: &lt;&lt;
    ln -s %p/lib/libfoo.2.dylib %i/lib/libfoo.%v.dylib
  &lt;&lt;
&lt;&lt;
</pre>
<p>Une notation plus ancienne, obsolète, est basée sur la méthode de pliage des headers du RFC 822. Une ligne commençant par une espace est traitée comme la continuation de la ligne précédente. Exemple :</p>
<pre>InstallScript: mkdir -p %i/share/man
 make install prefix=%i mandir=%i/share/man
 mkdir -p %i/share/doc/%n
 install -m 644 COPYING %i/share/doc/%n</pre>
<p>Notez l'indentation obligatoire des lignes.</p>
<p>Dans les deux formats, les lignes vides ainsi que celles débutant avec un dièse (#) sont ignorées. Dans Fink, les clés (noms des champs) ne sont pas sensibles à la casse, vous pouvez donc écrire indifféremment : <code>InstallScript</code>, <code>installscript</code> ou <code>INSTALLSCRIPT</code>. Cependant, on conseille la première forme, où chaque initiale de mot est mise en majuscules, pour des raisons de lisibilité. Certains champs prennent une valeur booléenne ; sont traitées comme vraies, les valeurs suivantes : "true", "yes", "on", "1" (toutes insensibles à la casse) ; toute autre valeur est traitée comme fausse.</p>

<h2><a name="percent">2.3 Raccourcis %</a></h2>
<p>Pour vous rendre la vie plus facile, Fink gère un jeu de raccourcis sur certains champs. Pour lever toute ambiguïté, vous pouvez utiliser des accolades autour des caractères qui doivent être considérés comme des raccourcis. Par exemple, <code>%{n}</code> a la même signification que <code>%n</code>. Les raccourcis disponibles sont les suivants :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Raccourcis</th><th align="left">Signification</th></tr><tr valign="top"><td>%n</td><td>
<p>le <b>n</b>om du paquet actif</p>
</td></tr><tr valign="top"><td>%N</td><td>
<p><b>N</b>om du paquet parent (le même que %n à moins d'être dans un
<code>SplitOff</code>)</p>
<p>Note : si le champ <code>Package</code> d'un paquet parent contient %type_*[], la valeur de ces raccourcis <b>sera</b> incluse dans %N dans un bloc <code>SplitOff</code> (étant donné qu'elle est incluse dans %n dans le paquet parent).</p>
</td></tr><tr valign="top"><td>%e</td><td>
<p>ère du paqu<b>e</b>t</p>
</td></tr><tr valign="top"><td>%v</td><td>
<p><b>v</b>ersion du paquet. Notez que l'ère ne fait partie de <code>%v</code>.</p>
</td></tr><tr valign="top"><td>%V</td><td>
<p>
the full package <b>V</b>ersion, which automatically includes the Epoch
if present.  Note that this percent expansion is only available for
packages whose <code>InfoN</code> level is at least 4.
</p>
</td></tr><tr valign="top"><td>%r</td><td>
<p><b>r</b>évision du paquet</p>
</td></tr><tr valign="top"><td>%f</td><td>
<p>nom complet du paquet, c'est-à-dire : %n-%v-%r. Notez que l'ère ne fait partie de <code>%f</code>.</p>
</td></tr><tr valign="top"><td>%p, %P</td><td>
<p><b>p</b>réfixe d'installation de Fink, par exemple : <code>/opt/sw</code>. Vous ne devez pas partir du principe que Fink est installé dans <code>/opt/sw</code>, utilisez <code>%p</code> pour obtenir le bon chemin.</p>
</td></tr><tr valign="top"><td>%d</td><td>
<p>répertoire <b>d</b>ans lequel le paquet est construit, par exemple : <code>/opt/sw/src/fink.build/root-gimp-1.2.1-1</code>. Ce répertoire temporaire sert de racine d'arborescence lors de la phase d'installation de la compilation d'un paquet. Vous ne devez pas partir du principe que <code>root-%f</code> est dans <code>%p/src</code>, car l'utilisateur peut changer ce répertoire en utilisant le champ <code>Buildpath</code> de <code>/opt/sw/etc/fink.conf</code>.</p>
</td></tr><tr valign="top"><td>%D</td><td>
<p>répertoire <b>D</b>ans lequel le paquet parent est construit (le même que %d à moins d'être dans un <code>SplitOff</code>)</p>
</td></tr><tr valign="top"><td>%i</td><td>
<p>préf<b>i</b>xe complet de la phase d'installation, équivalent à %d%p</p>
</td></tr><tr valign="top"><td>%I</td><td>
<p>préfixe d'<b>I</b>nstallation du paquet parent, équivalent à %D%P (identique à %i à moins d'être dans un <code>SplitOff</code>)</p>
</td></tr><tr valign="top"><td>%a</td><td>
<p>chemin des rustines</p>
</td></tr><tr valign="top"><td>%b</td><td>
<p>répertoire de compilation, exemple : <code>/opt/sw/src/fink.build/gimp-1.2.1-1/gimp-1.2.1</code>. Vous ne devez pas partir du principe que <code>%f</code> est dans <code>%p/src</code>, car l'utilisateur peut changer ce répertoire en utilisant le champ <code>Buildpath</code> de <code>/opt/sw/etc/fink.conf</code>. Le dernier sous-répertoire tire son nom du champ <code>Source</code>, ou du champ <code>SourceDirectory</code> (si ce champ existe), ou bien n'existe pas si le champ <code>NoSourceDirectory</code> a pour valeur <code>true</code> (vrai).</p>
<p>Note : ne l'utilisez que s'il n'y a pas d'autres possibilités. Le répertoire de compilation est
le répertoire actif lorsque les scripts sont exécutés ; vous devez utiliser des chemins relatifs dans les commandes.</p>
</td></tr><tr valign="top"><td>%c</td><td>
<p>paramètres pour <b>c</b>onfigure : <code>--prefix=%p</code> plus tout autre élément spécifié avec ConfigureParams. Dans le cas d'un paquet qui comporte le <code>Type: perl</code>, les drapeaux par défaut de construction d'un paquet perl sont utilisés à la place de <code>--prefix=%p</code>.</p>
</td></tr><tr valign="top"><td>%m</td><td>
<p>chaîne spécifiant l'architecture de la <b>m</b>achine. Identique au résultat de la commande <code>uname -p</code>. Les valeurs habituelles sont 'powerpc' pour les machines ppc and 'i386' pour les machines x86. Introduit dans les versions CVS de fink postérieures à la version 0.12.1.</p>
</td></tr><tr valign="top"><td>%%</td><td>
<p>signe pourcentage (%) (ce signe n'est pas interprété en fonction de ce qui le suit). L'interprétation se fait de gauche à droite, si bien que %%n n'a rien à voir avec le nom du paquet, mais représente la chaîne %n. (Introduit dans fink-0.18.0).</p>
</td></tr><tr valign="top"><td>%type_raw[<b>type</b>], %type_pkg[<b>type</b>], %type_num[<b>type</b>]</td><td>
<p>fonction de pseudo-hachage retournant le sous-type du <b>type</b> donné. Voir la documentation sur le champ <code>Type</code> plus bas. La forme _raw correspond à la chaîne précise du sous-type, tandis que la forme _pkg correspond à la même chaîne dont tous les points auraient été enlevés (suivant les conventions de nommage des paquets - language-version - de Fink et pour d'autres usages réservés aux experts). (Introduit dans une version CVS de Fink ultérieure à la version 0.19.2). La forme _num a été introduit dans la version 0.26.0 de fink et supprime tous les caractères non numériques du champ <code>Type</code>.</p>
</td></tr><tr valign="top"><td>%{ni}, %{Ni}</td><td>
<p>la partie <b>i</b>nvariante du <b>n</b>om du paquet. Identiques à %n et %N, à l'exception près que tous les %type_pkg[] et %type_raw[] sont occultés. (Introduit dans une version CVS de Fink ultérieure à la version 0.19.2). Vous devez utiliser %{ni} et %{Ni} pour éviter de possibles confusions avec les raccourcis %n et %N.</p>
</td></tr><tr valign="top"><td>%{default_script}</td><td>
<p>Uniquement valide dans les champs <code>PatchScript</code>, <code>CompileScript</code> et <code>InstallScript</code>. Correspond au contenu par défaut de ce type de champ. Sa valeur dépend souvent du champ <code>Type</code> et est toujours définie (même si elle vide). Lorsque ce raccourci est utilisé dans le champ <code>InstallScript</code> d'un <code>SplitOff</code> ou d'un <code>SplitOffN</code>, son interprétation correspond à la valeur par défaut du champ <b>parent</b>, bien que la valeur par défaut de <code>InstallScript</code> dans un <code>SplitOff</code> soit vide. (Introduit dans fink-0.20.6)</p>
</td></tr><tr valign="top"><td>%{PatchFile}</td><td>
<p>Chemin complet du fichier indiqué dans le champ<code>PatchFile</code>. Introduit dans la version 0.24.12 de fink.</p>
</td></tr><tr valign="top"><td>%lib</td><td>
<p>Si le champ <code>Type: -64bit</code> a pour valeur <code>-64bit</code>, ce raccourci permet de définir le répertoire des bibliothèques comme étant le répertoire <b>lib/ppc64</b> sur machines powerpc, ou  <b>lib/x86_64</b> sur machines intel (répertoires standards pour les bibliothèques 64-bit). Dans le cas contraire, le raccourci définit le répertoire <b>lib</b> comme répertoire pour les bibliothèques. Introduit dans la version 0.20.6 de fink.</p>

<p>Note that <code>%lib</code> is not permitted in the
<code>ConfigureParams</code> field unless the <code>InfoN</code>
 level is at least 4.
</p>

</td></tr></table>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="policy.php?phpLang=fr">3. Règles de distribution des paquets</a></p>
<?php include_once "../../footer.inc"; ?>


