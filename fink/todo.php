<?
$title = "ToDo";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/13 20:40:22 $';

include "header.inc";
?>


<h1>The ToDo List</h1>

<p>Some quick thoughts of what needs improvement in Fink (or what
could become future features):</p>

<ul>
<li>More distinct dependencies: build-time vs. run-time, specific
versions</li>
<li>Better infrastructure for daemons and cron jobs</li>
<li>Pseudo-packages for software that is already installed on the host
system</li>
<li>Get rid of .../var/fink-stamp</li>
<li>Optimization: make sure all binaries are stripped and at least
basic optimization flags are used (e.g. <tt>-O2</tt>)</li>
<li>Package database on the web site</li>
<li>Make it run on older Perl versions</li>
<li>Support other Unices</li>
<li>Manage info and other documentation</li>
</ul>

<p>To request other features, use the <a href="http://sourceforge.net/tracker/?atid=367203&group_id=17203&func=browse">Feature
Request Tracker</a> at SourceForge.</p>

<!--
<p>Packages that I want to port or package in the near future:</p>

<ul>
<li>XFree86 with shared libraries</li>
</ul>
-->

<p>To suggest other packages to be ported, use the <a href="http://sourceforge.net/tracker/?atid=371315&group_id=17203&func=browse">Package
Request Tracker</a> at SourceForge.</p>


<?
include "footer.inc";
?>
