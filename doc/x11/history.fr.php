<?
$title = "Utilisation de X11 - Historique";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/04/05 19:41:12';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="inst-xfree86.php?phpLang=fr" title="Getting and Installing XFree86"><link rel="prev" href="intro.php?phpLang=fr" title="Introduction">';

include_once "header.inc";
?>

<h1>Utilisation de X11 - 2 Historique</h1>
    
    
    
      <p>[Désolée pour le langage épique, c'était trop tentant...]</p>
    
    <h2><a name="early">2.1 Genèse</a></h2>
      
      <p>
Au commencement était le néant.
Darwin balbutiait à peine, Mac OS X en était encore au stade embryonnaire et il n'existait aucune implémentation de X11 pour l'un et l'autre.
</p>
      <p>
Il y eut John Carmack qui porta XFree86 sur Mac OS X Server, le seul système opératoire disponible en ce temps-là dans la famille Darwin.
Puis vint Dave Zarzycki qui modifia ce port pour XFree86 4.0 et Darwin 1.0.
Les rustines trouvèrent un nid douillet dans le référentiel CVS de Darwin et s'y reposèrent en attendant les évènements.
</p>
    
    <h2><a name="xonx-forms">2.2 Création de XonX</a></h2>
      
      <p>
Un beau jour apparut Torrey T. Lyons et il donna aux rustines Darwin tous les soins qu'elles réclamaient.
Enfin, il les plaça dans un nouveau foyer, le référentiel CVS officiel de XFree86.
Ce fut l'ère de Mac OS X Public Beta et de Darwin 1.2.
XFree86 4.0.2 tournait bien sur Darwin, mais les utilisateurs de Mac OS X devait se déconnecter d'Aqua et ouvrir la console pour le faire tourner.
Alors Torrey prit avec lui l'<a href="http://mrcla.com/XonX/">équipe XonX</a> et commença un long voyage vers le port de XFree86 sur Mac OS X.
</p>
      <p>
À peu près à la même époque, Tenon commença à construire XTools, en se fondant sur XFree86 4.0.
</p>
    
    <h2><a name="root-or-not">2.3 To root or not to root</a></h2>
      
      <p>
Soon the XonX team had XFree86 running in a fullscreen mode in
parallel to Quartz and was putting out test releases for adventurous
users.
The test releases were called XFree86-Aqua, or XAqua for short.
Since Torrey had taken the lead, changes went directly to
XFree86's CVS repository, which was heading towards the 4.1.0
release.
</p>
      <p>
In the first stages interfacing with Quartz was done via a small
application called Xmaster.app (written with Carbon, then rewritten
with Cocoa).
Later that code was integrated into the X server proper, giving birth
to XDarwin.app.
Shared library support was also added at this time (and Tenon was
convinced to use this set of patches instead of their own to ensure
binary compatibility).
There was even good progress on a rootless mode (using the Carbon
API), but alas, it was too late to get it into XFree86 4.1.0.
And the rootless patch was free, and continued to float around the
net.
After XFree86 4.1.0 shipped with just the fullscreen mode, work on the
rootless mode continued, now using the Cocoa API.
An experimental rootless mode was put into XFree86's CVS repository.
</p>
      <p>
In the meantime, Apple released Mac OS X 10.0 and Darwin 1.3,
and Tenon released Xtools 1.0 some weeks after that.
</p>
      <p>Development continued on integrating the rootless mode into XFree86,
so that by the time XFree86 4.2.0 shipped in January 2002, the Darwin/Mac OS X 
version had been completely integrated into the main XFree86 distribution.
</p>
    
  <p align="right">
Next: <a href="inst-xfree86.php?phpLang=fr">3 Getting and Installing XFree86</a></p>

<? include_once "footer.inc"; ?>
