<?
$title = "F.A.Q. - Compiling (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/07/30 13:30:20';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-general.php" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php" title="Compile Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 5 Compile Problems - Specific Packages</h1>


<a name="libgtop">
<div class="question"><p><b>Q5.1: libgtop fails to build with errors involving sed.</b></p></div>
<div class="answer"><p><b>A:</b> This can happen if your login script (e.g. <code>~/.cshrc</code>) does something that writes to the terminal, e.g &quot;<code>echo Hello</code>&quot; or <code>xttitle</code>.  To get rid of the problem, the easy solution is to comment out the offending lines.</p><p>If you want to keep the echo, then you can do something like the following:</p><pre>
if ( $?prompt) then
echo Hello
endif
</pre></div>
</a>
<a name="cant-install-xfree">
<div class="question"><p><b>Q5.2: I want to switch to fink's xfree86 packages, but I can't install xfree86-base, because it conflicts with system-xfree86.</b></p></div>
<div class="answer"><p><b>A:</b> XFree86, unfortunately, really needs to be installed in /usr/X11R6.  Because of this the fink <code>xfree86-base</code> and <code>xfree86-rootless</code> packages install there, too.  However, since fink won't remove any files that aren't in its database, it won't automatically replace a non-fink installation of XFree86.</p><p>
<b>Here's how to proceed:</b>
</p><p>1. Remove <code>system-xfree86</code>.  If you don't have any packages that depend on X11, this is straightforward.  Frequently, however, many packages that depend on X11 are installed.  Rather than uninstalling all of them, you can use</p><p>
<code>sudo dpkg --remove --force-depends system-xfree86</code>
</p><p>to remove it, leaving everything in place.  If you don't have <code>system-xfree86</code> installed then proceed to step 3.</p><p>2. Manually remove all of XFree86.  This can be done with</p><p>
<code>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11 /usr/lib/libXplugin.1.dylib</code>
</p><p>(the last file will only be present if you had Apple's X11 installed).</p><p>3. To get XFree86-4.2.1, Install fink's <code>xfree86-base</code> and <code>xfree86-rootless</code> packages by the usual means:  &quot;<code>fink install</code>&quot; for source users, &quot;<code>apt-get install</code>&quot; or <code>dselect</code> for binaries.</p><p> -or-</p><p>3a. To get XFree86-4.3.0, install fink's <code>xfree86</code> package, with &quot;fink install xfree86&quot;--this version isn't in the binary distro yet, and is currently only in the unstable tree [FAQ 3.9].</p></div>
</a>
<a name="change-thread-nothread">
<div class="question"><p><b>Q5.3: How do I change from the non-threaded version of fink's XFree86 packages to the threaded version (or vice-versa)?</b></p></div>
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
	</pre><p>FinkCommander also has a way to remove packages. In the source window, select a package, and then in the <code>Source Menu</code> use &quot;<code>Force Remove</code>.&quot;</p><p>If you are using system-xfree86, see the previous question for removing it.</p><p>Install the version of xfree86 you want: </p><p>
<code>xfree86-base</code> and <code>xfree86-rootless</code>
</p><p>
<code>xfree86-base-threaded</code> and <code>xfree86-rootless-threaded</code>
</p><p>by the usual means: &quot;<code>fink install</code>&quot; for source users, &quot;<code>apt-get install</code>&quot; or <code>dselect</code> for binaries.</p></div>
</a>
<a name="apple-x11">
<div class="question"><p><b>Q5.4: I've installed the Apple X11 package, but system-xfree86 won't install.</b></p></div>
<div class="answer"><p><b>A:</b> If you get error messages like the following:</p><pre>- missing /usr/X11R6/lib/libX11.dylib
- missing /usr/X11R6/lib/libXpm.dylib
- missing /usr/X11R6/lib/libXaw.dylib
- missing /usr/X11R6/include/X11/Xlib.h

Your XFree86 installation is missing or incomplete. Please make sure you have
an XFree86 release installed and retry the installation of the system-xfree86
package.
</pre><p>then you need to install the SDK package as well as the User package. The SDK is available from <a href="http://www.apple.com/macosx/x11/download/">the Apple X11 downoad page</a> (the link is in a box at the lower right corner labeled <b>X11 for Mac OS X Public Beta SDK</b>).</p><p>If, on the other hand, you get the following message:</p><pre>An error occurred trying to find your XFree86 installation's
version.  This really shouldn't happen, so I'm bailing.  :(</pre><p>then you need to update your package descriptions and install a newer version of system-xfree86.  If you are installing Apple X11 Beta 3, then you will need <code>system-xfree86-4.2-11</code> or later.</p></div>
</a>
<a name="cctools">
<div class="question"><p><b>Q5.5: &quot;When I try to install KDE, I get the following message:  'Can't resolve dependency &quot;cctools (&gt;= 446-1)&quot;'</b></p></div>
<div class="answer"><p><b>A:</b> This somewhat cryptic message means you need to install the December 2002 Developer Tools (but not the <code>gcc 3.3</code> update).</p></div>
</a>
<p align="right">
Next: <a href="usage-general.php">6 Package Usage Problems - General</a></p>


<?
include "footer.inc";
?>

