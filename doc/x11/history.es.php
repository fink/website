<?
$title = "Ejecutando X11 - Historia";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/10/25 10:15:38';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Ejecutando X11 Contents"><link rel="next" href="inst-xfree86.php?phpLang=es" title="Obteniendo e instalando XFree86"><link rel="prev" href="intro.php?phpLang=es" title="Introduction">';


include_once "header.es.inc";
?>
<h1>Ejecutando X11 - 2. Historia</h1>
    
    
    
      <p>[Disculpas por el lenguaje épico. No pude resistirme...]</p>
    
    <h2><a name="early">2.1 Los primeros días de la creación</a></h2>
      
      <p>
En el principio, era el vacío.
Darwin vivía su infancia, Mac OS X estaba aún en desarrollo y no había 
implementaciones de X11 para ninguno de ellos.</p>
      <p>
Entonces llegó John Carmack y su puerto de XFree86 para Mac OS X Server,
el cual era el único SO de la familia Darwin disponible en esos tiempos.
Después ese puerto (port) fue actualizado para XFree86 4.0 y Darwin 1.0 por Dave
Zarzycki.
Las correcciones (patches) encontraron su vía en el repositorio CVS de Darwin y 
durmieron allí, esperando que las cosas pasaran.
</p>
    
    <h2><a name="xonx-forms">2.2 XonX forms</a></h2>
      
      <p>
Un buen día  Torrey T. Lyons llegó y le dio a las correcciones las atenciones que 
estaban esperando. Finalmente, él les dio un nuevo hogar, el repositorio CVS 
oficial de XFree86.
Esto ocurrió durante los tiempos de la Beta Pública de Mac OS X y de Darwin 1.2.
XFree86 4.0.2 trabajaba bien con Darwin, pero sobre Mac OS X los usuarios debían 
abandonar  Aqua y marchar sobre la consolar para ejecutarlo.
Entonces Torrey montó a su alrededor el <a href="http://mrcla.com/XonX/">equipo 
XonX</a> y se dispuso a llevar XFree86 a Mac OS X.
</p>
      <p>
En esos tiempos Tenon empezó a construir Xtools, usando XFree86
4.0 como base.
</p>
    
    <h2><a name="root-or-not">2.3 To root or not to root</a></h2>
      
      <p>
Pronto el equipo XonX tuvo XFree86 ejecutándose en modo pantalla completa en paralelo a  Quartz y puso las implementaciones de prueba a disposición de los usuarios más avezados.
Estas implementaciones (test releases) sedenominaban  XFree86-Aqua o XAqua para 
abreviar. Desde que Torrey había tomado el liderato, los cambios iban 
directamente al repositorio CVS de XFree86's, que se encaminaba directamente 
a la versión 4.1.0.
</p>
      <p>
En estos primeros etapas la interconexión con Aqua se efectuaba a través de una 
pequeña aplicación denominada Xmaster.app (escrita en Carbon y 
luego reescrita en  Cocoa).
Después, el código de Xmaster se integró en el servidor X propiamente dicho, 
dando lugar al nacimiento de XDarwin.app.
También se añadieron en ese momento las bibliotecas compartidas (y Tenon fue 
convencido para que usara el conjunto de correcciones oficila en lugar de los 
suyos propios para así asegurar la compatibilidad binaria).
Había incluso buenos progresos en el modo rootless (usando la API Carbon), pero 
era demasiado tarde para incluirlo en XFree86 4.1.0.
Y las correciones del modo  rootless se hicieron libres, y flotaron alrededor de 
la red.
Después XFree86 4.1.0 salió sólo con el modo de pantalla completa, 
el trabajo en el modo rootless continuó, ahora usando la API Cocoa.
Un modo rootless experimental fue incluido en el repositorio CVS de XFree86.
</p>
      <p>
Mientras tanto, Apple produjo Mac OS X 10.0 y Darwin 1.3. Tenon produjo 
Xtools 1.0 algunos semanas más tarde.
</p>
      <p>El desarrollo continuó integrando el modo rootless en XFree86,
para que cuando XFree86 4.2.0 saliera en Enero del 2002, la versión 
Darwin/Mac OS X hubiera sido completamente integrada en la 
distribución principal de XFree86.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="inst-xfree86.php?phpLang=es">3. Obteniendo e instalando XFree86</a></p>
<? include_once "../../footer.inc"; ?>


