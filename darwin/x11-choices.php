<?
$title = "X11 Choices";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/02/11 12:17:44 $';

include "header.inc";
?>


<h1>X11 on Darwin and Mac OS X - The Choices</h1>

<p>The GUI of Mac OS X is not based on the X Window System, or X11 for
short. If you want to run X11 applications, you must install some kind
of X11 window server. Naturally, there are a number of solutions.</p>

<h2>XFree86 running native</h2>

<p>On pure Darwin, this is the only choice (and the most natural
one). You can run XFree86 directly on the hardware, like on most other
Unix variants. The Darwin port uses IOKit calls to access the display
hardware, the keyboard and the mouse. This also works on Mac OS X, but you
must log out of the Aqua GUI and switch to the console. (Enter
<tt>&gt;console</tt> as the user name at the login prompt.) Note that
you'll only get the US keyboard layout, at least in my
experience. It's also quite slow - think framebuffer device.</p>
<p>Since version 4.0.2, Darwin support is in the regular XFree86
distribution. You can get binaries and source at the <a
href="http://www.xfree86.org/">XFree86 site</a>. Building the source
on Mac OS X Public Beta is a little involved - see the instructions at
<a href="http://www.mrcla.com/XonX/">XonX</a> for that.</p>

<h2>XFree86 running under Aqua</h2>

<p>Work is underway to let XFree86 work while Aqua is running. This
mode uses CoreGraphics instead of IOKit. It runs full-screen, and you
can switch between the X11 desktop and Aqua with a keystroke.</p>
<p>The current code is available as a patch against the XFree86
source. A binary is also available. See <a
href="http://www.mrcla.com/XonX/">XonX</a> for further
information.</p>

<h2>Tenon Xtools</h2>

<p>Tenon Intersystems develops an X server that runs in a rootless
window mode under Mac OS X. This means that you can use Mac OS X and
X11 applications side-by-side. Their server also has accelerated
OpenGL support. Xtools is a commercial product, but you can get a
time-limited trial version at <a href="http://www.tenon.com/">Tenon's
website</a>.</p>
<p>I've tested version 1.0b6. It works, but it's still quite
buggy.</p>

<h2>Xvnc</h2>

<p>VNC is a remote display system. Take the Xvnc server and a VNC
viewer for Mac OS X, run them on the same machine, and voila - X11
applications on your Mac OS X desktop. Your X desktop is contained in
one Aqua window, but it works. See this <a
href="http://www.cdc.noaa.gov/~jsw/macosx_xvnc/">Xvnc for MacOS X
site</a> for instructions.</p>


<?
include "footer.inc";
?>
