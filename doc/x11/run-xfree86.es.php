<?
$title = "Ejecutando X11 - Arrancando XFree86";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/10/25 10:15:38';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Ejecutando X11 Contents"><link rel="next" href="xtools.php?phpLang=es" title="Xtools"><link rel="prev" href="inst-xfree86.php?phpLang=es" title="Obteniendo e instalando XFree86">';


include_once "header.es.inc";
?>
<h1>Ejecutando X11 - 4. Arrancando XFree86</h1>
    
    
    <h2><a name="darwin">4.1 Darwin</a></h2>
      
      <p>
En Darwin puro, XFree86 se comporta como en cualquier otro Unix.
La forma normal de arrancar es via <code>startx</code> desde la consola;
que arranca el servidor y algunos clientes iniciales, tales como
el gestor de ventanas y un emulador de terminal con una shell.
En Darwin puro no es necesario especificar parámetros, así que basta 
con teclear:
</p>
      <pre>startx</pre>
      <p>
Se puede personalizar qué es lo que se arranca a través de varios ficheros
en tu directorio raíz.
<code>.xinitrc</code> controla qué clientes se arrancan.
<code>.xserverrc</code> controla opciones de servidor, incluso 
arrancar otro servidor.
Si hay problemas (normalemnte, el problema es obtener una pantalla vacía o
que XFree86 te mande de vuelta a la consola), puedes arrancar sin problemas
moviendo estos ficheros fuera de su localización.
Si <code>startx</code> no encuentra los ficheros, usará modo seguro de arranque, el cual debería  funcionar siempre.
</p>
      <p>
Alternativamente, puedes arrancar el servidor directamente mediante alguna
de las opciones XDMCP, como ésta:
</p>
      <pre>X -query remotehost</pre>
      <p>
Los detalles pueden obtenerse del manual de <code>Xserver</code>.
</p>
      <p>
Finalmente, está la opción  <code>xdm</code>; lee su manual 
para los detalles.
</p>
      <p>
Nota: Si estás ejecutando  Mac OS X anterior a Panther, puedes teclear <code>&gt;console</code>
en la ventana de inicio y obrtendrás una consola de texto equivalente
a Darwin puro. Si no ves un campo donde entrar un nombre de usuario
en la ventana de inicio, teclea la primera letra de cualquier nombre de usuario, y a continuación opción-enter.
Puedes usar entonces todos los métodos descritos anteriormente, 
con la excepción de <code>xdm</code>.
</p>
      <p>
Nota: En Mac OS X Panther, no se puede arrancar XFree86 desde la consola 
de inicio.
</p>
    
    <h2><a name="macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></h2>
      
      <p>
Hay básicamente dos formas de arrancar XFree86 bajo Mac OS X.
Una es hacer doble clic en la el icono de la aplicación XDarwin.app, situada
en la carpeta Aplicaciones, o en el icono de un alias de esta aplicación 
(en el dock, p.e.).  Esto te permitirá escoger entre modo de pantalla 
completa o modo rootless en un diálogo al arrancar. Puedes deshabilitar este diálogo y poner XDarwin permanentemente en le modo de funcionamiento que prefieras en el menú de Preferencias.  
</p>
      <p>
Antes de 4.2.0 arrancará en modo pantalla completa automáticamente y no hay ninguna forma de obtener el modo rootless mediante doble clic en la aplicación.the
</p>
      <p>
La otra forma de arrancar XFree86 bajo Mac OS X es mediante el comando <code>startx</code> desde Terminal.app.
Si arrancas el servidor de esta forma, puedes decirle que 
se ejecute en paralelo con Quartz.
Esto se hace pasándole la opción <code>-fullscreen</code> así:
</p>
      <pre>startx -- -fullscreen</pre>
      <p>
Eso arrancará el servidor en modo pantalla completa mas los 
clientes en tu <code>.xinitrc</code>.  
</p>
      <p>
NOTE: antes de 4.2, <code>-quartz</code> era usado para el modo 
de pantalla completa.
</p>
      <p>
Si tienes un servidor que soporta el modo rootless, puedes arrancar en ese 
modo con la opción <code>-rootless</code>:</p>
      <pre>startx -- -rootless</pre>
      <p>
