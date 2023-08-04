<?php
$title = "Portage - libtool";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Portage Contents"><link rel="next" href="preparing-10.2.php?phpLang=fr" title="Préparation pour la version 10.2"><link rel="prev" href="shared.php?phpLang=fr" title="Code partagé">';


include_once "header.fr.inc";
?>
<h1>Portage - 3. GNU libtool</h1>



<p>Les paquets GNU qui construisent des librairies utilisent GNU libtool pour masquer les procédures de construction et d'installation de librairie dépendantes des plate-formes.</p>

<h2><a name="situation">3.1 État des lieux</a></h2>
<p>Grosso modo, on trouve quatre variantes de libtool :</p>
<ul>
<li><p><b>libtool 1.3</b> : la plus courante. La dernière version de cette branche est la 1.3.5. Elle ignore Darwin et ne construit que des librairies statiques. On la reconnaît à la présence des fichiers <code>ltconfig</code> et <code>ltmain.sh</code> dans l'arborescence du source.</p></li>
<li><p><b>libtool 1.4</b> : longtemps en chantier et récemment publiée en tant que nouvelle version stable, cette branche intègre mieux autoconf. Malheureusement, cela rend difficile la migration des paquets qui utilisent la version 1.3. Elle gère Darwin 1.3 / Mac OS X 10.0 sans problème et nécessite une petite rustine pour fonctionner avec Mac OS X 10.1. Elle se distingue par l'absence de <code>ltconfig</code>. Les versions 1.3b et 1.3d sont des versions de développement de la branche 1.4 et doivent être utilisées avec prudence.</p></li>
<li><p><b>Les branches multilangages</b> : aussi appelée MLB, cette version de libtool était dans une branche de développement parallèle et gérait C++ et Java (via gcj). Elle est maintenant intégrée dans la branche de développement principale. Les versions récentes gèrent Darwin 1.3 et Mac OS X 10.0 sans modification. La MLB se reconnaît à la présence des fichiers <code>ltcf-c.sh</code>, <code>ltcf-cxx.sh</code> et <code>ltcf-gcj.sh</code>.</p></li>
<li><p><b>La branche de développement actuelle</b> : c'est la version de développement qui sera un jour publiée en tant que libtool 1.5. Elle résulte de la fusion de la version 1.4 et de la MLB. Elle gère C, C++ et Java (via gcj). Malheureusement, il est difficile de la distinguer de la version 1.4, vous devez tester le numéro de version dans <code>ltmain.sh</code>.</p></li>
</ul>
<p>En conclusion, libtool 1.3.x et les paquets qui l'utilisent (c'est le cas de la majorité des paquets utilisant libtool) nécessitent une rustine pour construire des librairies partagées sur Darwin. Apple inclut une version modifiée de libtool 1.3.5 dans Mac OS X, mais, dans la plupart des cas, elle ne fonctionne pas correctement. Christoph Pfisterer a amélioré cette version modifiée pour coder en dur le chemin correct et utiliser le numéro de version complet. Les changements ont été incorporés en amont dans les versions définitives et les versions de développement à partir de la version 1.4. Les membres de l'équipe Fink continuent à réaliser des améliorations et à les faire parvenir aux mainteneurs de libtool. Le modèle de numérotation des versions est compatible pour toutes les versions de libtool.</p>
<p>Note subsidiaire : la librairie libltdl, incluse dans toutes les versions de libtool, ne fonctionne sur Darwin que si dlcompat est installé. Elle est incluse dans Mac OS X à partir de la version 10.3. Pour les versions antérieures, on peut installer la famille de paquets "dlcompat"</p>

<h2><a name="patch-135">3.2 Rustine 1.3.5</a></h2>
<p>Si vous construisez vous-même la version 1.3.5, vous devrez appliquer cette <a href="/files/libtool-1.3.5-darwin.patch">rustine</a> <b>[mise à jour du 09/06/2002]</b> au source de libtool 1.3.5, puis supprimer les fichiers <code>ltconfig</code> et <code>ltmain.sh</code>. (Ils seront recréés à partir des fichiers .in adéquats lorsque vous lancerez configure et make). Ceci est fait automatiquement, d'ailleurs, dans le paquet actuel libtool 1.3.5 de Fink.</p>
<p>Mais ce n'est que la moitié du travail - chaque paquet utilisant libtool contient ses propres copies de <code>ltconfig</code> et <code>ltmain.sh</code>. Si bien que vous devez les remplacer dans chaque paquet que vous voulez construire en tant que librairie partagée. Notez que vous devez le faire avant de lancer le script configure. Vous pouvez récupérer les deux fichiers ici : <a href="/files/ltconfig">ltconfig</a> (98 ko) et <a href="/files/ltmain.sh">ltmain.sh</a> (110 ko) <b>[tous deux mis à jour au 09/06/2002]</b>.</p>

