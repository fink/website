<?
$title = "Upgrade Matrix";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/30 14:57:24 $';

include "header.inc";
?>


<h1>Fink Upgrade Matrix</h1>

<p>
Any version of Fink since release 0.2.0 can be upgraded to the latest
release in place.
This even includes the GIMP installs from MacGIMP.com and OpenOSX.com;
the first releases of both are based on Fink 0.2.1.
The following table helps you find the best way to update your Fink
installation.
</p>
<p>
If you're unsure which version of Fink you have, run
"<tt><nobr>/sw/bin/fink --version</nobr></tt>" in a Terminal window.
(Unless you explicitly installed Fink elsewhere, of course.)
</p>

<?
it_start();
it_item('<b>Current installation</b>', '<b>Upgrade method</b>');
it_item("Fink official binary distribution on Mac OS X 10.1",
  '<p>Use the <a href="puma-kit.php">10.1 Upgrade Kit</a>.</p>');
it_item("Fink official binary distribution on Mac OS X 10.0.x",
  '<p>Update normally through <tt>dselect</tt>: Choose "[U]pdate",
  then "[I]nstall".</p>');
it_item("MacGIMP or OpenOSX.com install of Fink 0.2.1",
  '<p>Use the <a href="puma-kit.php">10.1 Upgrade Kit</a>.
  Make sure you install the <tt><nobr>system-xfree86</nobr></tt>
  package before updating the bulk of packages.</p>');
it_item("Fink source release 0.2.5 or newer",
  '<p>Run "<tt>fink selfupdate</tt>".</p>');
it_item("Fink source release 0.2.4 or older (down to 0.2.0)",
  '<p>Download the <a
  href="http://prdownloads.sourceforge.net/fink/packages-0.3.0.tar.gz">packages
  tarball</a>, unpack it using the <tt>tar</tt> utility and run
  "<tt><nobr>./inject.pl</nobr></tt>" inside the packages-0.3.0
  directory.</p>');
it_end();
?>


<?
include "footer.inc";
?>
