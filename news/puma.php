<?
$title = "Mac OS X 10.1 Compatibility Report";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/10/25 10:15:14 $';

include "header.inc";
?>


<h1>Mac OS X 10.1 Compatibility Report</h1>

<p>
This page gives a quick overview of Fink's compatibility with Mac OS X
10.1.
There have been some significant changes that affect compiling Unix
software.
The top issue is the new linker, which now uses a different symbol
resolution strategy by default (to increase launch performance) and as
a result has become much more pedantic.
In other news, 10.1 finally has /dev/random and /dev/urandom.
Unfortunately there are also new bugs, and old issues like broken SysV
shared memory and locale functions are still there.
</p>

<p><b>(Updated Oct 7.)</b></p>
<p>
apt-get had an issue that is now fixed in Fink 0.3.0.
If you use the binary distribution (i.e. you use <tt>dselect</tt> or
<tt>apt-get</tt> instead of <tt>fink install ...</tt>) and you've
already upgraded to 10.1, you'll need the
<a href="../download/puma-kit.php">special upgrade kit</a>.
Other users are not affected, but it is strongly recommended to
upgrade Fink to 0.3.0 before upgrading Mac OS X to 10.1.
</p>
<p>
To compile packages on Mac OS X 10.1, you need the 10.1 Developer
Tools.
The Developer Tools shipped with 10.0 don't work because of the linker
changes.
If you didn't get the new Developer Tools on CD, you can download them
from Apple's <a href="http://developer.apple.com/">Developer
Connection site</a> after a free registration.
</p>
<p>
PostgreSQL doesn't work on 10.1 in its current state.
We have been provided with a patch, but there are problems with it and
there's no updated package yet.
</p>
<p>
OpenSSH has been fixed, a new package is in Fink 0.3.0.
The new package also supports incoming X11 forwarding.
If you upgrade to 10.1, you may want to rebuild OpenSSH to take
advantage of /dev/urandom.
Just run 'fink rebuild openssh'.
</p>
<p>
There is a problem with XFree86 on 10.1 that can be corrected by
adjusting your keymapping preferences.
If XDarwin quits immediately when you start it after upgrading to
10.1, check out <a href="../faq/usage-packages.php#xfree-keymapping">this
FAQ entry</a>.
</p>
<p>
Apple has removed wget and replaced it with curl due to licensing
concerns.
Since Fink 0.2.6, the package manager checks the system and uses
whatever is available to download source tarballs.
The latest versions of both wget and curl are available as packages.
</p>
<p>
Xaw3D and possibly some other packages don't compile on 10.1 if you
have installed XFree86 manually (i.e. you have system-xfree86) or if
you have Xtools.
This is because Xaw3D uses XFree86's configuration files and only the
xfree86-base package has been adapted for 10.1.
Recent CVS versions of XFree86 also work, but only when you compiled
the whole thing yourself, not with the XDarwin 1.0a# binary test
releases.
(A fix for this is in CVS.)
</p>
<p>
There are various problems on dual-processor machines, one of them is
a bug in the OS kernel.
GNU Emacs and XEmacs have been reported to cause system lockups and
kernel panics on DP machines.
Also, there are problems building the oaf package on DP machines.
</p>
<p>
There are no further known 10.1-related issues beyond those listed
here.
If you run into problems, please report them on the <a
href="../lists/fink-users.php">mailing list</a> or through the <a
href="http://sourceforge.net/tracker/?atid=117203&group_id=17203">bug
tracker</a> at SourceForge.
</p>
<p>
Oh, one more thing: Many thanks to Apple for providing the project
with a pre-release copy of Mac OS X 10.1!
</p>


<?
include "footer.inc";
?>
