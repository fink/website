<?
$title = "News";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2008/02/27 04:04:28';
$metatags = '';

include_once "header.inc";
?>

<a name="2008-02-03%20Mirror,%20mirror%20on%20the%20wall,%20%E3%81%A0%E3%82%8C%E3%81%8B%20Fink%20%E3%82%92%E6%94%AF%E6%8F%B4%E3%81%97%E3%81%BE%E3%81%9B%E3%82%93%E3%81%8B?"><span class="news-date">2008-02-03: </span><span class="news-headline">Mirror, mirror on the wall, だれか Fink を支援しませんか?</span></a><?php gray_line(); ?>
<p>Todo gran proyecto de codigo abierto se enfrenta a problemas de
distribucion y el caso de Fink no es la excepcion. Nosotros deseamos
que puedas obtener los archivos que necesitas para construir tus
aplicaciones favoritas tan rapido como sea posible. Para ello, lo mas
conveniente es tener un "espejo" cercano a tu ubicacion.</p>

<p>Estamos trabajando activamente en la construccion de una
infraestructura de distribucion confiable que consiste en "espejos"
patrocinados por universidades y corporaciones. Recientemente, nuestra
lista de "espejos" se ha visto reducida considerablemente y necesitamos
tu ayuda para mejorar la calidad de los "espejos" de nuevo. </p>

<p>Esres un estudiante? Eres un maestro o profesor? Mantienes un Centro de Datos?
Eres un desarrollador con algo de tiempo libre? Aun si no puedes
contestar que si a ninguna de estas preguntas es posible que puedas
ayudar. Toda la informacion relevante para levantar y patrocinar un
"espejo" esta disponilbe en el <a href="http://wiki.finkproject.org/index.php/Fink:FinkMirrors">FinkWiki</a>. Para preguntas mas especificas
puedes <a href="mailto:fink-core-private@lists.sourceforge.net">contactarnos</a> directamente. Estamos solicitando espejos en todo
el mundo y especificamente en los siguientes paises:</p>

<ul><li>Estados UnidosJapon</li><li>Alemania</li><li>
Francia</li><li>Reino Unido</li><li>Canda</li><li>
Italia</li><li>España</li><li>Suiza</li><li>Australia</li></ul>

<p>Tambien queremos aprovechar esta oportunidad para agradecer a todos los
que han proveido "espejos" previamente. Sin su apoyo continuo Fink
podria proveer el nivel de servicio que actualmente tiene. Gracias!</p>
<a name="2008-01-12%20Fink%20website%20down"><span class="news-date">2008-01-12: </span><span class="news-headline">Fink website down</span></a><?php gray_line(); ?>
<p>The fink website is not functioning correctly at present.  (You may
have noticed that many of the links on this page do not function correctly.)  The
fink team is working to resolve the problem as quickly as possible.</p>
<p><b>Update, 2008-01-13:</b> The website is back to normal.</p>
<a name="2007-12-10%20Leopard,%20X11,%20y%20Fink"><span class="news-date">2007-12-10: </span><span class="news-headline">Leopard, X11, y Fink</span></a><?php gray_line(); ?>
<p>Los usuarios que deseen actualizar su instalación de X11 en Leopardo
deben ir a <a href="http://xquartz.macosforge.org/%20downloads/Xquartz-1.3.0-apple-fink.bz2">que es una actualizacion
Fink-friendly para el Xquartz</a>.  Los usuarios que ya hayan
aplicado el paquete X11-2.1.0.1.pkg del macosxforge.org <b>deben</b>
descargar el Xquartz compatible con Fink para que Fink trabaje
adecuadamente.
  (Note: there is an X11-2.1.1.pkg release pending which will remove the need to patch your Xquartz.  If you install X11 2.1.1 or later, <b>do not</b> apply the Xquartz patch.)</p>
    <p><b>Actualización, 2007-12-11:</b> La versión 2.1.1 del X11 <a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">esta dispnible en
la página de distribuciones de Xquartz</a>. Los usuarios que ya han
instalado el X11-2.1.1.0.1.pkg y/o ya han usado el parche
Xquartz-1.3.0-apple-fink de macosxforge.org deben actualizar al 2.1.1 o
superior para que Fink funcione apropiadamente. Esta versión reemplaza
todoas las versiones previas incluyendo las específicas para Fink.</p>
<a name="2007-11-18%20PDB%20Website%20Down"><span class="news-date">2007-11-18: </span><span class="news-headline">PDB Website Down</span></a><?php gray_line(); ?>
    <p>The Package Database web interface is presently down pending hardware and software upgrades. We are working on fixing the server as soon as possible. Sorry for any inconvenience.</p>
<p><b>Actualización, 2007-12-10:</b> La Base de Datos de 
Paquetes está funcionando nuevamente, con características 
mejoradas.</p>
  <a name="2007-10-26%20Initial%20Leopard%20Support"><span class="news-date">2007-10-26: </span><span class="news-headline">Initial Leopard Support</span></a><?php gray_line(); ?>
    <p>El Proyecto Fink anuncia el soporte inicial para Mac OS X Leopard (10.5).</p>
<p>Lo usuarios del sistema 10.5 que creen una nueva instalación de Fink
deberán hacerlo usando el bootstrap, al menos hasta que se genere una
distribución binaria. Descargen eñ fink-0.27.7 <a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">aquí</a>. La actualizacación
de 10.4-&gt;10.5 puede realizarse ejecuando <code>fink selfupdate</code> para obtener
el fink-0.27.7. Si haceis esto en el OS 10.5, asegurese de haber
instalado el Xcode 3.0. Tras instalar el 10.5, ejecute <code>fink reinstall
fink</code>.</p>
<p>Aún no existe un camino para actualizar directamente 10.3-&gt;10.5. Si
eres muy impaciente, sigue las instrucciones arriba mencionadas para
una nueva instalación.</p>
<p><b>Actualización, 2007-10-29:</b> Los usuarios que
actualicen fink deben tomar en cuanta que el uso del comando <code>fink
cleanup</code> para eliminar archivos .deb eliminara todos los archivos .deb.
Este comportamiento será corregido en la siguiente actualización de
fink.</p>
<a name="2007-03-04%20Problemas%20con%20tar"><span class="news-date">2007-03-04: </span><span class="news-headline">Problemas con tar</span></a><?php gray_line(); ?>
<p>Algunos usuarios de la rama inestable de fink ha experimentado dificultades
esporadicas al finalizar la construcción de paquetes grandes,
recibiendo reportes como el siguiente <b>tar: File changed as we read it</b>
which causes the .deb file not to be built.</p>
<p>El equipo fink esta actualmente estudiando el problema para encontrar
una solución permanente. Mientras tanto, los usuarios que esten
experimentando este problema pueden superarlo usando el comando <code>fink
install tar-1.15.1-14</code>. Es posible que este comando tenga que ser usado
tras cada <code>fink update-all</code>.</p>
<p>En cuanto el equipo fink determine como resolver este problema
permanentemente otro anuncio será hecho aquí.</p>
<p><b>Update: 16 March 2007:</b> The new version of fink's 
<code>dpkg</code> package resolves this problem.  Unstable users can
now run the update commands normally.</p>
<a name="2006-08-19%20El%20servidor%20esta%20caido;%20alternativas%20disponibles."><span class="news-date">2006-08-19: </span><span class="news-headline">El servidor esta caido; alternativas disponibles.</span></a><?php gray_line(); ?>
<p><b>Actualización: 21 Augusto 2006:</b> El servidor ha sido restituido.</p>
<p>El sevidor en el que residen cuatro importantes servicios de fink (la
actualización por rsync, la distribución binaria, el "master mirror" (espejo 
maestro) del código fuente y la base de datos de los paquetes) esta caido por el
momento. Estamos esperando que el servidor sea restituido el Lunes 21
de Aggosto, pero proveeremos algunas alternativas durante este periodo.</p>
<p>Para actualizar fink, se debe o seleccionar un espejo rsync diferente
al primario (ver el siguiente parafo) o, usar el comando <code>fink
selfupdate-cvs</code>. Solo se requiere hacer esto una vez, las
actualizaciones subsecuentes seguiran haciendose mediante CVS. Cuando
el servidor sea restituido se puede revertir a la actualización por
rsync usando el comanda <code>fink selfupdate-rsync</code>.</p>
<p>Para superar la ausencia de las distribución binaria, así como la del
"master mirror" (espejo maestro) del código fuente, hay que ejecutar el comando 
<code>fink configure</code>. Se debem aceptar las opciones por defecto excepto 
en las siguentes: en el caso de "Should Fink try to download pre-compiled
packages from the binary distribution if available?" hay que responder
"no" (esto deshabilita la distribución binaria); en el caso de you want
to change the mirror settings, hay que responder "yes", entonces se le
preguntara "What mirror order should fink use when downloading
sources?". La respuesta es "2: Search Master Mirrors last" (esto
deshabilita los intentos automaticos de usar el servidor del espejo
maestro). Finalmente, si usted decide mantenerse usando rsync para las
actualziaciones, cuando se le solicite "Choose a mirror for 'RSync
SelfUpdate'" hay que escoger cualquier servidor excepto
rsync://master.us.finkmirrors.net/finkinfo/. Desafortunadamente,
algunas opciones pueden no estar disponibles si usted esta fuera de los
Estados Unidos.</p>
<p>Finalmente, para usar la base de datos de los paquetes durante este
periodo es posible conectarse a <a href="http://lists.finkproject.org/pdb">esta copia de respaldo de la base de
datos</a> de los paquete que esta solo fuera de sincronia por unas 
semanas.</p>
		<a name="2006-07-24%20Reminder:%20%2210.4-transitional%22%20Tree%20Unsupported%20on%20August%201st,%202006"><span class="news-date">2006-07-24: </span><span class="news-headline">Reminder: "10.4-transitional" Tree Unsupported on August 1st, 2006</span></a><?php gray_line(); ?>
			<p>
				The "10.4-transitional" tree was created as an interim solution to the issues of
				incompatibilities between binaries made using GCC 3.3 (the default Mac OS X 10.3
				compiler) and GCC 4.0 (the default Mac OS X 10.4 compiler).  Now that the work to
				move Fink to using GCC 4.0 is essentially finished, we will be stopping official
				support of the "10.4-transitional" tree in favor of the "10.4" tree as of August
				1st, 2006.
			</p>
			<p><b>You should not need to do anything if "fink --version" prints "0.8.1.cvs" or "0.8.1.rsync".</b></p>
			<p>
				As we mentioned <a href="<?php print $root; ?>news/#2006-07-01%20July%20is%20%22Fink%20Update%20Month%22">previously</a>,
				there are 2 ways to make the switch to the supported "10.4" tree.
			</p>
			<p>
				The simplest way is to remove your Fink installation by deleting it and
				installing fresh using the 0.8.1 installer available from the <a href="<?php print $root; ?>download">download page</a>.
			</p>
			<p>
				Alternately, to preserve your Fink installation, download the
				<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">upgrade script</a>
				and read the README for instructions on how to upgrade your existing installation in-place.
				This will re-build your Fink installation from source, upgrading everything in the process.
				Be warned, it can take a lot of time, depending on your fink installation!
			</p>
			<p>
				Feedback on the upgrade script has been very positive; many users have already
				made the switch.  If you have problems, please feel free to mail your issues to
				the <a href="<?php print $root; ?>lists">discussion lists</a>.
			</p>
		<a name="2006-07-24%20Fink%20Birds-of-a-Feather%20at%20OSCON%202006"><span class="news-date">2006-07-24: </span><span class="news-headline">Fink Birds-of-a-Feather at OSCON 2006</span></a><?php gray_line(); ?>
			<p>Are you at OSCON 2006?  Want to meet up?</p>
			<p>
				<a href="mailto:oscon2006@racoonfink.com">Benjamin Reed</a> (RangerRick on #fink)
				is at OSCON and is interested in meeting anyone who wants to hang out and talk about
				Fink, or even just meet for the heck of it.
			</p>
			<p>
				Meet us in room F150 on Wednesday, July 26th at 8:30pm and we'll talk about Fink,
				Mac OS X, and anything else that takes our fancy.
			</p>
		<a name="2006-07-01%20July%20is%20%22Fink%20Update%20Month%22"><span class="news-date">2006-07-01: </span><span class="news-headline">July is "Fink Update Month"</span></a><?php gray_line(); ?>
      <p>
Fink users on PowerPC machines are advised to update their copies of
fink from the old "10.4-transitional" tree to the more recent "10.4"
tree.  We plan to discontinue the 10.4-transitional tree
by the end of July, 2006.
</p><p>
Some background: along with OS X 10.4 came a new version of the g++ compiler
(one of the workhorses of Fink), which produced code that was binary
incompatible with previous versions.  Fink, when using the 10.4-transitional 
tree, mixes the new gcc-4.0 compiler with the older g++-3.3 compiler.
This strategy gave us some extra time to make packages compatible with
g++-4.0.  The time has now come to complete that transition, and rely
exclusively on the newer tree.  The update, however, is slightly
complicated since all packages using or providing g++ libraries must
be rebuilt in the correct order.
</p><p>
If you are using OS X 10.4, you can
find out if you need to update your Fink installation
by running the command
<code>fink --version</code>.  If the Distribution version is 0.8.1.cvs
or 0.8.1.rsync, you do <b>not</b> need to update.  However, if the 
Distribution version is 0.8.0.cvs or 0.8.0.rsync, you should update,
as described below.
</p>
<p>
Many users will prefer to remove their fink installations and
start anew with the 0.8.1 installer.  Others will prefer to use the 
<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">10.4-update 
tarball (v. 0.4)</a> (around 12 MB), which includes 
precompiled versions of the basic fink packages as well as a script which
will attempt to update an existing fink installation.  Please consult
the README file which you will find within the 10.4-update directory 
(after unpacking the tarball) for further instructions.
</p>
<p>
Note: Fink users who are upgrading their systems from OS X 10.3 to OS X 10.4
can use the same two options to update their fink installations: they can
either remove their old fink installations and start over, or they can
use the same 10.4-update tarball.  The update script should not be run
until after OS X has been upgraded.
</p>
<a name="2006-06-15%20New%20Fink%20release."><span class="news-date">2006-06-15: </span><span class="news-headline">New Fink release.</span></a><?php gray_line(); ?>
      <p>
A new Fink release for OS X 10.4 (Tiger) is 
<a href="<?php print $root; ?>download/index.php">available</a>
 today: version 0.8.1, which can be installed on either Intel or PowerPC
hardware.
The release includes source files, binary packages, and  Fink
installers for both kinds of hardware.
</p>
      <p>
Fink on the Intel platform is still considered "beta" quality, and a number of
packages (particularly packages in the "unstable" tree) either do not compile,
or compile but do not run.  Work to improve this situation is ongoing.
</p>
<p>
Fink users on PowerPC whose existing fink installation uses the 
10.4-transitional tree (from the 0.8.0 distribution) may upgrade in
one of two ways.  The upgrade process is problematic, due to the change
in ABI of g++ libraries which requires many libraries to be recompiled.
Many users will simply wish to remove their fink installations and
start anew with the 0.8.1 installer.  Others may wish to use the new
<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.3.tar.gz?download">10.4-update tarball (v. 0.3)</a> (around 12 MB), which includes 
precompiled versions of the basic fink packages as well as a script which
will attempt to update an existing fink installation.
</p>
<a name="2006-05-10%20CVS%20Troubles"><span class="news-date">2006-05-10: </span><span class="news-headline">CVS Troubles</span></a><?php gray_line(); ?>
      <p>
As many Fink users are aware, the Fink CVS repository at sourceforge.net
has not been fully functional since March 30.  The anonymous CVS access
has not been updated since then, and as of several days ago, the developers
are also unable to update CVS in any form.
</p><p>
As we understand the current plans of sourceforge's staff (outlined
briefly on their <a href="http://sourceforge.net/docman/display_doc.php?docid=2352&amp;group_id=1">site
status page</a>), the old CVS servers will never be brought back in
their current form.  This is likely to mean disruption for fink users,
but at present, we cannot say what form this disruption will take.
</p><p>
Our current advice to fink users is to switch to the 'rsync' method of
updating (by running the command 'fink selfupdate-rsync').  This will at
least give you a fink installation which is current up through May 7.
If a full update to the new CVS situation turns out to be impossible
via fink's normal selfupdate command, we will post instructions here
on how to update when they become available.
</p>
<p>Update 5/24/06: CVS is now functioning again, and users using the rsync
method of selfupdating are getting up-to-date content.  If you are using
the cvs method, and can't (or don't wish to) switch to rsync, you should
download the file <code>fink-mirrors-0.24.15.2.tar.gz</code> from <a href="http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=69685">the
Sourceforge file release page</a>, expand the file, and run the command
<code>./inject.pl</code> from within the <code>fink-mirrors-0.24.15.2</code> directory.  After this has been done, the <code>fink selfupdate</code> command
should again work normally.
</p>
    <a name="2006-03-03%20Problem%20with%20Apple's%20latest%20Security%20Update"><span class="news-date">2006-03-03: </span><span class="news-headline">Problem with Apple's latest Security Update</span></a><?php gray_line(); ?>
      <p>
