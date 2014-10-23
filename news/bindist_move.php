<?php
$title = "Binary distribution moved to new location";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:09:29 $';

include "header.inc";
?>


<h1>Binary distribution moved to new location</h1>
<p>
In the past, the whole binary distribution (bindist) for Fink (the one you might or might not be using and which is accessed via the dselect / apt-get tools) has been hosted on the SourceForge.net web servers that also hosts the Fink homepage.
</p>

<p>
However, this is less than ideal, since it generates lots of traffic on the web servers.  Since the web servers are rate limited (after all, they have to serve other projects besides Fink), this means that download speeds are not as fast as one could wish.
<br>
On the other hand, SourceForge.net offers a dedicated download server network which has mirrors in the US and Europe. Since it is specifically designed for this task, it offers superior download speeds. 
</p>

<p>
Therefore, it was decided that the binary distibution is to be hosted on these dedicated file download servers, as it will take away load from the web servers, while at the same time the download experience for you, our users, is improved.
<br>
To this end, the whole binary distribution is already available in the new location. Everybody using "fink selfupdate-cvs" most probably already is using this new binary distribution. For anybody else, we provide instructions on how to switch on this page.
</p>

<p>
We suggest that you switch as soon as possible. The old binary distro will be removed on Monday, July 22nd. Don't worry though, switching to the new binary distro will still be possible later on without problems. Feel free to contact us via on of our <a href="../lists/index.php">mailing lists</a> if you have any questions or problems.
</p>

<h1>Switching to the new binary distribution</h1>

<p>
Depending on your circumstances, there are different ways to go about this. First off, if you are currently using the unofficial Fink KDE binary distribution, then you probably have a modified the <em>sources.list</em> file. In this case you have to manually switch (details on that in the next section). Otherwise you can just follow one of these two ways:

<ul>
	<li><b>Updating via apt-get.</b>
	<p>Enter the following command:
	"<b><tt>sudo apt-get update ; sudo apt-get install apt</tt></b>".
	This will download the latest version of <em>apt</em>
	(the tool that is responsible for managing the binary distribution
	on your machine) and update you local install to use it.
	</p>
	</li>
	<li><b>Updating via Fink's built-in selfupdate.</b>
	<p>Enter the following command:
	"<b><tt>fink selfupdate-cvs</tt></b>".
	This requires that you have the Apple Developer Tools installed.
	</p>
</ul>

<h1>Manually switching</h1>

<p>
Under some circumstances (mainly if you or some utility modified <em>/sw/etc/apt/sources.list</em>), the above instructions are not enough to switch to the new bindist location.
</p>

<p>
In this case you can modify the <em>sources.list</em> file manually.
<ol>
<li>Open <em>/sw/etc/apt/sources.list</em> with your favorite text editor (BBEdit, Pepper, emacs, vi etc. all will do fine). Do <b>not</b> use a word processor like MS Word for this!
</li>
<li>Now replace its contents with the following (or download it <a href="sources.list">here</a>):
<pre>
# Default APT sources configuration for Fink

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download current main crypto

# Local package trees - packages built from source locally
# NOTE: keep this in sync with the Trees: line in /sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to create Packages.gz files
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto
deb file:/sw/fink unstable main crypto
</pre>
This is simply the default sources.list file for Fink.
</li>

<li>If you are also using the unofficial Fink KDE binary distribution, make sure
to re-add the deb line to your source.list file. Read <a href="kde.php">the KDE instructions</a> for details on how to acomplish this.

<li>Save the file.</li>

<li>If all went well, you are done now. It is recommended that you update some core packages, you can acomplish this via the following command:<br>
<b><tt>sudo apt-get update ; sudo apt-get install apt fink dpkg storable-pm</tt></b>
</li>
</ol>

<?php
include "footer.inc";
?>
