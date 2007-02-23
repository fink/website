<?
$title = "Guía del Usuario - fink.conf";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:56';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Guía del Usuario Contents"><link rel="next" href="usage.php?phpLang=es" title="Usando el Fink desde la línea de comando"><link rel="prev" href="upgrade.php?phpLang=es" title="Actualizando Fink">';


include_once "header.es.inc";
?>
<h1>Guía del Usuario - 5. El archivo de configuración de Fink</h1>
    
    
    
      <p>
Este capítulo explica las variables existentes en el archivo de configuración del Fink (fink.conf) y como influencian el comportamiento del Fink, especificamente de la herramienta de línea de comandos<code>fink</code> (i.e. mientras se trabaja con la distribución fuente).
</p>
    
    <h2><a name="about">5.1 Acerca de fink.conf</a></h2>
      
      <p>
Cuando Fink es instalado inicialmente te pide varias elecciones en torno a cosas como los <a href="#mirrors">espejos</a> que prefieres usar para descargar los archivos y como adquirir derehos de superusuario. Puedes volver a ejecutar este proceso usando el comando <code>fink configure</code> Para cambiar algunas de estas opciones, puede ser necesario que edites tu archivo <b>fink.conf</b> a mano. en
general, estas opciones son solamente para usuarios avanzados.
</p>
      <p>
El archivo <b>fink.conf</b> se localiza en el directorio
<code>/sw/etc/fink.conf</code>, y puede ser editado con tu editor de texts favorito. Pero se necesitaran derechos de superusuario.
</p>
    
    <h2><a name="syntax">5.2 Sintaxis del fink.conf</a></h2>
      
      <p>
Tu archivo fink.conf fde varias �neas, redactadas en el siguiente formato:</p>
      <pre>Optionname: Value</pre>
      <p>Las opciones (Options) solo pueden ser una por línea y esta separada de su valor (Value) por ":" y un solo espacio. El contenido del valor depende de la opción, pero normalemte es booleano (Verdadero o Falso, "True" or "False"), una línea
, o una lista de líneas delimitados por un espacio. 
Por ejemplo:
</p>
      <pre>
BooleanOption: True
StringOption: Something
ListOption: Option1 Option2 Option3
</pre>
    
    <h2><a name="required">5.3 Configuración requerida</a></h2>
      
      <p>
Algunas de las configuraciones del  <b>fink.conf</b> son requeridas. Sin ellas, Fink no puede funcionar adecuadamente. La siguiente configuración pertenece a esa categoría .
</p>
      <ul>
        <li>
          <p>
            <b>Basepath:</b> path</p>
          <p>
Le dice a Fink donde esta instalado, por omisión<b>/sw</b> a menos que lo hayas cambiado durante la Instalación. Este valor  
<b>no</b> debe cambiar después de la Instalación, ya que solo confundira al Fink
</p>
        </li>
      </ul>
    
    <h2><a name="optional">5.4 Ajustes opcionales del usuario</a></h2>
      
      <p>
Existen varios ajustes opcionales que el usuario puede cambiar para alterar el comportamineto del Fink.
</p>
      <ul>
        <li>
          <p>
            <b>RootMethod:</b> su o sudo o none</p>
          <p>Para algunas operaciones, Fink necesita permisos de superusuario. Los valores reconocidos son<b>sudo</b> o <b>su</b>. También puedes poner este ajuste como
<b>none</b>, en cuyo caso deberas ejecutar Fink como root por ti mismo. El valor por defecto es  <b>sudo</b> y en la mayoría de los casos no tendra que ser cambiado.</p>
        </li>
        <li>
          <p>
            <b>Arboles:</b> lista de arboles</p>
          <p>Los arboles disponibles son:</p>
          <pre>
local/main      - cualquier paquete local que quieras instalar
local/bootstrap - paquetes usados durante la Instalación de Fink
stable/crypto   - paquetes criptograficos estables
stable/main     - otros paquetes estables
unstable/crypto - paquetes criptograficos inestables
unstable/main   - otros paquetes inestables
</pre>
          <p>
