<?
$title = "Packaging - Policy";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2004/09/12 14:39:21';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Packaging Contents"><link rel="next" href="fslayout.php?phpLang=en" title="Filesystem Layout"><link rel="prev" href="format.php?phpLang=en" title="Package Descriptions">';


include_once "header.en.inc";
?>
<h1>Packaging - 3. Packaging Policy</h1>



<h2><a name="licenses">3.1 Package Licenses</a></h2>
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
i.e. in <code>%p/share/doc/%n</code>.
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
any package that is to be distributed must have a <code>License</code>
field.
This field denotes the nature of the license and is used to decide
which packages make it into the binary distribution and which must be
held back.
The field may only be present if the actual license terms are included
in the binary package, as explained above.
</p>
<p>
To make the <code>License</code> field useful, only one of the
following pre-defined values may be used.
If you're packaging something that doesn't fit into these categories,
ask for help on the developer mailing list.
</p>
<ul>

<li><code>GPL</code> - the GNU General Public License.
This license requires that the source is available from the same place
as the binary.</li>
<li><code>LGPL</code> - the GNU Lesser General Public License.
This license requires that the source is available from the same place
as the binary.</li>
<li><code>GPL/LGPL</code> - this if a special case for packages where
one part is licensed under the GPL (e.g. the executables) and another
part is licensed under the LGPL (e.g. the libraries).</li>

<li><code>BSD</code> - for BSD-style licenses.
This includes the so-called "original" BSD license, the "modified" BSD
license and the MIT license. The Apache license also counts as
BSD. With these licenses the distribution of source code is
optional.</li>

<li><code>Artistic</code> - for the Artistic license and
derivatives.</li>

<li><code>Artistic/GPL</code> - dual-licensed under the Artistic and GPL
licenses.</li> 

<li><code>GNU Free Documentation License</code> and <code>Linux
Documentation Project</code> - if the documentation included in a package
is explicitly included under one of the licenses, then this is indicated by
appending <code>/GFDL</code> or <code>/LDP</code>, giving one of the
allowed combinations: "GFDL",
"GPL/GFDL", "LGPL/GFDL", "GPL/LGPL/GFDL", "LDP", or "GPL/LGPL/LDP".
</li>

<li><code>OSI-Approved</code> - for other Open Source licenses
approved by the <a href="http://www.opensource.org/">Open Source
Initiative</a>. One of OSI's requirements is that free distribution
of binaries and sources is allowed. This value can also be used as an
umbrella for dual-licensed packages.</li>

<li><code>Restrictive</code> - for restrictive licenses.
Use this for packages that are available from the author in source
form for free use, but don't allow free redistribution.</li>

<li><code>Restrictive/Distributable</code> - for restrictive licenses which
permit distribution of source and binaries.
Use this for packages that are available from the author in source
form, permit distribution of source and binaries, but have restrictions which
make them non-open source licenses.</li>

<li><code>Commercial</code> - for restrictive, commercial licenses.
Use this for commercial packages (e.g. Freeware, Shareware) that do
not allow free redistribution of source or binaries.</li>

<li><code>Public Domain</code> - for packages that are in the Public
Domain, i.e. the author has given up his copyright on the code. These
packages don't have licenses at all and anyone can do anything with
them.</li>

</ul>




<h2><a name="prefix">3.2 Base System Interference</a></h2>
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


<h2><a name="sharedlibs">3.3 Shared Libraries</a></h2>
<p>
Fink has a new policy about shared libraries, effective in February 2002.
This section of the documentation discusses version 4
of the policy, which coincides with the release of Fink's 0.5.0 distribution.
We begin with a quick summary, and then discuss things in more detail.
</p><p>
Any package which builds shared libraries and is either (1) being put into
  the stable tree, or (2) a new package in Fink, should treat its shared
  libraries according to Fink's policy.  This means:</p>
<ul>
<li>   verify, using <code>otool -L</code>, that 
       the install_name of each library and
       its compatibility and current version numbers are correct </li>
