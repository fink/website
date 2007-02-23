<?
$title = "Guide utilisateur - fink.conf";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:56';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="next" href="usage.php?phpLang=fr" title="Utilisation de l\'outil fink en ligne de commande"><link rel="prev" href="upgrade.php?phpLang=fr" title="Mise à niveau de Fink">';


include_once "header.fr.inc";
?>
<h1>Guide utilisateur - 5. Fichier de Configuration de Fink</h1>



<p>Ce chapitre vous décrit les différents éléments du fichier de configuration de Fink (fink.conf) et leur influence sur le comportement de Fink, en particulier sur celui de l'outil en ligne de commande <code>fink</code> (celui qui fonctionne avec la distribution source).</p>

<h2><a name="about">5.1 À propos de fink.conf</a></h2>

<p>Lors de la première installation de Fink, vous devez répondre à un certain nombre de questions. Vos réponses servent à personnaliser le fichier de configuration, par exemple les <a href="#mirrors">miroirs</a> que vous désirez utiliser pour le téléchargement des fichiers ou la façon d'acquérir les droits de super-utilisateur. Vous pouvez, à tout moment, réexécuter ce processus en lançant la commande <code>fink configure</code>. Certaines options ne peuvent être changées que manuellement en éditant le fichier <b>fink.conf</b>. En général, ces options sont réservés aux utilisateurs chevronnés.</p>
<p>Le fichier <b>fink.conf</b> est situé dans le répertoire <code>/sw/etc/</code> et peut être édité avec votre éditeur de texte préféré. Vous devez avoir les droits de super-utilisateur pour le modifier.</p>

<h2><a name="syntax">5.2 Syntaxe de fink.conf</a></h2>

<p>Le fichier <b>fink.conf</b> est constitué de plusieurs lignes ayant le même format :</p>
<pre>NomOption: Valeur</pre>
<p>Il y a une option par ligne et le nom de l'option est séparée de la valeur par des double-points et une espace. Le contenu de la valeur dépend de l'option ; c'est généralement une valeur booléenne ("True" - vrai - ou "False" - faux), une chaîne de caractères ou une liste de chaînes de caractères séparées entre elles par une espace. Par exemple :</p>
<pre>
OptionBooléenne: True
OptionChaîne: QuelqueChose
OptionListe: Option1 Option2 Option3
</pre>

<h2><a name="required">5.3 Éléments obligatoires</a></h2>

<p>Certains éléments doivent obligatoirement figuré dans le fichier <code>fink.conf</code>. Sans eux, Fink ne peut pas fonctionner correctement. Voici les éléments qui appartiennent à cette catégorie.</p>
<ul>
<li>
<p><b>Basepath:</b> chemin</p>
<p>Indique à <code>fink</code> où il est installé. Le chemin d'installation par défaut est <code>/sw</code>, mais vous pouvez l'avoir changé lors de la première installation de Fink. Vous <b>ne devez pas</b> changer cette valeur après installation, Fink ne s'y retrouverait plus.</p>
</li>
</ul>

<h2><a name="optional">5.4 Options utilisateur</a></h2>

