<?
$title = "Packaging - Policy";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/04/17 13:10:27';

$metatags = '<link rel="contents" href="index.php" title="Packaging Contents"><link rel="next" href="fslayout.php" title="Filesystem Layout"><link rel="prev" href="format.php" title="Package Descriptions">';

include "header.inc";
?>

<h1>Packaging - 3 Packaging Policy</h1>



<a name="licenses"><h2>3.1 Package Licenses</h2></a>
<p>
The packages included in Fink come with a wide variety of licenses.
Most of them place restrictions on redistributing the full source and
especially on distributing binaries.
Some packages can not be included in the binary distribution of Fink
because of these license restrictions.
Thus it is very important that package maintainers check the license
of their package carefully.
</p>
<p>
Every package that is to be distributed as a binary package must
contain a copy of the license.
It must be installed in the doc directory,
i.e. in <tt><nobr>%p/share/doc/%n</nobr></tt>.
(In the InstallScript, %i must be used instead of %p, of course.
The DocFiles field takes care of the details automatically.)
If there is no explicit license in the original source, include a
small text file with a note about the status of the package.
Most licenses require that the license accompanies any distribution.
Fink's policy is to always do this, even if it is not explicitly
required.
</p>
<p>
To make an automated maintenance of the binary distribution possible,
any package that is to be distributed must have a <tt><nobr>License</nobr></tt>
field.
This field denotes the nature of the license and is used to decide
which packages make it into the binary distribution and which must be
held back.
The field may only be present if the actual license terms are included
in the binary package, as explained above.
</p>
<p>
To make the <tt><nobr>License</nobr></tt> field useful, only one of the
following pre-defined values may be used.
If you're packaging something that doesn't fit into these categories,
ask for help on the developer mailing list.
</p>
<ul>

<li><tt><nobr>GPL</nobr></tt> - the GNU General Public License.
This license requires that the source is available from the same place
as the binary.</li>
<li><tt><nobr>LGPL</nobr></tt> - the GNU Lesser General Public License.
This license requires that the source is available from the same place
as the binary.</li>
<li><tt><nobr>GPL/LGPL</nobr></tt> - this if a special case for packages where
one part is licensed under the GPL (e.g. the executables) and another
part is licensed under the LGPL (e.g. the libraries).</li>

<li><tt><nobr>BSD</nobr></tt> - for BSD-style licenses.
This includes the so-called &quot;original&quot; BSD license, the &quot;modified&quot; BSD
license and the MIT license. The Apache license also counts as
BSD. With these licenses the distribution of source code is
optional.</li>

<li><tt><nobr>Artistic</nobr></tt> - for the Artistic license and
derivatives.</li>

<li><tt><nobr>OSI-Approved</nobr></tt> - for other Open Source licenses
approved by the <a href="http://www.opensource.org/">Open Source
Initiative</a>. One of OSI's requirements is that free distribution
of binaries and sources is allowed. This value can also be used as an
umbrella for dual-licensed packages.</li>

<li><tt><nobr>Restrictive</nobr></tt> - for restrictive licenses.
Use this for packages that are available from the author in source
form for free use, but don't allow free redistribution.</li>

<li><tt><nobr>Commercial</nobr></tt> - for restrictive, commercial licenses.
Use this for commercial packages (e.g. Freeware, Shareware) that do
not allow free redistribution of source or binaries.</li>

<li><tt><nobr>Public Domain</nobr></tt> - for packages that are in the Public
Domain, i.e. the author has given up his copyright on the code. These
packages don't have licenses at all and anyone can do anything with
them.</li>

</ul>
<p>
If the documentation included in a package is explicitly put under the
GNU Free Documentation License, a <tt><nobr>/GFDL</nobr></tt> may be appended to
the License field, e.g. <tt><nobr>GPL/GFDL</nobr></tt>. If the documentation
included in a package is explicitly put under the Linux Documentation
Project license, the same applies, e.g. <tt><nobr>GPL/LDP</nobr></tt>.
</p>



<a name="prefix"><h2>3.2 Base System Interference</h2></a>
<p>
Fink is an add-on distribution that is installed in a directory
separate from the base system.
It is crucial that a package does not install files outside of Fink's
directory.
</p>
<p>
Exceptions can be made when there is no other possibility, e.g. with
XFree86.
In this case the package must check for existing files before
installation and refuse to install if it would overwrite existing
files.
The package must make sure that all files it installed outside of the
Fink directory are deleted when the package is removed, or that they
cause no harm if they are left there (i.e. they need to check binaries
for existence before calling them and the like).
</p>


