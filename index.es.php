<?
$title = "Home";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2004/09/03 01:27:49 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, una distribución de software de Unix para Mac OS X y Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include "header.inc";
?>

<p>
El proyecto de Fink desea traer el gran mundo del software de Unix de
<a href="http://www.opensource.org/">Código Abierto</a> a
<a href="http://www.opensource.apple.com/">Darwin</a> y al 
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Nosotros modificamos el software de UNIX de manera que pyeda ser compilado
 y ejecutado en Mac OS X (hacemos "un puerto") y loa hacemos disponible
 como una distribución coherente que se pueda descargar.
 Fink usa herramientas de  <a href="http://www.debian.org/">Debian</a>
 tales como dpkg y apt-get para proveer un poderoso manejo de paquetes.
Usted puede escoger entre la descarga de un binario precompilado y todo
desde código fuente. 
<a href="about.php">Más información...</a>
</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>Noticias</h1>

<?
// Include news items
include $fsroot."news/news.es.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php">Noticias Antiguas...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>Estado de Fink</h1>
<? 
include "fink_version.inc";
?>

<p>
Fink 0.6.3 (para OS X 10.2) y Fink <? print $fink_version ?> fueron
liberados el <? print convert_date_to_locale($release_date) ?>.  
Dichas liberaciones incluyen paquetes en códigos fuente y binarios así
como instaladores binarios.</p>

<h1>Recursos</h1>

<p>
Si estas buscando soporte, revisa la<a
href="help/index.php">página de ayuda</a>.
Esta página también lista varias opciones para ayudar al proyecto y
proporcionar retroalimentación.</p>

<p>
El proyecto Fink es albergado por
<a href="http://sourceforge.net/">SourceForge</a>.
Además de albergar el sitio y las descargas, SourceForge
provee los siguientes recursos al proyecto:</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">página de SourceForge
del resumen del proyecto </a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Reporte o revisión de bugs</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Solicitudes de un paquete que no esta en Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Solicitar una caracteristica que no tenga Fink (el 
programa en sí)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Someter un nuevo paquete a Fink (desarrolladores 
non-core)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Someter un patch para fink (el programa)</a></li>
<li><a href="lists/index.php">Listas de Correo</a></li>
<li>CVS (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink">de navegación en línea</a>, <a href="doc/cvsaccess/index.php">Instrucciones de acceso</a>)</li>
</ul>
<p>
Por favor, note que para hacer uso de algunos de estos recursos (ie, para
reportar un bug o solicitar un nuevo paquete de Fink), usted deberá estar
logeado en una cuenta del SourceForge.  Si no tiene dicha cuenta, deberá obtener una en el <a href="http://sourceforge.net/">sitio web del SourceForge</a>.
</p>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>