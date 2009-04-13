<?
$title = "Recent Package Updates";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2009/04/13 18:24:35 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include "header.inc";
include "XML/RSS.php";
?>

<h1>Recent Package Updates</h1>

<?
#$rss =& new XML_RSS("http://feeds2.feedburner.com/FinkProjectNews-unstable");
$rss =& new XML_RSS("news/rdf/fink-10.4-unstable.rdf");
$rss->parse();

$count = 0;
foreach($rss->getItems() as $item) {
	$date = $item['dc:date'];
	$date = ereg_replace('T.*$', '', $date);
	echo "<a name=\"" . urlencode($item['title']) . "\"><span class=\"news-date\">" . $date . ": </span><span class=\"news-headline\">" . $item['title'] . "</span></a><br />\n";
	echo $item['description'];
}

include "footer.inc";
?>
