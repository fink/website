<?
/* $Id: header.inc,v 1.3 2004/03/03 05:20:03 jeff_yecn Exp $ */

// Language Code (similar to web/header.inc, I guess)
$fsroot = $root = "../";

include "nav.inc";

include_once $fsroot."phpLang.inc.php";

$lang_code = 'en';
if ((phpLang_current)) $lang_code = phpLang_current;

if (is_readable ("nav." . $lang_code . ".inc"))
    include "nav." . $lang_code . ".inc";

include $fsroot."header.inc";
?>