<li>   put the shared libraries in a separate package (except for the
       links from libfoo.dylib to the install_name), and include
       the <code>Shlibs</code> field in that package</li>
<li>   put the headers and the final links from libfoo.dylib into a package
       which is classified as <code>BuildDependsOnly: True</code>, and plan
        to have
       no other package depend on this one.</li>
</ul>
<p>
  A maintainer who has reasons to deviate from this policy and not split the
  package should explain the reasons in the DescPackaging field.
</p><p>
For some packages, everything can be accomplished with a main package and a
-shlibs package; in other cases you also need a third package.  The new
<code>SplitOff</code> field actually makes this quite easy.
</p><p>
When three packages are needed, there are two different ways they could be named, depending on whether the libraries (option 1) or the binaries (option 2) are the most important feature of the package.  For option 1, 
use the layout:
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>Shared libraries</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>Headers</p></td></tr><tr valign="top"><td><code>foo-bin</code></td><td><p>Binaries, etc.</p></td></tr></table>

<p>while for option 2, use the layout:</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>Shared libraries</p></td></tr><tr valign="top"><td><code>foo-dev</code></td><td><p>Headers</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>Binaries, etc.</p></td></tr></table>

<p>
With option 2 it is harder to upgrade an existing package:  at the same
time as you upgrade, 
you need to add <code>BuildDepends: foo-dev</code> to every
package which says <code>Depends: foo</code>.
One other upgrade issue to keep in mind: a package which indirectly depends
on your package (through another package as an intermediary) may need
to have <code>BuildDepends: foo</code> or <code>BuildDepends: foo-dev</code>
added to it to ensure a successful upgrade.  It is your responsibility
to make sure that these <code>BuildDepends</code> entries are added.
</p>
<p><b>The policy in detail</b></p>
<p>
We now discuss things in more detail, first discussing the policy as 
applied to newly ported software, and 
then turning to the question of upgrading existing fink packages.  For 
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
the <code>SplitOff</code> field, as described below.  
(In fact, it is often necessary
to make more than two packages from the source, and this can be done
using <code>SplitOff2</code>, <code>SplitOff3</code>, etc.)
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
the package barN-shlibs; the "include" files and certain other files will
be put into the package barN.  There can be no overlapping files
between these two packages, and everything stored in barN-shlibs must have
a pathname which somehow includes the major version number N.  In many
instances, your package will need some files at runtime which are
typically installed into <code>%i/lib/bar/</code> or 
<code>%i/share/bar/</code> ; you should adjust the installation
paths to <code>%i/lib/bar/N/</code> or
<code>%i/share/bar/N/</code>.
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
the "install_name" of the library be <code>%p/lib/bar.N.dylib</code>.  
(You can
find the install_name by running <code>otool -L</code> on your library.)  The
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
<code>otool -L</code> query.)
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
<code>SplitOff</code> field.  Here is
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
During the execution of the <code>SplitOff</code>
field, the specified files and directories are moved from the 
install directory %I of the main package to the install directory %i of the
splitoff package.  (There is a similar convention for names: %N is the
name of the main package, and %n is the name of the current package.)
The <code>DocFiles</code> command then puts a copy of the documentation into 
<code>%i/share/doc/barN-shlibs</code>.
</p><p>
Notice that we have included the exact current version of barN-shlibs as a 
dependency of the main package barN (which can be abbreviated 
%N-shlibs (= %v-%r) ).
This ensures that the versions match, and also guarantees that barN
automatically "inherits" all the dependencies of barN-shlibs.
</p>
<p><b>The BuildDependsOnly field</b>
</p><p>
When libraries are being upgraded over time, it is often necessary to have
two versions of the header files available during a transition period,
with one version used for compiling some things and the other version
used for compiling others.  For this reason, the packages containing
header files must be constructed with some care.  If both foo-dev and
bar-dev contain overlapping headers, then foo-dev should declare
</p>
<pre>
  Conflicts: bar-dev
  Replaces: bar-dev
