<?
$title = "Upgrade Kit for Mac OS X 10.1";
$cvs_author = '$Author: jeff_yecn $';
$cvs_date = '$Date: 2004/03/02 03:32:02 $';

include "header.inc";
?>


<h1>The Upgrade Kit for Mac OS X 10.1</h1>

<p>
Since older versions of apt don't work on Mac OS X 10.1, here's the
special procedure to upgrade an existing Fink installation created by
the binary installer.
</p>
<p>
A very similar procedure can be used to update really old installs of
Fink 0.2.x (including MacGIMP and the first release of OpenOSX's GIMP
CD).
The only requirement is that Fink was installed in <tt>/sw</tt> and
not in any other directory.
See <a href="#oldversion">below</a>.
</p>

<h2>Fink 0.3.0 and newer</h2>

<p>
Starting with version 0.3.0, Fink is fully compatible with Mac OS X 10.1.
Thus you don't have to do anything special.
</p>

<h2>Fink 0.2.4 till 0.2.6</h2>

<p>
This procedure assumes you have installed Fink with the official
binary installer.
The first such installer was based on Fink 0.2.4.
The procedure has three main steps:
</p>
<ol>

<li><p>Getting a decent apt package.
Download the
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
and
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>
packages.
In a Terminal.app window, go to the folder where you downloaded these
files and run these commands:
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb</pre>
<p>
(if you are using bash as your shell, source /sw/bin/init.sh instead)
</p>
<p>
Once apt is installed, use these commands to update the package
listings:
</p>
<pre>rehash
fink scanpackages
sudo apt-get update</pre>
</li>

<li><p>Updating the base packages.
It's important to have the latest package management tools installed,
the ones you have on your system may be outdated.
</p>
<pre>sudo apt-get install base-files gettext dpkg fink</pre>
</li>

<li><p>Updating the rest of your system.
You can do this either through <tt>dselect</tt> (recommended)
<b>or</b> with this apt command:
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>

<h2><a name="oldversion">Fink 0.2.3 and older</a></h2>

<p>
This procedure assumes you have installed an old version of Fink
(0.2.1 in most cases) as part of another package, like the MacGIMP
installer or OpenOSX's GIMP installer.
The procedure has four main steps:
</p>
<ol>

<li><p>Getting decent apt and fink packages.
Download the
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>
and the
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/fink_0.10.0-1_darwin-powerpc.deb">fink-0.10.0-1</a>
packages.
(Yes, that version number is for real.
The <tt>fink</tt> command in the fink package has separate
version numbering from the Fink distribution.)
In a Terminal.app window, go to the folder where you downloaded the
file and run these commands to install the packages:
</p>
<pre>sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb
sudo dpkg -i fink_0.10.0-1_darwin-powerpc.deb</pre>
<p>
Once they are installed, use these commands to update the package
listings:
</p>
<pre>rehash
fink scanpackages
sudo apt-get update</pre>
</li>

<li><p>Updating the other base packages.
It's important to have the latest package management tools installed,
the ones you have on your system may be buggy or too old for the
current packages.
</p>
<pre>sudo apt-get install base-files gettext dpkg</pre>
</li>

<li><p>Getting X11 sorted out.
Before proceeding you'll have to sort the X11 dependencies out.
With MacGIMP and OpenOSX's packages, you'll have a "manual" XFree86
install (from Fink's point of view, that is), so you should install
the <code>system-xfree86</code> package:
</p>
<pre>sudo apt-get install system-xfree86</pre>
<p>
If the package complains that your XFree86 install is too old, you'll
have to update it first, then run the above command again.
</p>
</li>

<li><p>Updating the rest of your system.
You can do this either through <tt>dselect</tt> (recommended)
<b>or</b> with this apt command:
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>


<?
include "footer.inc";
?>
