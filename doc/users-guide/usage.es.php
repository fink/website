<?
$title = "Guía del Usuario - Herramienta fink ";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2004/08/12 15:01:32';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Guía del Usuario Contents"><link rel="prev" href="conf.php?phpLang=es" title="El archivo de configuración de Fink">';


include_once "header.es.inc";
?>
<h1>Guía del Usuario - 6. Usando el Fink desde la línea de comando</h1>
    
    
    <h2><a name="using">6.1 Usando la herramienta fink</a></h2>
      
      <p>La herramienta <code>fink</code> usa varios comandos estilo sufijo que actuan sobre los paquetes de la distribución de código. Algunos necesitan al menos el nombre de un paquete, pero pueden manejar varios paquetes al mismo tiempo. Puedes especificar solamente el nombre del paquete (e.g. gimp), o un nombre completo con versión (e.g. gimp-1.2.1 or
gimp-1.2.1-3). Fink automaticamente buscara la versión más reciente disponible cuando esta no sea especificada. Otros tiene opciones diferentes.
</p>
      <p>Lo que sigue es una lista de los comandos de la herramienta fink <code>fink</code> :</p>
    
    <h2><a name="install">6.2 install</a></h2>
      
      <p>El comando install es usado para instalar programas. Descarga, configura, construye e instala los paquetes que nombres. También instalará las dependencias requeridas automaticamente, pero pedira autorización antes de hacerlo. Ejemplo:</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      <p>Alias para el comando install: update, enable, activate, use (esto es por razones historicas).</p>
    
    <h2><a name="remove">6.3 remove</a></h2>
      
      <p>Este comando remueve los paquetes del sistema invocando el comando '<code>dpkg --remove</code>'. La actual implementación tiene algunas fallas: Solo funciona con los paquetes que <code>fink</code> conoce (i.e. donde hay un archivo .info file presente); y no revisa las dependencias sino que se lo deja por completo a la herramienta dpkg tool (aunque esto rara vez causa problemas).</p>
      <p>El comando remove solo remueve los archivos del paquete, pero deja el archivo .deb comprimiro del paquete intacto. Esto significa que puedes reinstalar el paquete despues sin tener que pasar por el proceso de compilación. Si necesitas el espacio de disco, puedes remover el archivo .deb del directorio
<code>/sw/fink/dists</code> .</p>
      <p>Alias: disable, deactivate, unuse, delete.</p>
    
    <h2><a name="update-all">6.4 update-all</a></h2>
      
      <p>Este comando actualiza todos los paquetes instalados a la versión más reciente. No necesita la lista de paquetes, solo debes ejecutar el comando:</p>
      <pre>fink update-all</pre>
    
    <h2><a name="list">6.5 list</a></h2>
      
      <p>
Este comando muestra una lista de los paquetes disponibles, el estatus de la Instalación, la última versión, y una pequeña descripción del paquete.
Tambien se le puede añadir un nombre o un patr�n del shell y fink mostrara una lista de los paquetes que encajen cn dicho nombre.
</p>
      <p>
La primera columna muestra el estado de la Instalación de la siguiente manera:
</p>
      <pre>
     no instalado
 i   la versión más reciente esta instalada
(i)  instalado, pero hay una nueva versión disponible
</pre>
      <p>
Estas son las opciones para el comando <code>fink list</code> 
</p>
      <pre>
-h,--help
	  Muestra las opciones disponibles..
-t,--tab
	  Este da una lista delimitada por tabulaciones, usualmente util 	  para usarla después en un script.
-i,--installed
	  Solamente muestra lo paquetes instalados actualmente.
-o,--outdated
	  Muestra solo los paquetes que son viejos.
-u,--uptodate
	  Muestra solo los paquetes actualizados.
-n,--notinstalled
	  Muestra los paqutes que no estan actualizados.
-s=expr,--section=expr
	  Solo muestra los paquetes en la sección indicada en la 			  expresión expr.
-w=xyz,--width=xyz
	  Determina el ancho del despliege de la lista. xyz es o un 			  valor numerico o auto. auto ajustara el ancho de acuerdo al 		  ancho de la terminal
	  Por omisión es auto.
</pre>
      <p>
Algunos ejemplos son estos:
</p>
      <pre>
fink list                 - Lista todos los paqutes.
fink list bash            - Revisa si bash esta disponible y cual 				        versión.
fink list --outdated      - Lista de paquetes no actualizados
fink list --section=kde   - Lista de paquetes en la Sección KDE
fink list "gnome*"         - Lista todos los paquetes que empiezan con la 			palabra 'gnome'
</pre>
      <p>
