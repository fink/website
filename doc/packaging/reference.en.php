<?
$title = "Packaging - Reference";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2005/01/31 16:20:27';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Packaging Contents"><link rel="prev" href="fslayout.php?phpLang=en" title="Filesystem Layout">';


include_once "header.en.inc";
?>
<h1>Packaging - 5. Reference</h1>




<h2><a name="build">5.1 The Build Process</a></h2>

<p>To understand some of the fields, you need some knowledge of the
build process Fink uses. It consists of five phases: unpack, patch,
compile, install and build. The example paths below are for an
installation in <code>/sw</code> and the package gimp-1.2.1-1.</p>
<p>In the <b>unpack phase</b> the directory <code>/sw/src/gimp-1.2.1-1</code> is created
and the source tarball(s) are unpacked there. In most cases, this will
create a directory gimp-1.2.1 with the source in it; all following
steps will be executed in that directory
(i.e. <code>/sw/src/gimp-1.2.1-1/gimp-1.2.1</code>). Details can be controlled with
the SourceDirectory, NoSourceDirectory and Source<b>N</b>ExtractDir
fields.</p>
<p>In the <b>patch phase</b> the source is patched so that it will
build on Darwin. The actions specified by the UpdateConfigGuess,
UpdateLibtool, Patch and PatchScript fields will be executed, in that
order.</p>
<p>In the <b>compile phase</b> the source is configured and
compiled. Usually this means calling the <code>configure</code> script
with some parameters and then issuing a <code>make</code> command. See the
CompileScript field description for details.</p>
<p>In the <b>install phase</b> the package is installed to a temporary
directory, <code>/sw/src/root-gimp-1.2.1-1</code> (= %d). (Note the "root-" part.)
All files that would normally be installed to <code>/sw</code> are installed in
<code>/sw/src/root-gimp-1.2.1-1/sw</code> (= %i = %d%p) instead. See the
InstallScript field description for details.</p>
<p>(<b>Introduced in fink 0.9.9.</b> It is possible to generate several
packages from a single package description using the <code>SplitOff</code>
field.  Towards the end of the install phase, separate install directories
are created for each package being created, and files are moved to
the appropriate directory.)</p>
<p>In the <b>build phase</b> a binary package file (.deb) is built
from the temporary directory. You can't influence this step directly,
but various information from the package description is used to
generate a <code>control</code> file for dpkg.</p>


<h2><a name="fields">5.2 Fields</a></h2>

<p>We have divided the list of fields into several categories.
The list of fields is not necessarily complete. <code>:-)</code></p>
<p><b>Initial Data:</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Package</td><td>
<p>
The package name.
May contain lowercase letters, numbers and the special characters '.',
'+' and '-'.
No underscores ('_'), no capital letters.
Required field.
</p>
<p>Percent expansion is applied to this field for %N, %{Ni}, %type_raw[],
and %type_pkg[] only.</p>
<p>
As per Fink packaging policy, a given package must always
compile with the same options enabled. If you have multiple variants
for a package (see documentation for the <code>Type</code> field), you
must encode the specific variant info into the <code>Package</code>
field (see documentation for the %type_pkg[] percent expansion). That
way each variant has a unique name the package name indicates which
variant option(s) are included. Note that use of the %type_pkg[] and
%type_raw[] percent expansions in the <code>Package</code> field is
new and severely incompatible with older versions of fink, so such
package descriptions must be embedded in a <code>InfoN</code> field
with N&gt;=2.
</p>
</td></tr><tr valign="top"><td>Version</td><td>
<p>
The upstream version number.
Same limitations as the Package field.
Required field.
</p>
<p>
  Note that some programs use nonstandard version numbering schemes
  that may cause sorting confusion or that contain characters that are
  not allowed in this field. In these situations, when writing the
  Fink package, you must convert the upstream value to one that is
  acceptable and that allows the versions to be arranged in the
  correct order. When in doubt about how version strings will be
  sorted, you can use the <code>dpkg</code> command at a shell
  prompt. For example,
</p>
<pre>
  dpkg --compare-versions 1.2.1 lt 1.3 &amp;&amp; echo "true"
</pre>
<p>
  will print "true" because version string "1.2.1"
  is less than "1.3". See the <code>dpkg</code> manpage for
  more details.
</p>
</td></tr><tr valign="top"><td>Revision</td><td>
<p>
The package revision.
Increase this when you make a new description for the same upstream
version.
Revision numbers start at 1.
Required field.
</p>
<p>
  Fink's policy is that <b>any</b> time you make a change to the
  <code>.info</code> file that results in changes to the
  binary (compiled) form of a package (the <code>.deb</code>
  file), you <b>must</b> increase <code>Revision</code>. This
  includes changing the <code>Depends</code> or other package lists,
  and adding,
  removing, or renaming splitoff packages or shifting files among
  them. When migrating a package to a new tree (from 10.2 to 10.3, for
  example) involves such changes, you should
  increase <code>Revision</code> by 10 in the newer tree in order to
  leave space for future updates to the package in the older
  tree.
