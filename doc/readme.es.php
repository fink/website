<?
$title = "ReadMe";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2006/09/16 23:17:53';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink ReadMe</h1>
<!--Generated from $Fink: readme.es.xml,v 1.2 2006/09/16 23:17:53 dmrrsn Exp $-->
<p>
Fink es un sistema de gestión de paquetes que facilita el acceso completo al mundo Open Source a los usuarios de Darwin y Mac OS X.
</p>
<p>
Con la ayuda de dpkg, mantiene una jerarquía de directorios separados.
Descarga las versiones originales del código fuente, las modifica si es necesario ,las configura para Darwin y las compila e instala.
La información sobre los paquetes disponibles y las modificaciones necesarias (las descripciones del paquete -"package descriptions"-) se mantienen de forma separada pero se incluyen normalmente con las distribuciones.
El código fuente actual se puede descargar de Internet si es necesario.
</p>
<p>
Aunque Fink no se puede considerar "maduro", tiene asperezas y carece de algunas características, es utilizado con éxito por un gran número de personas.
Por favor, lee las instrucciones cuidadosamente y no te sorprendas si algo no funciona como sería lo esperado.
Disponemos de  buenas explicaciones para muchos problemas; visita la web si necesitas ayuda.
</p>
<p>
Fink es distribuido bajo los términos de la licencia GNU General Public License.
Revisa el documento COPYING para más detalles.
</p>
<h2><a name="req">Requerimientos</a></h2>
<p>
Necesitas:
</p>
<ul>
<li><p>
Un sistema con Mac OS X instalado, versión 10.0 o superior.
(Todavía existen algunos problemas relacionados con enlaces perdidos en la versión 10.1)
Darwin 1.3.1 también debería funcionar pero todavía no ha sido verificado.
Versiones anteriores  de ambos podrían <b>no</b> funcionar.
</p></li>
<li><p>
Herramientas de desarrollo.
Para Mac OS X, instala el paquete Developer.pkg del CD Developer
Tools CD.
Comprueba que las herramientas instaladas corresponden a tu versión del Mac OS X.
Para Darwin,  las herramientas deberían estar instaladas por defecto por el instalador.
</p></li>
<li><p>
Acceso a Internet.
Todo el código fuente puede descargarse de los diferentes espejos -mirror-.
</p></li>
<li><p>
Paciencia.
Compilar paquetes grandes lleva su tiempo.
Hablo de horas o incluso días.
</p></li>
</ul>
<h2><a name="install">Instalación</a></h2>
<p>
El proceso de instalación se describe detalladamente en el documento INSTALL.
Por favor, léelo primero, el proceso no es trivial.
También describe el procedimiento de actualización.
</p>
<h2><a name="usage">Utilizando Fink</a></h2>
<p>
El documento USAGE describe cómo colocar los "paths" y cómo instalar y remover paquetes.
Incluye también una lista completa de comandos disponibles.
</p>
<h2><a name="questions">Otras preguntas</a></h2>
<p>
Si la documentación no responde todas tus preguntas, visita la web de Fink 
<a href="http://www.finkproject.org/">http://www.finkproject.org/</a>
y repasa la página de ayuda -Help page- :
<a href="http://www.finkproject.org/help/">http://www.finkproject.org/help/</a>.
Puede indicarte dónde encontrar documentación adicional y lugares de ayuda si fuera necesario,
</p>
<p>
Si deseas contribuir a Fink, la página de ayuda mencionada anteriormente también dispone de una lista de cosas que puedes hacer, como verificar y crear paquetes.
</p>
<h2><a name="uptodate">Mantenerse informado</a></h2>
<p>
La web del proyecto se encuentra en
<a href="http://www.finkproject.org/">http://www.finkproject.org/</a>.
</p>
<p>
Para mantenerte informado de nuevas versiones, visita 
<a href="http://www.finkproject.org/lists/fink-announce.php">http://www.finkproject.org/lists/fink-announce.php</a>
y apúntate a la lista de correo fink-announce mailing list.
La lista es moderada y de tráfico bajo.
</p>

<? include_once "../footer.inc"; ?>


