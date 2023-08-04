<?php
$title = "Guía del Usuario - Paquetes";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Guía del Usuario Contents"><link rel="next" href="upgrade.php?phpLang=es" title="Actualizando Fink"><link rel="prev" href="install.php?phpLang=es" title="Primera Instalación">';


include_once "header.es.inc";
?>
<h1>Guía del Usuario - 3. Instalando Paquetes</h1>
    
    
    
      <p>
Ahora que tienes algo que puede llamarse una Instalación de Fink, este capítulo te mostrara como instalar los paquetes que quieras. 
Antes de explicar eso, hay que mencionar unas notas que se aplican tanto a la distribución fuente como a la binaria.</p>
    
    <h2><a name="bin-dselect">3.1 Instalando Paquetes Binarios con
dselect</a></h2>
      
      <p>
        <code>dselect</code> es un programa que te permite revisar la lista de programas disponibles y selecionar los que deseas que sean instalados.
Este programa es ejecutado desde la terminal, sin embargo puede ocupar la pantalla completay usa un sistema de navegación simple mediante el uso del teclado.
Al igual que las otras herramientas de manejo de paquetes,<code>dselect</code> requiere privilegios de root, así que debe ser usado de la siguiente manera:
</p>
      <pre>sudo dselect</pre>
      <p>
        <b>Nota:</b>
        <code>dselect</code> tiene algunas difcultades con la terminal del OS X. Es necesario ejecutar los siguientes comandos antes de usar dselect, o ponerlos en el archivo de início adecuado (e.g. <code>.cshrc</code> | <code>.profile</code>):</p>
      <p>Lo su usuarios de tcsh deben de usar los siguientes comandos:</p>
      <pre>setenv TERM xterm-color</pre>
      <p>Y los usuarios del bash:</p>
      <pre>export TERM=xterm-color</pre>
      <p>
El menu principal muestra varias opciones:
</p>
      <ul>
        <li>
          <p>
            <b>[A]ccess</b> - este comando configura el método de acceso a la red usado.
<b>Este no es neceasrio ejecutarlo, debido a que Fink preconfigura todo. De preferencia, evite este menu ya que puede sobreescribir la configuracion por defecto por una que no funcione.</b>
</p>
        </li>
        <li>
          <p>
            <b>[U]pdate</b> - Este elemento descarga la lista de paquetes disponibles del sitio de Fink.
Este elemento no instala ni actualiza los paquetes, solo la lista que usa el manejador de paquetes.
Este comando debe ejecutarse al menos una vez después de instalar Fink.
</p>
        </li>
        <li>
          <p>
            <b>[S]elect</b> - Este elemento permite ver la lista de paquetes, permitiendo te además, seleccionar o deseleccionar los paquetes que deses instalar en tu sistema. Abra más información al respecto más adelante.
</p>
        </li>
        <li>
          <p>
            <b>[I]nstall</b> - Aquí es donde esta la acción.
Los elementos previamente mencionados solo afecta la lista y el estatus de la base de datos del dselect.
Este comando realmente descarga e instala los paquetes que tu has selecionado.
También se encarga de remover lo paquetes que sean deseleccionados.
</p>
        </li>
        <li>
          <p>
            <b>[C]onfig</b> y<b>[R]emove</b> - Estos son remanentes de antes del comando apt.

Si bien son innecesarios, tenerlos tampoco hace daño.
</p>
        </li>
        <li>
          <p>
            <b>[Q]uit</b> - Bueno, este debe ser bastante obvio..
</p>
        </li>
      </ul>
      <p>
En general, pasaras más tiempo usando dselect que cualquier otro comando en el manejador de paquetes. Este menú siempre puede ser alcanzado a través del "[S]elect" menu.
Antes que dselect te muestre la lista de objetos, muestra una pantalla introductoria de ayuda.
Puedes presionar 'k' para obtener una lista completa de los comandos de teclado o simplemente presionar la barra espaciadora para pasar a la lista de paquetes.</p>
      <p>
