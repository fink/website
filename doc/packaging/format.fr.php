<?
$title = "Paquets - Descriptions de paquets";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/03/26 01:13:46';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="next" href="policy.php?phpLang=fr" title="Règles de distribution des paquets"><link rel="prev" href="intro.php?phpLang=fr" title="Introduction">';

include_once "header.inc";
?>

<h1>Paquets - 2 Descriptions de paquets</h1>



<h2><a name="trees">2.1 Arborescence</a></h2>
<p>
Les descriptions de paquets sont lues à partir des répertoires <code>finkinfo</code>
situés dans le répertoire <code>/sw/fink/dists</code>.
La valeur de la variable "Trees" dans <code>/sw/etc/fink.conf</code> contrôle quels répertoires sont lus.
Le nom des fichiers de description de paquets doit être identique au nom complet du paquet suivi de l'extension ".info".
À partir de fink 0.13.0, on peut aussi n'utiliser que le nom du paquet suivi de l'extension ".info", de manière à simplifier les mises à jour.
</p>
<p>
L'arborescence des descriptions de paquets comprend plusieurs niveaux de répertoires.
En voici la liste de la racine au bas de l'arborescence :
</p>
<ul>
<li><code>dists</code> est à la racine.  Le répertoire <code>dists</code> est nécessaire pour les outils Debian.</li>
<li>La distribution. Il y en a trois : <code>stable</code>,
<code>unstable</code> et <code>local</code>. Le répertoire <code>local</code>
est sous le contrôle de l'utilisateur/administrateur local. Les répertoires 
<code>stable</code> et <code>unstable</code> font partie de Fink.</li>
<li>L'arbre. L'arbre <code>main</code> - principal contient la plupart des paquets. Les logiciels cryptographiques sont situés dans un arbre spécial 
<code>crypto</code>, pour faciliter leur suppression, si cela s'avérait nécessaire.</li>
<li><code>finkinfo</code>
et <code>binary-darwin-powerpc</code>. <code>finkinfo</code> contient les descriptions de paquets Fink et leurs rustines, tandis que <code>binary-darwin-powerpc</code> contient les paquets binaires <code>.deb</code>.</li>
<li>Sections. L'arbre <code>main</code> est subdivisé en sections thématiques pour en faciliter la gestion. L'arbre <code>crypto</code> n'est, lui, pas subdivisé en sections à l'heure actuelle.</li>
</ul>


<h2><a name="format">2.2 Format de fichier</a></h2>
<p>
Les fichiers de description sont de simples listes de paires clés-valeurs, appelés également "champs".
Chaque ligne commence par une clé, suivie de deux-points et d'une espace, puis de la valeur de clé :
</p>
<pre>clé: valeur</pre>
<p>
Il y a deux notations pour les champs qui peuvent s'étendre sur plusieurs lignes.
</p><p>
La notation recommandée est basée sur la syntaxe "here-document" - "données ci-après", utilisée dans les scripts shell.
Dans cette syntaxe, la première ligne est composée de la clé, suivie du symbole redoublé <code>&lt;&lt;</code>
comme valeur.
Toutes les lignes suivantes sont considérées comme valeurs, jusqu'à la rencontre d'une ligne ne contenant que <code>&lt;&lt;</code>.
L'exemple ci-dessus ressemble maintenant à :
</p>
<pre>InstallScript: &lt;&lt;
mkdir -p %i/share/man
make install prefix=%i mandir=%i/share/man
mkdir -p %i/share/doc/%n
install -m 644 COPYING %i/share/doc/%n
&lt;&lt;</pre>
<p>
Avec ce format, l'indentation est optionnelle, mais vous pouvez l'utiliser pour améliorer la lisibilité.
</p><p>
On peut imbriquer plusieurs "here-document". Cela arrive souvent dans un champ
 <code>SplitOff</code> ou <code>SplitOff<b>N</b></code>.
 Ces champs contiennent d'autres champs (à lignes multiples), et cette syntaxe
 permet aux sous-champs de contenir eux mêmes des lignes multiples. Le même code de terminaison <code>&lt;&lt;</code> est utilisé pour les sous-champs utilisant la syntaxe "here-document".
En voici un exemple :
</p>
<pre>
SplitOff: &lt;&lt;
  Package: %N-shlibs
  InstallScript: &lt;&lt;
    ln -s %p/lib/libfoo.2.dylib %i/lib/libfoo.%v.dylib
  &lt;&lt;
&lt;&lt;
</pre>
<p>
Une notation plus ancienne, obsolète, est basée sur la méthode de pliage des headers du RFC 822.
Une ligne commençant par une espace est traitée comme la continuation de la ligne précédente.
Exemple :
</p>
<pre>InstallScript: mkdir -p %i/share/man
 make install prefix=%i mandir=%i/share/man
 mkdir -p %i/share/doc/%n
 install -m 644 COPYING %i/share/doc/%n</pre>
