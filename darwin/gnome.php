<?
$title = "GNOME on Darwin";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/02/11 12:17:44 $';

include "header.inc";
?>


<h1>Building GNOME on Darwin</h1>

<p>Finally, here are the instructions for building GNOME (well, the
core parts of it) on Darwin and Mac OS X. This is a work in progress,
so check back for updates.</p>

<h2>Prerequisites</h2>

<ul>
<li>A Darwin-based OS. Currently your choices are Mac OS X Public Beta
and Darwin 1.2.</li>
<li>Compiler and related tools. For Darwin, these are included. For
Mac OS X, you must download and install the Developer Tools from the
<a href="http://developer.apple.com/">Apple Developer Connection</a>
website (free registration required).</li>
<li>An X11 server. See the <a href="x11-choices.php">X11 choices</a>
page for information on this. You may of course redirect X11 to a
remote display server, but you will still need the client libraries
and header files.</li>
<li>Time and patience. Compiling all this stuff takes several
hours. Be prepared to run into problems.</li>
</ul>

<h2>General Issues</h2>

<p>The <b>host type</b>, used by GNU packages to name particular
operating systems, is often not recognized by the config.guess and
config.sub scripts. If needed, copy the versions from /usr/libexec
into the build directory.</p>

<p><b>Shared libraries</b> are something of a problem. Most packages
use GNU libtool. See the <a href="libtool.php">libtool page</a> for
more information and patches.</p>

<p><b>Dynamic loading</b> via the dlopen() API is even more of a
problem. It is solved by a small compatibility library called
dlcompat. The bulk of the code is from Apple's CVS, so hopefully this
won't be needed with the final release of Mac OS X.</p>

<p>Many GNU packages need the <b>-traditional-cpp compiler flag</b> to
compile. Just set the environment variable CPPFLAGS to that value
before running configure scripts. Example:</p>
<pre>setenv CPPFLAGS -traditional-cpp
./configure</pre>

<h2>Libraries</h2>

<p><b>gettext 0.10.35:</b> This is needed for locale support.<br>
Fixes: host type, libtool, -traditional-cpp. After installation, run
<tt>ranlib .../lib/libintl.a</tt>, otherwise the library may be
ignored by the linker.<br>
Download: Available on GNU mirrors.</p>

<p><b>dlcompat 20010123:</b> This is a small compatibility library
that provides dynamic loading.<br>
Download: <a href="http://download.sourceforge.net/fink/dlcompat-20010123.tar.gz">http://download.sourceforge.net/fink/dlcompat-20010123.tar.gz</a></p>

<p><b>bzip2 1.0.1:</b> A new compression program and library.<br>
Fixes: <a href="../files/bzip2-1.0.1-darwin.patch">This patch</a>
<b>[updated 2001-02-04]</b> changes the Makefile to build a shared
library on Darwin.<br>
Download: <a href="ftp://sourceware.cygnus.com/pub/bzip2/v100/bzip2-1.0.1.tar.gz">ftp://sourceware.cygnus.com/pub/bzip2/v100/bzip2-1.0.1.tar.gz</a></p>

<p><b>glib 1.2.8:</b> Some basic routines like linked lists. Also
provides an API for dynamic loading (gmodule).<br>
Fixes: host type, libtool, -traditional-cpp.<br>
Download: Available on GNOME mirrors.</p>

<p><b>gtk+ 1.2.8:</b> The widget set used by GNOME.<br>
Fixes: host type, libtool, -traditional-cpp. <a
href="../files/gtk+-1.2.8-darwin.patch">This patch</a> removes the -lm
from gtk-config.<br>
Downlaod: Available on GNOME mirrors.</p>

<p><b>zlib 1.1.3:</b> Compression library used by many packages.<br>
Fixes: <a href="../files/zlib-1.1.3-darwin.patch">This patch</a> adds
Darwin shared library support. Call the configure script with the
parameter <tt>--shared</tt>.<br>
Download: <a href="ftp://ftp.uu.net/graphics/png/src/zlib-1.1.3.tar.gz">ftp://ftp.uu.net/graphics/png/src/zlib-1.1.3.tar.gz</a></p>

<p><b>libjpeg 6b:</b> Reads and writes JPEG images.<br>
Fixes: host type, libtool. Call the configure script with
<tt>--enable-shared --enable-static</tt>.<br>
Download: <a href="ftp://ftp.uu.net/graphics/jpeg/jpegsrc.v6b.tar.gz">ftp://ftp.uu.net/graphics/jpeg/jpegsrc.v6b.tar.gz</a></p>

<p><b>libtiff 3.4:</b> Reads and writes TIFF images.<br>
Fixes: <a href="../files/libtiff-3.4-darwin.patch">This patch</a> adds
shared library support on Darwin. After installation, run <tt>ranlib
.../lib/libtiff.a</tt>, otherwise the static library may be ignored by
the linker.<br>
Download: <a href="ftp://ftp.sgi.com/graphics/tiff/tiff-v3.4-tar.gz">ftp://ftp.sgi.com/graphics/tiff/tiff-v3.4-tar.gz</a></p>

