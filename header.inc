<?
/* $Id: header.inc,v 1.4 2001/01/12 13:16:49 chrisp Exp $ */

// available pages
$pages_main = array(
  "index.php", "Home",
  "darwin.php", "Darwin",
  "todo.php", "ToDo",
  "links.php", "Links"
);
$pages_darwin = array(
  "darwin.php", "Darwin",
  "porting.php", "Porting",
  "libtool.php", "libtool",
  "x11-choices.php", "X11 Choices",
  "links.php", "Links"
);

// get author and change date from CVS vars
//  kill dollar-envelope
$cvs_author = rtrim(substr($cvs_author, 1, -1));
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

// determine section
if (!$section) {
  $section = "general";
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>Fink - <? print $title ?></title>
<link rel="stylesheet" href="fink.css">
</head>
<body bgcolor="#ffffff" text="#000000" link="#0000f0" vlink="#800080" alink="#ff3333">

<? /* header and sourceforge logo */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="bottom">
<td align="left"><?
if (!ereg("index.php", $PHP_SELF))
  print '<a href="index.php">';
?><img src="img/title1.gif" width="248" height="43"
border="0" alt="Fink" /><?
if (!ereg("index.php", $PHP_SELF))
  print '</a>';
?></td>
<td align="right">
<p>Hosted by <a href="http://sourceforge.net/"><img
src="http://sourceforge.net/sflogo.php?group_id=17203" width="88"
height="31" border="0" alt="SourceForge Logo" align="absbottom"></a>&nbsp;</p>
</td>
</tr>
<tr valign="top">
<td align="left" background="img/top-line.gif"><img
src="img/title2.gif" width="248" height="8" border="0" alt=""></td>
<td background="img/top-line.gif"><img src="img/shim.gif" width="1"
height="8" border="0" alt=""></td>
</tr>
</table>

<? /* top menu and section marker */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top">
<td align="left" background="img/menu-back.gif"><a
href="index.php"><img src="img/menu-home.gif" width="54" height="22"
border="0" alt="Home" /></a><a href="download.php"><img
src="img/menu-download.gif" width="76" height="22" border="0"
alt="Download" /></a><!-- <a href="index.php"><img src="img/menu-intro.gif"
width="94" height="22" border="0" alt="Introduction" /></a> --><a
href="darwin.php"><img src="img/menu-darwin.gif" width="56"
height="22" border="0" alt="Darwin" /></a></td>

<td align="right" background="img/menu-back.gif"><a
href="content.php"><img src="img/marker-<? print $section ?>.gif"
width="160" height="22" border="0" alt="<? print "Section: $section"
?>" /></a></td>
</tr>
<tr><td colspan="2" background="img/top-line2.gif"><img src="img/top-line2.gif"
width="32" height="3" border="0" alt="" /></td></tr>
</table>

<? /* main content table */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>&nbsp;&nbsp;&nbsp;</td>
<td></td>
<td>&nbsp;&nbsp;&nbsp;</td></tr>
<tr valign="top"><td></td><td width="100%">


<? /* navigation box */

$donav = 0;
if ($wantnav == "main") {
  $pages = $pages_main;
  $donav = 1;
} elseif ($wantnav == "darwin") {
  $pages = $pages_darwin;
  $donav = 1;
}

if ($donav) {
  // determine active page
  $active_page = -1;
  for ($i = 0; $i < sizeof($pages); $i += 2) {
    if (ereg($pages[$i]."$", $PHP_SELF)) {
      $active_page = $i;
    }
  }

?>
<table align="right" border="0" cellpadding="0" cellspacing="0"
width="120">
<tr><td colspan="3" width="120"><img src="img/nav-top.gif" width="120"
height="30" border="0" alt="Navigation:"></td></tr>
<tr valign="top"><td width="20" background="img/nav-left.gif"><img
src="img/nav-left.gif" width="20" height="16" border="0" alt=""></td>
<td width="92" background="img/nav-center.gif">

<p class="nav"><?
for ($i = 0; $i < sizeof($pages); $i += 2) {
  $showlink = ($i != $active_page);
  if ($showlink)
    print '<a href="'.$pages[$i].'">';
  else
    print '<b>';
  print $pages[$i+1];
  if ($showlink)
    print '</a>';
  else
    print '</b>';
  print "<br>\n";
}
?><img src="img/shim.gif" width="92" height="1" border="0" alt="" /></p>

</td>
<td width="8" background="img/nav-right.gif"><img
src="img/nav-right.gif" width="8" height="16" border="0"
alt=""></td></tr>
<tr><td colspan="3" width="120"><img src="img/nav-bottom.gif" width="120"
height="24" border="0" alt=""></td></tr>
</table>

<? /* end navigation box */
}
?>
