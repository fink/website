<?php
$title = "Netiquette - Inicial";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2013/02/02 14:16:41';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Netiquette Contents"><link rel="next" href="reply.php?phpLang=es" title=\'Respondiendo a los "posts"\'><link rel="prev" href="before-post.php?phpLang=es" title="¿Qué hacer antes de \'postear\'?">';


include_once "header.es.inc";
?>
<h1>Netiquette - 2. Primer "Post"</h1>
    
    
    <h2><a name="system">2.1 ¿Qué has instalado?</a></h2>
      
      <p>Si has estado teniendo problemas con un paquete instalado, deberás proveer la siguiente información acerca de tu sistema:</p>
      <ul>
        <li>Tu versión de OS.</li>
        <li>La versión de Fink que estás usando.  Un tip útil es ejecutar el comando <pre>fink --version</pre>en una ventana de terminal y adicionar el resultado a tu información en el "post".</li>
        <li>También deberás especificar si estas instalando a partir de binarios, e.g. usando <code>apt-get</code>, o de la fuenta, e.g. usando <code>fink install</code>.<p>En el segundo caso, favor de indicar la versión de las Developer Tools que estas usando.</p></li>
        <li><p>Si estas instalando un paquete que requiere de X11, deberás indicar si estas usando:  Apple's X11 o XFree86.  En el segundo caso, especifica la versión.   </p><p>Si tienes dudas, provee toda la informacion arriba mencionada.</p></li>
      </ul>
    
    <h2><a name="problem-description">2.2 ¿Qué es lo que esta mal?</a></h2>
      
      <ul>
        <li><b>Especifica el nombre y la vbersión del paquete que esta causando 
        problemas.</b>  <p>Este dato debera estar en la línes del tema de tu mensaje.
        </p><p>Esto significa que si estas teniendo problemas con <code>foo-3.141-6
        </code>, no solo reportes un problema con <code>foo</code>.</p><p>En particular,
        si estás instalando un paquete (e.g. <code>baz-2.18-1</code>) que depende de 
        otros paquetes, (<code>foo-3.141-6</code>, <code>bar-16.0-9</code>, ...) , y 
        estás teniendo problemas con <code>foo</code>, deberás reportar un problema con 
        <code>foo-3.141-6</code>, no con <code>baz-2.18-1</code>.</p></li>
        <li><b>Describe el problema.</b>  
        <p>Esto significa que deberás "postear" una muestra del mensaje de error que 
        estes recibiendo.</p><ol>
            <li>En el caso de problemas con la instalación de binarios, comienza
            donde esta siendo desempaquetado en paquete problematico:
            <pre>...
Selecting previously deselected package foo
error unpacking foo
...</pre>y continua hasta el final.<p></p></li>
            <li>Hay pocas posibilidades de problemas con la instalacion desde la fuente:
            <ol>
                <li>Si el error es durante la configuración inicial, el error ocurrirá 
                desde el principio. "Postea" desde el último grupo de pruebas que se 
                ejecutaron justo antes del mensaje de error hasta después de dicho 
                mensaje:<pre>....
Checking for bar-config...no
Error:  bar-config not found
....</pre><p>Si crees que el dato puede ayudar, entonces puedes "postear" la sección relevante del log del archivo de configuración, e.g. <code>/sw/src/foo-3.141-6/foo-3.141/config.log</code>.  <b>Por favor, no pongas TODO el archivo, podría se bastante grande.</b></p></li>
                <li>O, el error puede aparecer hasta que se inicía la construcción del
                paquete. En este caso, "postea" la última línea que el compilador trato 
                de ejecutar hasta el mensaje de error:<pre>...
gcc &lt;flags, files etc.&gt;
&lt;error messages&gt;
...</pre></li>
                <li>Sí lo que obtienes es el temido error de <code>execution of mv failed</code> lo que habrás de hacer es buscar en el output del build un error previó,
                 así que mejor buscaló antes de hacer tu "post".</li>
              </ol></li>
          </ol>    </li>
      </ul>
    
    <h2><a name="remedies">2.3 ¿Qué has intentado?</a></h2>
      
      <p>Es una buena idea mencionar que cosas has intentado para corregir la 
      situación, e.g.</p>
      <ul>
        <li>Instructiones en el FAQ u otra documentación</li>
        <li>La remoción de los paquetes que parecen causar conflicto</li>
        <li>Reconstrucciones/reinstalaciones</li>
        <li>La actualización de las descripciones de los paquetes</li>
        <li>etc.</li>
      </ul>
      <p>De esta manera, nadie empezará a sugerir cosas que ya intentaste.</p>
    
    <h2><a name="future-plans">2.4 ¿Qué intentarás ahora?</a></h2>
      
      <p>Algunas cosas caen en esta categoría:</p>
      <ul>
        <li>"Postea" lo que planeas hacer en caso de no obtener respuesta inmediata.</li>
        <li>Preguntar acerca de lo apropiado del curso de acción elegido.</li>
      </ul>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="reply.php?phpLang=es">3. Respondiendo a los "posts"</a></p>
<?php include_once "../../footer.inc"; ?>


