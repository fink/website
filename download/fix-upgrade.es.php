<?php
$title = "Repairing the Upgrade Path";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>


<h1>Reparar el <em></em>Upgrade Path</em></h1>

<p>
Algunas versiones de Fink han tenido dificultades con las actualizaciones
al ejecutar <code>fink selfupdate</code> (sin CVS).  El resultado era un mensaje
que afirmaba que Fink se había actualizado, incluso cuando la versión instalada
no era la última. El procedimiento a seguir en esta situación era:
</p>
<ol>
<b><p>Fink-0.5.0a -> Fink-0.5.1</p></b>
<li><p>Instalar una versión más antigua del manipulador de paquetes de Fink
ejecutando el siguiente comando en una ventana de Terminal.app:
</p>
<pre>curl -O http://us.dl.sourceforge.net/fink/direct_download/dists/fink-0.5.1/main/binary-darwin-powerpc/base/fink_0.11.1-10_darwin-powerpc.deb
sudo dpkg -i fink_0.11.1-10_darwin-powerpc.deb
rm fink_0.11.1-10_darwin-powerpc.deb</pre>
<li><p>
Y ahora, actualizar como siempre, ejecutando <code>fink selfupdate</code>.
</p>

</ol>



<?php
include "footer.inc";
?>
