<?
$title = "Téléchargement rapide";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/13 19:47:09 $';

include_once "header.inc";
include "../fink_version.inc";
?>


<h1>Téléchargement de Fink</h1>
<p>Il y a de nombreuses façons d'installer ou de mettre à niveau Fink. Nous conseillons aux nouveaux utilisateurs de suivre les instructions de téléchargement rapide figurant ci-dessous. Pour les autres, voyez les <a href="overview.php">généralités</a> et la <a href="upgrade.php">matrice de mise à niveau</a>.</p>
<h2>Téléchargement rapide</h2>
<p>C'est votre premier essai sous Fink ?  Ces instructions vont vous aider à charger rapidement la version binaire.</p>
<ol>
<li><p>Téléchargez l'image disque de l'installeur :<br>
<? analytics_download_link("http://prdownloads.sourceforge.net/fink/Fink-" . $fink_version . "-PowerPC-Installer.dmg?download", "Installeur binaire Fink " . $fink_version . " pour PowerPC", "/downloads/FinkPPC")   ?> - <?= $dmg_size ?><br>
<? analytics_download_link("http://prdownloads.sourceforge.net/fink/Fink-" . $fink_version . "-Intel-Installer.dmg?download",   "Installeur binaire Fink " . $fink_version . " pour Intel",   "/downloads/FinkINTEL") ?> - <?= $intel_dmg_size ?><br>
Utilisateurs de la version 10.3 - utilisez  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.7.2-Installer.dmg?download">Fink0.7.2</a><br>
Utilisateurs de la version 10.2  - utilisez <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.4-Installer.dmg?download">Fink 0.6.4</a><br>
Utilisateurs de la version 10.1  - utilisez <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink0.4.1</a></p></li>
<li><p>Double-cliquez sur &quot;Fink-<? print $fink_version; ?>-XYZ-Installer.dmg&quot; (où XYZ correspond à PowerPC ou Intel) pour monter l'image disque, puis double-cliquez sur le paquet "Fink <? print $fink_version; ?> XYZ Installer.pkg" à l'intérieur de l'image. Suivez les instructions qui s'affichent sur l'écran.</p></li>
<li><p>À la fin de l'installation, le script pathsetup s'exécutera. On vous demandera la permission d'éditer vos fichiers de configuration de shell. Quand le script aura terminé, la configuration sera terminée et vous pourrez continuer !</p></li>
<li><p>Si quelque chose ne se passe pas bien durant le processus, vous pouvez relancer l'application pathsetup à partir de l'image disque de l'installeur, ou exécuter la commande suivante : </p>
<pre>/sw/bin/pathsetup.sh </pre>
<p>dans une fenêtre de Terminal.app. (Cette étape doit être répétée pour tout utilisateur de votre système : chaque utilisateur doit exécuter pathsetup dans son propre compte).</p>
<p>Si pathsetup génère des messages d'erreur, consultez la documentation, en particulier la 
<a href="../doc/users-guide/install.php#setup">section 2.3 "Définition de votre environnement"</a> du Guide de l'utilisateur.</p></li>
<li><p>Ouvrez une nouvelle fenêtre de Terminal.app et exécutez la commande suivante : "<code>fink scanpackages; fink index</code>", ou utilisez l'application graphique Fink Commander incluse (elle doit être placée dans un répertoire réel sur votre système, et non pas lancée à partir de l'image disque) et lancez les commandes suivantes à partir de son menu : <em>Source->scanpackages</em> suivie de <em>Source->Tools->index</em>.</p></li>
<li><p>Quand ces deux commandes auront été exécutées, vous devrez mettre à jour le paquet  <code>fink</code>, au cas où il y aurait eu des changements importants depuis la dernière version. Ensuite, vous pourrez installer d'autres paquets. Il y a plusieurs manières de le faire :
<ul>
<li>
<p>Utiliser Fink Commander pour choisir et installer des paquets. Fink Commander fournit une interface graphique pour Fink simple à utiliser. C'est la méthode recommandée pour les nouveaux utilisateurs, ou les utilisateurs qui ne se sentent pas à l'aise en ligne de commande. Fink Commander a des menus pour les sources et les binaires. Vous devez installer les binaires si vous n'avez pas installé les Developer Tools ou si vous ne voulez pas compiler les paquets vous-même.</p>
<ul><li><p>La séquence à exécuter dans Fink Commander pour mettre à jour <code>fink</code> à partir des binaires est la suivante :</p>
<ol>
<li>Binary->Update descriptions</li>
<li>Choisissez le paquet <code>fink</code></li>
<li>Binary->Install</li>
</ol></li>
<li><p>La séquence à exécuter dans Fink Commander pour mettre à jour <code>fink</code> à partir du source est la suivante :</p>
<ol>
<li>Source->Selfupdate</li> 
<li>Tools->Interact with Fink...
<li>Assurez-vous que  "Accept default response" est sélectionné et cliquez sur "Submit".</li>
<li><code>fink</code> et d'autres paquets fondamentaux seront compilés et lancés automatiquement.</li>
</ol></li></ul>
<p>Maintenant que vous avez mis à jour <code>fink</code>, vous pouvez installer d'autres paquets.</p>  
<ul>
<li>Pour installer un paquet à partir des binaires, sélectionnez le paquet et utilisez Binary->Install.</li>
<li>Pour installer un paquet à partir du source, sélectionnez le paquet et utilisez Source->Install</li>
</ul>
</li>
<li>
<p>Utiliser apt-get. Apt-get récupère et installe les paquets binaires, ce qui vous évite de perdre du temps à les compiler. Vous devez utiliser cette méthode ou la méthode binaire de Fink Commander (voir ci-dessus) si vous n'avez pas installé les Developer Tools.</p>
<p>Pour mettre à jour <code>fink</code>, ouvrez une fenêtre de Terminal.app et saisissez <code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>Quand <code>fink</code> sera mis à jour, vous pourrez alors installer d'autres paquets, en utilisant la même syntaxe, comme dans <code>sudo apt-get install gimp</code> pour installer the Gimp.  Notez, toutefois, que tous les paquets Fink n'existent pas sous forme binaire.</p>
</li>
<li>
<p>Installer à partir du source. Pour mettre à jour <code>fink</code>, exécutez <code>fink selfupdate</code>.  Choisissez l'option (1), "rsync" lorsqu'on vous demandera la méthode de mise à jour. Cela mettra automatiquement à jour le paquet <code>fink</code>.</p>
<p>Après mise à jour de <code>fink</code>, vous pourrez utiliser "<code>fink install</code>" pour récupérer et compiler à partir des sources. Par exemple, exécutez <code>fink install gimp</code> pour installer the Gimp.</p> 
</li> 
</ul>
</li> 
</ol>
<h2>Autres outils à installer</h2>
<h3>Outils de développement XCode</h3>
<p>Il se peut que vous estimiez que l'utilisation des seuls paquets binaires limite l'utilité de Fink. Il y a moins de paquets disponibles sous forme binaire que de paquets disponibles à partir des sources. De plus, les versions binaires sont généralement plus anciennes que les versions source. Pour compiler les paquets à partir du source, vous devez installer les Outils de Développement (nommé XCode Tools sous Mac OS X 10.3 et versions ultérieures).</p>
<p>Bien qu'en général il y ait une version des Outils de Développement sur le média d'installation de votre système, vous voudrez probablement en avoir une version plus récente. Allez sur le site <a href="http://connect.apple.com">Apple Developer Connection</a> pour la télécharger (ainsi que toute mise à jour) après vous être enregistré(e). L'enregistrement est gratuit.</p>
<table>
<caption>Outils de développement recommandés suivant la version du système</caption>
<tbody>
<tr>
<td>10.2</td>
<td>December 2002 Developer Tools et August 2003 <code>gcc3.3</code> updater</td>
</tr>
<tr>
<td>10.3</td>
<td>XCode 1.5 et November 2004 <code>gcc3.3</code> updater</td>
</tr>
<tr>
<td>10.4 sur PowerPC</td>
<td>XCode 2.2.1 et XCode Legacy Tools (pour les paquets qui se servent de <code>gcc3.1</code> ou de <code>gcc2.95</code> à la compilation)</td>
</tr>
<tr>
<td>10.4 sur Intel</td>
<td>XCode 2.2.1</td>
</tr>
</tbody>
</table>
<h3>X11</h3>
<p>Presque toutes les applications de Fink qui ont une interface graphique (IGU) requièrent une version de X11, car la plupart ont été développés sur des systèmes qui, à l'origine, ne comportait que X11 comme éventuelle interface graphique.</p>
<p>Apple fournit sa propre distribution de X11 pour Mac OS X 10.3 et Mac OS X 10.4. C'est l'option la plus simple à prendre au début. La distribution est divisée en deux parties :</p>
<ul>
  <li>Le paquet <em>X11User</em> contient ce qui est nécessaire pour faire tourner X11 d'Apple. Il est disponible en tant qu'installation optionnelle sur votre média d'installation pour Mac OS X 10.3 et Mac OS X 10.4.</li>
  <li>Le paquet <em>X11SDK</em> contient les headers de développement. Vous en avez besoin pour compiler à partir du source tout paquet qui utilise X11. Ce paquet est disponible en tant que partie des Outils de Développement. Il est installé par défaut lors de l'installation de XCode 2.x.</li>
</ul>
<p>Après que vous avez installé X11, Fink l'enregistre automatiquement. Si vous rencontrez des problèmes à ce sujet, voyez la <a href="http://fink.sourceforge.net/faq/usage-packages.php?phpLang=fr#apple-x11-wants-xfree86">Q.F.P.</a> au sujet des problèmes lors de l'installation de X11.</p>
<p>Pour de plus amples informations, voyez les <a href="../faq/index.php">Questions fréquemment posées</a> et la <a href="../doc/index.php">section documentation</a>. Si vous ne trouvez pas réponse à vos questions dans ces documents, voyez la <a href="../help/index.php">page d'aide</a>.</p>
<p>Pour vous tenir informé des nouvelles versions, abonnez-vous à la <a href="../lists/fink-announce.php">liste de diffusion fink-announce</a>.</p>
<p>Le code source des paquets dans l'image disque de l'installeur peut être téléchargé à partir d'<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">ici</a>.</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
