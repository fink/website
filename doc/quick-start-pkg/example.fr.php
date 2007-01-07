<?
$title = "Tutoriel d'empaquetage - Exemple";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2007/01/07 08:00:42';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Tutoriel d\'empaquetage Contents"><link rel="prev" href="howtostart.php?phpLang=fr" title="Préliminaires">';


include_once "header.fr.inc";
?>
<h1>Tutoriel d'empaquetage - 2. Exemple - le paquet Maxwell</h1>





<h2><a name="Basics">2.1 Préparation</a></h2>
<p>Tout d'abord Maxwell. Ouvrez votre éditeur de texte et commençons. Nous connaissons le nom du paquet, sa version et l'endroit où est située l'archive tar source. Entrons donc ces informations dans la fenêtre de l'éditeur de texte :</p>
<pre>
Package: maxwell
Version: 0.5.1
Revision: 1
Source: mirror:sourceforge:%n/%n-%v.tar.gz
</pre>
<p>Les champs nom (Package) et version sont faciles à comprendre, mais qu'en est-il des autres champs ? Le champ Revision correspond à la "version" du paquet dans Fink, tandis que le champ Version correspond à la version du source en amont. Comme c'est la première fois que nous tentons de construire un paquet maxwell-0.5.1 dans Fink, son numéro de révision est 1.</p>
<p>Le champ Source donne l'adresse à partir de laquelle <code>fink</code> téléchargera l'archive tar source. Comme <a href="http://sourceforge.net">Sourceforge</a> comprend un système mondial de miroirs pour les paquets et que <code>fink</code> le connaît, on utilise <code>mirror:sourceforge:</code>. <code>%n</code> est un raccourci pour le nom du paquet, maxwell, et <code>%v</code> un raccourci pour la version du paquet, 0.5.1.</p>
<p>Nous pouvons maintenant sauvegarder ceci sous le nom <code>maxwell.info</code> dans le répertoire <code>/sw/fink/dists/local/main/finkinfo/</code>. Ceci fait, voyons ce que cela donne avec <code>fink validate</code>.</p>
<pre>
finkdev% fink validate maxwell.info 
Validating package file maxwell.info...
Error: Required field "Maintainer" missing. (maxwell.info)
</pre>
<p>Heu ! On dirait que nous avons oublié un certain nombre de champs. Ajoutons-en quelques-uns :</p>
<pre>
Maintainer: Paul Dupont &lt;pdupont@exemple.com&gt;
HomePage: http://maxwell.sourceforge.net
License: MIT
</pre>
<p>Nous ajoutons notre nom en tant que mainteneur du paquet maxwell dans Fink ainsi que l'url de sa page d'accueil. En regardant sur la page sourceforge du projet, on voit que maxwell est distribué sous licence MIT, nous ajoutons également cette information. Maintenant, réessayons :</p>
<pre>
finkdev% fink validate maxwell.info
Validating package file maxwell.info...
Warning: Unknown license "MIT". (maxwell.info)
Error: No MD5 checksum specified for "source". (maxwell.info)
Error: No package description supplied. (maxwell.info)
</pre>
<p>Grrr ! On dirait que c'est de pire en pire, pas de panique, rabattons-nous sur le <a href="http://fink.sourceforge.net/doc/packaging/policy.php#licenses">Guide de construction de paquets</a> pour voir quelles sont les licences autorisées. On voit que l'on peut remplacer MIT par OSI-Approved, car la licence MIT a été approuvée par <a href="http://www.opensource.org/">OSI</a>. On peut aussi copier une courte description du paquet à partir de sa page d'accueil. Voici les changements que nous opérons :</p>
<pre>
License: OSI-Approved
Description: Mac OS X S.M.A.R.T. Tool
</pre>
<p>Mais que faire de l'erreur concernant les sommes de contrôle MD5 ? Pourquoi ne pas tout simplement demander à <code>fink</code> de récupérer le source ?</p>
<pre>
finkdev% fink fetch maxwell
/usr/bin/sudo /sw/bin/fink  fetch maxwell
Reading package info...
Updating package index... done.
Information about 3377 packages read in 30 seconds.
WARNING: No MD5 specified for Source of package maxwell-0.5.1-1 \
Maintainer: Paul Dupont &lt;pdupont@exemple.com&gt;
curl -f -L -O http://distfiles.opendarwin.org/maxwell-0.5.1.tar.gz
  % Total    % Received % Xferd  Average Speed          Time             Curr.
                                 Dload  Upload Total    Current  Left    Speed
  0     0    0     0    0     0      0      0 --:--:--  0:00:00 --:--:--     0
