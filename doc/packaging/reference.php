<?
$title = "Packaging - Reference";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2001/12/25 15:41:48';

$metatags = '<link rel="contents" href="index.php" title="Packaging Contents"><link rel="prev" href="fslayout.php" title="Filesystem Layout">';

include "header.inc";
?>

<h1>Packaging - 5 Reference</h1>




<a name="build"><h2>5.1 The Build Process</h2></a>

<p>To understand some of the fields, you need some knowledge of the
build process Fink uses. It consists of five phases: unpack, patch,
compile, install and build. The example paths below are for an
installation in /sw and the package gimp-1.2.1-1.</p>
<p>In the <b>unpack phase</b> the directory /sw/src/gimp-1.2.1-1 is created
and the source tarball(s) are unpacked there. In most cases, this will
create a directory gimp-1.2.1 with the source in it; all following
steps will be executed in that directory
(i.e. /sw/src/gimp-1.2.1-1/gimp-1.2.1). Details can be controlled with
the SourceDirectory, NoSourceDirectory and Source<i>N</i>ExtractDir
fields.</p>
<p>In the <b>patch phase</b> the source is patched so that it will
build on Darwin. The actions specified by the UpdateConfigGuess,
UpdateLibtool, Patch and PatchScript fields will be executed, in that
order.</p>
<p>In the <b>compile phase</b> the source is configured and
compiled. Usually this means calling the <tt><nobr>configure</nobr></tt> script
with some parameters and then issuing a <tt><nobr>make</nobr></tt> command. See the
ConfigureScript field description for details.</p>
<p>In the <b>install phase</b> the package is installed to a temporary
directory, /sw/src/root-gimp-1.2.1-1 (= %d). (Note the "root-" part.)
All files that would normally be installed to /sw are installed in
/sw/src/root-gimp-1.2.1-1/sw (= %i = %d%p) instead. See the
InstallScript field description for details.</p>
<p>In the <b>build phase</b> a binary package file (.deb) is built
from the temporary directory. You can't influence this step directly,
but various information from the package description is used to
generate a <tt><nobr>control</nobr></tt> file for dpkg.</p>


<a name="fields"><h2>5.2 Fields</h2></a>

