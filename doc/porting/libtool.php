<?
$title = "Porting - libtool";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/08/30 16:08:10';

$metatags = '<link rel="start" href="index.php" title="Porting Contents"><link rel="contents" href="index.php" title="Porting Contents"><link rel="prev" href="shared.php" title="Shared Code">';

include "header.inc";
?>

<h1>Porting - GNU libtool</h1>




<p>
GNU packages that build libraries use GNU libtool to hide
platform-dependent procedures for library building and installation.
</p>


<a name="situation"><h2>The Situation</h2></a>
<p>
In the wild, one can find four strands of libtool:
</p>
<ul>

<li><p>
<b>libtool 1.3</b>:
The most common strand.
The last release from this branch is 1.3.5.
It doesn't know about Darwin and only builds static libraries.
It can be recognized by the presence of the files
<tt><nobr>ltconfig</nobr></tt> and <tt><nobr>ltmain.sh</nobr></tt> in the source tree.
</p></li>

<li><p>
<b>libtool 1.4</b>:
Long in the works and recently released as the new
stable version, this branch has better autoconf integration.
Unfortunately that makes migrating packages from 1.3 non-trivial.
It supports Darwin 1.3 / Mac OS X 10.0 out of the box and needs a
small patch to work on Mac OS X 10.1.
It can be recognized by the absence of <tt><nobr>ltconfig</nobr></tt>.
Versions that identify themselves as 1.3b or 1.3d are actually
development snapshots of 1.4 and must be treated with caution.
</p></li>

<li><p>
<b>The multi-language-branch</b>:
Also called MLB, this version of libtool was a parallel development
branch that added support for C++ and Java (via gcj).
It has now been merged back into the main development line.
Recent versions support Darwin 1.3 and Mac OS X 10.0 out of the box.
The MLB can be recognized by the files <tt><nobr>ltcf-c.sh</nobr></tt>,
<tt><nobr>ltcf-cxx.sh</nobr></tt> and <tt><nobr>ltcf-gcj.sh</nobr></tt>.
</p></li>

<li><p>
<b>The current development branch</b>:
This is the development version that will some day be released as
libtool 1.5.
It has resulted from the merge of 1.4 and the MLB.
It supports C, C++ and Java (via gcj).
Unfortunately, it can't be easily told apart from 1.4, you'll have to
check the version number inside <tt><nobr>ltmain.sh</nobr></tt>.
</p></li>

</ul>
<p>
In conclusion, libtool 1.3.x and packages that use it (which
happens to be the majority of libtool-using packages out there) need a
patch to build shared libraries on Darwin.
Apple includes a patched version of libtool 1.3.5 in Mac OS X, but it
will not work correctly in most cases.
I have improved that patch to hardcode the correct path and to do full
versioning.
The changes have been incorporated into upstream libtool releases and
development versions starting with 1.4.
I continue to make improvements and forward them to the libtool
maintainers.
The versioning scheme is compatible across all libtool versions.
</p>
<p>
Side note:
The libltdl library included with all libtool versions will only work
on Darwin when dlcompat is installed.
</p>



<a name="patch-135"><h2>The 1.3.5 Patch</h2></a>
<p>
After applying <a href="http://fink.sourceforge.net/files/libtool-1.3.5-darwin.patch">this
patch</a> <b>[updated 2001-08-30]</b> to the libtool 1.3.5 source, you
must delete the files ltconfig and ltmain.sh.
They will be recreated from the appropriate .in files when you run
configure and make.
But that's only half the work - every package using libtool comes with
its own copies of ltconfig and ltmain.sh.
So you must replace these in every package that you want to build as a
shared library.
Note that you must do this before running the configure script.
For your convenience, you can get the two files right here:
<a href="http://fink.sourceforge.net/files/ltconfig">ltconfig</a> (98K) and
<a href="http://fink.sourceforge.net/files/ltmain.sh">ltmain.sh</a> (110K)
<b>[both updated 2001-08-30]</b>.</p>



<a name="notes"><h2>Further Notes</h2></a>
<p>
For more information on libtool itself and what it does, see the <a href="http://www.gnu.org/software/libtool/libtool.html">libtool
homepage</a>.
</p>

<p>
Side note:
Apple's Developer Tools contain a program also called libtool, which
is used by the compiler driver to build shared libraries.
However, this is completely unrelated with GNU libtool.
The GNU libtool that Apple ships is installed as <tt><nobr>glibtool</nobr></tt>
instead.
This can be achieved by configuring GNU libtool with
<tt><nobr>--program-transform-name=s/libtool/glibtool/</nobr></tt>.
</p>





<?
include "footer.inc";
?>
