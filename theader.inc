<?
/* $Id: theader.inc,v 1.10 2007/12/07 14:50:31 rangerrick Exp $ */

// section navigation (always visible)
$sections = array(
  "index.php", "Home", "home",
  "download/index.php", "Download", "download",
  "pdb/index.php", "Packages", "packages",
  "help/index.php", "Help", "help",
  "faq/index.php", "F.A.Q.", "faq",
  "doc/index.php", "Documentation", "documentation",
  "lists/index.php", "Mailing Lists", "mailing-lists"
);
if (!$section)
  $section = "home";

// main navigation box
$home_navbox = array(
  "index.php", "Home",
  "news/index.php", "News",
  "about.php", "About",
  "people.php", "Contributors",
  "links.php", "Links"
);
if (!is_array($navbox)) {
  $navbox = $home_navbox;
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


// Log the access
//session_start();
//if(!isset($fsroot))
//{
// $fsroot = "./";
//}
//include($fsroot."db.inc.php");
//include($fsroot."pws/stats.php");
//include($fsroot."pws/bro.php");

//$conn = db_connect();
// set the page id
// we could set this variable to "Gallery" for photogallery, etc.
//$page_id = $REQUEST_URI;
// set the visitor id
// I'll set this variable to session id, which is the simpliest way
// This way I won't be able to get information if the user has been on my
// page before - the better way is the usage of cookies.
//$visitor_id = session_id();
// and finaly log the access to the database
//log_access($conn,$page_id,$visitor_id);


?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
<title>Fink - <? print $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="<? print $root ?>fink.css">
<?
if ($metatags)
  print $metatags;
?>
<link rel="start" href="<? print $root ?>index.php">
<link rel="copyright" href="<? print $root ?>legal.php">
</head>
<body bgcolor="#ffffff" text="#000000" link="#0000f0" vlink="#800080" alink="#ff3333">

<? /* header and sourceforge logo */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="bottom">
<td align="left" class="layout"><?
if (!$is_home)
  print '<a href="'.$root.'index.php">';
?><img src="<? print $root ?>img/mlogo.png" 
border="0" alt="Fink"><?
if (!$is_home)
  print '</a>';
?></td>
<td align="right" class="layout">
<span class="default">
Hosted by <a href="http://sourceforge.net/"><img
src="http://sflogo.sourceforge.net/sflogo.php?group_id=17203" width="88"
height="31" border="0" alt="SourceForge Logo" style="vertical-align:text-bottom"></a>
</span>
</td>
</tr>
<tr valign="top">
<td align="left" style="background-image:url(<? print $root ?>img/top-line.png)" class="layout"><img
src="<? print $root ?>img/title2-2.png" width="400" height="8" border="0" alt=""></td>
<td style="background-image:url(<? print $root ?>img/top-line.png)" class="layout"><img src="<? print $root ?>img/shim.gif" width="1"
height="8" border="0" alt=""></td>
</tr>
</table>

<? /* main table with navigation column and content column */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td align="left" width="120" bgcolor="#eeeeee" class="layout">

<? /* navigation column table */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="120">

<? /* sections */ ?>
<tr align="left"><td colspan="2" bgcolor="#dddddd" class="layout"><img src="<? print $root ?>img/sect-head.png"
width="120" height="26" border="0" alt="Sections:"></td></tr>
<?
for ($i = 0; $i < sizeof($sections); $i += 3) {
  $_name = $sections[$i+2];
  print '<tr align="left">';
  if ($section == $sections[$i+2]) {
    print '<td colspan="2" class="layout" bgcolor="#87b9e7"><a href="'.$root.$sections[$i].'">';
    print '<img src="'.$root.'img/s-'.$_name.'-down.gif" width="120" height="18" border="0" alt="'.$sections[$i+1].'">';
  } else {
    print '<td colspan="2" class="layout"><a href="'.$root.$sections[$i].'">';
    print '<img src="'.$root.'img/s-'.$_name.'.gif" width="120" height="18" border="0" alt="'.$sections[$i+1].'">';
  }
  print '</a></td></tr>'."\n";
}
?>
<tr align="left"><td height="3" colspan="2" bgcolor="#FFCF61" class="layout"></td></tr>

<? /* intra-section navigation */
if (!$nonav) {

  // determine active page
  $active_page = -1;
  for ($i = sizeof($navbox)-2; $i >= 0 ; $i -= 2) {
    if (ereg($navbox[$i]."$", $PHP_SELF)) {
      $active_page = $i;
      break;
    }
  }

?>
<tr align="left"><td colspan="2" bgcolor="#dddddd" class="layout"><img src="<? print $root ?>img/nav-head.png"
width="120" height="26" border="0" alt="Navigation:"></td></tr>
<?
if (is_array($parents)) {
  for ($i = 0; $i < sizeof($parents); $i += 2) {
    $link = '<a href="'.$root.$parents[$i].'">';

    print '<tr align="left" valign="middle"><td class="layout">';
    print $link.'<img src="'.$root.'img/nav-upicon.gif" width="18" height="15" border="0" alt="^ "></a>';
    print '</td><td class="layout">';
    print '<span class="nav">'.$link.$parents[$i+1].'</a></span>';
    print '</td></tr>'."\n";

    print '<tr bgcolor="#ffffff"><td class="layout"><img src="'.$root.'img/nav-space1.gif" width="18" height="1" border="0" alt=""></td><td class="layout"><img src="'.$root.'img/nav-space2.gif" width="102" height="1" border="0" alt=""></td></tr>'."\n";
  }
}

for ($i = 0; $i < sizeof($navbox); $i += 2) {
  if ($i != $active_page) {
    $link = $navbox[$i];
    if (substr($link,-2) == ".*")
      $link = substr($link,0,-2);
    $link = '<a href="'.$root.$link.'">';
  } else {
    $link = 0;
  }

  if ($link) {
    print '<tr class="layout" align="left" valign="middle"><td class="layout">';
    print $link.'<img src="'.$root.'img/nav-normicon.gif" width="18" height="15" border="0" alt="- "></a>';
    print '</td><td class="layout">';
    print '<span class="nav">'.$link.$navbox[$i+1].'</a></span>';
  } else {
    print '<tr class="layout" align="left" valign="middle" bgcolor="#87b9e7"><td class="layout">';
    print '<img src="'.$root.'img/nav-downicon.gif" width="18" height="15" border="0" alt="- ">';
    print '</td><td bgcolor="#87b9e7" class="layout">';
    print '<span class="nav">'.$navbox[$i+1].'</span>';
  }
  print '</td></tr>'."\n";

  print '<tr class="layout" bgcolor="#ffffff"><td class="layout" height="1"></td><td class="layout" height="1"></td></tr>'."\n";
}
?>
<tr align="left"><td height="3" colspan="2" bgcolor="#FFCF61" class="layout"></td></tr>

<?
} /* end !$nonav */

if ($printlink) {
?>
<tr align="left"><td colspan="2" class="layout"><a href="<? print $root.$printlink ?>"><img
src="<? print $root ?>img/printlink.gif" width="120" height="22"
border="0" alt="Print Version"></a></td></tr>
<tr align="left"><td colspan="2" bgcolor="#FFCF61" class="layout"><img src="<? print $root
?>img/sect-bottom.png" width="120" height="3" border="0"
alt=""></td></tr>
<?
}

?>

<tr><td>&nbsp;</td></tr>

</table>
<? /* end navigation column */ ?>

</td><td align="left" width="100%">

<? /* content column table */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>&nbsp;&nbsp;&nbsp;</td>
<td></td>
<td>&nbsp;&nbsp;&nbsp;</td></tr>

<tr><td></td>
<td width="100%">
<? /* content */


/*** end of inline HTML ***/

/* functions to create key-value tables on the fly */

function it_start() {
  global $it_flag;

  $it_flag = 0;
?>
<table border="0" cellpadding="0" cellspacing="0">
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

function it_item2($title, $item1, $item2) {
  global $it_flag, $root;

  if ($it_flag) {
    print '<tr><td><img src="'.$root.'img/shim.gif" width="1" height="8" border="0" alt=""></td></tr>'."\n";
  }
  $it_flag = 1;

  print '<tr valign="top"><td>'.$title.'</td><td>'.$item.'</td><td>'.$item2.'</td></tr>'."\n";
}


function it_end() {
?>
</table>
<?
}

/* mis functions */
function gray_line ()
{
	global $root;
	print '<img src="'.$root.'img/grey_pixel.gif" height="1" width="100%" alt="-">';
}

?>
