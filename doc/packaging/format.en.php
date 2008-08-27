<?
$title = "Packaging - Package Descriptions";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2008/08/27 05:44:07';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Packaging Contents"><link rel="next" href="policy.php?phpLang=en" title="Packaging Policy"><link rel="prev" href="intro.php?phpLang=en" title="Introduction">';


include_once "header.en.inc";
?>
<h1>Packaging - 2. Package Descriptions</h1>



<h2><a name="trees">2.1 Tree Layout</a></h2>
<p>
Package descriptions are read from the <code>finkinfo</code>
directories below the <code>/sw/fink/dists</code> directory.
The "Trees" setting in <code>/sw/etc/fink.conf</code> controls
which directories are read.
The name of package description files must be the full package name
plus the extension ".info".
As of fink 0.26.0, there are several different ways to specify the
filename: it is recommended to use the shortest version which is
consistent with other needed package files.  The filename takes
the form: the invariant packagename, optionally 
followed by the architecture, optionally followed by the
distribution, 
optionally followed by either version or version-revision, each delimited by 
hyphens, concluding with ".info".  
The "architecture" and "distribution" components are only allowed
if the corresponding field is present in the package, and if it specifies
exactly one value.
</p>
<p>
The package description tree is organized with several levels of
directories.
The directories in top-down order:
</p>
<ul>
<li><code>dists</code> is where it starts. The <code>dists</code>
directory is necessary for the Debian tools.</li>
<li>The distribution. There is <code>stable</code>,
<code>unstable</code> and <code>local</code>. The <code>local</code>
directory is under the control of the local administrator/user. The
<code>stable</code> and <code>unstable</code> directories are part of
Fink.</li>
<li>The tree. The <code>main</code> tree contains the bulk of the
packages. Cryptographic software is kept in a separate tree,
<code>crypto</code>, to make removal easy should it become
necessary.</li>
<li><code>finkinfo</code>
vs. <code>binary-darwin-powerpc</code>. <code>finkinfo</code> contains
the Fink package descriptions and patches, while
<code>binary-darwin-powerpc</code> contains the <code>.deb</code>
binary packages.</li>
<li>Sections. The <code>main</code> tree is subdivided into thematic
sections to make it manageable. The <code>crypto</code> tree is not
divided into sections at the moment.</li>
</ul>


<h2><a name="format">2.2 File Format</a></h2>
<p>
The description files are simple lists of key-value pairs, also called
'fields'.
Each line starts with a key, terminated by a colon (:) and followed by
the value, like this:
</p>
<pre>Key: Value</pre>
<p>
There are two notations for fields that must span multiple lines.
</p><p>
The preferred notation is based on the here-document
syntax in shell scripts.
In this syntax, the first line consists of the key, followed by <code>&lt;&lt;</code>
as the value.
All following lines are treated as the actual value, until a line with
just <code>&lt;&lt;</code> on it is encountered.
The example from above now looks like this:
</p>
<pre>InstallScript: &lt;&lt;
mkdir -p %i/share/man
make install prefix=%i mandir=%i/share/man
mkdir -p %i/share/doc/%n
install -m 644 COPYING %i/share/doc/%n
&lt;&lt;</pre>
<p>
Indentation using this format is optional, but it can be used to
improve readability.
</p><p>
The here-document syntax can be nested. This is often used in
a <code>SplitOff</code> or <code>SplitOff<b>N</b></code> field.
These fields contain other fields (multiple lines), and this syntax
allows these sub-fields to have multiple lines themselves.  The same
terminator <code>&lt;&lt;</code> is used for the sub-here-document.
Here is an example:
</p>
<pre>
SplitOff: &lt;&lt;
  Package: %N-shlibs
  InstallScript: &lt;&lt;
    ln -s %p/lib/libfoo.2.dylib %i/lib/libfoo.%v.dylib
  &lt;&lt;
&lt;&lt;
</pre>
<p>
An older, deprecated, notation is crafted after the RFC 822 header folding
method.
A line that starts with whitespace is treated as a continuation of the
previous line.
Example:
</p>
<pre>InstallScript: mkdir -p %i/share/man
 make install prefix=%i mandir=%i/share/man
 mkdir -p %i/share/doc/%n
 install -m 644 COPYING %i/share/doc/%n</pre>
