<?
$title = "Running X11 - Installing XFree86";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2003/06/19 12:11:07';

$metatags = '<link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="run-xfree86.php" title="Starting XFree86"><link rel="prev" href="history.php" title="History">';

include "header.inc";
?>

<h1>Running X11 - 3 Getting and Installing XFree86</h1>


<h2><a name="fink">3.1 Installing through Fink</a></h2>

<p>
Fink will let you install X11 in any way you like,
but it also provides XFree86 packages of its own. If you
use <code>fink install ...</code>, it will download
the source code and compile it on your computer. If
you use <code>apt-get install ...</code> or the
<code>dselect</code> frontend, it will download
precompiled binary packages, similar to the official
XFree86 distribution.
</p>
<p>
The <code>xfree86-base</code> package contains all
of XFree86 4.2.1.1 (4.2.0 for 10.1 users) except the XDarwin server.  
The <code>xfree86-rootless</code> package is the server from the standard,
stable XFree86 4.2.1.1 release. It supports both full-screen and rootless
operation, and has OpenGL support.  
(In the early days, Fink also had an <code>xfree86-server</code> package
which only provided fullscreen mode, but this is no longer a relevant
option.)
You also have the option to
install the server yourself; see below.  In this case, you should
only install <code>xfree86-base</code>, or you'll risk that Fink
overwrites your manually installed server.  Note that the current stable version of<code> xfree86-base</code> (4.2.1.1-3) generates the <code>xfree86-rootless</code>, <code>xfree86-base-shlibs</code>, and <code>xfree86-rootless-shlibs</code> during its build process.  In this case, all four packages must be installed for you to have a working XFree86 setup.
</p>
<p>The<code> xfree86-base-threaded</code> and <code>xfree86-rootless-threaded</code> packages are essentially the same thing, but have been modified to support threading, which is required by a few applications, such as <code>xine</code>.  One thing to note is that if you switch to Apple's X11 (which doesn't support threading), you won't be able to run binaries that you compiled against the threaded version.</p>
<p>XFree86 4.2.11 (unthreaded) is considered to be the stable, baseline XFree86 version to use with fink.  XFree86 4.3.0 is also available, but is considered to be more experimental, and as of this writing is only available in the unstable tree.  It has threading support built in, and is faster than 4.2.1.1 .  To install this version, you should install the <code>xfree86</code> package.  Note that for this version, there are no longer separate -base and -rootless packages, although the libraries are splitoff into <code>xfree86-shlibs</code>.  If you build binaries against 4.3, they may not work on 4.2.1.1 or Apple X11, so be warned.</p>

<h2><a name="apple-binary">3.2 Apple's Binaries</a></h2>

<p>
On January 7, 2003, Apple released <a href="http://www.apple.com/macosx/x11/">a custom
X11 implementation based on XFree86</a> which includes Quartz rendering and accelerated
OpenGL.  A new version was released on February 10, 2003 with additional features and bugfixes.  A third release was made on March 17, 2003 with further additional features and bugfixes. 
</p>
<p>
As of the time of this writing, to use the Apple binaries you will need to make sure you
have the Fink <code>system-xfree86</code> package, version 4.2-11 or higher, installed.
Also, make sure you download BOTH the SDK (linked from the main site), and the public
beta files.  Do not download the &quot;common toolkits&quot; from OpenDarwin, they will likely
interact poorly with Fink's installation.
</p>
<p>
If you have existing xfree86 packages installed, be it through Fink or otherwise, you
can follow the <a href="inst-xfree86.php#switching-x11">instructions on
replacing one X11 package with another</a>.  Make sure that you remove your existing
packages, and then install <code>system-xfree86</code>.  Be sure you first remove
your old X11 packages, then install Apple's X11 and X11 SDK, and then run
either '<code>sudo apt-get update; sudo apt-get install system-xfree86</code>' (for
binaries) or '<code>fink selfupdate-cvs; fink install system-xfree86</code>' (to
get the latest system-xfree86 package from CVS).
</p>
<p>
Some notes on using Apple's X11:
</p>
<ul>
<li>
<p>The <code>autocutsel</code> package is no longer needed.  If you're starting
  X11 with it enabled, you should disable it.</p>
