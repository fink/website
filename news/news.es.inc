<a name="2004-09-20 Fink 0.7.1 liberado"><span class="news-date">2004-09-20:</span><span class="news-headline">Fink 0.7.1 liberado.</span></a><?php gray_line(); ?>
<p>
La versión más reciente de Fink, versión 0.7.1 (para 10.3), ya está disponible como código fuente y como binario. Ésta ha sido creada para las versiones Panther (10.3) de Mac OS X. La versión 0.6.3 sigue siendo disponible para la versiones Jaguar (10.2) de Mac OS X.
</p>
<p>
Esta nueve versión incorpora varios arreglos al manejador de paquetes e integra numerosos binarios previamiente inasequibles resultando en mas de 1650 binarios. Ésto incluye binarios para KDE 3.1.4 y GNOME 2.4.
</p>
<p>
Para hacer una primera instalación de Fink, hay que seguir los consejos de <a href="<?php print $root; ?>download/index.php">esta página</a>. Para actualizar una instalación de Fink con lo último, usa tu instalación de Fink. En <a href="<?php print $root; ?>http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable%26cmp=0%26tree2=0.7.0-stable%26splitoffs=on%26sort=name">esta página</a> encontrara la lista de las diferencias entre las versiones 0.7.0 y 0.7.1.
</p>
<p>
Si tienes algunas preguntas o problemas, usa las listas de correo de Fink. Informaciones sobre ellas se encuentran <a href="<?php print $root; ?>lists/index.php">allí</a>.
</p>
<p>
Asegúrate de escoger el <em>instalador adecuado</em> para tu plataforma. Fink 0.6.3 solo se instalará en Mac OS X 10.2.* mientras que Fink 0.7.1 sólo se instalará en Mac OS X 10.3.* </p>
        <p>
El Equipo de Fink desea agradecer a sus muchos contributores, ayudantes frecuentes y a los desarrolladores por hacer que esta liberación ocurriera. 
También agradecemos a nuestra comunidad por descarger la versíón 0.7.0 más de 130.000 veces. Sin su constante apoyo y valiosas indicaciones Fink no estaría donde está ahora...
</p>
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
		<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203"> la página de la liberación del archivo fink en el 
		sourceforge</a> y descarge el archivo
		<code>fink-0.22.1.tar.gz</code> . Desempaque este archivo con	<code>tar xfz fink-0.22.1.tar.gz</code> , y desde dentro del directorio
	fink-0.22.1 directory, ejecute el comando <code>./inject.pl</code>
	</p>
	<p>
	El equipo de Fink se disculpa por el error y agradece a la comunidad 
	de usuarios por llamar nuestra atención rápidamente.
	</p>
