<?php
$title = "Package Database - Package ";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/06 20:19:20 $';

$uses_pathinfo = 1;
include_once "memcache.inc";
include_once "functions.inc";
include_once "releases.inc";
include_once "sections.inc";

$package = basename($HTTP_SERVER_VARS["PATH_INFO"]);
$q = new SolrQuery();
$q->addQuery("name_e:\"$package\"", true);
handle_last_modified('pdb-last-modified-' . $package, $q);

include_once "header.inc";

// Get url parameters
list($version, $inv_p) = get_safe_param('version', '/^[0-9\-.:]+$/');
list($distribution, $inv_p) = get_safe_param('distribution', '/^[a-z0-9\-.]+$/');
list($release, $inv_p) = get_safe_param('release', '/^[0-9.]{3,}$|^unstable$|^stable$/');
list($architecture, $inv_p) = get_safe_param('architecture', '/^powerpc$|^i386$/');
list($rel_id, $inv_p) = get_safe_param('rel_id', '/^[[:alnum:]\-\_\.\:]+$/');
list($showall, $inv_p) = get_safe_param('showall', '/^on$/');
list($doc_id, $inv_p) = get_safe_param('doc_id', '/^[[:alnum:]\-\_\.\:]+$/');

$basicQuery = new SolrQuery();

$basicQuery->addSort("dist_priority desc");
$basicQuery->addSort("rel_priority desc");
$basicQuery->addSort("epoch desc");
$basicQuery->addSort("version_e desc");
$basicQuery->addSort("revision_e desc");

$basicQuery->addQuery("name_e:\"$package\"", true);
if (!$showall) {
	$basicQuery->addQuery("dist_visible:true", true);
}

$fullQuery = clone $basicQuery;

if ($version) {
	list($epoch, $version, $revision) = parse_version($version);
	if ($epoch != null)
		$fullQuery->addQuery("epoch:$epoch", true);
	if ($version != null)
		$fullQuery->addQuery("version_e:\"$version\"", true);
	if ($revision != null)
		$fullQuery->addQuery("revision_e:\"$revision\"", true);
}

if ($doc_id) {
	$fullQuery->addQuery("doc_id:\"$doc_id\"", true);
} elseif ($rel_id) {
	$fullQuery->addQuery("rel_id:\"$rel_id\"", true);
} else { // no need to parse the other parameters
	if ($distribution) {
		$fullQuery->addQuery("dist_name:\"$distribution\"", true);
	}
	if ($release) {
		if ($release == 'unstable' || $release == 'stable') {
			$fullQuery->addQuery("rel_type:$release", true);
		} else {
			$fullQuery->addQuery("rel_version:\"$release\"", true);
		}
	}
	if ($architecture) {
		$fullQuery->addQuery("dist_architecture:$architecture", true);
	}
}

$result = $fullQuery->fetch();

// print_r($result);
// exit(0);

$warning = '';
if ($result == null || count($result) == 0) { # No specific version found, try latest
	$result = $basicQuery->fetch();
	error_reporting($error_level);
	$warning = "<b>Warning: Package $package $version not found";
	$warning .= $distribution ? " in distribution $distribution" : '';
	$warning .= $architecture ? "-$architecture" : '';
	$warning .= $release ? "-$release" : '';
	$warning .= $rel_id ? " for selected release" : '';
	$warning .= "!</b>";
}

