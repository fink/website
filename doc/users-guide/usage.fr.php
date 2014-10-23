<?php
$title = "Guide utilisateur - Outil fink";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:17';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="prev" href="conf.php?phpLang=fr" title="Fichier de Configuration de Fink">';


include_once "header.fr.inc";
?>
<h1>Guide utilisateur - 6. Utilisation de l'outil fink en ligne de commande</h1>


<h2><a name="using">6.1 Utilisation de l'outil fink</a></h2>

<p>L'outil <code>fink</code> possède lui-même plusieurs commandes qui lui permettent de travailler sur les paquets de la distribution source. Certaines nécessitent au moins un nom de paquet, mais peuvent gérer plusieurs noms à la fois. Vous pouvez n'indiquer que le nom du paquet (par exemple gimp), le nom et la version (par exemple gimp-1.2.1), ou le nom, la version et la révision (par exemple gimp-1.2.1-3). Fink choisira automatiquement la version et la révision la plus récente si elles ne sont pas spécifiées. D'autres commandes possèdent des options.</p>
<p>Voici la liste des commandes de l'outil <code>fink</code> :</p>

<h2><a name="options">6.2 Options globales</a></h2>

<p>Ce sont des options qui s'appliquent à toutes les commandes <code>fink</code> à partir de la <code>version 0.26</code>. Pour obtenir la liste des options, exécutez <code>fink --help</code> :</p>
<p><b>-h, --help</b> : affiche ce message d'aide.</p>
<p><b>-q, --quiet</b> : diminue le niveau de verbosité de <code>fink</code>, effet contraire à celui de --verbose. Prend le pas sur l'option <a href="conf.php?phpLang=fr#optional">Verbose</a> du fichier <code>fink.conf</code>.</p>
<p><b>-V, --version</b> : affiche les informations de version.</p>
<p><b>-v, --verbose</b> : augmente le niveau de verbosité de <code>fink</code>, effet contraire à celui de --quiet. Prend le pas sur l'option <a href="conf.php?phpLang=fr#optional">Verbose</a> du fichier <code>fink.conf</code>.</p>
<p><b>-y, --yes</b> : applique la réponse par défaut à toutes les questions interactives.</p>
<p><b>-K, --keep-root-dir</b> : force <code>fink</code> à ne pas supprimer le sous-répertoire <code>root-[nom]-[version]-[révision]</code> du répertoire <a href="conf.php?phpLang=fr#optional">Buildpath</a> à la fin du processus de compilation d'un paquet. Correspond au champ <a href="conf.php?phpLang=fr#developer">KeepRootDir</a> de <code>fink.conf</code>.</p>
<p><b>-k, --keep-build-dir</b> : force <code>fink</code> à ne pas supprimer le sous-répertoire <code>[nom]-[version]-[révision]</code> du répertoire <a href="conf.php?phpLang=fr#optional">Buildpath</a> à la fin du processus de compilation d'un paquet. Correspond au champ <a href="conf.php?phpLang=fr#developer">KeepBuildDir</a> de <code>fink.conf</code>.</p>
<p><b>-b, --use-binary-dist</b> : télécharge les paquets pré-compilés de la distribution binaire s'ils sont disponibles (pour réduire le temps de compilation ou l'encombrement du disque par exemple). Notez que, dans ce mode, <code>fink</code> télécharge la version requise d'un paquet, si elle est disponible, mais ne force pas <code>fink</code> à choisir la version en fonction de sa disponibilité binaire. Correspond à l'option <a href="conf.php?phpLang=fr#downloading">UseBinaryDist</a> de <code>fink.conf</code>.</p>
<p><b>--no-use-binary-dist</b> : n'utilise pas les paquets pré-compilés de la distribution binaire (inverse de l'option --use-binary-dist). C'est l'option par défaut, à moins qu'elle ait été changée dans le fichier de configuration <code>fink.conf</code> via une ligne <code>UseBinaryDist: true</code>.</p>
<p><b>--build-as-nobody</b> : utilise un utilisateur n'ayant pas de super privilèges pendant les phases de décompression, rustine, compilation et installation. Notez que les paquets avec cette option peuvent ne pas fonctionner. Vous ne devez utiliser ce mode que pour le développement ou le débogage des paquets.</p>
<p><b>-m, --maintainer</b> : permet aux mainteneurs de paquets d'effectuer certaines opérations, telle la validation des fichiers <code>.info</code> avant la compilation et des fichiers <code>.deb</code> après la construction d'un paquet. Certains messages d'attention deviennent alors des messages d'erreur. Disponible à partir de la version 0.25 de <code>fink</code>. À partir de la version 0.26.0 de <code>fink</code>, cette option active également les options <b>--tests</b> et <b>--validate</b>, ce qui entraîne l'exécution des séries de tests spécifiés dans le champ correspondant.</p>
<p><b>--tests[=on|off|warn]</b> :  entraîne l'activation des champs <code>InfoTest</code> et l'exécution des séries de tests spécifiés dans le script <code>TestScript</code>. Voir <a href="../packaging/reference.php#fields">Guide de création de paquets de Fink</a>). Si l'option ne comporte aucun argument ou si son argument est <code>on</code>, alors les erreurs sur la série de tests seront considérées comme des erreurs fatales de construction du paquet. Si l'argument est <code>warn</code>, les erreurs sur la série de tests seront traités comme des messages d'attention. Disponible à partir de la version 0.26 de <code>fink</code>.</p>
<p><b>--validate[=on|off|warn]</b> : permet de valider le paquet pendant sa construction. Si l'option ne comporte aucun argument ou si son argument est <code>on</code>, alors les erreurs de validation seront considérées comme des erreurs fatales de construction du paquet. Si l'argument est <code>warn</code>, les erreurs sur la validation seront traités comme des messages d'attention.</p>
<p><b>-l, --log-output</b> : sauvegarde une copie de la sortie terminal lors de la compilation de paquets. Par défaut, le fichier est enregistré sous le nom de <code>/tmp/fink-build-log_[nom]-[version]-[révision]_[date]-[heure]</code>, avec la date sous la forme année.mois.jour et l'heure sous la forme heure.minutes.secondes. Vous pouvez utiliser l'option <b>--logfile</b> pour changer le nom de la sauvegarde.</p>
<p><b>--no-log-output</b> : ne sauvegarde pas la copie de la sortie terminal lors de la compilation de paquets. Inverse de l'option <b>--log-output</b>. C'est l'option par défaut.</p>
<p><b>--logfile=nomdefichier</b> : sauvegarde les logs de compilation dans le fichier <code>nomdefichier</code> au lieu de les sauvegarder dans le fichier par défaut (voir l'option <b>--log-output</b>, qui attribue implicitement une valeur par défaut à l'option <b>--logfile</b>). On peut utiliser les raccourcis pour inclure automatiquement des données spécifiques aux paquets. Voir la liste complète des raccourcis dans <a href="../packaging">Création de paquets Fink</a>. Voici quelques raccourcis couramment utilisés :</p>
<ul>
<li><b>%n</b> : nom du paquet</li>
<li><b>%v</b> : numéro de version du paquet</li>
<li><b>%r</b> : numéro de révision du paquet</li>
</ul>
<p><b>-t, --trees=expr</b> : ne tient compte que des paquets des arborescences qui correspondent à <b>expr</b>. <b>expr</b> est une liste d'arborescences séparées par des virgules. <code>fink</code> compare les arborescences existantes dans le fichier <code>fink.conf</code> à celles de <b>expr</b>. Seules les arborescences existantes dans les deux sources sont prises en compte. L'ordre de prise en compte dépend du résultat de la comparaison. Si aucune option <b>--trees</b> n'est utilisée, toutes les arborescences existantes dans le fichier <code>fink.conf</code> sont prises en compte dans l'ordre où elles existent dans ce fichier. Si l'arborescence dans <b>expr</b> contient une barre inclinée (/), la comparaison est faite de façon stricte. Dans le cas contraire, la comparaison a lieu sur le premier élément du chemin de l'arborescence. Par exemple, <b>--trees=unstable/main</b> correspond strictement à l'arborescence <b>unstable/main</b>, mais <b>--trees=unstable</b> correspond aux deux arborescences <b>unstable/main</b> et <b>unstable/crypto</b>. Certaines spécifications spéciales peuvent être incluses dans <b>expr</b> :</p>
<ul>
<li><b>status</b> : inclut les paquets de la base de données de statut dpkg.</li>
<li><b>virtual</b> : inclut les paquets virtuels qui reflète les capacités du système.</li>
</ul>
<p>L'exclusion (ou l'échec d'inclusion) de ces spécifications spéciales n'est actuellement gérée que pour les opérations qui n'installent pas ou ne suppriment pas de paquets.</p>
<p><b>-T, --exclude-trees=expr</b> : ne prend en compte que les paquets des arborescences qui ne correspondent pas à <b>expr</b>. La syntaxe est la même que celle de l'option <b>--trees</b>, y compris les spécifications spéciales. Néanmoins, ici les arborescences sont exclues au lieu d'être incluses. Notez que les arborescences correspondant à la fois à <b>--trees</b> et <b>--exclude-trees</b> sont exclues.</p>
<p>Exemples d'options <b>--trees</b> et <b>--exclude-trees</b> :</p>
<ul>
<li><code>fink --trees=stable,virtual,status install <b>toto</b></code>
<p>Installe <b>toto</b> comme si <code>fink</code> utilisait l'arborescence stable, même si l'arborescence unstable est activée dans le fichier <code>fink.conf</code>.</p>
</li>
<li><code>fink --exclude-trees=local install <b>toto</b></code>
<p>Installe la version Fink de <b>toto</b>, et non la version modifiée localement.</p>
</li>
<li><code>fink --trees=local/main list -i</code>
<p>Donne la liste des paquets modifiés localement qui sont installés.</p>
</li>
</ul>
<p>La plupart de ces options ne nécessite pas d'explication supplémentaire. La plupart d'entre elles peuvent être configurées dans le <a href="conf.php?phpLang=fr">fichier de configuration de Fink</a> (<code>fink.conf</code>) si vous souhaitez les rendre permanentes et non pas restreindre leur effet à une seule invocation de <code>fink</code>.</p>

