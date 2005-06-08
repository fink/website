<?
$title = "Running X11 - Installing X11";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2005/06/08 01:09:20';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=en" title="Starting X11"><link rel="prev" href="history.php?phpLang=en" title="History">';


include_once "header.en.inc";
?>
<h1>Running X11 - 3. Getting and Installing X11</h1>
    
    
    <h2><a name="fink">3.1 Installing X11 via Fink</a></h2>
      
      <p>
Fink will let you install X11 in a variety of ways,
among these it provides XFree86 packages of its own. If you
use <code>fink install ...</code>, it will download
the source code and compile it on your computer. If
you use <code>apt-get install ...</code> or the
<code>dselect</code> frontend, it will download
precompiled binary packages, similar to the official
XFree86 distribution.
</p>
<p><b>General notes:</b></p>
<ul><li>All of the X11 packages currently available via Fink support both full-screen and rootless
operation, and have OpenGL support.</li>
<li><b>Important note:</b>  Files get moved around between X11 releases.  This frequently means that if you try to downgrade your X11 installation, you will find that binaries (executable programs, etc.) won't work anymore.  You'd have to rebuild any such packages.
<p>You can go the other way though:  packages built vs an older X11 generally work on a later one.</p>
<p>For 10.3 or 10.4, the X11 hierarchy (newer -&gt; older codebases) is as follows:</p>
<pre>xorg &gt; xfree86 &gt; Apple's X11 </pre>
</li></ul>
<p><b>10.4 users:</b></p>
<p>You can install XFree86 version 4.5.0-23 from source.   You will need both the <code>xfree86</code> and <code>xfree86-shlibs</code> packages to have a fully functional installation.</p>
<p>You can also install the X.org X11 release (currently version 6.8.2-35) via the <code>xorg</code> and <code>xorg-shlibs</code> packages in the unstable tree.  This X11 flavor is similar to XFree86-4.5, but includes some bugfixes and new features, and removes some code with a disputed license.</p>
<p><b>10.3 users:</b></p>
<p>You can install XFree86 version 4.4.0-13 (that which is in the current binary distribution) or 4.5.0-13 (which is available from source).  You will need both the <code>xfree86</code> and <code>xfree86-shlibs</code> packages to have a fully functional installation.</p>
<p>You can also install X.org-6.8.2 via the <code>xorg</code> and <code>xorg-shlibs</code> packages as above.</p>

<p><b>10.2 users:</b></p>
<p>10.2 users may install version 4.3 via source or binary, and 4.4 from the unstable tree.  As above, you'll install <code>xfree86</code> and <code>xfree86-shlibs</code>.
</p>

      <p>XFree86 4.2.1.1 is also available for 10.2, in <code>normal</code> and <code>-threaded</code> flavors (later X11s all have threading support), though it is considered to be obsolete. The <code>xfree86-base</code>, <code>xfree86-base-shlibs</code>, <code>xfree86-shlibs</code>, and <code>xfree86-rootless-shlibs</code> packages (or their <code>-threaded</code> counterparts must all be installed for you to have a working XFree86 setup.  In addition, you may need to install the <code>xfree86-base-dev</code> and <code>xfree86-rootless-dev</code> packages (or their <code>-threaded</code> equivalents) to keep Fink from trying to install a newer version.</p>
      
<p><b>10.1 users:</b></p>
<p>You can install version 4.2.0 from the binary distribution (only).  You will install <code>xfree86-base</code> and <code>xfree86-rootless</code>.</p>
    
    <h2><a name="apple-binary">3.2 Apple's Binaries</a></h2>
      
      <p>
On January 7, 2003, Apple released <a href="http://www.apple.com/macosx/x11/">a custom
X11 implementation based on XFree86-4.2</a> which includes Quartz rendering and accelerated
OpenGL.  A new version was released on February 10, 2003 with additional features and bugfixes.  A third release (i.e. Beta 3) was made on March 17, 2003 with further additional features and bugfixes.  This version is usable on Jaguar.
</p>
      <p>On October 24, 2003, Apple released Panther (10.3), which includes a release version of their X11 distribution.  This version is based on XFree86-4.3.</p>
<p>On April 29, 2005, Apple released Tiger (10.4), which includes a release version of Apple's X11 based on XFree86-4.4.</p>
      <p>
To use the Apple binaries, you need to make sure the <b>X11 User</b> package is installed, and you should also 
<a href="http://fink.sourceforge.net/doc/users-guide/upgrade.php">update</a> Fink.</p>
      <p>Under <code>fink-0.16.2</code>, you will need to install the <b>X11 SDK</b> package, as well.  After you do this, Fink will
create a <code>system-xfree86</code> virtual package.</p>
      <p>Under <code>fink-0.17.0</code> and later installing the X11 SDK is only necessary if 
you want to build packages from source.  In this case, even if you don't have the SDK, there will be <code>system-xfree86</code>
and <code>system-xfree86-shlibs</code> virtual packages, the latter representing the shared libraries.  If you do install the SDK, there will also be a  
<code>system-xfree86-dev</code> package, representing the headers.
</p>
      <p>
If you have an existing XFree86 distribution installed, be it through Fink or otherwise, you
can follow the <a href="inst-xfree86.php?phpLang=en#switching-x11">instructions on
replacing one X11 package with another</a>.  Make sure that you remove your existing
packages, then install Apple's X11 (and X11 SDK, if needed or desired).
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
  as your window manager, or delete your <code>~/.xinitrc</code> completely.</p>
          <p>If you just want cut-and-paste integration, but want to use a different window manager, you can do 
this as in the following example:</p>
          <pre>/usr/X11R6/bin/quartz-wm --only-proxy &amp;
exec /sw/bin/fvwm2</pre>
          <p>You may, of course, call any other window manager, <code>startkde</code>, etc.</p>
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
initial "<code>#!/bin/sh</code>", but before you run any programs):</p>
          <pre> . /sw/bin/init.sh
