<?
$title = "Package database";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/13 20:26:30 $';

include "header.inc";

include $fsroot."db.inc.php";
$dbh = mysql_pconnect($db_host, $db_user, $db_passwd);
mysql_select_db($db_name, $dbh);
?>


<h1>Package Database</h1>

<p><a href="list.php">Flat list of all packages</a></p>

<p>Browse by section:</p>

<ul>
<?

$q = "SELECT DISTINCT section FROM package ORDER BY section ASC";
$rs = mysql_query($q, $dbh);
if ($rs) {
  while ($row = mysql_fetch_array($rs)) {
    print '<li><a href="section.php/'.$row[section].'">'.$row[section].'</a></li>'."\n";
  }
} else {
  print '<li><b>error during query</b></li>';
}

?>
</ul>


<?
include "footer.inc";
?>
