<?
$title = "Packaging - Package Descriptions";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/11/04 15:21:13';

$metatags = '<link rel="contents" href="index.php" title="Packaging Contents"><link rel="next" href="policy.php" title="Packaging Policy"><link rel="prev" href="intro.php" title="Introduction">';

include "header.inc";
?>

<h1>Packaging - Package Descriptions</h1>



<a name="trees"><h2>Tree Layout</h2></a>
<p>
Package descriptions are read from the <tt><nobr>finkinfo</nobr></tt>
directories below the <tt><nobr>/sw/fink/dists</nobr></tt> directory.
The "Trees" setting in <tt><nobr>/sw/etc/fink.conf</nobr></tt> controls which
directories are read.
The name of package description files must be the full package name
plus the extension ".info".
</p>
<p>
The package description tree is organized with several levels of
directories.
The directories in top-down order:
</p>
<ul>
<li><tt><nobr>dists</nobr></tt> is where is starts. The <tt><nobr>dists</nobr></tt>
directory is necessary for the Debian tools.</li>
<li>The distribution. There is <tt><nobr>stable</nobr></tt>,
<tt><nobr>unstable</nobr></tt> and <tt><nobr>local</nobr></tt>. The <tt><nobr>local</nobr></tt>
directory is under the control of the local administrator/user. The
<tt><nobr>stable</nobr></tt> and <tt><nobr>unstable</nobr></tt> directores are part of
Fink.</li>
<li>The tree. The <tt><nobr>main</nobr></tt> tree contains the bulk of the
packages. Cryptographic software is kept in a separate tree,
<tt><nobr>crypto</nobr></tt>, to make removal easy should it become
necessary.</li>
<li><tt><nobr>finkinfo</nobr></tt>
vs. <tt><nobr>binary-darwin-powerpc</nobr></tt>. <tt><nobr>finkinfo</nobr></tt> contains
the Fink package descriptions and patches, while
<tt><nobr>binary-darwin-powerpc</nobr></tt> contains the <tt><nobr>.deb</nobr></tt>
binary packages.</li>
<li>Sections. The <tt><nobr>main</nobr></tt> tree is subdivided into thematic
sections to make it manageable. The <tt><nobr>crypto</nobr></tt> tree is not
divided into sections at the moment.</li>
</ul>


<a name="format"><h2>File Format</h2></a>
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
The first line consists of the key, followed by <tt><nobr>&lt;&lt;</nobr></tt>
as the value.
All following lines are treated as the actual value, until a line with
just <tt><nobr>&lt;&lt;</nobr></tt> on it is encountered.
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
<tt><nobr>&lt;&lt;</nobr></tt>.
</p>
<p>
Empty lines and lines starting with a hash (#) are ignored.
Keys (field names) are case-insensitive in Fink, so you can write
<tt><nobr>InstallScript</nobr></tt>, <tt><nobr>installscript</nobr></tt> or
<tt><nobr>INSTALLSCRIPT</nobr></tt> as you please.
The first form is preferred for readability, though.
Some fields take a boolean value - any of "true", "yes", "on", "1"
(case-insensitive) are treated as true, all other values are treated
as false.
</p>


<a name="percent"><h2>Percent Expansion</h2></a>
<p>
To make life easier, Fink supports a set of expansions that are
performed on some fields.
The available expansions are:
</p>
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
<dt>%b</dt><dd>the <b>b</b>uild directory,
e.g. /sw/src/gimp-1.2.1-1/gimp-1.2.1
<p>Note: Use this only when there is no other way. The build
directory is the current directory when scripts are executed; you
should use relative path names in commands.</p>
</dd>
<dt>%c</dt><dd>the parameters for <b>c</b>onfigure:
<tt><nobr>--prefix=%p</nobr></tt> plus anything specified with
ConfigureParams</dd>
</dl>



<p align="right">
Next: <a href="policy.php">Packaging Policy</a></p>


<?
include "footer.inc";
?>
