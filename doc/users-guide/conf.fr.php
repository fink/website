<?
$title = "Guide utilisateur - fink.conf";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/28 06:59:10';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="next" href="usage.php?phpLang=fr" title="Utilisation de l\'outil fink en ligne de commande"><link rel="prev" href="upgrade.php?phpLang=fr" title="Mise à niveau de Fink">';


include_once "header.fr.inc";
?>
<h1>Guide utilisateur - 5. Fichier de Configuration de Fink</h1>
    
    
    
      <p>
Ce chapitre vous décrit les différents éléments du fichier de configuration de Fink (fink.conf) et leur influence sur le comportement de Fink, en particulier sur celui de l'outil en ligne de commande <code>fink</code> (celui qui fonctionne avec la distribution source).
</p>
    
    <h2><a name="about">5.1 À propos de fink.conf</a></h2>
      
      <p>
Lors de la première installation de Fink, vous devez répondre à un certain nombre de questions. Vos réponses servent à personnaliser le fichier de configuration, par exemple les <a href="#mirrors">miroirs</a> que vous désirez utiliser pour le téléchargement des fichiers ou la façon d'acquérir les droits de super-utilisateur. Vous pouvez, à tout moment, réexécuter ce processus en lançant la commande <code>fink configure</code>. Certaines options ne peuvent être changées que manuellement en éditant le fichier <b>fink.conf</b>. En général, ces options sont réservés aux utilisateurs chevronnés.
</p>
      <p>
Le fichier <b>fink.conf</b> est situé dans le répertoire <code>/sw/etc/</code> et peut être édité avec votre éditeur de texte préféré. Vous devez avoir les droits de super-utilisateur pour le modifier.
</p>
    
    <h2><a name="syntax">5.2 Syntaxe de fink.conf</a></h2>
      
      <p>
Le fichier <b>fink.conf</b> est constitué de plusieurs lignes ayant le même format :</p>
      <pre>NomOption: Valeur</pre>
      <p>Il y a une option par ligne et le nom de l'option est séparée de la valeur par des double-points et une espace. Le contenu de la valeur dépend de l'option ; c'est généralement une valeur booléenne  ("True" - vrai - ou "False" - faux), une chaîne de caractères ou une liste de chaînes de caractères séparées entre elles par une espace.
      Par exemple :
</p>
      <pre>
OptionBooléenne: True
OptionChaîne: QuelqueChose
OptionListe: Option1 Option2 Option3
</pre>
    
    <h2><a name="required">5.3 Éléments obligatoires</a></h2>
      
      <p>
Certains éléments doivent obligatoirement figuré dans le fichier <b>fink.conf</b>. Sans eux, Fink ne peut pas fonctionner correctement. Voici les éléments qui appartiennent à cette catégorie.
</p>
      <ul>
        <li>
          <p>
            <b>Basepath:</b> chemin</p>
          <p>
Indique à Fink où il est installé. Le chemin d'installation par défaut est <b>/sw</b>, mais vous pouvez l'avoir changé lors de la première installation de Fink. Vous <b>ne devez pas</b> changer cette valeur après installation, Fink ne s'y retrouverait plus.
</p>
        </li>
      </ul>
    
    <h2><a name="optional">5.4 Options utilisateur</a></h2>
      
      <p>
D'autres éléments sont optionnels et permettent aux utilisateurs de changer le comportement de Fink.</p>
      <ul>
        <li>
          <p>
            <b>RootMethod:</b> su ou sudo ou none</p>
          <p>Pour effectuer certaines opérations, Fink doit acquérir les droits de super-utilisateur. Les valeurs reconnues pour cette option sont <b>sudo</b> ou <b>su</b>. Si vous attribuez à cette option la valeur 
<b>none</b> (aucune), vous devrez d'abord acquérir les droits de super-utilisateur avant d'exécuter Fink. La valeur par défaut est <b>sudo</b> et ne doit pas être changée, sauf rares exceptions.</p>
        </li>
        <li>
          <p>
            <b>Trees:</b> liste d'arborescences</p>
          <p>La liste des arborescences disponibles est la suivante :</p>
          <pre>
local/main      - tout paquet local que vous désirez installer
local/bootstrap - paquets utilisés pendant l'installation de Fink
stable/crypto   - paquets cryptographiques stables
stable/main     - autres paquets stables
unstable/crypto - paquets cryptographiques instables
unstable/main   - autres paquets cryptographiques
</pre>
          <p>