Para desplazarse en la lista se utilizan las teclas con las flechas hacia arriba o hacia abajo. Las sellecci�n se realiza con las teclas '+' y '-'.
Cuando seleccionas un paquete que necesita de otros paquetes, dselect mostrara una sublista con los paquetes involucrados. 
En la mayoría de los casos puedes presionar Return para aceptar la selección del dselect. También puedes hacer ajustes a la sublista (e.g. para elegir entre las alternativas para las dependencias virtuales del agun paquete), o presionar 'R'
(i.e. Shift-R) para regresar al estado previo.
Tanto la sublista como la lista principal de paquetes pueden ser abandonbadas al presionar Return.
Cuando estes satisfecho con tus selección de paquetes, abandona la lista de paquetes y usa el menú "[I]nstall" para instalar los paquetes.
</p>
    
    <h2><a name="bin-apt">3.2 Instalando los paquetes con 
apt-get</a></h2>
      
      <p>
        <code>dselect</code> en realidad no descarga los paquetes por si mismo. En realidad, ejecuta apt, quien es el que realiza el trabajo sucio.
Si a tí te gusta más la interface de línea de comandos, puedes acceder a las funciones de apt directamente con el comando <code>apt-get</code>.
</p>
      <p>
Al igual que el con el dselect, primero debes descargar la lista más reciente de paquetes con el comando:
</p>
      <pre>sudo apt-get update</pre>
      <p>
Al igual que el comando "[U]pdate" del dselect, esto no actualiza los archivos de tu computadora, solamente la lista de paquetes disponibles del apt.
Para instalar un paquete, debes proporcionarle al comando el nombre del  paquete como se muestra a continuación:
</p>
      <pre>sudo apt-get install lynx</pre>
      <p>
Si apt-get determina que el paquete que deseas necesita de otros paquetes para instalarse, te mostrara una lista y pedira confirmación.
Hasta obtener dicha confirmación descargará e instalara los paquetes seleccionados.
Remover los paquetes es igual de facil:
</p>
      <pre>sudo apt-get remove lynx</pre>
      <p>
      </p>
    
    <h2><a name="bin-exceptions">3.3 Instalando Paquetes Dependientes que no estan Disponibles en la distribución Binaria</a></h2>
      
      <p>En ocasiones, al realizar una Instalación binaria, es posbile encontrar mensajes que indican que cierta dependencia no puede ser instalada e.g.:</p>
      <pre>Sorry, but the following packages have unmet
dependencies:
foo: Depends: bar (&gt;= version) but it is
not installable
E: Sorry, broken packages</pre>
      <p>Lo que ha ocurrido es que el paquete que has tratado de instalar depende de otro que no puede ser instalado como un binario, debido a requerimientos de la licensia. Es necesario instalar dicha dependencia del código fuente (ver la siguiente Sección).</p>
    
    <h2><a name="src">3.4 Installing Binary and Source Packages with fink</a></h2>
      

<p>The <code>fink</code> tool will allow you to install packages that are not yet available in the <a href="intro.php?phpLang=es#src-vs-bin">binary distribution</a>.</p>

      <p>Antes que nada, necesitaras la versión adecuada de las Herramientas de Desarrollo (Development Tools) para tu sistema.  Estas estín disponibles como descarga gratuita en  <a href="http://connect.apple.com">http://connect.apple.com</a>.</p>
      <p>
Para obtener una lista de los paquetes disponibles para instalar del código fuente, hay que preguntarle a la herramienta <code>fink</code> :
</p>
      <pre>fink list</pre>
      <p>
La primera columna lista el estado de la Instalación (un espacio vacío indica que no esta instalado,<code>i</code> indica instalado, <code>(i)</code>indica instaldo pero no la versión más reciente), seguido por el nombre del paquete, y una pequeña descripción.
Se le puede solicitar más información acerca de un paquete particular usando el comando "describe" ("info" es un alias de este comando):
</p>
      <pre>fink describe xmms</pre>
      <p>
Cuando encuentras un paquete que desees instalar, usa el comando "install":
</p>
      <pre>fink install wget-ssl</pre>
      <p>
