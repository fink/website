<?php
$title = "Upgrade Instructions for Mac OS X 10.8";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2014/11/30 18:43:47 $';

include "header.inc";
?>

<h1>Upgrade Instructions for Mac OS X 10.8</h1>
<h2>10.7 to 10.8</h2>
<ol>
	<li>
		Before installing 10.8, use <pre>fink selfupdate</pre> (with rsync or CVS) to get
		the latest version of <code>fink</code>.
	</li>
	<li>
		Install Xcode 5.1.0 if you haven't already, or at least its Command Line Tools
		for Mountain Lion.
		If you have Xcode 5.1.0, you will need to install the Command Line Tools, even
		if you had those installed under Lion already.
	</li>
	<li>
		Run <pre>sudo xcodebuild -license</pre> to accept the terms of the Xcode license.
	</li>
	<li>
		Update the OS.
	</li>
	<li>
		Use <pre>fink configure</pre> to reactivate Fink's build user, since Apple wipes
		out our users (but not groups for some reason).
	</li>
	<li>
		Use <pre>fink reinstall fink</pre> to point to the 10.8 distribution.
	</li>
	<li>
		Optional: 
		<p>Use <pre>fink install perl5123-core</pre> if you had any <code>-pm5123</code>
		packages installed.</p>
		<p>Use <pre>fink list -it passwd | cut -f2 | xargs fink reinstall</pre> if you 
		had any <code>passwd-*</code> packages installed.
	</li>
</ol>
<p>
	If you updated from 10.7 to 10.8 with an old fink, you won't be able to proceed until
	you get a newer one.
</p>
<ol>
	<li>
		Download a new enough copy of 
		<a href="https://raw.github.com/fink/fink/master/perlmod/Fink/Services.pm">
		Services.pm</a>
	</li>
	<li>
		Move that into <filename>/sw/lib/perl5/Fink</p>
	</li>
	<li>
		Run <pre>fink selfupdate</pre>
	</li>
	<li>Proceed from item #2 in the prior list.</li>
</ol>

<h2>10.6 and earlier to 10.8:</h2>
<p>There is no supported upgrade path for Fink from 10.6 (or earlier) to 10.8.</p>

<p>The instructions here are an abridged version of those found in the 
<a href="http://finkers.wordpress.com/2011/09/26/fink-and-lion/">Fink blog</a>. 
The entries there provide a more detailed upgrade explanation.</p>

<p>This process collects the list of packages that you have installed on 10.6 
(32 or 64 bit) and saves them for later use during the Fink install on 10.7</p>
<p>To collect the list of packages, follow the sequence below:</p>
<ol>
    <li>Use <pre>grep -B1 "install ok installed" /sw/var/lib/dpkg/status | grep Package | cut -d: -f2 > fink_packages.txt</pre> to dump your package information to a file.</li>
    <li>Install OS X 10.8, as well as Xcode 4.5.2, or the Command Line Tools at minimum.</li>
    <li>Clear out your Fink tree by using <pre>sudo rm -rf /sw</pre>, for example.</li>
    <li><a href="./srcdist.php">Install Fink</a> on your new 10.8 system.</li>
    <li>
    <li>Run the command: <pre>cat fink_packages.txt | xargs fink install</pre> to have your
     new Fink setup install the packages that you previously had installed on 10.6.</li>
</ol>
<p>Not all of the packages available on 10.6 are available on 10.8 due to several 
underlying changes in the system. Work is ongoing to make as many packages available 
as possible. If your favorite package is not available on 10.8, please contact the 
package maintainer and ask if it can be migrated to 10.8.</p>

<?php
include "footer.inc";
?>
<?php include_once "../phpLang.inc.php"; ?>