<p>D'autres éléments sont optionnels et permettent aux utilisateurs de changer le comportement de Fink.</p>
<ul>
<li>
<p><b>RootMethod:</b> su ou sudo ou none</p>
<p>Pour effectuer certaines opérations, Fink doit acquérir les droits de super-utilisateur. Les valeurs reconnues pour cette option sont <b>sudo</b> ou <b>su</b>. Si vous attribuez à cette option la valeur <b>none</b> (aucune), vous devrez d'abord acquérir les droits de super-utilisateur avant d'exécuter Fink. La valeur par défaut est <b>sudo</b> et ne doit pas être changée, sauf rares exceptions.</p>
</li>
<li>
<p><b>Trees:</b> liste d'arborescences</p>
<p>La liste des arborescences disponibles est la suivante :</p>
<pre>
local/main      - tout paquet local que vous désirez installer
local/bootstrap - paquets utilisés pendant l'installation de Fink
stable/crypto   - paquets cryptographiques stables
stable/main     - autres paquets stables
unstable/crypto - paquets cryptographiques instables
unstable/main   - autres paquets instables
</pre>
<p>Vous pouvez aussi ajouter vos propres arborescences dans le répertoire <code>/sw/fink/dists</code> pour faire ce que vous voulez, mais ce n'est pas nécessaire dans la plupart des cas. Les arborescences par défaut sont "local/main local/bootstrap
stable/main". Cette liste doit toujours être identique à celle figurant dans le fichier 
<code>/sw/etc/apt/sources.list</code>. À partir de la version 0.21.0, <code>fink</code> le fait automatiquement pour vous.</p>
<p>L'ordre des arborescences dans la liste est important. En effet, car les paquets issus d'une arborescence située en aval de la liste peuvent écraser ceux des paquets issus d'une arborescence située en amont de la liste.</p> 
</li>
<li>
<p><b>Distribution:</b> 10.1, 10.2, 10.2-gcc3.3, 10.3 ou 10.4</p>
<p>Fink doit savoir quelle version de Mac OS X est installée sur votre système. Mac OS X 10.0 et les versions antérieures ne sont pas gérées, et Mac OS X 10.1 et Mac OS X 10.2 ne sont plus maintenues dans les versions actuelles de <code>fink</code>. Les utilisateurs de Mac OS X10.2 ne peuvent installer que la version 0.24.7 de <code>fink</code> sortie en juin 2005. Ce champ est configuré par l'exécution du script <code>/sw/lib/fink/postinstall.pl</code>. Il est peu probable que vous ayez à changer cette valeur.</p>
</li>
<li>
<p><b>FetchAltDir:</b> chemin</p>
<p>En général, <code>fink</code> sauvegarde les sources qu'il télécharge dans le répertoire <code>/sw/src</code>. Avec cette option, vous pouvez indiquer un autre répertoire pour le code source téléchargé. Par exemple:</p>
<pre>FetchAltDir: /usr/src</pre>
</li>
<li>
<p><b>Verbose:</b> un nombre entre 0 et 3</p>
<p>Cette option permet de faire varier la quantité d'information que Fink donne sur ce qu'il est en train de faire. Les valeurs sont : <b>0</b> Silencieux (aucune indication sur les statistiques de téléchargement) <b>1</b> Faible (aucune indication pendant la décompression des archives tar)
<b>2</b> Moyen (affiche presque tout) <b>3</b> Fort (affiche tout). La valeur par défaut est 1.</p>
</li>
<li>
<p><b>SkipPrompts:</b> liste délimitée par des virgules</p>
<p>Disponible à partir de la version 0.25 de <code>fink</code>. Cette option permet d'utiliser les réponses par défaut à certaines questions. Chaque question appartient à une catégorie. Si cette catégorie apparaît dans la liste SkipPrompts, la réponse par défaut à cette question est choisie par <code>fink</code> après un très court laps de temps.</p>
<p>À l'heure actuelle, les catégories suivantes sont disponibles :</p>
<p><b>fetch</b> - téléchargements et miroirs</p>
<p><b>virtualdep</b> - choix entre différents paquets</p>
<p>Par défaut, cette liste est vide.</p>
</li>
<li>
<p><b>NoAutoIndex:</b> booléen</p>
<p>Fink cache les fichiers de description de paquets dans <code>/sw/var/db/fink.db</code> pour éviter d'avoir à les lire et les analyser à chaque fois qu'il est invoqué. Il vérifie si l'index des paquets doit être ou non mis à jour, sauf si la valeur de cette option est "True". Sa valeur par défaut est "False" et il n'est pas recommandé de la changer. Si vous le faites, vous devrez mettre à jour l'index manuellement en lançant la commande <code>fink index</code>.</p>
</li>
<li>
<p><b>SelfUpdateNoCVS:</b> booléen</p>
<p>La commande <code>fink selfupdate</code> met à jour le gestionnaire de paquets Fink. Cette option assure que CVS n'est pas utilisé pour ce faire quand elle a pour valeur True. La valeur de l'option est définie automatiquement par la commande <code>fink selfupdate-cvs</code>, vous n'avez donc pas besoin de la modifier manuellement.</p>
</li>
<li>
<p><b>Buildpath:</b> chemin</p>
<p>Fink doit créer plusieurs répertoires temporaires pour les paquets compilés à partir du source. Par défaut, ces répertoires sont placés dans <code>/sw/src/fink.build</code>, mais si vous voulez qu'ils soient créés ailleurs, indiquez ici le chemin. Voir les définitions des champs <code>KeepRootDir</code> et <code>KeepBuildDir</code> dans la section <a href="#developer">Configuration Développeur</a> pour de plus amples informations sur ces répertoires temporaires.</p>
<p>Sur Tiger, il est préférable que le répertoire de construction Buildpath se termine soit par <code>.noindex</code>, soit par <code>.build</code>, pour éviter que Spotlight n'indexe les fichiers temporaires de ce répertoire, ce qui aurait pour conséquence de diminuer la vitesse de compilation.</p>
</li>
<li>
<p><b>Bzip2Path:</b> chemin du binaire <code>bzip2</code> ou d'un binaire équivalent</p>
<p>Disponible à partir de la version 0.25 de <code>fink</code>. Cette option vous permet de modifier le chemin par défaut de la commande <code>bzip2</code>. Vous pouvez alors indiquer un chemin différent pour cette commande, passer des paramètres à <code>bzip2</code> ou même utiliser un binaire équivalent tel <code>pbzip2</code> pour décompresser les archives <code>.bz2</code>.</p>
</li>
</ul>