curl: (22) The requested URL returned error: 404
### execution of curl failed, exit code 22
Downloading the file "maxwell-0.5.1.tar.gz" failed.

(1)      Give up
(2)      Retry the same mirror
(3)      Retry another mirror from your continent
(4)      Retry another mirror
(5)      Retry using next mirror set "sourceforge"

How do you want to proceed? [3] 5
curl -f -L -O http://west.dl.sourceforge.net/sourceforge/maxwell/maxwell-0.5.1.tar.gz
  % Total    % Received % Xferd  Average Speed          Time             Curr.
                                 Dload  Upload Total    Current  Left    Speed
100  7856  100  7856    0     0  19838      0  0:00:00  0:00:00  0:00:00 6511k
</pre>
<p>L'archive tar ne peut être téléchargée à partir des miroirs de Fink, car le paquet n'a pas encore été ajouté à la distribution. C'est pourquoi il faut changer de miroir et sélectionner l'option 5. Voir les <a href="http://fink.sourceforge.net/faq/comp-general.php#master-problems">Q.F.P.</a> pour de plus amples informations à ce sujet.</p>
<p>Maintenant nous pouvons calculer la somme de contrôle md5 en exécutant <code>md5sum /sw/src/maxwell-0.5.1.tar.gz</code>, et l'ajouter à notre fichier .info</p>
<pre>
Source-MD5: ce5c354b2fed4e237524ad0bc59997a3
</pre>
<p>Maintenant <code>fink validate</code> marche, youpi !</p>

<h2><a name="build">2.2 Construction</a></h2>
<p>Désormais, nous pouvons construire le paquet, essayons :</p>
<pre>
finkdev% fink -m --build-as-nobody rebuild maxwell
/usr/bin/sudo /sw/bin/fink  build maxwell
Reading package info...
Updating package index... done.
Information about 3498 packages read in 32 seconds.
The following package will be built:
 maxwell
gzip -dc /sw/src/maxwell-0.5.1.tar.gz | /sw/bin/tar -xvf -  \
--no-same-owner --no-same-permissions 
maxwell-0.5.1/
maxwell-0.5.1/LICENSE
maxwell-0.5.1/Makefile
maxwell-0.5.1/maxwell.8
maxwell-0.5.1/maxwell.c
maxwell-0.5.1/README
./configure --prefix=/sw 
Can't exec "./configure": No such file or directory at \
/sw/lib/perl5/Fink/Services.pm line 403.
</pre>
<p>Hum ! Ça ne marche pas très bien. Lisons le README (situé dans <code>/sw/src/maxwell-0.5.1-1/maxwell-0.5.1/README</code>) et voyons ce qu'il dit...</p>
<pre>
To build type 'make'.

To install in /usr/local type 'sudo make install', to install elsewhere, type 
'sudo make install prefix=/elsewhere'
</pre>
<p>Ah ! Nous ne pouvons pas utiliser les scripts par défaut CompileScript et InstallScript, nous devons créer nos propres scripts, allons-y, c'est facile :</p>
<pre>
CompileScript: make
InstallScript: &lt;&lt;
#! /bin/sh -ev
make install prefix=%i
&lt;&lt;
</pre>
<p>Nous devons utiliser <code>prefix=%i</code> car <code>fink</code> construit le fichier binaire à partir des fichiers se trouvant dans <code>%i</code>. Ces fichiers seront ensuite installés dans <code>%p</code> (qui correspond par défaut à <code>/sw</code>) quand on exécutera <code>fink install maxwell</code>. Pour de plus amples informations sur <code>%p</code> et <code>%i</code>, consultez le <a href="http://fink.sourceforge.net/doc/packaging/format.php#percent">Guide de construction des paquets</a>.</p>
<p>Normalement, les lignes des champs Script sont passées au shell ligne après ligne. Mais la ligne  <code>#! /bin/sh -ev</code> permet à <code>fink</code> d'exécuter l'ensemble comme un script séparé. Le paramètre <code>-e</code> correspond à  "die on error" et <code>-v</code> à "verbose".</p>
<p>Validons de nouveau le paquet et tentons de le construire :</p>
<pre>
finkdev% fink validate maxwell.info 
Validating package file maxwell.info...
Package looks good!
finkdev% fink -m --build-as-nobody rebuild maxwell
/usr/bin/sudo /sw/bin/fink  build maxwell
Reading package info...
Updating package index... done.
Information about 3498 packages read in 32 seconds.
The following package will be built:
 maxwell
