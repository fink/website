<?
$title = "Q.F.P. - Utilisation (1)";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/08/20 12:07:43';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="usage-packages.php?phpLang=fr" title="Problèmes d\'utilisation spécifiques à certains paquets"><link rel="prev" href="comp-packages.php?phpLang=fr" title="Problèmes de compilation de certains paquets">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 8. Problème généraux d'utilisation de paquets</h1>
    
    
    <a name="xlocale">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.1: De nombreux messages similaires à "locale not supported by C
        library" apparaissent. Est-ce un problème ?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Non, cela signifie juste que le programme va utiliser les messages, les formats de date, etc... anglais. Le programme fonctionnera normalement par ailleurs. Le document Utilisation de X11 donne de <a href="http://fink.sourceforge.net/doc/x11/trouble.php#locale">plus amples informations</a> à ce sujet.</p></div>
    </a>
    <a name="passwd">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.2: Un certain nombre d'étranges utilisateurs apparaissent tout d'un coup sur mon système. Ils portent, entre autres, les noms suivants : "mysql", "pgsql", and "games". D'où proviennent-ils ?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Vous avez utilisé Fink pour installer un paquet dépendant du paquet passwd. passwd installe un certain nombre d'utilisateurs supplémentaires pour des raisons de sécurité - sur les systèmes Unix, les fichiers et les processus appartiennent aux "possesseurs", ce qui permet aux administrateurs système de moduler les permissions et la sécurité du système. Les programmes Apache et MySQL, par exemple, doivent avoir un "possesseur", et il n'est pas raisonnable que le super-utilisateur soit le possesseur de ces démons. Imaginez ce qu'il arriverait si Apache était compromis et avait tout d'un coup permission d'écrire dans tous les fichiers du système. Donc, le paquet passwd se charge de définir ces utilisateurs supplémentaires pour les paquets Fink qui en ont besoin.</p><p>Il peut être inquiétant de découvrir soudain un certain nombre d'utilisateurs inconnus dans votre panneau de "Préférences système : Utilisateurs" (sur 10.2.x) ou "Préférences système : Comptes" (sur 10.3.x), mais réfléchissez bien avant de les supprimer :</p><ul>
          <li>Tout d'abord, vous avez manifestement choisi d'installer un paquet qui nécessite leur utilisation ; donc leur suppression n'a pas grand sens dans ce contexte.</li>
          <li>En fait, il y a déjà un certain nombre d'utilisateurs supplémentaires installés par Mac OS X, dont vous ignorez peut-être l'existence : www, daemon, nobody entre autres. La présence de ces utilisateurs supplémentaires correspond à une convention standard d'Unix nécessaire à l'utilisation de certains services ; le paquet passwd ne fait qu'en ajouter quelques autres qu'Apple ne fournit pas. Vous pouvez voir les utilisateurs installés par Apple via le Gestionnaire NetInfo ou en lançant <code>niutil -list . /users</code>
          </li>
          <li>Si vous décidez de supprimer ces utilisateurs, faites très attention à la façon dont vous procéderez. Si vous utilisez le panneau "Préférences système : Utilisateurs" (sur 10.2.x) ou "Préférences système : Comptes" (sur 10.3.x), tous les fichiers possédés par ces utilisateurs seront assignés à un utilisateur administrateur pris au hasard. Certaines personnes ont rapporté que cela pouvait causer des dégâts dans les permissions du compte administrateur. C'est un bogue des Préférences système, il a été soumis à Apple. Un moyen plus sûr de supprimer ces utilisateurs est de passer par Gestionnaire NetInfo ou d'utiliser l'outil en ligne de commande <code>niutil</code> dans une fenêtre de Terminal. Lisez la man page de <code>niutil</code> pour de plus amples informations au sujet de NetInfo.</li>
        </ul><p>Fink vous <b>demande</b> la permission d'installer ces utilisateurs supplémentaires sur votre système lors de l'installation du paquet passwd package, vous ne devriez donc pas être trop surpris de les découvrir après coup.</p></div>
    </a>
    <a name="compile-myself">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.3: Comment compiler soi-même en utilisant des logiciels installés par Fink ?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Quand on compile soi-même sans passer par Fink, il faut indiquer au compilateur et à l'éditeur de liens où trouver les librairies et les headers installés par Fink. Pour un paquet qui utilise un processus standard configure/make, vous devez définir quelques variables d'environnement :</p><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
