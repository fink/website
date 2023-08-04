<?php
$title = "ReadMe";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 6:29:59';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink ReadMe</h1>
<!--Generated from $Fink: readme.en.xml,v 1.14 2023/08/04 6:29:59 nieder Exp $-->
<p>
This is Fink, a package management system that aims to bring the full
world of Open Source software to Darwin and Mac OS X.
</p>
<p>
With the help of dpkg, it maintains a separate directory hierarchy.
It downloads original source releases, patches them if necessary,
configures them for Darwin and compiles and installs them.
The information about available packages and the necessary patches
(the "package descriptions") are maintained separately, but are
usually included with this distribution.
The actual source code is downloaded from the Internet as necessary.
</p>
<p>
Although Fink cannot be considered "mature" and it has some rough
edges and lacking features, it is successfully used by a large number
of people.
Please read the instructions carefully and don't be surprised if
something doesn't work as expected.
There are good explanations for most failures; check the website if
you need help.
</p>
<p>
Fink is released under the terms of the GNU General Public License.
See the file COPYING for details.
</p>
<h2><a name="req">Requirements</a></h2>
<p>
You need:
</p>
<ul>
<li><p>
An installed Mac OS X system, version 10.7 or later.
</p></li>
<li><p>
The Xcode Command Line Tools are mandatory. This package can be installed either by 
either by downloading it directly via developer.apple.com/xcode/, or by
running the</p>
<pre>xcode-select --install</pre>
<p>command and choosing the   
<b>Install</b> button in the window that pops up.
You may also need to use this command to update the tools,
especially if you're having build problems.</p>
<p>If you're doing a manual download, make sure that the tools you install match your
 Mac OS X version as well as your Xcode app version (if that is present).
</p>
<p>You will need to accept the Xcode license as root.  To do that, run</p>
<pre>sudo xcodebuild -license</pre>
<p>then scroll to the bottom of the text and type</p>
<pre>agree</pre>
<p>Some packages require the full Xcode.</p>
</li>
<li><p>Java.  Entering</p>
<pre>javac</pre>
<p>from a Terminal.app window should suffice to make the system download it for you.</p></li>
<li><p>
XQuartz to satisfy <code>x11-dev</code> build dependencies. This package can be installed
by downloading it directly via <a href="https://xquartz.org">https://xquartz.org</a>.
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
<h2><a name="install">Installation</a></h2>
<p>
The installation process is described in detail in the file
INSTALL.
Please read it first, the process is non-trivial.
It also describes the upgrade procedure.
</p>
<h2><a name="usage">Using Fink</a></h2>
<p>
The file USAGE describes how to set your paths and how to install and
remove packages.
It also has a complete list of available commands.
</p>
<h2><a name="questions">Further Questions?</a></h2>
<p>
If the documentation included here doesn't answer your question,
stroll over to the Fink website at
<a href="/">/</a>
and check out the Help page there:
<a href="/help/">/help/</a>.
It will point you at the other documentation that is available and
sources for support if you need it.
</p>
<p>
If you'd like to contribute to Fink, the Help page mentioned above
also has a list of things you can do, like testing or creating
packages.
</p>
<h2><a name="uptodate">Staying Informed</a></h2>
<p>
The project's website is at 
<a href="/">/</a>.
</p>
<p>
To be informed of new releases, go to
<a href="/lists/fink-announce.php">http://finkproject.org/lists/fink-announce.php</a>
and subscribe to the fink-announce mailing list.
The list is moderated and low-traffic.
</p>

<?php include_once "../footer.inc"; ?>


