<?
$title = "Packaging - FS Layout";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2004/03/29 01:10:05';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Packaging Contents"><link rel="next" href="reference.php?phpLang=en" title="Reference"><link rel="prev" href="policy.php?phpLang=en" title="Packaging Policy">';

include_once "header.inc";
?>

<h1>Packaging - 4 Filesystem Layout</h1>





<p>
The following file system layout guidelines are part of the Fink
packaging policy.
</p>



<h2><a name="fhs">4.1 The Filesystem Hierarchy Standard</a></h2>
<p>
Fink follows the spirit of the <a href="http://www.pathname.com/fhs/">Filesystem Hierarchy
Standard</a>, or FHS for short.
It can only follow it in spirit because the FHS was created for system
vendors that have control over the <code>/</code> and
<code>/usr</code> hierarchies.
Fink is an add-on distribution that controls only its install
directory (or prefix).
The examples use the default prefix of <code>/sw</code>.
</p>


<h2><a name="dirs">4.2 The Directories</a></h2>
<p>
Files should go into the following subdirectories of the hierarchy:
</p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td><code>/sw/bin</code></td><td>
<p>
This directory is for general executable programs.
There are no subdirectories.
</p>
</td></tr><tr valign="top"><td><code>/sw/sbin</code></td><td>
<p>
This directory is for executable programs that are intended to be used
by administrators only.
Background daemons go here.
There are no subdirectories.
</p>
</td></tr><tr valign="top"><td><code>/sw/include</code></td><td>
<p>
This directory is for C and C++ header files.
Subdirectories can be created as necessary.
If a package installs header files that can be confused with standard
C headers, those headers <b>must</b> go to a subdirectory.
</p>
</td></tr><tr valign="top"><td><code>/sw/lib</code></td><td>
<p>
This directory is for architecture-dependent data files and
libraries.
Static and shared libraries should be placed directly in
<code>/sw/lib</code> unless there is a good reason not to.
This is also the place for executables that should not be executed
directly by the user (which would otherwise be placed in libexec).
</p>
<p>
A package is free to create a subdirectory to store private data or
loadable modules.
Make sure to use directory names that make sense for compatibility.
It is wise to use the package major version in the directory name or
as an additional hierarchy level, e.g. <code>/sw/lib/perl5</code>
or <code>/sw/lib/apache/1.3</code>.
Care should be taken when the host type is used to create
directories.
A <code>powerpc-apple-darwin1.3.3</code> directory is bad for
compatibility, <code>powerpc-apple-darwin1.3</code> or just
<code>powerpc-apple-darwin</code> are better choices.
</p>
</td></tr><tr valign="top"><td><code>/sw/share</code></td><td>
<p>
This directory is for architecture-independent data files.
The same rules as for <code>/sw/lib</code> apply.
Some common subdirectories are described below.
</p>
</td></tr><tr valign="top"><td><code>/sw/share/man</code></td><td>
<p>
This directory contains manual pages.
It is organized into the usual section tree.
Every program in <code>/sw/bin</code> and
<code>/sw/sbin</code> should have an associated manual page here.
</p>
</td></tr><tr valign="top"><td><code>/sw/share/info</code></td><td>
<p>
This directory contains documentation in the Info format (produced
from Texinfo sources).
Maintenance of the <code>dir</code> file is automated through Debian's
version of <code>install-info</code> (part of the <code>dpkg</code>
package).
Use the <code>InfoDocs</code> description field to automatically
generate appropriate code for the <code>postinst</code> and
<code>prerm</code> package scripts.
Fink makes sure that no package installs a <code>dir</code> file of
its own.
There are no subdirectories.
</p>
</td></tr><tr valign="top"><td><code>/sw/share/doc</code></td><td>
<p>
This directory contains documentation that is neither a man page nor
an Info document.
README, LICENSE and COPYING files go here.
Every package must create a subdirectory here, named after the
package.
The subdirectory name must not contain any version numbers (unless
they are a part of the package name proper).
Hint: Just use <code>%n</code>.
</p>
</td></tr><tr valign="top"><td><code>/sw/share/locale</code></td><td>
<p>
This directory contains message catalogs for internationalization.
</p>
</td></tr><tr valign="top"><td><code>/sw/var</code></td><td>
<p>
The <code>var</code> directory stores variable data.
This includes spool directories, lock files, state databases, game
high scores and log files.
</p>
</td></tr><tr valign="top"><td><code>/sw/etc</code></td><td>
<p>
This directory holds configuration files.
For packages that have more than one or two files here a subdirectory
should be made.
The subdirectory must have the name of the package or program in it so
that it is identifiable.
</p>
</td></tr><tr valign="top"><td><code>/sw/src</code></td><td>
<p>
This directory is for storing and building source code.
Nothing should be installed here by a package.
</p>
</td></tr></table>



<h2><a name="avoid">4.3 Things to Avoid</a></h2>
<p>
No other directories than the ones mentioned above should exist in
<code>/sw</code>.
In particular, the following should not be used:
<code>/sw/man</code>, <code>/sw/info</code>,
<code>/sw/doc</code>, <code>/sw/libexec</code>,
<code>/sw/lib/locale</code>.
</p>



<p align="right">
Next: <a href="reference.php?phpLang=en">5 Reference</a></p>

<? include_once "footer.inc"; ?>
