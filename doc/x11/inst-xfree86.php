<?
$title = "Running X11 - Installing XFree86";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2002/05/22 17:31:50';

$metatags = '<link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="run-xfree86.php" title="Starting XFree86"><link rel="prev" href="history.php" title="History">';

include "header.inc";
?>

<h1>Running X11 - 3 Getting and Installing XFree86</h1>



<a name="fink"><h2>3.1 Installing through Fink</h2></a>

<p>
Fink will let you install X11 in any way you like,
but it also provides XFree86 packages of its own. If you
use <tt><nobr>fink install ...</nobr></tt>, it will download
the source code and compile it on your computer. If
you use <tt><nobr>apt-get install ...</nobr></tt> or the
<tt><nobr>dselect</nobr></tt> frontend, it will download
precompiled binary packages, similar to the official
XFree86 distribution.
</p>
<p>
The <tt><nobr>xfree86-base</nobr></tt> package contains all
of XFree86 4.2.0 except the XDarwin server.  
The <tt><nobr>xfree86-rootless</nobr></tt> is the server from the standard,
stable XFree86 4.2.0 release. It supports both full-screen and rootless
operation, and has OpenGL support.  
(In the early days, Fink also had an <tt><nobr>xfree86-server</nobr></tt> package
which only provided fullscreen mode, but this is no longer a relevant
option.)
You also have the option to
install the server yourself; see below.  In this case, you should
only install <tt><nobr>xfree86-base</nobr></tt>, or you'll risk that Fink
overwrites your manually installed server.
</p>


<a name="official-binary"><h2>3.2 The Official Binaries</h2></a>
<p>
The XFree86 project has an official binary distribution of XFree86
4.2.0.
You can find it on you local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
the directory <tt><nobr>4.2.0/binaries/Darwin-ppc</nobr></tt>.
Be sure to get the <tt><nobr>Xprog.tgz</nobr></tt> and <tt><nobr>Xquartz.tgz</nobr></tt>
tarballs even though they are marked as optional.
If you're unsure what you need, just download the whole directory.
Run the <tt><nobr>Xinstall.sh</nobr></tt> script as root to install the stuff.
(You might want to read the <a href="http://www.xfree86.org/4.2.0/Install.html">official
instructions</a> before installing.)
You've now got XFree86 with a server that can do fullscreen, or 
rootless under Mac OS X.
</p>



<a name="official-source"><h2>3.3 The Official Source</h2></a>
<p>
If you've got the time to spare, you can build XFree86 4.2.0 from
source.
You can find the source on you local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
the directory <tt><nobr>4.2.0/source</nobr></tt>.
Grab all three <tt><nobr>X420src-#.tgz</nobr></tt> tarballs and extract them in
the same directory.
You can customize the build by putting macro definitions in the file
<tt><nobr>config/cf/host.def</nobr></tt> in the XFree86 source tree.

See
<tt><nobr>config/cf/darwin.cf</nobr></tt> for some hints.
(Note: Only the macros that have an #ifndef check around them can be
overwritten in host.def.)
</p>
<p>
When you're happy with your configuration, compile and install XFree86
with the following commands:
</p>
<pre>make World
sudo make install install.man</pre>
<p>
As with the official binaries, you've now got XFree86 with a server
that can do fullscreen, or rootless under Mac OS X.
</p>



<a name="latest-cvs"><h2>3.4 The Latest Development Source</h2></a>
<p>
If you have not only time, but also some nerves to spare you can get
the latest development version of XFree86 from the public CVS
repository.
Note that the code is under constant development; what you get today
is usually not the same as what you got yesterday.
</p>
<p>
To install, follow the <a href="http://www.xfree86.org/cvs/">XFree86
CVS</a> instructions to download the <tt><nobr>xc</nobr></tt> module.
Then, follow the source build instructions above.
</p>



<a name="xonx-bin"><h2>3.5 The XonX binary test releases (XAqua,
XDarwin)</h2></a>
<p>
In the time before 4.1.0 was released, the XonX team put out a series
of binary test releases with the name XAqua.
These releses are obsolete and should not be used.
</p>
<p>
With the introduction of rootless mode into XFree86's mainline CVS
(after 4.1.0 was released), the XonX team once again started to
put out binary test releases, this time under the name XDarwin.
This eventually resulted in the XDarwin released with 4.2.0.
</p>
<p>The <a href="http://www.mrcla.com/XonX/">XonX
web page</a> indicates that post-4.2.0 testing versions of XDarwin may
someday be released, but none have been as yet.  They would presumably be 
installed on top of XFree86 4.2.0.
</p>



<a name="macgimp"><h2>3.6 MacGimp</h2></a>
<p>
The downloadable installer which was offered by the MacGimp people 
during 2001
did not contain XFree86.
(It would overwrite some XFree86 configuration files, though.)
</p>
<p>
The CD that <a href="http://www.macgimp.com/">MacGimp, Inc.</a>
offers for sale reportedly contains XFree86.
It's not quite clear what version it is; it may be a mix of
4.0.3, 4.1.0 and a development snapshot.
The server does rootless mode, using a patch from the time before
4.1.0.
</p>


<a name="rootless"><h2>3.7 Roaming Rootless Servers</h2></a>

<p>
There are various rootless server binaries roaming around
the net.  With the release of the official 4.2.0 binaries
this should not be a desirable way to install XFree86.
</p>


<a name="fink-summary"><h2>3.8 Fink package summary</h2></a>
<p>
A quick summary of the install options and the Fink packages you
should install:
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Install Type</th><th align="left">Fink packages</th></tr><tr valign="top"><td>4.x.0 built via Fink</td><td><p><tt><nobr>xfree86-base</nobr></tt> and <tt><nobr>xfree86-rootless</nobr></tt></p></td></tr><tr valign="top"><td>4.x.0 official binaries</td><td><p><tt><nobr>system-xfree86</nobr></tt> only</p></td></tr><tr valign="top"><td>4.x.0 built from source, or from the latest CVS source</td><td><p><tt><nobr>system-xfree86</nobr></tt> only</p></td></tr><tr valign="top"><td>4.2.0 base system built via Fink + binary rootless server</td><td><p><tt><nobr>xfree86-base</nobr></tt> only</p></td></tr></table>



<p align="right">
Next: <a href="run-xfree86.php">4 Starting XFree86</a></p>


<?
include "footer.inc";
?>

