<?
$title = "Installation - Upgrade from 0.3";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2004/03/17 00:34:29';
$metatags = '<link rel="contents" href="install.php" title="Installation Contents"><link rel="next" href="install-up02.php" title="Upgrading From Fink 0.2.x"><link rel="prev" href="install-first.php" title="First Time Installation">';

include_once "header.inc";
?>

<h1>Installation - 3 Upgrading From Fink 0.3.x</h1>




<p>
If you already have Fink 0.3.x installed, you can update your
installation to 0.7.0 with the built-in 'selfupdate' command.
</p>


<h2><a name="packman">3.1 Updating The Package Manager</a></h2>
<p>
To update Fink, run the following command:
</p>
<pre>fink selfupdate</pre>
<p>
This will automatically update your existing Fink installation to
use the latest package manager, and also update all essential
packages. However, it will not update any other packages.
</p>


<h2><a name="tetex">3.2 Getting tetex Sorted Out</a></h2>
<p>
If you are upgrading from a Fink release prior to 0.3.1, and you have
tetex installed, you should run the command "fink remove tetex" before
upgrading. (It may also be necessary to remove the packages which
depend on tetex, such as lyx, before tetex can be removed.) Afterwards
you can again install tetex and the other packages you removed. 
</p>


<h2><a name="update-all">3.3 Updating Packages</a></h2>
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


<p align="right">
Next: <a href="install-up02.php">4 Upgrading From Fink 0.2.x</a></p>

<? include_once "footer.inc"; ?>
