<?php
$title = "P.M.F.";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/04/05 5:48:20';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="P.M.F. Contents"><link rel="next" href="general.php?phpLang=es" title="Preguntas generales">';


include_once "header.es.inc";
?>
<h1>Preguntas Más Frecuentes de Fink</h1>
    <p>Esta es la lista de las preguntas más frecuentes de Fink. Como en la mayoría de las PMF, algunas preguntas son tomadas de la vida real y otras son creadas. En realidad, es mas como una documentación escrita en un estilo de pregunta y respuesta ad-hoc.</p>
    <p>La lista de PMF consiste de varias páginas, una para cada sección. Todas las preguntas están enlistadas y relacionadas en la tabla de contenidos siguiente.</p>
  <h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="general.php?phpLang=es"><b>1 Preguntas generales</b></a><ul><li><a href="general.php?phpLang=es#what">1.1 ¿Qué es Fink?</a></li><li><a href="general.php?phpLang=es#naming">1.2 ¿Qué quiere decir Fink?</a></li><li><a href="general.php?phpLang=es#bsd-ports">1.3 ¿Cómo es Fink diferente de los mecanismos de Puerto BSD (Esto incluye OpenPackages y GNU-Darwin)?		</a></li><li><a href="general.php?phpLang=es#usr-local">1.4 ¿Por qué Fink no se instala en /usr/local?</a></li><li><a href="general.php?phpLang=es#why-sw">1.5 Entonces ¿por qué escogieron /sw?</a></li></ul></li><li><a href="relations.php?phpLang=es"><b>2 Relaciones con Otros Proyectos</b></a><ul><li><a href="relations.php?phpLang=es#upstream">2.1 ¿Contribuyen los parches hechos por ustedes a los mantenedores de fuente (upstream)?</a></li><li><a href="relations.php?phpLang=es#debian">2.2 ¿Cuál es su relación con el proyecto Debian? ¿Están creando un puerto de Debian Linux a Mac OS X?</a></li><li><a href="relations.php?phpLang=es#apple">2.3 ¿Cuál es su relación con Apple?</a></li><li><a href="relations.php?phpLang=es#darwinports">2.4 ¿Cuál es su relación con Darwinports?</a></li></ul></li><li><a href="mirrors.php?phpLang=es"><b>3 Espejos de distribución</b></a><ul><li><a href="mirrors.php?phpLang=es#when-use">3.1 ¿Qué son los espejos de distribución?</a></li><li><a href="mirrors.php?phpLang=es#why">3.2 Por qué debería de usar espejos rsync?</a></li><li><a href="mirrors.php?phpLang=es#where">3.3 ¿Dónde podría encontrar mas información acerca de los espejos Fink?</a></li><li><a href="mirrors.php?phpLang=es#when-not">3.4 No me puedo conectar a un servidor espejo rsync, ¿qué debo hacer?</a></li><li><a href="mirrors.php?phpLang=es#otherinfogone">3.5 Me he cambiado al método rsync y todos los archivos de información de los árboles sin usar han desaparecido</a></li><li><a href="mirrors.php?phpLang=es#howswitch">3.6 ¿Cómo puedo ir y venir entre los dos métodos?</a></li><li><a href="mirrors.php?phpLang=es#Master">3.7 ¿Qué es un servidor espejo de archivos de distribución?</a></li></ul></li><li><a href="upgrade-fink.php?phpLang=es"><b>4 Upgrading Fink (version-specific troubleshooting)</b></a><ul><li><a href="upgrade-fink.php?phpLang=es#leopard-bindist1">4.1 Fink doesn't see new packages even after I've run an rsync or cvs selfupdate.</a></li><li><a href="upgrade-fink.php?phpLang=es#leopard-bindist2">4.2 When I try to install stuff I get 'Can't resolve dependency "fink (&gt;= 0.28.0)"'</a></li><li><a href="upgrade-fink.php?phpLang=es#stuck-gettext">4.3 Fink tells me to run 'sudo apt-get install libgettext3-dev=0.14.5-2' to clear up inconsistent dependencies but I'm still stuck.</a></li><li><a href="upgrade-fink.php?phpLang=es#stuck-dpkg">4.4 Fink tells me 'Can't resolve dependency "dpkg (&gt;= 1.10.21-1229)" for package "dpkg-base-files-0.3-1"'.  How do I solve this?</a></li></ul></li><li><a href="usage-fink.php?phpLang=es"><b>5 Installing, Using and Maintaining Fink</b></a><ul><li><a href="usage-fink.php?phpLang=es#what-packages">5.1 ¿Cómo puedo averiguar que paquetes apoya Fink?</a></li><li><a href="usage-fink.php?phpLang=es#proxy">5.2 Estoy atrás de un firewall, ¿cómo configuro Fink para usar un HTTP proxy?</a></li><li><a href="usage-fink.php?phpLang=es#firewalled-cvs">5.3 ¿Cómo actualizo paquetes disponibles  de CVS cuando estoy atrás de un firewall?</a></li><li><a href="usage-fink.php?phpLang=es#moving">5.4 ¿Puedo mover Fink a otro lugar después de la instalación?</a></li><li><a href="usage-fink.php?phpLang=es#moving-symlink">5.5 Si muevo Fink después de la instalación y proveo un symlink a la ubicación vieja, ¿funcionará?</a></li><li><a href="usage-fink.php?phpLang=es#removing">5.6 ¿Cómo puedo desinstalar todo el Fink?</a></li><li><a href="usage-fink.php?phpLang=es#bindist">5.7 El paquete de base de datos en el website enlista paquete xxx, pero apt-get y dselect no saben nada acerca de ese paquete. ¿Quién está mintiendo?</a></li><li><a href="usage-fink.php?phpLang=es#unstable">5.8 Existe este paquete en unstable que quiero instalar, pero el comando fink dice "no encuentro el paquete" ('no package found'). ¿Cómo lo puedo instalar?</a></li><li><a href="usage-fink.php?phpLang=es#unstable-onepackage">5.9 Do I <b>really</b> need to enable all of unstable just to install
        one unstable package that I want?</a></li><li><a href="usage-fink.php?phpLang=es#sudo">5.10 Estoy cansado de tener que teclear mi contraseña en sudo una y otra vez  ¿hay alguna forma de evitar esto?</a></li><li><a href="usage-fink.php?phpLang=es#exec-init-csh">5.11 Cuando trato de correr init.csh o init.sh me aparece un error de  "Permiso denegado" ("Permission denied"). ¿Qué estoy haciendo mal?</a></li><li><a href="usage-fink.php?phpLang=es#dselect-access">5.12 Ayuda! Usé el menú de entrada de "(A)cces" en dselect y ahora ya  no puedo bajar paquetes!</a></li><li><a href="usage-fink.php?phpLang=es#cvs-busy">5.13 Cuando trato de correr "fink selfupdate" o "fink selfupdate-cvs", me sale el error <code> 
                   "Updating using CVS failed.  Check the error messages above.".</code>"</a></li><li><a href="usage-fink.php?phpLang=es#kernel-panics">5.14 Cuando uso Fink, my equipo se congela / se produce un kernel panic / muere. Ayuda!</a></li><li><a href="usage-fink.php?phpLang=es#not-found">5.15 Estoy tratando de instalar un paquete, pero Fink no puede bajarlo. El servidor muestra una version mas reciente del paquete que lo que tiene Fink. ¿Qué hago?</a></li><li><a href="usage-fink.php?phpLang=es#fink-not-found">5.16 Aparece errores de "command not found" cuando corro Fink o cualquier cosa que haya instalado con Fink.</a></li><li><a href="usage-fink.php?phpLang=es#invisible-sw">5.17 Quiero esconder / sw en el Finder para evitar que los usuarios dañen la instalación de Fink.</a></li><li><a href="usage-fink.php?phpLang=es#install-info-bad">5.18 No puedo instalar nada, porque me sale el siguiente error: "install-info: unrecognized option `--infodir=/sw/share/info"</a></li><li><a href="usage-fink.php?phpLang=es#bad-list-file">5.19 No puedo instalar o remover  nada, por un problema con "files list file" ("el archivo de la lista de archivos").</a></li><li><a href="usage-fink.php?phpLang=es#dselect-garbage">5.20 Me aparece un montón de basura cuando selecciono paquetes en <code>dselect</code>. ¿Cómo lo puedo usar?</a></li><li><a href="usage-fink.php?phpLang=es#cant-upgrade">5.21 No puedo actualizar la versión Fink.</a></li><li><a href="usage-fink.php?phpLang=es#spaces-in-directory">5.22 ¿Puedo colocar a Fink en un volumen o directorio con un espacio en su nombre?</a></li><li><a href="usage-fink.php?phpLang=es#packages-gz">5.23 Cuando trato de hacer una actualización binaria, aparecen muchos mensajes con "File not found"  ("archivo no encontrado").</a></li><li><a href="usage-fink.php?phpLang=es#wrong-tree">5.24 Cambie mi sistema OS, pero Fink no reconoce el cambio.</a></li><li><a href="usage-fink.php?phpLang=es#lost-command-line-tools">5.25 After installing a macOS update, Fink no longer recognizes my installed Command Line Tools.</a></li><li><a href="usage-fink.php?phpLang=es#seg-fault">5.26 Me salen errores con las aplicaciones de  <code>gzip</code> - <code>dpkg-deb</code> del paquete de fileutils! Ayuda!</a></li><li><a href="usage-fink.php?phpLang=es#pathsetup-keeps-running">5.27 Cuando abro una ventana terminal, me sale un mensaje  que dice "Your  environment seems to be correctly set up for Fink already." y se desconecta.</a></li><li><a href="usage-fink.php?phpLang=es#ext-drive">5.28 Tengo a Fink instalado afuera  de la  partición principal y no puedo actualizar el paquete Fink desde la fuente. Hay errores involucrando <q>chowname</q>.</a></li><li><a href="usage-fink.php?phpLang=es#mirror-gnu">5.29 Fink won't update my packages because it says it can't find the 'gnu' mirror.</a></li><li><a href="usage-fink.php?phpLang=es#cant-move-fink">5.30 I can't update Fink, because it can't move /sw/fink out of the way.</a></li><li><a href="usage-fink.php?phpLang=es#fc-cache">5.31 I get a message that says "No fonts found".</a></li><li><a href="usage-fink.php?phpLang=es#non-admin-installer">5.32  I can't install Fink via the Installer package, because I get "volume doesn't support symlinks" errors.</a></li><li><a href="usage-fink.php?phpLang=es#wrong-arch">5.33 I can't update Fink, because <q>package architecture (darwin-i386) does not match system (darwin-powerpc).</q>
