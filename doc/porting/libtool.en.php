<?
$title = "Porting - libtool";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/12 15:06:20';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Porting Contents"><link rel="next" href="preparing.php?phpLang=en" title="Preparing for 10.2"><link rel="prev" href="shared.php?phpLang=en" title="Shared Code">';

include_once "header.inc";
?>

<h1>Porting - 3 GNU libtool</h1>




<p>
GNU packages that build libraries use GNU libtool to hide
platform-dependent procedures for library building and installation.
</p>


<h2><a name="situation">3.1 The Situation</a></h2>
<p>
In the wild, one can find four strands of libtool:
</p>
<ul>

<li><p>
<b>libtool 1.3</b>:
The most common strand.
The last release from this branch is 1.3.5.
It doesn't know about Darwin and only builds static libraries.
It can be recognized by the presence of the files
<code>ltconfig</code> and <code>ltmain.sh</code> in
the source tree.
</p></li>

<li><p>
<b>libtool 1.4</b>:
Long in the works and recently released as the new
stable version, this branch has better autoconf integration.
Unfortunately that makes migrating packages from 1.3 non-trivial.
It supports Darwin 1.3 / Mac OS X 10.0 out of the box and needs a
small patch to work on Mac OS X 10.1.
It can be recognized by the absence of <code>ltconfig</code>.
Versions that identify themselves as 1.3b or 1.3d are actually
development snapshots of 1.4 and must be treated with caution.
</p></li>

<li><p>
<b>The multi-language-branch</b>:
Also called MLB, this version of libtool was a parallel development
branch that added support for C++ and Java (via gcj).
It has now been merged back into the main development line.
Recent versions support Darwin 1.3 and Mac OS X 10.0 out of the box.
The MLB can be recognized by the files <code>ltcf-c.sh</code>,
<code>ltcf-cxx.sh</code> and <code>ltcf-gcj.sh</code>.
</p></li>

<li><p>
<b>The current development branch</b>:
This is the development version that will some day be released as
libtool 1.5.
It has resulted from the merge of 1.4 and the MLB.
It supports C, C++ and Java (via gcj).
Unfortunately, it can't be easily told apart from 1.4, you'll have to
check the version number inside <code>ltmain.sh</code>.
</p></li>

</ul>
<p>
In conclusion, libtool 1.3.x and packages that use it (which
happens to be the majority of libtool-using packages out there) need a
patch to build shared libraries on Darwin.
Apple includes a patched version of libtool 1.3.5 in Mac OS X, but it
will not work correctly in most cases.
Christoph Pfisterer improved that patch to hardcode the correct path and to 
do full versioning.
The changes were incorporated into upstream libtool releases and
development versions starting with 1.4.
Members of the Fink team continue to make improvements and forward them to 
the libtool maintainers.
The versioning scheme is compatible across all libtool versions.
</p>
<p>
Side note:
The libltdl library included with all libtool versions will only work
on Darwin when dlcompat is installed.
</p>



<h2><a name="patch-135">3.2 The 1.3.5 Patch</a></h2>
<p>
If you are building libtool 1.3.5 for yourself, you will need to apply
<a href="http://fink.sourceforge.net/files/libtool-1.3.5-darwin.patch">this
patch</a> <b>[updated 2002-06-09]</b> to the libtool 1.3.5 source and
then delete the files ltconfig and ltmain.sh.
(They will be recreated from the appropriate .in files when you run
configure and make.)  This is done automatically, by the way, in the 
current Fink package for libtool 1.3.5.</p><p>
But that's only half the work - every package using libtool comes with
its own copies of ltconfig and ltmain.sh.
So you must replace these in every package that you want to build as a
shared library.
Note that you must do this before running the configure script.
For your convenience, you can get the two files right here:
<a href="http://fink.sourceforge.net/files/ltconfig">ltconfig</a> (98K) and
<a href="http://fink.sourceforge.net/files/ltmain.sh">ltmain.sh</a> (110K)
<b>[both updated 2002-06-09]</b>.</p>


<h2><a name="fixing-14x">3.3 Fixing 1.4.x</a></h2>
<p>
There are at least three different versions of libtool 1.4.x now in wide use
(1.4.1, 1.4.2, and later development snapshots). They all have some issues on
Darwin, though the exact changes required to fix them differ. The libtool14
package shipped via Fink has all required patches already applied to it.
However, you still have to manually fix the ltmain.sh/configure files of
affected packages in order to get them working.
</p>

