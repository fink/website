<?
$title = "Making Fink Packages";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/12 18:22:57 $';

include "header.inc";
?>


<h1>Making Fink Packages</h1>

<p>This page tries to document the format of Fink's package
description files. This is difficult because the format is still
evolving. Watch the "Last changed" info in the footer of the
page. What you're reading right now is a description of the format
used in Fink 0.2.1. The document for Fink 0.1.x has been <a
href="info-format-01.php">archived.</a></p>
<p>If you create packages for Fink, you may want to subscribe to the
<a
href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a>
mailing list.</p>

<h2>General Notes</h2>

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
<tt>&lt;package-name&gt;-&lt;upstream-version&gt;-&lt;revision&gt;</tt>,
e.g. <tt>gimp-1.2.1-1</tt>.</p>
<p>Package descriptions are read from the finkinfo directories below
the /sw/fink/dists directory. The "Trees" setting in /sw/etc/fink.conf
controls which directories are read. The name of package descriptions
must be the full package name plus the extension ".info".</p>
<p>The description files are simple lists of key-value pairs. The
format is based on the popular RFC 822 header format. Each line starts
with a key, terminated by a colon (:) and followed by the
value. Values may be broken accross several lines by starting the next
line with whitespace. In Fink, empty lines and lines starting with a
hash (#) are ignored. If that description confused you, just look at
the files.</p>
<p>Keys (field names) are case-insensitive in Fink. Some fields take
a boolean value - any of "true", "yes", "on", "1" (case-insensitive)
are treated as true, all other strings are treated as false. For all
fields except Package, it is not an error to obmit them; they all have
default values. In fact, the policy is to include only neccessary
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
compiled. Usually this means calling the <tt>configure</tt> script
with some parameters and then issuing a <tt>make</tt> command. See the
ConfigureScript field description for details.</p>
<p>In the <b>install phase</b> the package is installed to a temporary
directory, /sw/src/root-gimp-1.2.1-1 (= %d). (Note the "root-" part.)
All files that would normally be installed to /sw are installed in
/sw/src/root-gimp-1.2.1-1/sw (= %i = %d%p) instead. See the
InstallScript field description for details.</p>
<p>In the <b>build phase</b> a binary package file (.deb) is built
from the temporary directory. You can't influence this step directly,
but various information from the package description is used to
generate a <tt>control</tt> file for dpkg.</p>

<h2>Percent Expansions</h2>

<p>To make life easier, Fink supports a set of expansions that are
performed on some fields. The available expansions are:
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
<nobr>"--prefix=%p"</nobr> plus anything specified with
ConfigureParams</dd>
</dl>
</p>

<h2>Fields</h2>

<table border="0" cellpadding="0" cellspacing="10">
<tr valign="bottom"><th>Field</th><th>Value</th></tr>

<tr valign="top"><td>Package</td>
<td>The package name. Required.</td></tr>

<tr valign="top"><td>Version</td>
<td>The upstream version number. Required, but defaults to "0".</td></tr>

<tr valign="top"><td>Revision</td>
<td>The package revision. Increase this when you make a new
description for the same upstream version. Revision numbers should
start at 1. Required, but defaults to "0".</td></tr>

<tr valign="top"><td>Source</td>
<td>An URL to the source tarball. It should be a HTTP or FTP url, but
Fink doesn't really care - it just passes the URL to wget. This field
supports a special URL scheme for mirrors:
<tt>mirror:&lt;mirror-name&gt;:&lt;relative-path&gt;</tt>. This will
look up the mirror setting for <i>mirror-name</i> in Fink's
configuration, append the <i>relative-path</i> part and use that as
the actual URL.
<br>Before the URL is used, percent expansion takes place (see
previous section). The value "gnu" is a shorthand for
<nobr>"mirror:gnu:%n/%n-%v.tar.gz"</nobr>; "gnome" is a shorthand for
<nobr>"mirror:gnome:stable/sources/%n/%n-%v.tar.gz"</nobr>. The
default is <nobr>"%n-%v.tar.gz"</nobr> (i.e. a manual
download).</td></tr>

<tr valign="top"><td>SourceDirectory</td>
<td>Must be used when the tarball expands to a single directory, but
the direcory's name is different from the basename of the tarball.
Usually, a tarball named "foo-1.0.tar.gz" will produce a directory
named "foo-1.0". If it produces a directory with a different name,
specify it with this parameter.</td></tr>

<tr valign="top"><td>NoSourceDirectory</td>
<td>Set this boolean parameter to a true value if the tarball does not
expand to a single directory. Usually, a tarball named "foo-1.0.tar.gz"
will produce a directory named "foo-1.0". If it just unpacks the files
to the current directory, use this parameter and set it to a boolean
true value.</td></tr>

<tr valign="top"><td>Source<i>N</i></td>
<td>If a package consists of several tarballs, name them with these
additional fields, starting with N = 2. So, the first tarball (which
should be some kind of "main" tarball) goes into <tt>Source</tt>, the
second tarball in <tt>Source2</tt> and so on. The rules are the same
as for Source, only that the "gnu" and "gnome" shortcuts are not
expanded - that would be useless anyway.</td></tr>

<tr valign="top"><td>Source<i>N</i>ExtractDir</td>
<td>Normally, an auxilary tarball will be extracted in the same
directory as the main tarball. If you need to extract it in a
specific subdirectory instead, use this field to specify
it. Source2ExtractDir corresponds to the Source2 tarball, as one would
expect. See ghostscript, vim and tetex for examples of
usage.</td></tr>

<tr valign="top"><td>Depends</td>
<td>A comma-separated list of packages which must be installed before
this package can be built. Currently, only plain package names are
allowed; there is no mechanism to request a specific version of a
package yet.</td></tr>

<tr valign="top"><td>Essential</td>
<td>A boolean value that denotes essential packages. Essential
packages are installed as part of the bootstrap process. All
non-essential packages implicitly depend on the essential ones. dpkg
will refuse to remove essential packages from the system unless
special flags are used to override this.</td></tr>

<tr valign="top"><td>UpdateConfigGuess</td>
<td>A boolean value. If true, the files config.guess and config.sub
in the build directory will be replaced with versions that know about
Darwin. This happens in the patch phase and before the PatchScript
is run.</td></tr>

<tr valign="top"><td>UpdateLibtool</td>
<td>A boolean value. If true, the files ltconfig and ltmain.sh in the
build directory will be replaced with versions that know about
Darwin. This happens in the patch phase and before the PatchScript
is run.</td></tr>

<tr valign="top"><td>Patch</td>
<td>The filename of a patch to be applied with <nobr>"patch -p1
&lt;<i>patch-file</i>"</nobr>. This should be just a filename; the
appropriate path will be prepended automatically. Percent expansion is
performed on this field, so a typical value is simply
<nobr>"%f.patch"</nobr>. The patch is applied before the PatchScript
is run (if any).</td></tr>

<tr valign="top"><td>PatchScript</td>
<td>A list of commands that are run in the patch phase. See the note
on scripts below. This is the place to put commands that patch or
otherwise modify the package. There is no default. Before the
commands are executed, percent expansion takes place (see last
section).</td></tr>

<tr valign="top"><td>ConfigureParams</td>
<td>Additional parameters to pass to the configure script. (See
CompileScript for details.)</td></tr>

<tr valign="top"><td>CompileScript</td>
<td>A list of commands that are run in the compile phase. See the note
on scripts below. This is the place to put commands that configure and
compile the package. The default is:
<pre>./configure %c
make</pre>
This is appropriate for packages that use GNU autoconf. Before the
commands are executed, percent expansion takes place (see previous
section).</td></tr>

<tr valign="top"><td>InstallScript</td>
<td>A list of commands that are run in the install phase. See the note
on scripts below. This is the place to put commands that copy all
neccessary files to the stow directory for the package. The default is:
<pre>make install prefix=%i</pre>
The default is appropriate for packages that use GNU autoconf. If the
package supports it, it is preferably to use <tt>make install
DESTDIR=%d</tt> instead. Before the commands are executed, percent
expansion takes place (see previous section).</td></tr>

<tr valign="top"><td>Set<i>ENVVAR</i></td>
<td>Causes certain environment variables to be set in the
compile and install phases. This can be used to pass compiler flags
etc. to configure scripts and Makefiles. Currently supported variables
are: CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, LD, LDFLAGS, LIBS,
MAKE, MFLAGS. The value you specify is subject to the
percent expansion described in the last section. A common example:
<pre>SetCPPFLAGS: -traditional-cpp</pre>
The variables CPPFLAGS and LDFLAGS are special. They default to
<nobr>"-I%p/include"</nobr> and <nobr>"-L%p/lib"</nobr>,
respecively. If you specify a value for one of these, it will be
appended to the default value.</td></tr>

<tr valign="top"><td>NoSet<i>ENVVAR</i></td>
<td>When set to a true value, deactivates the default values for
CPPFLAGS and LDFLAGS mentioned above. That is, if you want LDFLAGS to
remain unset, specify <nobr><tt>NoSetLDFLAGS: true</tt></nobr> .</td></tr>

<tr valign="top"><td>Comment</td>
<td><i>This field will soon be obsolete; new text fields will be
introduced. Stay tuned.</i><br>
General comments on the package.</td></tr>

<tr valign="top"><td>CommentPort</td>
<td><i>This field will soon be obsolete; new text fields will be
introduced. Stay tuned.</i><br>
Comments on the package that are specific to the Darwin
port. Describe what special parameters or patches are neccessary, what
doesn't work (yet), etc.</td></tr>

<tr valign="top"><td>CommentStow</td>
<td><i>This field is obsolete with Fink 0.2.</i><br>
Comments on the package that apply to using it with stow. Describe
special treatment neccessary and potential problems.</td></tr>

<!--

<tr valign="top"><td>FIELD</td>
<td>DESC</td></tr>
-->

</table>

<h2>Scripts</h2>

<p>The PatchScript, CompileScript and InstallScript fields allow you
to specify shell commands to be executed. This is sort of like a shell
script. However, the commands are executed via system(), one by one,
so you can't use constructs that span multiple lines. It also means
the <tt>cd</tt> commands only affect commands that are on the same
line. This may be fixed one day in the future.</p>

<h2>Patches</h2>

<p>If your package needs a patch to compile on Darwin (or to work with
stow), name the patch with the full package name plus the extension
".patch" and put it in the same directory as the .info file. Specify
either one of these (they are equivalent):
<pre>Patch: %f.patch</pre>
<pre>PatchScript: patch -p1 &lt;%a/%f.patch</pre>
These two fields are not mutually-exclusive - you can use both, and
they will both be executed. In that case the PatchScript is executed
last.</p>


<?
include "footer.inc";
?>
