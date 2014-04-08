<a name="2014-04-06%20fink-0.36.4%20publicado"><span class="news-date">2014-04-06: </span><span class="news-headline">fink-0.36.4 publicado</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.36.4</code> fue publicado el 6 de abril, 2014.
  Esta versión activa el uso de la distribución binaria oficial en 10.8 y 
  10.9 (con soporte provisional en el futuro para 10.6 y 10.7).  Adicionalmente, 
  esta versión funciona en torno a problemas introducidos por Xcode 5.1 en 10.8 
  y 10.9, corrige problemas en bootstrap cuando Xcode.app no ha sido instalado, y 
  activa la arquitectura x86_64 como el standard durante bootstrap en 10.6.
  </p>
  <p>
  Se anima a los usuarios que usen <code>fink selfupdate</code> para instalar esta
  versión, principalmente a causa de los problemas introducidos por Xcode 5.1.
  </p>
 <a name="2014-04-06%20Problemas%20con%20el%20sistema%20de%20rsync"><span class="news-date">2014-04-06: </span><span class="news-headline">Problemas con el sistema de rsync</span></a><?php gray_line(); ?>
  <p>
  El projecto ha estado teniendo problemas con el servidor maestro de rsync. Este
  problema afecta a casi todos los servidores espejo.  Para resolver el problema,
  se puede editar el fichero <code>/sw/etc/fink.conf</code> y ajustar la
  opción de <code>Mirror-rsync</code> a uno de estos dos servidores:</p> 
<pre>
rsync://ber.de.eu.finkmirrors.net/finkinfo/
rsync://hnd.jp.asi.finkmirrors.net/finkinfo/
</pre>
  <p>
  También se puede usar el comando <code>fink selfupdate-cvs</code> para cambiar el
  sistema de actualización.
  </p>
 <a name="2013-12-30%20fink-0.36.3.1%20publicado"><span class="news-date">2013-12-30: </span><span class="news-headline">fink-0.36.3.1 publicado</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.36.3.1</code> fue publicado el 30 de diciembre, 2013.
  Esta versión incluye soporte para OS X 10.9.1, y corrige un problema
  donde Fink no podría acceder las distribuciones binarias en plataformas
  de 64-bits.  También corrige un problema en plataformas de 32-bits que
  fue introducido con fink-0.36.3.
  </p>
 
