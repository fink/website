<?
$title = "Guía del Usuario - Instalar";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2008/06/27 00:55:00';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Guía del Usuario Contents"><link rel="next" href="packages.php?phpLang=es" title="Instalando Paquetes"><link rel="prev" href="intro.php?phpLang=es" title="Introducción">';


include_once "header.es.inc";
?>
<h1>Guía del Usuario - 2. Primera Instalación</h1>
    
    
    
      <p>
Durante la primera Instalación, un sistema base que incluye las herramientas  de manejo de paquetes es instalado en tu maquina.
Después, hay que ajustar el ambiente del shell para usar el software instalado por Fink.
Solo necesitaras hacer esto una vez; Fink puede ser actualizado sin reinstalar
(a partir de la versión 0.2.0).
Esto se revisa en el  <a href="upgrade.php?phpLang=es">Capítulo de Actualización</a>.
</p>
      <p>
Una vez que las herramientas de manejo de paquetes han sido instaladas, estan listas para ser usadas para instalar más software.
Esto se revisa en el  <a href="packages.php?phpLang=es">Capítulo de Instalación de Paquetes</a>.
</p>
    
    <h2><a name="bin">2.1 Instalando la distribución Binaria</a></h2>
      
      <p>
La distribución binaria existe como un paquete de Instalación de Mac OS X (.pkg),
empacado como una imágen de disco (.dmg).
Después de descargar la imágen de disco de la
<a href="http://www.finkproject.org/download/bindist.php">página de descarga</a>
(puedes usar la función "Salvar destino como ..." o "Descargar al Disco" function), dale doble click para montar el disco.
abra el ícono del disco "Fink 0.x.x Installer" que aparece en el escritorio después que el Disk Utility (ó Disk Copy, para OS previo al 10.3) a verificado el archivo.
Desntro encontrara Documentación y un paquete de Instalación.
Dele doble click al paquete de Instalación y siga las instrucciones que aparecen en pantalla.
</p>
      <p>
Le será solicitado la contraseña de administrador y algunos textos.
Por favor, lealos - podrían contener información más actualizada que esta guía del usuario..
Cuando el instalador pregunte en que unidad de disco se instalará el programa, asegurese de escoger el Volumen que contiene el Sistema (esto es, el Volumen donde esta el Mac OS X).
Si se escoge el Volumen incorrecto, Fink será instalado pero no funcionará.
Cuando el instalador termine, proceda con la
<a href="#setup">Sección Ajustando el Ambiente</a>.
</p>
    
    <h2><a name="src">2.2 Instalando la distribución Fuente</a></h2>
      
      <p>
La distribución fuente esta contenida en un tarball estándar de Unix (.tar.gz).
Solo contiene el manejador de paquetes <code>fink</code> así como la descripción del paquete y descargara la fuente de los paquetes de inmediato.
Puede obtenerse de la
<a href="http://www.finkproject.org/download/srcdist.php">Página de Descarga</a>.
Es importante no usar el StuffIt Expander para extraer el archivo
Por alguna razón el StuffIt aún no puede usar nombres de archivos largos.
Si el StuffIt Expander ya extrajo el archivo, destruya el folder que este crea.
</p>
      <p>
La fuente debe ser instalada directamente de la línea de comandos, así que hay que abrir la aplicación Terminal.app y cambiar el directorio a aquel donde se encuentra el archivo fink-0.x.x-full.tar.gz .

(Note: If you have OS X 10.4 and XCode 2.1, you should use
<code>fink-0.8.0-full-XCode-2.1.tar.gz</code> instead, and make
the appropriate changes below.)

El siguiente comando extrae el archivo:
</p>
      <pre>tar -xzf fink-0.x.x-full.tar.gz</pre>
      <p>
Esto creo un directorio con el mismo nombre que el archivo.
Seguiremos usando el <code>fink-0.x.x-full</code>

Ahora cambiemos a ese directorio recién creado y ejecutemos el script de bootstrap:
</p>
      <pre>cd fink-0.x.x-full
./bootstrap.sh</pre>
      <p>
Este script ejecutara algunas revisiones de tu sistema y usará el comando sudo para tener acceso de root - por lo tanto pedirá tu contraseña.
Entonces , el script solicitara el directorio de Instalación.
Lo más facíl es usar el directorio por omisión -
<code>/sw</code>.
Solo así se podrán instalar más tarde paquetes binarios descargados.
Todos los ejemplos usan ese directorio; así que sí lo cambias,  asegurate de sustituir el directorio en los lugares adecuados.
</p>
      <p>
Lo que sigue es configurar Fink.
Te serán solicitadas cosas como los ajustes de proxy y mirror y si deseas mensajes explicitos.
Si no entiendes alguna de las preguntas, presiona return y usaras la elección por defecto.
Este proceso puede ser ejecutado de nuevo usando el comando<code>fink
configure</code> .
</p>
      <p>
Cuando el script de bootstrap tenga toda la información que necesita, comenzará a descargar el código fuente para el sistema base y lo compilara. Ya no será necesaria ninguna interacción en este punto. 
Si observas algunos paquetes que son compilados dos veces, no te preocupes. Esto es normal, debido a que para construir un paquete binario del manejador de paquetes, es necesario tener un manejador de paquetes disponible.
</p>
      <p>
Cuando el bootstrap termine, proceda a la
<a href="#setup">Sección de Ajustar el Ambiente</a>.
</p>
    
    <h2><a name="setup">2.3 Ajustando su Ambiente</a></h2>
      
      <p>
