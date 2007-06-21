<?
$title = "Package Database - Upload Form";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/06/21 16:20:10 $';
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 3600) . " GMT");
header("Cache-Control: max-age=3600, s-maxage=900");

/* $Id: submit.php,v 1.8 2007/06/21 16:20:10 rangerrick Exp $ */
/* check path info */
$PATH_INFO = $HTTP_SERVER_VARS["PATH_INFO"];
if ($uses_pathinfo) {
  if ($PATH_INFO == "") {
    $pispec = "-";
    $title .= "(none)";
    $pdbroot = "";
  } elseif (ereg("^/([a-zA-Z0-9_.+-]+)$", $PATH_INFO, $r)) {
    $pispec = $r[1];
    $title .= $pispec;
    $pdbroot = "../";
  } elseif (ereg("^/([a-zA-Z0-9_.+-]+/[a-zA-Z0-9_.+-]+)$", $PATH_INFO, $r)) {
    $pispec = $r[1];
    $title .= $pispec;
    $pdbroot = "../../";
  } else {
    print '<p><b>PATH_INFO not in expected format!</b></p>';
    exit;
  }
  $root = "-".$pdbroot;
}

/* generate page header and navigation */
$section = "packages";
$fsroot = "../";
if (substr($root,0,1) == "-") {
  $root = substr($root.$fsroot,1);
} else {
  $root = $fsroot;
}

/* connect to database */
include $fsroot."db.inc.php";
$dbh = mysql_connect($db_host, $db_user, $db_passwd);
mysql_select_db($db_name, $dbh) or die (mysql_error());


/**** End of header.inc ****/

function param($Name)
         {
         global $HTTP_GET_VARS;
         global $HTTP_POST_VARS;
         global $HTTP_COOKIE_VARS;

         if(isset($HTTP_GET_VARS[$Name]))
            return($HTTP_GET_VARS[$Name]);

         if(isset($HTTP_POST_VARS[$Name]))
            return($HTTP_POST_VARS[$Name]);

         if(isset($HTTP_COOKIE_VARS[$Name]))
            return($HTTP_COOKIE_VARS[$Name]);

         return("");
         }		      

####### Return earliest date of file in db - should represent when DB was last reset.
### If this is lower than the client's db time, it will clear the client submission cache. 
### The client keeps a cache to avoid submitting duplicate votes. 
### (we could store each vote by username in the server db, but we don't just to avoid overloading the server) 
if(param(cachetimestamp))
{
	$dbtimestamp = get_min_timestamp($dbh);
	if((param(cachetimestamp) >= $dbtimestamp) && $dbtimestamp) {
		# SERVEROLDER - string parsed by client
		print "SERVEROLDER - This pkg has apparently already been submitted.";
	} else {
		# SERVERNEWER - string parsed by client
		print "SERVERNEWER - The DB seems to have been reset since last submission, clear client cache";
	}
} else {
	$name = param(name);
	$username = param(username);
	$password = param(password);
	$dbtimestamp = 0;
	#Make sure this is a valid user.
	$q = "SELECT username,password FROM users ".
		  "WHERE (username = '$username' AND password = '$password')";
	#print $q;
	$rs = run_query($q, $dbh);
	$count = mysql_num_rows($rs);
	if ($count == 0) { 	
		 die("LOGINFAILED: Error! Login failed. Please create a user using 'fink feedback' or check your password.");
	  } else {
		print "Logged in as user $username...\n";
	}
}  
  
