<?
/* $Id: header.inc,v 1.2 2001/01/08 10:57:10 chrisp Exp $ */

// available pages
$pages = array(
  "index.php", "Home",
  "porting.php", "Porting",
  "todo.php", "ToDo",
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


// determine active page
$active_page = -1;

for ($i = 0; $i < sizeof($pages); $i += 2) {
  if (ereg($pages[$i]."$", $PHP_SELF)) {
    $active_page = $i;
  }
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>Fink - Bringing the world of GNU to Darwin</title>
</head>
<body bgcolor="#ffffff" text="#000000" link="#339900" vlink="#336600" alink="#ff3333">

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

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>&nbsp;&nbsp;&nbsp;</td>
<td></td>
<td>&nbsp;&nbsp;&nbsp;</td></tr>
<tr valign="top"><td></td><td width="100%">


<table align="right" border="0" cellpadding="0" cellspacing="0"
width="120">
<tr><td colspan="3" width="120"><img src="img/nav-top.gif" width="120"
height="30" border="0" alt="Navigation:"></td></tr>
<tr valign="top"><td width="20" background="img/nav-left.gif"><img
src="img/nav-left.gif" width="20" height="16" border="0" alt=""></td>
<td width="92" background="img/nav-center.gif">

<p><?
for ($i = 0; $i < sizeof($pages); $i += 2) {
  if ($i > 0)
    print "<br>\n";
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
}
?></p>

</td>
<td width="8" background="img/nav-right.gif"><img
src="img/nav-right.gif" width="8" height="16" border="0"
alt=""></td></tr>
<tr><td colspan="3" width="120"><img src="img/nav-bottom.gif" width="120"
height="24" border="0" alt=""></td></tr>
</table>
