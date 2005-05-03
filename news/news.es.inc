<a name="2005-04-29%20Fink%20y%20Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink y Tiger.</span></a><?php gray_line(); ?>
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
<a name="2005-04-29%20Fink%20and%20Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink and Tiger.</span></a><?php gray_line(); ?>
<p>
Fink can be used on OS X 10.4!  There are several ways you can update:
</p><ul>
<li>
A binary installer will be available within a few weeks, for binary-only
users.
</li><li>
For users of the stable tree, we recommend that you delete your current
fink with <code>sudo rm -Rf /sw</code> and then "bootstrap" an
installation of fink-0.23.9 using
<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043&amp;release_id=323774">
fink-0.23.9.tar.gz</a>--download that file and expand it, 
eg. via
<code>tar -xvzf fink-0.23.9.tar.gz</code>.  After running the command
<code> ./bootstrap.sh </code> in the resulting
<code>fink-0.23.9</code> directory,
you'll need to run <code>fink selfupdate</code>
</li><li>
For users of the unstable tree, you may be able to upgrade just by running <code>fink selfupdate</code> if your version of fink is less than 0.24.5.  It will install fink-0.24.5 for you.  After upgrading to 10.4, first check that you have the right version of fink by issuing <code>fink --version</code>.  If your version is less than 0.24.5, run <code>fink selfupdate</code> to get the right version of fink.  Then reinstall the fink package using <code>fink reinstall fink</code>, followed by <code>fink selfupdate</code>.
</li>
</ul>
<p>Not all packages are working yet under 10.4, but that situation will
improve over the next several weeks.  The stable tree contains substantially
fewer packages than in 10.3, but all of them should compile.
</p>
<p>Of course, some wrinkles still need to be ironed out.  We encourage 
users with mission-critical applications to check in on the mailing 
lists to verify whether anyone has had experience with the package in 
question before upgrading.</p>

<a name="2004-11-20%20Soluci%C3%B3n%20a%20los%20problemas%20con%20gcc."><span class="news-date">2004-11-20: </span><span class="news-headline">Solución a los problemas con gcc.</span></a><?php gray_line(); ?>
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



