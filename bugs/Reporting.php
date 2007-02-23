<?
$title = "Fink bugs - how to report a bug";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/02/23 21:27:54 $';

include "header.inc";
?>

<h1>How to report a bug in Fink</h1>

<h2>Important things to note <strong>before</strong> sending</h2>

<p>Please don't report several unrelated bugs - especially ones in
different packages - in a single bug report.

<p>You should check if your bug report has already been filed by someone
else before submitting it. Lists of currently outstanding bugs are
available <a href="./">on the World Wide Web</a> and
<a href="Access.php">elsewhere</a> - see other documents for details.
You can submit your comments to an existing bug report
#<var>&lt;number&gt;</var> by sending e-mail to
<var>&lt;number&gt;</var>@bugs.finkproject.org</p>

<p>If you can't seem to determine which package contains the problem,
please send e-mail to the <a href="mailto:beren@mac.com">
beren@mac.com</a> asking for advice.

</p>

<p>If you'd like to send a copy of your bug report to additional
recipients (such as mailing lists), you shouldn't use the usual e-mail
headers, but <a href="#xcc">a different method, described below</a>.</p>


<h2>Sending the bug report using an automatic bug report tool</h2>

<p>There is a program that was developed in Debian to help reporting
bug reports, it's called
<code><a href="http://pdb.finkproject.org/pdb/package.php/reportbug">reportbug</a></code>.
It will guide you through the bug reporting process step by step,
and probably ease filing bugs that way.</p>

<p>Emacs users can also use the debian-bug command provided by the
<code><a href="http://pdb.finkproject.org/pdb/package.php/debbugs-el">
debbugs-el</a></code> package. When called with <kbd>M-x
debian-bug</kbd>, it will ask for all necessary information in a
similar way to <code>reportbug</code>.</p>


<h2>Sending the bug report via e-mail</h2>

<p>Send mail to
<a href="mailto:submit@bugs.finkproject.org"><code>submit@bugs.finkproject.org</code></a>,
as described below.</p>

<p>Of course, like with any email, you should include a clear, descriptive
<code>Subject</code> line in your main mail header.  The subject you
give will be used as the initial bug title in the tracking system, so
please try to make it informative!</p>

<p>You need to put a <a name="pseudoheader">pseudo-header</a> at the start
of the body of the message. That means that the first line of the message
body should say:</p>

<pre>
Package: &lt;something&gt;
</pre>

<p>Replace <code>&lt;something&gt;</code> with the name of the package which
has the bug.</p>

<p>The second line of the message should say:</p>

<pre>
Version: &lt;something&gt;
</pre>

<p>Replace <code>&lt;something&gt;</code> with the version of the package.</p>

<p>You need to supply a correct <code>Package</code> line in the
pseudo-header in order for the bug tracking system to deliver the message
to the package's maintainer.</p>



<p>The pseudo-header fields should start at the very start of their lines.</p>



<p>Please include in your report:</p>

<ul>
  <li>The <em>exact</em> and <em>complete</em> text of any error
      messages printed or logged.  This is very important!
  <li>Exactly what you typed or did to demonstrate the problem.
  <li>A description of the incorrect behaviour: exactly what behaviour
      you were expecting, and what you observed.  A transcript of an
      example session is a good way of showing this.
  <li>A suggested fix, or even a patch, if you have one.
  <li>Details of the configuration of the program with the problem.
      Include the complete text of its configuration files.



</ul>

<p>Include any detail that seems relevant - you are in very little danger
of making your report too long by including too much information.  If
they are small please include in your report any files you were using
to reproduce the problem (uuencoding them if they may contain odd
characters etc.).</p>


<h2><A name="example">Example</a></h2>

<p>A bug report, with mail header, looks something like this:

<pre>
  To: submit@bugs.finkproject.org
  From: diligent@testing.linux.org
  Subject: Hello says `goodbye'

  Package: hello
  Version: 1.3-16

  When I invoke `hello' without arguments from an ordinary shell
  prompt it prints `goodbye', rather than the expected `hello, world'.
  Here is a transcript:

  
  goodbye
  
  /sw/bin/hello
  goodbye

  I suggest that the output string, in hello.c, be corrected.

  I am using Fink 0.23.2 and Mac OS X 10.3.7, and last did a
  fink selfupdate 1 hour ago.
