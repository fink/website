<?
$title = "Fink bugs - Accessing the logs";
$cvs_author = '$Author: beren12 $';
$cvs_date = '$Date: 2005/01/22 23:37:59 $';

include "header.inc";
?>


<h1><a name="developers">Accessing bug reports in the tracking system
logs</a></h1>

<p>Each message received at or sent by the bug processing system is
logged and made available in a number of ways.



<p>There is a <a href="server-request.php">mailserver</a> which can send
bug reports as plain text on request.  To use it send the word
<code>help</code> as the sole contents of an email to
<code>request</code> (the <code>Subject</code> of the
message is ignored), or read the instructions on the World Wide Web or
in the file <code>bug-log-mailserver.txt</code>.

<hr>

<p>Other pages:
<ul>
  <li><a href="./">bug tracking system main contents page.</a>
  <li><a href="Reporting.php">Instructions for reporting bugs.</a>
  <li><a href="Developer.php">Developers' information regarding the bug processing system.</a>
  <li><a href="http://bugs.finkproject.org/db/ix/full.html">Full list of outstanding and recent bug reports.</a>
  <li><a href="http://bugs.finkproject.org/db/ix/packages.html">Packages with bug reports.</a>
  <li><a href="http://bugs.finkproject.org/db/ix/maintainers.html">Maintainers of packages with bug reports.</a>

</ul>

<HR>
 <ADDRESS>Chris Zubrzycki &lt;<A HREF="mailto:beren@mac.com">beren@mac.com</A>&gt;.
 Last modified:
 <!--timestamp-->
 Tue,  7 Sep 2004 17:39:55 UTC
 <!--timestamp-->
	  
 <P>
 <A HREF="http://bugs.finkproject.org/">Fink bug tracking system</A><BR>
 Copyright (C) 1999 Darren O. Benham,
 1997 nCipher Corporation Ltd,
 1994-97 Ian Jackson.
 </ADDRESS>

 <p>
 <a href="../index.php">Back Home</a> - <a href="download/index.php">Download</a>
 </p>
 <?
 include "footer.inc";
 ?>