El comando <code>fink</code> primero revisará si todos los prerequisitos necesarios ("dependencias") estín presentes , y preguntará si estas de acuerdo en instlar las que estne ausentes.
Entonces ira y descargara el código fuente, lo descomprime, lo parcha, lo compila e instala los resultantes en tu sistema. 
Esto puede tradar un rato. Si algun mensaje de error, por favor revisa el archivo 
<a href="/faq/">FAQ</a>.
</p>

      <p>
For <code>fink</code> versions since 0.23.0 you can tell it to try to download
pre-compiled binary packages, if available, instead of building them. Just pass
the <a href="usage.php?phpLang=es#options">--use-binary-dist (or -b)
option</a> to <code>fink</code>. This can save you a lot of time. E.g.
calling
      </p>
      <pre>fink --use-binary-dist install wget-ssl</pre>
      <p>or</p>
      <pre>fink -b install wget-ssl</pre>
      <p>
will first download all dependencies for wget-ssl that are available from the
binary distribution and only build the remainder from source. This option can
also be enabled permanently in the <a href="conf.php?phpLang=es">Fink configuration
file</a> (fink.conf) or by running the command <code>fink configure</code>.
      </p>
      <p>
More details about the <code>fink</code> tool are available in the chapter 
<a href="usage.php?phpLang=es">"Using the fink Tool from the Command Line"</a>.
      </p>

    
    <h2><a name="fink-commander">3.5 Fink Commander</a></h2>
      
      <p>Fink Commander es una interfece Aqua tanto para las herramientas<code>apt-get</code> y el  <code>fink</code> .  El menú Binary te permite efectuar operaciones sobre la distribución binaria, y el menú Source lo mismo pero para la distribución fuente.</p>
      <p>Fink Commander esta incluido en el instalador binario de Fink. Para descargarlo por separado (e.g. si instalaste Fink de la fuente), ó para obtener información adicional, visita el <a href="http://finkcommander.sourceforge.net">Sitio Web del Fink Commander</a>.</p>
    
    <h2><a name="available-versions">3.6 Versiones disponibles</a></h2>
      
      <p>Cuando desees instalar un paquete, debes revisar primero la<a href="http://pdb.finkproject.org/pdb/index.php">base de datos de paquetes</a> y revisar si esta disponible a través de Fink.  Las versiones disponibles del paquete se mostrarán en varias renglones de una tabla. Estas son:</p>
      <ul>
        <li>Binary Distribution
		  
		  <ol>
            <li><p>
            <b>0.4.1:</b> La versión que puede instalarse de los binarios del Mac OS 10.1.</p></li>
            <li><p><b>0.6.4:</b>  this is the version that can be installed from binaries for OS 10.2.</p></li>
            <li><p><b>0.7.2</b>
  This is the base version that can be installed from binaries for OS 10.3.  If you <a href="install.php?phpLang=es#bin">update</a> Fink, later versions of some packages may be available.</p> 
        </li>
            <li><p><b>0.9.0:</b>  This is the base version that can be installed from binaries for OS 10.5.  If you <a href="install.php?phpLang=es#bin">update</a> Fink, later versions of some packages may be available.</p></li>
          </ol>
          
        </li>
        <li>CVS/rsync Distributions
<ol>
            <li>
          <p>
            <b>10.2-gcc3.3 stable:</b>  Esta es la versión estable más reciente que puede ser instalada desde la fuente para OS 10.2 con la actualización<code>gcc 3.3</code> De las Herramientas de Desarrollo.  Para poder instalar esta versión, necesitas habilitar <a href="/doc/cvsaccess/index.php">CVS</a> o accesso de rsync.  Si aún no has aplicado la actualización<code>gcc 3.3</code> podrías no ver esta versión (posiblemente, ni el paquete).</p>
          <p>Nota:  A diferencia de muchos otros proyectos, las distribuciones más recientes de Fink se distribuyen mediante CVS, al igual que las versiones que necesitan más pruebasas (ver la Sección de inestables más abajo ).  Habilitar la actualización mediante CVS | rsync te da acceso a la versión estable más reciente aún antes que la versión binaria sea actualizada.
