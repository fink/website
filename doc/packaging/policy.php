<?
$title = "Packaging - Policy";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/09/27 22:10:36';

$metatags = '<link rel="start" href="index.php" title="Packaging Contents"><link rel="contents" href="index.php" title="Packaging Contents"><link rel="next" href="fslayout.php" title="Filesystem Layout"><link rel="prev" href="format.php" title="Package Descriptions">';

include "header.inc";
?>

<h1>Packaging - Packaging Policy</h1>



<a name="licenses"><h2>Package Licenses</h2></a>
<p>
The packages included in Fink come with a wide variety of licenses.
Most of them place restrictions on redistributing the full source and
especially on distributing binaries.
Some packages can not be included in the binary distribution of Fink
because of these license restrictions.
Thus it is very important that package maintainers check the license
of their package.
</p>
<p>
Every package that is to be distributed as a binary package must
contain a copy of the license.
It must be installed in the doc directory,
i.e. in <tt><nobr>%p/share/doc/%n</nobr></tt>.
(In the InstallScript, %i must be used instead of %p, of course.
The DocFiles field takes care of the details automatically.)
If there is no explicit license in the original source, include a
small text file with a note about the status of the package.
Note that most licenses require that the license accompanies any
distribution.
Fink's policy is to do this even if it is not explicitly required.
</p>
<p>
To make an automated maintenance of the binary distribution possible,
any package that is to be distributed must have a <tt><nobr>License</nobr></tt>
field.
This field denotes the nature of the license and is used to decide
which packages make it into the binary distribution and which must be
held back.
The field may only be present if the actual license terms are included
in the binary package, as explained above.
</p>
<p>
To make the <tt><nobr>License</nobr></tt> field useful, only one of the
following pre-defined values may be used.
If you're packaging something that doesn't fit into these categories,
ask for help on the developer mailing list.
</p>
<ul>

<li><tt><nobr>GPL</nobr></tt> - the GNU General Public License.
This license requires that the source is available from the same place
as the binary.</li>
<li><tt><nobr>LGPL</nobr></tt> - the GNU Lesser General Public License.
This license requires that the source is available from the same place
as the binary.</li>
<li><tt><nobr>GPL/LGPL</nobr></tt> - this if a special case for packages where
one part is licensed under the GPL (e.g. the executables) and another
part is licensed under the LGPL (e.g. the libraries).</li>

<li><tt><nobr>BSD</nobr></tt> - for BSD-style licenses.
This includes the so-called "original" BSD license, the "modified" BSD
license and the MIT license. The Apache license also counts as
BSD. With these licenses the distribution of source code is
optional.</li>

<li><tt><nobr>Artistic</nobr></tt> - for the Artistic license and
derivatives.</li>

<li><tt><nobr>OSI-Approved</nobr></tt> - for other Open Source licenses
approved by the <a href="http://www.opensource.org/">Open Source
Initiative</a>. One of OSI's requirements is that free distribution
of binaries and sources is allowed. This value can also be used as an
umbrella for dual-licensed packages.</li>

<li><tt><nobr>Restrictive</nobr></tt> - for restrictive licenses.
Use this for packages that are available from the author in source
form for free use, but don't allow free redistribution.</li>

<li><tt><nobr>Commercial</nobr></tt> - for restrictive, commercial licenses.
Use this for commercial packages (e.g. Freeware, Shareware) that do
not allow free redistribution of source or binaries.</li>

<li><tt><nobr>Public Domain</nobr></tt> - for packages that are in the Public
Domain, i.e. the author has given up his copyright on the code. These
packages don't have licenses at all and anyone can do anything with
them.</li>

</ul>
<p>
If the documentation included in a package is explicitly put under the
GNU Free Documentation License, a <tt><nobr>/GFDL</nobr></tt> may be appended to
the License field, e.g. <tt><nobr>GPL/GFDL</nobr></tt>.
</p>



<a name="prefix"><h2>Base System Interference</h2></a>
<p>
Fink is an add-on distribution that is installed in a directory
separate from the base system.
It is crucial that a package does not install files outside of Fink's
directory.
</p>
<p>
Exceptions can be made when there is no other possibility, e.g. with
XFree86.
In this case the package must check for existing files before
installation and refuse to install if it would overwrite existing
files.
The package must make sure that all files it installed outside of the
Fink directory are deleted when the package is removed.
</p>



<p align="right">
Next: <a href="fslayout.php">Filesystem Layout</a></p>


<?
include "footer.inc";
?>