$package = param(package);
$version = param(version);
$release = param(release);
####### FEEDBACK REPORT
if(param(feedback))
{

}
####### UNSTABLE REPORT
elseif(param(unstable))
{

}
####### STABLE REPORT
elseif(param(stable))
{

}
####### If we got a pkghash1, check to see if this fileset is already in the db. 
elseif(param(pkghash1))
{
	$pkghash = param(pkghash1);
	## First check against the 'package' table - this is the Web PDB
	$q = "SELECT fullname FROM package ".
    	  "WHERE (fullname = '$package-$version' AND `release` = '$release')";
#	print $q . "\n";  
	$rs = run_query($q, $dbh);
	$count = mysql_num_rows($rs);
	if ($count == 0) { 	
		# NOSUCHPKG - string parsed by client
		print "NOSUCHPKG - Package MD5 $pkghash does not exist in $release.";
	  } else {
	  	## Found in web PDB, now look to see if it is in the contents DB
	  	$q = "SELECT package,version,`release`,pkghash,votes FROM contentspackages ".
			  "WHERE (`release` = '$release' AND package = '$package' AND version = '$version' AND pkghash = '$pkghash')";
#		print $q . "\n";  
			
		$rs1 = run_query($q, $dbh);
		$presentcount = mysql_num_rows($rs1);
		if ($presentcount == 0) { 	
			# NOTPRESENT - string parsed by client
			print "NOTPRESENT - Package MD5 $pkghash has not been submitted yet for $release.";
		  } else {	
			## Count votes for this person.... is there a more efficient way to do this in SQL? 	
	      	while ($row = mysql_fetch_array($rs1)) {	
	      		$votes = $row[votes] + 1;
#	      		$q = "UPDATE contentssubmitters SET votes = ".$votes.
	      		$q = "UPDATE contentspackages SET votes = ".$votes.
			  	" WHERE (`release` = '".$row[release]."' AND package = '".$row[package].
			  	 "' AND version = '".$row[version]."' AND pkghash = '".$row[pkghash]."')";
#				print $q . "\n";  
				$rs2 = mysql_query($q, $dbh);
				if (mysql_errno()) {
					print '<p><b>errno $err error during query:</b> '.mysql_error().'</p>';
					die;
				}
			}
			# PRESENT - string parsed by client 
			# $dbtimestamp - numeric string, parsed by client
			$dbtimestamp = get_min_timestamp($dbh);
			print "PRESENT-$dbtimestamp: - Package files with MD5 $pkghash for $release are already in the DB.";
		}
	}
	
	
} elseif (param(pkghash2)) {  # pkghash2 - must be submitting a file?

	$pkghash = param(pkghash2);
	#for now just grab the last file
	foreach($_FILES as $_FILES => $file){
		$fileref = $file;
	}    
	
	if($fileref['error'] != UPLOAD_ERR_OK) {
			die("Error! The file upload failed.");
	}
	$name = $fileref["name"];
	
	if(!move_uploaded_file($fileref["tmp_name"],  "/tmp/$name")) {
			die("Error! Moving the uploaded file failed.");
	}
	#print "User is " . param(User) . " pass " . param(Password) . "\n";
		
	$timestamp = date('YmdHis', time());
	
	######## Parse the package info
	if(!preg_match("/^finkupload-(.+)-([^-]+-[^-]+)-[^-]+$/", $name, $matches)){
		 die("Invalid filename for upload!");
	}  
	#$package = $matches[1];
	#$version = $matches[2];
	
	######## Check to see if this $pkg-$version is in both current-stable and current-unstable. If so, we will add to both.
	
	######## Parse the files.
	$lines = gzfile("/tmp/$name");
	print "Adding files... ";
	$filenum = 0;
	foreach($lines as $line)
	{
	 # print "Line is: $line";
		chop($line);
		preg_match("/^([^ ]+) ([^\/]+)\/([^ ]+) +(\d+) +([^ \n\r]+)/", $line, $matches);
		####### Add it to the databases.
		
		$fileperms = $matches[1];
		$fileowner = $matches[2];
		$filegroup = $matches[3];
		$filesize = $matches[4];
		$filepath= $matches[5];
		$filename = basename($matches[5]);
	#	print "$filename" . "$filepath" . "$filesize" . "$fileperms" . "$fileowner" . "$filegroup"\n";
		$file_id = md5("$filename" . "$filepath" . "$filesize" . "$fileperms" . "$fileowner" . "$filegroup");
		
	######
	###### 'contents' is a table of each file in fink. 
	###### Multiple packages may have the same file, but each file will be in this table only once.
	###### file_id is PRIMARY KEY. If md5 matches, INSERT will fail
	######
	
		$q = "INSERT INTO contents (file_id, filename, filepath, filesize, fileperms, fileowner, filegroup) ".
			  "VALUES ('$file_id', '$filename','$filepath','$filesize','$fileperms','$fileowner','$filegroup')";
	#	print $q . "\n";  
		
		$rs = mysql_query($q, $dbh);
		$err = mysql_errno();
		if ((!$rs) && ($err != 1062)) {
			#Die, unless the error is 1062 (ER_DUP_ENTRY), eg we already have that file hash in the db
			print '<p><b>errno $err error during query:</b> '.mysql_error().'</p>';
			die;
		} elseif($err != 1062) {
			$filenum++;
		}
	
	######  	
	###### 'contentspackages' is a table of each release-package-version-pkghash and the file ids it contains.
	###### Some release-package-versions may differ!
	###### Additionally, it is possible some packages may have the same hash, and same files.
	###### It is not possible that 2 entries should have the same release, package, version, pkghash.
	###### Thus, the PRIMARY KEY is (release, package, version, pkghash, file_id) 
	######
		$q = "INSERT INTO contentspackages (submitter, `release`, package, version, pkghash, file_id, votes, timestamp) VALUES ('$username', '$release', '$package', '$version', '$pkghash', '$file_id', 0, '$timestamp')";
	#	print $q . "\n";  
		$rs = mysql_query($q, $dbh);
		if ((!$rs) && (mysql_errno() != 1062)) {
			#Die, unless the error is 1062 (ER_DUP_ENTRY), eg we already have that file hash in the db
			print '<p><b>errno $err error during query:</b> '.mysql_error().'</p>';
			die;
		}
	}
	# Don't change the part of this string before the :, $timestamp is parsed by the client. 
	print "ADDED-$timestamp: $filenum files Added to database.\n";
	
	unlink("/tmp/$name");

}  # End if file included


function get_min_timestamp($dbh)
{
	$q = "SELECT MIN(timestamp) FROM contentspackages";
	$rs_timestamp = mysql_query($q, $dbh);
	if (!$rs_timestamp) {
		$dbtimestamp = 0;
	} else {
		while ($row = mysql_fetch_array($rs_timestamp)) {
			$dbtimestamp = $row[0];
		}
	}
	return $dbtimestamp;
}

function run_query($q, $dbh) {
  $rs = mysql_query($q, $dbh);
  if (!$rs) {
    print '<p><b>error during query:</b> '.mysql_error().'</p>';
    die;
  }
  return $rs;
} 
# echo date("l, F jS, Y at g:ia", $_mydate); //sql timestamp to php
?>


