<?
$title = "F.A.Q. - Packages";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/09/08 16:54:54';

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

<a name="xmms-quiet"><div class="question"><p><b>Q: I get no sound from
XMMS</b></p></div>
<div class="answer"><p><b>A:</b> 
Make sure you have the "eSound Output Plugin" selected in the XMMS
preferences.
For some strange reason, it selects the disk writer plugin as the
default.
</p><p>
If you still get no sound output or XMMS complains that it can't find
your sound card try this:
</p><ul>
<li>Make sure you haven't muted sound output in Mac OS X.</li>
<li>Run <tt><nobr>esdcat /usr/libexec/config.guess</nobr></tt> (or any other
file of a decent size).
If you hear a short noise, esound works and XMMS should work too if
it's configured correctly.
If you don't hear anything, esd isn't working for some reason.
You can try to start it up manually with <tt><nobr>esd &amp;</nobr></tt> and watch
the messages.
</li>
<li>
If it still doesn't work, check the permissions on
<tt><nobr>/tmp/.esd</nobr></tt> and <tt><nobr>/tmp/.esd/socket</nobr></tt>.
Those should have your normal user account as the owner.
If they aren't owned by you, kill esd if it's running, remove the
directory as root (<tt><nobr>sudo rm -rf /tmp/.esd</nobr></tt>), then start esd
again (as a normal user, not as root).
</li>
</ul><p>
Note that esd is designed to be run by a normal user, not by root.
It usually communicates via the file system socket
<tt><nobr>/tmp/.esd/socket</nobr></tt>.
You only need the <tt><nobr>-tcp</nobr></tt> and <tt><nobr>-port</nobr></tt> switches if
you want to run esd clients on another machine over the network.
</p></div></a>




<?
include "footer.inc";
?>
