<?
$title = "Fink";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/30 11:11:49 $';

include "header.inc";
?>


<p>Fink is an attempt to bring the full world of Unix Open Source
software to <a href="http://www.opensource.apple.com/">Darwin</a> and
<a href="http://www.apple.com/macosx/">Mac OS X</a>. Think of it as an
add-on distribution (in the Linux sense) for these systems. Once it is
more mature, Fink might evolve into a general package manager and
add-on distribution suitable for all Unix variants.</p>

<p>Fink is actually two things in one. One part is the program
<tt>fink</tt>, which is a package manager that creates binary packages
(in .deb format) from source tarballs it downloads off the
Internet. Installation of the binary packages is performed through
<tt>dpkg</tt>, the package manager developed for <a
href="http://www.debian.org/">Debian GNU/Linux</a>. The other part of
Fink is the distribution itself, that is the package descriptions and
the infrastructure.</p>

<h2>Resources</h2>

<p>This project is hosted by <a
href="http://sourceforge.net">SourceForge</a>.  Have a look at the <a
href="http://sourceforge.net/projects/fink/">project summary</a> there
for project resources. Here are some quick links:</p>
<ul>
<li><a href="lists.php">Mailing lists</a></li>
<li><a href="http://sourceforge.net/tracker/?group_id=17203&atid=117203">Bug
Tracker</a></li>
<li><a href="http://sourceforge.net/tracker/?atid=367203&group_id=17203&func=browse">Feature
Request Tracker</a> (use this for package manager features)</li>
<li><a href="http://sourceforge.net/tracker/?atid=371315&group_id=17203&func=browse">Package
Request Tracker</a> (use this for packages that you want ported /
included in the Fink distribution)</li>
<li><a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink/">CVS
Repository</a> (via ViewCVS)</li>
<li><a href="http://sourceforge.net/project/showfiles.php?group_id=17203">Download
Area</a></li>
</ul>

<h2>Feedback</h2>

<p>Fink is still under development, so I appreciate feedback that
helps me improve Fink. You can send it my way at <a
href="mailto:fink@chrisp.de">fink@chrisp.de</a>. Keep in mind that,
like most people on this planet, I'm usually quite busy. If you need
help with using or troubleshooting Fink, a better place to ask is the
<a href="lists.php">users mailing list</a>.</p>


<?
include "footer.inc";
?>
