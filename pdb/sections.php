<?
$title = "Package Database";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2007/12/06 22:03:22 $';

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
<?
foreach ($sections as $name => $description) {
	$desctext = ($description ? (' - ' . $description) : '');
?>
<li><a href="<? print $pdbroot; ?>browse.php?section=<? print $name; ?>"><? print $name; ?></a><? print $desctext; ?></li>
<? } ?>
</ul>

<?
include_once "footer.inc";
?>
