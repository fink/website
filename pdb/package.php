<?
$title = "Package Database - Package ";
$cvs_author = '$Author: dmacks $';
$cvs_date = '$Date: 2004/09/06 16:55:59 $';

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

   $rowspan=sizeof($dists[0]);
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
    if(sizeof($dists[0])) {
      avail_td($dists[0][0],1,1);
      $vers = $rmap[$dists[0][0].'-stable'];
      avail_td(strlen($vers) ? $vers : '<i>not present</i>',1,1);
    } else {
      avail_td("",$rowspan,1);
    }

    print '<th width="2" rowspan="'.$rowspan.'" bgcolor="#f0f0f0">'.$shim.'</th>';

    // CVS/rsync dist
    if(strlen($dists[1])) {
      $dist_st = $dists[1] . '-stable';
      $dist_un = $dists[1] . '-unstable';
      $vers_st = $rmap[$dist_st];
      $vers_un = $rmap[$dist_un];
      avail_td(
	strlen($vers_st)
	  ? "<!-- a href=\"../packagedetails.php?tree=$dist_st&pkg=$package&version=$vers_st\" -->".$vers_st #."</a>"
	  : '<i>not present</i>'
	, $rowspan,1);
      print '<th width="2" rowspan="'.$rowspan.'" bgcolor="#f0f0f0">'.$shim.'</th>';
      avail_td(
	strlen($vers_un)
	  ? "<!-- a href=\"../packagedetails.php?tree=$dist_un&pkg=$package&version=$vers_un\" -->".$vers_un #."</a>"
	  : '<i>not present</i>'
	, $rowspan,1);
    } else {
      avail_td("<i>unsupported</i>",$rowspan,3);
    }
    print "</tr>\n";

    // other bindists
    for( $bindistrow=1; $bindistrow<sizeof($dists[0]); $bindistrow++ ) {
      print "<tr $row_color>";
      avail_td($dists[0][$bindistrow],1,1);
      avail_td($rmap[$dists[0][$bindistrow].'-stable'],1,1);
      print "</tr>\n";
    }

  }
  
  print "</table>\n";

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
