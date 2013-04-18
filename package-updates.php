<?
$title = "Recent Package Updates";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2013/04/18 23:31:29 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include "header.inc";
?>

<h1>Recent Package Updates</h1>

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
		echo "<a style=\"text-decoration: none\" href=\"" . htmlentities($item['link']) . "\" name=\"" . urlencode($item['title']) . "\"><span class=\"news-date\">" . $date . ": </span><span class=\"news-headline\" style=\"text-decoration: underline\">" . $item['title'] . "</span></a><br>\n";
		echo $item['description'];
	}
} else {
        echo "XML/RSS.php is missing. Please install php-xml-rss.<br/>";
}

include "footer.inc";
?>