The Fink team has received reports of problems with the <code>rsync</code>
program which was modified by Apple's new Security Update 2006-001: for some
users, <code>fink selfupdate</code> fails to function after the Security
Update.  (The underlying cause appears to be a problem with the 
<code>--delete</code> option for <code>rsync</code>.)
</p>
      <p>
As a workaround, users can run <code>fink install rsync</code> to use
fink's rsync package rather than the Apple program.  Or, for those users
who need specific features of the Apple program (such as support for
Extended Attributes), another workaround is <code>fink selfupdate-cvs</code>
to switch from rsync to cvs updating.  
</p>
      <p>
This news item will be updated as the situation changes.
</p>
<p>Update 3/13/06: This has been resolved by security update 2006-002,
<a href="http://docs.info.apple.com/article.html?artnum=303453">according
to Apple's documentation</a>.
</p>
    <a name="2006-02-21%20Preliminary%20version%20of%20Fink%20on%20Intel"><span class="news-date">2006-02-21: </span><span class="news-headline">Preliminary version of Fink on Intel</span></a><?php gray_line(); ?>
<p>
A preliminary version of Fink for the Intel architecture is now ready.
No binary packages are available, and things are still rough around
the edges, but it should be usable if you are patient!
</p>
<p>
To install, you need to get the file <code>fink-0.24.12.tar.gz</code>
from <a href="http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043">the
Sourceforge file release page for Fink</a>, expand the file, and
run the command <code>./bootstrap.sh</code> .  At the end of the
bootstrap process, run <code>fink selfupdate</code> and you'll get
the currently available packages.
</p>
<p>
At last check, there were about 1750 packages in the "stable" tree, but
about 150 of those did not build.  When things are truly stable, another
annoucement will be made here.
</p>
<a name="2006-01-10%20Fink%20ready%20for%20XCode%202.2%20(but%20not%20for%20Intel)."><span class="news-date">2006-01-10: </span><span class="news-headline">Fink ready for XCode 2.2 (but not for Intel).</span></a><?php gray_line(); ?>
<p>
Fink is now ready for XCode 2.2, with the exception of the openoffice.org 
packages (which are expected to function again when we switch to the 10.4
tree).  Users are encouraged to upgrade to XCode 2.2 whenever they wish;
XCode 2.2 will be required for running the 10.4 tree when it is released.
</p>
<p>
On the other hand, in spite of today's announcements from Apple, Fink is
not ready to run on Intel processors.  The Fink team hopes to have an
Intel-ready version of fink released within a few weeks; the Fink team does 
not advise early recipients of new iMacs to install Fink on them, but suggests
waiting until the new version of fink is ready.
</p>
<p>Fink package maintainers please take note of the new <code>Architecture</code> field, now documented in the packaging manual.
</p>
<a name="2005-11-16%20XCode%202.2%20(10.4%20only)."><span class="news-date">2005-11-16: </span><span class="news-headline">XCode 2.2 (10.4 only).</span></a><?php gray_line(); ?>
<p>
The Fink team has had reports of some build problems with the XCode 2.2 compilers.  Until these are sorted out, we recommend that users hold off on upgrading XCode.
</p>
<p>
For those who have already installed XCode 2.2 and don't want to revert to 2.1, your participation in the effort to find packages that don't work and to fix them so that they do is welcomed!
</p>

<a name="2005-06-09%20New%20Fink%20releases."><span class="news-date">2005-06-09: </span><span class="news-headline">New Fink releases.</span></a><?php gray_line(); ?>
<p>
Three new Fink releases are 
<a href="<?php print $root; ?>download/index.php">available</a>
 today: version 0.8.0 (for 10.4),
version 0.7.2 (for 10.3), and version 0.6.4 (for 10.2).
All three releases include source files, binary packages, and a Fink
installer for new users.
</p>
<p>
The new release for 10.4 includes all currently-available "stable" packages
in source and binary form: there are 1565 of these, which constitutes more
than 80% of the 1909 packages available in the 10.3 release.  Work continues
by the fink developers on bringing more of the stable packages to Tiger.
</p>
<p>
The new release for 10.2 will be the last official release for that
version of Mac OS X.  Although no further updates (not even security
updates) will be provided by the Fink team, we anticipate that the
0.6.4 release will be usable for years to come.
</p>
<p>
Users upgrading to 10.4 can now simply issue a 
<code>fink selfupdate</code> command, followed by
<code>sudo /sw/lib/fink/postinstall.pl</code> (for first-time updaters
on 10.4), <code>fink scanpackages</code> and <code>sudo apt-get update</code>.
We don't recommend bootstrapping at the moment, since bootstrapping does
not work with the newly-released XCode 2.1 from Apple.
</p>

<a name="2005-04-29%20Fink%20y%20Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink y Tiger.</span></a><?php gray_line(); ?>
<p>
¡Fink puede usarse para OS X 10.4!  Hay diferentes formas de actualizarse:
</p><ul>
<li>
En pocas semanas estará disponible un instalador binario, para aquellos que sólo utilizan binarios.
</li><li>
Para usuarios de la rama estable, recomendamos borrar la instalación actual de
fink con <code>sudo rm -Rf /sw</code> y "bootstrap" una instalación de 
fink-0.23.9 utilizando 
<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203">
fink-0.23.9.tar.gz</a> -descargar el fichero y descomprimirlo mediante <code>tar -xvzf fink-0.23.9.tar.gz</code>. Tras ejecutar bootstrap.sh en el directorio <code>fink-0.23.9</code> resultante, necesitarás ejecutar <code>fink selfupdate</code>.
</li><li>
Los usuarios de la rama inestable pueden actualizarse simplemente
instalando fink-0.24.5, mediante <code>fink selfupdate</code> desde cualquier versión anterior. Tras actualizarse a 10.4, comprobad en primer lugar que se tiene la versión correcta mediante <code>fink --version</code>. Si el resultado del comando es menor que 0.24.5, ejéctuse <code>fink selfupdate</code> para obtener la versión correcta de fink. Y entonces reinstalar el paquete fink mediante <code>fink reinstall fink</code> y después <code>fink selfupdate</code>.
</li>
</ul>
<p>No todos los paquetes funcionan correctamente todavía bajo 10.4, pero esta situación se irá corrigiendo las próximas semanas. La rama estable contiene especialemnte pocos paquetes en 10.3, pero todos ellos deberían compilarse .</p>

