<?
$title = "F.A.Q. - Package Specific";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/19 16:17:58 $';

$metatags = '<link rel="contents" href="index.php" title="FAQ Contents">
<link rel="start" href="index.php" title="FAQ Contents">
<link rel="prev" href="usage.php" title="Usage">
';

include "header.inc";
?>


<h1>Fink F.A.Q. - Problems with certain packages</h1>

<p><a name="nox"><b>Package foo says there is no X11 on my system!?</b></a></p>

<p>There are several things that can cause this:</p>
<ul>
<li>You don't have X11 installed. You must install X11 manually,
either <a href="http://www.xfree86.org/">XFree86</a> or <a
href="http://www.tenon.com/">Xtools</a>. XFree86 packages for Fink are
under development, but not yet ready for prime time.</li>
<li>You installed the XFree86 binary distribution, but left out the
Xprog.tgz tarball. It is an optional tarball, but must be installed to
compile X11 applications.</li>
<li>Some people have reported problems beyond that. It seems that
sometimes the static X11 libraries can become broken, which results in
the <tt>checking for XOpenDisplay in -lX11</tt> test failing.</li>
</ul>

<p><a name="icewm"><b>IceWM won't compile.</b></a></p>

<p>If you get messages about undefined symbols, you have only static
X11 libraries on your system. Unfortunately, the linker is sensitive
to the order in which the libraries are listed on the command line,
and IceWM's Makefiles use the wrong order. The problem disappears when
you have shared X11 libraries. To get them, use either <a
href="http://www.tenon.com/">Tenon Xtools</a> or a CVS version of
XFree86 (which will soon be released as XFree86 4.1).</p>

<p><a name="gnomecore"><b>The gnome-core package won't compile. It
complains about multiple definitions of _login_tty. What's
wrong?</b></a></p>

<p>The problem with this is actually the configure script in
gnome-libs. It fails to detect that Darwin has the login_tty() and
openpty() functions because they are in the system library, not in
libutil. It goes ahead and compiles replacements, which causes these
duplicate symbol errors. This has been fixed in Fink 0.2.0 and
later. A workaround is to create a symlink in /usr/lib, like this:
<pre>cd /usr/lib
sudo ln -s libSystem.dylib libutil.dylib</pre>
Then rebuild the gnome-libs and gnome-core packages.</p>

<p><a name="qt"><b>Qt won't compile.</b></a></p>

<p>Qt is one of the packages that will only compile when shared X11
libraries are present. Unfortunately, it spits some quite confusing
error messages when it encounters static libraries.</p>

<p><a name="nedit"><b>nedit is broken.</b></a></p>

<p>If you're seeing <tt>Xm/BulletinB.h: No such file or directory</tt>
in the error messages, that's because you have Xtools
installed. Xtools includes OpenMotif, but unfortunately Tenon forgot
to include some required header files. There is no workaround yet, and
it is unknown whether this is fixed in recent releases on Xtools.</p>

<p><a name="sawfish"><b>Sawfish can't find rep-gtk.</b></a></p>

<p>You need shared X11 libraries for rep-gtk to build correctly. It
doesn't build dynamically loadable modules when only static X11
libraries are available. The problem doesn't actually show until the
sawfish configure script tries to use rep-gtk.</p>


<?
include "footer.inc";
?>
