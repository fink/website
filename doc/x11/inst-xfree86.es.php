<?
$title = "Ejecución de X11 - Instalación de XFree86";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:56';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Ejecución de X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=es" title="El arranque de XFree86"><link rel="prev" href="history.php?phpLang=es" title="Historia">';


include_once "header.es.inc";
?>
<h1>Ejecución de X11 - 3. Cómo obtener e instalar XFree86</h1>
    
    
    <h2><a name="fink">3.1 Instalación desde Fink</a></h2>
      
      <p>
Fink te permite instalar X11 como quieras 
y además proporciona los paquetes XFree86. Si
usas <code>fink install ...</code>, descargará el código fuente y lo compilará
en tu ordenador. Si usas <code>apt-get install ...</code> o el "frontend"
<code>dselect</code>, descargará e instalará paquetes binarios 
precompilados, similares a los de la distribución oficial de XFree86.
</p>
      <p>
El paquete <code>xfree86-base</code> contiene el paquete
XFree86 4.2.1.1 (4.2.0 para los usuarios de  10.1) completo 
excepto el servidor XDarwin.  
El paquete <code>xfree86-rootless</code> es el servidor estándar XFree86 de la 
versión estable 4.2.1.1. Soporta las dos operaciones (pantalla completa y 
rootless) y tiene soporte OpenGL.  
(En los primeros tiempos, Fink tenía también un paquete 
<code>xfree86-server</code> que proporcionaba únicamente modo de pantalla 
completa, pero esta ha dejado de ser una opción intereresante).
Tienes también la opción de instalar el servidor tú mismo; mira más abajo. En ese 
caso debes instalar sólamente <code>xfree86-base</code> o correrás el riesgo de 
que Fink sobreescriba el servidor instalado manualmente.  Nótese que la versión 
actual estable de <code> xfree86-base</code> (4.2.1.1-3) genera  
<code>xfree86-rootless</code>, <code>xfree86-base-shlibs</code> y 
<code>xfree86-rootless-shlibs</code> durante el proceso de construcción (build 
process).  En ese caso, se deben instalar los cuatro paquetes para obtener una 
configuración activa de XFree86.
</p>
      <p>Los paquetes<code> xfree86-base-threaded</code> and 
<code>xfree86-rootless-threaded</code> son esencialmente los mismos modificados 
para soportar hebras (N.T.: "threading", un concepto de sistemas operativos) 
requerido por algunas aplicaciones como <code>xine</code>.</p>
      <p>XFree86 4.2.11 (sin hebras / "unthreaded") está considerado la versión básica estable para usar con Fink en Mac OS X 10.2.  
XFree86 4.3.0 está también disponible, 
pero está considerada más experimental, por lo que se encuentra en la 
rama inestable. Tiene soporte de hebras ("trheading") incorporado y es
más rápida que la versión 4.2.1.1.  
Para instalar esta versión hay que instalar el paquete <code>xfree86</code>. 
Obsérvese que, a artir de esta versión, ya no se separan los paquetes -base 
y -rootless packages, y que las bibliotecas se han desplazado a  
<code>xfree86-shlibs</code>.  Si construyes binarios desde la versión
4.3, no funcionarán ni con la 4.2.1.1 ni con las X11 de Apple, así que ¡cuidado!.</p>
      <p>
        <b>Usuarios de 10.3:</b>  Necesitan instalar la versión 4.3.99.16-2 o 
posterior, que son "prereleases" de XFree86-4.4.  Si estás trabajando 
desde la distribución binaria, asegúrate de actualizar la descripción de los 
paquetes (p.e. vía <code>sudo apt-get update</code>).</p>
    
    <h2><a name="apple-binary">3.2 Binarios de Apple</a></h2>
      
      <p>
El 7 de enero del 2003 Apple publicó
 <a href="http://www.apple.com/macosx/x11/">una implementación modificada de X11 basada en XFree86-4.2</a> que incluía renderización mediante Quartz y
