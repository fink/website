<?
$title = "Fink bug system - mail servers' reference card";
$cvs_author = '$Author: beren12 $';
$cvs_date = '$Date: 2005/01/22 23:37:59 $';

include "header.inc";
?>

<h1>Mail servers' reference card</h1>

<p>Full documentation of the mail servers is available on the WWW, in the
files
<a href="server-request.php">bug-log-mailserver.txt</a> and
<a href="server-control.php">bug-maint-mailcontrol.txt</a> or by
sending the word <code>help</code> to each mailserver.

<h2>Synopsis of commands available at <code>request</code></h2>

<ul compact>
  <li><code>send</code> <var>bugnumber</var>
  <li><code>send-detail</code> <var>bugnumber</var>
  <li><code>index</code> [<code>full</code>]
  <li><code>index-summary by-package</code>
  <li><code>index-summary by-number</code>
  <li><code>index-maint</code>
  <li><code>index maint</code> <var>maintainer</var>
  <li><code>index-packages</code>
  <li><code>index packages</code> <var>package</var>
  <li><code>send-unmatched</code> [<code>this</code>|<code>0</code>]
  <li><code>send-unmatched</code> <code>last</code>|<code>-1</code>
  <li><code>send-unmatched</code> <code>old</code>|<code>-2</code>
  <li><code>getinfo</code> <var>filename</var> <em>(see below)</em>
  <li><code>help</code>
  <li><code>refcard</code>
  <li><code>quit</code>|<code>stop</code>|<code>thank</code>...|<code>--</code>...
  <li><code>#</code>... <em>(comment)</em>
  <li><code>debug</code> <var>level</var>
</ul>

<h3>List of info files for <code>getinfo</code></h3>
<ul compact>
  <li><code>maintainers</code>
  <li><code>override.stable</code>
  <li><code>override.development</code>
  <li><code>override.contrib</code>
  <li><code>override.non-free</code>
  <li><code>override.experimental</code>
  <li><code>override.</code><var>codeword</var>
  <li><code>pseudo-packages.description</code>
  <li><code>pseudo-packages.maintainers</code>
</ul>

<h2>Synopsis of extra commands available at control mailserver</h2>

<ul compact>
  <li><code>close</code> <var>bugnumber</var>
      <em>(you must separately tell originator why)</em>
  <li><code>reassign</code> <var>bugnumber</var> <var>package</var>
  <li><code>severity</code> <var>bugnumber</var> <var>severity</var>
  <li><code>reopen</code> <var>bugnumber</var>
      [ <var>originator-address</var> | <code>=</code> | <code>!</code> ]
  <li><code>submitter</code> <var>bugnumber</var>
      <var>originator-address</var> | <code>!</code>
  <li><code>forwarded</code> <var>bugnumber</var> <var>address</var>
  <li><code>notforwarded</code> <var>bugnumber</var>
  <li><code>retitle</code> <var>bugnumber</var> <var>new-title</var>
  <li><code>merge</code> <var>bugnumber</var> <var>bugnumber</var> ...
  <li><code>unmerge</code> <var>bugnumber</var>
</ul>

<p><code>reopen</code> with <code>=</code> or no originator address leaves
the originator as the original submitter; <code>!</code> sets it to
you, the person doing the reopen.

<dl>
<DT><CODE>critical</CODE>
	<DD>makes unrelated software on the system (or the whole system) break,
	or causes serious data loss, or introduces a security hole on systems 
	where you install the package.

	<DT><CODE>grave</CODE>
	<DD>makes the package in question unusable or mostly so, or causes data
	loss, or introduces a security hole allowing access to the accounts of
	users who use the package.

	<DT><CODE>normal</CODE>
	<DD>the default value, for normal bugs.

	<DT><CODE>wishlist</CODE>
	<DD>for any feature request, and also for any bugs that are very 
	difficult to fix due to major design considerations.
</dl>

<hr>

<p>Other pages:
<ul>
  <li><a href="./">bug tracking system main contents page.</a>
  <li><a href="server-request.php">Full documentation of the request mailserver.</a>
  <li><a href="server-control.php">Full documentation of the control mailserver.</a>
  <li><a href="Reporting.php">Instructions for reporting bugs.</a>
  <li><a href="Access.php">Accessing the bug tracking logs other than by WWW.</a>
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
 <A HREF="http://bugs.finkproject.org/bugs/">Fink bug tracking system</A><BR>
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