<p>
Notez l'indentation obligatoire des lignes.
</p><p>
Dans les deux formats, les lignes vides ainsi que celles débutant avec un dièse (#) sont ignorées.
Dans Fink, les clés (noms des champs) ne sont pas sensibles à la casse, vous pouvez donc écrire
indifféremment : <code>InstallScript</code>, <code>installscript</code> ou
<code>INSTALLSCRIPT</code>.
Cependant, on conseille la première forme, où chaque initiale de mot est mise en majuscules, pour des raisons de lisibilité.
Certains champs prennent une valeur booléenne ; sont traitées comme vraies, les valeurs suivantes :
"true", "yes", "on", "1" (toutes insensibles à la casse) ; toute autre valeur est traitée comme fausse.
</p>


<h2><a name="percent">2.3 Raccourcis %</a></h2>
<p>
Pour vous rendre la vie plus facile, Fink gère un jeu de raccourcis sur certains champs.
Pour lever toute ambiguïté, vous pouvez utiliser des accolades autour des caractères qui doivent être considérés comme des raccourcis. Par exemple, <code>%{n}</code> a la même signification que <code>%n</code>.
Les raccourcis disponibles sont les suivants :</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left"></th><th align="left"></th></tr><tr valign="top"><td>%n</td><td>
<p>
le <b>n</b>om du paquet actif
</p>
</td></tr><tr valign="top"><td>%N</td><td>
<p>
<b>N</b>om du paquet parent (le même que %n à moins d'être dans un
<code>SplitOff</code>)
</p>
</td></tr><tr valign="top"><td>%e</td><td>
<p>
ère du paqu<b>e</b>t
</p>
</td></tr><tr valign="top"><td>%v</td><td>
<p>
<b>v</b>ersion du paquet
</p>
</td></tr><tr valign="top"><td>%r</td><td>
<p>
<b>r</b>évision du paquet
</p>
</td></tr><tr valign="top"><td>%f</td><td>
<p>
nom complet du paquet, c'est-à-dire : %n-%v-%r
</p>
</td></tr><tr valign="top"><td>%p, %P</td><td>
<p>
<b>p</b>réfixe d'installation de Fink, par exemple : <code>/sw</code>
</p>
</td></tr><tr valign="top"><td>%d</td><td>
<p>
répertoire <b>d</b>ans lequel le paquet est construit, par exemple : 
<code>/sw/src/root-gimp-1.2.1-1</code>. Ce répertoire temporaire sert de racine d'arborescence lors de la phase d'installation de la compilation d'un paquet. Vous ne devez pas partir du principe que 
<code>root-%f</code> est dans <code>%p/src</code>, car l'utilisateur peut changer ce répoertoire en utilisant le champ <code>Buildpath</code> de <code>/sw/etc/fink.conf</code>.
</p>
</td></tr><tr valign="top"><td>%D</td><td>
<p>
répertoire <b>D</b>ans lequel le paquet parent est construit (le même que %d à moins d'être dans un
<code>SplitOff</code>)
</p>
</td></tr><tr valign="top"><td>%i</td><td>
<p>
préf<b>i</b>xe complet de la phase d'installation, équivalent à %d%p
</p>
</td></tr><tr valign="top"><td>%I</td><td>
<p>
préfixe d'<b>I</b>nstallation du paquet parent, équivalent à %D%P (identique 
à %i à moins d'être dans un <code>SplitOff</code>)
</p>
</td></tr><tr valign="top"><td>%a</td><td>
<p>
chemin des rustines
</p>
</td></tr><tr valign="top"><td>%b</td><td>
<p>
répertoire de compilation, exemple : <code>/sw/src/gimp-1.2.1-1/gimp-1.2.1</code>.Vous ne devez pas partir du principe que <code>root-%f</code> est dans <code>%p/src</code>, car l'utilisateur peut changer ce répoertoire en utilisant le champ <code>Buildpath</code> de <code>/sw/etc/fink.conf</code>.
</p>
<p>
Note: ne l'utilisez que s'il n'y a pas d'autres possibilités. Le répertoire de compilation est
le répertoire actif lorsque les scripts sont exécutés ; vous devez utiliser des chemins relatifs dans les commandes.
</p>
</td></tr><tr valign="top"><td>%c</td><td>
<p>
paramètres pour <b>c</b>onfigure : <code>--prefix=%p</code> plus tout autre élément spécifié avec ConfigureParams
</p>
</td></tr><tr valign="top"><td>%m</td><td>
<p>
chaîne spécifiant l'architecture de la <b>m</b>achine .  Identique au résultat de la commande <code>uname -p</code>. Les valeurs habituelles sont 'powerpc' pour les machines ppc
and 'i386' pour les machines x86. (Introduit dans les versions CVS de fink postérieures à la 0.12.1.)
</p>
</td></tr><tr valign="top"><td>%%</td><td>
<p>
signe pourcent (%) (ce signe n'est pas interprété en fonction de ce qui le suit). L'interprétation se fait de gauche à droite, si bien que %%n n'a rien à voir avec le nom du paquet,  mais représente la chaîne %n.  (Introduit dans fink-0.18.0).
</p>
</td></tr></table>



<p align="right">
Next: <a href="policy.php?phpLang=fr">3 Règles de distribution des paquets</a></p>

<? include_once "footer.inc"; ?>