</pre>
<p>and similarly bar-dev declares Conflicts/Replaces on foo-dev.
</p><p>
In addition, both packages should declare
</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>This inhibits others from writing packages which depend on foo-dev or
bar-dev, since any such dependency will prevent the smooth operation of the
Conflicts/Replaces method.
</p><p>
There are some packages containing header files for which it's not
appropriate to declare BuildDependsOnly to be true.  In that case,
the package should declare
</p>
<pre>
  BuildDependsOnly: False
</pre>
<p>and the reason must be given in the DescPackaging field.
</p><p>
The BuildDependsOnly field should only be mentioned in the package's .info
file if the package contains header files, installed into /sw/include.
</p><p>
As of fink 0.20.5, "fink validate" will issue a warning for any .deb
which contains header files and at least one dylib, and does not declare
BuildDependsOnly to be either true or false.  (It is possible that in
future versions of fink, this warning will be expanded to cover the case of
a .deb with header files and a static library as well.)
</p>
<p><b>The Shlibs field</b>
</p><p>
In addition to putting the shared libraries in the correct package, as of
version 4 of this policy, you must also declare all of the shared libraries
using the <code>Shlibs</code> field.  This field has one line for each
shared library, which contains the <code>-install_name</code> of the
library, the <code>-compatibility_version</code>, and versioned 
dependency information specifying the Fink package which provides
this library at this compatibility version.  The dependency should
be stated in the form <code> foo (&gt;= version-revision)</code> where 
<code>version-revision</code> refers to
the <b>first</b> version of a Fink package which made
this library (with this compatibility version) available.  For example,
a declaration</p>
<pre>
  Shlibs: &lt;&lt;
    %p/lib/bar.1.dylib 2.1.0 bar1 (&gt;= 1.1-2)
  &lt;&lt;
</pre>
<p>indicates that a library with <code>-install_name</code> %p/lib/bar.1.dylib
and <code>-compatibility_version</code> 2.1.0 has been installed since
version 1.1-2 of the <b>bar1</b> package.  In addition, this declaration
amounts to  a promise
from the maintainer that a library with this name and a compatibility-version
of at least 2.1.0 will always be found in later versions of the <b>bar1</b> 
package.
</p><p>
Note the use of %p in the name of the library, which allows the correct
<code>-install_name</code> to be found by all users of Fink, no matter
what prefix they have chosen.
</p><p>
When a package is updated, usually the <code>Shlibs</code> field can simply
be copied to the next version/revision of the package.  The exception to
this is if the <code>-compatibility_version</code> increases: in that
case, the version number in the dependency information should be changed
to the current version/revision (which is the first version/revision to
provide the library with the new compatibility version number).
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
say "Conflicts: foo" because this will prevent the upgrade.)
</p><p>
After your upgrade, packages which say "Depends: foo" will continue to
function normally.  However, you should contact the fink maintainers
of all such packages and urge them to modify their packages to say 
"Depends: foo-shlibs, BuildDepends: foo" as soon as possible.  You will 
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
the only binary files will be things like <code>foo-config</code> which
are presumably only used at build time and never at run time.  In these
cases, the binaries can go with the header files in the <code>foo</code>
package.
</p><p>
In other cases, the binary files will be needed by other packages at
runtime, and they must be split off into a separate fink package with
a name something like <code>foo-bin</code>.  The <code>foo-bin</code>
package should depend on the <code>foo-shlibs</code> package, and
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
be prompted to install <code>foo-bin</code>.  To work around this, until
all other package maintainers have revised their packages as above,
your <code>foo</code> package can say
</p>
<pre>
  Depends: foo-shlibs (= exact.version), foo-bin
</pre>
<p>
This will force the installation of foo-bin on most users' systems, until
such time as the other package maintainers have upgraded their packages
which depend on <code>foo</code>.
</p>



