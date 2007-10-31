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
		
