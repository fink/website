<?php
$title = "Source Release Download";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2020/10/02 21:25:00 $';

include "header.inc";
include "../fink_version.inc";
?>

<h1>Download Fink Source Release</h1>

<!--monipol: As instructions for 10.6 were 'hidden' below 10.5, I've copied and
pasted them here with the title 10.6. -->

<h2>OS X 10.4 and later:</h2>

<p>The source tarball contains the <em>fink</em> package manager.  After you
have installed it, you will be able to get package descriptions and patches.
It will use these to download the source code from the original distribution
sites or the Fink project's mirrors and build them on your local machine.</p>

<!--akh: edit web/fink_version.inc to update the information henceforth -->

<p>The current version, <em>fink-<?php print $fink_tool_version; ?></em>, was officially released on
<?php print $fink_tool_release_date; ?>.</p>

<ul>
	 <li>
For macOS 10.9-10.15, you can use a <a href="https://github.com/fink/scripts/releases/latest">helper script</a>
which automates the download and build steps below.
	 </li>
	 <li>
For a manual install on OS X 10.9-10.15, <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-" . $fink_tool_version . ".tar.gz", "fink-" . $fink_tool_version . ".tar.gz", "/downloads/FinkSOURCE") ?> - <?php echo $fink_tool_tarball_k ?>K<br>
     </li>     
	 <li>
For OS X 10.7-8, use
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.38.7.tar.gz", "fink-0.38.7.tar.gz", "/downloads/FinkSOURCE") ?> - 1185K<br>
	 </li>
     <li>
For OS X 10.6, use
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.36.5.tar.gz", "fink-0.36.5.tar.gz", "/downloads/FinkSOURCE") ?> - 1176K<br>
     </li>
     <li>
For OS X 10.5, use
  <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.34.10.tar.gz", "fink-0.34.10.tar.gz", "/downloads/FinkSOURCE") ?> - 1268K<br>
     </li>
     <li>
For OS X 10.4, use
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.30.2.tar.gz", "fink-0.30.2.tar.gz", "/downloads/FinkSOURCE") ?> - 1188K<br>
     </li>
</ul>

