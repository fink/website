<?
$title = "Binary Release Download";
$cvs_author = '$Author: fingolfin $';
$cvs_date = '$Date: 2002/06/02 11:52:47 $';

include "header.inc";
?>


<h1>Download Fink Binary Release</h1>

<p>
The binary release of Fink saves you the burden of compiling the
programs on your local machine.
After installing a base system using the installer package, you can
download pre-compiled binary packages from this site with the dselect
and apt-get tools.
Only a part of the packages are actually available as binary packages;
the others can only be built from source as with the source release.
</p>
<p>
<b>Status:</b>
A binary installer for Fink 0.4.0 has been posted.
The bulk of packages will be updated gradually over the next few
days.
<!-- 145 of 227 packages are available as binaries. -->
</p>
<ul>
<li><a href="http://us.dl.sourceforge.net/fink/fink-0.4.0-installer.dmg">Fink
0.4.0 Binary Installer</a> - 8.4 MB, compressed .dmg disk image</li>
<li><a href="../bindist/">Browse the Distribution Archive</a> - here
you will find the binary packages and the corresponding source.</li>
</ul>
<p>
Documentation is still sparse at this time.
The installer disk image contains some notes (Fink ReadMe.rtf), plus
a copy of the preliminary Fink User's Guide.
More documentation is available on this website in the <a
href="../doc/index.php">documentation section</a>.
</p>
<p>
To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>


<?
include "footer.inc";
?>
