<?
$title = "Fink - Developers' information";
$cvs_author = '$Author: beren12 $';
$cvs_date = '$Date: 2005/01/22 23:37:59 $';

include "header.inc";
?>

<h1><A name="developers">Developers' information regarding the bug processing system</a></h1>

<p>Initially, a bug report is submitted by a user as an ordinary mail
message to <code>submit@bugs.finkproject.org</code>.  This will then be
given a number, acknowledged to the user, and forwarded to a mailing 
list (if configured).  If the submitter included a <code>Package</code>
line listing a package with a known maintainer the maintainer will get
a copy too.

<p>The <code>Subject</code> line will have
<code>bug#</code><var>nnn</var><code>:</code> added, and the
<code>Reply-To</code> will be set to include both the submitter of the
report and <var>nnn</var><code>@bugs.finkproject.org</code>.

<h2>Closing bug reports</h2>

<p>A developer who receives a bug from the tracking system, or sees it on
the mailing list, and takes responsibility for it should hit Reply in
their favourite mailreader,
and then edit the <code>To</code> field to say
<var>nnn</var><code>-done@bugs.finkproject.org</code> instead of
<var>nnn</var><code>@bugs.finkproject.org</code>
(<var>nnn</var><code>-close</code> is provided as an alias for
<var>nnn</var><code>-done</code>).

<p>The address of the original submitter of the bug report will be
included in the default <code>To</code> field, because the bug system
included it in the <code>Reply-To</code>.

<p>`Done' messages are automatically forwarded to the <code>fink-bugs-closed</code>
mailing list, if the mailing list has been set up.

<p>The person closing the bug and the person who submitted it will each
get a notification about the change in status of the report.

<h2>Followup messages</h2>

<p>If a developer wishes to reply to a bug report they may simply reply
to the message (that will <b>not</b> mark the bug as done). Their reply will
(by default, if they respect the Reply-To: header) go to
<var>nnn</var><code>@bugs.finkproject.org</code>, and to the original submitter of
the bug report (note: this is two distinct addresses). The bug tracking
system will receive the message at <var>nnn</var><code>@bugs.finkproject.org</code>,
pass it on to the package maintainer, file the reply with the rest of the
logs for that bug report and forward it to a designated mailing list
(<code>fink-bugs-dist@bugs.finkproject.org</code>).

<p>A developer may explicitly mail the bug's submitter with an email to
<var>nnn</var><code>-submitter@bugs.finkproject.org</code>.

<p>If you wish to send a followup message which is not appropriate for
any mailing list you can do so by sending it to
<var>nnn</var><code>-quiet@bugs.finkproject.org</code> or
<var>nnn</var><code>-maintonly@bugs.finkproject.org</code>.
Mail to <var>nnn</var><code>-quiet@bugs.finkproject.org</code> is filed in the
bug Tracking System but is not delivered to any individuals or mailing
lists. Mail to <var>nnn</var><code>-maintonly@bugs.finkproject.org</code> is
filed in the bug Tracking System and is delivered only to the maintainer
of the package in question.

<p>Do <em>not</em> use the `reply to all recipients' or `followup'
feature of your mailer unless you intend to edit down the recipients
substantially.  In particular, see that you don't send followup messages
both to <var>nnn</var><code>@bugs.finkproject.org</code> and to
<code>submit@bugs.finkproject.org</code>, because the bug system will then
get two copies of it and each one will be forwarded to the designated
mailing list separately.

<h2><A name="severities">Severity levels</a></h2>

<p>The bug system records a severity level with each bug report.  This
is set to <code>normal</code> by default, but can be overridden
either by supplying a <code>Severity</code> line in the pseudo-header when
the bug is submitted (see the
<a href="Reporting.html#pseudoheader">instructions for reporting bugs</a>),
or by using the <code>severity</code> command with the
<a href="#requestserv">control request server</a>.
Separate multiple tags with commas, spaces, or both.

<p>The severity levels are:

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

<H2><a name="tags">Tags for bug reports</a></H2>

<p>Each bug can have zero or more of a set of given tags. These tags are
displayed in the list of bugs when you look at a package's page, and when
you look at the full bug log.

<p>Tags can be set by supplying a <code>Tags</code> line in the
pseudo-header when the bug is submitted (see the
<a href="Reporting.html#pseudoheader">instructions for reporting bugs</a>),
or by using the <code>tags</code> command with the
<a href="#requestserv">control request server</a>.

<p>The current bug tags are:

<dl>

