<?
/* $Id: header.inc,v 1.8 2004/03/03 17:07:55 dmalloc Exp $ */
// +--------------------------------------------------------------------------+
// | header.inc                                                               |
// +--------------------------------------------------------------------------+
// | Copyright (c)                                                            |
// +--------------------------------------------------------------------------+
// | License:  GNU/GPL - http://www.gnu.org/copyleft/gpl.html                 |
// +--------------------------------------------------------------------------+
// | Used by all the PHP files at http://fink.sourceforge.net                 |
// |    to produce the headers (incl HTML headers and top parts)              |
// |                                                                          |
// | usage:    1. read the comments                                           |
// |           2. include this file before outputting anything                |
// +--------------------------------------------------------------------------+
// | issues:                                                                  |
// |           1. too many! issues remained                                   |
// |                                                                          |
// +--------------------------------------------------------------------------+

// Language Code (from phpLang.inc.php)
include_once "../phpLang.inc.php";
$lang_code = 'en'; 
if ((phpLang_current)) $lang_code = phpLang_current;

if (is_readable (dirname(__FILE__) . "/constants." . $lang_code . ".inc"))
        include_once dirname(__FILE__) . "/constants." . $lang_code . ".inc"; 

	/* The Sections.  Used in Menu Navigation Bar */
define (FINK_HEAD, 'Overview');





$section = "mailing-lists";
$navbox = array(
  "lists/index.php", FINK_HEAD,
  "lists/fink-announce.php", "fink-announce",
  "lists/fink-i18n.php", "fink-i18n",
  "lists/fink-beginners.php", "fink-beginners",
  "lists/fink-users.php", "fink-users",
  "lists/fink-devel.php", "fink-devel",
  "lists/fink-core.php", "fink-core",
  "lists/fink-gnome-core.php", "fink-gnome-core",
  "lists/fink-commits.php", "fink-commits",
  "lists/fink-tracker.php", "fink-tracker"
);

$fsroot = $root = "../";
include $fsroot."header.inc";
?>