También puedes agregar tus propios arboles en el directorio <code>/sw/fink/dists</code>
aunque esto no es necesario en muchos casos. Los arboles por defecto son "local/main local/bootstrap
stable/main". Esta lista debermantenerse sincronizada con el archivo
<code>/sw/etc/apt/sources.list</code> .
</p>
        </li>
        <li>
          <p>
            <b>distribución:</b> 10.1 or 10.2</p>
          <p>Fink necesita saber que versión de Mac OS X estas usando. La distribución 10.1des para usuarios de Mac OS X 10.1, mientras que la 10.2 funcionara solo para Mac OS X 10.2 "Jaguar" .
Mac OS X 10.0 y previos no son soportados. No es necesario modificar este valor.
</p>
        </li>
        <li>
          <p>
            <b>FetchAltDir:</b> path</p>
          <p>usualmente Fink almacenará el código fuente que descarge en el directorio
<code>/sw/src</code>. Con esta opción se puede seleccionar un directorio alterno para buscar el código fuente. Por ejemplo:
</p>
          <pre>FetchAltDir: /usr/src</pre>
        </li>
        <li>
          <p>
            <b>Verbose:</b> un número de 0 a 3</p>
          <p>
Esta opción determina cuanta información Fink te da respecto a lo que esta haciendo. Los valores son:
<b>0</b>
            Quiet (no muestra el estado de las descargas)
<b>1</b>
            Low (no muestra la expansión de los archivos comprimidos)
<b>2</b>
            Medium (muestra casi todo)
<b>3</b>
            High (muestra todo)
el valor por omisión es 1.
</p>
        </li>
        <li>
          <p>
            <b>NoAutoIndex:</b> boolean</p>
          <p>Fink almacena su propia descripción en los archivos del folder  /sw/var/db/fink.db para evitar el leerla cada vez que es ejecutado. Fink
revisa si el indice de paquetes necesita ser actualizado, a menos que esta opción este indicada como "True". El valor por omisión es "False" y no es recomendado cambiarlo. Si lo cambias, es posible que sea necesarioejecutar el comando 
<code>fink index</code> para actualizar el indice.</p>
        </li>
        <li>
          <p>
            <b>SelfUpdateNoCVS:</b> boolean</p>
          <p>El comando <code>fink selfupdate</code> actualiza el manejadro de paquetes del Fink a la última versión. Esta opción se asegura de que el CVS (Concurrent Version System) no se usado para almacenar esto cuando esta como "
True. Este valor es ajustado automaticamente cuand el comando <code>fink
selfupdate-cvs</code> es ejecutado, así que no es necesario cambiarlo manualmente.</p>
        </li>
      </ul>
    
    <h2><a name="downloding">5.5 Ajustes de  Descargas</a></h2>
      
      <p>Hay varios ajustes que influencian como descarga Fink los datos de los paquetes.</p>
      <ul>
        <li>
          <p>
            <b>ProxyPassiveFTP:</b> boolean</p>
          <p>Esta opción hace que Fink use el modo pasivo de FTP para las descargas. Algunos servidores de FTP o configuraciones de Red requieren esta opción como 
True. Es recomendable dejar esta opción encendida todo el tiempo, debido a que el FTP activo esta desapareciando.</p>
        </li>
        <li>
          <p>
            <b>ProxyFTP:</b> url</p>
          <p>Si usas un proxy de FTP aqui es donde debe ir su direcci�n, por ejemplo:</p>
          <pre>ProxyFTP: ftp://yourhost.com:2121/</pre>
          <p>Debe permanecer vacío en caso de no haber proxy.</p>
        </li>
        <li>
          <p>
            <b>ProxyHTTP:</b> url</p>
          <p>Si usas un proxy de HTTP, aquí debe ir su direcci�n, por ejemplo:</p>
          <pre>ProxyHTTP: http://yourhost.com:3128/</pre>
          <p>Si no usas un proxy de HTTP, deja este ajuste vacío.</p>
        </li>
        <li>
          <p>
            <b>DownloadMethod:</b> wget o curl o axel o axelautomirror</p>
          <p>Fink puede usar tres diferentes aplicaciones para descargar archivos de la Internet - <b>wget</b>, <b>curl</b>, o <b>axel</b>. El valor