<h2><a name="downloading">5.5 Options de téléchargement</a></h2>

<p>Il existe plusieurs options dont la valeur influence la façon dont Fink télécharge les paquets.</p>
<ul>
<li>
<p><b>ProxyPassiveFTP:</b> booléen</p>
<p>Cette option indique à Fink s'il doit ou non utiliser le mode "passif" pour les téléchargements FTP. Pour certains serveurs FTP et certaines configurations de réseau, il faut donner à cette option la valeur True. Nous vous recommandons de lui laisser cette valeur, car le mode FTP actif est obsolète.</p>
</li>
<li>
<p><b>ProxyFTP:</b> url</p>
<p>Si vous utilisez un proxy FTP, vous devez saisir son adresse ici, par exemple :</p>
<pre>ProxyFTP: ftp://votrehôte.com:2121/</pre>
<p>Laissez la valeur vide si vous n'utilisez pas de proxy FTP.</p>
</li>
<li>
<p><b>ProxyHTTP:</b> url</p>
<p>Si vous utilisez un proxy HTTP, vous devez saisir son adresse ici, par exemple :</p>
<pre>ProxyHTTP: http://votrehôte.com:3128/</pre>
<p>Laissez la valeur vide si vous n'utilisez pas de proxy HTTP.</p>
</li>
<li>
<p><b>DownloadMethod:</b> wget, curl, axel ou axelautomirror</p>
<p>Fink peut utiliser diverses applications pour télécharger les fichiers à partir d'Internet - <b>wget</b>, <b>curl</b> ou <b>axel</b>. La valeur <b>axelautomirror</b> utilise un mode expérimental de l'application <b>axel</b> pour déterminer le serveur le plus proche ayant le fichier demandé. L'utilisation des deux méthodes <b>axel</b> et <b>axelautomirror</b> n'est pas recommandé actuellement. <b>L'application que vous choisissez comme méthode de téléchargement DOIT être installée !</b>, faute de quoi aucun téléchargement n'aura lieu, car <code>fink</code> ne reviendra pas alors à la valeur par défaut <b>curl</b>.</p>
</li>
<li>
<p><b>SelfUpdateMethod:</b> point, rsync ou cvs</p>
<p><code>fink</code> peut utiliser différentes méthodes pour mettre à jour les fichiers info des paquets. <b>rsync</b> est la méthode recommandée. Cette méthode utilise rsync pour télécharger les fichiers qui ont été modifiés dans les <a href="#optional">arborescences</a> activées. Notez qui si vous modifiez ou ajoutez des fichiers aux arborescences <code>stable</code> ou <code>instable</code>, le fait d'utiliser rsync les supprimera. Faites d'abord une sauvegarde, par exemple dans votre arborescence <code>locale</code>. <b>cvs</b> effectue le téléchargement à partir d'un accès anonyme ou d'un accès :ext: au serveur cvs de fink. Ceci présente l'inconvénient que cvs ne sait pas changer de miroirs, aussi, si le serveur n'est pas disponible, vous ne pouvez pas mettre à jour. <b>point</b> ne télécharge que la dernière version officielle des paquets. Cette méthode n'est pas recommandée car vos paquets risquent, alors, d'être obsolètes.</p>
</li>
<li>
<p><b>SelfUpdateCVSTrees:</b> liste d'arborescences</p>
<p>Disponible à partir de la version 0.25 de <code>fink</code>. Par défaut, la méthode <b>cvs</b> ne met à jour que l'arborescence de la distribution en cours. Cette option permet de modifier la liste des versions de distribution qui sont mises à jour pendant l'exécution de la commande selfupdate. Notez que vous devez avoir installé un binaire "cvs" récent si vous désirez inclure des répertoires qui ne comportent pas de sous-répertoires CVS, comme par exemple dists/local/main.</p>
</li>
<li>
<p><b>UseBinaryDist:</b> booléen</p>
<p>Force <code>fink</code> à télécharger les paquets binaires pré-compilés à partir de la distribution binaire, s'ils sont disponibles et si les-dits paquets ne sont pas déjà installés sur votre système. Ceci permet de gagner beaucoup de temps à l'installation. Nous vous recommandons donc d'utiliser cette option. Le fait d'utiliser l'option <a href="usage.php?phpLang=fr">--use-binary-dist</a> avec <code>fink</code> (ou l'option <code>-b</code>) a le même effet, mais est restreint à cette invocation de <code>fink</code>. L'utilisation de l'option <code>--no-use-binary-dist</code> avec <code>fink</code> a l'effet inverse et est, de même, restreint à cette invocation de <code>fink</code>. <b>Disponible à partir de la version 0.23.0 de fink</b>.</p>
<p>Notez que, dans ce mode, <code>fink</code> télécharge la version requise d'un paquet, si cette version est la version disponible la plus récente du paquet, mais ne force pas <code>fink</code> à choisir la version en fonction de sa disponibilité binaire.</p>
</li>
</ul>

