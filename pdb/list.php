<?
$title = "Package Database";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/25 15:14:36 $';

include "header.inc";

include $fsroot."db.inc.php";
$dbh = mysql_pconnect($db_host, $db_user, $db_passwd);
mysql_select_db($db_name, $dbh);
?>


<h1>Package Database</h1>

<p>This is a complete list of the packages in the Fink package
database.</p>

<ul>
<?

$q = "SELECT name,descshort FROM package ".
     "WHERE latest=1 ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if ($rs) {
  while ($row = mysql_fetch_array($rs)) {
    $desc = " - ".$row[descshort];
    if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
      $desc = "";
    print '<li><a href="package.php/'.$row[name].'">'.$row[name].'</a>'.$desc."</li>\n";
  }
} else {
  print '<li><b>error during query:</b> '.mysql_error().'</li>';
}

?>
</ul>


<?
include "footer.inc";
?>