<p>
Note the mandatory indentation of the lines.
</p><p>
In both formats, empty lines and lines starting with a hash (#) are ignored.
Keys (field names) are case-insensitive in Fink, so you can write
<code>InstallScript</code>, <code>installscript</code> or
<code>INSTALLSCRIPT</code> as you please.
The first capitalization form is preferred for readability, though.
Some fields take a boolean value - any of "true", "yes", "on", "1"
(case-insensitive) are treated as true, all other values are treated
as false.
</p>


<h2><a name="percent">2.3 Percent Expansion</a></h2>
<p>
To make life easier, Fink supports a set of expansions that are
performed on some fields.
In order to prevent ambiguity, you can use curly-braces to denote
exactly what character(s) should be considered for a percent
expansion. For example, <code>%{n}</code> has the same meaning
as <code>%n</code>.
The available expansions are:
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left"></th><th align="left"></th></tr><tr valign="top"><td>%n</td><td>
<p>
the <b>n</b>ame of the current package
</p>
</td></tr><tr valign="top"><td>%N</td><td>
<p>
the <b>N</b>ame of the parent package (the same as %n unless within a
<code>SplitOff</code>)
</p>
<p>
Note: If a parent <code>Package</code> field contains %type_*[], those
percent expansion values <b>will</b> be included in %N in
a <code>SplitOff</code> block (since they are included in %n in the
parent).
</p>
</td></tr><tr valign="top"><td>%e</td><td>
<p>
the package <b>e</b>poch
</p>
</td></tr><tr valign="top"><td>%v</td><td>
<p>
the package <b>v</b>ersion. Note that the Epoch is not part
of <code>%v</code>.
</p>
</td></tr><tr valign="top"><td>%V</td><td>
<p>
the full package <b>V</b>ersion, which automatically includes the Epoch
if present.  Note that this percent expansion is only available for
packages whose <code>InfoN</code> level is at least 4.
</p>
</td></tr><tr valign="top"><td>%r</td><td>
<p>
the package <b>r</b>evision
</p>
</td></tr><tr valign="top"><td>%f</td><td>
<p>
the <b>f</b>ull package name (%n-%v-%r). Note that the Epoch is not
part of <code>%f</code>.
</p>
</td></tr><tr valign="top"><td>%p, %P</td><td>
<p>
the <b>p</b>refix where Fink is installed, e.g. <code>/sw</code>. You must not assume all users have Fink installed in <code>/sw</code>; use <code>%p</code> to ge the correct path.
</p>
</td></tr><tr valign="top"><td>%d</td><td>
<p>
the <b>d</b>estination directory where the tree to be packaged is built, e.g.
<code>/sw/src/fink.build/root-gimp-1.2.1-1</code>. This temporary directory serves
as root during the installation phase of compiling a package. You must not assume that
<code>root-%f</code> will be in <code>%p/src</code> since
a user can change that directory using the <code>Buildpath</code> field
in <code>/sw/etc/fink.conf</code>.
</p>
</td></tr><tr valign="top"><td>%D</td><td>
<p>
the <b>D</b>estination for the parent package (the same as %d unless within a
<code>SplitOff</code>)
</p>
</td></tr><tr valign="top"><td>%i</td><td>
<p>
the full <b>i</b>nstall-phase prefix, equivalent to %d%p
</p>
</td></tr><tr valign="top"><td>%I</td><td>
<p>
the <b>I</b>nstall prefix of the parent package, equivalent to %D%P (the same
as %i unless within a <code>SplitOff</code>)
</p>
</td></tr><tr valign="top"><td>%a</td><td>
<p>
the path where the p<b>a</b>tches can be found
</p>
</td></tr><tr valign="top"><td>%b</td><td>
<p>
the <b>b</b>uild directory, e.g. <code>/sw/src/fink.build/gimp-1.2.1-1/gimp-1.2.1</code>.
You must not assume that
<code>%f</code> will be in <code>%p/src</code> since
a user can change that directory using the <code>Buildpath</code> field
in <code>/sw/etc/fink.conf</code>.
The innermost directory is named based on the <code>Source</code>
filename, or is the value of the <code>SourceDirectory</code> field
(if present), or is not used if <code>NoSourceDirectory</code>
is <code>true</code>.
</p>
<p>
Note: Use this only when there is no other way. The build directory is the
current directory when scripts are executed; you should use relative path names
in commands.
</p>
</td></tr><tr valign="top"><td>%c</td><td>
<p>
the parameters for <b>c</b>onfigure: <code>--prefix=%p</code> plus anything
specified with ConfigureParams.  (The behavior is different when the package
has <code>Type: perl</code>; in that case, the default flags for
building a perl package are used instead of <code>--prefix=%p</code>
in the definition of <code>%c</code>.)
</p>
</td></tr><tr valign="top"><td>%m</td><td>
<p>
the <b>m</b>achine architecture string.  This is the same as 
<code>uname -p</code> output.  Current values are 'powerpc' for ppc machines
and 'i386' for x86 machines. (Introduced in a post-0.12.1 CVS version of fink.)
</p>
</td></tr><tr valign="top"><td>%%</td><td>
<p>
the percent character (one that will not be expanded according to whatever follows it).  Expansion occurs strictly
left-to-right, so %%n is not anything related to the package name, but
rather is the string %n.  (Introduced in fink-0.18.0)
</p>
</td></tr><tr valign="top"><td>%type_raw[<b>type</b>], %type_pkg[<b>type</b>],
%type_num[<b>type</b>]</td><td>
<p>
pseudo-hashes returning the subtype for the given <b>type</b>. See
documentation for the <code>Type</code> field later in this document.
The _raw form is the exact subtype string, while the _pkg form has all
period characters removed (as per Fink's language-version package naming
convention and for other clever uses). (Introduced in a post-0.19.2
CVS version of fink.)  The _num form was introduced in fink-0.26.0
and removes all non-digits from the <code>Type</code> field.
</p>
</td></tr><tr valign="top"><td>%{ni}, %{Ni}</td><td>
<p>
the package <b>n</b>ame <b>i</b>nvariant portion. These are like
%n and %N, except all %type_pkg[] and %type_raw[] are blanked out.
(Introduced in a post-0.19.2 CVS version of fink) You should use %{ni}
and %{Ni} to avoid confusion with the %n and %N expansions.
</p>
</td></tr><tr valign="top"><td>%{default_script}</td><td>
<p>
Valid only in <code>PatchScript</code>, <code>CompileScript</code>, and <code>InstallScript</code> fields, the default contents of
that type of field. The value is often dependent on
the <code>Type</code> field, and is always defined (though it may be
blank). When used in the <code>InstallScript</code> of a <code>SplitOff</code> (or <code>SplitOff<b>N</b></code>), this
expansion will yield the <b>parent's</b> default, even though the
default for <code>InstallScript</code> in a <code>SplitOff</code>
package is blank. (Introduced in fink-0.20.6)
</p>
</td></tr><tr valign="top"><td>%{PatchFile}</td><td>
<p>
The full path to the file given in the <code>PatchFile</code> field.
(Introduced in fink-0.24.12)
</p>
</td></tr><tr valign="top"><td>%lib</td><td>
<p>
If <code>Type: -64bit</code> is defined to be <code>-64bit</code>,
this expands to <b>lib/ppc64</b> on powerpc machines, and to
<b>lib/x86_64</b> on intel machines (the proper storage locations
for 64-bit libraries); otherwise, this expands to <b>lib</b>.
(Introduced in fink-0.26.0)
</p>
<p>Note that <code>%lib</code> is not permitted in the
<code>ConfigureParams</code> field unless the <code>InfoN</code>
 level is at least 4.
</p>
</td></tr></table>



<p align="right"><? echo FINK_NEXT ; ?>:
<a href="policy.php?phpLang=en">3. Packaging Policy</a></p>
<? include_once "../../footer.inc"; ?>