<p>This list is not necessarily complete. <tt><nobr>:-)</nobr></tt></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th>Field</th><th>Value</th></tr><tr valign="top"><td>Package</td><td>
<p>
The package name.
May contain lowercase letters, numbers and the special characters '.',
'+' and '-'.
No underscores ('_'), no capital letters.
Required field.
</p>
</td></tr><tr valign="top"><td>Version</td><td>
<p>
The upstream version number.
Same limitations as the Package field.
Required field.
</p>
</td></tr><tr valign="top"><td>Revision</td><td>
<p>
The package revision.
Increase this when you make a new description for the same upstream
version.
Revision numbers start at 1.
Required field.
</p>
</td></tr><tr valign="top"><td>Type</td><td>
<p>
This can be set to <tt><nobr>bundle</nobr></tt>.
Bundle packages are used to group a set of related packages together.
They only have dependencies, but no code and no installed files.
The fields Source, PatchScript, CompileScript, InstallScript and
related ones are ignored for bundle packages.
</p>
<p>
<tt><nobr>nosource</nobr></tt> is a very similar type.
It indicates that there is no source tarball, so nothing is fetched
and the unpack phase creates just an empty directory.
However, the patch, compile and install phases are executed normally.
This way you can bring in all the code with a patch, or just create
some directories in the InstallScript.
</p>
<p>
Finally there is <tt><nobr>perl</nobr></tt> which causes alternate default
values for CompileScript and InstallScript to be used. 
</p>
</td></tr><tr valign="top"><td>Maintainer</td><td>
<p>
The name and e-mail address of the person responsible for the package.
This field is required, and there must be exactly one name and address
in the following format:
</p>
<pre>Firstname Lastname &lt;user@host.domain.com&gt;</pre>
</td></tr><tr valign="top"><td>Depends</td><td>
<p>
A list of packages which must be installed before this package can be
built.
Usually, this is just a comma-separated list for plain package names,
but Fink now supports alternatives and version clauses with the same
syntax as dpkg.
A fully featured example:
</p>
<pre>Depends: daemonic (&gt;= 20010902-1), emacs | xemacs</pre>
<p>
Note that there is no way to express real optional dependencies.
If a package works both with and without another package, you must
either make sure that the other package is not used even when it is
present or add it to the Depends field.
If you want to offer the user both options, make two separate
packages, e.g. wget and wget-ssl.
</p>
</td></tr><tr valign="top"><td>BuildDepends</td><td>
<p>
<i>Introduced in fink 0.9.0.</i>
A list of dependencies that is applied at build time only.
This can be used to list tools (e.g. flex) that must be present to
build the packages, but which are not used at run time.
Supports the same syntax as Depends.
</p>
</td></tr><tr valign="top"><td>Provides</td><td>
<p>
A comma-separated list of package names that this package is
considered to "provide".
If a package named "pine" specifies <tt><nobr>Provides: mailer</nobr></tt>,
then any dependency on "mailer" is considered satisfied when "pine" is
installed.
You'll usually also want to name these packages in the "Conflicts" and
the "Replaces" field.
</p>
</td></tr><tr valign="top"><td>Conflicts</td><td>
<p>
A comma-separated list of package names that must not be installed at
the same time as this package.
For virtual packages it is allowed to list the names of the provided
packages here; they will be handled appropriately.
This fields also supports versioned dependencies like the Depends
field, but not alternatives (wouldn't make sense).
</p>
<p>
<b>Note:</b> Fink itself currently ignores this field.
However, it is passed on to dpkg and will be handled accordingly.
In summary, it only effects run-time, not build-time.
</p>
</td></tr><tr valign="top"><td>Replaces</td><td>
<p>
This is used together with "Conflicts", when this package not only
takes over the function of the conflicting package, but also has some
common files.
Without this field, dpkg may generate errors when installing the
package because files are still owned by the other package.
It is also a hint that the two packages involved are genuine
alternatives and one can be removed in favor of the other.
</p>
<p>
<b>Note:</b> Fink itself currently ignores this field.
However, it is passed on to dpkg and will be handled accordingly.
In summary, it only effects run-time, not build-time.
</p>
</td></tr><tr valign="top"><td>Recommends, Suggests, Enhances</td><td>
<p>
These fields specify additional package relations in the same style as
the other dependency fields.
These three relations don't affect actual installation via
<tt><nobr>dpkg</nobr></tt> or <tt><nobr>apt-get</nobr></tt>.
However, they are used by <tt><nobr>dselect</nobr></tt> and other frontends to
help the user make sensible choices.
</p>
</td></tr><tr valign="top"><td>Pre-Depends</td><td>
<p>
A special variation of the Depends field with more strict semantics.
This field must only be used after the case has been discussed on the
developer mailing list and a consensus has been reached that it is
necessary.
</p>
</td></tr><tr valign="top"><td>Essential</td><td>
<p>
A boolean value that denotes essential packages. Essential
packages are installed as part of the bootstrap process. All
non-essential packages implicitly depend on the essential ones. dpkg
will refuse to remove essential packages from the system unless
special flags are used to override this.
</p>
</td></tr><tr valign="top"><td>Source</td><td>
<p>
An URL to the source tarball. It should be a HTTP or FTP URL, but
Fink doesn't really care - it just passes the URL to wget. This field
supports a special URL scheme for mirrors:
<tt><nobr>mirror:&lt;mirror-name&gt;:&lt;relative-path&gt;</nobr></tt>. This will
look up the mirror setting for <i>mirror-name</i> in Fink's
configuration, append the <i>relative-path</i> part and use that as
the actual URL.
</p>
<p>
Before the URL is used, percent expansion takes place.
The value <tt><nobr>gnu</nobr></tt> is a shorthand for
<tt><nobr>mirror:gnu:%n/%n-%v.tar.gz</nobr></tt>; <tt><nobr>gnome</nobr></tt> is a shorthand for
<tt><nobr>mirror:gnome:stable/sources/%n/%n-%v.tar.gz</nobr></tt>. The
default is <tt><nobr>%n-%v.tar.gz</nobr></tt> (i.e. a manual
download).
</p>
</td></tr><tr valign="top"><td>SourceDirectory</td><td>
<p>
Must be used when the tarball expands to a single directory, but
the directory's name is different from the basename of the tarball.
Usually, a tarball named "foo-1.0.tar.gz" will produce a directory
named "foo-1.0". If it produces a directory with a different name,
specify it with this parameter. Percent expansion is performed on this
field.
</p>
</td></tr><tr valign="top"><td>NoSourceDirectory</td><td>
<p>
Set this boolean parameter to a true value if the tarball does not
expand to a single directory. Usually, a tarball named "foo-1.0.tar.gz"
will produce a directory named "foo-1.0". If it just unpacks the files
to the current directory, use this parameter and set it to a boolean
true value.
</p>
</td></tr><tr valign="top"><td>Source<i>N</i></td><td>
<p>
If a package consists of several tarballs, name them with these
additional fields, starting with N = 2. So, the first tarball (which
should be some kind of "main" tarball) goes into <tt><nobr>Source</nobr></tt>, the
second tarball in <tt><nobr>Source2</nobr></tt> and so on. The rules are the same
as for Source, only that the "gnu" and "gnome" shortcuts are not
expanded - that would be useless anyway.
</p>
</td></tr><tr valign="top"><td>Source<i>N</i>ExtractDir</td><td>
<p>
Normally, an auxillary tarball will be extracted in the same
directory as the main tarball. If you need to extract it in a
specific subdirectory instead, use this field to specify
it. Source2ExtractDir corresponds to the Source2 tarball, as one would
expect. See ghostscript, vim and tetex for examples of usage.
</p>
</td></tr><tr valign="top"><td>SourceRename</td><td>
<p>
This field can renames a source tar ball on the fly. This is useful
if for example the version of the source is encoded in the directory name on
the server, but the tar ball itself has the same name for all versions, e.g.
http://www.foobar.org/coolapp/1.2.3/source.tar.gz. To circumvent the problems
caused by this, you would then use something like
</p>
<pre>SourceRename: %n-%v.tar.gz</pre>
<p>
In the above example this would result in the tarball being stored under
/sw/src/coolapp-1.2.3.tar.gz as one would expect.
</p>
</td></tr><tr valign="top"><td>Source<i>N</i>Rename</td><td>
<p>
This is just the same as the <tt><nobr>SourceRename</nobr></tt> field, except that it
is used to rename the Nth tarball as specified by the <tt><nobr>Source<i>N</i></nobr></tt>
field. See context or hyperref for examples of usage.
</p>
</td></tr><tr valign="top"><td>UpdateConfigGuess</td><td>
<p>
A boolean value. If true, the files config.guess and config.sub
in the build directory will be replaced with versions that know about
Darwin. This happens in the patch phase and before the PatchScript
is run. <b>Only</b> use this when you know it is necessary,
i.e. when the configure script fails with a "unknown host"
message.
</p>
</td></tr><tr valign="top"><td>UpdateConfigGuessInDirs</td><td>
<p>
<i>Introduced in a post-0.9.0 CVS version.</i>
A list of subdirectories.
This does the same as UpdateConfigGuess, but is useful for packages
that have outdated config.guess files in several directories
throughout the source tree.
Previously you had to copy/move the files there manually in the
PatchScript.
With this new field you can just list the directories.
Use <tt><nobr>.</nobr></tt> to update files in the build directory itself.
</p>
</td></tr><tr valign="top"><td>UpdateLibtool</td><td>
<p>
A boolean value. If true, the files ltconfig and ltmain.sh in the
build directory will be replaced with versions that know about
Darwin. This happens in the patch phase and before the PatchScript
is run. <b>Only</b> use this when you know that the package needs
it. Some packages can be broken by overwriting the libtool scripts
with mismatching versions. See the <a href="http://fink.sourceforge.net/doc/porting/libtool.php">libtool
page</a> for further information.
</p>
</td></tr><tr valign="top"><td>UpdateLibtoolInDirs</td><td>
<p>
<i>Introduced in a post-0.9.0 CVS version.</i>
A list of subdirectories.
This does the same as UpdateLibtool, but is useful for packages
that have outdated libtool 1.3.x scripts in several directories
throughout the source tree.
Previously you had to copy/move the files there manually in the
PatchScript.
With this new field you can just list the directories.
Use <tt><nobr>.</nobr></tt> to update files in the build directory itself.
</p>
</td></tr><tr valign="top"><td>UpdatePoMakefile</td><td>
<p>
A boolean value.
If true, the file <tt><nobr>Makefile.in.in</nobr></tt> in the subdirectory
<tt><nobr>po</nobr></tt> is replaced with a patched version.
This happens in the patch phase and before the PatchScript is run.
</p>
<p>
The patched version respects DESTDIR and makes sure that message
catalogs end up in <tt><nobr>/sw/share/locale</nobr></tt>, not
<tt><nobr>/sw/lib/locale</nobr></tt>.
Before using this field, make sure that you won't break the package
and that it's really required.
You can run <tt><nobr>diff</nobr></tt> to find the differences between the
packages's version and Fink's version (in
<tt><nobr>/sw/lib/fink/update</nobr></tt>).
</p>
</td></tr><tr valign="top"><td>UpdatePOD</td><td>
<p>
A boolean value, specific for perl module packages.
If true, this will add code to the install, postrm and postinst
scripts that maintains the .pod files provided by perl packages.
This includes adding and removing the .pod date from the central
<tt><nobr>/sw/lib/perl5/darwin/perllocal.pod</nobr></tt> file
</p>
</td></tr><tr valign="top"><td>Patch</td><td>
<p>
The filename of a patch to be applied with <tt><nobr>patch -p1
&lt;<i>patch-file</i></nobr></tt>. This should be just a filename; the
appropriate path will be prepended automatically. Percent expansion is
performed on this field, so a typical value is simply
<tt><nobr>%f.patch</nobr></tt>. The patch is applied before the PatchScript
is run (if any).
</p>
</td></tr><tr valign="top"><td>PatchScript</td><td>
<p>
A list of commands that are run in the patch phase. See the note
on scripts below. This is the place to put commands that patch or
otherwise modify the package. There is no default. Before the
commands are executed, percent expansion takes place (see last
section).
</p>
</td></tr><tr valign="top"><td>ConfigureParams</td><td>
<p>
Additional parameters to pass to the configure script. (See
CompileScript for details.)
</p>
</td></tr><tr valign="top"><td>CompileScript</td><td>
<p>
A list of commands that are run in the compile phase. See the note
on scripts below. This is the place to put commands that configure and
compile the package. Normally the default is:
</p>
<pre>./configure %c
make</pre>
<p>
This is appropriate for packages that use GNU autoconf.
For packages with of type perl (as specified via the Type field),
the default instead is:
</p>
<pre>perl Makefile.PL PREFIX=\%p INSTALLPRIVLIB=\%p/lib/perl5 \
 INSTALLARCHLIB=\%p/lib/perl5/darwin INSTALLSITELIB=\%p/lib/perl5 \
 INSTALLSITEARCH=\%p/lib/perl5/darwin INSTALLMAN1DIR=\%p/share/man/man1 \
 INSTALLMAN3DIR=\%p/share/man/man3
make
make test</pre>
<p>
Before the commands are executed, percent expansion takes place
(see previous section).
</p>
</td></tr><tr valign="top"><td>InstallScript</td><td>
<p>
A list of commands that are run in the install phase. See the note
on scripts below. This is the place to put commands that copy all
necessary files to the stow directory for the package. Normally the
default is:
</p>
<pre>make install prefix=%i</pre>
<p>
The default is appropriate for packages that use GNU autoconf.
For packages with of type perl (as specified via the Type field),
the default instead is:
</p>
<pre>make install INSTALLPRIVLIB=\%i/lib/perl5 \
 INSTALLARCHLIB=\%i/lib/perl5/darwin INSTALLSITELIB=\%i/lib/perl5 \
 INSTALLSITEARCH=\%i/lib/perl5/darwin INSTALLMAN1DIR=\%i/share/man/man1 \
 INSTALLMAN3DIR=\%i/share/man/man3</pre>
<p>
If the package supports it, it is preferably to use <tt><nobr>make install
DESTDIR=%d</nobr></tt> instead. Before the commands are executed, percent
expansion takes place (see previous section).
</p>
</td></tr><tr valign="top"><td>DocFiles</td><td>
<p>
This field provides a convenient way to install README or COPYING
files in the doc directory for the package,
<tt><nobr>%p/share/doc/%n</nobr></tt>.
The value is a space-separated list of files.
You can copy files from subdirectories of the build directory, but
they will end up in the doc directory itself, not in a subdirectory.
Shell wildcards are allowed.
It is also possible to rename single files on the fly by appending the
new name separated by a colon (:),
e.g. <tt><nobr>libgimp/COPYING:COPYING.libgimp</nobr></tt>.
This field works by appending appropriate <tt><nobr>install</nobr></tt>
commands to the InstallScript.
</p>
</td></tr><tr valign="top"><td>Set<i>ENVVAR</i></td><td>
<p>
Causes certain environment variables to be set in the
compile and install phases. This can be used to pass compiler flags
etc. to configure scripts and Makefiles. Currently supported variables
are: CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, LD, LDFLAGS, LIBS,
MAKE, MFLAGS. The value you specify is subject to the
percent expansion described in the last section. A common example:
</p>
<pre>SetCPPFLAGS: -no-cpp-precomp</pre>
<p>
The variables CPPFLAGS and LDFLAGS are special. They default to
<tt><nobr>-I%p/include</nobr></tt> and <tt><nobr>-L%p/lib</nobr></tt>,
respectively. If you specify a value for one of these, it will be
prepended to the default value.
</p>
</td></tr><tr valign="top"><td>NoSet<i>ENVVAR</i></td><td>
<p>
When set to a true value, deactivates the default values for
CPPFLAGS and LDFLAGS mentioned above. That is, if you want LDFLAGS to
remain unset, specify <tt><nobr>NoSetLDFLAGS: true</nobr></tt> .
</p>
</td></tr><tr valign="top"><td>PreInstScript, PostInstScript, PreRmScript, PostRmScript</td><td>
<p>
These fields specify pieces of shell scripts that will be called when
the package is installed, upgraded or removed.
Fink automatically adds a shell script header that calls 'set -e', so
any command that fails will result in instant termination of the
script.
Fink also adds an <tt><nobr>exit 0</nobr></tt> at the end.
To indicate an error, exit from the script with a non-zero exit code.
The first parameter (<tt><nobr>$1</nobr></tt>) is set to a value indicating
what action is being performed.
Some possible values are <tt><nobr>install</nobr></tt>, <tt><nobr>upgrade</nobr></tt>,
<tt><nobr>remove</nobr></tt> and <tt><nobr>purge</nobr></tt>.
Note that there are more values, used during error rollback or when
removing a package in favor of another one.
</p>
<p>
The scripts are called at the following times:
</p>
<ul>
<li>PreInstScript: When the package is installed for the first time
and before upgrading the package to this version.</li>
<li>PostInstScript: After unpacking and setting up the package.</li>
<li>PreRmScript: Before the package is removed or upgraded to a later
version.</li>
<li>PostRmScript: After the package was removed or upgraded to a later
version.</li>
</ul>
<p>
To make it more clear, an upgrade invokes both the ...Inst scripts of
the new version and the ...Rm scripts of the old version.
Details can be found in the Debian Policy Manual,
<a href="http://www.debian.org/doc/debian-policy/ch-maintainerscripts.html">Chapter 6</a>.
</p>
<p>
Percent expansion is performed on the scripts.
Commands can generally be called without giving a full path.
</p>
</td></tr><tr valign="top"><td>ConfFiles</td><td>
<p>
A space-separated list of files that are user-modifiable configuration
files.
The files must be specified with an absolute path,
e.g. <tt><nobr>%p/etc/foo.conf</nobr></tt>.
The named files will receive special treatment by dpkg.
When a package is upgraded and the file has changed both on disk and
in the package, the user is asked which version to use and backups
of the file will be made.
When a package is "remove"d, the configuration files will remain on
disk.
Only a "purge" also removes the configuration files.
</p>
</td></tr><tr valign="top"><td>InfoDocs</td><td>
<p>
Lists the names of Info documents that the package installs in
%p/share/info.
This will add appropriate code to the postinst and prerm scripts to
maintain the Info directory file, <tt><nobr>dir</nobr></tt>.
This feature is still in flux, more fields for finer control may be
added in the future.
</p>
</td></tr><tr valign="top"><td>DaemonicFile</td><td>
<p>
Gives a service description for <tt><nobr>daemonic</nobr></tt>.
<tt><nobr>daemonic</nobr></tt> is used by Fink to create and remove
StartupItems for daemon processes (e.g. web servers).
The description will added to the package as a file named
<tt><nobr>%p/etc/daemons/<i>name</i>.xml</nobr></tt>, where <i>name</i> is
specified by the DaemonicName field and defaults to the package
name.
Percent expansion is performed on the contents of this field.
Note that you must add <tt><nobr>daemonic</nobr></tt> to the dependency list if
your package uses it.
</p>
</td></tr><tr valign="top"><td>DaemonicName</td><td>
<p>
A name for the <tt><nobr>daemonic</nobr></tt> service description file.
See the description of DaemonicFile for details.
</p>
</td></tr><tr valign="top"><td>Description</td><td>
<p>
A short description of the package (what is it?). This is a
one-line description that will be displayed in lists, so it must be
short and informative.  Keep it to around 30 to 50 chars. It is not
necessary to repeat the package name in this field - it will always
be displayed in proper context. Required field.
</p>
</td></tr><tr valign="top"><td>DescDetail</td><td>
<p>
A more detailed description (what is it, what can I use it for?).
Multiple lines allowed.
</p>
</td></tr><tr valign="top"><td>DescUsage</td><td>
<p>
This is for information that is needed to use the package (how do
I use it?). As in "run wmaker.inst once before using WindowMaker".
Multiple lines allowed.
</p>
</td></tr><tr valign="top"><td>DescPackaging</td><td>
<p>
Notes about the packaging. Stuff like "patches the Makefile to put
everything in place" goes here. Multiple lines allowed.
</p>
</td></tr><tr valign="top"><td>DescPort</td><td>
<p>
Notes that are specific to porting the package to Darwin. Stuff
like "config.guess and libtool scripts are updated, -no-cpp-precomp
is necessary" goes here. Multiple lines allowed.
</p>
</td></tr><tr valign="top"><td>License</td><td>
<p>
This field gives the nature of the license under which the package is
distributed.
The value must be one of the values described in <a href="policy.php#license">Package Licenses</a> earlier in
this document.
Additionally, this field must only be given if the package actually
complies to the packaging policy in these respects, i.e. a copy of the
license is installed in the doc directory for the package.
</p>
</td></tr><tr valign="top"><td>Homepage</td><td>
<p>
The URL of the upstream home page of the package.
</p>
</td></tr><tr valign="top"><td>Comment</td><td>
<p>
<b>Obsolete.</b> Was: General comments on the package.
</p>
</td></tr><tr valign="top"><td>CommentPort</td><td>
<p>
<b>Obsolete.</b> Was: Comments on the package that are specific to the
Darwin port. Describe what special parameters or patches are
necessary, what doesn't work (yet), etc.
</p>
</td></tr><tr valign="top"><td>CommentStow</td><td>
<p>
<b>Obsolete.</b> Was: Comments on the package that apply to using it
with stow. Describe special treatment necessary and potential
problems.
</p>
</td></tr><tr valign="top"><td>UsesGettext</td><td>
<p>
<b>Obsolete.</b> gettext is now an essential package and
always available.
</p>
</td></tr></table>


<a name="scripts"><h2>5.3 Scripts</h2></a>

<p>The PatchScript, CompileScript and InstallScript fields allow you
to specify shell commands to be executed. This is sort of like a shell
script. However, the commands are executed via system(), one by one,
so you can't use constructs that span multiple lines. It also means
the <tt><nobr>cd</nobr></tt> commands only affect commands that are on the same
line. This may be fixed one day in the future.</p>


<a name="patches"><h2>5.4 Patches</h2></a>

<p>If your package needs a patch to compile on Darwin (or to work with
fink), name the patch with the full package name plus the extension
".patch" and put it in the same directory as the .info file. Specify
either one of these (they are equivalent):</p>
<pre>Patch: %f.patch</pre>
<pre>PatchScript: patch -p1 &lt;%a/%f.patch</pre>
<p>These two fields are not mutually-exclusive - you can use both, and
they will both be executed. In that case the PatchScript is executed
last.</p>






<?
include "footer.inc";
?>
