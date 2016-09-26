<?php
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2016/09/26 13:59:26 $';

$uses_pathinfo = 1;
include_once "memcache.inc";
include_once "functions.inc";
include_once "releases.inc";
include_once "sections.inc";

if (isset($_SERVER["PATH_INFO"])) {
	$package = basename($_SERVER["PATH_INFO"]);
} else {
	$package = "";
}
$q = new pdbQuery();
$q->addQuery("name_e:\"$package\"", true);
handle_last_modified('pdb-last-modified-' . $package, $q);

$pdb_title = "Package Database - Package " . $package;

// Get url parameters
list($version, $inv_p) = get_safe_param('version', '/^[0-9\-.:]+$/');
list($distribution, $inv_p) = get_safe_param('distribution', '/^[a-z0-9\-.]+$/');
list($release, $inv_p) = get_safe_param('release', '/^[0-9.]{3,}$|^unstable$|^stable$/');
list($architecture, $inv_p) = get_safe_param('architecture', '/^powerpc$|^i386$|^x86_64$/');
list($rel_id, $inv_p) = get_safe_param('rel_id', '/^[[:alnum:]\-\_\.\:]+$/');
list($showall, $inv_p) = get_safe_param('showall', '/^on$/');
list($doc_id, $inv_p) = get_safe_param('doc_id', '/^[[:alnum:]\-\_\.\:]+$/');

$basicQuery = new pdbQuery();

$basicQuery->addSort("epoch desc");
$basicQuery->addSort("sort_version desc");
$basicQuery->addSort("infofilechanged desc");

$basicQuery->setRows(1);

$basicQuery->addQuery("name_e:\"$package\"", true);

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
		if (preg_match('/^([0-9\.]+)\-(.*)$/', $distribution, $matches)) {
			if ($matches[2] == 'gcc3.3') {
				$newdist = $distribution;
			} else {
				$newdist = $matches[1];
			}
		} else {
			$newdist = $distribution;
		}
		$fullQuery->addQuery("dist_name:\"$newdist\"", true);
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

$warning = '';
if ($result == null || count($result) == 0) { # No specific version found, try latest
	$result = $basicQuery->fetch();
	$warning = "<b>Warning: Package $package $version not found";
	$warning .= $distribution ? " in distribution $distribution" : '';
	$warning .= $architecture ? "-$architecture" : '';
	$warning .= $release ? "-$release" : '';
	$warning .= $rel_id ? " for selected release" : '';
	$warning .= "!</b>";
}

if ($result != null && count($result) != 0 && $result != "DBerror") {
	foreach ($result as $_r) {
		$pdb_title .= ' (' . htmlentities($_r['descshort']) . ')';
		break;
	}
}

include_once "header.inc";

