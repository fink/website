<?
$title = "F.A.Q. - General";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/09 18:58:56 $';

$metatags = '<link rel="contents" href="index.php" title="FAQ Contents">
<link rel="start" href="index.php" title="FAQ Contents">
<link rel="prev" href="index.php" title="FAQ Contents">
<link rel="next" href="install.php" title="Installation">
';

include "header.inc";
?>


<h1>Fink F.A.Q. - General Questions</h1>

<p><a name="what"><b>What is Fink?</b></a></p>

<p>Fink is actually two things in one (doesn't that sound great?
<tt>;-)</tt> ) - a compile-from-source package manager and a
distribution of Unix software for Mac OS X. The package manager is
built on top of dpkg, the binary package manager written by the <a
href="http://www.debian.org/">Debian GNU/Linux</a> project. (Older
versions used GNU stow.)</p>

<p><a name="naming"><b>What does the name Fink stand for?</b></a></p>

<p>Nothing, it's just a name. It's not even an acronym.</p>
<p>Well, actually Fink is the German name for Finch, a kind of
bird. I was looking for a name for the project, and the name of the
OS, Darwin, led me to think about Charles Darwin, the Galapagos
Islands and evolution. I remembered a piece about the so-called Darwin
Finches and their beaks from school, and well, that's it...</p>

<p><a name="proxy"><b>I'm behind a firewall. How do I configure Fink
to use an HTTP proxy?</b></a></p>

<p>Fink does not have a proxy setting because it lets <a
href="http://www.gnu.org/software/wget/wget.html">wget</a> do all the
downloading. To use a proxy, you must tell wget to use it. You can do
that by setting the environment variable <tt>http_proxy</tt>. See the
<a href="http://www.gnu.org/manual/wget/html_chapter/wget_8.html#SEC36">wget
manual</a> for details.</p>


<?
include "footer.inc";
?>
