<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/06 20:19:20 $';

// 2 hours, this page does not change much
$cache_timeout = 7200;

include_once "memcache.inc";
include_once "functions.inc";
include_once "releases.inc";
include_once "sections.inc";

ini_set("memory_limit", "24M");
$q = new SolrQuery();
$q->addQuery("dist_visible:true", true);
$update_date = handle_last_modified('pdb-last-modified', $q);

include_once "header.inc";

?>

<h1>Package Database Introduction</h1>

<p>
This database lists all available Fink packages.
It knows about the "stable" tree of the latest release and
about all packages in CVS ("current-stable" and "current-unstable").
Note that some packages are only available in the "unstable" tree.
</p>

<p>
<b>Read this:</b>
The above means that a default install of Fink will not recognize some
packages listed here.
That is because those packages are in a section of the archive called
"unstable" because they are not well-tested.
You can help improve the situation by testing those packages and
reporting both success and failure to the package maintainer.
The <a href="browse.php?tree=testing&amp;nochildren=on">Packages in Testing</a> page lists all
packages that still have to pass testing.
In order to test the packages, you need to configure Fink to <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">use
unstable</a> and then download the latest descriptions by running <i>fink selfupdate-rsync</i> 
(or <i>fink selfupdate-cvs</i> if you can't use rsync for some reason).
</p>
<p>Help is also needed to find new maintainers for the <a
href="browse.php?maintainer=None&amp;nochildren=on">packages without maintainers</a>.</p>

<?
$pkgcount    = memcache_get_key('pdb-package-count');

if (!$pkgcount) {
	$names = array();
	$q = new SolrQuery();
	$q->addQuery("dist_visible:true", true);
	$q->addField("name_e");
	$q->setUnique(true);
	$r = $q->fetch();
	if ($r != null) {
		$pkgcount = count($r);
		if ($pkgcount > 0) {
			memcache_set_key('pdb-package-count', $pkgcount);
		}
	}
}

$dyndate = date_create($update_date)->format('U');

$seccount = count($sections);

?>

<p>
The database was last updated <? print format_solr_date($update_date) ?> and currently lists
<? print $pkgcount ?> packages in <? print $seccount ?> sections.
</p>

<form action="browse.php" method="GET">
<p>Search for package: <input type="text" name="summary" size="15" value="">
<input type="submit" value="Search">
</p>
</form>

<p>
You can browse a <a href="browse.php">complete list of packages</a>,
or you can browse by archive section:
</p>

<ul>
<?
	foreach ($sections as $key => $value) {
		print '<li><a href="browse.php?section='.$key.'">'.$key.'</a>';
		if (!empty($value)) {
			print " - $value";
		}
		print "</li>\n";
	}
?>
</ul>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include_once "footer.inc";
?>
