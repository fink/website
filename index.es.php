<?php
$title      = "Home";
$cvs_author = '$Author: nieder $';
$cvs_date   = '$Date: 2019/02/25 22:41:00 $';
$is_home    = 1;

$metatags = '<meta name="description" content="Fink, una distribución de software de Unix para Mac OS X y Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

require dirname(__FILE__) . "/header.inc";
?>


<p>
El proyecto de Fink desea traer el gran mundo del software de Unix de <a href="http://www.opensource.org/">Código Abierto</a> a
<a href="http://www.opensource.apple.com/">Darwin</a> y al 
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Nosotros modificamos el software de UNIX de manera que pueda ser compilado
 y ejecutado en Mac OS X (lo "portamos") y lo hacemos disponible
 como una distribución coherente que se pueda descargar.
 Fink usa herramientas de  <a href="http://www.debian.org/">Debian</a>
 tales como dpkg y apt-get para proveer un poderoso manejo de paquetes.
Usted puede escoger entre la descarga de un binario precompilado o todo
desde código fuente. 
<a href="about.php">Más información...</a>
</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1><a href="<?php print $rdf_file; ?>" title="Noticias del Proyecto Fink" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png"
alt="" style="border: 0"></a>&nbsp;Noticias</h1>
<?php
// Include news items
require dirname(__FILE__) . "/news/news.es.inc";
?>
<div align="right"><a href="<?php print $root; ?>news/index.php?phpLang=es">Noticias Anteriores...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Actualizacions de paquetes en Fink (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt=""
style="border:0"></a>&nbsp;Actualizaciones recientes de paquetes</h1>

<?php require "package-updates.inc" ?>

<a href="package-updates.php">más...</a>
</tr><tr valign="top"><td width="50%">
<h1>Estado de Fink</h1>
<?php 
require dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Actualmente, Fink admite soporte para macOS 10.14 (Mojave), macOS 10.13 (High Sierra), 
macOS 10.12 (Sierra), OS X 10.11 (El Capitan), OS X 10.10 (Yosemite), 10.9 (Mavericks), 
y continua funcionando en versiones mas 
antiguas, aunque ya no recibe actualizaciones en esos sistemas.  Instructiones de 
instalación están disponibles desde nuestra <a href="download/srcdist.php">página 
de liberación del código fuente</a>.
</p>
<p>XCode necesita ser instalado antes de instalar Fink.</p>
<p>
<strong>Soporte para 10.13 and 10.14:</strong> 
Usuarios en 10.13 y 10.14 deberián instalar Xcode 10.1 (a través de descarga 
gratuita del AppStore).  Al minimo necesitan 
instalar las herramientas de la linea de comandos para "Xcode 10.1 for Mojave" ó  "Xcode 10.1 for High Sierra"
(instalable a través de <i>xcode-select --install</i> o 
descargable desde <a href="http://developer.apple.com">Apple</a>).</p>
<p>Si necesita X11, debe de instalar Xquartz-2.7.11 o posterior desde 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>Soporte para 10.10:</strong> 
Usuarios en 10.10 deberián instalar Xcode 6.0 (a través de descarga 
gratuita del AppStore; la versión 6.1 es preferida).  Al minimo necesitan 
instalar las herramientas de la linea de comandos para "Xcode 6.0 for Yosemite" 
(instalable a través de <i>xcode-select --install</i> o 
descargable desde <a href="http://developer.apple.com">Apple</a>).</p>
<p>Si necesita X11, debe de instalar Xquartz-2.7.7 o posterior desde 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>Soporte para 10.9:</strong> 
Usuarios en 10.9 deberián instalar Xcode 5.0.1 (a través de descarga 
gratuita del AppStore; la versión 5.0.2 es preferida).  Al minimo necesitan 
instalar las herramientas de la linea de comandos para "Xcode 5.0 for Mavericks" 
(instalable a través de <i>xcode-select --install</i> o 
descargable desde <a href="http://developer.apple.com">Apple</a>).</p>
<p>Si necesita X11, debe de instalar Xquartz-2.7.4 o posterior desde 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>Soporte para 10.8:</strong> 
Usuarios en 10.8 deberián instalar Xcode 4.4 o posterior (a través de descarga 
gratuita del AppStore; la version 5.0.2 es preferida).  Al minimo necesitan 
instalar las herramientas de la linea de comandos para "Xcode 4.4 for Mountain Lion" 
(a través de descarga gratuita desde href="http://developer.apple.com">Apple</a> o 
instalable desde la página de Preferencias de Xcode).  Nota que si está presente 
una versión de Xcode más antigua que 4.4, se necesita <b>desinstalar</b> primero 
usando <i>/Developer/Library/uninstall-devtools</i>.  Puede determinar la versión 
actual con el comando <i>xcodebuild -version</i> .</p>
<p>Si necesita X11, debe de instalar Xquartz-2.7.4 o posterior desde 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>Soporte para 10.7:</strong>
Usuarios en 10.7 deberián instalar Xcode 4.1 o posterior (a través de descarga 
gratuita del AppStore).  Nota que si está presente 
una versión de Xcode más antigua que 4.4, se necesita <b>desinstalar</b> primero 
usando <i>/Developer/Library/uninstall-devtools</i>.  Puede determinar la versión 
actual con el comando <i>xcodebuild -version</i> .</p>
<p>Fink no soporta Xquartz en OS X 10.7.  No borre el X11.app oficial de Apple.</p>
<p>
<strong>Soporte para 10.6:</strong>
Para obtener los mejores resultados, se le recomienda a usuarios de 10.6 que 
instalen Xcode 3.2.6 o 4.2.1 (si pagó por la prevista 4.x para desarolladores). 
La versión 4.0.2 tiene ciertos problemas conocidos que afectan la compilación 
de ciertos programas.  Si se encuentra con este problema, siga la instrucciones 
en la sección de 10.7 para desinstalar Xcode.</p>
<p>Fink no soporta Xquartz en OS X 10.6.  No borre el X11.app oficial de Apple.</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
<h1>Recursos</h1>

<p>
Si estas buscando soporte, revisa la <a
href="help/index.php">página de ayuda</a>.
Esta página también lista varias opciones para ayudar al proyecto y
proporcionar retroalimentación.
</p>
<p>
If you are looking for the source files which correspond to
binaries distributed by the Fink project, please consult
<a href="download/sources_for_binaries.php">this page</a> for
instructions.
</p>
<p>
El proyecto Fink es albergado por
<a href="http://sourceforge.net/">SourceForge</a>.
Además de albergar el sitio y las descargas, SourceForge
provee los siguientes recursos al proyecto:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">página de SourceForge del resúmen del proyecto </a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Reporte o revisión de bugs</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Solicitudes de un paquete que no esta en Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Solicitar una caracteristica que no tenga Fink (el programa en sí)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Someter un nuevo paquete a Fink (desarrolladores non-core)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Someter un patch para fink (el programa)</a></li>
<li><a href="lists/index.php">Listas de Correo</a></li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">de
navegación en línea</a>, <a href="doc/cvsaccess/index.php">Instrucciones de acceso</a>)</li>
</ul>
<p>
Por favor, note que para hacer uso de algunos de estos recursos (ie. para
reportar un bug o solicitar un nuevo paquete de Fink), usted deberá estar
logeado en una cuenta del SourceForge.  Si no tiene dicha cuenta, deberá obtener una en el <a href="http://sourceforge.net/">sitio web del SourceForge</a>.
</p>
<p>Additional resources hosted outside SourceForge include:</p>
<ul>
    <li><a href="http://wiki.finkproject.org/">The Fink developer wiki</a> (now at a new location).</li>
    <li>
        <a href="https://github.com/fink/fink">
            New github repository for the source code of the <code>fink</code> package manager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            New github repository for the <code>fink-mirrors</code> package.
        </a>
    </li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?php
require dirname(__FILE__) . "/footer.inc";
?>
