<?
$title = "Package Database - Section ";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2002/12/09 05:43:42 $';

$uses_pathinfo = 1;
include "header.inc";
$section = $pispec;
?>

<?
if ($section == "-") {
?>
<p><b>No section specified.</b></p>
<?
} else { /* if (no section) */
?>

<h1>Archive Section <? print $section ?></h1>

<?
/* Add some special case bundle splitoffs */	
if($section == "games")
{
  $sectionquery = " (section='$section' OR parentname REGEXP 'kdegames3|kdetoys3') ";
} else if($section == "graphics")
{	
  $sectionquery = " (section='$section' OR parentname='kdegraphics3') ";
} else if($section == "sound")
{	
  $sectionquery = " (section='$section' OR parentname='kdemultimedia3') ";
} else if($section == "utils")
{	
  $sectionquery = " (section='$section' OR parentname='kdeutils3') ".
  				  " AND !(parentname LIKE 'webmin') ";
} else
$sectionquery = " section='$section' ";

$q = "SELECT name,descshort FROM package WHERE ". $sectionquery .
	 " AND !(name REGEXP '.*-(dev|shlibs|bin|common|doc)$') ".
     "AND latest=1 ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $count = mysql_num_rows($rs);

?>

<p>Found <? print $count ?> packages in section <? print $section ?>:</p>

<ul>
<?
  while ($row = mysql_fetch_array($rs)) {
    $desc = " - ".$row[descshort];
    if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
      $desc = "";
    print '<li><a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a>'.$desc."</li>\n";
  }
?>
</ul>
<?
}

} /* if (no section) */
?>

<p><a href="<? print $pdbroot ?>sections.php">Back to section list</a></p>


<?
include "footer.inc";
?>