<p>Por supuesto, algunas arrugas todavía necesitan ser planchadas (sic). Animamos a los usuarios con aplicaciones críticas que verifiquen en las listas de correo si alguien ha tenido problemas o no con el paquete en cuestión antes de actualizar.</p>
<a name="2004-11-20%20Soluci%C3%B3n%20a%20los%20problemas%20con%20gcc."><span class="news-date">2004-11-20: </span><span class="news-headline">Solución a los problemas con gcc.</span></a><?php gray_line(); ?>
<p>
Apple ha liberado el actualizador de gcc versión Noviembre 2004, disponible
(tras registro gratutito) en connect.apple.com.  Este actualizador elimina
el problema del compilador gcc3 en XCode 1.5.  Si estás usando  XCode 1.5, 
debes instalarlo.  (El instalador funcionará correctamente tanto
para aquellos usuarios que no han utilizado el parche recomendado por
el proyecto Fink como para aquellos que lo usaron en su momento.)
</p><p>
Agradecemos a Apple su respuesta a nuestros informes sobre este asunto
y el trabajo realizado para resolverlo rápidamente.
</p>


<a name="2004-10-15%20Resoluci%C3%B3n%20de%20problemas%20con%20gcc."><span class="news-date">2004-10-15: </span><span class="news-headline">Resolución de problemas con gcc.</span></a><?php gray_line(); ?>
      <p>
Se sabe que la versión de gcc incluída en XCode 1.5 produce 
salidas incorrectas desde código c++ bajo determinadas circunstancias.
Fink tiene ahora un mecanismo para avisar al usuario de esto. Además, 
Fink pronto rechazará el uso de esta versión "rota" para compilar paquetes
de los cuales se sepa que tienen este problema.</p>
      <p>
Si te has pasado ya a la versión 1.5 de XCode una solución se halla descrita 
<a href="http://article.gmane.org/gmane.os.apple.fink.beginners/13580"> aquí </a> y 
también <a href="http://article.gmane.org/gmane.os.apple.fink.beginners/14200"> aquí </a>.
</p>
      <p> Si no te has actualizado aún, nuestro consejo es que 
consideres no hacerlo y quedarte con  XCode versión 1.2 
hasta que el problema sea resuelto.
</p>
    <a name="2004-09-20%20Fink%200.7.1%20liberado."><span class="news-date">2004-09-20: </span><span class="news-headline">Fink 0.7.1 liberado.</span></a><?php gray_line(); ?>
<p>
La versión más reciente de Fink, versión 0.7.1 (para 10.3), ya está disponible como código fuente y como binario. 
Ésta ha sido creada para la versión Panther (10.3) de Mac OS X. La versión 0.6.3 sigue estando disponible para la versión Jaguar (10.2) de Mac OS X.
</p>

<p>
Esta nueva versión incorpora varias correcciones al manejador de paquetes e integra numerosos binarios previamiente inaccesibles 
dando como resultado un gran total de 1650 binarios. Ésto incluye binarios para KDE 3.1.4 y GNOME 2.4.
</p>

<p>
Para realizar una primera instalación de Fink, hay que seguir los consejos 
de <a href="http://fink.sourceforge.net/download/index.php">esta página</a>. Es posible actualizar una instalación de Fink previa, utilizando la instalación previa de Fink. En <a href="http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable&amp;cmp=0&amp;tree2=0.7.0-stable&amp;splitoffs=on&amp;sort=name">esta página</a> encontraras la lista de las diferencias entre las versiones 0.7.0 y 0.7.1.
</p>

<p>
Si tienes alguna pregunta o problema, usa las listas de correo de Fink. Más información acerca de estas 
listas la encontraras <a href="http://fink.sourceforge.net/lists/index.php">aquí</a>.

</p>

<p>
Asegúrate de seleccionar el <b>instalador adecuado</b> para tu plataforma. Fink 0.6.3 solo se funcionará en Mac OS X 10.2.* mientras que Fink 0.7.1 sólo se funcionará en Mac OS X 10.3.* </p>

<p>
El Equipo de Fink desea agradecer a sus muchos contributores, ayudantes frecuentes y a los desarrolladores por hacer que esta liberación ocurriera. 
También agradecemos a nuestra comunidad por descarger la versión 0.7.0 más de 130.000 veces. 
Sin su constante apoyo y valiosas indicaciones Fink no estaría donde está ahora...
</p>

<a name="2004-08-23%20Problemas%20con%20XCode%201.5"><span class="news-date">2004-08-23: </span><span class="news-headline">Problemas con XCode 1.5</span></a><?php gray_line(); ?>
	<p>
	Recientemente han habido reportes de varios paquetes del Fink que no
	 compilan correctamente usando Xcode 1.5. Si aún no han actualizado a
	  XCode 1.5, se sugiere que se espere a la solución de este problema 
	  antes de hacerlo.
	</p><p>
	Si has tenido problemas con algún paquete que compilaba correctamente
	 con XCode 1.2 pero que compila incorrectamente con XCode 1.5, favor 
	 de reportarlo a la lista de correo fink-devel. (El síntoma usual es:
	 some symbols are  missing after compiling with g++.)  
	Algunos paquetes que se sabe tiene este problema son octave, 
	singular-factory, singular-libfac, y posbilemente sdl.	</p>
	<a name="2004-08-21%20Error%20en%20fink-0.22.0"><span class="news-date">2004-08-21: </span><span class="news-headline">Error en fink-0.22.0</span></a><?php gray_line(); ?>
	<p>
	El manejador de paquetes del fink-0.22.0, el cual estuvo brevemente
	disponible en el árbol inestable la semana pasada, tiene un bug el 
	cual previene cualquier actualización via rsync. Si instalaste esta
	versión de fink, te puedes recuperar ejecutando el comando 
	<code>fink install fink-0.21.2-1</code> el cual ejecutará el downgrade
	de fink a la versión del árbol estable, subsecuentemente debes 
	ejecutar:
		<code>fink selfupdate</code>
	</p><p>
	Si por alguna razón estos comandos no funcionan, vaya a
		<a href="http://sourceforge.net/project/showfiles.php?group_id=17203"> la página de la liberación del archivo fink en el 
		sourceforge</a> y descarge el archivo
		<code>fink-0.22.1.tar.gz</code> . Desempaque este archivo con	<code>tar xfz fink-0.22.1.tar.gz</code> , y desde dentro del directorio
	fink-0.22.1 directory, ejecute el comando <code>./inject.pl</code>
	</p>
	<p>
	El equipo de Fink se disculpa por el error y agradece a la comunidad 
	de usuarios por llamar nuestra atención rápidamente.
	</p>
	<a name="2004-08-01%20Mejorando%20nuestros%20espejos.%20%C2%BFPuedes%20ayudarnos?"><span class="news-date">2004-08-01: </span><span class="news-headline">Mejorando nuestros espejos. ¿Puedes ayudarnos?</span></a><?php gray_line(); ?>
	<p>
	La desición de Fink de incrementar gradualmente nuestra red de espejos
	a pagado con creces. Para asegurarnos de seguir ofreciendo un
	servicio de alta calidad, necesitamod mejorar nuestra red de espejos.
	Ya ha pasado bastante tiempo desde la última vez que solicitamos más
	espejos. Así que, es momento de hacerlo de nuevo.  Fink esta muy
	agradecido por los recursos concedidos por nuestra comunidad. Para
	mejorar nuestro servicio a la comunidad requerimos un aún mejor
	sistema de espejos. En particular, carecemos de espejos en Europa
	Central, Rusia y el Lejano Oriente. Sí sientes que tienes 2 Mbit para
	compartir con un espejo de rsync, o aún más para ofrecer un espejo de
	distfiles, por favor  <a href="mailto:mirrors@finkmirrors.net">contactanos</a>.
	</p>
	<p>
	 Para obtener un mejor conocimiento de los diferentes tipos de espejos
	 que Fink ofrece, por favor revisa este sitio: 
	 <a href="http://finkmirrors.net/">finkmirrors.net</a>. 
	 Este es el sitio oficial de todos los asuntos relacionados con los
	 espejos. Si crees que puedes ofrecer otro tipo de recursos, por ejemplo, un espacio web para pruebas, no dudes en <a href="mailto:mirrors@finkmirrors.net">contactarnos</a> .
	</p>
	<a name="2004-04-06%20Fink%200.6.3%20y%200.7.0%20liberados."><span class="news-date">2004-04-06: </span><span class="news-headline">Fink 0.6.3 y 0.7.0 liberados.</span></a><?php gray_line(); ?>
	<p>
Las versiones más recientes de Fink, versión 0.6.3 (para 10.2) y 0.7.0 (para 10.3), 
ya esta disponible como código fuente y como binario. El versión 0.6.3 esta construida para <b>10.2</b>, mientras que la 0.7.0 ha sido creada para <b>10.3</b>. Esta estrategia facilitará el soporte de diferentes plataformas.
	</p>
	<p>
Estos nuevos binarios incorporan varias mejoras del manejador de paquetes, varios paquetes binarios que previamente no estaban disponibles han sido agregados y varios paquetes problemáticos para los usuarios del 10.3 han sido reconstruidos.
	</p>
	<p>
Para completar una nueva instalación de Fink se deben seguir las instrucciones que están  
<a href="download/index.php?phpLang=es">aquí</a>.
También es posible actulizar tu instalación previa de Fink siguiendo las instrucciones que se encuentran  <a href="download/upgrade.php?phpLang=es">aquí</a>.

Si tienen dudas o algún problema, por favor usen la lista de correo que se encuentra <a href="lists/index.php?phpLang=es">aquí</a>.
		</p>
		<p>
Asegurense de escoger el <b>instalador adecuado</b> para su plataforma.
Fink 0.6.3 solo se instalará en Mac OS X 10.2.* mientras que Fink 0.7.0 sólo se instalará en Mac OS X 10.3.* 
		</p>
	<p>
El Equipo de Fink desea agradecer a sus muchos contributores, ayudantes frecuentes y a los desarrolladores por hacer que esta liberación ocurriera. 
También agradecemos a nuestra comunidad, sin su constante apoyo y valiosas indicaciones Fink no estaría donde está ahora...

</p>

<a name="2004-02-19%20Ondea%20tu%20bandera."><span class="news-date">2004-02-19: </span><span class="news-headline">Ondea tu bandera.</span></a><?php gray_line(); ?>
	<p>