<h2><a name="mirrors">5.6 Configuration des miroirs</a></h2>

<p>Il peut être pénible de télécharger des logiciels à partir d'Internet et les vitesses de téléchargement ne sont pas toujours ce qu'elles devraient être. Les serveurs miroirs hébergent des copies des fichiers disponibles sur d'autres serveurs ; ils ont parfois une connexion plus rapide à Internet que le serveur maître ou peuvent être plus proche géographiquement de votre lieu de téléchargement que le serveur principal ne l'est, ce qui vous donne la possibilité de télécharger les fichiers plus rapidement. Ils permettent également de réduire la charge des serveurs primaires, par exemple <b>ftp.gnu.org</b>, et ils assurent un accès aux fichiers lorsqu'un serveur n'est pas disponible.</p>
<p>Pour que Fink choisisse le serveur le plus adapté à votre cas, vous devez lui indiquer le continent et le pays dans lequel vous résidez. Si les téléchargements à partir d'un serveur échouent, il vous demandera si vous voulez réessayer à partir du même miroir, à partir d'un miroir différent dans le même pays ou sur le même continent, ou d'un autre miroir n'importe où dans le monde.</p>
<p>Le fichier <b>fink.conf</b> contient la liste des miroirs que vous désirez utiliser.</p>
<ul>
<li>
<p><b>MirrorContinent:</b> un code de trois lettres</p>
<p>Vous devez changer cette valeur à l'aide de la commande <code>fink configure</code>. Le code de trois lettres est l'un de ceux qui sont dans le fichier <code>/sw/lib/fink/mirror/_keys</code>. Par exemple, si vous vivez en Europe :</p>
<pre>MirrorContinent: eur</pre>
</li>
<li>
<p><b>MirrorCountry:</b> un code de six lettres</p>
<p>Vous devez changer cette valeur à l'aide de la commande <code>fink configure</code>. Le code de six lettres est composé du code de trois lettres du continent (voir ci-dessus), suivi d'un tiret, puis du code de deux lettres du pays. Vous le trouverez dans le fichier <code>/sw/lib/fink/mirror/_keys</code>. Par exemple, si vous vivez en Autriche :</p>
<pre>MirrorCountry: eur-AT</pre>
</li>
<li>
<p><b>MirrorOrder:</b> MasterFirst, MasterLast, MasterNever ou ClosestFirst</p>
<p>Fink gère des miroirs 'Maîtres', serveurs miroirs des archives tar du code source de tous les paquets Fink. L'utilisation d'un miroir maître a pour avantage que les URL de téléchargement du source ne sont jamais obsolètes. Les utilisateurs peuvent choisir d'utiliser ces miroirs maintenus par l'équipe Fink, ou de n'utiliser que les URL initiales du source et des miroirs externes tels les miroirs gnome, KDE ou debian. De plus, on peut combiner les deux jeux de miroirs ; la recherche aura lieu alors par ordre de proximité de la zone de téléchargement, comme cela a été expliqué ci-dessus. Avec les options MasterFirst et MasterLast, l'utilisateur va directement au jeu de miroirs maîtres (ou au jeu de miroirs non maîtres) si un téléchargement échoue. Les options sont les suivantes :</p>
<pre>
MasterFirst - Cherche d'abord dans les miroirs "Maîtres". 
MasterLast - Cherche dans les miroirs "Maîtres" à la fin. 
MasterNever - N'utilise jamais les miroirs "Maîtres". 
ClosestFirst - Cherche d'abord dans les miroirs les plus proches 
  (combine tous les miroirs en un seul jeu de miroirs). 
