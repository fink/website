<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/05 19:04:34 $';

ini_set("memory_limit", "48M");

// load javascript for pdb in header.inc
$pdb_scripts = true;

include_once "handle_options.inc";
include_once "header.inc";
include_once "memcache.inc";
include_once "functions.inc";
include_once "releases.inc";
include_once "sections.inc";

?>

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

<?
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
$dist_values = array('' => 'Any');
foreach ($distributions as $d) {
	if (!$showall and !$d->isVisible()) {
		continue;
	}
	$dist_values[$d->getId()] = $d->getDescription();
}

// Allowed values for certain fields
$tree_values = array(
		"" => "Any",
		"unstable" => "Unstable",
		"stable" => "Stable",
		"bindist" => "Binary Distribution",
		"testing" => "Packages that need testing"
	);
$sort_values = array(
	"asc" => "Ascending",
	"asc" => "Descending"
	);

$section_values = array( "" => "Any" );
foreach ($sections as $secname => $description) {
	$section_values[$secname] = $secname . ' - ' . $description;
}

?>
<form action="browse.php" method="get" name="pdb_browser" id="pdb_browser" onreset="resetForm();return false;">
<?if ($showall) print '<input name="showall" type="hidden" value="on">';?>
<br>
Summary:
<input name="summary" type="text" value="<?=stripslashes(stripslashes($summary))?>"> (Leave empty to list all)
<br>

<input name="submit" type="submit" value="Search">
<input type="reset" value="Clear Form">
<br>
<?if ($invalid_param) print '<p class="attention">Invalid Input Parameters.  ' . $invalid_param_text . '</p>';?>
<br>

<span class="expand_adv_options">
<a href="javascript:switchMenu('advancedsearch','triangle');" title="Advanced search options"><img src="<? echo $root ?>img/collapse.png" alt="" id="triangle" width="9" height="8">&nbsp;Advanced search options</a>
</span>
<br>

<div id="advancedsearch">

<table><tr>
<td>Package Name:</td>
<td><input name="name" type="text" value="<?=$name?>"> <input name="name_exact" type="checkbox" <? if ($name_exact) echo "checked"; ?>> Exact match </td>
</tr><tr>
<td>Maintainer:</td>
<td>
<input name="maintainer" type="text" value="<?=stripslashes(stripslashes($maintainer))?>" onChange="set_list_nomaintainer(this.value)">
<input name="nomaintainer" type="checkbox" onchange="list_unmaintained_packages(this.checked)"  <? if ($maintainer == "None") echo "checked";?>>
No maintainer
</td>
</tr>

<tr>
<td>Distribution:</td>
<td><?genFormSelect("dist", $dist, $dist_values);?></td>
</tr><tr>
<td>Tree:</td>
<td><?genFormSelect("tree", $tree, $tree_values);?></td>
</tr><tr>
<td>Section:</td>
<td><?genFormSelect("section", $section, $section_values);?></td>
</tr><tr>
<td>Sort order:</td>
<td><?genFormSelect("sort", $sort, $sort_values);?></td>
</tr></table>

<input name="nochildren" type="checkbox" <? if ($nochildren == "on") echo "checked";?>>
Exclude packages with parent (includes most "-dev", "-shlibs", ... splitoffs)
<br>

<input name="noshlibsdev" type="checkbox" <? if ($noshlibsdev == "on") echo "checked";?>>
Exclude -shlibs, -dev, -bin, -common, -doc packages 
<br>

</div>

</form>


<?

if ($nolist || $invalid_param) {
	include_once("footer.inc");
	exit(0);
}

$time_query_start = microtime(true);
$packages = $query->fetch();
$time_query_end = microtime(true);
if ($packages != null) {
	foreach ($packages as $id => $package) {
		if ($package['rel_type'] == "stable") {
			$package['version_stable'] = get_full_version($package);
		} elseif ($package->rel_type == "unstable") {
			$package['version_unstable'] = get_full_version($package);
		}
	}
}

if ($section == "testing") {
	foreach ($packages as $id => $ppackage) {
		if ($package['version_stable'] == $package['version_unstable'])
			unset($packages[$id]);
	}
}

$count = count($packages);

// Maybe display an overview of the search settings used to obtain the results here?
// Many seach servics (e.g. Google) do this: While the search settings are initially
// still visible in the widgets on the page, the user may have altered them.

?>
<p>
Found <?=$count?> 
package<?=($count==1 ? '' : 's')?><?=($maintainer=='None' ? ' without maintainer' : '')?><?=($tree=='testing' ? ' that need testing' : '')?>:
</p>
<?
	if ($count > 0) {
?>
<table class="pdb" cellspacing="2" border="0">
<?
	if ($tree == 'testing') {
		print '<tr class="pdbHeading"><th>Name</th><th>Version in unstable</th><th>Version in stable</th><th>Description</th></tr>';
	} 
	elseif ($tree && $dist) {
		print '<tr class="pdbHeading"><th>Name</th><th>Version</th><th>Description</th></tr>';
	}
	else {
		print '<tr class="pdbHeading"><th>Name</th><th>Latest Version</th><th>Description</th></tr>';
	}
	foreach ($packages as $id => $package) {
		print '<tr class="package">';
		print '<td class="packageName"><a href="package.php/'.$package['name'] . ($showall? '?showall=on' : '') . '">'.$package['name'].'</a></td>';
		if ($tree == 'testing') {
			print '<td>'.$p['version_unstable'].'</td>'.
						'<td>'.$p['version_stable'].'</td>';
		} else {
			print '<td class="packageName">'.get_full_version($package).'</td>';
		}
		print '<td>'.$package['descshort']."</td></tr>\n";
	}
?>
</table>
<? } // no packages to list ?>
<p>Query took <? printf("%.2f", $time_query_end - $time_query_start); ?> sec</p>

<?
include_once "footer.inc";
?>
