<?
$title = "F.A.Q. - Package Specific";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/07 19:44:19 $';

$metatags = '<link rel="contents" href="index.php" title="FAQ Contents">
<link rel="start" href="index.php" title="FAQ Contents">
<link rel="prev" href="usage.php" title="Usage">
';

include "header.inc";
?>


<h1>Fink F.A.Q. - Problems with certain packages</h1>

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

<p>I take it you're seeing a <tt>can't locate file for:
-lqutil</tt>. Congratulations - you've been hit by a bug in Qt's build
system that deletes the lib directory halfway through the build. Noone
was able to track this down yet, as it is not always
reproducible. There is no workaround.</p>

<p><a name="nedit"><b>nedit is broken.</b></a></p>

<p>If you're seeing <tt>Xm/BulletinB.h: No such file or directory</tt>
in the error messages, that's because you have Xtools
installed. Xtools includes OpenMotif, but unfortunately Tenon forgot
to include some required header files. There is no workaround yet, and
it is unknown whether this is fixed in recent releases on Xtools.</p>


<?
include "footer.inc";
?>
