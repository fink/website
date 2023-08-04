<?php
$title = "Porting - Vorbereitungen für 10.2";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Porting Contents"><link rel="next" href="preparing-10.3.php?phpLang=de" title="Vorbereitungen für 10.3"><link rel="prev" href="libtool.php?phpLang=de" title="GNU libtool">';


include_once "header.de.inc";
?>
<h1>Porting - 4. Vorbereitungen für 10.2</h1>
    
    
    <h2><a name="bash">4.1 Die Shell bash</a></h2>
      
      <p>
        Der Übergang von 10.0 nach OS X 10.1 war für Fink relativ leicht, nicht
        zuletzt weil man für einige der Änderungen im voraus geplant hatte. Das
        ist auch für die nächsten Übergänge geplant, aber viele Details sind
        noch nicht bekannt.      </p>
      <p>
        So weit wir wissen, wird mit OS X 10.2 zsh von bash abgelöst, um die
        Funktionalität von <code>/bin/sh</code> zu erhalten. Das wirkt sich
        mindestens an drei Stellen für Fink aus.
      </p>
      <ul>
        <li>
          Bisher gab es einige Fink-Pakete, in deren CompileScript
          (oder PatchScript oder InstallScript) nichts außer einem Semikolon
          stand. Dies funktioniert mit bash nicht mehr und muss ersetzt werden,
          z. B. durch:
<pre>
CompileScript: echo "nothing to do"
</pre>
        </li>
        <li>
          Bisher nutzten einige Fink-Pakete eine Konstruktion wie
          <code>lib(foo|bar).dylib</code> für Referenzen auf zwei Bibliotheken
          auf einmal. Dies geht unter bash nicht mehr und die bash-Alternative
          <code>lib{foo,bar}.dylib</code> funktioniert nicht unter zsh. Als
          Lösung daher bleibt nur, alle Namen komplett auszuschreiben.
        </li>
        <li>
          In vielen Fällen wird unter bash ein Patch von libtool benötigt,
          damit keine Bibliotheken ohne Version erstellt werden.
          A libtool patch is needed in many cases, to prevent libraries from being
          build unversioned under bash.
          <b> Beachten sie: Dieser Patch wird für libtool-1.3.5 nicht benötigt,
          wenn sie zum Beispiel UpdateLibtool: True verwenden. </b>
          Unter bash bekommt man in diesem Fäälen folgende Fehlermeldung:
<pre>
../libtool: test: too many arguments
</pre>
          Passiert dies, enthält <code>configure</code>folgendes:
<pre>
archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts
-install_name $rpath/$soname $(test -n "$verstring" -a x$verstring !=
x0.0 &amp;&amp; echo $verstring)'
</pre>
          Es folgt ein Patch (Benutzen sie ihn aber vorsichtig, denn manchmal
          gibt es mehrere Probleme mit libtool. Deshalb ist es besser, diesen
          Patch von Hand umzusetzen):
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
    
    <h2><a name="gcc3">4.2 Der gcc3 Compiler</a></h2>
      
      <p>Mac OS X 10.2 nutzt den Compiler gcc3.</p>
      <p>
				Einige Paket mit ladbaren Modulen, die libtool benutzen, brechen 
				mit einem install-name Fehler ab, weil libtool die Option 
				-install_name auch zusammen mit der Option -bundle übergibt, wo 
				sie nicht zwingend benötigt wird. Vom compiler gcc2 wurde dieses 
				Verhalten akzeptiert, aber nicht vom Compiler gcc3. Die Lösung des 
				Problems ist <a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02025.html">hier</a>
				beschrieben. Beachte sie, dass sie diesen Patch mit libtool-1.3.5 
				nicht benötigen (Wenn sie z. B. das Feld <code>UpdateLibtool: 
				True</code> gesetzt haben.), weil er bereits in die von Fink revidierte 
				Version der Datei ltconfig enthalten ist (auch als Vorabversion 
				von fink erhältlich):
      </p>
      <p>
			  Ein anderes Problem mit dem Compiler gcc3 is eine Inkompatibilität 
				der C++ ABIs von gcc2 und gcc3. In der Praxis bedeutet das, dass mit
				gcc3 kompilierte C++ Programme keine Bibliotheken	linken können, die
        mit gcc2 kompiliert wurden.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="preparing-10.3.php?phpLang=de">5. Vorbereitungen für 10.3</a></p>
<?php include_once "../../footer.inc"; ?>