Gracias a Baba Yoshihiko, Fink ha tomado los pasos necesarios para permitirnos la internacionalización.
La infraestructura mejorada nos permite desplegar un sitio web multilenguaje a nuestros visitantes de todo el mundo.</p>
<p>
Esto también significa que se necesitan voluntarios. El sitio web de Fink necesita ser traducido al lenguaje de tu elección. Una traducción al japonés esta en proceso al igual que una al francés, lidereada por Michele Garoche.
¿A qué idioma estas dispuesto a traducir?
</p>
<p>
Si estas dispuesto a convertirte en un miembro de algún equipo de internacionalización o si deseas proporcionar alguna retroalimentación del sitio web, sientete libre de unirte a la nueva lista de correo. 
Puedes hacerlo visitando la  <a href="lists/index.php">página de las listas de correo</a>. El anuncio completo de las listas de correo existentes puede leerse <a href="http://article.gmane.org/gmane.os.apple.fink.devel/7554">aquí</a>.
</p>
<a name="2004-02-02%20La%20actualizaci%C3%B3n%20de%20Java%201.4.2%20elimina%20el%20Java%20SDK"><span class="news-date">2004-02-02: </span><span class="news-headline">La actualización de Java 1.4.2 elimina el Java SDK</span></a><?php gray_line(); ?>
	<p>
Si tenás instalados Java 1.4.1 y el Java SDK, la actulización 
Java 1.4.2 de Applw actualizara el  Java runtime a 1.4.2,
pero <b>removerá</b> el previó Java 1.4.1 runtime y el
SDK <b>sin</b> actualizar el JDK.  Para construir paquetes de Java en Fink necesitaras ir a  <a href="http://connect.apple.com/">la pagina
connect.apple.com y descargar el Java 1.4.2 SDK</a> (registro gratuito requerido).
	</p>
	<a name="2004-01-18%20Binarios%20para%20el%2010.3%20actualizados"><span class="news-date">2004-01-18: </span><span class="news-headline">Binarios para el 10.3 actualizados</span></a><?php gray_line(); ?>
	<p>
Muchos de los archivos binarios para el 10.3 han sido actualizados, eliminando los problemas con el qt y kde, entre otros. Para accesar los archivos actualizadosm actualiza tu indice de binarios ejecutando el comando <code>sudo apt-get update</code> .  Despues de esto, puedes usar el apt-get, dselect or el FinkCommander para instalar los binarios como siempre.	</p>
	<a name="2004-01-10%20Pssst%20want%20to%20install%20GNOME%202.4?"><span class="news-date">2004-01-10: </span><span class="news-headline">Pssst want to install GNOME 2.4?</span></a><?php gray_line(); ?>
	<p>
	Thanks to the new Fink GNOME Core team, including a lot of hard work by packaging
	newcomer Keith Conger and GNOME 1.x maintainer Masanori Sekino, GNOME 2.4 has
	finally been released to the 10.3 unstable tree.
	</p>
	<p>
	It is there for the taking; please offer some of your time and test these packages
	if you are on unstable already.  Because of the massive number of changes, it is
	expected that there will be issues upgrading or installing the new GNOME.  If you
	have problems, you can reach the GNOME-savvy people at
	<a href="mailto:fink-gnome-core@lists.sourceforge.net">fink-gnome-core@lists.sourceforge.net</a>.
	Please do report success stories there as well.  The more good reports we get, the
	faster GNOME 2.4 can be moved to stable.
	</p>
	<p>
	For those of you who do not read our mailing lists, <a href="http://fink.sourceforge.net/lists/index.php">why aren't you subscribed yet</a>?
	Here is a link to detailed 
	<a href="http://article.gmane.org/gmane.os.apple.fink.gnome/57/match=gnome">instructions</a> 
	how to install or upgrade GNOME and what new stuff it brings.
	</p>
	<a name="2004-01-02%20Whaaazaaap%20Dawgs,%20Two%20Zero%20Zero%20Four%20is%20on!"><span class="news-date">2004-01-02: </span><span class="news-headline">Whaaazaaap Dawgs, Two Zero Zero Four is on!</span></a><?php gray_line(); ?>
	<p>
	A happy new year to all of you from the whole team. Blame this outburst of an 
	attempt at slang language on some of us having to watch the MTV Music Awards all
   day long.
	</p>
	<p>
	Last year has been a good year for Fink. We have had hard times keeping up with 
	the changes introduces by Apple, but we also learned that we have a great community
	which is willing to go through great lengths to support us. 
	For this, we say "Thank You". Much of what happens in the Fink project
   happens because of the amazing support and encouragement we get from our users.
	</p>
	<p>
	Two Zero Zero Four should not make us slow down, but speed up. There are some 
	interesting things in the pipeline, including GNOME 2.4, a new release of KDE, major 
	changes to the package manager itself, and organisational restructuring. 
	Hopefully we will advance into an even bigger project with developer conferences, 
	real life meetings, and a CD in your favourite shop.
	</p>
	<p>
	High ambitions can make one fall very deeply, thus we shall take it carefully, but 
	still we are all counting on your support during this year. Tell us what you think 
	about Fink; tell us what you like or dislike; show us ways to improve ourselves.
	Lend us your resources and sponsor a mirror or hardware. Devote some of your time
	to improve the package manager or add another piece of software by creating an
	info file. Browse this website and hopefully indulge yourself. We enjoy serving
	such a nice community; hopefully we shall make it a smooth ride for you and
	your Macintosh in Two Zero Zero Four.
	</p>
	<a name="2003-12-28%20Merry%20Christmas%20and%20a%20happy%20new%20year"><span class="news-date">2003-12-28: </span><span class="news-headline">Merry Christmas and a happy new year</span></a><?php gray_line(); ?>
		<p>
 The Fink team and I wish all of you a merry Christmas and happy Holidays. We are looking
 forward to yet another year where we can help the Macintosh community grow into the 
 world of UNIX together with Mac OS X.
		</p>
		<p>
 We wish you all, that your hope is not too frail and that you will carry on following 
 through with your wishes. May the world we live in gradually become a better place and
 may peace and understanding settle just for a few days. 
		</p>
		<p>
 Enjoy your quiet time and in case we do not get around to saying it soon enough. 
 A happy new year to all of you, stay with us we count on your support.
		
		</p>
	<a name="2003-11-30%20There%20they%20are!%20New%20mirrors.."><span class="news-date">2003-11-30: </span><span class="news-headline">There they are! New mirrors..</span></a><?php gray_line(); ?>
		<p>
	Thank you, thank you, thank you. What a great community we have.
	Thank you for providing us with more mirrors. 
		</p>
		<p>
	Matthew Healey, member of the Western <a href="http://www.wamug.org.au">
	Australian</a> Macintosh User Group, and their 
	ISP <a href="http://www.extremedsl.com.au">extremedsl</a>
	are providing Fink with a full mirror in Perth, Australia. This is our first
	mirror in down under, thus I am pleased to welcome them to the family.
	Furthermore the <a href="http://www.mirror.ac.uk">UKMIRROR</a> service 
	has accepted us, making distfile services available for Fink 
	on 21 load balanced server.
		</p>
		<p>
	We are very happy about this development, but we still need more rsync mirrors.
	Thus, once more, if you feel like helping, please visit 
	<a href="http://finkmirrors.net">finkmirrors.net</a> and get in touch.
		</p>
		<a name="2003-11-24%20More%20mirrors....pretty%20please?"><span class="news-date">2003-11-24: </span><span class="news-headline">More mirrors....pretty please?</span></a><?php gray_line(); ?>
	<p>While we welcome our latest full mirror in Norway, sponsored by Havar Valeur, 
	we crave more. To improve our service to all of you, we would like to ask that
	you evaluate carefully if you maybe do have the resources to become a mirror. 
	</p>    
	<p>     
	All it takes is a 10Mbit link, around 100MB of disk space  and some bandwidth you are 
	willing to share for Fink. The exact setup instructions for rsync mirrors can be found 
	<a href="http://finkmirrors.net/rsync.html">here</a>. Especially mirrors in
	Asia, Australia, New Zealand, South Europe and Middle Europe are welcome, since we have none in 
	those regions yet. If you feel generous and wish to donate even more resources, please visit
	<a href="http://finkmirrors.net">finkmirrors.net</a> to learn about your options.
	</p>    
	<p>     
	The current status of all available rsync mirrors can be viewed on the finkmirrors.net pages as well.
	We hope to improve this service in the future, yet this depends on your willingness to help us out. 
	We are looking forward to many new applications and thank our community in advance. 
	</p>    
	<a name="2003-11-17%20Fink%200.6.2%20released"><span class="news-date">2003-11-17: </span><span class="news-headline">Fink 0.6.2 released</span></a><?php gray_line(); ?>
	<p>The latest Fink release, version 0.6.2, is now available
for both source and binary users.  This is a bug-fix release, intended
to address two problems: the dselect/user deletion bug, and a 
problem with ownership of files.  The dselect bug was addressed by
updating the fink, dpkg, and apt packages.  After updating to 0.6.2,
it is safe to once again use dselect.  However, if you ran dselect
at any time since 0.6.0, you should carefully check the integrity
of the file at <code>/sw/etc/apt/sources.list</code>.  If you have
any doubts about this file, you should replace it with
<a href="files/sources.list">the default sources.list file</a>.
</p>
<p>Users who have installed binary files from the 0.6.1 distribution
may find that certain files in their Fink installation are owned
by UID 2011 rather than by root.  To correct this problem,
run the command:</p>
<pre>sudo find /sw/ -user 2011 -exec chown root:admin {} \;</pre>
<p>This release, like the previous one, was built on OS X 10.2
using the gcc 3.3 compiler, and runs fine with some exceptions* on OS X 10.3.  Most Fink 
users who upgrade to 10.3 will continue to
want to only use the binaries from this
new distribution for now, while the Fink team continues to modify
Fink packages for 10.3.
</p>
<p>*Exceptions include: emacs, qt.
</p>
	<a name="2003-11-04%20User%20Deletion%20Bug/%20Dselect%20Troubles"><span class="news-date">2003-11-04: </span><span class="news-headline">User Deletion Bug/ Dselect Troubles</span></a><?php gray_line(); ?>
<p><b>Quick Summary: DO NOT USE DSELECT,</b> and if you've used it,
check your /sw/etc/apt/sources.list file carefully.</p>
		<p>Users who have bootstrapped or installed Fink 0.5.3 or Fink 0.6.0
		on Mac OS X 10.3 could exhibit a problem where all users get deleted
		from the netinfo database, and you become unable to log in.
We believe that this problem can only occur if you've used dselect.</p>
		<p>If you are using Mac OS X 10.3, please be sure you're using the
		latest Fink version to avoid the issue.  To make sure you don't have
		upgrade problems, check your <code>/sw/etc/apt/sources.list</code>
		file.  You will need to modify it if it contains <code>deb</code>
		lines that point to "release" or "current" without a version number.
		In other words, if your <code>sources.list</code> file contains
		these lines:</p>
		<pre>deb http://us.dl.sourceforge.net/fink/direct_download release main
deb http://us.dl.sourceforge.net/fink/direct_download current main</pre>
		<p>...you should change them to this:</p>
		<pre>deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main</pre>
		<p>We are working on updating the repository to make sure that even
		if you update you don't get the broken code, and to
repair dselect, but in the meantime,
		make sure your <code>sources.list</code> file has the correct entries.</p>
<p>Other users have experienced problems with dselect itself, particularly
complaints about a missing "darwin" package.  If you are running dselect
under 10.3 and you <b>don't</b> get this warning, then your 
<code>sources.list</code> file is likely to be corrupted and you should
repair it as above.
</p>
	<a name="2003-11-01%20Fink%200.6.1%20released"><span class="news-date">2003-11-01: </span><span class="news-headline">Fink 0.6.1 released</span></a><?php gray_line(); ?>
	<p>The latest Fink release, version 0.6.1, is now available
