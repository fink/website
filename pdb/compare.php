<?
$title = "Package Database";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2002/12/26 00:05:07 $';

include "header.inc";
include "releases.inc";
?>

  <hr>
<h3>Compare Trees</h3>
This search compares package names in two trees. 
It does not take versions into account.<br>

<form action="compare.php" method="GET">

<?PHP
if(!isset($tree1))
  $tree1 = 'current-unstable';
if(!isset($tree2))
  $tree2 = 'current-stable';
if(!isset($cmp))
  $cmp = 0;
if(!isset($splitoffs))
  $splitoffs = 0;

$q = "SELECT * FROM release";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print "<p><b>error during query ".$q.':</b> '.mysql_error().'</p>';
} else {
  while ($row = mysql_fetch_array($rs)) { 
    $menu = $menu . '<option value="'. $row['name']. '" '.
    		(strcmp($row['name'], $tree1) ? '>' : 'selected>').
    		$row['name'];
    $menu2 = $menu2 . '<option value="'. $row['name']. '" '.
    		(strcmp($row['name'], $tree2) ? '>' : 'selected>').
    		$row['name'];
	}
		
  print "Show packages in:<SELECT name = tree1>" . $menu . '</SELECT>';
  print 'that <SELECT name = cmp>'.
  		'<option value=1 '. ($cmp ? 'selected>' : '>'). 'are'.
  		'<option value=0 '. ($cmp ? '>' : 'selected>'). 'are not</SELECT>'; 
  print 'in:<SELECT name = tree2>' . $menu2 . '</SELECT>';
  print "<input type=checkbox name=\"splitoffs\" ".
  		($splitoffs ? 'checked>' : '>').
  		"Include Splitoffs<br>";
?>  
<input type="submit" value="Search">
</form>
<?PHP
}
$q = "SELECT * FROM package ".
  	 "WHERE release LIKE \"$tree1\" ".
  	 ($splitoffs ? '' : 'AND parentname IS NULL ').
  	 "ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print "<p><b>error during query ".$q.':</b> '.mysql_error().'</p>';
} else {
  $count = mysql_num_rows($rs);

  print '<p>'.$count." Packages Found in $tree1</p>";
  $hitcount = 0;

  $pkglist = $pkglist . '<ul>';  
  while ($row = mysql_fetch_array($rs)) {
	$q2 = "SELECT name FROM package ".
      "WHERE release LIKE \"$tree2\" AND name=\"" . $row['name'] . '"';	
	$rs2 = mysql_query($q2, $dbh);
	if (!$rs2) {
	  print "<p><b>error during query ".$q2.':</b> '.mysql_error().'</p>';
	} else {
  		$count = mysql_num_rows($rs2);
  		$hit = 0;
		if($cmp == 0) {
  			# are NOT - count will be 0
			if($count == 0) $hit = 1;
		} else {
			# are - count > 0
			if($count > 0) $hit = 1;
 		}
 		
  		if($hit)
  		{
			 $desc = " - ".$row[descshort];
			if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
			  $desc = "";
			$pkglist = $pkglist . '<li><a href="package.php/'.$row[name].'">'.$row[name].'</a> '.
			  $row[version].'-'.$row[revision].$desc . "</li>\n";
			  
  			$hitcount++;			
  		}
	} 
  }
  $pkglist = $pkglist . '</ul>';
  print "Found $hitcount Packages in $tree1 that ". ($cmp ? 'are' : 'are not') .
  		" in $tree2<p><ul> $pkglist";
?>


<?
}
?>

<?
include "footer.inc";
?>