<p><b>giflib 4.1.0:</b> Reads and writes GIF images. Due to patent
problems, there are two versions of this library: giflib and
libungif. The latter one writes uncompressed GIF images.<br>
Fixes: host type, libtool.<br>
Downloads:<br>
<a href="ftp://prtr-13.ucsc.edu/pub/libungif/giflib-4.1.0.tar.gz">ftp://prtr-13.ucsc.edu/pub/libungif/giflib-4.1.0.tar.gz</a><br>
<a href="ftp://prtr-13.ucsc.edu/pub/libungif/libungif-4.1.0.tar.gz">ftp://prtr-13.ucsc.edu/pub/libungif/libungif-4.1.0.tar.gz</a></p>

<p><b>libpng 1.0.9:</b> Reads and writes PNG images.<br>
Fixes: <a href="../files/libpng-1.0.9-darwin.patch">This patch</a> adds a
Makefile for Darwin to the scripts directory.<br>
Downloads: <a href="http://download.sourceforge.net/libpng/libpng-1.0.9.tar.gz">http://download.sourceforge.net/libpng/libpng-1.0.9.tar.gz</a></p>

<p><b>imlib 1.9.8.1:</b> An image handling library that reads several
formats.<br>
Fixes: host type, libtool. <a
href="../files/imlib-1.9.8.1-darwin.patch">This patch</a> removes some
-lm's from the conigure script, renames a variable that otherwise
leads to a symbol clash and adds the needed -module parameter to
libtool in the appropriate places. After applying the patch, run
<tt>autoconf</tt> (no parameters) in the build directory. Passing
<tt>--disable-shm</tt> to configure could prevent some problems.<br>
Download: Available on GNOME mirrors.</p>

<p><b>libxml 1.8.11:</b> Used to read XML files.<br>
Fixes: host type, libtool.<br>
Download: Available on GNOME mirrors.</p>

<p><b>libghttp 1.0.9:</b> Provides a HTTP implementation.<br>
Fixes: libtool.<br>
Download: Available on GNOME mirrors.</p>

<h2>GNOME packages</h2>

<p><b>orbit 0.5.6:</b> The CORBA request broker used in GNOME.<br>
Note: orbit 0.5.7 is available, but seems to be broken.<br>
Fixes: libtool, -traditional-cpp. The libtool scripts (ltconfig and
ltmain.sh) must also be copied to the libIDL and popt directories. <a
href="../files/orbit-0.5.6-darwin.patch">This patch</a> removes a
-lm from the orbit-config.<br>
Download: Available on GNOME mirrors.</p>

<p><b>gnome-libs 1.2.11:</b> The core GNOME libraries.<br>
Fixes: host type, libtool, -traditional-cpp. <a
href="../files/gnome-libs-1.2.11-darwin.patch">This patch</a> fixes
several issues: -lm flags in the configure script, code that includes
malloc.h without checking HAVE_MALLOC_H first and missing library
flags in gnome-config. Run <tt>autoconf</tt> after applying.<br>
Download: Available on GNOME mirrors.</p>

<p><b>gdk-pixbuf 0.8.0:</b> Another image-handling library. Depends on
gnome-libs.<br>
Fixes: host type, libtool, -traditional-cpp. <a
href="../files/gdk-pixbuf-0.8.0-darwin.">This patch</a> removes some -lm's
from the configure script. Run <tt>autoconf</tt> after applying.<br>
Download: Available on GNOME mirrors.</p>

<p><b>control-center 1.2.2:</b> As the name says.<br>
Fixes: host type, libtool, -traditional-cpp.<br>
Download: Available on GNOME mirrors.</p>

<p><b>gnome-core 1.2.4:</b> The session manager, the panel and other
core components.<br>
Fixes: libtool, -traditional-cpp. <a
href="../files/gnome-core-1.2.4-darwin.patch">This patch</a> fixes a
symbol clash issue (the desk guide applet redefines some gdk and
gdk_pixbuf functions).<br>
Download: Available on GNOME mirrors.</p>

<p><b>gnome-applets 1.2.4:</b> Lots of nice applets for your
panel.<br>
Fixes: libtool, -traditional-cpp. <a
href="../files/gnome-applets-1.2.4-darwin.patch">This patch</a> fixes a
problem with jbc and disables the mini-commander applet (it is too
broken to compile on Darwin right now). Note that some applets will
not be built because libgtop and ESD are missing or because they were
written for Linux API.<br>
Download: Available on GNOME mirrors.</p>

<p><b>icewm 1.0.6:</b> A GNOME-compliant window manager.<br>
Fixes: <a href="../files/icewm-1.0.6-darwin.patch">This patch</a> adds a
needed typecast.<br>
Download: <a href="http://download.sourceforge.net/icewm/icewm-1.0.6-4.tar.gz">http://download.sourceforge.net/icewm/icewm-1.0.6-4.tar.gz</a></p>

<h2>Bugs / Issues</h2>

<ul>
<li>Icons in the panel and its menus sometimes display as "black
holes". This happens with both Xtools and and XFree86. It seems to be
a shared memory problem. Running the panel with --no-xshm
helps. Unfortunately, you must hand-edit ~/.gnome/session to add the
parameter (find the panel's RestartCommand).</li>
<li>libgtop is missing, some applets depend on it. Other applets
depend on special APIs not present in Darwin.</li>
<li>Documentation is in a bad shape.</li>
<li>Lots of other stuff...</li>
</ul>


<?
include "footer.inc";
?>
s