<a name="sharedlibs"><h2>3.3 Shared Libraries</h2></a>
<p>
Fink has a new policy about shared libraries, effective in February 2002.
(This section of the documentation discusses version 2
of the policy, which coincides with the release of version 0.9.9 of
the fink package manager.)
We first discuss the policy as applied to newly ported software, and
then turn to the question of upgrading existing fink packages.  For 
examples of the policy in action, see the  libpng, libjpeg  and 
libtiff packages.
</p><p>
Software which has been ported to Darwin should build shared libraries 
whenever possible.  (Package maintainers
are also free to build static libraries as well, if appropriate
for their packages; or they may submit packages containing only static
libraries if they wish.)
Whenever shared libraries are being built,
<b>two</b> closely related fink packages should be made, named foo 
and foo-shlibs.  The shared libraries go in foo-shlibs, and the header
files go in foo.  These two packages
can be made with a single .info file, using
the <tt><nobr>SplitOff</nobr></tt> field, as described below.  
(In fact, it is often necessary
to make more than two packages from the source, and this can be done
using <tt><nobr>SplitOff2</nobr></tt>, <tt><nobr>SplitOff3</nobr></tt>, etc.)
</p><p>
Each software package for which shared libraries can be built must have
a <b>major version number</b> N.  The major version number is only supposed
to change when a backwards-incompatible change in the library's API has been
made.  Fink uses the following naming convention: if the upstream name
of the package is bar, then the fink packages are called barN and 
barN-shlibs.  (This is only strictly applied to new packages, or when the 
major version number changes.)  For example, the major version number for
the pre-existing libpng package was 2, but recent versions of the
library have major version number 3.  So there are now four fink packages
to handle this: libpng, libpng-shlibs, libpng3, libpng3-shlibs.
Only one of libpng and libpng3 can be installed at any given time,
but libpng-shlibs and libpng3-shlibs can be installed at the same time.
(Note that only two .info files are required to build these four packages.)
</p><p>
The shared library itself and certain related files will be put into 
the package barN-shlibs; the &quot;include&quot; files and certain other files will
be put into the package barN.  There can be no overlapping files
between these two packages, and everything stored in barN-shlibs must have
a pathname which somehow includes the major version number N.  In many
instances, your package will need some files at runtime which are
typically installed into <tt><nobr>%i/lib/bar/</nobr></tt> or 
<tt><nobr>%i/share/bar/</nobr></tt> ; you should adjust the installation
paths to <tt><nobr>%i/lib/bar/N/</nobr></tt> or
<tt><nobr>%i/share/bar/N/</nobr></tt>.
</p><p>
All other packages which depend on bar, major version N, will be asked to
use the dependencies
</p>
<pre>
  Depends: barN-shlibs
  BuildDepends: barN
</pre>
<p>
Once this system is fully in place, it will not be permitted for 
another package to depend on barN itself.  (For backward compatibility,
such dependencies are allowed for pre-existing packages.)  This is
signaled to other developers by a boolean field
</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>
within the package description for barN.
</p><p>
If your package includes both shared libraries and binary files, and
if the binary files need to be present at runtime (not just at build
time), then the binaries must be split off into a third package, which
could be called barN-bin.  Other packages are allowed to depend on
barN-bin as well as barN-shlibs.
</p><p>
When building shared libraries under major version N, it is important that
the &quot;install_name&quot; of the library be <tt><nobr>%p/lib/bar.N.dylib</nobr></tt>.  
(You can
find the install_name by running <tt><nobr>otool -L</nobr></tt> on your library.)  The
actual library file should be installed at
</p>
<pre>
  %i/lib/bar.N.x.y.dylib
</pre>
<p>
and your packages should create symbolic links
</p>
<pre>
  %i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
</pre>
<p>
If the static library is also built, then it will be installed at
</p>
<pre>
  %i/lib/bar.a
