<?

$incfile = "/usr/share/php/XML/RSS.php";

if (file_exists($incfile)) {
	include "$incfile";

	$rss = new XML_RSS("news/rdf/fink-stable-no-splitoffs.rdf");
	$rss->parse();

	$count = 0;
	foreach($rss->getItems() as $item) {
		$date = $item['dc:date'];
		$date = preg_replace('|T.*$|', '', $date);
		echo "<a style=\"text-decoration: none\" href=\"" . htmlentities($item['link']) . "\" name=\"" . urlencode($item['title']) . "\"><span class=\"news-date\">" . $date . ": </span><span class=\"news-headline\">" . $item['title'] . "</span></a><br>\n";
		if (++$count > 20) {
			break;
		}
	}
} else {
	echo "XML/RSS.php is missing. Please install php-xml-rss.<br/>";
}
?>
