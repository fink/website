<?
$title = "User's Guide - Packages";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/10/19 21:05:22';

$metatags = '<link rel="start" href="index.php" title="User\'s Guide Contents"><link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="next" href="upgrade.php" title="Upgrading Fink"><link rel="prev" href="install.php" title="First Time Installation">';

include "header.inc";
?>

<h1>User's Guide - Installing Packages</h1>




Now that you have something that can be called a Fink installation,
this chapter shows you how to install the actual software packages you
came for.
Before we explain how to install packages using either the source or
the binary distribution, some important notes that apply to both.


<a name="x11"><h2>Getting X11 Sorted Out</h2></a>
<p>
Since there are several X11 implementations available for Mac OS X
(XFree86, Tenon Xtools, eXodus) and several ways to install them
(manually or via Fink), there are several alternative packages - one
for each setup.
Fink is very bad at guessing what you have, so it's important to pick
the right one and install it before you start installing X11
applications.
Here is a list of the available packages and X11 installation methods:
</p>
<ul>
<li><p>
xfree86-base:
This package is the real thing.
It installs the whole load of XFree86 as a Fink package.
For maximum flexibility, this package does not contain the actual
XDarwin server.
To get that, you can install the xfree86-server or the
xfree86-rootless package.
Or you can install it manually, for example using an "XDarwin" test
release from the XonX project or one of the "rootless" servers
circulating the net.
</p></li>
<li><p>
system-xfree86:
This package expects that you installed XFree86 manually, either from
source or from the official binary distribution.
It will just check that the installation is useful and then act as a
dependency placeholder.
Note that XFree86 4.0.2 or 4.0.3 will not pass the test.
You need a version that builds shared libraries.
Usually that will be 4.1.0, but CVS versions of XFree86 starting
around spring 2001 will also work.
</p></li>
<li><p>
system-xtools:
Install this package if you have Tenon's Xtools product installed.
Like system-xfree86, this will just do a sanity check and leave the
actual files alone.
</p></li>
</ul>
<p>
For more information on installing and running X11, refer to the
<a href="http://fink.sourceforge.net/doc/x11/">X11 on Darwin
and Mac OS X document</a>.
</p>


<a name="bin"><h2>Installing Binary Packages</h2></a>
<p>
[FIXME: dselect, apt-get, and their relationship]
</p>


<a name="src"><h2>Installing Packages from Source</h2></a>
<p>
[FIXME: 'fink list', 'fink install']
</p>
<p>
For the meantime, see the
<a href="http://fink.sourceforge.net/doc/bundled/usage.php">Usage Document</a>.
</p>


<p align="right">
Next: <a href="upgrade.php">Upgrading Fink</a></p>


<?
include "footer.inc";
?>
