<?
$title = "User's Guide - Command line";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/07/06 00:12:01';

$metatags = '<link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="prev" href="conf.php" title="The Fink Configuration File">';

include "header.inc";
?>

<h1>User's Guide - 6 Controlling Fink from the command line</h1>


<h2><a name="using">6.1 Using Fink</a></h2>

<p>Fink has several commands that work on packages. All of them need at
least one package name, and all can handle several package names at
once. You can specify just the package name (e.g. gimp), or a fully
qualified name with a version number (e.g. gimp-1.2.1 or
gimp-1.2.1-3). Fink will automatically choose the latest available
version and revision when they are not specified.</p>
<p>What follows is a list of commands that Fink understands:</p>

<h2><a name="install">6.2 install</a></h2>

<p>The install command is used to install packages. It downloads,
configure, builds and installs the packages you name. It will also
install required dependencies automatically, but will ask you for
confirmation before it does so. Example:</p>
<pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
<p>Aliases for the install command: update, enable, activate, use (most
of these for historic reasons).</p>

<h2><a name="remove">6.3 remove</a></h2>

<p>The remove command removes packages from the system by calling 'dpkg
--remove'. The current implementation has some flaws: It only works on
packages Fink knows about (i.e. where an .info file is present); and it
doesn't check dependencies itself but rather completly leaves that to
the dpkg tool (usually this poses no problem, though).</p>
<p>The remove command only removes the actual package files, but leaves
the .deb compressed package file intact. This means that you can
re-install the package later without going through the compile process
again. If you need the disk space, you can remove the .deb from the
/sw/fink/dists tree.</p>
<p>Aliases: disable, deactivate, unuse, delete.</p>

<h2><a name="update-all">6.4 update-all</a></h2>

<p>This command updates all installed packages to the latest version. It
does not need a package list, so you just type:</p>
<pre>fink update-all</pre>

<h2><a name="list">6.5 list</a></h2>

<p>
This command produces a list of available packages, listing
installation status, the latest version and a short description.
If you call it without parameters, it will list all available
packages.
You can also pass a name or a shell pattern, and fink will list all
packages that match.
</p>
<p>
The first column displays the installation state with the following
meanings:
</p>
<pre>
     not installed
 i   latest version is installed
(i)  installed, but a newer version is available
</pre>
<p>
There are also some flags for the fink list command
</p>
<pre>
-h,--help
	  Show the options which are available.
-t,--tab
	  Output the list in a tab delimited format, useful for
	  running the output through a script.
-i,--installed
	  Show only those packages which are currently installed.
-o,--outdated
	  Show only those packages which are out of date.
-u,--uptodate
	  Show only packages which are up to date.
-n,--notinstalled
	  Show packages which are not currently installed.
-s=expr,--section=expr
	  Show only packages in the sections matching the regular
	  expression expr.
-w=xyz,--width=xyz
	  Sets the width of the display you would like the output
	  formatted for. xyz is either a numeric value or auto.
	  auto will set the width based on the terminal width.
	  The default is auto.
</pre>
<p>
Some usage examples:
</p>
<pre>
fink list                 - list all packages
fink list bash            - check if bash is available and what version.
fink list --outdated      - list packages which are out of date
fink list --section=kde   - list the packages in the kde section
fink list "gnome*"         - list all packages that start with 'gnome'
</pre>
<p>
The quotes in the last example are necessary to stop the shell from
interpreting the pattern itself.
</p>

<h2><a name="apropos">6.6 apropos</a></h2>

<p>
This command behaves almost identical to <code>fink list</code>. The most
notable difference is that <code>fink apropos</code> also searches
the package descriptions to find packages. The second difference is that 
the search string must be supplied and is not optional.
</p>
<pre>
fink apropos irc          - list all packages for which 'irc' occurs in the name or description
fink apropos -s=kde irc   - the same as above, but restricted to packages from the kde section
</pre>

<h2><a name="describe">6.7 describe</a></h2>

<p>
This command displays a description of the package you name on the
command line.
Note that only a small part of the packages currently have a
description.
</p>
<p>
Aliases: desc, description, info
</p>

<h2><a name="fetch">6.8 fetch</a></h2>

<p>Downloads the named packages, but does not install it. This command
will download the tarballs even if they were downloaded before.</p>

<h2><a name="fetch-all">6.9 fetch-all</a></h2>

<p>Downloads <b>all</b> package source files. Like fetch, this downloads the
tarballs even when they were downloaded before.</p>

<h2><a name="fetch-missing">6.10 fetch-missing</a></h2>

<p>Downloads <b>all</b> package source files. This command will only download
files that are not present on the system.</p>

<h2><a name="build">6.11 build</a></h2>

<p>Builds a package, but does not install it. As usual, the source
tarballs are downloaded if they can not be found. The result of this
command is an installable .deb package file, which you can quickly
install later with the install command. This command will do nothing
if the .deb already exists. Note that dependencies are still
<b>installed</b>, not just built.</p>

<h2><a name="rebuild">6.12 rebuild</a></h2>

<p>Builds a package (like the build command), but ignores and overwrites
the existing .deb file. If the package is installed, the newly created
.deb file will also be installed in the system via dpkg. Very useful
during package development.</p>

<h2><a name="reinstall">6.13 reinstall</a></h2>

<p>Same as install, but will install the package via dpkg even when it is
already installed. You can use this when you accidentally deleted
package files or changed configuration files and want to get the
default settings back.</p>

<h2><a name="configure">6.14 configure</a></h2>

<p>
Reruns the Fink configuration process.
This will let you change your mirror sites and proxy settings, among
others.
</p>

<h2><a name="selfupdate">6.15 selfupdate</a></h2>

<p>
	This command automates the process of upgrading to a new Fink
	release. It checks the Fink website to see if a new version is
	available. It then downloads the package descriptions and updates
	the core packages, including fink itself. This command can upgrade
	to regular releases, but it can also setup your /sw/fink/dists
	directory tree for direct CVS updates.  This means that you then
	will be able to access the very latest revisions of all packages.
</p>

<h2><a name="index">6.16 index</a></h2>

<p>
   Rebuilds the package cache. You should not normally need to execute
   this manually, as fink should auto-detect when it needs to be updated.
</p>

<h2><a name="validate">6.17 validate</a></h2>

<p>
   This command performs various checks on .info and .deb files. Package
   maintainers should run this on their package descriptions and
   corresponding built packages before submitting them.
</p>
<p>
   Aliases: check
</p>

<h2><a name="scanpackages">6.18 scanpackages</a></h2>

<p>
   Calls dpkg-scanpackages(8) with the specified trees.
</p>

<h2><a name="checksums">6.19 checksums</a></h2>

<p>
   Validates the MD5 digest of all tarballs in <code>/sw/src</code>, where possible.
</p>

<h2><a name="cleanup">6.20 cleanup</a></h2>

<p>
   Removes obsolete package files (.info, .patch, .deb) if newer versions are available. 
   This can reclaim large amounts of disk space.
</p>




<?
include "footer.inc";
?>

