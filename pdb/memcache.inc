<?php

if(class_exists('Memcache')) {
	$memcache = new Memcache();
	if (!$memcache->connect('localhost', 11211)) {
		error_log('Memcache: not running (localhost:11211)', 0);
		unset($memcache);
	}
	if (isset($memcache)) {
		$memcache->setCompressThreshold(15000, 0.2);
	}
} else {
	error_log('Memcache: not installed (php5-memcache)', 0);
}

?>
