<?php
$title = "Documentación";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink - Documentación</h1>
<!--Generated from $Fink: doc.es.xml,v 1.15 2019/01/19 10:11:12 nieder Exp $-->
    <p>
Esta es una colección de varios documentos escritos para el Fink. 
Algunos de ellos tambien pueden ser útiles para la gente que usa Mac OS X
ó Darwin sin Fink y que deseen aprender a hacer "puertos" de software de Unix. </p>
  <h2><a name="userdoc">Documentación del Usuario</a></h2>
    
    <p>
La documentación actual del Fink incluye:
</p>
    <ul>
      <li><a href="users-guide/index.php">Guía del Usuario del Fink</a> -
esto cubre la instalación del propio Fink, la instalación de paquetes, y actualizaciones del Fink. 
Contiene instrucciones tanto para la version fuente como para la binaria.
</li>
      <li><a href="advanced/index.php">Fink Advanced Topics Guide</a> -
covers more advanced concepts than those covered in the User's Guide.</li>
      <li><a href="x11/index.php">Ejecutando X11 en Mac OS X y Darwin</a> -
cubre conceptos como la instalación y ejecución (tambien dedicado a los usuarios de Darwin y Mac OS X)</li>
    </ul>
    <p>
Un grupo de documentos que son más completos, pero ligeramente desactualizados y no frecuentemente actualizados son los que siguen:
</p>
    <ul>
      <li><a href="install/index.php">Instalación y Actualización</a> - cubre la instalación de Fink así como las actualizaciones</li>
      <li><a href="usage/index.php">Uso</a> - como usar Fink e instalar programas</li>
      <li><a href="readme.php">Fink ReadMe</a> - El archivo Leeme de la distribución fuente</li>
      <li><a href="gitaccess/index.php">Acceso a Git</a> - Como acccesar al deposito Git de Fink para obtener las últimas version de código fuente de los paquetes, aun entre liberaciones del Fink</li>
    </ul>
  <h2><a name="developerdoc">Documentación de Desarrolladores</a></h2>
    
    <ul>
          <li><a href="security/index.php">Manual de Políticas de Seguridad</a> - 
	  Lectura obligatoria para aquellos que mantienen paquetes en Fink o que les gustaría añadir alguno.</li>
      <li><a href="/doc/UsingFink.pdf">Usando Fink: Un "Cómo hacer" para los desarrolladores</a> (un pdf de 2 Mbs) - transparencias y la presentación de la Conferencias<a href="http://conferences.oreillynet.com/macosx2002/">O'Reilly Mac OS X </a> (Disponible tambien como 
<a href="http://conferences.oreillynet.com/presentations/macosx02/morrison_david.ppt">archivo de PowerPoint </a>) </li>
      <li><a href="porting/index.php">Tips para hacer "puerto"</a> - notas para hacer "puertos" de aplicaciones de Unix a Darwin</li>
            <li><a href="quick-start-pkg/index.php">Tutorial de Empaquetamiento</a> - un complemento al Manual de Paquetes el cual se enfoca en ejemplos reales e introduce el empaquetamiento a los principiantes.</li>
      <li><a href="packaging/index.php">Manual de Paquetes</a> - como crear y mantener paquetes de Fink</li>
      <li><a href="http://wiki.finkproject.org/index.php/Fink">The Fink Developer Wiki</a> - includes developer-related material that is under construction.</li>
    </ul>
  <h2><a name="otherdoc">Otros Documentos</a></h2>
    
    <ul>
      <li><a href="multilingual/index.php">Guía de Internacionalización</a> - Material concerniente al continuo esfuerzo de internacionalización del sitio web.</li>
      <li><a href="netiquette/index.php">Nettiquete para la Lista de Correo</a> - Cómo emplear mejor las listas de correo del Fink.</li>
    </ul>
  
<?php include_once "../footer.inc"; ?>