<h2><a name="perlmods">3.4 Perl Modules</a></h2>
<p>Fink's policy about perl modules, originally implemented in
May 2003,  has been revised as of April 2004.
</p><p>
Traditionally, the Fink packages for perl modules had the suffix 
<code>-pm</code>, and were built using the <code>Type: perl</code> 
directive, which stores the perl module's files in <code>/sw/lib/perl5</code> and/or
<code>/sw/lib/perl5/darwin</code>.  Under the policy
now in place, this storage location is only 
permitted for perl modules which are independent of the version of perl 
being used to compile them (and which do not depend on other perl modules
that lack this independence-of-version).
</p><p>
The perl modules which are version-dependent are the so-called XS modules,
which frequently contain compiled C code as well as pure perl routines.
There are a number of ways of recognizing these, including the presence
of a file with a suffix <code>.bundle</code>.
</p><p>
A version-dependent perl module must be built using a versioned binary
of perl, such as <code>perl5.6.0</code>, and must store its files in
versioned subdirectories of the standard perl directories, such as
<code>/sw/lib/perl5/5.6.0</code> and <code>/sw/lib/perl5/5.6.0/darwin</code>.  By convention, package names
use the suffix <code>-pm560</code> for
a perl module of version 5.6.0.  Similar storage and naming conventions
are in force for other versions of perl, which include 
perl 5.6.1 (in the 10.2 trees only),  perl 5.8.0, perl 5.8.1, and
perl 5.8.4 (coming soon).
</p><p>
The directive <code>Type: perl 5.6.0</code> automatically uses the
versioned perl binary and stores the files in the correct subdirectories. 
(This directive is available starting with version 0.13.0 of fink.)
</p><p>
Under the May 2003 policy, it was permitted to create a 
<code>-pm</code> package which is essentially 
a "bundle" package that loads the <code>-pm560</code> variant or any
others which may be exist.  Under the April 2004 policy this is discouraged,
and after a transitional period it will be outlawed entirely.  (The
one exception will be the package <code>storable-pm</code> which needs
to be in this form for bootstrapping purposes.)
</p>
<p>As of fink 0.20.2, the system-perl virtual package automatically
"Provides" certain perl modules when the version of Perl present on
the system is at
least 5.8.0.  In the case of system-perl-5.8.1-1, these are:
<b>attribute-handlers-pm581, cgi-pm581, digest-md5-pm581, file-spec-pm581, 
file-temp-pm581, filter-simple-pm581, filter-util-pm581, getopt-long-pm581, 
i18n-langtags-pm581, libnet-pm581, locale-maketext-pm581, memoize-pm581, 
mime-base64-pm581, scalar-list-utils-pm581, test-harness-pm581, 
test-simple-pm581, time-hires-pm581.</b>
(This list was slightly different in fink 0.20.1: package maintainers are
encouraged to check to be sure that they are assuming the correct list.)
</p>
<p>
Effective with version 0.13.0 of fink, the <code>fink validate</code>
command when applied to a <code>.deb</code> file will check to see if
the fink package is an XS module which has been installed in a non-versioned 
directory, and will issue a warning if so.
</p>



<h2><a name="emacs">3.5 Emacs Policy</a></h2>
<p> The Fink project has chosen to follow the Debian project's policy
regarding emacs, with a few small differences.
(The Debian policy document can be found at
<a href="http://www.debian.org/doc/packaging-manuals/debian-emacs-policy">
http://www.debian.org/doc/packaging-manuals/debian-emacs-policy</a>.)
There are two differences in the Fink policy.  First, 
this policy only applies to the emacs20 and
emacs21 packages in fink at the moment, not to the xemacs package.  (This
may change some day in the future.)    And second, unlike the Debian policy,
 Fink packages are allowed to install things directly into 
/sw/share/emacs/site-lisp.
</p>



<p align="right"><? echo FINK_NEXT ; ?>:
<a href="fslayout.php?phpLang=en">4. Filesystem Layout</a></p>
<? include_once "../../footer.inc"; ?>


