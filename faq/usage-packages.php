<?
$title = "F.A.Q. - Usage (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/07/30 13:30:20';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="prev" href="usage-general.php" title="Package Usage Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 7 Package Usage Problems - Specific Packages</h1>


<a name="xmms-quiet">
<div class="question"><p><b>Q7.1: I get no sound from
XMMS</b></p></div>
<div class="answer"><p><b>A:</b> 
Make sure you have the &quot;eSound Output Plugin&quot; selected in the XMMS
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
If you hear a short noise, esound works and XMMS should work too if
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
</p><p>
There have also been reports of XMMS crashing or freezing on 10.1.
We don't have an analysis or a fix yet.
</p></div>
</a>
<a name="nedit-window-locks">
<div class="question"><p><b>Q7.2: If I am editing a file in nedit, when I open another file its window pops up but is unresponsive.</b></p></div>
<div class="answer"><p><b>A:</b> This is a known problem that occurs with recent versions of <code>nedit</code> and <code>lesstif</code> on all platforms.  The workaround is to open a new window with File--&gt;New, then open the next file you want to work on.</p><p>This is now fixed in <code>nedit-5.3-6</code>, which depends on <code>openmotif3</code> rather than <code>lesstif</code>.</p></div>
</a>
<a name="xdarwin-start">
<div class="question"><p><b>Q7.3: Help! When I start
XDarwin, it immediately quits!</b></p></div>
<div class="answer"><p><b>A:</b> 
Don't Panic.
The Running X11 document now has an extensive <a href="http://fink.sourceforge.net/doc/x11/trouble.php#immedate-quit">troubleshooting
section</a> for this common problem.
</p></div>
</a>
<a name="no-server">
<div class="question"><p><b>Q7.4: When I try to start XDarwin I get the message &quot;xinit:  No such file or directory (errno 2):  no server &quot;/usr/X11R6/bin/X&quot; in PATH&quot;.</b></p></div>
<div class="answer"><p><b>A:</b> This has come up recently:  all of the <code>xfree86</code> packages get built, but only <code>xfree86-base</code> and <code>xfree86-base-shlibs</code> are installed.  Check whether you have <code>xfree86-rootless</code> and <code>xfree86-rootless-shlibs</code> installed.  If not, then <code>fink install xfree86-rootless</code> should do the trick.</p><p>If you do have it installed, then try <code>fink rebuild xfree86-rootless</code>.  If that doesn't work, verify that you have <code>/usr/bin/X11R6</code> in your PATH.  If not, then make sure you are sourcing init.csh (or init.sh) in your startup.</p></div>
</a>
<a name="xfree-keymapping">
<div class="question"><p><b>Q7.5: I just upgraded to Mac
OS X 10.1 and now XFree86 always quits immediately. In the messages it
says &quot;assert failed on line 454 of darwinKeyboard.c!&quot;. What's
wrong?</b></p></div>
<div class="answer"><p><b>A:</b> 
This is a known problem on 10.1.
You must use the &quot;Load from file&quot; keymapping option since the default
option (loading it from the kernel) doesn't work anymore.
The setting is in the XDarwin Preferences dialog.
Be sure that a file is selected (e.g. USA.keymapping) - simply
activating the check box may not be sufficient with some versions.
If you can't get to the Preferences dialog because you disabled all
splash screens, you can delete
<code>~/Library/Preferences/org.xfree86.XDarwin.plist</code> to get it
back, then start XDarwin and go to the Preferences dialog while the
splash screen is displayed.
Alternatively, you can edit that file manually in a text editor to
enable the keymapping option (the UseKeymappingFile and KeymappingFile
bits).
</p><p>
As a last resort, you can run <code>startx -- -quartz -keymap
USA.keymapping</code> from Terminal.app.
If this still doesn't work, you have another problem in addition to
the keymapping problem that prevents XDarwin from starting.
You'll get a bunch of diagnostic messages in Terminal.app to help you
sort this out.
</p></div>
</a>
<a name="xterm-error">
<div class="question"><p><b>Q7.6: xterm fails with &quot;dyld: xterm Undefined symbols:  xterm undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib&quot;.</b></p></div>
<div class="answer"><p><b>A:</b> This is caused by using a 10.1 version of XFree86 on 10.2.  You must upgrade to a 10.2 version.</p><p>If you are using the fink <code>xfree86</code> packages, then you can get an upgrade by the usual means (&quot;<code>fink selfupdate-cvs ; fink update-all</code>&quot; for installation from source, <code>fink selfupdate ; ; sudo apt-get update; sudo apt-get dist-upgrade</code>&quot; for installation from binaries.</p><p>If you have installed XFree86 by other means, you can find patches to bring you up to date at the <a href="http://mrcla.com/XonX">XonX web site</a>.</p></div>
</a>
<a name="libXmuu">
<div class="question"><p><b>Q7.7: When I try to start XFree86 I get one of the following errors:  &quot;dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib&quot; or &quot;dyld: xinit can't open library:  /usr/X11R6/lib/libXext.6.dylib&quot;</b></p></div>
<div class="answer"><p><b>A:</b> 
You are missing a file that is supposed to be installed by <code>xfree86-base-(threaded)-shlibs</code>.  You should reinstall it using <code>fink reinstall xfree86-base-shlibs</code> (<code>fink reinstall xfree86-base-threaded-shlibs</code> if you are using the threaded XFree86 packages) for source, or <code>sudo apt-get install --reinstall xfree86-base-shlibs</code> for binaries.</p></div>
</a>
<a name="apple-x-bugs">
<div class="question"><p><b>Q7.8: I had Fink's XFree86 installed, and I've replaced it with Apple's X11, and now everything's crashing!</b></p></div>
<div class="answer"><p><b>A:</b> 
  First of all, if you previously had the &quot;threaded&quot; versions of Fink's XFree86 packages installed, you may need to rebuild the application that is crashing.  Some programs check for the availability of threading at build time, and then from then on believe that threading is available to them.
 </p><p>
  Secondly, you may have just hit an Apple X11 bug.  As of the time of this writing, a number of bugs are known by the Apple team and are being worked on.
 </p><p>
  If you have general questions regarding Apple's X11 that are not really related to Fink, you may want to check <a href="http://www.lists.apple.com/x11-users">Apple's official discussion list on X11</a>. They also have also recommended that bugs in X11 be <a href="http://developer.apple.com/bugreporter">submitted to the Apple bug reporter</a>.
 </p></div>
</a>
<a name="apple-x-delete">
<div class="question"><p><b>Q7.9: I want the delete key in Apple's X11.app to behave like that in XDarwin.</b></p></div>
<div class="answer"><p><b>A:</b> Some users have reported that the behavior of the <code>delete</code> key is different between XDarwin and Apple X11.  This can be rectified by adding lines to the appropriate X startup files:</p><p>
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



<?
include "footer.inc";
?>

