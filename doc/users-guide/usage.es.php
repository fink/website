<?php
$title = "Guía del Usuario - Herramienta fink ";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:49:23';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Guía del Usuario Contents"><link rel="prev" href="conf.php?phpLang=es" title="El archivo de configuración de Fink">';


include_once "header.es.inc";
?>
<h1>Guía del Usuario - 6. Usando el Fink desde la línea de comando</h1>
    
    
    <h2><a name="using">6.1 Usando la herramienta fink</a></h2>
      
      <p>La herramienta <code>fink</code> usa varios comandos estilo sufijo que actuan sobre los paquetes de la distribución de código. Algunos necesitan al menos el nombre de un paquete, pero pueden manejar varios paquetes al mismo tiempo. Puedes especificar solamente el nombre del paquete (e.g. gimp), o un nombre completo con versión (e.g. gimp-1.2.1 or
gimp-1.2.1-3). Fink automaticamente buscara la versión más reciente disponible cuando esta no sea especificada. Otros tiene opciones diferentes.
</p>
      <p>Lo que sigue es una lista de los comandos de la herramienta fink <code>fink</code> :</p>
    
    
    <h2><a name="options">6.2 Global options</a></h2>
      
      <p>
There are some options, which apply to all fink commands. If you 
type <code>fink --help</code> you get the list of options: 
      </p>
      <p>(as of <code>fink-0.26.0</code>)</p>
      <p><b>-h, --help</b> - displays help text.
</p>
      <p><b>-q, --quiet</b>  - causes <code>fink</code> to be less verbose, opposite of <b>--verbose</b>.  Overrides the <a href="conf.php?phpLang=es#optional">Verbose</a> flag in <code>fink.conf</code>.
</p>
      <p><b>-V, --version</b> - display version information.
</p>
      <p><b>-v, --verbose</b> - causes  <code>fink</code> to be more verbose, opposite of <b>--quiet</b>.  Overrides the <a href="conf.php?phpLang=es#optional">Verbose</a> field in <code>fink.conf.</code>
</p>
      <p><b>-y, --yes</b> - assume default answer for all interactive 
                        questions.
</p>
      <p><b>-K, --keep-root-dir</b>   - Causes <code>fink</code> not to delete the
                        <code>root-[name]-[version]-[revision]</code>
		        directory in the <a href="conf.php?phpLang=es#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=es#developer">KeepRootDir</a> field in <code>fink.conf</code>.
</p>
      <p><b>-k, --keep-build-dir</b>  - Causes <code>fink</code> not to delete the
                        <code>[name]-[version]-[revision]</code>
                        directory in the <a href="conf.php?phpLang=es#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=es#developer">KeepBuildDir</a> field in <code>fink.conf</code>.</p>
      <p><b>-b, --use-binary-dist</b> - download pre-compiled packages from the binary 
                        distribution if available (e.g. to reduce compile
		        time or disk usage).
		        Note that this mode instructs fink to download the
                        version it wants if that version is available for
		        download; it does not cause fink to choose a version
    		        based on its binary availability.  Corresponds to the <a href="conf.php?phpLang=es#downloading">UseBinaryDist</a> flag in <code>fink.conf</code>.
</p>
      <p><b>--no-use-binary-dist</b>  - Don't use pre-compiled binary packages from the binary 
		        distribution, opposite of the --use-binary-dist flag. 
                        This is the default unless overridden by setting <code>UseBinaryDist: true </code>in 
                        the <code>fink.conf</code> configuration file. 
</p>
      <p><b>--build-as-nobody</b>     - Drop to a non-root user when performing the unpack,
                        patch, compile, and install phases. Note that packages
                        built with this option may be non-functional. You
                        should use this mode for package development and 
                        debugging only.