for both source and binary users.  This release was built on OS X 10.2
using the gcc 3.3 compiler, and runs well on OS X 10.3.  Most Fink
users who upgrade to 10.3 will want to only use the binaries from this
new distribution for now, while the Fink team continues to modify
Fink packages for 10.3.
</p><p>
If you wish to access the 
new binaries, use apt-get, dselect, or the binary mode of
FinkCommander.  Unless you are interested in helping the Fink team
to test packages which are compiled on 10.3, 
do not use the command-line <code>fink</code> program to do your
installations for the
next few weeks.
</p>
<p>The simplest way to upgrade a binary installation is to run
"sudo apt-get update".  Further details and
other issues related to upgrading Fink to 10.3 are addressed on the
<a href="download/10.3-upgrade.php">Special 10.3 upgrade page.</a>
</p><p>
Before using the latest version of
the command-line <code>fink</code> program 
under OS X 10.2, be sure to install the August2003gccUpdater, available
after free registration from connect.apple.com.
</p>
		<a name="2003-10-31%20Happy%20Halloween%20and%20welcome%20new%20mirrors"><span class="news-date">2003-10-31: </span><span class="news-headline">Happy Halloween and welcome new mirrors</span></a><?php gray_line(); ?>
		<p>
		We wish all of you a happy Halloween.
		</p>
		<p>
		Furthermore I would like to welcome our new mirrors to the Fink family.
		From Europe in Rijeka, Croatia a new full mirror joins us. This mirrors 
		has been sponsored by the <a href="http://mac.dir.hr/">Jabucnjak</a> Apple user group. 
		This is our first mirror in Europe, so I hope that more will be joining us 
		soon.
		</p>
		<p>
		Dave Schroeder from the <a href="http://mirror.services.wisc.edu/">University of 
		Wisconsin</a> in Madison is sponsoring a 100Mbit dedicated Master server.
		A. J. Wright and <a href="http://sunsite.utk.edu/">SunSITE@UTK</a> are helping out with 
		another full mirror in the United states. 
		</p>
		<p>
		This raises our full mirror count to four and the rsync mirror count to 
		five. We are happy to have such a great community back us up, but I know 
		that more mirrors will join over time. I will not stop nagging you until
		Fink has its own mirror in every state of the USA. Yet, with such a 
		brilliant community backing us up, I am not too worried about not
		reaching my goal very soon.
		</p>
		<p>
		Trick or treat! Our most wanted treat is more mirrors, so come forth 
		Administrators and fill our bag. Information on how you can be a mirror
		can be found on the official <a href="http://finkmirrors.net">
		mirroring website</a>.
		</p>
		<a name="2003-10-25%20Look%20Ma,%20a%20logo%20for%20Fink"><span class="news-date">2003-10-25: </span><span class="news-headline">Look Ma, a logo for Fink</span></a><?php gray_line(); ?>
	<p>As you surely noticed, Fink has a logo. This is the result of our
	Logo <a href="logo.php">contest</a> held earlier this year.
	This new, official, logo has been displayed since the 24th of October and
	those of you who wondered how it has been picked and what the name of the
	winner is should read up in the PR <a href="pr/index.php">section</a>.
	</p>
	<p>
	The longer explanation also features a larger version of the logo itself,
	so that you may have a closer look at its details. We like our new logo,
	we hope that you will like it too.
	</p>
	<p>IMPORTANT: We do not yet have a formal licensing agreement for the new
   logo and so are unable to give permission to distribute it.  Currently, it
   can only be displayed on the Fink web page.  Thank you for your understanding.
	</p>
		<a name="2003-10-24%20Upgrade%20to%20gcc%203.3%20and/or%2010.3"><span class="news-date">2003-10-24: </span><span class="news-headline">Upgrade to gcc 3.3 and/or 10.3</span></a><?php gray_line(); ?>
	<p>It is now possible to upgrade Fink to take full advantage of the gcc 3.3
compiler, or to use OS X 10.3 if you have that installed.  Binary packages
corresponding to these upgrades are not yet available, so if you make 
extensive use of binary packages you may wish to wait a few days before 
upgrading.
</p><p>
If you wish to perform this upgrade, and you had previously installed the
June 2003 Developer Tools update from Apple, you will need to install
the August 2003 Developer Tools update BEFORE you upgrade Fink.  Under
10.3, be sure to install XCode from the XCode disk before upgrading
Fink.
</p><p>
Running "fink selfupdate" should perform the upgrade for you.  The latest
version of the fink package manager will automatically detect which
version of OS X and which version of gcc you have installed, and will
adjust itself accordingly.
</p><p>
If you wish to do a fresh install of Fink on a 10.3 system, we recommend
<a href="http://fink.sourceforge.net/download/srcdist.php">bootstrapping from
source,</a> starting from fink-full-0.6.0.tar.gz available
on fink's <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">sourceforge 
download page.</a>  You'll need XCode for this as
well.
</p><p>
Also note that once you have Fink version 0.15.0 or higher, you do
not need to install system-xfree86 anymore.  Fink is
capable of automatically determining your system-xfree86 version if you
don't already have any fink x11 packages installed.  If you currently
have an old system-xfree86 package of any kind installed, please run the
following:
</p>
<pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43; fink selfupdate; fink index</pre>
<p>
The Fink team is still working on getting Fink packages working under 10.3,
but many many packages already work.
</p>
		<a name="2003-10-23%20Say%20Hello%20to%20Mirror%20Numero%20Uno"><span class="news-date">2003-10-23: </span><span class="news-headline">Say Hello to Mirror Numero Uno</span></a><?php gray_line(); ?>
	<p>You are too late. Rus Foster from <a href="http://www.jvds.com">JVDS</a>
	beat you all to it. He is the first one to provide us with resources 
	for a Fink rsync mirror.
	The mirror is located in Atlanta, GA and is updated every two hours, at 35 minutes past.
	</p>
	<p>For those of you who are still waiting, join in. The more mirrors we have
	the faster you can rsync your info files. As per usual, updated and current
	information on the mirror structure can be found on <a href="http://finkmirrors.net"> Finkmirrors.net </a>
	</p>
		<a name="2003-10-22%20Mirror,%20mirror%20on%20the%20wall..."><span class="news-date">2003-10-22: </span><span class="news-headline">Mirror, mirror on the wall...</span></a><?php gray_line(); ?>
	<p>..who will mirror Fink above all? There is a new player on the turf
	and it belongs to the Fink team. <a href="http://finkmirrors.net"> Finkmirrors.net</a> tells you everything you wanted to know about mirroring Fink and its related resources on your Server. As our mirror structure will hopefully grow in the future, this web-site will also hold information about each individual mirror.
	</p>
	<p>To ensure that our service remains as stable as possible and to distribute the load imposed onto our main rsync server, we are looking for rsync mirrors or full mirrors. Those of you who are willing to share resources will find all the necessary information on <a href="http://finkmirrors.net"> Finkmirrors.net</a>. 
</p>
<p>
UPDATE: Yes, I screwed up when I initially installed the DNS records. If you cannot connect please try again later. I am very sorry for this inconvenience. Thank you for your understanding.
</p>
<a name="2003-10-12%20New%20update%20method%20available"><span class="news-date">2003-10-12: </span><span class="news-headline">New update method available</span></a><?php gray_line(); ?>
<p>The latest version of the fink package manager offers a new update
method, <code>fink selfupdate-rsync</code>, as an alternative to the
CVS updates which have been so problematic in the past few months.
If you have difficulty updating to the new version, please follow
<a href="http://fink.sourceforge.net/download/rsync-upgrade.php">these 
special update instructions</a>.
</p>
<p>In addition, this version of the fink package manager is compatible
with last summer's Developer Tools updates.  After installing both the new
package manager and the Developer Tools update, 
fink will ask you to reset your gcc version whenever
that is necessary.</p>
	<a name="2003-09-02%20Logo%20contest%20ends"><span class="news-date">2003-09-02: </span><span class="news-headline">Logo contest ends</span></a><?php gray_line(); ?>
<p>The Logo contest held by Fink, announced <a href="http://fink.sourceforge.net/logo.php">here</a>,
ended yesterday. With over 80 different proposals from countries all over the world we 
consider the contest a big success.  
In the next couple of days all the submitted entries will be put on-line in a publicly accessible gallery and more details on the participants shall be published. For those who are 
curious and cannot wait may have a look at an incomplete <a href="http://nour.net/logo/incomplete.html">preview</a>.</p>
<p>Fink is proud to be part of such a supportive community and would like to thank those who submitted entries and <a href="http://www.macwelt.de">MacWelt</a> for their continued support.
</p>
	<a name="2003-08-18%20Source%20files%20from%20ftp.gnu.org"><span class="news-date">2003-08-18: </span><span class="news-headline">Source files from ftp.gnu.org</span></a><?php gray_line(); ?>
<p>As announced in <a href="http://www.cert.org/advisories/CA-2003-21.html">this CERT 
advisory</a>, it has recently been discovered that
the ftp servers for GNU software were compromised back in March, 
although it is not believed that any of the source code housed there
was affected.
</p><p>
Fink relies on MD5 checksums when downloading software, and we have had
no reports of incorrect checksums in Fink packages.  The Free Software
Foundation is in the process of verifying the integrity of all of the
source code distributed from that ftp site.  As of this writing, the source
code for the following Fink packages have not yet been verified:
<code>autoconf2.54</code>,
<code>emacs21</code>,
<code>gprolog</code>,
<code>groff</code>,
<code>guile16</code>,
<code>help2man</code>,
<code>jwhois</code>,
<code>libtool14</code>,
<code>libosip1</code>,
<code>sed</code>,
<code>slib</code>.
It may be difficult to install those packages at present.
</p>
		<a name="2003-06-26%20Developer%20Tools%20Update."><span class="news-date">2003-06-26: </span><span class="news-headline">Developer Tools Update.</span></a><?php gray_line(); ?>
<p><b>Quick Summary: DO NOT INSTALL THIS UPDATE.</b></p>
	       <p>
Apple has released a patch to the December 2002 
Developer Tools which includes gcc 3.3,
their new compiler.
</p><p>
Fink does not yet support compiling with gcc 3.3.  In addition, it is important
not to "mix and match" between compilers:  all C++ code in fink packages
needs to be compiled
with the same compiler.
</p><p>
For this reason, the Fink team recommends that if you update your
Developer Tools with the new patch, you should be careful to run
<code>sudo gcc_select 3</code>
prior to any "fink build" or "fink install" commands.
</p>
<p><b>Update 30 June 2003:</b> A 
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=2680195&amp;forum_id=2056">problem
has now been detected</a> with
the new assembler program which the update installs, which may prevent
certain Fink packages from being compiled at all if you install this
update.  
</p>
<p><b>Generally, Fortran programs will break if you install the update;
the breakage does not stop by simply switching back to gcc 3.1.</b>
The Fink team is working on a workaround for this problem, but until it
is ready, if you need Fortran-related programs you should not install
the update.</p>

		<a name="2003-06-20%20Darwin%20packaging%20groups%20to%20coordinate%20efforts."><span class="news-date">2003-06-20: </span><span class="news-headline">Darwin packaging groups to coordinate efforts.</span></a><?php gray_line(); ?>
	       <p>
