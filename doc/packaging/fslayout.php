<?
$title = "Packaging - FS Layout";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/08/04 21:05:58';

$metatags = '<link rel="contents" href="index.php" title="Packaging Contents"><link rel="next" href="reference.php" title="Reference"><link rel="prev" href="policy.php" title="Packaging Policy">';

include "header.inc";
?>

<h1>Packaging - 4 Filesystem Layout</h1>





<p>
The following file system layout guidelines are part of the Fink
packaging policy.
</p>



<a name="fhs"><h2>4.1 The Filesystem Hierarchy Standard</h2></a>
<p>
Fink follows the spirit of the <a href="http://www.pathname.com/fhs/">Filesystem Hierarchy
Standard</a>, or FHS for short.
It can only follow it in spirit because the FHS was created for system
vendors that have control over the <tt><nobr>/</nobr></tt> and
<tt><nobr>/usr</nobr></tt> hierarchies.
Fink is an add-on distribution that controls only its install
directory (or prefix).
The examples use the default prefix of <tt><nobr>/sw</nobr></tt>.
</p>


<a name="dirs"><h2>4.2 The Directories</h2></a>
<p>
Files should go into the following subdirectories of the hierarchy:
</p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td><tt><nobr>/sw/bin</nobr></tt></td><td>
<p>
This directory is for general executable programs.
There are no subdirectories.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/sbin</nobr></tt></td><td>
<p>
This directory is for executable programs that are intended to be used
by administrators only.
Background daemons go here.
There are no subdirectories.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/include</nobr></tt></td><td>
<p>
This directory is for C and C++ header files.
Subdirectories can be created as necessary.
If a package installs header files that can be confused with standard
C headers, those headers <b>must</b> go to a subdirectory.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/lib</nobr></tt></td><td>
<p>
This directory is for architecture-dependent data files and
libraries.
Static and shared libraries should be placed directly in
<tt><nobr>/sw/lib</nobr></tt> unless there is a good reason not to.
This is also the place for executables that should not be executed
directly by the user (which would otherwise be places in libexec).
</p>
<p>
A package is free to create a subdirectory to store private data or
loadable modules.
Make sure to use directory names that make sense for compatibility.
It is wise to use the package major version in the directory name or
as an additional hierarchy level, e.g. <tt><nobr>/sw/lib/perl5</nobr></tt>
or <tt><nobr>/sw/lib/apache/1.3</nobr></tt>.
Care should be taken when the host type is used to create
directories.
A <tt><nobr>powerpc-apple-darwin1.3.3</nobr></tt> directory is bad for
compatibility, <tt><nobr>powerpc-apple-darwin1.3</nobr></tt> or just
<tt><nobr>powerpc-apple-darwin</nobr></tt> are better choices.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/share</nobr></tt></td><td>
<p>
This directory is for architecture-independent data files.
The same rules as for <tt><nobr>/sw/lib</nobr></tt> apply.
Some common subdirectories are described below.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/share/man</nobr></tt></td><td>
<p>
This directory contains manual pages.
It is organized into the usual section tree.
Every program in <tt><nobr>/sw/bin</nobr></tt> and
<tt><nobr>/sw/sbin</nobr></tt> should have an associated manual page here.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/share/info</nobr></tt></td><td>
<p>
This directory contains documentation in the Info format (produced
from Texinfo sources).
Maintenance of the <tt><nobr>dir</nobr></tt> file is automated through Debian's
version of <tt><nobr>install-info</nobr></tt> (part of the <tt><nobr>dpkg</nobr></tt>
package).
Use the <tt><nobr>InfoDocs</nobr></tt> description field to automatically
generate appropriate code for the <tt><nobr>postinst</nobr></tt> and
<tt><nobr>prerm</nobr></tt> package scripts.
Fink makes sure that no package installs a <tt><nobr>dir</nobr></tt> file of
its own.
There are no subdirectories.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/share/doc</nobr></tt></td><td>
<p>
This directory contains documentation that is neither a man page nor
an Info document.
README, LICENSE and COPYING files go here.
Every package must create a subdirectory here, named after the
package.
The subdirectory name must not contain any version numbers (unless
they are a part of the package name proper).
Hint: Just use <tt><nobr>%n</nobr></tt>.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/share/locale</nobr></tt></td><td>
<p>
This directory contains message catalogs for internationalization.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/var</nobr></tt></td><td>
<p>
The <tt><nobr>var</nobr></tt> directory stores variable data.
This includes spool directories, lock files, state databases, game
high scores and log files.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/etc</nobr></tt></td><td>
<p>
This directory holds configuration files.
For packages that have more than one or two files here a subdirectory
should be made.
The subdirectory must have the name of the package or program in it so
that it is identifiable.
</p>
</td></tr><tr valign="top"><td><tt><nobr>/sw/src</nobr></tt></td><td>
<p>
This directory is for storing and building source code.
Nothing should be installed here by a package.
</p>
</td></tr></table>



<a name="avoid"><h2>4.3 Things to Avoid</h2></a>
<p>
No other directories than the ones mentioned above should exist in
<tt><nobr>/sw</nobr></tt>.
In particular, the following should not be used:
<tt><nobr>/sw/man</nobr></tt>, <tt><nobr>/sw/info</nobr></tt>,
<tt><nobr>/sw/doc</nobr></tt>, <tt><nobr>/sw/libexec</nobr></tt>,
<tt><nobr>/sw/lib/locale</nobr></tt>.
</p>



<p align="right">
Next: <a href="reference.php">5 Reference</a></p>


<?
include "footer.inc";
?>

