<?
$title = "P.M.F. - Relaciones";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/06/17 00:55:00';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="P.M.F. Contents"><link rel="next" href="mirrors.php?phpLang=es" title="Espejos de distribución"><link rel="prev" href="general.php?phpLang=es" title="Preguntas generales">';


include_once "header.es.inc";
?>
<h1>P.M.F. - 2. Relaciones con Otros Proyectos</h1>
    
    
    <a name="upstream">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.1: ¿Contribuyen los parches hechos por ustedes a los mantenedores de fuente (upstream)?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Estamos tratando. A veces el regresar los parches es fácil y todo el mundo está contento una vez que la version actualizada del paquete ha salido. Desafortunadamente con la mayoría de los paquetes no es tan fácil. Algunos problemas communes:</p><ul>
          <li>El mantenedor de paquetes de Fink está muy ocupado y no tiene tiempo de mandar el parche y las explicaciones que le acompañan a los mantenedores principales de fuente (upstream).
	
</li>
          <li>Los mantenedores de fuente rechazan el parche. Hay muchas rezones válidas para esto. La mayoría de los mantenedores de fuente tienen un fuerte interés en un código limpio, verificaciones de configuración limpias y compatibilidad con otras 
plataformas.
</li>
          <li>Los mantenedores de fuente aceptan el parche, pero les lleva unas semanas o meses hasta que sacan una nueva version de su paquete.
	
</li>
          <li>El paquete ha sido abandonado por los autores originales y no habrá ninguna nueva edición en la cual el parche pueda converger.</li>
        </ul></div>
    </a>
    <a name="debian">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.2: ¿Cuál es su relación con el proyecto Debian? ¿Están creando un puerto de Debian Linux a Mac OS X?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> No existe ninguna relación formal entre Fink y <a href="http://www.debian.org/index.es.html">Debian</a>. Fink <b>no</b> es un Puerto de la distribución Debian GNU/Linux. Hemos portado herramientas de administración del paquete Debian (dpkg, dselect, apt-get) y usamos estas herramientas y el formato .deb de los paquetes binarios. Los paquetes actuales son hechos a la medida para Mac OS X / Darwin y no utilizan el formato de paquete de la fuente Debian.</p></div>
    </a>
    <a name="apple">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.3: ¿Cuál es su relación con Apple?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> <a href="http://www.apple.com/es/">Apple</a> sabe que Fink existe y nos ha dado apoyo como parte de su esfuerzo de relaciones de Fuente Abierta. En el verano y otoño del 2001, nos otorgaron semillas de pre-lanzamiento de las nuevas versions Mac OS X esperando que los paquetes Fink pudieran ser adaptados a tiempo para su lanzamiento. Cita: <b>"Esperamos que acentúe el cometido de que muchos sospechan no estamos dispuestos a proveer. Mejoraremos con el tiempo en el juego de Fuente Abierta."</b> ¡Gracias Apple!</p></div>
    </a>
    <a name="openosx">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.4: ¿Cuál es su relación con OpenOSX.com?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Utilizaron Fink para construir el primer lanzamiento de su GIMP CD y se rehusan a reconocerlo debidamente. Lea el <a href="http://fink.sourceforge.net/pr/openosx.php">estatuto público</a> para mas detalles.</p></div>
    </a>
    <a name="forked">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.5: ¿Cuál es su relación con macosx.forked.net?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> That site redistributes some Fink packages as Installer.app packages, unchanged but with their own boilerplate that doesn't mention Fink. Read the <a href="http://fink.sourceforge.net/pr/forked.php">public statement</a> for details.</p></div>
    </a>
    <a name="darwinports">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.6: ¿Cuál es su relación con Darwinports?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Darwinports y Fiink son proyectos complementarios. Hay un poco de traslape entre los dos proyectos, y varias personas contribuyen a ambos proyectos Fink y OpenDarwin. Por ejemplo, Benjamin Reed está haciendo los paquetes KDE para ambos. Darwinports/OpenDarwin usan parches de Fink, y hemos discutido la colaboración en una nueva estructura de dependencias.</p><p>OpenDarwin empezó desde cero intentando un acercamiento diferente en el sistema de empaquetamiento. Lee el estatuto sobre <a href="http://www.opendarwin.org/projects/darwinports/en/faq.php">OpenDarwin.org</a> para mas detalles.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="mirrors.php?phpLang=es">3. Espejos de distribución</a></p>
<? include_once "../footer.inc"; ?>



