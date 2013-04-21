<?php
$title = "Fink Package RDF/RSS Feeds";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2013/04/21 09:13:45';
$metatags = '';

include_once "header.inc";

?>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
<h1>Fink Package RDF/RSS Feeds</h1>

<h2>Updated Packages By OS</h2>
<ul>
 <li>10.3 (<a href="http://feeds2.feedburner.com/FinkProjectNews-103-stable">Stable</a>) (<a href="http://feeds2.feedburner.com/FinkProjectNews-103-unstable">Unstable</a>)</li>
 <li>10.4-transitional (<a href="http://feeds2.feedburner.com/FinkProjectNews-104-transitional-stable">Stable</a>) (<a href="http://feeds2.feedburner.com/FinkProjectNews-104-transitional-unstable">Unstable</a>)</li>
 <li>10.4+ (<a href="http://feeds2.feedburner.com/FinkProjectNews-104-stable">Stable</a>) (<a href="http://feeds2.feedburner.com/FinkProjectNews-104-unstable">Unstable</a>)</li>
</ul>

<h2>Updated Packages By Tree</h2>
<ul>
 <li><a href="http://feeds2.feedburner.com/FinkProjectNews-stable">Stable</a></li>
 <li><a href="http://feeds2.feedburner.com/FinkProjectNews-unstable">Unstable</a></li>
</ul>

<h2>Backup Feeds, if feeds2.feedburner.com gets no updates</h2>
<ul>
 <li><a href="feed://<?php print $_SERVER["SERVER_NAME"]; ?>/news/rdf/fink-stable.rss">Stable</a></li>
 <li><a href="feed://<?php print $_SERVER["SERVER_NAME"]; ?>/news/rdf/fink-stable-no-splitoffs.rss">Stable without splitoffs</a></li>
<!-- <li><a href="feed://<?php print $_SERVER["SERVER_NAME"]; ?>/news/rdf/fink-stable.rss">Unstable</a></li> -->
<!-- <li><a href="feed://<?php print $_SERVER["SERVER_NAME"]; ?>/news/rdf/fink-unstable-no-splitoffs.rss">Unstable without splitoffs</a></li> -->
 <li><a href="feed://<?php print $_SERVER["SERVER_NAME"]; ?>/news/rdf/fink-experimental.rss">Experimental</a></li>
</ul>

</td></tr>
</table>
<?php
include_once "footer.inc";
?>
