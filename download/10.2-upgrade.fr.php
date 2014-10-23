<?php
$title = "Instructions de mise à niveau binaire pour Mac OS X 10.2";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>


<h1>Instructions de mise à niveau binaire pour Mac OS X 10.2</h1>

<p>
Vous trouverez ci-dessous les instructions pour mettre à niveau la version binaire de Fink sous Mac OS X 10.2, en partant de la version binaire officielle de Fink, version 0.3.x ou ultérieure.
</p>
<p>Voici les différentes étapes :
</p>
<ol>

<li><p>Obtenir le bon paquet apt.
Téléchargez les paquets 
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.5.0a/main/binary-darwin-powerpc/base/apt_0.5.4-7_darwin-powerpc.deb">apt-0.5.4-7</a>
et
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.5.0a/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-7_darwin-powerpc.deb">apt-shlibs-0.5.4-7</a>.
Dans une fenêtre de Terminal.app, allez dans le dossier où vous avez téléchargé ces fichiers et lancez ces commandes : 
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-7_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-7_darwin-powerpc.deb</pre>
<p>
(si bash est votre shell, tapez . /sw/bin/init.sh à la place)
</p>
</li>
<li><p>
Une fois qu'apt est installé, utilisez ces commandes pour mettre à jour apt et les paquets déjà installés :
</p>
<pre>sudo apt-get update
sudo apt-get dist-upgrade
fink scanpackages
sudo apt-get update
sudo apt-get install storable-pm</pre>
</li>

<li><p>Enfin, mettez à jour vos descriptions de paquets avec les commandes suivantes :
</p>
<pre>sudo touch /sw/fink/stamp-rel-0.3.0
fink selfupdate</pre>
</li>

</ol>



<?php
include "footer.inc";
?>
