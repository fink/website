<?
$title = "Porting - Preparing for 10.2";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2002/05/15 19:10:48';

$metatags = '<link rel="contents" href="index.php" title="Porting Contents"><link rel="prev" href="libtool.php" title="GNU libtool">';

include "header.inc";
?>

<h1>Porting - 4 Preparing for 10.2</h1>




<a name="bash"><h2>4.1 The bash shell</h2></a>
<p>
Fink made the transition from OS X 10.0 to OS X 10.1 fairly easily, thanks
in part to planning ahead for the changes that were coming.  We will try
to do the same for the next transition, but not many details are known
yet. </p>
<p> We understand that OS X 10.2 will use bash rather than zsh to provide
<tt><nobr>/bin/sh</nobr></tt> functionality.  This has at least three implications
for fink. 
</p>
<ul><li>
In the past, some fink packages created a CompileScript (or PatchScript or
InstallScript) which does nothing
by simply putting a semicolon in the script.  This does not work
under bash, and must be replaced by something like
<pre>
  CompileScript: echo &quot;nothing to do&quot;
</pre>
</li>
<li>
In the past, some fink packages used a the <tt><nobr>lib(foo|bar).dylib</nobr></tt>
construction to refer to two libraries at once; this doesn't work under
bash (and the bash alternative <tt><nobr>lib{foo,bar}.dylib</nobr></tt> doesn't work
under zsh).  Solution: write out the names in full.
</li>
<li>
A libtool patch is needed in many cases, to prevent libraries from being
build unversioned under bash.  The symptom: when building under bash,
you see
<pre>
../libtool: test: too many arguments
</pre>
When this happens, <tt><nobr>configure</nobr></tt> contains the following:
<pre>
archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $(test -n &quot;$verstring&quot; -a x$verstring != 
x0.0 &amp;&amp; echo $verstring)'
</pre>
Here is a patch (but it must be used with care, because sometimes there are
other libtool problems as well so this patch must be applied by hand):
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
-install_name $rpath/$soname $(test -n &quot;$verstring&quot; -a x$verstring != 
x0.0 &amp;&amp; echo $verstring)'
+    archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $tmp_verstring'
      # We need to add '_' to the symbols in $export_symbols first
      #archive_expsym_cmds=&quot;$archive_cmds&quot;' &amp;&amp; strip -s $export_symbols'
      hardcode_direct=yes
diff -Naur gdk-pixbuf-0.16.0/ltmain.sh gp-new/ltmain.sh
--- gdk-pixbuf-0.16.0/ltmain.sh 2002-01-22 20:11:43.000000000 -0500
+++ gp-new/ltmain.sh    2002-05-10 03:04:49.000000000 -0400
@@ -2862,6 +2862,11 @@
        if test -n &quot;$export_symbols&quot; &amp;&amp; test -n &quot;$archive_expsym_cmds&quot;;
	then
          eval cmds=\&quot;$archive_expsym_cmds\&quot;
        else
+         if test &quot;x$verstring&quot; = &quot;x0.0&quot;; then
+           tmp_verstring=
+         else
+           tmp_verstring=&quot;$verstring&quot;
+         fi
          eval cmds=\&quot;$archive_cmds\&quot;
        fi
        IFS=&quot;${IFS=     }&quot;; save_ifs=&quot;$IFS&quot;; IFS='~'
</pre>
</li>
</ul>





<?
include "footer.inc";
?>

