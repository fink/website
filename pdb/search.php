<?
$title = "Package Database - Package Search";
$cvs_author = '$Author: dmalloc $';
$cvs_date = '$Date: 2003/11/23 16:44:58 $';

$have_key = isset($s);
$key = $s;

include "header.inc";
?>


<?
$key = ereg_replace(" ", "", $key);

if (ereg("[^a-zA-Z0-9_.+-]", $key)) {
?>

<h1>Package Search</h1>

<!-- IndexTools Customization Code -->
<!-- Added Temprorarily by dmalloc -->
<!-- Remove leading // to activate custom variables -->
<script language="Javascript">
var DOCUMENTGROUP='PDB';
var DOCUMENTNAME='pdb_search';
//var ACTION='';
</script>
<!-- End of Customization Code --><!-- IndexTools Code v3.01 - All rights reserved -->
<script language="javascript1.1" src="../indextools.js"></script><noscript>
<img src="http://stats.indextools.com/p.pl?a=100048449005&js=no" width="1" height="1"></noscript><!--//-->
<!-- End of IndexTools Code -->




<form action="search.php" method="GET">
<p>Search for package: <input type="text" name="s" size="15" value="">
<input type="submit" value="Search">
</p>
</form>

<p>You have entered a search text that contains invalid characters.</p>

<?
} else {  /* $key valid */
?>

<h1>Package Search</h1>

<form action="search.php" method="GET">
<p>Search for package: <input type="text" name="s" size="15" value="<?
print $key ?>">
<input type="submit" value="Search">
</p>
</form>

<?
if ($key) {
  $q = "SELECT name,descshort FROM package ".
       "WHERE (name LIKE '%$key%' OR descshort LIKE '%$key%') ".
       "AND latest=1 ORDER BY name ASC";
  $rs = mysql_query($q, $dbh);
  if (!$rs) {
    print '<p><b>error during query:</b> '.mysql_error().'</p>';
  } else {
    $count = mysql_num_rows($rs);

    if ($count == 0) {
?>
<p>Found no packages that match "<? print $key ?>".</p>
<?
    } elseif ($count == 1) {
?>
<p>Found 1 package that matches "<? print $key ?>":</p>
<?
    } else {
?>
<p>Found <? print $count ?> packages that match "<? print $key ?>":</p>
<?
    }
    if ($count > 0) {
?>
<ul>
<?
      while ($row = mysql_fetch_array($rs)) {
        $desc = " - ".$row[descshort];
        if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
          $desc = "";
        print '<li><a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a>'.$desc."</li>\n";
      }
?>
</ul>
<?
    }
  }
} elseif ($have_key) {
?>

<p>No search string entered.</p>

<?
}


}  /* $key valid */
?>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
