<?
$title = "F.A.Q. - Usage (2)";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2003/12/11 01:13:20';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="prev" href="usage-general.php" title="Package Usage Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 8 Package Usage Problems - Specific Packages</h1>


<a name="xmms-quiet">
<div class="question"><p><b>Q8.1: I get no sound from
XMMS</b></p></div>
<div class="answer"><p><b>A:</b> 
Make sure you have the "eSound Output Plugin" selected in the XMMS
preferences.
For some strange reason, it selects the disk writer plugin as the
default.
</p><p>
If you still get no sound output or XMMS complains that it can't find
your sound card try this:
</p><ul>
<li>Make sure you haven't muted sound output in Mac OS X.</li>
<li>Run <code>esdcat /usr/libexec/config.guess</code> (or any other
file of a decent size).
If you hear a short noise, eSound works and XMMS should work too if
it's configured correctly.
If you don't hear anything, esd isn't working for some reason.
You can try to start it up manually with <code>esd &amp;</code> and watch
the messages.
</li>
<li>
If it still doesn't work, check the permissions on
<code>/tmp/.esd</code> and <code>/tmp/.esd/socket</code>.
Those should have your normal user account as the owner.
If they aren't owned by you, kill esd if it's running, remove the
directory as root (<code>sudo rm -rf /tmp/.esd</code>), then start esd
again (as a normal user, not as root).
</li>
</ul><p>
Note that esd is designed to be run by a normal user, not by root.
It usually communicates via the file system socket
<code>/tmp/.esd/socket</code>.
You only need the <code>-tcp</code> and <code>-port</code> switches if
you want to run esd clients on another machine over the network.
</p><p>There have also been reports of XMMS crashing or freezing on 10.1. We don't have an analysis or a fix yet.</p></div>
</a>
<a name="nedit-window-locks">
<div class="question"><p><b>Q8.2: If I am editing a file in nedit, when I open another file its window pops up but is unresponsive.</b></p></div>
<div class="answer"><p><b>A:</b> This is a known problem that occurs with recent versions of <code>nedit</code> and <code>lesstif</code> on all platforms. The workaround is to open a new window with File--&gt;New, then open the next file you want to work on.</p><p>This is now fixed in <code>nedit-5.3-6</code>, which depends on <code>openmotif3</code> rather than <code>lesstif</code>.</p></div>
</a>
<a name="xdarwin-start">
<div class="question"><p><b>Q8.3: Help! When I start
XDarwin, it immediately quits!</b></p></div>
<div class="answer"><p><b>A:</b> 
Don't Panic.
The Running X11 document now has an extensive <a href="http://fink.sourceforge.net/doc/x11/trouble.php#immediate-quit">troubleshooting
section</a> for this common problem.
</p></div>
</a>
<a name="no-server">
<div class="question"><p><b>Q8.4: When I try to start XDarwin I get the message "xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</b></p></div>
<div class="answer"><p><b>A:</b> First, make sure you are sourcing init.sh in your X startup <code>~/.xinitrc</code>.</p><p>In Jaguar, sometimes all of the <code>xfree86</code> packages get built, but only <code>xfree86-base</code> and <code>xfree86-base-shlibs</code> are installed. Check whether you have <code>xfree86-rootless</code> and <code>xfree86-rootless-shlibs</code> installed. If not, then <code>fink install xfree86-rootless</code> should do the trick.</p><p>If you do have it installed, then try <code>fink rebuild xfree86-rootless</code>. If that doesn't work, verify that you have <code>/usr/bin/X11R6</code> in your PATH.</p></div>
</a>

