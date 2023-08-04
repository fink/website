<?php
$title = "Q.F.P. - Compilation (2)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="usage-general.php?phpLang=fr" title="Problèmes généraux d\'utilisation de paquets"><link rel="prev" href="comp-general.php?phpLang=fr" title="Problèmes généraux de compilation">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 7. Problèmes de compilation spécifiques à certains paquets</h1>


<a name="libgtop">
<div class="question"><p><b><?php echo FINK_Q ; ?>7.1: La compilation d'un paquet échoue avec des messages d'erreur concernant <code>sed</code>. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ceci peut se produire si votre script de connexion (par exemple <code>~/.cshrc</code>) lance une commande qui écrit dans le terminal. Par exemple : "<code>echo Hello</code>" ou <code>xttitle</code>. Pour résoudre le problème, la solution la plus simple est de mettre les lignes qui causent problème en commentaires.</p><p>Si vous voulez conserver l'écho, vous pouvez le faire ainsi :</p><pre>if ( $?prompt) then 
echo Hello 
endif</pre></div>
</a>
<a name="cant-install-xfree">
<div class="question"><p><b><?php echo FINK_Q ; ?>7.2: Lors d'une tentative de passage aux paquets XFree86 de Fink, il est impossible d'installer le paquet <code>xfree86-base</code> ou le paquet <code>xfree86</code>, car ils entrent en conflit avec le paquet <code>system-xfree86</code>. Que se passe-t-il ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Toutes les variantes de X11, doivent, malheureusement, être installées au même endroit, à savoir dans le répertoire /usr/X11R6. C'est pourquoi, les paquets de Fink <code>xfree86-base</code> et <code>xfree86-rootless</code> s'installent également à cet endroit. Néanmoins, comme Fink ne supprime pas les fichiers qui ne figurent pas dans sa base de données, il ne remplace pas automatiquement une installation de X11 faite hors de Fink.</p><p></p><p>Voici comment procéder pour résoudre le problème :</p><p></p><p> <b>Note : les utilisateurs de Mac OS X 10.2.x ayant une version de Fink à jour (c'est-à-dire &gt;=0.16.2) et les utilisateurs de Mac OS X 10.3.x doivent sauter l'étape 1 ci-dessous (de toute façon, elle ne fonctionne pas pour eux).</b>
</p><p>Étape 1. Supprimez le paquet <code>system-xfree86</code>. Si vous n'avez aucun paquet qui dépend de X11, c'est tout simple. Toutefois, il est fréquent que de nombreux paquets dépendant de X11 soient installés. Dans ce cas, au lieu de tous les désinstaller, vous pouvez utiliser la commande :</p><pre>sudo dpkg --remove --force-depends system-xfree86</pre><p>pour supprimer le paquet system-xfree86, ce qui laisse tout le reste en place. Si le paquet <code>system-xfree86</code> n'est pas installé, passez à l'étape 3.</p><p>Étape 2. Supprimez l'application XFree86 via la commande  :</p><pre>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</pre><p>Si vous aviez installé l'application X11 d'Apple auparavant, supprimez-la également.</p><p>Étape 3. Pour installer l'application XFree86-4.2.1, installez les paquets Fink <code>xfree86-base</code> et <code>xfree86-rootless</code> comme vous le faites d'habitude : via la commande "<code>fink install</code>" pour les utilisateurs de sources, ou bien les commandes "<code>apt-get install</code>" ou <code>dselect</code> pour les utilisateurs de binaires.</p><p>- ou -</p><p>Étape 3a. Pour installer l'application XFree86-4.3.x ou une version postérieure, installez le paquet Fink <code>xfree86</code> via la commande "fink install xfree86". La version la plus récente (XFree86-4.4.x à la date du 25 mai 2004) n'est pas encore dans la distribution binaire et n'est disponible que dans l'arborescence instable. Voir <a href="/faq/usage-fink.php#unstable">comment installer un paquet instable</a>.</p></div>
</a>
<a name="change-thread-nothread">
<div class="question"><p><b><?php echo FINK_Q ; ?>7.3: Comment passer de la version sans processus légers à la version avec processus légers (ou vice-versa) ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Si vous avez installé la version Fink de XFree86 et que vous vouliez passer de la version sans processus légers de Fink à celle avec processus légers de Fink, vous devez supprimer l'ancienne version manuellement. Vous pouvez le faire via la ligne de commande comme ceci :</p><pre>sudo dpkg -r --force-depends xfree86-base 
sudo dpkg -r --force-depends xfree86-shlibs 
sudo dpkg -r --force-depends xfree86-rootless 
sudo dpkg -r --force-depends xfree86-rootless-shlibs</pre><p>ou pour supprimer la version avec processus légers :</p><pre>sudo dpkg -r --force-depends xfree86-base-threaded 
sudo dpkg -r --force-depends xfree86-shlibs-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs</pre><p>FinkCommander peut aussi supprimer des paquets. Dans la fenêtre "source", sélectionnez un paquet et utilisez "<code>Force Remove</code>" dans le menu <code>Source</code>.</p><p>Si vous avez installé le paquet system-xfree86, voir la précédente question pour savoir comment le supprimer.</p><p>Installez la version désirée de xfree86 :</p><p><code>xfree86-base</code> et <code>xfree86-rootless</code></p><p>ou</p><p><code>xfree86-base-threaded</code> et <code>xfree86-rootless-threaded</code></p><p>via les commandes habituelles : "<code>fink install</code>" pour les utilisateurs de sources, "<code>apt-get install</code>" ou <code>dselect</code> pour les utilisateurs de binaires.</p></div>
</a>
<a name="cctools">
<div class="question"><p><b><?php echo FINK_Q ; ?>7.4: Lors de l'installation de KDE, un message signale que la dépendance au paquet "cctools (&gt;= 446-1)" ne peut être résolue (message en anglais : 'Can't resolve dependency "cctools (&gt;= 446-1)"'"). Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ce message quelque peu abscons signifie que vous devez installer les Developer Tools de décembre 2002.</p></div>
</a>
<a name="libiconv-gettext">
<div class="question"><p><b><?php echo FINK_Q ; ?>7.5: Il est impossible de mettre à jour <code>libiconv</code>. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Si vous voyez apparaître des messages d'erreur semblables au suivant :</p><pre>libtool: link: cannot find the library `/sw/lib/libiconv.la'</pre><p>vous pouvez résoudre le problème en exécutant la commande :</p><pre>fink remove gettext-dev
fink install libiconv</pre></div>
</a>
 <a name="cplusplus-filt">
<div class="question"><p><b><?php echo FINK_Q ; ?>7.6: Il est impossible d'installer un paquet car le fichier <code>c++filt</code> n'existe pas. Où le récupérer ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Si vous avez des erreurs similaires à la suivante :</p><pre>xgcc: installation problem, cannot exec `c++filt': No such file or directory</pre><p>après être passé sous Tiger, vous devez suivre les étapes suivantes :</p><ul>
<li>Réinstallez <code>BSD.pkg</code> à partir du DVD d'installation du système Tiger.</li>
</ul><ul>
<li>10.4: Désinstallez l'ancienne version des Outils de développements (Developer Tools) en exécutant la commande :
<pre>/Developer/Tools/uninstall-devtools.pl</pre> 
dans une fenêtre de terminal. Puis installez XCode (version 2.4.1 ou supérieure).</li>
<li>10.5: Désinstallez l'ancienne version des Outils de développements (Developer Tools) en exécutant la commande :
<pre>/Developer/Tools/uninstall-devtools.pl</pre> 
dans une fenêtre de terminal. Puis installez XCode (version 3.0 ou supérieure).</li>
</ul><p>Si le fichier <code>/usr/bin/c++filt</code> n'apparaît pas, recommencez les deux étapes précédentes jusqu'à ce qu'il apparaisse.</p></div>
</a>
<a name="gettext-tools">
<div class="question"><p><b><?php echo FINK_Q ; ?>7.7: Fink refuse de mettre à jour le paquet <code>gettext</code>, car les dépendances sont incompatibles entre elles. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Exécutez d'abord la commande <code>fink selfupdate</code> pour vous assurer que vous avez bien les dernières versions des paquets. Puis exécutez la commande <code>fink update gettext-tools</code>. Une ancienne version de <code>gettext-tools</code> peut empêcher la mise à jour de <code>gettext</code>.</p></div>
</a>
  <a name="Leopard-libXrandr">
    <div class="question"><p><b><?php echo FINK_Q ; ?>7.8: I can't install <b>gtk+2</b> on OS 10.5</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Typically this involves missing libraries, such as:   <code>/usr/X11/lib/libXrandr.2.0.0.dylib</code> or 
    <code>/usr/X11/lib/libXdamage.1.1.0.dylib</code> (or other versions of libraries in
    <code>/usr/X11/lib/</code>).</p><p>The current wisdom on the best
    fix for such an issue is to install Xcode 3.1.3 or later.</p></div>
  </a>
<a name="all-others">
<div class="question"><p><b><?php echo FINK_Q ; ?>7.9: Des problèmes apparaissent avec un paquet qui n'est pas mentionné ici. Que faire ?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Comme les problèmes sur les paquets ont tendance à être transitoires, nous avons décidé de les mettre sur le wiki de Fink. Voyez la page <a href="http://wiki.finkproject.org/index.php/Fink:Package_issues">Package issues</a>.</p></div>
</a>
<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=fr">8. Problèmes généraux d'utilisation de paquets</a></p>
<?php include_once "../footer.inc"; ?>


