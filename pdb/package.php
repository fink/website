<?
$title = "Package Database - Package ";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/30 14:57:24 $';

$uses_pathinfo = 1;
include "header.inc";
$package = $pispec;
?>


<?
if ($package == "-") {
?>
<p><b>No package specified.</b></p>
<?
} else { /* if (no package) */
?>

<h1>Package <? print $package ?></h1>

<?

$q = "SELECT * FROM package WHERE name='$package' ORDER BY latest DESC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $firstrow = $row = mysql_fetch_array($rs);
  $rmap = array();
  while ($row) {
    $rmap[$row[release]] = $row[version]."-".$row[revision];
    $row = mysql_fetch_array($rs);
  }
  $row = $firstrow;

  it_start();

  $releases = array("0.2.6-stable", "current-stable", "current-unstable");
  for ($i = 0; $i < sizeof($releases); $i++) {
    $cr = $releases[$i];
    it_item("<nobr>In $cr:</nobr>", $rmap[$cr] ? "Version ".$rmap[$cr] : "not present");
  }

  it_item("Description:", $row[desclong]);
  it_item("Section:", '<a href="'.$pdbroot.'section.php/'.$row[section].'">'.$row[section].'</a>');
  it_item("Maintainer:", $row[maintainer] ? $row[maintainer] : "unknown");
  if ($row[homepage]) {
    it_item("Website:", '<a href="'.$row[homepage].'">'.$row[homepage].'</a>');
  }

  it_end();
?>



<?
} /* if (SQL error) */
} /* if (no package) */
?>

<p><a href="<? print $pdbroot ?>sections.php">Section list</a> -
<a href="<? print $pdbroot ?>list.php">Flat package list</a></p>


<?
include "footer.inc";
?>
