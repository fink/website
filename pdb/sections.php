<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/04/10 04:55:24 $';
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 60 * 60) . " GMT");

include "header.inc";
?>


<h1>Archive Sections</h1>

<p>
The package archive is divided into thematic sections.
That makes it easier to find the package you want.
Here are the sections:
</p>

<?
$q = "SELECT * FROM sections ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $seccount = mysql_num_rows($rs);
?>

<ul>
<?
  while ($row = mysql_fetch_array($rs)) {
    print '<li><a href="section.php/'.$row[name].'">'.$row[name].'</a>'.
      ($row[description] ? (' - '.$row[description]) : '').
      '</li>'."\n";
  }
?>
</ul>
<?
}
?>


<?
include "footer.inc";
?>