The <a href="http://fink.sourceforge.net">Fink</a>, 
<a href="http://www.gentoo.org">Gentoo</a>, 
and 
<a href="http://opendarwin.org/projects/darwinports/">DarwinPorts</a> 
projects are pleased to announce the formation of  a cooperative development 
alliance forged to facilitate delivery of freely available software to 
Mac OS X.  Under this new alliance, the projects will share information and 
coordinate efforts for porting software to 
Apple's <a href="http://www.apple.com/macosx">Mac OS X</a> 
and <a href="http://www.apple.com/darwin">Darwin</a> operating 
systems.  Members of the alliance will share information using 
the <a href="http://www.metapkg.org">www.metapkg.org</a> Web 
site,  which  will provide a home for this cooperative effort. 
</p>
		<a name="2003-06-16%20Fink%20logo%20contest%20begins."><span class="news-date">2003-06-16: </span><span class="news-headline">Fink logo contest begins.</span></a><?php gray_line(); ?>
	       <p>Fink and 
<a href="http://www.macwelt.de/">MacWelt</a> have managed to organize a logo contest.
For the next six weeks everyone is invited to submit their logo creations. 
Fink needs a new face and with your help we might just get one.  We are curious to see what you imagine Fink to be as a graphical representation.
The initial announcement by Macnews is in German, for those of you not capable of reading German a translated version can be found
 <a href="http://fink.sourceforge.net/logo.php">here</a>. 
		</p>
<p>
Fink and MacWelt hope that many of you will participate as we might just find some prices for the winners. Good luck and.... start drawing.
</p>
		<a name="2003-05-05%20KDE%203.1.1%20Binaries%20Available"><span class="news-date">2003-05-05: </span><span class="news-headline">KDE 3.1.1 Binaries Available</span></a><?php gray_line(); ?>
	       <p>KDE 3.1.1 binaries are now available.  Since they
have been released after 0.5.2 came out, you will need to update
your package descriptions by running <code>sudo apt-get update</code>
(or equivalent) before they will be available for installation.
For pointers to the changes and security fixes in this release,
see <a href="http://sourceforge.net/mailarchive/forum.php?thread_id=2068947&amp;forum_id=2022">the
announcement</a>.
</p>

		<a name="2003-04-16%20Virex%20problem%20resolved"><span class="news-date">2003-04-16: </span><span class="news-headline">Virex problem resolved</span></a><?php gray_line(); ?>
	       <p>McAfee has released Virex 7.2.1, which no longer
overwrites the main Fink directory <code>/sw</code>.  Fink users should
continue to avoid Virex 7.2.
</p><p>Early reports indicate that upgrading Virex from 7.2 to 7.2.1
still leaves some problems however.  If you upgrade Virex with Fink not
installed, and subsequently
wish to install Fink, you will need to delete the <code>/sw</code>
directory by hand before installing.  And if you upgrade Virex with
Fink already installed, you should immediately run
<b>
fink reinstall openssl-shlibs dlcompat-shlibs curl-ssl-shlibs
</b>
to restore files which the Virex upgrade may have deleted.
</p>

		<a name="2003-04-14%20Fink%200.5.2%20released"><span class="news-date">2003-04-14: </span><span class="news-headline">Fink 0.5.2 released</span></a><?php gray_line(); ?>
	       <p>Fink is proud to announce that the Fink binary distribution 0.5.2 is available from the <a href="http://fink.sourceforge.net/download.php">download</a> page.
		With over 190 new binary packages, KDE, KOffice and KDevelop binaries amongst other various improvements this is a recommended download for any new and all existing Fink users.
		The full announcement can be read on the <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-announce">fink-announce</a> mailing list.
		</p>
<p>(If you are having trouble upgrading a source installation, consult
<a href="http://fink.sourceforge.net/download/fix-upgrade.php">these
special instructions</a>.)</p>

		<a name="2003-04-09%20Interview%20on%20OSNews.com"><span class="news-date">2003-04-09: </span><span class="news-headline">Interview on OSNews.com</span></a><?php gray_line(); ?>
	<p><a href="http://osnews.com/">OSNews.com</a> today is featuring a
	<a href="http://osnews.com/story.php?news_id=3236">mini-interview</a> with
	one of our project leaders, Max Horn. It contains some rather unusual questions,
	so even if you know Fink fairly well, you might find it informative.
</p><a name="2003-03-29%20KDE%203.1.1%20Final%20In%20Unstable"><span class="news-date">2003-03-29: </span><span class="news-headline">KDE 3.1.1 Final In Unstable</span></a><?php gray_line(); ?>
	<p>KDE 3.1.1 is now in Fink unstable.  The full announcement can be
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=1898907&amp;forum_id=2022">read here</a>.
	Improvements over 3.1 final include many upstream bugfixes,
	build improvements, koffice bugfixes, kmail crash fixes,
	and other miscellaneous updates.  Binary packages will not
	be available in time for the next binary distribution, but
	will be released as an update shortly thereafter.
</p><a name="2003-03-18%20KDE%203.1%20Final%20In%20Stable"><span class="news-date">2003-03-18: </span><span class="news-headline">KDE 3.1 Final In Stable</span></a><?php gray_line(); ?>
	<p>KDE 3.1 is now in Fink stable.  The full announcement can be
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=1833081&amp;forum_id=2022">read here</a>.
	Improvements over 3.1 beta1 include an updated audio driver, 
	faster startup times, cleaned up fink package info, support
	for Apple X11's window manager, and many bugfixes.  Binary
	packages will be available in the next binary distribution
	release.
</p><a name="2003-03-17%20Apple%20X11%20Beta%203%20Released"><span class="news-date">2003-03-17: </span><span class="news-headline">Apple X11 Beta 3 Released</span></a><?php gray_line(); ?>
	<p><a href="http://www.apple.com/macosx/x11/download/">A new
version of Apple's X11 for Mac OS X is available</a>.  It fixes a number
of bugs including a few that can cause problems with building Fink packages.
It is recommended that all Fink users who are using Apple X11 upgrade.
A new version of the system-xfree86 package has been released to unstable
that takes the new Apple X11 into account.  It should be appearing in stable
shortly.
</p><a name="2003-02-14%20New%20version%20of%20FinkCommander"><span class="news-date">2003-02-14: </span><span class="news-headline">New version of FinkCommander</span></a><?php gray_line(); ?>
	<p><a href="http://finkcommander.sourceforge.net/">FinkCommander</a>,
 a separate project which provides a GUI for Fink,
has released version 0.5.0, their first Jaguar-only version.  The new
version includes a package browser which allows you to view the files 
that Fink has installed for a particular package, as well as <a href="http://finkcommander.sourceforge.net/pages/VERSION_HISTORY.html">many 
other improvements.</a>
</p><a name="2003-02-07%20DO%20NOT%20INSTALL%20VIREX%207.2"><span class="news-date">2003-02-07: </span><span class="news-headline">DO NOT INSTALL VIREX 7.2</span></a><?php gray_line(); ?>
	<p>
	The Virex 7.2 package, currently being distributed free to all .Mac 
members, has a serious conflict with Fink.  <b>Fink users should not install 
Virex 7.2 under any circumstances.</b>
  Installing it after Fink is installed
will damage your Fink installation; installing it prior to Fink will make
it impossible to install Fink without damaging Virex.
</p><p>
This bug has been <a href="http://forums.mcafeehelp.com/viewtopic.php?t=6318&amp;sid=33d08f3c34f7e09dc546aa1ddf1c299c">reported 
to Virex's manufacturer.</a>  We will keep the
Fink community informed about the situation as it develops.
</p><a name="2003-01-26%20Apple%20X11%20Library%20Warning"><span class="news-date">2003-01-26: </span><span class="news-headline">Apple X11 Library Warning</span></a><?php gray_line(); ?>
	<p>
	While Apple's X11 works just fine with existing binaries, it
has a bug in the install name of the libraries that can cause some
software to build incorrectly, and will break forward-compatibility
with future X11 releases.
</p>
<p>
	Ben Hines has created a script (available <a href="http://fink.cvs.sourceforge.net/*checkout*/fink/fix-fink/install_name_fix.pl">here</a>) that you can use
that will fix the install_name entries in Apple's X11 libraries,
but it will not repair software you have already built against the
broken libraries.
</p>
<p><b>Update 11 February 2003:</b> This script is not needed with 
version 0.2 of Apple's X11.app which was released yesterday.
</p>
<a name="2003-01-21%20Gnome,%20libpng,%20and%20the%20unstable%20tree"><span class="news-date">2003-01-21: </span><span class="news-headline">Gnome, libpng, and the unstable tree</span></a><?php gray_line(); ?>
	<p>
	A problem was uncovered today concerning the versions of imlib,
 libpng, and gnome in Fink's unstable tree.  The Fink team is hard at
 work addressing this problem.  As a workaround, users can downgrade
their imlib package to the stable version, "<code>fink install
 imlib-1.9.10-9</code>", until the problem is fixed.
</p><p>
   Many Fink users may be using Fink's unstable tree without being
fully aware of what this entails.  For a few months in the fall,
enabling the unstable tree was the only way to gain access to
 10.2-compatible versions of Fink packages.  
<b>That is no longer the case.</b>
Fink users who do not wish to help the Fink team with testing should
disable their unstable tree.  To do this, edit the file
<code>/sw/etc/fink.conf</code> and remove the items
 <code>unstable/main</code> and <code>unstable/crypto</code> from the
 <code>Trees</code> line.
	</p>
<p>The Fink team appreciates those users who are willing to stick with
the unstable tree, even when there are problems like today's, and provide
the team with prompt feedback.  This is a community effort and we
appreciate your participation.
</p>
	<a name="2003-01-17%20Anonymous%20CVS%20issues%20resolved"><span class="news-date">2003-01-17: </span><span class="news-headline">Anonymous CVS issues resolved</span></a><?php gray_line(); ?>
	<p>
	UPDATE: We are pleased to announce that SourceForge have resolved the issues with anonymous CVS access, and the selfupdate-cvs command should work again. Further details on the downtime can be found on the SourceForge.net <a href="http://sourceforge.net/docman/display_doc.php?docid=2352&amp;group_id=1#cvs">site status</a> page.
	</p>
	<a name="2003-01-07%20Fink%20Interaction%20with%20Apple's%20X11%20Public%20Beta"><span class="news-date">2003-01-07: </span><span class="news-headline">Fink Interaction with Apple's X11 Public Beta</span></a><?php gray_line(); ?>
	<p>
	Fink works just fine with the <a href="http://www.apple.com/macosx/x11/">public beta X11 release</a>
	with some caveats.  Please read <a href="doc/x11/inst-xfree86.php#apple-binary">the newly added Apple X11</a> section of the Fink X11 Documentation for details.</p>
	<a name="2003-01-07%20RSS%20Feeds%20available"><span class="news-date">2003-01-07: </span><span class="news-headline">RSS Feeds available</span></a><?php gray_line(); ?>
	<p>
	Thanks to Benjamin Reed, it is now possible to receive RSS 1.0 Feeds that contain a lot of valuable information.

<a href="news/fink-stable.rdf">fink-stable.rdf</a> will tell you about the changes and additions in the stable tree, reflecting packages which have been added or modified.
</p>
<p><a href="news/fink-unstable.rdf">fink-unstable.rdf</a> will tell you about changes or additions to the unstable tree and is most likely the most active RSS feed.
The above Feeds are automatically updated every 60 minutes to make sure that they keep you all on top of the latest development.
</p>
<p><a href="news/news.rdf">news.rdf</a> This feed reflects the contents of the Fink News Page. The Feed is updated as soon as a new item is added on the Website.
</p>
<a name="2002-12-22%20New%20Upgrade%20Matrix"><span class="news-date">2002-12-22: </span><span class="news-headline">New Upgrade Matrix</span></a><?php gray_line(); ?>
  <p>A new <a href="download/upgrade.php">Upgrade Matrix</a> is
  now available, for use in upgrading earlier versions of Fink to the
  current version, under either OS X 10.1 or OS X 10.2.  Users upgrading
  under 10.1 will be brought to Fink version 0.4.1a, while users
  upgrading under 10.2 will be brought to Fink version 0.5.0a.
  </p>
  <a name="2002-12-11%20New%20Upgrade%20Matrix%20coming"><span class="news-date">2002-12-11: </span><span class="news-headline">New Upgrade Matrix coming</span></a><?php gray_line(); ?>
  <p>The Fink team is aware of the shortcomings of the current
  <b>Upgrade Matrix</b> page, which is inadequate for upgrading