<b>axelautomirror</b> usa un modo experimental de la aplicación<b>axel</b>
la cual trata de determinar cual es el servidor más cercano para cierto archivo. El uso de <b>axelmirror</b> no es recomendado por el momento. El valor por omisión es <b>curl</b>.
<b>Desde luego, la aplicación seleccionada para DownloadMethod DEBE estar instalada.</b>
          </p>
        </li>
      </ul>
    
    <h2><a name="mirrors">5.6 Ajustes de Espejo</a></h2>
      
      <p>Obtener software del interner puede ser algo tedioso y usualmente no tan veloz como nos gustaría que lo fuera. Los servidores espejo alamcenan copias de otros servidores, pero ueden tener conecciones más veloces o estar geográficamente más cerca a ti, permitiendote descargar más rápido. También ayudan a reducir la carga sobre los srvidores primarios, como son el <b>ftp.gnu.org</b>, y proveen una alternativa en caso de que algun servidor no este disponible.</p>
      <p>Con el fin de que Fink obtenenga el mejor espejo para ti, debes decirle en que continente y pais resides. Si las descargas de un servidor fallan, te preguntara si quieres reintentarlo o si prefieres usar otro epejo en el mismo pais o continente, o de otro espejo en cualquier lugar del mundo.</p>
      <p>El archivo <b>fink.conf</b> contiene los ajustes de los servidoresque podrías usar.</p>
      <ul>
        <li>
          <p>
            <b>MirrorContinent:</b> Un código de tres letras</p>
          <p>Este valor lo debes cambiar usando el comando <code>fink configure</code>
. El código de tres letras puede ser encontrado en el archivo
<code>/sw/lib/fink/mirror/_keys</code>.
Por ejemplo, si resides en Europa:</p>
          <pre>MirrorContinent: eur</pre>
        </li>
        <li>
          <p>
            <b>MirrorCountry:</b> Código de seis letras</p>
          <p>Este valor debes cambiarlo usando el comando <code>fink configure</code>
El código puedes encontrarlo en 
<code>/sw/lib/fink/mirror/_keys</code>.
Por ejemplo, si vives en Austria:</p>
          <pre>MirrorCountry: eur-AT</pre>
        </li>
        <li>
          <p>
            <b>MirrorOrder:</b> MasterFirst o MasterLast o MasterNever o ClosestFirst</p>
          <p>
Fink soporta espejos 'Master' que son depositos espejo de los archivos de fuentepara todos los paquetes de Fink. La ventaja de usar rl espejo Master es que los URLs de las descargas fuente nunca se romperan. Los usuarios pueden así escoger el uso de los espejos manenidos por el equipo de Fink, o usar solo los URLs del fuente original y algunos espejos externos como el del Gnome, JKDE, y espejos de Debian.
Adicionalmente, el usuario puede combinar ambos sets, buscados en orden de proximidad, como se documenta arriba. Cuando se usan las opciones  MasterFirst o MasterLast , el usuario puede saltarse al Master (o al no-Master) si la descarga falla. Las opciones son:
</p>
          <pre>
MasterFirst - Busca los espejos "Master" primero.
MasterLast - Busca los espejos "Master" al final.
MasterNever - Nunca usa espejos"Master" .
ClosestFirst - Buca la lista de espejos más cercanos (combina todos los espejos).
</pre>
        </li>
      </ul>
    
    <h2><a name="developer">5.7 Ajustes de Desarrollador</a></h2>
      
      <p>Algunas opciones en el archivo  <b>fink.conf</b> solo son utiles para los desarrolladores. Se recomienda que los usuarios convencionales del Fink no los modifiquen. Las siguientes opciones caen en esa categoría.</p>
      <ul>
        <li>
          <p>
            <b>KeepRootDir:</b> boolean</p>
          <p>Ocasiona que el Fink no borre el directorio /sw/src/root-[name]-[version]-[revision] despues de haber construido el paquete. Es por omisión false. <b>Hay que ser cuidadoso, con esta opción un disco duro puede llenarse rapidamente!</b>
          </p>
        </li>
        <li>
          <p>
            <b>KeepBuildDir:</b> boolean</p>
          <p>Ocasiona que el Fink no borre el directorio /sw/src/[name]-[version]-[revision] despues de haber construido el paquete. Es por omisión false. <b>Hay que ser cuidadoso, con esta opción un disco duro puede llenarse rapidamente!</b>
          </p>
        </li>
      </ul>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=es">6. Usando el Fink desde la línea de comando</a></p>
<? include_once "../../footer.inc"; ?>