</pre>
</li>
<li>
<p><b>Mirror-rsync:</b></p>
<p>La valeur de ce champ représente l'url de type rsync à partir de laquelle la commande <code>fink selfupdate</code> synchronise les arbres quand le champ <b>SelfupdateMethod</b> a la valeur <code>rsync</code>. Ce doit être une url de type rsync anonyme qui pointe sur un répertoire contenant toutes les distributions et les arborescences de fink. Disponible à partir de la version 0.25.2 de <code>fink</code>.</p>
</li>
</ul>

<h2><a name="developer">5.7 Configuration Développeur</a></h2>

<p>Certaines options du fichier <code>fink.conf</code> sont réservées aux développeurs. Nous déconseillons à l'utilisateur moyen de Fink de les modifier. Ce sont les options suivantes qui appartiennent à cette catégorie.</p>
<ul>
<li>
<p><b>KeepRootDir:</b> booléen</p>
<p>Empêche Fink de supprimer le sous-répertoire root-[nom]-[version]-[révision] du répertoire ChemindeConstruction (Buildpath) après construction d'un paquet. La valeur par défaut est False (faux). <b>Attention, si la valeur de cette option est True (vrai), cela peut très vite saturer votre disque dur !</b>
La commande <code>fink -K</code> a le même effet, restreint à cette invocation de <code>fink</code>.</p>
</li>
<li>
<p><b>KeepBuildDir:</b> booléen</p>
<p>Empêche <code>fink</code> de supprimer le sous-répertoire [nom]-[version]-[révision] du répertoire ChemindeConstruction (Buildpath) après construction d'un paquet. La valeur par défaut est False (faux). <b>Attention, si la valeur de cette option est True (vrai), cela peut très vite saturer votre disque dur !</b>
La commande <code>fink -k</code> a le même effet, restreint à cette invocation de <code>fink</code>.</p>
</li>
</ul>

<h2><a name="advanced">5.8 Variables pour les utilisateurs avertis</a></h2>

<p>Il existe quelques autres options qui peuvent se révéler utiles, mais exigent un certain doigté à l'usage.</p>
<ul>
<li>
<p><b>MatchPackageRegEx:</b> </p>
<p>Empêche <code>fink</code> de demander quel paquet installer s'il existe une correspondance unique à l'un des choix résultant de l'expression régulière Perl fournie. Exemple :</p>
<pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>
<p>correspond aux paquets dont le nom commencent par xfree86 ou xfree86-shlibs ou se terminent par '-ssl' ; il n'existe qu'une seule possibilité, <code>fink</code> installera xfree86 et xfree86-shlibs.</p>
</li>
<li>
<p><b>CCacheDir:</b> chemin</p>
<p>Si le paquet <code>ccache-default</code> est installé, les fichiers cache qu'il génère lorsque des paquets Fink sont installés sont placés dans le répertoire indiqué en tant que valeur du champ. La valeur par défaut est <code>/sw/var/ccache</code>. Quand la valeur du champ est <code>none</code>, <code>fink</code> ne définit pas la variable d'environnement CCACHE_DIR et ccache utilise <code>$HOME/.ccache</code>, ce qui peut le conduire à placer des fichiers dont le possesseur est le super-utilisateur dans votre répertoire utilisateur. <b>Introduit dans une version de fink postérieure à la version 0.21.0</b>. </p>
</li>
<li>
<p><b>NotifyPlugin:</b> plugin</p>
<p>Indique un plugin de notification pour savoir quand des paquets sont installés ou désinstallés. Le plugin par défaut est Growl (nécessite <code>Mac::Growl</code> pour fonctionner). Vous trouverez d'autres plugins dans le répertoire <code>/sw/lib/perl5/Fink/Notify</code>. À Partir de la version 0.25 de <code>fink</code>, la liste est donnée par l'exécution de la commande <code>fink plugins</code>. Voir <a href="http://wiki.finkproject.org/index.php/Fink:Notificati%20on_Plugins">Fink Developer Wiki</a> pour de plus amples informations.</p>
</li>
<li>
<p><b>AutoScanpackages:</b> valeur booléenne</p>
<p>Lors de la construction de nouveaux paquets via <code>fink</code>, <code>apt-get</code> n'est pas immédiatement informé de leur existence. Naguère, il fallait exécuter la commande <code>fink scanpackages</code> pour que <code>apt-get</code> s'aperçoive de leur présence. Maintenant, cette commande est exécuté automatiquement. Si cette option est présente et que sa valeur est <b>false</b> (faux), <code>fink scanpackages</code> n'est pas automatiquement exécuté après construction des paquets. La valeur par défaut est <b>true</b> (vrai).</p>
</li>
<li>
<p><b>ScanRestrictivePackages:</b> valeur booléenne</p>
<p>Lors de l'inspection des paquets pour le compte de <code>apt-get</code>, <code>fink</code> inspecte par défaut tous les paquets des arborescences activées. Néanmoins, si l'arbre apt résultant est accessible au public, son administrateur peut être tenu par la loi de ne pas y inclure les paquets dont la licence est soit <code>Restrictive</code>, soit <code>Commercial</code>. Si cette option est présente et que sa valeur est <b>false</b> (faux), <code>fink</code> ne prend pas en compte ces paquets lors de l'inspection.</p>
</li>
</ul>

