<?
/* $Id: header.inc,v 1.8 2001/02/11 12:17:38 chrisp Exp $ */

// available pages
$pages_main = array(
  "index.php", "Home",
  "download.php", "Download",
  "fink/index.php", "Fink",
  "darwin/index.php", "Darwin",
  "links.php", "Links"
);
$pages_fink = array(
  "fink/index.php", "Fink",
  "download.php", "Download",
  "fink/todo.php", "ToDo",
  "fink/info-format.php", "Packaging",
  "links.php", "Links"
);
$pages_darwin = array(
  "darwin/index.php", "Darwin",
  "darwin/porting.php", "Porting",
  "darwin/gnome.php", "GNOME",
  "darwin/patches.php", "Patches",
  "darwin/libtool.php", "libtool",
  "darwin/x11-choices.php", "X11 Choices",
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
<link rel="stylesheet" href="<? print $root ?>fink.css">
</head>
<body bgcolor="#ffffff" text="#000000" link="#0000f0" vlink="#800080" alink="#ff3333">

<? /* header and sourceforge logo */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="bottom">
<td align="left"><?
if (!$is_home)
  print '<a href="'.$root.'index.php">';
?><img src="<? print $root ?>img/title1.gif" width="248" height="43"
border="0" alt="Fink" /><?
if (!$is_home)
  print '</a>';
?></td>
<td align="right">
<p>Hosted by <a href="http://sourceforge.net/"><img
src="http://sourceforge.net/sflogo.php?group_id=17203" width="88"
height="31" border="0" alt="SourceForge Logo" align="absbottom"></a>&nbsp;</p>
</td>
</tr>
<tr valign="top">
<td align="left" background="<? print $root ?>img/top-line.gif"><img
src="<? print $root ?>img/title2.gif" width="248" height="8" border="0" alt=""></td>
<td background="<? print $root ?>img/top-line.gif"><img src="<? print $root ?>img/shim.gif" width="1"
height="8" border="0" alt=""></td>
</tr>
</table>

<? /* top menu and section marker */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top">
<td align="left" background="<? print $root ?>img/menu-back.gif"><a
href="<? print $root ?>index.php"><img src="<? print $root
?>img/menu-home.gif" width="54" height="22" border="0" alt="Home"
/></a><a href="<? print $root ?>download.php"><img src="<? print $root
?>img/menu-download.gif" width="76" height="22" border="0"
alt="Download" /></a><a href="<? print $root ?>fink/index.php"><img
src="<? print $root ?>img/menu-fink.gif" width="40" height="22"
border="0" alt="Fink" /></a><a href="<? print $root
?>darwin/index.php"><img src="<? print $root ?>img/menu-darwin.gif"
width="58" height="22" border="0" alt="Darwin" /></a></td>

<td align="right" background="<? print $root ?>img/menu-back.gif"><a
href="<? print $root ?>content.php"><img src="<? print $root ?>img/marker-<? print $section ?>.gif"
width="160" height="22" border="0" alt="<? print "Section: $section"
?>" /></a></td>
</tr>
<tr><td colspan="2" background="<? print $root ?>img/top-line2.gif"><img src="<? print $root ?>img/top-line2.gif"
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
} elseif ($wantnav == "fink") {
  $pages = $pages_fink;
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
<tr><td colspan="3" width="120"><img src="<? print $root ?>img/nav-top.gif" width="120"
height="30" border="0" alt="Navigation:"></td></tr>
<tr valign="top"><td width="20" background="<? print $root ?>img/nav-left.gif"><img
src="<? print $root ?>img/nav-left.gif" width="20" height="16" border="0" alt=""></td>
<td width="92" background="<? print $root ?>img/nav-center.gif">

<p class="nav"><?
for ($i = 0; $i < sizeof($pages); $i += 2) {
  $showlink = ($i != $active_page);
  if ($showlink)
    print '<a href="'.$root.$pages[$i].'">';
  else
    print '<b>';
  print $pages[$i+1];
  if ($showlink)
    print '</a>';
  else
    print '</b>';
  print "<br>\n";
}
?><img src="<? print $root ?>img/shim.gif" width="92" height="1" border="0" alt="" /></p>

</td>
<td width="8" background="<? print $root ?>img/nav-right.gif"><img
src="<? print $root ?>img/nav-right.gif" width="8" height="16" border="0"
alt=""></td></tr>
<tr><td colspan="3" width="120"><img src="<? print $root ?>img/nav-bottom.gif" width="120"
height="24" border="0" alt=""></td></tr>
</table>

<? /* end navigation box */
}
?>
