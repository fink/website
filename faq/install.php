<?
$title = "F.A.Q. - Installation";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/01 06:40:49 $';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage.php" title="Usage Questions"><link rel="prev" href="general.php" title="General Questions">';

include "header.inc";
?>

<h1>F.A.Q. - Installation Questions</h1>



<a name="stow-not-found"><div class="question"><p><b>Q: Installing Fink fails
with a "stow not found" message.</b></p></div>
<div class="answer"><p><b>A:</b> This is a known bug in Fink 0.1.8. It is caused by missing
dependencies in the gzip and tar packages. The bug is fixed in Fink
0.1.8a. To install it, either wipe out /sw (or whatever you used) and
use install.sh again or just use upgrade.sh and install any
package. Note that you do not need the update unless you did a
first-time installation with 0.1.8.</p></div></a>

<a name="bzip2"><div class="question"><p><b>Q: I tried to install Fink 0.2.0, but it failed to
login to cygnus (?) to get bzip. (login denied). Is there an error in
the login script?</b></p></div>
<div class="answer"><p><b>A:</b> There is no "login script" in Fink. What you're seeing is not a bug
in Fink (or wget, which is used for downloading files), but an
overloaded FTP server. Later releases of Fink use a different server
to get bzip2. As a workaround, you can download bzip2-1.0.1.tar.gz
manually and place it in /sw/src, then retry installing.</p></div></a>

<a name="proxy"><div class="question"><p><b>Q: I'm behind a firewall. How do I configure Fink
to use an HTTP proxy?</b></p></div>
<div class="answer"><p><b>A:</b> Fink does not have a proxy setting because it lets <a href="http://www.gnu.org/software/wget/wget.html">wget</a> do all the
downloading. To use a proxy, you must tell wget to use it. You can do
that by setting the environment variable http_proxy. See the
<a href="http://www.gnu.org/manual/wget/html_chapter/wget_8.html#SEC36">wget
manual</a> for details.</p></div></a>

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
</p></div></a>




<?
include "footer.inc";
?>