<h2><a name="sourceslist">5.9 Gestion du fichier sources.list d'apt</a></h2>

<p>À partir de la version 0.21.0, <code>fink</code> gère activement le fichier <code>/sw/etc/apt/sources.list</code>, qui est utilisé par apt pour trouver l'emplacement des fichiers binaires à installer. Le fichier sources.list par "défaut" possède un contenu similaire à celui indiqué ci-dessous. Son contenu prend en compte la distribution et les branches dont vous vous servez.</p>
<pre># Local modifications should either go above this line, 
# or at the end. #
# Default APT sources configuration for Fink, written by the fink 
# program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in 
# /sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding 
# Packages.gz files
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release \
main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current \
main crypto

# Put local modifications to this file below this line, or at the top. </pre>
<p>Pour la bonne compréhension du fonctionnement de ce fichier, voici la traduction en français :</p>
<pre>
# Les modifications locales doivent se faire soit au-dessus de 
# cette ligne, soit tout-à-fait à la fin du fichier. #
# Configuration par défaut des sources APT pour Fink, générée par le 
# programme fink 

# Arborescence locale des paquets - paquets construits localement 
# à partir des sources
# NOTE : automatiquement synchronisée avec la ligne Trees du fichier
# /sw/etc/fink.conf
# NOTE : exécutez 'fink scanpackages' pour mettre à jour les fichiers 
# Packages.gz correspondants
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto

# Distribution binaire officielle : adresse de téléchargement des 
# paquets à partir de la dernière version
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release \
main crypto

# Distribution binaire officielle : adresse de téléchargement des 
# paquets mis à jour entre deux versions
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current \
main crypto

# Faites vos modifications en-dessous de cette ligne ou tout-à-fait 
# au début du fichier. </pre>
<p>Avec ce fichier par défaut, apt-get cherche d'abord dans votre installation locale les binaires déjà compilés, puis recherche les autres dans la distribution binaire officielle. Vous pouvez modifier l'ordre de recherche en ajoutant des lignes en début de fichier (ce seront elles qui seront les plus prioritaires) ou à la fin du fichier (elles seront les moins prioritaires).</p>
<p>Si vous changez la ligne Trees ou la distribution que vous utilisez, <code>fink</code> modifie automatiquement la partie "par défaut" (similaire à celle ci-dessus) du fichier pour qu'elle corresponde aux nouvelles valeurs. Néanmoins Fink préserve toutes les modifications locales apportées au fichier, à condition que les changements soient situés au début (au-dessus de la première ligne par "défaut" ou à la fin du fichier (en dessous de la dernière ligne par défaut).</p>
<p>Note : si vous avez modifié <code>/sw/etc/apt/sources.list</code> avant de passer à la version 0.21.0 de <code>fink</code>, votre ancien fichier sources.list sera sauvegardé sous <code>/sw/etc/apt/sources.list.finkbak</code> .</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=fr">6. Utilisation de l'outil fink en ligne de commande</a></p>
<? include_once "../../footer.inc"; ?>