Las comillas en el último ejemplo son necesarias para evitar que el shell interprete el patron por si mismo.
</p>
    
    <h2><a name="apropos">6.6 apropos</a></h2>
      
      <p>
Este comando se comporta de manera identica al comandoT<code>fink list</code>. La diferencia más notable es que <code>fink apropos</code> también revisa las descripciones de los paquetes. La segunda diferencia es que un línea de busqueda debe ser proporcionada, no es opcional.
</p>
      <pre>
fink apropos irc          - lista los paquetes en que 'irc' aarece en el 				nombre o descripción del paquete.
fink apropos -s=kde irc   - igual que arriba, pero restringe los paquetes 			a la Sección kde.
</pre>
    
    <h2><a name="describe">6.7 describe</a></h2>
      
      <p>
Este comando despligea la descripción del paquete que le sea indicado en la línea de comando. Note, por favor, que solo algunos paquetes tiene una descripción.
</p>
      <p>
Alias: desc, description, info
</p>
    
    <h2><a name="fetch">6.8 fetch</a></h2>
      
      <p>Descarga los paquetes nombrados, pero no los instala. Este comando descarga los archivos tar aunque se hayan descargado previamente.</p>
    
    <h2><a name="fetch-all">6.9 fetch-all</a></h2>
      
      <p>Descarga <b>todos</b> las fuentes de los paquetes. Al igual que fetch, descarga los archivos tar aunque hayan sido descargados previamente.</p>
    
    <h2><a name="fetch-missing">6.10 fetch-missing</a></h2>
      
      <p>Descarga <b>todos</b> las fuentes de los paquetes. Este comando solo descarga archivos que no esten presentes en el sistema.</p>
    
    <h2><a name="build">6.11 build</a></h2>
      
      <p>Construye un paquete pero no lo instala. Como es usual, los archivos tar solo serán descargados en caso de no encontrarse en el sistema. El resultado de este comando en un .deb instalable que puede ser instlado posteriormente con el comando install. Este comando no hara nada si el archivo .deb ya existe. Note que las dependencias serán 
<b>instaladas</b>, no solamente construidas.</p>
    
    <h2><a name="rebuild">6.12 rebuild</a></h2>
      
      <p>Construye el paquete (al igual que el comando build), pero ignora y sobreescribe el archivo .deb existente. Si el paquete es instalado, el nuevo .deb también será instalado en el sistema mediante el <code>dpkg</code>. Esto es muy util durante el desarrollo de paquetes. 
</p>
    
    <h2><a name="reinstall">6.13 reinstall</a></h2>
      
      <p>Identico a install, pero instala los paquetes mediante  <code>dpkg</code> aún cuando ya estan instalados. Puedes usar este comando cuando has borrado accidentalmente algun paquete, o cambiado la configuración y quieres recuperar los valores por omision.</p>
    
    <h2><a name="configure">6.14 configure</a></h2>
      
      <p>
Re-ejecuta el procesos de configuración de Fink. Este comando te permitira cambiar los espejos, la configuracion del proxy, y otras cosas.
</p>
    
    <h2><a name="selfupdate">6.15 selfupdate</a></h2>
      
      <p>
	Este comando automatiza el proceso de actualización del Fink. Revisa el sitio web, verifica si existe una versión nueva disonible y en caso de haberla, decarga las descripciones del paquete y actualiza los paquetes centrales, incluyendo al propio<code>fink</code> . Este comando actualiza las versiones regulares, pero puedes modificar el directorio  <code>/sw/fink/dists</code>
	para obtener actualizaciones directamente del CVS, accediendo así a las actualizaciones m��s recientes de todos los paquetes.
</p>
    
    <h2><a name="index">6.16 index</a></h2>
      
      <p>
   Reconstruye el cache de los paquetes. Usualmente no hay que ejecutar esto manualmente, debido a que <code>fink</code> lo realiza automaticamente cuando debe ser actualizado.
</p>
    
    <h2><a name="validate">6.17 validate</a></h2>
      
      <p>
   Este comando ejecuta varias verificaciones en los archivos .info and .deb. Aquellas personas que dan mantenimiento a algun paquete, deben ejecutar este comando sobre sus paquetes antes de someterlos al Fink. 
</p>
      <p>
   Alias: check
</p>
    
    <h2><a name="scanpackages">6.18 scanpackages</a></h2>
      
      <p>
   Ejecuta dpkg-scanpackages(8) usando los árboles especificados.
</p>
    
    <h2><a name="cleanup">6.19 cleanup</a></h2>
      
      <p>
   Remueve los archivos de los paquetes obsoletos (.info, .patch, .deb) en cuanto existan versiones nuevas 
   Este puede recuperar gran cantidad de espacio de disco duro.
</p>
    
  
<? include_once "../../footer.inc"; ?>


