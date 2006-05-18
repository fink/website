<?
$title = "Package Database - Package ";
$cvs_author = '$Author: dmacks $';
$cvs_date = '$Date: 2006/05/18 21:32:50 $';

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

  // Get latest version data (use for version-nonspecific pkg metadata)
  $qlatest = "SELECT * FROM package WHERE name='$package' AND latest=1";
  $qs = mysql_query($qlatest, $dbh);
  if (!$qs) {
    print '<p><b>error during query:</b> '.mysql_error().'</p>';
  } else {
    $latest = mysql_fetch_array($qs);
  }

  $is_restrictive = 0;
  if ($latest[license] && strcasecmp($latest[license],'Restrictive')==0) {
      $is_restrictive = 1;
  }

 function avail_td($text, $extras='') {
   print '<td align="center" valign="top" ' . $extras . '>';
   print '<div style="white-space:nowrap">' . $text . '</div>';
   print '</td>';
 }

 print '<table class="pkgversion" cellspacing="2" border="0">'."\n";

 print '<tr bgcolor="#ffecbf">';
 print '<th width="100" align="center" valign="bottom" rowspan="2">System</th>';
 print '<th width="150" align="center" valign="bottom" rowspan="2">Binary Distributions</th>';
 print '<th width="202" align="center" colspan="2">CVS/rsync Source Distributions</th>';
 print "</tr>\n";

 print '<tr bgcolor="#ffecbf">';
 print '<th width="100" align="center">stable</th>';
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

   // used in System and CVS/rsync entries to leave enough space for bindists
   if (sizeof($dists[0])>1)
     $bindist_rowspan='rowspan='.sizeof($dists[0]);
   else
     $bindist_rowspan='';

   // System
   print "<tr $row_color>";
   avail_td($os,$bindist_rowspan);

   $bindists_lbl=array_keys($dists[0]);
   $bindists_sql=array_values($dists[0]);

   // first bindist
    if(strlen($bindists_sql[0])) {
      $vers = $rmap[$bindists_sql[0]];
      avail_td(strlen($vers) && $is_restrictive==0 ? $vers.' ('.$bindists_lbl[0].')' : '<i>not present</i>');
    } else {
      avail_td('<i>no bindists available</i>',$bindist_rowspan);
    }

    // CVS/rsync dist
    if(strlen($dists[1]) || strlen($dists[2])) {
      $vers_st = $rmap[$dists[1]];
      $vers_un = $rmap[$dists[2]];
      avail_td(
	strlen($vers_st)
	  ? '<!-- a href="../packagedetails.php?tree='.$dists[1]."&pkg=$package&version=$vers_st\" -->".$vers_st #."</a>"
	  : '<i>not present</i>'
	, $bindist_rowspan);
      avail_td(
	strlen($vers_un)
	  ? '<!-- a href="../packagedetails.php?tree='.$dists[2]."&pkg=$package&version=$vers_un\" -->".$vers_un #."</a>"
	  : '<i>not present</i>'
	, $bindist_rowspan);
    } else {
      avail_td("<i>unsupported</i>",$bindist_rowspan.' colspan=2');
    }
    print "</tr>\n";

    // other bindists
    for( $bindistrow=1; $bindistrow<sizeof($bindists_sql); $bindistrow++ ) {
      print "<tr $row_color>";
      $vers = $rmap[$bindists_sql[$bindistrow]];
      avail_td(strlen($vers) && $is_restrictive==0 ? $vers.' ('.$bindists_lbl[$bindistrow].')' : '<i>not present</i>');
      print "</tr>\n";
    }

  }
  
  print "</table>\n";

  print "<br>";

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
