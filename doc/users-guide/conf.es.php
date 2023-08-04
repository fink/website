<?php
$title = "Guía del Usuario - fink.conf";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:49:23';
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
<code>/opt/sw/etc/fink.conf</code>, y puede ser editado con tu editor de texts favorito. Pero se necesitaran derechos de superusuario.
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
Le dice a Fink donde esta instalado, por omisión<b>/opt/sw</b> a menos que lo hayas cambiado durante la Instalación. Este valor  
<b>no</b> debe cambiar después de la Instalación, ya que solo confundira al <b>fink</b>
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
            <b>Trees:</b> (Arboles) lista de arboles</p>
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
También puedes agregar tus propios arboles en el directorio <code>/opt/sw/fink/dists</code>
aunque esto no es necesario en muchos casos. Los arboles por defecto son "local/main local/bootstrap
stable/main". Esta lista debermantenerse sincronizada con el archivo
<code>/opt/sw/etc/apt/sources.list</code> .

(As of fink 0.21.0, <code>fink</code>does this for you automatically.)

</p>

<p>The order of the trees is meaningful, as packages from later trees in the list may
override packages from earlier ones.</p>

        </li>
        <li>
          <p>
            <b>Distribution:</b> (distribución) 10.1, 10.2-gcc3.3, 10.3, or 10.4</p>
          <p>Fink necesita saber que versión de Mac OS X estas usando. La distribución 10.1des para usuarios de Mac OS X 10.1, mientras que la 10.2 funcionara solo para Mac OS X 10.2 "Jaguar" .
Mac OS X 10.0 y previos no son soportados. No es necesario modificar este valor.
</p>
        </li>
        <li>
          <p>
            <b>FetchAltDir:</b> path</p>
          <p>usualmente <code>fink</code> almacenará el código fuente que descarge en el directorio
<code>/opt/sw/src</code>. Con esta opción se puede seleccionar un directorio alterno para buscar el código fuente. Por ejemplo:
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
        
        <li><p><b>SkipPrompts:</b> a comma-delimited list</p><p>(<code>fink-0.25</code> and later) This option instructs <code>fink</code> to refrain from asking for input when
           the user does not want to be prompted. Each prompt belongs to a
           category. If a prompt's category is in the SkipPrompts list then
           the default option will be chosen within a very short period of
           time.</p><p>Currently, the following categories of prompts exist:</p><p><b>fetch</b> - Downloads and mirrors</p><p><b>virtualdep</b> - Choosing between alternative packages</p><p> By default, no prompts are skipped.</p></li>
        
        <li>
          <p>
            <b>NoAutoIndex:</b> boolean</p>
          <p>Fink almacena su propia descripción en los archivos del folder /opt/sw/var/db/fink.db para evitar el leerla cada vez que es ejecutado. Fink
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

        <li>
	  <p>
	    <b>Buildpath:</b> path</p>
	  <p>Fink needs to create several temporary directories for
each package it compiles from source. By default, they are placed
in <code>/opt/sw/src</code> on Panther and earlier, and 
<code>/opt/sw/src/fink.build</code> on Tiger. If you want them to be
somewhere else, specify the path here. See the descriptions of
the <code>KeepRootDir</code> and <code>KeepBuildDir</code> fields
 in the <a href="#developer">Developer Settings</a> section of this document for more information about these temporary
directories.
	    </p>
	    <p>On Tiger, it is recommended that the Buildpath end with <code>.noindex</code>
