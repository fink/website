<?
$title = "Package Database - Package ";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2004/08/29 00:26:10 $';

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
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $row = mysql_fetch_array($rs);
  $rmap = array();
  while ($row) {
    $lastrow = $row;
    if($row[epoch] > 0)
		$epoch = "$row[epoch]:";
	else 
		$epoch = "";
	$rmap[$row[release]] = $epoch.$row[version]."-".$row[revision];
    
    $row = mysql_fetch_array($rs);
  }

  $row = $lastrow;

  it_start2();
  it_item2("Tree", "Stable", "Unstable");
  for ($i = 0; $i < sizeof($releases); $i++) {
    $cr = $releases[$i];
    $i++;
    $cr2 = $releases[$i];
    preg_match("/(.*)-(stable|unstable)/i", $cr, $tree);
    if(ereg("^0.4.1",$cr))
      it_item2("<div style=\"white-space:nowrap\">$tree[1] (OS X 10.1):</div>", $rmap[$cr] ? " ".$rmap[$cr]."" : "not present","");
    else
    if(ereg("^0.6.3",$cr))
      it_item2("<div style=\"white-space:nowrap\">$tree[1] (OS X 10.2):</div>", $rmap[$cr] ? " ".$rmap[$cr]."" : "not present","");
    else
    if(ereg("^0.7.0",$cr))
      it_item2("<div style=\"white-space:nowrap\">$tree[1] (OS X 10.3):</div>", $rmap[$cr] ? " ".$rmap[$cr]."" : "not present","");
    else
      it_item2("<div style=\"white-space:nowrap\">$tree[1]:</div>"
      			, !strcmp($cr, " ") ? $cr : $rmap[$cr] ?
      			" <!-- a href=\"../packagedetails.php?tree=$cr&pkg=$package&version=$rmap[$cr]\" -->".$rmap[$cr]#."</a>" 
      			: "not present"
       			, !strcmp($cr2, " ") ? $cr2 : $rmap[$cr2] ? 
      			" <!-- a href=\"../packagedetails.php?tree=$cr2&pkg=$package&version=$rmap[$cr2]\" -->".$rmap[$cr2]#."</a>" 
       			: "not present");
  }
  it_end();
  print "<br>";
  it_start();
  $desc = $row[desclong];
  it_item("<p>Description:</p>", $desc);
  it_item("Section:", '<a href="'.$pdbroot.'section.php/'.$row[section].'">'.$row[section].'</a>');


$qlatest = "SELECT * FROM package WHERE name='$package' AND latest=1";
$qs = mysql_query($qlatest, $dbh);
if (!$qs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
	$latest = mysql_fetch_array($qs);
}
  // Get the maintainer field, and try to parse out the email address
  if ($latest[maintainer]) {
	$maintainers = $latest[maintainer];
	preg_match("/^(.+?)\s*<(\S+)>/", $maintainers, $matches);
    $maintainer = $matches[1];
    $email = $matches[2];
  } else {
    $maintainer = "unknown";
  }
  // If there was an email specified, make the maintainer field a mailto: link
  if ($email) {
    $email = str_replace(array("@","."), array("AT","DOT"), $email);
    it_item("Maintainer:", '<a href="'.$pdbroot.'maintainer.php?maintainer='.$maintainer.'">'.$maintainer.' &lt;'.$email.'&gt;'.'</a>');
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
	    it_item("SplitOffs:", '<a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a> '.htmlentities($row[descshort]));
	  while ($row = mysql_fetch_array($rs)) {
		it_item(" ", '<a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a> '.htmlentities($row[descshort]));
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