Vous pouvez aussi ajouter vos propres arborescences dans le répertoire <code>/sw/fink/dists</code> pour faire ce que vous voulez, mais ce n'est pas nécessaire dans la plupart des cas. Les arborescences par défaut sont "local/main local/bootstrap
stable/main". Cette liste doit toujours être identique à celle figurant dans le fichier 
<code>/sw/etc/apt/sources.list</code>.
</p>
        </li>
        <li>
          <p>
            <b>Distribution:</b> 10.1, 10.2, 10.2-gcc3.3, ou 10.3</p>
          <p>Fink doit savoir quelle version de Mac OS X est installée sur votre système. Mac OS X 10.0 et les versions antérieures ne sont pas gérées, et Mac OS X 10.1 n'est plus maintenue dans cette version de fink. Mac OS X10.2 n'est gérée que si la mise à jour d'août 2003 des Developer Tools a été installée. Ce champ est configuré par l'exécution du script <code>/sw/lib/fink/postinstall.pl</code>. Il est peu probable que vous ayez à changer cette valeur.
</p>
        </li>
        <li>
          <p>
            <b>FetchAltDir:</b> chemin</p>
          <p>En général, fink sauvegarde les sources qu'il télécharge dans le répertoire 
<code>/sw/src</code>. Avec cette option, vous pouvez indiquer un autre répertoire pour le code source téléchargé. Par exemple:
</p>
          <pre>FetchAltDir: /usr/src</pre>
        </li>
        <li>
          <p>
            <b>Verbose:</b> un nombre entre 0 et 3</p>
          <p>
Cette option permet de faire varier la quantité d'information que Fink donne sur ce qu'il est en train de faire. Les valeurs sont :
<b>0</b>
            Silencieux (aucune indication sur les statistiques de téléchargement)
<b>1</b>
            Faible (aucune indication pendant la décompression des archives tar)
<b>2</b>
            Moyen (affiche presque tout)
<b>3</b>
            Fort (affiche tout)
La valeur par défaut est 3.
</p>
        </li>
        <li>
          <p>
            <b>NoAutoIndex:</b> booléen</p>
          <p>Fink cache les fichiers de description de paquets dans /sw/var/db/fink.db pour éviter d'avoir à les lire et les analyser à chaque fois qu'il est invoqué. Il vérifie si l'index des paquets doit être ou non mis à jour, sauf si la valeur de cette option est  "True". Sa valeur par défaut est "False" et il n'est pas recommandé de la changer. Si vous le faites, vous devrez mettre à jour l'index manuellement en lançant la commande <code>fink index</code>.</p>
        </li>
        <li>
          <p>
            <b>SelfUpdateNoCVS:</b> booléen</p>
          <p>La commande <code>fink selfupdate</code> met à jour le gestionnaire de paquets Fink. Cette option assure que CVS n'est pas utilisé pour ce faire quand elle a pour valeur True. La valeur de l'option est définie automatiquement par la commande <code>fink selfupdate-cvs</code>, vous n'avez donc pas besoin de la modifier manuellement.</p>
        </li>
        	<li>
	  <p>
	    <b>Buildpath:</b> chemin</p>
	  <p>Fink doit créer plusieurs répertoires temporaires pour les paquets compilés à partir du source. Par défaut, ces répertoires sont placés dans <code>/sw/src</code>, mais si vous voulez qu'ils soient créés ailleurs, indiquez ici le chemin. Voir les définitions des champs <code>KeepRootDir</code> et <code>KeepBuildDir</code> ci-dessous pour de plus amples informations sur ces répertoires temporaires.
	    </p>
	</li>
      </ul>
    
    <h2><a name="downloading">5.5 Options de téléchargement</a></h2>
      
      <p>Il existe plusieurs options dont la valeur influence la façon dont Fink télécharge les paquets.</p>
      <ul>
        <li>
          <p>
            <b>ProxyPassiveFTP:</b> booléen</p>
          <p>Cette option indique à Fink s'il doit ou non utiliser le mode "passif" pour les téléchargements FTP. Pour certains serveurs FTP et certaines configurations de réseau, il faut donner à cette option la valeur True. Nous vous recommandons de lui laisser cette valeur, car le mode FTP actif est obsolète.</p>
        </li>
        <li>
          <p>
            <b>ProxyFTP:</b> url</p>
          <p>Si vous utilisez un proxy FTP, vous devez saisir son adresse ici, par exemple :</p>
          <pre>ProxyFTP: ftp://votrehôte.com:2121/</pre>
          <p>Laissez la valeur vide si vous n'utilisez pas de proxy FTP.</p>
        </li>
        <li>
          <p>
            <b>ProxyHTTP:</b> url</p>
          <p>Si vous utilisez un proxy HTTP, vous devez saisir son adresse ici, par exemple :</p>
          <pre>ProxyHTTP: http://votrehôte.com:3128/</pre>
          <p>Laissez la valeur vide si vous n'utilisez pas de proxy HTTP.</p>
        </li>
        <li>
          <p>
            <b>DownloadMethod:</b> wget, curl, axel ou axelautomirror</p>
          <p>Fink peut utiliser diverses applications pour télécharger les fichiers à partir d'Internet - <b>wget</b>, <b>curl</b> ou <b>axel</b>. La valeur <b>axelautomirror</b> utilise un mode expérimental de l'application <b>axel</b> pour déterminer le serveur le plus proche ayant le fichier demandé. L'utilisation des deux méthodes <b>axel</b> et <b>axelautomirror</b> n'est pas recommandé actuellement. La valeur par défaut est <b>curl</b>.
