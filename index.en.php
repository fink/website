<?
$title = "Home";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2011/07/27 20:24:17 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include "header.inc";
?>


<p>
The Fink project wants to bring the full world of Unix
<a href="http://www.opensource.org/">Open Source</a> software to
<a href="http://www.opensource.apple.com/">Darwin</a> and
<a href="http://www.apple.com/macosx/">Mac OS X</a>.
We modify Unix software so that it compiles and runs on Mac OS X
("port" it) and make it available for download as a coherent
distribution.
Fink uses <a href="http://www.debian.org/">Debian</a> tools like dpkg
and apt-get to provide powerful binary package management.
You can choose whether you want to download precompiled binary
packages or build everything from source.
<a href="about.php">Read more...</a>
</p>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1><a href="<? print $rdf_file; ?>" title="Subscribe to my feed, Fink Project News" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;News</h1>
<?
// Include news items
include "news/news.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=en">Older News...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-unstable" title="Fink Package Updates (Unstable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Recent Package Updates</h1>

<?  include "package-updates.inc" ?>

<a href="package-updates.php">more...</a>

<h1>Status</h1>
<? 
include "fink_version.inc";
?>

<p>
Fink <? print $fink_version ?> was released
on <? print convert_date_to_locale($release_date) ?>.  
This release includes source and binary packages 
as well as binary installers for both PowerPC and Intel, 
all intended for users of OS X version 10.5.
Fink 0.8.1 (for OS X 10.4), 0.7.2 (for OS X 10.3), 0.6.4 (for OS X 10.2),
 and 0.4.1 (for OS X 10.1) also remain available.
</p>
<p>
<strong>10.5 Support:</strong> 
Users are encouraged to update to OS 10.5.2 or later, via Software Update, in order to get bugfixes and enhancements for X11.  Further updates continue to be made available on the <a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">XQuartz Update Page.</a>
      </p>
<strong>10.6 Support:</strong> 
We are not currently supporting Xquartz on 10.6.
<strong>10.7 Support:</strong>
10.7 is supported, albeit with many missing packages.ß
We are not currently supporting Xquartz on 10.7.

<h1>Resources</h1>

<p>
If you're looking for support, check out the <a
href="help/index.php">help page</a>.
That page also lists various options to help the project and submit
feedback.
</p>
<p> 
If you are looking for the source files which correspond to
binaries distributed by the Fink project, please consult
<a href="download/sources_for_binaries.php">this page</a> for
instructions.
</p>
<p>
The Fink project is hosted by
<a href="http://sourceforge.net/">SourceForge</a>.
In addition to hosting this site and the downloads, SourceForge
provides the following resources for the project:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">SourceForge project summary page</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Report or view bugs</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Request a package that's not in Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Request a feature that's not in fink (the program)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Submit a new Fink package (non-core developers)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Submit a patch for fink (the program)</a></li>
<li><a href="lists/index.php">Mailing lists</a></li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">browse
online</a>, <a href="doc/cvsaccess/index.php">access instructions</a>)</li>
</ul>
<p>
Please note that to use some of these resources (ie, to report a bug or request a new Fink package), you
will need to be logged in to your SourceForge account.  If you do not have one, you can sign up for one
for free on the <a href="http://sourceforge.net/">SourceForge web site</a>.
</p>
<p>Additional resources hosted outside SourceForge include:</p>
<ul>
<li><a href="http://wiki.finkproject.org/">The Fink developer wiki</a> (now at a new location).</li>
</ul>

</td></tr></table>

<?
include "footer.inc";
?>
