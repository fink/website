<?
$title = "Guide utilisateur - Outil fink";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/28 07:08:36';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="prev" href="conf.php?phpLang=fr" title="Fichier de Configuration de Fink">';


include_once "header.fr.inc";
?>
<h1>Guide utilisateur - 6. Utilisation de l'outil fink en ligne de commande</h1>
    
    
    <h2><a name="using">6.1 Utilisation de l'outil fink</a></h2>
      
      <p>L'outil <code>fink</code> possède lui-même plusieurs commandes qui lui permettent de travailler sur les paquets de la distribution source.
      Certaines nécessitent au moins un nom de paquet, mais peuvent gérer plusieurs noms à la fois. Vous pouvez n'indiquer que le nom du paquet (par exemple gimp), le nom et la version (par exemple gimp-1.2.1), ou le nom, la version et la révision (par exemple gimp-1.2.1-3). Fink choisira automatiquement la version et la révision la plus récente si elles ne sont pas spécifiées.  D'autres commandes possèdent des options.</p>
      <p>Voici la liste des commandes de l'outil <code>fink</code> :</p>
    
    <h2><a name="install">6.2 install - installation</a></h2>
      
      <p>La commande install est utilisée pour installer des paquets. Elle télécharge, configure, compile et installe les paquets désirés. Elle installe aussi automatiquement les dépendances requises, mais vous demande confirmation avant de le faire. Exemple :</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
