<?
$title = "F.A.Q. - Compiling (2)";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/01/12 18:51:10';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-general.php" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php" title="Compile Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 5 Compile Problems - Specific Packages</h1>



<a name="nedit"><div class="question"><p><b>Q5.1: nedit is broken.</b></p></div>
<div class="answer"><p><b>A:</b> If you're seeing <tt><nobr>Xm/BulletinB.h: No such file or
directory</nobr></tt> in the error messages, that's because you have Xtools
installed. Xtools includes OpenMotif, but unfortunately Tenon forgot
to include some required header files. There is no workaround yet, and
it is unknown whether this is fixed in recent releases on Xtools.</p></div></a>

<a name="gnome-libs-db"><div class="question"><p><b>Q5.2: gnome-libs complains about
dbopen and lots of other stuff.</b></p></div>
<div class="answer"><p><b>A:</b> 
This can happen when you manually installed Berkeley DB 3 without
backward compatibility.
gnome-libs expects to find a DB 1.86 compatible interface.
Remove the DB 3 installation from /usr/local or replace it with one
that has DB 1.86 compatibility.
</p></div></a>

<a name="libiconv"><div class="question"><p><b>Q5.3: libiconv fails with errors that
mention ANSI C++.</b></p></div>
<div class="answer"><p><b>A:</b> 
This happens when you make a symlink from <tt><nobr>gcc</nobr></tt> to
<tt><nobr>c++</nobr></tt>.
That causes all C code to be compiled as C++ code.
Unfortunately, C allows some things that C++ doesn't allow, resulting
in these errors.
You should remove the symlink you created, or at least point it at
<tt><nobr>cc</nobr></tt> instead.
</p></div></a>

<a name="xaw3d"><div class="question"><p><b>Q5.4: Xaw3D fails to compile with a
two-level namespace error.</b></p></div>
<div class="answer"><p><b>A:</b> 
This can happen on Mac OS X 10.1 if you have installed XFree86
manually (i.e. you have system-xfree86) or if you have Xtools.
Xaw3D uses the configuration files installed by XFree86 and fails if
those have not been patched for Mac OS X 10.1.
xfree86-base already has those patches in Fink 0.3.0.
system-xfree86 and system-xtools have been fixed to patch the
configuration files on the fly if necessary.
They are available in CVS; the binary distribution has also been
updated with these new packages.
</p></div></a>

<a name="gettext"><div class="question"><p><b>Q5.5: gettext compiles fine but then
installing it fails.</b></p></div>
<div class="answer"><p><b>A:</b> 
This is a known problem which hopefully should be fixed in an upcoming
Fink release. For now the workaround  is to enter the following commands:
<pre>fink rebuild gettext
fink update gettext</pre>
</p></div></a>

<p align="right">
Next: <a href="usage-general.php">6 Package Usage Problems - General</a></p>


<?
include "footer.inc";
?>
