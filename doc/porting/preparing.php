<?
$title = "Porting - Preparing for 10.2";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2002/06/23 04:09:01';

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
build unversioned under bash.  
<b> Note: you do not need this patch with
 libtool-1.3.5, for example, if you are using UpdateLibtool:
 True. </b>
The symptom: when building under bash,
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
which Apple provided with the April 2002 Developer Tools.  
</p><p>In general, many packages which have loadable modules and use
libtool are 
failing with an install_name error at the moment, because libtool passes
the -install_name flag even along with the -bundle flag (when it is not
strictly needed).  This behavior was accepted by the gcc2 compiler but is
not being accepted by the gcc3 compiler.  A fix has been found by Ben
Hines; please <a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02025.html">help
him test it.</a>
Note that you do not need Ben's patch if your package uses libtool-1.3.5
(for example, if you are using <tt><nobr>UpdateLibtool: True</nobr></tt>)
since it has already been incorporated into a revised version of fink's
ltconfig file (available in pre-release versions of fink).
</p>
<p>JF Mertens has provided an 
<a href="http://fink.sourceforge.net/doc/porting/gcc3_errs.php">extensive 
list of packages which fail to compile under gcc3,</a> updated
on 22 June 2002. </p>
<p>
Earlier reports, originally compiled on  May 22 and updated several times,
were provided by Jeff
Hester, Jan de Leeuw, J-F Mertens, Mathias Meyer, Alexander Strange,
and Chris Zubrzycki.  Those lists, now somewhat out of date, follow:
</p><p><b> Unsuccessful packages:</b></p>
<ol><li> apt-0.5.4-3 (breaks with undefined symbols such as 
__ZTI9pkgSystem) </li>
<li>bonobo-1.0.20-1(breaks with install_name error) <b>fixed June 12</b></li>
<li><a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02051.html">emacs21</a></li>
<li>gaim-0.57-1 (breaks with install_name error) <b>fixed June 13</b></li>
<li>galeon-1.2.1-1</li>
<li>gconf-1.0.9-1(breaks with install_name error) <b>fixed June 12</b></li>
<li>gnome-core-1.4.0.8-1 (breaks with install_name error) <b>fixed June 12</b></li>
<li>gnome-vfs-1.0.5-4 (breaks with install_name error) <b>fixed June 12</b></li>
<li>gv-3.5.8-4</li>
<li>
<pre>
lftp-ssl_2.5.2-2 failed with :
g++ -DHAVE_CONFIG_H -I. -I. -I../include -I../include   -no-cpp-precomp 
-I/sw/include  -O2 -Wall -Wwrite-strings -Woverloaded-virtual 
-fno-exceptions -fno-rtti -fno-implement-inlines -Winline -c -o 
FileCopyFtp.o `test -f FileCopyFtp.cc || echo './'`FileCopyFtp.cc
In file included from FileAccess.h:27,
                 from FileCopy.h:38,
                 from FileCopyFtp.h:26,
                 from FileCopyFtp.cc:27:
../include/trio.h:172:1: warning: &quot;vfscanf&quot; redefined
In file included from ../include/trio.h:25,
                 from FileAccess.h:27,
                 from FileCopy.h:38,
                 from FileCopyFtp.h:26,
                 from FileCopyFtp.cc:27:
/usr/include/stdio.h:330:1: warning: this is the location of the 
previous definition
In file included from log.h:26,
                 from FileCopyFtp.cc:28:
/usr/include/unistd.h:135: declaration of C function `int getopt(int, 
char*
   const*, const char*)' conflicts with
../include/getopt.h:104: previous declaration `int getopt()' here
make[1]: *** [FileCopyFtp.o] Error 1
</pre></li>
<li>libghttp-1.0.9-3 (internal link edit command failed)</li>
<li>librep-0.14-6 (breaks with install_name error) <b>install_name error
was fixed but there are other problems now</b></li>
<li>libxml2-2.4.22-1 (breaks with install_name error) <b>fixed June 11</b></li>
<li>libxslt-1.0.18-1 failed with install_name error <b>seems OK as of June 13</b></li>
<li>mc-4.5.55-1 (see log)</li>
<li>mozilla-1.0rc3-1 (iid_NS_ISUPPORTS_IID causes a section type conflict, 
see log)</li>
<li>nautilus-1.0.6-2 (breaks with install_name error)</li>
<li>qt3-3.0.4-5</li>
<li>
readline-4.2a-5 has undefined symbol errors and others.
</li>
<li>
stlport-4.5-1 fails since the start...</li>
<li>tads-2.5.5-3 breaks because of weird va_args() calling</li>
<li>
ddd-3.3.1-3:
<pre>
c++ -DHAVE_CONFIG_H -I. -I. -I. -I./.. -isystem /usr/X11R6/include  
-no-cpp-precomp -I/sw/include  -DNDEBUG -O2 -g -W -Wall -mminimal-toc  
-trigraphs  -c logplayer.C
In file included from 
/usr/include/gcc/darwin/3.1/g++-v3/backward/iostream.h:31,
                  from strclass.h:412,
                  from logplayer.h:36,
                  from logplayer.C:36:
/usr/include/gcc/darwin/3.1/g++-v3/backward/backward_warning.h:32:2: 
warning: #warning This file includes at least one deprecated or 
antiquated header. Please consider using one of the 32 headers found in 
section 17.4.1.2 of the C++ standard. Examples include substituting the 
&lt;X&gt; header for the &lt;X.h&gt; header for C++ includes, or &lt;sstream%gt; instead 
of the deprecated header &lt;strstream.h&gt;. To disable this warning use 
-Wno-deprecated.
In file included from logplayer.h:36,
                  from logplayer.C:36:
strclass.h: In member function `string&amp; 
string::operator=(std::ostrstream&amp;)':
strclass.h:1059: warning: unused variable `const int frozen'
In file included from logplayer.C:46:
/usr/include/gcc/darwin/3.1/g++-v3/backward/fstream.h: At global scope:
/usr/include/gcc/darwin/3.1/g++-v3/backward/fstream.h:38: using 
declaration `
    streampos' introduced ambiguous type `streampos'
make[1]: *** [logplayer.o] Error 1
</pre></li>
<li>
qt3-3.0.4-7:
<pre>
ld: .obj/release-mt/qimage.o has external relocation entries in 
non-writable section (__TEXT,__text) for symbols:
__Z4endlR11QTextStream
/usr/bin/libtool: internal link edit command failed
</pre></li>
<li>smpeg-0.4.4-4 (undefined symbols)</li>
<li>sdl-mixer-1.2.4-1 (Normal, since it depends on the c++ package smpeg 
which didn't build)</li>
<li>sdl-ttf-2.0.5-1</li>
<li>dejagnu-1.4.1-1 (Breaks since the start, possibly too old c++ code, and 
not worth fixing
before going to version 1.4.2)</li>
<li>pango1-1.0.2-1, gtk+2-2.0.3-1, gdk-pixbuf-0.16.0-6: install_name error</li>
<li>fftw with &quot;-enable fortran&quot; (ie, the one I have in 'local') (&quot;fortran 
compiler cannot create executables&quot;)</li>
<li>fort77-1.18-3 (fails in the tests, I guess because the interface to the
(c++) f2c libraries to which it links has changed)</li>
<li>netcdf-3.5.0-5</li>
<li>Failures, from J-F Mertens on June 12:
orbit2-2.3.108-2 ( install_name error) prcs-1.3.1-1 aspell-.33.7.1-2 
plotutils-2.4.1-2 cyrus-sasl-1.5.27-2 a2ps-4.12-4 libghttp-1.0.9-3 
librep-0.14-6 (install_name error) libsigc++-1.0.4-2 (undefined symbols)
sendfile: autoconf error... (autoconf25 is installed, I'll retry once 
without, or with autoconf)
</li>
<li>Failures, from J-F Mertens on June 13:
libxml++-0.13-1: configure produces no makefile. There are 'ld: 
Undefined symbols' errors in the config.log _ but I'm not sure at all 
this is the problem.
NOTE: Maintainer = None
smlnj-runtime-110.39-2
postgresql-7.1.3-4 (the first compilation, 'gcc -traditional-cpp 
-g ....', fails _ flags are still adequate ?)
g-wrap-1.1.11-4 (install_name error)
neon-ssl-0.18.5-3, neon19-ssl-0.19.4-1 (internal link edit command 
failed _ seems same problem in both)
macaulay2-0.9.2-4, cccc-3.pre54-1, cyclo-2.0-2 : again this 
backward_warning.h leading to error.
intercal-threaded-0.7-2 vtun-2.5b1-1 (parse errors)
fhist-1.8-2 nickle-1.99.2-1 teknap-1.3g-2 pwlib-1.2.10-3 
openh323-1.7.9-2 (the last one conceivably because of failure of pwlib, 
which uses c++ _ so it was build with a gcc2 pwlib installed)
And of course algae fails since no g77 compiler _ this is really urgent, 
even just a beta...
</li>
</ol>
<p><b> Successful packages:</b></p>
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
<li><a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02087.html">long
list from Chris Zubrzycki on May 29</a></li>
<li>From J-F Mertens on June 7: 
debianutils libiconv gettext ncurses bzip2 gzip tar dpkg
zlib dlcompat readline m4 autoconf25 automake15
make texinfo libtool libtool14 bison flex ssed gawk
and gengetopt (latest versions) build correctly with gcc3.
Also abiword-1.0.2-1, oaf-0.6.10-1 and netpbm-9.25-1
build correctly with gcc3.
 Compiled succesfully with gcc3:
 atlas-3.3.15-1 rrdtool-1.0.37-3 wget-ssl-1.8.2-1
</li>
<li>From Mathias Meyer on June 9:
libxslt-1.0.18-1
slang-1.4.5-3
librsvg-1.0.3-2
eel-1.0.2-3
libxpg4-20010605-17
fink-0.9.12-1
base-files-1.5-1
gzip-1.2.4a-6
</li>
<li>Additional successes, from J-F Mertens on June 8:
texi2html       1.64-1
findutils       4.1-4
man             1.5j-3
groff           1.17.2-1
grep            2.4.2-3
diffutils       2.8.1-1
patch           2.5.4-2
textutils       2.0-4
curl-ssl        7.9.7-1
cvs             1.11.2-1
nano            1.0.9-1
bash            2.05a-4
zsh             4.0.4-1
tcsh            6.11-1
fileutils       4.1-3
gdbm            1.8.0-6
gmp             4.0.1-2
expat           1.95.1-3
nano            1.0.9-1
bash            2.05a-4
zsh             4.0.4-1
tcsh            6.11-1
fileutils       4.1-3
gdbm            1.8.0-6
gmp             4.0.1-2
expat           1.95.1-3
tcltk           8.3.3-7
python          2.2.1-6
</li>
<li>Packages which work, from J-F Mertens on June 11:
Works: sgml-entities-iso8879-1986-3 docbook-dsssl-nwalsh-1.76-1 
docbook-dtd-4.1.2-2 gtk-doc-0.9-1 sdl-1.2.4-2 sdl-image-1.2.2-1 
sdl-net-1.2.4-1 xfree86-base-4.2.0-6 xfree86-rootless-4.2.0-2 
glib-1.2.10-6 libxpm-4.7-2 xforms-0.9999-3 gdbm-1.8.0-6 f2c-20020123-2 
geomview-1.8.1-3 worker-2.5.0-1 glib2-2.0.3-1 db3-3.3.11-7 
libtool-1.3.5-11 daemonic-20010902-1 passwd-20020329-1 anacron-2.3-3 
pcre-3.9-2 deborphan-1.0-1 audiofile-0.2.3-4 libjpeg-6b-5 gnupg-1.0.7-1 
gpgme-0.3.6-3 xfontpath-0.4-1 x-ghostscript-fonts-20020206-3 
freetype-hinting-1.3.1-6 freetype2-2.0.8-4 ttfmkfontdir-1.0-1 
xfonts-intl-1.2-1 ghostscript7.04-1 libtool14-1.4.2-6 epstool-2.1-1 
app-defaults-20010814-2 tcltk-8.3.3-7 expect-5.33.0-1 rrdtool-1.0.37-3 
ruby-1.6.6-2 tgif-4.1.41-1 xless-1.7-1 python-2.2.1-6 glib2-2.0.3-1 
atk1-1.0.2-1 esound-0.2.23-5 t1lib1-1.3.1-1 esound-0.2.27-1 
t1lib1-1.3.1-2 lesstif-0.93.18-6 xbae-4.9.1-6 xlt-9.2.9-2 
libpng-1.0.12-6 libjpeg-6b-5 libtiff-3.5.7-7 xmhtml-1.1.7-2 
gtk+-1.2.10-10 calcoo-1.3.8-1 giflib-4.1.0-5 netpbm-9.25-1 
imlib-1.9.10-9 orbit-0.5.15-2 gnome-libs-1.4.1.7-1 libxml-1.8.17-2 
libglade-0.17-3 libpoll-1.1-3 cups-1.1.14-1 xdelta-1.1.3-1 pdflib-4.0.2-1
</li>
<li>Build correctly (apparently..), from J-F Mertens on June 12:
openjade-1.3.1-1 libxml2-2.4.22-2 glib-1.2.10-7 guile-1.4-4 
scrollkeeper-0.2-7 gnome-print-0.36-1 gnome-games-1.4.0.4-2 
pdksh-5.2.14-2 scsh-0.5.3-1 db4-4.0.14-7 popt-1.6.2-2 gnet-1.1.2-1 
launch-1.0a9-2 pspell-.12.2-1 astyle-1.15.3-1 openldap-ssl-2.0.23-3 
cpio-2.4.2-3 dict-1.5.5-2 libwww-5.3.2-3 bc-1.06-1 hugs-1998.200102-3 
hx-0.1.39-5 hxd-0.1.39-2 indent-2.2.6-1 ispell-3.2.06-2 libogg-1.0rc3-3 
libpcap-0.6.2-5 libvorbis-1.0rc3-3 mutt-ssl-1.3.99i-1 ncftp-3.1.3-1 
netcat-1.10-4 pine-ssl-4.44-2 pth-1.4.0-6 recode-3.6-6 slang-1.4.5-3 
less-358-4 links-ssl-0.96-3 lynx-ssl-2.8.4-2 hfsutils-3.2.6-1 
python-fchksum-1.6.1-1 intltool-0.18-2 linc1-0.1.21-2 libidl2-0.7.4-3 
apache-1.3.23-1 (with the correction in the bug tracker) 
libproplist-0.10.1-4 rlpr-2.04-3 mysql-3.23.49-2 hermes-1.3.2-2 
libpng3-1.2.1-2 libmpeg-1.3.1-6 libmikmod-3.1.9-3 hexcurse-1.54-1 
metapixel-0.7-2 libfame-0.8.10-1 gnuplot-3.8h.0-7 compress-zlib-
pm-1.16-1 date-manip-pm-5.40-2 data-showtable-pm-3.3-1 cvs2cl-2.38-1 
lrzsz-0.12.20-1 zssh-1.4-2 yap-4.3.19-1 yafc-0.7.9-1 xml-writer-pm-0.4-2 
xml-parser-pm-2.30-2 xml-simple-pm-1.05-2 xml-regexp-pm-0.03-2 
xdelta-1.1.3-1 openurl-20010728-1 gc-6.0-4 w3m-ssl-0.2.5.1-1 w3m-
el-1.2.4-1 mpack-1.5-2 base64-1.3-1 mime-base64-pm-2.12-2 memoize-
pm-0.66-2 lzo-1.07-3 logcheck-1.1.1-2 uri-pm-1.18-1 unrtf-0.18.1-1 
tree-1.3-2 tmake-1.7-2 tie-ixhash-pm-1.21-2 tftp-hpa-0.26-1 
term-readline-pm-0.9908-1 term-progressbar-pm-1.0-2 term-readkey-
pm-2.18-1 sha-pm-1.2-1 libole2-0.2.4-2 libnet-1.0.2a-2 libnet-pm-1.09-2 
libiodbc-2.50.3-6 tcptraceroute-1.2-2 tcpflow-0.20-1 smpeg-0.4.4-5 
sdl-mixer-1.2.4-2 dnstracer-1.5-1 calcoo-1.3.9-1
</li>
<li>More successes, from J-F Mertens on June 13 :
gtk-doc-0.9-2 lesstif-0.93.18-7 aquaterm-0.3.0a-4 t1utils-1.26-1 
surfraw-1.0.7-1 stunnel-3.22-1
storable-pm-1.0.14-1 slib-2d2-2 singular-factory-1.3b-3 
singular-libfac-0.3.2-2 samba-ssl-2.2.4-1
rsync-2.5.5-1 rpl-1.3.0b3-1 rec-descent-pm-1.80-1 pure-ftpd-1.0.2-1 
psutils-a4-1.17-1 psgml-1.2.4-1
pinepgp-0.17.2-1 filter-util-pm-1.26-1 filter-simple-pm-0.77-1 gsl-1.1-1 
ee-1.4.2-3 dosunix-1.0.13-1
digest-md5-pm-2.16-5 dbi-pm-1.230-1 dbd-pg-pm-1.01-1 io-stringy- 
pm-2.108-1 mailtools-pm-1.44-1
mime-tools-pm-5.411a-1 convert-tnef-pm-0.17-1 mp3-info-pm-1.01-1 
inline-pm-0.43-2 ntop-1.1-1
libxpm-4.7-2 net-snmp-ssl-5.0-3 html-tagset-pm-3.03-2 html-fromtext-
pm-1.005-2 html-parser-pm-3.25-2
log-tracemsgs-pm-1.0-2 lingua-preferred-pm-0.1-2 
lingua-en-numbers-ordinate-pm-0.01-2
libxml-pm-0.07-2 libwww-pm-5.64-2 xml-dom-pm-1.39-1 libunicode-
gnome-0.4-2 keychain-1.7-1
joe-2.9.8-pre1-1 jless-358-iso254-1 ant-1.4.1-2 html-tableextract-
pm-1.07-2 hdf-4.1r4-2 hdf5-1.4.2-4
gpgme-0.3.6-3 gnut-0.4.28-2 finance-quote-pm-1.06-2 
finance-quotehist-pm-0.25-1 ettercap-ssl-0.6.5-1
dbd-mysql-pm-2.1017-1 jikes-1.15-1 xerces-j-2.0.1-1 xerces-j-
javadocs-2.0.1-1 xalan-j-2.2.D14-2
xalan-j-javadocs-2.2.D14-2 jdom-b7-2 compface-1.4-2 class-dump-2.1.5-1 
bsdmktemp-1.4-1 axel-1.0-1
appconfig-pm-1.52-1 anubis-3.0.0-1 align-1.0.0-1 afio-2.4.6-2 hc-1.1-1 
pccts-1.33.mr33-1
unicode-string-pm-2.06-2 lv-4.49.4-2 mhonarc-2.5.5-1 mad-0.14.2b-1 
gnujaxp-1.0beta1-1 junit-3.7-1
sitecopy-ssl-0.11.4-5 cadaver-ssl-0.19.1-1 lout-3.25-1 cook-2.19-1 
gsm-1.0.10-1 io-string-pm-1.01-1
babelfish-pm-0.10-1 gnome-user-docs-1.4.1.1-2 eperl-2.2.14-2 eperl-
pm-2.2.14-2 log4j-1.1.3-1
lclint-2.5r-1 macosx-file-pm-0.64-1 makepatch-2.00.08-1 mldbm-pm-2.00-1 
mldbm-sync-pm-0.25-1
xtail-2.1-1 smalleiffel-20010719-1 exuberant-ctags-5.2.3-1 
bow-20010926-1 calc-2.11.5t4.5-1
docbook-dsssl-ldp-3.8-2 bind9-ssl-9.2.1-1 gforth-0.5.0-1 moscow-ml-2.00-4
swi-prolog-lite-5.0.6-1 splint-3.0.1.6-1 metrics-1.0-2 mpg123-pre0.59s-3 
libdvdcss-1.1.1-2
libdivxdecore-0.4.7-1 detex-2.7-2 yydecode-0.2.8-2 tidy-4aug00-1 
cscope-15.3-1 jed-0.99-1
portsentry-1.1-1 junkbuster-2.0.2-1 lua-4.0-2 tolua-4.0a-2 
drscheme-103p1-1 librep-0.14-7 esound-0.2.27
Also:
clisp-2.27-1 (but some conftest crashes during configuration _ this 
happened already under gcc2 if I
remember well)
dhcp-3.0-2 (but: source has moved to 
ftp://ftp.isc.org/isc/dhcp/dhcp-3.0-history/)
sniffit-0.3.5-5, but install fails because of typos in info file:
./install-sh sniffit.5 /sw/src/root-
sniffit-0.3.5-5//sw/src/root-sniffit-0.3.5-5/sw/share/man/man5/sniffit.5
./install-sh sniffit.8 /sw/src/root-
sniffit-0.3.5-5//sw/src/root-sniffit-0.3.5-5/sw/share/man/man8/sniffit.8
</li>
</ol>
<p>Another issue with the gcc3 compiler is an incompatibility for C++ ABIs
between gcc2 and gcc3.  In practice, this means that C++ programs compiled
with gcc3 cannot link to libraries compiled with gcc2.</p>
<p>From J-F Mertens:
 If I understand correctly, for packages that depend on c++ libs, 
 those libs
 have first to be rebuild. I have no idea how to get an exact list of 
 all packages
 providing such libs, but going to my /sw/var/logs dir, the command
<tt><nobr> grep 'c++' * | cut -f 1 -d . | sort | uniq</nobr></tt>
 gave me the following list, which could be at least a start :
 aplus-fsf apt aria arts aspell astyle cccc clanlib cups cyclo db3 db4
 ddd dejagnu dpkg drscheme dx f2c g77 gc gengetopt geomview glib2
 gnome-apt gnome-games gnome-pim graphviz gtkmm gtop hdf5 icemc
 intercal-threaded jags kdebase3-ssl kdelibs3-ssl launch lftp-ssl
 libdivxdecore libsigc++ libxml++ macaulay2 mad mjpegtools mozilla mysql
 nautilus ncurses netcdf octave-atlas oleo openh323 openjade pango1
 plotutils prcs pspell pwlib python qcad qt qt3 qtella sagasu sdl sdl-net
 singular-factory singular-libfac smpeg source-highlight sppc stlport
 swig tela tmake unixodbc unrar wxgtk wxmac xfree86-rootless zoinks
</p>






<?
include "footer.inc";
?>