<ol>
<li>
<b>The flat_namespace bug</b>:
This problem only occurs if you use libtool on Mac OS X10.1 and later. What happens
is that libtool tries to use the <code>-undefined suppress</code> to allow undefined
symbols, but doesn't specify along with it the <code>-flat_namespace</code> option.
Starting with 10.1 this won't work anymore. A typical patch looks like this:
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
<b>The loadable module bug</b>:
This bug is caused by the non-standard behaviour of zsh (which is the default
shell in 10.0 and 10.1; in 10.2 it is supposed to be replaced by bash).
Zsh's non-standard quoting behaviours prevents loadable module from being built
correctly, they end up as shared libraries instead (unlike Linux, these are
reall different things on Darwin). A typical fix for this (cut off, so you can't
use it unmodified):
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
<p>
This problem is fixed in some post-1.4.2 versions of libtool.
</p>
</li>
<li>
<b>The convenience library bug</b>:
Under some conditions, libtool will fail to link convenience libraries, 
giving "multiple definitions" errors.
This is caused by a more fundamental problem in libtool it seems. For now 
as a workaround (curing the symptoms
not the actual problem, but with great success anyway), you can use this fix
(thanks to Dave Vasilevsky):
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
<b>The DESTDIR bug</b>:
Certain packages which set DESTDIR and use libtool 1.4.2 have problems
with relinking.
The problems are discussed in these email messages: 
<p>
<a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html</a></p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html</a></p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html</a>,</p>
<p>and a patch for the problem is discussed in:</p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html</a>.</p>
</li>
</ol>


<h2><a name="dylibversionfix">3.4 Fixing version strings for libtool generated dylibs</a></h2>

<p>Libraries generated by libtool might have the wrong version numbers. This is caused by a wrongly used flag in the packages Makefile.
When libtool is called in a Makefile like this:
<code>
-release "version"
</code>
the resulting binaries after the make command has been run will be:
</p>
<ol>
<li> libname.dylib</li>
<li> libname-"version".dylib</li>
</ol>
<p>
You can easily tell if <code>-release</code> is used in your Makefile. You may notice the <b>-</b> after the libraries name. This indicates that libtool is called with <code>-release</code> to generate the binaries.

In some other cases the resulting libraries might look something similar to this:
</p>

<ol>
<li>libname.dylib</li>
<li>libname-"version".x.x.x.dylib</li>
</ol>
<p>
indicating that both flags, namely <code>-release</code> and <code>-version-info</code> were being used.
</p>
<p>
Setting the correct <code>-version-info</code> can be a complicated task. Apple provides some excellent information in their Developer Tools documentation. 
Since you are running Fink you will have some sort of developer tools installed. A precise explanation of libtool linking on recent Mac OX Systems can be found in this <a href="file://localhost/Developer/Documentation/DeveloperTools/libtool/libtool_6.html#SEC34"> document</a>.
To make sure that this document is complete an abbreviated version of the document mentioned above is included
</p>
<p>
Quoting from the developer documentation:
libtool library versions are described by three integers:
</p>

<ul><li>
<b>current</b>
<p>
 The most recent interface number that this library implements.
</p>
</li>
<li>
<b>revision</b>
<p>
 The implementation number of the current interface. 
</p>
</li>
<li>
<b>age</b>
<p>
The difference between the newest and oldest interfaces that this library implements. In other words, the library implements all the interface numbers in the range from number current - age to current.
If two libraries have identical current and age numbers, then the dynamic linker chooses the library with the greater revision number. 
</p>

</li>
</ul>
<p>
More Information on setting and updating library version numbers using libtool can be found at the link mentioned above. Creating new and updating existing version numbers via <code>-version-info</code> is extensively covered.
</p>





<h2><a name="notes">3.5 Further Notes</a></h2>
<p>For more information on libtool itself and what it does, see the <a href="http://www.gnu.org/software/libtool/libtool.html">libtool homepage</a>.</p>

<p>
Side note:
Apple's Developer Tools contain a program also called libtool, which
is used by the compiler driver to build shared libraries.
However, this is completely unrelated with GNU libtool.
The GNU libtool that Apple ships is installed as <code>glibtool</code>
instead.
This can be achieved by configuring GNU libtool with
<code>--program-transform-name=s/libtool/glibtool/</code>.
</p>


<p align="right">
Next: <a href="preparing.php?phpLang=en">4 Preparing for 10.2</a></p>

<? include_once "footer.inc"; ?>