setenv LDFLAGS -L/sw/lib 
setenv CXXFLAGS $CFLAGS 
setenv CPPFLAGS $CXXFLAGS 
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal" 
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"</pre><p>-bash-</p><pre>export CFLAGS=-I/sw/include 
export LDFLAGS=-L/sw/lib 
export CXXFLAGS=$CFLAGS 
export CPPFLAGS=$CXXFLAGS 
export ACLOCAL_FLAGS="-I /sw/share/aclocal" 
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"</pre><p>Il est souvent plus simple d'ajouter ces variables à vos fichiers de démarrage (par exemple, <code>.cshrc</code> ou <code>.profile</code>), de façon à ce qu'elles soient automatiquement définies. Si un paquet n'utilise pas ces variables, vous devrez peut-être ajouter "-I/sw/include" (pour les headers) et "-L/sw/lib" (pour les librairies) aux lignes de compilation. Certains paquets peuvent utiliser des variables non standards, telle EXTRA_CFLAGS, des options de configuration, telle  --with-qt-dir=. "./configure --help" vous donne, en général, la liste de ces options de configuration supplémentaires.</p><p>De plus, vous devrez peut-être installer les headers de développement (par exemple <b>foo-1.0-1-dev</b>) des paquets librairies que vous utilisez, s'ils ne sont pas déjà installés.</p></div>
    </a>
    <a name="apple-x11-applications-menu">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.4: Impossible d'exécuter une application installée par Fink en utilisant le menu Applications dans X11 d'Apple.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> X11 d'Apple ne garde pas trace des variables d'environnement de Fink, ce qui signifie que le menu Applications n'a pas le PATH correct pour trouver les applications Fink. Vous pouvez résoudre ce problème en ajoutant devant le nom d'une application installée via Fink la commande suivante :</p><pre>source /sw/bin/init.sh ;</pre><p>Par exemple, si vous voulez lancer GIMP installé via Fink, saisissez :</p><pre>source /sw/bin/init.sh ; gimp</pre><p>dans le champ "Command" en regard de la ligne GIMP.</p><p>Vous pouvez aussi modifier le fichier .xinitrc, situé dans votre répertoire utilisateur, et ajoutez la commande suivante :</p><pre>source /sw/bin/init.sh</pre><p>après la première ligne.</p></div>
    </a>
    <a name="x-options">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.5: Il y a de nombreuses options pour X11 : X11 d'Apple, XFree86, etc... Laquelle installer ?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Toutes ces options sont des variantes de XFree86 (elles sont toutes basées sur le code de XFree86), mais il y a de légères différences entre elles. Il existe des options différentes sous Panther et sous Jaguar.</p><p>Sous Panther, vous avez le choix entre :</p><ul>
    <li><p>X11 d'Apple (sur le disque numéro 3). N'oubliez pas d'installer X11 SDK (situé sur le disque XCode) si vous voulez compiler des programmes ou si vous avez l'intention d'installer d'autres paquets Fink reliés à X11 à partir des sources </p></li>
