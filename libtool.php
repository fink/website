<?
$title = "libtool patch";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/01/11 19:13:25 $';
$section = "darwin";
$wantnav = "darwin";

include "header.inc";
?>


<h1>Darwin patch for GNU libtool</h1>

<p>GNU packages that build libraries use GNU libtool to hide
platform-dependent procedures for library building and
installation. Unfortunately, stock GNU libtool doesn't know about
Darwin (its linker, that is) and only builds static libraries. Also,
dynamic loading (used e.g. for plugins) isn't available. I have found
a patch for libtool that enables shared library building on Darwin
(after some more tweaking, that is).</p>
<p>After applying <a href="files/libtool-1.3.5.patch">this patch</a>
to the libtool 1.3.5 source, you must delete the files ltconfig and
ltmain.sh. They will be recreated from the appropriate .in files when
you run configure. But that's only half the work - every package using
libtool comes with a version of ltconfig and ltmain.sh. So you must
replace these in every package that you want to build as a shared
library. Note that you must do this before running the configure
script. For your convenience, you can get the two files right here:
<a href="files/ltconfig">ltconfig</a> (98K) and <a
href="files/ltmain.sh">ltmain.sh</a> (110K).</p>
<p>Side note: Apple's Developer Tools contain a program also called
libtool, which can be used to build shared libraries. However, this is
completely unrelated.</p>


<?
include "footer.inc";
?>
