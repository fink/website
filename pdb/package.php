<?
$title = "Package Database - Package ";
$cvs_author = '$Author: dmacks $';
$cvs_date = '$Date: 2004/10/28 01:55:27 $';

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
    if($row[epoch] > 0)
		$epoch = "$row[epoch]:";
	else 
		$epoch = "";
	$rmap[$row[release]] = $epoch.$row[version]."-".$row[revision];
    
    $row = mysql_fetch_array($rs);
  }

 function avail_td($text, $rowspan, $colspan) {
   print '<td align="center" valign="top"';
   print ' rowspan="'.$rowspan.'"';
   print ' colspan="'.$colspan.'"';
   print '>';
   print '<div style="white-space:nowrap">' . $text . '</div>';
   print '</td>';
 }

 $shim = '<img src="../../img/shim.gif" width="1" height="1" border="0" alt="">';

 print '<table cellspacing="0" border="0">'."\n";

 print '<tr bgcolor="#ffecbf">';
 print '<th width="100" align="center" valign="bottom" rowspan="3">System</th>';
 print '<th width="2"   rowspan="3" bgcolor="#ffffff">'.$shim.'</th>';
 print '<th width="150" align="center" colspan="2">Binary Distribution</th>';
 print '<th width="2"   rowspan="3" bgcolor="#ffffff">'.$shim.'</th>';
 print '<th width="202" align="center" colspan="3">CVS/rsync Distributions</th>';
 print "</tr>\n";

 print '<tr>';
 print '<th height="2" colspan="2" bgcolor="#ffffff">'.$shim.'</th>';
 print '<th height="2" colspan="3" bgcolor="#ffffff">'.$shim.'</th>';
 print "</tr>\n";

 print '<tr bgcolor="#ffecbf">';
 print '<th width="50"  align="center">dist</th>';
 print '<th width="100" align="center">version</th>';
 print '<th width="100" align="center">stable</th>';
 print '<th width="2"    bgcolor="#ffffff">'.$shim.'</th>';
 print '<th width="100" align="center">unstable</th>';
 print "</tr>\n";

 $rel_row=0;
 foreach( $releases as $os=>$dists ) {
   $rel_row++;
   if($rel_row==1) {
     $row_color='bgcolor=#e3caff';
   } else if ($rel_row==2) {
     $row_color='bgcolor=#f1e2ff';
   } else {
     $row_color='bgcolor=#f6ecff';
   }

   // massage if only single dist listed as a simple string
   if(!is_array($dists[0]))
     $dists[0]=array($dists[0]);

   // always have first (even if no dist), then need spacer+dist for each other
   $rowspan=1+2*(sizeof($dists[0])-1);
   if($rowspan==0) $rowspan=1;

   print '<tr>';
   print '<th height="2"             bgcolor="#ffffff">'.$shim.'</th>';
   print '<th height="2" width="2"   bgcolor="#f0f0f0">'.$shim.'</th>';
   print '<th height="2" colspan="2" bgcolor="#ffffff">'.$shim.'</th>';
   print '<th height="2" width="2"   bgcolor="#f0f0f0">'.$shim.'</th>';
   print '<th height="2"             bgcolor="#ffffff">'.$shim.'</th>';
   print '<th height="2" width="2"   bgcolor="#f0f0f0">'.$shim.'</th>';
   print '<th height="2"             bgcolor="#ffffff">'.$shim.'</th>';
   print '</tr>'."\n";

   // System
   print "<tr $row_color>";
   avail_td($os,$rowspan,1);

   print '<th width="2" rowspan="'.$rowspan.'" bgcolor="#f0f0f0">'.$shim.'</th>';

   // first bindist
    if(strlen($dists[0][0])) {
      avail_td($dists[0][0],1,1);
      $vers = $rmap[$dists[0][0].'-stable'];
      avail_td(strlen($vers) ? $vers : '<i>not present</i>',1,1);
    } else {
      avail_td('<i>none available</i>',$rowspan,2);
    }

    print '<th width="2" rowspan="'.$rowspan.'" bgcolor="#f0f0f0">'.$shim.'</th>';

    // CVS/rsync dist
    if(strlen($dists[1]) || strlen($dists[2])) {
      $vers_st = $rmap[$dists[1]];
      $vers_un = $rmap[$dists[2]];
      avail_td(
	strlen($vers_st)
	  ? '<!-- a href="../packagedetails.php?tree='.$dists[1]."&pkg=$package&version=$vers_st\" -->".$vers_st #."</a>"
	  : '<i>not present</i>'
	, $rowspan,1);
      print '<th width="2" rowspan="'.$rowspan.'" bgcolor="#f0f0f0">'.$shim.'</th>';
      avail_td(
	strlen($vers_un)
	  ? '<!-- a href="../packagedetails.php?tree='.$dists[2]."&pkg=$package&version=$vers_un\" -->".$vers_un #."</a>"
	  : '<i>not present</i>'
	, $rowspan,1);
    } else {
      avail_td("<i>unsupported</i>",$rowspan,3);
    }
    print "</tr>\n";

    // other bindists
    for( $bindistrow=1; $bindistrow<sizeof($dists[0]); $bindistrow++ ) {
      print '<th height="2" colspan="2" bgcolor="#f0f0f0">'.$shim.'</th>';
      print "<tr $row_color>";
      avail_td($dists[0][$bindistrow],1,1);
      avail_td($rmap[$dists[0][$bindistrow].'-stable'],1,1);
      print "</tr>\n";
    }

  }
  
  print "</table>\n";

  print "<br>";

  // Get latest version data (use for version-nonspecific pkg metadata)
  $qlatest = "SELECT * FROM package WHERE name='$package' AND latest=1";
  $qs = mysql_query($qlatest, $dbh);
  if (!$qs) {
    print '<p><b>error during query:</b> '.mysql_error().'</p>';
  } else {
    $latest = mysql_fetch_array($qs);
  }

  it_start();
  $desc = $latest[desclong];
  it_item("<p>Description:</p>", $desc);
  it_item("Section:", '<a href="'.$pdbroot.'section.php/'.$latest[section].'">'.$latest[section].'</a>');

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
  if ($latest[homepage]) {
    it_item("Website:", '<a href="'.$latest[homepage].'">'.$latest[homepage].'</a>');
  }
  if ($latest[license]) {
    it_item("License:", '<a href="http://fink.sourceforge.net/doc/packaging/policy.php#licenses">'.$latest[license].'</a>');
  }
  if ($latest[parentname]) {
    it_item("Parent:", '<a href="'.$pdbroot.'package.php/'.$latest[parentname].'">'.$latest[parentname].'</a>');
  }


	// List the splitoffs of this package

	$q = "SELECT * FROM splitoffs WHERE parentkey='$latest[release]$latest[name]'";
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
