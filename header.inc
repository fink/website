<?php
/* $Id: header.inc,v 1.134 2014/10/23 22:09:49 thesin Exp $ */
// +--------------------------------------------------------------------------+
// | header.inc                                                               |
// +--------------------------------------------------------------------------+
// | Copyright (c)                                                            |
// +--------------------------------------------------------------------------+
// | License:  GNU/GPL - http://www.gnu.org/copyleft/gpl.html                 |
// +--------------------------------------------------------------------------+
// | Used by all the PHP files at http://www.finkproject.org                  |
// |    to produce the headers (incl HTML headers and top parts)              |
// |                                                                          |
// | usage:    1. read the comments                                           |
// |           2. include this file before outputting anything                |
// +--------------------------------------------------------------------------+
// | issues:                                                                  |
// |           1. too many! issues remained                                   |
// |                                                                          |
// +--------------------------------------------------------------------------+

if (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == "pdb.finkproject.org") {
	if ($_SERVER['REQUEST_URI'] == "http://pdb.finkproject.org/") {
		header("HTTP/1.1: 301 Moved Permanently");
		header("Location: http://pdb.finkproject.org/pdb");
		exit();
	}
}

if (!isset($expires))
{
	# by default, expire in 1 hour
	$expires = 60 * 60;
}

include_once "analytics.inc";
 
// Language Code (from phpLang.inc.php)
include_once dirname(__FILE__) . "/phpLang.inc.php";
$lang_code = 'en';
if ((phpLang_current)) $lang_code = phpLang_current;

header("Content-Language: " . $lang_code);
if (isset($_REQUEST['phpLang']))
{
	header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expires) . " GMT");
}

if (is_readable (dirname(__FILE__) . "/constants." . $lang_code . ".inc"))
	include_once dirname(__FILE__) . "/constants." . $lang_code . ".inc";

/* The Sections.  Used in Menu Navigation Bar */
if (!defined('FINK_LC_ALL')) { define ("FINK_LC_ALL", 'en_US'); }
if (!defined('FINK_SF_ENCODING')) { define ("FINK_SF_ENCODING", 'ISO-8859-1'); }
if (!defined('FINK_DATE_FORMAT')) { define ("FINK_DATE_FORMAT", '%d %B %Y'); }

/* The Sections.  Used in Menu Navigation Bar */
if (!defined('FINK_SECTION_HOME')) { define ("FINK_SECTION_HOME", 'Home'); }
if (!defined('FINK_SECTION_DOWNLOAD')) { define ("FINK_SECTION_DOWNLOAD", 'Download'); }
if (!defined('FINK_SECTION_PACKAGE')) { define ("FINK_SECTION_PACKAGE", 'Packages'); }
if (!defined('FINK_SECTION_HELP')) { define ("FINK_SECTION_HELP", 'Help'); }
if (!defined('FINK_SECTION_FAQ')) { define ("FINK_SECTION_FAQ", 'F.A.Q.'); }
if (!defined('FINK_SECTION_DOCUMENTATION')) { define ("FINK_SECTION_DOCUMENTATION", 'Documentation'); }
if (!defined('FINK_SECTION_MAILING_LISTS')) { define ("FINK_SECTION_MAILING_LISTS", 'Mailing Lists'); }

/* The Home Subsections.  Used in Menu Navigation Bar */
if (!defined('FINK_SECTION_HOME_INDEX')) { define ("FINK_SECTION_HOME_INDEX", 'Index'); }
if (!defined('FINK_SECTION_HOME_NEWS')) { define ("FINK_SECTION_HOME_NEWS", 'News'); }
if (!defined('FINK_SECTION_HOME_ABOUT')) { define ("FINK_SECTION_HOME_ABOUT", 'About'); }
if (!defined('FINK_SECTION_HOME_CONTRIBUTORS')) { define ("FINK_SECTION_HOME_CONTRIBUTORS", 'Contributors'); }
if (!defined('FINK_SECTION_HOME_LINKS')) { define ("FINK_SECTION_HOME_LINKS", 'Links'); }

/* The word 'Sections'.  Used in Menu Navigation Bar */
if (!defined('FINK_SECTIONS')) { define ("FINK_SECTIONS", 'Sections'); }

