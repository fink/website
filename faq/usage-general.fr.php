<?
$title = "Q.F.P. - Utilisation (1)";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/05/25 21:29:34';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="usage-packages.php?phpLang=fr" title="Package Usage Problems - Specific Packages"><link rel="prev" href="comp-packages.php?phpLang=fr" title="Problèmes de compilation de certains paquets">';

include_once "header.inc";
?>

<h1>Q.F.P. - 8 Problème généraux d'utilisation de paquets</h1>
    
    
    <a name="xlocale">
      <div class="question"><p><b>Q8.1: De nombreux messages similaires à "locale not supported by C
        library" apparaissent. Est-ce un problème ?</b></p></div>
      <div class="answer"><p><b>A:</b> Non, cela signifie juste que le programme va utiliser les messages, les formats de date, etc... anglais. Le programme fonctionnera normalement par ailleurs. Le document Utilisation de X11 donne de <a href="http://fink.sourceforge.net/doc/x11/trouble.php#locale">plus amples informations</a> à ce sujet.</p></div>
    </a>
    <a name="passwd">
      <div class="question"><p><b>Q8.2: Un certain nombre d'étranges utilisateurs apparaissent tout d'un coup sur mon système. Ils portent, entre autres, les noms suivants : "mysql", "pgsql", and "games". D'où proviennent-ils ?</b></p></div>
      <div class="answer"><p><b>A:</b> Vous avez utilisé Fink pour installer un paquet dépendant du paquet passwd. passwd installe un certain nombre d'utilisateurs supplémentaires pour des raisons de sécurité - sur les systèmes Unix, les fichiers et les processus appartiennent aux "possesseurs", ce qui permet aux administrateurs système de moduler les permissions et la sécurité du système. Les programmes Apache et MySQL, par exemple, doivent avoir un "possesseur", et il n'est pas raisonnable que le super-utilisateur soit le possesseur de ces démons. Imaginez ce qu'il arriverait si Apache était compromis et avait tout d'un coup permission d'écrire dans tous les fichiers du système. Donc, le paquet passwd se charge de définir ces utilisateurs supplémentaires pour les paquets Fink qui en ont besoin.</p><p>Il peut être inquiétant de découvrir soudain un certain nombre d'utilisateurs inconnus dans votre panneau de "Préférences système : Utilisateurs" (sur 10.2.x) ou "Préférences système : Comptes" (sur 10.3.x), mais réfléchissez bien avant de les supprimer :</p><ul>
          <li>Tout d'abord, vous avez manifestement choisi d'installer un paquet qui nécessite leur utilisation ; donc leur suppression n'a pas grand sens dans ce contexte.</li>
          <li>En fait, il y a déjà un certain nombre d'utilisateurs supplémentaires installés par Mac OS X, dont vous ignorez peut-être l'existence : www, daemon, nobody entre autres. La présence de ces utilisateurs supplémentaires correspond à une convention standard d'Unix nécessaire à l'utilisation de certains services ; le paquet passwd ne fait qu'en ajouter quelques autres qu'Apple ne fournit pas. Vous pouvez voir les utilisateurs installés par Apple via le Gestionnaire NetInfo ou en lançant <code>niutil -list . /users</code>
          </li>
          <li>Si vous décidez de supprimer ces utilisateurs, faites très attention à la façon dont vous procéderez. Si vous utilisez le panneau "Préférences système : Utilisateurs" (sur 10.2.x) ou "Préférences système : Comptes" (sur 10.3.x), tous les fichiers possédés par ces utilisateurs seront assignés à un utilisateur administrateur pris au hasard. Certaines personnes ont rapporté que cela pouvait causer des dégâts dans les permissions du compte administrateur. C'est un bogue des Préférences système, il a été soumis à Apple. Un moyen plus sûr de supprimer ces utilisateurs est de passer par Gestionnaire NetInfo ou d'utiliser l'outil en ligne de commande <code>niutil</code> dans une fenêtre de Terminal. Lisez la man page de <code>niutil</code> pour de plus amples informations au sujet de NetInfo.</li>
        </ul><p>Fink vous <b>demande</b> la permission d'installer ces utilisateurs supplémentaires sur votre système lors de l'installation du paquet passwd package, vous ne devriez donc pas être trop surpris de les découvrir après coup.</p></div>
    </a>
    <a name="compile-myself">
      <div class="question"><p><b>Q8.3: Comment compiler soi-même en utilisant des logiciels installés par Fink ?</b></p></div>
      <div class="answer"><p><b>A:</b> Quand on compile soi-même sans passer par Fink, il faut indiquer au compilateur et à l'éditeur de liens où trouver les librairies et les headers installés par Fink. Pour un paquet qui utilise un processus standard configure/make, vous devez définir quelques variables d'environnement :</p><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
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
      <div class="question"><p><b>Q8.4: I can't run any of my Fink-installed applications using the
        Applications menu in Apple X11.</b></p></div>
      <div class="answer"><p><b>A:</b> Apple X11 doesn't keep track of the Fink environment settings,
        which means that the Applications menu doesn't have the PATH set
        correctly to find your Fink applications. The solution is to preface
        the name of a Fink-installed application with</p><pre>source /sw/bin/init.sh ;</pre><p>For example, if you want to run a Fink-installed GIMP, then put</p><pre>source /sw/bin/init.sh ; gimp</pre><p>in the Command field of your GIMP entry.</p><p>You can also edit your .xinitrc file (in your user directory) and
        add:</p><pre>source /sw/bin/init.sh</pre><p>after the first line.</p></div>
    </a>
    <a name="x-options">
      <div class="question"><p><b>Q8.5: I'm bewildered by the X11 options: Apple X11, XFree86, etc. What
        should I install?</b></p></div>
      <div class="answer"><p><b>A:</b> All are variants on XFree86 (they're all based on the XFree86
        code), but have some slight differences between them. Apple's X11,
        which is a modification of XFree86-4.2.1, and XFree86-4.3 are faster
        than standard XFree86-4.2.1.1, but the latter is more stable. There is
        also a modification of 4.2.1.1 with threading support added, which is
        required by a few packages.</p><p>Currently, under Panther, Apple's X11 (on the third disk) is the
        only choice. Don't forget to install the X11 SDK (on the XCode disk)
        if you want to compile programs.</p><p>Under Jaguar, the most popular choices, and the Fink packages to
        make them work are:</p><ul>
          <li>
            <p>4.2.x built via Fink: install <code>xfree86-base</code> and
          <code>xfree86-rootless</code> or <code>xfree86-base-threaded</code>
          and <code>xfree86-rootless-threaded</code> (and the respective
          <code>-shlibs</code>)</p>
          </li>
          <li>
            <p>4.3.x built via Fink: install the <code>xfree86</code> and
          <code>xfree86-shlibs</code> packages</p>
          </li>
          <li>
            <p>4.2.x from Apple (User+SDK packages installed): install the
          <code>system-xfree86</code> package</p>
          </li>
        </ul><p>There are other options, as well. There is a more extensive
        treatment in the <a href="http://fink.sourceforge.net/doc/x11/index.php">Running X11
        document</a>.</p></div>
    </a>
    <a name="no-display">
      <div class="question"><p><b>Q8.6: When I try to run an application, I get a message that says "cannot
        open display:". What do I need to do?</b></p></div>
      <div class="answer"><p><b>A:</b> This error means that the system isn't connecting with your X
        display. Make sure you do the following:</p><p>1. Start X (Apple's X11, XFree86, ...).</p><p>2. Make sure your DISPLAY environment variable is set correctly. If
        you are using the default setup for X, you can do this with</p><pre>setenv DISPLAY :0</pre><p>if you are running <code>tcsh</code>, or</p><pre>export DISPLAY=:0</pre><p>if you're running <code>bash</code>.</p></div>
    </a>
    <a name="suggest-package">
      <div class="question"><p><b>Q8.7: I don't see my favorite program in Fink. How do I suggest a new
        package for inclusion in Fink?</b></p></div>
      <div class="answer"><p><b>A:</b> Make the request on the <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package
        Request Tracker</a> on the Fink project page.</p><p>Note that you must have a SourceForge id to do so.</p></div>
    </a>

    <a name="virtpackage">
      <div class="question"><p><b>Q8.8: What are all these <code>system-*</code> "virtual
	  packages" that are sometimes present, but that I can't
	  seem to install or remove myself?</b></p></div>
      <div class="answer"><p><b>A:</b> 
	  Packages with names like <code>system-perl</code> are
	  placeholder packages. These do not contain actual files, but
	  merely serve as a mechanism for fink to know about programs
	  that have been installed manually outside of fink.
	</p><p>
	  Starting with the 10.3 distribution, most placeholders
	  aren't even real packages that you can install and remove.
	  Instead, they are "Virtual Packages", package data
	  structures generated by the fink program itself in response
	  to a preconfigured list of manually installed programs. For
	  each virtual package, fink checks for certain files in
	  certain locations, and if they are found, considers that
	  virtual package "installed".
	</p><p>
	  You can run the program <code>fink-virtual-pkgs</code>
	  (part of the fink package) to get a listing of exactly what
	  fink thinks is installed. Adding the <code>--debug</code>
	  flag will give lots of diagnostic information about exactly
	  what files fink is checking.
	</p><p>
	  Unfortunately, there is no mechanism by which you can
	  install an arbitrary program yourself (outside of fink) and
	  have fink recognize that program rather than trying to
	  install its own version of it. It's just too difficult in
	  the general case to be able to check configure and compiler
	  flags, pathnames, etc.
	</p><p>
	  Here are the most important virtual packages that fink
	  defines (as of fink-0.19.2):
	</p><ul>
	  <li>system-perl: [virtual package representing perl]
	    <p>
	      Represents <code>/usr/bin/perl</code>, which is
	      part of the default OS X installation. This package also
	      provides <code>system-perlXXX</code> and
	      <code>perlXXX-core</code> according to the version X.X.X
	      of that perl interpreter.
	    </p>
	  </li>
	  <li>system-javaXXX: [virtual package representing Java X.X.X]
	    <p>
	      Represents the Java Runtime Environment, which is part of OS
	      X (and Apple's Software Update). See
	      <a href="http://www.apple.com/java">Apple's Java
	      page</a> for more information.
	    </p>
	  </li>
	  <li>system-javaXXX-dev: [virtual package representing Java X.X.X development headers]
	    <p>
	      Represents the Java SDK, which must be manually
	      downloaded from <a href="http://connect.apple.com">connect.apple.com</a>
	      (free registration required) and installed. If you have
	      updated your Java Runtime Environment, your SDK may not
	      be updated automatically (and may even be deleted!).
	      Remember to check for (and download and install if
	      necessary) the SDK after installing or upgrading your
	      Runtime Environment. See also <a href="comp-general.php?phpLang=fr#system-java">this FAQ
	      entry</a>.
	    </p>
	  </li>
	  <li>system-java3d: [virtual package representing Java3D]</li>
	  <li>system-javaai: [virtual package representing Java Advanced Imaging]
	    <p>
	      Represent Java extensions for 3D graphics and image
	      processing, which must be manually downloaded from Apple
	      and installed. See <a href="http://docs.info.apple.com/article.html?artnum=120289">Apple'
	      webpage</a> for more information.
	    </p>
	  </li>
	  <li>system-xfree86: [placeholder for user installed x11]</li>
	  <li>system-xfree86-shlibs: [placeholder for user installed x11 shared libraries]
	    <p>
	      Represent Apple's X11/XDarwin, an optional part of OS X
	      (X11User.pkg). These packages provide <code>x11</code>
	      and <code>x11-shlibs</code>, respectively. See
	      also <a href="comp-packages.php?phpLang=fr#cant-install-xfree">this FAQ entry</a>.
	    </p>
	  </li>
	  <li>system-xfree86-dev [placeholder for user installed x11 development tools]
	    <p>
	      Represents Apple's X11/XDarwin SDK, an optional part of
	      OS X (X11SDK.pkg). This package provides
	      <code>x11-dev</code>. See also <a href="comp-packages.php?phpLang=fr#cant-install-xfree">this FAQ entry</a>.
	    </p>
	  </li>
	</ul></div>
    </a>

  <p align="right">
Next: <a href="usage-packages.php?phpLang=fr">9 Package Usage Problems - Specific Packages</a></p>

<? include_once "footer.inc"; ?>