OpenGL acelerado.  El 10 de febrero del mismo año se publica una nueva versión 
con características adicionales y corrección de errores.  Una tercera (i.e. Beta 3) sale el  17 de Marzo del 2003 con más características adicionales 
y corrección de errores.  Esta versión es utilizable en Jaguar.
</p>
      <p>El 24 de octubre del 2003, Apple publicó Panther (10.3) que incluía 
una versión de su propia distribución de X11.  Esta versión está basada en 
XFree86-4.3.</p>
      <p>
Al usar los binarios de Apple, necesitas asegurarse que el paquete
<b>X11 User</b> está instalado y debes 
<a href="http://www.finkproject.org/doc/users-guide/upgrade.php">actualizar</a>
Fink.</p>
      <p>Bajo <code>fink-0.16.2</code> es necesario instalar el paquete 
<b>X11 SDK</b> también.  Después de hacer esto, Fink puede crear
un paquete virtual <code>system-xfree86</code>.</p>
      <p>Bajo <code>fink-0.17.0</code> instalar X11 SDK solo es necesario 
      si necesitas construir paquetes desde el código fuente.  
En ese caso, incluso si no se posee el SDK hay paquetes virtuales
<code>system-xfree86</code> y <code>system-xfree86-shlibs</code>, representando 
este último a las bibliotecas compartidas. Si instalas el SDK, existe un paquete
<code>system-xfree86-dev</code> representando a las cabeceras.
</p>
      <p>
Si tienes una distribución de XFree86 instalada, sea a través de Fink 
o por algún otro método, debes seguir las 
<a href="inst-xfree86.php?phpLang=es#switching-x11">instrucciones para
reemplazar un paquete X11 por otro</a>.  Asegúrate de eliminar todos 
los paquetes existentes y después instala X11 de Apple (y X11 SDK, 
si se necesita o se desea).
</p>
      <p>
Algunas notas de uso del X11 de Apple:
</p>
      <ul>
        <li>
          <p>El paquete <code>autocutsel</code> no se usa ya. Si estás 
          arrancando X11 con él habilitado, debes deshabilitarlo.</p>
        </li>
        <li>
          <p>X11 usa tu fichero <code>~/.xinitrc</code> existente.  Si
necesitas el efecto completo de la integración con Quartz, debes usar
<code>/usr/X11R6/bin/quartz-wm</code>
  como gestor de ventanas, o borrar <code>~/.xinitrc</code> 
completamente.</p>
          <p>Si necesitas integración con cortar-y-pegar, pero también usar 
un gestor de ventanas diferente, puedes hacer como en el siguiente ejemplo: 
</p>
          <pre>/usr/X11R6/bin/quartz-wm --only-proxy &amp;
exec /sw/bin/fvwm2</pre>
          <p>Es posible, por supuesto, llamar a cualquier otro gestor de 
ventanas, a <code>startkde</code>, etc.</p>
        </li>
        <li>
          <p>
            <code>quartz-wm</code> no soporta completamente todas 
las funcionalidades de los gestores de ventanas de Gnome/KDE, por lo que pueden
ocurrir extraños comportamientos en ventanas que no deberían tener decoración, 
pero a pesar de ello la tienen.</p>
        </li>
        <li>
          <p>X11 de Apple no respeta las configuraciones por defecto de los 
entornos de Fink.  
Para arrancar aplicaciones instaladas a través de Fink 
(p.e. gestores de ventana, sesiones de gnome, otras de 
<code>/sw/bin</code>) ponga lo que sigue cerca 
del principio de <code>~/.xinitrc</code> (i.e. después del 
"<code>#!/bin/sh</code>" inicial pero antes de ejecutar 
ningún programa):</p>
          <pre> . /sw/bin/init.sh
</pre>
          <p>para inicializar el entorno de Fink.  
