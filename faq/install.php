<?
$title = "F.A.Q. - Installation";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/06 19:54:38 $';

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

<p><a name="bzip2"><b>I tried to install Fink 0.2.0, but it failed to
login to cygnus (?) to get bzip. (login denied). Is there an error in
the login script?</b></a></p>

<p>There is no "login script" in Fink. What you're seeing is not a bug
in Fink (or wget, which is used for downloading files), but an
overloaded FTP server. Later releases of Fink use a different server
to get bzip2. As a workaround, you can download bzip2-1.0.1.tar.gz
manually and place it in /sw/src, then retry installing.</p>


<?
include "footer.inc";
?>