/* Contents as Table of Contents.  Used in FAQ/Documentation Sections */
if (!defined('FINK_CONTENTS')) { define ("FINK_CONTENTS", 'Contents'); }
if (!defined('FINK_NEXT')) { define ("FINK_NEXT", 'Next'); }
if (!defined('FINK_Q')) { define ("FINK_Q", 'Q'); }
if (!defined('FINK_A')) { define ("FINK_A", 'A'); }

/* Printer */
if (!defined('FINK_PRINTER')) { define ("FINK_PRINTER", 'Printer'); }
if (!defined('FINK_PRINT_VERSION')) { define ("FINK_PRINT_VERSION", 'Print Version'); }

/* Header and Footer */
if (!defined('META_KEYWORDS')) { define ("META_KEYWORDS", 'Mac OS X, Fink, Debian, Macintosh, Apple, UNIX, Open Source, download, free software, porting, development, package management'); }
if (!defined('META_DESCRIPTION')) { define ("META_DESCRIPTION", 'The Fink Team wants to bring the full world of Unix Open Source software to Darwin and Mac OS X. We modify Unix software so that it compiles and runs on Mac OS X and make it available for download as a coherent distribution'); }
//if (!defined('HEADER_HOSTED_BY')) { define ("HEADER_HOSTED_BY", 'Hosted By {img}'); }
if (!defined('HEADER_HOSTED_BY')) { define ("HEADER_HOSTED_BY", ''); }
if (!defined('FOOTER_AVAILABLE_LANGUAGES')) { define ("FOOTER_AVAILABLE_LANGUAGES", 'Available Languages'); }
if (!defined('FOOTER_GENERATED_DYNAMICALLY')) { define ("FOOTER_GENERATED_DYNAMICALLY", 'Generated dynamically'); }
if (!defined('FOOTER_DATABASE_LAST_UPDATED')) { define ("FOOTER_DATABASE_LAST_UPDATED", 'Database last updated on  %a, %b %d %Y, %R GMT'); }
if (!defined('FOOTER_LAST_CHANGED')) { define ("FOOTER_LAST_CHANGED", 'Last changed by {author} on {date}, {time}'); }

setlocale(LC_TIME, FINK_LC_ALL);
$section_names = array(
	'home' => FINK_SECTION_HOME,
	'download' => FINK_SECTION_DOWNLOAD,
	'packages' => FINK_SECTION_PACKAGE,
	'help' => FINK_SECTION_HELP,
	'faq' => FINK_SECTION_FAQ,
	'documentation' => FINK_SECTION_DOCUMENTATION,
	'mailing-lists' => FINK_SECTION_MAILING_LISTS
);

$section_files = array(
	'home' => 'http://www.finkproject.org/index.php?phpLang='. $lang_code,
	'download' => 'http://www.finkproject.org/download/index.php?phpLang='. $lang_code,
	'packages' => 'http://pdb.finkproject.org/pdb/index.php?phpLang='. $lang_code,
	'help' => 'http://www.finkproject.org/help/index.php?phpLang='. $lang_code,
	'faq' => 'http://www.finkproject.org/faq/index.php?phpLang='. $lang_code,
	'documentation' => 'http://www.finkproject.org/doc/index.php?phpLang='. $lang_code, 
	'mailing-lists' => 'http://www.finkproject.org/lists/index.php?phpLang='. $lang_code
);

if (!isset($section)) $section = "home";

// main navigation box
if ((!isset($navbox) || !is_array($navbox)) && (!isset($nonav) || ($nonav != 1))) {
	$navbox = array(
		'index.php?phpLang='. $lang_code, FINK_SECTION_HOME_INDEX,
		'news/index.php?phpLang='. $lang_code, FINK_SECTION_HOME_NEWS,
		'about.php?phpLang='. $lang_code, FINK_SECTION_HOME_ABOUT,
		'people.php?phpLang='. $lang_code, FINK_SECTION_HOME_CONTRIBUTORS,
		'links.php?phpLang='. $lang_code, FINK_SECTION_HOME_LINKS
);
}

// get author and change date from CVS vars
//  kill dollar-envelope
if (!isset($cvs_author)) $cvs_author = "";
if (!isset($cvs_date)) $cvs_date = 0;
if (substr($cvs_author,0,1) == "$")
  $cvs_author = rtrim(substr($cvs_author, 1, -1));
