<?
$title = "libtool patch";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/03/15 22:34:10 $';

include "header.inc";
?>


<h1>Darwin patch for GNU libtool</h1>

<p>GNU packages that build libraries use GNU libtool to hide
platform-dependent procedures for library building and
installation. Unfortunately, stock GNU libtool 1.3 doesn't know about
Darwin and only builds static libraries. Also,
dynamic loading (used e.g. for plugins) isn't available. I have found
a patch for libtool that enables shared library building on Darwin and
improved it to hardcode the correct path and to do full
versioning.</p>

<p>After applying <a href="../files/libtool-1.3.5-darwin.patch">this patch</a>
<b>[updated 2001-03-15]</b> to the libtool 1.3.5 source, you must
delete the files ltconfig and ltmain.sh. They will be recreated from
the appropriate .in files when you run configure and make. But that's
only half the work - every package using libtool comes with its own
copies of ltconfig and ltmain.sh. So you must replace these in every
package that you want to build as a shared library. Note that you must
do this before running the configure script. For your convenience, you
can get the two files right here:
<a href="../files/ltconfig">ltconfig</a> (98K) and
<a href="../files/ltmain.sh">ltmain.sh</a> (110K)
<b>[both updated 2001-03-15]</b>.</p>

<p>For more information on libtool itself and what it does, see the <a
href="http://www.gnu.org/software/libtool/libtool.html">libtool
homepage</a>.</p>

<p>For patches to packages that do not use GNU libtool, see the <a
href="patches.php">patches page</a>.</p>

<p>Side note: Apple's Developer Tools contain a program also called
libtool, which can be used to build shared libraries. However, this is
completely unrelated. I recommend configuring GNU libtool with
<nobr><tt>--program-transform-name=s/libtool/glibtool/</tt></nobr>
to avoid conflicts.</p>


<?
include "footer.inc";
?>
