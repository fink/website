<?
$title = "Package Database";
$cvs_author = '$Author: fingolfin $';
$cvs_date = '$Date: 2003/05/31 23:54:44 $';

include "header.inc";
?>


<h1>Package Database Introduction</h1>

<p>
This database lists all available Fink packages.
It knows about the "stable" tree of the latest release and
about all packages in CVS ("current-stable" and "current-unstable").
Note that some packages are only available in the "unstable" tree.
</p>

<p>
<b>Read this:</b>
The above means that a default install of Fink will not recognize some
packages listed here.
That is because those packages are in a section of the archive called
"unstable" because they are not well-tested.
You can help improve the situation by testing those packages and
reporting both success and failure to the package maintainer.
The <a href="testing.php">Packages in Testing</a> page lists all
packages that still have to pass testing.
In order to test the packages, you have to get the latest
descriptions from <a href="../doc/cvsaccess/index.php">CVS</a> and
configure Fink to <a href="../faq/usage-fink.php#unstable">use
unstable</a>.
</p>
<p>Help is also needed to find new maintainers for the <a
href="nomaintainer.php">packages without maintainers</a>.</p>

<?
$q = "SELECT name FROM package WHERE latest=1";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
  $pkgcount = '?';
} else {
  $pkgcount = mysql_num_rows($rs);
}

$q = "SELECT * FROM sections ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $seccount = mysql_num_rows($rs);
?>

<p>
The database was last updated
<? print gmstrftime("at %R GMT on %A, %B %d", $dyndate) ?> and currently lists
<? print $pkgcount ?> packages in <? print $seccount ?> sections.
</p>

<form action="search.php" method="GET">
<p>Search for package: <input type="text" name="s" size="15" value="">
<input type="submit" value="Search">
</p>
</form>

<p>
You can browse a <a href="list.php">complete list of packages</a>,
or you can browse by archive section:
</p>

<ul>
<?
  while ($row = mysql_fetch_array($rs)) {
    print '<li><a href="section.php/'.$row[name].'">'.$row[name].'</a>'.
      ($row[description] ? (' - '.$row[description]) : '').
      '</li>'."\n";
  }
?>
</ul>
<?
}
?>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