</pre>


<h2><A name="xcc">Sending copies of bug reports to other addresses</a></h2>

<p>Sometimes it is necessary to send a copy of a bug report to somewhere
else besides the mailing list and the package maintainer, which is where they
are normally sent.

<p>You could do this by CC'ing your bug report to the other address(es),
but then the other copies would not have the bug report number put in
the <code>Reply-To</code> field and the <code>Subject</code> line.
When the recipients reply they will probably preserve the
<code>submit@bugs.finkproject.org</code> entry in the header and have their
message filed as a new bug report.  This leads to many duplicated
reports.

<p>The <em>right</em> way to do this is to use the <code>X-Debbugs-CC</code>
header.  Add a line like this to your message's mail header (<em>not</em>
to the pseudo header with the <code>Package</code> field):
<pre>
  X-Debbugs-CC: other-list@cosmic.edu
</pre>
This will cause the bug tracking system to send a copy of your report
to the address(es) in the <code>X-Debbugs-CC</code> line as well as to
any mailing list.

<p>This feature can often be combined usefully with mailing
<code>quiet</code> - see below.


<h2><A name="severities">Severity levels</a></h2>

<p>If a report is of a particularly serious bug, or is merely a feature
request that, you can set the severity level of the bug as you report
it.  This is not required, however, and the developers will assign an
appropriate severity level to your report if you do not.

<p>To assign a severity level, put a line like this one in the
<a href="#pseudoheader">pseudo-header</a>:</p>

<pre>
Severity: &lt;<var>severity</var>&gt;
</pre>

<p>Replace &lt;<var>severity</var>&gt; with one of the available severity
levels, as described in the
<a href="Developer.php#severities">developers' documentation</a>.</p>


<h2><a name="tags">Assigning tags</a></h2>

<p>You can set tags on a bug as you are reporting it. For example, if
you are including a patch with your bug report, you may wish to set
the <code>patch</code> tag.  This is not required, and the developers
will set tags on your report as and when it is appropriate.

<p>To set tags, put a line like this one in the
<a href="#pseudoheader">pseudo-header</a>:</p>

<pre>
Tags: &lt;<var>tags</var>&gt;
</pre>

<p>Replace &lt;<var>tags</var>&gt; with one or more of the available tags,
as described in the
<a href="Developer.php#tags">developers' documentation</a>.
Separate multiple tags with commas, spaces, or both.


<h2>Not forwarding to the mailing list - minor bug reports</h2>

<p>If a bug report is minor (for example, a documentation typo or other
trivial build problem), or you're submitting many reports at once,
send them to <code>maintonly@bugs.finkproject.org</code> or
<code>quiet@bugs.finkproject.org</code>.
<code>maintonly</code> will send the report on to the package
maintainer (provided you supply a correct <code>Package</code> line in
the pseudo-header and the maintainer is known), and <code>quiet</code>
will not forward it anywhere at all but only file it as a bug (useful
if, for example, you are submitting many similar bugs and want to post
only a summary).

<p>If you do this the bug system will set the <code>Reply-To</code> of
any forwarded message so that replies will by default be processed in
the same way as the original report.

<h3>bug reports against unknown packages</h3>

<p>If the bug tracking system doesn't know who the maintainer of the
relevant package is it'll forward the report to
the mailing list even if <code>maintonly</code> was used.

<p>When sending to <code>maintonly@bugs.finkproject.org</code> or
<var>nnn</var><code>-maintonly@bugs.finkproject.org</code> you should make sure that
the bug report is assigned to the right package, by putting a correct
<code>Package</code> at the top of an original submission of a report,
or by using <a href="server-control.php">the
<code>control@bugs.finkproject.org</code> service</a> to (re)assign the report
appropriately first if it isn't correct already.



<hr>

<p>Other pages:
<ul>
<li><a href="./">bug tracking system main contents page.</a>
<li><a href="Developer.php">Developers' information regarding the Bug processing system.</a>
<li><a href="Access.php">Accessing the bug tracking logs other than by WWW.</a>
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
