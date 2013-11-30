<?
$title = "Home";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2013/11/30 19:13:58 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

require dirname(__FILE__) . "/header.inc";
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
require dirname(__FILE__) . "/news/news.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=en">Older News...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Fink Package Updates (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Recent Package Updates</h1>

<?  include "package-updates.inc" ?>

<a href="package-updates.php">more...</a>
</tr><tr valign="top"><td width="50%">
<h1>Status</h1>
<? 
include "fink_version.inc";
?>

<p>
Fink currently supports OS X 10.9 (Mavericks), 10.8 (Mountain Lion), 10.7 (Lion), and 10.6 (Snow Leopard),
and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="download/srcdist.php">source
release page</a>.
</p>
<p>Xcode must be installed before Fink.</p>  
<strong>10.9 Support:</strong> 
10.9 users must install Xcode version 5.0.1 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 5.0 for Mavericks (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>). 
<p>If you need X11 you should install Xquartz-2.7.4 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<strong>10.8 Support:</strong> 
10.8 users must install Xcode version 4.4 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 4.4 for Mountain Lion (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences). Note that if you had an 
earlier version of Xcode than 4.3 installed prior to updating from 10.7, you need 
to <b>uninstall</b> the old version first by running 
<i>/Developer/Library/uninstall-devtools</i>. 
You can determine your current version of Xcode by running 
<i>xcodebuild -version</i> .</p>
<p>If you need X11 you should install Xquartz-2.7.2 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<strong>10.7 Support:</strong> 
10.7 users must install or update Xcode to version 4.1 or later 
(via a free download from the AppStore), (version 4.6.3 is recommended) or must at least
install the Command Line Tools for 
Xcode 4.3 or later (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences (4.3 or later).  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall an outdated one, if needed.</p>
<p>We don't support Xquartz on 10.7, so don't remove Apple's official X11.</p>
<strong>10.6 Support:</strong>  For best results, 10.6 users are
encouraged to upgrade Xcode to version 3.2.6, or to version 4.2.1 if you
paid for a 4.x Developer preview.  Version 4.0.2 is known to have some
bugs in its linker that prevent certain packages from building.  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall it, if needed.</p>
<p>We don't support Xquartz on 10.6, so don't remove Apple's official X11.</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
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
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Submit a new Fink package (non-core developers)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Request a package that's not in Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Submit a patch for fink (the program)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Request a feature that's not in fink (the program)</a></li>
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
    <li>
        <a href="https://github.com/fink/fink">
            New github repository for the source code of the <code>fink</code> package manager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            New github repository for the <code>fink-mirrors</code> package.
        </a>
    </li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
