<?
$title = "Q.F.P.";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/03/21 07:45:29';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="general.php?phpLang=fr" title="Questions générales">';

include_once "header.inc";
?>

<h1>Fink - Q.F.P.</h1>
<p><b>En cours de traduction</b></p>
<p>Voici la liste des questions fréquemment posées sur Fink. Comme la plupart des QFP, une partie correspond à des questions réelles, d'autres ont été élaborées spécialement pour ces QFP. Il s'agit en fait d'un document écrit dans le style question-réponse.</p>
<p>Ces QFP comprennent plusieurs pages, une par chapitre. Le sommaire ci-dessous donne la liste de toutes les questions ainsi qu'un lien pour chacune d'elles.</p>
<h2>Contents</h2><ul>
	<li><a href="general.php?phpLang=fr"><b>1 Questions générales</b></a><ul><li><a href="general.php?phpLang=fr#what">1.1 Qu'est-ce que Fink ?</a></li><li><a href="general.php?phpLang=fr#naming">1.2 Que signifie Fink ?</a></li><li><a href="general.php?phpLang=fr#bsd-ports">1.3 En quoi Fink se différencie-t-il du mécanisme de portage BSD (qui comprend OpenPackages et GNU-Darwin) ?</a></li><li><a href="general.php?phpLang=fr#usr-local">1.4 Pourquoi Fink n'installe rien dans /usr/local ?</a></li><li><a href="general.php?phpLang=fr#why-sw">1.5 Pourquoi avoir choisi /sw ?</a></li></ul></li><li><a href="relations.php?phpLang=fr"><b>2 Relations avec d'autres projets</b></a><ul><li><a href="relations.php?phpLang=fr#upstream">2.1 Envoyez-vous aux mainteneurs situés en amont de vous les rustines que vous faites ?</a></li><li><a href="relations.php?phpLang=fr#debian">2.2 Quelles sont vos relations avec le projet Debian ? Portez-vous Debian Linux sur Mac OS X ?</a></li><li><a href="relations.php?phpLang=fr#apple">2.3 Quelles sont vos relations avec Apple ?</a></li><li><a href="relations.php?phpLang=fr#openosx">2.4 Quelles sont vos relations avec OpenOSX.com ?</a></li><li><a href="relations.php?phpLang=fr#forked">2.5 Quelles sont vos relations avec macosx.forked.net ?</a></li><li><a href="relations.php?phpLang=fr#darwinports">2.6 Quelles sont vos relations avec Darwinports ?</a></li></ul></li><li><a href="mirrors.php?phpLang=fr"><b>3 Miroirs de Fink</b></a><ul><li><a href="mirrors.php?phpLang=fr#when-use">3.1 Qu'est-ce qu'un miroir Fink ?</a></li><li><a href="mirrors.php?phpLang=fr#why">3.2 Pourquoi utiliser des miroirs rsync ?</a></li><li><a href="mirrors.php?phpLang=fr#where">3.3 Où trouver de plus amples informations sur les miroirs Fink ?</a></li><li><a href="mirrors.php?phpLang=fr#when-not">3.4 Impossible de se connecter au serveur rsync. Que faire ?</a></li><li><a href="mirrors.php?phpLang=fr#otherinfogone">3.5 Après passage à la méthode rsync, tous les fichiers info des arborescences inutilisées ont disparu.</a></li><li><a href="mirrors.php?phpLang=fr#howswitch">3.6 Comment passer d'une méthode à une autre à volonté ?</a></li><li><a href="mirrors.php?phpLang=fr#status">3.7 Comment connaître l'état actuel des miroirs rsync ?</a></li><li><a href="mirrors.php?phpLang=fr#Master">3.8 Qu'est-ce qu'un miroir Distfiles ?</a></li></ul></li><li><a href="upgrade-fink.php?phpLang=fr"><b>4 Mise à jour de Fink (Résolution de problèmes spécifiques à une version donnée)</b></a><ul><li><a href="upgrade-fink.php?phpLang=fr#gcc-0.16.0">4.1 Je viens de passer à la version 0.16.0 et fink me dit que ma version du compilateur gcc 3.3 est obsolète. Que faire ?</a></li></ul></li><li><a href="usage-fink.php?phpLang=fr"><b>5 Installing, Using and Maintaining Fink</b></a><ul><li><a href="usage-fink.php?phpLang=fr#what-packages">5.1 How can I find out what packages Fink supports?</a></li><li><a href="usage-fink.php?phpLang=fr#proxy">5.2 I'm behind a firewall. How do I configure Fink to use an HTTP
        proxy?</a></li><li><a href="usage-fink.php?phpLang=fr#firewalled-cvs">5.3 How do I update available packages from CVS when I am behind a
        firewall?</a></li><li><a href="usage-fink.php?phpLang=fr#moving">5.4 Can I move Fink to another location after installation?</a></li><li><a href="usage-fink.php?phpLang=fr#moving-symlink">5.5 If I move Fink after installation and provide a symlink from the
        old location, will it work?</a></li><li><a href="usage-fink.php?phpLang=fr#removing">5.6 How can I uninstall all of Fink?</a></li><li><a href="usage-fink.php?phpLang=fr#bindist">5.7 The package database at the website lists package xxx, but apt-get
        and dselect know nothing about it. Who's lying?</a></li><li><a href="usage-fink.php?phpLang=fr#unstable">5.8 There's this package in unstable that I want to install, but the
        fink command just says 'no package found'. How can I install it?</a></li><li><a href="usage-fink.php?phpLang=fr#sudo">5.9 I'm tired of typing my password into sudo again and again. Is there
        a way around this?</a></li><li><a href="usage-fink.php?phpLang=fr#exec-init-csh">5.10 When I try to run init.csh or init.sh, I get a "Permission denied"
        error. What am I doing wrong?</a></li><li><a href="usage-fink.php?phpLang=fr#dselect-access">5.11 Help! I used the "[A]ccess" menu entry in dselect and now I can't
        download packages any more!</a></li><li><a href="usage-fink.php?phpLang=fr#cvs-busy">5.12 When I try to run <q>fink selfupdate</q> or "fink
        selfupdate-cvs", I get the error "<code>Updating using CVS failed.
        Check the error messages above.</code>"</a></li><li><a href="usage-fink.php?phpLang=fr#kernel-panics">5.13 When I use Fink, my whole machine freezes up/kernel panics/dies.
        Help!</a></li><li><a href="usage-fink.php?phpLang=fr#not-found">5.14 I'm trying to install a package, but Fink can't download it. The
        download site shows a later version number of the package than what
        Fink has. What do I do?</a></li><li><a href="usage-fink.php?phpLang=fr#fink-not-found">5.15 I get "command not found" errors when I run Fink or anything that I
        installed with Fink.</a></li><li><a href="usage-fink.php?phpLang=fr#invisible-sw">5.16 I want to hide /sw in the Finder to keep users from damaging the
        Fink setup.</a></li><li><a href="usage-fink.php?phpLang=fr#install-info-bad">5.17 I can't install anything, because I get the following error:
        "install-info: unrecognized option `--infodir=/sw/share/info'"</a></li><li><a href="usage-fink.php?phpLang=fr#bad-list-file">5.18 I can't install or remove anything, because of a problem with a
        "files list file".</a></li><li><a href="usage-fink.php?phpLang=fr#error-nineteen">5.19 When I use the Fink binary installer package, I get a big "19" in
        the window and can't install anything.</a></li><li><a href="usage-fink.php?phpLang=fr#dselect-garbage">5.20 I get a bunch of garbage when I select packages in
        <code>dselect</code>. How can I use it?</a></li><li><a href="usage-fink.php?phpLang=fr#perl-undefined-symbol">5.21 Why do I get a bunch of "dyld: perl undefined symbols" errors when
        I run Fink commands?</a></li><li><a href="usage-fink.php?phpLang=fr#cant-upgrade">5.22 I can't seem to update Fink's version.</a></li><li><a href="usage-fink.php?phpLang=fr#spaces-in-directory">5.23 Can I put Fink in a volume or directory with a space in its
        name?</a></li><li><a href="usage-fink.php?phpLang=fr#packages-gz">5.24 When I try to do a binary update, there are many messages with
        "File not found"</a></li><li><a href="usage-fink.php?phpLang=fr#wrong-tree">5.25 I've changed my OS | Developer Tools, but Fink doesn't recognize
        the change.</a></li><li><a href="usage-fink.php?phpLang=fr#seg-fault">5.26 I get errors with <code>gzip</code> | <code>dpkg-deb</code>I
        applications from the<code> fileutils </code>package! Help!</a></li><li><a href="usage-fink.php?phpLang=fr#pathsetup-keeps-running">5.27 When I open a Terminal window, I get a message that "Your
        environment seems to be correctly set up for Fink already.", and it
        logs out.</a></li></ul></li><li><a href="comp-general.php?phpLang=fr"><b>6 Compile Problems - General</b></a><ul><li><a href="comp-general.php?phpLang=fr#compiler">6.1 A configure script complains that it can't find an "acceptable cc".
        What's that?</a></li><li><a href="comp-general.php?phpLang=fr#cvs">6.2 When I try a "fink selfupdate-cvs" I get this message: "cvs:
        Command not found."</a></li><li><a href="comp-general.php?phpLang=fr#missing-make">6.3 I'm getting an error message involving <code>make</code></a></li><li><a href="comp-general.php?phpLang=fr#head">6.4 I'm getting a strange usage message from the head command. What's
        broken?</a></li><li><a href="comp-general.php?phpLang=fr#also_in">6.5 When I try to install a package I get an error message about trying
        to overwrite a file that is in another package.</a></li><li><a href="comp-general.php?phpLang=fr#weak_lib">6.6 After I installed the December 2002 Development Tools I get
        messages about "weak libraries".</a></li><li><a href="comp-general.php?phpLang=fr#mv-failed">6.7 What does "execution of mv failed, exit code 1" mean when I try to
        build a package?</a></li><li><a href="comp-general.php?phpLang=fr#node-exists">6.8 I can't install a package | update because I get a message that a
        "node" already exists.</a></li><li><a href="comp-general.php?phpLang=fr#usr-local-libs">6.9 I've heard that libraries installed in /usr/local/lib sometimes
        cause build problems for Fink. Is this true?</a></li><li><a href="comp-general.php?phpLang=fr#toc-out-of-date">6.10 When I try to build a package, I get a message that a "table of
        contents" is out of date. What do I need to do?</a></li><li><a href="comp-general.php?phpLang=fr#fc-atlas">6.11 Fink Commander hangs when I try to install atlas.</a></li><li><a href="comp-general.php?phpLang=fr#basic-headers">6.12 I get messages saying that I'm missing stddef.h. Where do I find
        it?</a></li><li><a href="comp-general.php?phpLang=fr#multiple-dependencies">6.13 I can't update, because Fink is "unable to resolve version conflict
        on multiple dependencies".</a></li><li><a href="comp-general.php?phpLang=fr#dpkg-parse-error">6.14 I can't install anything because I get "dpkg: parse error, in file
        `/sw/var/lib/dpkg/status'"!</a></li><li><a href="comp-general.php?phpLang=fr#freetype-problems">6.15 I get errors involving freetype.</a></li><li><a href="comp-general.php?phpLang=fr#dlfcn-from-oo">6.16 I get build errors involving `Dl_info'.</a></li><li><a href="comp-general.php?phpLang=fr#gcc2">6.17 Fink says I'm missing <code>gcc2</code> but I can't seem to
        install it.</a></li><li><a href="comp-general.php?phpLang=fr#system-java">6.18 Fink says <code>Failed: Can't resolve dependency "system-java14-dev"</code>, but there's no such package.</a></li></ul></li><li><a href="comp-packages.php?phpLang=fr"><b>7 Compile Problems - Specific Packages</b></a><ul><li><a href="comp-packages.php?phpLang=fr#libgtop">7.1 A package fails to build with errors involving
        <code>sed</code>.</a></li><li><a href="comp-packages.php?phpLang=fr#cant-install-xfree">7.2 I want to switch to Fink's XFree86 packages, but I can't install
        <code>xfree86-base</code> | <code>xfree86</code>, because it conflicts
        with <code>system-xfree86</code>.</a></li><li><a href="comp-packages.php?phpLang=fr#change-thread-nothread">7.3 How do I change from the non-threaded version of Fink's XFree86
        packages to the threaded version (or vice-versa)?</a></li><li><a href="comp-packages.php?phpLang=fr#cctools">7.4 "When I try to install KDE, I get the following message: 'Can't
        resolve dependency "cctools (&gt;= 446-1)"'</a></li></ul></li><li><a href="usage-general.php?phpLang=fr"><b>8 Package Usage Problems - General</b></a><ul><li><a href="usage-general.php?phpLang=fr#xlocale">8.1 I'm getting lots of messages like "locale not supported by C
        library". Is that bad?</a></li><li><a href="usage-general.php?phpLang=fr#passwd">8.2 There are suddenly a number of strange users on my system, with
        names like "mysql", "pgsql", and "games". Where did they come
        from?</a></li><li><a href="usage-general.php?phpLang=fr#compile-myself">8.3 How do I compile something myself using Fink-installed
        software?</a></li><li><a href="usage-general.php?phpLang=fr#apple-x11-applications-menu">8.4 I can't run any of my Fink-installed applications using the
        Applications menu in Apple X11.</a></li><li><a href="usage-general.php?phpLang=fr#x-options">8.5 I'm bewildered by the X11 options: Apple X11, XFree86, etc. What
        should I install?</a></li><li><a href="usage-general.php?phpLang=fr#no-display">8.6 When I try to run an application, I get a message that says "cannot
        open display:". What do I need to do?</a></li><li><a href="usage-general.php?phpLang=fr#suggest-package">8.7 I don't see my favorite program in Fink. How do I suggest a new
        package for inclusion in Fink?</a></li></ul></li><li><a href="usage-packages.php?phpLang=fr"><b>9 Package Usage Problems - Specific Packages</b></a><ul><li><a href="usage-packages.php?phpLang=fr#xmms-quiet">9.1 I get no sound from XMMS</a></li><li><a href="usage-packages.php?phpLang=fr#nedit-window-locks">9.2 If I am editing a file in nedit, when I open another file its
        window pops up but is unresponsive.</a></li><li><a href="usage-packages.php?phpLang=fr#xdarwin-start">9.3 Help! When I start XDarwin, it immediately quits!</a></li><li><a href="usage-packages.php?phpLang=fr#no-server">9.4 When I try to start XDarwin I get the message "xinit: No such file
        or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</a></li><li><a href="usage-packages.php?phpLang=fr#xterm-error">9.5 xterm fails with "dyld: xterm Undefined symbols: xterm undefined
        reference to _tgetent expected to be defined in
        /usr/lib/libSystem.B.dylib".</a></li><li><a href="usage-packages.php?phpLang=fr#libXmuu">9.6 When I try to start XFree86 I get one of the following errors:
        "dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib" or
        "dyld: xinit can't open library: /usr/X11R6/lib/libXext.6.dylib"</a></li><li><a href="usage-packages.php?phpLang=fr#apple-x-bugs">9.7 I had Fink's XFree86 installed, and I've replaced it with Apple's
        X11, and now everything's crashing!</a></li><li><a href="usage-packages.php?phpLang=fr#apple-x-delete">9.8 I want the delete key in Apple's X11.app to behave like that in
        XDarwin.</a></li><li><a href="usage-packages.php?phpLang=fr#gnome-two">9.9 I upgraded from GNOME 1.x to GNOME 2.x and now
        <code>gnome-session</code> won't open a window manager.</a></li><li><a href="usage-packages.php?phpLang=fr#apple-x11-no-windowbar">9.10 I upgraded to Apple's X11 in Panther and now my window title bars
        are missing.</a></li><li><a href="usage-packages.php?phpLang=fr#apple-x11-wants-xfree86">9.11 I installed Apple's X11 in Panther but Fink keeps asking to install
        xfree86.</a></li><li><a href="usage-packages.php?phpLang=fr#wants-xfree86-on-upgrade">9.12 I switched from the 10.2 Fink version to 10.2-gcc3.3 or 10.3, I have Apple's X11, and Fink asks me to install XFree86.</a></li></ul></li></ul><!--Generated from $Fink: faq.fr.xml,v 1.7 2004/03/21 07:45:29 michga Exp $-->

<? include_once "footer.inc"; ?>
