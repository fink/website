<?
$title = "Packaging";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/30 11:11:49 $';

$metatags = '';

include "header.inc";
?>

<h1>Creating Fink Packages</h1>
<p>This page tries to document the format of Fink's package
description files. This is difficult because the format is still
evolving. Watch the "Last changed" info in the footer of the
page. What you're reading right now is a description of the format
used in Fink 0.2.2.</p>
<p>If you create packages for Fink, you may want to subscribe to the
<a href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a>
mailing list.</p>
<p>Generated from <i>$Fink: packaging.xml,v 1.1 2001/06/28 10:21:46 chrisp Exp $</i></p><h2>General Notes</h2>

<p>Packages are identified by a package name; it may consist of
lowercase letters, numbers, dashes and underscores. (In theory, Fink
will let you use any ASCII character, but it's strongly discouraged.)
There may be several versions of a package. Version numbers consists
of a upstream version (commonly just called "version") and a packaging
revision. As for allowed characters, the same rules as for package
names apply. It is okay to use versions with letters, e.g. 2.9p1. Both
fink and dpkg will know how to sort these correctly. Only one version
of a package can be installed at any time. The full name of a package
is
<tt><nobr>&lt;package-name&gt;-&lt;upstream-version&gt;-&lt;revision&gt;</nobr></tt>,
e.g. <tt><nobr>gimp-1.2.1-1</nobr></tt>.</p>
<p>Package descriptions are read from the finkinfo directories below
the /sw/fink/dists directory. The "Trees" setting in /sw/etc/fink.conf
controls which directories are read. The name of package descriptions
must be the full package name plus the extension ".info".</p>
<p>The description files are simple lists of key-value pairs. The
format is based on the popular RFC 822 header format. Each line starts
with a key, terminated by a colon (:) and followed by the
value. Values may be broken across several lines by starting the next
line with whitespace. In Fink, empty lines and lines starting with a
hash (#) are ignored. If that description confused you, just look at
the files.</p>
<p>Keys (field names) are case-insensitive in Fink. Some fields take
a boolean value - any of "true", "yes", "on", "1" (case-insensitive)
are treated as true, all other strings are treated as false. For all
fields except Package, it is not an error to omit them; they all have
default values. In fact, the policy is to include only necessary
fields.</p>
<h2>The Build Process</h2>

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
<h2>Percent Expansion</h2>

<p>To make life easier, Fink supports a set of expansions that are
performed on some fields. The available expansions are:</p>
<dl>
<dt>%n</dt><dd>the package <b>n</b>ame</dd>
<dt>%v</dt><dd>the package <b>v</b>ersion</dd>
<dt>%r</dt><dd>the package <b>r</b>evision</dd>
<dt>%f</dt><dd>the <b>f</b>ull package name, i.e. %n-%v-%r</dd>
<dt>%p</dt><dd>the <b>p</b>refix where Fink is installed, e.g. /sw</dd>
<dt>%d</dt><dd>the <b>d</b>estination directory where the tree to be
packaged is built, e.g. /sw/src/root-gimp-1.2.1-1</dd>
<dt>%i</dt><dd>the full <b>i</b>nstall-phase prefix, equivalent to %d%p</dd>
<dt>%a</dt><dd>the path where the p<b>a</b>tches can be found</dd>
<dt>%c</dt><dd>the parameters for <b>c</b>onfigure:
<tt><nobr>--prefix=%p</nobr></tt> plus anything specified with
ConfigureParams</dd>
</dl>

<h2>Fields</h2>

<p>This list is not necessarily complete. <tt><nobr>:-)</nobr></tt></p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th>Field</th><th>Value</th></tr><tr valign="top"><td>Package</td><td>The package name. May contain lowercase letters, numbers and
the special characters '.' and '-'. No underscores ('_'), no capital
letters. Required.</td></tr><tr valign="top"><td>Version</td><td>The upstream version number. Required, but defaults to "0".</td></tr><tr valign="top"><td>Revision</td><td>The package revision. Increase this when you make a new
description for the same upstream version. Revision numbers should
start at 1. Required, but defaults to "0".</td></tr><tr valign="top"><td>Source</td><td><p>An URL to the source tarball. It should be a HTTP or FTP url, but
Fink doesn't really care - it just passes the URL to wget. This field
supports a special URL scheme for mirrors:
<tt><nobr>mirror:&lt;mirror-name&gt;:&lt;relative-path&gt;</nobr></tt>. This will
look up the mirror setting for <i>mirror-name</i> in Fink's
configuration, append the <i>relative-path</i> part and use that as
the actual URL.</p>
<p>Before the URL is used, percent expansion takes place (see
previous section). The value <tt><nobr>gnu</nobr></tt> is a shorthand for
<tt><nobr>mirror:gnu:%n/%n-%v.tar.gz</nobr></tt>; <tt><nobr>gnome</nobr></tt> is a shorthand for
<tt><nobr>mirror:gnome:stable/sources/%n/%n-%v.tar.gz</nobr></tt>. The
default is <tt><nobr>%n-%v.tar.gz</nobr></tt> (i.e. a manual
download).</p></td></tr><tr valign="top"><td>SourceDirectory</td><td>Must be used when the tarball expands to a single directory, but
the directory's name is different from the basename of the tarball.
Usually, a tarball named "foo-1.0.tar.gz" will produce a directory
named "foo-1.0". If it produces a directory with a different name,
specify it with this parameter. Percent expansion is performed on this
field.</td></tr><tr valign="top"><td>NoSourceDirectory</td><td>Set this boolean parameter to a true value if the tarball does not
expand to a single directory. Usually, a tarball named "foo-1.0.tar.gz"
will produce a directory named "foo-1.0". If it just unpacks the files
to the current directory, use this parameter and set it to a boolean
true value.</td></tr><tr valign="top"><td>Source<i>N</i></td><td>If a package consists of several tarballs, name them with these
additional fields, starting with N = 2. So, the first tarball (which
should be some kind of "main" tarball) goes into <tt><nobr>Source</nobr></tt>, the
second tarball in <tt><nobr>Source2</nobr></tt> and so on. The rules are the same
as for Source, only that the "gnu" and "gnome" shortcuts are not
expanded - that would be useless anyway.</td></tr><tr valign="top"><td>Source<i>N</i>ExtractDir</td><td>Normally, an auxillary tarball will be extracted in the same
directory as the main tarball. If you need to extract it in a
specific subdirectory instead, use this field to specify
it. Source2ExtractDir corresponds to the Source2 tarball, as one would
expect. See ghostscript, vim and tetex for examples of
usage.</td></tr><tr valign="top"><td>Depends</td><td>A comma-separated list of packages which must be installed before
this package can be built. Currently, only plain package names are
allowed; there is no mechanism to request a specific version of a
package yet.</td></tr><tr valign="top"><td>Essential</td><td>A boolean value that denotes essential packages. Essential
packages are installed as part of the bootstrap process. All
non-essential packages implicitly depend on the essential ones. dpkg
will refuse to remove essential packages from the system unless
special flags are used to override this.</td></tr><tr valign="top"><td>UpdateConfigGuess</td><td>A boolean value. If true, the files config.guess and config.sub
in the build directory will be replaced with versions that know about
Darwin. This happens in the patch phase and before the PatchScript
is run. <b>Only</b> use this when you know it is necessary,
i.e. when the configure script fails with a "unknown host"
message.</td></tr><tr valign="top"><td>UpdateLibtool</td><td>A boolean value. If true, the files ltconfig and ltmain.sh in the
build directory will be replaced with versions that know about
Darwin. This happens in the patch phase and before the PatchScript
is run. <b>Only</b> use this when you know that the package needs
it. Some packages can be broken by overwriting the libtool scripts
with mismatching versions. See the <a href="http://fink.sourceforge.net/darwin/libtool.php">libtool
page</a> for further information.</td></tr><tr valign="top"><td>Patch</td><td>The filename of a patch to be applied with <tt><nobr>patch -p1
&lt;<i>patch-file</i></nobr></tt>. This should be just a filename; the
appropriate path will be prepended automatically. Percent expansion is
performed on this field, so a typical value is simply
<tt><nobr>%f.patch</nobr></tt>. The patch is applied before the PatchScript
is run (if any).</td></tr><tr valign="top"><td>PatchScript</td><td>A list of commands that are run in the patch phase. See the note
on scripts below. This is the place to put commands that patch or
otherwise modify the package. There is no default. Before the
commands are executed, percent expansion takes place (see last
section).</td></tr><tr valign="top"><td>ConfigureParams</td><td>Additional parameters to pass to the configure script. (See
CompileScript for details.)</td></tr><tr valign="top"><td>CompileScript</td><td><p>A list of commands that are run in the compile phase. See the note
on scripts below. This is the place to put commands that configure and
compile the package. The default is:</p>
<pre>./configure %c
make</pre>
<p>This is appropriate for packages that use GNU autoconf. Before the
commands are executed, percent expansion takes place (see previous
section).</p></td></tr><tr valign="top"><td>InstallScript</td><td><p>A list of commands that are run in the install phase. See the note
on scripts below. This is the place to put commands that copy all
necessary files to the stow directory for the package. The default is:</p>
<pre>make install prefix=%i</pre>
<p>The default is appropriate for packages that use GNU autoconf. If the
package supports it, it is preferably to use <tt><nobr>make install
DESTDIR=%d</nobr></tt> instead. Before the commands are executed, percent
expansion takes place (see previous section).</p></td></tr><tr valign="top"><td>Set<i>ENVVAR</i></td><td><p>Causes certain environment variables to be set in the
compile and install phases. This can be used to pass compiler flags
etc. to configure scripts and Makefiles. Currently supported variables
are: CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, LD, LDFLAGS, LIBS,
MAKE, MFLAGS. The value you specify is subject to the
percent expansion described in the last section. A common example:</p>
<pre>SetCPPFLAGS: -traditional-cpp</pre>
<p>The variables CPPFLAGS and LDFLAGS are special. They default to
<tt><nobr>-I%p/include</nobr></tt> and <tt><nobr>-L%p/lib</nobr></tt>,
respectively. If you specify a value for one of these, it will be
appended to the default value.</p></td></tr><tr valign="top"><td>NoSet<i>ENVVAR</i></td><td>When set to a true value, deactivates the default values for
CPPFLAGS and LDFLAGS mentioned above. That is, if you want LDFLAGS to
remain unset, specify <tt><nobr>NoSetLDFLAGS: true</nobr></tt> .</td></tr><tr valign="top"><td>Description</td><td>A short description of the package (what is it?). This is a
one-line description that will be displayed in lists, so it must be
short and informative.  Keep it to around 30 to 50 chars. It is not
necessary to repeat the package name in this field - it will always
be displayed in proper context.</td></tr><tr valign="top"><td>DescDetail</td><td>A more detailed description (what is it, what can I use it for?).
Multiple lines allowed.</td></tr><tr valign="top"><td>DescUsage</td><td>This is for information that is needed to use the package (how do
I use it?). As in "run wmaker.inst once before using WindowMaker".
Multiple lines allowed.</td></tr><tr valign="top"><td>DescPackaging</td><td>Notes about the packaging. Stuff like "patches the Makefile to put
everything in place" goes here. Multiple lines allowed.</td></tr><tr valign="top"><td>DescPort</td><td>Notes that are specific to porting the package to Darwin. Stuff
like "config.guess and libtool scripts are updated, -traditional-cpp
is necessary" goes here. Multiple lines allowed.</td></tr><tr valign="top"><td>Homepage</td><td>The URL of the upstream home page of the package.</td></tr><tr valign="top"><td>Comment</td><td><b>Obsolete.</b> Was: General comments on the package.</td></tr><tr valign="top"><td>CommentPort</td><td><b>Obsolete.</b> Was: Comments on the package that are specific to the
Darwin port. Describe what special parameters or patches are
necessary, what doesn't work (yet), etc.</td></tr><tr valign="top"><td>CommentStow</td><td><b>Obsolete.</b> Was: Comments on the package that apply to using it
with stow. Describe special treatment necessary and potential
problems.</td></tr><tr valign="top"><td>UsesGettext</td><td><b>Obsolete.</b> gettext is now an essential package and
always available. If the package makes more than casual use of
gettext, you may want to declare a dependency nonetheless.</td></tr></table>
<h2>Scripts</h2>

<p>The PatchScript, CompileScript and InstallScript fields allow you
to specify shell commands to be executed. This is sort of like a shell
script. However, the commands are executed via system(), one by one,
so you can't use constructs that span multiple lines. It also means
the <tt><nobr>cd</nobr></tt> commands only affect commands that are on the same
line. This may be fixed one day in the future.</p>
<h2>Patches</h2>

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
