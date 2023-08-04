<?php
$title = "Guía del Usuario - Actualizaciones";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:49:23';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Guía del Usuario Contents"><link rel="next" href="conf.php?phpLang=es" title="El archivo de configuración de Fink"><link rel="prev" href="packages.php?phpLang=es" title="Instalando Paquetes">';


include_once "header.es.inc";
?>
<h1>Guía del Usuario - 4. Actualizando Fink</h1>
    
    
    
      <p>
Este capítulo cubre los procedimientos necesarios para actualizar tu instalación de Fink con lo último y lo mejor.
</p>
    
    <h2><a name="bin">4.1 actualizar usando los Paquetes Binarios</a></h2>
      
      <p>
Si solo usas la distribución binaria exclusivamente, no hay un procedimiento de actualización separado. Solo solicitale a la herramienta de tu elección que obtenga la lista de paquetes más reciente y permitele que actualice todos los paquetes.
</p>
      <p>
Para dselect, es suficiente con seleccionar "[U]pdate", y luego  "[I]nstall".
Desde luego que podras ejecutar "[S]elect" antes que "[I]nstall" para revisar las selecciones que fueron hechas o averiguar acerca de cualquier paquete nuevo.
</p>
      <p>
Para apt, ejecuta <code>apt-get update</code> para obtener la lista de paquetes más reciente, luego<code>apt-get upgrade</code> para actualizar todos los paquetes que tengan una nueva versión disponible.
</p>
      <p>Para el Fink Commander, selecciona las descripcionesBinary-&gt;Update descriptions para actualizar la lista de paquetes, y luego Binary-&gt;Dist-Upgrade packages para actualizar a las nuevas versiones.</p>
      <p>
Para mayor información, especificamente acerca de la actualización de versiones de Fink previas a la 0.3.0, revisa la
<a href="/download/upgrade.php">Matriz de Actualización</a>.
</p>
    
    <h2><a name="src">4.2 Actualizando la distribución Fuente</a></h2>
      
      <p>
Actualizar la distribución fuentees un poco más complicado. El procedimiento consiste de dos pasos.
En el primero, se descargan las descripciones de los paquetes más recientes.
En el segundo, estas descripciones son usadas para compilar los nuevos paquetes; el código fuente se descarga conforme se requiera.
</p>
      <p>
Si tienes Fink 0.2.5 o posterior instalado, el primer paso se logra ejecutando el comando<code>fink selfupdate</code>.
Este comando revisara si el sitio web de Fink contiene alguna nueva versión puntual, y automaticamente descargara e instlara ls descripciones de los paquetes en caso de existir nuevas versiones. 
En las versiones recientes del comando <code>fink</code> se te da la opción de obtener las descripciones de los paquetes directamente del git o via rsync. El Git es un depósito de versiones controladas donde las descripciones de los paquetes son almacenadas. 
Usando el Git uno obtiene varias ventajas, como actualizaciones  continuas, pero desventajas como el hecho de que en el Git hay solo una copia de los archivos- Por lo tanto, si hay mucho tráfico, el Git no es confiable.
Por esta razón, se recomienda que en general se use rsync (el cual tiene multiples espejos), cuyo única desventaja es que las descripciones son una hora más viejas que las disponibles para el Git.
</p>
      <p>(Si enfrentas algun problema al actualizar la Instalación del código fuente, consultaIf you are having trouble upgrading a source installation, consult
<a href="/download/fix-upgrade.php">las
instrucciones especiales</a>.)</p>
      <p>
Si posees una versión de Fink previa a la 0.2.5, es necesario que descarges manualmente las descripciones de los paquetes.
Visita el <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">área de descargas</a> y busca los últimos paquetes con el nombre packages-0.x.x.tar.gz en el "módulo" de distribución.
Descargalo e instala como sigue:</p>
      <pre>tar -xzf packages-0.x.x.tar.gz
cd packages-0.x.x
./inject.pl</pre>
      <p>
Una vez que hayas actualizado las descripciones de los paquetes ( no importa como lo hayas hecho ) debes actualizar todos los paquetes con el comando:<code>fink
update-all</code>.
</p>
      <p>Para actualizar la distribución fuente usando el Fink Commander, selecciona Source-&gt;Selfupdate para bajar la nueva información de los  paquetes y entoncest Source-&gt;Updata-all para actualizar los paquetes atrasados.</p>
    
    <h2><a name="mix">4.3 Mezclas de Binarios y Código Fuente</a></h2>
      
      <p>
Si usas tanto paquetes binarios precompilados como algunos compilados desde la fuente, deberas seguir ambos sets de instrucciones para actualizar tu Instalación de Fink.
Esto es, usa primero el  <code>dselect</code> o <code>apt-get</code> para obtener las últimas versiones de los paquetes disponibles como binarios, entonces usa el<code>fink selfupdate</code> y <code>fink update-all</code>
para obtener las descripciones actules y actualizar los paquetes restantes. Si usas el Fink Commander, sigue las instrucciones<a href="#bin">binarias</a> y después las del  <a href="#src">código fuente</a>.
</p>

<p>Starting with fink 0.23.0 using the UseBinaryDist option (settable via the
<a href="usage.php?phpLang=es#options">--use-binary-dist (or -b) option</a>
or in the <a href="conf.php?phpLang=es">Fink configuration file</a>) both source and
binary descriptions will be updated if you call <code>fink selfupdate</code>.
In this case you don't need a separate <code>apt-get</code> call anymore.</p>
<p>If you are using Fink Commander select Binary-&gt;Update descriptions to update
the package list, and then Binary-&gt;Dist-Upgrade packages to update to new
versions. After that do Source-&gt;Selfupdate to download new package
information files, and then Source-&gt;Update-all (see previous sections for
details).</p>

    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="conf.php?phpLang=es">5. El archivo de configuración de Fink</a></p>
<?php include_once "../../footer.inc"; ?>


