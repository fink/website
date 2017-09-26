<?php
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2016/09/21 13:31:26 $';

ini_set("memory_limit", "48M");

// load javascript for pdb in header.inc
$pdb_scripts = true;

include_once "memcache.inc";
include_once "functions.inc";
include_once "releases.inc";
include_once "sections.inc";
include_once "handle_options.inc";

handle_last_modified('pdb-browse-last-modified', $query);

$pdb_title = "Package Database - Browse";
$desc = get_query_description();
if (!empty($desc)) $pdb_title .= htmlentities(" ($desc)");

include_once "header.inc";
?>

<!-- query = <?php echo str_replace('-->', '', $query) ?> -->
<h1>Browse packages</h1>

<p>
On this page you can browse through all packages in the Fink package database,
optionally and at your direction narrowed down by various search parameters, set below.
</p>
<p>
This database includes
information about all packages found in the respective latest stable and unstable trees.
Furthermore, all packages from the most recent binary distributions are covered.
</p>

<?php
/*
TODO: more output: put the list into a table, one column with versions for each tree/distro,
  maybe the maintainer, etc.
  
TODO: Eventually make use of <label for="...">
*/

// This function generates a form popup, with the given
// variable name, current value, and list of possible values.
function genFormSelect($var_name, $cur_val, $values, $description = '') {
	echo "<select NAME='$var_name'>\n";
	foreach ($values as $key => $val) {
		echo "  <option value='$key' ";
		if ($cur_val == $key) echo "selected";
		echo ">$val</option>\n";
	}
	echo "</select>\n";
	echo $description ? " $description" : '';
	echo "<br>";
}

// Distribution values
$dist_values = array(
	'any'     => 'Any',
	'default' => 'Supported (10.9 through 10.13)',
);
foreach ($distributions as $d) {
	if (!$showall and !$d->isVisible()) {
		continue;
	}
	$dist_values[$d->getName()] = $d->getName();
}

// Allowed values for certain fields
$arch_values = array(
	""        => "Any",
	"i386"    => "Intel (32-bit)",
	"x86_64"  => "Intel (64-bit)",
	"powerpc" => "PowerPC",
);

$tree_values = array(
	"any"      => "Any",
	"unstable" => "Unstable",
	"stable"   => "Stable",
	"bindist"  => "Binary Distribution",
	"testing"  => "Packages that need testing"
);

$sort_values = array(
	"asc" => "Ascending",
	"desc" => "Descending"
);

$section_values = array( "" => "Any" );
foreach ($sections as $secname => $description) {
	$section_values[$secname] = $secname . ' - ' . $description;
}

if (!isset($_GET['summary'])) {
	$_GET['summary'] = "";
}
if (!isset($_GET['maintainer'])) {
	$_GET['maintainer'] = "";
}
if (!isset($_GET['name'])) {
	$_GET['name'] = "";
}
if (!isset($invalid_param_text)) {
	$invalid_param_text = "";
}
?>
<form action="browse.php" method="get" name="pdb_browser" id="pdb_browser" onreset="resetForm();return false;">
<?php if ($showall) print '<input name="showall" type="hidden" value="on">';?>
<br>
Summary:
<input name="summary" type="text" value="<?php echo htmlentities($_GET['summary']) ?>"> (Leave empty to list all)
<br>

<input name="submit" type="submit" value="Search">
<input type="reset" value="Clear Form">
<br>
<?php if ($invalid_param) print '<p class="attention">Invalid Input Parameters.  ' . $invalid_param_text . '</p>';?>
<br>

<span class="expand_adv_options">
<a href="javascript:switchMenu('advancedsearch','triangle');" title="Advanced search options"><img src="<?php echo $linkroot ?>img/collapse.png" alt="" id="triangle" width="9" height="8">&nbsp;Advanced search options</a>
</span>
<br>

<div id="advancedsearch">

<table><tr>
<td>Package Name:</td>
<td><input name="name" type="text" value="<?php echo htmlentities($_GET['name']) ?>"> <input name="name_exact" type="checkbox" <?php if ($name_exact) echo "checked" ?>> Exact match </td>
</tr><tr>
<td>Maintainer:</td>
<td>
<input name="maintainer" type="text" value="<?php echo htmlentities($_GET['maintainer'])?>" onChange="set_list_nomaintainer(this.value)">
<input name="nomaintainer" type="checkbox" onchange="list_unmaintained_packages(this.checked)"  <?php if ($maintainer == "None") echo "checked";?>>
No maintainer
</td>
</tr>

