<?
$title = "Upgrade Matrix";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2003/01/19 18:09:15 $';

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
"<tt><nobr>fink --version</nobr></tt>" in a Terminal window.
</p>
<p>
If you are upgrading from a Fink release prior to 0.3.1, and you have
tetex installed, you should run the command "fink remove tetex"
before upgrading.  (It may also be necessary to remove the packages
which depend on tetex, such as lyx, before tetex can be removed.)
Afterwards you can again install tetex and the other packages you removed.
</p>
<? 
include "../fink_version.inc";
?>

<p>
Due to the SourceForge website reorganization in spring 2002 and the move
of our binary distribution in summer 2002, upgrading has become slightly
complicated.  Please be sure to follow the upgrade instructions very
carefully to ensure a successful upgrade.  There are separate instructions
for binary installations and for source installations.
</p>
<?
it_start();
it_item('<b>Current installation (binary release)</b>', '<b>Upgrade method</b>');
it_item("Fink official binary distribution, version 0.3.x or later",
  '<p>Update using either the <a href="10.1-upgrade.php">Upgrade
  instructions for 10.1</a> or the <a href="10.2-upgrade.php">Upgrade
  instructions for 10.2</a>.</p>');
it_item("Fink official binary distribution, version 0.2.x",
  '<p>Try the <a href="puma-kit.php">Original 10.1 Upgrade Kit</a>.  (The Fink
maintainers are no longer able to test this upgrade path.)</p>');
it_item("MacGIMP or OpenOSX.com install of Fink 0.2.1",
  '<p>Try the <a href="puma-kit.php">Original 10.1 Upgrade Kit</a>.  (The Fink
maintainers are no longer able to test this upgrade path.)
  Make sure you install the <tt><nobr>system-xfree86</nobr></tt>
  package before updating the bulk of packages.</p>');
it_item('<b>Current installation (source release)</b>', '<b>Upgrade method</b>');
it_item("Fink source release 0.2.5 or newer",
  '<p>Run "<tt>fink selfupdate</tt>".  If you are upgrading from 10.1 to
  10.2, you may need to do this twice to be fully updated.</p>');
it_item("Fink source release 0.2.4 or older (down to 0.2.0)",
  "<p>If upgrading under OS X 10.1, 
download the <a
  href=\"http://prdownloads.sourceforge.net/fink/packages-0.4.1.tar.gz\">packages
  tarball</a>, unpack it using the <tt>tar</tt> utility and run
  \"<tt><nobr>./inject.pl</nobr></tt>\" inside the packages-0.4.1
  directory.</p><p>
If upgrading under OS X 10.2, download the <a
  href=\"http://prdownloads.sourceforge.net/fink/dists-$fink_version.tar.gz\">dists
  tarball</a>, unpack it using the <tt>tar</tt> utility and run
  \"<tt><nobr>./inject.pl</nobr></tt>\" inside the 
  dists-$fink_version directory.</p>");
it_end();
?>


<?
include "footer.inc";
?>
