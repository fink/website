<? 
if (!defined('phpLang_current') || !file_exists($fsroot."doc/nav." . phpLang_current . ".inc"))
	include_once $fsroot."doc/nav.en.inc";
else
	include_once $fsroot."doc/nav." . phpLang_current . ".inc";
?>