<tr><td>Distribution:</td><td><?php genFormSelect("dist_name",    $dist_name, $dist_values);?></td></tr>
<tr><td>Architecture:</td><td><?php genFormSelect("architecture", $architecture, $arch_values);?></td></tr>
<tr><td>Tree:</td>        <td><?php genFormSelect("tree",         $tree, $tree_values);?></td></tr>
<tr><td>Section:</td>     <td><?php genFormSelect("sec",          $sec, $section_values);?></td></tr>
<!-- <tr><td>Sort order:</td>  <td><?php // genFormSelect("sort",         $sort, $sort_values); ?></td></tr> -->
</table>

<input name="nochildren" type="checkbox" <?php if ($nochildren == "on") echo "checked";?>>
Exclude packages with parent (includes most "-dev", "-shlibs", ... splitoffs)
<br>

<input name="noshlibsdev" type="checkbox" <?php if ($noshlibsdev == "on") echo "checked";?>>
Exclude -shlibs, -dev, -bin, -common, -doc packages 
<br>

<input name="depends" type="hidden" value="<?php echo $depends ?>">
<input name="builddepends" type="hidden" value="<?php echo $builddepends ?>">
</div>

</form>


<?php

if ($nolist || $invalid_param) {
	include_once("footer.inc");
	exit(0);
}

$time_query_start = microtime(true);
$packages = $query->fetch();
$time_query_end = microtime(true);

if ($tree == "testing") {
	# Report all packages that have a *different* version in unstable than in stable.
	# (We really want package that have a *newer* version in unstable, but for simplicity
	# we just check whether the versions differ.)
	$newpackages = array();
	if ($packages != null) {
		foreach ($packages as $id => $package) {
			if (!isset($newpackages[$package['name']]))
				$newpackages[$package['name']] = $package;
			if ($package['rel_type'] == "stable") {
				$newpackages[$package['name']]['version_stable'] = get_full_version($package);
			} elseif ($package['rel_type'] == "unstable") {
				$newpackages[$package['name']]['version_unstable'] = get_full_version($package);
			}
			unset($packages[$id]);
		}
	}
	foreach ($newpackages as $id => $package) {
		if (!isset($package['version_unstable'])) $package['version_unstable'] = "";
		if (!isset($package['version_stable'])) $package['version_stable'] = "";

		# If the package has the same versions in stable and unstable,
		# or if the package is not at in unstable, then the package is
		# not in testing -> remove it from the list.
		if (($package['version_stable'] == $package['version_unstable'])
			or ($package['version_unstable'] == ""))
			unset($newpackages[$id]);
	}
	$packages = $newpackages;
	unset($newpackages);
}

$count = count($packages);

// Maybe display an overview of the search settings used to obtain the results here?
// Many seach servics (e.g. Google) do this: While the search settings are initially
// still visible in the widgets on the page, the user may have altered them.

?>
<h1>
Matched <?php echo $count?> 
package<?php echo ($count==1 ? '' : 's')?><?php echo ($maintainer=='None' ? ' without maintainer' : '')?><?php echo ($tree=='testing' ? ' that need testing' : '')?>
<?php
	$qdesc = get_query_description();
	if (!empty($qdesc)) {
		print ' (' . $qdesc . ')';
	}
?>
</h1>
<?php
	if ($count > 0) {
?>
<table class="pdb" cellspacing="2" border="0">
<?php
	if ($tree == 'testing') {
		print '<tr class="pdbHeading"><th>Name</th><th>Version in unstable</th><th>Version in stable</th><th>Description</th></tr>';
	} 
	elseif ($tree && $dist) {
		print '<tr class="pdbHeading"><th>Name</th><th>Version</th><th>Description</th></tr>';
	}
	else {
		print '<tr class="pdbHeading"><th>Name</th><th>Latest Version</th><th>Description</th></tr>';
	}
	if (!is_array($packages)) {
		print '<tr class="package">';
		print 'Invalid query: ';
		print 'Please try again: <a href="http://pdb.finkproject.org/pdb/browse.php?nolist=on">Search</a></tr><br/>';
	} else {
		foreach ($packages as $id => $package) {
			if (!isset($package['version_stable'])) $package['version_stable'] = "";
			if (!isset($package['version_unstable'])) $package['version_unstable'] = "";
			print '<tr class="package">';
			print '<td class="packageName"><a href="' . $pdbroot . 'package.php/'.$package['name'] . ($showall? '?showall=on' : '') . '">'.$package['name'].'</a></td>';
			if ($tree == 'testing') {
				print '<td>'.$package['version_unstable'].'</td>'.
							'<td>'.$package['version_stable'].'</td>';
			} else {
				print '<td class="packageName">'.get_full_version($package).'</td>';
			}
			print '<td>'.htmlentities($package['descshort'])."</td></tr>\n";
		}
	}
?>
</table>
<?php } // no packages to list ?>
<p>Query took <?php printf("%.2f", $time_query_end - $time_query_start); ?> sec</p>

<?php
include_once "footer.inc";
?>