La opción <code>-quartz</code> ya no selecciona el modo de pantalla completa,
sino que usa el modo por defecto en las preferencias.
</p>
      <p>A partir de la versión 4.3, si usas <code>startx</code> sin argumentos, obtendrás el cuadro de diálogo de inicio.</p>
    
    <h2><a name="xinitrc">4.3 El fichero .xinitrc</a></h2>
      
      <p>
Para arrancar algunos clientes X con el servidor X, se usa un fichero 
de nombre  <code>.xinitrc</code> en el directorio 
raíz. Puede usarse, p.e., para arrancar el gestor de ventanas y algunos
terminales X o un entorno de escritorio GNOME.
El fichero <code>.xinitrc</code> es un script de shell que contiene los comandos necesarios para ello. <b>No</b>hyace falta poner el conocido 
<code>#!/bin/sh</code>
en la primera línea ni poner el bit de ejecutable en los permisos;
xinit sabe como ejecutar este fichero en una shell.
</p>
      <p>
Si no hay fichero <code>.xinitrc</code> en tu directorio 
raíz, XFree86 usará el fichero por defecto:
<code>/private/etc/X11/xinit/xinitrc</code>.
Es posible utilizar este como punto de partida para empezar a 
editar tu propio .xinitrc:
</p>
      <pre>cp /private/etc/X11/xinit/xinitrc ~/.xinitrc</pre>
      <p>
Si estás usando Fink, debes poner  source <code>init.sh</code> justo 
al principio para garantizar una definición correcta de tu entorno.
</p>
      <p>
Puedes poner cualquier tipo de comandos en un fichero 
<code>.xinitrc</code>,
pero hay que tener cuidado con algunos puntos.
Primero, el shell que interpreta el fichero esperarará por defecto
que cada programa finalice antes de empezar el siguiente. Eso significa que 
si esperas que varios programas funcionen en paralelo, hay que avisárselo al
shelll poniendolos "en último plano" ("background") añadiendo un 
<code>&amp;</code> al final de la línea.
</p>
      <p>
En segundo lugar, <code>xinit</code> espera que el script 
<code>.xinitrc</code> termine e interpreta el final como 
"la sesión ha terminado, ahora debo matar 
al servidor X  también".
Esto significa que el último comando usado en en tu fichero  <code>.xinitrc</code>
no puede ser ejecutado en último plano y debe ser un programa de larga vida.
Por eso suele usarse el gestor de ventanas para este propósito.
De hecho, muchos gestores de ventanas asumen que <code>xinit</code> les 
espera para terminar y usan eso para hacer funcionar el item de menú "Fin de sesión" ("Log out").
(Nota: Para ahorrar algo de memoria y ciclos de CPU, puedes 
pone <code>exec</code> al principio de la última línea, como en el ejemplo
que sigue)
</p>
      <p>
Un simple ejemplo que arranca GNOME:
</p>
      <pre>. /sw/bin/init.sh
exec gnome-session</pre>
      <p>Un ejemplo más complejo para usuarios de bash que apaga las alertas 
de X11, arranca algunos clientes y finalmente ejecuta el gestor de 
ventanas 
Enlightenment:</p>
      <pre>. /sw/bin/init.sh

xset b off

xclock -geometry -0+0 &amp;
xterm &amp;
xterm &amp;

exec enlightenment</pre>
      <p>Para arrancar GNOME 2.2 bajo X11 de Apple, usa la siguiente secuencia:
</p>
      <pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
metacity &amp;
exec gnome-session
</pre>
      <p>Para GNOME 2.4 bajo X11 de Apple, metacity arranca automáticamente y 
por lo tanto la secuencia se reduce a:</p>
      <pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
exec gnome-session
</pre>
      <p>Para arrancar KDE 3.2 (version &lt; 3.2.2-21) bajo X11 de Apple:</p>
      <pre>. /sw/bin/init.sh
export KDEWM=kwin
quartz-wm --only-proxy &amp;
/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1
</pre>
      <p>Y finalmente, para arrancar la última versión inestable de KDE 
bajo X11 de Apple:</p>
      <pre>. /sw/bin/init.sh
/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1
</pre>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="xtools.php?phpLang=es">5. Xtools</a></p>
<? include_once "../../footer.inc"; ?>


