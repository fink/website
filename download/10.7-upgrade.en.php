<?php
$title = "Upgrade Instructions for Mac OS X 10.7";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>

<h1>Upgrade Instructions for Mac OS X 10.7</h1>
<h2>Important Notes:</h2>
<p>There is no supported upgrade path for Fink from 10.6 (or earlier) to 10.7.  
There have been reports of successful upgrading from a 10.6/64 bit Fink install to 10.7, 
but there is no guarantee that the updated Fink tree will work correctly.  
Upgrading from 10.6/i386 will definitely not work.</p>

<p>The instructions here are an abridged version of those found in the 
<a href="http://finkers.wordpress.com/2011/09/26/fink-and-lion/">Fink blog</a>. 
The entries there provide a more detailed upgrade explanation.</p>

<p>This process collects the list of packages that you have installed on 10.6 
(32 or 64 bit) and saves them for later use during the Fink install on 10.7</p>
<p>To collect the list of packages, follow the sequence below:</p>
<ol>
    <li>Use <pre>grep -B1 "install ok installed" /sw/var/lib/dpkg/status | grep Package | cut -d: -f2 > fink_packages.txt</pre> to dump your package information to a file.</li>
    <li>Install OS X 10.7, as well as Xcode 4.5.2, or the Command Line Tools at minimum.</li>
    <li>Clear out your Fink tree by using <pre>sudo rm -rf /sw</pre>, for example.</li>
    <li><a href="./srcdist.php">Install Fink</a> on your new 10.7 system.</li>
    <li>Run the command: <pre>cat fink_packages.txt | xargs fink install</pre> to have your
     new Fink setup install the packages that you previously had installed on 10.6.</li>
</ol>
<p>Not all of the packages available on 10.6 are available on 10.7 due to several 
underlying changes in the system. Work is ongoing to make as many packages available 
as possible. If your favorite package is not available on 10.7, please contact the 
package maintainer and ask if it can be migrated to 10.7.</p>

<?php
include "footer.inc";
?>
