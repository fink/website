<?
$title = "Running X11 - Installing XFree86";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/07/15 20:33:25';

$metatags = '<link rel="start" href="index.php" title="Running X11 Contents"><link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="run-xfree86.php" title="Starting XFree86"><link rel="prev" href="history.php" title="History">';

include "header.inc";
?>

<h1>Running X11 - Getting and Installing XFree86</h1>



<a name="official-binary"><h2>The Official Binaries</h2></a>
<p>
The XFree86 project has an official binary distribution of XFree86
4.1.0.
You can find it on you local <a href="http://www.xfree86.org/MIRRORS.shtml">Xfree86 mirror</a> in
the directory <tt><nobr>4.1.0/binaries/Darwin-ppc</nobr></tt>.
Be sure to get the <tt><nobr>Xprog.tgz</nobr></tt> and <tt><nobr>Xquartz.tgz</nobr></tt>
tarballs even though they are marked as optional.
If you're unsure what you need, just download the whole directory.
Run the <tt><nobr>Xinstall.sh</nobr></tt> script to install the stuff.
You've now got XFree86 with a server that can do fullscreen, but not
rootless under Mac OS X.
</p>



<a name="official-source"><h2>The Official Source</h2></a>
<p>
If you've got the time to spare, you can build XFree86 4.1.0 from
source.
You can find the source on you local <a href="http://www.xfree86.org/MIRRORS.shtml">Xfree86 mirror</a> in
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



<a name="latest-cvs"><h2>The Latest Development Source</h2></a>
<p>
If you have not only time, but also some nerves to spare you can get
the latest development version of XFree86 from the public CVS
repository.
This is the version that will eventually become XFree86 4.2.
It contains improvements made after 4.1.0 was released,
most notably OpenGL support (just software rendering, but useful
anyway) and a reimplementation of rootless mode.
</p>
<p>
To install, follow the <a href="http://www.xfree86.org/cvs/">XFree86
CVS</a> instructions to download the <tt><nobr>xc</nobr></tt> module.
Then, follow the source build instructions above.
</p>



<a name="fink"><h2>Compiling via Fink</h2></a>
<p>
Fink will let you install X11 in any way you like, but it
also provides XFree86 packages of its own.
The <tt><nobr>xfree86-base</nobr></tt> package downloads, compiles and installs
XFree86 4.1.0, but without the XDarwin servers.
There are several ways to add the servers to the mix.
The <tt><nobr>xfree86-server</nobr></tt> package installs the standard XFree86
4.1.0 servers, i.e. you'll only get fullscreen mode.
The <tt><nobr>xfree86-rootless</nobr></tt> package uses a patch from the time
before 4.1.0 to build a rootless server. This package is experimental
and therefore in the "unstable" section.
Finally, you have the option to install the server yourself; see
below.
</p>



<a name="macgimp"><h2>MacGimp</h2></a>
<p>
The downloadable installer currently offered by the MacGimp people
does not contain XFree86.
</p>
<p>
The CD that <a href="http://www.macgimp.com">MacGimp, Inc.</a>
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



<a name="xaqua0"><h2>The XAqua 0.x releases</h2></a>
<p>
The XAqua 0.x test releases available from the XonX project have been
superseded by XFree86 4.1.0.
They should not be installed; get the official 4.1.0 binary release
instead.
A new series of test releases will start in the near future; I'll
update this document when it happens.
</p>



<p align="right">
Next: <a href="run-xfree86.php">Starting XFree86</a></p>


<?
include "footer.inc";
?>