if ($result == "DBerror") {
?>
<p><b>Warning: DBerror, try again later!</b></p>
<?php
unset($result);
} elseif ($result == null || count($result) == 0) { # No package found
?>
<p><b>Package '<?php echo $package?>' not found in Fink!</b></p>
<?php
} else {

	$pver = 0;
	$pkey = 0;
	foreach ($result as $k => $v) {
		if ($v['sort_version'] > $pver) {
			$pver = $v['sort_version'];
			$pkey = $k;
		}
	}
	$pobj = $result[$pkey];
	unset($result[$pkey]);
	unset($pver);
	unset($pkey);
	$fullversion = get_full_version($pobj);

?>
<h1>Package <?php print $pobj['name'] . '-' . $fullversion ?></h1>
<?php

// Functions Used in PDB
        
	function it_start() {
		echo '<table cellspacing="0" style="border-spacing:8px">';
	}
	
	function it_item($title, $item) {
		if ($title) {
			print '<tr valign="top"><td>'.$title.'</td><td>&nbsp;&nbsp;&nbsp;</td><td>'.
			$item.'</td></tr>'."\n";
		} else {
			print '<tr valign="top"><td colspan="3">'.$item.'</td></tr>'."\n";
		}
	}
	
	function it_end() {
		echo '</table>';
	}

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
		$pkg_str = '<a href="'. $pobj['name'] . '?doc_id=' . $pobj['doc_id'];
		if ($showall)
			$pkg_str .= '&amp;showall=on';
		$pkg_str .= '" title="' . get_descriptive_name($pobj) . '">'.$pobj['name'].'</a> ';
		if ($description)
			$pkg_str .= htmlentities($description);
		return $pkg_str;
	}


	print '<table class="pkgversion" cellspacing="2" border="0">'."\n";

	print '<tr bgcolor="#ffecbf">';
	print '<th width="100" align="center" valign="bottom" rowspan="2">System</th>';
	print '<th width="202" align="center" colspan="2">Source Distributions</th>';
	print '<th width="150" align="center" colspan="2">Binary Distributions</th>';
	print "</tr>\n";

	print '<tr bgcolor="#ffecbf">';
	print '<th width="100" align="center"><a href="http://feeds2.feedburner.com/FinkProjectNews-stable"><img src="' . $pdbroot . 'rdf.png" alt="stable RSS feed" border="0"  width="14" height="14"></a> stable</th>';
	print '<th width="100" align="center"><a href="http://feeds2.feedburner.com/FinkProjectNews-unstable"><img src="' . $pdbroot . 'rdf.png" alt="unstable RSS feed" border="0"  width="14" height="14"></a> unstable</th>';
	print '<th width="100" align="center">stable</th>';
	print '<th width="100" align="center">unstable</th>';
	print "</tr>\n";

	$color_count = 0;
	$last_dist_id = '';
	$has_unsupported_dists = false;

	global $distributions;
	global $releases;
	global $dists_to_releases;

	// make a gradient out of the colors for the display
	$dist_ids = array();
	foreach ($distributions as $dist) {
		$dist_ids[$dist->getId()]=1;
	}
	$color_last = count($dist_ids);
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
		$dist_id = $dist->getId();

		if ($last_dist_id != $dist_id) {
			$color_count++;
			if ($dist->isVisible() == TRUE) {
				$row_color='bgcolor="#' . dechex($colors[$color_count][0]) . dechex($colors[$color_count][1]) . dechex($colors[$color_count][2]) . '"';
			} else {
				$row_color='bgcolor="#ddbdbd"';
			}
		}

		if (!$showall && $dist->isVisible() == FALSE)
			continue;

		print "<tr $row_color>";

		if ($dist->isSupported()) {
			avail_td(nl2br($dist->getDescription()));
			$has_unsupported_dists = true;
		} else {
			avail_td(nl2br($dist->getDescription() . ' *'), '', 'color:gray; ');
		}

		if (!isset($rel_type)) $rel_type = "";
		$pkey = 'pdb-package-bundle-' . $pobj['name'] . '-' . $dist->getName() . '-' . $rel_type . '-' . $dist->getArchitecture() . $showall;
		$packagelist = memcache_get_key($pkey);
		if (!is_array($packagelist) || count($packagelist) == 0) {
			$packagelist = array();
			foreach(array("stable", "unstable", "bindist", "bindist-unstable") as $rel_type) {
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
//			if ($rel_type == "bindist") {
//				$pkginfo .= ' (bindist ' . $pack['rel_version'] . ')';
//			}
			avail_td($pkginfo);
		}

		$last_dist_id = $dist_id;
	}
	
	print "</table>\n";

	it_start();
	
	if ($warning)
		it_item('', $warning);

	it_item("Description:", htmlentities($pobj['descshort']) . " (" . $fullversion . ")");
	show_desc('', $pobj['desclong']);

	show_desc('Usage&nbsp;Hints:', $pobj['descusage']);

	### Fix for -EOL dirs
	$thissection = (preg_match('/^10\.[0-9]+-EOL/', $pobj['section'])?preg_replace('/^10\.[0-9]+-EOL\//', '', $pobj['section']):$pobj['section']);

	it_item("Section:", '<a href="'.$pdbroot.'browse.php?sec='.$thissection.'" title="' . $sections[$thissection] . '">'.$pobj['section'].'</a>');

	// Get the maintainer field, and try to parse out the email address
	if ($pobj['maintainer']) {
	$maintainers = $pobj['maintainer'];
	preg_match("/^(.+?)\s*<(\S+)>/", $maintainers, $matches);
		if (isset($matches[1])) $maintainer = $matches[1];
		if (isset($matches[2])) $email = $matches[2];
	} else {
		$maintainer = "unknown";
	}

	// If there was an email specified, make the maintainer field a mailto: link
	if (!isset($maintainer)) $maintainer = "unknown";
	if (isset($email)) {
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
		it_item("License:", '<a href="/doc/packaging/policy.php#licenses">'.$pobj['license'].'</a>');
	}
	if (!isset($pobj['parentname'])) $pobj['parentname'] = "";
	if ($pobj['parentname']) {
		$parentq = new pdbQuery();
		$parentq->addQuery('rel_id:"' . $pobj['rel_id'] . '"', true);
		$parentq->addQuery('pkg_id:"' . $pobj['parentname'] . '"', true);
		$parent = $parentq->fetch();
		if ($parent != null && count($parent) != 0) {
			$parentobj = array_shift($parent);
			it_item("Parent:", link_to_package($parentobj, $showall, '(' . $parentobj['descshort'] . ')'));
		} else {
			it_item("Parent:", $pobj['parentname']);
		}
	}
	if ($pobj['infofile'] && $pobj['rel_type'] != 'bindist') {
		# where the info file sits on a local Fink installation
		$infofile_path = $pobj['rcspath'];
		$infofile_cvs_url = 'http://fink.cvs.sourceforge.net/fink/'.$pobj['rcspath'];
		if ($pobj['rel_type'] == 'bindist')
			$infofile_tag = '?pathrev=' . $pobj['tag'];
		else
			$infofile_tag = '';
		$infofile_html  = '<a href="'.$infofile_cvs_url.$infofile_tag.($infofile_tag ? '&amp;' : '?').'view=markup" title="' . $pobj['name'] . ' info file">'.$infofile_path.'</a><br>';
		$infofile_html .= '<a href="'.$infofile_cvs_url.$infofile_tag.'?view=log" title="' . $pobj['name'] . ' CVS log">CVS log</a>, Last Changed: '. format_solr_date($pobj['infofilechanged']);
		it_item("Info-File:", $infofile_html);
	}
	if (isset($pobj['debarchive']) && $pobj['debarchive'] && $pobj['rel_type'] == 'bindist') {
		# where the deb archive file sits on a local Fink installation
		$debarchive_path = $pobj['debarchive'];
		$debarchive_url = 'http://bindist.finkmirrors.net/'.$pobj['debarchive'];
		$debarchive_html  = '<a href="'.$debarchive_url.'" title="' . $pobj['name'] . ' deb archive">'.$debarchive_path.'</a><br>';
		it_item("Deb Archive:", $debarchive_html);
	}

	$sq = new pdbQuery();
	$sq->setRows(1);
	$sq->addQuery('rel_id:"' . $pobj['rel_id'] . '"', true);
	$sq->addQuery('parentname_e:"' . $pobj['pkg_id'] . '"', true);
	$splitoffs = $sq->fetch();

	if ($splitoffs != null && count($splitoffs) != 0 && is_array($splitoffs)) {
		$contents = "<table>";
		foreach ($splitoffs as $doc) {
			$contents .= "<tr><td>" . link_to_package($doc, $showall) . "</td><td>" . $doc['descshort'] . "</td></tr>\n";
		}
		$contents .= "</table>\n";
		it_item("SplitOffs:", $contents);
	}

	it_end();
?>



<?php
} /* if (no package found) */
?>

<p><a href="<?php echo $pdbroot ?>sections.php">Section list</a> -
<a href="<?php echo $pdbroot ?>browse.php">Flat package list</a> -
<a href="<?php echo $pdbroot ?>browse.php?nolist=on">Search packages</a>
</p>


<?php
if (isset($has_unsupported_dists)) {
?>
<p>(*) = Unsupported distribution.</p>
<?php
}
include_once "footer.inc";
?>
