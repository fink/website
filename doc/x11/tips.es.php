<?php
$title = "Ejecución de X11 - Consejos";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Ejecución de X11 Contents"><link rel="prev" href="trouble.php?phpLang=es" title="Resolución de problemas con XFree86">';


include_once "header.es.inc";
?>
<h1>Ejecución de X11 - 8. Consejos de uso</h1>
    
    
    <h2><a name="terminal-app">8.1 Arrancar aplicaciones X11 desde Terminal.app</a></h2>
      
      <p>
Para lanzar aplicaciones X11 desde una ventana del  Terminal.app window, debes 
inicializar la variable de entorno "DISPLAY".
Este variable le dice a las aplicaciones donde encontrar 
el servidor de ventanas X11.
Si XDarwin se ejecuta en la misma máquina que el servidor, puedes hacerlo de las maneras siguientes:
</p>
      <ul>
        <li>
          <p>Usuarios tcsh:</p>
          <pre>setenv DISPLAY :0.0</pre>
        </li>
        <li>
          <p>Usuarios bash:</p>
          <pre>export DISPLAY=":0.0"</pre>
        </li>
      </ul>
      <p>
Es interesante tener una configuración que lance XDarwin.app en el arranque 
(configurable en el panel de Arranque de las Preferencias del Sistema
en Mac OS 10.2, o en el panel Cuentas en Mac OS 10.3):
</p>
      <ul>
        <li>
          <p>Los usuarios tcshañadirán a su fichero .cshrc:</p>
          <pre>if (! $?DISPLAY) then
  setenv DISPLAY :0.0
endif</pre>
        </li>
        <li>
          <p>Los usuarios de bash añadirán esta línea 
en su fichero .bashrc:</p>
          <pre>[[ -z $DISPLAY ]] &amp;&amp; export DISPLAY=":0.0"</pre>
        </li>
      </ul>
      <p>
Esto inicia  DISPLAY automáticamente en cada shell, pero no sobreescribe el valor actual cuando DISPLAY ha sido inicializado previamente.
De esa manera, se puede seguir ejecutando aplicaciones X11 a distancia mediante ssh o por un túnel X11.
</p>
    
    <h2><a name="open">8.2 Lanzamiento de aplicaciones Aqua desde un xterm</a></h2>
      
      <p>
Una manera de lanzar aplicaciones Aqua desde un xterm (realmente, 
desde cualquier shell) es el comando <code>open</code>.
Algunos ejemplos:
</p>
      <pre>open /Applications/TextEdit.app
open SomeDocument.rtf
open -a /Applications/TextEdit.app index.html</pre>
      <p>
El segundo ejemplo abre el documento en la aplicación que está asociada con él.
El tercer ejemplo proporciona explícitamente la aplicación a utilizar.
</p>
    
    <h2><a name="copy-n-paste">8.3 Copiar y Pegar</a></h2>
      
      <p>
Copiar y Pegar funciona generalmente entre los entornos Aqua y X11, 
pero hay algunos errores. 
Emacs es especialmente delicado con la selección en curso.
Copiar y Pegar desde Classic a X11 no funciona.
</p>
      <p>
Lo importante es utilizar el método adecuado según el entorno en el que estemos.
Para transferir texto desde Aqua a X11, usa Cmd-C en Aqua, luego pasa la 
ventana de destino al frente y usa el botón central del ratón, 
i.e. opción-clic en un ratón de un sólo botón (puede ser configurado 
en las Preferencias de XDarwin), para pegar.
Para transferir texto desde X11 a Aqua, simplemente selecciona el texto 
con el ratón en X11 y usa Cmd-V en Aqua para pegarlo.
</p>
      <p>
El sistema X11 tiene realmente portapaeles separados (llamados 
"buffers de corte" en lenguaje X11) y algunas aplicaciones tienen puntos de vista
curiosos sobre cuáles deben usar. Por eso, la combinación de 
GNU Emacs or XEmacs algunas veces no funcion.
El programa <code>autocutsel</code> puede ayudar aquí: sincroniza automáticamente los dos buffers de corte principales.
Para ejecutarlo instala el paquete de Fink autocutsel y añade 
la siguiente línea a tu fichero .xinitrc:
</p>
      <pre>autocutsel &amp;</pre>
      <p>
(Asegúrate de añadirla  <b>antes</b> de la línea que invoca al 
gestor de ventanas, ¡esa nunca termina de ejecutarse! 
No pongas la línea al final o nunca se ejecutará) 
Y recuerda que en el X11 de Apple ya no es necesario (véase <a href="inst-xfree86.php?phpLang=es#apple-binary">Binarios de Apple</a>).
</p>
      <p>Si estás usando X11 de Apple, entonces puedes usar 
Comando-C o Edit-&gt;Copy, como en las aplicaciones Mac, para copiar texto en el 
portapapeles, y el botón central o Comando-V para pegar desde le portapapeles 
al X11 de Apple.</p>
      <p>En cualquier caso, si encuentras problemas copiando o pegando desde
Aqua a X11 o viceversa, intenta en primer lugar copiar de nuevo, (puede 
ocurrir que la copia no se hubiera efectuado en el primer intento), y utilizar aplicaciones intermedias tales como TextEdit o Terminal.app en el lado Aqua y 
nedit o un xterm en el lado X11. Según mi experiencia, siempre hay una solución.</p>
    
  
<?php include_once "../../footer.inc"; ?>


