<?php
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2016/09/21 13:31:26 $';

ini_set("memory_limit", "48M");

include_once "memcache.inc";
include_once "functions.inc";
include_once "finkinfo.inc";
include_once "releases.inc";

$invalid_param     = false;
$default_type      = 'contains';
$default_dist      = 'default';
$default_tree      = 'any';
$default_arch      = 'any';
$default_sort      = 'asc';

$pdb_title = "File Database - Search";

include_once "header.inc";
?>

<h1>Search for files</h1>

<p>
On this page you can search for files through all packages in the Fink package database,
optionally and at your direction narrowed down by various search parameters, set below.
</p>
<p>
information about all packages found in the respective latest stable and unstable binary distributions.
</p>

<?php
// This function generates a form popup, with the given
// variable name, current value, and list of possible values.
function genFormSelect($var_name, $cur_val, $values, $description = '') {
	echo "<select name='$var_name'>\n";
	foreach ($values as $key => $val) {
		echo "  <option value='$key' ";
		if ($cur_val == $key) echo "selected";
		echo ">$val</option>\n";
	}
	echo "</select>\n";
	echo $description ? " $description" : '';
	echo "<br>";
}

// Match type values
$type_values = array(
	'begins'	=> 'Begins with...',
	'contains'	=> 'Contains...',
	'ends'		=> 'Ends with...',
	'exact'		=> 'Exact Matches (Full Path)',
);

// Distribution values
$dist_values = array(
	'any'     => 'Any',
	'default' => 'Supported (10.9 through 10.15)',
);
foreach ($distributions as $d) {
	if (!$d->isVisible()) {
		continue;
	}
	$dist_values[$d->getName()] = $d->getName();
}

// Allowed values for certain fields
$arch_values = array(
	"any"     => "Any",
	"i386"    => "Intel (32-bit)",
	"x86_64"  => "Intel (64-bit)",
	"powerpc" => "PowerPC",
);

$tree_values = array(
	"any"      => "Any",
	"unstable" => "Unstable",
	"stable"   => "Stable",
	"current"  => "Current (Old Unstable &lt;= 10.5)",
);

$sort_values = array(
	"asc" => "Ascending",
	"desc" => "Descending"
);

if (!isset($_GET['search']))
	$_GET['search'] = "";
if (!isset($_GET['match_type']))
	$_GET['match_type'] = $default_type;
if (!isset($_GET['dist_name']))
	$_GET['dist_name'] = $default_dist;
if (!isset($_GET['tree']))
	$_GET['tree'] = $default_tree;
if (!isset($_GET['architecture']))
	$_GET['architecture'] = $default_arch;
if (!isset($_GET['sort']))
	$_GET['sort'] = $default_sort;
if (!isset($invalid_param_text))
	$invalid_param_text = "";
?>
<form action="filefind.php" method="get" name="pdb_filefind" id="pdb_filefind" onreset="location.href='/pdb/filefind.php';">
<?php if ($invalid_param) print '<p class="attention">Invalid Input Parameters.  ' . $invalid_param_text . '</p>';?>
<table><tr>
<td>Search string:</td>
<td><input id="search" name="search" type="text" value="<?php echo htmlentities($_GET['search']) ?>"> <?php genFormSelect("match_type", $_GET['match_type'], $type_values);?></td>
</tr>
<tr><td>Distribution:</td><td><?php genFormSelect("dist_name", $_GET['dist_name'], $dist_values);?></td></tr>
<tr><td>Architecture:</td><td><?php genFormSelect("architecture", $_GET['architecture'], $arch_values);?></td></tr>
<tr><td>Tree:</td><td><?php genFormSelect("tree", $_GET['tree'], $tree_values);?></td></tr>
<!-- <tr><td>Sort order:</td>  <td><?php // genFormSelect("sort", $_GET['sort'], $sort_values); ?></td></tr> -->
</table>
<input name="submit" type="submit" value="Search">
<input type="reset" value="Clear Form">
<br>

</form>


<?php

$time_query_start = microtime(true);
$matches = array();
if (!empty($_GET['search']))
	$matches = fink_file_search($_GET, $dist_values, $tree_values, $arch_values);
$time_query_end = microtime(true);

$count = count($matches);

