<?
$title = "About";
$cvs_author = '$Author: jeff_yecn $';
$cvs_date = '$Date: 2004/03/02 03:32:01 $';

include "header.inc";
?>


<h1>More About Fink</h1>

<h2>What is Fink?</h2>

<p>
Fink is a project that wants to bring the full world of Unix
<a href="http://www.opensource.org/">Open Source</a> software to
<a href="http://www.opensource.apple.com/">Darwin</a> and
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
As a result, we have two main goals.
First, to modify existing Open Source software so that it will compile
and run on Mac OS X.
(This process is called porting.)
Second, to make the results available to casual users as a coherent,
comfortable distribution that matches what Linux users are used to.
(This process is called packaging.)
The project offers precompiled binary packages as well as a fully
automated build-from-source system.
</p>
<p>
To achieve these goals, Fink relies on the excellent package
management tools produced by the
<a href="http://www.debian.org/">Debian</a> project - <code>dpkg</code>,
<code>dselect</code> and <code>apt-get</code>.
On top of that, Fink adds its own package manager, named (surprise!)
<code>fink</code>.
You can view <code>fink</code> as a build engine - it takes package
descriptions and produces binary .deb packages from that.
In the process, it downloads the original source code from the
Internet, patches it as necessary, then goes through the whole process
of configuring and building the package.
Finally, it wraps the results up in a package archive that is ready to
be installed by <code>dpkg</code>.
</p>
<p>
Since Fink sits on top of Mac OS X, it has a strict policy to avoid
interference with the base system.
As a result, Fink manages a separate directory tree and provides the
infrastructure to make it easy to use.
</p>


<h2>Why use Fink?</h2>

<p>
Five reasons to use Fink to install Unix software on your Mac:
</p>

<p>
<b>Power.</b>
Mac OS X includes only a basic set of command line tools.
Fink brings you enhancements for these tools as well as a selection of
graphical applications developed for Linux and other Unix variants.
</p>

<p>
<b>Convenience.</b>
With Fink the compile process is fully automated; you'll never have to
worry about Makefiles or configure scripts and their parameters
again.
The dependency system automatically takes care that all required
libraries are present.
Our packages are usually set up for their maximum feature set.
</p>

<p>
<b>Safety.</b>
Fink's strict non-interference policy makes sure that the vulnerable
parts of you Mac OS X system are not touched.
You can update Mac OS X without fear that it will step on Fink's toes
and vice versa.
Also, the packaging system lets you safely remove software you no
longer need.
</p>

<p>
<b>Coherence.</b>
Fink is not just a random collection of packages, it is a coherent
distribution.
Installed files are placed in predictable locations.
Documentation listings are kept up to date.
There's a unified interface to control server processes.
And there's more, most of it working for you under the hood.
</p>

<p>
<b>Flexibility.</b>
You only download and install the programs you need.
Fink gives you the freedom to install XFree86 or other X11 solutions
in any way you like.
If you don't want X11 at all, that's okay too.
</p>


<p>
<a href="index.php">Back Home</a> -
<a href="download/index.php">Download</a>
</p>


<?
include "footer.inc";
?>