Nota:  Se usa <code>init.sh</code> en lugar de 
<code>init.csh</code> porque <code>.xinitrc</code> se ejecuta 
por <code>sh</code> y no por <code>tcsh</code>.</p>
        </li>
        <li>
          <p>Las aplicaciones que llaman a otros programas situados en el árbol 
de Fink para algunas de sus funciones requieren un tratamiento 
especial cuando son invocadas desde el menú Aplicaciones.  En lugar de colocar la 
ruta completa hasta el fichero, p.e.</p>
          <pre>/sw/bin/emacs</pre>
          <p>hay que usar algo como lo siguiente, si usas bash 
como shell por defecto:</p>
          <pre>. /sw/bin/init.sh ; emacs</pre>
          <p>o, si usas tcsh:</p>
          <pre>source /sw/bin/init.csh ; emacs</pre>
          <p>Así nos aseguramos que la aplicación tiene la información correcta
en PATH. Se debe usar esta sintaxis para cualquier aplicación instalada vía Fink.</p>
        </li>
        <li>
          <p>Si estás intentando construir un paquete a mano usando X11 de 
Apple y obtienes un fallo como éste:</p>
          <pre>ld: err.o illegal reference to symbol: _XSetIOErrorHandler 
defined in indirectly referenced dynamic library 
/usr/X11R6/lib/libX11.6.dylib</pre>
          <p>entonces necesitas asegurarte de que <code>-lX11</code> se ha usado 
          durante el enlazado (linking).  Comprueba las opciones de 
 configuración de tu paquete para ver como incluir el argumento extra.</p>
        </li>
        <li>
          <p>Si usas el paquete <code>xfree86</code>, y después cambias 
          al X11 de  Apple (en 10.2.x o en 10.3.x), cualquier paquete 
          construido a través de  <code>xfree86</code> deberá ser reconstruido, 
          pues los binarios son incompatibles.</p>
        </li>
      </ul>
    
    <h2><a name="official-binary">3.3 Binarios oficiales</a></h2>
      
      <p>
El proyecto XFree86 tiene una distribución binaria oficial de XFree86
4.2.0, la cual puede ser actualizada a  4.2.1.1 mediante parches.
La puedes enciontrar en tu    
<a href="http://www.xfree86.org/MIRRORS.shtml">réplica de XFree86</a> 
favorita, en el directorio <code>4.2.0/binaries/Darwin-ppc-5.x</code>.
Asegúrate de obtener <code>Xprog.tgz</code> y 
 <code>Xquartz.tgz</code>
aunque estén marcados como optativos.
Si no estás demasiado seguro de lo que necesitas, 
descarga el directorio completo.
Ejecuta el script <code>Xinstall.sh</code> como superusuario (root) para 
instalar el material descargado.
(Es posible que necesites leer las
 <a href="http://www.xfree86.org/4.2.0/Install.html">instrucciones 
oficiales</a> antes de la instalación).   
Si lo prefieres, puedes usar los  
<a href="http://prdownloads.sourceforge.net/xonx/XInstall_10.1.sit?download">
binarios</a> de XonX, que provienen del mismo código fuente, 
pero son más fáciles de usar.  En cualquier caso descarga, descomprime y ejecuta las siguientes actualizaciones:</p>
      <ol>
        <li>Usuarios 10.1: 
        <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.1.zip?download">4.2.0 -&gt; 4.2.0.1 upgrade</a>.  
        Usuarios 10.2:  
        <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.2.zip?download">4.2.0 -&gt; 4.2.0.1 upgrade</a>
        </li>
        <li>Usuarios de 10.1 y 10.2:  
        <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.1.1.zip?download">4.2.0.1 -&gt; 4.2.1.1 upgrade</a>
        </li>
      </ol>
      <p>También hay una distribución oficial binaria de la versión 4.3.0 