// Maybe display an overview of the search settings used to obtain the results here?
// Many seach servics (e.g. Google) do this: While the search settings are initially
// still visible in the widgets on the page, the user may have altered them.

if (empty($_GET['search']) || $invalid_param || $count < 1) {
	if (!empty($_GET['search']) && $count < 1) {
?>
<br>
No Matches found, please try again <a href="http://pdb.finkproject.org/pdb/filefind.php">Search</a><br/>
<?php
	}

	include_once("footer.inc");
	exit(0);
}

?>
<h1>
Matched <?php echo $count?>
</h1>
<table class="pdb" cellspacing="2" border="0">
<?php
	print '<tr class="pdbHeading"><th width="50">Dist</th><th width="50">Tree</th><th width="50">Arch</th><th width="200">Package Name</th><th>Path/File</th></tr>';
	foreach ($matches as $id => $package) {
		$release = $dists_to_releases[$package['dist'].'-'.$package['arch']]['bindist'.(($package['tree'] == 'unstable' || $package['tree'] == 'current')?'-unstable':($package['tree'] == 'stable'?'':$package['tree']))];
		print '<tr class="package">';
		print '<td class="packageDist">'.$package['dist'].'</td>';
		print '<td class="packageTree">'.$package['tree'].'</td>';
		print '<td class="packageArch">'.$package['arch'].'</td>';
		print '<td class="packageName"><a href="' . $pdbroot . 'package.php/'.trim($package['name']).'?rel_id='.$release.'">'.$package['name'].'</a></td>';
		print '<td>'.htmlentities($package['match'])."</td></tr>\n";
	}
?>
</table>
<p>Query took <?php printf("%.2f", $time_query_end - $time_query_start); ?> sec</p>

<?php
include_once "footer.inc";

function fink_file_search($get, $dists, $trees, $archs) {
	if (empty($get['search']))
		return array();

	if ($get['dist_name'] == 'any') {
		unset($dists['any']);
		unset($dists['default']);
	} else if ($get['dist_name'] == 'default') {
		unset($dists);
		$dists['10.9'] = '10.9';
		$dists['10.10'] = '10.10';
		$dists['10.11'] = '10.11';
		$dists['10.12'] = '10.12';
		$dists['10.13'] = '10.13';
		$dists['10.14'] = '10.14';
		$dists['10.14.5'] = '10.14.5';
		$dists['10.15'] = '10.15';
	} else {
		unset($dists);
		$dists[$get['dist_name']] = $get['dist_name'];
	}

	if ($get['architecture'] == 'any') {
		unset($archs['any']);
	} else {
		unset($archs);
		$dists[$get['architecture']] = $get['architecture'];
	}

	if ($get['tree'] == 'any') {
		unset($trees['any']);
	} else {
		unset($trees);
		$dists[$get['tree']] = $get['tree'];
	}

	$opts = "";
	foreach ($dists as $dist => $val)
		$opts .= "-d " . $dist . " ";
	foreach ($trees as $tree => $val)
		$opts .= "-t " . $tree . " ";
	foreach ($archs as $arch => $val)
		$opts .= "-a " . $arch . " ";

	$opts .= "-s ~web5/sources.d/ -- find -x ";

	$prefix = '';
	$suffix = '';
	if (isset($get['match_type'])) {
		switch($get['match_type']) {
			case 'begins':
				$prefix = '^';
				break;
			case 'ends':
				$suffix = '$';
				break;
			case 'exact':
				$prefix = '^';
				$suffix = '$';
				break;
		}
	}

	$opts .= escapeshellcmd($prefix.$get['search'].$suffix);

	$cmd = "~web5/fink-file " . $opts;

	exec($cmd, $results, $return);

	return parse_fink_file_results($results);
}

function parse_fink_file_results($results) {
	$parsed = array();

	foreach ($results as $result) {
		$parts = explode(":", $result);
		$subparts = explode("-", $parts[0]);

		$match = array(
			'name'		=> $parts[1],
			'dist'		=> $subparts[0],
			'tree'		=> $subparts[1],
			'arch'		=> $subparts[3],
			'match'		=> $parts[2],
		);

		array_push($parsed, $match);
	}

	return $parsed;
}
?>
