<?
$title = "Package Database - Section ";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/25 15:14:36 $';

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

$q = "SELECT name,descshort FROM package ".
     "WHERE section='$section' AND latest=1 ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if ($rs) {
  while ($row = mysql_fetch_array($rs)) {
    $desc = " - ".$row[descshort];
    if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
      $desc = "";
    print '<li><a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a>'.$desc."</li>\n";
  }
} else {
  print '<li><b>error during query:</b> '.mysql_error().'</li>';
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
