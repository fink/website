<a name="2007-11-18%20PDB%20Website%20Down"><span class="news-date">2007-11-18: </span><span class="news-headline">PDB Website Down</span></a><?php gray_line(); ?>
    <p>The Package Database web interface is presently down pending hardware and software upgrades. We are working on fixing the server as soon as possible. Sorry for any inconvenience.</p>
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

