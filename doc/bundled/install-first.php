<?
$title = "Installation - First Time";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2003/06/22 15:35:13';

$metatags = '<link rel="contents" href="install.php" title="Installation Contents"><link rel="next" href="install-up03.php" title="Upgrading From Fink 0.3.x"><link rel="prev" href="install-fast.php" title="The Fast Track">';

include "header.inc";
?>

<h1>Installation - 2 First Time Installation</h1>



<h2><a name="req">2.1 Requirements</a></h2>
<p>
You need:
</p>
<ul>
<li><p>
An installed Mac OS X system, version 10.1 or later.
Darwin 5.0 and later should also work, but this has not been tested.
Earlier versions of both are not supported and probably will
<b>not</b> work.
</p></li>
<li><p>
Development tools.
On Mac OS X, install the Developer.pkg package from the Developer
Tools CD.
On Darwin, the tools should be present in the default install.
</p></li>
<li><p>
Many other things that come with Mac OS X and the Developer Tools.
This includes perl 5.6 and either wget or curl.
</p></li>
<li><p>
Internet access.
All source code is downloaded from mirror sites.
</p></li>
<li><p>
Patience.
Compiling several big packages takes time.
I'm talking hours or even days here.
</p></li>
</ul>


<h2><a name="directory">2.2 Choosing A Directory</a></h2>
<p>
Before you install, you must decide where Fink's directory hierarchy
will live. The recommended place is /sw, and all examples in this
document will use that. Any other directory should be fine as well, as
long as you don't use existing directories like /usr/local or
/usr. The bootstrap script tries to catch these.
</p>
<p>
If you intend to use the binary distribution (through apt-get /
dselect), you must install to /sw.
Unfortunately, binary packages are not relocatable.
</p>
<p>
The directory that you choose must not contain any spaces or similar.
Both Unix itself and the bulk of Unix software were written under this
assumption.
Using symlinks to trick the bootstrap script simply won't work.
</p>
<p>
A special note about /usr/local: While it is possible to install Fink
in /usr/local (and the bootstrap script will let you do that after a
confirmation), it is a bad idea. Many third party software packages
install into /usr/local. This can cause severe problems for Fink,
including overwriting files, dpkg refusing to install packages and
strange build errors. Also, the /usr/local hierarchy is in the default
search path for the shell and the compiler. That means that it is much
more difficult to get back to a working system when things break. You
have been warned.
</p>


<h2><a name="install">2.3 Installation</a></h2>
<p>
First, you need to unpack the fink-0.6.1-full.tar.gz tarball.
It is recommended that you do this from the command line -
StuffIt Expander has a tendency to screw up text files.
So, go to the directory where you put the tarball, and run this
command:
</p>
<pre>tar xzf fink-0.6.1-full.tar.gz</pre>
<p>
You now have a directory named fink-0.6.1-full.
Change to it with <code>cd fink-0.6.1-full</code>.
</p>
<p>
The actual installation is performed by the perl script
bootstrap.pl.
It is accompanied by a small shell script, bootstrap.sh, which checks
some basic requirements and then hands over control to the perl
script.
So, to start installation, go to the fink-0.6.1-full directory and run
this command:
</p>
<pre>./bootstrap.sh</pre>
<p>
After running some tests, the script will ask you what method should
be used to gain root privileges.
The most useful choice is 'sudo'.
On a default install of Mac OS X, sudo is already enabled for the user
account created during installation.
The script will immediately use the method you choose to become root.
This is required for the installation.
</p>
<p>
Next, the script will ask you for the installation path.
See 'Choosing A Directory' above for hints about this.
The script will create the directory and set it up for the bootstrap
that will be done later.
</p>
<p>
Next up is Fink configuration.
This consists mainly of setting proxies and selecting mirror sites for
downloading.
The process should be self-explaining.
If you don't know what to say, you can just press Return and Fink will
use a reasonable default value.
</p>
<p>
Finally, the script has enough information to conduct the bootstrap
process.
That means it will now download, build and install some essential
packages.
Don't worry if you see some packages being compiled twice.
This is required because to build a binary package of the package
manager, you first must have the package manager available.
</p>


<h2><a name="x11">2.4 Getting X11 Sorted Out</a></h2>
<p>
Fink uses virtual packages to declare dependencies on X11.
As there are several X11 implementations available for Mac OS X
(XFree86, Tenon Xtools, eXodus) and several ways to install them
(manually or via Fink), there are several actual packages - one for
each setup.
Fink is quite bad at guessing what you have, so it's best to get this
sorted out right at the beginning.
Here is a list of the available packages and installation methods:
</p>
<ul>
<li><p>
xfree86-base:
This package is the real thing.
It will fetch the XFree86 source, compile it and install it into
/usr/X11R6.
For maximum flexibility, this package does not contain the actual
XDarwin server.
To get it, you can install the xfree86-server package.
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
Usually that will be 4.1.0, but CVS versions not older than a few
months will also work.
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
online <a href="http://fink.sourceforge.net/doc/x11/">X11 on Darwin
and Mac OS X document</a>.
</p>


<p align="right">
Next: <a href="install-up03.php">3 Upgrading From Fink 0.3.x</a></p>


<?
include "footer.inc";
?>