</a></li></ul></li><li><a href="comp-general.php?phpLang=es"><b>6 Compile Problems - General</b></a><ul><li><a href="comp-general.php?phpLang=es#compiler">6.1 Un script de configuración se queja que no puede encontrar un "cc aceptable". ¿Qué es eso?</a></li><li><a href="comp-general.php?phpLang=es#cvs">6.2 Cuando quiero hacer un "fink selfupdate-cvs" Me aparece este mensaje: "cvs: Command not found."</a></li><li><a href="comp-general.php?phpLang=es#missing-make">6.3 Me esta apareciendo un mensaje de error involucrando <code>make</code>.
        </a></li><li><a href="comp-general.php?phpLang=es#head">6.4 Me esta apareciendo un mensaje de uso extraño del comando head. ¿Qué se ha roto?</a></li><li><a href="comp-general.php?phpLang=es#also_in">6.5 Cuando trato de instalar un paquete me aparece un mensaje con el error acerca de "sobreescribir un archivo que está en otro paquete".</a></li><li><a href="comp-general.php?phpLang=es#mv-failed">6.6 ¿Qué quiere decir "execution of mv failed, exit code 1" cuando trato de instalar un paquete?</a></li><li><a href="comp-general.php?phpLang=es#node-exists">6.7 No puedo instalar o actualizar un paquete porque me aparece un mensaje de que un "node" ya existe.</a></li><li><a href="comp-general.php?phpLang=es#usr-local-libs">6.8 He escuchado que las librerías instaladas en /usr/local/lib a veces causan problemas de compilación para Fink, ¿es cierto?</a></li><li><a href="comp-general.php?phpLang=es#toc-out-of-date">6.9 Cuando trato de instalar un paquete, me aparece un mensaje que la "tabla de contenidos" ("table of  contents") está desactualizada. ¿Qué necesito hacer?</a></li><li><a href="comp-general.php?phpLang=es#fc-atlas">6.10 Fink Commander falla cuando trato de instalar atlas.</a></li><li><a href="comp-general.php?phpLang=es#basic-headers">6.11 I get messages saying that I'm missing <code>stddef.h</code> | <code>wchar.h</code> | <code>stdlib.h</code> | <code>crt1.o</code>, or that my <q>C compiler cannot create executables</q>.</a></li><li><a href="comp-general.php?phpLang=es#multiple-dependencies">6.12 No puedo actualizar porque Fink dice "unable to resolve version conflict on multiple dependencies" </a></li><li><a href="comp-general.php?phpLang=es#dpkg-parse-error">6.13 No puedo instalar nada porque me aparece:  "dpkg: parse error, in file  `/sw/var/lib/dpkg/status'"!</a></li><li><a href="comp-general.php?phpLang=es#freetype-problems">6.14 Me aparecen errores involucrando a freetype.</a></li><li><a href="comp-general.php?phpLang=es#dlfcn-from-oo">6.15 Me aparecen errores al compilar involucrando "Dl info".</a></li><li><a href="comp-general.php?phpLang=es#gcc2">6.16 Fink dice que me falta el <code>gcc2</code>, pero yo no creo haberlo instalado.</a></li><li><a href="comp-general.php?phpLang=es#system-java">6.17 Fink dice <code>Failed: Can't resolve dependency "system-java14-dev"</code>, pero ese paquete no existe.</a></li><li><a href="comp-general.php?phpLang=es#dpkg-split">6.18 Cualquier cosa que trato de instalar siempre me aparece: <q>dpkg (subprocess): failed to exec dpkg-split to see if it's part of a multiparter: No such file or directory.</q> ¿Cómo soluciono esto?</a></li><li><a href="comp-general.php?phpLang=es#xml-parser">6.19 Me aparece el mensaje siguiente: <q>configure: error: XML::Parser perl module is required for intltool.</q> ¿Qué debo hacer?</a></li><li><a href="comp-general.php?phpLang=es#master-problems">6.20 I'm trying to download a package, but Fink goes to some weird site with <q>distfiles</q> in its name, and the file isn't there.</a></li><li><a href="comp-general.php?phpLang=es#compile-options">6.21 I want Fink to use different options in building a package.</a></li><li><a href="comp-general.php?phpLang=es#alternates">6.22 Whenever I try to build from source, Fink keeps waffling between alternate versions of the same library.</a></li><li><a href="comp-general.php?phpLang=es#python-mods">6.23 I get errors involving <code>MACOSX_DEPLOYMENT_TARGET </code>when I try to build a Python module.</a></li><li><a href="comp-general.php?phpLang=es#libtool-unrecognized-dynamic">6.24 I get <q>unrecognized option `-dynamic'</q> errors from <code>libtool</code>.</a></li></ul></li><li><a href="comp-packages.php?phpLang=es"><b>7 Compile Problems - Specific Packages</b></a><ul><li><a href="comp-packages.php?phpLang=es#libgtop">7.1 A Falla la compilación de un paquete con errores involucrando a <code>sed</code>.</a></li><li><a href="comp-packages.php?phpLang=es#cant-install-xfree">7.2 Quiero cambiarme a los paquetes XFree86 de Fink, pero no puedo instalar <code>xfree86-base</code> - <code>xfree86</code>, porque existe un conflicto con <code>system-xfree86</code>.</a></li><li><a href="comp-packages.php?phpLang=es#change-thread-nothread">7.3 ¿Cómo puedo cambiar de la version non-threaded del paquete XFree86 de Fink a la version threaded  (o viceversa)?</a></li><li><a href="comp-packages.php?phpLang=es#cctools">7.4 ¿Cuando intento instalar KDE, me sale el siguiente mensaje: 'Can't  resolve dependency "cctools (&gt;= 446-1)"'</a></li><li><a href="comp-packages.php?phpLang=es#libiconv-gettext">7.5 I can't update <code>libiconv</code>.</a></li><li><a href="comp-packages.php?phpLang=es#cplusplus-filt">7.6 i can't install a package because <code>c++filt</code> is missing.  Where do I get it?</a></li><li><a href="comp-packages.php?phpLang=es#gettext-tools">7.7 Fink refuses to update the <code>gettext</code> package,
