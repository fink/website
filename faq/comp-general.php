<?
$title = "F.A.Q. - Compiling (1)";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/10/25 14:32:37';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="comp-packages.php" title="Compile Problems - Specific Packages"><link rel="prev" href="usage-fink.php" title="Installing, Using and Maintaining Fink">';

include "header.inc";
?>

<h1>F.A.Q. - Compile Problems - General</h1>



<a name="head"><div class="question"><p><b>Q: I'm getting a strange usage message
from the head command. What's broken?</b></p></div>
<div class="answer"><p><b>A:</b> If you're seeing this:</p><pre>Unknown option: 1
Usage: head [-options] &lt;url&gt;...</pre><p>followed by a list of option descriptions, you have a broken
<tt><nobr>head</nobr></tt> executable.
This happens when you install the Perl libwww library on an HFS+
system volume.
It tries to create a new command <tt><nobr>/usr/bin/HEAD</nobr></tt>, which
overwrites the existing <tt><nobr>head</nobr></tt> command because the file
system is case-insensitive.
<tt><nobr>head</nobr></tt> is a standard command used in many shell scripts and
Makefiles.
You need to get the original <tt><nobr>head</nobr></tt> executable back if you
want to use Fink.
</p><p>
The bootstrap script of the source release now checks for this, but
you can still run into it if you use the binary release for first-time
installation or install libwww after you installed Fink.
</p></div></a>

<p align="right">
Next: <a href="comp-packages.php">Compile Problems - Specific Packages</a></p>


<?
include "footer.inc";
?>
