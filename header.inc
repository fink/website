<?
/* $Id: header.inc,v 1.59 2004/02/28 15:52:08 babayoshihiko Exp $ */

// Language Code (from phpLang.inc.php)
include_once dirname(__FILE__) . "/phpLang.inc.php";
$lang_code = 'en';
if ((phpLang_current)) $lang_code = phpLang_current;

if ('en' == $lang_code) {
	// section navigation (always visible)
	$section_names = array(
		'home' => 'Home',
		'download' => 'Download',
		'packages' => 'Packages',
		'help' => 'Help',
		'faq' => 'F.A.Q.',
		'documentation' => 'Documentation',
		'mailing-lists' => 'Mailing Lists'
	);
} elseif ('ja' == $lang_code)  {
	$section_names = array(
		'home' => 'ホーム',
		'download' => 'ダウンロード',
		'packages' => 'パッケージ',
		'help' => 'ヘルプ',
		'faq' => 'F.A.Q.',
		'documentation' => '文書',
		'mailing-lists' => 'メーリングリスト'
	);
}

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
if (!is_array($navbox) && $nonva != 1) {
	$navbox = array(
		"index.php", "Home",
		"news/index.php", "News",
		"about.php", "About",
		"people.php", "Contributors",
		"links.php", "Links"
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
		echo "\t<tr>\n";
		if ($i != $active_page) {
			// For testing locally at my machine
			if (substr($navbox[$i ], 0, 7) != 'http://') {
				$_link = $root . $navbox[$i ];
			} else {
				$_link = $navbox[$i ];
			}
			
			if (substr($link, -2) == ".*") $link = substr($link, 0, -2);
			
			echo "\t\t<td class=\"toc_subsections\">\n";
			echo "\t\t\t<a href=\"" . $_link . '" >' . $navbox[$i + 1] . "</a>\n";
		} else {
			echo "\t\t<td class=\"toc_subsections_selected\">\n";
			echo "\t\t\t" . $navbox[$i + 1] . "\n";
		}
		echo "\t\t</td>\n";
		echo "\t</tr>\n";
	}
	echo "\t\t<tr><td>$filename</td></tr>\n";
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
<table width="100%">
<tr valign="bottom">
	<td align="left" class="toc_top">
	<? if (!$is_home) echo '<a href="' . $root . 'index.php">'; ?>
	<img src="<? echo $root ?>img/mlogo.png"  border="0" alt="Fink">
	<? if (!$is_home) echo '</a>'; ?>
	</td>
	<td align="right" class="toc_top">
		<span class="default">
		Hosted by
		<a href="http://sourceforge.net/">
		<img src="http://sourceforge.net/sflogo.php?group_id=17203" width="88"
			height="31" border="0" alt="SourceForge" style="vertical-align:text-bottom">
		</a>
		</span>
	</td>
</tr>
</table>
<? /* main table with navigation column and content column */ ?>
<table width="100%" >
	<tr valign="top">
		<td align="left" width="120" class="layout"  bgcolor="#eeeeee" >

<? /* navigation column table */ ?>
	<table width="120" >

<? /* sections */ ?>
	<tr>
		<td align="center" class="toc_top" style="background-image:url(<? echo $root; ?>img/stripes.gif)">Sections</td></tr>
<? foreach ($section_files as $key => $filename) {
	
	$toc_sections_class = 'toc_sections';
	if ($section == $key && $nonav == 1) $toc_sections_class = 'toc_sections_selected';
?>
	<tr>
		<td class="<? echo  $toc_sections_class ?>">
			<a href="<? echo $root . $section_files[$key] ?>" ><? echo $section_names[$key] ?></a>
		</td>
	</tr>
<?
	if ($section == $key && $nonav != 1) insert_sub ($navbox, $active_page);
	} 
?>

<? /* link to print version */ ?>
<? if ($printlink) { ?>
	<tr>
		<td class="toc_top">&nbsp;</td>
	</tr>
	<tr>
		<td class="toc_top">
			<a href="<? echo $root . $printlink ?>">
			<img src="<? echo $root ?>img/printlink.gif" width="120" height="22" border="0" alt="Print Version">
			</a>
		</td>
	</tr>
<? } ?>

</table>
<? /* end navigation column */ ?>

</td>
<td align="left" width="100%">

<? /* content column table */ ?>
	<table width="100%">
	<tr><td>&nbsp;&nbsp;&nbsp;</td>
	<td></td>
	<td>&nbsp;&nbsp;&nbsp;</td></tr>
	
	<tr><td></td>
	<td width="100%">

<? /* Call phpLang function */ ?>
<? if (function_exists(AddFlags)) AddFlags(' ', true); else echo "&nbsp;"; ?>