gzip -dc /sw/src/maxwell-0.5.1.tar.gz | /sw/bin/tar -xvf -  \
--no-same-owner --no-same-permissions 
maxwell-0.5.1/
maxwell-0.5.1/LICENSE
maxwell-0.5.1/Makefile
maxwell-0.5.1/maxwell.8
maxwell-0.5.1/maxwell.c
maxwell-0.5.1/README
make
cc  -L/sw/lib -c -o maxwell.o maxwell.c
cc  -I/sw/include -o maxwell -framework IOKit -framework CoreFoundation maxwell.o
/bin/rm -rf /sw/src/root-maxwell-0.5.1-1
/bin/mkdir -p /sw/src/root-maxwell-0.5.1-1/sw
/bin/mkdir -p /sw/src/root-maxwell-0.5.1-1/DEBIAN
/var/tmp/tmp.1.A3sRc2
#! /bin/sh -ev
make install prefix=/sw/src/root-maxwell-0.5.1-1/sw
/usr/bin/install -d -m 755 /sw/src/root-maxwell-0.5.1-1/sw/doc/maxwell
/usr/bin/install -m 644 LICENSE /sw/src/root-maxwell-0.5.1-1/sw/doc/maxwell/LICENSE
/usr/bin/install -m 644 README /sw/src/root-maxwell-0.5.1-1/sw/doc/maxwell/README
/usr/bin/install -d -m 755 /sw/src/root-maxwell-0.5.1-1/sw/bin
/usr/bin/install -m 755 maxwell /sw/src/root-maxwell-0.5.1-1/sw/bin/maxwell
/usr/bin/install -d -m 755 /sw/src/root-maxwell-0.5.1-1/sw/man/man8
/usr/bin/install -m 644 maxwell.8 /sw/src/root-maxwell-0.5.1-1/sw/man/man8/maxwell.8
/bin/rm -f /sw/src/root-maxwell-0.5.1-1/sw/info/dir \
/sw/src/root-maxwell-0.5.1-1/sw/info/dir.old \
/sw/src/root-maxwell-0.5.1-1/sw/share/info/dir \
/sw/src/root-maxwell-0.5.1-1/sw/share/info/dir.old
Writing control file...
Finding prebound objects...
Writing dependencies...
Writing package script postinst...
dpkg-deb -b root-maxwell-0.5.1-1 /sw/fink/dists/local/main/binary-darwin-powerpc
dpkg-deb: building package `maxwell' in \
`/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb'.
</pre>
<p>Fink semble avoir tout installé au bon endroit : <code>/sw/src/root-maxwell-0.5.1-1</code> à partir de l'emplacement où le paquet binaire <code>maxwell_0.5.1-1_darwin-powerpc.deb</code> a été construit.</p>
<p>Notez aussi que <code>fink</code> inclut automatiquement certains drapeaux de compilation pour lui permettre d'accéder à d'autres paquets <code>fink</code> (par exemple <code>-I/sw/include</code>).</p>
<p>Regardons ce qu'il y a à l'intérieur du paquet binaire :</p>
<pre>
finkdev% dpkg -c \
/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb
drwxr-xr-x root/admin        0 2004-07-15 09:40:38 ./
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/bin/
-rwxr-xr-x root/admin    29508 2004-07-15 09:40:39 ./sw/bin/maxwell
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/doc/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/doc/maxwell/
-rw-r--r-- root/admin     1076 2004-07-15 09:40:39 ./sw/doc/maxwell/LICENSE
-rw-r--r-- root/admin     1236 2004-07-15 09:40:39 ./sw/doc/maxwell/README
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/man/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/man/man8/
-rw-r--r-- root/admin     1759 2004-07-15 09:40:39 ./sw/man/man8/maxwell.8
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/lib/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/lib/fink/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/lib/fink/prebound/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/lib/fink/prebound/files/
-rw-r--r-- root/admin       16 2004-07-15 09:40:39 ./sw/var/lib/fink/prebound/files/maxwell.pblist
</pre>
<p>Cela semble correct, non ? Mais il faut vérifier que les règles de construction des paquets dans Fink sont respectées. Validons le paquet avec :</p>
<pre>
finkdev% fink validate \
/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb 
Validating .deb file \
/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb...
Warning: File installed into deprecated directory /sw/doc/
                                        Offender is /sw/doc/