<b>L'application que vous choisissez comme méthode de téléchargement DOIT être installée !</b>
          </p>
        </li>
      </ul>
    
    <h2><a name="mirrors">5.6 Configuration des miroirs</a></h2>
      
      <p>Il peut être pénible de télécharger des logiciels à partir d'Internet et les vitesses de téléchargement ne sont pas toujours ce qu'elles devraient être. Les serveurs miroirs hébergent des copies des fichiers disponibles sur d'autres serveurs ; ils ont parfois une connexion plus rapide à Internet que le serveur maître ou peuvent être plus proche géographiquement de votre lieu de téléchargement que le serveur principal ne l'est, ce qui vous donne la possibilité de télécharger les fichiers plus rapidement. Ils permettent également de réduire la charge des serveurs primaires, par exemple <b>ftp.gnu.org</b>, et ils assurent un accès aux fichiers lorsqu'un serveur n'est pas disponible.</p>
      <p>Pour que Fink choisisse le serveur le plus adapté à votre cas, vous devez lui indiquer le continent et le pays dans lequel vous résidez. Si les téléchargements à partir d'un serveur échouent, il vous demandera si vous voulez réessayer à partir du même miroir, à partir d'un miroir différent dans le même pays ou sur le même continent, ou d'un autre miroir n'importe où dans le monde.</p>
      <p>Le fichier <b>fink.conf</b> contient la liste des miroirs que vous désirez utiliser.</p>
      <ul>
        <li>
          <p>
            <b>MirrorContinent:</b> un code de trois lettres</p>
          <p>Vous devez changer cette valeur à l'aide de la commande <code>fink configure</code>. Le code de trois lettres est l'un de ceux qui sont dans le fichier <code>/sw/lib/fink/mirror/_keys</code>.
Par exemple, si vous vivez en Europe :</p>
          <pre>MirrorContinent: eur</pre>
        </li>
        <li>
          <p>
            <b>MirrorCountry:</b> un code de six lettres</p>
          <p>Vous devez changer cette valeur à l'aide de la commande <code>fink configure</code>. Le code de six lettres est composé du code de trois lettres du continent (voir ci-dessus), suivi d'un tiret, puis du code de deux lettres du pays. Vous le trouverez dans le fichier <code>/sw/lib/fink/mirror/_keys</code>.
Par exemple, si vous vivez en Autriche :</p>
          <pre>MirrorCountry: eur-AT</pre>
        </li>
        <li>
          <p>
            <b>MirrorOrder:</b> MasterFirst, MasterLast, MasterNever ou ClosestFirst</p>
          <p>
Fink gère des miroirs 'Maîtres', serveurs miroirs des archives tar du code source de tous les paquets Fink. L'utilisation d'un miroir maître a pour avantage que les URL de téléchargement du source ne sont jamais obsolètes. Les utilisateurs peuvent choisir d'utiliser ces miroirs maintenus par l'équipe Fink, ou de n'utiliser que les URL initiales du source et des miroirs externes tels les miroirs gnome, KDE ou debian. De plus, on peut combiner les deux jeux de miroirs ; la recherche aura lieu alors par ordre de proximité de la zone de téléchargement, comme cela a été expliqué ci-dessus. Avec les options MasterFirst et MasterLast, l'utilisateur va directement au jeu de miroirs maîtres (ou au jeu de miroirs non maîtres) si un téléchargement échoue. Les options sont les  suivantes :
</p>
          <pre>
MasterFirst - Cherche d'abord dans les miroirs "Maîtres".
MasterLast - Cherche dans les miroirs "Maîtres" à la fin.
MasterNever - N'utilise jamais les miroirs "Maîtres".
ClosestFirst - Cherche d'abord dans les miroirs les plus proches 
           (combine tous les miroirs en un seul jeu de miroirs).