to Fink 0.5.0a.  Please be patient as we construct
  a new version of that page, whose existence will be announced
  here.  In the meantime, some of you may wish to use the <a href="news/jaguar.php">test version of the Jaguar updater</a> which was
made available on 2002-09-08.
  </p>
  <a name="2002-12-09%20Fink%200.5.0a%20Released"><span class="news-date">2002-12-09: </span><span class="news-headline">Fink 0.5.0a Released</span></a><?php gray_line(); ?>
  <p>
    Fink 0.5.0a for Mac OS X 10.2 is now complete. (Note: 0.5.0a is a final
    release, and replaces 0.5.0 which was never officially released.) This
    release includes over 700 
    binary packages for OS X 10.2 as well as over 1800 source packages of
    all kinds. 
  </p>
  <p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="download/upgrade.php">Upgrade Matrix</a>. 
  </p>
  <p>
  This release is for Mac OS X 10.2 only. 10.1 users should use Fink 0.4.1.
  </p>
  <a name="2002-11-11%20Update%20XFree86%20for%20use%20with%20OS%20X%2010.2.2"><span class="news-date">2002-11-11: </span><span class="news-headline">Update XFree86 for use with OS X 10.2.2</span></a><?php gray_line(); ?>
  <p>
Users should update their XFree86 installations to version 4.2.1.1
for use with OS X 10.2.2.  If you are using system-xfree86, you
can get the new version from the <a href="https://sourceforge.net/project/shownotes.php?release_id=118483">XonX 
project</a>.  If you are using Fink's
xfree86 packages, you should update to xfree86-base-4.2.1.1-1 and
xfree86-rootless-4.2.1.1-1.  These packages are recent additions to
the 10.2/unstable tree; to gain access to them, you may need to run 
"fink selfupdate-cvs" and/or enable the unstable tree
  </p>
  <a name="2002-10-30%20Don't%20reuse%20binary%20installer"><span class="news-date">2002-10-30: </span><span class="news-headline">Don't reuse binary installer</span></a><?php gray_line(); ?>
  <p>
  Users are cautioned to use the binary installer for Fink 0.4.1 <b>only
once</b> on a given machine.  Due to an apparent bug in Apple's
Installer.app program, attempting a second installation on the same
machine can result in permissions being altered in the machine's root
directory, in some cases leaving the machine in a non-bootable state.
</p><p> If Installer.app presents you with an "Upgrade" button rather
than an "Install" button when installing Fink 0.4.1, <b>do not proceed
any further!</b> </p>
<p>A new version of the binary installer for Fink 0.4.1 became available
on November 5.  The new version avoids
the problem of the machine not booting, but even with the new version,
users are advised to only "Install",
not "Upgrade."  (You can recognize the new version by its filesize of
12582912 bytes, while the old version had a filesize of 10541112 bytes.)
</p><a name="2002-09-28%20Fink%200.4.1%20released"><span class="news-date">2002-09-28: </span><span class="news-headline">Fink 0.4.1 released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="download/upgrade.php">Upgrade Matrix</a>. 
    </p>
    <p>
    This is the <b>last release for Mac OS X 10.1</b>. Future versions of Fink will <b>not</b> officially support Mac OS X 10.1 anymore, we are gearing all our efforts towards 10.2.
    </p>
    <p>
    At the same time, this release is not meant for Mac OS X 10.2. Fink 0.5.0. which is targeted for October, will be geared towards 10.2. In the meantime refer to the news item below on how to upgrade Fink for 10.2.
    </p>
  <a name="2002-09-27%20Possible%20conflicts%20with%20anti-virus%20software"><span class="news-date">2002-09-27: </span><span class="news-headline">Possible conflicts with anti-virus software</span></a><?php gray_line(); ?>
