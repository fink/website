<?
$title = "F.A.Q. - Packages";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/24 12:18:51 $';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="prev" href="usage.php" title="Usage Questions">';

include "header.inc";
?>

<h1>F.A.Q. - Problems With Certain Packages</h1>



<a name="nox"><div class="question"><p><b>Q: Package foo says there is no X11 on my system!?</b></p></div>
<div class="answer"><p><b>A:</b> There are several things that can cause this:</p><ul>
<li><p>You don't have X11 installed. You must install X11 manually,
either <a href="http://www.xfree86.org/">XFree86</a> or <a href="http://www.tenon.com/">Xtools</a>. XFree86 packages for Fink are
under development, but not yet ready for prime time.</p></li>
<li><p>You installed the XFree86 binary distribution, but left out the
Xprog.tgz tarball. It is an optional tarball, but must be installed to
compile X11 applications.</p></li>
<li><p>You installed XFree86 4.0.2 or 4.0.3 and used ranlib on the
static libraries. Now configure scripts are failing in the
<tt><nobr>checking for XOpenDisplay in -lX11</nobr></tt> test. To fix this, use the
<tt><nobr>-c</nobr></tt> option for ranlib, i.e.:</p>
<pre>cd /usr/X11R6/lib
sudo ranlib -c *.a</pre>
<p>Note that this can't happen with more recent versions of XFree86, as
they compile the libraries (both static and shared) without common
symbols.</p></li>
</ul><p>Hopefully, this will soon be solved with proper X11 packages and
dependencies. But don't hold your breath yet.</p></div></a>

<a name="icewm"><div class="question"><p><b>Q: IceWM won't compile.</b></p></div>
<div class="answer"><p><b>A:</b> If you get messages about undefined symbols, you have only static
X11 libraries on your system. Unfortunately, the linker is sensitive
to the order in which the libraries are listed on the command line,
and IceWM's Makefiles use the wrong order. The problem disappears when
you have shared X11 libraries. To get them, use either <a href="http://www.tenon.com/">Tenon Xtools</a> or a CVS version of
XFree86 (which will soon be released as XFree86 4.1).</p></div></a>

<a name="gnomecore"><div class="question"><p><b>Q: The gnome-core package won't compile. It
complains about multiple definitions of _login_tty. What's
wrong?</b></p></div>
<div class="answer"><p><b>A:</b> The problem with this is actually the configure script in
gnome-libs. It fails to detect that Darwin has the login_tty() and
openpty() functions because they are in the system library, not in
libutil. It goes ahead and compiles replacements, which causes these
duplicate symbol errors. This has been fixed in Fink 0.2.0 and
later. A workaround is to create a symlink in
<tt><nobr>/usr/lib</nobr></tt>, like this:</p><pre>cd /usr/lib
sudo ln -s libSystem.dylib libutil.dylib</pre><p>Then rebuild the gnome-libs and gnome-core packages.</p></div></a>

<a name="qt"><div class="question"><p><b>Q: Qt won't compile.</b></p></div>
<div class="answer"><p><b>A:</b> Qt is one of the packages that will only compile when
shared X11 libraries are present. Unfortunately, it spits some quite
confusing error messages when it encounters static libraries.</p></div></a>

<a name="nedit"><div class="question"><p><b>Q: nedit is broken.</b></p></div>
<div class="answer"><p><b>A:</b> If you're seeing <tt><nobr>Xm/BulletinB.h: No such file or
directory</nobr></tt> in the error messages, that's because you have Xtools
installed. Xtools includes OpenMotif, but unfortunately Tenon forgot
to include some required header files. There is no workaround yet, and
it is unknown whether this is fixed in recent releases on Xtools.</p></div></a>

<a name="sawfish"><div class="question"><p><b>Q: Sawfish can't find rep-gtk.</b></p></div>
<div class="answer"><p><b>A:</b> You need shared X11 libraries for rep-gtk to build correctly. It
doesn't build dynamically loadable modules when only static X11
libraries are available. The problem doesn't actually show until the
sawfish configure script tries to use rep-gtk.</p></div></a>




<?
include "footer.inc";
?>