<h2><a name="install">6.3 install - installation</a></h2>

<p>La commande <b>install</b> est utilisée pour installer des paquets. Elle télécharge, configure, compile et installe les paquets désirés. Elle installe aussi automatiquement les dépendances requises, mais vous demande confirmation avant de le faire. Exemple :</p>
<pre>fink install nedit

Reading package info... Information about 131 packages read. 
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
<p>Ici fink lit les fichiers d'information des paquets, donne le nombre de fichiers lus, signale que le paquet lesstif sera téléchargé si vous donnez votre accord.</p>
<p>L'utilisation de l'option <a href="#options">--use-binary-dist</a> avec la commande <code>fink install</code> permet de gagner un temps considérable lors de la construction de paquets complexes.</p>
<p>Les alias de la commande install sont : <b>update, enable, activate, us</b> (la plupart du temps pour des raisons historiques).</p>

<h2><a name="remove">6.4 remove - suppression</a></h2>

<p>La commande remove supprime les paquets du système en appelant la commande '<code>dpkg --remove</code>'. L'implantation actuelle de cette commande a un défaut : elle ne vérifie pas elle-même les dépendances, mais délègue ce travail à l'outil dpkg (en général, cela ne pose pas de problèmes).</p>
<p>La commande <b>remove</b> ne supprime que le paquet lui-même (à l'exclusion des fichiers de configuration). Le paquet compressé <code>.deb</code> reste sur le système. Ceci signifie que vous pouvez réinstaller le paquet plus tard, sans avoir à le recompiler. Si vous avez besoin de libérer de l'espace disque, vous pouvez supprimer les fichiers <code>.deb</code> de l'arborescence <code>/sw/fink/dists</code>.</p>
<p>Les options suivantes peuvent être utilisées avec la command <code>fink remove</code> :</p>
<pre>
-h, --help
    Affiche les options disponibles.
-r, --recursive
    Supprime aussi les paquets qui
    dépendent du paquet à supprimer
    (c'est-à-dire résout le défaut
    signalé ci-dessus).
</pre>

<p>Alias : <b>disable, deactivate, unuse, delete</b>.</p>

<h2><a name="purge">6.5 purge</a></h2>

<p>La commande <b>purge</b> supprime les paquets du système. Elle agit de la même façon que la commande <b>remove</b>, mais elle supprime en plus les fichiers de configuration.</p>
<p>Cette commande accepte les options suivantes :</p>
<pre>
-h, --help
-r, --recursive
</pre>

<h2><a name="update-all">6.6 update-all - tout mettre à jour</a></h2>

<p>Cette commande met à jour tous les paquets installés. Elle n'utilise pas de liste de paquets, il suffit de lancer :</p>
<pre>fink update-all</pre>
<p>L'option <a href="#options">--use-binary-dist</a> peut s'avérer utile avec cette commande.</p>

<h2><a name="list">6.7 list - liste</a></h2>

<p>Cette commande donne la liste des paquets disponibles, leur statut d'installation, la dernière version disponible et une courte description. Appelée sans paramètres, elle affiche tous les paquets disponibles. Vous pouvez aussi l'utiliser avec un nom ou une expression régulière acceptée par le shell, Fink donnera alors la liste de tous les paquets correspondants.</p>
<p>La première colonne affiche le statut d'installation qui s'interprète de la façon suivante :</p>
<pre>    non installé
 i    dernière version installée
(i)   installé, mais une version plus récente est disponible
 p    paquet virtuel fourni par un paquet installé</pre>
<p>La colonne version affiche toujours la dernière version connue du paquet, quelque soit la version installée éventuellement. Pour connaître toutes les versions d'un paquet disponible sur votre système, utilisez la commande <a href="#dumpinfo">dumpinfo</a>.</p>
<p>Voici quelques-unes des options de la commande <code>fink list</code> :</p>
<pre>
-h, --help
    Affiche les options disponibles. 
-t, --tab
    Affiche la liste en séparant les divers éléments 
    d'une ligne par une tabulation,
    utile en cas d'utilisation à l'intérieur d'un script. 
-i, --installed
    N'affiche que les paquets installés. 
-o, --outdated
    N'affiche que les paquets obsolètes. 
-u, --uptodate
    N'affiche que les paquets à jour. 
-n, --notinstalled
    Affiche les paquets qui ne sont pas installés. 
-s expr, --section=expr
    Affiche les paquets dans les sections correspondant 
    à l'expression régulière fournie. 
-m expr, --maintainer=expr
    Affiche les paquets dont le mainteneur correspond
    à l'expression régulière fournie.
-w=xyz, --width=xyz
    Fixe la largeur de l'affichage. xyz est soit une 
    valeur numérique, soit auto. 
    auto correspond à la largeur du terminal. 
    La valeur par défaut est auto.</pre>
<p>Quelques exemples d'utilisation :</p>
<pre>
fink list
    Affiche tous les paquets.
fink list bash
    Vérifie si bash est installé et affiche la 
    version installée.
fink list --tab --outdated | cut -f 2     
    Affiche le nom des paquets obsolètes.
fink list --section=kde 
    Affiche les paquets de la section kde.
fink list --maintainer=fink-devel
    Affiche les paquets sans mainteneur.
fink --trees=unstable list --maintainer=fink-devel
    Affiche les paquets sans mainteneur 
    de l'arborescence unstable.
fink list "gnome*"
    Affiche tous les paquets dont le nom 
    commence par 'gnome'.
</pre>
<p>Dans le dernier exemple, les guillemets sont nécessaires pour empêcher le shell d'interpréter le modèle lui-même.</p>

<h2><a name="apropos">6.8 apropos - à propos</a></h2>

<p>Cette commande est presque identique à la commande <a href="#list">fink list</a>. La différence la plus notable est que <code>fink apropos</code> recherche aussi dans les fichiers de descriptions de paquets pour trouver les paquets. La seconde différence est que la chaîne de recherche n'est pas optionnelle, elle doit être fournie.</p>
<pre>
fink apropos irc
    Affiche tous les paquets où 'irc' apparaît 
    soit dans le nom, soit dans la description.
fink apropos -s=kde irc
    Identique au précèdent, mais restreint aux 
    paquets de la section kde.
</pre>

<h2><a name="describe">6.9 describe - description</a></h2>

<p>Cette commande affiche la description du paquet nommé sur la ligne de commande. Notez, qu'à l'heure actuelle, seule une faible part des paquets ont une description.</p>
<p>Alias : <b>desc, description, info</b></p>

<h2><a name="plugins">6.10 plugins</a></h2>

<p>Afficher les plugins supplémentaires disponible pour le programme <code>fink</code>. À l'heure actuelle affiche les mécanismes de notification et les algorithmes de vérification de somme des archives sources.</p>

<h2><a name="fetch">6.11 fetch - téléchargement</a></h2>

<p>Télécharge les paquets nommés, mais ne les installe pas. Cette commande télécharge les archives tar, même si elles ont déjà été téléchargées.</p>
<p>Vous pouvez utiliser les options suivantes avec la commande <code>fetch</code> :</p>
<pre>
-h, --help
    Affiche les options disponibles. 
-i, --ignore-restrictive
    Ne télécharge pas les paquets dont la licence 
    est "Restrictive".
    Intéressant pour les miroirs, car certains 
    paquets interdisent le miroir source.
-d, --dry-run
    Affiche simplement des informations sur les 
    fichiers à télécharger.
    Ne télécharge rien.
-r, --recursive
    Télécharge également les paquets dépendants 
    des paquets à télécharger.
</pre>

<h2><a name="fetch-all">6.12 fetch-all - tout télécharger</a></h2>

<p>Télécharge <b>tous</b> les paquets sous forme source. Comme <a href="#fetch">fetch</a>, cette commande télécharge les archives tar, même si elle ont déjà été téléchargées.</p>
<p>Les options suivantes peuvent être utilisées avec la commande <code>fink fetch-all</code> :</p>
<pre>
-h, --help
-i, --ignore-restrictive
-d, --dry-run
</pre>

<h2><a name="fetch-missing">6.13 fetch-missing - télécharger paquets manquants</a></h2>

<p>Télécharge <b>tous</b> les paquets manquants sous forme source. Cette commande ne télécharge que les paquets qui ne sont pas présents sur le système.</p>
<p>Les options suivantes peuvent être utilisées avec la commande <code>fink fetch-missing</code> :</p>
<pre>
-h, --help
-i, --ignore-restrictive
-d, --dry-run
</pre>

<h2><a name="build">6.14 build - compiler</a></h2>

<p>Construit un paquet, mais ne l'installe pas. Les archives tar source sont téléchargées si elles ne sont pas présentes sur le système. La commande construit un paquet .deb que vous pourrez installer ultérieurement avec la commande install. Cette commande n'a aucun effet si le fichier .deb existe déjà. Notez que, contrairement au paquet, les dépendances sont, elles, <b>installées</b>.</p>
<p>L'option <a href="#options">--use-binary-dist</a> peut être utilisée ici.</p>

<h2><a name="rebuild">6.15 rebuild - recompiler</a></h2>

<p>Construit un paquet (tout comme la commande build), mais ignore et écrase le fichier .deb existant. Si le paquet est installé, le nouveau fichier .deb sera lui aussi installé dans le système via <code>dpkg</code>. Très utile pendant la phase de développement du paquet.</p>

<h2><a name="reinstall">6.16 reinstall - réinstaller</a></h2>

<p>Identique à install, mais installe le paquet via <code>dpkg</code>, même s'il est déjà installé. Vous pouvez utiliser cette commande si vous supprimez involontairement des paquets, ou bien si vous changez les fichiers de configuration et que vous voulez retrouver la configuration par défaut.</p>

<h2><a name="configure">6.17 configure - configurer</a></h2>

<p>Réexécute le processus de configuration de <code>fink</code>. Cela vous permet de changer les sites miroirs et les configurations proxy, entre autres.</p>
<p>À partir de la version 0.26 de <code>fink</code>, cette commande vous permet aussi d'activer les arborescences instables.</p>

<h2><a name="selfupdate">6.18 selfupdate - mise à jour automatique</a></h2>

<p>Cette commande automatise le processus de mise à jour de Fink. Elle vérifie si une nouvelle version existe sur le site web de Fink, télécharge ensuite les descriptions de paquets et met à jour les paquets fondamentaux, y compris <code>fink</code>. Cette commande met à jour les versions standards, mais peut aussi configurer votre arborescence <code>/sw/fink/dists</code> de telle sorte qu'elle soit mise à jour directement via CVS, ou avec rsync, si vous choisissez l'une de ces options lors de la première utilisation de cette commande. Vous avez alors accès aux toutes dernières versions des paquets.</p>
<p>Si l'option <a href="#options">--use-binary-dist option</a> est activée, la liste des paquets disponibles dans la distribution binaire est, elle aussi, mise à jour.</p>

<h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>

<p>Utilisez cette commande pour faire en sorte que la commande <code>fink selfupdate</code> utilise rsync pour mettre à jour la liste des paquets de fink.</p>
<p>Nous vous recommandons d'utiliser cette méthode quand vous compilez à partir des sources.</p>
<p><b>Note : </b>les mises à jour via rsync ne mettent à jour que les <a href="conf.php?phpLang=fr#optional">arborescences</a> (par exemple, si instable n'est pas activé dans le fichier <code>fink.conf</code>, la liste des paquets instables ne sera pas mise à jour).</p>

<h2><a name="selfupdate-cvs">6.20 selfupdate-cvs</a></h2>

<p>Utilisez cette commande pour faire en sorte que la commande <code>fink selfupdate</code> utilise cvs pour mettre à jour la liste des paquets de fink.</p>
<p>La mise à jour via cvs est obsolète, sauf pour les développeurs et les personnes dont les murs pare-feux interdisent l'utilisation de rsync.</p>
 
<h2><a name="index">6.21 index - indexer</a></h2>

<p>Reconstruit le cache des paquets. Normalement, vous n'avez pas besoin d'exécuter cette commande manuellement, car <code>fink</code> est censé détecter automatiquement s'il est besoin de reconstruire le cache.</p>

<h2><a name="validate">6.22 validate - valider</a></h2>

<p>Cette commande exécute différents contrôles sur les fichiers <code>.info</code> et <code>.deb</code>. Les mainteneurs de paquets doivent l'exécuter sur leurs descriptions de paquets et sur les paquets construits avant de les soumettre.</p>
<p>Les options suivantes peuvent être utilisées :</p>
<pre>
-h, --help
    Affiche les options disponibles.
-p, --prefix
    Simule un autre préfixe de chemin de base 
    de Fink (%p) pour les fichiers à valider.
--pedantic, --no-pedantic
    Contrôle l'affichage des messages d'attention.
    --pedantic est l'option par défaut.
</pre>
<p>Alias : <b>check</b></p>

<h2><a name="scanpackages">6.23 scanpackages - création de fichiers Packages</a></h2>

<p>Met à jour la base de données des paquets de <code>apt-get</code>. Par défaut, met à jour toutes les arborescences, mais peut être restreinte à un jeu d'une ou plusieurs arborescences données comme arguments de cette commande.</p>

<h2><a name="cleanup">6.24 cleanup - épuration</a></h2>

<p>Supprime les fichiers obsolètes et temporaires. Cela peut libérer une grande portion d'espace disque. On peut spécifier un ou plusieurs modes :</p>
<pre>--debs
    Supprime les fichiers .deb
    (archives de paquets binaires compilés)
    correspondant aux versions de paquets
    qui ne sont ni décrits dans un fichier
    de description de paquets (fichier .info)
    dans les arborescences actives ni
    installés.
--sources,--srcs
    Supprime les sources (archives tarballs, etc...)
    qui ne sont utilisés par aucun fichier de 
    description de paquets (fichier .info)
    dans les arborescences activées.
--buildlocks, --bl
    Supprime les anciens paquets de 
    verrouillage de compilation.
--dpkg-status
    Supprime dans la base de données
    "status" de dpkg les paquets qui
    ne sont pas installés.
--obsolete-packages 
    Tenre de désinstaller tous les paquets
    obsolètes installés.
    À partir de la version 0.26.0 de fink.
--all
    Active tous les modes.
    À partir de la version 0.26.0 de fink.</pre>
<p>Si aucun mode n'est spécifié, les modes par défaut utilisés sont <code>--debs --sources</code>.</p>
<p>De plus, on peut utiliser les options suivantes :</p>
<pre>
-k,--keep-src
    Déplace les anciens fichiers sources
    dans le répertoire /sw/src/old/
    au lieu de les supprimer.
-d,--dry-run
    Affiche le nom des fichiers à supprimer,
    mais ne les supprime pas.
-h,--help
    Affiche les modes et options existantes.</pre>

<p>Si l'option <a href="#options">--use-binary-dist</a> est activée, les paquets binaires téléchargés obsolètes sont supprimés et la commande <code>fink scanpackages</code> est exécutée.</p>

<h2><a name="dumpinfo">6.25 dumpinfo - analyse des fichiers info</a></h2>

<p>Note : disponible dans une version de <code>fink</code> postérieure à la version 0.21.0.</p>
<p>Affiche l'analyse syntaxique des différentes parties d'un fichier <code>.info</code> d'un paquet. Les <b>options</b> suivantes permettent de moduler l'affichage des champs et l'interprétation des raccourcis :</p>
<pre>
-h, --help           
    Affiche les options disponibles. 
-a, --all
    Affiche tous les champs de description du paquet.
    C'est le mode par défaut quand aucune option 
    --field ou --percent n'est utilisée. 
-f nomchamp, --field=nomchamp
    Affiche le contenu des champs indiqués
    dans leur ordre d'apparition après l'option -f. 
-p clé, --percent=clé
    Affiche l'interprétation des clés fournies
    dans leur ordre d'apparition après l'option -p.</pre>

<h2><a name="show-deps">6.26 show-deps - affiche les dépendances</a></h2>

<p>Disponible uniquement à partir de la version 0.23.6 de <code>fink</code>.</p>
<p>Affiche, sous une forme compréhensible, la liste des dépendances à la compilation (construction du paquet) et à l'exécution (installation du paquet).</p>



<?php include_once "../../footer.inc"; ?>


