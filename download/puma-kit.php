<?
$title = "Upgrade Kit for Mac OS X 10.1";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/30 14:57:24 $';

include "header.inc";
?>


<h1>The Upgrade Kit for Mac OS X 10.1</h1>

<p>
Since older versions of apt don't work on Mac OS X 10.1, here's the
special procedure to upgrade an existing Fink installation using
binary packages.
</p>
<p>
Note:
This procedure will actually work on all systems and can even be used
to update really old installs of Fink 0.2.x (including MacGIMP and the
first release of OpenOSX's GIMP CD).
The only requirement is that Fink was installed in <tt>/sw</tt> and
not in any other directory.
</p>

<p>
The procedure has four main steps:
</p>
<ol>

<li><p>Getting a decent apt package.
Download the
<a href="../bindist/dists/fink-0.3.0/main/binary-darwin-powerpc/base/apt_0.5.3-7_darwin-powerpc.deb">apt-0.5.3-7</a>
package.
In a Terminal.app window, go to the folder where you downloaded the
file and run this command:
</p>
<pre>sudo dpkg -i apt_0.5.3-7_darwin-powerpc.deb</pre>
<p>
Once apt is installed, let it download the latest package listings:
</p>
<pre>sudo apt-get update</pre>
</li>

<li><p>Updating the base packages.
It's important to have the latest package management tools installed,
the ones you have on your system may be buggy or too old for the
current packages.
</p>
<pre>sudo apt-get install base-files gettext dpkg fink</pre>
</li>

<li><p>Getting X11 sorted out.
If you're upgrading from Fink 0.2.1 (used in the MacGIMP and OpenOSX
installers) or older, you'll have to sort the X11 dependencies out
before proceeding.
If you have XFree86 installed, you'll want to install the
<nobr>system-xfree86</nobr> package in most cases:
</p>
<pre>sudo apt-get install system-xfree86</pre>
</li>

<li><p>Updating the rest of your system.
You can do this either through dselect (recommended) or with this apt
command:
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>


<?
include "footer.inc";
?>
