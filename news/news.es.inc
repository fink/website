<a name="2005-06-09 New Fink releases."><span class="news-date">2005-06-09: </span><span class="news-headline">New Fink releases.</span></a><?php gray_line(); ?>
<p>
Three new Fink releases are 
<a href="<?php print $root; ?>download/index.php">available</a>
 today: version 0.8.0 (for 10.4),
version 0.7.2 (for 10.3), and version 0.6.4 (for 10.2).
All three releases include source files, binary packages, and a Fink
installer for new users.
</p>
<p>
The new release for 10.4 includes all currently-available "stable" packages
in source and binary form: there are 1565 of these, which constitutes more
than 80% of the 1909 packages available in the 10.3 release.  Work continues
by the fink developers on bringing more of the stable packages to Tiger.
</p>
<p>
The new release for 10.2 will be the last official release for that
version of Mac OS X.  Although no further updates (not even security
updates) will be provided by the Fink team, we anticipate that the
0.6.4 release will be usable for years to come.
</p>
<p>
Users upgrading to 10.4 can now simply issue a 
<code>fink selfupdate</code> command, followed by
<code>sudo /sw/lib/fink/postinstall.pl</code> (for first-time updaters
on 10.4), <code>fink scanpackages</code> and <code>sudo apt-get update</code>.
We don't recommend bootstrapping at the moment, since bootstrapping does
not work with the newly-released XCode 2.1 from Apple.
</p>

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



