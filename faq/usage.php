<?
$title = "F.A.Q. - Usage";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/04/27 17:05:49 $';

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
