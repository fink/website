<?
$title = "Package database - Flat list";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/13 20:26:30 $';

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

$q = "SELECT DISTINCT name FROM package ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if ($rs) {
  while ($row = mysql_fetch_array($rs)) {
    print '<li><a href="package.php/'.$row[name].'">'.$row[name].'</a></li>'."\n";
  }
} else {
  print '<li><b>error during query</b></li>';
}

?>
</ul>


<?
include "footer.inc";
?>
