<?
$title = "F.A.Q. - Installation";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/04/27 17:34:06 $';

include "header.inc";
?>


<h1>Fink F.A.Q. - Installation Questions</h1>

<p><a name="stow-not-found"><b>Installing Fink fails with a "stow not
found" message.</b></a></p>

<p>This is a known bug in Fink 0.1.8. It is caused by missing
dependencies in the gzip and tar packages. The bug is fixed in Fink
0.1.8a. To install it, either wipe out /sw (or whatever you used) and
use install.sh again or just use upgrade.sh and install any
package. Note that you do not need the update unless you did a
first-time installation with 0.1.8.</p>


<?
include "footer.inc";
?>