complaining that the dependencies are in an inconsistent state.</a></li><li><a href="comp-packages.php?phpLang=es#Leopard-libXrandr">7.8 I can't install <b>gtk+2</b> on OS 10.5</a></li><li><a href="comp-packages.php?phpLang=es#all-others">7.9 I'm having issues with a package that isn't listed here.</a></li></ul></li><li><a href="usage-general.php?phpLang=es"><b>8 Package Usage Problems - General</b></a><ul><li><a href="usage-general.php?phpLang=es#xlocale">8.1 Me aparecen muchos mensajes con "locale not supported by C  library". ¿Es malo esto?</a></li><li><a href="usage-general.php?phpLang=es#passwd">8.2 De repente han aparecido una cantidad de usuarios desconocidos en mi sistema, con nombres como "mysql", "pgsql" y "games". ¿De dónde salieron?</a></li><li><a href="usage-general.php?phpLang=es#compile-myself">8.3 Cómo puedo compilar algo usando el software instalado por Fink.</a></li><li><a href="usage-general.php?phpLang=es#apple-x11-applications-menu">8.4 No puedo correr ninguna de las aplicaciones instaladas con Fink desde el menú de Aplicaciones de las X11 de Apple.</a></li><li><a href="usage-general.php?phpLang=es#x-options">8.5 Estoy confundido con todas las opciones de las X11: X11 de Apple, XFree86, etc. ¿Cuál de ellas debería instalar?</a></li><li><a href="usage-general.php?phpLang=es#no-display">8.6 Cuando intento correr una aplicación, me sale un mensaje diciendo: "cannot open display". ¿Qué debo hacer?</a></li><li><a href="usage-general.php?phpLang=es#suggest-package">8.7 No encuentro a mi programa favorito en Fink. ¿Cómo sugiero que se incluya un nuevo paquete en Fink?</a></li><li><a href="usage-general.php?phpLang=es#virtpackage">8.8  ¿Qué son todos estos system-* "virtual packages" que a veces están presentes, pero que yo mismo no puedo instalarlos ni sacarlos?</a></li></ul></li><li><a href="usage-packages.php?phpLang=es"><b>9 Package Usage Problems - Specific Packages</b></a><ul><li><a href="usage-packages.php?phpLang=es#xmms-quiet">9.1  No me sale sonido de XMMS.</a></li><li><a href="usage-packages.php?phpLang=es#nedit-window-locks">9.2 Cuando estoy editando un archivo en nedit, si abro otro archivo su ventana aparece pero no me responde.</a></li><li><a href="usage-packages.php?phpLang=es#xdarwin-start">9.3 Ayuda! Cuando abro XDarwin, inmediatamente se cuelga!</a></li><li><a href="usage-packages.php?phpLang=es#no-server">9.4 Cuando intento abrir XDarwin me sale el siguiente mensaje: "xinit: No such file  or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</a></li><li><a href="usage-packages.php?phpLang=es#apple-x-delete">9.5 Quiero que la tecla para borrar en el X11 de Apple se comporte como la tecla en Xdarwin.</a></li><li><a href="usage-packages.php?phpLang=es#gnome-two">9.6  Actualicé GNOME 1.x a GNOME 2.x y ahora <code>gnome-session</code> no abre al gestor de ventanas.</a></li><li><a href="usage-packages.php?phpLang=es#apple-x11-no-windowbar">9.7 He actualizado al X11 de Apple en Panther y ahora las barras de los títulos de las ventanas han desaparecido.</a></li><li><a href="usage-packages.php?phpLang=es#apple-x11-wants-xfree86">9.8 I'm having problems with X11 and Fink.</a></li><li><a href="usage-packages.php?phpLang=es#special-x11-debug">9.9 I'm still having problems with X11 and Fink.</a></li><li><a href="usage-packages.php?phpLang=es#tiger-gtk">9.10 After updating to Tiger (OS 10.4), whenever I use a GTK app, I get errors involving <code>_EVP_idea_cbc</code>.</a></li><li><a href="usage-packages.php?phpLang=es#yelp">9.11 I can't get the help to work for any GNOME application.</a></li></ul></li></ul>
<!--Generated from $Fink: faq.es.xml,v 1.18 2020/04/05 5:48:20 nieder Exp $-->
<?php include_once "../footer.inc"; ?>