if (substr($cvs_date,0,1) == "$")
  $cvs_date = rtrim(substr($cvs_date, 1, -1));
//  get data
$myreg = "/^Author: (.*)$/";
if (preg_match($myreg, $cvs_author, $r)) {
  $author = $r[1];
} else {
  $author = "-unknown-";
}
$myreg = "|^Date: ([0-9]{2,4})[/\-]([0-9]{1,2})[/\-]([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})|";
if (preg_match($myreg, $cvs_date, $r)) {
  $date = gmmktime($r[4], $r[5], $r[6], $r[2], $r[3], $r[1]);
  define ("FILEMDATE", (gmmktime($r[4], $r[5], $r[6], $r[2], $r[3], $r[1])));
} else {
  if (!isset($_SERVER['PATH_TRANSLATED'])) $_SERVER['PATH_TRANSLATED'] = "";
  $date = filemtime($_SERVER['PATH_TRANSLATED']);
  define ("FILEMDATE", (filemtime($_SERVER['PATH_TRANSLATED'])));
}
// converts xml style tag to html 4.01 transitional (ad hoc)
if (!isset($metatags)) global $metatags;
$metatags = preg_replace('|<([^/]*)/>|', '|<\1>|', $metatags);


// Used in index
function convert_date_to_locale($initialstringdate) {
	$date_exploded = @explode(' ', $initialstringdate, 3);
	$array_month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$search_month = array_search($date_exploded[1], $array_month)+1;
	$date_converted=gmstrftime(FINK_DATE_FORMAT, mktime(1,0,0,$search_month, $date_exploded[0], $date_exploded[2]));
	// $date_encoding = mb_detect_encoding($date_converted);
	// if ($date_encoding == '') $date_encoding = FINK_SF_ENCODING;
	$date_encoding = FINK_SF_ENCODING;
	$date_converted = mb_convert_encoding($date_converted, "UTF-8", $date_encoding);
	return $date_converted;
}

// Used in News
function gray_line()
{
	global $linkroot;
	print '<img src="'.$linkroot.'img/grey_pixel.gif" height="1" width="100%" alt="-">';
}

// $linkroot is used for links to other parts of the website; $root is
// used for files that are loaded locally.  (This enables us to move
// portions of the website to other servers without losing the navigation.)

if (!isset($linkroot)) {
	global $root;
	$linkroot = $root;
}

