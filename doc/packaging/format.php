<?
$title = "Packaging - Package Descriptions";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2003/12/11 03:10:17';

$metatags = '<link rel="contents" href="index.php" title="Packaging Contents"><link rel="next" href="policy.php" title="Packaging Policy"><link rel="prev" href="intro.php" title="Introduction">';

include "header.inc";
?>

<h1>Packaging - 2 Package Descriptions</h1>



<h2><a name="trees">2.1 Tree Layout</a></h2>
<p>
Package descriptions are read from the <code>finkinfo</code>
directories below the <code>/sw/fink/dists</code> directory.
The "Trees" setting in <code>/sw/etc/fink.conf</code> controls
which directories are read.
The name of package description files must be the full package name
plus the extension ".info".
Starting with fink 0.13.0, the use of the simple package name plus
".info" is also supported in order to simplify package updates.
</p>
<p>
The package description tree is organized with several levels of
directories.
The directories in top-down order:
</p>
<ul>
<li><code>dists</code> is where is starts. The <code>dists</code>
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
The format is based on the popular RFC 822 header format.
Each line starts with a key, terminated by a colon (:) and followed by
the value, like this:
</p>
<pre>Key: Value</pre>
<p>
There are two notations for fields that must span multiple lines.
The traditional notation is crafted after the RFC 822 header folding
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
Note the indentation of the lines.
</p>
<p>
The more recent alternative notation is based on the here-document
syntax in shell scripts.
The first line consists of the key, followed by <code>&lt;&lt;</code>
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
Note the lack of indentation and the terminating
<code>&lt;&lt;</code>.
</p><p>
As a special case, when working within a <code>SplitOff</code> or
<code>SplitOff<b>N</b></code> field, the here-document syntax
can be nested.  The same terminator <code>&lt;&lt;</code> is used
for the sub-here-document.  Here is an example:
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
(The indentation is optional, but it improves readability.)
</p><p>
Empty lines and lines starting with a hash (#) are ignored.
Keys (field names) are case-insensitive in Fink, so you can write
<code>InstallScript</code>, <code>installscript</code> or
<code>INSTALLSCRIPT</code> as you please.
The first form is preferred for readability, though.
Some fields take a boolean value - any of "true", "yes", "on", "1"
(case-insensitive) are treated as true, all other values are treated
as false.
</p>


<h2><a name="percent">2.3 Percent Expansion</a></h2>
<p>
To make life easier, Fink supports a set of expansions that are
performed on some fields.
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
</td></tr><tr valign="top"><td>%e</td><td>
<p>
the package <b>e</b>poch
</p>
</td></tr><tr valign="top"><td>%v</td><td>
<p>
the package <b>v</b>ersion
</p>
</td></tr><tr valign="top"><td>%r</td><td>
<p>
the package <b>r</b>evision
</p>
</td></tr><tr valign="top"><td>%f</td><td>
<p>
the <b>f</b>ull package name, i.e. %n-%v-%r
</p>
</td></tr><tr valign="top"><td>%p, %P</td><td>
<p>
the <b>p</b>refix where Fink is installed, e.g. /sw
</p>
</td></tr><tr valign="top"><td>%d</td><td>
<p>
the <b>d</b>estination directory where the tree to be packaged is built, e.g.
/sw/src/root-gimp-1.2.1-1
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
the <b>b</b>uild directory, e.g. /sw/src/gimp-1.2.1-1/gimp-1.2.1 
</p>
<p>
Note: Use this only when there is no other way. The build directory is the
current directory when scripts are executed; you should use relative path names
in commands.
</p>
</td></tr><tr valign="top"><td>%c</td><td>
<p>
the parameters for <b>c</b>onfigure: <code>--prefix=%p</code> plus anything
specified with ConfigureParams
</p>
</td></tr><tr valign="top"><td>%m</td><td>
<p>
the <b>m</b>achine architecture string.  This is the same as 
<code>uname -p</code> output.  Current values are 'powerpc' for ppc machines
and 'i386' for x86 machines. (Introduced in a post-0.12.1 CVS version of fink.)
</p>
</td></tr><tr valign="top"><td>%%</td><td>
<p>
the percent character (one that will not be expanded according
according to whatever follows it).  Expansion occurs strictly
left-to-right, so %%n is not anything related to the package name, but
rather is the string %n.  (Introduced in fink-0.18.0)
</p>
</td></tr></table>



<p align="right">
Next: <a href="policy.php">3 Packaging Policy</a></p>


<?
include "footer.inc";
?>

