<?php
$title = "Q.F.P. - Utilisation (1)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/04/05 5:48:20';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="usage-packages.php?phpLang=fr" title="Problèmes d\'utilisation spécifiques à certains paquets"><link rel="prev" href="comp-packages.php?phpLang=fr" title="Problèmes de compilation spécifiques à certains paquets">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 8. Problèmes généraux d'utilisation de paquets</h1>


<a name="xlocale">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.1: De nombreux messages signalant que la locale n'est pas gérée par la bibliothèque C apparaissent (message en anglais : "locale not supported by C library"). Est-ce un problème ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Non, cela signifie juste que le programme va utiliser les messages, les formats de date, etc... anglais. Le programme fonctionnera normalement par ailleurs. Le document Utilisation de X11 donne de <a href="/doc/x11/trouble.php#locale">plus amples informations</a> à ce sujet.</p></div>
</a>
<a name="passwd">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.2: Un certain nombre d'étranges utilisateurs apparaissent tout d'un coup sur mon système. Ils portent, entre autres, les noms suivants : "mysql", "pgsql" et "games". D'où proviennent-ils ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Vous avez utilisé Fink pour installer un paquet dépendant du paquet passwd. Ce paquet installe un certain nombre d'utilisateurs supplémentaires pour des raisons de sécurité - sur les systèmes Unix, les fichiers et les processus appartiennent aux "propriétaires", ce qui permet aux administrateurs système de moduler les autorisations et la sécurité du système. Les programmes Apache et MySQL, par exemple, doivent avoir un "propriétaire", et il n'est pas raisonnable que le super-utilisateur soit le propriétaire de ces démons. Imaginez ce qu'il arriverait si Apache était compromis et avait tout d'un coup l'autorisation d'écrire dans tous les fichiers du système. Le paquet passwd se charge donc de définir ces utilisateurs supplémentaires pour les paquets Fink qui en ont besoin.</p><p>Il peut être inquiétant de découvrir soudain un certain nombre d'utilisateurs inconnus dans votre panneau de "Préférences système : Utilisateurs" (sur Mac OS X 10.2.x) ou "Préférences système : Comptes" (sur Mac OS X 10.3.x), mais réfléchissez bien avant de les supprimer :</p><ul>
<li>Tout d'abord, vous avez manifestement choisi d'installer un paquet qui nécessite leur utilisation ; donc leur suppression n'a pas grand sens dans ce contexte.</li>
<li>En fait, il y a déjà un certain nombre d'utilisateurs supplémentaires installés par Mac OS X, dont vous ignorez peut-être l'existence : www, daemon, nobody entre autres. La présence de ces utilisateurs supplémentaires correspond à une convention standard d'Unix nécessaire à l'utilisation de certains services ; le paquet passwd ne fait qu'en ajouter quelques autres qu'Apple ne fournit pas. Vous pouvez voir les utilisateurs installés par Apple via le Gestionnaire NetInfo ou en lançant la commande <code>niutil -list . /users</code>
</li>
<li>Si vous décidez de supprimer ces utilisateurs, faites très attention à la façon dont vous procéderez. Si vous utilisez le panneau "Préférences système : Utilisateurs" (sur Mac OS X 10.2.x) ou "Préférences système : Comptes" (sur Mac OS X 10.3.x), tous les fichiers possédés par ces utilisateurs seront assignés à un utilisateur administrateur pris au hasard. Certaines personnes ont rapporté que cela pouvait causer des dégâts dans les autorisations du compte administrateur. C'est un bogue des Préférences système, il a été soumis à Apple. Un moyen plus sûr de supprimer ces utilisateurs est de passer par Gestionnaire NetInfo ou d'utiliser l'outil en ligne de commande <code>niutil</code> dans une fenêtre de Terminal. Lisez la page de manuel de <code>niutil</code> pour de plus amples informations au sujet de NetInfo.</li>
</ul><p>Fink vous <b>demande</b> la permission d'installer ces utilisateurs supplémentaires sur votre système lors de l'installation du paquet passwd, vous ne devriez donc pas être trop surpris de les découvrir après coup.</p></div>
</a>
<a name="compile-myself">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.3: Comment compiler soi-même en utilisant des logiciels installés par Fink ?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> When compiling something yourself outside of Fink, the compiler and
        linker need to be told where to find the Fink-installed libraries and
		headers.  It is also necessary to tell the compiler to use the
		appropriate target architecture.  For a package that uses standard
		configure/make process, you need to set some environment variables:</p><p>-bash-</p><pre>export CFLAGS=-I/sw/include 
