<?
$title = "Utilisation de X11 - Historique";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/04/13 23:47:34';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="inst-xfree86.php?phpLang=fr" title="Récupération et installation de XFree86"><link rel="prev" href="intro.php?phpLang=fr" title="Introduction">';

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
    
    <h2><a name="root-or-not">2.3 Être ou ne pas être racine</a></h2>
      
      <p>
Bientôt l'équipe XonX réussit à faire tourner XFree86 en mode plein écran parallèlement à Quartz et mit à disposition d'utilisateurs intrépides des versions de test.
Celles-ci furent appelées XFree86-Aqua, ou XAqua en raccourci.
Comme Torrey avait pris l'initiative de tout cela, les modifications allèrent directement dans le référentiel CVS de XFree86, ce qui aboutit à la version 4.1.0.
</p>
      <p>
Dans les premiers temps, l'interface avec Quartz se faisait via une petite application appelée Xmaster.app (écrite avec Carbon, puis réécrite en Cocoa).
Plus tard, ce code fut intégré dans le serveur X, donnant naissance à XDarwin.app.
La gestion des librairies partagées fut ajoutée à cette époque (et l'on réussit à convaincre Tenon d'utiliser ce jeu de rustines au lieu du leur, afin de garantir la compatibilité binaire).
Il y eut même une certaine avancée sur un mode sans racine (avec l'API Carbon), mais hélas, il était trop tard pour l'intégrer dans XFree86 4.10.
Et la rustine sans racine vogua, sans attaches, sur le réseau.
Après la mise à disposition de XFree86 4.10 en mode en plein écran, les travaux sur le mode sans racine continuèrent, en utilisant l'API Cocoa cette fois-ci.
Un mode sans racine expérimental fut mis dans le référentiel CVS de XFree86.
 </p>
      <p>
Pendant ce temps, Apple sortait Mac OS X 10.0 et Darwin 1.3 ; quelques semaines plus tard, Tenon sortait Xtools 1.0.
</p>
      <p>Les travaux d'intégration du mode sans racine dans XFree86 continuèrent, si bien que, lorsque XFree86 4.2.0 sortit en janvier 2002, la version Darwin/Mac OS X avait été complètement intégrée dans la distribution principale de XFree86.
</p>
    
  <p align="right">
Next: <a href="inst-xfree86.php?phpLang=fr">3 Récupération et installation de XFree86</a></p>

<? include_once "footer.inc"; ?>
