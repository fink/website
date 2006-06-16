<?
$title = "Q.F.P. - Compilation (1)";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/06/16 00:44:03';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="comp-packages.php?phpLang=fr" title="Problèmes de compilation de certains paquets"><link rel="prev" href="usage-fink.php?phpLang=fr" title="Installer, Utiliser et Entretenir Fink">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 6. Problèmes de compilation généraux</h1>


<a name="compiler">
<div class="question"><p><b><? echo FINK_Q ; ?>6.1: Un script configure signale qu'il ne peut trouver un "acceptable cc". De quoi s'agit-il ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Lisez la documentation avant de poser des questions. Pour compiler des paquets à partir du source, vous devez installer les Developer Tools, qui, entre autres, contiennent le compilateur C nommé <code>cc</code>.</p></div>
</a>
<a name="cvs">
<div class="question"><p><b><? echo FINK_Q ; ?>6.2: Lors de l'exécution de "fink selfupdate-cvs", le message : "cvs: Command not found." apparaît.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Vous devez installer les Developer Tools.</p></div>
</a>
<a name="missing-make">
<div class="question"><p><b><? echo FINK_Q ; ?>6.3: Un message d'erreur relatif à <code>make</code> apparaît.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si ce message est du type :</p><pre>make: command not found</pre><p>ou :</p><pre>Can't exec "make": 
No such file or directory at /sw/lib/perl5/Fink/Services.pm line 190.</pre><p>cela signifie que vous devez installer les Developer Tools.</p><p>Si, par contre, le message est du type :</p><pre>make: illegal option -- C</pre><p>cela signifie que vous avez remplacé la version GNU de l'utilitaire <code>make</code> installée par les Developer Tools par une version BSD de make. De nombreux paquets utilisent des fonctionnalités spéciales implémentées seulement dans GNU make. Vérifiez que <code>/usr/bin/make</code> est un lien symbolique vers <code>gnumake</code>, et non vers <code>bsdmake</code>. De plus, assurez-vous que <code>/usr/local/bin/</code> ne contient aucune autre copie de <code>make</code>.</p></div>
</a>
<a name="head">
<div class="question"><p><b><? echo FINK_Q ; ?>6.4: Un étrange message d'erreur concernant la commande head apparaît. Que se passe-t-il ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous voyez apparaître ce message :</p><pre>Unknown option: 1 Usage: head [-options] &lt;url&gt;...</pre><p>suivi d'une liste d'options, cela signifie que la commande <code>head</code> est défectueuse. Cela se produit lorsqu'on installe la librairie Perl libwww sur un volume système HFS+. Elle tente de créer une nouvelle commande <code>/usr/bin/HEAD</code>, qui écrase la commande <code>head</code> existante, car le système de fichiers ne respecte pas la casse. <code>head</code> est une commande standard utilisée dans de nombreux scripts shell et dans les Makefiles. Vous devez récupérer la commande <code>head</code> originale si vous voulez utiliser Fink.</p><p>Le script bootstrap de la version source de fink fait, maintenant, cette vérification ; mais vous pouvez vous retrouver devant ce problème si vous utilisez la version binaire lors de la première installation de fink ou si vous installez libwww après avoir installé Fink.</p><p>Ce problème peut aussi venir de l'installation de <code>/sw/bin/HEAD</code> (mais pas par un paquet de Fink). La solution est plus simple : renommez <code>/sw/bin/HEAD</code>.</p></div>
</a>
<a name="also_in">
<div class="question"><p><b><? echo FINK_Q ; ?>6.5: À l'installation d'un paquet, un message d'erreur signale qu'il y a tentative d'écrasement d'un fichier situé dans un autre paquet.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Cela arrive parfois avec les paquets multiples (c'est-à-dire ceux qui sont scindés en -dev, -shlibs, etc...) quand un fichier est déplacé d'un paquet à l'autre (par exemple de <code>foo</code> à <code>foo-shlibs</code>. Vous pouvez tenter d'écraser le fichier par celui présent dans le paquet (puisqu'ils sont identiques) :</p><pre>sudo dpkg -i --force-overwrite <b>filename</b>
</pre><p>où <b>filename</b> est le fichier .deb correspondant au paquet que vous êtes en train d'installer.</p></div>
</a>
<a name="weak_lib">
<div class="question"><p><b><? echo FINK_Q ; ?>6.6: Après installation des outils de développement de décembre 2002, des messages concernant des "weak libraries" apparaissent.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> C'est un problème qui est apparu avec les outils de développement de décembre 2002. Parfois, des messages semblables au suivant apparaissent (on a choisi ici libgdk-pixbuf à titre d'exemple) :</p><pre>ld: warning dynamic shared library:
/sw/lib/libgdk-pixbuf.dylib not made a weak library in output with
MACOSX_DEPLOYMENT_TARGET environment variable set to: 10.1</pre><p>Vous pouvez considérer ces messages comme inoffensifs. Si vous êtes du genre curieux, lisez les notes de mise à jour (release notes) qui se trouvent dans le répertoire de documentation du développeur, en particulier celles concernant GCC  et l'éditeur de liens, pour de plus amples informations. Cela se rapporte essentiellement à la façon dont sont considérés les symboles manquants lors de l'exécution d'applications qui utilisent des références faibles : erreur fatale ou non au lancement.</p></div>
</a>
<a name="mv-failed">
<div class="question"><p><b><? echo FINK_Q ; ?>6.7: Lors de la construction d'un paquet, le message suivant apparaît : "execution of mv failed, exit code 1"</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous avez installé StuffIt Pro, il se peut que vous ayez activé le mode "Archive Via Real Name". Recherchez un panneau de préférences Stuffit dans les préférences système et désactivez "ArchiveViaRealName" si cette option est activée. Elle contient une implémentation boguée de certains appels système importants qui entraîne un grand nombre d'erreurs étranges et passagères comme celle-ci.</p><p>Dans le cas contraire, une erreur sur <code>mv</code> signifie, en général, qu'une autre erreur s'est produite précédemment dans le processus de construction sans l'arrêter. Pour trouver le ou les fichiers concernés, recherchez dans les messages de sortie le fichier manquant. Par exemple, si vous obtenez ce message :</p><pre>mv /sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib \
/sw/src/root-foo-shlibs-0.1.2-3/sw/lib/ 
mv: cannot stat `/sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib': 
No such file or directory 
### execution of mv failed, exit code 1 
Failed: installing foo-0.1.2-3 failed</pre><p>vous devez rechercher <code>libbar</code> parmi les messages de sortie précédents du processus de construction.</p></div>
</a>
<a name="node-exists">
<div class="question"><p><b><? echo FINK_Q ; ?>6.8: Impossible d'installer ou de mettre à jour un paquet, un message indique qu'un "node" existe déjà.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ces messages d'erreurs sont similaires au message suivant :</p><pre>Failed: Internal error: node for system-xfree86 already exists</pre><p>Le moteur de dépendances ne sait plus où il en est, car il y a eu des changements dans certains fichiers info des paquets. Pour résoudre ce problème :</p><ul>
<li>
<p>Supprimez de force le paquet en cause, par exemple :</p>
<pre>sudo dpkg -r --force-all system-xfree86</pre>
<p>pour l'exemple donné ci-dessus.</p>
</li>
<li>
<p>Essayez de réinstaller ou de remettre à jour. À un moment, vous verrez apparaître un message concernant une "virtual dependency" sur le paquet que vous venez de supprimer. Sélectionnez-le et le paquet sera réinstallé pendant le processus de construction.</p>
</li>
</ul></div>
</a>
<a name="usr-local-libs">
<div class="question"><p><b><? echo FINK_Q ; ?>6.9: Problèmes de compilation de paquet Fink quand des librairies ou des headers sont installés dans /usr/local</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> C'est une source fréquente de problèmes, car le script de configuration du paquet trouve les librairies et les headers installés dans <code>/usr/local</code> avant ceux installés dans l'arborescence de Fink. Si vous rencontrez des problèmes lors de la construction d'un paquet, et que vous ne trouvez pas de solution à ce problème dans les QFP, regardez si vous avez des librairies installées dans <code>/usr/local/lib</code> ou des headers installés dans <code>/usr/local/include</code>. Si c'est le cas, déplacez temporairement <code>/usr/local</code> :</p><pre>sudo mv /usr/local /usr/local.moved</pre><p>construisez le paquet, puis remettez en place <code>/usr/local</code> :</p><pre>sudo mv /usr/local.moved /usr/local</pre></div>
</a>
<a name="toc-out-of-date">
<div class="question"><p><b><? echo FINK_Q ; ?>6.10: Lors de la construction d'un paquet, un message indique que "table of contents" n'est pas à jour (out of date).</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Le message de sortie vous indique ce qu'il faut faire. En général, il est de la forme suivante :</p><pre>ld: table of contents for archive: 
/sw/lib/libintl.a is out of date; 
rerun ranlib(1) (can't load from it)</pre><p>Vous devez exécuter ranlib (en tant que super-utilisateur) sur la librairie qui est la cause du problème. Par exemple, dans le cas ci-dessus, vous devez exécuter :</p><pre>sudo ranlib /sw/lib/libintl.a</pre></div>
</a>
<a name="fc-atlas">
<div class="question"><p><b><? echo FINK_Q ; ?>6.11: Fink Commander se bloque quand on tente d'installer atlas.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ceci provient du fait qu'une des étapes de la compilation du paquet <code>atlas</code> envoie une invite à l'utilisateur et que Fink Commander ne l'affiche pas. Vous devez utiliser <code>fink install atlas</code> au lieu de passer par Fink Commander.</p></div>
</a>
<a name="basic-headers">
<div class="question"><p><b><? echo FINK_Q ; ?>6.12: Un message indique qu'il est impossible de trouver <code>stddef.h</code>,  ou <code>wchar.h</code>, ou <code>crt1.o</code>, ou bien encore que le "compilateur C ne peut créer des fichiers exécutables" (C compiler cannot create executables en anglais).</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ces problèmes sont dus, généralement, à l'absence de headers essentiels fournis par le paquet DevSDK des Outils de Développement (Developer Tools). Vérifiez que le répertoire <code>/Library/Receipts/DevSDK.pkg</code> existe dans votre système. Si ce n'est pas le cas, relancez l'installeur des Outils de Développement et installez le paquet DevSDK en choisissant Custom Install.</p><p>Le message d'erreur "impossible de créer des fichiers exécutables" peut aussi être généré lorsque la version des Outils de Développement installée provient d'une version antérieure du système d'exploitation.</p></div>
</a>
<a name="multiple-dependencies">
<div class="question"><p><b><? echo FINK_Q ; ?>6.13: Impossible de mettre à jour, un message indique que Fink est "unable to resolve version conflict on multiple dependencies".</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Pour résoudre ce problème, essayez de ne mettre à jour qu'un seul paquet, puis lancez de nouveau "fink update-all". Si le message réapparaît, répétez le processus.</p></div>
</a>
<a name="dpkg-parse-error">
<div class="question"><p><b><? echo FINK_Q ; ?>6.14: Impossible d'installer quoi que ce soit, le message suivant apparaît : "dpkg: parse error, in file `/sw/var/lib/dpkg/status'"</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Cela signifie que votre base de données dpkg a été corrompue, en général à la suite d'un plantage ou d'une autre erreur irrécupérable. Vous pouvez résoudre le problème en copiant la version précédente de la base de données :</p><pre>sudo cp /sw/var/lib/dpkg/status-old /sw/var/lib/dpkg/status</pre><p>Il se peut que vous deviez réinstaller les derniers paquets installés juste avant que le problème n'apparaisse.</p></div>
</a>
<a name="freetype-problems">
<div class="question"><p><b><? echo FINK_Q ; ?>6.15: Messages d'erreurs concernant freetype.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Il y a plusieurs types d'erreurs concernant freetype. Si le message d'erreur ressemble au suivant : </p><pre>/sw/include/pango-1.0/pango/pangoft2.h:52: 
error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:57:
error: parse error before '*' token
/sw/include/pango-1.0/pango/pangoft2.h:61: 
error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:86: 
error: parse error before "pango_ft2_font_get_face"
/sw/include/pango-1.0/pango/pangoft2.h:86: 
warning: data definition has no type or storage class 
make[2]: *** [rsvg-gz.lo] Error 1
make[1]: *** [all-recursive] Error 1 
make: *** [all-recursive-am] Error 2 
### execution of make failed, exit code 2 
Failed: compiling librsvg2-2.4.0-3 failed</pre><p>ou à celui-ci :</p><pre>In file included from vteft2.c:32: 
vteglyph.h:64: error:
parse error before "FT_Library" 
vteglyph.h:64: warning: 
no semicolon at end of struct or union vteft2.c: 
In function `_vte_ft2_get_text_width': 
vteft2.c:236: error: 
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_get_text_height':
vteft2.c:244: error: 
dereferencing pointer to incomplete type
vteft2.c: In function `_vte_ft2_get_text_ascent': 
vteft2.c:252: error:
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_draw_text': 
vteft2.c:294: error: 
dereferencing pointer to incomplete type 
vteft2.c:295: error: 
dereferencing pointer to incomplete type
make[2]: *** [vteft2.lo] Error 1 
make[1]: *** [all-recursive] Error 1 
make: *** [all] Error 2 
### execution of make failed, exit code 2
Failed: compiling vte-0.11.10-3 failed</pre><p>ou encore à celui-là :</p><pre>checking for freetype-config.../usr/X11R6/bin/freetype-config 
checking For sufficiently new FreeType (at least 2.0.1)... no 
configure: error: pangoxft 
Pango backend found but did not find freetype libraries 
make: *** No targets specified and no makefile found. Stop. 
### execution of LD_TWOLEVEL_NAMESPACE=1 failed, exit code 2 
Failed: compiling gtk+2-2.2.4-2 failed</pre><p>le problème est dû à une confusion entre les headers des paquets <code>freetype</code> ou de <code>freetype-hinting</code> et les headers <code>freetype2</code> qui sont inclus dans X11 ou dans XFree86.</p><pre>fink remove freetype freetype-hinting</pre><p>supprime la variante que vous avez installée. À contrario, si le message d'erreur est similaire à celui-ci :</p><pre>ld: Undefined symbols: _FT_Access_Frame</pre><p>cela est dû à la présence d'un fichier résultant d'une installation précédente de X11. Réinstallez X11 SDK. Enfin, si le message d'erreur, ressemble à celui-là :</p><pre>dyld: klines Undefined symbols: /sw/lib/libqt-mt.3.dylib 
undefined reference to _FT_Access_Frame</pre><p>vous êtes probablement en présence d'une version binaire qui compile correctement avec <code>gcc3.3</code> sous Jaguar, mais pas sous Panther. Ce problème a été résolu, il suffit que vous mettiez à jour vos paquets, par exemple via <code>sudo apt-get update ; sudo apt-get dist-upgrade</code>.</p></div>
</a>
<a name="dlfcn-from-oo">
<div class="question"><p><b><? echo FINK_Q ; ?>6.16: Messages d'erreur concernant `Dl_info'.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous avez des messages d'erreur similaire à celui-ci :</p><pre>unix_dl.c: In function `rep_open_dl_library':
unix_dl.c:328: warning: assignment discards qualifiers from \
pointer target type 
unix_dl.c: In function `rep_find_c_symbol': 
unix_dl.c:466: error: `Dl_info' undeclared (first use in this \
function)
unix_dl.c:466: error: (Each undeclared identifier is reported \
only once 
unix_dl.c:466: error: for each function it appears in.)
unix_dl.c:466: error: parse error before "info" 
unix_dl.c:467: error: `info' undeclared (first use in this function) 
make[1]: *** [unix_dl.lo] Error 1</pre><p>vous avez certainement un header <code>/usr/local/include/dlfcn.h</code>, incompatible avec Panther. Déplacez-le.</p><p><b>Note</b> : les barres obliques inversées ont été rajoutées uniquement pour des raisons de formatage.</p><p>Ce header est, en général, installé par Open Office, et vous devez le remplacer, de même que la librairie <code>/usr/local/lib/libdl.dylib</code>, par des liens symboliques vers les fichiers inclus dans Panther :</p><pre>sudo ln -s /usr/include/dlfcn.h /usr/local/include/dlfcn.h
sudo ln -s /usr/lib/libdl.dylib /usr/local/lib/libdl.dylib</pre></div>
</a>
<a name="gcc2">
<div class="question"><p><b><? echo FINK_Q ; ?>6.17: Fink signale que <code>gcc2</code> ou <code>gcc3.1</code> n'existe pas, mais il ne semble pas possible de les installer.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> <code>gcc2</code> et <code>gcc3.1</code> sont des  paquets virtuels qui indiquent la présence de gcc-2.95 ou de gcc3.1 dans votre système. Installez les paquets gcc2.95 ou gcc3.1 à partir de XCode Tools (les versions précédentes du système opératoire inclut gcc-2.95 dans l'installation standard des Developer Tools).</p><p><b>Note : </b>L'installation de gcc2.95 et / ou de  gcc3.1 n'interfère pas avec le compilateur gcc3.3. Ils peuvent coexister.</p></div>
</a>
<a name="system-java">
<div class="question"><p><b><? echo FINK_Q ; ?>6.18: Fink signale <code>Failed: Can't resolve dependency "system-java14-dev"</code>, mais il n'existe pas de paquet system-java14-dev.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ce paquet est un paquet virtuel. Ce type d'erreur apparaît quand Java est mis à jour via Mise à jour de Logiciels : les headers sont supprimés, ce que empêche la création du paquet -dev.</p><p>Vous devez télécharger le paquet approprié des <code>Java Developer Tools</code> à partir du site <a href="http://connect.apple.com">Apple</a>. Dans le cas ci-dessus, il s'agit du paquet <code>Java 1.4.2 Developer Tools</code>.</p></div>
</a>
<a name="dpkg-split">
<div class="question"><p><b><? echo FINK_Q ; ?>6.19: Lors de l'installation d'un paquet, le message d'erreur suivant apparaît : <q>dpkg (subprocess): failed to exec dpkg-split to see if it's part of a multiparter: No such file or directory</q>.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ce problème se résout, en général, par la définition correcte de votre environnement, cf. <a href="usage-fink.php?phpLang=fr#fink-not-found">cette partie des QFP</a>.</p></div>
</a>
<a name="xml-parser">
<div class="question"><p><b><? echo FINK_Q ; ?>6.20: Le message d'erreur suivant apparaît : <q>configure: error: XML::Parser perl module is required for intltool</q>. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si vous utilisez l'arbre instable, you devez installer une version de intltool supérieure ou égale à la version 0.34.1.</p><p>Sinon, vous devez vérifier que vous avez la variante du paquet qui correspond à la version de Perl installée dans votre système. Par exemple, sous Panther, vous devez avoir <code>xml-parser-pm581</code> et non pas <code>xml-parser-pm560</code> (il se peut que vous ayez le paquet fantôme <code>xml-parser-pm</code>), car, dans votre système est installé <code>Perl-5.8.1</code> et non pas <code>Perl-5.6.0</code>. Sous Jaguar, vous devez avoir la variante <code>pm560</code> si vous utilisez la version système de Perl; si vous avez installé <code>Perl 5.8.0</code>, vous devez avoir la variante <code>pm580</code>.</p></div>
</a>
<a name="master-problems">
<div class="question"><p><b><? echo FINK_Q ; ?>6.21: Lors du téléchargement d'un paquet, Fink tente de le faire à partir d'un site dont le nom contient <q>distfiles</q> et ne trouve pas le fichier.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Fink tente d'utiliser l'un de ses sites <q>Maîtres</q>. Ils servent à garantir que les sources des paquets de Fink sont disponibles même lorsque le site original a changé d'adresse. Cette erreur apparaît lorsqu'une nouvelle version d'un paquet est publiée, mais que les miroirs maîtres n'ont pas encore eu le temps de la prendre en compte.</p><p>Pour pallier cela, exécutez <code>fink configure</code> et changez l'ordre de recherche de telle sorte que les miroirs maîtres soient utilisés en dernier.</p></div>
</a>
<a name="compile-options">
<div class="question"><p><b><? echo FINK_Q ; ?>6.22: Comment utiliser des options variables lors de la compilation d'un paquet.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> La première chose à faire est de contacter le mainteneur du paquet pour lui demander d'introduire une variante dans le paquet. Cela peut être relativement facile à faire. Si le mainteneur ne vous répond pas ou si vous ne voyez pas apparaître de nouveaux paquets correspondant à votre demande, ou que vous vouliez essayer de faire le changement vous-même, étudiez le <a href="http://fink.sourceforge.net/doc/quick-start-pkg/index.php">Tutoriel d'empaquetage</a> et le <a href="http://fink.sourceforge.net/doc/packaging/index.php">Guide de construction de paquets</a>.</p><p><b>Note :</b> Fink est volontairement initialisé de telle façon que tous les paquets binaires officiels soient identiques quelle que soit la machine sur laquelle ils sont construits. C'est ainsi qu'il n'y aura jamais d'optimisation pour le G5 dans un paquet officiel. Si vous voulez ce type d'option, il vous faudra le faire vous-même.</p></div>
</a>
<a name="gettext">
<div class="question"><p><b><? echo FINK_Q ; ?>6.23: Lors de compilation à partir du source, Fink n'arrête pas de passer de  <code>gettext-dev</code> à <code>libgettext3-dev</code>.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Certains paquets utilisant les headers <code>gettext</code> lors de leur compilation ont été mis à jour pour utiliser <code>libgettext3-dev</code>, tandis que d'autres utilisent toujours <code>gettext-dev</code>. En conséquence, il se peut que Fink essaie d'installer le header non-présent pour satisfaire une dépendance de compilation d'un paquet que vous mettez à jour. De plus,  l'outil <code>fink </code> considère <code>gettext-dev</code> comme un paquet essentiel et l'installe donc chaque fois que vous faites une mise à jour.</p><p>D'autres paires de paquets génèrent un effet similaire.</p><p>En raison des limitations du moteur de dépendances de compilation, il est malheureusement possible qu'une compilation échoue pour cause de changement de header dans l'un des paquets, alors qu'un autre paquet, plus loin dans la chaîne de compilation, exige précisément celui qui a été remplacé. On peut généralement résoudre le problème en réexécutant la commande de mise à jour.</p><p>Au pire, on peut avoir à installer séparément les paquets qui dépendent de <code>gettext-dev</code> de ceux qui dépendent de <code>libgettext3-dev</code> (ou de toute autre paire de headers qui fait problème). En dernier ressort, on installe les paquets un par un.</p><p>On espère qu'une solution définitive sera disponible dans la version <code>0.24.9</code> de fink.</p></div>
</a>
<a name="python-mods">
<div class="question"><p><b><? echo FINK_Q ; ?>6.24: Un message d'erreur comportant <code>MACOSX_DEPLOYMENT_TARGET </code> apparaît lors de la compilation d'un module Python.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Si le message ressemble au suivant :</p><pre>running build
running build_ext
Traceback (most recent call last):
  File "setup_socket_ssl.py", line 21, in ?
    depends = ['socketmodule.h'] )
  File "/sw/src/root-python24-2.4.1-1/sw/lib/python2.4/distutils/core.py", line 166, in setup
SystemExit: error: $MACOSX_DEPLOYMENT_TARGET mismatch: now "10.4" but "10.3" during configure
### execution of /sw/bin/python2.4 failed, exit code 1</pre><p>le problème apparaît parce que les paquets <code>python2*</code> notent la valeur en cours de <code>MACOSX_DEPLOYMENT_TARGET</code> dans un fichier de configuration lors de leur compilation. Les outils de compilation de python utilisent ensuite cette valeur lorsqu'ils compilent des modules. Par exemple, si avez sous Mac OS X 10.4 un paquet <code>python24</code> qui a été compilé sous Mac OS X 10.3, soit par mise à jour 10.3 =&gt; 10.4, ou via la distribution binaire <b>10.4-transitionelle</b>, et qui n'a pas été recompilé, il y aura divergence entre la valeur de <code>MACOSX_DEPLOYMENT_TARGET</code> stockée dans le fichier de configuration de python (10.3) et sa valeur réelle (10.4).</p><p>La solution de ce problème consiste à recompiler le paquet <code>python</code> en cause ; dans notre exemple, <code>fink rebuild python24</code>.</p><p>Si vous obtenez le même genre d'erreur au runtime, recompilez le module après avoir recompilé le paquet <code>python2*</code> concerné.</p></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="comp-packages.php?phpLang=fr">7. Problèmes de compilation de certains paquets</a></p>
<? include_once "../footer.inc"; ?>


