<?
$title = "Fink bug system - control mail server commands";
$cvs_author = '$Author: beren12 $';
$cvs_date = '$Date: 2005/01/22 23:37:59 $';

include "header.inc";
?>

<h1>Introduction to the bug control and manipulation mailserver</h1>

<p>In addition to the mailserver on <code>request@bugs.finkproject.org</code>
which allows the retrieval of bug data and documentation by email,
there is another server on <code>control@bugs.finkproject.org</code> which
also allows bug reports to be manipulated in various ways.</p>

<p>The control server works just like the request server, except that it
has some additional commands; in fact, it's the same program.  The two
addresses are only separated to avoid users making mistakes and
causing problems while merely trying to request information.</p>

<p>Please see the
<a href="server-request.php#introduction">introduction to the request
server</a> available on the World Wide Web, in the file
<code>bug-log-mailserver.txt</code>, or by sending
<code>help</code> to either mailserver, for details of the basics of
operating the mailservers and the common commands available when
mailing either address.</p>

<p>The <a href="server-refcard.php">reference card</a> for the
mailservers is available via the WWW, in
<code>bug-mailserver-refcard.txt</code> or by email using the
<code>refcard</code> command.</p>

<h1>Commands available at the control mailserver</h1>

<dl>

<dt><code>reassign</code> <var>bugnumber</var> <var>package</var>

  <dd>Records that bug #<var>bugnumber</var> is a bug in <var>package</var>.
  This can be used to set the package if the user forgot the
  pseudo-header, or to change an earlier assignment.  No notifications
  are sent to anyone (other than the usual information in the processing
  transcript).

<dt><code>reopen</code> <var>bugnumber</var>
 [ <var>originator-address</var> | <code>=</code> | <code>!</code> ]

  <dd>Reopens #<var>bugnumber</var> if it is closed.

  <p>By default, or if you specify <code>=</code>, the original submitter is
  still as the originator of the report, so that they will get the ack
  when it is closed again.

  <p>If you supply an <var>originator-address</var> the originator will be
  set to the address you supply.  If you wish to become the new
  originator of the reopened report you can use the <code>!</code>
  shorthand or specify your own email address.

  <p>It is usually a good idea to tell the person who is about to be
  recorded as the originator that you're reopening the report, so that
  they will know to expect the ack which they'll get when it is closed
  again.

  <p>If the bug is not closed then reopen won't do anything, not even
  change the originator.  To change the originator of an open bug report,
  use the <code>submitter</code> command; note that this will inform the
  original submitter of the change.

<dt><code>submitter</code> <var>bugnumber</var>
<var>originator-address</var> | <code>!</code>

  <dd>Changes the originator of #<var>bugnumber</var> to
  <var>originator-address</var>.

  <p>If you wish to become the new originator of the report you can use
  the <code>!</code> shorthand or specify your own email address.</p>

  <p>While the <code>reopen</code> command changes the originator of other
  bugs merged with the one being reopened, <code>submitter</code> does not
  affect merged bugs.</p>

<dt><code>forwarded</code> <var>bugnumber</var> <var>address</var>

  <dd>Notes that <var>bugnumber</var> has been forwarded to the upstream
  maintainer at <var>address</var>.  This does not actually forward the
  report.  This can be used to change an existing incorrect forwarded-to
  address, or to record a new one for a bug that wasn't previously noted
  as having been forwarded.

<dt><code>notforwarded</code> <var>bugnumber</var>

  <dd>Forgets any idea that <var>bugnumber</var> has been forwarded to any
  upstream maintainer.  If the bug was not recorded as having been
  forwarded then this will do nothing.

<dt><code>retitle</code> <var>bugnumber</var> <var>new-title</var>

  <dd>Changes the title of a bug report to that specified (the default is
  the <code>Subject</code> mail header from the original report).

  <p>Unlike most of the other bug-manipulation commands when used on one of
  a set of merged reports this will change the title of only the
  individual bug requested, and not all those with which it is merged.

<dt><code>severity</code> <var>bugnumber</var> <var>severity</var>

  <dd>Set the severity level for bug report #<var>bugnumber</var> to
  <var>severity</var>.  No notification is sent to the user who reported
  the bug.

  <p>For <a href="Developer.php#severities">their meanings</a> please
  consult the general developers' documentation for the bug system.

