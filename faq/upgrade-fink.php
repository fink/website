<?
$title = "F.A.Q. - Upgrading Fink";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/02/12 15:25:16';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-fink.php" title="Installing, Using and Maintaining Fink"><link rel="prev" href="relations.php" title="Relations with Other Projects">';

include "header.inc";
?>

<h1>F.A.Q. - 3 Upgrading Fink (version-specific troubleshooting)</h1>


<a name="gcc-0.16.0">
<div class="question"><p><b>Q3.1: I just upgraded to 0.16.0 and it tells me "Your version of the
gcc 3.3 compiler is out of date." What do I do?</b></p></div>
<div class="answer"><p><b>A:</b> As of the release of Panther, Fink has been updated to understand
the newer gcc 3.3 compiler. In order to be able to support users
on both 10.2 (Jaguar) and 10.3 (Panther), we are requiring all users
to install the latest gcc 3.3 update (August 2003 Updater, and the
Panther XCode tools, respectively). You will get this warning if
you installed the earlier XCode beta updater for Mac OS X 10.2's
December 2002 developer tools. If you're on 10.2, the command:
</p><pre>gcc --version</pre><p>...should tell you what version you have. As of October 24th,
2003, we require build 1493 or higher.</p><p>10.2 users can download the August 2003 Updater from <a href="http://developer.apple.com/">Apple Developer Connection</a>
(free registration required).</p><p>10.3 users should upgrade to a Panther-compatible developer tools
release (i.e. XCode). A CD with XCode should have been provided
with your Panther media.</p></div>
</a>
<p align="right">
Next: <a href="usage-fink.php">4 Installing, Using and Maintaining Fink</a></p>


<?
include "footer.inc";
?>