</p>
      <p><b>-m, --maintainer</b>
            - (<code>fink-0.25</code> and later) Perform actions useful to package maintainers: run validation on
           the <code>.info</code> file before building and on the <code>.deb</code> after building a
           package; turn certain build-time warnings into fatal errors; (<code>fink-0.26</code> and later) run the test suites as specified in the  field.  This sets <b>--tests</b> and <b>--validate</b> to <code>on</code>.</p>
      <p><b>--tests[=on|off|warn]</b>         - (<code>fink-0.26.0</code> and later) Causes <code>InfoTest</code> fields to be activated and test suites specified
           via <code>TestScript</code> to be executed (see the <a href="../packaging/reference.php#fields">Fink Packaging Manual</a>).  If no argument is given to this
           option or if the argument is <code>on</code> then failures in test suites will
           be considered fatal errors during builds.  If the argument is <code>warn</code>
           then failures will be treated as warnings.</p>
      <p><b>--validate[=on|off|warn]</b> -
           Causes packages to be validated during a build.  If no argument is
           given to this option or if the argument is <code>on</code> then validation failures will be considered fatal errors during builds.  If the argument is <code>warn</code> then failures will be treated as warnings.</p>
      <p><b>-l, --log-output</b>
            - Save a copy of the terminal output during each package building
           process. By default, the file is stored in
           <code>/tmp/fink-build-log_[name]-[version]-[revision]_[date]-[time]</code> but
           one can use the <b>--logfile</b> flag to specify an alternate filename.</p>
      <p><b>--no-log-output</b>
            - Don't save a copy of the output during package-building, opposite
           of the <b>--log-output</b> flag. This is the default.</p>
      <p><b>--logfile=filename</b>
            - Save package build logs to the file <code>filename</code> instead of the default
           file (see the <b>--log-output</b> flag, which is implicitly set by the
           <b>--logfile</b> flag). You can use percent-expansion codes to include
           specific package information automatically. A complete list of percent-expanions is available in the <a href="../packaging">Fink Packaging Manual</a>; some common percent-expansions are:</p>
      <ul>
        <li>                 <b>%n</b>    - package name
                 </li>
        <li><b>%v</b>    - package version
                 </li>
        <li><b>%r</b>    - package revision</li>
      </ul>
      <p><b>-t, --trees=expr</b>
           - Consider only packages in trees matching <b>expr</b>.

           The format of expr is a comma-delimited list of tree specifica-
           tions. Trees listed in <code>fink.conf</code> are compared against <b>expr</b>.  Only
           those which match at least one tree specification are considered by
           <code>fink</code>, in the order of the first specifications which they match. If
           no <b>--trees</b> option is used, all trees listed in <code>fink.conf</code> are
           included in order.

           A tree specification may contain a slash (/) character, in which
           case it requires an exact match with a tree. Otherwise, it matches
           against the first path-element of a tree. For example,
           <b>--trees=unstable/main</b> would match only the <b>unstable/main</b> tree,
           while <b>--trees=unstable</b> would match both unstable/main and
           <b>unstable/crypto</b>.

           There exist magic tree specifications which can be included in
           <b>expr</b>:</p>
      <ul>
        <li><b>status</b>
                       - Includes packages in the dpkg status database.

                 </li>
        <li><b>virtual</b>
                       - Includes virtual packages which reflect the capabili-
                       ties of the system.
</li>
      </ul>
      <p>Exclusion of (or failure to include) these magic trees is currently
           only supported for operations which do not install or remove packages.</p>
      <p><b>-T, --exclude-trees=expr</b>
           Consider only packages in trees not matching expr.

           The syntax of expr is the same as for <b>--trees</b>, including the magic
           tree specifications. However, matching trees are here excluded
           rather than included. Note that trees matching both <b>--trees</b> and
           <b>--exclude-trees</b> are excluded.
</p>
      <p> Examples of <b>--trees</b> and --exclude-trees:

                 </p>
      <ul>
        <li><code>fink --trees=stable,virtual,status install <b>foo</b></code> 
                       <p>Install <b>foo</b> as if <code>fink</code> was using the stable tree, even
                       if unstable is enabled in <code>fink.conf</code>.
</p></li>
        <li><code>fink --exclude-trees=local install <b>foo</b></code> 
                       <p>Install the version of <b>foo</b> in Fink, not the locally
                       modified version.

</p></li>
        <li><code>fink --trees=local/main list -i</code>
                       <p>List the locally modified packages which are installed.</p></li>
      </ul>
      <p>Most of these options are self-explanatory. Many can also be set in the 