// Used in Sections
function insert_sub($navbox, $active_page, $navloc = false) {
	global $root, $linkroot;
	
	// Determine the active page
	$active_page = -1;
	if (!isset($relativepath)) $relativepath = "";
	$dirnames = explode ('/', dirname($_SERVER['PHP_SELF']));
	for ($i = 1; $i < sizeof($dirnames) - substr_count($root, '../'); $i++) {
		$relativepath .= '/' . $dirnames[$i];
	}
	
	for ($i = 0; $i <= sizeof($navbox) - 2 ; $i += 2) {
		$filename = explode('?', $navbox[$i]);
		if ($relativepath . '/' . $filename[0] == $_SERVER['SCRIPT_NAME'] || '/' . $filename[0] == $_SERVER['SCRIPT_NAME']) {
			$active_page = $i;
			break;
		} else if ($navloc && $navloc.$_SERVER['SCRIPT_NAME'] == $navbox[$i]) {
			$active_page = $i;
			break;
		}
	}
	
	// Starts Outputting
	for ($i = 0; $i < sizeof($navbox); $i += 2) {
		if ('Contents' == $navbox[$i + 1]) $navbox[$i + 1] = FINK_CONTENTS;
		if ($i != $active_page) {
			// For testing locally at my machine
			// (also: allows some navbox items to link to other
			// websites)
			if (substr($navbox[$i ], 0, 7) != 'http://') {
				$_link = $linkroot . $navbox[$i ];
			} else {
				$_link = $navbox[$i ];
			}
			if (substr($_link, -2) == '.*') $_link = substr($_link, 0, -2);
			echo "\t\t<li class=\"menu_subitem\"><a href=\"" . $_link . '" >' . $navbox[$i + 1] . "</a></li>\n";
		} else {
			echo "\t\t<li class=\"menu_subitem\"><div class=\"selected\">" . $navbox[$i + 1] . "</div></li>\n";
		}
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
	<title>Fink - <?php echo $title ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="<?php echo META_KEYWORDS; ?>">
	<meta name="description" content="<?php echo META_DESCRIPTION; ?>">
	<meta name="robots" content="all">
<?php
	if (!isset($link_alternate)) {
		$rdf_file = dirname(__FILE__) .'/news/news.' . $lang_code . '.rdf';
		echo "<!-- $rdf_file  -->\n";
		if (is_readable ($rdf_file )) {
			$rdf_file = 'http://feeds2.feedburner.com/FinkProjectNews-' . $lang_code;
		} else {
			$rdf_file = 'http://feeds2.feedburner.com/FinkProjectNews';
		}
		$link_alternate = "<link rel=\"alternate\" title=\"Fink News RDF\" href=\"" . $rdf_file . "\" type=\"application/rss+xml\">";
	}
	print $link_alternate;
?>
	<link rev="made" href="mailto:fink-devel@lists.sourceforge.net">
	<link rel="stylesheet" type="text/css" href="<?php print $linkroot ?>/fink.css">
	<?php if ($metatags) echo $metatags; ?>
	<link rel="start" href="<?php print $linkroot ?>index.php">
	<link rel="copyright" href="<?php print $linkroot ?>legal.php">
	<?php if (isset($i18n_enable_form)) echo '<script type="text/javascript" src="' . $linkroot . 'fink.i18n.js"></script>'; ?>
	<?php if (isset($pdb_scripts)) echo '<script type="text/javascript" src="' . $linkroot . 'fink.pdb.js"></script>'; ?>

</head>
<body bgcolor="#ffffff" text="#000000" link="#0000f0" vlink="#800080" alink="#ff3333"<?php if (isset($pdb_scripts) && !isset($pdb_has_adv_searchoptions)) echo ' onload="switchMenu(\'advancedsearch\', \'triangle\')"' ?>>

<?php /* header and sourceforge logo */ ?>
<div id="header-left">

	<?php if (!isset($is_home)) echo '<a href="' . $linkroot . 'index.php">'; ?>
	<img src="<?php echo $linkroot ?>/img/mlogo.png"  width="171" height="85" border="0" alt="Fink">
	<?php if (!isset($is_home)) echo '</a>'; ?>
</div>

<div id="header">
	<?php /* Call phpLang function */ ?>
	<?php if (function_exists('AddFlags')) AddFlags('', false, $root); ?>
	<br>
<?php if (!isset($hostlogo)) include dirname(__FILE__) . "/hostlogo.inc" ;
		echo str_replace("{img}", $img, HEADER_HOSTED_BY);
?>
</div>

<?php /* main table with navigation column and content column */ ?>
<div id="sidebar">

<?php /* navigation column table */ ?>

<?php /* sections */ ?>
	<div id="sections">
		<?php echo FINK_SECTIONS; ?>
	</div>
	<ul class="menu">
<?php 
	foreach ($section_files as $key => $filename) {
		echo "\t\t<li class=\"menu_item\">";
		if (!isset($nonav)) $nonav = "";
		if (!isset($active_page)) $active_page = "";
		if ($section == $key && 1 == $nonav) {
			echo '<div class="selected" >'. $section_names[$key] . "</div></li>\n";
		} elseif ($section == $key) {
			echo '<a href="' . $section_files[$key] . '">' . $section_names[$key] . "</a></li>\n";
			if (isset($navloc))
				insert_sub ($navbox, $active_page, $navloc);
			else
				insert_sub ($navbox, $active_page);
			echo "\t\t";
		} else {
			echo '<a href="' . $section_files[$key] . '">' . $section_names[$key] . "</a></li>\n";
		}
	} 
?>
<?php /* link to print version */ ?>
<?php if (isset($printlink)) { ?>
		<li class="menu_item">
			<a href="<?php echo $linkroot . $printlink ?>" style="border-width: 0px ; ">
				<img src="<?php echo $linkroot; ?>img/printer.png" 
					alt="<?php echo FINK_PRINTER; ?>" 
					width="18" height="16" 
					align="bottom" 
					style="vertical-align:text-bottom">
				<?php echo FINK_PRINT_VERSION; ?>
			</a>
		</li>
<?php } ?>
	</ul>
	
<?php /* end navigation column */ ?>
</div>
<div id="main">
