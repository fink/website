<?php
$title = "Upgrade Instructions for Mac OS X 10.3";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>


<h1>Upgrade Instructions for Mac OS X 10.3</h1>

<p>It is now possible to upgrade Fink to take full advantage of the gcc 3.3
compiler, or to use OS X 10.3 if you have that installed.  Both source
users
and binary users can upgrade; however, at present the binary version
is much more stable and reliable than the source version.
</p><p>
If you wish to perform this upgrade (in source form), and you had
previously installed the 
June 2003 Developer Tools update from Apple, you will need to install
the August 2003 Developer Tools update BEFORE you upgrade Fink.  Under
10.3, be sure to install XCode from the XCode disk before upgrading
Fink.
</p><p>
Running "fink selfupdate" should perform the upgrade for you.  The latest
version of the fink package manager will automatically detect which
version of OS X and which version of gcc you have installed, and will
adjust itself accordingly.
</p><p>
If you wish to do a fresh install of Fink on a 10.3 system, we recommend
<a href="http://fink.sourceforge.net/download/srcdist.php">bootstrapping from
source,</a> starting from fink-full-0.6.1.tar.gz available
on fink's <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">sourceforge 
download page.</a>  You'll need XCode for this as
well.
</p><p>
Also note that once you have Fink version 0.15.0 or higher, you do
not need to install system-xfree86 anymore.  Fink is
capable of automatically determining your system-xfree86 version if you
don't already have any fink x11 packages installed.  If you currently
have an old system-xfree86 package of any kind installed, please run the
following:
</p>
<pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43; fink selfupdate; fink index</pre>
<p>
The Fink team is still working on getting Fink packages working under 10.3,
but many many packages already work.
</p>

<?php
include "footer.inc";
?>
