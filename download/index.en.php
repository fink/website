<?
$title = "Download Quick Start";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2006/06/15 16:47:23 $';

include "header.inc";
?>


<h1>Fink Downloads</h1>
<p>
There are many ways to install or upgrade Fink.
For new users, the quick start instructions below are recommended.
Otherwise, check out the <a href="overview.php">overview</a> and the
<a href="upgrade.php">upgrade matrix</a>.
</p>

<h2>Quick Start</h2>
<p>
New to Fink?  These quick start instructions are here to get you up to speed
with the binary release.
</p>
<p><strong>Important note:</strong>  These instructions do <em>not</em> apply to Intel users currently.  You need to go to <a href="../news/index.php">the news item on this topic</a>.</p>
<? 
include "../fink_version.inc";
?>

<ol>
<li><p>
Download the installer disk image:<br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-PowerPC-Installer.dmg?download">Fink
<? print $fink_version; ?> Binary Installer</a> - <? print $dmg_size; ?> (PowerPC)<br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Intel-Installer.dmg?download">Fink
<? print $fink_version; ?> Binary Installer</a> - <? print $intel_dmg_size; ?> (Intel)<br>
(10.3 users - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.7.2-Installer.dmg?download">Fink
0.7.2</a>)<br>
(10.2 users - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.4-Installer.dmg?download">Fink
0.6.4</a>)<br>
(10.1 users - use <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink
0.4.1</a>)
</p>
</li>
<li><p>
Double-click &quot;Fink-<? print $fink_version; ?>-Installer.dmg&quot; to mount the disk image,
then double-click the &quot;Fink <? print $fink_version; ?> Installer.pkg&quot; package
inside. Follow the instructions on screen.
</p></li>
<li><p>
At the end of the installation, the pathsetup utility will be launched.
You will be asked for permission before your shell's configuration files
are edited. When the utility has finished, you are set to go!
</p></li>
<li><p>
If anything goes wrong during this process, you can try again by launching 
the pathsetup application which appears on the installer disk, or by
running (from the command line in a Terminal.app window) 
</p><pre>/sw/bin/pathsetup.sh</pre><p>
(This step should also be repeated by any other users on your system: 
each user must run pathsetup in his or her own account.)
</p><p>
If pathsetup generates errors messages, consult the documentation, 
particularly 
<a href="../doc/users-guide/install.php#setup">section
2.3 &quot;Setting Up Your Environment&quot;</a> of the User's Guide.</p>
</li>
<li><p>
Open a new Terminal.app window and run the following: &quot;<code>fink scanpackages; fink index</code>&quot;, or use the included Fink Commander GUI application (which must be placed in a real folder on your system, not run from the disk image) and run the following commands from its menu:  <em>Source-&gt;scanpackages</em> followed by <em>Source-&gt;Utilities-&gt;index</em>.
</p></li>
<li><p>Once those two commands are finished you should update the <code>fink</code> package, in case there have been significant changes since the last point release.  After you do this you can install other packages.  There are several ways to do this:
<ul>
<li>
<p>Use the included Fink Commander to select and install packages. Fink Commander provides an easy to use GUI for Fink. This is the recommended method for new users, or users who are not comfortable with the command line.  Fink Commander has Binary and Source menus.  You should install from binaries if you don't have the Developer Tools installed, or don't want to build packages yourself.</p>
<ul><li><p>The Fink Commander sequence to update <code>fink</code> from binaries is as follows:</p>
<ol>
<li>Binary-&gt;Update descriptions</li>
<li>Select the <code>fink</code> package.</li>
<li>Binary-&gt;Install</li>
</ol></li>
<li><p>The recommended Fink Commander sequence to update <code>fink</code> from source is as follows:</p>
<ol>
<li>Source-&gt;Selfupdate</li> 
<li>Tools-&gt;Interact with Fink...
<li>Make sure &quot;Accept default response&quot; is selected, and click &quot;Submit&quot;.</li>
<li><code>fink</code> and other base packages will be built and run automatically</li>
</ol></li></ul>
<p>Now that you've updated <code>fink</code>, you can install other packages.</p>
<ul>
<li>To install from binaries, select the package, and use Binary-&gt;Install.</li>
<li>To install from source, select the package, and use Source-&gt;Install</li>
</ul>
</li>
<li>
<p>Use apt-get. Apt-get will fetch and install binary packages for you, saving compiling time.  You should either use this method or the Fink Commander binary method (above) if you don't have the Developer Tools installed.</p>
<p>To update <code>fink</code> open a Terminal.app window and type <code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>Once you've updated <code>fink</code>, you can install other packages, using the same syntax, e.g <code>sudo apt-get install gimp</code> to install the Gimp.  Note, however, that not all fink packages are in binary form.</p>
</li>
<li>
<p>Install from source (requires the XCode Tools [Developer Tools on 10.2] to be installed).
To update <code>fink</code> run <code>fink selfupdate</code>.  When prompted, select option (1), &quot;rsync&quot;.  This will automatically update the <code>fink</code> package.</p>
<p>Once <code>fink</code> is updated, you can use &quot;<code>fink install</code>&quot; to fetch and compile from source code.  For example, to install the Gimp, run <code>fink install gimp</code>.</p> 
</li> 
</ul>

