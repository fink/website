<?
$title = "Q.F.P. - Compilation (2)";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/08/20 12:07:43';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="usage-general.php?phpLang=fr" title="Problème généraux d\'utilisation de paquets"><link rel="prev" href="comp-general.php?phpLang=fr" title="Problèmes de compilation généraux">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 7. Problèmes de compilation de certains paquets</h1>
    
    
    <a name="libgtop">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.1: La compilation d'un paquet échoue avec des messages d'erreur concernant <code>sed</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ceci peut se produire si votre script de connexion (par exemple <code>~/.cshrc</code>) lance une commande qui écrit dans le terminal, exemple : "<code>echo Hello</code>" ou <code>xttitle</code>. Pour résoudre le problème, la solution la plus simple est de mettre les lignes qui causent problème en commentaires.</p><p>Si vous voulez conserver l'écho, vous pouvez le faire ainsi :</p><pre>if ( $?prompt) then 
	echo Hello 
endif</pre></div>
    </a>
    <a name="cant-install-xfree">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.2: Lors d'une tentative de passage aux paquets XFree86 de Fink, il est impossible d'installer <code>xfree86-base</code> ou <code>xfree86</code>, car ces paquets entrent en conflit avec <code>system-xfree86</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Toutes les variantes de X11, doivent, malheureusement, être installées au même endroit /usr/X11R6. C'est pourquoi, les paquets de Fink <code>xfree86-base</code> et <code>xfree86-rootless</code> s'installent également à cet endroit. Néanmoins, comme Fink ne supprime pas les fichiers qui ne figurent pas dans sa base de données, il ne remplace pas automatiquement une installation de X11 faite hors de Fink.</p><p></p><p>Voici comment procéder :</p><p></p><p>
          <b>Note : Les utilisateurs de 10.2.x ayant une version de Fink à jour  (&gt;=0.16.2) et les utilisateurs de 10.3.x doivent sauter l'étape 1 ci-dessous (de toute façon, elle ne fonctionne pas pour eux).</b>
        </p><p>1. Supprimez <code>system-xfree86</code>. Si vous n'avez aucun paquet qui dépend de X11, c'est tout simple. Toutefois, il est fréquent que de nombreux paquets dépendant de X11 soient installés. Dans ce cas, au lieu de tous les désinstaller, vous pouvez utiliser :</p><pre>sudo dpkg --remove --force-depends system-xfree86</pre><p>pour supprimer system-xfree86, ce qui laisse tout le reste en place. Si <code>system-xfree86</code> n'est pas installé, passez à l'étape 3.</p><p>2. Supprimez XFree86 avec :</p><pre>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</pre><p>Si vous aviez installé Apple X11 auparavant, supprimez également l'application X11.</p><p>3. Pour installer XFree86-4.2.1, installez les paquets Fink <code>xfree86-base</code> et <code>xfree86-rootless</code> comme vous le faites d'habitude : "<code>fink install</code>" pour les utilisateurs de sources, "<code>apt-get install</code>" ou <code>dselect</code> pour les utilisateurs de binaires.</p><p>- ou -</p><p>3a. Pour installer XFree86-4.3.x ou une version postérieure, installez le paquet Fink <code>xfree86</code> via "fink install xfree86". La version la plus récente (XFree86-4.4.x à la date du 25 mai 2004) n'est pas encore dans la distribution binaire et n'est disponible que dans l'arborescence instable [ voir <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">comment installer un paquet instable</a>.</p></div>
    </a>
    <a name="change-thread-nothread">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.3: Comment passer de la version sans processus légers à la version avec processus légers (ou vice-versa) ?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous avez installé la version Fink de XFree86 et que vous vouliez passer de la version sans processus légers de Fink à celle avec processus légers de Fink, vous devez supprimer l'ancienne version manuellement. Vous pouvez le faire via la ligne de commande comme ceci :</p><pre>sudo dpkg -r --force-depends xfree86-base 
sudo dpkg -r --force-depends xfree86-shlibs 
sudo dpkg -r --force-depends xfree86-rootless 
sudo dpkg -r --force-depends xfree86-rootless-shlibs</pre><p>ou pour supprimer la version avec processus légers :</p><pre>sudo dpkg -r --force-depends xfree86-base-threaded 
sudo dpkg -r --force-depends xfree86-shlibs-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs</pre><p>FinkCommander peut aussi supprimer des paquets. Dans la fenêtre "source", sélectionnez un paquet et utilisez "<code>Force Remove</code>" dans le menu <code>Source</code>.</p><p>Si vous avez installé system-xfree86, voir la précédente question pour savoir comment le supprimer.</p><p>Installez la version désirée de xfree86 :</p><p>
          <code>xfree86-base</code> et <code>xfree86-rootless</code>
        </p><p>
          <code>xfree86-base-threaded</code> et <code>xfree86-rootless-threaded</code>
        </p><p>par les méthodes habituelles : "<code>fink install</code>" pour les utilisateurs de sources, "<code>apt-get install</code>" ou <code>dselect</code> pour les utilisateurs de binaires.</p></div>
    </a>
    
    <a name="cctools">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.4: Lors de l'installation de KDE, le message suivant apparaît : 'Can't
        resolve dependency "cctools (&gt;= 446-1)"'</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ce message quelque peu abscons signifie que vous devez installer les Developer Tools de décembre 2002.</p></div>
    </a>
    
     <a name="libiconv-gettext">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.5: Impossible de mettre à jour libiconv <code>libiconv</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous voyez apparaître des messages d'erreur semblables au suivant :</p><pre>libtool: link: cannot find the library `/sw/lib/libiconv.la'</pre><p>vous pouvez résoudre le problème en exécutant :</p><pre>fink remove gettext-dev
fink install libiconv</pre></div>
    </a>
     <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=fr">8. Problème généraux d'utilisation de paquets</a></p>
<? include_once "../footer.inc"; ?>


