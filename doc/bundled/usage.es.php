<?php
$title = "Uso";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:17';
$metatags = '';


include_once "header.inc";
?>
<h1>Uso de Fink</h1>
<!--Generated from $Fink: usage.es.xml,v 1.3 2012/11/11 15:20:17 gecko2 Exp $--><h2><a name="">Configurando PATH</a></h2>
      

      <p>Para usar el software que esta instalado en jerarquía del directorio de Fink, incluyendo el comando fink, debe de configurar el ambiente del inconstante PATH. Para facilitarles esto, shell scripts han sido incluidos. Si usa tcsh, agregue en .chrc:</p>

      <pre>source /sw/bin/init.csh</pre>

      <p>Revisando su .cshrc solo afectara sus nuevas shells (ejemplo, abriendo nuevas terminales), so debe de correr este comando en todas las terminales que tenía abiertas antes de haber modificado .cshrc. También necesitara correr el comando 
      <code>rehash</code>

      porque tcsh cachea la lista de commandos internamente.</p>

      <p>si usa Bourne shell (ejemplo: sh, bash, zsh), use:</p>

      <pre>source /sw/bin/init.sh</pre>

      <p>Fíjese en que los scripts también agregan /usr/X11R6/bin y /usr/X11R6/man a su PATH parqué puedo usa X11 cuando este instalado. Los paquetes tienes la habilidad de agregar sus propias configuraciones, por ejemplo el paquete de establece el QTDIR enviornment variable.</p>
   <h2><a name="">Usando Fink</a></h2>
   

   <p>Fink tiene muchos comandos que trabajan en los paquetes. Todos de esos paquetes necesitan por los menos un nombre, también todos pueden usar varios nombres al mismo tiempo. Usted puede especificar el nombre del paquete (ejemplo gimp), o un nombre completamente titulado por la versión (ejemplo gimp-1.2.1 o gimp-1.2.1-3). Fink automáticamente escojera versión y revisión mas reciente que esta disponible cuando no has sido especificado.</p>
   
   <p>Lo que sigue es una lista de comandos que Fink entiende:</p>
   <h2><a name="">Install</a></h2>
      

      <p>El comando install se usa para instalar paquetes. Lo baja, lo configura, lo construye, e instala los paquetes que usted le diga. También instalara los paquetes que depende en, pero le preguntara por su confirmación antes de hacerlo. Ejemplo:</p>

      <pre>fink install nedit Reading package info... Information about 131 packages read. The following additional package will be installed: lesstif Do you want to continue? [Y/n]</pre>

      <p>Alias del comando install: update, enable, activate, use. (La mayoría esta por razones históricas.)</p>
   <h2><a name="">Remove</a></h2>
      

      <p>El comando remove quita los paquetes que están en su sistema, hace esto usando el comando ‘dpkg –remove’. La implementación corriente tiene unos problemas: Solo trabaja con paquetes que Fink sabe de (ejemplo cuando el file .info esta presente); y tampoco no busca los paquetes que dependen en ese paquete, envés los deja para el programa dpkg (regularmente esto no causa problema).</p>

      <p>El comando remove quita los paquetes, pero deja los programas que son compressed en .deb. EEsto significa que podrá instalar renuevo el paquete sin hacer el proceso de compilar el paquete. Si necesita el espacio, pueda borrar los paquetes .deb del directorio /sw/fink/dists.</p>

      <p>Aliases: disable, deactivate, unuse, delete, purge.</p>
   <h2><a name="">update-all</a></h2>
      

      <p>El comando update-all baja los paquetes mas recientes que ya tiene en el sistema. Solo tiene que escribir lo que sigue en una terminal:</p>

      <pre>fink update-all</pre>
   <h2><a name="">list</a></h2>
      

      <p>El comando list produce una lista de los paquetes que están disponible, incluyendo el status de instalaciones, la versión mas reciente y una corta descripción. Si corre el comando sin parámetro, listara todos los paquetes que estan disponible. También puede pasarle al comando list un nombre o un “shell pattern”, y fink le dará una lista de los paquetes que encontró.</p>

      <p>La primera columna enseña el estado de la instalación con lo siguiente:</p>

      <pre>not installed i latest version is installed (i) installed, but a newer version is available</pre>

      <p>Unos ejemplos:</p>

      <pre>fink list - list all packages fink list bash - check if bash is available and what version fink list "gnome*" - list all packages that start with 'gnome'</pre>

      <p>Las citas en el ultimo ejemplos son necesarias para que la shell intreprea la orden.</p>
   <h2><a name="">describe</a></h2>
      

      <p>Este comando enseña una descripción de los paquetes que usted pida. Anote que solo unos pocos paquetes tienen una descripción.</p>

      <p>Aliases: desc, description, info</p>
   <h2><a name="">fetch</a></h2>
      

      <p>Baja los paquetes que le diga, pero no lo instala. Este comando baja los tarballs en que ya vean sido bajado anteriormente.</p>
   <h2><a name="">fetch-all</a></h2>
      

      <p>Baja 
      <b>todos</b>

      los paquentes en source. Fetch baja los tarballs, en que ya vean sido bajado.</p>
   <h2><a name="">fetch-missing</a></h2>
      

      <p>Baja 
      <b>Todos</b>

      los paquetes en source. Este comando solo baja los files que no están presente en el sistema.</p>
   <h2><a name="">build</a></h2>
      

      <p>Construye un paquete, pero no lo instala. Como siempre, los source tarballs son bajados si no son encontrados. Resulta en un comando que crea un paquete .deb, en que puede instalar cuando quiera. Este comando no hará nada si el paquete ya esta en .deb Nota que las dependencias serán todavía 
      <b>instalado</b>

      no solo construido.</p>
   <h2><a name="">rebuild</a></h2>
      

      <p>Construye el paquete (como el comando build), pero ignora y escribe un nuevo paquete .deb que tambien sera instalado el sistema con dpkg. Sirve mucho cuando uno esta creando un paquete.</p>
   <h2><a name="">reinstall</a></h2>
      

      <p>Es lo mismo que el comando install, pero instala los paquetes vía dpkg en que ya estuviera instalado. Puede usar este comando cuando accidentalmente usted borro files que depende el paquete o cuando cambia los files de configuración y los quiere ha como estaban previamente.</p>
   <h2><a name="">configure</a></h2>
      

      <p>Vuelve a correr el proceso de configuración de Fink.Le dará opción de cambiar los mirror sites y proxy settings, y mas.</p>
   <h2><a name="">selfupdate</a></h2>
      

      <p>Este comando solo le ara upgrade ha fink que han sido hechos libre, pero puede usar el comando para hacer un upgrade de la versión CVS a una versión regular. El comando no correrá si usted ha puesto /sw/fink que obtenga paquetes directamente de CVS.</p>
   <h2><a name="">Preguntas adiccionales</a></h2>
      

      <p>Si sus preguntas no han sido contestadas por este documento, lea el FAQ que se puede encontrar en el website de Fink: 
      <a href="/faq/">/faq/</a>

       Si el FAQ no le contesto su pregunta, subscríbase ala lista de correo de Fink. fink-users mailing list via 
      <a href="/lists/fink-users.php">/lists/fink-users.php</a>

      pregunte ahí.</p>
   
<?php include_once "../footer.inc"; ?>


