<?
$title = "Upgrade Matrix";
$cvs_author = '$Author: fingolfin $';
$cvs_date = '$Date: 2002/04/17 19:59:48 $';

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
<p>
In case you're still running Mac OS X 10.0, please stick to the source
release, i.e. don't upgrade using <tt>dselect</tt> or
<tt><nobr>apt-get</nobr></tt>.
The precompiled packages downloaded by these tools are now built on a
10.1 system and we can't guarantee that they will work on 10.0.
</p>
<p>
If you are upgrading from a Fink release prior to 0.3.1, and you have
tetex installed, you should run the command "fink remove tetex"
before upgrading.  (It may also be necessary to remove the packages
which depend on tetex, such as lyx, before tetex can be removed.)
Afterwards you can again install tetex and the other packages you removed.
</p>
<?
it_start();
it_item('<b>Current installation</b>', '<b>Upgrade method</b>');
it_item("Fink official binary distribution, version 0.3.x",
  '<p>Update normally through <tt>dselect</tt>: Choose "[U]pdate",
  then "[I]nstall".</p>');
it_item("Fink official binary distribution, version 0.2.x",
  '<p>Use the <a href="puma-kit.php">10.1 Upgrade Kit</a>.</p>');
it_item("MacGIMP or OpenOSX.com install of Fink 0.2.1",
  '<p>Use the <a href="puma-kit.php">10.1 Upgrade Kit</a>.
  Make sure you install the <tt><nobr>system-xfree86</nobr></tt>
  package before updating the bulk of packages.</p>');
it_item("Fink source release 0.2.5 or newer",
  '<p>Run "<tt>fink selfupdate</tt>".</p>');
it_item("Fink source release 0.2.4 or older (down to 0.2.0)",
  '<p>Download the <a
  href="http://prdownloads.sourceforge.net/fink/packages-0.4.0.tar.gz">packages
  tarball</a>, unpack it using the <tt>tar</tt> utility and run
  "<tt><nobr>./inject.pl</nobr></tt>" inside the packages-0.4.0
  directory.</p>');
it_end();
?>


<?
include "footer.inc";
?>
