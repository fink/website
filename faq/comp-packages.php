<?
$title = "F.A.Q. - Compiling (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/11/14 17:32:53';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-general.php" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php" title="Compile Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 6 Compile Problems - Specific Packages</h1>


<a name="libgtop">
<div class="question"><p><b>Q6.1: libgtop fails to build with errors involving sed.</b></p></div>
<div class="answer"><p><b>A:</b> This can happen if your login script (e.g. <code>~/.cshrc</code>) does something that writes to the terminal, e.g "<code>echo Hello</code>" or <code>xttitle</code>.  To get rid of the problem, the easy solution is to comment out the offending lines.</p><p>If you want to keep the echo, then you can do something like the following:</p><pre>
if ( $?prompt) then
echo Hello
endif
</pre></div>
</a>
<a name="cant-install-xfree">
<div class="question"><p><b>Q6.2: I want to switch to fink's xfree86 packages, but I can't install xfree86-base, because it conflicts with system-xfree86.</b></p></div>
<div class="answer"><p><b>A:</b> XFree86, unfortunately, really needs to be installed in /usr/X11R6.  Because of this the fink <code>xfree86-base</code> and <code>xfree86-rootless</code> packages install there, too.  However, since fink won't remove any files that aren't in its database, it won't automatically replace a non-fink installation of XFree86.</p><p>
<b>Here's how to proceed:</b>
</p><p>1. Remove <code>system-xfree86</code>.  If you don't have any packages that depend on X11, this is straightforward.  Frequently, however, many packages that depend on X11 are installed.  Rather than uninstalling all of them, you can use</p><p>
<code>sudo dpkg --remove --force-depends system-xfree86</code>
</p><p>to remove it, leaving everything in place.  If you don't have <code>system-xfree86</code> installed then proceed to step 3.</p><p>2. Manually remove all of XFree86.  This can be done with</p><p>
<code>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11 /usr/lib/libXplugin.1.dylib</code>
</p><p>(the last file will only be present if you had Apple's X11 installed).</p><p>3. To get XFree86-4.2.1, Install fink's <code>xfree86-base</code> and <code>xfree86-rootless</code> packages by the usual means:  "<code>fink install</code>" for source users, "<code>apt-get install</code>" or <code>dselect</code> for binaries.</p><p> -or-</p><p>3a. To get XFree86-4.3.0, install fink's <code>xfree86</code> package, with "fink install xfree86"--this version isn't in the binary distro yet, and is currently only in the unstable tree [FAQ 3.9].</p></div>
</a>
<a name="change-thread-nothread">
<div class="question"><p><b>Q6.3: How do I change from the non-threaded version of fink's XFree86 packages to the threaded version (or vice-versa)?</b></p></div>
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
	</pre><p>FinkCommander also has a way to remove packages. In the source window, select a package, and then in the <code>Source Menu</code> use "<code>Force Remove</code>."</p><p>If you are using system-xfree86, see the previous question for removing it.</p><p>Install the version of xfree86 you want: </p><p>
<code>xfree86-base</code> and <code>xfree86-rootless</code>
</p><p>
<code>xfree86-base-threaded</code> and <code>xfree86-rootless-threaded</code>
</p><p>by the usual means: "<code>fink install</code>" for source users, "<code>apt-get install</code>" or <code>dselect</code> for binaries.</p></div>
</a>
<a name="apple-x11">
<div class="question"><p><b>Q6.4: I've installed the Apple X11 package, but system-xfree86 won't install.</b></p></div>
<div class="answer"><p><b>A:</b> If you get error messages like the following:</p><pre>- missing /usr/X11R6/lib/libX11.dylib
- missing /usr/X11R6/lib/libXpm.dylib
- missing /usr/X11R6/lib/libXaw.dylib
- missing /usr/X11R6/include/X11/Xlib.h

Your XFree86 installation is missing or incomplete. Please make sure you have
an XFree86 release installed and retry the installation of the system-xfree86
package.
</pre><p>then you need to install the SDK package as well as the User package. If you are running Panther, the SDK is on the Xcode disk and is <b>NOT</b> automatically installed. The SDK as well as X11 beta for Jaguar is no longer available, and you'll either have to upgrade to Panther or use fink's xfree86.</p><p>If, on the other hand, you get the following message:</p><pre>An error occurred trying to find your XFree86 installation's
version.  This really shouldn't happen, so I'm bailing.  :(</pre><p>then you need to update your package descriptions and install a newer version of system-xfree86.  If you are installing Apple X11 Beta 3, then you will need <code>system-xfree86-4.2-11</code> or later.</p></div>
</a>
<a name="cctools">
<div class="question"><p><b>Q6.5: "When I try to install KDE, I get the following message:  'Can't resolve dependency "cctools (&gt;= 446-1)"'</b></p></div>
<div class="answer"><p><b>A:</b> This somewhat cryptic message means you need to install the December 2002 Developer Tools (but not the <code>gcc 3.3</code> update).</p></div>
</a>
<a name="system-xfree86-upgrade">
<div class="question"><p><b>Q6.6: I can't update system-xfree86, because of a conflict with x11.</b></p></div>
<div class="answer"><p><b>A:</b> This problem has come about because of changes needed to allow for externally installed XFree86-4.3 .  Originally,  <code>system-xfree86</code> provided the <code>x11</code> virtual package when an externally installed XFree86 was present.  Because it only worked for XFree86-4.2, it was decided to have two separate packages:</p><ul>
<li>
<code>system-xfree86-42</code>, for XFree86 4.2.x and Apple X11 beta 3</li>
<li>
<code>system-xfree86-43</code>, for XFree86 4.3.x and Apple X11 1.0</li>
</ul><p>Either of these will provide <code>x11</code>.  <code>System-xfree86</code> is now a bundle that installs the appropriate one of the above packages, depending on the version of XFree86 / Apple X11 that is installed.  Unfortunately, switching the provider of a virtual package is sufficiently complicated that the automatic upgrade procedure can't deal with it (currently).  Do an additional <code>selfupdate-cvs</code> to get the latest version of the package:  <b>1.0-2</b> as of this writing.  Then try to update again. </p></div>
</a>
<p align="right">
Next: <a href="usage-general.php">7 Package Usage Problems - General</a></p>


<?
include "footer.inc";
?>

