<?
$title = "F.A.Q. - Packages";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/07/15 20:08:29';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="prev" href="usage.php" title="Usage Questions">';

include "header.inc";
?>

<h1>F.A.Q. - Problems With Certain Packages</h1>





<a name="nedit"><div class="question"><p><b>Q: nedit is broken.</b></p></div>
<div class="answer"><p><b>A:</b> If you're seeing <tt><nobr>Xm/BulletinB.h: No such file or
directory</nobr></tt> in the error messages, that's because you have Xtools
installed. Xtools includes OpenMotif, but unfortunately Tenon forgot
to include some required header files. There is no workaround yet, and
it is unknown whether this is fixed in recent releases on Xtools.</p></div></a>






<?
include "footer.inc";
?>
