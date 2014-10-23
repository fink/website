<?php
$title = "Instructions de mise à niveau binaire pour Mac OS X 10.1";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>


<h1>Instructions de mise à niveau binaire pour Mac OS X 10.1</h1>

<p>
Voici comment mettre à niveau la version binaire de Fink sous Mac OS X 10.1, en partant de la distribution binaire officielle de Fink, version 0.3.x ou ultérieure.
</p>
<p>La mise à niveau comporte plusieurs étapes :
</p>
<ol>

<li><p>Récupérez le bon paquet apt.
Téléchargez les paquets 
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
et
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>.
Dans une fenêtre de Terminal.app, allez dans le répertoire où vous avez téléchargé ces fichiers et exécutez les commandes suivantes :
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb</pre>
<p>
(si vous utilisez bash comme shell, saisissez <code>. /sw/bin/init.sh</code> à la place de <code>source /sw/bin/init.csh</code>.)
</p>
</li>
<li><p>
Une fois apt installé, utilisez les commandes suivantes pour mettre à jour apt et les paquets déjà installés :
</p>
<pre>sudo apt-get update
sudo apt-get dist-upgrade
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