Warning: File installed into deprecated directory /sw/doc/
                                        Offender is /sw/doc/maxwell/
Warning: File installed into deprecated directory /sw/doc/
                                        Offender is /sw/doc/maxwell/LICENSE
Warning: File installed into deprecated directory /sw/doc/
                                        Offender is /sw/doc/maxwell/README
Warning: File installed into deprecated directory /sw/man/
                                        Offender is /sw/man/
Warning: File installed into deprecated directory /sw/man/
                                        Offender is /sw/man/man8/
Warning: File installed into deprecated directory /sw/man/
                                        Offender is /sw/man/man8/maxwell.8
</pre>
<p>Heu ! Quelque chose ne va pas. Consultons encore le <a href="http://fink.sourceforge.net/doc/packaging/fslayout.php#fhs">Guide de construction des paquets</a>. On y voit que les pages man doivent être installées dans <code>/sw/share/man</code> et les fichiers <code>README</code> dans <code>/sw/share/doc/%n</code>. Si nous ouvrons le <code>Makefile</code> de maxwell, nous voyons que nous pouvons définir les répertoires mandir et datadir :</p>
<pre>
prefix = /usr/local
mandir = ${prefix}/man
man8dir = ${mandir}/man8
bindir = ${prefix}/bin
datadir = ${prefix}/doc/maxwell
</pre>
<p>On peut régler facilement le problème en changeant le script InstallScript :</p>
<pre>
make install prefix=%i mandir=%i/share/man datadir=%i/share/doc/%n
</pre>
<p>et reconstruire le paquet avec :</p>
<pre>
finkdev% fink -m --build-as-nobody rebuild maxwell
</pre>
<p>(On utilise <code>fink ... rebuild</code> car <code>fink build</code> ne ferait rien du tout, puisque le paquet a déjà été construit.)</p>
<p>Revérifiez le contenu du fichier .deb (avec <code>dpkg -c</code>) pour voir où les fichiers sont installés maintenant. Puis validez de nouveau le fichier .deb avec <code>fink validate</code>. Si tout se passe bien, vous pouvez installer le nouveau paquet avec :</p>
<pre>
finkdev% fink install maxwell
/usr/bin/sudo /sw/bin/fink  install maxwell
Information about 3377 packages read in 30 seconds.
The following package will be installed or updated:
 maxwell
dpkg -i /sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb
Selecting previously deselected package maxwell.
(Reading database ... 56046 files and directories currently installed.)
Unpacking maxwell (from .../maxwell_0.5.1-1_darwin-powerpc.deb) ...
Setting up maxwell (0.5.1-1) ...
</pre>
<p>Et faire tourner le paquet avec :</p>
<pre>
finkdev% maxwell
</pre>
<p>Félicitations ! Vous venez de construire votre premier paquet Fink. Maintenant, essayez de construire un autre paquet tout seul en suivant le <a href="http://fink.sourceforge.net/doc/quick-start-pkg/index.php">Tutoriel d'empaquetage</a> à partir du début.</p>
<p>Nous attendons impatiemment vos premières contributions à Fink !</p>


<? include_once "../../footer.inc"; ?>


