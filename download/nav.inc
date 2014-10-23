<?php
$hostlink = '';
if (isset($_SERVER['SERVER_NAME']))
	if (preg_match('/^bindist/', $_SERVER['SERVER_NAME']))
		$hostlink = 'http://www.finkproject.org/';

$navroot = $fsroot."download/";
if (defined('phpLang_current') && file_exists($navroot."nav." . phpLang_current . ".inc"))
	include_once $navroot."nav." . phpLang_current . ".inc";
else
	include_once $navroot."nav.en.inc";
?>