</li>
<li>
<p>Apple's X11 uses your existing <code>~/.xinitrc</code> file.  If you want the
  full effect of Quartz integration, you should use <code>/usr/X11R6/bin/quartz-wm</code>
  as your window manager, or delete your ~/.xinitrc completely.</p>
</li>
<li>
<p>
<code>quartz-wm</code> doesn't fully support Gnome/KDE window manager hints, so
  you may see some strange behavior on windows that shouldn't have decorations, but do.</p>
</li>
<li>
<p>Apple X11 doesn't honor the Fink environment settings by default.  In order to call up startup applications 
that you have installed with fink (e.g. window managers, gnome-session, other apps under 
<code>/sw/bin</code>) put the following near the top of <code>~/.xinitrc</code> (i.e. after the 
initial &quot;<code>#!/bin/sh</code>&quot;, but before you run any programs):</p>
<pre> . /sw/bin/init.sh
</pre>
<p>so that the Fink environment is initialized.  Note:  <code>init.sh</code> is used rather than <code>init.csh</code> because <code>.xinitrc</code> is run by <code>sh</code> rather than <code>tcsh</code>.</p>
</li>
<li>
<p>Applications that require calling other programs under /sw for some of their functions need special treatment to get them to work when called from the Application menu.  Instead of putting just the full path to the filename, e.g.</p>
<pre>/sw/bin/emacs</pre>
<p>you'll want to use something like the following:</p>
<pre>. /sw/bin/init.sh ; emacs</pre>
<p>This makes sure that the application has the correct PATH information.  You can use this syntax for any Fink-installed application.</p>
</li>
</ul>

<h2><a name="official-binary">3.3 The Official Binaries</a></h2>

<p>
The XFree86 project has an official binary distribution of XFree86
4.2.0, which can be upgraded to 4.2.1.1 with patches.
You can find it on your local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
the directory <code>4.2.0/binaries/Darwin-ppc-5.x</code>.
Be sure to get the <code>Xprog.tgz</code> and <code>Xquartz.tgz</code>
tarballs even though they are marked as optional.
If you're unsure what you need, just download the whole directory.
Run the <code>Xinstall.sh</code> script as root to install the stuff.
(You might want to read the <a href="http://www.xfree86.org/4.2.0/Install.html">official
instructions</a> before installing.)   If you prefer, you can use the <a href="http://prdownloads.sourceforge.net/xonx/XInstall_10.1.sit?download">binary</a> from XonX, which uses identical source but is easier to use.  In either case, download, unzip and run the following upgrades:</p>
<ol>
<li>10.1 users: <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.1.zip?download">4.2.0 -&gt; 4.2.0.1 upgrade</a>.  10.2 users:  <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.2.zip?download">4.2.0 -&gt; 4.2.0.1 upgrade</a>
</li>
<li>10.1 and 10.2 users:  <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.1.1.zip?download">4.2.0.1 -&gt; 4.2.1.1 upgrade</a>
</li>
</ol>
<p>There is an official binary distribution of XFree86
4.3.0, as well, on the<a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirrors</a> in
the directory <code>4.3.0/binaries/Darwin-ppc-6.x</code>.
Be sure to get the <code>Xprog.tgz</code> and <code>Xquartz.tgz</code>
tarballs even though they are marked as optional.
If you're unsure what you need, just download the whole directory.
Run the <code>Xinstall.sh</code> script as root to install the stuff.
(You might wnt to read the <a href="http://www.xfree86.org/4.3.0/Install.html">official
instructions</a> before installing.)</p>
<p>Whichever version you install, you've now got XFree86 with a server that can do fullscreen, or 
rootless under Mac OS X.
</p>

<h2><a name="official-source">3.4 The Official Source</a></h2>

<p>
If you've got the time to spare, you can build XFree86 4.2.0 from
source.
You can find the source on you local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
the directory <code>4.2.0/source</code>.
Grab all three <code>X420src-#.tgz</code> tarballs and extract them in
the same directory.
You can customize the build by putting macro definitions in the file
<code>config/cf/host.def</code> in the XFree86 source tree.

See
<code>config/cf/darwin.cf</code> for some hints.
(Note: Only the macros that have an #ifndef check around them can be
overwritten in host.def.)
</p>
<p>
When you're happy with your configuration, compile and install XFree86
with the following commands:
</p>
<pre>make World
sudo make install install.man</pre>
<p>To update to 4.2.1.1, follow the instructions in the <a href="#official-binary">Official Binaries</a> section.</p>
<p>To install 4.3.0, follow the above instructions, replacing &quot;2&quot; with &quot;3&quot;, but don't do the 4.2.1.1 update procedure.</p>
<p>
As with the official binaries, you've now got XFree86 with a server
that can do fullscreen, or rootless under Mac OS X.
</p>

<h2><a name="latest-cvs">3.5 The Latest Development Source</a></h2>

<p>
If you have not only time, but also some nerves to spare you can get
the latest development version of XFree86 from the public CVS
repository.
Note that the code is under constant development; what you get today
is usually not the same as what you got yesterday.
</p>
<p>
To install, follow the <a href="http://www.xfree86.org/cvs/">XFree86
CVS</a> instructions to download the <code>xc</code> module.
Then, follow the source build instructions above.
</p>

<h2><a name="xonx-bin">3.6 The XonX binary test releases (XAqua,
XDarwin)</a></h2>

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
installed on top of XFree86 4.2.0 (or later).
</p>

<h2><a name="macgimp">3.7 MacGimp</a></h2>

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

<h2><a name="rootless">3.8 Roaming Rootless Servers</a></h2>

<p>
There are various rootless server binaries roaming around
the net.  With the release of the official 4.2.0 binaries
this should not be a desirable way to install XFree86.
</p>

<h2><a name="switching-x11">3.9 Replacing X11</a></h2>

<p>
If you have already installed one of the Fink X11 packages but for one reason or another
have decided you need to remove one and replace it with another, the procedure is pretty
straightforward.  You will have to force a removal of the old packages, and then install the
new, to keep your dpkg database consistent.
</p>
<p>
There are two different ways to do this:
</p>
<ol>
<li>
<p>Use FinkCommander</p>
<p>
   If you are using <a href="http://finkcommander.sf.net/">FinkCommander</a>, you
   can force removal through the menu.  For example, if you have
   <code>xfree86-rootless</code> installed, but want the threaded version, you
   can select your <code>xfree86-rootless</code>,
   <code>xfree86-rootless-shlibs</code>, <code>xfree86-base</code>, and
   <code>xfree86-base-shlibs</code> packages, and then run:
  </p>
<pre>Source -&gt; Force Remove</pre>
</li>
<li>
<p>Manually Remove from the Command-Line</p>
<p>
   To manually, remove them, you use the <code>dpkg</code> with the --force-depends
   option, like so:
  </p>
<pre>sudo dpkg -r --force-depends xfree86-rootless xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
<p>
   Note that if you have apps that require threaded XFree86, you may have trouble with your
   dpkg database if you force remove it and install a different XFree86 package or placeholder
   package.
  </p>
</li>
</ol>

<h2><a name="fink-summary">3.10 Fink package summary</a></h2>

<p>
A quick summary of the install options and the Fink packages you
should install:
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Install Type</th><th align="left">Fink packages</th></tr><tr valign="top"><td>4.2.x built via Fink</td><td>
<p>
<code>xfree86-base</code> and <code>xfree86-rootless</code> (and their <code>-shlibs</code>)</p>
<p>or <code>xfree86-base-threaded</code> and <code>xfree86-rootless-threaded</code> (and <code>-shlibs</code>)</p>
</td></tr><tr valign="top"><td>4.3.x built via Fink</td><td>
<p>
<code>xfree86</code> and <code>xfree86-shlibs</code>
</p>
</td></tr><tr valign="top"><td>4.x official binaries</td><td>
<p>
<code>system-xfree86</code> only</p>
</td></tr><tr valign="top"><td>4.x built from source, or from the latest CVS source</td><td>
<p>
<code>system-xfree86</code> only</p>
</td></tr><tr valign="top"><td>4.2.x base system built via Fink + binary rootless server</td><td>
<p>
<code>xfree86-base</code> only</p>
</td></tr><tr valign="top"><td>4.2.x from Apple</td><td>
<p>
<code>system-xfree86</code>
</p>
</td></tr></table>

<p align="right">
Next: <a href="run-xfree86.php">4 Starting XFree86</a></p>


<?
include "footer.inc";
?>

