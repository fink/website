<?
$title = "Package Database";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/30 14:57:24 $';

include "header.inc";
?>


<h1>Package Database Introduction</h1>

<p>
This database lists all available Fink packages.
It knows about the "stable" tree of the latest release and
about all packages in CVS ("current-stable" and "current-unstable").
Note that some packages are only available in the "unstable" tree.
</p>

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
The database was last updated on <?
print strftime("%A, %B %d", $dyndate)
?> and currently lists <? print $pkgcount ?> packages in <? print
$seccount ?> sections.
</p>

<p>
You can browse the <a href="list.php">complete list of packages</a>,
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


<?
include "footer.inc";
?>
