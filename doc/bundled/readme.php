<?
$title = "ReadMe";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/07/31 16:32:49';

$metatags = '';

include "header.inc";
?>

<h1>Fink 0.2.4 ReadMe</h1><p>Generated from <i>$Fink: readme.xml,v 1.3 2001/07/31 16:32:49 chrisp Exp $</i></p>
<p>
This is Fink, a package management system that aims to bring the full
world of GNU and other common Open Source software to Darwin and
Mac OS X.
</p>
<p>
With the help of dpkg, it maintains a separate directory hierarchy.
It downloads original source releases, patches them if neccessary,
configures them for Darwin and compiles and installs them.
The information about available packages and the neccessary patches
are included with this distribution, everything else is downloaded off
the Internet.
</p>
<p>
This is version 0.2.4, a development release.
It has rough edges everywhere, and lacks lots of useful features.
The package list is also quite short. You're walking on thin ground.
It could easily break your system (although it hasn't broken mine to
date).
You have been warned.
</p>
<p>
Fink is released under the terms of the GNU General Public License.
See the file COPYING for details.
</p>
<a name="req"><h2>Requirements</h2></a>
<p>
You need:
</p>
<ul>
<li><p>
An installed Mac OS X system, version 10.0 or later.
Darwin 1.3.1 should also work, but this has not been tested.
Earlier versions of both will <b>not</b> work.
</p></li>
<li><p>
Development tools.
On Mac OS X, install the Developer.pkg package from the Developer
Tools CD.
On Darwin, the tools should be present in the default install.
</p></li>
<li><p>
Many other things that come with Mac OS X and the Developer Tools.
This includes perl 5.6, wget and autoconf.
</p></li>
<li><p>
Internet access.
All source code is downloaded from mirror sites.
</p></li>
<li><p>
Patience.
Compiling several big packages takes time.
I'm talking hours or even days here.
</p></li>
</ul>
<a name="install"><h2>Installation</h2></a>
<p>
The installation process is described in detail in the file
INSTALL.
Please read it first, the process is non-trivial.
It also describes the upgrade procedure.
</p>
<a name="usage"><h2>Using Fink</h2></a>
<p>
The file USAGE describes how to set your paths and how to install and
remove packages.
It also has a complete list of available commands.
</p>
<a name="questions"><h2>Further Questions?</h2></a>
<p>
If the documentation included here doesn't answer your question,
stroll over to the Fink website at
<a href="http://fink.sourceforge.net/">http://fink.sourceforge.net/</a>
and read the FAQ there:
<a href="http://fink.sourceforge.net/faq/">http://fink.sourceforge.net/faq/</a>.
</p>
<p>
If that still doesn't answer your questions, ask for help on the
fink-users mailing list (see below).
</p>
<a name="uptodate"><h2>Staying Informed</h2></a>
<p>
To be informed of new releases, go to
<a href="http://fink.sourceforge.net/lists/fink-announce.php">http://fink.sourceforge.net/lists/fink-announce.php</a>
and subscribe yourself to the fink-announce mailing list.
The list is moderated and low-traffic.
</p>
<p>
To get help or just chat with other Fink users, subscribe to the
fink-users mailing list at
<a href="http://fink.sourceforge.net/lists/fink-users.php">http://fink.sourceforge.net/lists/fink-users.php</a>.
</p>
<p>
The project's website is at 
<a href="http://fink.sourceforge.net/">http://fink.sourceforge.net/</a>.
</p>
<a name="contribute"><h2>Contributing</h2></a>
<p>
If you have anything to contribute or want to join me in working on
this, send an email to &lt;fink@chrisp.de&gt;.
</p>



<?
include "footer.inc";
?>
