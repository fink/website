<?php
$title = "Guía del Usuario - Introducción";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Guía del Usuario Contents"><link rel="next" href="install.php?phpLang=es" title="Primera Instalación"><link rel="prev" href="index.php?phpLang=es" title="Guía del Usuario Contents">';


include_once "header.es.inc";
?>
<h1>Guía del Usuario - 1. Introducción</h1>
    
    
    <h2><a name="what">1.1 Qué es Fink?</a></h2>
      
      <p>
Fink es una distribución de software de Unix Open Source para Mac OS X y Darwin.
Trae una tu Mac OS X una amplia gama de software libre tanto gráfico como de línea de comandos
desarrollado para Linux y sistemas operativos similares.
</p>
    
    <h2><a name="req">1.2 Requerimientos.</a></h2>
      
      <p>
En cualquier caso necesitaras:
</p>
      <ul>
        <li>
          <p>
Un sistema Mac OS X instalado, versión 10.2 o posterior, o el equivalente en Darwin.
Versiones previas de ambos <b>no</b> funcionarán.
Ver más abajo información de los sistemas soportados.
</p>
        </li>
        <li>
          <p>
Acceso a Internet.
Tanto el código fuente como los paquetes binarios se descargan del Internet.
</p>
        </li>
      </ul>
      <p>
Si planea usar la distribución fuente (ver abajo), también necesitara:
</p>
      <ul>
        <li>
          <p>
Development tools (Herramientas de Desarrollo).
En el Mac OS X, instale el paquete Developer.pkg del CD Developer
Tools.
Asegurese de que las Heramientas corresponde a su versión de Mac OS X.
En Darwin, las Herramientas deben estar en la instalación por defecto.
</p>
          <p>
Es una buena idea instalar las Herramientas de Desarrollo aunque no pretenda compilar a partir del código fuente.
Algunos de los programas instalados por el paquete son herramientas generales de la línea de comandos.
Algunos paquetes dependeran de estas herramienas para ejecutarse correctamente.
</p>
        </li>
        <li>
          <p>
Paciencia.
Compilar paquetes grandes toma mucho tiempo.
Estoy hablando de horas e incluso días.
</p>
        </li>
      </ul>
    
    <h2><a name="supported-os">1.3 Sistemas Soportados</a></h2>
      
      
      <p><b>Mac OS X 10.4</b> is the leading-edge platform, and is considered to be <q>fully supported and tested</q>, though as a newer operating system there are still some issues.  Most of the developers run it, and those who are running 10.3 have 10.4 users test their work.  Note, however, that
fink on intel hardware is still considered to be of <b>beta</b> quality.</p>
      <p>
        <b>Mac OS X 10.3</b> is considered to be <q>fully supported and tested</q>, although there may still be stray compile problems with single packages. Many of the developers run it, and those who don't have 10.3 users test their work.
</p>
      <p><b>Mac OS X 10.2</b> is still supported to some extent.  Fink 0.6.4 is the last distribution to suppport this OS.</p>
      
      <p>
        <b>Mac OS X 10.1</b> aún compatible hasta cierto punto.
Solo puede ejecutar Fink 0.4.1 pero ninguna versión posterior.
</p>
      <p>
<b>Darwin 8.x</b> es la versión de Darwin que corresponde al Mac OS X 10.4,
<b>Darwin 7.x</b> es la versión de Darwin que corresponde al Mac OS X 10.3, y <b>Darwin 6.x</b> es la versión que corresponde al Mac OS X
10.2.
En general cualquier Darwin debe funcionar, pero no han sido tan probados debido a que la mayoría solo corre Mac OS X.
Pueden encontrarse errores con paquetes que usan características particulares del Mac OS X -los paquetes afectados incluyen XFree86 y posiblemente esound.
</p>
    
    <h2><a name="src-vs-bin">1.4 Fuente vs. Binario</a></h2>
      
      <p>
El software es escrito  ("desarrollado") en lenguajes de programación leibles por humanos; esta forma es llamada "código fuente".
Antes que la computadora puede ejecutar un programa, este debe ser transformado en código de instrucciones de computadora de bajo nivel (ilegible para la mayoría de los humanos).
A este proceso se le conoce como  "compilar" y el programa resultante se le llama
"ejecutable" or "binario".
(A este porcesos e le conoce también como  "construir", porque involucra más pasos que solo compilar.)
</p>
      <p>
Cuando adquieres un software comercial no se puede ver el código fuente,
las compañias lo tratan como secreto de oficio.
Uno solo obtiene el ejecutable listo para usarse, lo que significa que no hay manera de modificar el programao incluso saber exactamente que hace cuando es ejecutado.
</p>
      <p>
Esto no es así con el software de   <a href="http://www.opensource.org/">Código Abierto (Open Source)</a>
.
Como el nombre lo implica, el código fuente esta abierto para que ciañquiera lo vea y/o lo modifique.
De hecho, la mayoría del software de Código Abierto es unicamente distribuido como código fuente por sus autores, y hay que compilarlo para obtener un programa que pueda ser ejecutado.
</p>
      <p>
Fink permite elegir entre los dos modelos.
La distribución "fuente" descargara la fuente original, la adaptara al Mac OS X y a la política de Fink, y lo compilara en tu computadora.
Este proceso esta completamente automatizado, pero tomará tiempo.
La distribución " binaria", por otra parte, descargara los binarios precompilados del sitio Fink y los instalara, ahorando tiempo. 
Es incluso posible mezclar ambos modelos al gusto.
El resto de este manual te mostrara como hacerlo.
</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="install.php?phpLang=es">2. Primera Instalación</a></p>
<?php include_once "../../footer.inc"; ?>


