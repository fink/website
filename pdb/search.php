<?
$title = "Package Database - Package Search";
$cvs_author = '$Author: fingolfin $';
$cvs_date = '$Date: 2004/02/28 20:34:01 $';

$have_key = isset($s);
$search_key = $s;

include "header.inc";
?>


<?
$key = ereg_replace(" ", "", $search_key);

if (ereg("[^a-zA-Z0-9_.+-]", $search_key)) {
?>

<h1>Package Search</h1>

<form action="search.php" method="GET">
<p>Search for package: <input type="text" name="s" size="15" value="">
<input type="submit" value="Search">
</p>
</form>

<p>You have entered a search text that contains invalid characters.</p>

<?
} else {  /* $search_key valid */
?>

<h1>Package Search</h1>

<form action="search.php" method="GET">
<p>Search for package: <input type="text" name="s" size="15" value="<?
print $search_key ?>">
<input type="submit" value="Search">
</p>
</form>

<?
if ($search_key) {
  $q = "SELECT name,descshort FROM package ".
       "WHERE (name LIKE '%$search_key%' OR descshort LIKE '%$search_key%') ".
       "AND latest=1 ORDER BY name ASC";
  $rs = mysql_query($q, $dbh);
  if (!$rs) {
    print '<p><b>error during query:</b> '.mysql_error().'</p>';
  } else {
    $count = mysql_num_rows($rs);

    if ($count == 0) {
?>
<p>Found no packages that match "<? print $search_key ?>".</p>
<?
    } elseif ($count == 1) {
?>
<p>Found 1 package that matches "<? print $search_key ?>":</p>
<?
    } else {
?>
<p>Found <? print $count ?> packages that match "<? print $search_key ?>":</p>
<?
    }
    if ($count > 0) {
?>
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
  }
} elseif ($have_key) {
?>

<p>No search string entered.</p>

<?
}


}  /* $search_key valid */
?>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
