<?
/* $Id: header.inc,v 1.93 2005/06/13 11:49:16 fingolfin Exp $ */
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


// param() allows us to work without register_globals set on the server.
function param($Name) {
	 global $HTTP_GET_VARS;
	 global $HTTP_POST_VARS;
	 global $HTTP_COOKIE_VARS;
	 if(isset($HTTP_GET_VARS[$Name]))
		return($HTTP_GET_VARS[$Name]);
	
	 if(isset($HTTP_POST_VARS[$Name]))
		return($HTTP_POST_VARS[$Name]);
	
	 if(isset($HTTP_COOKIE_VARS[$Name]))
		return($HTTP_COOKIE_VARS[$Name]);
	
	 return("");
}	
 
// Language Code (from phpLang.inc.php)
include_once dirname(__FILE__) . "/phpLang.inc.php";
$lang_code = 'en';
if ((phpLang_current)) $lang_code = phpLang_current;

if (is_readable (dirname(__FILE__) . "/constants." . $lang_code . ".inc"))
	include_once dirname(__FILE__) . "/constants." . $lang_code . ".inc";

/* The Sections.  Used in Menu Navigation Bar */
define (FINK_LC_ALL, 'en_US');
define (FINK_SF_ENCODING, 'ISO-8859-1');
define (FINK_DATE_FORMAT, '%d %B %Y');

/* The Sections.  Used in Menu Navigation Bar */
define (FINK_SECTION_HOME, 'Home');
define (FINK_SECTION_DOWNLOAD, 'Download');
define (FINK_SECTION_PACKAGE, 'Packages');
define (FINK_SECTION_HELP, 'Help');
define (FINK_SECTION_FAQ, 'F.A.Q.');
define (FINK_SECTION_DOCUMENTATION, 'Documentation');
define (FINK_SECTION_MAILING_LISTS, 'Mailing Lists');

/* The Home Subsections.  Used in Menu Navigation Bar */
define (FINK_SECTION_HOME_INDEX, 'Index');
define (FINK_SECTION_HOME_NEWS, 'News');
define (FINK_SECTION_HOME_ABOUT, 'About');
define (FINK_SECTION_HOME_CONTRIBUTORS, 'Contributors');
define (FINK_SECTION_HOME_LINKS, 'Links');

/* The word 'Sections'.  Used in Menu Navigation Bar */
define (FINK_SECTIONS, 'Sections');

/* Contents as Table of Contents.  Used in FAQ/Documentation Sections */
define (FINK_CONTENTS, 'Contents');
define (FINK_NEXT, 'Next');
define (FINK_Q, 'Q');
define (FINK_A, 'A');

/* Printer */
define (FINK_PRINTER, 'Printer');
define (FINK_PRINT_VERSION, 'Print Version');

/* Header and Footer */
define (META_KEYWORDS, 'Mac OS X, Fink, Debian, Macintosh, Apple, UNIX, Open Source, download, free software, porting, development, package management');
define (META_DESCRIPTION, 'The Fink Team wants to bring the full world of Unix Open Source software to Darwin and Mac OS X. We modify Unix software so that it compiles and runs on Mac OS X and make it available for download as a coherent distribution');
define (HEADER_HOSTED_BY, 'Hosted By {img}');
define (FOOTER_AVAILABLE_LANGUAGES, 'Available Languages');
define (FOOTER_GENERATED_DYNAMICALLY, 'Generated dynamically');
define (FOOTER_DATABASE_LAST_UPDATED, 'Database last updated on  %a, %b %d %Y, %R GMT');
define (FOOTER_LAST_CHANGED, 'Last changed by {author} on {date}, {time}');

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
	'home' => 'index.php?phpLang='. $lang_code,
	'download' => 'download/index.php?phpLang='. $lang_code,
	'packages' => 'pdb/index.php?phpLang='. $lang_code,
	'help' => 'help/index.php?phpLang='. $lang_code,
	'faq' => 'faq/index.php?phpLang='. $lang_code,
	'documentation' => 'doc/index.php?phpLang='. $lang_code, 
	'mailing-lists' => 'lists/index.php?phpLang='. $lang_code
);

