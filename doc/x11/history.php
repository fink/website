<?
$title = "Running X11 - History";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/12/02 02:38:25';

$metatags = '<link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="inst-xfree86.php" title="Getting and Installing XFree86"><link rel="prev" href="intro.php" title="Introduction">';

include "header.inc";
?>

<h1>Running X11 - 2 History</h1>



<p>[Sorry for the epic language, I couldn't resist...]</p>

<h2><a name="early">2.1 The early days</a></h2>

<p>
In the beginning, there was void.
Darwin was in its infancy, Mac OS X was still in development and there
was no X11 implementation for both of them.
</p>
<p>
Then there came John Carmack and ported XFree86 to Mac OS X Server,
which was the only OS in the Darwin family available at that time.
Later that port was updated for XFree86 4.0 and Darwin 1.0 by Dave
Zarzycki.
The patches found their way into the Darwin CVS repository and slept
there, waiting for things to come.
</p>

<h2><a name="xonx-forms">2.2 XonX forms</a></h2>

<p>
One fine day Torrey T. Lyons came along and gave the Darwin patches
the attention they had been waiting for.
Finally, he brought them to a new home, the official XFree86 CVS
repository.
This was the time of the Mac OS X Public Beta and Darwin 1.2.
XFree86 4.0.2 worked fine on Darwin, but on Mac OS X it required users
to log out of Aqua and go to the console to run it.
So Torrey gathered the <a href="http://mrcla.com/XonX/">XonX team</a> around
him and set out on a voyage to bring XFree86 to Mac OS X.
</p>
<p>
At about the same time Tenon started to build Xtools, using XFree86
4.0 as the foundation.
</p>

<h2><a name="root-or-not">2.3 To root or not to root</a></h2>

<p>
Soon the XonX team had XFree86 running in a fullscreen mode in
parallel to Quartz and was putting out test releases for adventurous
users.
The test releases were called XFree86-Aqua, or XAqua for short.
Since Torrey had taken the lead, changes went directly to
XFree86's CVS repository, which was heading towards the 4.1.0
release.
</p>
<p>
In the first stages interfacing with Quartz was done via a small
application called Xmaster.app (written with Carbon, then rewritten
with Cocoa).
Later that code was integrated into the X server proper, giving birth
to XDarwin.app.
Shared library support was also added at this time (and Tenon was
convinced to use this set of patches instead of their own to ensure
binary compatibility).
There was even good progress on a rootless mode (using the Carbon
API), but alas, it was too late to get it into XFree86 4.1.0.
And the rootless patch was free, and continued to float around the
net.
After XFree86 4.1.0 shipped with just the fullscreen mode, work on the
rootless mode continued, now using the Cocoa API.
An experimental rootless mode was put into XFree86's CVS repository.
</p>
<p>
In the meantime, Apple released Mac OS X 10.0 and Darwin 1.3,
and Tenon released Xtools 1.0 some weeks after that.
</p>
<p>Development continued on integrating the rootless mode into XFree86,
so that by the time XFree86 4.2.0 shipped in January 2002, the Darwin/Mac OS X 
version had been completely integrated into the main XFree86 distribution.
</p>

<p align="right">
Next: <a href="inst-xfree86.php">3 Getting and Installing XFree86</a></p>


<?
include "footer.inc";
?>

