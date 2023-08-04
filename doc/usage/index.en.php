<?php
$title = "Usage";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:20:38';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink Usage</h1>
<!--Generated from $Fink: usage.xml,v 1.17 2023/08/04 5:20:38 nieder Exp $--><h2><a name="">Setting The Paths</a></h2>
<p>
To use the software installed in Fink's directory hierarchy, including
the fink command itself, you must set your PATH environment variable
(and some others) accordingly.
Shell scripts are provided to do this for you.
If you use tcsh, add the following to your .cshrc:
</p>
<pre>source /opt/sw/bin/init.csh</pre>
<p>
Editing .cshrc will only affect new shells (i.e. newly opened Terminal
windows), so you should also run this command in all Terminal windows
that you opened before you edited the file.
You'll also need to run <code>rehash</code> because tcsh caches the
list of available commands internally.
</p>
<p>
If you use a Bourne type shell (e.g. sh, bash, zsh), use instead:
</p>
<pre>source /opt/sw/bin/init.sh</pre>
<p>
Note that the scripts also add /usr/X11R6/bin and /usr/X11R6/man to
your path so you can use X11 when it is installed.
Packages have the ability to add settings of their own, e.g. the qt
package sets the QTDIR environment variable.
</p>
<h2><a name="">Using Fink</a></h2>
<p>Fink has several commands that work on packages. All of them need at
least one package name, and all can handle several package names at
once. You can specify just the package name (e.g. gimp), or a fully
qualified name with a version number (e.g. gimp-1.2.1 or
gimp-1.2.1-3). Fink will automatically choose the latest available
version and revision when they are not specified.</p>
<p>What follows is a list of commands that Fink understands:</p>
<h2><a name="">install</a></h2>
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
<p>Aliases for the install command: update, enable, activate, use. (Most
of these for historic reasons.)</p>
<h2><a name="">remove</a></h2>
<p>The remove command removes packages from the system by calling 'dpkg
--remove'. The current implementation has some flaws: It only works on
packages Fink knows about (i.e. where an .info file is present); and it
doesn't check dependencies itself but rather completly leaves that to
the dpkg tool (usually this poses no problem, though).</p>
<p>The remove command only removes the actual package files, but leaves
the .deb compressed package file intact. This means that you can
re-install the package later without going through the compile process
again. If you need the disk space, you can remove the .deb from the
/opt/sw/fink/dists tree.</p>
<p>Aliases: disable, deactivate, unuse, delete, purge.</p>
<h2><a name="">update-all</a></h2>
<p>This command updates all installed packages to the latest version. It
does not need a package list, so you just type:</p>
<pre>fink update-all</pre>
<h2><a name="">list</a></h2>
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
<pre>     not installed
 i   latest version is installed
(i)  installed, but a newer version is available</pre>
<p>
Some usage examples:
</p>
<pre>fink list            - list all packages
fink list bash       - check if bash is available and what version
fink list "gnome*"   - list all packages that start with 'gnome'</pre>
<p>
The quotes in the last example are necessary to stop the shell from
interpreting the pattern itself.
</p>
<h2><a name="">describe</a></h2>
<p>
This command displays a description of the package you name on the
command line.
Note that only a small part of the packages currently have a
description.
</p>
<p>
Aliases: desc, description, info
</p>
<h2><a name="">fetch</a></h2>
<p>Downloads the named packages, but does not install it. This command
will download the tarballs even if they were downloaded before.</p>
<h2><a name="">fetch-all</a></h2>
<p>Downloads <b>all</b> package source files. Like fetch, this downloads the
tarballs even when they were downloaded before.</p>
<h2><a name="">fetch-missing</a></h2>
<p>Downloads <b>all</b> package source files. This command will only download
files that are not present on the system.</p>
<h2><a name="">build</a></h2>
<p>Builds a package, but does not install it. As usual, the source
tarballs are downloaded if they can not be found. The result of this
command is an installable .deb package file, which you can quickly
install later with the install command. This command will do nothing
if the .deb already exists. Note that dependencies are still
<b>installed</b>, not just built.</p>
<h2><a name="">rebuild</a></h2>
<p>Builds a package (like the build command), but ignores and overwrites
the existing .deb file. If the package is installed, the newly created
.deb file will also be installed in the system via dpkg. Very useful
during package development.</p>
<h2><a name="">reinstall</a></h2>
<p>Same as install, but will install the package via dpkg even when it is
already installed. You can use this when you accidentally deleted
package files or changed configuration files and want to get the
default settings back.</p>
<h2><a name="">configure</a></h2>
<p>
Reruns the Fink configuration process.
This will let you change your mirror sites and proxy settings, among
others.
</p>
<h2><a name="">selfupdate</a></h2>
<p>
This command automates the process of upgrading to a new Fink
release.
It checks the Fink website to see if a new version is available.
It then downloads the package descriptions and updates the core
packages, including fink itself.
This command can only upgrade to regular releases, but you can use it
to upgrade from a CVS version to a later regular release.
It will refuse to run if you have /opt/sw/fink set up to get package
descriptions directly from CVS.
</p>
<h2><a name="">Further Questions</a></h2>
<p>
If your questions are not answered by this document, read the FAQ at
the Fink website:
<a href="/faq/">/faq/</a>.
If that still doesn't answer your questions, subscribe to the
fink-users mailing list via <a href="/lists/fink-users.php">/lists/fink-users.php</a>
and ask there.
</p>

<?php include_once "../../footer.inc"; ?>


