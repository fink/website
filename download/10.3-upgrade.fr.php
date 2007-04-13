<?
$title = "Instructions de mise à niveau pour Mac OS X 10.3";
$cvs_author = '$Author: fingolfin $';
$cvs_date = '$Date: 2007/04/13 11:44:08 $';

include "header.inc";
?>


<h1>Instructions de mise à niveau pour Mac OS X 10.3</h1>

<p>Il est dorénavant possible de mettre à niveau Fink pour profiter pleinement du compilateur gcc 3.3, ou d'utiliser OS X 10.3 si vous l'avez installé.
Tous les utilisateurs peuvent mettre Fink à niveau, que ce soit à partir de la version source ou à partir de la version binaire ; cependant, la version binaire est bien plus stable et fiable, pour le moment, que la version source.</p>
<p>
Si vous désirez procéder à cette mise à niveau (depuis les sources), et que vous
avez installé auparavant les Developer Tools d'Apple de juin 2003, il vous faudra
installer les Developer Tools d'Apple d'août 2003 AVANT de mettre à
niveau Fink. Sous 10.3, assurez-vous d'installer XCode depuis le cédérom XCode
avant de mettre à niveau Fink.
</p><p>
Lancer la commande "fink selfupdate" devrait faire la mise à niveau pour vous. La
dernière version du gestionnaire de paquets fink détectera automatiquement
quelles versions de OS X et de gcc vous avez installées, et se réglera en
conséquence.
</p><p>
Si vous désirez faire une nouvelle installation de Fink sur un système 10.3,
nous vous recommandons d'exécuter un
<a href="http://fink.sourceforge.net/download/srcdist.php">bootstrap à partir du source</a> en commençant par fink-full-0.6.1.tar.gz, disponible sur la
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">
page de téléchargement sourceforge</a> de fink. Il vous faudra également
Xcode pour ce faire.
</p><p>
Notez aussi, qu'à partir du moment où vous aurez installé Fink version 0.15.0 ou ultérieure, vous
n'aurez plus besoin d'installer system-xfree86. Fink est capable de déterminer
automatiquement votre version de system-xfree86 si vous n'avez pas encore installé
de paquet fink x11. Si votre installation comporte un ancien paquet system-xfree86, lancez la commande suivante : 
</p>
<pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43; fink selfupdate; fink index</pre>
<p>
L'équipe de Fink oeuvre toujours à faire tourner les paquets Fink sous
10.3, mais un très grand nombre d'entre eux fonctionne déjà.
</p>

<?
include "footer.inc";
?>