<a href="conf.php?phpLang=es">Fink configuration file</a> (<code>fink.conf</code>) if you want 
to set them permanently and not just for that invocation of <code>fink</code>.</p>
    
        <h2><a name="install">6.3 install</a></h2>
      
      <p>El comando <b>install</b> es usado para instalar programas. Descarga, configura, construye e instala los paquetes que nombres. También instalará las dependencias requeridas automaticamente, pero pedira autorización antes de hacerlo. Ejemplo:</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      
      <p>Use of the <a href="#options">--use-binary-dist</a> option with <code>fink install</code> can speed the build process for complicated packages by quite a lot.</p>
      
      <p>Alias para el comando install: <b>update, enable, activate, use</b> (esto es por razones historicas).</p>
    
    <h2><a name="remove">6.4 remove</a></h2>
      
      <p>Este comando remueve los paquetes del sistema invocando el comando '<code>dpkg --remove</code>'. La actual implementación tiene algunas fallas: no revisa las dependencias sino que se lo deja por completo a la herramienta dpkg tool (aunque esto rara vez causa problemas).</p>
      <p>El comando <b>remove</b> solo remueve los archivos del paquete, pero deja el archivo <code>.deb</code> comprimiro del paquete intacto. Esto significa que puedes reinstalar el paquete despues sin tener que pasar por el proceso de compilación. Si necesitas el espacio de disco, puedes remover el archivo <code>.deb</code> del directorio
<code>/opt/sw/fink/dists</code> .</p>
      
      <p>These flags can be used with the <b>fink remove</b> command
</p>
      <pre>-h,--help             - Show the options which are available.
-r,--recursive        - Also remove packages that depend on the package(s) to
                        be removed (i.e. overcome the above-mentioned flaw).</pre>
      
      <p>Alias: <b>disable, deactivate, unuse, delete</b>.</p>
    

    <h2><a name="purge">6.5 purge</a></h2>
      
      <p>The <b>purge</b> command purges packages from the system. This is
the same as the <b>remove</b> command except that it removes configuration
files as well.</p>
      <p>This command takes the:</p>
      <pre>-h,--help
-r,--recursive</pre>
      <p>options.</p>
    

    <h2><a name="update-all">6.6 update-all</a></h2>
      
      <p>Este comando actualiza todos los paquetes instalados a la versión más reciente. No necesita la lista de paquetes, solo debes ejecutar el comando:</p>
      <pre>fink update-all</pre>
      
      <p><a href="#options">--use-binary-dist</a> is also useful with this command.</p>
      
    
    <h2><a name="list">6.7 list</a></h2>
      
      <p>
Este comando muestra una lista de los paquetes disponibles, el estatus de la Instalación, la última versión, y una pequeña descripción del paquete.
Tambien se le puede añadir un nombre o un patr�n del shell y fink mostrara una lista de los paquetes que encajen cn dicho nombre.
</p>
      <p>
La primera columna muestra el estado de la Instalación de la siguiente manera:
</p>
      <pre>    no instalado
 i   la versión más reciente esta instalada
(i)  instalado, pero hay una nueva versión disponible
 p  a virtual package provided by a package that is installed</pre>
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
-s expr,--section=expr
	  Solo muestra los paquetes en la sección indicada en la 			  expresión expr.
-m expr,--maintainer=expr
          Show only packages with the maintainer  matching the
          regular expression expr.
-w=xyz,--width=xyz
	  Determina el ancho del despliege de la lista. xyz es o un 			  valor numerico o auto. auto ajustara el ancho de acuerdo al 		  ancho de la terminal
	  Por omisión es auto.
</pre>
      <p>
Algunos ejemplos son estos:
</p>
      <pre>
fink list                 - Lista todos los paqutes.
fink list bash            - Revisa si bash esta disponible y cual versión.
fink list --tab --outdated | cut -f 2 
                          - Lista de paquetes no actualizados
fink list --section=kde   - Lista de paquetes en la Sección KDE
fink list --maintainer=fink-devel
                          - list the packages with no maintainer
fink --trees=unstable list --maintainer=fink-devel
                          - list the packages with no maintainer, but only in the unstable tree.
fink list "gnome*"        - Lista todos los paquetes que empiezan con la palabra 'gnome'
</pre>
      <p>
Las comillas en el último ejemplo son necesarias para evitar que el shell interprete el patron por si mismo.
</p>
    
    <h2><a name="apropos">6.8 apropos</a></h2>
      
      <p>
Este comando se comporta de manera identica al comandoT<code>fink list</code>. La diferencia más notable es que <code>fink apropos</code> también revisa las descripciones de los paquetes. La segunda diferencia es que un línea de busqueda debe ser proporcionada, no es opcional.
</p>
      <pre>
