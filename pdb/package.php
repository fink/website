<?
$title = "Package Database - Package ";
$cvs_author = '$Author: dmalloc $';
$cvs_date = '$Date: 2004/07/10 14:59:06 $';

$uses_pathinfo = 1;
include "header.inc";
$package = $pispec;

include "releases.inc";
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
$qmaintainer = "SELECT * FROM package WHERE name='$package' AND latest=1";
$rs = mysql_query($q, $dbh);
$qs = mysql_query($qmaintainer, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $row = mysql_fetch_array($rs);
  $rmap = array();
  while ($row) {
    $lastrow = $row;
    $rmap[$row[release]] = $row[version]."-".$row[revision];
    $row = mysql_fetch_array($rs);
  }
  $row = $lastrow;

$maintainer = mysql_fetch_row($qs);

  it_start2();
  it_item2("Tree", "Stable", "Unstable");
  for ($i = 0; $i < sizeof($releases); $i++) {
    $cr = $releases[$i];
    $i++;
    $cr2 = $releases[$i];
    preg_match("/(.*)-(stable|unstable)/i", $cr, $tree);
    if(ereg("^0.4.1",$cr))
      it_item2("<div style=\"white-space:nowrap\">$tree[1]:</div>", $rmap[$cr] ? " ".$rmap[$cr]."" : "not present","(10.1 only)");
    else
    if(ereg("^0.6.3",$cr))
      it_item2("<div style=\"white-space:nowrap\">$tree[1]:</div>", $rmap[$cr] ? " ".$rmap[$cr]."" : "not present","(10.2 only)");
    else
      it_item2("<div style=\"white-space:nowrap\">$tree[1]:</div>"
      			, !strcmp($cr, " ") ? $cr : $rmap[$cr] ? " ".$rmap[$cr] : "not present"
       			, !strcmp($cr2, " ") ? $cr2 : $rmap[$cr2] ? " ".$rmap[$cr2] : "not present");
  }
  it_end();
  print "<br>";
  it_start();
  it_item("<p>Description:</p>", $row[desclong]);
  it_item("Section:", '<a href="'.$pdbroot.'section.php/'.$row[section].'">'.$row[section].'</a>');

  // Get the maintainer field, and try to parse out the email address
  if ($maintainer[8]) {
	$maintainers = $maintainer[8];
	preg_match("/^(.+?)\s*<(\S+)>/", $maintainers, $matches);
    $maintainers = $matches[1];
    $email = $matches[2];
  } else {
    $maintainer = "unknown";
  }
  // If there was an email specified, make the maintainer field a mailto: link
  if ($email) {
    $email = str_replace(array("@","."), array("AT","DOT"), $email);
    it_item("Maintainer:", '<a href="'.$pdbroot.'maintainer.php?maintainer='.$maintainers.'">'.$maintainers.' &lt;'.$email.'&gt;'.'</a>');
#    it_item("Maintainer:", '<a href="mailto:'.$email.'">'.$maintainer.'</a>');
  } else {
    it_item("Maintainer:", '<a href="'.$pdbroot.'maintainer.php?maintainer='.$maintainer.'">'.$maintainer.'</a>');
  }
  if ($row[homepage]) {
    it_item("Website:", '<a href="'.$row[homepage].'">'.$row[homepage].'</a>');
  }
  if ($row[license]) {
    it_item("License:", '<a href="http://fink.sourceforge.net/doc/packaging/policy.php#licenses">'.$row[license].'</a>');
  }
  if ($row[parentname]) {
    it_item("Parent:", '<a href="'.$pdbroot.'package.php/'.$row[parentname].'">'.$row[parentname].'</a>');
  }


	// List the splitoffs of this package

	$q = "SELECT * FROM splitoffs WHERE parentkey='$row[release]$row[name]'";
	$rs = mysql_query($q, $dbh);
	if (!$rs) {
	  print '<p><b>error during query:</b> '.mysql_error().'</p>';
	} else {
	  if($row = mysql_fetch_array($rs))
	    it_item("SplitOffs:", '<a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a> '.$row[descshort]);
	  while ($row = mysql_fetch_array($rs)) {
		it_item(" ", '<a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a> '.$row[descshort]);
	  }
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
