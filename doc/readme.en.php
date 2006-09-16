<?
$title = "ReadMe";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2006/09/16 23:17:53';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink ReadMe</h1>
<!--Generated from $Fink: readme.en.xml,v 1.4 2006/09/16 23:17:53 dmrrsn Exp $-->
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
An installed Mac OS X system, version 10.0 or later.
(There may still be some stray linker-related problems with 10.1.)
Darwin 1.3.1 should also work, but this has not been tested.
Earlier versions of both will <b>not</b> work.
</p></li>
<li><p>
Development tools.
On Mac OS X, install the Developer.pkg package from the Developer
Tools CD.
Make sure that the tools you install match your Mac OS X version.
On Darwin, the tools should be present in the default install.
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
<a href="http://www.finkproject.org/">http://www.finkproject.org/</a>
and check out the Help page there:
<a href="http://www.finkproject.org/help/">http://www.finkproject.org/help/</a>.
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
<a href="http://www.finkproject.org/">http://www.finkproject.org/</a>.
</p>
<p>
To be informed of new releases, go to
<a href="http://www.finkproject.org/lists/fink-announce.php">http://www.finkproject.orgt/lists/fink-announce.php</a>
and subscribe to the fink-announce mailing list.
The list is moderated and low-traffic.
</p>

<? include_once "../footer.inc"; ?>


