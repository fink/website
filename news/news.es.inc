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
    <a name="2004-09-20 Fink 0.7.1 liberado."><span class="news-date">2004-09-20: </span><span class="news-headline">Fink 0.7.1 liberado.</span></a><?php gray_line(); ?>
<p>
La versión más reciente de Fink, versión 0.7.1 (para 10.3), ya está disponible como código fuente y como binario. 
Ésta ha sido creada para la versión Panther (10.3) de Mac OS X. La versión 0.6.3 sigue estando disponible para la versión Jaguar (10.2) de Mac OS X.
</p>

<p>
Esta nueva versión incorpora varias correcciones al manejador de paquetes e integra numerosos binarios previamiente inaccesibles 
dando como resultado un gran total de 1650 binarios. Ésto incluye binarios para KDE 3.1.4 y GNOME 2.4.
</p>

<p>
Para realizar una primera instalación de Fink, hay que seguir los consejos 
de <a href="http://fink.sourceforge.net/download/index.php">esta página</a>. Es posible actualizar una instalación de Fink previa, utilizando la instalación previa de Fink. En <a href="http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable&amp;cmp=0%26tree2=0.7.0-stable&amp;splitoffs=on&amp;sort=name">esta página</a> encontraras la lista de las diferencias entre las versiones 0.7.0 y 0.7.1.
</p>

<p>
Si tienes alguna pregunta o problema, usa las listas de correo de Fink. Más información acerca de estas 
listas la encontraras <a href="http://fink.sourceforge.net/lists/index.php">aquí</a>.

</p>

<p>
Asegúrate de seleccionar el <b>instalador adecuado</b> para tu plataforma. Fink 0.6.3 solo se funcionará en Mac OS X 10.2.* mientras que Fink 0.7.1 sólo se funcionará en Mac OS X 10.3.* </p>

<p>
El Equipo de Fink desea agradecer a sus muchos contributores, ayudantes frecuentes y a los desarrolladores por hacer que esta liberación ocurriera. 
También agradecemos a nuestra comunidad por descarger la versión 0.7.0 más de 130.000 veces. 
Sin su constante apoyo y valiosas indicaciones Fink no estaría donde está ahora...
</p>