if (!$section) $section = "home";

// main navigation box
if (!is_array($navbox) && $nonav != 1) {
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
if (substr($cvs_author,0,1) == "$")
  $cvs_author = rtrim(substr($cvs_author, 1, -1));
if (substr($cvs_date,0,1) == "$")
  $cvs_date = rtrim(substr($cvs_date, 1, -1));
//  get data
if (ereg("^Author: (.*)$", $cvs_author, $r)) {
  $author = $r[1];
} else {
  $author = "-unknown-";
}
if (ereg("^Date: ([0-9]{2,4})/([0-9]{1,2})/([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $cvs_date, $r)) {
  $date = gmmktime($r[4], $r[5], $r[6], $r[2], $r[3], $r[1]);
} else {
  $date = filemtime($PATH_TRANSLATED);
}
// converts xml style tag to html 4.01 transitional (ad hoc)
$metatags = ereg_replace('<([^/]*)/>', '<\1>', $metatags);

// Functions Used in PDB
        
function it_start() {
  global $it_flag;

  $it_flag = 0;
?>
<table cellspacing="0">
<?
}

function it_item($title, $item) {
  global $it_flag, $root;

  if ($it_flag) {
    print '<tr><td><img src="'.$root.'img/shim.gif" width="1" height="8" border="0" alt=""></td></tr>'."\n";
  }
  $it_flag = 1;

  print '<tr valign="top"><td>'.$title.'</td><td>&nbsp;&nbsp;&nbsp;</td><td>'.
        $item.'</td></tr>'."\n";
}

function it_start2() {
  global $it_flag;

  $it_flag = 0;
?>
<table cellspacing="0">
<?
}

function it_item2($title, $item1, $item2) {
  global $it_flag, $root;

  if ($it_flag) {
    print '<tr><td><img src="'.$root.'img/shim.gif" width="1" height="8" border="0" alt=""></td><td></td></tr>'."\n";
  }
  $it_flag = 1;
  print '<tr valign="top"><td width="150">'.$title.'</td><td width="120">'.$item1.'</td><td  width="120">'.$item2.'</td></tr>'."\n";
}

function it_end() {
echo '</table>';
}

// Used in index
function convert_date_to_locale ($initialstringdate) {
	$date_exploded = @explode(' ', $initialstringdate, 3);
	$array_month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$search_month = array_search($date_exploded[1], $array_month)+1;
	$date_converted=gmstrftime(FINK_DATE_FORMAT, mktime(1,0,0,$search_month, $date_exploded[0], $date_exploded[2],0));
	// $date_encoding = mb_detect_encoding($date_converted);
	// if ($date_encoding == '') $date_encoding = FINK_SF_ENCODING;
	$date_encoding = FINK_SF_ENCODING;
	$date_converted = mb_convert_encoding($date_converted, "UTF-8", $date_encoding);
	return $date_converted;
}

// Used in News
function gray_line ()
{
	global $root;
	print '<img src="'.$root.'img/grey_pixel.gif" height="1" width="100%" alt="-">';
}

// $linkroot is used for links to other parts of the website; $root is
// used for files that are loaded locally.  (This enables us to move
// portions of the website to other servers without losing the navigation.)

if (!$linkroot) $linkroot = $root;

// Used in Sections
function insert_sub ($navbox, $active_page) {
	global $root, $linkroot;
	
	// Determine the active page
	$active_page = -1;
	$dirnames = explode ('/', dirname($_SERVER['PHP_SELF']));
	for ($i = 1; $i < sizeof($dirnames) - substr_count($root, '../'); $i++) {
		$relativepath .= '/' . $dirnames[$i];
	}
	
	for ($i = 0; $i <= sizeof($navbox) - 2 ; $i += 2) {
		$filename = explode('?', $navbox[$i]);
		if ($relativepath . '/' . $filename[0] == $_SERVER['SCRIPT_NAME'] || '/' . $filename[0] == $_SERVER['SCRIPT_NAME']) {
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
	<title>Fink - <? echo $title ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="<? echo META_KEYWORDS; ?>">
	<meta name="description" content="<? echo META_DESCRIPTION; ?>" 
	<meta name="robots" content="all">
<?
	$rdf_file = dirname(__FILE__) .'/news/news.' . $lang_code . '.rdf';
	echo "<!-- $rdf_file  -->\n";
	if (is_readable ($rdf_file )) {
		$rdf_file = 'http://fink.sourceforge.net/news/news.' . $lang_code . '.rdf';
	} else {
		$rdf_file = 'http://fink.sourceforge.net/news/news.rdf';
	}
?>
	<link rel="alternate" title="Fink News RDF" href="<? print $rdf_file ?>" type="application/rss+xml">
	<link rev="made" href="mailto:fink-devel@lists.sourceforge.net">
	<link rel="stylesheet" href="<? print $root ?>fink.css">
	<? if ($metatags) echo $metatags; ?>
	<link rel="start" href="<? print $root ?>index.php">
	<link rel="copyright" href="<? print $root ?>legal.php">


</head>
<body bgcolor="#ffffff" text="#000000" link="#0000f0" vlink="#800080" alink="#ff3333">
<!-- Tracking Code v3.01 - All rights reserved -->
<!-- More tracking, arranged for the bindist -->
<script language="javascript1.1" src="http://fink.sourceforge.net/tracking.js" type="text/javascript"></script><noscript>
<img src="http://statistics.dynamicsitestats.com/p.pl?a=10001728464933&amp;js=no" width="1" height="1" alt=""></noscript><!--//-->
<!-- End of Tracking Code -->

<? /* header and sourceforge logo */ ?>
<div id="header-left">

	<? if (!$is_home) echo '<a href="' . $linkroot . 'index.php">'; ?>
	<img src="<? echo $root ?>img/mlogo.png"  width="171" height="85" border="0" alt="Fink">
	<? if (!$is_home) echo '</a>'; ?>
</div>

<div id="header">
	<? /* Call phpLang function */ ?>
	<? if (function_exists(AddFlags)) AddFlags('', false, $root); ?>
	<br>
<? if (!$hostlogo) include dirname(__FILE__) . "hostlogo.inc" ;
		echo str_replace("{img}", $img, HEADER_HOSTED_BY);
?>
</div>

<? /* main table with navigation column and content column */ ?>
<div id="sidebar">

<? /* navigation column table */ ?>

<? /* sections */ ?>
	<div id="sections">
		<? echo FINK_SECTIONS; ?>
	</div>
	<ul class="menu">
<? 
	foreach ($section_files as $key => $filename) {
		echo "\t\t<li class=\"menu_item\">";
		if ($section == $key && 1 == $nonav) {
			echo '<div class="selected" >'. $section_names[$key] . "</div></li>\n";
		} elseif ($section == $key) {
			echo '<a href="' . $linkroot . $section_files[$key] . '">' . $section_names[$key] . "</a></li>\n";
			insert_sub ($navbox, $active_page);
			echo "\t\t";
		} else {
			echo '<a href="' . $linkroot . $section_files[$key] . '">' . $section_names[$key] . "</a></li>\n";
		}
	} 
?>
<? /* link to print version */ ?>
<? if ($printlink) { ?>
		<li class="menu_item">
			<a href="<? echo $linkroot . $printlink ?>" style="border-width: 0px ; ">
				<img src="<? echo $root; ?>img/printer.png" 
					alt="<? echo FINK_PRINTER; ?>" 
					width="18" height="16" 
					align="bottom" 
					style="vertical-align:text-bottom">
				<? echo FINK_PRINT_VERSION; ?>
			</a>
		</li>
<? } ?>
	</ul>
	
<? /* end navigation column */ ?>
</div>
<div id="main">