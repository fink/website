<?
$title = "User's Guide - Packages";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/01/27 17:18:32';

$metatags = '<link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="next" href="upgrade.php" title="Upgrading Fink"><link rel="prev" href="install.php" title="First Time Installation">';

include "header.inc";
?>

<h1>User's Guide - 3 Installing Packages</h1>




<p>
Now that you have something that can be called a Fink installation,
this chapter shows you how to install the actual software packages you
came for.
Before we explain how to install packages using either the source or
the binary distribution, some important notes that apply to both.
</p>


<h2><a name="x11">3.1 Getting X11 Sorted Out</a></h2>
<p>
Since there are several X11 implementations available for Mac OS X
(XFree86, Tenon Xtools, eXodus) and several ways to install them
(manually or via Fink), there are several alternative packages - one
for each setup.
Fink is very bad at guessing what you have, so it's important to pick
the right one and install it before you start installing X11
applications.
Here is a list of the available packages and X11 installation methods:
</p>
<ul>
<li><p>
xfree86-base:
This package is the real thing.
It installs the whole load of XFree86 as a Fink package.
For maximum flexibility, this package does not contain the actual
XDarwin server.
To get that, you can install the xfree86-server or the
xfree86-rootless package.
Or you can install it manually, for example using an &quot;XDarwin&quot; test
release from the XonX project or one of the &quot;rootless&quot; servers
circulating the net.
</p></li>
<li><p>
system-xfree86:
This package expects that you installed XFree86 manually, either from
source or from the official binary distribution.
It will just check that the installation is useful and then act as a
dependency placeholder.
Note that XFree86 4.0.2 or 4.0.3 will not pass the test.
You need a version that builds shared libraries.
Usually that will be 4.1.0 or later, but CVS versions of XFree86 starting
around spring 2001 will also work.
</p></li>
<li><p>
system-xtools:
Install this package if you have Tenon's Xtools product installed.
Like system-xfree86, this will just do a sanity check and leave the
actual files alone.
</p></li>
</ul>
<p>
For more information on installing and running X11, refer to the
<a href="http://fink.sourceforge.net/doc/x11/">X11 on Darwin
and Mac OS X document</a>.
</p>


<h2><a name="bin-dselect">3.2 Installing Binary Packages with
dselect</a></h2>
<p>
<code>dselect</code> is a program that lets you browse the list of
available packages and select which ones you want installed.
It runs inside Terminal.app, but takes over the whole &quot;screen&quot; and
uses simple keyboard navigation.
Like the other package management tools, <code>dselect</code> requires
root privileges, so you must either become root before you start it or
use sudo:
</p>
<pre>sudo dselect</pre>
<p>
The main menu has several choices:
</p>
<ul>
<li><p>
<b>[A]ccess</b> - this configures the network access method to use.
<b>You do not need to run this</b>, since Fink pre-configures
everything for you.
Actually, you should avoid this menu item as it may overwrite the
default configuration with one that doesn't work.
</p></li>
<li><p>
<b>[U]pdate</b> - this item downloads the list of available packages
from the Fink site.
This item does not install or update any actual packages, it just
updates the listings used for the package browser.
You must run this at least once after installing Fink.
</p></li>
<li><p>
<b>[S]elect</b> - this gives you the actual package listing, where
you can select and deselect the packages you want on your system.
More about this later.
</p></li>
<li><p>
<b>[I]nstall</b> - this is where the action is.
The menu items above only affect dselect's package listings and status
database.
This one actually goes out and downloads and installs the packages you
have requested.
It also removes the packages you have deselected in the browser.
</p></li>
<li><p>
<b>[C]onfig</b> and <b>[R]emove</b> - these are relics from the
time before apt.
You do not need them, although they won't do harm.
</p></li>
<li><p>
<b>[Q]uit</b> - now that should really be obvious.
</p></li>
</ul>

<p>
You'll spend most of your time with dselect in the package browser,
reachable through the &quot;[S]elect&quot; menu item.
Before dselect shows you the package list, it presents you with an
introductory help screen.
You can press 'k' to get a full listing of keyboard commands, or just
Space to get to the package list.
</p>
<p>
You can move through the list using the up and down keys.
Selections are made with '+' and '-'.
When you select a package that needs some other packages, dselect will
show you a sublist with the affected packages.
In most cases you can just press Return to accept dselect's choices.
You can also make adjustments in the sublist (e.g. to choose another
alternative for a virtual package dependency), or press 'R'
(i.e. Shift-R) to return to the previous state.
Both the sublists and the main package list are left by pressing
Return.
When you're happy with your selections, leave the main list and use
the &quot;[I]nstall&quot; menu item to actually install the packages.
</p>


<h2><a name="bin-apt">3.3 Installing Binary Packages with
apt-get</a></h2>
<p>
<code>dselect</code> doesn't actually download the packages itself.
Instead, it runs apt to do the dirty work.
If you prefer a pure command line interface, you can access the
functions of apt directly, with the <code>apt-get</code> command.
</p>
<p>
Like with dselect, you must first download the current listing of
available packages with this command:
</p>
<pre>sudo apt-get update</pre>
<p>
Like the &quot;[U]pdate&quot; menu item in dselect, this doesn't update the
actual files on your computer, just apt's list of available packages.
To install a package, you just give apt-get the name, like this:
</p>
<pre>sudo apt-get install lynx</pre>
<p>
If apt-get determines that the packages requires other packages to be
installed, it will show you the list and ask for confirmation.
It then downloads and installs the requested packages.
Removing packages is just as easy:
</p>
<pre>sudo apt-get remove lynx</pre>
<p>

</p>


<h2><a name="bin-exceptions">3.4 Installing Dependent Packages that are Unvailable in the Binary Distribution</a></h2>
<p>Sometimes, when doing a binary install, you may get messages that a dependency can't be installed. e.g.:</p>
<pre>Sorry, but the following packages have unmet
dependencies:
foo: Depends: bar (&gt;= version) but it is
not installable
E: Sorry, broken packages</pre>
<p>What has happened is that the package you are trying to install depends on another package that can't be distributed as a binary, due to licensing requirements.  You must install the dependency from source (see the next section).</p>



<h2><a name="src">3.5 Installing Packages from Source</a></h2>
<p>First of all, you'll need an appropriate version of the Development Tools for your system.  These are available for free download after registration at <a href="http://connect.apple.com">http://connect.apple.com</a>.</p>
<p>
To get a list of packages that are available for installation from
source, ask the <code>fink</code> tool:
</p>
<pre>fink list</pre>
<p>
The first column lists the installation state (blank for not
installed, <code>i</code> for installed, <code>(i)</code> for
installed but not the latest version), followed by the package name,
the latest version, and a short description.
You can ask for more information about a specific package using the
&quot;describe&quot; command (&quot;info&quot; is an alias for this):
</p>
<pre>fink describe xmms</pre>
<p>
When you have found a package that you want to install, use the
&quot;install&quot; command:
</p>
<pre>fink install wget-ssl</pre>
<p>
The <code>fink</code> command will first check if all necessary
prerequisites (&quot;dependencies&quot;) are present, and will ask you if it's
okay to install them if some are missing.
Then it goes ahead and downloads source code, unpacks it, patches it,
compiles it, and installs the results on your system.
This can take a long time.
If you run into errors during that process, please first check the
<a href="http://fink.sourceforge.net/faq/">FAQ</a>.
</p>


<p align="right">
Next: <a href="upgrade.php">4 Upgrading Fink</a></p>


<?
include "footer.inc";
?>

