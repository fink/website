<?
$title = "Package Database";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/20 17:42:30 $';

include "header.inc";

include $fsroot."db.inc.php";
$dbh = mysql_pconnect($db_host, $db_user, $db_passwd);
mysql_select_db($db_name, $dbh);
?>


<h1>Package Database</h1>

<p>
This database lists all available Fink packages.
It knows about the "stable" tree of the latest release and
about all packages in CVS ("current-stable" and "current-unstable").
Note that some packages are only available in the "unstable" tree.
</p>

<p>
You can browse the <a href="list.php">complete list of packages</a>,
or you can browse by section:
</p>
<ul>
<?

$q = "SELECT DISTINCT section FROM package ORDER BY section ASC";
$rs = mysql_query($q, $dbh);
if ($rs) {
  while ($row = mysql_fetch_array($rs)) {
    print '<li><a href="section.php/'.$row[section].'">'.$row[section].'</a></li>'."\n";
  }
} else {
  print '<li><b>error during query:</b> '.mysql_error().'</li>';
}

?>
</ul>


<?
include "footer.inc";
?>
