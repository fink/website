<?
$title = "Package Database - Contents Search";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/09/10 19:37:21 $';

include "header.inc";

$summary = ereg_replace(" ", "", param(summary));
$filename = ereg_replace(" ", "", param(filename));

if (ereg("[^a-zA-Z0-9_.+-]", $summary) || ereg("[^a-zA-Z0-9_.+-]", $filename)) {
print "yes\n";
?>
	<h1>Package Search</h1>
	
	<form action="search.php" method="GET">
	<p>Search package summaries: <input type="text" name="summary" size="15" value="<?
	print $summary ?>">
	</p>

<?
if (param(c))
{
?>
	<p>Search package contents: <input type="text" name="filename" size="15" value="<?
	print $filename ?>">
	<input type="submit" value="Search">
	</p>
<?
}
?>
</form>

<p>You have entered a search text that contains invalid characters.</p>

<?
} else {  /* $search_key valid */
?>

	<h1>Package Search</h1>
	
	<form action="search.php" method="GET">
	<p>Search package summaries: <input type="text" name="summary" size="15" value="<?
	print $summary ?>">
	</p>

<?
if (param(c))
{
?>
	<p>Search package contents: <input type="text" name="filename" size="15" value="<?
	print $filename ?>">
	<input type=checkbox name=ignoredirs>Ignore Dirs
	<input type="submit" value="Search">
	</p>
<?
}
?>

</form>

<?

if(param(order)) {
	$sortorder = param(order);
	print "order $sortorder ";
} else {
	if(param(filename)) 
		$sortorder = "filename";
	else if (param(summary))
		$sortorder = "name";
}

if (param(filename)) {

  if(param(ignoredirs)){
	$directories = " AND fileperms REGEXP '^[^d]' ";
  }
  $dosearch = 1;
  $q = "SELECT filename,filepath,fileperms,filesize,pkghash,version,contentspackages.package,contentspackages.release ".
		"FROM contents,contentspackages ".
	   "WHERE contents.file_id=contentspackages.file_id ".
       "AND filename LIKE '%$filename%' ". $directories .
       "ORDER BY $sortorder";
	   # ASC LIMIT 0,50";       
} else if (param(summary)) {
  $dosearch = 1;
  $q = "SELECT name,descshort FROM package ".
       "WHERE (name LIKE '%$summary%' OR descshort LIKE '%$summary%') ".
       "AND latest=1 ORDER BY $sortorder ASC";
} 

if($dosearch) {

  $rs = mysql_query($q, $dbh);
  if (!$rs) {
    print '<p><b>error during query:</b> '.mysql_error().'</p>';
  } else {
    $count = mysql_num_rows($rs);
		param(summary) ? $search_key = param(summary) : $search_key = param(filename);
    if ($count == 0) {
	    print "<p>Found no packages that match $search_key.</p>";
    } elseif ($count == 1) {
		print "<p>Found 1 package that matches $search_key:</p>";
    } else {
		print "<p>Found $count packages that match $search_key:</p>";
    }
    if ($count > 0) {
		if(param(filename)) {
			print 'Sort: <a href="'.$pdbroot."search.php?filename=$filename&summary=$summary&order=package\">Package</a> - ";
			print '<a href="'.$pdbroot."search.php?filename=$filename&summary=$summary&order=filepath,filename\">Filename</a>";
		} else {
			print 'Sort: <a href="'.$pdbroot."search.php?filename=$filename&summary=$summary&order=name\">Package</a> - ";
			print '<a href="'.$pdbroot."search.php?filename=$filename&summary=$summary&order=descshort\">Summary</a>";
		}
		
	  print "<ul>";	  while ($row = mysql_fetch_array($rs)) {
		$row["name"] ? $name = $row["name"] : $name = $row["package"];
		$vers = $row["version"];
		$tree = $row["release"];
        $row[descshort] ? $desc = " - $row[descshort]" : $desc = " - $vers - $row[filepath]";
		if(! param(summary)) {
        	print '<li><a href="'.$pdbroot."packagedetails.php?tree=$tree&pkg=$name&version=$vers\">".$name.'</a>'.$desc."</li>\n";
        } else {
	        print '<li><a href="'.$pdbroot."package.php/$name\">".$name.'</a>'.$desc."</li>\n";
	    }
      }
	print "</ul>\n";
    }
  }
} elseif ($have_key) {
	print "<p>No search string entered.</p>\n";
}


}  /* $search_key valid */
?>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
