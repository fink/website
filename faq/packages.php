<?
$title = "F.A.Q. - Packages";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/08/26 21:14:14';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="prev" href="usage.php" title="Usage Questions">';

include "header.inc";
?>

<h1>F.A.Q. - Problems With Certain Packages</h1>





<a name="nedit"><div class="question"><p><b>Q: nedit is broken.</b></p></div>
<div class="answer"><p><b>A:</b> If you're seeing <tt><nobr>Xm/BulletinB.h: No such file or
directory</nobr></tt> in the error messages, that's because you have Xtools
installed. Xtools includes OpenMotif, but unfortunately Tenon forgot
to include some required header files. There is no workaround yet, and
it is unknown whether this is fixed in recent releases on Xtools.</p></div></a>

<a name="gnome-panel"><div class="question"><p><b>Q: The GNOME panel displays
black icons only. What's wrong?</b></p></div>
<div class="answer"><p><b>A:</b> 
This is caused by limitations in the operating system kernel.
The only solution so far is to turn off shared memory.
The Running X11 document has <a href="http://fink.sourceforge.net/doc/x11/trouble.php#black">details</a>.
</p></div></a>

<a name="gnome-libs-db"><div class="question"><p><b>Q: gnome-libs complains about
dbopen and lots of other stuff.</b></p></div>
<div class="answer"><p><b>A:</b> 
This can happen when you manually installed Berkeley DB 3 without
backward compatibility.
gnome-libs expects to find a DB 1.86 compatible interface.
Remove the DB 3 installation from /usr/local or replace it with one
that has DB 1.86 compatibility.
</p></div></a>

<a name="libiconv"><div class="question"><p><b>Q: libiconv fails with errors that
mention ANSI C++.</b></p></div>
<div class="answer"><p><b>A:</b> 
This happens when you link <tt><nobr>gcc</nobr></tt> to <tt><nobr>c++</nobr></tt>.
That causes all C code to be compiled as C++ code.
Unfortunately, C allows some things that C++ doesn't allow.
You should remove the symlink you created, or at least link it to
<tt><nobr>cc</nobr></tt> instead.
</p></div></a>

<a name="xlocale"><div class="question"><p><b>Q: I'm getting lots of messages
like "locale not supported by C library". Is that bad?</b></p></div>
<div class="answer"><p><b>A:</b> 
It's not bad, it just means that the program will use the default
English messages, date formats, etc.
The program will function normally otherwise.
The Running X11 document has <a href="http://fink.sourceforge.net/doc/x11/trouble.php#locale">details</a>.
</p></div></a>




<?
include "footer.inc";
?>
