<?
$title = "GCC3 Errors";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2002/06/26 01:36:55';

include "header.inc";
?>

<h1>Packages with errors when compiling under gcc3</h1>
<p>JF Mertens has provided an extensive list of packages which give
errors when compiled with gcc3.  The current list is dated 26 June 2002.
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

The link (created by g77.info) in /usr/lib has been changed to always
point to the correct file: libg2c.a -> gcc/darwin/2.95.2/libg2c.a With
this change, the old (gcc2) g77 is still functional with gcc3 _ though
it doesn't build...


crypto/cyrus-sasl-1.5.27-2	CV: 2.1.5	DEPS: /	Deps: db3 (++) openssl	Maint: Michael McKibben <mmckibben@users.sourceforge.net>
crypto/mozilla-1.0.0-1 (++)	CV: 1.1a	DEPS: /	Deps: glib gtk+ libjpeg libpng orbit	 Maint: Masanori Sekino <msek@users.sourceforge.net>
crypto/vtun-2.5b1-1	CV: 2.5	DEPS: /	Deps: lzo openssl	Maint: Sylvain Cuaz <zauc@noos.fr>
database/postgresql-7.1.3-4	CV: 7.2.1	DEPS: /	Deps:  daemonic expat gdbm gmp libxml2 passwd readline tcltk	Maint: Finlay Dobbie <finlayd@users.sourceforge.net>
devel/cccc-3.pre54-1 (++)	CV: 3.pre63	DEPS: /	Deps: /	Maint: Sylvain Cuaz <zauc@noos.fr>
devel/cyclo-2.0-2 (++)	CV: =	DEPS: /	Deps: fileutils	Maint: Sylvain Cuaz <zauc@noos.fr>
devel/ddd-3.3.1-3 (++)	CV: =	DEPS: /	Deps: lesstif	Maint: Max Horn <max@quendi.de>
devel/gtranslator-0.41-1	CV: =	DEPS: /	Deps: audiofile gal19 gconf (++) gnome-libs gnome-vfs-ssl scrollkeeper	Maint: Dave Morrison <dmrrsn@users.sourceforge.net>
devel/prcs-1.3.1-1 (++)	CV: 1.3.2	DEPS: /	Deps: diffutils gzip tar	Maint: Kaben Nanlohy <kaben@users.sourceforge.net>
devel/zoinks-0.1.6-1 (++)	CV: 0.1.7	DEPS: /	Deps: imlib x11	Maint: Ben Hines <bhines@alumni.ucsd.edu>
editors/vim-6.1-1	CV: =	DEPS: /	Deps: glib gtk+	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
games/sdl-ttf-2.0.5-1	CV: =	DEPS: /	Deps: freetype2 sdl (++)	Maint: Max Horn <max@quendi.de>
gnome/gnome-python-1.4.1-7	CV: 1.4.2 (1.99.10)	DEPS: pygtk	Deps: audiofile bonobo control-center db3 (++) dlcompat esound expat freetype2 gal19 gconf (++) gdbm gdk-pixbuf giflib glib glibwww gmp gnome-core gnome-libs gnome-print gnome-vfs-ssl gtk+ gtkglarea (++) gtkhtml guile imlib libglade libjpeg libpng libtiff libwww libxml netpbm oaf orbit popt readline tcltk	Maint: Jeremy Higgs <jhiggs@iprsystems.com>
gnome/gnomemm-1.2.2-3 (++)	CV: 1.3.7	DEPS: libsigc++ (++) gtkmm (++)	Deps: gnome-libs	Maint: Jeremy Higgs <jhiggs@iprsystems.com>
gnome/gtkmm-1.2.8-2 (++)	CV: 1.3.17	DEPS: libsigc++ (++)	Deps: glib gtk+	Maint: Max Horn <max@quendi.de>
gnome/guppi-0.40.2-3	CV: 0.40.3	DEPS: /	Deps: audiofile bonobo control-center db3 (++) esound expat freetype2 gal19 gconf (++) gdbm gdk-pixbuf giflib glib glibwww gmp gnome-core gnome-libs gnome-print gnumeric gtk+ gtkhtml guile imlib libglade libjpeg libole2 libpng libtiff libwww libxml netpbm oaf orbit popt python (++) readline tcltk	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
gnome/mc-4.5.55-1	CV: =	DEPS: /	Deps: audiofile dlcompat esound giflib glib gnome-libs gtk+ imlib libjpeg libpng libtiff netpbm orbit slang	Maint: Max Horn <max@quendi.de>
gnome/nautilus-1.0.6-2 (++)	CV: =	DEPS: libghttp mozilla (++)	Deps: audiofile bonobo control-center db3 (++) eel esound freetype2 gconf (++) gdk-pixbuf giflib glib gnome-libs gnome-print gnome-vfs-ssl gtk+ guile imlib libglade libjpeg libpng librsvg libtiff libxml netpbm oaf orbit popt readline	Maint: Dave Vasilevsky <thevas@mac.com>
gnome/pygtk-0.6.8-2	CV: 2.0	DEPS: /	Deps: audiofile db3 (++) dlcompat esound expat gdbm gdk-pixbuf giflib glib gmp gnome-libs gtk+ imlib libglade libjpeg libpng libtiff libxml netpbm orbit python (++) readline tcltk	Maint: Jeremy Higgs <jhiggs@iprsystems.com>
graphics/glui-2.1-4	CV: =	DEPS: glut	Deps: /	Maint: Matt Stephenson <cattrap@users.sourceforge.net>
languages/aplus-fsf-4.18-8-2 (++)	CV: =	DEPS: /	Deps: automake dlcompat freetype-hinting ttfmkfontdir x11 xfontpath	Maint: Brian Redman <aplus@aplusdev.org>
languages/fort77-1.18-3	CV: =	DEPS: /	Deps: f2c (++)	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
languages/intercal-threaded-0.7-2 (++)	CV: =	DEPS: /	Deps: bison flex groff (++)	Maint: Alexander Strange <MrVacBob@mac.com>
languages/smlnj-runtime-110.39-2	CV: 110.40	DEPS: /	Deps: /	Maint: Christopher League <league@contrapunctus.net>
libs/clanlib-0.5.4-2 (++)	CV: O.6.1-1	DEPS: /	Deps: freetype-hinting hermes libjpeg libmikmod libogg libpng libvorbis tolua x11 zlib	Maint: Justin F. Hallett <thesin@southofheaven.net>
libs/libghttp-1.0.9-3	CV: =	DEPS: /	Deps: /	Maint: None <fink-devel@lists.sourceforge.net>
libs/libshout-1.0.8-2	CV: 1.0.9	DEPS: /	Deps: libpoll	Maint: Justin F. Hallett <thesin@users.sourceforge.net>
libs/libsigc++-1.0.4-2 (++)	CV: =	DEPS: /	Deps: /	Maint: Jeremy Higgs <jhiggs@iprsystems.com>
libs/libxml++-0.13-1 (++)	CV: =	DEPS: /	Deps: expat gdbm gmp libxml2 tcltk	Maint: None <fink-devel@lists.sourceforge.net>
libs/neon-ssl-0.18.5-3	CV: 21.3	DEPS: /	Deps: expat gdbm gmp libxml2 openssl tcltk	Maint: Max Horn <max@quendi.de>
libs/neon19-ssl-0.19.4-1	CV: 21.3	DEPS: /	Deps: expat gdbm gmp libxml2 openssl tcltk	Maint: Max Horn <max@quendi.de>
libs/stlport-4.5-1 (++)	CV: 4.5.3 (5.0-0409)	DEPS: /	Deps: /	Maint: Max Horn <max@quendi.de>
net/lftp-ssl-2.5.4-1 (++)	CV: =	DEPS: /	Deps: autoconf25 bison dlcompat gettext libiconv libpoll openssl readline	Maint: Justin F. Hallett <thesin@users.sourceforge.net>
net/teknap-1.3g-2	CV: =	DEPS: /	Deps: /	Maint: Peter O'Gorman <peter@pogma.com>
sci/dx-4.2.0-7 (++)	CV: =	DEPS: libgl (++) netcdf (++)	Deps: automake imagemagick (++) hdf lesstif libtiff	Maint: Jeremy Erwin <jerwin@ponymail.com>
sci/macaulay2-0.9.2-4 (++)	CV: =	DEPS: /	Deps: gc (++) gdbm gmp singular-factory (++) singular-libfac (++)	Maint: Dave Morrison <dmrrsn@users.sourceforge.net>
sci/netcdf-3.5.0-5 (++)	CV: 3.5.1-beta3	DEPS: fort77	Deps: /	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
sci/nickle-1.99.2-1	CV: 2.00	DEPS: /	Deps: /	Maint: Daniel Sohl <ford@anent.org>
sci/numeric-atlas-21.0-1	CV: 21.3	DEPS: /	Deps: atlas db3 (++) expat f2c (++) gdbm gmp python (++) readline tcltk	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
sci/octave-atlas-2.1.35-4 (++)	CV: 2.1.36	DEPS: /	Deps: atlas f2c (++) fftw gnuplot hdf5 (++) libjpeg libpng readline texinfo	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
sci/plotutils-2.4.1-2 (++)	CV: =	DEPS: /	Deps: libpng	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
sci/r-base-atlas-1.5.0-2 (++)	CV: 1.5.1	DEPS: /	Deps: atlas dlcompat f2c (++) libjpeg libpng readline tcltk texinfo x11 zlib	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
sci/scilab-atlas-2.6-6	CV: =	DEPS: g77 (++)	Deps: atlas dlcompat tcltk xless	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
sci/tela-1.34-3 (++)	CV: =	DEPS: g77 (++)	Deps: atlas expat freetype2 gdbm gmp hdf libjpeg libpng libtiff libxml2 plotmtv readline sppc (++) tcltk	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
sci/udunits-1.11.7-2	CV: =	DEPS: /	Deps: /	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
sci/yorick-1.5.08-1	CV: =	DEPS: /	Deps: texinfo x11	Maint: David H. Munro <munro1@llnl.gov>
sound/lame-3.92-3	CV: =	DEPS: /	Deps: audiofile esound glib gtk+ libogg mpg123 ncurses (++)	Maint: Sylvain Cuaz <zauc@noos.fr>
sound/mjpegtools-1.5-20011214-2 (++)	CV: 1.6.0	DEPS: /	Deps: automake glib gtk+ libdv popt sdl (++)	Maint: Chris Frank <cpfrank@sourceforge.net>
sound/openh323-1.7.9-2 (++)	CV: 1.8.11	DEPS: pwlib (++)	Deps: /	Maint: Stefano Rodriguez <srodriguez@mrcom.it>
sound/pwlib-1.2.10-3 (++)	CV: 1.2.20	DEPS: /	Deps: /	Maint: Stefano Rodriguez <srodriguez@mrcom.it>
text/aspell-.33.7.1-2 (++)	CV: =	DEPS: /	Deps: pspell (++)	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
text/gv-3.5.8-4	CV: =	DEPS: /	Deps: ghostscript rman xaw3d	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
text/sagasu-1.0.2-1 (++)	CV: 1.0.3	DEPS: gnomemm (++) gtkmm (++)	Deps: /	Maint: Ben Hines <bhines@alumni.ucsd.edu>
utils/a2ps-4.12-4	CV: 4.13b	DEPS: /	Deps: /	Maint: Jeremy Higgs <jhiggs@iprsystems.com>
utils/dejagnu-1.4.1-1 (++)	CV: 1.4.2	DEPS: /	Deps: expect tcltk	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
utils/fhist-1.8-2	CV: =	Maint: David Bacher <drbacher@alum.mit.edu>
utils/ondir-0.1.4-1	CV: 0.1.5	DEPS: /	Deps: /	Maint: Ben Hines <bhines@alumni.ucsd.edu>
utils/source-highlight-1.1-1 (++)	CV: 1.4	DEPS: /	Deps: /	Maint: Bill Bumgarner <bbum@codefab.com>
utils/unrar-3.0-1 (++)	CV: =	DEPS: /	Deps: /	Maint: Ben Hines <bhines@alumni.ucsd.edu>
web/aria-0.10.0-2 (++)	CV: = 0.10.1 (O.10.2 ?)	DEPS: /	Deps: glib gtk+	Maint: Jeremy Higgs <jhiggs@iprsystems.com>
web/php-4.1.2-1	CV: 4.2.1	DEPS: /	Deps: apache bzip2 dlcompat expat freetype2 gd gdbm gmp libxml2 tcltk zlib	Maint: Max Horn <max@quendi.de>
x11-system/xfree86-rootless-4.2.0-2 (++)	CV: "Cf. http://www.xfree86.org/4.2.0/ERRATA.html , point 2"	DEPS: /	Deps: xfree86-base	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>
x11-wm/xfce-3.8.10-2	CV: 3.8.16	DEPS: /	Deps: audiofile dlcompat esound gdk-pixbuf giflib glib gnome-libs gtk+ imlib libjpeg libpng libtiff netpbm orbit	Maint: Jeremy Higgs <jhiggs@iprsystems.com>
x11/aterm-0.4.2-2	CV: =	DEPS: /	Deps: giflib glib gtk+ imlib libjpeg libpng libtiff netpbm x11	Maint: Paul Swenson <pds@mac.com>
x11/eterm-0.9-1	CV: 0.9.1	DEPS: /	Deps: giflib glib gtk+ imlib libjpeg libpng libtiff netpbm	Maint: Max Horn <max@quendi.de>
x11/fltk-1.1.0rc1-1 (++)	CV: 1.1.0rc3	DEPS: /	Deps: /	Maint: Sylvain Cuaz <zauc@users.sf.net>
x11/glut-3.7-1	CV: =	DEPS: libgl (++)	Deps: /	Maint: Matt Stephenson <cattrap@users.sourceforge.net>
x11/openmotif3-2.2.2-1	CV: =	DEPS: /	Deps: x11	Maint: Ben Hines <bhines@alumni.ucsd.edu>
x11/qt2-2.3.2-1 (++)	CV: =	DEPS: /	Deps: libjpeg libpng x11 zlib	Maint: Benjamin Reed <ranger@befunk.com>
x11/qt3-3.0.4-7 (++)	CV: =	DEPS: libgl (++)	Deps: dlcompat freetype2 libjpeg  libpng xfree86-base	Maint: Benjamin Reed <ranger@befunk.com>
x11/wxgtk-2.3.2-5 (++)	CV: =	DEPS: /	Deps: glib gtk+ freetype-hinting freetype2 libgl (++) libjpeg libpng libtiff	Maint: Sylvain Cuaz <zauc@noos.fr>
x11/wxmac-2.3.2-4 (++)	CV: =	DEPS: /	Deps: freetype-hinting libjpeg libpng libtiff	Maint: Jeffrey Whitaker <jsw@cdc.noaa.gov>


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
include "footer.inc";
?>
