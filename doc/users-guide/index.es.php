<?
$title = "Guía del Usuario";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2007/05/29 03:58:51';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="Guía del Usuario Contents"><link rel="next" href="intro.php?phpLang=es" title="Introducción">';


include_once "header.es.inc";
?>
<h1>Guía del Usuario de Fink </h1>
  <p>Atención: la versión española de este documento no se sincroniza con la versión inglesa.</p>
    <p>This document gives an overview over all features of Fink.
(The following older documents may offer a broader view:
<a href="http://www.finkproject.org/doc/bundled/install.php">Instalación</a>,
<a href="http://www.finkproject.org/doc/bundled/usage.php">Uso</a>
y el ReadMe.rtf incluido en la imagen de disco de la distribución binaria.)
También revise:<a href="http://www.finkproject.org/doc/">Sección de
Documentación</a> en el sitio web, tiene algunos otros documentos útiles.

</p>
    <p>
Bienvenido a la guía de Usuario de Fink
Esta guía cubre tanto la primer Instalación así como los procedimientos para las actualizaciones
para distribución fuente y la binaria.
La Instalación de paquetes y su mantenimiento se incluyen también.
</p>
  <h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=es"><b>1 Introducción</b></a><ul><li><a href="intro.php?phpLang=es#what">1.1 Qué es Fink?</a></li><li><a href="intro.php?phpLang=es#req">1.2 Requerimientos.</a></li><li><a href="intro.php?phpLang=es#supported-os">1.3 Sistemas Soportados</a></li><li><a href="intro.php?phpLang=es#src-vs-bin">1.4 Fuente vs. Binario</a></li></ul></li><li><a href="install.php?phpLang=es"><b>2 Primera Instalación</b></a><ul><li><a href="install.php?phpLang=es#bin">2.1 Instalando la distribución Binaria</a></li><li><a href="install.php?phpLang=es#src">2.2 Instalando la distribución Fuente</a></li><li><a href="install.php?phpLang=es#setup">2.3 Ajustando su Ambiente</a></li></ul></li><li><a href="packages.php?phpLang=es"><b>3 Instalando Paquetes</b></a><ul><li><a href="packages.php?phpLang=es#bin-dselect">3.1 Instalando Paquetes Binarios con
dselect</a></li><li><a href="packages.php?phpLang=es#bin-apt">3.2 Instalando los paquetes con 
apt-get</a></li><li><a href="packages.php?phpLang=es#bin-exceptions">3.3 Instalando Paquetes Dependientes que no estan Disponibles en la distribución Binaria</a></li><li><a href="packages.php?phpLang=es#src">3.4 Installing Binary and Source Packages with fink</a></li><li><a href="packages.php?phpLang=es#fink-commander">3.5 Fink Commander</a></li><li><a href="packages.php?phpLang=es#available-versions">3.6 Versiones disponibles</a></li><li><a href="packages.php?phpLang=es#x11">3.7 Entendiendo el X11.</a></li></ul></li><li><a href="upgrade.php?phpLang=es"><b>4 Actualizando Fink</b></a><ul><li><a href="upgrade.php?phpLang=es#bin">4.1 actualizar usando los Paquetes Binarios</a></li><li><a href="upgrade.php?phpLang=es#src">4.2 Actualizando la distribución Fuente</a></li><li><a href="upgrade.php?phpLang=es#mix">4.3 Mezclas de Binarios y Código Fuente</a></li></ul></li><li><a href="conf.php?phpLang=es"><b>5 El archivo de configuración de Fink</b></a><ul><li><a href="conf.php?phpLang=es#about">5.1 Acerca de fink.conf</a></li><li><a href="conf.php?phpLang=es#syntax">5.2 Sintaxis del fink.conf</a></li><li><a href="conf.php?phpLang=es#required">5.3 Configuración requerida</a></li><li><a href="conf.php?phpLang=es#optional">5.4 Ajustes opcionales del usuario</a></li><li><a href="conf.php?phpLang=es#downloding">5.5 Ajustes de  Descargas</a></li><li><a href="conf.php?phpLang=es#mirrors">5.6 Ajustes de Espejo</a></li><li><a href="conf.php?phpLang=es#developer">5.7 Ajustes de Desarrollador</a></li><li><a href="conf.php?phpLang=es#advanced">5.8 Advanced Settings</a></li><li><a href="conf.php?phpLang=es#sourceslist">5.9 Managing apt's sources.list file</a></li></ul></li><li><a href="usage.php?phpLang=es"><b>6 Usando el Fink desde la línea de comando</b></a><ul><li><a href="usage.php?phpLang=es#using">6.1 Usando la herramienta fink</a></li><li><a href="usage.php?phpLang=es#options">6.2 Global options</a></li><li><a href="usage.php?phpLang=es#install">6.3 install</a></li><li><a href="usage.php?phpLang=es#remove">6.4 remove</a></li><li><a href="usage.php?phpLang=es#purge">6.5 purge</a></li><li><a href="usage.php?phpLang=es#update-all">6.6 update-all</a></li><li><a href="usage.php?phpLang=es#list">6.7 list</a></li><li><a href="usage.php?phpLang=es#apropos">6.8 apropos</a></li><li><a href="usage.php?phpLang=es#describe">6.9 describe</a></li><li><a href="usage.php?phpLang=es#plugins">6.10 plugins</a></li><li><a href="usage.php?phpLang=es#fetch">6.11 fetch</a></li><li><a href="usage.php?phpLang=es#fetch-all">6.12 fetch-all</a></li><li><a href="usage.php?phpLang=es#fetch-missing">6.13 fetch-missing</a></li><li><a href="usage.php?phpLang=es#build">6.14 build</a></li><li><a href="usage.php?phpLang=es#rebuild">6.15 rebuild</a></li><li><a href="usage.php?phpLang=es#reinstall">6.16 reinstall</a></li><li><a href="usage.php?phpLang=es#configure">6.17 configure</a></li><li><a href="usage.php?phpLang=es#selfupdate">6.18 selfupdate</a></li><li><a href="usage.php?phpLang=es#selfupdate-rsync">6.19 selfupdate-rsync</a></li><li><a href="usage.php?phpLang=es#selfupdate-cvs">6.20 selfupdate-cvs</a></li><li><a href="usage.php?phpLang=es#index">6.21 index</a></li><li><a href="usage.php?phpLang=es#validate">6.22 validate</a></li><li><a href="usage.php?phpLang=es#scanpackages">6.23 scanpackages</a></li><li><a href="usage.php?phpLang=es#cleanup">6.24 cleanup</a></li><li><a href="usage.php?phpLang=es#dumpinfo">6.25 dumpinfo</a></li><li><a href="usage.php?phpLang=es#show-deps">6.26 show-deps</a></li></ul></li></ul>
<!--Generated from $Fink: uguide.es.xml,v 1.7 2007/05/29 03:58:51 babayoshihiko Exp $-->
<? include_once "../../footer.inc"; ?>


