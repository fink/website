<?
$title = "Package Database - Package ";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2004/05/25 04:57:35 $';

$uses_pathinfo = 0;
include "header.inc";
$package = param(pkg);
$tree = param(tree);
$version = param(version);
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

$q = "SELECT * FROM package WHERE fullname='$package-$version' AND release='$tree' ORDER BY latest DESC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  if(mysql_num_rows($rs) > 1) {
  	print "Error: Found more than one package $package-$version in $tree !\n";
  } else if (! mysql_num_rows($rs)) {
  	print "Error: Found no package $package-$version in $tree !\n";
  } else {
  
	  $row = mysql_fetch_array($rs);
	
	  print "<br>";
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
	
	// Print contents 
	$q = "SELECT DISTINCT pkghash FROM contentspackages WHERE package='$package' AND version='$version' AND release='$tree'";
	$rs = mysql_query($q, $dbh);
	if (!$rs) {
	  print '<p><b>error during query:</b> '.mysql_error().'</p>';
	} else {
	  $count = mysql_num_rows($rs);
	  	if($count == 0) {
			it_item("Contents:", 'Contents for this package and version have not been submitted yet. Submit using \'fink report -c\'');	  	
		} else if($count > 1) {
			it_item("Contents:", "$count builds of this package have been submitted. Most common:");
		} else {
			it_item("Contents:", '1 build of this package has been submitted:');
		}
	}


	it_end();
	it_start();

	if($count == 1) {
	
		$row = mysql_fetch_array($rs);
		$q = "SELECT filepath,filesize,fileperms,filegroup,fileowner FROM contents,contentspackages WHERE (contentspackages.file_id=contents.file_id) AND contentspackages.pkghash='".$row[pkghash]."' ORDER BY filepath";
		$rs = mysql_query($q, $dbh);
		if (!$rs) {
		  print '<p><b>error during query:</b> '.mysql_error().'</p>';
		} else {
	  		$count = mysql_num_rows($rs);
			print '<table>';
		  	while ($row = mysql_fetch_array($rs)) {
				print '<tr><td>'.$row[filepath].'</td><td>'.$row[filesize]."</td><td>".$row[fileperms].'</td><td>'.$row[fileowner].'</td>';
			}
			print '</table>';
			print "$count files.\n";
		}
	
	} else if ($count > 1) {
	
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
