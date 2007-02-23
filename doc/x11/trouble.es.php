<?
$title = "Ejecución de X11 - Resolviendo problemas";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:56';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Ejecución de X11 Contents"><link rel="next" href="tips.php?phpLang=es" title="Consejos de uso"><link rel="prev" href="other.php?phpLang=es" title="Otras posibilidades X11">';


include_once "header.es.inc";
?>
<h1>Ejecución de X11 - 7. Resolución de problemas con XFree86</h1>
    
    
    <h2><a name="immedate-quit">7.1 Cuando lanzo XDarwin, termina o se cuelga inmediatamente.</a></h2>
      
      <p>
Antes de nada: ¡No te asustes!
Hay montones de cosas que pueden no funcionar correctamente con XFree86
y un buen número de ellas pueden causar fallos de arranque.
De hecho, no es inusual que Darwin se cuelgue si se encuentra problemas
de arranque. Esta sección intenta proporcionar una lista de 
problemas posibles. Pero, lo primero es recopilar dos importantes informaciones:
</p>
      <p>
        <b>Versión de XDarwin.</b>
Puedes encontrar la versión de XDarwin version en el  Finder haciendo clic
<b>una sóla vez</b> en el icono de XDarwin y seleccionando "Mostrar Información"
desde el  menú.
La versión se incrementa sólamente cuando el proyecto XonX saca una nueva implementación  binaria de prueba. Es decir "1.0a1" puede ser cualquier 
versión entre 1.0a1 y 1.0a2.
</p>
      <p>
        <b>Mensajes de error.</b>
Son esenciales para la comprensión de los problemas a los que nos enfrentaremos. 
Cómo obtener los mensajes de error depende de la forma en que se lance XDarwin.
Si ejecutaste <code>startx</code> desde una ventana de Terminal, 
tendrás los mensajes en esa ventana. Recuerda que puedes hacer "scroll" 
hacia arriba para buscar los mensajes.
Si arrancaste XDarwin mediante doble clic en el icono, los mensajes terminarán en 
el log del sistema, al que se puede acceder a través de la aplicación Consola en
la carpeta Utilidades.
Asegúrate de coger el conjunto correcto de errores, i.e., el último.
</p>
      <p>
Comencemos con una lista de mensajes posibles:
</p>
      <pre>_XSERVTransmkdir: Owner of /tmp/.X11-unix should 
be set to root</pre>
      <pre>_IceTransmkdir: Owner of /tmp/.ICE-unix should 
be set to root</pre>
      <p>
Tipo: Inofensivo.
X11 crea directorios ocultos en /tmp para almacenar los ficheros socket 
de las conexiones locales.
Por razones de seguridad X11 prefiere que estos directorios sean propiedad
del superusuario (root), pero como son accesibles para escritura por cualquiera, X11 funcionará sin problemas.
(Nota: Es muy difícil definir al superusuario como propietario de 
estos directorios porque Mac OS X vacía /tmp en los reinicios y XDarwin 
se ejecuta sin privilegios -que no  necesita-  de superusuario).
</p>
      <pre>QuartzAudioInit: AddIOProc returned 1852797029</pre>
      <pre>-[NSCFArray objectAtIndex:]: index (2) beyond 
bounds (2)</pre>
      <pre>kCGErorIllegalArgument : CGSGetDisplayBounds 
(display 35434400)</pre>
      <pre>No core keyboard</pre>
      <p>
Tipo: Falso.
Hay errores que aparecen cuando el servidor intenta restablecerse después 
de un error previo. Se imprime una nueva copia de los mensajes
de arranque, seguidos de uno o más de los mensajes anteriores porque el 
reinicio del servidor no funciona en determinadas versiones de XDarwin.
Cuando veas estos mensajes, simplemente ve más arriba en la ventana
del Terminal (resp. Consola) y mira otro conjunto de mensajes.
Esta situación ocurre en todas las versiones superiores o iguales a la 
1.0a3 de XDarwin. El problema fue solucionado después de que 
1.0a3 fuera publicada.
</p>
      <pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>
      <p>
Tipo: Casi inofensivo.
No se sabe de dónde vienen estos mensajes pero se sabe que no tienen 
impacto ninguno en el desarrollo de las operaciones. Pueden eliminarse
ejecutando <code>touch .Xauthority</code> en tu directorio raíz.
</p>
      <pre>Gdk-WARNING **: locale not supported by C library</pre>
      <p>
