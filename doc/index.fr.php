<?
$title = "";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/03/07 16:55:26';
include_once 'nav.inc';
$fsroot = $root = '../';
include_once '../header.inc'; 
?><h1>Fink - Documentation</h1>
<p>
Voici un ensemble de documents écrits pour Fink.
Certains de ces documents peuvent également être utiles aux personnes qui utilisent Mac OS X or Darwin sans Fink et souhaitent apprendre à porter des logiciels Unix sur ces systèmes.
</p>
<h2><a name="userdoc">Documentation utilisateur</a></h2>

<p>
Documentation actuelle de l'utilisateur de Fink :
</p>
<ul>
<li><a href="users-guide/index.php">Guide de l'utilisateur de Fink</a> -
ce guide couvre l'installation de Fink, celle des paquets et la mise à jour de Fink lors d'une nouvelle version. Il contient les instructions pour les versions source et binaire.
<b>En cours de rédaction !</b></li>
<li><a href="x11/index.php">X11 sur Darwin et Mac OS X</a> -
couvre les concepts généraux, l'installation et le lancement (les utilisateurs de Darwin et de Mac OS X y trouveront aussi des conseils utiles)</li>
</ul>

<p>
Un grand nombre de documents plus complets, mais obsolètes et non remis à jour : 
</p>
<ul>
<li><a href="bundled/install.php">Installation et Mise à jour</a> - comment installer Fink et le mettre à jour lors d'une nouvelle version </li>
<li><a href="bundled/usage.php">Utilisation</a> - comment utiliser Fink et les logiciels installés</li>
<li><a href="bundled/readme.php">Fink ReadMe</a> - le fichier ReadMe de la distribution source</li>
<li><a href="cvsaccess/index.php">Accès CVS</a> - comment accéder au serveur CVS de Fink pour récupérer les paquets source les plus récents entre deux versions</li>
</ul>

<h2><a name="developerdoc">Documentation développeur</a></h2>

<ul>
<li><a href="http://fink.sourceforge.net/doc/UsingFink.pdf">Utilisation de Fink : un guide pour le développeur</a> (fichier pdf 2MB) - diapositives d'une présentation lors de la <a href="http://conferences.oreillynet.com/macosx2002/">Conférence O'Reilly Mac OS X</a> (disponible aussi sous <a href="http://conferences.oreillynet.com/presentations/macosx02/morrison_david.ppt">format PowerPoint</a>) </li>
<li><a href="porting/index.php">Trucs et astuces pour le portage</a> - notes sur le portage d'applications Unix sur Darwin</li>
<li><a href="packaging/index.php">Guide de construction des paquets</a> - comment créer et maintenir des paquets Fink</li>
</ul>

<? include_once "../footer.inc"; ?>