en las <a href="http://www.xfree86.org/MIRRORS.shtml">réplicas 
de XFree86 </a> en el directorio 
<code>4.3.0/binaries/Darwin-ppc-6.x</code>.
Asegúrate de obetener <code>Xprog.tgz</code> y 
 <code>Xquartz.tgz</code>
aunque estén marcados como optativos.
Si no estás demasiado seguro de lo que necesitas, 
descarga el directorio completo.
Ejecuta el script <code>Xinstall.sh</code> como superusuario (root) para 
instalar el material descargado.
(Es posible que necesites leer las
 <a href="http://www.xfree86.org/4.2.0/Install.html">instrucciones 

oficiales</a> antes de la instalación).</p>
      <p>Cualquiera que sea la versión instalada, ya dispones de XFree86
con un servidor a pantalla completa o rootless ejecutable bajo Mac OS X.
</p>
    
    <h2><a name="official-source">3.4 Fuentes oficiales</a></h2>
      
      <p>
Si tienes tiempo disponible, puedes construir XFree86 4.2.0 desde el código 
fuente. Éste está disponible en tu 
<a href="http://www.xfree86.org/MIRRORS.shtml">réplica de XFree86</a> 
favorita, en el directorio <code>4.2.0/source</code>.
Descarga las tres bolas tar <code>X420src-#.tgz</code> y expándelas
en el mismo directorio. Puedes personalizar la construcción
poniendo definiciones de macros en el fichero
<code>config/cf/host.def</code> que está en el árbol fuente de XFree86.

Mira el fichero <code>config/cf/darwin.cf</code> para algunas cuestiones puntuales.
(Nota: Sólamente las macros con #ifndef pueden ser sobrescritas en host.def.)
</p>
      <p>
Cuando estés contento con la configuración, compila e instala XFree86
con los siguientes comandos:
</p>
      <pre>make World
sudo make install install.man</pre>
      <p>Para actualizar  4.2.1.1, sigue las instrucciones 
      en <a href="#official-binary">Binarios oficiales</a> section.</p>
      <p>Para instalar 4.3.0, sigue las instrucciones anteriores, 
reemplazando "2" por "3" y no actualices a 4.2.1.1.</p>
      <p>
Como con los binarios oficiales, ya dispones de XFree86
con un servidor a pantalla completa o rootless ejecutable bajo Mac OS X.
</p>
    
    <h2><a name="latest-cvs">3.5 Versión para desarrolladores: lo último de lo último</a></h2>
      
      <p>
Si además de tiempo tienes nervios de sobra puedes obtener 
la última versión de desarrollo de XFree86 del repositorio CVS
público.
Nótese que el código está en constante desarrollo. Lo que obtengas 
hoy es normalmente distinto de lo que obtuviste ayer.</p>
      <p>
Para instalar, sigue las instrucciones del  
<a href="http://www.xfree86.org/cvs/">CVS de XFree86
</a> para descargar el módulo <code>xc</code>.
Después sigue las instrucciones de compilación del código aquí debajo.
</p>
    
    
    <h2><a name="macgimp">3.6 MacGimp</a></h2>
      
      <p>
El instalador descargable ofrecido por el personal de MacGimp  
durante 2001
no contiene XFree86, pero puede sobreescribir algunas ficheros 
]de configuración de XFree86.
</p>
      <p>
El CD que <a href="http://www.macgimp.com/">MacGimp, Inc.</a>
ofrece a la venta contiene una versión indeterminada de XFree86.
No está claro que versión es; parece ser una mezcla de
4.0.3, 4.1.0 y alguna versión de desarrollo no implementada.
El servidor usa modo rootless mode, usando un parche anterior a la versión
4.1.0.
</p>
    
    
    <h2><a name="switching-x11">3.7 Cómo reemplazar X11</a></h2>
      
      <p>
