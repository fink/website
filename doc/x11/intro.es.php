<?php
$title = "Ejecución de X11 - Intro";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Ejecución de X11 Contents"><link rel="next" href="history.php?phpLang=es" title="Historia"><link rel="prev" href="index.php?phpLang=es" title="Ejecución de X11 Contents">';


include_once "header.es.inc";
?>
<h1>Ejecución de X11 - 1. Introducción</h1>
    
    
    <h2><a name="def-x11">1.1 ¿Qué es X11?</a></h2>
      
      <p>
        <a href="http://www.x.org/">X Window System</a> Versión 11
o, más brevemente, X11 es un sistema de visualización de gráficos (graphics 
display system) con una arquitectura cliente-servidor trasparente a la red.
Permite a la aplicaciones dibujar píxeles, líneas, texto, imágenes, etc. en
tu pantalla.
X11 también viene con bibliotecas adicionales que permiten a las aplicaciones 
dibujar interfaces de usuario (botones, campos de texto y similares)
</p>
      <p>
X11 es el sistema gráfico estándar de facto en el mundo Unix.
Acompaña a Linux, a los *BSD y a muchos sabores comerciales de Unix.
Los entornos de escritorio CDE, KDE y GNOME se ejecutan sobre él.
</p>
    
    <h2><a name="def-macosx">1.2 ¿Qué es Mac OS X?</a></h2>
      
      <p>
        <a href="http://www.apple.com/macosx/">Mac OS X</a> es un sistema operativo fabricado por <a href="http://www.apple.com/">Apple</a>.
Al igual que sus predecesores NeXTStep y OpenStep, está basado en BSD y por lo tanto es un miembro de la familia de sistemas operativos Unix.
Sin embargo, viene con un sistema de visualización de gráficos propietario
llamado Quartz y cuya apariencia es denominada Aqua, aunque los dos nombres se 
intercambian con frecuencia.
</p>
    
    <h2><a name="def-darwin">1.3 ¿Qué es Darwin?</a></h2>
      
      <p>
        <a href="http://opendarwin.org/">Darwin</a> es básicamente  una  versión reducida de  Mac OS X disponible libre de cargos y con su código fuente 
completo. No contiene ni Quartz, ni Aqua ni ninguna otra tecnología relacionada 
y, por defecto, sólamente ofrece una consola de texto.</p>
    
    <h2><a name="def-xfree86">1.4 ¿Qué es XFree86?</a></h2>
      
      <p>
        <a href="http://www.xfree86.org/">XFree86</a> es una implementación 
de X11 con código libre (open source).
Fue desarrollada inicialmente para ejecutarse en PeCés Intel x86, de ahí su 
nombre. Actualmente se ejecuta en muchas plataformas y en muchos sistemas 
operativos incluyend OS/2, Darwin, Mac OS X and Windows.
</p>
    
    <h2><a name="def-xtools">1.5 ¿Qué es Xtools?</a></h2>
      
      <p>
Xtools es un producto de <a href="http://www.tenon.com/">Tenon
Intersystems</a>.
Es una versión de X11 para Mac OS X, basada en XFree86.
</p>
    
    <h2><a name="client-server">1.6 Cliente y servidor</a></h2>
      
      <p>
X11 tiene una arquitectura cliente-servidor.
Hay un programa central que hace el dibujado real y que coordina el acceso por 
varias aplicaciones: ese es el servidor.
Una aplicación que nececesite dibujar usando X11 se conecta al servidor y le dice 
qué dibujar. En el mundo X11 estas aplicaciones se llaman clientes.</p>
      <p>
X11 permite que servidores y clientes estén en diferentes máquinas, 
lo que provoca a menudo confusiones terminológicas.
En un entorno con estaciones de trabajo y servidores, puedes ejecutar el servidor 
X11 en una estación de trabajo y las aplicaciones clientes de X11 en el servidor.
Debe quedar claro que cuando hablamos de "servidor" nos referimos al programa 
servidor de visualización X11, no a la máquina oculta en tu armario.
</p>
    
    <h2><a name="rootless">1.7 ¿Qué significa "rootless" (desarraigado)?</a></h2>
      
      <p>
Un pequeño inciso:
X11 modela la pantalla como una jerarquía de ventana contenidas unas en otras, lo 
que se conoce como estructura de árbol. En la cima de esta jerarquía está una 
ventana especial que tiene el tamaño de la pantalla y que contiene a todas las 
demás ventanas. Esta ventana contiene el escritorio y se denomina "ventana raíz" 
(root=raíz, rootless=sin raíces, desarraigado).
</p>
      <p>
