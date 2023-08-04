<?php
$title = "Téléchargement de la version source";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2019/01/19 10:11:12 $';

include "header.inc";
include "../fink_version.inc";
?>

<h1>Téléchargement de la version source de Fink</h1>
<!--AKH 2007-05-31.  Fix when we have a release tarball that works with OS > 10.4.9
<p>
La version source contient le gestionnaire de paquets fink, les descriptions des paquets et leurs rustines.
Elle permet de télécharger les sources depuis les sites de distribution
originaux et de les compiler sur votre ordinateur.
</p>
-->
<!-- start translation -->
<p>The source tarball contains the <em>fink</em> package manager.  After you have installed it, you will be able to get package descriptions and patches.  It will use these to download the source code from the original distribution sites or the Fink project's mirrors and build them on your local machine.</p>
<!-- end translation -->
<?php 
include "../fink_version.inc";
?>
<!--
<p>
La version <?php print $fink_version; ?> de Fink a été officiellement mise à disposition des utilisateurs le <?php print $release_date; ?>.
</p>
-->
<p>La version <EM>fink-0.28.0</EM> a été officiellement mise à disposition des utilisateurs le 2007-11-02.</p>
<ul>
<!--<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<?php print $fink_version; ?>-full.tar.gz">Fink
<?php print $fink_version; ?></a>- 6786K, format .tar.gz</li>-->
<li><a href="https://downloads.sourceforge.net/fink/fink-0.28.0.tar.gz">fink-0.28.0</a> - 1308K, .tar.gz format</li>
</ul>

<p>
<!-- <b>Important :</b>
Ne pas extraire l'archive en utilisant Stuffit : cela corrompt certains
noms de fichiers.
Utilisez plutôt l'utilitaire <tt>tar</tt> en ligne de commande.
Les instructions sont dans le document d'installation. -->

<!-- start translation -->
You will also need to install the Xcode Tools (c.f. <a href="./index.en.php" >the Quick Start page</a>).</p>
  <p>Unpack the tar.gz archive if this hasn't been done automatically, e.g. via</p>
<pre>tar -xvzf fink-0.28.0.tar.gz</pre>

<p>in a terminal window.  Then, in a terminal window, change to the resulting <em>fink-0.28.0</em> directory, and use</p>
<pre>./bootstrap</pre>
<p>to start the boostrapping operation, which will install the Fink base setup.</p>
<p>After you have installed <em>fink</em> and the other base packages, the commands</p>
<pre>fink selfupdate-rsync</pre>
<p>or</p>
<pre>fink selfupdate-git</pre>

<p>will download the package description files and patches.</p>
<!-- end translation -->


<p>Les instructions d'installation et d'utilisation sont contenues dans
l'archive tar de la distribution.
Lisez-les : Fink ne s'installe pas en un seul clic !
Les documents README, INSTALL et USAGE sont fournis sous format texte (pour lecture en ligne de commande) et sous format HTML (pour lecture via un navigateur et impression).
Ils sont aussi disponibles en ligne dans la <a
href="../doc/index.php">section documentation</a>.
</p>
<!-- start translation -->
<p>After you have installed <em>fink</em> and the other base packages, the commands</p>
<pre>fink selfupdate-rsync</pre>
<p>or</p>
<pre>fink selfupdate-git</pre>
<p>will download the package description files and patches.</p>
<!-- end translation -->
<p>
Pour être tenu informé des nouvelles versions, abonnez-vous à la <a
href="../lists/fink-announce.php">liste de diffusion fink-announce</a>.
</p>


<?php
include "footer.inc";
?>