</p>
</td></tr><tr valign="top"><td>Epoch</td><td>
<p>
<b>Introduced in fink 0.12.0.</b>
This optional field can be used to specify the epoch of the package
(which defaults to 0 if not specified). For more information refer to
the <a href="http://www.debian.org/doc/debian-policy/ch-controlfields.html#s-f-Version">Debian
Policy Manual</a>.
</p>
</td></tr><tr valign="top"><td>Description</td><td>
<p>
A short description of the package (what is it?). This is a one-line
description that will be displayed in lists, so it must be short and
informative. It should be less than 45 chars and must be less than
60. It is not necessary to repeat the package name in this field - it
will always be displayed in proper context. Required field.
</p>
</td></tr><tr valign="top"><td>Type</td><td>
<p>
This can be set to <code>bundle</code>.
Bundle packages are used to group a set of related packages together.
They only have dependencies, but no code and no installed files.
The fields Source, PatchScript, CompileScript, InstallScript and
related ones are ignored for bundle packages.
</p>
<p>
<code>nosource</code> is a very similar type.
It indicates that there is no source tarball, so nothing is fetched
and the unpack phase creates just an empty directory.
However, the patch, compile and install phases are executed normally.
This way you can bring in all the code with a patch, or just create
some directories in the InstallScript.
Since fink 0.18.0, you can get the same behavior by setting
<code>Source: none</code>. This allows you to use "Type" for other
purposes (<code>Type: perl</code>, etc.)
</p>
<p>
Since fink 0.9.5 there is type <code>perl</code> which causes
alternate default values for the compile and install scripts to be used. 
Beginning in fink 0.13.0, there is a new variant of this type,
<code>perl $version</code>, where $version is a specific version of perl 
consisting of three numbers separated by periods, e.g., 
<code>perl 5.6.0</code>.
</p>
<p>
Beginning in a CVS version of fink after fink-0.19.2, the language/language-version use has
been generalized to allow any Maintainer-defined types and associated
subtypes and more than a single type for a given package. The type and
subtype are each arbitrary strings of non-whitespace characters (but
parentheses, commas, braces, and percent signs should not be used); no
percent-expansion is performed, and the type (not subtype) values
are converted to all-lowercase.  Multiple type values (each with an
optional whitespace-separated subtype) are specified in a
comma-separated list.
</p>
<p>
In addition, the concept of "variants" exists, where a
single .info file describes a family of related packages with various
options enabled. The key to this whole process is the use of a list of
subtypes. Instead of a single string, one uses a space-separated list
of strings in parentheses. Fink clones the package description file
for each subtype in the list and replaces this list with that single
subtype. For example:
</p>
<pre>Type: perl (5.6.0 5.8.1)</pre>
<p>
yields two package descriptions, one that behaves as if <code>Type:
perl 5.6.0</code> and the other <code>Type: perl 5.8.1</code>. The special
subtype list "(boolean)" stands for a list containing the
type itself and a period, so the following two forms are identical:
</p>
<pre>
Type: -x11 (boolean)
Type: -x11 (-x11 .)
</pre>
<p>
Subtype list expansion/package cloning is recursive; if there are
multiple types with subtype lists, you will get all combinations:
</p>
<pre>Type: -ssl (boolean), perl (5.6.0 5.8.1)</pre>
<p>
One can access the specific variant subtype in other fields using the
%type_raw[] and %type_pkg[] pseudo-hashes. Here are two example .info
fragments:
</p>
<pre>
Info2: &lt;&lt;
Package: foo-pm%type_pkg[perl]
Type: perl (5.6.0 5.8.1)
Depends: perl%type_pkg[perl]-core
 &lt;&lt;
</pre>
<pre>
Info2: &lt;&lt;
Package: bar%type_pkg[-x11]
Type: -x11 (boolean)
Depends: (%type_raw[-x11] = -x11) x11
CompileScript:  &lt;&lt;
  #!/bin/bash -ev
  if [ "%type_raw[-x11]" == "-x11" ]; then
    ./configure %c --with-x11
  else
    ./configure %c --without-x11
  fi
  make
