<?php
$title = "Upgrade Instructions for Mac OS X 10.11";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2020/03/28 11:39:00 $';

include "header.inc";
?>

<h1>Upgrade Instructions for Mac OS X 10.11</h1>
<h2>10.9 to 10.11</h2>
<ol>
	<li>
		Before installing 10.11, use <pre>fink selfupdate</pre> (with rsync or CVS) to get
		the latest version of <code>fink</code>.
	</li>
	<li>
		Update the OS.
	</li>
	<li>
		Install Xcode 8.2.1 if you haven't already, or at least its Command Line Tools
		for Yosemite.
		If already have Xcode 8.2.1, you will still need to reinstall the Command Line Tools,
		even if you had those installed under Mavericks or Yosemite already.
	</li>
	<li>
		If you have Xcode 8.2.1, run <pre>sudo xcodebuild -license</pre> to accept the 
		terms of the Xcode license.  This is not required if you are using only the 
		command-line tools.
	</li>
	<li>
		Use <pre>fink configure</pre> to reactivate Fink's build user, since Apple wipes
		out our users (but not groups for some reason).
	</li>
	<li>
		Use <pre>fink reinstall fink</pre> to point to the 10.11 distribution.
	</li>
	<li>
		Optional: 
		<p>Use <pre>fink install perl5162-core</pre> if you had any <code>-pm5162</code>
		packages installed.</p>
		<p>Use <pre>fink list -it passwd | cut -f2 | xargs fink reinstall</pre> if you 
		had any <code>passwd-*</code> packages installed.
	</li>
</ol>
<p>
	If you updated from 10.9 or 10.10 to 10.11 with a fink which doesn't know about 10.10, 
	you won't be able to proceed.  You can download a compatible 
	<link url="http://downloads.sourceforge.net/fink/fink_0.39.2-101_darwin-x86_64.deb">
   pre-built fink</link> and install it via the terminal by running
   <pre>sudo dpkg -i fink_0.39.2-101_darwin-x86_64.deb</pre> in the folder where you 
   downloaded it.
</p>

<h2>10.8 and earlier to 10.11:</h2>
<p>There is no supported upgrade path for Fink from 10.8 (or earlier) to 10.11.</p>

<p>The instructions here are an abridged version of those found in the 
<a href="http://finkers.wordpress.com/2011/09/26/fink-and-lion/">Fink blog</a>. 
The entries there provide a more detailed upgrade explanation.</p>

<p>This process collects the list of packages that you have installed on your current Fink
and saves them for later use during the Fink install on 10.11</p>
<p>To collect the list of packages, follow the sequence below:</p>
<ol>
    <li>Use <pre>grep -B1 "install ok installed" /sw/var/lib/dpkg/status | grep Package | cut -d: -f2 > fink_packages.txt</pre> to dump your package information to a file.</li>
    <li>Rename your Fink tree by using <pre>sudo mv /sw /sw.old</pre>, for example.</li>
    <li>Install OS X 10.11, as well as Xcode 8.2.1, or the Command Line Tools at minimum.</li>
    <li><a href="./srcdist.php">Install Fink</a> on your new 10.11 system.</li>
    <li>Run the command: <pre>cat fink_packages.txt | xargs fink install</pre> to have your
     new Fink setup install as many of the packages that you previously had installed on 10.8 or earlier as are available.</li>
	<li>Remove your /sw.old directory.</li>
</ol>
<p>Not all of the packages available on 10.8 and earlier OS X versions are available on 10.11 due to several 
underlying changes in the system. Work is ongoing to make as many packages available 
as possible. If your favorite package is not available on 10.11, please contact the 
package maintainer and ask if it can be migrated.</p>

<?php
include "footer.inc";
?>
<?php include_once "../phpLang.inc.php"; ?>
