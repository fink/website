<?
$title = "F.A.Q. - Usage (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/01/08 21:17:37';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="prev" href="usage-general.php" title="Package Usage Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 7 Package Usage Problems - Specific Packages</h1>



<a name="gnome-panel"><div class="question"><p><b>Q7.1: The GNOME panel displays
black icons only. What's wrong?</b></p></div>
<div class="answer"><p><b>A:</b> 
This is caused by limitations in the operating system kernel.
The only solution so far is to turn off shared memory.
The Running X11 document has <a href="http://fink.sourceforge.net/doc/x11/trouble.php#black">details</a>.
</p></div></a>

<a name="xmms-quiet"><div class="question"><p><b>Q7.2: I get no sound from
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
<li>Run <tt><nobr>esdcat /usr/libexec/config.guess</nobr></tt> (or any other
file of a decent size).
If you hear a short noise, esound works and XMMS should work too if
it's configured correctly.
If you don't hear anything, esd isn't working for some reason.
You can try to start it up manually with <tt><nobr>esd &amp;</nobr></tt> and watch
the messages.
</li>
<li>
If it still doesn't work, check the permissions on
<tt><nobr>/tmp/.esd</nobr></tt> and <tt><nobr>/tmp/.esd/socket</nobr></tt>.
Those should have your normal user account as the owner.
If they aren't owned by you, kill esd if it's running, remove the
directory as root (<tt><nobr>sudo rm -rf /tmp/.esd</nobr></tt>), then start esd
again (as a normal user, not as root).
</li>
</ul><p>
Note that esd is designed to be run by a normal user, not by root.
It usually communicates via the file system socket
<tt><nobr>/tmp/.esd/socket</nobr></tt>.
You only need the <tt><nobr>-tcp</nobr></tt> and <tt><nobr>-port</nobr></tt> switches if
you want to run esd clients on another machine over the network.
</p><p>
There have also been reports of XMMS crashing or freezing on 10.1.
We don't have an analysis or a fix yet.
</p></div></a>

<a name="xdarwin-start"><div class="question"><p><b>Q7.3: Help! When I start
XDarwin, it immediately quits!</b></p></div>
<div class="answer"><p><b>A:</b> 
Don't Panic.
The Running X11 document now has an extensive <a href="http://fink.sourceforge.net/doc/x11/trouble.php#immedate-quit">troubleshooting
section</a> for this common problem.
</p></div></a>

<a name="no-server"><div class="question"><p><b>Q7.4: When I try to start XDarwin I get the message &quot;xinit:  No such file or directory (errno 2):  no server &quot;/usr/X11R6/bin/X&quot; in PATH&quot;.</b></p></div>
<div class="answer"><p><b>A:</b> This has come up recently:  all of the <tt><nobr>xfree86</nobr></tt> packages get built, but only <tt><nobr>xfree86-base</nobr></tt> and <tt><nobr>xfree86-base-shlibs</nobr></tt> are installed.  Check whether you have <tt><nobr>xfree86-rootless</nobr></tt> and <tt><nobr>xfree86-rootless-shlibs</nobr></tt> installed.  If not, then <tt><nobr>fink install xfree86-rootless</nobr></tt> should do the trick.</p><p>If you do have it installed, then try <tt><nobr>fink rebuild xfree86-rootless</nobr></tt>.  If that doesn't work, verify that you have <tt><nobr>/usr/bin/X11R6</nobr></tt> in your PATH.  If not, then make sure you are sourcing init.csh (or init.sh) in your startup.</p></div></a>


<a name="xfree-keymapping"><div class="question"><p><b>Q7.5: I just upgraded to Mac
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
<tt><nobr>~/Library/Preferences/org.xfree86.XDarwin.plist</nobr></tt> to get it
back, then start XDarwin and go to the Preferences dialog while the
splash screen is displayed.
Alternatively, you can edit that file manually in a text editor to
enable the keymapping option (the UseKeymappingFile and KeymappingFile
bits).
</p><p>
As a last resort, you can run <tt><nobr>startx -- -quartz -keymap
USA.keymapping</nobr></tt> from Terminal.app.
If this still doesn't work, you have another problem in addition to
the keymapping problem that prevents XDarwin from starting.
You'll get a bunch of diagnostic messages in Terminal.app to help you
sort this out.
</p></div></a>

<a name="xterm-error"><div class="question"><p><b>Q7.6: xterm fails with &quot;dyld: xterm Undefined symbols:  xterm undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib&quot;.</b></p></div>
<div class="answer"><p><b>A:</b> This is caused by using a 10.1 version of XFree86 on 10.2.  You must upgrade to a 10.2 version.</p><p>If you are using the fink <tt><nobr>xfree86</nobr></tt> packages, then you can get an upgrade by the usual means (&quot;<tt><nobr>fink selfupdate-cvs ; fink update-all</nobr></tt>&quot; for installation from source, <tt><nobr>fink selfupdate ; ; sudo apt-get update; sudo apt-get dist-upgrade</nobr></tt>&quot; for installation from binaries.</p><p>If you have installed XFree86 by other means, you can find patches to bring you up to date at the <a href="http://mrcla.com/XonX">XonX web site</a>.</p></div></a>

<a name="libXmuu"><div class="question"><p><b>Q7.7: When I try to start XFree86 I get one of the following errors:  &quot;dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib&quot; or &quot;dyld: xinit can't open library:  /usr/X11R6/lib/libXext.6.dylib&quot;</b></p></div>
<div class="answer"><p><b>A:</b> 
You are missing a file that is supposed to be installed by <tt><nobr>xfree86-rootless-(threaded)-shlibs</nobr></tt>.  You should reinstall it using <tt><nobr>fink reinstall xfree86-rootless-shlibs</nobr></tt> (<tt><nobr>fink reinstall xfree86-rootless-threaded-shlibs</nobr></tt> if you are using the threaded XFree86 packages) for source, or <tt><nobr>sudo apt-get install --reinstall xfree86-rootless-shlibs</nobr></tt> for binaries.</p></div>
</a>



<?
include "footer.inc";
?>

