<?php
	// This is either sql or solr
	$pdbdb = 'solr';

	// This is is the current setup for snitch
	$sqldriver = "mysqli";
	$sqlhost = "localhost";
	//$sqlhost = "snitch.finkproject.org";
	$sqluser = "c1pdb";
	$sqlpass = "l3tpdb1n";
	$sqldb = "c1pdb";

	if ($pdbdb == 'sql') {
		require_once("adodb/adodb-exceptions.inc.php");
		require_once("adodb/adodb.inc.php");

		if (empty($db)) {
			$db = NewADOConnection($sqldriver);
			$db->Connect($sqlhost, $sqluser, $sqlpass, $sqldb);
			$db->Execute("set names 'utf8'");
			$db->SetFetchMode(ADODB_FETCH_ASSOC);
		}
	}

?>
