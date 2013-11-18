<?
$title = "Upgrade Instructions for Mac OS X 10.7";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2013/11/18 01:26:06 $';

include "header.inc";
?>

<h1>Upgrade Instructions for Mac OS X 10.9</h1>
<h2>Important Notes:</h2>
<p>There is no supported upgrade path for Fink from 10.8 (or earlier) to 10.9.</p>  

<p>The instructions here are an abridged version of those found in the 
<a href="http://finkers.wordpress.com/2011/09/26/fink-and-lion/">Fink blog</a>. 
The entries there provide a more detailed upgrade explanation.</p>

<p>This process collects the list of packages that you have installed
(32 or 64 bit) and saves them for later use during the Fink install on 10.9</p>
<p>To collect the list of packages, follow the sequence below:</p>
<ol>
    <li>Use <pre>grep -B1 "install ok installed" /sw/var/lib/dpkg/status | grep Package | cut -d: -f2 > fink_packages.txt</pre> to dump your package information to a file.</li>
    <li>Install OS X 10.9, as well as Xcode 5.0.2, or the Command Line Tools at minimum.</li>
    <li>Clear out your Fink tree by using <pre>sudo rm -rf /sw</pre>, for example.</li>
    <li><a href="./srcdist.php">Install Fink</a> on your new 10.9 system.</li>
    <li>Run the command: <pre>cat fink_packages.txt | xargs fink install</pre> to have your
     new Fink setup install the packages that you previously had installed.</li>
</ol>
<p>Not all of the packages are available on 10.79due to several 
underlying changes in the system. Work is ongoing to make as many packages available 
as possible. If your favorite package is not available on 10.9, please contact the 
package maintainer and ask if it can be migrated.</p>

<?
include "footer.inc";
?>
