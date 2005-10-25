<?
$title = "Package Database - Maintainer ";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2005/10/25 00:57:52 $';

include "header.inc";
?>

<?
if (!isset($_GET['maintainer'])) {
?>
<p><b>No maintainer specified.</b></p>
<?
} else { /* if (no maintainer) */
$maintainer = htmlspecialchars($_GET['maintainer']);
?>

<h1>Packages maintained by <? print $maintainer ?></h1>

<?
$q = "SELECT name,descshort FROM package WHERE maintainer LIKE '%$maintainer%'".
	 " AND !(name REGEXP '.*-(dev|shlibs|bin|common|doc)$') ".
     "AND latest=1 ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $count = mysql_num_rows($rs);

?>

<p>Found <? print $count ?> packages maintained by <? print $maintainer ?>:</p>

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

} /* if (no maintainer) */
?>

<!-- <p><a href="<? print $pdbroot ?>sections.php">Back to section list</a></p> -->


<?
include "footer.inc";
?>
