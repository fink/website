<?
$title = "ToDo";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/02/04 17:29:13 $';
$wantnav = "main";

include "header.inc";
?>


<h1>The ToDo List</h1>

<p>Some quick thoughts of what needs improvement in Fink (or what
could become future features):</p>

<ul>
<li>More distinct dependencies: build-time vs. run-time, specific
versions</li>
<li>Binary packages</li>
<li>Optimization: make sure all binaries are stripped and at least
basic optimization flags are used (e.g. <tt>-O2</tt>)</li>
<li>Package database on the web site</li>
<li>Make it run on older Perl versions</li>
<li>Separate the package manager (i.e. the code) from the package
information and patches stuff (i.e. the data)</li>
<li>Support other Unices</li>
<li>Manage info and other documentation</li>
</ul>


<?
include "footer.inc";
?>