&lt;&lt;
&lt;&lt;
</pre>
</td></tr><tr valign="top"><td>License</td><td>
<p>
This field gives the nature of the license under which the package is
distributed.
The value must be one of the values described in <a href="policy.php?phpLang=en#licenses">Package Licenses</a> earlier in
this document.
Additionally, this field must only be given if the package actually
complies to the packaging policy in these respects, i.e. a copy of the
license is installed in the doc directory for the package.
</p>
</td></tr><tr valign="top"><td>Maintainer</td><td>
<p>
The name and e-mail address of the person responsible for the package.
This field is required, and there must be exactly one name and address
in the following format:
</p>
<pre>Firstname Lastname &lt;user@host.domain.com&gt;</pre>
</td></tr><tr valign="top"><td>InfoN</td><td>
<p>
This field allows fink to implement backward-incompatible syntax
changes in package description files. A given version of fink is
configured with the maximum integer "N" that it can handle. Any
package in a higher InfoN field will be ignored, so this mechanism
should only be used when necessary, lest people with older versions of
fink be needlessly alienated. The documentation of other fields will
note when a specific InfoN must be used. To use this mechanism, embed
the entire package description in the desired InfoN field. See the
"File Format" section earlier in this document for a description of
the syntax for multiline fields.
</p>
</td></tr></table>
<p><b>Dependencies:</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Depends</td><td>
<p>
A list of packages which must be installed before this package can be
built. Percent expansion is performed on this field (as well as the
other package list fields in this section: BuildDepends, Provides,
Conflicts, Replaces, Recommends, Suggests, and Enhances.
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
</p><p>
Order of operations: logical "OR" (list of alternatives) has
a higher precedence (binds more tightly) than the logical
"AND" between each package (or set of alternatives) in the
comma-separated list. Unlike the use of parentheses in arithmetic,
there is no way to specify alternative groups of packages or otherwise
change the order of operations in <code>Depends</code> and related
fields.
</p><p>
Starting with a post-0.18.2 CVS version of fink, you can have
conditional dependencies. These are specified by placing
<code>(string1 op string2)</code> before a package name. Percent
expansion is performed as usual and then the two strings
(neither of which can be null) are compared
according to the <code>op</code> operator: &lt;&lt;, &lt;=, =, !=,
&gt;&gt;, &gt;=. The immediately-following package is only considered
as a dependency if the comparison is true.
</p><p>
You can use this format to simplify maintaining several similar
packages. For example, the packages elinks and elinks-ssl could both list:
</p>
<pre>Depends: (%n = elinks-ssl) openssl097-shlibs, expat-shlibs</pre>
<p>
would have the same effect as having elinks list:
</p>
<pre>Depends: expat-shlibs</pre>
<p>
and elinks-ssl list:
</p>
<pre>Depends: openssl097-shlibs, expat-shlibs</pre>
<p>
As an alternative syntax, you can also specify <code>(string)</code>,
which is "true" if <code>string</code> is non-null. For example:
</p>
<pre>
Package: nethack%type_pkg[-x11]
Type: -x11 (boolean)
Depends: (%type_pkg[-x11]) x11
</pre>
<p>
would set the package x11 as a dependency for the nethack-x11 variant
but not for the nethack variant.
</p>
<p>
  Note that when using Depends/BuildDepends for shared library packages
  for which more than one major-version is available, you must
  <b>not</b> do the following:
</p>
<pre>
  Package: foo
  Depends: id3lib3.7-shlibs | id3lib3.7-shlibs
  BuildDepends: id3lib3.7-dev | id3lib4-dev
</pre>
<p>
  even if your package could work with either library. Pick one
  (preferably the highest version that can be used successfully) and
  use it consistently in your package.
</p>
<p>
  As explained in the <a href="policy.php?phpLang=en#sharedlibs">Shared Library Policy</a>, only one of the
  -dev packages can be installed at a time, and each has links of the
  same name that could point to different filenames in the associated
  -shlibs package. When compiling package foo, the actual filename (in
  the -shlibs package) gets hard-coded into the foo binary. That means
  the resulting package needs the specific -shlibs package associated
  with the -dev that was installed at compile-time. As a result, one
  cannot have a <code>Depends</code> that indicates that either one
  will suffice.
</p>
</td></tr><tr valign="top"><td>BuildDepends</td><td>
<p>
<b>Introduced in fink 0.9.0.</b>
A list of dependencies that is applied at build time only.
This can be used to list tools (e.g. flex) that must be present to
build the packages, but which are not used at run time.
Supports the same syntax as Depends.
</p>
</td></tr><tr valign="top"><td>Provides</td><td>
<p>
A comma-separated list of package names that this package is
considered to "provide".
If a package named "pine" specifies <code>Provides: mailer</code>,
then any dependency on "mailer" is considered satisfied when "pine" is
installed.
You'll usually also want to name these packages in the "Conflicts" and
the "Replaces" field.
</p>
<p>
Note that there is no versioning data associated with Provides
items. They do not inherit from the parent package that contains the
Provides list nor is there a syntax for specifing an arbitrary version
in the Provides field itself. Further, a dependency that contains a
version specification is not satisfied by a package that Provides that
needed package name. As a result, having many variants all Provides a
single surrogate package name may not be very useful in many cases.
</p>
</td></tr><tr valign="top"><td>Conflicts</td><td>
<p>
A comma-separated list of package names that must not be installed at
the same time as this package.
For virtual packages it is allowed to list the names of the provided
packages here; they will be handled appropriately.
This fields also supports versioned dependencies like the Depends
field, but not alternatives (wouldn't make sense).
If a package is listed in its own Conflicts, it will be (silently)
removed from that list. (Introduced in a post-0.18.2 CVS version of
fink.)
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
If a package is listed in its own Replaces, it will be (silently)
removed from that list. (Introduced in a post-0.18.2 CVS version of
fink.)
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
<code>dpkg</code> or <code>apt-get</code>.
However, they are used by <code>dselect</code> and other frontends to
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
</td></tr><tr valign="top"><td>BuildDependsOnly</td><td>
<p>
<b>Introduced in fink 0.9.9.</b>
A boolean value which indicates that no other packages should Depend on
this one, they should only BuildDepend.
Unlike usual boolean fields, <code>BuildDependsOnly</code> is
tri-state: leaving it undefined (not specifying it at all) is
different than defining it as logically false. See the <a href="policy.php?phpLang=en#sharedlibs">Shared Library Policy</a> for
more information.
</p>
<p>As of fink 0.20.5, the presence or absence of this field, and its value
if present, are recorded into the .deb
file when the package is built.  Therefore, <b>if you change the value of
BuildDependsOnly or if you add or remove it,
you must increase the revision number</b> of the package.
</p>
</td></tr></table>
<p><b>Unpack Phase:</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>CustomMirror</td><td>
<p>
A list of mirror sites. Each mirror site appears on a separate line,
in the following format: <code>&lt;location&gt;: &lt;url&gt;</code>.
<b>location</b> can be a continent code (e.g. <code>nam</code>), a
country code (e.g. <code>nam-us</code>), or anything else;
mirrors are tried in that order.
Example:
</p>
<pre>CustomMirror: &lt;&lt;
nam-US: ftp://ftp.fooquux.com/pub/bar
asi-JP: ftp://ftp.qiixbar.jp/pub/mirror/bar
eur-DE: ftp://ftp.barfoo.de/bar
Primary: ftp://ftp.barbarorg/pub/
&lt;&lt;</pre>
<p>
  The standard continent and country codes are listed in
  <code>/sw/lib/fink/mirror/_keys</code>, which is part of the
  fink or fink-mirrors package.
</p>
</td></tr><tr valign="top"><td>Source</td><td>
<p>
An URL to the source tarball. It should be a HTTP or FTP URL, but
Fink doesn't really care - it just passes the URL to wget. This field
supports a special URL scheme for mirrors:
<code>mirror:&lt;mirror-name&gt;:&lt;relative-path&gt;</code>. This will
look up the mirror setting for <b>mirror-name</b> in Fink's
configuration, append the <b>relative-path</b> part and use that as
the actual URL. The known <b>mirror-name</b>s are listed in
<code>/sw/lib/fink/mirror/_list</code>, which is part of the fink or fink-mirrors
package. Alternatively, using <code>custom</code> as the
<b>mirror-name</b> will cause Fink to use the <code>CustomMirror</code>
field.
Before the URL is used, percent expansion takes place. Remember that
%n includes all %type_ variant data, so you may want to use %{ni} here
(perhaps with some specific %type_ expansions).
</p>
<p>
Since fink 0.18.0, <code>Source: none</code> has the special meaning
that there is no source to fetch. See the description of the
<code>Type</code> field for more information.
The value <code>gnu</code> is a shorthand for
<code>mirror:gnu:%n/%n-%v.tar.gz</code>; <code>gnome</code> is a shorthand for
<code>mirror:gnome:stable/sources/%n/%n-%v.tar.gz</code>. The
default is <code>%n-%v.tar.gz</code> (i.e. a manual
download).
This implicitly-defined <code>Source</code> form is deprecated
(explicitly-stated simple filename/manual download is still okay).
</p>
</td></tr><tr valign="top"><td>Source<b>N</b></td><td>
<p>
If a package consists of several tarballs, name them with these
additional fields, starting with N = 2. So, the first tarball (which
should be some kind of "main" tarball) goes into <code>Source</code>, the
second tarball in <code>Source2</code> and so on. The rules are the same
as for Source, only that the "gnu" and "gnome" shortcuts are not
expanded - that would be useless anyway. Starting with a CVS version
of fink after 0.19.2, you may use arbitrary (not necessarily
consecutive) integer values of N &gt;= 2. However, you still may not have
duplicates.
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
</td></tr><tr valign="top"><td>Source<b>N</b>ExtractDir</td><td>
<p>
Normally, an auxiliary tarball will be extracted in the same
directory as the main tarball. If you need to extract it in a
specific subdirectory instead, use this field to specify
it. Source2ExtractDir corresponds to the Source2 tarball, as one would
expect. See ghostscript, vim and tetex for examples of usage.
</p>
</td></tr><tr valign="top"><td>SourceRename</td><td>
<p>
This field can rename a source tarball on the fly. This is useful
if for example the version of the source is encoded in the directory name on
the server, but the tarball itself has the same name for all versions, e.g.
<code>http://www.foobar.org/coolapp/1.2.3/source.tar.gz</code>. To circumvent the problems
caused by this, you would then use something like
</p>
<pre>SourceRename: %n-%v.tar.gz</pre>
<p>
In the above example this would result in the tarball being stored under
<code>/sw/src/coolapp-1.2.3.tar.gz</code> as one would expect.
</p>
</td></tr><tr valign="top"><td>Source<b>N</b>Rename</td><td>
<p>
This is just the same as the <code>SourceRename</code> field, except that it
is used to rename the tarball specified by the corresponding <code>Source<b>N</b></code>
field. See context or hyperref for examples of usage.
</p>
</td></tr><tr valign="top"><td>Source-MD5</td><td>
<p>
<b>Introduced in fink 0.10.0.</b>
With this field you can specify the MD5 checksum of the source file. This
information is then used by Fink to detect incorrect source files, that is,
tarballs not matching the one the package creator used. Common causes for this
problem include: incompletely downloaded tarballs; upstream maintainers silently
replaced a tarball; a trojan or similar attacks; and so on.
</p>
<p>
A typical usage example looks like this:
</p>
<pre>Source-MD5: 4499443fa1d604243467afe64522abac</pre>
<p>
To compute the checksum, the <code>md5sum</code> tool is used. If you want to
determine the checksum of the tarball <code>/sw/src/apache_1.3.23.tar.gz</code>,
you run the following command (displayed with output here):
</p>
<pre>fingolfin% md5sum /sw/src/apache_1.3.23.tar.gz 
4499443fa1d604243467afe64522abac  /sw/src/apache_1.3.23.tar.gz</pre>
<p>
As you can see, the value to the left is exactly the value you need.
</p>
</td></tr><tr valign="top"><td>Source<b>N</b>-MD5</td><td>
<p>
<b>Introduced in fink 0.10.0.</b>
This is just the same as the <code>Source-MD5</code> field, except that it
is used to specify the MD5 checksum of the tarball specified by the
corresponding <code>Source<b>N</b></code> field.
</p>
</td></tr><tr valign="top"><td>TarFilesRename</td><td>
<p>
<b>Introduced in fink 0.10.0.</b>
This field only applies to source files that are using the tar format
</p>
<p>
With this field you can rename files in the given source tarball during
the extraction of the tarball. This is very useful to work around
the fact that the HFS+ file system is not case sensitive, as files like
<code>install</code> and <code>INSTALL</code> will
collide on a standard Mac OS X system. With this field you can avoid
these issues without having to repackage the tarball (as was done in
the past in such cases).
</p>
<p>
In this field you simply specify a list of files that are to be renamed. You
can make use of wildcards. By default any given file will be renamed to its
current name with <code>_tmp</code> appended. You can override this default
by using the same syntax as in the <code>Files</code> and <code>DocFiles</code>
fields, namely by writing the old filename followed by a : and then followed by
the new filename.
Example:
</p>
<pre>TarFilesRename: foo bar.* qux:quux
Tar2FilesRename: directory/INSTALL:directory/INSTALL.txt</pre>
</td></tr><tr valign="top"><td>Tar<b>N</b>FilesRename</td><td>
<p>
<b>Introduced in fink 0.10.0.</b>
This is just the same as the <code>TarFilesRename</code> field, except that it
is used for the tarball specified by the corresponding
<code>Source<b>N</b></code> field.
</p>
</td></tr></table>


<p><b>Patch Phase:</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>UpdateConfigGuess</td><td>
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
<b>Introduced in a post-0.9.0 CVS version.</b>
A list of subdirectories.
This does the same as UpdateConfigGuess, but is useful for packages
that have outdated config.guess files in several directories
throughout the source tree.
Previously you had to copy/move the files there manually in the
PatchScript.
With this new field you can just list the directories.
Use <code>.</code> to update files in the build directory itself.
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
<b>Introduced in a post-0.9.0 CVS version.</b>
A list of subdirectories.
This does the same as UpdateLibtool, but is useful for packages
that have outdated libtool 1.3.x scripts in several directories
throughout the source tree.
Previously you had to copy/move the files there manually in the
PatchScript.
With this new field you can just list the directories.
Use <code>.</code> to update files in the build directory itself.
</p>
</td></tr><tr valign="top"><td>UpdatePoMakefile</td><td>
<p>
A boolean value.
If true, the file <code>Makefile.in.in</code> in the
subdirectory <code>po</code> is replaced with a patched version.
This happens in the patch phase and before the PatchScript is run.
</p>
<p>
The patched version respects DESTDIR and makes sure that message
catalogs end up in <code>/sw/share/locale</code>, not
<code>/sw/lib/locale</code>.
Before using this field, make sure that you won't break the package
and that it's really required.
You can run <code>diff</code> to find the differences between the
package's version and Fink's version (in
<code>/sw/lib/fink/update</code>).
</p>
</td></tr><tr valign="top"><td>Patch</td><td>
<p>
The filename of a patch to be applied with <code>patch -p1
&lt;<b>patch-file</b></code>. This should be just a filename; the
appropriate path will be prepended automatically. Percent expansion is
performed on this field, so a typical value is simply
<code>%f.patch</code> or <code>%n.patch</code>. The patch is applied
before the PatchScript is run (if any).
</p>
<p>
Remember that %n includes all %type_ variant data, so you may want to
use %{ni} here (perhaps with some specific %type_ expansions). It's
easier to maintain a single patchfile and then make variant-specific
changes in <code>PatchScript</code> than to have a separate patchfile
for each variant.
</p>
</td></tr><tr valign="top"><td>PatchScript</td><td>
<p>
A list of commands that are run in the patch phase. See the note
on scripts below. This is the place to put commands that patch or
otherwise modify the package. There is no default. Before the
commands are executed, percent expansion takes place (see last
section).
</p>
</td></tr></table>
<p><b>Compile Phase:</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Set<b>ENVVAR</b></td><td>
<p>
Causes certain environment variables to be set in the
compile and install phases. This can be used to pass compiler flags
etc. to configure scripts and Makefiles. Currently supported variables
are: CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, LD, LDFLAGS, LIBS,
MAKE, MFLAGS, MAKEFLAGS. The value you specify is subject to the
percent expansion described in the last section. A common example:
</p>
<pre>SetCPPFLAGS: -no-cpp-precomp</pre>
<p>
The variables CPPFLAGS and LDFLAGS are special. They default to
<code>-I%p/include</code> and <code>-L%p/lib</code>,
respectively. If you specify a value for one of these, it will be
prepended to the default value.
</p>
</td></tr><tr valign="top"><td>NoSet<b>ENVVAR</b></td><td>
<p>
When set to a true value, deactivates the default values for
CPPFLAGS and LDFLAGS mentioned above. That is, if you want LDFLAGS to
remain unset, specify <code>NoSetLDFLAGS: true</code> .
</p>
</td></tr><tr valign="top"><td>ConfigureParams</td><td>
<p>
Additional parameters to pass to the configure script. (See
CompileScript for details.)

As of fink &gt; 0.13.7, this parameter will also work with perl modules
<code>Type: Perl</code>, and will append to the default perl Makefile.PL
string.
</p>
<p>
  Starting in fink-0.22.0, this field supports conditionals. The
  syntax is the same as that used in the <code>Depends</code> and
  other package-list fields. The conditional expression only applies
  to the whitespace-delimited "word" immediately following
  it. For example
</p>
<pre>
Type: -x11 (boolean)
ConfigureParams: --mandir=%p/share/man (%type_pkg[-x11]) --with-x11 --disable-shared
</pre>
<p>
  will always pass the <code>--mandir</code> and <code>--disable-shared</code> flags, but only pass <code>--with-x11</code> in the -x11 variant.
</p>
</td></tr><tr valign="top"><td>GCC</td><td>
<p>
This field specifies the GCC-ABI used by C++ code in this package.
(It is needed because that ABI has changed twice, and any libraries
which you link to containing C++ code must be compiled with the same ABI
you are currently using.)
</p><p>
The allowed values are:
<code>2.95.2</code> (or <code>2.95</code>),
 <code>3.1</code>,
and <code>3.3</code>.
This last is expected to be the GCC-ABI for gcc 3.3 and all subsequent
versions of gcc.
The default values for the various package trees are:
<code>2.95</code> in the 10.1 tree, <code>3.1</code> in the 10.2 tree,
and <code>3.3</code> in the 10.2-gcc3.3, 10.3, and all subsequent trees.
</p><p>
Note that when the GCC value is different from the default, the compiler
must be specified within the package (typically by setting the CC or CXX
flags), and a dependency on one of the (virtual) gcc packages should be
specified.
</p>
<p>As of fink 0.13.8, when this flag is present, the version of gcc
is tested using <code>gcc_select</code>, and fink exits with an error
if the wrong version is present.
</p>
<p>
This field was added to fink to aid maintainers
in tracking the transition between the gcc
compilers, which introduced a binary incompatibility between libraries
that involve C++ code which is not reflected in the versioning
scheme.
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
For packages with of type perl (as specified via the Type field)
with the perl version not specified,
the default instead (as of fink 0.13.4) is:
</p>
<pre>perl Makefile.PL PREFIX=%p \
 INSTALLPRIVLIB=%p/lib/perl5 \
 INSTALLARCHLIB=%p/lib/perl5/darwin \
 INSTALLSITELIB=%p/lib/perl5 \
 INSTALLSITEARCH=%p/lib/perl5/darwin \
 INSTALLMAN1DIR=%p/share/man/man1 \
 INSTALLMAN3DIR=%p/share/man/man3 \
 INSTALLSITEMAN1DIR=%p/share/man/man1 \
 INSTALLSITEMAN3DIR=%p/share/man/man3 \
 INSTALLBIN=%p/bin \
 INSTALLSITEBIN=%p/bin \
 INSTALLSCRIPT=%p/bin
make
make test</pre>
<p>If the type is <code>perl $version</code> with the version specified
(e.g., <code>$version</code> might be 5.6.0),
then the default becomes:
</p>
<pre>perl$version Makefile.PL \
 PERL=perl$version PREFIX=%p \
 INSTALLPRIVLIB=%p/lib/perl5/$version \
 INSTALLARCHLIB=%p/lib/perl5/$version/$perlarchdir \
 INSTALLSITELIB=%p/lib/perl5/$version \
 INSTALLSITEARCH=%p/lib/perl5/$version/$perlarchdir \
 INSTALLMAN1DIR=%p/share/man/man1 \
 INSTALLMAN3DIR=%p/share/man/man3 \
 INSTALLSITEMAN1DIR=%p/share/man/man1 \
 INSTALLSITEMAN3DIR=%p/share/man/man3 \
 INSTALLBIN=%p/bin \
 INSTALLSITEBIN=%p/bin \
 INSTALLSCRIPT=%p/bin
make
make test</pre>
<p>where <code>$perlarchdir</code> is "darwin" for versions 5.8.0 and 
earlier, and is 
"darwin-thread-multi-2level" for versions 5.8.1 and later.</p>
<p>
Before the commands are executed, percent expansion takes place
(see previous section).
</p>
</td></tr><tr valign="top"><td>NoPerlTests</td><td> 
<p>
<b>Introduced in fink &gt; 0.13.7.</b>
A boolean value, specific for perl module packages.
If true, the <code>make test</code> portion
of the <code>CompileScript</code> will be ignored
for that specific perl module package.
</p>
</td></tr></table>
<p><b>Install Phase:</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>UpdatePOD</td><td>
<p>
<b>Introduced in fink 0.9.5.</b>
A boolean value, specific for perl module packages.
If true, this will add code to the install, postrm and postinst
scripts that maintains the .pod files provided by perl packages.
This includes adding and removing the .pod date from the central
<code>/sw/lib/perl5/darwin/perllocal.pod</code> file.
(If the type has been given as <code>perl $version</code> with a
specific version of perl such as 5.6.0,
then these scripts are adapted to deal with the central .pod file
<code>/sw/lib/perl5/$version/perllocal.pod</code>.)
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
For packages with of type perl (as specified via the Type field)
with the perl version not specified,
the default instead (as of fink 0.13.4) is:
</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5 \
 INSTALLARCHLIB=%i/lib/perl5/darwin \
 INSTALLSITELIB=%i/lib/perl5 \
 INSTALLSITEARCH=%i/lib/perl5/darwin \
 INSTALLMAN1DIR=%i/share/man/man1 \
 INSTALLMAN3DIR=%i/share/man/man3 \
 INSTALLSITEMAN1DIR=%i/share/man/man1 \
 INSTALLSITEMAN3DIR=%i/share/man/man3 \
 INSTALLBIN=%i/bin \
 INSTALLSITEBIN=%i/bin \
 INSTALLSCRIPT=%i/bin
</pre>
<p>If the type is <code>perl $version</code> with the version specified
(e.g., <code>$version</code> might be 5.6.0),
then the default becomes:
</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5/$version \
 INSTALLARCHLIB=%i/lib/perl5/$version/$perlarchdir \
 INSTALLSITELIB=%i/lib/perl5/$version \
 INSTALLSITEARCH=%i/lib/perl5/$version/$perlarchdir \
 INSTALLMAN1DIR=%i/share/man/man1 \
 INSTALLMAN3DIR=%i/share/man/man3 \
 INSTALLSITEMAN1DIR=%i/share/man/man1 \
 INSTALLSITEMAN3DIR=%i/share/man/man3 \
 INSTALLBIN=%i/bin \
 INSTALLSITEBIN=%i/bin \
 INSTALLSCRIPT=%i/bin
</pre>
<p>where <code>$perlarchdir</code> is "darwin" for versions 5.8.0 and 
earlier, and is 
"darwin-thread-multi-2level" for versions 5.8.1 and later.</p>
<p>
If the package supports it, it is preferably to use <code>make install
DESTDIR=%d</code> instead. Before the commands are executed, percent
expansion takes place (see previous section).
</p>
</td></tr><tr valign="top"><td>AppBundles</td><td>
<p>
<b>Introduced in a post-0.23.1 version.</b>
This field installs the specified application bundle(s) into
<code>%p/Applications</code>.  It will also create a
symlink to the <code>/Applications/Fink</code> directory.
Example:
</p>
<pre>AppBundles: build/*.app Foo.app</pre>
</td></tr><tr valign="top"><td>JarFiles</td><td>
<p>
<b>Introduced in fink 0.10.0.</b>
This field is somewhat similar to DocFiles. It installs the specified jar
files into <code>%p/share/java/%n</code>.
Example:
</p>
<pre>JarFiles: lib/*.jar foo.jar:fooBar.jar</pre>
<p>
This will install all the jars that were in the lib directory and will install
foo.jar as fooBar.jar.
</p>
<p>
It also ensures that these jar files (specifically: all files in
<code>%p/share/java/%n</code> that end in .jar)
are added to the CLASSPATH environment variable. This allows tools like
configure or ant to properly detect the installed jar files.
</p>
</td></tr><tr valign="top"><td>DocFiles</td><td>
<p>
This field provides a convenient way to install README or COPYING
files in the doc directory for the package,
<code>%p/share/doc/%n</code>.
The value is a space-separated list of files.
You can copy files from subdirectories of the build directory, but
they will end up in the doc directory itself, not in a subdirectory.
Shell wildcards are allowed.
It is also possible to rename single files on the fly by appending the
new name separated by a colon (:),
e.g. <code>libgimp/COPYING:COPYING.libgimp</code>.
This field works by appending appropriate <code>install</code>
commands to the InstallScript.
</p>
</td></tr><tr valign="top"><td>Shlibs</td><td>
<p>
<b>Introduced in fink 0.11.0.</b>
This field declares the shared libraries which are installed in the
package.  There is one line for each
shared library, which contains three items separated by whitespace:
the <code>-install_name</code> of the
library, the <code>-compatibility_version</code>, and versioned 
dependency information specifying the Fink package which provides
this library at this compatibility version.  The dependency should
be stated in the form <code> foo (&gt;= version-revision)</code> where 
<code>version-revision</code> refers to
the <b>first</b> version of a Fink package which made
this library (with this compatibility version) available.
The Shlibs declaration amounts to a promise
from the maintainer that a libary with this name and a 
<code>-compatibility_version</code>
of at least this number will always be found in later versions of this
Fink package.
</p></td></tr><tr valign="top"><td>RuntimeVars</td><td>
<p>
<b>Introduced in fink 0.10.0.</b>
This field provides a convenient way to set environment variables to some static value at runtime (if you need more flexibility, refer to the <a href="#profile.d">profile.d scripts section</a>). As long as your package is installed, these variables will be set via the <code>/sw/bin/init.[c]sh</code> scripts.
</p>
<p>
The value of your variable can contain spaces (trailing ones are trimmed); also, percent expansion takes place. For example:
</p>
<pre>RuntimeVars: &lt;&lt;
 SomeVar: %p/Value
 AnotherVar: foo bar
&lt;&lt;</pre>
<p>
will set two environment variables 'SomeVar' and 'AnotherVar' and their values
will be respectively '/sw/Value' (or whatever your prefix is) and 'foo bar'.
</p>
<p>
This field works by appending appropriate commands to the InstallScript.
These commands add a setenv/export line for each variable to the package profile.d scripts, so you can provide your own ones, they won't be overwritten. The lines are prepended to the scripts, you can thus use these variables in your scripts.
</p>
</td></tr><tr valign="top"><td>SplitOff</td><td>
<p>
<b>Introduced in fink 0.9.9.</b>
Generate a second package from the same compile/install run.
For details about how this works, see the separate
<a href="#splitoffs">splitoff section</a> below.
</p>
</td></tr><tr valign="top"><td>SplitOff<b>N</b></td><td>
<p>
<b>Introduced in fink 0.9.9.</b>
This is the same as <code>SplitOff</code>, used to generate a third,
fourth, etc. package from the same compile/install run. Starting with a
CVS version of fink after 0.19.2, you may use arbitrary (not
necessarily consecutive) integer values of N &gt;= 2. However, you still
may not have duplicates.
</p>
</td></tr><tr valign="top"><td>Files</td><td>
<p>
<b>Introduced in fink 0.9.9.</b>
Used <b>only</b>
within a <code>SplitOff</code> or <code>SplitOff<b>N</b></code> field,
this designates which files and directories
should be moved from the parent package's  installation
directory %I to the current installation directory %i.  Note that this
is executed after the InstallScript and the DocFiles of the parent package,
but before the InstallScript and Docfiles of the current package.
</p>
</td></tr></table>
<p><b>Build Phase:</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>PreInstScript, PostInstScript, PreRmScript, PostRmScript</td><td>
<p>
These fields specify pieces of shell scripts that will be called when
the package is installed, upgraded or removed.
Fink automatically adds the shell script header
<code>#!/bin/sh</code>, and calls <code>set -e</code> so any command
that fails will result in instant termination of the script.
Fink also adds an <code>exit 0</code> at the end.
To indicate an error, exit from the script with a non-zero exit code.
The first parameter (<code>$1</code>) is set to a value indicating
what action is being performed.
Some possible values are <code>install</code>, <code>upgrade</code>,
<code>remove</code> and <code>purge</code>.
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
Percent expansion  is performed on this field.
The files must be specified with an absolute path,
e.g. <code>%p/etc/%n.conf</code>. 
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
maintain the Info directory file, <code>dir</code>.
This feature is still in flux, more fields for finer control may be
added in the future.
</p>
</td></tr><tr valign="top"><td>DaemonicFile</td><td>
<p>
Gives a service description for <code>daemonic</code>.
<code>daemonic</code> is used by Fink to create and remove
StartupItems for daemon processes (e.g. web servers).
The description will be added to the package as a file named
<code>%p/etc/daemons/<b>name</b>.xml</code>, where <b>name</b> is
specified by the DaemonicName field and defaults to the package
name.
Percent expansion is performed on the contents of this field.
Note that you must add <code>daemonic</code> to the dependency list if
your package uses it.
</p>
</td></tr><tr valign="top"><td>DaemonicName</td><td>
<p>
A name for the <code>daemonic</code> service description file.
See the description of DaemonicFile for details.
</p>
</td></tr></table>
<p><b>Additional Data:</b></p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Homepage</td><td>
<p>
The URL of the upstream home page of the package.
</p>
</td></tr><tr valign="top"><td>DescDetail</td><td>
<p>
A more detailed description than the one in the <code>Description</code>
field (what is it, what can I use it for?).
Multiple lines allowed. Because this field will be displayed without
the benefit of word-wrap, you should manually insert line breaks in
order to keep lines less than 79 chars (if possible).
</p>
</td></tr><tr valign="top"><td>DescUsage</td><td>
<p>
This is for information that is needed to use the package (how do
I use it?). As in "run wmaker.inst once before using WindowMaker".
Multiple lines allowed. Because this field will be displayed without
the benefit of word-wrap, you should manually insert line breaks in
order to keep lines less than 79 chars (if possible).
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
</td></tr></table>


<h2><a name="splitoffs">5.3 SplitOffs</a></h2>
<p>Beginning with fink 0.9.9, a single .info file can be used to build
multiple packages.  
The install phase begins as usual, with the execution of the 
<code>InstallScript</code> and <code>DocFiles</code> commands.
A <code>SplitOff</code> or <code>SplitOff<b>N</b></code> field, if present, then triggers the
creation of an
additional install directory.  Within the 
<code>SplitOff</code> or <code>SplitOff<b>N</b></code> field, the new install directory is referred to as %i,
while the original install directory of the parent 
package is referred to as %I.
</p>
<p>
Each <code>SplitOff</code> and <code>SplitOff<b>N</b></code> field must contain a number of fields of its
own.  In fact, it resembles a complete package description, but with
certain fields missing.  Here is what belongs in the sub-description
(by category):
</p>
<ul>
<li>Initial Data: Only the <code>Package</code> needs to be specified,
everything else is inherited from the parent package.  You may modify
<code>Type</code> and <code>License</code> by declaring the field
within the <code>SplitOff</code> or <code>SplitOff<b>N</b></code>.  Percent expansion can be used, and
it is often convenient to refer to the name %N of the parent
package.</li>
<li>Dependencies: All of these are allowed.</li>
<li>Unpack Phase, Patch Phase, Compile Phase: These fields are irrelevant
and will be ignored.</li>
<li>Install Phase, Build Phase: Any of these fields are allowed (except
that SplitOffs cannot themselves contain additional SplitOffs).</li>
<li>Additional Data: These are inherited from the parent package but may
be modified by declaring the field within the <code>SplitOff</code> or <code>SplitOff<b>N</b></code>.</li>
</ul>
<p>
During the install phase, the <code>InstallScript</code> and 
<code>DocFiles</code> of the parent package are executed first.
Next comes processing of the <code>SplitOff</code> and <code>SplitOff<b>N</b></code> fields. For each such field in turn, the <code>Files</code> command causes the listed files and directories
to be moved from the parent's installation directory %I to the
current installation directory %i.  Then the <code>InstallScript</code>
and <code>DocFiles</code> of the given <code>SplitOff</code> or <code>SplitOff<b>N</b></code> package are
executed.  
</p><p>
At this time, the <code>SplitOff</code> is processed first (if
present), followed by each <code>SplitOff<b>N</b></code> in
numerical order by N. However, this may change in the future, so, for
example, instead of:
</p>
<pre>
SplitOff: &lt;&lt;
  Description: Some header files
  Files: include/foo.h include/bar.h
&lt;&lt;
SplitOff2: &lt;&lt;
  Description: All other header files
  Files: include/*
&lt;&lt;
</pre>
<p>
which only works correctly if <code>SplitOff</code> is processed
before <code>SplitOff2</code> it's safer to list explicitly the files
for each (or use more specific filename globs).
</p><p>
During the build phase, the pre/post install/remove scripts for each of
the packages is constructed by using the build phase commands which
were specified for that package.
</p><p>
Each package being built is required
to document the licensing arrangement in %i/share/doc/%n (and of course
%n takes a different value for each package).  Note that
<code>DocFiles</code> copies files rather than moving them, so it is
possible to install identical copies of the documentation into each 
of the packages by using <code>DocFiles</code> several times.
</p>




<h2><a name="scripts">5.4 Scripts</a></h2>

<p>The PatchScript, CompileScript and InstallScript fields allow you
to specify shell commands to be executed. The build directory
(<code>%b</code>) is the current directory when scripts are
executed. You should always use relative pathnames or
percent-expansions for files and directories in the fink hierarchy,
not complete absolute pathnames. Two forms are supported.
</p><p>
This field can be a simple list of commands. This is sort of like a
shell script. However, the commands are executed via system(), one
line at a time, so setting variables or changing the directory only
affects commands on that same line. Starting in a CVS version of fink
after 0.18.2, you can wrap long lines similar to normal shell scripts:
a backslash (<code>\</code>) at the end of a line indicates that the
next line is a continuation.
</p><p>
Alternately, you can embed a complete script here, using the
interpreter of your choice. As with any Unix script, the first line
must begin with <code>#!</code> followed by the full pathname of to
the interpreter and any needed flags (e.g., <code>#!/bin/csh</code>,
<code>#!/bin/bash -ev</code>, etc.). In this situation, the whole
*Script field is dumped into a temporary file that is then executed.
</p>


<h2><a name="patches">5.5 Patches</a></h2>

<p>If your package needs a patch to compile on Darwin (or to work with
fink), name the patch with the same name as the package description,
using the extension ".patch" instead of ".info" and put it in the same
directory as the .info file. If you use the full package in the
filename specify either one of these (they are equivalent):</p>
<pre>Patch: %f.patch</pre>
<pre>PatchScript: patch -p1 &lt;%a/%f.patch</pre>
<p>If you use the newer simple package filename convention, use %n
insead of %f. These two fields are not mutually-exclusive - you can
use both, and they will both be executed. In that case the PatchScript
is executed last.</p>
<p>Because you may need to have the users chosen prefix in the patch file
it is recommended that you have a variable such as <code>@PREFIX@</code> 
instead of <code>/sw</code> in the patch and then use:</p>
<pre>PatchScript: sed 's|@PREFIX@|%p|g' &lt;%a/%f.patch | patch -p1</pre>
<p>Patches should be in unidiff format and are normally generated by using:</p>
<pre>diff -urN &lt;originalsourcedir&gt; &lt;patchedsourcedir&gt;</pre>
<p>If you have used emacs to edit files, you can add <code>-x'*~'</code> to the diff command above in order to exclude automatically-generated backup files.</p>
<p>It must also be noted that extremely large patches should not be put in cvs.
They should be put on a web/ftp server and specified using the
<code>SourceN:</code> field. If you don't have a website, fink project
admins can make the file available from fink's own website. If your
patch is larger than about 30Kb, you should consider making it a
separate download.
</p>


<h2><a name="profile.d">5.6 Profile.d scripts</a></h2>

<p>
If your package needs some run-time initialization  (e.g. to setup environment variables), you can use profile.d scripts.
These script fragments are sourced by the <code>/sw/bin/init.[c]sh</code> scripts. Normally, all fink users will load these scripts in their shell startup files (<code>.cshrc</code> and comparable files).
Your package must provide each script in two variants: one for sh compatible shells (sh, zsh, bash, ksh, ...) and one for csh compatible shells (csh, tcsh). They have to be installed as <code>/sw/etc/profile.d/%n.[c]sh</code> (where %n as usual stands for the package name).
Also, their executable and read bits have to be set (i.e. install them with -m 755), otherwise they will not be loaded correctly.
</p>
<p>
If you just need to set some environment variables (for example, QTDIR to '/sw'), you can use the RuntimeVars field which is provided as a convenient way to achieve exactly this.
</p>




<? include_once "../../footer.inc"; ?>