<p>You will need to install the proper Command Line Tools for Xcode for your system, (cf. <a href="./index.en.php#additionaldownloads">the Quick Start page</a>) which can be done as follows:</p>
<ul>
<li><p><em>10.9-10.15:  </em>Run <code>sudo xcode-select --install</code> from the Terminal and select the Install button.</p></li>
<li><p><em>10.7-10.15:  </em>Manually download them from developer.apple.com.  Make sure to get the right version for your OS.</p></li>
<li><p><em>10.7-10.8:  </em>Install the full Xcode, and you can install the Command Line Tools via the <em>Downloads</em> tab of the Xcode <strong>Preferences</strong>.</p></li>
<li><p><em>10.6:  </em>Install the full Xcode.</p></li>
</ul>
<p>If you install the full Xcode on 10.7-10.15, you will also want to run:</p>
<pre>sudo xcode-select -switch /Applications/Xcode.app/Contents/Developer</pre>
<p>where you should replace <em>/Applications</em> with the actual path to the Xcode app.</p>
<p>You will need to run <pre>sudo xcodebuild -license</pre> to accept the terms of the Xcode license in order for fink's build user to work.</p> 
<p></p>
<p>Now unpack the <?php print $fink_tool_version; ?>.tar.gz archive if this hasn't been done automatically, e.g.
via running the following commands in a terminal window
(assuming the default download location--you'll need to match these commands to your own setup):</p>

<pre>cd $HOME/Downloads</pre>
<p>followed by</p>
<pre>tar -xvf fink-<?php print $fink_tool_version; ?>.tar.gz</pre>
<p>or</p>
<pre>tar -xvf fink-<?php print $fink_tool_version; ?>.tar</pre>
<p>where the choice depends on whether the source has already been partially unpacked, 
e.g. by Safari.</p>

<p>Then run the following commands in a terminal window:</p>

<pre>cd fink-<?php print $fink_tool_version; ?></pre>
<pre>./bootstrap</pre>

<p>to start the boostrapping operation, which will install the Fink base
setup.  If you would like to use a different location than the default <em>/sw</em>, you can do this via</p>
<pre>./bootstrap /path</pre>
<p>(replace <em>/path</em> with the directory you want to use).</p>
<p>After the installation is completed, running the command</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>will set up your environment for Fink (assuming you have installed Fink
under /sw).  If you open a new terminal window, the session will use these
environment settings.  Once you have installed <em>fink</em> and the other base
packages, the command sequences:</p>

<pre>fink selfupdate-rsync</pre>
<pre>fink index -f</pre>
<p>or</p>
<pre>fink selfupdate-git</pre>
<pre>fink index -f</pre>

<p>will download the package description files and patches. <code>rsync</code> is
generally preferable to <code>git</code> for most people.</p>

<p>Installation and usage instructions are inside the distribution tarball.
Please read them - Fink is not a one-click-and-done thing.  The documents
README, INSTALL and USAGE are provided as pure text (for reading from the
command line) and as HTML (for reading in a browser and for printing).  They
are also available online in the <a href="../doc/index.php">documentation
section</a>.
</p>

<p>To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>



<h2>OS X 10.5 point release:</h2>

<p>The source point release contains the <em>fink</em> package manager plus package
descriptions and patches.  It will download the source code from the original
distribution sites and build them on your local machine.
</p>

<p>Fink <?php print $fink_version; ?> was officially released on
<?php print $release_date; ?>.</p>

<ul><li>
<?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-" . $fink_version . "-full.tar.gz", "fink-" . $fink_version . "-full.tar.gz", "/downloads/FinkFullSOURCE") ?> - 3524k<br>
</ul>

<p>You will also need to install the Xcode Tools (c.f. <a href="./index.en.php#additionaldownloads">the Quick Start page</a>).</p>

<p>Unpack the tar.gz archive if this hasn't been done automatically, e.g.
via</p>

<pre>tar -xvzf fink-<?php print $fink_version; ?>-full.tar.gz</pre>

<p>or</p>

<pre>tar -xvf fink-<?php print $fink_version; ?>-full.tar</pre>

<p>if it has already been partially unpacked, in a terminal window.  Then, in a
terminal window, change to the resulting <em>fink-<?php print $fink_version;
?></em> directory, and use</p>

<pre>./bootstrap</pre>

<p>to start the boostrapping operation, which will install the Fink base
setup.  If you would like to use a different location than the default <em>/sw</em>, you can do this via</p>
<pre>./bootstrap /path</pre>
<p>(replace <em>/path</em> with the directory you want to use).</p>
<!-- akh: I got a note from Trevor Harmon that the 0.28.0 bootstrap automagically runs pathsetup.sh
     rangerrick: but that is not true!  ;) -->

<p>After the installation is completed, running the command</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>will set up your environment for Fink (assuming you have installed Fink
under /sw).  If you open a new terminal window, the session will use these
environment settings.  Once you have installed <em>fink</em> and the other base
packages, the command sequence:</p>

<pre>fink selfupdate</pre>

<p>using any either the <em>rsync</em> or <em>git</em> options,
followed by</p>

<pre>fink index -f</pre>

<p>followed by</p>

<pre>fink selfupdate-rsync</pre>

<p>or</p>

<pre>fink selfupdate-git</pre>

<p>will download the package description files and patches, provided that you
<strong>do not</strong> select the "point release" method initially.  <em>rsync</em> is generally
preferable to <em>git</em> for most people.</p>

<p>Installation and usage instructions are inside the distribution tarball.
Please read them - Fink is not a one-click-and-done thing.  The documents
README, INSTALL and USAGE are provided as pure text (for reading from the
command line) and as HTML (for reading in a browser and for printing).  They
are also available online in the <a href="../doc/index.php">documentation
section</a>.
</p>

<p>To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>

<?php
include "footer.inc";
?>
