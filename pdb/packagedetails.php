<?
$title = "Package Database - Package ";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/04/10 19:45:52 $';
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 60 * 60) . " GMT");

$uses_pathinfo = 0;
include "header.inc";
$package = param(pkg);
$tree = param(tree);
$version = param(version);
include "releases.inc";

if ($package == "-") {
	print "<p><b>No package specified.</b></p>";
} else {

print "<h2>Package <a href=package.php/$package>$package</a>-$tree-$version</h2>";

if($version) {
	$version = "-$version";
} else {
	$version = "%";
}

if($tree) {
 $q = "SELECT * FROM package WHERE fullname LIKE '$package$version' AND `release`='$tree' ORDER BY latest DESC";
} else {
 $q = "SELECT * FROM package WHERE fullname LIKE '$package$version' ORDER BY latest DESC";
}

$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  if(mysql_num_rows($rs) > 1) {
  	print "Found the package $package in multiple trees:\n";
	it_start();
	while ($row = mysql_fetch_array($rs)) {
	  	it_item("Tree:", '<a href="'.$pdbroot."packagedetails.php?tree=".$row[release]."&pkg=$package&version=$version\">".$row[release].'</a>'); 
	}
	it_end();
  } else if (! mysql_num_rows($rs)) {
  	print "Error: Found no package $package-$version in $tree !\n";
  	
  	
  } else {
	  $row = mysql_fetch_array($rs);
	  it_start();
	  $desc = $row[desclong];
	  it_item("<p>Description:</p>", $desc);
	  it_item("Section:", '<a href="'.$pdbroot.'section.php/'.$row[section].'">'.$row[section].'</a>');
	
	  // Get the maintainer field, and try to parse out the email address
	  if ($row[maintainer]) {
		$maintainer = $row[maintainer];
		preg_match("/^(.+?)\s*<(\S+)>/", $maintainer, $matches);
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
	  it_item("Reports:", "Stable: ".$row[stable]." Unstable: ".$row[unstable]);
	
	// Print contents 
	$q = "SELECT DISTINCT pkghash,votes FROM contentspackages ".
		 "WHERE package='$package' AND version='$version' AND `release`='$tree' ORDER BY votes DESC";
	$rs = mysql_query($q, $dbh);
	if (!$rs) {
	  print '<p><b>error during query:</b> '.mysql_error().'</p>';
	} else {
	  $count = mysql_num_rows($rs);
	  	if($count == 0) {
			it_item("Contents:", 'Contents for this package and version have not been submitted yet. Submit using \'fink report -c\'');	 
			it_end(); 	
		} else if($count > 1) {
			it_item("Contents:", "$count builds of this package have been submitted.");
			it_end();
			print "<form action=\"packagedetails.php\" method=\"POST\">\n";
			print "<INPUT TYPE=hidden name=tree value=$tree>\n";
			print "<INPUT TYPE=hidden name=pkg value=$package>\n";
			print "<INPUT TYPE=hidden name=version value=$version>\n";
			print "<SELECT name = pkghash>\n";
			$sel = 1;
			while($row = mysql_fetch_array($rs)) 
			{
				$votes = $row[votes];
				if(param(pkghash)) {
					if(param(pkghash) == $row[pkghash])
						$sel == 1; else	$sel = 0;
				}
				if($sel)
					$selhash = $row[pkghash];
				print '<option value='. $row[pkghash]. ($sel ? ' selected>' : '>').$votes.
													  (($votes == 1) ? ' Vote' : ' Votes')."\n";
				$sel--;
			}	
			print '</SELECT><input type="submit" value="List"></FORM>';
		} else {
			it_item("Contents:", '1 build of this package has been submitted:');
			it_end();
			$row = mysql_fetch_array($rs);
			$selhash = $row[pkghash];
		}
	}
	it_start();	
	
	if($count) {
		$q = "SELECT filepath,filesize,fileperms,filegroup,fileowner,votes,submitter FROM contents,contentspackages".
			" WHERE (contentspackages.file_id=contents.file_id) AND contentspackages.pkghash='$selhash'".
			" ORDER BY filepath";
		$rs = mysql_query($q, $dbh);
		if (!$rs) {
		  print '<p><b>error during query:</b> '.mysql_error().'</p>';
		} else {
	  		$count = mysql_num_rows($rs);
			$row = mysql_fetch_array($rs);
			print "Hash: $selhash - Submitter: $row[submitter]\n";
			print "<table>\n";
			do {
				print '<tr><td>'.$row[filepath].'</td><td>'.$row[filesize]."</td><td>".$row[fileperms].
												'</td><td>'.$row[fileowner].'/'.$row[filegroup]."</td>\n";
			} 	while ($row = mysql_fetch_array($rs));
			print "</table>\n";
			print "$count files.\n";
		}
	
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
	}
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