</pre>
<p>
If the package uses libtool, these things are usually handled automatically,
but in any event you should
check that they have been done correctly in your case.  You should also
check that current_version and compatibility_version were defined 
appropriately for your shared libraries.  (These are also shown with the 
<tt><nobr>otool -L</nobr></tt> query.)
</p><p>
Files are then divided between the two packages as follows
</p>
<ul>
<li>  in package barN-shlibs:
<pre>
  %i/lib/bar.N.x.y.dylib
  %i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar/N/*
  %i/share/bar/N/*
  %i/share/doc/barN-shlibs/*
</pre></li>
<li>  in package barN:
<pre>
  %i/include/*
  %i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar.a
  %i/share/doc/barN/*
  other files, if needed
</pre></li></ul>
<p>
Notice that both packages are required to have some documentation about
the license, but that the directories containing the DocFiles will be
different.
</p><p>
Doing this is quite easy in practice, using the 
<tt><nobr>SplitOff</nobr></tt> field.  Here is
how the example above would be implemented (in part):
</p>
<pre>
Package: barN
Version: N.x.y
Revision: 1
License: GPL
Depends: barN-shlibs (= %v-%r)
BuildDependsOnly: True
DocFiles: COPYING
SplitOff: &lt;&lt;
  Package: barN-shlibs
  Files: lib/bar.N.x.y.dylib lib/bar.N.dylib lib/bar/N
  DocFiles: COPYING
&lt;&lt;
</pre>
<p>
During the execution of the <tt><nobr>SplitOff</nobr></tt>
field, the specified files and directories are moved from the 
install directory %I of the main package to the install directory %i of the
splitoff package.  (There is a similar convention for names: %N is the
name of the main package, and %n is the name of the current package.)
The <tt><nobr>DocFiles</nobr></tt> command then puts a copy of the documentation into 
<tt><nobr>%i/share/doc/barN-shlibs</nobr></tt>.
</p><p>
Notice that we have included the exact current version of barN-shlibs as a 
dependency of the main package barN (which can be abbreviated 
%N-shlibs (= %v-%r) ).
This ensures that the versions match, and also guarantees that barN
automatically &quot;inherits&quot; all the dependencies of barN-shlibs.
</p><p>
<b>What to do when the major version number changes:</b>
</p><p>
If the major version number changes from N to M, you will create two new
packages barM and barM-shlibs.  The package barM-shlibs can have no
overlap with the package barN-shlibs, since many users will have both of
these installed simultaneously.  In package barM, you should use dependencies
</p>
<pre>
  Conflicts: barN
  Replaces: barN
</pre>
<p>
and similarly, you should revise barN to include dependencies
</p>
<pre>
  Conflicts: barM
  Replaces: barM
</pre>
<p>
Users will then see barN and barM shuffling in and out as various other
packages are built which depend on one version or another of the shared
library, while barN-shlibs and barM-shlibs remain permanently installed.
</p><p>
<b>How to upgrade an existing fink package:</b>
</p><p>
For an existing fink package which installs either static or shared 
libraries, the best way to upgrade is to create a new version foo of
your package, accompanied by a new package foo-shlibs, which satisfy
the above policy.  If shared libraries (or any other files now present
in foo-shlibs) were installed previously, then these new packages should 
say
</p>
<pre>
  Replaces: foo (&lt;&lt; earliest.compliant.version)
</pre>
<p>
so that upgrading will be transparent to users.  (You should <b>not</b>
say &quot;Conflicts: foo&quot; because this will prevent the upgrade.)
</p><p>
After your upgrade, packages which say &quot;Depends: foo&quot; will continue to
function normally.  However, you should contact the fink maintainers
of all such packages and urge them to modify their packages to say 
&quot;Depends: foo-shlibs, BuildDepends: foo&quot; as soon as possible.  You will 
not be able to create new packages fooM, fooM-shlibs which implement a 
new major version of the shared library until they have done so.
</p><p>
Existing fink packages which have not used the correct install_name or
which have not used the correct names or symbolic links for shared libraries
must be upgraded carefully, on a case-by-case basis.  If you are
having trouble finding an upgrade strategy to make your packages compliant
with the new policy, please discuss it on the fink-devel mailing list.
</p><p>
<b>Packages containing both binary files and libraries:</b>
</p><p>
When an upstream package contains both binary files and libraries, some
care must be exercised in constructing fink packages.  In some cases,
the only binary files will be things like <tt><nobr>foo-config</nobr></tt> which
are presumably only used at build time and never at run time.  In these
cases, the binaries can go with the header files in the <tt><nobr>foo</nobr></tt>
package.
</p><p>
In other cases, the binary files will be needed by other packages at
runtime, and they must be split off into a separate fink package with
a name something like <tt><nobr>foo-bin</nobr></tt>.  The <tt><nobr>foo-bin</nobr></tt>
package should depend on the <tt><nobr>foo-shlibs</nobr></tt> package, and
maintainers of other packages should be encouraged to use
</p>
<pre>
  Depends: foo-bin
  BuildDepends: foo
</pre>
<p>
which will take care of foo-shlibs implicitly.
</p><p>
Upgrading presents a problem in this situation, however, since users won't
be prompted to install <tt><nobr>foo-bin</nobr></tt>.  To work around this, until
all other package maintainers have revised their packages as above,
your <tt><nobr>foo</nobr></tt> package can say
</p>
<pre>
  Depends: foo-shlibs (= exact.version), foo-bin
</pre>
<p>
This will force the installation of foo-bin on most users' systems, until
such time as the other package maintainers have upgraded their packages
which depend on <tt><nobr>foo</nobr></tt>.
</p>


<p align="right">
Next: <a href="fslayout.php">4 Filesystem Layout</a></p>


<?
include "footer.inc";
?>

