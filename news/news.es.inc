<a name="2005-04-29 Fink y Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink y Tiger.</span></a><?php gray_line(); ?>
<p>
¡Fink puede usarse para OS X 10.4!  Hay diferentes formas de actualizarse:
</p><ul>
<li>
En pocas semanas estará disponible un instalador binario, para aquellos que sólo utilizan binarios.
</li><li>
Para usuarios de la rama estable, recomendamos borrar la instalación actual de
fink con <code>sudo rm -Rf /sw</code> y "bootstrap" una instalación de 
fink-0.23.9 utilizando 
<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203">
fink-0.23.9.tar.gz</a> -descargar el fichero y descomprimirlo mediante <code>tar -xvzf fink-0.23.9.tar.gz</code>. Tras ejecutar bootstrap.sh en el directorio <code>fink-0.23.9</code> resultante, necesitarás ejecutar <code>fink selfupdate</code>.
</li><li>
Los usuarios de la rama inestable pueden actualizarse simplemente
instalando fink-0.24.5, mediante <code>fink selfupdate</code> desde cualquier versión anterior. Tras actualizarse a 10.4, comprobad en primer lugar que se tiene la versión correcta mediante <code>fink --version</code>. Si el resultado del comando es menor que 0.24.5, ejéctuse <code>fink selfupdate</code> para obtener la versión correcta de fink. Y entonces reinstalar el paquete fink mediante <code>fink reinstall fink</code> y después <code>fink selfupdate</code>.
</li>
</ul>
<p>No todos los paquetes funcionan correctamente todavía bajo 10.4, pero esta situación se irá corrigiendo las próximas semanas. La rama estable contiene especialemnte pocos paquetes en 10.3, pero todos ellos deberían compilarse .</p>

<p>Por supuesto, algunas arrugas todavía necesitan ser planchadas (sic). Animamos a los usuarios con aplicaciones críticas que verifiquen en las listas de correo si alguien ha tenido problemas o no con el paquete en cuestión antes de actualizar.</p>
<a name="2004-11-20 Solución a los problemas con gcc."><span class="news-date">2004-11-20: </span><span class="news-headline">Solución a los problemas con gcc.</span></a><?php gray_line(); ?>
<p>
Apple ha liberado el actualizador de gcc versión Noviembre 2004, disponible
(tras registro gratutito) en connect.apple.com.  Este actualizador elimina
el problema del compilador gcc3 en XCode 1.5.  Si estás usando  XCode 1.5, 
debes instalarlo.  (El instalador funcionará correctamente tanto
para aquellos usuarios que no han utilizado el parche recomendado por
el proyecto Fink como para aquellos que lo usaron en su momento.)
</p><p>
Agradecemos a Apple su respuesta a nuestros informes sobre este asunto
y el trabajo realizado para resolverlo rápidamente.
</p>


<a name="2004-10-15 Resolución de problemas con gcc."><span class="news-date">2004-10-15: </span><span class="news-headline">Resolución de problemas con gcc.</span></a><?php gray_line(); ?>
      <p>
Se sabe que la versión de gcc incluída en XCode 1.5 produce 
salidas incorrectas desde código c++ bajo determinadas circunstancias.
Fink tiene ahora un mecanismo para avisar al usuario de esto. Además, 
Fink pronto rechazará el uso de esta versión "rota" para compilar paquetes
de los cuales se sepa que tienen este problema.</p>
      <p>
Si te has pasado ya a la versión 1.5 de XCode una solución se halla descrita 
<a href="http://article.gmane.org/gmane.os.apple.fink.beginners/13580"> aquí </a> y 
también <a href="http://article.gmane.org/gmane.os.apple.fink.beginners/14200"> aquí </a>.
</p>
      <p> Si no te has actualizado aún, nuestro consejo es que 
consideres no hacerlo y quedarte con  XCode versión 1.2 
hasta que el problema sea resuelto.
</p>
    
