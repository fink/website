<?
$title = "Darwin patches";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/01/16 09:01:08 $';
$section = "darwin";
$wantnav = "darwin";

include "header.inc";
?>


<h1>Darwin patches</h1>

<p>On this page I collect patches that are needed to get various
software to work on Darwin.</p>

<h2>GNU libtool</h2>

<p>See the separate <a href="libtool.php">libtool patch page</a> for a
libtool patch and patched versions of ltconfig and ltmain.sh. You'll
need these for many GNU and GNOME packages if you want them to build
shared libraries.</p>

<h2>zlib</h2>

<p>This patch adds support for Darwin shared library support to the
custom configure script used by zlib.</p>
<ul>
<li><a href="files/zlib-1.1.3-darwin.patch">Patch for zlib
1.1.3</a></li>
</ul>

<h2>libpng</h2>

<p>This patch adds a Makefile for Darwin, located in
<tt>scripts/makefile.darwin</tt>. This is needed to build a shared
library.</p>
<ul>
<li><a href="files/libpng-1.0.8-darwin.patch">Patch for libpng
1.0.8</a></li>
</ul>

<h2>libtiff</h2>

<p>This patch adds Darwin shared library support. It changes the
custom <tt>configure</tt> and <tt>libtiff/Makefile.in</tt>.</p>
<ul>
<li><a href="files/libtiff-3.4-darwin.patch">Patch for libtiff
v3.4</a></li>
</ul>


<?
include "footer.inc";
?>
