<?php
$title = "Paket erstellen - Compilers";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/03/10 22:52:23';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Paket erstellen Contents"><link rel="next" href="reference.php?phpLang=de" title="Reference"><link rel="prev" href="fslayout.php?phpLang=de" title="Filesystem Layout">';


include_once "header.de.inc";
?>
<h1>Paket erstellen - 5. Compilers</h1>




<p>
Fink uses the gcc family of compilers, as provided by Apple computer
through the Apple Developer Connection. Different versions of gcc exist,
and usually more than one is available on a Mac OS X system.
</p>
<p>
This section explains some of the ways Fink deals with these different versions
of gcc. An email to the Fink mailing list has
<a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg11877.html">more explanation</a>.
</p>


<h2><a name="versions">5.1 Compiler Versions</a></h2>
<p>
As GCC has evolved,
there have been different fink "distributions" to cope with the changes.
</p>
<p>
Each Fink distribution has had certain default values for the gcc and g++
compilers, which any user compiling from source is expected to have
installed.  You can expect that direct calls to "gcc" and "g++" from
within your package will use these default values.  If you need to use
a different value (for example, during a transition to a new distribution,
your packages .info file must specify this using the versioned binaries
provided by Apple.  Exactly how you will do this depends on the build
system of your software, but for many packages, the <code>SetCC</code>
and <code>SetCXX</code> fink fields can be used for this purpose.
For example, you might change the g++ compiler to version 3.3 by the setting
<code>SetCXX: g++-3.3</code>.  Examine the output when building your
package to make sure that the correct compiler is being used.
</p>
<p>
The 10.1 distribution assumes that the compiler version is 2.95; the
10.2 distribution assumes that the compiler version is 3.1; the 10.2-gcc3.3
and 10.3 distributions assume that the compiler version is 3.3.   The compiler
for the 10.4-transitional distribution is complicated: g++-3.3 is being
used along with gcc-4.0.  The 10.4 and 10.5 distributions use both gcc-4.0 
and g++-4.0.  The 10.6 distribution uses gcc-4.2, while the 10.7 through 10.9 
distributions use clang and clang++ as the default compilers.  The 10.9 
distribution has a further change in that it has migrated from libstdc++ to 
libc++.
</p>
<p>
A new method for ensuring the correct g++ compiler was introduced with the
10.4-transitional distribution.  During compilation, a directory
<code>/sw/var/lib/fink/path-prefix-g++-XXX</code> (where XXX is the version
number) is added to the PATH during compilation.  This directory contains
shell scripts which ensure that the correct compiler and version of g++ is used.
</p>


<h2><a name="abi">5.2 The g++ ABI</a></h2>
<p>
The g++ ABI has changed 3 times during the lifetime of OS X: the ABI is
different for versions 2.95, 3.1, 3.3 and 4.0.  These different ABIs
are not compatible with each other, and any libraries which use C++
code and are linked to by your project must be compiled with the same
ABI as the one currently being used.
</p>
<p>
Fink keeps track of the g++ ABI by means of the GCC field.  This field
should be defined for any package which invokes the g++ or c++ compilers.
(It should NOT be defined for packages which don't invoke those compilers.)
Whenever an ABI upgrade occurs, all the dependencies of the packages must
be checked for their own GCC field.  When all of the dependencies have
been upgraded, the package itself may be upgraded.  The versions of the
dependencies must be changed to guarantee that users will have the correct,
updated, dependencies in place before they attempt to build the new version
of your package.
</p>
<p>
A small group of packages which depend only on each other can be left 
at the previous version of the ABI when the distribution changes, if they
are not ready to be upgraded.  When the upgrade is eventually done, they
must be all upgraded together with the correct versioning on all the
packages.  For this reason, it is best to upgrade most packages at
the time the distribution changes.
</p>
<p>
Fink uses the GCC field to ensure that users have the correct version of
the g++ compiler installed.  If the GCC field is defined by the package,
fink checks to see if the value matches that expected for the OS X version.
The correct value is 3.3 for the 10.2 and 10.3 versions of OS X, and 4.0 
for OS X 10.4 through OS X 10.9.
</p>



<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="reference.php?phpLang=de">6. Reference</a></p>
<?php include_once "../../footer.inc"; ?>


