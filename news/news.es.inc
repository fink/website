<a name="2004-08-23 Problemas con XCode 1.5"><span class="news-date">2004-08-23: </span><span class="news-headline">Problemas con XCode 1.5</span></a><?php gray_line(); ?>
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
<a name="2004-08-21 Error en fink-0.22.0"><span class="news-date">2004-08-21: </span><span class="news-headline">Error en fink-0.22.0</span></a><?php gray_line(); ?>
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
		<link url="http://sourceforge.net/project/showfiles.php?group_id=17203"> la página del la liberación del archivo fink en el 
		sourceforge</link> y descarge el archivo
		<code>fink-0.22.1.tar.gz</code> . Desempaque este archivo con	<code>tar xfz fink-0.22.1.tar.gz</code> , y desde dentro del directorio
	fink-0.22.1 directory, ejecute el comando <code>./inject.pl</code>
	</p>
	<p>
	El equipo de Fink se disculpa por el error y agradece a la comunidad 
	de usuarios por llamar nuestra atención rápidamente.
	</p>
<a name="2004-08-01 Mejorando nuestros espejos. ¿Puedes ayudarnos?"><span class="news-date">2004-08-01: </span><span class="news-headline">Mejorando nuestros espejos. ¿Puedes ayudarnos?</span></a><?php gray_line(); ?>
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
	compartir con un espejo de rsync, o aún má´s para ofrecer un espejo de
	distfiles, por favor  <extlink url="mailto:mirrors@finkmirrors.net">contactanos</extlink>.
	</p>
	<p>
	 Para obtener un mejor conocimiento de los diferentes tipos de espejos
	 que Fink ofrece, por favor revisa este sitio: 
	 <extlink url="http://finkmirrors.net/">finkmirrors.net</extlink>. 
	 Este es el sitio oficial de todos los asuntos relacionados con los
	 espejos. Si crees que puedes ofrecer otro tipo de recursos, por ejemplo, un espacio web para pruebas, no dudes en <extlink url="mailto:mirrors@finkmirrors.net">contactarnos</extlink> .
	</p>
