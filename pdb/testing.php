<?
$title = "Package Database";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/30 14:57:24 $';

include "header.inc";
?>


<h1>Packages in Testing</h1>

<p>
This is a list of packages that need testing, i.e. the version in
unstable is newer than the version in stable.
The list is based on the latest <a
href="../doc/cvsaccess/index.php">packages from CVS</a>.
</p>

<?
$q = "SELECT name,version,revision,descshort FROM package ".
     "WHERE needtest=1 ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $count = mysql_num_rows($rs);
?>

<p>Found <? print $count ?> testing packages:</p>

<ul>
<?
  while ($row = mysql_fetch_array($rs)) {
    $desc = " - ".$row[descshort];
    if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
      $desc = "";
    print '<li><a href="package.php/'.$row[name].'">'.$row[name].'</a> '.
      $row[version].'-'.$row[revision].$desc."</li>\n";
  }
?>
</ul>
<?
}
?>

<?
include "footer.inc";
?>