</p>
        </li>
        <li><p><b>10.3 stable:</b>  Esta es la versión estable más reciente que puede ser instalada del código fuente para OS 10.3.</p>
</li>

            <li><p><b>10.4/powerpc stable:</b>  This is the most recent version that can be installed from the stable source tree for OS 10.4 users 
on PowerPC hardware.</p></li>
            <li><p><b>10.4/intel stable:</b>  This is the most recent version that can be installed from the stable source tree for OS 10.4 users
on intel hardware.</p></li>

        <li>
          <p>
            <b>10.2-gcc3.3 unstable:</b>  Esta es la última versión inestable que puede ser instalada del código fuente para el  OS 10.2 con  <code>gcc 3.3</code>.  Para instalar esta versión, sige las <a href="/faq/usage-fink.php#unstable">instructiones</a> que describen como instalar paquetes inestables.</p>
          <p>Nota: <b>unstable</b> no significa <b>inusable</b> o <b>inoperante</b>, solo que son instalables bajo tu propio riesgo.
</p>
        </li>
        <li><b>10.3 unstable:</b>  Esta es la última versión inestable a partir de la fuente para OS 10.3.  Hay que habilitar el árbol inestable como se menciona más arriba.</li>

            <li><p><b>10.4/powerpc unstable:</b>  This is the most recent version that can be installed from the unstable source tree for OS 10.4 users
on PowerPC hardware.</p></li>
            <li><p><b>10.4/intel unstable:</b>  This is the most recent version that can be installed from the unstable source tree for OS 10.4 users
on intel hardware.</p></li>

          </ol></li>
      </ul>
    
    <h2><a name="x11">3.7 Entendiendo el X11.</a></h2>
      
      <p>Muchos de los paquetes disponibles mediante Fink, requieren que alguna versión de X11 sea instalada. Debido a esto, una de las primeras cosas que se requiere es seleccionar una implementación del X11.</p>
      <p>
Dado que existen varias implementaciones para el Mac OS X
(Apple X11, XFree86, Tenon Xtools, eXodus) y varias maneras de instalarlos
(manually or via Fink), incluso existen varios paquetes alternativos - uno para cada arreglo.
Aquí esta una lista de los paquetes X11 disponibles así como los metodos de Instalación:
</p>
      
      <ul>
        <li>
          <p>
            <b>xfree86, xfree86-shlibs:</b>
Install both of these packages for XFree86 4.3.0 (OS 10.2 only), 4.4.0 (10.2 or 10.3), or 4.5.0 (10.3 or 10.4).  
</p>
        </li>
        <li><p><b>xorg, xorg-shlibs</b>(10.3 or 10.4)  Install these packages to get the 6.8.2 release of the X.org X11 distribution.</p></li>
        <li>
          <p>
<b>system-xfree86 + -shlibs, -dev:</b>
These packages are automatically generated (for Fink 0.6.2 or later) if you install Apple's X11, or manually installed XFree86 or X.org.  
They will then act as
dependency placeholders.
</p>
        </li>
        <li>
          <p>
            <b>xfree86-base, xfree86-rootless [-threaded] + -shlibs, -dev</b>
(10.1 or 10.2 only) These packages install all of XFree86 4.2.1.1 (4.2.0 on 10.1).  The <code>-threaded</code> variant was provided for applications that required it, and this functionality is standard in later XFree86 versions.  The <code>-rootless</code> packages include the XDarwin display server--the name is historical.
</p><p>You must install all six packages to build X11-based packages from source.
</p>
        </li>
      </ul>
      
      <p>
Para mayor información sobre como instalar o ejecutar el X11 visita las páginas
<a href="/doc/x11/">X11 en Darwin
y el documento de  Mac OS X document</a>.
</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="upgrade.php?phpLang=es">4. Actualizando Fink</a></p>
<?php include_once "../../footer.inc"; ?>


