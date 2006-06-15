<?
$title = "Source Release Download";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2006/06/15 17:58:15 $';

include "header.inc";
?>

<h1>Download Fink Source Release</h1>

<p>
The source release contains the fink package manager plus package
descriptions and patches.
It will download the source code from the original distribution sites
and build them on your local machine.
</p>
<? 
include "../fink_version.inc";
?>

<p>
Fink <? print $fink_version; ?> was officially released on 
<? print $release_date; ?>.

</p>
<ul>
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full.tar.gz">Fink
<? print $release_version; ?></a> - 6786K, .tar.gz format</li>
</ul>

<p>
<b>Important:</b>
Don't extract the archive with StuffIt, it will corrupt some file
names.
Use the command line <tt>tar</tt> utility instead.
Instructions are in the Installation document.
</p>

<p>
Installation and usage instructions are inside the distribution
tarball.
Please read them - Fink is not a one-click-and-done thing.
The documents README, INSTALL and USAGE are provided as pure text (for
reading from the command line) and as HTML (for reading in a browser
and for printing).
They are also available online in the <a
href="../doc/index.php">documentation section</a>.
</p>
<p>
To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>


<?
include "footer.inc";
?>
