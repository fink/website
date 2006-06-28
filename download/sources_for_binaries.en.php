<?
$title = "Getting the Source Files for Binary Packages";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2006/06/28 21:31:45 $';

include "header.inc";
?>

<h1>Getting the Source Files for Binary Packages</h1>

<p>
Fink makes pre-compiled versions of its "stable" packages available for automatic installation (when the package license permits). Many of these packages were released under the 
GNU Public License (GPL), and the Fink project takes its obligations under the GPL quite seriously.
</p><p>
The  <a href="http://bindist.finkmirrors.net/bindist/dists/">Archive Brower</a>
allows the user to obtain any of these binary packages, 
or the corresponding source files, patches, and build instructions. 
This is usually automatic: when fink downloads a binary package
provided by the Fink Project, it obtains
it from this Archive, and when fink downloads a source file it often
obtains it from this Archive's source repository (through the
"Master" source mirrors).  The Archive Browser lets you obtain things
manually, and in particular obtain binary packages, as well as
their corresponding source files.
</p><p>
The Archive Browser has a hierarchical organization:
each "distribution" within the archive (which is specific to a particular 
version of OS&nbsp;X) is divided into "crypto" and "main" sections, 
each of which is further subdivided. The <code>binary-darwin-<em>architecture</em></code>
directories contain the binary packages, again further subdivided by topic. 
The <code>finkinfo</code> directories contain the corresponding files with build 
instructions, as well as patch files, and the <code>source</code> directories 
contain the source files. 
</p><p>In this way, knowing the package name, a user can obtain not only the 
source file, but all necessary patch files and build instructions that were 
used in creating the binary version. 
The syntax used in these build instructions is carefully documented in the 
<a href="../doc/packaging/index.php">Fink Packaging Manual</a>.
(Note that some of the build instruction
files are used to build more than one package.  One can either search
through all of the build instruction files in a given directory to find
the correct file, or one can consult the 
<a href="http://pdb.finkproject.org/pdb/index.php">Online Package Database</a>
and determine the "Parent" of a given package.)
</p>
<p>
One final note: the Fink Installer (which uses Apple's Installer application
to install a basic fink setup) is distributed via 
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">fink's
file release page at Sourceforge.net</a>.
As such,
the source files for the included binary packages are also hosted at
Sourceforge.net: the installer is in the "distribution" release, and
the source files are in the "miscellaneous/bootstrap" and "fink" releases.


<?
include "footer.inc";
?>