<li><p>4.4.x compilé via via Fink : installez les paquets <code>xfree86</code> et <code>xfree86-shlibs</code></p></li>
</ul><p>Sous Jaguar, les choix les plus populaires et les paquets Fink qui leur correspondent sont les suivants :</p><ul>
          <li>
            <p>4.2.x compilé via Fink : installez <code>xfree86-base</code> et <code>xfree86-rootless</code> ou <code>xfree86-base-threaded</code> et <code>xfree86-rootless-threaded</code> (et les paquets <code>-shlibs</code> correspondants)</p>
          </li>
          <li>
            <p>4.3.x compilé via Fink : installez les paquets <code>xfree86</code> et <code>xfree86-shlibs</code></p>
          </li>
          <li>
            <p>4.2.x d'Apple (en supposant que vous avez installé les paquets User et SDK) : le paquet <code>system-xfree86</code> est généré automatiquement, NE l'installez PAS. (Notez que la version bêta publique de X11 d'Apple pour Jaguar n'est plus disponible, aussi ce n'est une option que pour ceux d'entre vous qui l'avez déjà installé au temps où elle était encore disponible).</p>
          </li>
        </ul><p>Il existe encore d'autres options. Vous trouverez tous les détails dans le <a href="http://fink.sourceforge.net/doc/x11/index.php">document Utilisation de X11</a>.</p></div>
    </a>
    <a name="no-display">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.6: Au lancement d'une application, le message suivant apparaît : "cannot
        open display:". Que faire ?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Cette erreur signifie que le système n'est pas connecté à l'affichage X. Assurez-vous que vous avez suivi les étapes suivantes :</p><p>1. Démarrer X (X11 d'Apple, XFree86, ...).</p><p>2. Vérifier que la variable d'environnement DISPLAY est définie correctement. Si vous utilisez les paramètres par défaut pour X, vous pouvez la définir de la façon suivante :</p><pre>setenv DISPLAY :0</pre><p>si vous utilisez <code>tcsh</code>, ou</p><pre>export DISPLAY=:0</pre><p>si vous utilisez <code>bash</code>.</p></div>
    </a>
    <a name="suggest-package">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.7: Certains programmes ne sont pas disponibles via Fink. Comment faire en sorte qu'ils soient inclus dans Fink ?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Déposez une requête dans le <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package
        Request Tracker</a> sur la page du projet Fink.</p><p>Notez que vous devez avoir un identifiant SourceForge pour ce faire.</p></div>
    </a>

    <a name="virtpackage">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.8: À quoi correspondent les "paquets virtuels" <code>system-*</code> qui apparaissent de-ci de-là, mais qu'il ne semble pas possible d'installer ou de supprimer soi-même ?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Les paquets tel <code>system-perl</code> sont des paquets fantômes. Ils ne contiennent aucun fichier, mais font partie d'un mécanisme qui permet à Fink de savoir quels programmes ont été installés en dehors de Fink.</p><p>À partir de la distribution 10.3, la plupart de ces paquets fantômes ne sont même plus des paquets réels que vous pouvez installer et supprimer. Ce sont des "Paquets virtuels", structures de données de paquets générées par le programme fink au vu d'une liste préconfigurée de paquets installés manuellement. Pour chaque paquet virtuel, fink vérifie l'existence de certains fichiers à certains emplacements. S'ils les trouvent, il considère que le paquet virtuel correspondant est "installé".</p><p>Vous pouvez exécuter le programme <code>fink-virtual-pkgs</code> (qui fait partie du paquet fink) pour obtenir la liste des choses que fink considère comme installées. En ajoutant l'option <code>--debug</code>, vous obtiendrez la liste des tests que fink effectue.</p><p>Malheureusement, il n'existe pas de mécanisme qui permette à Fink de reconnaître un paquet arbitraire installé hors de fink, l'empêchant ainsi d'installer sa propre version dudit programme. C'est beaucoup trop difficile de tester les options de configuration et de compilation, les chemins, etc... dans le cas général.</p><p>Voici les paquets virtuels les plus importants définis par fink (à partir de la version 0.19.2) :</p><ul>
	  <li>system-perl : [paquet virtuel correspondant à perl]
	    <p>Représente <code>/usr/bin/perl</code>, qui fait partie de l'installation par défaut de OS X. Ce paquet fournit aussi <code>system-perlXXX</code> et <code>perlXXX-core</code> selon la version X.X.X de l'interpréteur perl.</p>
	  </li>
	  <li>system-javaXXX : [paquet virtuel correspondant à Java X.X.X]
	    <p>Représente l'environnement d'exécution de Java (JRE), qui fait partie de OS X (et des mises à jour d'Apple). Voir la <a href="http://www.apple.com/java">page Java d'Apple</a> pour de plus amples informations.</p>
	  </li>
	  <li>system-javaXXX-dev : [paquet virtuel correspondant aux headers de développement Java X.X.X]
	    <p>Représente le SDK (kit de développement) de Java, qui doit être téléchargé et installé à partir de <a href="http://connect.apple.com">connect.apple.com</a> (enregistrement gratuit obligatoire). Si vous avez mis à jour le JRE, il est possible que le SDK ne soit pas automatiquement mis à jour (ou même qu'il ait été supprimé). Vérifiez systématiquement le SDK après installation ou mise à jour du JRE,  et téléchargez-le et installez-le si nécessaire. Voir aussi <a href="comp-general.php?phpLang=fr#system-java">cette QFP</a>.</p>
	  </li>
	  <li>system-java3d : [paquet virtuel représentant Java3D]</li>
	  <li>system-javaai : [paquet virtuel représent Java Advanced Imaging]
	    <p>Représentent les extensions Java pour les graphiques 3D et le traitement d'images, qui peuvent être téléchargées et installées à partir du site d'Apple. Voir cette <a href="http://docs.info.apple.com/article.html?artnum=120289">page web d'Apple</a> pour de plus amples informations.</p>
	  </li>
	  <li>system-xfree86 : [paquet fantôme pour un paquet x11 installé manuellement]</li>
	  <li>system-xfree86-shlibs : [paquet fantôme pour les librairies partagées x11 installées manuellement]
	    <p>Représentent X11/XDarwin d'Apple, partie optionnelle de OS X (X11User.pkg). Ces paquets fournissent respectivement <code>x11</code> et <code>x11-shlibs</code>. Voir aussi <a href="comp-packages.php?phpLang=fr#cant-install-xfree">cette QFP</a>.</p>
	  </li>
	  <li>system-xfree86-dev : [paquet fantôme pour les outils de développement x11 installés manuellement]
	    <p>Représente X11/XDarwin SDK d'Apple, partie optionnelle de OS X (X11SDK.pkg). Ce paquet fournit <code>x11-dev</code>. Voir aussi <a href="comp-packages.php?phpLang=fr#cant-install-xfree">cette QFP</a>.
	    </p>
	  </li>
	</ul></div>
    </a>

  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-packages.php?phpLang=fr">9. Problèmes d'utilisation spécifiques à certains paquets</a></p>
<? include_once "../footer.inc"; ?>


