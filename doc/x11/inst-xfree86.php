<?
$title = "Running X11 - Installing XFree86";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/10/26 20:57:48';

$metatags = '<link rel="start" href="index.php" title="Running X11 Contents"><link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="run-xfree86.php" title="Starting XFree86"><link rel="prev" href="history.php" title="History">';

include "header.inc";
?>

<h1>Running X11 - Getting and Installing XFree86</h1>



<a name="official-binary"><h2>The Official Binaries</h2></a>
<p>
The XFree86 project has an official binary distribution of XFree86
4.1.0.
You can find it on you local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
the directory <tt><nobr>4.1.0/binaries/Darwin-ppc</nobr></tt>.
Be sure to get the <tt><nobr>Xprog.tgz</nobr></tt> and <tt><nobr>Xquartz.tgz</nobr></tt>
tarballs even though they are marked as optional.
If you're unsure what you need, just download the whole directory.
Run the <tt><nobr>Xinstall.sh</nobr></tt> script as root to install the stuff.
(You might want to read the <a href="http://www.xfree86.org/4.1.0/Install.html">official
instructions</a> before installing.)
You've now got XFree86 with a server that can do fullscreen, but not
rootless under Mac OS X.
</p>



<a name="official-source"><h2>The Official Source</h2></a>
<p>
If you've got the time to spare, you can build XFree86 4.1.0 from
source.
You can find the source on you local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
the directory <tt><nobr>4.1.0/source</nobr></tt>.
Grab all three <tt><nobr>X410src-#.tgz</nobr></tt> tarballs and extract them in
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
that can do fullscreen, but not rootless under Mac OS X.
</p>
<p>
Note: The 4.1.0 source needs a small patch to compile on Mac OS X
10.1.
<a href="http://fink.sourceforge.net/files/xfree86-4.1.0-10.1.patch">Download
it</a>, change into the <tt><nobr>xc</nobr></tt> directory and apply it with
<tt><nobr>patch -p1 &lt;/path/to/xfree86-4.1.0-10.1.patch</nobr></tt>.
</p>



<a name="latest-cvs"><h2>The Latest Development Source</h2></a>
<p>
If you have not only time, but also some nerves to spare you can get
the latest development version of XFree86 from the public CVS
repository.
This is the version that will eventually become XFree86 4.2.
It contains improvements made after 4.1.0 was released,
most notably OpenGL support (just software rendering, but useful
anyway) and a reimplementation of rootless mode.
Note that the code is under constant development; what you get today
is usually not the same as what you got yesterday.
</p>
<p>
To install, follow the <a href="http://www.xfree86.org/cvs/">XFree86
CVS</a> instructions to download the <tt><nobr>xc</nobr></tt> module.
Then, follow the source build instructions above.
</p>



<a name="xonx-bin"><h2>The XonX binary test releases (XAqua,
XDarwin)</h2></a>
<p>
In the time before 4.1.0 was released, the XonX team put out a series
of binary test releases with the name XAqua.
These releses are obsolete and should not be used.
</p>
<p>
With the introduction of rootless mode into XFree86's mainline CVS
(after 4.1.0 was released), the XonX team has once again started to
put out binary test releases, this time under the name XDarwin.
These releases are available from the <a href="http://sourceforge.net/project/showfiles.php?group_id=18034&amp;release_id=43842">SourceForge
download page</a>.
You should also check the <a href="http://www.mrcla.com/XonX/">XonX
web page</a> for additional notes.
</p>
<p>
To install one of these releases, you must first install XFree86
4.1.0, e.g. the official binary release.
Then, extract the XDarwin tarball as root like this:
</p>
<pre>cd /
sudo gnutar xzvf /path/to/XDarwin1.0a3.tgz</pre>
<p>
That will update the X servers in /Applications and /usr/X11R6/bin.
For OpenGL support you need an additional tarball.
In the case of XDarwin 1.0a3 it's called <tt><nobr>GLXSupport.tgz</nobr></tt>.
It is installed the same way as the main tarball.
</p>