</li> 
</ol>

<h2>Additional Things to Install</h2>
<h3>XCode Tools/Developer Tools</h3>
<p>You may find that only using binary packages limits the utility of Fink.  There are fewer packages available in binary format than from source, and the binary versions are generally older.  To build packages from source, you will need to install the Developer Tools (known as the XCode Tools for Mac OS 10.3 and later).</p>
<p>Although a Developer Tools/XCode Tools version usually comes with your OS install media, you'll probably want a newer one.  Go to <a href="http://connect.apple.com">the Apple Developer Connection</a> to download a newer version (and any updates) after free registration.</p>
<table>
  <caption>Recommended Developer Tools versions by OS</caption>
  <tbody>
    <tr>
      <td>10.2</td>
      <td>December 2002 Developer Tools and August 2003 <code>gcc3.3</code> updater</td>
    </tr>
    <tr>
      <td>10.3</td>
      <td>XCode 1.5 and the November 2004 <code>gcc3.3</code> updater</td>
    </tr>
    <tr>
      <td>10.4 on PowerPC</td>
      <td>XCode 2.2.1, and the XCode Legacy Tools (for packages that need <code>gcc3.1</code> or <code>gcc2.95</code> to build)</td>
    </tr>
    <tr>
      <td>10.4 on Intel</td>
      <td>XCode 2.2.1</td>
    </tr>
  </tbody>
</table>
<h3>X11</h3>
      <p>Almost all of the applications on Fink that have graphical user interfaces (GUIs) require some flavor of X11 (since most were originally developed on platforms that only had that as a GUI option).</p>
      <p>Apple provides its own X11 distribution for OS 10.3 and 10.4.  This is
the easiest option with which to get started.  They have elected to split it into two parts:</p>
      <ul>
        <li>The <em>X11User</em> package contains everything you need just to run Apple's X11.  It is available on your OS install media for 10.3 and 10.4 as an
 optional install.</li>
        <li>The
<em>X11SDK</em>
package contains the development headers.  You need this if you want to build anything from source that uses X11.  This package is available as part of the XCode Tools, and installed by default with XCode 2.x.</li>
</ul>
<p>Once you've installed X11 Fink should automatically register it.  If you're having problems check out the <a href="http://fink.sourceforge.net/faq/usage-packages.php?phpLang=en#apple-x11-wants-xfree86">FAQ entry</a> on X11 installation problems</p>
<h2>Further information</h2>
<p>For more information, please refer to the <a
href="../faq/index.php">Frequently Asked Questions</a> and the <a
href="../doc/index.php">documentation section</a>.
If your questions aren't answered by those documents, check out the <a
href="../help/index.php">help page</a>.
</p>
<p>
To be informed of new releases, subscribe to the <a
href="../lists/fink-announce.php">fink-announce mailinglist</a>.
</p>

<p>
The source code for the packages in the installer disk image can be
downloaded from this site,
<a
href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">here</a>.
</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