Tipo: Inofensivo.
Significa justo lo que dice: el sistema locale no es soportado por la biblioteca C, 
pero no impide trabajar a la aplicación.
Para más información, <a href="#locale">ver más adelante</a>.
</p>
      <pre>Gdk-WARNING **: locale not supported by Xlib, locale set to C
Gdk-WARNING **: can not set locale modifiers</pre>
      <p>
Tipo: Malo, pero no fatal.
Estos mensajes pueden aparecer junto al anterior. Significa que los ficheros 
de datos locale de XFree86 no están.
Aparentemente este mensaje aparece de forma errática cuando se constuye 
XFree86 compilándolo desde las fuentes.
La mayor parte de las aplicaciones seguirán funcionando. Una excepción 
notable es GNU Emacs.
</p>
      <pre>Unable to open keymapping file USA.keymapping.
Reverting to kernel keymapping.</pre>
      <p>
Tipo: A manudo fatal.
Puede suceder con XDarwin 1.0a1, con la opción de teclado "Load from file"
habilitada.
Esta versión necesita una ruta completa para cargar un fichero
desde el diálogo de preferencias, pero busca automáticamente el fichero
si se le solicita desde la línea de comandos. 
Normalmente, a este mensaje .e sigue el "assert" que viene a continuación.
Para evitarlo, sigue las instruciones que se dan más adelante.
</p>
      <pre>Fatal server error:
assert failed on line 454 of darwinKeyboard.c!</pre>
      <pre>Fatal server error:
Could not get kernel keymapping! Load keymapping from file instead.</pre>
      <p>
Tipo: Fatal.
Los cambios que  Apple hizo en Mac OS X 10.1 rompen el código de XFree86 
que lee el formato de teclado desde el núcleo del sistema operativo resultando este mensaje de error.
Debes usar la opción de keymapping "Load from file" en Mac OS X 10.1., en las preferencias de XDarwin. 
Asegúrate que hay un fichero seleccionado, (i.e. usa el botón "Pick file") -
activar simpelmente la caja de comprobación puede no ser suficiente en 
algunas versiones de XDarwin.
Si no puedes obtener el diálogo de Prefencias porque 
XDarwin se cierra antes de darte una oportunidad, simplemente ejecútalo 
desde el Terminal con el comando
<code>startx -- -quartz -keymap USA.keymapping</code>.
Esto permite normalmente que XDarwin arranque, y entonces puedes hacer 
la elección permanente en el menú de Preferencias.
</p>
      <pre>Fatal server error:
Could not find keymapping file .</pre>
      <p>Tipo: Fatal (como se indica).  Este error se debe a la ausencia de mapas de teclado (keymapping) en Panther.  Necesitas instalar <code>xfree86-4.3.99-16</code> o posterior, porque estas versiones no necesitan esos ficheros.</p>
      <pre>Warning: no access to tty (Inappropriate ioctl for device).
Thus no job control in this shell.</pre>
      <p>
Tipo: Bastante inofensivo.
XDarwin 1.0a2 y posteriores lanzan un shell interactivo en segundo plano para 
ejecutar el fichero de arranque de clientes (.xinitrc).
Esto es así para uqe no sea necesariuo añadir sentencias para establecer
la variable PATH en tu fichero. Algunas shells indican que no están conectadas a un terminal real, pero el mensaje puede ser ignorado porque esta instancia de shell no se usa para nada que requiera el control de trabajos ni procesos similares.
</p>
      <pre>Fatal server error:
failed to connect as window server!</pre>
      <p>
Tipo: Fatal.
Significa que el servidor en modo consola (para Darwin puro) arrancó
mientras se estaba en Aqua.
Normalmente esto ocurre si se ha instalado el binario de la 
distribución oficial de XFree86 pero no la bola tar Xquartz.tgz.
También puede ocurrir cuando se pierden los enlaces simbólicos 
en /usr/X11R6/bin o cuando se invoca el comando <code>XDarwin</code> 
en una ventana de termianl para arrancar el servidor (se debe
usar startx en lugar de ese comando, véase

<a href="run-xfree86.php?phpLang=es">Arrancando XFree86</a>).
</p>
      <p>
