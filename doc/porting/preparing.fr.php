<?
$title = "Portage - Préparation pour 10.2";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/04/26 04:20:57';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Portage Contents"><link rel="prev" href="libtool.php?phpLang=fr" title="GNU libtool">';


include_once "header.fr.inc";
?>
<h1>Portage - 4. Préparation pour la version 10.2</h1>




<h2><a name="bash">4.1 Shell bash</a></h2>
<p>
Fink a fait la transition de OS X 10.0 à OS X 10.1 facilement, et cela, en partie, grâce
à la planification des changements à faire. Nous essayerons de faire de même
pour la prochaine transition, mais peu de détails nous sont connus pour l'instant.
</p>
<p> Nous savons que OS X 10.2 utilisera bash au lieu de zsh dans le but de fournir la fonctionnalité
<code>/bin/sh</code>. Ceci a au moins trois conséquences pour Fink.
</p>
<ul><li>
Dans le passé, certains paquets de Fink créaient un CompileScript (ou un PatchScript, 
ou un InstallScript) qui ne faisait rien, simplement en mettant un point virgule dans le script. 
Ceci ne fonctionne pas avec bash et doit être remplacé par :
<pre>
  CompileScript: echo "nothing to do"
</pre>
</li>
<li>
Dans le passé, certains paquets de Fink utilisaient la construction <code>lib(foo|bar).dylib</code>
pour faire référence à deux librairies simultanément ; ceci ne fonctionne pas avec bash (et l'alternative
<code>lib{foo,bar}.dylib</code> ne fonctionne pas avec zsh). La solution : écrire les noms intégralement.
</li>
<li>
Avec bash, une rustine de libtool est nécessaire dans de nombreux cas, pour éviter 
que les librairies ne soient construites sans numéro de version.  
<b> Note : vous n'avez pas besoin de cette rustine avec libtool-1.3.5, par exemple,
si vous utilisez
UpdateLibtool: True. </b>
Le symptome : quand vous construisez sous bash,
vous voyez
<pre>
../libtool: test: too many arguments
</pre>
Quand cela arrive, <code>configure</code> contient ce qui suit :
<pre>
archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $(test -n "$verstring" -a x$verstring != 
x0.0 &amp;&amp; echo $verstring)'
</pre>
Voici une rustine (mais elle doit être appliquée avec précaution, car quelquefois
il y a aussi d'autres problèmes avec libtool, si bien que cette rustine doit être appliquée à la main):
<pre>
diff -Naur gdk-pixbuf-0.16.0/configure gp-new/configure
--- gdk-pixbuf-0.16.0/configure 2002-01-22 20:11:48.000000000 -0500
+++ gp-new/configure    2002-05-10 03:02:44.000000000 -0400
@@ -3338,7 +3338,7 @@
      # FIXME: Relying on posixy $() will cause problems for
      #        cross-compilation, but unfortunately the echo tests do not
      #        yet detect zsh echo's removal of \ escapes.
-    archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $(test -n "$verstring" -a x$verstring != 
x0.0 &amp;&amp; echo $verstring)'
+    archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $tmp_verstring'
      # We need to add '_' to the symbols in $export_symbols first
      #archive_expsym_cmds="$archive_cmds"' &amp;&amp; strip -s $export_symbols'
      hardcode_direct=yes
diff -Naur gdk-pixbuf-0.16.0/ltmain.sh gp-new/ltmain.sh
--- gdk-pixbuf-0.16.0/ltmain.sh 2002-01-22 20:11:43.000000000 -0500
+++ gp-new/ltmain.sh    2002-05-10 03:04:49.000000000 -0400
@@ -2862,6 +2862,11 @@
        if test -n "$export_symbols" &amp;&amp; test -n "$archive_expsym_cmds";
	then
          eval cmds=\"$archive_expsym_cmds\"
        else
+         if test "x$verstring" = "x0.0"; then
+           tmp_verstring=
+         else
+           tmp_verstring="$verstring"
+         fi
          eval cmds=\"$archive_cmds\"
        fi
        IFS="${IFS=     }"; save_ifs="$IFS"; IFS='~'
</pre>
</li>
</ul>

<h2><a name="gcc3">4.2 Compilateur gcc3</a></h2>

	<p>Mac OS X 10.2 utilise le compilateur gcc3.</p>
	
	<p>Certains paquets qui ont des modules chargeables et qui 
	utilisent libtool échouent avec une erreur install_name, car
	libtool passe le drapeau -install_name même avec le drapeau -bundle
	(alors que cela n'est pas strictement nécessaire). 
	Ce comportement était accepté par le compilateur gcc2 mais n'est plus accepté maintenant
	par le compilateur gcc3. Vous trouverez la rustine <a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02025.html">ici</a>.
	Notez que vous n'avez pas besoin de cette rustine si votre paquet utilise libtool-1.3.5
	(par exemple, si vous utilisez <code>UpdateLibtool: True</code>)
	puisque elle a déjà été insérée dans une version révisée du fichier ltconfig  
	(accessible dans des préversions de fink).
</p>

<p>Un autre problème avec le compilateur gcc3 est l'incompatibilité pour les ABI C++
entre gcc2 et gcc3.  En pratique, ceci signifie que les programmes C++ compilés avec gcc3
ne peuvent être liés à des librairies compilées avec gcc2.</p>





<? include_once "../../footer.inc"; ?>