De vuelta al asunto:
Como cualquier entorno gráfico, X11 fue escrito para funcionar en solitario y 
tener control absoluto sobre la pantalla. Pero en Mac OS X, Quartz gobierna 
siempre la pantalla y, por lo tanto, es necesario efectuar algunos ajustes para 
que ambos entornos puedan convivir.
</p>
      <p>
Un ajuste es permitir que los dos hagan turnos. Cada entorno usa una pantalla 
completa, pero sólamente uno es visible. El usuario puede cambiar de entorno en 
cualquier momento. Este modo se denomina de pantalla completa (full-screen) o 
enraizado (rooted). Se le llama rooted porque hay una ventana raíz totalmente 
normal en la pantalla de X11 que funciona como en cualquier otro sistema.
</p>
      <p>
Otra posibilidad de ajuste es mezclar los dos entornos ventana a ventana. Así se 
elimina la necesidad de cambiar de entorno (y de pantalla) continuamente. Esto 
elimina también la ventana "raíz" de X11, porque Quartz se ocupa del escritorio.
Como no hay ventana "raíz" (visible), este modo se llama "desarraigado" 
(rootless). Es el modo más cómodo de utilizar X11 en Mac OS X.
</p>
    
    <h2><a name="wm">1.8 ¿Qué es un gestor de ventanas (window manager)?</a></h2>
      
      <p>
En muchos entornos gráficos la apariencia de los marcos de las ventanas (barra de 
títulos, botones de cierre, etc) está definida por el sistema. X11 es diferente. 
Con X11 los marcos de las ventanas (también llamados "decoración") los provee un 
programa separado, llamado gestor de ventanas. En muchos aspectos, el gestor de 
ventanas es como cualquier otra aplicación cliente: arranca de la misma forma 
y se comunica con el servidor X a través de los mismos canales
</p>
      <p>
Se puede escoger entre un gran número de gestores de ventana diferentes.
Una extensa lista se encuentra en 
<a href="http://www.xwinman.org/">xwinman.org</a>.
Algunos de los más populares permiten al usuario personalizar la apariencia vía los llamados <a href="http://www.themes.org/">temas</a>.
Muchos gestores de ventana proporcionan también funcionalidades adicionales, 
tales como menús desplegables (pop up) en la ventana raíz, muelles (docks, 
como el de quartz) y botones lanzaderas (para abrir documentos, 
aplicaciones o menús)
</p>
      <p>
Muchos gestores de ventanas han sido empaquetado en Fink; aquí hay una<a href="http://pdb.finkproject.org/pdb/section.php/x11-wm">    
lista actualizada.
</a>
      </p>
    
    <h2><a name="desktop">1.9 ¿Qué son Quartz/Aqua, Gnome y KDE?</a></h2>
      
      <p>
Son entornos de escritorio y hay muchos más. Su propósito es aportar marcos de 
trabajo adicionales a las aplicaciones para que su apariencia y comportamiento 
sean visualmente consistentes.Por ejemplo: 
</p>
      <p> Visualizador de gráficos : X11
</p>
      <p> Gestor de ventanas:
<a href="http://sawmill.sourceforge.net/">sawfish</a>
      </p>
      <p> Escritorio: <a href="http://www.gnome.org/">Gnome</a>
      </p>
      <p>
Las fronteras entre visualizador de gráficos, gestor de ventanas y escritorio son 
borrosas porque funciones similares (y, en ocasiones, la misma) pueden estar 
implementadas en varios de ellos. Esta es una de las razones por las que un 
gestor de ventanas concreto puede no ser compatible con un escritorio concreto.

</p>
      <p>
Muchas aplicaciones se desarrollan para integrase en un escritorio particular.
Frecuentemente, instalando las bibliotecas del entorno de escritorio (y otras 
relacionadas) una aplicación desarrollada para un escritorio concreto puede 
trabajar con pocas o ninguna pérdida de funcionalidad.  
Ejemplo de esto es la cada vez más numerosa 
<a href="http://pdb.finkproject.org/pdb/section.php/gnome">
selección de aplicaciones GNOME 
</a>
disponibles para ser instaladas y ejecutadas sin instalar GNOME.  
Desafortunadamente, el mismo 
<a href="/faq/usage-fink.php#kde">
progreso no ha podido ser aún hecho
</a>
con <a href="http://www.kde.org/">aplicaciones KDE.</a>
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="history.php?phpLang=es">2. Historia</a></p>
<?php include_once "../../footer.inc"; ?>


