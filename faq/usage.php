<?
$title = "F.A.Q. - Usage";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/07 19:44:19 $';

$metatags = '<link rel="contents" href="index.php" title="FAQ Contents">
<link rel="start" href="index.php" title="FAQ Contents">
<link rel="prev" href="install.php" title="Installation">
<link rel="next" href="packages.php" title="Problems with certain packages">
';

include "header.inc";
?>


<h1>Fink F.A.Q. - Usage Questions</h1>

<p><a name="what-packages"><b>How can I find out what packages Fink supports?</b></a></p>

<p>For Fink 0.1.x, look in the fink/info directory, e.g.:
<pre>ls /sw/fink/info</pre></p>
<p>For Fink 0.2.x, you may want to try this:
<pre>find /sw/fink -name '*.info'</pre></p>


<?
include "footer.inc";
?>
