<?
/* $Id: header.inc,v 1.68 2004/03/01 10:35:01 babayoshihiko Exp $ */

// Language Code (from phpLang.inc.php)
include_once dirname(__FILE__) . "/phpLang.inc.php";
$lang_code = 'en';
if ((phpLang_current)) $lang_code = phpLang_current;

if (is_readable (dirname(__FILE__) . "/constants." . $lang_code . ".inc"))
	include_once dirname(__FILE__) . "/constants." . $lang_code . ".inc";

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
	'home' => 'index.php',
	'download' => 'download/index.php',
	'packages' => 'pdb/index.php',
	'help' => 'help/index.php',
	'faq' => 'faq/index.php',
	'documentation' => 'doc/index.php', 
	'mailing-lists' => 'lists/index.php'
);

if (!$section) $section = "home";

// main navigation box
if (!is_array($navbox) && $nonav != 1) {
	$navbox = array(
		'index.php', FINK_SECTION_HOME_INDEX,
		'news/index.php', FINK_SECTION_HOME_NEWS,
		'about.php', FINK_SECTION_HOME_ABOUT,
		'people.php', FINK_SECTION_HOME_CONTRIBUTORS,
		'links.php', FINK_SECTION_HOME_LINKS
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

// Used in News
function gray_line ()
{
	global $root;
	print '<img src="'.$root.'img/grey_pixel.gif" height="1" width="100%" alt="-">';
}

// Used in Sections
function insert_sub ($navbox, $active_page) {
	global $root;
	
	// Determine the active page - still testing
	$active_page = -1;
	$dirname1 = split('/', $_SERVER['PHP_SELF']);
	$filename1 = $dirname1[sizeof($dirname1) - 1];
	$dirname1 = $dirname1[sizeof($dirname1) - 2];
	
	for ($i = 0; $i <= sizeof($navbox) - 2 ; $i += 2) {
		
		$dirname2 = split('/', $navbox[$i]);
		$filename2 = $dirname2[sizeof($dirname2) - 1];
		$filename2 = split('\?', $filename2);
		$filename2 = $filename2[0];
		$dirname2 = $dirname2[sizeof($dirname2) - 2];
		
		if ($filename1 == $filename2) {
		//if ( ereg($filename, $navbox[$i]) ) {
			if ($filename1 != 'index.php') {
				$active_page = $i;
				break;
			} else {
				if ($dirname1 == $dirname2 || $dirname1 == 'fink' && $dirname2 == '') {
					$active_page = $i;
					break;
				}
			}
		}
	}
	if (-1 == $active_page) $active_page = 0;
	
	if ('htdocs/index.php' == $filename && $active_page == -1) $active_page = 0; 
	// testing
	if ('fink/index.php' == $filename && $active_page == -1) $active_page = 0; 
	if ('test/index.php' == $filename && $active_page == -1) $active_page = 0; 
	
	for ($i = 0; $i < sizeof($navbox); $i += 2) {
		if ('Contents' == $navbox[$i + 1]) $navbox[$i + 1] = FINK_CONTENTS;
		if ($i != $active_page) {
			// For testing locally at my machine
			if (substr($navbox[$i ], 0, 7) != 'http://') {
				$_link = $root . $navbox[$i ];
			} else {
				$_link = $navbox[$i ];
			}
			if (substr($_link, -2) == '.*') $_link = substr($_link, 0, -2);
			echo "\t\t\t<dd class=\"menu_subitem\"><a href=\"" . $_link . '" >' . $navbox[$i + 1] . "</a></dd>\n";
		} else {
			echo "\t\t\t<dd class=\"menu_subitem\"><div class=\"file\">" . $navbox[$i + 1] . "</div></dd>\n";
		}
	}
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html >
<head>
	<title>Fink - <? echo $title ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="Mac OS X, Fink, Debian, Macintosh, Apple, UNIX, Open Source, download, free software, porting, development, package management">
	<meta name="description" content="The Fink Team wants to bring the full world of Unix Open Source software to Darwin and Mac OS X. We modify Unix software so that it compiles and runs on Mac OS X and make it available for download as a coherent distribution" 
	<meta name="robots" content="all">
	<link rev="made" href="mailto:fink-devel@lists.sourceforge.net">
	<link rel="stylesheet" href="<? print $root ?>fink.css">
	<? if ($metatags) echo $metatags; ?>
	<link rel="start" href="<? print $root ?>index.php">
	<link rel="copyright" href="<? print $root ?>legal.php">
</head>
<body bgcolor="#ffffff" text="#000000" link="#0000f0" vlink="#800080" alink="#ff3333">

<? /* header and sourceforge logo */ ?>
<table width="100%" cellspacing="0" class="yellowboarder">
<tr valign="bottom">
	<td align="left" rowspan="2">
	<? if (!$is_home) echo '<a href="' . $root . 'index.php">'; ?>
	<img src="<? echo $root ?>img/mlogo.png"  border="0" alt="Fink">
	<? if (!$is_home) echo '</a>'; ?>
	</td>
	<td align="right" >
	<? if (function_exists(AddFlags)) AddFlags(' ', true, $root); ?>
	</td>
</tr>
<tr valign="bottom">
	<td align="right" >
		Hosted by
		<a href="http://sourceforge.net/">
		<img src="http://sourceforge.net/sflogo.php?group_id=17203" width="88"
			height="31" border="0" alt="SourceForge" style="vertical-align:text-bottom">
		</a>
	</td>
</tr>
</table>
<? /* main table with navigation column and content column */ ?>
<table width="100%" cellspacing="0" >
<tr valign="top">
<td align="left" width="120" class="layout"  bgcolor="#eeeeee" >
	<dl>
<? /* navigation column table */ ?>

<? /* sections */ ?>
	<dt class="yellowboarder" style="padding: 4px 0px; text-align: center; background-image:url(<? echo $root; ?>img/stripes.gif)"><? echo FINK_SECTIONS; ?></dd>
	
<? foreach ($section_files as $key => $filename) {
		$toc_sections_class = 'toc_sections';
		if ($section == $key) {
			if ($nonav == 1) {
?>
		<dd class="menu_item"><div class="file" ><? echo $section_names[$key] ?></div></dd>
<?
			} else {
?>
		<dd class="menu_item"><a href="<? echo $root . $section_files[$key] ?>" ><? echo $section_names[$key] ?></a>
<?
				if ($section == $key && $nonav != 1) insert_sub ($navbox, $active_page);
?>
		</dd>
<?
			}
		} else {
?>
		<dd class="menu_item"><a href="<? echo $root . $section_files[$key] ?>" ><? echo $section_names[$key] ?></a></dd>
<?
		}
	} 
?>

<? /* link to print version */ ?>
<? if ($printlink) { ?>
		<dt>
			<a href="<? echo $root . $printlink ?>">
			<img src="<? echo $root ?>img/printlink.gif" width="120" height="22" border="0" alt="Print Version">
			</a>
		</dt>
<? } ?>
<? /* end navigation column */ ?>
	</dl>
</td>
<td align="left" width="100%">

<? /* content column table */ ?>
	<table width="100%" cellspacing="0" >
	<tr><td>&nbsp;&nbsp;&nbsp;</td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;</td></tr>
	
	<tr><td></td>
	<td width="100%">

<? /* Call phpLang function */ ?>
<div style="text-align: right ;">
</div>