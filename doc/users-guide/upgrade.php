<?
$title = "User's Guide - Upgrade";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/04/05 15:29:30';

$metatags = '<link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="next" href="conf.php" title="The Fink Configuration File"><link rel="prev" href="packages.php" title="Installing Packages">';

include "header.inc";
?>

<h1>User's Guide - 4 Upgrading Fink</h1>



<p>
This chapter covers the procedures used to update your Fink
installation with the latest and greatest stuff.
</p>

<h2><a name="bin">4.1 Upgrading using Binary Packages</a></h2>

<p>
If you use the binary distribution exclusively, there is no separate
upgrade procedure.
Just ask the tool of your choice to get the latest package listing
from the server and let it update all packages.
</p>
<p>
For dselect, it is sufficient to hit &quot;[U]pdate&quot;, then &quot;[I]nstall&quot;.
Of course, you may want to run &quot;[S]elect&quot; in between to check the
selections that were made and to find out about new packages.
</p>
<p>
For apt, run <code>apt-get update</code> to get the latest package
list, then <code>apt-get upgrade</code> to update all packages that
have new versions available.
</p>
<p>
For more information, especially about upgrading from Fink versions
older than 0.3.0, see the
<a href="http://fink.sourceforge.net/download/upgrade.php">Upgrade Matrix</a>.
</p>

<h2><a name="src">4.2 Upgrading the Source Distribution</a></h2>

<p>
Upgrading is a bit more complicated if you use the source
distribution.
The procedure consists of two steps.
In the first step, you download the latest package descriptions to
your computer.
In the second step, these package descriptions are used to compile new
packages; the actual source code is downloaded as needed.
</p>
<p>
If you have Fink 0.2.5 or later, the first step can be accomplished by
running <code>fink selfupdate</code>.
That command will check with the Fink website to see if a new point
release is available, and will automatically download and install the
package descriptions in that case.
In recent versions of the <code>fink</code> command, you get the
option to pull package descriptions directly from CVS.
CVS is a version-controlled repository where the package descriptions
are stored and managed.
Using CVS has the advantage that it is updated continuously.
</p>
<p>
If you have a version of Fink older than 0.2.5, you must download the
package descriptions manually.
Visit the <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">download
area</a> and look for the latest packages-0.x.x.tar.gz tarball in
the &quot;distribution&quot; module.
Download it, then install it as follows:
</p>
<pre>tar -xzf packages-0.x.x.tar.gz
cd packages-0.x.x
./inject.pl</pre>
<p>
Once you have updated your package descriptions (no matter which way),
you should update all packages at once with the command <code>fink
update-all</code>.
</p>

<h2><a name="mix">4.3 Mixing Binaries and Source</a></h2>

<p>
If you use precompiled binary packages for some packages and build
others from source, you'll have to follow both sets of instructions
above to upgrade your Fink installation.
That is, first use <code>dselect</code> or <code>apt-get</code> to get
the latest versions of the packages that are available as binaries,
then use <code>fink selfupdate</code> and <code>fink update-all</code>
to get the current package descriptions and to update the remaining
packages.
</p>

<p align="right">
Next: <a href="conf.php">5 The Fink Configuration File</a></p>


<?
include "footer.inc";
?>

