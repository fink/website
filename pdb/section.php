<?
$title = "Package database - Section ";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/13 20:26:30 $';

$uses_pathinfo = 1;

include "header.inc";

include $fsroot."db.inc.php";
$dbh = mysql_pconnect($db_host, $db_user, $db_passwd);
mysql_select_db($db_name, $dbh);

$section = $pispec;
?>


<?
if ($section == "-") {
?>
<p><b>No section specified.</b></p>
<?
} else { /* if (no section) */
?>

<h1>Section <? print $section ?></h1>

<p>Packages in section <? print $section ?>:</p>

<ul>
<?

$q = "SELECT DISTINCT name FROM package WHERE section='$section' ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if ($rs) {
  while ($row = mysql_fetch_array($rs)) {
    print '<li><a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a></li>'."\n";
  }
} else {
  print '<li><b>error during query</b></li>';
}

?>
</ul>
<?
} /* if (no section) */
?>

<p><a href="<? print $pdbroot ?>index.php">Back to section list</a></p>


<?
include "footer.inc";
?>
