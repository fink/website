<?
$title = "About";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/02 15:43:50 $';

include "header.inc";
?>


<h1>More About Fink</h1>

<p>
Fink is an attempt to bring the full world of Unix Open Source
software to <a href="http://www.opensource.apple.com/">Darwin</a> and
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
Think of it as an add-on distribution (in the Linux sense) for these
systems.
Once it is more mature, Fink might evolve into a general package
management system and add-on distribution suitable for all Unix
variants.
</p>

<p>
Fink wants to be as painless as possible.
There is a strict policy to avoid interference with the base system
unless there is no other way.
To accheive this, Fink manages a separate directory tree and provides
some infrastructure to make it easy to use.
</p>
<p>
For the underlying binary package management Fink relies on the
excellent tools produced by the
<a href="http://www.debian.org/">Debian</a> project - <tt>dpkg</tt>,
<tt>dselect</tt> and <tt><nobr>apt-get</nobr></tt>.
On top of that, Fink adds its own package manager, named (surprise!)
<tt>fink</tt>.
You can view <tt>fink</tt> as a build engine - it takes package
descriptions and produces binary .deb packages from that.
In the process, it downloads the original source code from the
Internet, patches it as necessary, then goes through the whole process
of configuring and building the package.
Finally, it wraps the results up in a package archive that is ready to
be installed by <tt>dpkg</tt>.
</p>

<p>
<a href="index.php">Back Home</a>
</p>


<?
include "footer.inc";
?>
