<?
$title = "F.A.Q. - Installation";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/09/08 16:54:54';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage.php" title="Usage Questions"><link rel="prev" href="general.php" title="General Questions">';

include "header.inc";
?>

<h1>F.A.Q. - Installation Questions</h1>





<a name="proxy"><div class="question"><p><b>Q: I'm behind a firewall. How do I
configure Fink to use an HTTP proxy?</b></p></div>
<div class="answer"><p><b>A:</b> 
Fink 0.2.3 and later ask you for proxy and firewall settings on
installation.
If you're upgrading from an older version, run <tt><nobr>fink
configure</nobr></tt> to be asked these questions.
</p></div></a>

<a name="head"><div class="question"><p><b>Q: I'm getting a strange usage message
from the head command. What's broken?</b></p></div>
<div class="answer"><p><b>A:</b> If you're seeing this:</p><pre>Unknown option: 1
Usage: head [-options] &lt;url&gt;...</pre><p>followed by a list of options, you have a broken <tt><nobr>head</nobr></tt>
executable.
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
Future releases of Fink will check the system before the bootstrap
starts to catch this error.
</p></div></a>

<a name="moving"><div class="question"><p><b>Q: Can I move Fink to another
location after installation?</b></p></div>
<div class="answer"><p><b>A:</b> 
No.
Well, of course you can move the files using mv or the Finder, but 99%
of the programs will stop working when you do.
That's because basically all Unix software depends on hardcoded paths
to find data files, libraries and other stuff.
</p></div></a>

<a name="moving-symlink"><div class="question"><p><b>Q: If I move Fink after
installation and provide a symlink from the old location, will it
work?</b></p></div>
<div class="answer"><p><b>A:</b> 
Maybe.
The general expectation is that it should work, but there may be
hidden traps somewhere.
</p></div></a>

<p align="right">
Next: <a href="usage.php">Usage Questions</a></p>


<?
include "footer.inc";
?>
