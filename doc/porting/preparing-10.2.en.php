<?php
$title = "Porting - Preparing for 10.2";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2014/10/25 09:21:47';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Porting Contents"><link rel="next" href="preparing-10.3.php?phpLang=en" title="Preparing for 10.3"><link rel="prev" href="libtool.php?phpLang=en" title="GNU libtool">';


include_once "header.en.inc";
?>
<h1>Porting - 4. Preparing for 10.2</h1>




<h2><a name="bash">4.1 The bash shell</a></h2>
<p>
Fink made the transition from OS X 10.0 to OS X 10.1 fairly easily, thanks
in part to planning ahead for the changes that were coming.  We will try
to do the same for the next transition, but not many details are known
yet. </p>
<p> We understand that OS X 10.2 will use bash rather than zsh to provide
<code>/bin/sh</code> functionality.  This has at least three implications
for fink. 
</p>
<ul><li>
In the past, some fink packages created a CompileScript (or PatchScript or
InstallScript) which does nothing
by simply putting a semicolon in the script.  This does not work
under bash, and must be replaced by something like
<pre>
  CompileScript: echo "nothing to do"
</pre>
</li>
<li>
In the past, some fink packages used a the <code>lib(foo|bar).dylib</code>
construction to refer to two libraries at once; this doesn't work under
bash (and the bash alternative <code>lib{foo,bar}.dylib</code> doesn't work
under zsh).  Solution: write out the names in full.
</li>
<li>
A libtool patch is needed in many cases, to prevent libraries from being
build unversioned under bash.  
<b> Note: you do not need this patch with
 libtool-1.3.5, for example, if you are using UpdateLibtool:
 True. </b>
The symptom: when building under bash,
you see
<pre>
../libtool: test: too many arguments
</pre>
When this happens, <code>configure</code> contains the following:
<pre>
archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $(test -n "$verstring" -a x$verstring != 
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

<h2><a name="gcc3">4.2 The gcc3 compiler</a></h2>

	<p>Mac OS X 10.2 uses the gcc3 compiler.</p>
	
	<p>Some packages which have loadable modules and use
libtool fail with an install_name error, because libtool passes
the -install_name flag even along with the -bundle flag (when it is not
strictly needed).  This behavior was accepted by the gcc2 compiler but is
not being accepted by the gcc3 compiler.  The fix can be found <a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02025.html">here.</a>
Note that you do not need the patch if your package uses libtool-1.3.5
(for example, if you are using <code>UpdateLibtool: True</code>)
since it has already been incorporated into a revised version of fink's
ltconfig file (available in pre-release versions of fink).
</p>

<p>Another issue with the gcc3 compiler is an incompatibility for C++ ABIs
between gcc2 and gcc3.  In practice, this means that C++ programs compiled
with gcc3 cannot link to libraries compiled with gcc2.</p>




<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="preparing-10.3.php?phpLang=en">5. Preparing for 10.3</a></p>
<?php include_once "../../footer.inc"; ?>


