<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/06/21 16:20:04 $';

include "header.inc";
?>


<h1>All Packages By Name</h1>

<p>
This is a complete list of the packages in the Fink package database.
Note that it lists all packages, including the unstable tree and
the latest <a href="http://fink.sourceforge.net/doc/cvsaccess/index.php">packages from
CVS</a>.
</p>

<?
$q = "SELECT name,descshort FROM package ".
     "WHERE latest=1 ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $count = mysql_num_rows($rs);
?>

<p>Found <? print $count ?> packages:</p>

<ul>
<?
  while ($row = mysql_fetch_array($rs)) {
    $desc = " - ".$row[descshort];
    if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
      $desc = "";
    print '<li><a href="package.php/'.$row[name].'">'.$row[name].'</a>'.$desc."</li>\n";
  }
?>
</ul>
<?
}
?>

<?
include "footer.inc";
?>
