<?
$title = "Installation - Upgrade from 0.2";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/04/15 19:53:09';

$metatags = '<link rel="contents" href="install.php" title="Installation Contents"><link rel="next" href="install-up01.php" title="Upgrading From Fink 0.1.x"><link rel="prev" href="install-up03.php" title="Upgrading From Fink 0.3.x">';

include "header.inc";
?>

<h1>Installation - 4 Upgrading From Fink 0.2.x</h1>




<p>
If you already have Fink 0.2.x installed, you can update your
installation to 0.4.1 with this package.
</p>
<p>
Actually, there are two pieces that are updated independently: the
package manager and the package descriptions. It is recommended to
update the package manager first.
</p>


<a name="packman"><h2>4.1 Updating The Package Manager</h2></a>
<p>
To update the package manager, run the inject.pl script in the
fink-0.4.1-full directory, like this:
</p>
<pre>./inject.pl</pre>
<p>
It will try to locate your Fink installation automatically. If it
can't find it, you can pass the path as a parameter, like this:
</p>
<pre>./inject.pl /sw</pre>
<p>
The script copies the package descriptions into the appropriate
directory, creates tarballs in /sw/src and then runs fink to install
the new versions of the fink and base-files packages.
(Yes, that means that fink updates itself. <tt><nobr>:-)</nobr></tt> )
</p>


<a name="descriptions"><h2>4.2 Updating The Package Descriptions</h2></a>
<p>
If you downloaded the fink-0.4.1-full tarball, the package
descriptions are in the subdirectory pkginfo. To install them, run the
inject.pl script in that directory:
</p>
<pre>cd pkginfo
./inject.pl</pre>
<p>
This inject.pl script works just like the one for the package
manager.
</p>
<p>
You can also grab the package descriptions as a separate tarball,
packages-0.4.1. If you did that, just unpack it and run the inject.pl
script inside.
</p>
<p>
As a third alternative, you can have Fink automatically update itself to
the latest set of package descriptions by issuing the following command:
</p>
<pre>fink selfupdate</pre>


<a name="x11"><h2>4.3 Getting X11 Sorted Out</h2></a>
<p>
The first thing you should do after updating the package descriptions
is getting the X11 dependencies settled (unless you already did that
after upgrading to 0.2.3).
Refer to the &quot;Getting X11 Sorted Out&quot; section under &quot;First Time
Installation&quot; above.
</p>


<a name="update-all"><h2>4.4 Updating Packages</h2></a>
<p>
The above updating steps will not update the actual packages, they
only provide you with the means to do so. The easiest way to get the
new packages is to use the 'update-all' command:
</p>
<pre>fink update-all</pre>
<p>
This will bring all installed packages to the latest version.
If you don't want to do this (it may take some time), you can update
individual packages with the 'update' command.
</p>


<a name="other"><h2>4.5 Other Notes</h2></a>
<p>
IMPORTANT! When you update from Fink 0.2.0 or a CVS version before
0.2.1, the first thing you should do after running the inject.pl
scripts is this:
</p>
<pre>fink update dpkg</pre>
<p>
There was a bug in dpkg that could lead to partially extracted
packages. If you had unusual trouble with installed packages,
especially missing symlinks, use 'fink reinstall' on them to
re-install the .deb package files.
</p>


<p align="right">
Next: <a href="install-up01.php">5 Upgrading From Fink 0.1.x</a></p>


<?
include "footer.inc";
?>

