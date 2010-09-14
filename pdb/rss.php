<?
$title = "Package Database";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2010/09/14 19:29:17 $';

header("Content-type: text/xml");
if (!isset($cache_timeout)) $cache_timeout = 60 * 60;
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $cache_timeout) . " GMT");
header("Cache-Control: max-age=" . $cache_timeout . ", s-maxage=" . ($cache_timeout / 2));

ini_set("memory_limit", "48M");

include_once "memcache.inc";
include_once "functions.inc";
include_once "releases.inc";
include_once "sections.inc";
include_once "handle_options.inc";
include_once "feedcreator.inc";

$rss = new UniversalFeedCreator();

$url_root = "http://pdb.finkproject.org/pdb";
$rss->title = "Fink PDB";
$rss->description = "Fink Package Database RSS";
$rss->link = $url_root . "/browse.php?" . get_query_params();
$rss->syndicationURL = $url_root . "/rss.php?" . get_query_params();

$query->addField('doc_id');
$query->addField('pkg_id');
$query->addField('dist_id');
$query->addField('rel_id');
$query->addField('desclong');
$query->addField('infofilechanged');
$query->addField('maintainer');

if (!isset($_GET['limit']))
	$_GET['limit'] = 300;
$limit = $_GET['limit'];

$query->setRaw(true);
$query->setRows($limit);
$query->setSort(array("infofilechanged desc"));

$results = $query->fetch();

if (!isset($_GET['format']))
	$_GET['format'] = 'ATOM';
$format = strtoupper($_GET['format']);

if (isset($results) && $results->response->numFound > 0) {
	foreach ($results->response->docs as $package) {
		$description = $package->desclong;
		if (empty($package->desclong))
			$description = $package->descshort;

		$date = $package->infofilechanged;
		$date = rtrim($date, 'Z?');

		$title = $distributions[$package->dist_id]->getDescription() . ": " . $package->pkg_id;
		$title .= " (" . $package->descshort . ")";

		$item = new FeedItem();
		$item->title = $title;
		$item->link  = $url_root . "/package.php/" . $package->name . "?rel_id=" . $package->rel_id;
		$item->description = $description;
		$item->date = $date;
		$item->source = $url_root . "/rss.php?" . get_query_params();
		$item->author = $package->maintainer;
		$rss->addItem($item);
	}
}

echo $rss->createFeed($format);

?>
