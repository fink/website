<?
$title = "Porting - Preparing for 10.2";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2002/05/29 13:41:39';

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

<a name="gcc3"><h2>4.2 The gcc3 compiler</h2></a>
<p>Mac OS X 10.2 will use the gcc3 compiler, and at the moment, the Fink team
is experimenting with this on Fink packages, using the version of gcc3
which Apple provided with the April 2002 Developer Tools.  As of May 22,
we have had reports of success and failure with just a handful of Fink
packages when one attempts to compile them with gcc3.  (Thanks to Jeff
Hester, Jan de Leeuw, Mathias Meyer, and Alexander Strange for providing
reports. Further reports can
be sent to fink-devel@lists.sourceforge.net .)
</p><p><b> Successful packages:</b></p>
<ol>
<li>gnome-libs-1.4.1.6-1</li>
<li>sdl-1.2.4-2</li>
<li>mplayer-0.90pre4-1</li>
<li>windowmaker-0.80.0-7</li>
<li>pkgconfig-0.12.0-1</li>
<li>oaf-0.6.8-2</li>
<li>guile-1.4-4</li>
<li>openssl_0.9.6c-3</li>
<li>control-center_1.4.0.5-1</li>
<li>gal19_0.19.1-3</li>
<li>gtkhtml_1.0.1-3</li>
<li>galeon-1.2.1-1</li>
<li>aalib-1.4rc5-1</li>
<li>libglade-0.17-3</li>
<li>db3-3.3.11-7</li>
<li>python-2.2.1-5</li>
<li>glib2-2.0.1-3</li>
<li>pcre-3.9-2</li>
<li>libxslt-1.0.17-2</li>
<li>automake-1.6.1-1</li>
<li>lesstif-0.93.18-4</li>
</ol>
<p><b> Unsuccessful packages:</b></p>
<ol><li> apt-0.5.4-2 (breaks with undefined symbols such as 
__ZTI9pkgSystem) </li>
<li>libxml2-2.4.21-2 (breaks with install_name error)</li>
<li>bonobo-1.0.20-1(breaks with install_name error)</li>
<li>gconf-1.0.9-1(breaks with install_name error)</li>
<li>tads-2.5.5-3 breaks because of weird va_args() calling</li>
<li>gv-3.5.8-4</li>
<li>gnome-core-1.4.0.8-1 (breaks with install_name error)</li>
<li>galeon-1.2.1-1</li>
<li>gaim-0.57-1 (breaks with install_name error)</li>
<li>qt3-3.0.4-5</li>
<li><a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02051.html">emacs21</a></li>
</ol>
<p>In general, packages which have loadable modules and use libtool are
failing with this install_name error at the moment, because libtool passes
the -install_name flag even along with the -bundle flag (when it is not
strictly needed).  This behavior was accepted by the gcc2 compiler but is
not being accepted by the gcc3 compiler.  A fix is being worked on by Ben
Hines; please <a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02025.html">help
him test it.</a>
</p>
<p>Another issue with the gcc3 compiler is an incompatibility for C++ ABIs
between gcc2 and gcc3.  In practice, this means that C++ programs compiled
with gcc3 cannot link to libraries compiled with gcc2.</p>






<?
include "footer.inc";
?>

