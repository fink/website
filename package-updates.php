<?php
$title = "Recent Package Updates";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:09:50 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include "header.inc";
?>

<h1>Recent Package Updates</h1>

<?php
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
