<?
$title = "X11 Choices";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/25 16:06:05 $';

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
you'll get a US keyboard layout by default; you can use xmodmap or XKB
to modify the mappings. It's also quite slow because it is a
framebuffer implementation without hardware accelleration.</p>
<p>Since version 4.0.2, Darwin support is in the regular XFree86
distribution. You can get binaries and source at the <a
href="http://www.xfree86.org/">XFree86 site</a>. Building the 4.0.x
source on Mac OS X Final requires a small patch which is in CVS in the
xf-4_0_2-branch. The HEAD revision will also work.</p>

<h2>XFree86 running under Aqua</h2>

<p>Current development versions of XFree86 also work while Aqua is
running. This mode uses CoreGraphics / Quartz instead of IOKit. It
runs full-screen, and you can switch between the X11 desktop and Aqua
with a keystroke.</p>
<p>A rootless mode is under development, but will not be included in
the upcoming XFree86 4.1 release.</p>
<p>The current code is available from <a
href="http://www.xfree86.org/cvs/">XFree86's anonymous
CVS</a>. Additional patches can be found at the <a
href="http://sourceforge.net/projects/xonx/">SourceForge project</a>
set up to coordinate this effort. Binaries are available from
SourceForge or at the <a href="http://www.mrcla.com/XonX/">XonX
page</a>.</p>

<h2>Tenon Xtools</h2>

<p>Tenon Intersystems produces an X server that runs in a rootless
window mode under Mac OS X. This means that you can use Mac OS X and
X11 applications side-by-side. Their server also has accelerated
OpenGL support. Xtools is a commercial product, but you can get a
time-limited trial version at <a href="http://www.tenon.com/">Tenon's
website</a>.</p>

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
