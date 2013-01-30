<?
$title = "GCC3 Errors";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2002/06/28 01:36:55';

include_once "header.en.inc";
?>

<h1>Packages with errors when compiling under gcc3</h1>
<p>JF Mertens has provided an extensive list of packages which give
errors when compiled with gcc3.  The current list is dated 28 June 2002.
</p>
<pre>
The 'Deps' re-group all depends and builddepends of a package and of all
its spitoffs; further it mentions always a 'meta-package' rather than
its splitoffs, and in case of a choice between 2 variants, the more
powerful variant is selected.
'DEPS' refer to those dependencies which are also in the list.
(++) refers to those packages where either 'c++' or 'g++' appears in the
log-file.
'CV' is the 'current' version a cursory search found for the source, and
'Maint:' is clear.
Those fields are always present, in the same order, (even when empty),
and preceded by a tab, to facilitate all forms of cutting and grepping.
qt (2 or 3) dependent packages are not listed.

The link (created by g77.info) in /usr/lib has been changed to always
point to the correct file: libg2c.a -> gcc/darwin/2.95.2/libg2c.a. With
this change, the old (gcc2) g77 is still functional with gcc3 _ though
it doesn't build...


base/apt-0.5.4-3 (++)	CV: =	DEPS: /	Deps: dpkg (++)	Maint: Max Horn
crypto/cyrus-sasl-1.5.27-2	CV: 2.1.5	DEPS: /	Deps: db3 (++) openssl	Maint: Michael McKibben
crypto/galeon-1.2.5-1	CV: =	DEPS: mozilla (++)	Deps: audiofile bonobo control-center db3 (++) esound freetype2 gal19 gconf (++) gdk-pixbuf giflib glib glibwww gnome-libs gnome-print gnome-vfs-ssl gtk+ gtkhtml guile imlib libglade libjpeg libpng libtiff libwww libxml netpbm oaf orbit popt readline	Maint: Dave Vasilevsky
crypto/mozilla-1.0.0-1 (++)	CV: 1.1a	DEPS: /	Deps: glib gtk+ libjpeg libpng orbit	 Maint: Masanori Sekino
crypto/vtun-2.5b1-1	CV: 2.5	DEPS: /	Deps: lzo openssl	Maint: Sylvain Cuaz
database/postgresql-7.1.3-4	CV: 7.2.1	DEPS: /	Deps:  daemonic expat gdbm gmp libxml2 passwd readline tcltk	Maint: Finlay Dobbie
devel/cccc-3.pre54-1 (++)	CV: 3.pre63	DEPS: /	Deps: /	Maint: Sylvain Cuaz
devel/cyclo-2.0-2 (++)	CV: =	DEPS: /	Deps: fileutils	Maint: Sylvain Cuaz
devel/ddd-3.3.1-3 (++)	CV: =	DEPS: /	Deps: lesstif	Maint: Max Horn
devel/gtranslator-0.41-1	CV: =	DEPS: /	Deps: audiofile gal19 gconf (++) gnome-libs gnome-vfs-ssl scrollkeeper	Maint: Dave Morrison
devel/prcs-1.3.1-1 (++)	CV: 1.3.2	DEPS: /	Deps: diffutils gzip tar	Maint: Kaben Nanlohy
devel/zoinks-0.1.8-1 (++)	CV: =	DEPS: /	Deps: imlib x11	Maint: Ben Hines
editors/emacs21-21.2-6	CV: =	DEPS: /	Deps: emacsen-common libjpeg libpng libtiff x11 zlib	Maint: Christian Swinehart
editors/vim-6.1-1	CV: =	DEPS: /	Deps: glib gtk+	Maint: Jeffrey Whitaker
games/sdl-ttf-2.0.5-1	CV: =	DEPS: /	Deps: freetype2 sdl (++)	Maint: Max Horn
games/tads-2.5.5-3	CV: 2.5.6	DEPS: /	Deps: ncurses (++)	Maint: Alexander Strange
gnome/gnome-apt-0.3.15-3 (++)	CV: =	DEPS: apt (++)	Deps: audiofile db3 (++) esound giflib glib gnome-libs gtk+ imlib libjpeg libpng libtiff netpbm orbit x11 zlib	Maint: Justin F. Hallett
gnome/gnome-python-1.4.1-7	CV: 1.4.2 (1.99.10)	DEPS: pygtk	Deps: audiofile bonobo control-center db3 (++) dlcompat esound expat freetype2 gal19 gconf (++) gdbm gdk-pixbuf giflib glib glibwww gmp gnome-core gnome-libs gnome-print gnome-vfs-ssl gtk+ gtkglarea (++) gtkhtml guile imlib libglade libjpeg libpng libtiff libwww libxml netpbm oaf orbit popt readline tcltk	Maint: Jeremy Higgs
gnome/gnomemm-1.2.2-3 (++)	CV: 1.3.7	DEPS: libsigc++ (++) gtkmm (++)	Deps: gnome-libs	Maint: Jeremy Higgs
gnome/gtkmm-1.2.8-2 (++)	CV: 1.3.17	DEPS: libsigc++ (++)	Deps: glib gtk+	Maint: Max Horn
gnome/guppi-0.40.2-3	CV: 0.40.3	DEPS: /	Deps: audiofile bonobo control-center db3 (++) esound expat freetype2 gal19 gconf (++) gdbm gdk-pixbuf giflib glib glibwww gmp gnome-core gnome-libs gnome-print gnumeric gtk+ gtkhtml guile imlib libglade libjpeg libole2 libpng libtiff libwww libxml netpbm oaf orbit popt python (++) readline tcltk	Maint: Jeffrey Whitaker
gnome/mc-4.5.55-1	CV: =	DEPS: /	Deps: audiofile dlcompat esound giflib glib gnome-libs gtk+ imlib libjpeg libpng libtiff netpbm orbit slang	Maint: Max Horn
gnome/nautilus-1.0.6-2 (++)	CV: =	DEPS: libghttp mozilla (++)	Deps: audiofile bonobo control-center db3 (++) eel esound freetype2 gconf (++) gdk-pixbuf giflib glib gnome-libs gnome-print gnome-vfs-ssl gtk+ guile imlib libglade libjpeg libpng librsvg libtiff libxml netpbm oaf orbit popt readline	Maint: Dave Vasilevsky
gnome/pygtk-0.6.8-2	CV: 2.0	DEPS: /	Deps: audiofile db3 (++) dlcompat esound expat gdbm gdk-pixbuf giflib glib gmp gnome-libs gtk+ imlib libglade libjpeg libpng libtiff libxml netpbm orbit python (++) readline tcltk	Maint: Jeremy Higgs
graphics/dia-0.90-1	CV: =	DEPS: /	Deps: audiofile esound gdk-pixbuf giflib glib gnome-libs gtk+ imlib libjpeg libpng libtiff libunicode-gnome libxml netpbm orbit popt readline	Maint: Paul GABORIT
graphics/glui-2.1-4	CV: =	DEPS: glut	Deps: /	Maint: Matt Stephenson
languages/aplus-fsf-4.18-8-2 (++)	CV: =	DEPS: /	Deps: automake dlcompat freetype-hinting ttfmkfontdir x11 xfontpath	Maint: Brian Redman
languages/fort77-1.18-3	CV: =	DEPS: /	Deps: f2c (++)	Maint: Jeffrey Whitaker
languages/g77-2.95.2-2	CV: 3+?	DEPS: / Deps: /	Maint: Jeffrey Whitaker
languages/intercal-threaded-0.7-2 (++)	CV: =	DEPS: /	Deps: bison flex groff (++)	Maint: Alexander Strange
languages/smlnj-runtime-110.39-2	CV: 110.40	DEPS: /	Deps: /	Maint: Christopher League
libs/clanlib-0.5.4-2 (++)	CV: 0.6.1-1	DEPS: /	Deps: freetype-hinting hermes libjpeg libmikmod libogg libpng libvorbis tolua x11 zlib	Maint: Justin F. Hallett
libs/libghttp-1.0.9-3	CV: =	DEPS: /	Deps: /	Maint: None <fink-devel@lists.sourceforge.net>
libs/libshout-1.0.8-2	CV: 1.0.9	DEPS: /	Deps: libpoll	Maint: Justin F. Hallett
libs/libsigc++-1.0.4-2 (++)	CV: =	DEPS: /	Deps: /	Maint: Jeremy Higgs
libs/libxml++-0.13-1 (++)	CV: =	DEPS: /	Deps: expat gdbm gmp libxml2 tcltk	Maint: None <fink-devel@lists.sourceforge.net>
libs/neon-ssl-0.18.5-3	CV: 21.3	DEPS: /	Deps: expat gdbm gmp libxml2 openssl tcltk	Maint: Max Horn
libs/neon19-ssl-0.19.4-1	CV: 21.3	DEPS: /	Deps: expat gdbm gmp libxml2 openssl tcltk	Maint: Max Horn
libs/stlport-4.5-1 (++)	CV: 4.5.3 (5.0-0409)	DEPS: /	Deps: /	Maint: Max Horn
net/lftp-ssl-2.5.4-1 (++)	CV: =	DEPS: /	Deps: autoconf25 bison dlcompat gettext libiconv libpoll openssl readline	Maint: Justin F. Hallett
net/teknap-1.3g-2	CV: =	DEPS: /	Deps: /	Maint: Peter O'Gorman
sci/dx-4.2.0-7 (++)	CV: =	DEPS: libgl (++) netcdf (++)	Deps: automake imagemagick (++) hdf lesstif libtiff	Maint: Jeremy Erwin
sci/macaulay2-0.9.2-4 (++)	CV: =	DEPS: /	Deps: gc (++) gdbm gmp singular-factory (++) singular-libfac (++)	Maint: Dave Morrison
sci/netcdf-3.5.0-5 (++)	CV: 3.5.1-beta3	DEPS: fort77	Deps: /	Maint: Jeffrey Whitaker
sci/nickle-1.99.2-1	CV: 2.00	DEPS: /	Deps: /	Maint: Daniel Sohl
sci/numeric-atlas-21.0-1	CV: 21.3	DEPS: /	Deps: atlas db3 (++) expat f2c (++) gdbm gmp python (++) readline tcltk	Maint: Jeffrey Whitaker
sci/octave-atlas-2.1.35-4 (++)	CV: 2.1.36	DEPS: /	Deps: atlas f2c (++) fftw gnuplot hdf5 (++) libjpeg libpng readline texinfo	Maint: Jeffrey Whitaker
sci/plotutils-2.4.1-2 (++)	CV: =	DEPS: /	Deps: libpng	Maint: Jeffrey Whitaker
sci/r-base-atlas-1.5.0-2 (++)	CV: 1.5.1	DEPS: /	Deps: atlas dlcompat f2c (++) libjpeg libpng readline tcltk texinfo x11 zlib	Maint: Jeffrey Whitaker
sci/scilab-atlas-2.6-6	CV: =	DEPS: g77 (++)	Deps: atlas dlcompat tcltk xless	Maint: Jeffrey Whitaker
sci/tela-1.34-3 (++)	CV: =	DEPS: g77 (++)	Deps: atlas expat freetype2 gdbm gmp hdf libjpeg libpng libtiff libxml2 plotmtv readline sppc (++) tcltk	Maint: Jeffrey Whitaker
sci/udunits-1.11.7-2	CV: =	DEPS: /	Deps: /	Maint: Jeffrey Whitaker
sci/yorick-1.5.08-1	CV: =	DEPS: /	Deps: texinfo x11	Maint: David H. Munro
sound/lame-3.92-3	CV: =	DEPS: /	Deps: audiofile esound glib gtk+ libogg mpg123 ncurses (++)	Maint: Sylvain Cuaz
sound/mjpegtools-1.5-20011214-2 (++)	CV: 1.6.0	DEPS: /	Deps: automake glib gtk+ libdv popt sdl (++)	Maint: Chris Frank
sound/openh323-1.7.9-2 (++)	CV: 1.8.11	DEPS: pwlib (++)	Deps: /	Maint: Stefano Rodriguez
sound/pwlib-1.2.10-3 (++)	CV: 1.2.20	DEPS: /	Deps: /	Maint: Stefano Rodriguez
text/aspell-.33.7.1-2 (++)	CV: =	DEPS: /	Deps: pspell (++)	Maint: Jeffrey Whitaker
text/gv-3.5.8-4	CV: =	DEPS: /	Deps: ghostscript rman xaw3d	Maint: Jeffrey Whitaker
text/sagasu-1.0.3-1 (++)	CV: =	DEPS: gnomemm (++) gtkmm (++)	Deps: /	Maint: Ben Hines
utils/a2ps-4.12-4	CV: 4.13b	DEPS: /	Deps: /	Maint: Jeremy Higgs
utils/dejagnu-1.4.1-1 (++)	CV: 1.4.2	DEPS: /	Deps: expect tcltk	Maint: Jeffrey Whitaker
utils/fhist-1.8-2	CV: =	Maint: David Bacher
utils/ondir-0.1.4-1	CV: 0.1.5	DEPS: /	Deps: /	Maint: Ben Hines
utils/source-highlight-1.1-1 (++)	CV: 1.4	DEPS: /	Deps: /	Maint: Bill Bumgarner
utils/unrar-3.0-1 (++)	CV: =	DEPS: /	Deps: /	Maint: Ben Hines
web/aria-0.10.0-2 (++)	CV: = 0.10.1 (O.10.2 ?)	DEPS: /	Deps: glib gtk+	Maint: Jeremy Higgs
web/php-4.1.2-1	CV: 4.2.1	DEPS: /	Deps: apache bzip2 dlcompat expat freetype2 gd gdbm gmp libxml2 tcltk zlib	Maint: Max Horn
x11-system/xfree86-rootless-4.2.0-2 (++)	CV: "Cf. http://www.xfree86.org/4.2.0/ERRATA.html , point 2"	DEPS: /	Deps: xfree86-base	Maint: Jeffrey Whitaker
x11-wm/xfce-3.8.10-2	CV: 3.8.16	DEPS: /	Deps: audiofile dlcompat esound gdk-pixbuf giflib glib gnome-libs gtk+ imlib libjpeg libpng libtiff netpbm orbit	Maint: Jeremy Higgs
x11/aterm-0.4.2-2	CV: =	DEPS: /	Deps: giflib glib gtk+ imlib libjpeg libpng libtiff netpbm x11	Maint: Paul Swenson
x11/eterm-0.9-1	CV: 0.9.1	DEPS: /	Deps: giflib glib gtk+ imlib libjpeg libpng libtiff netpbm	Maint: Max Horn
x11/fltk-1.1.0rc1-1 (++)	CV: 1.1.0rc3	DEPS: /	Deps: /	Maint: Sylvain Cuaz
x11/glut-3.7-1	CV: =	DEPS: libgl (++)	Deps: /	Maint: Matt Stephenson
x11/qt2-2.3.2-1 (++)	CV: =	DEPS: /	Deps: libjpeg libpng x11 zlib	Maint: Benjamin Reed
x11/qt3-3.0.4-7 (++)	CV: =	DEPS: libgl (++)	Deps: dlcompat freetype2 libjpeg  libpng xfree86-base	Maint: Benjamin Reed
x11/wxgtk-2.3.2-5 (++)	CV: =	DEPS: /	Deps: glib gtk+ freetype-hinting freetype2 libgl (++) libjpeg libpng libtiff	Maint: Sylvain Cuaz
x11/wxmac-2.3.2-4 (++)	CV: =	DEPS: /	Deps: freetype-hinting libjpeg libpng libtiff	Maint: Jeffrey Whitaker


Among those the following are install_name errors :
dia
gnome-python
nautilus
php
pygtk
xfce

A very large proportion of the others go through "backward_warning.h",
and a small test of just upping the version number in dejagnu to 1.4.2
and in source-highlight to 1.4 made those packages build without
problem. Would it be possible for you to ask maintainers at least to
update any of their packages in the above list to their latest versions
if any ?


Finally, c++ packages (same definition) that do build :
abiword astyle bochs class-dump cups db3 db4 dpkg drscheme f2c gc gconf
gconf2 gengetopt geomview glib2 gnome-games gnome-pim gnome-utils
graphviz groff gtkglarea gtop hdf5 imagemagick jags jikes launch
libdivxdecore mad mysql ncurses oleo openjade pango1 pspell python sdl
sdl-net singular-factory singular-libfac smpeg sppc swig tmake worker
xpdf
</pre>
<?
include "../../footer.inc";
?>
