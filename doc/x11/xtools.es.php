<?
$title = "Ejecutando X11 - Xtools";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/10/25 10:15:38';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Ejecutando X11 Contents"><link rel="next" href="other.php?phpLang=es" title="Otras posibilidades X11"><link rel="prev" href="run-xfree86.php?phpLang=es" title="Arrancando XFree86">';


include_once "header.es.inc";
?>
<h1>Ejecutando X11 - 5. Xtools</h1>
    
    
    <h2><a name="install">5.1 Instalando Xtools</a></h2>
      
      <p>
Para variar, es fácil. Obtén el instalador, haz doble clic y sigue 
las instrucciones. Asegúrate de seleccionar el volumen de arranque 
cuando te lo pregunten.
</p>
      <p>
Si estás usando Fink, debes instalar el paquete <code>system-xtools</code> 
después de instalar Xtools.
Este paquete no instala ficheros, 
sólo comprueba que las bibliotecas y otros ficheros existen y 
actua como un paquete fantasma en el sistema de  dependencias de Fink.
</p>
    
    <h2><a name="run">5.2 Ejecutando Xtools</a></h2>
      
      <p>
Para ejecutar Xtools, doble clic en Xtools.app en tu carpeta Aplicaciones. 
Como XFree86, Xtools ejecutará los clientes que especifiques en tu fichero
<code>.xinitrc</code>.
Xtools permite además arrancar clientes desde el menú.
</p>
    
    <h2><a name="opengl">5.3 Notas sobre OpenGL</a></h2>
      
      <p>
Xtools utiliza aceleración física OpenGL en modo rootless  y viene
con las bibliotecas para necesarias para proporcionar soporte.
Pero, mientras la biblioteca principal es perfecta, las bibliotecas libGLU and libglut están presentes únicamente como bibliotecas
estáticas, lo cual no es suficiente para una compatibilidad binaria 
completa con XFree86.
También hay cabeceras perdidas.
Fink no puede, en este momento, ofrecer una solución. Esperamos que 
el problema se resuelva en Xtools 1.1.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="other.php?phpLang=es">6. Otras posibilidades X11</a></p>
<? include_once "../../footer.inc"; ?>


