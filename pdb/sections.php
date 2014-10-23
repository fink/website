<?php
$title = "Package Database - Section Listing";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:04:57 $';

include_once "header.inc";
include_once "sections.inc";
?>


<h1>Archive Sections</h1>

<p>
The package archive is divided into thematic sections.
That makes it easier to find the package you want.
Here are the sections:
</p>


<ul>
<?php
foreach ($sections as $_name => $_description) {
	$_desctext = ($_description ? (' - ' . $_description) : '');
?>
<li><a href="<?php echo $pdbroot ?>browse.php?sec=<?php echo $_name ?>"><?php echo $_name ?></a><?php echo $_desctext ?></li>
<?php } ?>
</ul>

<?php
include_once "footer.inc";
?>
