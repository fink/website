<?
$title = "Making Fink Packages";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/02/18 16:43:57 $';

include "header.inc";
?>


<h1>Making Fink Packages</h1>

<p>This page tries to document the format of Fink's package
description files. This is difficult because the format is still
evolving. Watch the "Last changed" info in the footer of the
page. What you're reading right now is a description of the format
used in Fink 0.1.5.</p>
<p>If you create packages for Fink, I'd like to know about it, so I
can include them in future releases. Also, if you have questions or
problems, just mail me at <a
href="mailto:fink@chrisp.de">fink@chrisp.de</a>.</p>

<h2>General Notes</h2>

<p>Packages are identified by a package name; it may consist of
lowercase letters, numbers, dashes and underscores. (In theory, Fink
will let you use any ASCII character, but it's strongly discouraged.)
There may be several versions of a package. Version numbers consists
of a upstream version (commonly just called "version") and a packaging
revision. As for allowed characters, the same rules as for package
names apply. Only one version of a package can be installed at any
time. (Fink currently doesn't enforce this, but it usually won't work
because of conflicts. Stow catches that for us...) The full name of a
package is
<tt>&lt;package-name&gt;-&lt;upstream-version&gt;-&lt;revision&gt;</tt>,
e.g. <tt>stow-1.3.2-1</tt>.</p>
<p>Package descriptions are read from files in the info subdirectory,
i.e. /sw/fink/info if you installed Fink in /sw. Each file describes
one revision of a package. The name of the file should be the full
package name. At startup, Fink reads all files in the directory and
builds its internal data structures from that. It will skip files that
start with a dot (.) or a hash (#) and files that end with a tilde (~)
or a hash (#). This is to keep out backup or temporary files from text
editors.</p>
<p>The description files are simple lists of key-value pairs. The
format is that of a RFC 822 header - each line starts with a key,
terminated by a colon (:) and followed by the value. Values may be
broken accross several lines by starting the next line with
whitespace. In Fink, empty lines and lines starting with a hash (#)
are ignored. If that description confused you, just look at the
files.</p>
<p>Keys (field names) are case-insensitive in Fink. Some fields take
a boolean value - any of "true", "yes", "on", "1" (case-insensitive)
are treated as true, all other strings are treated as false. For all
fields except Package, it is not an error to obmit them; they all have
default values. In fact, the policy is to include only neccessary
fields.</p>

<h2>The Build Process</h2>

<p>To understand some of the fields, you need some knowledge of the
build process Fink uses. It consists of four phases: unpack, patch,
compile and install.</p>
<p>...more to be written...</p>

<h2>Percent Expansions</h2>

<p>To make life easier, Fink supports a set of expansions that are
performed on some fields. The available expansions are:
<dl>
<dt>%n</dt><dd>the package <b>n</b>ame</dd>
<dt>%v</dt><dd>the package <b>v</b>ersion</dd>
<dt>%r</dt><dd>the package <b>r</b>evision</dd>
<dt>%f</dt><dd>the <b>f</b>ull package name, i.e. %n-%v-%r</dd>
<dt>%p</dt><dd>the <b>p</b>refix where Fink is installed, e.g. /sw</dd>
<dt>%i</dt><dd>the stow directory where the package files will be
<b>i</b>nstalled, e.g. /sw/stow/gettext-0.10.35-1</dd>
<dt>%a</dt><dd>the path where the p<b>a</b>tches are, e.g. /sw/fink/patch</dd>
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
<br>Before the URL is used, persent expansion takes place (see
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
to the current directory, use this parameter.</td></tr>

<tr valign="top"><td>Depends</td>
<td>A comma-separated list of packages which must be installed before
this package can be built. Currently, only plain package names are
allowed; there is no mechanism to request a specific version of a
package yet.</td></tr>

<tr valign="top"><td>Essential</td>
<td>A boolean value that denotes essential packages. This field is not
used right now. In the future, essential packages will be installed as
part of the bootstrap process (i.e. when Fink is installed and
configured) and all non-essential packages will implicitly depend on
the essentials.</td></tr>

<tr valign="top"><td>UsesGettext</td>
<td>Since version 0.1.3, equivalent to a dependency on
gettext. In earlier versions, this adds a
<nobr>"--with-included-gettext"</nobr> to the configure
parameters.</td></tr>

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
appropriate path will be prepended automatically. Percend expansion is
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
<pre>  ./configure %c
  make</pre>
This is appropriate for packages that use GNU autoconf. Before the
commands are executed, percent expansion takes place (see last
section).</td></tr>

<tr valign="top"><td>InstallScript</td>
<td>A list of commands that are run in the install phase. See the note
on scripts below. This is the place to put commands that copy all
neccessary files to the stow directory for the package. The default is:
<pre>  rm -rf %i
  mkdir -p %i
  make install prefix=%i</pre>
The default is appropriate for packages that use GNU autoconf. If you
specify a value, the rm and mkdir commands will be prepended to
it. Before the commands are executed, percent expansion takes place
(see last section).</td></tr>

<tr valign="top"><td>Set<i>ENVVAR</i></td>
<td>Causes certain environment variables to be set in the
compile and install phases. This can be used to pass compiler flags
etc. to configure scripts and Makefiles. Currently supported variables
are: CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, LD, LDFLAGS, LIBS,
MAKE, MFLAGS. The value you specify is subject to the
percent expansion described in the last section. A common example:
<pre>  SetCPPFLAGS: -traditional-cpp</pre>
The variables CPPFLAGS and LDFLAGS are special. They default to
<nobr>"-I%p/include"</nobr> and <nobr>"-L%p/lib"</nobr>,
respecively. If you specify a value for one of these, it will be
appended to the default value.</td></tr>

<tr valign="top"><td>Comment</td>
<td>General comments on the package.</td></tr>

<tr valign="top"><td>CommentPort</td>
<td>Comments on the package that are specific to the Darwin
port. Describe what special parameters or patches are neccessary, what
doesn't work (yet), etc.</td></tr>

<tr valign="top"><td>CommentStow</td>
<td>Comments on the package that apply to using it with stow. Describe
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
so you can't use constructs that span multiple lines. This may be
fixed one day in the future.</p>

<h2>Patches</h2>

<p>If your package needs a patch to compile on Darwin (or to work with
stow), name the patch with the full package name plus the extension
".patch" and put it in the directory /sw/fink/patch (assuming Fink is
installed in /sw). Specify either one of these (they are equivalent):
<pre>  Patch: %f.patch</pre>
<pre>  PatchScript: patch -p1 <%a/%f.patch</pre>
These two fields are not mutually-exclusive - you can use both, and
they will both be executed. In that case the PatchScript is executed
last.</p>


<?
include "footer.inc";
?>