<a name="fink"><h2>Installing through Fink</h2></a>
<p>
Fink will let you install X11 in any way you like, but it
also provides XFree86 packages of its own.
If you use <tt><nobr>fink install ...</nobr></tt>, it will download the source
code and compile it on your computer.
If you use <tt><nobr>apt-get install ...</nobr></tt> or the
<tt><nobr>dselect</nobr></tt> frontend, it will download precompiled binary
packages, similar to the official XFree86 distribution.
</p>
<p>
The <tt><nobr>xfree86-base</nobr></tt> package contains all of XFree86 4.1.0
except the XDarwin servers.
There are several ways to add the servers to the mix.
The <tt><nobr>xfree86-server</nobr></tt> package installs the standard XFree86
4.1.0 servers, i.e. you'll only get fullscreen mode.
The <tt><nobr>xfree86-rootless</nobr></tt> package uses a (more or less) recent
CVS snapshot taken for Fink and uses that.
It contains a server with rootless mode plus the OpenGL libraries.
Finally, you have the option to install the server yourself; see
below.
In this case, you should only install <tt><nobr>xfree86-base</nobr></tt>, or
you'll risk that Fink overwrites your manually installed server.
</p>



<a name="macgimp"><h2>MacGimp</h2></a>
<p>
The downloadable installer currently offered by the MacGimp people
does not contain XFree86.
(It will overwrite some XFree86 configuration files, though.)
</p>
<p>
The CD that <a href="http://www.macgimp.com/">MacGimp, Inc.</a>
offers for sale reportedly contains XFree86.
It's still not quite clear what version it is; it may be a mix of
4.0.3, 4.1.0 and a development snapshot.
The server does rootless mode, using a patch from the time before
4.1.0.
</p>



<a name="rootless"><h2>Roaming Rootless Servers</h2></a>
<p>
There are various rootless server binaries roaming around the net.
These are not self-sufficient; they must be installed on top of
another XFree86 installation (e.g. the official 4.1.0 binaries or
Fink's <tt><nobr>xfree86-base</nobr></tt> package).
</p>
<p>
Installing such a server happens in two steps.
First, place the files you got in the right directories.
These are:</p>
<ul>
<li>XDarwin.app in /Applications</li>
<li>XDarwin in /usr/X11R6/bin</li>
<li>XDarwinStartup in /usr/X11R6/bin</li>
</ul>
<p>
Note that you must be the superuser ("root", run "sudo -s" to become
root) for this procedure.
If some of these items are already present, overwrite them.
Make sure that XDarwin and XDarwinStartup have the executable flag
set, e.g. <tt><nobr>chmod 755 XDarwin XDarwinStartup</nobr></tt>.
</p>
<p>
In the second step, you need to set some symbolic links in
/usr/X11R6/bin.
You can use these commands:
</p>
<pre>cd /usr/X11R6/bin
rm -f X XDarwinQuartz
ln -s XDarwinStartup X
ln -s /Applications/XDarwin.app/Contents/MacOS/XDarwin XDarwinQuartz</pre>
<p>
Now you should have an XFree86 installation that can run in rootless
mode.
</p>



<a name="fink-summary"><h2>Fink package summary</h2></a>
<p>
A quick summary of the install options and the Fink packages you
should install:
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Install Type</th><th align="left">Fink packages</th></tr><tr valign="top"><td>4.1.0 official binaries</td><td><p><tt><nobr>system-xfree86</nobr></tt> only</p></td></tr><tr valign="top"><td>4.1.0 built from source</td><td><p><tt><nobr>system-xfree86</nobr></tt> only</p></td></tr><tr valign="top"><td>4.1.0 binaries + XDarwin 1.0a#</td><td><p><tt><nobr>system-xfree86</nobr></tt> only</p></td></tr><tr valign="top"><td>4.1.0 binaries + XDarwin 1.0a# + OpenGL tarball</td><td><p><tt><nobr>system-xfree86</nobr></tt> and <tt><nobr>system-opengl</nobr></tt></p></td></tr><tr valign="top"><td>4.1.0 binaries + binary rootless server from other sources</td><td><p><tt><nobr>system-xfree86</nobr></tt> only</p></td></tr><tr valign="top"><td>Latest CVS source</td><td><p><tt><nobr>system-xfree86</nobr></tt> and <tt><nobr>system-opengl</nobr></tt></p></td></tr><tr valign="top"><td>4.1.0 built via Fink</td><td><p><tt><nobr>xfree86-base</nobr></tt> and <tt><nobr>xfree86-server</nobr></tt></p></td></tr><tr valign="top"><td>4.1.0 + new rootless server, both built via Fink</td><td><p><tt><nobr>xfree86-base</nobr></tt> and <tt><nobr>xfree86-rootless</nobr></tt> (in
unstable)</p></td></tr><tr valign="top"><td>4.1.0 base system built via Fink + binary rootless server</td><td><p><tt><nobr>xfree86-base</nobr></tt> only</p></td></tr></table>



<p align="right">
Next: <a href="run-xfree86.php">Starting XFree86</a></p>


<?
include "footer.inc";
?>
