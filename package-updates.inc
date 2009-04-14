<?

include "XML/RSS.php";

$rss =& new XML_RSS("news/rdf/fink-unstable-no-splitoffs.rdf");
$rss->parse();

$count = 0;
foreach($rss->getItems() as $item) {
	$date = $item['dc:date'];
	$date = ereg_replace('T.*$', '', $date);
	echo "<a style=\"text-decoration: none\" href=\"" . htmlentities($item['link']) . "\" name=\"" . urlencode($item['title']) . "\"><span class=\"news-date\">" . $date . ": </span><span class=\"news-headline\">" . $item['title'] . "</span></a><br />\n";
	if (++$count > 10) {
		break;
	}
}

?>