export LDFLAGS=-L/sw/lib 
export CXXFLAGS=$CFLAGS 
export CPPFLAGS=$CXXFLAGS 
export ACLOCAL_FLAGS="-I /sw/share/aclocal"
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"
export PATH=/sw/var/lib/fink/path-prefix-clang:$PATH
export MACOSX_DEPLOYMENT_TARGET=10.9</pre><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
setenv LDFLAGS -L/sw/lib 
setenv CXXFLAGS $CFLAGS 
setenv CPPFLAGS $CXXFLAGS 
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal"
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"
setenv PATH /sw/var/lib/fink/path-prefix-clang:$PATH
setenv MACOSX_DEPLOYMENT_TARGET 10.9</pre><p>(assuming that the build system is running OS 10.9 or later)</p><p>It is often easiest just to add these to your startup files (e.g.
        <code>.cshrc</code> | <code>.profile</code>) so they
        are set automatically. If a package does not use these variables, you
        may need to add the "-I/sw/include" (for headers) and "-L/sw/lib" (for
        libraries) to the compile lines yourself. Some packages may use
        similar non-standard variables such as EXTRA_CFLAGS or --with-qt-dir=
        configure options. "./configure --help" will usually give you a list
        of the extra configure options.</p><p>In addition, you may need to install the development headers (e.g.
        <b>foo-1.0-1-dev</b>) for the library packages that you are using,
        if they aren't already installed.</p></div>