</pre>
          <p>so that the Fink environment is initialized.  Note:  <code>init.sh</code> is used rather than <code>init.csh</code> because <code>.xinitrc</code> is run by <code>sh</code> rather than <code>tcsh</code>.</p>
        </li>
        <li>
          <p>Applications that require calling other programs which reside within your Fink tree for some of their functions need special treatment to get them to work when called from the Application menu.  Instead of putting just the full path to the filename, e.g.</p>
          <pre>/sw/bin/emacs</pre>
          <p>you'll want to use something like the following, if you're using bash as your
default shell:</p>
          <pre>. /sw/bin/init.sh ; emacs</pre>
          <p>and if you're using tcsh:</p>
          <pre>source /sw/bin/init.csh ; emacs</pre>
          <p>This makes sure that the application has the correct PATH information.  You can use this syntax for any Fink-installed application.</p>
        </li>
        <li>
          <p>If you are trying to build a package by hand against Apple's X11 and you see a failure like:</p>
          <pre>ld: err.o illegal reference to symbol: _XSetIOErrorHandler 
defined in indirectly referenced dynamic library 
/usr/X11R6/lib/libX11.6.dylib</pre>
          <p>then you'll need to make sure to that <code>-lX11</code> is present during linking.  Check your package's configuration options to see how to feed it the extra argument.</p>
        </li>
        <li>
          <p>If you use the <code>xfree86</code> package, and later switch to Apple's X11 (on either 10.2.x or 10.3.x), any
packages you have built against <code>xfree86</code> will need to be rebuilt, as the binaries are incompatible.</p>
        </li>
<li><p><b>10.3 and 10.4 users only:</b>  It is possible to use Apple's display server and window manager on top of XFree86 or X.org.  If you install the <code>applex11tools</code> package, Fink will install what you need, as long as you have a copy of X11User.pkg.</p></li>
      </ul>
      <p>For more information on using Apple's X11, check out this <a href="http://developer.apple.com/darwin/runningx11.html">article</a> at the Apple Developer Connection.</p>
    
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
(You might want to read the <a href="http://www.xfree86.org/4.3.0/Install.html">official
instructions</a> before installing.)</p>
      <p>Whichever version you install, you've now got XFree86 with a server that can do fullscreen, or 
rootless under Mac OS X.
</p>
    
    <h2><a name="official-source">3.4 The Official Source</a></h2>
      
      <p>
If you've got the time to spare, you can build XFree86 4.2.0 from
source.
You can find the source on your local <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 mirror</a> in
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
      <p>To install 4.3.0, follow the above instructions, replacing "2" with "3", but don't do the 4.2.1.1 update procedure.</p>
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
    
    
    <h2><a name="macgimp">3.6 MacGimp</a></h2>
      
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
    
    
    <h2><a name="switching-x11">3.7 Replacing X11</a></h2>
      
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
   If you are using <a href="http://finkcommander.sourceforge.net/">FinkCommander</a>, you
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
          <pre>sudo dpkg -r --force-depends xfree86-rootless\ 
xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
          <p>
   Note that if you have apps that require threaded XFree86, you may have trouble with your
   dpkg database if you force remove it and install a different XFree86 package or placeholder
   package.
  </p>
        </li>
      </ol>
      <p>If, on the other hand, you have an X11 version that was not installed via Fink, you'll need to remove it via the command line:</p>
      <pre>sudo rm -rf /usr/X11R6 /etc/X11</pre>
      <p>The above holds true for removing any flavor of X11 that you didn't install through Fink.  You will also need to remove <code>XDarwin.app</code> | 
<code>X11.app</code>, depending on what you had installed.  Make sure to check your <code>.xinitrc</code> if you are removing Apple's X11 to 
make sure that you aren't trying to run <code>quartz-wm</code>.  You can now install whatever new X11 variety you want, manually or via Fink.</p>
    
    <h2><a name="fink-summary">3.8 Fink package summary</a></h2>
      
      <p>
A quick summary of the install options and the Fink packages you
should install:
</p>
      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Install Type</th><th align="left">Fink packages</th></tr><tr valign="top"><td>XFree86-4.2.1.x (10.2 only)</td><td>
             <p><code>xfree86-base</code> and <code>xfree86-rootless</code> (and their <code>-shlibs</code>)</p>
            <p>or <code>xfree86-base-threaded</code> and <code>xfree86-rootless-threaded</code> (and <code>-shlibs</code>)</p>
          </td></tr><tr valign="top"><td>XFree86-4.4 or 4.5 (10.3 and 10.4)</td><td>
            <p>
              <code>xfree86</code> and <code>xfree86-shlibs</code>
            </p>
          </td></tr><tr valign="top"><td>X.org-6.8.2 (10.3 and 10.4)</td><td>
	    <p><code>xorg</code> and <code>xorg-shlibs</code></p>
	</td></tr><tr valign="top"><td>Apple's X11 (all versions)</td><td>
            <p>
              <code>system-xfree86</code> and <code>system-xfree86-shlibs</code> (+<code>system-xfree86-dev</code> for building)</p>
          </td></tr><tr valign="top"><td>XFree86-4.x official binaries</td><td>
            <p>
              <code>system-xfree86</code> only (+splitoffs)</p>
          </td></tr><tr valign="top"><td>XFree86-4.x built from source, or from the latest CVS source</td><td>
            <p>
              <code>system-xfree86</code> only (+splitoffs)</p>
          </td></tr></table>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=en">4. Starting X11</a></p>
<? include_once "../../footer.inc"; ?>