Si has  instalado alguno de los paquetes X11 de Fink y, por alguna razón 
u otra has decidido que necesitas eliminarlo, el procedimiento a seguir 
es simple. Tienes que forzar la eliminación de los viejos paquetes 
y después instalar los nuevos, con el objetivo de preservar las consistencia
de la base de datos dpkg.
</p>
      <p>
Hay dos formas diferentes de hacer esto:
</p>
      <ol>
        <li>
          <p>Usar FinkCommander</p>
          <p>
Si usas <a href="http://finkcommander.sourceforge.net/">FinkCommander</a>, 
puedes forzar la eliminación a través del menú. Por ejemplo, si tienes  <code>xfree86-rootless</code> instalado pero necesitas la versión 
threaded, debe seleccionar los paquetes 
<code>xfree86-rootless</code>,
   <code>xfree86-rootless-shlibs</code>, 
<code>xfree86-base</code> y
   <code>xfree86-base-shlibs</code> packages y entonces ejecutar:
  </p>
          <pre>Source -&gt; Force Remove</pre>
        </li>
        <li>
          <p>Eliminar manualmente desde la línea de comandos</p>
          <p>
   Para eliminar manualmente se usa <code>dpkg</code> con la 
opción --force-depends, así:
  </p>
          <pre>sudo dpkg -r --force-depends xfree86-rootless\ 
xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
          <p>
  Obsérvese que si tienes aplicaciones que requieren XFree86 threaded, puedes 
tener problemas con tu base de datos dpkg si fuerzas la 
eliminación e instalas un paquete  XFree86 diferente o un paquete fantasma representándolo.
  </p>
        </li>
      </ol>
      <p>Por otro lado, si tienes una versión de X11 no instalada desde Fink 
necesitas eliminarla usando la línea de comandos:</p>
      <pre>sudo rm -rf /usr/X11R6 /etc/X11</pre>
      <p>Esto sigue siendo cierto para cualquier paquete X11 no instalado a través de Fink.  Necesitarás también eliminar <code>XDarwin.app</code> | 
<code>X11.app</code>, dependiendo de cuál tengas instalado.  Asegúrate 
de comprobar tu fichero <code>.xinitrc</code> si has eliminado el X11 
de Apple para que no lance  <code>quartz-wm</code>.  Puedes entonces instalar cualquier variedad 
de X11 que desees, manualmente o vía Fink.</p>
    
    <h2><a name="fink-summary">3.8 Índice de paquetes Fink</a></h2>
      
      <p>
Un breve esquema de las opciones de instalación y de los paquetes 
de Fink a instalar</p>
      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Tipo de instalación</th><th align="left">Paquetes de Fink</th></tr><tr valign="top"><td>4.2.x construido vía Fink</td><td>
            <p>
              <code>xfree86-base</code> y <code>xfree86-rootless</code> (y sus <code>-shlibs</code>)</p>
            <p>o <code>xfree86-base-threaded</code> y <code>xfree86-rootless-threaded</code> (y <code>-shlibs</code>)</p>
          </td></tr><tr valign="top"><td>4.3.x construido via Fink</td><td>
            <p>
              <code>xfree86</code> y <code>xfree86-shlibs</code>
            </p>
          </td></tr><tr valign="top"><td>4.x binarios oficiales</td><td>
            <p>
              <code>system-xfree86</code> solo (+ paquetes asociados)</p>
          </td></tr><tr valign="top"><td>4.x construidos desde fuentes o desde las últimas fuentes 
CVS</td><td>
            <p>
              <code>system-xfree86</code> solo (+ paquetes asociados)</p>
          </td></tr><tr valign="top"><td>4.2.x de Apple</td><td>
            <p>
              <code>system-xfree86</code> solo (+ paquetes asociados)
</p>
          </td></tr><tr valign="top"><td>4.3.x de Apple</td><td>
            <p>
              <code>system-xfree86</code> solo (+ paquetes asociados)
</p>
          </td></tr></table>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=es">4. El arranque de XFree86</a></p>
<? include_once "../../footer.inc"; ?>