</a>
<a name="apple-x11-applications-menu">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.4: Il est impossible d'exécuter une application installée par Fink en utilisant le menu Applications dans X11 d'Apple. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> L'application X11 d'Apple ne garde pas trace des variables d'environnement de Fink, ce qui signifie que son menu Applications n'a pas dans la variable PATH le chemin permettant de trouver les applications Fink. Vous pouvez résoudre ce problème en ajoutant devant le nom d'une application installée via Fink la commande suivante :</p><pre>source /sw/bin/init.sh ;</pre><p>Par exemple, si vous voulez lancer GIMP installé via Fink, choisissez "Personnalisez le menu" dans le menu Applications et saisissez :</p><pre>source /sw/bin/init.sh ; gimp</pre><p>dans le champ "Commande" en regard du nom de menu GIMP.</p><p>Vous pouvez aussi modifier le fichier .xinitrc, situé dans votre répertoire utilisateur, et y ajoutez la commande suivante :</p><pre>source /sw/bin/init.sh</pre><p>après la première ligne.</p></div>
</a>
<a name="x-options">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.5: Il y a de nombreuses options pour X11 : X11 d'Apple, XFree86, etc... Laquelle installer ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Toutes ces options sont des variantes de XFree86 - toutes basées sur le code de XFree86, mais il y a de légères différences entre elles. Les options proposées sont différentes sous Panther et sous Jaguar.</p><p>Sous Panther, vous avez le choix entre :</p><ul>
<li><p>X11 d'Apple (que vous trouverez sur le disque numéro 3). N'oubliez pas d'installer le paquet  X11 SDK (situé sur le disque XCode) si vous voulez compiler des programmes  à partir des sources ou si vous avez l'intention d'installer d'autres paquets Fink reliés à X11.</p></li>
<li><p>La version 4.4.x de XFree86 compilée via Fink : installez les paquets <code>xfree86</code> et <code>xfree86-shlibs</code></p></li>
<li><p>X.org compilé via Fink : installez les paquets <code>xorg</code> et <code>xorg-shlibs</code></p></li>
</ul><p>Sous Jaguar, les choix les plus courants et les paquets Fink qui leur correspondent sont les suivants :</p><ul>
<li>
<p>La version 4.2.x de XFree86 compilée via Fink : installez <code>xfree86-base</code> et <code>xfree86-rootless</code> ou <code>xfree86-base-threaded</code> et <code>xfree86-rootless-threaded</code> (et les paquets <code>-shlibs</code> correspondants)</p>
</li>
<li>
<p>La version 4.3.x de XFree86 compilée via Fink : installez les paquets <code>xfree86</code> et <code>xfree86-shlibs</code></p>
</li>
<li>
<p>La version 4.2.x d'Apple (en supposant que vous avez installé les paquets User et SDK). Le paquet <code>system-xfree86</code> est généré automatiquement, NE l'installez PAS. Notez que la version bêta publique de X11 d'Apple pour Jaguar n'est plus disponible, aussi ce n'est une option que pour ceux d'entre vous qui l'avez déjà installé au temps où elle était encore disponible.</p>
</li>
</ul><p>Il existe encore d'autres options. Vous trouverez tous les détails dans le <a href="/doc/x11/index.php">document Utilisation de X11</a>.</p></div>
</a>
<a name="no-display">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.6: Au lancement d'une application, un message signale que la fenêtre d'affichage ne peut être ouverte (message en anglais: "cannot open display:"). Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Cette erreur signifie que le système n'est pas connecté à l'affichage X. Assurez-vous que vous avez suivi les étapes suivantes :</p><p>1. Démarrer X (X11 d'Apple, XFree86, ...).</p><p>2. Vérifier que la variable d'environnement DISPLAY est définie correctement. Si vous utilisez les paramètres par défaut pour X, vous pouvez la définir de la façon suivante :</p><pre>setenv DISPLAY :0</pre><p>si vous utilisez <code>tcsh</code>, ou</p><pre>export DISPLAY=:0</pre><p>si vous utilisez <code>bash</code>.</p></div>
</a>
<a name="suggest-package">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.7: Certains programmes ne sont pas disponibles via Fink. Comment faire en sorte qu'ils soient inclus dans Fink ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Déposez une requête dans le <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Traqueur de requêtes de paquet (Package Request Tracker en anglais)</a> accessible sur la page du projet Fink.</p><p>Notez que vous devez avoir un identifiant SourceForge pour ce faire.</p></div>
</a>
<a name="virtpackage">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.8: À quoi correspondent les "paquets virtuels" <code>system-*</code> qui apparaissent de-ci de-là, mais qu'il ne semble pas possible d'installer ou de supprimer soi-même ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Les paquets tel <code>system-perl</code> sont des paquets fantômes. Ils ne contiennent aucun fichier, mais font partie d'un mécanisme qui permet à Fink de savoir quels programmes ont été installés en dehors de Fink.</p><p>À partir de la distribution 10.3, la plupart de ces paquets fantômes ne sont même plus des paquets réels que vous pouvez installer ou supprimer. Ce sont des "Paquets virtuels", c'est-à-dire des structures de données de paquets générées par le programme fink au vu d'une liste préconfigurée de paquets installés manuellement. Pour chaque paquet virtuel, fink vérifie l'existence de certains fichiers à certains emplacements. S'ils les trouvent, il considère que le paquet virtuel correspondant est "installé".</p><p>Vous pouvez exécuter le programme <code>fink-virtual-pkgs</code> (qui fait partie du paquet fink) pour obtenir la liste des choses que fink considère comme installées. En ajoutant l'option <code>--debug</code>, vous obtiendrez la liste des tests que fink effectue.</p><p>Malheureusement, il n'existe pas de mécanisme qui permette à Fink de reconnaître un paquet arbitraire installé hors de fink, l'empêchant ainsi d'installer sa propre version dudit programme. C'est beaucoup trop difficile de tester les options de configuration et de compilation, les chemins, etc... dans le cas général.</p><p>Voici les paquets virtuels les plus importants définis par fink (à partir de la version 0.19.2) :</p><ul>
<li>system-perl : [paquet virtuel correspondant à perl]
<p>Il représente le programme <code>/usr/bin/perl</code>, qui fait partie de l'installation par défaut de Mac OS X. Ce paquet fournit aussi <code>system-perlXXX</code> et <code>perlXXX-core</code> selon la version X.X.X de l'interpréteur perl.</p>
</li>
<li>system-javaXXX : [paquet virtuel correspondant à Java X.X.X]
<p>Il représente l'environnement d'exécution de Java (JRE), qui fait partie de Mac OS X (et des mises à jour d'Apple). Voir la <a href="http://www.apple.com/java">page Java d'Apple</a> pour de plus amples informations.</p>
</li>
<li>system-javaXXX-dev : [paquet virtuel correspondant aux headers de développement Java X.X.X]
<p>Il représente le SDK (kit de développement) de Java, qui doit être téléchargé et installé à partir de <a href="http://connect.apple.com">connect.apple.com</a> (enregistrement gratuit obligatoire). Si vous avez mis à jour le JRE, il est possible que le SDK ne soit pas automatiquement mis à jour ou même qu'il ait été supprimé. Vérifiez systématiquement le SDK après installation ou mise à jour du JRE, puis téléchargez-le et installez-le si nécessaire. Voir aussi <a href="comp-general.php?phpLang=fr#system-java">la QFP à propos de system-java14-dev</a>.</p>
</li>
<li>system-java3d : [paquet virtuel représentant Java3D]</li>
<li>system-javaai : [paquet virtuel représent Java Advanced Imaging]
<p>Ils représentent les extensions Java pour les graphiques 3D et le traitement d'images, qui peuvent être téléchargées et installées à partir du site d'Apple. Voir la <a href="http://docs.info.apple.com/article.html?artnum=120289">page web d'Apple à propos de la mise  à jour de Java 3D et de Java Advanced Imaging</a> pour de plus amples informations.</p>
</li>
<li>system-xfree86 : [paquet fantôme pour un paquet x11 installé manuellement]</li>
<li>system-xfree86-shlibs : [paquet fantôme pour les bibliothèques partagées x11 installées manuellement]
<p>Ils représentent X11/XDarwin d'Apple, partie optionnelle de Mac OS X correspondant au paquet X11User.pkg. Ces paquets fournissent respectivement <code>x11</code> et <code>x11-shlibs</code>. Voir aussi <a href="comp-packages.php?phpLang=fr#cant-install-xfree">la QFP à propos du passage à la version XFree86 de Fink</a>.</p>
</li>
<li>system-xfree86-dev : [paquet fantôme pour les outils de développement x11 installés manuellement]
<p>Il représente X11/XDarwin SDK d'Apple, partie optionnelle de Mac OS X correspondant au paquet X11SDK.pkg. Ce paquet fournit <code>x11-dev</code>. Voir aussi <a href="comp-packages.php?phpLang=fr#cant-install-xfree">la QFP à propos du passage à la version XFree86 de Fink</a>.
</p>
</li>
</ul></div>
</a>
<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-packages.php?phpLang=fr">9. Problèmes d'utilisation spécifiques à certains paquets</a></p>
<?php include_once "../footer.inc"; ?>


