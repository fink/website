<?
$title = "Kit de mise à niveau pour Mac OS X 10.1";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2004/03/05 21:50:43 $';

include "header.inc";
?>


<h1>Kit de mise à niveau pour Mac OS X 10.1</h1>

<p>
Comme les anciennes versions de <code>apt</code> ne fonctionnent pas sous Mac OX S 10.1, voici la procédure à suivre pour mettre à niveau Fink lorsqu'il a été installé à partir de l'installeur binaire.
</p>
<p>
On peut utiliser une procédure similaire pour mettre à niveau d'anciennes versions de Fink 0.2.x (y compris MacGIMP et la première version du CD GIMP de OpenOSX).
Pour ce faire, il faut que Fink ait été installé dans <tt>/sw</tt> et non pas dans un autre répertoire.
Voir <a href="#oldversion">ci-dessous</a>.
</p>

<h2>Fink 0.3.0 et ultérieure</h2>

<p>
À partir de la version 0.3.0, Fink est complètement compatible avec Mac OS X 10.1.
Nous n'avez pas donc pas à suivre une procédure spéciale.
</p>

<h2>Fink 0.2.4 à 0.2.6</h2>

<p>
Cette procédure suppose que vous avez installé Fink avec l'installeur officiel de la version binaire.
Le premier installeur de ce type apparaît dans la version 0.2.4.
La procédure comporte trois étapes principales :
</p>
<ol>

<li><p>Obtention du bon paquet apt.
Téléchargez les paquets <a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a> et <a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>.
Dans une fenêtre de Terminal.app, allez dans le dossier où vous avez téléchargé ces fichiers et lancez ces commandes : 
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb</pre>
<p>
(si bash est votre shell, tapez <code>. /sw/bin/init.sh</code> à la place de <code>source /sw/bin/init.csh</code>)
</p>
</li>
<p>
Une fois qu'apt est installé, utilisez ces commandes pour mettre à jour les listes de paquets :
</p>
<pre>rehash
fink scanpackages
sudo apt-get update</pre>
</li>

<li><p>Mise à jour des paquets fondamentaux.
Il est important que vous ayez les derniers outils de gestion de paquets, ceux installés sur votre système peuvent être obsolètes.
</p>
<pre>sudo apt-get install base-files gettext dpkg fink</pre>
</li>

<li><p>Mise à jour du reste du système.
Vous pouvez le faire soit avec <tt>dselect</tt> (recommandé)
<b>ou</b> avec cette commande apt:
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>

<h2><a name="oldversion">Fink 0.2.3 et antérieure</a></h2>

<p>
Cette procédure suppose que vous avez installé une ancienne version de Fink 
(0.2.1 dans la plupart des cas) qui faisait partie d'un autre paquet, tels l'installeur de MacGIMP ou celui de GIMP d'OpenOSX).
La procédure comporte quatre étapes principales :
</p>
<ol>

<li><p>Obtention du bon paquet apt et des bons paquets fink.
Téléchargez les paquets
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>, 
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a> 
et 
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/fink_0.10.0-1_darwin-powerpc.deb">fink-0.10.0-1</a>.
(Oui, ce numéro de version est le bon. La commande <tt>fink</tt> contenue dans le paquet fink possède un autre système de numérotation de version que celui de la distribution Fink.)
Dans une fenêtre de Terminal.app, allez dans le dossier où vous avez téléchargé ces fichiers et lancez ces commandes pour installer les paquets : 
</p>
<pre>sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb
sudo dpkg -i fink_0.10.0-1_darwin-powerpc.deb</pre>
<p>
Une fois qu'apt est installé, utilisez ces commandes pour mettre à jour les listes de paquets :
</p>
<pre>rehash
fink scanpackages
sudo apt-get update</pre>
</li>

<li><p>Mise à jour des autres paquets fondamentaux.
Il est important que vous ayez les derniers outils de gestion de paquets, ceux installés sur votre système peuvent comporter des bogues ou être trop anciens pour les nouveaux paquets.
</p>
<pre>sudo apt-get install base-files gettext dpkg</pre>
</li>

<li><p>Réglage du problème des dépendances de X11.
Avant de continuer, vous devez d'abord régler le problème des dépendances de X11.
Si vous avez installé les paquets MacGIMP ou OpenOSX, Fink considère que vous avez effectué une installation "manuelle" de XFree86. Vous devez donc installer le paquet  <code>system-xfree86</code> :
</p>
<pre>sudo apt-get install system-xfree86</pre>
<p>
Si le paquet vous signale que votre installation de XFree86 est trop ancienne, vous devrez d'abord la mettre à jour, puis réexécutez la commande ci-dessus.
</p>
</li>

<li><p>Mise à jour du reste du système.
Vous pouvez le faire soit avec <tt>dselect</tt> (recommandé)
<b>or</b> soit avec cette commande apt:
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>


<?
include "footer.inc";
?>
