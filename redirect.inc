<?
/* $Id: redirect.inc,v 1.1 2001/02/11 12:17:38 chrisp Exp $ */

$fullurl = "http://fink.sourceforge.net/".$target;

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<title>Fink - Page Moved</title>
<link rel="stylesheet" href="fink.css">
</head>
<body bgcolor="#ffffff" text="#000000" link="#0000f0" vlink="#800080" alink="#ff3333">

<h1>Page Moved</h1>

<p>This page has moved to <a href="<? print $target ?>"><? print
$target ?></a>.</p>

</body>
</html>
