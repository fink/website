<?
$title = "F.A.Q. - Relations";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/03/03 14:31:29';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-fink.php" title="Installing, Using and Maintaining Fink"><link rel="prev" href="general.php" title="General Questions">';

include "header.inc";
?>

<h1>F.A.Q. - 2 Relations with Other Projects</h1>


<a name="upstream">
<div class="question"><p><b>Q2.1: Do you contribute your patches
back to the upstream maintainers?</b></p></div>
<div class="answer"><p><b>A:</b> 
We're trying to.
Sometimes sending patches back is easy and everyone is happy once the
next release of the package is out.
Unfortunately with most packages it's not that easy.
Some common problems:
</p><ul>
<li>The Fink package maintaner is very busy and doesn't have the time
to send the patch and accompanying explanations to the upstream
maintainers.</li>
<li>The upstream maintainers reject the patch. There are lots of valid
reasons for this. Most upstream maintainers have a strong interest in
clean code, clean configure checks, and compatibility with other
platforms.</li>
<li>The upstream maintainers accept the patch, but it takes some weeks
or months until they release a new version of their package.</li>
<li>The package has been abhandoned by the original authors and there
will be no new releases into which the patch could be merged.</li>
</ul></div>
</a>
<a name="debian">
<div class="question"><p><b>Q2.2: What is your relation with the
Debian project? Are you porting Debian Linux to Mac OS X?</b></p></div>
<div class="answer"><p><b>A:</b> 
There is no formal relation between Fink and
<a href="http://www.debian.org">Debian</a>.
Fink is <b>not</b> a port of the Debian GNU/Linux distribution.
We have ported Debian's package management tools (dpkg, dselect,
apt-get) though, and use these tools and the .deb binary package
format.
The actual packages are tailor-made for Mac OS X / Darwin and don't
use the Debian source package format.
</p></div>
</a>
<a name="apple">
<div class="question"><p><b>Q2.3: What is your relation with
Apple?</b></p></div>
<div class="answer"><p><b>A:</b> 
<a href="http://www.apple.com/">Apple</a> is aware of Fink and
has given us some support as part of their Open Source relations
efforts.
In the summer and fall of 2001, they provided us with pre-release seeds of
new Mac OS X 
versions in the hope that Fink packages can be adapted in time for the
release.
Quote:
<b>&quot;Hopefully it underscores the commitment that many suspect we're
not willing to provide.  We'll get better at the open source game over
time.&quot;</b>
Thanks Apple!
</p></div>
</a>
<a name="openosx">
<div class="question"><p><b>Q2.4: What is your relation with
OpenOSX.com?</b></p></div>
<div class="answer"><p><b>A:</b> 
They used Fink to build the first release of their GIMP CD and refuse
to acknowledge that properly.
Read the <a href="http://fink.sourceforge.net/pr/openosx.php">public
statement</a> for details.
</p></div>
</a>
<a name="forked">
<div class="question"><p><b>Q2.5: What is your relation with macosx.forked.net?</b></p></div>
<div class="answer"><p><b>A:</b> 
That site redistributes some Fink packages as Installer.app packages,
unchanged but with their own boilerplate that doesn't mention Fink.
Read the <a href="http://fink.sourceforge.net/pr/forked.php">public
statement</a> for details.
</p></div>
</a>
<a name="darwinports">
	<div class="question"><p><b>Q2.6: What is your relation with Darwinports?</b></p></div>
	<div class="answer"><p><b>A:</b> 
			Darwinports and fink are complementary projects. There is some
			overlap between the two projects, and several people contribute to
			both the Fink and Opendarwin projects. For example, Benjamin Reed
			is doing the KDE packages for both. Darwinports/Opendarwin makes
			use of patches from fink, and we have discussed collaboration
			on a new depenency engine.
		</p><p>
			Opendarwin started from scratch to try a different approach to a
			packaging system. Read the statement on <a href="http://www.opendarwin.org/projects/darwinports/en/faq.php">Opendarwin.org</a>
			for details.
		</p></div>
</a>

<p align="right">
Next: <a href="usage-fink.php">3 Installing, Using and Maintaining Fink</a></p>


<?
include "footer.inc";
?>

