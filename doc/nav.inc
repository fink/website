<?
$navroot = $fsroot."doc/";
if (defined('phpLang_current') && file_exists($navroot."nav." . phpLang_current . ".inc"))
	include_once $navroot."nav." . phpLang_current . ".inc";
else
	include_once $navroot."nav.en.inc";
?>