<dt><code>clone</code> <var>bugnumber</var> [ <var>new IDs</var> ]

  <dd>The clone control command allows you to duplicate a bug report. It is
  useful in the case where a single report actually indicates that multiple
  distinct bugs have occurred. "<var>New IDs</var>" are negative numbers,
  separated by spaces, which may be used in subsequent control commands to
  refer to the newly duplicated bugs. A new report is generated for each
  new ID.

  <p>Example usage:</p>

  <pre>
        clone 12345 -1 -2
        reassign -1 foo
        retitle -1 foo: foo sucks
        reassign -2 bar
        retitle -2 bar: bar sucks when used with foo
        severity -2 wishlist
        clone 123456 -3
        reassign -3 foo
        retitle -3 foo: foo sucks
        merge -1 -3
  </pre>

<dt><code>merge</code> <var>bugnumber</var> <var>bugnumber</var> ...

  <dd>Merges two or more bug reports.  When reports are merged opening,
  closing, marking or unmarking as forwarded and reassigning any of the
  bugs to a new package will have an identical effect on all of the
  merged reports.

  <p>Before bugs can be merged they must be in exactly the same state:
  either all open or all closed, with the same forwarded-to upstream
  author address or all not marked as forwarded, all assigned to the
  same package or package(s) (an exact string comparison is done on the
  package to which the bug is assigned), and all of the same severity.
  If they don't start out in the same state you should use
  <code>reassign</code>, <code>reopen</code> and so forth to make sure
  that they are before using <code>merge</code>.

  <p>If any of the bugs listed in a <code>merge</code> command is already
  merged with another bug then all the reports merged with any of the
  ones listed will all be merged together.  Merger is like equality: it
  is reflexive, transitive and symmetric.

  <p>Merging reports causes a note to appear on each report's logs; on the
  WWW pages this includes links to the other bugs.

  <p>Merged reports are all expired simultaneously, and only when all of
  the reports each separately meet the criteria for expiry.

<dt><code>unmerge</code> <var>bugnumber</var>

  <dd>Disconnects a bug report from any other reports with which it may have
  been merged.  If the report listed is merged with several others then
  they are all left merged with each other; only their associations with
  the bug explicitly named are removed.

  <p>If many bug reports are merged and you wish to split them into two
  separate groups of merged reports you must unmerge each report in one
  of the new groups separately and then merge them into the required new
  group.

  <p>You can only unmerge one report with each <code>unmerge</code>
  command; if you want to disconnect more than one bug simply include
  several <code>unmerge</code> commands in your message.

<dt><code>tags</code> <var>bugnumber</var> [ <code>+</code> | <code>-</code> | <code>=</code> ] <var>tag</var>

  <dd>Sets a particular tag for the bug report #<var>bugnumber</var> to
  <var>tag</var>. No notification is sent to the user who reported the bug.
  <code>+</code> means adding, <code>-</code> means subtracting, and
  <code>=</code> means ignoring the current tags and setting them afresh.
  The default action is adding.

  <p>Available tags currently include <code>patch</code>, <code>wontfix</code>,
  <code>moreinfo</code>, <code>unreproducible</code>, <code>help</code>,
  <code>pending</code>, <code>fixed</code>, <code>security</code>,
  <code>upstream</code>, <code>10.2-gcc3.3</code>, <code>10.3</code>,
  <code>10.4</code> and <code>experimental</code>.

  <p>For <a href="Developer.php#tags">their meanings</a> please consult the
  general developers' documentation for the bug system.

<dt><code>close</code> <var>bugnumber</var>

  <dd>Close bug report #<var>bugnumber</var>.

  <p>A notification is sent to the user who reported the bug, but (in
  contrast to mailing <var>bugnumber</var><code>-done</code>) the
  text of the mail which caused the bug to be closed is <strong>not</strong>
  included in that notification.  The maintainer who closes a report
  should ensure, probably by sending a separate message, that the user
  who reported the bug knows why it is being closed.
  The use of this command is therefore deprecated.

<dt><code>quit</code>
<dt><code>stop</code>
<dt><code>thank</code>...
<dt><code>--</code>...

  <dd>Tells the control server to stop processing the message; the remainder
      of the message can include explanations, signatures or anything else,
      none of it will be detected by the control server.

<dt><code>#</code>...

  <dd>One-line comment. The <code>#</code> must be at the start of the line.

</dl>

<hr>

<p>Other pages:
<ul>
 <li><a href="./">bug tracking system main contents page.</a>
 <li><a href="Reporting.php">Instructions for reporting bugs.</a>
 <li><a href="Access.php">Accessing the bug tracking logs other than by WWW.</a>
 <li><a href="Developer.php">Developers' information regarding the bug processing system.</a>
 <li><a href="server-request.php">Fundamentals of the mailserver and commands for retrieving bugs.</a>
 <li><a href="server-refcard.php">Mailservers' reference card.</a>
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