En cualquier caso, puedes ejecutar <code>ls -l /usr/X11R6/bin/X*</code> 
y comprobar la salida.
Hay que examinar cuatro entradas relevantes:
<code>X</code>, un enlace simbólico apuntando a  <code>XDarwinStartup</code>;
<code>XDarwin</code>, un fichero ejecutable (esto es el servidor 
en modo consola);
<code>XDarwinQuartz</code>, un enlace simbólico apuntando a 
<code>/Applications/XDarwin.app/Contents/MacOS/XDarwin</code>;
y <code>XDarwinStartup</code>, pequeño fichero ejecutable.
Si algunos de estos ficheros no existe o está apuntando a algún lugar
equivocado, debes corregirlo.
Cómo hacer esto depende del modo en que hayas instalado XFree86.
Si lo instalaste desde Fink entonces necesitas reinstalar el paquete 
<code>xfree86</code> (o <code>xfree86-rootless</code> para OS 10.2 y 
anteriores).  Si lo instalaste tú mismo, obtén los ficheros desde 
una copia Xquartz.tgz.
</p>
      <pre>The XKEYBOARD keymap compiler (xkbcomp) reports:
&gt; Error:            Can't find file "unknown" for geometry include
&gt;                   Exiting
&gt;                   Abandoning geometry file "(null)"
Errors from xkbcomp are not fatal to the X server</pre>
      <p>
Tipo: Casi inofensivo.
Como el mensaje dice, no es fatal. Hasta donde sabemos. Xdarwin no utiliza 
la extensión XKB para nada. Quizás algún cliente intenta usarla de algún modo...
</p>
      <pre>startx: Command not found.</pre>
      <p>
Tipo: Fatal.
Ocurre con XDarwin 1.0a2 y 1.0a3 cuando los ficheros 
de  inicialización del shell no han tienen nigún comando para añadir /usr/X11R6/bin a la variable PATH.
Si usas Fink y no has cambiado tu shell por defecto, debería ser suficiente 
añadir la línea <code>source /sw/bin/init.csh</code> al fichero 
<code>.cshrc</code> en tu directorio de usuario.
</p>
      <pre>_XSERVTransSocketUNIXCreateListener: 
...SocketCreateListener() failed
_XSERVTransMakeAllCOTSServerListeners: server already running</pre>
      <pre>Fatal server error:
Cannot establish any listening sockets - Make sure an X server isn't already
running</pre>
      <p>
Tipo: Fatal.
Puede suceder si ejecutas accidentalmente varias instancias de 
XDarwin a la vez o después de un cierre sucio (i.e. crash) de XDarwin.
También puede ser debido a un problema de permisos de ficheros con los 
sockets de las conexiones locale.
Puedes intentar limpiar esto con <code>rm -rf /tmp/.X11-unix</code>.
Reiniciar el ordenador también puede ayudar (Mac OS X
limpia automáticamente  /tmp cuando arranca y la pila de red se reinicia).
</p>
      <pre>Xlib: connection to ":0.0" refused by server
Xlib: Client is not authorized to connect to Server</pre>
      <p>
Tipo: Fatal.
Los programas clientes no pueden conectarse con el servidor de visualización 
(XDarwin) porque este usa datos falsos de autentificación. Puede ser causado 
por algunas instalaciones de VNC,
por ejecutar XDarwin a través sudo,
y probablemente  por algunos otros raros accidentes.
El método normal para arreglar esto es borrar el 
fichero .Xauthority  (que almacena los datos de autentificación) 
en tu directorio de usuario y re-crear un fichero vacío:
</p>
      <pre>cd
rm .Xauthority
touch .Xauthority</pre>
      
      <p>
Otra causa común de fallos en el arranque de XFree86  
es un fichero <code>.xinitrc</code> incorrecto.
El fichero <code>.xinitrc</code> se ejecuta y, por alguna 
razón, termina casi inmediatamente. 
<code>xinit</code> interpreta esto como "la sesión de usuario 
ha terminado" y finaliza XDarwin.
Véase la sección <a href="run-xfree86.php?phpLang=es#xinitrc">.xinitrc
</a> para más detalles.
Recuerda configurar la variable PATH y tener un programa de larga 
vida que no arranque en segundo plano.
Es una buena idea añadir <code>exec xterm</code> como ayuda de emergencia
cuando no se halla el gestor de ventanas o similar.
</p>
      
    
    <h2><a name="black">7.2 Iconos negros en el panel GNOME panel o en el menú de una aplicación GNOME</a></h2>
      
      <p>