<p>Ici fink lit les fichiers d'information des paquets, donne le nombre de fichiers lus, signale que le paquet lesstif sera téléchargé si vous donnez votre accord.</p>      
<p>Les alias de la commande install sont : update, enable, activate, use (la plupart du temps pour des raisons historiques).</p>
    
    <h2><a name="remove">6.3 remove - suppression</a></h2>
      
      <p>La commande remove supprime les paquets du système en appelant la commande  '<code>dpkg --remove</code>'. L'implantation actuelle de cette commande possède quelques défauts : elle ne fonctionne que sur les paquets dont l'outil <code>fink</code> a connaissance (c'est à dire quand un fichier .info est présent) ; elle ne vérifie pas les dépendances elle-même, mais délègue ce travail à l'outil dpkg (en général, cela ne pose pas de problèmes).</p>
      <p>La commande remove ne supprime que le paquet lui-même. Le paquet compressé .deb reste sur le système. Ceci signifie que vous pouvez réinstaller le paquet plus tard, sans avoir à le recompiler. Si vous avez besoin de libérer de l'espace disque, vous pouvez supprimer les fichiers .deb de l'arborescence <code>/sw/fink/dists</code>.</p>
      <p>Alias : disable, deactivate, unuse, delete.</p>
    
    <h2><a name="update-all">6.4 update-all - tout mettre à jour</a></h2>
      
      <p>Cette commande met à jour tous les paquets installés. Elle n'utilise pas de liste de paquets, il suffit de lancer :</p>
      <pre>fink update-all</pre>
    
    <h2><a name="list">6.5 list - liste</a></h2>
      
      <p>
Cette commande donne la liste des paquets disponibles, leur statut d'installation, la dernière version disponible et une courte description.
Appelée sans paramètres, elle affiche tous les paquets disponibles.
Vous pouvez aussi l'utiliser avec un nom ou une expression régulière acceptée par le shell, Fink donnera alors la liste de tous les paquets correspondants.
</p>
      <p>
La première colonne affiche le statut d'installation qui s'interprète de la façon suivante :
</p>
      <pre>
     non installé
 i   dernière version installée
(i)  installé, mais une version plus récente est disponible
</pre>
      <p>
Voici quelques-unes des options de la commande <code>fink list</code> :
</p>
      <pre>
-h,--help
	  Affiche les options disponibles.
-t,--tab
	  Affiche la liste en séparant les divers éléments d'une ligne par une tabulation,
	  utile en cas d'utilisation à l'intérieur d'un script.
-i,--installed
	  N'affiche que les paquets installés.
-o,--outdated
	  N'affiche que les paquets obsolètes.
-u,--uptodate
	  N'affiche que les paquets à jour.
-n,--notinstalled
	  Affiche les paquets qui ne sont pas installés.
-s=expr,--section=expr
	  Affiche les paquets dans les sections correspondant à l'expression régulière
	  fournie.
-w=xyz,--width=xyz
	  Fixe la largeur de l'affichage. xyz est soit une valeur numérique, soit auto. 
	  auto correspond à la largeur du terminal. 
	  La valeur par défaut est auto.
</pre>
      <p>
Quelques exemples d'utilisation :
</p>
      <pre>
fink list                 - affiche tous les paquets
fink list bash            - vérifie si bash est installé et affiche la version installée
fink list --outdated      - affiche les paquets obsolètes
fink list --section=kde   - affiche les paquets de la section kde
fink list "gnome*"         - affiche tous les paquets dont le nom commence par 'gnome'
</pre>
      <p>
Dans le dernier exemple, les guillemets sont nécessaires pour empêcher le shell d'interpréter le modèle lui-même.
</p>
    
    <h2><a name="apropos">6.6 apropos - à propos</a></h2>
      
      <p>
Cette commande est presque identique à la commande <code>fink list</code>. La différence la plus notable est que <code>fink apropos</code> recherche aussi dans les fichiers de descriptions de paquets pour trouver les paquets. La seconde différence est que la chaîne de recherche n'est pas optionnelle, elle doit être fournie.
</p>
      <pre>
fink apropos irc          - affiche tous les paquets où 'irc' apparaît soit dans le nom, 
                            soit dans la description
fink apropos -s=kde irc   - identique au précèdent, mais restreint aux paquets de la 
                            section kde
</pre>
    
    <h2><a name="describe">6.7 describe - description</a></h2>
      
      <p>
Cette commande affiche la description du paquet nommé sur la ligne de commande.
Notez, qu'à l'heure actuelle, seule une faible part des paquets ont une description.
</p>
      <p>
Alias : desc, description, info
</p>
    
    <h2><a name="fetch">6.8 fetch - téléchargement</a></h2>
      
      <p>Télécharge les paquets nommés, mais ne les installe pas. Cette commande télécharge les archives tar, même si elles ont déjà été téléchargées.</p>
    
    <h2><a name="fetch-all">6.9 fetch-all - tout télécharger</a></h2>
      
      <p>Télécharge <b>tous</b> les paquets sous forme source. Comme fetch, cette commande télécharge les archives tar, même si elle ont déjà été téléchargées.</p>
    
    <h2><a name="fetch-missing">6.10 fetch-missing - télécharger paquets manquants</a></h2>
      
      <p>Télécharge <b>tous</b> les paquets manquants sous forme source. Cette commande ne télécharge que les paquets qui ne sont pas présents sur le système.</p>
    
    <h2><a name="build">6.11 build - compiler</a></h2>
      
      <p>Construit un paquet, mais ne l'installe pas. Les archives tar source sont téléchargées si elles ne sont pas présentes sur le système. La commande construit un paquet .deb que vous pourrez installer ultérieurement avec la commande install. Cette commande n'a aucun effet si le fichier .deb existe déjà. Notez que, contrairement au paquet, les dépendances sont, elles,  <b>installées</b>.</p>
    
    <h2><a name="rebuild">6.12 rebuild - recompiler</a></h2>
      
      <p>Construit un paquet (tout comme la commande build), mais ignore et écrase le fichier .deb existant. Si le paquet est installé, le nouveau fichier .deb sera lui aussi installé dans le système via <code>dpkg</code>. Très utile pendant la phase de développement du paquet.</p>
    
    <h2><a name="reinstall">6.13 reinstall - réinstaller</a></h2>
      
      <p>Identique à install, mais installe le paquet via <code>dpkg</code>, même s'il est déjà installé. Vous pouvez utiliser cette commande si vous supprimez involontairement des paquets, ou bien si vous changez les fichiers de configuration et que vous voulez retrouver la configuration par défaut.</p>
    
    <h2><a name="configure">6.14 configure - configurer</a></h2>
      
      <p>
Réexécute le processus de configuration de Fink.
Cela vous permet de changer les sites miroirs et les configurations proxy, entre autres.
</p>
    
    <h2><a name="selfupdate">6.15 selfupdate - mise à jour automatique</a></h2>
      
<p>
	Cette commande automatise le processus de mise à jour de Fink. Elle vérifie si une nouvelle version existe sur le site web de Fink, télécharge ensuite les descriptions de paquets et met à jour les paquets fondamentaux, y compris <code>fink</code>. Cette commande met à jour les versions standards, mais peut aussi configurer votre arborescence <code>/sw/fink/dists</code> de telle sorte qu'elle soit mise à jour directement via CVS. Vous avez alors accès aux toutes dernières versions des paquets.
</p>
    
    <h2><a name="index">6.16 index - indexer</a></h2>
      
      <p>
   Reconstruit le cache des paquets. Normalement, vous n'avez pas besoin d'exécuter cette commande manuellement, car <code>fink</code> est censé détecter automatiquement s'il est besoin de reconstruire le cache.
</p>
    
    <h2><a name="validate">6.17 validate - valider</a></h2>
      
      <p>
   Cette commande exécute différents contrôles sur les fichiers .info et .deb. Les mainteneurs de paquets doivent l'exécuter sur leurs descriptions de paquets et sur les paquets construits avant de les soumettre.
</p>
      <p>
   Alias : check
</p>
    
    <h2><a name="scanpackages">6.18 scanpackages - création de fichiers Packages</a></h2>
      
      <p>
   Lance dpkg-scanpackages(8) avec les arborescences spécifiées.
</p>
    
    <h2><a name="checksums">6.19 checksums - sommes de contrôle</a></h2>
      
      <p>
   Valide les sommes de contrôle MD5 de toutes les archives tar dans <code>/sw/src</code>,  quand cela est possible.
</p>
    
    <h2><a name="cleanup">6.20 cleanup - épuration</a></h2>
      
      <p>
   Supprime les fichiers correspondants aux paquets obsolètes (.info, .patch, .deb) quand des versions plus récentes sont disponibles.
   Cela peut libérer une grande portion d'espace disque.
</p>
    
        <h2><a name="dumpinfo">6.21 dumpinfo - analyse des fichiers info</a></h2>
      
     <p>
	Note : disponible dans une version CVS de fink postérieure à la version 0.20.0.
      </p>
      <p>
	Affiche l'analyse syntaxique des différentes parties d'un fichier .info d'un paquet. Les <b>options</b> suivantes permettent de moduler l'affichage des champs et l'interprétation des raccourcis :
      </p>
      <pre>
-h, --help           - Affiche les options disponibles.
-a, --all            - Affiche tous les champs de description du paquet.
                       C'est le mode par défaut quand aucune option 
                       --field ou --percent n'est utilisée.
-f nomchamp,         - Affiche le contenu des champs indiqués
  --field=nomchamp     dans leur ordre d'apparition après l'option -f.
-p clé,              - Affiche l'interprétation des clés fournies
   --percent=clé       dans leur ordre d'apparition après l'option -p.
     </pre>
    

  
<? include_once "../../footer.inc"; ?>



