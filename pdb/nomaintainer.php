<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/09/10 19:37:21 $';

include "header.inc";

if (!param(distro)) {
  $distro_sql = "AND (`release` LIKE 'current-10.3%' OR `release` LIKE 'current-10.4%')";
  $distro_txt = ' in the 10.3 and 10.4 releases';
} else if (!strcmp(param(distro),"all")) {
  $distro_sql = '';
  $distro_txt = '';
} else if (ereg("[^a-zA-Z0-9_.+-]",param(distro))) {
  print '<p><b>error during query:</b> invalid distro</p>';
  $distro_sql = '';
  $distro_txt = '';
} else {
  $distro_sql = "AND `release` LIKE 'current-".param(distro)."%'";
  $distro_txt = ' in the '.param(distro). ' release';
}

$q = "SELECT name,descshort FROM package ".
     "WHERE maintainer LIKE '%None%' AND latest=1 AND parentname IS NULL ".
     "$distro_sql ORDER BY name ASC";
$rs = mysql_query($q, $dbh);
if (!$rs) {
  print '<p><b>error during query:</b> '.mysql_error().'</p>';
} else {
  $count = mysql_num_rows($rs);
?>


<h1>Packages without Maintainers</h1>

<p>
This is a list of packages that need a new maintainer, because the original
maintainer who brought the package to Fink is no longer able to maintain
it.  If you are interested in taking on one of these packages, and you are
not already a core Fink developer, please <a
href="mailto:fink-develATlistsDOTsourceforgeDOTnet">contact the Fink
developers</a> and volunteer!</p>
<p>Core Fink developers are welcome to adopt a package by changing the
maintainer name in the package's .info file to their own.</p>

<p>Found <? print $count ?> packages without maintainers<? print $distro_txt ?>:</p>

<ul>
<?
  while ($row = mysql_fetch_array($rs)) {
    $desc = " - ".$row[descshort];
    if (substr($desc,3,1) == "[" || substr($desc,3,1) == "<")
      $desc = "";
    print '<li><a href="'.$pdbroot.'package.php/'.$row[name].'">'.$row[name].'</a>'.$desc."</li>\n";
  }
?>
</ul>
<?
}
?>

<?
include "footer.inc";
?>
