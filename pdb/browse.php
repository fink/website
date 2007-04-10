<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/04/10 04:55:24 $';
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 60 * 60) . " GMT");

include "header.inc";
?>

<h1>Browse packages</h1>

<p>
TODO: Write some text that fits here
</p>

<?
/*
TODO: more output: put the list into a table, one column with versions for each tree/distro,
  maybe the maintainer, etc.
  
TODO: Eventually make use of <label for="...">
*/



/*
Read and parse input parameters. The following keys/values are currently used
(where true/false are substituted by 0/1, and "empty" implies the default
value, which is the first in the list (usually "any"):
$maintainer  any, name
$dist  any, dist name
$section any, sectio name
$tree  any, stable, testing (=stable version outdated), unstable
$binary  any, true, false
$nochildren  any, true, false
*/


// This function generates a form popup, with the given label,
// variable name, current value, and list of possible values.
function genFormSelect($label, $var_name, $cur_val, $values) {
	echo $label;
	echo "<select NAME='$var_name'>\n";
	foreach ($values as $key => $val) {
		echo "  <option value='$key' ";
		if ($cur_val == $key) echo "selected";
		echo ">$val</option>\n";
	}
	echo "</select>\n";
	echo "<br>";
}

// Allowed values for certain fields
$tree_values = array(
		"any" => "any",
		"stable" => "stable",
		"testing" => "testing",
		"unstable" => "unstable"
	);
$sort_values = array(
	"ASC" => "Ascending",
	"DESC" => "Descending"
	);

// Load legal sections
$section_values = array("any" => "Any");
$query = "SELECT * FROM sections ORDER BY name ASC";
$rs = mysql_query($query, $dbh);
if (!$rs) {
	print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
	$seccount = mysql_num_rows($rs);
	while ($row = mysql_fetch_array($rs)) {
		$section_values[$row["name"]] = $row["name"] . " - " . $row["description"];
	}
}

// Read the maintainer field. We use basic HTML encoding for now, and cut off
// very long values, to make unforseen SQL injection hacks more difficult.
$maintainer = $_GET['maintainer'];
if (strlen($maintainer) > 15 || !preg_match("/^[a-zA-Z0-9@% ]+$/", $maintainer)) {
	$maintainer = "";
} else {
	$maintainer = htmlspecialchars($maintainer);
	if (strlen($maintainer) > 15 || !preg_match("/^[a-zA-Z0-9@ ]+$/", $maintainer))
		$maintainer = "";
}

// Extract the distribution
// TODO
//$dist = htmlspecialchars($_GET['dist']);

// Extract the tree
$tree = $_GET['tree'];
if (!isset($tree_values[$tree]))
	$tree = "any";

// Extract the section
$section = $_GET['section'];
if (!isset($section_values[$section]))
	$section = "any";

// List only binary packages, only non-binary packages, or all?
$binary = $_GET['binary'];
if ($binary != "1" and $binary != "0") $binary = "";

// 
$nochildren = $_GET['nochildren'];
if ($nochildren != "on") $nochildren = "off";

// 
$noshlibsdev = $_GET['noshlibsdev'];
if ($noshlibsdev != "on") $noshlibsdev = "off";

// Sort direction
$sort = $_GET['sort'];
if ($sort != "DESC") $sort = "ASC";

?>

<form action="browse.php" method="get" name="pdb_browser" id="pdb_browser">

<script language="javascript" type="text/javascript">
<!--
function list_unmaintained_packages() {
  document.pdb_browser.elements.maintainer.value="None"
}
//-->
</script>

Maintainer:
<input name="maintainer" type="text" value="<?=$maintainer?>">
(<a href="javascript:list_unmaintained_packages()">list packages without maintainer</a>)
<br>

<?
genFormSelect("Tree: ", "tree", $tree, $tree_values);
genFormSelect("Section: ", "section", $section, $section_values);
genFormSelect("Sort: ", "sort", $sort, $sort_values);
?>

<input name="nochildren" type="checkbox" <? if ($nochildren == "on") echo "checked";?>>
Exclude packages with parent (includes most "-dev", "-shlibs", ... splitoffs)
<br>

<input name="noshlibsdev" type="checkbox" <? if ($noshlibsdev == "on") echo "checked";?>>
Exclude -shlibs, -dev, -bin, -common, -doc packages 
<br>

<input name="submit" type="submit" value="Browse">
</form>


<?

//
// Build the big query string
//
$query = "SELECT name,version,revision,descshort FROM package WHERE ".
     "latest=1 "; // TODO: Should we really always specify latest=1 ??? probably not

if ($tree == "testing")	// TODO: Handle stable / unstable, too!
	$query .= "AND needtest=1 ";

if ($nochildren == "on")
	$query .= "AND parentname IS NULL ";

if ($noshlibsdev == "on")
	$query .= "AND !(name REGEXP '.*-(dev|shlibs|bin|common|doc)$') ";

if ($maintainer != "")
	$query .= "AND maintainer LIKE '%$maintainer%' ";

if ($section != "any") {
	if ($section == "games") {
		$sectionquery = " (section='$section' OR parentname REGEXP 'kdegames3|kdetoys3') ";
	} else if ($section == "graphics") {
		$sectionquery = " (section='$section' OR parentname='kdegraphics3') ";
	} else if ($section == "sound") {
		$sectionquery = " (section='$section' OR parentname='kdemultimedia3') ";
	} else if ($section == "utils") {
		$sectionquery = " (section='$section' OR parentname='kdeutils3') ".
		                " AND (parentname IS NULL OR parentname != 'webmin') ";
	} else {
		$sectionquery = " section='$section' ";
	}
	$query .= "AND $sectionquery ";
}


$query .= "ORDER BY name $sort";

$rs = mysql_query($query, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $count = mysql_num_rows($rs);
?>

<p>Found <? print $count ?> packages:</p>

<ul>
<?
  while ($row = mysql_fetch_array($rs)) {
    $desc = " - ".$row["descshort"];
    if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
      $desc = "";
    print '<li><a href="package.php/'.$row["name"].'">'.$row["name"].'</a> '.
      $row["version"].'-'.$row["revision"].$desc."</li>\n";
  }
?>
</ul>
<?
}
?>

<?
include "footer.inc";
?>