if ($result == null || count($result) == 0) { # No package found
?>
<p><b>Package '<?=$package?>' not found in Fink!</b></p>
<?
} else {

	$pobj = array_shift($result);
	$fullversion = get_full_version($pobj);

?>
<h1>Package <? print $pobj['name'] . '-' . $fullversion ?></h1>
<?

	function avail_td($text='', $extras='', $extra_div_style='') {
		print '<td align="center" valign="top" ' . $extras . '>';
		print '<div style="white-space:nowrap; ' . $extra_div_style . ' ">' . $text . '</div>';
		print '</td>';
	}
	
	function show_desc($label, $text) {
		$text = htmlentities($text);
		if ($text) {
			# Try to detect urls
			$text = preg_replace('/http:\/\/[^ &:]+/', '<a href="${0}">${0}</a>', $text);
			$text = str_replace("\\n", "\n", $text);
			$text = '<div class="desc">' . $text . '</div>';
			if ($label)
				it_item($label, '');
			it_item('', $text);
		}
	}

	function version_tags($p) {
		global $showall;
		global $pobj;

		if ($p['version'] == $pobj['version'] && $p['rel_id'] == $pobj['rel_id']) {
			$open_tag = '<b>';
			$close_tag = '</b>';
		} else {
			$open_tag = '<a href="' . $p['name'] . '?rel_id=' . $p['rel_id'];
			if ($showall)
				$open_tag .= "&amp;showall=on";
			$open_tag .= '" title="' . get_descriptive_name($p) . '">';
			$close_tag = '</a>';
		}
		return array ( $open_tag, $close_tag );
	}

	function get_descriptive_name($pobj, $escape_entities = true) {
		$pkg_str = $pobj['name'] . ' ' . get_full_version($pobj) . ' (' . $pobj['descshort'] . ')';
		if ($escape_entities) {
			$pkg_str = htmlentities($pkg_str);
		}
		return $pkg_str;
	}

	function link_to_package($pobj, $showall = false, $description = '') {
		$pkg_str = '<a href="'. $pobj['name'] . '?doc_id' . $pobj['doc_id'];
		if ($showall)
			$pkg_str .= '&amp;showall=on';
		$pkg_str .= '" title="' . get_descriptive_name($pobj) . '">'.$package.'</a> ';
		if ($description)
			$pkg_str .= htmlentities($description);
		return $pkg_str;
	}


	print '<table class="pkgversion" cellspacing="2" border="0">'."\n";

	print '<tr bgcolor="#ffecbf">';
	print '<th width="100" align="center" valign="bottom" rowspan="2">System</th>';
	print '<th width="150" align="center" valign="bottom" rowspan="2">Binary Distributions</th>';
	print '<th width="202" align="center" colspan="2">CVS/rsync Source Distributions</th>';
	print "</tr>\n";

	print '<tr bgcolor="#ffecbf">';
	print '<th width="100" align="center"><a href="http://feeds.feedburner.com/FinkProjectNews-stable"><img src="' . $pdbroot . 'rdf.png" alt="stable RSS feed" border="0"  width="14" height="14"></a> stable</th>';
	print '<th width="100" align="center"><a href="http://feeds.feedburner.com/FinkProjectNews-unstable"><img src="' . $pdbroot . 'rdf.png" alt="unstable RSS feed" border="0"  width="14" height="14"></a> unstable</th>';
	print "</tr>\n";

	$color_count = 0;
	$last_dist_name = '';
	$has_unsupported_dists = false;

	global $distributions;
	global $releases;
	global $dists_to_releases;

	// make a gradient out of the colors for the display
	$dist_names = array();
	foreach ($distributions as $dist) {
		$dist_names[$dist->getName()]++;
	}
	$color_last = count($dist_names) - 1;
	#$dark  = array(227, 202, 255);
	$dark  = array(174, 160, 198);
	$light = array(246, 236, 255);
	$colors = array();
	foreach (range($color_count, $color_last) as $number) {
		$color = array();
		foreach (range(0, 2) as $index) {
			$dark_color = $dark[$index];
			$light_color = $light[$index];

			$difference = $light_color - $dark_color;
			array_push($color, round($dark_color + ($difference / $color_last * $number)));
		}
		array_push($colors, $color);
	}

	foreach (array_reverse($distributions) as $dist) {
		$dist_name = $dist->getName();

		if ($last_dist_name != $dist_name) {
			$color_count++;
			$row_color='bgcolor="#' . dechex($colors[$color_count][0]) . dechex($colors[$color_count][1]) . dechex($colors[$color_count][2]) . '"';
		}

		if (!$showall && !$dist->isVisible())
			continue;

		print "<tr $row_color>";

		if ($dist->isSupported()) {
			avail_td(nl2br($dist->getDescription()));
			$has_unsupported_dists = true;
		} else {
			avail_td(nl2br($dist->getDescription() . ' *'), '', 'color:gray; ');
		}

		$pkey = 'pdb-package-bundle-' . $pobj['name'] . '-' . $dist->getName() . '-' . $rel_type . '-' . $dist->getArchitecture() . $showall;
		$packagelist = memcache_get_key($pkey);
		if (!is_array($packagelist) || count($packagelist) == 0) {
			$packagelist = array();
			foreach(array("bindist", "stable", "unstable") as $rel_type) {
				$pack = fetch_package($pobj['name'], null, $dist->getName(), $rel_type, $dist->getArchitecture(), $showall);
				array_push($packagelist, $pack);
			}
			memcache_set_key($pkey, $packagelist);
		}
		foreach ($packagelist as $pack) {
			if ($pack == null) {
				avail_td("&nbsp;");
				continue;
			}
			if (is_array($pack) && !isset($pack['doc_id'])) {
				$pack = array_pop($pack);
			}
			list($open_tag, $close_tag) = version_tags($pack);
			$pkginfo = $open_tag . get_full_version($pack) . $close_tag;
			if ($rel_type == "bindist") {
				$pkginfo .= ' (bindist ' . $pack['rel_version'] . ')';
			}
			avail_td($pkginfo);
		}

		$last_dist_name = $dist_name;
	}
	
	print "</table>\n";

	print "<br>";

	it_start();
	
	if ($warning)
		it_item('', $warning);

	it_item("Description:", htmlentities($pobj['descshort']) . " (" . $fullversion . ")");
	show_desc('', $pobj['desclong']);

	show_desc('Usage&nbsp;Hints:', $pobj['descusage']);

	it_item("Section:", '<a href="'.$pdbroot.'browse.php?section='.$pobj['section'].'" title="' . $sections[$pobj['section']] . '">'.$pobj['section'].'</a>');

	// Get the maintainer field, and try to parse out the email address
	if ($pobj['maintainer']) {
	$maintainers = $pobj['maintainer'];
	preg_match("/^(.+?)\s*<(\S+)>/", $maintainers, $matches);
		$maintainer = $matches[1];
		$email = $matches[2];
	} else {
		$maintainer = "unknown";
	}

	// If there was an email specified, make the maintainer field a mailto: link
	if ($email) {
		$email = str_replace(array("@","."), array("AT","DOT"), $email);
		it_item("Maintainer:", '<a href="'.$pdbroot.'browse.php?maintainer='.$maintainer.'">'.$maintainer.' &lt;'.$email.'&gt;'.'</a>');
#    it_item("Maintainer:", '<a href="mailto:'.$email.'">'.$maintainer.'</a>');
	} else {
		it_item("Maintainer:", '<a href="'.$pdbroot.'browse.php?maintainer='.$maintainer.'">'.$maintainer.'</a>');
	}
	if ($pobj['homepage']) {
		it_item("Website:", '<a href="'.$pobj['homepage'].'" title="' . $pobj['name'] . ' home page">'.$pobj['homepage'].'</a>');
	}
	if ($pobj['license']) {
		it_item("License:", '<a href="http://fink.sourceforge.net/doc/packaging/policy.php#licenses">'.$pobj['license'].'</a>');
	}
	if ($pobj['parentname']) {
		$parentq = new SolrQuery();
		$parentq->addQuery('rel_id:"' . $pobj['rel_id'] . '"', true);
		$parentq->addQuery('pkg_id:"' . $pobj['parentname'] . '"', true);
		$parent = $parentq->fetch();
		if ($parent != null && count($parent) != 0) {
			$parentobj = array_shift($parent);
			it_item("Parent:", link_to_package($parentobj, $showall));
		} else {
			it_item("Parent:", $pobj['parentname']);
		}
	}
	if ($pobj['infofile']) {
		# where the info file sits on a local Fink installation
		$infofile_path = $pobj['rcspath'];
		$infofile_cvs_url = 'http://fink.cvs.sourceforge.net/fink/'.$pobj['rcspath'];
		if ($pobj['rel_type'] == 'bindist')
			$infofile_tag = '?pathrev=' . $pobj['tag'];
		else
			$infofile_tag = '';
		$infofile_html  = '<a href="'.$infofile_cvs_url.$infofile_tag.($infofile_tag ? '&amp;' : '?').'view=markup" title="' . $pobj['name'] . ' info file">'.$infofile_path.'</a><br>';
		$infofile_html .= '<a href="'.$infofile_cvs_url.$infofile_tag.'" title="' . $pobj['name'] . ' CVS log">CVS log</a>, Last Changed: '. format_solr_date($pobj['infofilechanged']);
		it_item("Info-File:", $infofile_html);
	}

	$sq = new SolrQuery();
	$sq->addQuery('rel_id:"' . $pobj['rel_id'] . '"', true);
	$sq->addQuery('parentname_e:"' . $pobj['pkg_id'] . '"', true);
	$splitoffs = $sq->fetch();

	if ($splitoffs != null && count($splitoffs) != 0) {
		$contents = "<table>";
		foreach ($splitoffs as $doc) {
			$contents .= "<tr><td>" . link_to_package($doc, $showall) . "</td><td>" . $doc['descshort'] . "</td></tr>\n";
		}
		$contents .= "</table>\n";
		it_item("SplitOffs:", $contents);
	}

	it_end();
?>



<?
} /* if (no package found) */
?>

<p><a href="<? print $pdbroot ?>sections.php">Section list</a> -
<a href="<? print $pdbroot ?>browse.php">Flat package list</a> -
<a href="<? print $pdbroot ?>browse.php?nolist=on">Search packages</a>
</p>


<?
if ($has_unsupported_dists) {
?>
<p>(*) = Unsupported distribution.</p>
<?
}
include_once "footer.inc";
?>