<dt><code>patch</code>
<dd>A patch or some other easy procedure for fixing the bug is included in
the bug logs. If there's a patch, but it doesn't resolve the bug
adequately or causes some other problems, this tag should not be used.

<dt><code>wontfix</code>
<dd>This bug won't be fixed. Possibly because this is a choice between two
arbitrary ways of doing things and the maintainer and submitter prefer
different ways of doing things, possibly because changing the behaviour
will cause other, worse, problems for others, or possibly for other
reasons.

<dt><code>moreinfo</code>
<dd>This bug can't be addressed until more information is provided by the
submitter. The bug will be closed if the submitter doesn't provide more
information in a reasonable (few months) timeframe. This is for bugs like
"It doesn't work". What doesn't work?

<dt><code>unreproducible</code>
<dd>This bug can't be reproduced on the maintainer's system.  Assistance
from third parties is needed in diagnosing the cause of the problem.

<dt><code>fixed</code>
<dd>This bug is fixed or worked around, but there's still an issue that
needs to be resolved.

<dt><code>stable</code>
<dd>This bug affects the stable distribution in particular.  This is only
intended to be used for ease in identifying release critical bugs that
affect the stable distribution.  It'll be replaced eventually with
something a little more flexible, probably.

</dl>

<h2><A name="forward">Recording that you have passed on a bug report</a></h2>

<p>When a developer forwards a bug report to the developer of the
upstream source package from which the Fink package is derived,
they should note this in the bug tracking system as follows:

<p>Make sure that the <code>To</code> field of your message to the author
to has only the author(s) address(es) in it; put both the person who
reported the bug and
<var>nnn</var><code>-forwarded@bugs.finkproject.org</code> in the
<code>CC</code> field.

<p>Ask the author to preserve the <code>CC</code> to
<var>nnn</var><code>-forwarded@bugs.finkproject.org</code> when they reply, so that
the bug tracking system will file their reply with the original
report.

<p>When the bug tracking system gets a message at
<var>nnn</var><code>-forwarded</code> it will mark the relevant bug as
having been forwarded to the address(es) in the <code>To</code> field
of the message it gets, if the bug is not already marked as forwarded.

<p>You can also manipulate the `forwarded to' information by sending
messages to <a href="server-control.html"><code>control@bugs.finkproject.org</code></a>.

<h2>Summary postings</h2>

<p>Every Friday, a list of outstanding bug reports is posted to a summary
mailing list (if set up), sorted by age of report. Every Tuesday, a list of
bug reports that have gone unanswered too long is posted, sorted by
package maintainer.



<h2><A name="requestserv">Reopening, reassigning and manipulating bugs</a></h2>

<p>It is possible to reassign bug reports to other packages, to reopen
erroneously-closed ones, to modify the information saying to where, if
anywhere, a bug report has been forwarded, to change the severities
and titles of reports and to merge and unmerge bug reports.  This is
done by sending mail to <code>control@bugs.finkproject.org</code>.

<p>The <a href="server-control.html">format of these messages</a> is
described in another document available on the World Wide Web or in
the file <code>bug-maint-mailcontrol.txt</code>.  A plain text version
can also be obtained by mailing the word <code>help</code> to the
server at the address above.

<h2>More-or-less obsolete subject-scanning feature</h2>

<!-- (this is likely to be removed the next version?) -->

<p>Messages that arrive at <code>submit</code> or <code>bugs</code> whose
Subject starts <code>Bug#</code><var>nnn</var> will be treated as
having been sent to <var>nnn</var><code>@bugs.finkproject.org</code>.  This is both
for backwards compatibility with mail forwarded from the old
addresses, and to catch followup mail sent to <code>submit</code> by
mistake (for example, by using reply to all recipients).

<p>A similar scheme operates for <code>maintonly</code>,
<code>done</code>, <code>quiet</code> and <code>forwarded</code>,
which treat mail arriving with a Subject tag as having been sent to
the corresponding <var>nnn-whatever</var><code>@bugs.finkproject.org</code> address.

<p>Messages arriving at plain <code>forwarded</code> and
<code>done</code> - ie, with no bug report number in the address - and
without a bug number in the Subject will be filed under `junk' and
kept for a few weeks, but otherwise ignored.

<hr>

<p>Other pages:
<ul>
<li><a href="./">bug tracking system main contents page.</a>
<li><a href="Reporting.php">Instructions for reporting bugs.</a>
<li><a href="Access.php">Accessing the bug tracking logs other than by WWW.</a>
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
