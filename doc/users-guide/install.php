<?
$title = "User's Guide - Install";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/09/20 07:41:14';

$metatags = '<link rel="start" href="index.php" title="User\'s Guide Contents"><link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="next" href="upgrade.php" title="Upgrading Fink"><link rel="prev" href="intro.php" title="Introduction">';

include "header.inc";
?>

<h1>User's Guide - First Time Installation</h1>




<p>
During first time installation, a base system with the package
management tools is installed on your machine.
After that you must set up your shell environment to use the software
installed by Fink.
You only need to do this once; you can upgrade any Fink installation
(starting with release 0.2.0) in place, without reinstalling.
This is covered in the <a href="upgrade.php">Upgrading
chapter</a>.
</p>
<p>
Once you have the package management tools installed, you can use them
to install more software.
This is covered in the <a href="packages.php">Installing Packages
chapter</a>.
</p>


<a name="bin"><h2>Installing the Binary Distribution</h2></a>
<p>
The binary distribution comes as a Mac OS X installer package (.pkg),
wrapped in a disk image (.dmg).
[FIXME: more]
</p>


<a name="src"><h2>Installing the Source Distribution</h2></a>
<p>
The source distribution comes as a standard Unix tarball (.tar.gz).
It contains only the <tt><nobr>fink</nobr></tt> package manager and its package
descriptions and will download the source for packages on the fly.
[FIXME: more]
</p>


<a name="setup"><h2>Setting Up Your Environment</h2></a>
<p>
[FIXME: .cshrc and friends]
</p>


<p align="right">
Next: <a href="upgrade.php">Upgrading Fink</a></p>


<?
include "footer.inc";
?>