or <code>.build</code>. Otherwise, Spotlight will attempt to index the temporary files in
the Buildpath, slowing down builds.
    	</p>
	</li>
        <li><p><b>Bzip2Path:</b> the path to your <code>bzip2</code> (or compatible) binary
          </p><p>(<code>fink-0.25</code> and later) The Bzip2Path option lets you override the default path for the
           <code>bzip2</code> command-line tool.  This allows you to specify an alternate
           location to your <code>bzip2</code> executable, pass optional command-line
           options, or use a drop-in replacement like <code>pbzip2</code> for decompressing
           <code>.bz2</code> archives.</p></li>

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
          
          (i.e. <code>fink</code> won't fall back to <b>curl</b> if you try to use a download application that isn't present.
          
          </p>
        </li>

        <li>
          <p>
            <b>SelfUpdateMethod:</b> point, rsync or git</p>
          <p>
<code>fink</code> can use some different methods to update the package info files.
<b>rsync</b> is the recommended setting; it uses rsync to download only
modified files in the <a href="#optional">trees</a> that you have enabled. Note that if you have
changed or added to files in the <code>stable</code> or <code>unstable</code> trees, using rsync will
delete them. Make a backup first, e.g. in your <code>local</code> tree. <b>git</b> will download using anonymous or
Github access from the Fink repository. This has the disadvantage that git
can not switch mirrors; if the server is unavailable you will not be able to
update. <b>point</b> will download only the latest released version of the
packages. It is not recommended as your packages may be quite out of date.
          </p>
        </li>
        <li><p><b>SelfUpdateCVSTrees:</b> list of trees
           </p><p>(<code>fink-0.25</code> and later) By default, the <b>cvs</b> selfupdate method will update only the current
           distribution's tree.  This option overrides the list of distribu-
           tion versions that will be updated during a selfupdate.

           Please note that you will need a recent "cvs" binary installed if
           you wish to include directories that do not have CVS/ directories
           in their entire path (e.g., dists/local/main or similar).</p></li>
        <li>
          <p>
            <b>UseBinaryDist:</b> boolean</p>
          <p>
Causes <code>fink</code> to try to download pre-compiled binary packages from the binary
distribution if available and if the binary package is not already on the
system. This can save a lot of installation time and it is therefore 
recommended to set this option. Passing fink the 
<a href="usage.php?phpLang=es">--use-binary-dist</a> option (or the <code>-b</code> flag) has the same effect,  
but only operates on that single <code>fink</code> invocation.  Passing <code>fink</code> the
           <code>--no-use-binary-dist</code> flag overrides this, and compiles from source
           for that single <code>fink</code> invocation.
<b>Only available as of  fink version 0.23.0</b>.
          </p><p>Note that this mode instructs <code>fink</code> to download an available binary  
           if that version is the latest available version of the package; it does <b>not</b> cause <code>fink</code>
           to choose a version based on its binary availability.
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
<code>/opt/sw/lib/fink/mirror/_keys</code>.
Por ejemplo, si resides en Europa:</p>
          <pre>MirrorContinent: eur</pre>
        </li>
        <li>
          <p>
            <b>MirrorCountry:</b> Código de seis letras</p>
          <p>Este valor debes cambiarlo usando el comando <code>fink configure</code>
El código puedes encontrarlo en 
<code>/opt/sw/lib/fink/mirror/_keys</code>.
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
        
        <li><p><b>Mirror-rsync:</b>
           </p><p>(<code>fink-0.25.2</code> and later) When doing <code>fink selfupdate</code> with the <b>SelfupdateMethod</b> set to <code>rsync</code>,
           this is the rsync url to sync from.  This should be an anonymous
           rsync url, pointing to a directory which contains all the fink Dis-
           trubutions and Trees.
</p></li>
		
      </ul>
    
    <h2><a name="developer">5.7 Ajustes de Desarrollador</a></h2>
      
      <p>Algunas opciones en el archivo  <b>fink.conf</b> solo son utiles para los desarrolladores. Se recomienda que los usuarios convencionales del Fink no los modifiquen. Las siguientes opciones caen en esa categoría.</p>
      <ul>
        <li>
          <p>
            <b>KeepRootDir:</b> boolean</p>
          <p>Ocasiona que el <code>fink</code> no borre el directorio <code>root-[name]-[version]-[revision]</code> despues de haber construido el paquete. Es por omisión false. <b>Hay que ser cuidadoso, con esta opción un disco duro puede llenarse rapidamente!</b>
          </p>
        </li>
        <li>
          <p>
            <b>KeepBuildDir:</b> boolean</p>
          <p>Ocasiona que el <code>fink</code> no borre el directorio <code>[name]-[version]-[revision]</code> despues de haber construido el paquete. Es por omisión false. <b>Hay que ser cuidadoso, con esta opción un disco duro puede llenarse rapidamente!</b>
          </p>
        </li>
      </ul>
    
    
    <h2><a name="advanced">5.8 Advanced Settings</a></h2>
      
      <p>There are some other options which may be useful, but require some knowledge to get right.</p>
      <ul>
        <li>
          <p>
            <b>MatchPackageRegEx:</b> </p>
          <p>Causes fink not to ask which package to install if one (and only one) of the choices matches the perl Regular Expression given here. Example:</p>
          <pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>
          <p>will match packages ending in '-ssl', and will match 'xfree86' and 'xfree86-shlibs' exactly.</p>
        </li>
        <li>
          <p>
            <b>CCacheDir:</b> path</p>
          <p>If the Fink package <code>ccache-default</code> is installed, the cache files it makes
while building Fink packages will be placed here. Defaults to <code>/opt/sw/var/ccache</code>. If set to <code>none</code>, fink will not set the CCACHE_DIR environment variable and ccache will use <code>$HOME/.ccache</code>, potentially putting root-owned files into your home directory.
<b>Only available in fink newer than version 0.21.0</b>.
          </p>
        </li>
        <li><p><b>NotifyPlugin:</b> plugin</p><p>
           Specify a notification plugin to tell you when packages have been
           installed/uninstalled.  Defaults to Growl (requires <code>Mac::Growl</code> to
           operate).  Other plugins can be found in the
           <code>/opt/sw/lib/perl5/Fink/Notify</code> directory.  On <code>fink-0.25</code> and later they are listed in the output of <code>fink plugins</code>.  See the <a href="http://wiki.finkproject.org/index.php/Fink:Notificati%20on_Plugins">Fink Developer Wiki</a> for more information.
</p></li>
        <li><p><b>AutoScanpackages:</b> boolean
           </p><p>When <code>fink</code> builds new packages, <code>apt-get</code> does not immediately know about
           them.  Historically, the command <code>fink scanpackages</code> had to be run
           for <code>apt-get</code> to notice the new packages, but now this happens auto
           matically. If this option is present and <b>false</b>, then <code>fink
           scanpackages</code> will no longer be run automatically after packages are
           built.  Defaults to <b>true</b>.
</p></li>
        <li><p><b>ScanRestrictivePackages:</b> boolean
           </p><p>When scanning the packages for <code>apt-get</code>, <code>fink</code> normally scans all
           packages in the current trees. However, if the resuting apt repository will be made publically available, the administrator may be
           legally obligated not to include packages with <code>Restrictive</code> or
           <code>Commercial</code> licenses. If this option is present and <b>false</b>, then Fink
           will omit those packages when scanning.
</p></li>
      </ul>
    
    <h2><a name="sourceslist">5.9 Managing apt's sources.list file</a></h2>
      
      <p>Starting with fink 0.21.0, fink actively manages the file
<code>/opt/sw/etc/apt/sources.list</code> which is used by apt to locate
binary files for installation.  The default sources.list file looks 
something like this, adjusted to match your Distribution and Trees:
</p>
      <pre># Local modifications should either go above this line, or at the end.
#
# Default APT sources configuration for Fink, written by the fink program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in 
# /opt/sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding Packages.gz files
deb file:/opt/sw/fink local main
deb file:/opt/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main crypto

# Put local modifications to this file below this line, or at the top.
</pre>
      <p>With this default file, apt-get first looks in your local installation
for already-compiled binaries, and then looks in the official binary
distribution.  You can alter this by making entries at the beginning of
the file (which will be searched first) or at the end of the file (which
will be searched last).</p>
      <p>If you change your Trees line or the Distribution you are using,
fink will automatically modify the "default" portion of the file to
correspond to the new values.  Fink will, however, preserve any local
modifications you have made to the file, provided that you confine your
modifications to the top of the file (above the first default line) and
the bottom of the file (below the last default line).
</p>
      <p>
Note: If you had modified <code>/opt/sw/etc/apt/sources.list</code> prior to upgrading
to fink 0.21.0, you will find your former file stored at <code>/opt/sw/etc/apt/sources.list.finkbak</code> .
</p>
    
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=es">6. Usando el Fink desde la línea de comando</a></p>
<?php include_once "../../footer.inc"; ?>


