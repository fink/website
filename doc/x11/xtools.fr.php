<?
$title = "Utilisation de X11 - Xtools";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/05/27 14:22:42';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="next" href="other.php?phpLang=fr" title="Autres possibilités pour X11"><link rel="prev" href="run-xfree86.php?phpLang=fr" title="Lancement de XFree86">';


include_once "header.fr.inc";
?>
<h1>Utilisation de X11 - 5. Xtools</h1>
    
    
    <h2><a name="install">5.1 Installation de Xtools</a></h2>
      
      <p>
Pour une fois, c'est facile. Récupérez l'installeur, double-cliquez dessus et suivez les instructions à l'écran. Veillez à choisir le volume de démarrage lorsqu'on vous le demandera.
</p>
      <p>
Si vous utilisez Fink, vous devez installer le paquet <code>system-xtools</code> après avoir installé Xtools. Ce paquet n'installe aucun fichier, il s'assure simplement que les librairies et autres fichiers nécessaires sont présents sur votre système et tient lieu de paquet fantôme dans le système de dépendances de Fink.
</p>
    
    <h2><a name="run">5.2 Lancement de Xtools</a></h2>
      
      <p>
Pour lancer Xtools, double-cliquez sur Xtools.app dans le répertoire Applications. Tout comme XFree86, Xtools lance les clients spécifiés dans le fichier <code>.xinitrc</code>. De plus, Xtools vous permet de lancer des clients via son menu.
</p>
    
    <h2><a name="opengl">5.3 Notes sur OpenGL</a></h2>
      
      <p>
Xtools utilise l'accelération matériel OpenGL en mode sans racine et fournit les librairies pour gérer cette fonctionnalité. La librairie principale libGL est parfaite, mais les librairies libGLU et libglut n'existent que sous forme statique, ce qui n'est pas suffisant pour assurer une compatibilité binaire complète avec XFree86. Quelques headers manquent. Fink ne propose pas de solution à ce problème pour le moment. Nous espérons que le problème sera résolu dans Xtools 1.1.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="other.php?phpLang=fr">6. Autres possibilités pour X11</a></p>
<? include_once "../../footer.inc"; ?>



