<?
$title = "F.A.Q. - Compiling (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/02/19 16:40:34';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-general.php" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php" title="Compile Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 5 Compile Problems - Specific Packages</h1>



<a name="libgtop"><div class="question"><p><b>Q5.1: libgtop fails to build with errors involving sed.</b></p></div>
<div class="answer"><p><b>A:</b> This can happen if your login script (e.g. <tt><nobr>~/.cshrc</nobr></tt>) does something that writes to the terminal, e.g &quot;<tt><nobr>echo Hello</nobr></tt>&quot; or <tt><nobr>xttitle</nobr></tt>.  To get rid of the problem, the easy solution is to comment out the offending lines.</p><p>If you want to keep the echo, then you can do something like the following:</p><pre>
if ( $?prompt) then
echo Hello
endif
</pre></div></a>

<a name="cant-install-xfree"><div class="question"><p><b>Q5.2: I want to switch to fink's xfree86 packages, but I can't install xfree86-base, because it conflicts with system-xfree86.</b></p></div>
<div class="answer"><p><b>A:</b> XFree86, unfortunately, really needs to be installed in /usr/X11R6.  Because of this the fink <tt><nobr>xfree86-base</nobr></tt> and <tt><nobr>xfree86-rootless</nobr></tt> packages install there, too.  However, since fink won't remove any files that aren't in its database, it won't automatically replace a non-fink installation of XFree86.</p><p><b>Here's how to proceed:</b></p><p>1. Uninstall <tt><nobr>xaw3d</nobr></tt> and <tt><nobr>xaw3d-shlibs</nobr></tt> if you installed them with fink, and their version is 1.5-4 or earlier, because they also install in /usr/X11R6 (this is no longer the case for 1.5-5 and later versions).</p><p>2. Remove <tt><nobr>system-xfree86</nobr></tt>.  If you don't have any packages that depend on X11, this is straightforward.  Frequently, however, many packages that depend on X11 are installed.  Rather than uninstalling all of them, you can use</p><p><tt><nobr>sudo dpkg --remove --force-depends system-xfree86</nobr></tt></p><p>to remove it, leaving everything in place.  If you don't have <tt><nobr>system-xfree86</nobr></tt> installed then proceed to step 3.</p><p>3. Manually remove all of XFree86.  This can be done with</p><p><tt><nobr>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</nobr></tt></p><p>4. Install fink's <tt><nobr>xfree86-base</nobr></tt> and <tt><nobr>xfree86-rootless</nobr></tt> by the usual means:  &quot;<tt><nobr>fink install</nobr></tt>&quot; for source users, &quot;<tt><nobr>apt-get install</nobr></tt>&quot; or <tt><nobr>dselect</nobr></tt> for binaries.</p><p>5. If you had <tt><nobr>xaw3d</nobr></tt> and <tt><nobr>xaw3d-shlibs</nobr></tt> installed originally, then reinstall them (since some other package on your system likely depends on them).  If by some chance you installed them through other means than fink, install the fink packages.</p></div></a>

<a name="change-thread-nothread"><div class="question"><p><b>Q5.3: How do I change from the non-threaded version of fink to the threaded version (or vice-versa)?</b></p></div>
<div class="answer"><p><b>A:</b> If you are running the fink version of XFree86 and you want to switch between the threaded and non-threaded versions of fink, you need to manually remove the old version. This is done at the command-line with the commands:</p><pre>
sudo dpkg -r --force-depends xfree86-base
sudo dpkg -r --force-depends xfree86-shlibs
sudo dpkg -r --force-depends xfree86-rootless
sudo dpkg -r --force-depends xfree86-rootless-shlibs
	</pre><p>or to delete the threaded versions:</p><pre>
sudo dpkg -r --force-depends xfree86-base-threaded
sudo dpkg -r --force-depends xfree86-shlibs-threaded
sudo dpkg -r --force-depends xfree86-rootless-threaded
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs
	</pre><p>FinkCommander also has a way to remove packages. In the source window, select a package, and then in the <tt><nobr>Source Menu</nobr></tt> use &quot;<tt><nobr>Force Remove</nobr></tt>.&quot;</p><p>If you are using system-xfree86, see the previous question for removing it.</p><p>Install the version of xfree86 you want: </p><p><tt><nobr>xfree86-base</nobr></tt> and <tt><nobr>xfree86-rootless</nobr></tt></p><p><tt><nobr>xfree86-base-threaded</nobr></tt> and <tt><nobr>xfree86-rootless-threaded</nobr></tt></p><p>by the usual means: &quot;<tt><nobr>fink install</nobr></tt>&quot; for source users, &quot;<tt><nobr>apt-get install</nobr></tt>&quot; or <tt><nobr>dselect</nobr></tt> for binaries.</p></div></a>
<a name="pil-wont-build"><div class="question"><p><b>Q5.4: PIL fails to build with &quot;ld:  Undefined symbols:  _FT_New_Face&quot;.</b></p></div>
<div class="answer"><p><b>A:</b> Check and see if you have <tt><nobr>freetype2-2.1.3-1</nobr></tt> installed.  This was made available for a short time, but wasn't backwards compatible with <tt><nobr>pil</nobr></tt>, among other packages, and was removed.  Find and delete <tt><nobr>freetype2_2.1.3-1_darwin-powerpc.deb</nobr></tt>, and then you can downgrade it with <tt><nobr>fink install freetype2-2.0.9-1</nobr></tt>.</p></div>
</a>

<a name="apple-x11"><div class="question"><p><b>Q5.5: I've installed the Apple X11 package, but system-xfree86 won't install.  The message says that <tt><nobr>/usr/X11R6/lib/libX11.dylib</nobr></tt>, <tt><nobr>/usr/X11R6/lib/libXpm.dylib</nobr></tt>, <tt><nobr>/usr/X11R6/lib/libXaw.dylib</nobr></tt>, and <tt><nobr>/usr/X11R6/include/X11/Xlib.h</nobr></tt> are missing.</b></p></div>
	<div class="answer"><p><b>A:</b> You need to install the SDK package as well as the User package. The SDK is available from <a href="http://www.apple.com/macosx/x11/download/">the Apple X11 downoad page</a> (the link is in a box at the lower right corner labeled <b>X11 for Mac OS X Public Beta SDK</b>).</p></div>
</a>

<a name="automake-autoconf"><div class="question"><p><b>Q5.6: I can't update autoconf/automake, because of a dependency on automake/autoconf.</b></p></div>
<div class="answer"><p><b>A:</b> Update whichever package is giving the dependency error, e.g. if you get a message like:</p><pre>dpkg: considering removing autoconf25 in favour of autoconf2.5 ...
dpkg: no, cannot remove autoconf25 (--auto-deconfigure will help):
automake depends on autoconf25 (&gt;= 2.52-1)
autoconf25 is to be removed.</pre><p>then use <tt><nobr>fink update <b>automake</b></nobr></tt>.  You should then be able to update autoconf.</p></div>
</a>
<p align="right">
Next: <a href="usage-general.php">6 Package Usage Problems - General</a></p>


<?
include "footer.inc";
?>

