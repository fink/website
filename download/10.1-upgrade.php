<?
$title = "Binary Upgrade Instructions for Mac OS X 10.1";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2002/12/17 18:55:00 $';

include "header.inc";
?>


<h1>Binary Upgrade Instructions for Mac OS X 10.1</h1>

<p>
Here is how to update the binary release of Fink under Mac OS X 10.1,
starting from the Fink official binary distribution, version 0.3.x or
later.
</p>
<p>There are several steps:
</p>
<ol>

<li><p>Getting the correct apt package.
Download the
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
and
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>
packages.
In a Terminal.app window, go to the folder where you downloaded these
files and run these commands:
</p>
<pre>sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb</pre>
</li>
<li><p>
Once apt is installed, use these commands to update apt and your installed
packages: 
</p>
<pre>sudo apt-get update
sudo apt-get dist-upgrade
sudo apt-get update
sudo apt-get install storable-pm</pre>
</li>

<li><p>Finally, update your package descriptions with the following
commands: 
</p>
<pre>sudo touch /sw/fink/stamp-rel-0.3.0
fink selfupdate</pre>
</li>

</ol>



<?
include "footer.inc";
?>
