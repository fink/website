<?
$title = "Package Database";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2004/04/21 02:23:34 $';

include "header.inc";
include "releases.inc";
?>
  <STYLE TYPE="text/css">
.bgreen { background: green; display: inline; }
       
.bred { background: red; display: inline; }

.tiny {
  font-size: x-small;
  font-weight: bold;
}
  </STYLE>
  <hr>
<h3>Compare Trees</h3>
This search compares package names in two trees. 
It does not take versions into account.<br>

<form action="compare.php" method="GET">

<?PHP
$tree1 = 'current-10.2-gcc3.3-unstable';
if(param("tree1"))
	$tree1 = param("tree1");
$tree2 = 'current-10.3-unstable';
if(param("tree2"))
	$tree2 = param("tree2");
$cmp = 0;
if(param("cmp"))
	$cmp = param("cmp");
$splitoffs = 0;
if(param("splitoffs"))
	$splitoffs = param("splitoffs");
$sort = 'maintainer';
if(param("sort"))
	$sort = param("sort");

if(param("red"))
	$op = 3;
if(param("green"))
	$op = 2;
if(param("white"))
	$op = 1;

if($op) {
	foreach ($HTTP_POST_VARS as $argb) {	
		if (preg_match("/chg=([^!]+)!([^!]+)!([^!]+)/i", $argb, $matches)) {
			$name = $matches[1];
			$vers = $matches[2];
			$rev = $matches[3];
			$q = "UPDATE package SET needtest = ".($op - 1)." WHERE (release = '".$tree1.
			"' AND name='".$name."' AND version = '".$vers."' AND revision = '".$rev."')";	
			$rs2 = mysql_query($q, $dbh);
			if (mysql_errno()) {
				print '<p><b>errno $err error during UPDATE:</b> '.mysql_error().'</p>';
				die;
			}				
		}
	}
}
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
  print 'Sort: <SELECT name = sort>'.
  		'<option value=name '. ($sort ? 'selected>' : '>'). 'Package Name'.
  		'<option value=maintainer '. ($sort ? '>' : 'selected>'). 'Maintainer</SELECT>'; 
  
?>  
<input type="submit" value="Search">
</form>

<div tiny>
<form action="compare.php" method="POST">
<?PHP
}
$q = "SELECT name,maintainer,version,revision,needtest FROM package ".
  	 "WHERE release LIKE \"$tree1\" ".
  	 ($splitoffs ? '' : 'AND parentname IS NULL ').
  	 "ORDER BY \"$sort\" ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print "<p><b>error during query ".$q.':</b> '.mysql_error().'</p>';
} else {
  $count = mysql_num_rows($rs);

  print '<p>'.$count." Packages Found in $tree1</p>";
  $hitcount = 0;

#Special case for 10.2-gcc3.3 to 10.3 move
  if(! strcmp($tree1, "current-10.2-gcc3.3-unstable") && ! strcmp($tree2, "current-10.3-unstable") && $cmp == 0)
  {
  	$line = 0;
   	print "Key:<br><ul><li><div class=\"bgreen\">Will not be moved, obsolete or changed names</div><li><div class=\"bred\">Does not compile</div></ul>";
   	print "\"Wow, you know that's a lot of checkboxes\" - Check packages then click the buttons below to change a line's status.<br>";
  }
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
#			 $desc = " - ".$row[descshort];
#			if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
			  $desc = "";
			  
			$pkglist = $pkglist."<li>";			
			if($row[needtest] == 1) {
				$pkglist = $pkglist."<div class=\"bgreen\">";
				$green = 1;
				$red = 0;
			}	elseif($row[needtest] == 2) {
				$pkglist = $pkglist."<div class=\"bred\">";
				$red = 1;
				$green = 0;
			}
			#Special case for 10.2-gcc3.3 to 10.3 move
			if(! strcmp($tree1, "current-10.2-gcc3.3-unstable") && ! strcmp($tree2, "current-10.3-unstable") && $cmp == 0)
			{
				$line++;
				$pkglist = $pkglist . 
					"<input type=checkbox name=change-$line value=chg=".$row[name].'!'.$row[version].'!'.$row[revision].'>   '; 	
		#		$pkglist = $pkglist .  '<SELECT name = Status>'.
		#			"<option value=green+".$row[name].'+'.$row[version].'+'.$row[revision].'+green'. ($green ? 'selected>' : '>').'G'.
		#			"<option value=red+".$row[name].'+'.$row[version].'+'.$row[revision].'+red'. ($green ? '>' : 'selected>').'R</SELECT>'; 	
			}						
			if(! strcmp($sort, "maintainer"))
			$pkglist = $pkglist . $row[maintainer].'<a href="package.php/'.$row[name].'">'.$row[name].'</a> '.
			 $row[version].'-'.$row[revision].$desc . "\n";  
			else
			$pkglist = $pkglist . '<a href="package.php/'.$row[name].'">'.$row[name].'</a> '.
			 $row[version].'-'.$row[revision].$desc .' - '.$row[maintainer]."\n"; 

			if($row[needtest] > 0)
				$pkglist = $pkglist."</div>";
	
			$pkglist = $pkglist."</li>\n";
#			$pkglist = $pkglist."<br>";
  			$hitcount++;			
  		}
	} 
  }
  $pkglist = $pkglist . '</ul>';
  print "<br>Found $hitcount Packages in $tree1 that ". ($cmp ? 'are' : 'are not') .
  		" in $tree2$pkglist";
  		
	#Special case for 10.2-gcc3.3 to 10.3 move
	if(! strcmp($tree1, "current-10.2-gcc3.3-unstable") && ! strcmp($tree2, "current-10.3-unstable") && $cmp == 0)
	{
		print '<input type="hidden" name=tree1 value='.$tree1.'>';
		?>
		<input type="submit" name=green value="Set Green">
		<input type="submit" name=red value="Set Red">
		<input type="submit" name=white value="Set White">
		</form>
		</div>
		<?
	}
}
?>

<?
include "footer.inc"; 
?>