<a name="xterm-error">
<div class="question"><p><b>Q8.5: xterm fails with "dyld: xterm Undefined symbols: xterm undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib".</b></p></div>
<div class="answer"><p><b>A:</b> This is caused by using a 10.1 version of XFree86 on 10.2. You must upgrade to a 10.2 version.</p><p>If you are using the Fink <code>xfree86</code> packages, then you can get an upgrade by the usual means ("<code>fink selfupdate-cvs ; fink update-all</code>" for installation from source, <code>fink selfupdate ; ; sudo apt-get update; sudo apt-get dist-upgrade</code>" for installation from binaries.</p><p>If you have installed XFree86 by other means, you can find patches to bring you up to date at the <a href="http://mrcla.com/XonX">XonX web site</a>.</p></div>
</a>
<a name="libXmuu">
<div class="question"><p><b>Q8.6: When I try to start XFree86 I get one of the following errors: "dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib" or "dyld: xinit can't open library: /usr/X11R6/lib/libXext.6.dylib"</b></p></div>
<div class="answer"><p><b>A:</b> 
You are missing a file that is supposed to be installed by <code>xfree86-base-(threaded)-shlibs</code>. You should reinstall it using <code>fink reinstall xfree86-base-shlibs</code> (<code>fink reinstall xfree86-base-threaded-shlibs</code> if you are using the threaded XFree86 packages) for source, or <code>sudo apt-get install --reinstall xfree86-base-shlibs</code> for binaries.</p></div>
</a>
<a name="apple-x-bugs">
<div class="question"><p><b>Q8.7: I had Fink's XFree86 installed, and I've replaced it with Apple's X11, and now everything's crashing!</b></p></div>
<div class="answer"><p><b>A:</b> First of all, if you previously had the "threaded" versions of Fink's XFree86 packages installed, you may need to rebuild the application that is crashing. Some programs check for the availability of threading at build time, and then from then on believe that threading is available to them.
 </p><p>Secondly, you may have just hit an Apple X11 bug. As of the time of this writing, a number of bugs are known by the Apple team and are being worked on.
 </p><p>If you have general questions regarding Apple's X11 that are not really related to Fink, you may want to check <a href="http://www.lists.apple.com/x11-users">Apple's official discussion list on X11</a>. They also have also recommended that bugs in X11 be <a href="http://developer.apple.com/bugreporter">submitted to the Apple bug reporter</a>.
 </p></div>
</a>
<a name="apple-x-delete">
<div class="question"><p><b>Q8.8: I want the delete key in Apple's X11.app to behave like that in XDarwin.</b></p></div>
<div class="answer"><p><b>A:</b> Some users have reported that the behavior of the <code>delete</code> key is different between XDarwin and Apple X11. This can be rectified by adding lines to the appropriate X startup files:</p><p>
<b>.Xmodmap:</b>
</p><pre>keycode 59 = Delete</pre><p>
<b>.Xresources:</b>
</p><pre>
xterm*.deleteIsDEL: true
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?
</pre><p>
<b>.xinitrc</b>
</p><pre>xrdb -load $HOME/.Xresources
xmodmap $HOME/.Xmodmap</pre><p></p></div>
</a>
<a name="gnome-two">
<div class="question"><p><b>Q8.9: I upgraded from GNOME 1.x to GNOME 2.x and now <code>gnome-session</code> won't open a window manager.</b></p></div>
<div class="answer"><p><b>A:</b> While under GNOME 1.x <code>gnome-session</code> invokes the <code>sawfish</code> window manager automatically, under GNOME 2.x, you'll have to call a window manager in <code>~/.xinitrc</code> before running <code>gnome-session</code>, e.g.:</p><pre>...
exec metacity &amp;
exec gnome-session</pre></div>
</a>
<a name="apple-x11-no-windowbar">
	<div class="question"><p><b>Q8.10: I upgraded to Apple's X11 in Panther and now my window title bars are missing.</b></p></div>
	<div class="answer"><p><b>A:</b> You didn't upgrade X11 to version "X11 1.0 - XFree86 4.3.0" included with Panther. You can install X11 from X11.pkg on Disk 3.</p></div>
</a>
<a name="apple-x11-wants-xfree86">
	<div class="question"><p><b>Q8.11: I installed Apple's X11 in Panther but Fink keeps asking to install xfree86.</b></p></div>
	<div class="answer"><p><b>A:</b> You need to (re)install the X11SDK, which is on the Xcode CD, and is <b>not</b> installed by default.</p><p>Even if you install XCode, the X11SDK is <b>not</b> installed by default. It has to be installed either with a custom Xcode install, or by clicking on the <code>X11SDK</code> pkg in the <code>Packages</code> folder.</p><p>You can check your install by running <code>fink-virtual-pkgs</code> and checking to see that the <code>Package: system-xfree86</code> section is present and the <code>provides:</code> line contains <code>x11</code></p><p>If you don't see everything properly installed, the safest way to fix this error is to remove all older copies of xfree86 or system-xfree86 and reinstall Apple's X11 and the X11SDK. You may see warnings from the first line, which you can ignore:</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xfree86-base xfree86-base-shlibs; rm -rf /Library/Receipts/X11SDK.pkg \
/Library/Receipts/X11User.pkg; fink selfupdate; fink index</pre><p>Then, reinstall X11 from the third Panther CD and X11SDK from the Xcode CD.</p><p>Note:  <code>system-xfree86</code> no longer requires the X11SDK for binary installs if you have <code>fink-0.17.0</code> or later.</p></div>
</a>
<a name="apple-x11-beta-wants-xfree86">
	<div class="question"><p><b>Q8.12: I installed Apple's X11 with the 10.2-gcc3.3 version of Fink but Fink keeps asking to install xfree86.</b></p></div>
	<div class="answer"><p><b>A:</b> You need to (re)install the X11SDK, which you should have downloaded when you downloaded your beta copy of Apple's X11.</p><p>You can check your install by running <code>fink-virtual-pkgs</code> and checking to see that the <code>Package: system-xfree86</code> section is present and the <code>provides:</code> line contains <code>x11</code></p><p>If you don't see everything properly installed, the safest way to fix this error is to remove all older copies of xfree86 or system-xfree86 and reinstall Apple's X11 and the X11SDK. You may see warnings from the first line, which you can ignore:</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xfree86-base xfree86-base-shlibs; rm -rf /Library/Receipts/X11SDK.pkg \
/Library/Receipts/X11User.pkg; fink selfupdate; fink index</pre><p>Then, reinstall X11 and the X11SDK.</p><p>Note:  <code>system-xfree86</code> no longer requires the X11SDK for binary installs if you have <code>fink-0.17.0</code> or later.</p></div>
</a>



<?
include "footer.inc";
?>