fink apropos irc          - lista los paquetes en que 'irc' aarece en el 
                            nombre o descripción del paquete.
fink apropos -s=kde irc   - igual que arriba, pero restringe los paquetes 
                            a la Sección kde.
</pre>
    
    <h2><a name="describe">6.9 describe</a></h2>
      
      <p>
Este comando despligea la descripción del paquete que le sea indicado en la línea de comando. Note, por favor, que solo algunos paquetes tiene una descripción.
</p>
      <p>
Alias: desc, description, info
</p>
    
	
    <h2><a name="plugins">6.10 plugins</a></h2>
      
      <p> List the (optional) plugins available to the <code>fink</code> program.  Currently lists the notification mechanisms and the source-tarball
           checksum algorithms.</p>
    
	
    <h2><a name="fetch">6.11 fetch</a></h2>
      
      <p>Descarga los paquetes nombrados, pero no los instala. Este comando descarga los archivos tar aunque se hayan descargado previamente.</p>

      <p>The following flags can be used with the <code>fetch</code> command:</p>
      <pre>-h,--help		Show the options which are available.
-i,--ignore-restrictive	Do not fetch packages that are &amp;quot;License: Restrictive&amp;quot;.
                      	Useful for mirrors, because some restrictive packages
                      	do not allow source mirroring.
-d,--dry-run		Just display information about the file(s) that would
			be downloaded for the package(s) to be fetched; do not
			actually download anything.
-r,--recursive		Also fetch packages that are dependencies of the
			package(s) to be fetched.</pre>

    
    <h2><a name="fetch-all">6.12 fetch-all</a></h2>
      
      <p>Descarga <b>todos</b> las fuentes de los paquetes. Al igual que <a href="#fetch">fetch</a>, descarga los archivos tar aunque hayan sido descargados previamente.</p>
      
      <p>These flags can be used with the <code>fink fetch-all</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
      
    
    <h2><a name="fetch-missing">6.13 fetch-missing</a></h2>
      
      <p>Descarga <b>todos</b> las fuentes de los paquetes. Este comando solo descarga archivos que no esten presentes en el sistema.</p>
      
      <p>These flags can be used with the <code>fink fetch-missing</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
      
    
    <h2><a name="build">6.14 build</a></h2>
      
      <p>Construye un paquete pero no lo instala. Como es usual, los archivos tar solo serán descargados en caso de no encontrarse en el sistema. El resultado de este comando en un .deb instalable que puede ser instlado posteriormente con el comando install. Este comando no hara nada si el archivo .deb ya existe. Note que las dependencias serán 
<b>instaladas</b>, no solamente construidas.</p>
    
    <h2><a name="rebuild">6.15 rebuild</a></h2>
      
      <p>Construye el paquete (al igual que el comando build), pero ignora y sobreescribe el archivo .deb existente. Si el paquete es instalado, el nuevo .deb también será instalado en el sistema mediante el <code>dpkg</code>. Esto es muy util durante el desarrollo de paquetes. 
</p>
      
      <p>The <a href="#options">--use-binary-dist option</a> is applicable here.</p>
      
    
    <h2><a name="reinstall">6.16 reinstall</a></h2>
      
      <p>Identico a install, pero instala los paquetes mediante  <code>dpkg</code> aún cuando ya estan instalados. Puedes usar este comando cuando has borrado accidentalmente algun paquete, o cambiado la configuración y quieres recuperar los valores por omision.</p>
    
    <h2><a name="configure">6.17 configure</a></h2>
      
      <p>
Re-ejecuta el procesos de configuración de <code>fink</code>. Este comando te permitira cambiar los espejos, la configuracion del proxy, y otras cosas.
</p>
	  
      <p><b>New in</b> <code>fink-0.26.0</code>: This command will also let you turn on the unstable trees if desired.</p>
      
    
    <h2><a name="selfupdate">6.18 selfupdate</a></h2>
      
      <p>
	Este comando automatiza el proceso de actualización del Fink. Revisa el sitio web, verifica si existe una versión nueva disonible y en caso de haberla, decarga las descripciones del paquete y actualiza los paquetes centrales, incluyendo al propio<code>fink</code> . Este comando actualiza las versiones regulares, pero puedes modificar el directorio  <code>/opt/sw/fink/dists</code>
	para obtener actualizaciones directamente del Git, accediendo así a las actualizaciones m��s recientes de todos los paquetes.
