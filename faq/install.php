<?
$title = "F.A.Q. - Installation";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/24 12:18:51 $';

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




<?
include "footer.inc";
?>