Para usar el software instalado en la jerarquia de directorios de Fink, incluyendo el manejador de paquetes, hay que ajustar la variable de ambiente PATH (y lagunas otras variables).
En la mayoría de los casos, esto se puede hacer usando el comando
</p>
      <pre>open /sw/bin/pathsetup.command</pre>
      <p>
Sin embargo, si esto no funciona, se puede configurar manualmente. La configuración manual dependera del shell que se este usando. Para determinar el shell que se esta usando, se debe ejecutar en una terminal el comando:
</p>
      <pre>echo $SHELL</pre>
      <p>
 Si dice "csh" or "tcsh" , estas usando el C shell.  Si es 
 bash, zsh, sh, o algo similar, etas usando el equivalente al bourne shell.
</p>
      <ul>
        <li>
          <p>
            Bourne Shell (por omisión en Mac OS X 10.3 y posterior) </p>
          <p>
   Si usas el Bourne style shell (e.g. sh, bash, zsh), agrega las siguientes líneas al archivo<code>.profile</code> en tu directorio de home (o, si ienes un archivo<code>.bash_profile</code> debes usar el siguiente comando):
  </p>
          <pre>./sw/bin/init.sh</pre>
          <p>
   Si no sabes como agregar esta línea, ejecuta los siguientes comandos:
  </p>
          <pre>cd
pico .profile</pre>
          <p>
  Ahora debes ver una pantalla de terminal con un editor de textos y simplemente hay que escribir la línea <code>source /sw/bin/init.sh</code> .  Si aparece una nota que indique "New file" no hay que preocuparse.  Solo asegurese de presionar Return al meno suna ve después de la línea antes mencionada, luego Control-O, Return, y Control-X para salir del editor.
  </p>
        </li>
        <li>
          <p>
            C Shell (Por omisión en Mac OS X 10.2 y previos) </p>
          <p>
   Si usted usa tcsh (por omisión en  Mac OS X), agrege la siguiente línea al archivo<code>.cshrc</code> en tu directorio home:
  </p>
          <pre>source /sw/bin/init.csh</pre>
          <p>
     Ahora debes ver una pantalla de terminal con un editor de textos y simplemente hay que escribir la línea 

source /sw/bin/init.sh .  

Si aparece una nota que indique"New file" no hay que preocuparse.  Solo asegurese de presionar Return al meno suna ve después de la línea antes mencionada, luego Control-O, Return, y Control-X para salir del editor.</p><p>
  </p>
          <p>Existen algunas situaciones comunes donde será necesario editar algunos archivos adicionales:</p>
          <ol>
            <li>
              <p>Cuando se tiene un<code>~/.tcshrc</code>.</p>
     Dicho archivo es ocasionalmente creado por algunas aplicaciones o, podr�as haberlo creado tu mismo. 
En cualquier caso, lo que sucedera es que el          <p><code>~/.tcshrc</code>será leido y el 
  <code>~/.cshrc</code> ignorado.
  El procedimiento recomendado es editar el <code>~/.tcshrc</code> de manera similar a la que se uso con el 
  <code>~/.cshrc</code> above, agregando la siguiente línea al final:</p>
              <pre>source ~/.cshrc</pre>
              <p>De esa manera, aunque se remueva el <code>~/.tcshrc</code>, seguira siendo posible ejecutar Fink.</p>
            </li>
            <li>
              <p>Siga las instrucciones que se incluyen en <code>/usr/share/tcsh/examples/README</code>.</p>
              <p>Estas instrucciones indican la necesidad de crear un <code>~/.tcshrc</code> y un<code> ~/.login</code> .  Aqui el problemas es el <code>~/.login</code>, el cual es ejecutado después del <code>~/.tcshrc</code>, e indica<code>/usr/share/tcsh/examples/login</code>.  Esta última línea sobreescribe el ajuste previo del PATH. En este caso hay que crear un archivo tal que<code>~/Library/init/tcsh/path</code>:</p>
              <pre>mkdir ~/Library/init
  mkdir ~/Library/init/tcsh
  pico ~/library/init/tcsh/path</pre>
              <p>y poner la línea:</p>
              <pre>source ~/.cshrc</pre>
              <p>en el.  También hay que modificar el .tcshrc como en el objeto 1 mencionado arriba para asegurarse que el PATH es correcto en situaciones donde el  <code>~/.login</code> no es leido.</p>
            </li>
          </ol>
          <p>
  Editar el  .cshrc (y otros archivos de ínicio) solo afectara a los nuevos shells (i.e. nuevas terminales abiertas), así que es posbile que debas ejecutar el siguiente comando en todas las ventanas de la terminal que hayas abierto antes de editar el archivo<code>rehash</code> debido a que el tcsh almacena la lista de comandos disponibles de manera interna.
  </p>
        </li>
      </ul>
      <p>Note que los <code>init.sh</code> y <code>init.csh</code> scripts también agregarn las líneas
<code>/usr/X11R6/bin</code> y
<code>/usr/X11R6/man</code> al path para que se puede usar el X11 cuando este instalado.
Los paquetes de Fink tienen la habilidad de agregar ajustes por su cuenta, e.g. el paquete
qt pajusta la variable de ambiente QTDIR.
</p>
      <p>
Ua vez que el ambiente esta ajustado, procede al capitulo de 
<a href="packages.php?phpLang=es">Instalando Paquetes</a> para ver como se pueden instalar algunos paquetes muy útiles usando las varias herramientas de manejo de paquetes incluidas en Fink.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="packages.php?phpLang=es">3. Instalando Paquetes</a></p>
<? include_once "../../footer.inc"; ?>


