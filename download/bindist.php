<?
$title = "Binary Release Download";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/30 14:57:24 $';

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
<b>Status:</b> The installer has been updated for the 0.3.0 release.
The bulk of packages will be updated gradually in the next few days.
</p>
<ul>
<li><a href="http://prdownloads.sourceforge.net/fink/fink-0.3.0-installer.dmg">Fink
0.3.0 Binary Installer</a> - 6.7 MB, .dmg disk image</li>
<li><a href="../bindist/">Browse the Distribution Archive</a> - here
you will find the binary packages and the corresponding source.</li>
</ul>
<p>
Documentation is still sparse at this time.
The installer disk image contains some notes (Fink ReadMe.rtf), plus
the documentation from the source release in HTML (in the Other Docs
folder).
More documentation is available in the <a
href="../doc/index.php">documentation section</a>.
</p>
<p>
To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>


<?
include "footer.inc";
?>