Un problema común es que los iconos u otras imágenes se ven como rectángulos 
o siluetas negras. En último extremo, esto está provocado por limitaciones 
del núcleo del sistema operativo. Apple ha sido informada del problema, pero 
por lo visto hasta ahora no parece que quiera arreglarlo. Véanse los
archivos del 
<a href="http://www.opensource.apple.com/bugs/X/Kernel/2691632.html">Darwin
bug report</a> para más detalles.
</p>
      <p>
La situación actual es que la extensión MIT-SHM del protocolo 
X11 es prácticamente inutilizable en Darwin y en Mac OS X.
Hay dos formas de anular este protocolo: en el servidor y en los clientes.
Los  servidores XFree86 instalados por Fink (i.e. los paquetes xfree86-server and
xfree86-rootless) lo tienen apagado.
El GIMP y el panel GNOME panel también.
Si notas iconos negros en otra aplicación, arranca con la opción 
<code>--no-xshm</code> en la línea de comandos.
</p>
    
    <h2><a name="keyboard">7.3 El teclado no funciona en XFree86</a></h2>
      
      <p>
Un problema conocido que sólamente afecta a los portátiles
(PowerBook, iBook).
La opción de mapa de teclado "Load from file" en las preferencias de XDarwin se implementó para trabajar con este problema.
Ahora se ha convertido en el método por defecto porque el método antiguo
(leer el mapa desde el núcleo) dejó de funcionar con  Mac OS X 10.1.
Si no tienes habilitada esta opción, puedes hacerlo en el diálogo de Preferencias de XDarwin. Comprueba la caja de comprobación de 
"Load from file" y selecciona el fichero de teclado a cargar.
Tras reiniciar XDarwin, el teclado debería funcionar (véase abajo).
</p>
      <p>
Si estás arrancando XFree86 desde la línea de comandos, puedes pasarle
el nombre del fichero de teclado como una opción, así:
</p>
      <pre>startx -- -quartz -keymap USA.keymapping</pre>
    
    <h2><a name="delete-key">7.4 La tecla de borrar no funciona</a></h2>
      
      <p>
Ocurre cuando usas la opción "Load keymapping from file" 
descrita anteriormente.
El fichero de mapeo describe la tecla de borrar como "Delete", no como
"Backspace".
Se puede corregir poniendo la siguiente línea en tu fichero .xinitrc
file:
</p>
      <pre>xmodmap -e "keycode 59 = BackSpace"</pre>
      <p>
XDarwin 1.0a2 y posteriores poseen el código necesario para mapear la 
tecla de borrar adecuadamente.
</p>
    
    <h2><a name="locale">7.5 "Warning: locale not supported by C library"</a></h2>
      
      <p>
Mensajes comunes, pero inofensivos. Significan lo que dicen: 
la internacionalización no está soportada a través de las 
bibliotecas C estándares, el programa usará los mensajes en inglés
por defecto, formatos de fecha y así sucesivamente...
Hay varias formas de comportarse con respecto a ésto:
</p>
      <ul>
        <li>
          <p>
Ignorar los mensajes.
</p>
        </li>
        <li>
          <p>
Evitar los mensales eliminando la variable de entorno LANG.
Nótese que esto eliminará la internacionalización de los programas que
realmente la soportan (vía gettext/libintl).
Ejemplo para .xinitrc:
</p>
          <pre>unset LANG</pre>
          <p>
Ejemplo para .cshrc:
</p>
          <pre>unsetenv LANG</pre>
        </li>
        <li>
          <p>
(Sólo 10.1) Usa el paquete de Fink <code>libxpg4</code>.
Construye una pequeña biblioteca que contiene únicamente funciones locale
operativas y está preparada para cargarse antes de las variables 
del sistema (usando la variable de entorno
DYLD_INSERT_LIBRARIES).
Debes tener una variable de entorno totalmente cualificada, e.g.
 <code>de_DE.ISO_8859-1</code> en vez <code>de</code>
o <code>de_DE</code>.
</p>
        </li>
        <li>
          <p>
Pídele a Apple que incluya soporte real para locale en las futuras versiones de 
Mac OS X.
</p>
        </li>
      </ul>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="tips.php?phpLang=es">8. Consejos de uso</a></p>
<? include_once "../../footer.inc"; ?>


