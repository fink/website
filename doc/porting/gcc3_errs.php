<?
$title = "GCC3 Errors";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2002/06/14 01:36:55';

include "header.inc";
?>

<h1>Packages with errors when compiling under gcc3</h1>
<p>JF Mertens has provided an extensive list of packages which give
errors when compiled with gcc3.  The current list is dated 22 June 2002.
</p>
<pre>
The 'Depends' re-group all depends and builddepends of a package and of all its spitoffs; further it mentions always a 'meta-package' rather than its splitoffs,
and in case of a choice between 2 variants, the more powerful variant is selected.
'DEPS' refer to those dependencies whic are also in the list.
(++) refers to those packages where either 'c++' or 'g++' appears in the log-file.

crypto/cyrus-sasl-1.5.27-2 Depends: db3 (++), openssl
crypto/mozilla-1.0.0-1 (++) Depends: glib, gtk+, libjpeg, libpng, orbit
crypto/vtun-2.5b1-1 Depends: lzo, openssl
database/postgresql-7.1.3-4 Depends:  daemonic, expat, gdbm, gmp, libxml2, passwd, readline, tcltk
devel/cccc-3.pre54-1 (++)
devel/cyclo-2.0-2 (++) Depends: fileutils
devel/ddd-3.3.1-3 (++) Depends: lesstif
devel/gtranslator-0.41-1 Depends: audiofile, gal19, gconf (++), gnome-libs, gnome-vfs-ssl, scrollkeeper
devel/prcs-1.3.1-1 (++) Depends: diffutils, gzip, tar
devel/zoinks-0.1.6-1 (++) Depends: imlib, x11
editors/vim-6.1-1 Depends: glib, gtk+
games/sdl-ttf-2.0.5-1 Depends: freetype2, sdl (++)
gnome/gconf2-1.1.9-1 (++) DEPS: orbit2 Depends: atk1, db3 (++), glib2 (++), gtk+2, gtk-doc, libxml2, linc1, pango1 (++), pkgconfig
gnome/gdk-pixbuf-0.16.0-6 Depends: audiofile, esound, giflib, glib, gnome-libs, gtk+, imlib, netpbm, libjpeg, libpng, libtiff, orbit
gnome/gnome-applets-1.4.0.5-2 DEPS: libghttp Depends: audiofile, bonobo, control-center, db3 (++), esound, freetype2, gal19, gconf (++), gdk-pixbuf, gettext, giflib, glib, glibwww, gnome-core, gnome-libs, gnome-print, gnome-vfs-ssl, gtk+, gtkhtml, guile, imlib, libglade, libgtop, libjpeg, libpng, libtiff, libwww, libxml, netpbm, oaf, orbit, popt, readline, scrollkeeper
gnome/gnome-python-1.4.1-7 DEPS: pygtk Depends: audiofile, bonobo, control-center, db3 (++), dlcompat, esound, expat, freetype2, gal19, gconf (++), gdbm, gdk-pixbuf, giflib, glib, glibwww, gmp, gnome-core, gnome-libs, gnome-print, gnome-vfs-ssl, gtk+, gtkglarea (++), gtkhtml, guile, imlib, libglade, libjpeg, libpng, libtiff, libwww, libxml, netpbm, oaf, orbit, popt, readline, tcltk
gnome/gnome-vfs2-ssl-1.9.12-2 DEPS: gconf2 (++), libbonobo2, orbit2 Depends: bonobo-activation2, glib2 (++), gnome-mime-data, gtk-doc, intltool, linc1, openssl, pkgconfig
gnome/guppi-0.40.2-3 Depends: audiofile, bonobo, control-center, db3 (++), esound, expat, freetype2, gal19, gconf (++), gdbm, gdk-pixbuf, giflib, glib, glibwww, gmp, gnome-core, gnome-libs, gnome-print, gnumeric, gtk+, gtkhtml, guile, imlib, libglade, libjpeg, libole2, libpng, libtiff, libwww, libxml, netpbm, oaf, orbit, popt, python (++), readline, tcltk
gnome/libbonobo2-1.115.0-1 DEPS: orbit2 Depends: bonobo-activation2, glib2 (++), gtk-doc, intltool, libxml2, linc1, pkgconfig
gnome/libgnomecanvas2-1.115.0-1 Depends: atk1, glib2 (++), gtk+2, gtk-doc, libart2, libglade2, libxml2, pango1 (++), pkgconfig
gnome/nautilus-1.0.6-2 (++) DEPS: libghttp, mozilla (++) Depends: audiofile, bonobo, control-center, db3 (++), eel, esound, freetype2, gconf (++), gdk-pixbuf, giflib, glib, gnome-libs, gnome-print, gnome-vfs-ssl, gtk+, guile, imlib, libglade, libjpeg, libpng, librsvg, libtiff, libxml, netpbm, oaf, orbit, popt, readline
gnome/orbit2-2.3.108-2 Depends: glib2 (++), libidl2, linc1, pkgconfig, popt
gnome/pygtk-0.6.8-2 Depends: audiofile, db3 (++), dlcompat, esound, expat, gdbm, gdk-pixbuf, giflib, glib, gmp, gnome-libs, gtk+, imlib, libglade, libjpeg, libpng, libtiff, libxml, netpbm, orbit, python (++), readline, tcltk
graphics/glui-2.1-4 Depends: glut
languages/algae-3.5.1-2 DEPS: g77 (++) Depends: readline
languages/aplus-fsf-4.18-8-2 (++) Depends: automake, dlcompat, freetype-hinting, ttfmkfontdir, x11, xfontpath
languages/fort77-1.18-3 Depends: f2c (++)
languages/intercal-threaded-0.7-2 (++) Depends: bison, flex, groff (++)
languages/smlnj-runtime-110.39-2
libs/clanlib-0.5.4-2 (++) Depends: freetype-hinting, hermes, libjpeg, libmikmod, libogg, libpng, libvorbis, tolua, x11, zlib
libs/libghttp-1.0.9-3
libs/libshout-1.0.8-2 Depends: libpoll
libs/libsigc++-1.0.4-2 (++)
libs/libxml++-0.13-1 (++) Depends: expat, gdbm, gmp, libxml2, tcltk
libs/neon-ssl-0.18.5-3 Depends: expat, gdbm, gmp, libxml2, openssl, tcltk
libs/neon19-ssl-0.19.4-1 Depends: expat, gdbm, gmp, libxml2, openssl, tcltk
net/lftp-ssl-2.5.4-1 (++) Depends: autoconf25, bison, dlcompat, gettext, libiconv, libpoll, openssl, readline
net/teknap-1.3g-2
sci/dx-4.2.0-7 (++) DEPS: libgl (++), netcdf (++) Depends: automake, imagemagick (++), hdf, lesstif, libtiff
sci/macaulay2-0.9.2-4 (++) Depends: gc (++), gdbm, gmp, singular-factory (++), singular-libfac (++)
sci/netcdf-3.5.0-5 (++) DEPS: fort77
sci/nickle-1.99.2-1
sci/numeric-atlas-21.0-1 Depends: atlas, db3 (++), expat, f2c (++), gdbm, gmp, python (++), readline, tcltk
sci/octave-atlas-2.1.35-4 (++) Depends: atlas, f2c (++), fftw, gnuplot, hdf5 (++), libjpeg, libpng, readline, texinfo
sci/plotutils-2.4.1-2 (++) Depends: libpng
sci/r-base-atlas-1.5.0-2 (++) Depends: atlas, dlcompat, f2c (++), libjpeg, libpng, readline, tcltk, texinfo, x11, zlib
sci/scilab-atlas-2.6-5 DEPS: g77 (++) Depends: atlas, dlcompat, tcltk, xless
sci/tela-1.34-3 (++) DEPS: g77 (++) Depends: atlas, expat, freetype2, gdbm, gmp, hdf, libjpeg, libpng, libtiff, libxml2, plotmtv, readline, sppc (++), tcltk
sci/udunits-1.11.7-2
sci/yorick-1.5.08-1 Depends: texinfo, x11
sound/lame-3.92-3 Depends: audiofile, esound, glib, gtk+, libogg, mpg123, ncurses (++)
sound/mjpegtools-1.5-20011214-2 (++) Depends: automake, glib, gtk+, libdv, popt, sdl (++)
sound/openh323-1.7.9-2 (++) DEPS: pwlib (++)
sound/pwlib-1.2.10-3 (++)
text/aspell-.33.7.1-2 (++) Depends: pspell (++)
text/gv-3.5.8-4 Depends: ghostscript, rman, xaw3d
text/sagasu-1.0.2-1 (++) DEPS: gnomemm (++), gtkmm (++)
utils/a2ps-4.12-4
utils/dejagnu-1.4.1-1 (++) Depends: expect, tcltk
utils/fhist-1.8-2
utils/source-highlight-1.1-1 (++)
utils/unrar-3.0-1 (++)
web/aria-0.10.0-2 (++) Depends: glib, gtk+
web/php-4.1.2-1 Depends: apache, bzip2, dlcompat, expat, freetype2, gd, gdbm, gmp, libxml2, tcltk, zlib
x11-system/xfree86-rootless-4.2.0-2 (++) Depends: xfree86-base
x11-wm/xfce-3.8.10-2 Depends: audiofile, dlcompat, esound, gdk-pixbuf, giflib, glib, gnome-libs, gtk+, imlib, libjpeg, libpng, libtiff, netpbm, orbit
x11/aterm-0.4.2-2 Depends: giflib, glib, gtk+, imlib, libjpeg, libpng, libtiff, netpbm, x11
x11/eterm-0.9-1 Depends: giflib, glib, gtk+, imlib, libjpeg, libpng, libtiff, netpbm
x11/fltk-1.1.0rc1-1 (++)
x11/glut-3.7-1 DEPS: libgl (++)
x11/openmotif3-2.2.2-1 Depends: x11
x11/qt2-2.3.2-1 (++) Depends: libjpeg, libpng, x11, zlib
x11/qt3-3.0.4-7 (++) DEPS: libgl (++) Depends: dlcompat, freetype2, libjpeg,  libpng, xfree86-base
x11/wxgtk-2.3.2-5 (++) Depends: glib, gtk+, freetype-hinting, freetype2, libgl (++), libjpeg, libpng, libtiff
x11/wxmac-2.3.2-4 (++) Depends: freetype-hinting, libjpeg, libpng, libtiff


Among those the following are install_name errors :
dia
gconf2
gnome-python
gnome-vfs2-ssl
libbonobo2
libgnomecanvas2
nautilus
orbit2
php
pygtk
xfce

A very large proportion of the others go through "backward_warning.h",
and a small test of just upping the version number in dejagnu to 1.4.2
and in source-highlight to 1.4 made those packages build without problem.
Would it be possible for you to ask maintainers at least to update any
of their packages in the above list to their latest versions if any ?


Finally, c++ packages (same definition) that do build :
abiword astyle bochs class-dump cups db3 db4 dpkg drscheme f2c gc gconf gengetopt geomview glib2 gnome-games gnome-pim gnome-utils graphviz groff gtkglarea gtop hdf5 imagemagick jags jikes launch libdivxdecore mad mysql ncurses oleo openjade pango1 pspell python sdl sdl-net singular-factory singular-libfac smpeg sppc swig tmake worker xpdf
</pre>
<?
include "footer.inc";
?>