<p> A number of recent reports on the 
<a href="http://www.mail-archive.com/fink-users@lists.sourceforge.net/">fink-users
mailing list</a> have indicated problems (including kernel panics and
infinite hangs during patching) when using Fink to compile packages while
anti-virus software is installed.  You may need to switch off any anti-virus
software before using Fink.
</p><a name="2002-09-08%20Test%20version%20of%20Jaguar%20updater%20available"><span class="news-date">2002-09-08: </span><span class="news-headline">Test version of Jaguar updater available</span></a><?php gray_line(); ?>
		<p>
			A test version of the 10.2 updater for Fink is now available. The update process is somewhat complicated at the moment, but is explained in <a href="news/jaguar.php">step-by-step instructions for updating</a>. We also have separate <a href="news/jag-bootstrap.php">instructions to install Fink from scratch on 10.2</a>. 
		</p>
		<p>
			At the moment, approximately 800 out of 1150 Fink packages have been made ready for 10.2. However, virtually all of these packages are still being tested and have not yet been moved to the "stable" tree in the 10.2 section; moreover, binaries for 10.2 packages are not yet available. 
		</p>
	<a name="2002-08-20%20Mac%20OS%20X%2010.2%20/%20Jaguar"><span class="news-date">2002-08-20: </span><span class="news-headline">Mac OS X 10.2 / Jaguar</span></a><?php gray_line(); ?>
    <p>
      During the last few weeks, we got a lot of emails asking whether Fink will work Mac OS X 10.2.
    </p>
    <p>
      The answer is: Yes, we will support 10.2. However, due to some
      major changes in this new OS version, we had to make a lot of adjustments both
      to the Fink tool itself and to many packages. The current binary distribution,
      0.4.0a, will only work partially on 10.2. We are working on an upgrade guide,
      as well as a new Fink release, to support 10.2.
    </p>
	<p>
	 If you upgrade your system to 10.2 before the official Fink update for 10.2 is ready,
	 many Fink packages built on 10.1 are going to work fine, but others need to be rebuilt.
	 Some packages need special changes to build on 10.2. Adding "unstable/main" to your
	 list of trees in /sw/etc/fink.conf (see also the <a href="faq/usage-fink.php#unstable">FAQ</a>)
	 will give you access to the latest versions of packages, many of which include important
	 fixes for 10.2.
	</p>
    <p>
     As of now, please do not email us asking about 10.2 support. If you can't wait,
     consult the <a href="lists/index.php">mailing list archives</a> instead.
    </p>
  <a name="2002-08-06%20Fink%20package%20manager%200.10.0%20released"><span class="news-date">2002-08-06: </span><span class="news-headline">Fink package manager 0.10.0 released</span></a><?php gray_line(); ?>
    <p>
      Yesterday version 0.10.0 of the Fink package manager was released to the unstable tree, along with version 1.6 of the base-files package. All Fink users which are using the unstable tree are recommended to update to this version. The easiest way to do so usually is to run 'fink selfupdate-cvs' which will automatically take care of updating these essential packages.
    </p>
    <p>
      Please report any problems you encounter with this version via our bug tracker.
    </p>
    <p>
      An overview of what changed since version 0.9.12 can be found <a href="http://sourceforge.net/project/shownotes.php?release_id=103599">here.</a>
    </p>
  <a name="2002-07-17%20Binary%20distribution%20moves"><span class="news-date">2002-07-17: </span><span class="news-headline">Binary distribution moves</span></a><?php gray_line(); ?>
    <p>
      The Fink binary distribution has moved to a new location. All Fink users wishing to use the binary distribution will have to make sure they are using the new binary distribution (many of you already are using it, maybe without even noticing). If you want to know how to switch and why we do this, <a href="news/bindist_move.php">read more here.</a>.
    </p>
  <a name="2002-05-29%20KDE%20support"><span class="news-date">2002-05-29: </span><span class="news-headline">KDE support</span></a><?php gray_line(); ?>
    <p>
      Fink <a href="news/kde.php">announces support</a> for <a href="http://www.kde.org">KDE</a>. Packages are available in the unstable distribution, as well as pre-built binaries. For more information on installing and running it, see the full <a href="news/kde.php">KDE Support In Fink</a> announcement. 
    </p>
  <a name="2002-05-03%20Bug%20in%20passwd%20package"><span class="news-date">2002-05-03: </span><span class="news-headline">Bug in passwd package</span></a><?php gray_line(); ?>
    <p>
      All Fink users are urged to update their <b> passwd </b> package to version 20020329 or newer. Older versions of the <b> passwd </b> package are affected by a bug which could lead to the loss of all data on your hard disk if you remove system users created by Fink manually from the system via System Preferences. (Removing them via the NetInfo tool is safe.) You can check the version of your passwd package by entering <b> dpkg -s passwd</b>. If your version is outdated, you can update to the current one in two ways: 
    </p>
    <ul>
      <li>
	Via the binary distribution. First make sure you have the latest list of packages available: <b> sudo apt-get update</b>. Then you can perform the actual update: <b> sudo apt-get install passwd</b>. 
      </li>
      <li>
	Via the source distribution. First make sure you have the latest set of package descriptions: <b> fink selfupdate-cvs</b>. Then, update the passwd package: <b> fink update passwd</b> 
      </li>
    </ul>
    <p>
      See <a href="faq/usage-general.php#passwd">Fink's FAQ, question 6.3,</a> for more information about the passwd package. 
    </p>
  <a name="2002-04-18%20Fink%200.4.0%20released"><span class="news-date">2002-04-18: </span><span class="news-headline">Fink 0.4.0 released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, as well as many of the binary packages. As usual, the rest of the binaries will be made available during the next few days. For information about upgrading, visit the <a href="download/upgrade.php">Upgrade Matrix</a>. 
    </p>
  <a name="2002-01-16%20Fink%200.3.2a%20is%20released"><span class="news-date">2002-01-16: </span><span class="news-headline">Fink 0.3.2a is released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="download/upgrade.php">Upgrade Matrix</a> and the <a href="doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2002-01-09%20Fink%200.3.2%20is%20released"><span class="news-date">2002-01-09: </span><span class="news-headline">Fink 0.3.2 is released</span></a><?php gray_line(); ?>
    <p>
      The source release is available now, the binary installer will follow soon. The bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="download/upgrade.php">Upgrade Matrix</a> and the <a href="doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2002-01-08%20Binary%20distribution%20lost"><span class="news-date">2002-01-08: </span><span class="news-headline">Binary distribution lost</span></a><?php gray_line(); ?>
    <p>
      Due to a faulty script, the whole fink website, including our binary distro, has been wiped! This means you can't use the binary distro right now. I am working as quick as I can on uploading the new Fink 0.3.2 binary distro. In addition, the package database is not working for now. Please bear with us. 
    </p>
  <a name="2001-12-16%20Yes,%20we%20are%20alive!"><span class="news-date">2001-12-16: </span><span class="news-headline">Yes, we are alive!</span></a><?php gray_line(); ?>
    <p>
      Despite the fact that no news were listed here for over a month, the fink project was quite busy in the recent time. Sadly, our leader, Christoph, left us last month. But despite this, development is going on actively. 
    </p>
    <p>
      Version 0.9.5 of the Fink package manager was recently released, and many updated and new packages are in our <a href="doc/cvsaccess/index.php">CVS</a>. 
    </p>
  <a name="2001-11-04%20Fink%200.3.1%20is%20released"><span class="news-date">2001-11-04: </span><span class="news-headline">Fink 0.3.1 is released</span></a><?php gray_line(); ?>
    <p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="download/upgrade.php">Upgrade Matrix</a> and the recently updated <a href="doc/users-guide/index.php">User's Guide</a>. 
    </p>
  <a name="2001-11-02%20Running%20X11%20document%20updated"><span class="news-date">2001-11-02: </span><span class="news-headline">Running X11 document updated</span></a><?php gray_line(); ?>
    <p>
      The <a href="doc/x11/index.php">Running X11</a> document has had a significant update. The troubleshooting section now has a comprehensive list of XDarwin error messages with explanations. 
    </p>
  <a name="2001-10-31"><span class="news-date">2001-10-31</span></a><?php gray_line(); ?>
    <p>
      <a href="http://www.macosxhints.com/">MacOSXHints</a> has
      posted an <a href="http://homepage.mac.com/rgriff/xdarwin.html">
      installation guide</a> for XFree86, Fink, Window Maker and The GIMP.
    </p>
  <a name="2001-10-23%20forked.net"><span class="news-date">2001-10-23: </span><span class="news-headline">forked.net</span></a><?php gray_line(); ?>
    <p>
      In addition to ripping off Fink packages and breaking the GPL, the ports
      collection at <a href="http://macosx.forked.net/">forked.net
      </a> has just gone commercial. More details soon. 
    </p>
  <a name="2001-10-03%20Binary%20distribution%20complete"><span class="news-date">2001-10-03: </span><span class="news-headline">Binary distribution complete</span></a><?php gray_line(); ?>
    <p>The binary distribution update is now complete.
    The <a href="news/puma.php">10.1 compatibility report</a> has been
    updated to reflect the fixes in Fink 0.3.0.
    </p>
  <a name="2001-09-30%20Fink%200.3.0%20is%20released"><span class="news-date">2001-09-30: </span><span class="news-headline">Fink 0.3.0 is released</span></a><?php gray_line(); ?>
    <p>The source release, the binary installer and a binary upgrade kit for
    broken-by-10.1 installations are available in the new <a href="download/index.php">download section</a>.
    The bulk of the binary distribution will be updated gradually over the
    next few days, as usual.
    </p>
  <a name="2001-09-26%20Mac%20OS%20X%2010.1%20released"><span class="news-date">2001-09-26: </span><span class="news-headline">Mac OS X 10.1 released</span></a><?php gray_line(); ?>
    <p>Mac OS X 10.1 has been officially released yesterday. Before you use Fink
    on 10.1, check out the <a href="news/puma.php">compatibility report</a>.
    <b>Update:</b> The apt-get issue has been solved, expect a new release
    this weekend.
    </p>
  <a name="2001-09-07%20Binary%20distribution%20fully%20updated"><span class="news-date">2001-09-07: </span><span class="news-headline">Binary distribution fully updated</span></a><?php gray_line(); ?>
    <p>The binary distribution is now fully updated to
    Fink 0.2.6. Enjoy.
    </p>
  <a name="2001-09-04%20Fink%200.2.6%20is%20released"><span class="news-date">2001-09-04: </span><span class="news-headline">Fink 0.2.6 is released</span></a><?php gray_line(); ?>
    <p>Fink 0.2.6 is released, fixing several bootstrap problems. The source
    release is available from the <a href="download.php">download page</a>
    or via the 'fink selfupdate' command. The binary release will follow soon.
    </p>
 <a name="2001-09-02%20Fink%20IRC%20Channel"><span class="news-date">2001-09-02: </span><span class="news-headline">Fink IRC Channel</span></a><?php gray_line(); ?>
    <p>Chat with the developers and other users! We now have a #fink channel
    on the <a href="http://openprojects.net/">openprojects.net</a>
    IRC network.
    </p>
 <a name="2001-08-25%20Fink%200.2.5%20was%20released"><span class="news-date">2001-08-25: </span><span class="news-headline">Fink 0.2.5 was released</span></a><?php gray_line(); ?>
    <p>The source release is
    available from the <a href="download.php">download page</a>, the
    binary release will follow soon.
    </p>
  <a name="2001-08-23%20OpenOSX.com"><span class="news-date">2001-08-23: </span><span class="news-headline">OpenOSX.com</span></a><?php gray_line(); ?>
    <p>OpenOSX.com refuses to give fair credit after using Fink to create GIMP
    CDs. Read Christoph's <a href="pr/openosx.php">public statement</a>
    on the issue.
    </p>
 <a name="2001-08-22%20New%20help%20page"><span class="news-date">2001-08-22: </span><span class="news-headline">New help page</span></a><?php gray_line(); ?>
    <p>The new <a href="help/index.php">help page</a> lists various ways
    to get help using Fink. It also lists some ideas how you can give back to
    the project.
    </p>
  <a name="2001-08-13%20Porting%20tips%20and%20X11%20document%20updated"><span class="news-date">2001-08-13: </span><span class="news-headline">Porting tips and X11 document updated</span></a><?php gray_line(); ?>
    <p>The <a href="doc/porting/index.php">porting tips</a> document has
    a new chapter on shared libraries and modules. The <a href="doc/x11/index.php">X11</a> document was also updated recently.
    </p>
  <a name="2001-08-01%20Version%200.2.4a%20is%20released"><span class="news-date">2001-08-01: </span><span class="news-headline">Version 0.2.4a is released</span></a><?php gray_line(); ?>
    <p>There was a bootstrapping problem in Fink 0.2.4. It is fixed in Fink
    0.2.4a. You only need this if you're doing a first time install, updates
    are not affected.
    </p>
  <a name="2001-08-01%20Version%200.2.4%20is%20released"><span class="news-date">2001-08-01: </span><span class="news-headline">Version 0.2.4 is released</span></a><?php gray_line(); ?>
    <p>Version 0.2.4 is released. Get it from the <a href="download.php">download page</a>. Some highlights: The GIMP
    1.2.2, sound playback and recording via esound (thanks to Shawn Hsiao
    and Masanori Sekino for the CoreAudio patch), xmms 1.2.5.
    </p>
  <a name="2001-07-19%20New%20document:%20X11%20on%20Darwin%20and%20Mac%20OS%20X"><span class="news-date">2001-07-19: </span><span class="news-headline">New document: X11 on Darwin and Mac OS X</span></a><?php gray_line(); ?>
    <p>A comprehensive document about <a href="doc/x11/index.php">X11 on
    Darwin and Mac OS X</a> is now available. It was written to be useful
    for anyone, not just Fink users.
    </p>
  <a name="2001-07-13%20Package%20database%20now%20online"><span class="news-date">2001-07-13: </span><span class="news-headline">Package database now online</span></a><?php gray_line(); ?>
    <p>A prototype of the <a href="pdb/index.php">package database</a>
    is now online.
    </p>
  <a name="2001-07-09%20Version%200.2.3%20is%20released"><span class="news-date">2001-07-09: </span><span class="news-headline">Version 0.2.3 is released</span></a><?php gray_line(); ?>
    <p>Get it from the <a href="download.php">download page</a>. This
    version fixes the dpkg download problems many of you were having.
    </p>
  <a name="2001-07-03%20Packaging%20Manual%20updated"><span class="news-date">2001-07-03: </span><span class="news-headline">Packaging Manual updated</span></a><?php gray_line(); ?>
    <p>The <a href="doc/packaging/index.php">Packaging Manual</a> was
    updated to include all recently added fields.
    </p>
  <a name="2001-06-30%20Web%20site%20restructuring"><span class="news-date">2001-06-30: </span><span class="news-headline">Web site restructuring</span></a><?php gray_line(); ?>
    <p>A major restructuring of the web site has started. The non-Fink-specific
    documents were removed because I don't have the time to maintain them. All
    documentation will be consolidated in the new <a href="doc/index.php">
    Documentation section</a>.
    </p>
  <a name="2001-06-24%20Version%200.2.2%20is%20released"><span class="news-date">2001-06-24: </span><span class="news-headline">Version 0.2.2 is released</span></a><?php gray_line(); ?>
    <p>Version 0.2.2 is finally released. Get it from the <a href="download.php">download page</a>. Be sure to read the notes
    about X11 in the INSTALL file.
    </p>
  <a name="2001-05-19%20CVS%20instructions%20updated"><span class="news-date">2001-05-19: </span><span class="news-headline">CVS instructions updated</span></a><?php gray_line(); ?>
    <p>The <a href="fink/cvs.php">CVS instructions</a> have
    been updated for Fink 0.2.x.
    </p>
  <a name="2001-04-26%20FAQ%20online"><span class="news-date">2001-04-26: </span><span class="news-headline">FAQ online</span></a><?php gray_line(); ?>
    <p>
      This site now sports a <a href="faq/index.php">FAQ section</a>. Not much content yet, but it's here to stay. 
    </p>
  <a name="2001-04-20%20Version%200.2.0%20is%20released"><span class="news-date">2001-04-20: </span><span class="news-headline">Version 0.2.0 is released</span></a><?php gray_line(); ?>
    <p>
      It now uses dpkg for binary package management. You can get it from the download page, but be aware that this version is not yet as stable as the 0.1.x series. 
    </p>
  <a name="2001-04-15%20Released%20version%200.1.8a"><span class="news-date">2001-04-15: </span><span class="news-headline">Released version 0.1.8a</span></a><?php gray_line(); ?>
    <p>
      Released version 0.1.8a, fixing install problems. You only need this if you downloaded 0.1.8 and had install problems ("stow not found"). Get it from the <a href="download.php">download page</a>. 
    </p>
  <a name="2001-04-14%20Version%200.1.8%20is%20out"><span class="news-date">2001-04-14: </span><span class="news-headline">Version 0.1.8 is out</span></a><?php gray_line(); ?>
    <p>
      Get it from the <a href="download.php">download page</a>. 
    </p>
  <a name="2001-03-30%20Porting%20notes%20updated"><span class="news-date">2001-03-30: </span><span class="news-headline">Porting notes updated</span></a><?php gray_line(); ?>
    <p>
      The <a href="darwin/porting.php">porting notes</a> have been updated with information on Mac OS X Final. 
    </p>
  <a name="2001-03-30%20Version%200.1.7%20is%20out!"><span class="news-date">2001-03-30: </span><span class="news-headline">Version 0.1.7 is out!</span></a><?php gray_line(); ?>
    <p>
      Get it from the <a href="download.php">download page</a>. 
    </p>
  <a name="2001-03-24%20Mac%20OS%20X%20is%20released!"><span class="news-date">2001-03-24: </span><span class="news-headline">Mac OS X is released!</span></a><?php gray_line(); ?>
    <p>
      Expect Fink packages to be adapted to the final release within the next one or two weeks. 
    </p>
  <a name="2001-03-15%20Libtool%20page%20updated"><span class="news-date">2001-03-15: </span><span class="news-headline">Libtool page updated</span></a><?php gray_line(); ?>
    <p>
      Updated the <a href="darwin/libtool.php">libtool page</a> with a revised patch that does full shared library versioning. 
    </p>
  <a name="2001-03-08%20Version%200.1.6%20is%20out"><span class="news-date">2001-03-08: </span><span class="news-headline">Version 0.1.6 is out</span></a><?php gray_line(); ?>
    <p>
      Get it from the <a href="download.php">download page</a>. 
    </p>
  

<? include_once "footer.inc"; ?>
