<?
$title = "GNU libtool and Darwin";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/12 07:30:22 $';

include "header.inc";
?>


<h1>GNU libtool and Darwin</h1>

<p>GNU packages that build libraries use GNU libtool to hide
platform-dependent procedures for library building and
installation.</p>

<h2>The Situation</h2>

<p>In the wild, one can find three strands of libtool:</p>
<ul>
<li>libtool 1.3: The most common strand. The last release from this
branch is 1.3.5. It doesn't know about Darwin and only builds static
libraries. It can be recognized by the presence of the files
<tt>ltconfig</tt> and <tt>ltmain.sh</tt> in the source tree.</li>
<li>libtool 1.4: Long in the works and recently released as the new
stable version, this branch has better autoconf integration, which
makes migrating packages from 1.3 non-trivial. It supports Darwin out
of the box and can be recognized by the absence of
<tt>ltconfig</tt>.</li>
<li>The multi-language-branch: Also called MLB, this version of
libtool is still under development and will some day be released as
libtool 1.5. It adds support for C++ and Java (via gcj). It also
supports Darwin out of the box. It can be recognized by the files
<nobr><tt>ltcf-c.sh</tt></nobr>, <nobr><tt>ltcf-cxx.sh</tt></nobr> and
<nobr><tt>ltcf-gcj.sh</tt></nobr>.</li>
</ul>

<p>In conclusion, libtool 1.3.x and packages that use it (which
happens to be the majority of libtool-using packages out there) need a
patch to build shared libraries on Darwin. Apple includes a patched
version of libtool 1.3.5 in Mac OS X, but it will not work in most
cases. I have improved that patch to hardcode the correct path and to
do full versioning. This improved patch was later incorporated into
libtool 1.4 and the multi-language-branch. The versioning scheme is
compatible across all libtool versions.</p>

<p>Side note: The libltdl library included with all libtool versions
will only work on Darwin when dlcompat is installed.</p>

<h2>The 1.3.5 Patch</h2>

<p>After applying <a href="../files/libtool-1.3.5-darwin.patch">this patch</a>
[updated 2001-06-12] to the libtool 1.3.5 source, you must
delete the files ltconfig and ltmain.sh. They will be recreated from
the appropriate .in files when you run configure and make. But that's
only half the work - every package using libtool comes with its own
copies of ltconfig and ltmain.sh. So you must replace these in every
package that you want to build as a shared library. Note that you must
do this before running the configure script. For your convenience, you
can get the two files right here:
<a href="../files/ltconfig">ltconfig</a> (98K) and
<a href="../files/ltmain.sh">ltmain.sh</a> (110K)
[both updated 2001-06-12].</p>

<h2>Further Notes</h2>

<p>For more information on libtool itself and what it does, see the <a
href="http://www.gnu.org/software/libtool/libtool.html">libtool
homepage</a>.</p>

<p>For patches to packages that do not use GNU libtool, see the <a
href="patches.php">patches page</a>.</p>

<p>Side note: Apple's Developer Tools contain a program also called
libtool, which is used by the compiler driver to build shared
libraries. However, this is completely unrelated with GNU libtool.
The GNU libtool that Apple ships is installed as <tt>glibtool</tt>
instead. This can be achieved by configuring GNU libtool with
<nobr><tt>--program-transform-name=s/libtool/glibtool/</tt></nobr>.</p>


<?
include "footer.inc";
?>
