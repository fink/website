<?
$title = "Acceso al CVS de Fink";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2004/03/07 20:54:08';
$metatags = '';

include_once "header.inc";
?>

<h1>Ajustando el Acceso al CVS de Fink</h1><!--Generated from $Fink: cvs.es.xml,v 1.3 2004/03/07 20:54:08 fingolfin Exp $-->
    <p>
Fink es desarrollado mediante CVS.
Esto significa que puedes mantenerte al dia entre las liberaciones del Fink y siempre tener lo ultimo.
Esta pagina explicara como ajustar una instalacion existente de Fink para que se actualice mediante el CVS.
La informacion de esta pagina aplica al Fink 0.3.x y posteor.
</p>
  <h2><a name="">Estructura del CVS de Fink</a></h2>
    
    <p>Fink posee varios modulos de CVS. El modulo <code>dists</code> (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink/dists/">ViewCVS</a>)
contiene las descripciones de los paquetes y parches para OS 10.2 y posterior. Existen otros modulos usados por los desarrolladores de Fink, los cuales cualquiera puede ver, pero no son muy interesantes para la mayoria de los usuarios.</p>
  <h2><a name="">Actualizando las Descripciones de los Paquetes</a></h2>
    
    <p>Antes, esto era muy tedioso; pero en las versiones recientes de Fink es muy simple. Solo ejecuta este comando:
</p>
    <pre>fink selfupdate-cvs</pre>
    <p>Fink ejecutara todos los pasos necesarios automaticamente. Esto incluye conseguir las descripciones mas recientes delos paquetes, actualizando los paquetes esenciales (entre ellos, el manejador de paquetes del Fink).
</p>
    <p>Si estas tras un firewall, consulta el <a href="http://fink.sourceforge.net/faq/usage-fink.php#proxy">FAQ 3.2</a>.
</p>
    <p>Despues de que se hayan actualizado las descripciones de los paquetes de esta manera, puedes actualizar los paquetes a sus ultimas versiones. Esto se realiza ejecutando el comando:
</p>
    <pre>fink update-all</pre>
  <h2><a name="">Actualizando el Manejador de Paquetes</a></h2>
    
    <p>
<b>Nota:</b> A partir del 20 de Septiembre del 2001, ya no es necesario actualizar el manejador de paquetes independientemente; ahora s como cualquier paquete. Aún es posible actualizar directamente del CVS, aunque esto solo es util para la gente creando paquetes, no para el usuario promedio.  
</p>
    <p>El manejado de paquetes debe ser actualizado a traves de un direcotio separado y con el script<code>inject.pl</code> Este script pone las descripciones del paquete asi como los archivos tar para el fink y los archivos-bases en tu directorio Fink y entonces los construye.c</p>
    <p>Para ejecutar esto por primer vez, necesitaras un directorio temporal (llamado <code>tempdir</code> en el ejemplo) el cual esta vacio (o por lo menos no tiene un subdirecotrio llamado  'fink'). El procedimiento es como sigue:</p>
    <pre>cd tempdir
cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login
cvs -z3 -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co fink
cd fink
./inject.pl</pre>
    <p>Este comando de login solicitara un password - presiona return y continua. El directorio temporal puede ser eliminado una vez que el proceso haya concluido, pero si no lo haces asi, la siguiente vez que actualices sera mas facil. El procedimiento entonces sera:</p>
    <pre>cd tempdir/fink
cvs -z3 update -d
./inject.pl</pre>
  

<? include_once "footer.inc"; ?>
