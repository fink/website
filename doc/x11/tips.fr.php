<?
$title = "Utilisation de X11 - Conseils";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2005/06/10 01:56:44';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Utilisation de X11 Contents"><link rel="prev" href="trouble.php?phpLang=fr" title="Résolution de problèmes engendrés par XFree86">';


include_once "header.fr.inc";
?>
<h1>Utilisation de X11 - 8. Conseils d'utilisation</h1>


<h2><a name="terminal-app">8.1 Lancement d'applications X11 à partir de Terminal.app</a></h2>

<p>Pour lancer des applications X11 à partir d'une fenêtre de Terminal.app, vous devez initialiser la variable d'environnement "DISPLAY". Cette variable indique aux applications l'emplacement du serveur de fenêtre X11. Quand XDarwin tourne sur la même machine que le serveur, vous pouvez initialiser cette variable de la façon suivante :</p>
<ul>
<li><p>Pour les utilisateurs de tcsh :</p>
<pre>setenv DISPLAY :0.0</pre>
</li>
<li><p>Pour les utilisateur de bash :</p>
<pre>export DISPLAY=":0.0"</pre>
</li>
</ul>
<p>Il est intéressant d'avoir une configuration qui lance XDarwin.app au démarrage (à indiquer dans les Préférences système, panneau Éléments d'ouverture sur Mac OS 10.2, panneau Comptes, Démarrage sur Mac OS 10.3):</p>
<ul><li><p>Pour les utilisateurs de tcsh, ajoutez les lignes suivantes à votre fichier .cshrc :</p>
<pre>if (! $?DISPLAY) then
setenv DISPLAY :0.0
endif</pre>
</li>
<li><p>Pour les utilisateurs de bash, ajoutez les lignes suivantes à votre fichier .bashrc :</p>
<pre>[[ -z $DISPLAY ]] &amp;&amp; export DISPLAY=":0.0"</pre>
</li></ul>
<p>Ces lignes initialisent automatiquement la variable DISPLAY dans tout shell ouvert, mais ne modifient pas sa valeur si elle est déjà initialisée. De cette manière, vous pouvez continuer à exécuter des applications X11 à distance ou via ssh par un tunnel X11.</p>

<h2><a name="open">8.2 Lancement d'applications Aqua à partir d'un xterm</a></h2>

<p>Pour lancer des applications Aqua à partir d'un xterm (ou de n'importe quel autre shell), vous pouvez utiliser la commande <code>open</code>. Exemples :</p>
<pre>open /Applications/TextEdit.app
open SomeDocument.rtf
open -a /Applications/TextEdit.app index.html</pre>
<p>Le second exemple ouvre le document dans l'application qui lui est associée, le troisième exemple indique explicitement l'application à utiliser.</p>

<h2><a name="copy-n-paste">8.3 Copier-coller</a></h2>

<p>Le copier-coller fonctionne, en général, entre les environnements Aqua et X11. Il reste quelques bogues. Emacs est particulièrement sensible à la sélection en cours. Le copier-coller entre Classic et X11 ne fonctionne pas.</p>
<p>Ce qui est important est d'utiliser la bonne méthode selon l'environnement dans lequel vous êtes. Pour transférer du texte de Aqua vers X11, utilisez Cmd-C dans Aqua, faites venir la fenêtre de destination au premier-plan et utilisez le "bouton central de la souris", ou Alt-clic avec une souris à un bouton (vous pouvez configurer cette action dans les Préférences de XDarwin) pour coller. Pour transférer du texte de X11 vers Aqua, sélectionnez le texte avec la souris dans X11, puis utilisez Cmd-V dans Aqua pour le coller.</p>
<p>En fait, le système X11 possède plusieurs presse-papiers distincts (appelés  "buffers de coupe" dans la terminologie X11) et certaines applications ont des idées bien arrêtées sur celui qu'elle doivent utiliser. C'est ainsi que le collage dans GNU Emacs ou XEmacs ne fonctionne pas toujours bien. Le programme <code>autocutsel</code> permet d'améliorer les choses ; il synchronise automatiquement les deux buffers de coupe principaux. Pour l'exécuter, installez le paquet Fink autocutsel et ajoutez la ligne suivante à votre fichier .xinitrc :</p>
<pre>autocutsel &amp;</pre>
<p>(Assurez-vous que cette ligne est placée <b>avant</b> la ligne d'exécution du gestionnaire de fenêtres et qu'elle tourne en arrière-plan. Ne l'ajoutez pas à la fin, elle ne serait jamais exécutée). Et rappelez-vous que ce paquet n'est plus nécessaire avec X11 d'Apple (voir <a href="inst-xfree86.php?phpLang=fr#apple-binary">Notes au sujet de l'utilisation de X11 d'Apple</a>).</p>
<p>Si vous utilisez X11 d'Apple, vous pouvez utilisez Cmd-C ou Édition-&gt;Copier, comme pour les applications Mac, pour copier du texte dans le presse-papiers, et le bouton central de la souris ou Cmd-V pour coller le texte dans X11.</p>
<p>Dans tous les cas de figure, si vous avez des difficultés à copier-coller du texte d'Aqua dans X11 ou vice-versa, vous pouvez tout d'abord réitérer l'action coller (il arrive qu'elle ne soit pas exécutée la première fois), ensuite vous pouvez utiliser des applications intermédiaires, par exemple TextEdit ou Terminal.app sous Aqua, nedit ou un xterm sous X11. Il y a toujours une solution à ce problème.</p>


<? include_once "../../footer.inc"; ?>


