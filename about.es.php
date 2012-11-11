<?php
$title      = "About";
$cvs_author = '$Author: gecko2 $';
$cvs_date   = '$Date: 2012/11/11 14:54:25 $';

require "header.inc";
?>

<h1>Más acerca de Fink</h1>

<h2>¿Qué es Fink?</h2>

<p>
Fink es un proyecto que desea traer todo el mundo del software Unix de 
<a href="http://www.opensource.org/">Open Source</a> a
<a href="http://www.opensource.apple.com/">Darwin</a> y a
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Por ello, tenemos dos objetivos.
Primero, modificar el software existente de Código Abierto (Open Source)
de tal manera que pueda compilarse y ejecutarse en Mac OS X.
(Proceso al que se conoce como "porting" o generación de puertos.)
Segundo, hacer el resultado del primer objetivo disponible al usuario
casual de manera coherente y comoda en una distribución que se asemeje a lo que el usuario de
Linux esta acostumbrado. (A este proceso se le llama "packaging" o empaquetamiento.)
El proyecto ofrece paquetes binarios pre compilados así como un sistema de construcción-desde-la-fuente automatizado.
</p>
<p>
Para lograr estos objetivos, Fink depende del las excelentes herramientas de manejo de paquetes producidas por el proyecto
<a href="http://www.debian.org/">Debian</a> - <code>dpkg</code>,
<code>dselect</code> and <code>apt-get</code>.
Además, Fink agrega si propio manejador de paquetes, llamado (¡Sorpresa!)
<code>fink</code>.
Usted puede ver <code>fink</code> como una maquina de construir - lo que
hace es tomar las descripciones de un paqute y produce un archivo .deb
binario.
En el proceso, descarga el codigo fuente original del Internet, lo parcha
de ser necesario, y luego ejecuta el proceso de configurarlo y
compilarlo. Finalmente, consolida el resultado en un paquete que esta
listo para ser instalado por <code>dpkg</code>.
</p>
<p>
Dado que Fink descansa encima del Mac OS X, posee una política estricta de
no interferir con el sistema base. Como resultado, Fink maneja un árbol de
directorios separado y provee la infraestructura para hacerlo facil de
usar.</p>


<h2>¿Por qué usar Fink?</h2>

<p>
Cinco razones para usar Fink para instalar software de Unix en su Mac:
</p>

<p>
<b>Poder.</b>
Mac OS X incluye solo un set de comandos de linea básicos.
Fink trae muchas mejoras sobre estas herramientas además de una selección
de aplicaciones gráficas desarrolladas para Linux y otras variantes de
Unix.
</p>

<p>
<b>Conveniencia.</b>
Con Fink el proceso de la compilación esta completamente automatizado;
núnca te tendras que preocupar por Makefiles o scripts de configuración y
sus parametros de nuevo.
El sistema de dependencias se encarga automaticamente de asegurarse que
todas las librerias requeridas esten presentes.
Nuestros paquetes estan ajustados para ofrecer la mayor cantidad de caracteristicas disponibles.
</p>

<p>
<b>Seguridad.</b>
La politica de no interferencia de Fink asegura que las partes vulnerables
de su sistema Mac OS X núnca sean tocadas.
Puede actualizar su sin miedo que Fink le pise los talones y viceversa.
Además. es sistema de empaquetado te permite reomver software que ya no
necesites, de manera segura.</p>

<p>
<b>Coherencia.</b>
Fink no es solo una coleccion aleatoria de paquetes, es una distribución
coherente.
Los archivos instalados son colocados en lugares predecibles.
La lista de documentación se mantiene actualizada
Existe una interface unificada para controlar los procesos de servidor.
Y hay más. la mayoría de lo cual trabaja tras bambalinas para ti.
</p>

<p>
<b>Flexibilidad.</b>
Usted solo descarga e instala los programas que necesita.
Fink le da la libertad de instalar XFree86 u otras soluciones X11 
que usted prefiera.
Si usted no desea X11, también es aceptable.
</p>


<p>
<a href="index.php?phpLang=es">De regreso al Home</a> -
<a href="download/index.php?phpLang=es">Descargas</a>
</p>


<?php
require "footer.inc";
