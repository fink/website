<?
$title = "Ejecutando X11 - Otro material";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/10/25 10:15:38';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Ejecutando X11 Contents"><link rel="next" href="trouble.php?phpLang=es" title="Resolviendo problemas con XFree86"><link rel="prev" href="xtools.php?phpLang=es" title="Xtools">';


include_once "header.es.inc";
?>
<h1>Ejecutando X11 - 6. Otras posibilidades X11</h1>
    
    
    <h2><a name="vnc">6.1 VNC</a></h2>
      
      <p>
VNC es un sistema de visualización de gráficos con capacidades de red
similar en diseño a X11.
Sin embargo trabaja en un nivel más bajo, lo que hace su implementación más fácil.
Con el servidor Xvnc y un cliente Mac OS X es posible ejecutar 
aplicacione X11 con Mac OS X.
La página <a href="http://www.cdc.noaa.gov/~jsw/macosx_xvnc/">página 
Xvnc</a> de Jeff Whitaker proporciona más información.
</p>
    
    <h2><a name="wiredx">6.2 WiredX</a></h2>
      
      <p>
        <a href="http://www.jcraft.com/wiredx/">WiredX</a> es un
servidor X11 escrito en X11.
También soporta modo rootless.
En el sitio web se puede obtener un paquete instalador Installer.app.
</p>
    
    <h2><a name="exodus">6.3 eXodus</a></h2>
      
      <p>
De acuerdo con su sitio web, 
<a href="http://www.powerlan-usa.com/exodus/">eXodus 8</a> 
de Powerlan USA se ejecuta en modo nativo en Mac OS X.
Se desconoce que código usa y cómo soporta los clientes locales.
Debido a ésto no hay soporte especial para eXodus en Fink.
Si tienes más información, por favor acércanosla.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="trouble.php?phpLang=es">7. Resolviendo problemas con XFree86</a></p>
<? include_once "../../footer.inc"; ?>


