<?
$title = "Utilisation de X11 - Intro";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/04/04 02:30:21';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="history.php?phpLang=fr" title="History"><link rel="prev" href="index.php?phpLang=fr" title="Utilisation de X11 Contents">';

include_once "header.inc";
?>

<h1>Utilisation de X11 - 1 Introduction</h1>
    
    
    <h2><a name="def-x11">1.1 Qu'est-ce que X11 ?</a></h2>
      
      <p>
Le <a href="http://www.x.org/">système X Window</a> Version 11,
ou X11 en raccourci, est un système d'affichage graphique avec une architecture client-serveur transparente au réseau.
Il permet aux applications de tracer sur l'écran des pixels, des lignes, du texte, des images, etc... X11 comprend aussi des librairies supplémentaires qui permettent aux applications de tracer des éléments d'interfaces utilisateur, c'est-à-dire des boutons, des champs texte, etc...
</p>
      <p>
X11 est, de facto, le système graphique standard du monde Unix.
Il est livré avec Linux, les variantes *BSD et la plupart des variantes Unix commerciales.
Les environnements de bureaux, tels CDE, KDE et GNOME, s'exécutent sous X11.
</p>
    
    <h2><a name="def-macosx">1.2 Qu'est-ce que Mac OS X ?</a></h2>
      
      <p>
        <a href="http://www.apple.com/macosx/">Mac OS X</a> est un système opératoire conçu par <a href="http://www.apple.com/">Apple Computer</a>.
Comme ses prédécesseurs NeXTStep et OpenStep, il est basé sur BSD et fait donc partie de la famille des systèmes opératoires Unix.
Néanmoins, il possède un système d'affichage graphique propriétaire.
Le moteur graphique est appelé Quartz et l'interface Aqua, bien que les deux noms soient souvent utilisés de manière interchangeable.
</p>
    
    <h2><a name="def-darwin">1.3 Qu'est-ce que Darwin ?</a></h2>
      
      <p>
        <a href="http://OpenDarwin.org/">Darwin</a> est, à la base, une version réduite de Mac OS X, disponible gratuitement avec son code source.
Il ne contient ni Quartz, ni Aqua, ni aucune des technologies qui leur sont rattachées.
Par défaut, il ne fournit qu'une console texte.
</p>
    
    <h2><a name="def-xfree86">1.4 Qu'est-ce que XFree86 ?</a></h2>
      
      <p>
        <a href="http://www.xfree86.org/">XFree86</a> est une implémentation open source de X11.
Au départ, elle a été développée pour tourner sous PC Intel x86, d'où son nom.
De nos jours, elle tourne sur de nombreuses architectures et systèmes opératoires, entre autres OS/2, Darwin, Mac OS X et Windows.
</p>
    
    <h2><a name="def-xtools">1.5 Qu'est-ce que Xtools ?</a></h2>
      
      <p>
Xtools est un produit de  <a href="http://www.tenon.com/">Tenon Intersystems</a>.
Basée sur XFree86, c'est une version de X11 pour Mac OS X.
</p>
    
    <h2><a name="client-server">1.6 Client et Serveur</a></h2>
      
      <p>
X11 possède une architecture client-serveur.
Un programme central réalise la partie graphique et coordonne l'accès des différentes applications, c'est le serveur.
Une application qui veut exécuter une fonction graphique sous X11 se connecte au serveur et lui indique ce qu'il faut dessiner.
Ces applications sont appelées clients dans le monde X11.
</p>
      <p>
Sous X11, le serveur et les clients peuvent être situés sur des machines différentes, ce qui conduit parfois à une confusion de terminologie.
Dans un environnement constitué de stations de travail et de serveurs, on exécute le serveur d'affichage X11 sur la station de travail et les applications (les clients X) sur la machine serveur.
Ainsi, lorsque l'on parle de "serveur", on entend par là le serveur d'affichage X11, et non pas la machine caché dans un placard.
</p>
    
    <h2><a name="rootless">1.7 What does rootless mean?</a></h2>
      
      <p>
A little background:
X11 models the screen as a hierarchy of windows contained in each
other.
At the top of the hierarchy is a special window which is the size of
the screen and contains all other windows.
This window contains the desktop background and is called the "root
window".
</p>
      <p>
Now back on topic:
Like any graphical environment, X11 was written to stand alone and
have full control over the screen.
In Mac OS X, Quartz already governs the screen, so one must make
arrangements if both are to get along together.
</p>
      <p>
One arrangement is to let the two take turns.
Each environment gets a complete screen, but only one of them is
visible at a time and the user can switch between them.
This is called full-screen or rooted mode.
It is called rooted because there is a perfectly normal root window on
the X11 screen that works like on other systems.
</p>
      <p>
Another arrangement is to mix the two environments window by window.
This eliminates the need to switch between two screens.
It also eliminates the X11 root window, because Quartz already takes
care of the desktop background.
Because there is no (visible) root window, this mode is called
"rootless".  It is the most comfortable way to use X11 on Mac OS X.
</p>
    
    <h2><a name="wm">1.8 What is a window manager?</a></h2>
      
      <p>
In most graphical environments the look of window frames (title bar,
close button, etc.) is defined by the system.
X11 is different.
With X11, the window frames (also called "decoration") are provided by
a separate program, called the window manager.
In most respects, the window manager is just another client
application; it is started the same way and talks to the X server
through the same channels.
</p>
      <p>
There is a large number of different window managers to choose from.
<a href="http://www.xwinman.org/">xwinman.org</a> has a
comprehensive list.
Most popular ones allow the user to customize the appearance via
so-called <a href="http://www.themes.org/">themes</a>.
Many window managers also provide additional functionality, like pop
up menus in the root window, docks or launch buttons.
</p>
      <p>
Many window managers have been packaged for Fink; here is a
<a href="http://fink.sourceforge.net/pdb/section.php/x11-wm/">    
current list.
</a>
      </p>
    
    <h2><a name="desktop">1.9 What are Quartz/Aqua, Gnome, and KDE?</a></h2>
      
      <p>
They are desktop environments, and there are many others.  Their purpose 
is to provide additional framework to applications, so that their look, 
feel, and behaviour can be visually consistent.  Example: 
</p>
      <p> graphics engine : X11
</p>
      <p> window manager:
<a href="http://sawmill.sourceforge.net/">sawfish</a>
      </p>
      <p> desktop: <a href="http://www.gnome.org/">Gnome</a>
      </p>
      <p>
The lines between graphics display engine, window manager,
and desktop are blurred because similar, or the same functionality, 
may be implemented by one or more of them. This is one reason why a
particular window manager may not be able to be used with a
particular desktop environment.

</p>
      <p>
Many applications are developed to integrate with a particular desktop.  
Most often by installing the libraries for the desktop environment 
(and the other underlying libraries) that an application was developed 
for, the application will work with limited or no function loss.  
Examples are the increasing 
<a href="http://fink.sourceforge.net/pdb/section.php/gnome">
selection of GNOME applications 
</a>
available to be installed and run without running GNOME.  
Unfortunately, the same 
<a href="http://fink.sourceforge.net/faq/usage-fink.php#kde">
progress is not quite yet able to be made
</a>
with <a href="http://www.kde.org/">KDE applications.</a>
      </p>
    
  <p align="right">
Next: <a href="history.php?phpLang=fr">2 History</a></p>

<? include_once "footer.inc"; ?>