<h2><a name="fixing-14x">3.3 Adaptation de la version 1.4.x</a></h2>
<p>Il y a au moins trois versions différentes de libtool 1.4.x en usage à l'heure actuelle (1.4.1, 1.4.2, ainsi que des versions de développement plus récentes). Elles posent toutes problème avec Darwin, cependant les modifications à effectuer diffèrent selon la version. Le paquet "libtool 1.4" fourni via Fink possèdent déjà toutes les rustines nécessaires. Cependant, il vous faudra encore modifier vous-même les fichiers <code>ltmain.sh</code> et <code>configure</code> des paquets concernés pour qu'ils fonctionnent correctement.</p>
<ol>
<li>
<b>Le bogue du flat_namespace</b> : ce problème ne survient que si vous utilisez libtool sur Mac OS X10.1 ou une version plus récente. Dans ce cas, libtool tente d'utiliser l'option <code>-undefined suppress</code> pour autoriser les symboles non définis, mais ne spécifie pas, en même temps, l'option <code>-flat_namespace</code>. À partir de la version 10.1, cela ne fonctionne plus. La rustine à appliquer est de la forme :
<pre>
diff -Naur gdk-pixbuf-0.16.0.old/configure gdk-pixbuf-0.16.0.new/configure
--- gdk-pixbuf-0.16.0.old/configure	Wed Jan 23 10:11:48 2002
+++ gdk-pixbuf-0.16.0.new/configure	Thu Jan 31 03:19:54 2002
@@ -3334,7 +3334,7 @@
 ;;
 
 darwin* | rhapsody*)
-    allow_undefined_flag='-undefined suppress'
+    allow_undefined_flag='-flat_namespace -undefined suppress'
 # FIXME: Relying on posixy $() will cause problems for
 #        cross-compilation, but unfortunately the echo tests do not
 #        yet detect zsh echo's removal of \ escapes.
</pre>
</li>
<li>
<b>Le bogue du module chargeable</b> : ce bogue est provoqué par le comportement non-standard de zsh (qui est le shell par défaut dans les versions 10.0 et 10.1 ; à partir de la version 10.2, il est remplacé par bash). Le comportement non standard de zsh en matière d'utilisation des guillemets empêche de construire correctement des modules chargeables ; ce sont des librairies qui sont construites à la place (et, à la différence de ce qui se passe sur Linux, ce sont des choses réellement différentes sur Darwin). La rustine à appliquer pour résoudre ce problème ( tronquée, donc inutilisable sans modification) est de la forme :
<pre>
diff -Naur gnome-core-1.4.0.6.old/configure gnome-core-1.4.0.6.new/configure
--- gnome-core-1.4.0.6.old/configure	Sun Jan 27 08:19:48 2002
+++ gnome-core-1.4.0.6.new/configure	Fri Feb  8 01:10:21 2002
@@ -4020,7 +4020,7 @@
 # FIXME: Relying on posixy $() will cause problems for
 #        cross-compilation, but unfortunately the echo tests do not
 #        yet detect zsh echo's removal of \ escapes.
-    archive_cmds='$nonopt $(test "x$module" = xyes &amp;&amp; echo -bundle || echo -dynamiclib) ...'
+    archive_cmds='$nonopt $(test x$module = xyes &amp;&amp; echo -bundle || echo -dynamiclib) ...'
 # We need to add '_' to the symbols in $export_symbols first
 #archive_expsym_cmds="$archive_cmds"' &amp;&amp; strip -s $export_symbols'
 hardcode_direct=yes
</pre>
<p>Ce problème est résolu dans certaines versions de libtool postérieures à la 1.4.2.</p>
</li>
<li>
<b>Le bogue d'accès aux librairies utilitaires</b> : dans certains cas, libtool n'arrive pas à faire l'édition de liens avec les librairies utilitaires. Il génère alors des messages d'erreur "multiple definitions". Il semble que ceci soit causé par un problème plus fondamental dans libtool. Pour l'instant vous pouvez utiliser ce palliatif (qui supprime les symptômes mais non le problème, bien qu'il soit efficace). Merci à Dave Vasilevsky :
<pre>
--- ltmain.sh.old       2002-04-27 00:01:23.000000000 -0400
+++ ltmain.sh   2002-04-27 00:01:45.000000000 -0400
@@ -2894,7 +2894,18 @@
if test -n "$export_symbols" &amp;&amp; test -n "$archive_expsym_cmds"; then
eval cmds=\"$archive_expsym_cmds\"
else
+         save_deplibs="$deplibs"
+         for conv in $convenience; do
+       tmp_deplibs=
+       for test_deplib in $deplibs; do
+         if test "$test_deplib" != "$conv"; then
+           tmp_deplibs="$tmp_deplibs $test_deplib"
+         fi
+       done
+       deplibs="$tmp_deplibs"
+         done
eval cmds=\"$archive_cmds\"
+         deplibs="$save_deplibs"
fi
save_ifs="$IFS"; IFS='~'
for cmd in $cmds; do
</pre>
</li>
<li>
<b>Le bogue DESTDIR</b> : certains paquets, qui définissent DESTDIR et utilisent libtool 1.4.2, ont des problèmes de réédition de liens. On trouvera une discussion sur ces problèmes dans les messages ci-dessous :
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html</a></p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html</a></p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html</a>,</p>
<p>et la rustine pour résoudre ce problème est le sujet de ces messages :</p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html</a>.</p>
</li>
</ol>

<h2><a name="notes">3.4 Notes supplémentaires</a></h2>
<p>Pour plus d'informations sur libtool lui-même et ce qu'il fait, consultez <a href="http://www.gnu.org/software/libtool/libtool.html">la page de libtool</a>.</p>
<p>Note subsidiaire : les Developer Tools d'Apple contiennent un programme appelé, lui aussi, libtool, qui est utilisé par le compilateur pour construire des librairies partagées.
Cependant, cet outil n'a rien à voir avec GNU libtool. L'outil GNU libtool qu'Apple fournit est installé sous le nom de <code>glibtool</code>. Ceci peut être réalisé en configurant GNU libtool avec <code>--program-transform-name=s/libtool/glibtool/</code>.</p>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="preparing-10.2.php?phpLang=fr">4. Préparation pour la version 10.2</a></p>
<?php include_once "../../footer.inc"; ?>


