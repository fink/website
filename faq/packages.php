<?
$title = "F.A.Q. - Packages";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/07/19 14:33:47';

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
The problem has been reported to Apple, but so far they seem unwilling
to fix it; see the filed <a href="http://www.opensource.apple.com/bugs/X/Kernel/2691632.html">Darwin
bug report</a> for details.
</p><p>
So, the current situation is that the MIT-SHM extension of the X11
protocol is practically unusable on Darwin and Mac OS X.
There are two ways to turn the protocol extension off: in the server
or in the clients.
To turn it off in the server, the server must be recompiled with a
special configuration setting; this is not practical for most users.
</p><p>
To turn the extension off in the clients, you can pass the
<tt><nobr>--no-xshm</nobr></tt> command line option when you start the
application.
In the case of the GNOME panel, you must edit your GNOME session file
(<tt><nobr>~/.gnome/session</nobr></tt>).
Be sure to pick the right section and add the <tt><nobr>--no-xshm</nobr></tt>
to the <tt><nobr>RestartCommand</nobr></tt> line, like in this example:
</p><pre>7,id=11c0a80208000099479218400000018970007
7,RestartStyleHint=2
7,Priority=40
7,Program=panel
7,CurrentDirectory=/Users/chrisp
7,CloneCommand=panel
7,RestartCommand=panel --sm-client-id 11c0a80208000099479218400000018970007 --no-xshm</pre></div></a>






<?
include "footer.inc";
?>