</p>

      <p>If the <a href="#options">--use-binary-dist option</a> is enabled, the list of available packages in the binary distribution is also updated.</p>
    
    <h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use rsync to update its package list.</p>
      <p>This is the recommended way to update Fink when building from source.</p>
      <p><b>Note:</b>  rsync updates only update the active <a href="conf.php?phpLang=es#optional">trees</a> (e.g. if unstable isn't turned on in <code>fink.conf</code> the list of unstable packages won't be updated.</p>
    
    <h2><a name="selfupdate-git">6.20 selfupdate-git</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use Git access to update its package list.</p>
      <p>Rsync updating is preferred, except for developers and those people who are behind firewalls that disallow rsync.</p>
    

    <h2><a name="index">6.21 index</a></h2>
      
      <p>
   Reconstruye el cache de los paquetes. Usualmente no hay que ejecutar esto manualmente, debido a que <code>fink</code> lo realiza automaticamente cuando debe ser actualizado.
</p>
    
    <h2><a name="validate">6.22 validate</a></h2>
      
      <p>
   Este comando ejecuta varias verificaciones en los archivos <code>.info</code> and <code>.deb</code>. Aquellas personas que dan mantenimiento a algun paquete, deben ejecutar este comando sobre sus paquetes antes de someterlos al Fink. 
</p>

	  <p>The following optional options may be used:</p>
      <pre>-h,--help            - Show the options which are available.
-p,--prefix          - Simulate an alternate Fink basepath prefix (%p) within
                      the files being validated.
--pedantic, --no-pedantic
                     - Control the display of nitpicky formatting warnings.
                      --pedantic is the default.</pre>

      <p>
   Alias: <b>check</b>
</p>
    
    <h2><a name="scanpackages">6.23 scanpackages</a></h2>
      
      
      <p>Updates the <code>apt-get</code> database of debs; defaults to updating all of the trees, but may be restricted to a set of one or more trees given as arguments.</p>
      
    
    <h2><a name="cleanup">6.24 cleanup</a></h2>
      
      
      <p>
   Removes obsolete and temporary files. 
   This can reclaim large amounts of disk space.  One or more modes may be specified:</p>
      <pre>--debs               - Delete .deb files (compiled binary package archives)
                       corresponding to versions of packages that are neither
                       described by a package description (.info) file in the
                       currently-active trees nor presently installed.
--sources,--srcs     - Delete sources (tarballs, etc.) that are not used by
                       any package description (.info) file in the currently-
                       active trees.
--buildlocks, --bl   - Delete stale buildlock packages.
--dpkg-status        - Remove entries for packages that are not installed from
                       the dpkg "status" database.
--obsolete-packages  - Attempt to uninstall all installed packges that are
                       obsolete. (new in fink-0.26.0)
--all                - All of the above modes. (new in fink-0.26.0)</pre>
      <p>If no mode is specified, <code>--debs --sources</code> is the default action. </p>
      <p>In addition, the following options may be used:</p>
      <pre>-k,--keep-src        - Move old source files to /opt/sw/src/old/ instead of deleting them.
-d,--dry-run         - Print the names of the files that would be deleted, but
                       do not actually delete them.
-h,--help            - Show the modes and options which are available.</pre>
    
    
    
    <h2><a name="dumpinfo">6.25 dumpinfo</a></h2>
      
      <p>
Only available in <code>fink</code> newer than version 0.21.0
      </p>
      <p>
	Shows how <code>fink</code> parses parts of a package's <code>.info</code> file. Various
	fields and percent expansions will be displayed according
	to <b>options</b> as follows:
      </p>
      <pre>
-h, --help           - Show the options which are available.
-a, --all            - Display all fields from the package description.
                       This is the default mode when no --field or
                       --percent flags are given.
-f fieldname,        - Display the given fieldname(s),
  --field=fieldname    in the order listed.
-p key,              - Display the given percent expansion key(s),
   --percent=key       in the order listed.
      </pre>
    
    <h2><a name="show-deps">6.26 show-deps</a></h2>
      
      <p>Only available in fink-0.23-6 and later.</p>
      <p>Displays a human-readable list of the compile-time (build) and run-
           time (installation) dependencies of the listed package(s).</p>
    
    
  
<?php include_once "../../footer.inc"; ?>


