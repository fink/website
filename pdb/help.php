<?php
$title = "Package Database - Help Needed";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:34:32 $';

$have_key = isset($maintainer);

include_once "header.inc";
?>

<h1>Packages in Testing</h1>

<p>
Help is needed for testing packages with a version in
unstable that is newer than the version in stable.
The list is based on the latest <a
href="<?php echo $linkroot ?>doc/cvsaccess/index.php">packages from CVS</a>.
</p>

<p>
<a
href="<?php echo $pdbroot ?>browse.php?tree=testing&amp;nochildren=on">
Browse the full list
</a> of packages that need testing.
</p>

<h1>Packages without Maintainer</h1>

<p>
Help is also needed for packages without an active maintainer.
</p>

<p>
<a
href="<?php echo $pdbroot ?>browse.php?maintainer=None&amp;nochildren=on">
Browse the full list
</a> of packages without maintainer.
</p>

<?php
include_once "footer.inc";
?>
