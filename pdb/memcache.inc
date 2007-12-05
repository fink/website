<?

$memcache = new Memcache();
if (!$memcache->connect('localhost', 11211)) {
	unset($memcache);
}
if (isset($memcache)) {
	$memcache->setCompressThreshold(15000, 0.2);
}

?>
