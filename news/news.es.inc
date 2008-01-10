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