</pre>
        </li>
      </ul>
    
    <h2><a name="developer">5.7 Configuration Développeur</a></h2>
      
      <p>Certaines options du fichier <b>fink.conf</b> sont réservées aux développeurs. Nous déconseillons à l'utilisateur moyen de Fink de les modifier. Ce sont les options suivantes qui appartiennent à cette catégorie.</p>
      <ul>
        <li>
          <p>
            <b>KeepRootDir:</b> booléen</p>
          <p>Empêche Fink de supprimer le répertoire /sw/src/root-[nom]-[version]-[révision] après construction d'un paquet. La valeur par défaut est False (faux). <b>Attention, si la valeur de cette option est True (vrai), cela peut très vite saturer votre disque dur !</b>
La commande <b>fink -K</b> a le même effet, restreint à  cette invocation de <b>fink</b>.
         </p>
        </li>
        <li>
          <p>
            <b>KeepBuildDir:</b> booléen</p>
          <p>Empêche Fink de supprimer le répertoire /sw/src/[nom]-[version]-[révision] après construction d'un paquet. La valeur par défaut est False (faux). <b>Attention, si la valeur de cette option est True (vrai), cela peut très vite saturer votre disque dur !</b>
La commande <b>fink -k</b> a le même effet, restreint à  cette invocation de <b>fink</b>.
          </p>
        </li>
      </ul>
    
    <h2><a name="advanced">5.8 Variables pour les utilisateurs avertis</a></h2>
      
      <p>Il existe quelques autres options qui peuvent se révéler utiles, mais exigent un certain doigté à l'usage.</p>
      <ul>
        <li>
          <p>
            <b>MatchPackageRegEx:</b> </p>
          <p>Empêche fink de demander quel paquet installer s'il existe une correspondance unique à l'un des choix résultant de l'expression régulière Perl fournie. Exemple :</p>
          <pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>
          <p>correspond aux paquets dont le nom commencent par xfree86 ou xfree86-shlibs ou se terminent par '-ssl' ;  il n'existe qu'une seule possibilité, fink installera xfree86 et xfree86-shlibs.</p>
        </li>
        <li>
          <p>
            <b>CCacheDir:</b> path</p>
          <p><b>Introduit dans une version CVS postérieure à la version 0.20.5 de fink</b>. Si le paquet ccache-default est installé, les fichiers cache qu'il génère lorsque des paquets Fink sont installés sont placés dans le répertoire indiqué en tant que valeur du champ. La valeur par défaut est <code>/sw/var/ccache</code>. Quand la valeur du champ est <code>none</code>, fink ne définit pas la variable d'environnement CCACHE_DIR et ccache utilise <code>$HOME/.ccache</code>, ce qui peut le conduire à placer des fichiers dont le possesseur est le super-utilisateur dans votre répertoire  utilisateur.
          </p>
        </li>
      </ul>
    
     <h2><a name="sourceslist">5.9 Gestion du fichier sources.list d'apt</a></h2>
      
      <p>À partir de la version 0.21.0, fink gère activement le fichier <code>/sw/etc/apt/sources.list</code>, qui est utilisé par apt pour trouver l'emplacement des fichiers binaires à installer. Le fichier sources.list par défaut possède un contenu similaire à celui indiqué ci-dessous. Son contenu prend en compte la distribution et les branches dont vous vous servez. 
</p>
<pre># Local modifications should either go above this line, or at the end.
#
# Default APT sources configuration for Fink, written by the fink program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in 
# /sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding Packages.gz files
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main crypto

# Put local modifications to this file below this line, or at the top.
</pre>
<p>Avec ce fichier par défaut, apt-get cherche d'abord dans votre installation local les binaires déjà compilés, puis recherche les autres dans la distribution binaire officielle. Vous pouvez modifier l'ordre de recherche en ajoutant des lignes en début de fichier (ce seront elles qui seront les plus prioritaires) ou à la fin du fichier (elles seront les moins prioritaires).</p>
<p>Fink préserve vos modifications, même si elles touchent les parties par "défaut" du fichier, à condition que les changements soient situés au début ou à la fin du fichier. Si vous avez modifié <code>/sw/etc/apt/sources.list</code> avant de passer à la version 0.21.0 de fink, votre ancien fichier sources.list sera sauvegardé sous <code>/sw/etc/apt/sources.list.finkbak</code> .
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=fr">6. Utilisation de l'outil fink en ligne de commande</a></p>
<? include_once "../../footer.inc"; ?>



