<?
$title = "P.M.F. - Generales";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/05/19 12:14:51';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="P.M.F. Contents"><link rel="next" href="relations.php?phpLang=es" title="Relaciones con Otros Proyectos"><link rel="prev" href="index.php?phpLang=es" title="P.M.F. Contents">';

include_once "header.inc";
?>

<h1>P.M.F. - 1 Preguntas generales</h1>
    
    
    <a name="what">
      <div class="question"><p><b>Q1.1: ¿Qué es Fink?</b></p></div>
      <div class="answer"><p><b>A:</b> Fink desea traer más software de Unix a Mac OS X, lo cual resulta en dos metas principales:</p><p>Meta numero uno es el llevar software a Mac OS X. Eso quiere decir que tomamos Paquetes Unix de Software Libre y arreglamos lo que sea necesario para que compile y corra en MacOS X. A veces eso es fácil, pero a veces puedo ser muy difícil o imposible para algunos paquetes. Estamos tratando de proveer herramientas y documentos para hacerlo más fácil.</p><p>La Meta número dos es hacer los resultados disponibles para usuarios casuales. Para esto, construimos una distribución usando herramientas de distribución de paquetes portadas de Linux, básicamente <code>dpkg</code> y <code>apt-get</code>escritas por y para el proyecto <a href="http://www.debian.org/index.es.html">Debian GNU/Linux</a>. La distribución binaria usa el formato de paquete <code>.deb</code>. Para construir paquetes a partir de la fuente, tenemos nuestra propia herramienta, llamada <code>fink</code>, la cual crea esos archivos de paquete <code>.deb</code>.</p></div>
    </a>
    <a name="naming">
      <div class="question"><p><b>Q1.2: ¿Qué quiere decir Fink?</b></p></div>
      <div class="answer"><p><b>A:</b> Nada. Es solo un nombre. Ni siquiera es un acrónimo.</p><p>Bueno, realmente Fink es el nombre alemán Finch, un tipo de ave. Estaba buscando un nombre para el proyecto, y el nombre del OS, Darwin, me llevó a pensar en Charles Darwin, las islas Galápagos y la evolución. Me acordé de un pasaje de la escuela sobre los llamados Darwin Finches y sus picos, y bueno, eso es...</p></div>
    </a>
    <a name="bsd-ports">
      <div class="question"><p><b>Q1.3: ¿Cómo es Fink diferente de los mecanismos de Puerto BSD (Esto incluye OpenPackages y GNU-Darwin)?		</b></p></div>
      <div class="answer"><p><b>A:</b> Algunas ventajas principales:</p><ul>
          <li>
            <p>Está escrito en Perl, no en make/shell. De esta manera, no se apoya en aspectos especiales únicamente encontrados en BSD make. No hay necesidad de marcar los paquetes que necesiten GNU make para compilar.</p>
          </li>
          <li>
            <p>dpkg provee una administración sofisticada para paquetes binarios –actualización fluída, manejo especial para configuar archivos, paquetes virtuales y otras dependencias avanzadas.</p>
          </li>
          <li>
            <p>Fink no se instala en /usr/local a menos que se le solicite explícitamente y no require manejar /usr/bin/make u otro commando provisto por el sistema. Eso lo hace mas seguro para usar y reduce la interferencia con Mac OS X y paquetes de una tercera parte al mínimo.</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local">
      <div class="question"><p><b>Q1.4: ¿Por qué Fink no se instala en /usr/local?</b></p></div>
      <div class="answer"><p><b>A:</b> Hay varias razones, pero la línea común es que 'podría ocurrir una falla en el sistema'.</p><p>Razón Uno: Software de una Tercera parte. /usr/local es el lugar mas establecido donde colocar software que no es parte del sistema distribuido por el vendedor original. Esto quiere decir que es un buen lugar para poner cosas. Sin embargo, significa que otras personas también pueden poner cosas allí. La mayoría de las rutinas de instalación simplemente van a sobreescribir lo que ahí está – esto también aplica a dpkg. Uno puede, claro, escoger el no instalar software de una Tercera parte en /usr/local. Desafortunadmaente, la mayoria de los instaladores, no dicen de antemano qué es lo que van a instalar y adónde.</p><p>Razón Dos: /usr/local/bin esta en el default PATH. Esto quiere decir que tu shell encontrará los programas instalados sin medidas adicionales. Pero también quiere decir que tienes que tener medidas adicionales si no quieres usar estos programas. En casos extremos, esto también puede afectar al sistema mismo – muchas partes dependen de shell scripts.</p><p>Razón Tres:  La cadena de herramientas del compilador busca /usr/local por default. El compilador busca los headers en /usr/local/include y el linker busca las librerías en /usr/local/lib. Nuevamente, esto a veces es una conveniencia bienvenida, pero es muy difícil de anular si surge la necesidad. Es muy fácil incapacitar al compilador poniendo un archivo de basura llamado <code>stdio.h</code> en /usr/local/include.</p><p>Después de todo lo dicho, es posible instalar Fink en /usr/local. El script de instalación te advertirá explícitamente, pero continua una vez que reconozcas que lo estas haciendo bajo tu propio riesgo.</p></div>
    </a>
    <a name="why-sw">
      <div class="question"><p><b>Q1.5: Entonces ¿por qué escogíeron /sw?</b></p></div>
      <div class="answer"><p><b>A:</b> Esa elección es bastante arbitraria, pero se puede decir que por razones prácticas (de actualización) quedará así en un futuro cercano y además existe el hecho de que es un lugar seguro para evitar conflictos con otros sistemas de empaquetamiento.</p></div>
    </a>
  <p align="right">
Next: <a href="relations.php?phpLang=es">2 Relaciones con Otros Proyectos</a></p>

<? include_once "footer.inc"; ?>
