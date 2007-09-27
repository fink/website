<?

$memcache = new Memcache();
$memcache->connect('localhost', 11211);

function cachedQuery($sql, $compress = 0) {
	global $dbh;
	global $memcache;

	$key = md5($sql);

	if ($returnVals = $memcache->get($key)) {
		echo " <!-- cached($compress) $key: $sql --> ";
		return $returnVals;
	} else {
		echo " <!-- NOT cached($compress) $key: $sql --> ";

		$returnVals = array();
		$resultSet = mysql_query($sql, $dbh);

		while ($row = mysql_fetch_array($resultSet)) {
			array_push($returnVals, $row);
		}

		// 5 minute cache
		if ($memcache->set($key, $returnVals, $compress, 300)) {
			return $returnVals;
		} else {
			echo " <!-- unable to set $key($compress) --> ";
			return;
		}
	}

}

?>
