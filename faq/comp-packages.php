<?
$title = "F.A.Q. - Compiling (2)";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2004/02/09 18:56:48';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-general.php" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php" title="Compile Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 6 Compile Problems - Specific Packages</h1>


<a name="libgtop">
<div class="question"><p><b>Q6.1: A package fails to build with errors involving <code>sed</code>.</b></p></div>
<div class="answer"><p><b>A:</b> This can happen if your login script (e.g. <code>~/.cshrc</code>) does something that writes to the terminal, e.g "<code>echo Hello</code>" or <code>xttitle</code>. To get rid of the problem, the easy solution is to comment out the offending lines.</p><p>If you want to keep the echo, then you can do something like the following:</p><pre>if ( $?prompt) then
echo Hello
endif</pre></div>
</a>
<a name="cant-install-xfree">
<div class="question"><p><b>Q6.2: I want to switch to Fink's XFree86 packages, but I can't install <code>xfree86-base</code> | <code>xfree86</code>, because it conflicts with <code>system-xfree86</code>.</b></p></div>
<div class="answer"><p><b>A:</b> All flavors of X11, unfortunately, really needs to be installed in /usr/X11R6. Because of this the Fink <code>xfree86-base</code> and <code>xfree86-rootless</code> packages install there, too. However, since Fink won't remove any files that aren't in its database, it won't automatically replace a non-Fink installation of X11.</p><p></p><p>Here's how to proceed:</p><p></p><p><b>Note:  10.2.x users with up-to-date versions of Fink (&gt;= 0.16.2) and 10.3.x users should skip step 1 below (it won't work anyway).</b></p><p>1. Remove <code>system-xfree86</code>. If you don't have any packages that depend on X11, this is straightforward. Frequently, however, many packages that depend on X11 are installed. Rather than uninstalling all of them, you can use</p><p>
<code>sudo dpkg --remove --force-depends system-xfree86</code>
</p><p>to remove it, leaving everything in place. If you don't have <code>system-xfree86</code> installed then proceed to step 3.</p><p>2. Manually remove all of XFree86. This can be done with</p><p>
<code>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</code>
</p><p>If you are switching from Apple X11, remove the X11 application, too.</p><p>3. To get XFree86-4.2.1, Install Fink's <code>xfree86-base</code> and <code>xfree86-rootless</code> packages by the usual means: "<code>fink install</code>" for source users, "<code>apt-get install</code>" or <code>dselect</code> for binaries.</p><p> -or-</p><p>3a. To get XFree86-4.3.x, install Fink's <code>xfree86</code> package, with "fink install xfree86"--this version isn't in the binary distro yet, and is currently only in the unstable tree [FAQ 3.9].</p></div>
</a>
<a name="change-thread-nothread">
<div class="question"><p><b>Q6.3: How do I change from the non-threaded version of Fink's XFree86 packages to the threaded version (or vice-versa)?</b></p></div>
<div class="answer"><p><b>A:</b> If you are running the Fink version of XFree86 and you want to switch between the threaded and non-threaded versions of Fink, you need to manually remove the old version. This is done at the command-line with the commands:</p><pre>
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

<a name="cctools">
<div class="question"><p><b>Q6.4: "When I try to install KDE, I get the following message: 'Can't resolve dependency "cctools (&gt;= 446-1)"'</b></p></div>
<div class="answer"><p><b>A:</b> This somewhat cryptic message means you need to install the December 2002 Developer Tools.</p></div>
</a>

<p align="right">
Next: <a href="usage-general.php">7 Package Usage Problems - General</a></p>


<?
include "footer.inc";
?>

