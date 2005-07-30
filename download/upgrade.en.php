<?
$title = "Upgrade Matrix";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2005/07/30 22:47:05 $';

include "header.inc";
?>
<? 
include "../fink_version.inc";
?>
<h1>Fink Upgrade Matrix</h1>
<p>(For OS X versions>= 10.2)</p>
<h3>Same OS:</h3>
<p>
All current versions of Fink can be upgraded in place to the latest release for the 
corresponding Mac OSX version, i.e. <strong>do not</strong> download the new installer!
</p>
<p>
Check the version of Fink you have by running
"<code>fink --version</code>" in a Terminal window.
</p>
<p>You can compare this to the latest available versions for your OS at <a href="../../pdb/package.php/fink">the package database</a>.</p>
<h2>Binary Update</h2>
<p>Update through <tt>dselect</tt>: Choose "[U]pdate",
  then "[I]nstall", or by running "<tt>sudo apt-get update ; sudo apt-get dist-upgrade</tt>".</p>
<p>Or in <em>FinkCommander</em>, run "Update" followed by
"Dist-Upgrade" (both in the <tt>Binary</tt> menu).</p>
<h2>Source Update</h2>
<p>Run "<tt>fink selfupdate</tt>".</p>
<p>Or in <em>FinkCommander</em>, run Source->selfupdate.</p>
<h3>New OS version:</h3>
<p>Each OS X update has required a different strategy, and specific instructions will be noted on the <a href="http://fink.sourceforge.net/">main page</a> to elucidate whatever is required. </p> 
<h2>Binary Update</h2>
<ol>
<li>Update Fink as above in the <em>Binary Update</em> item within the <em>Same OS</em> section to the latest version for your current OS.</li>
<li>If you think you may build from source at some point, you should remove your old Developer Tools by running 
"<tt>/Developer/Tools/uninstall-devtools.pl</tt>" in a terminal.</li>
<li>Update the OS.</li>
<li>Update Fink again.</li>
<li>Then if you decide to build anything from source install a Developer Tools (XCode) version appropriate for your OS.</li>
</ol>
<p></p>
<h2>Source Update</h2>
<p>The general strategy (valid for all supported OS versions as of this writing) is as follows:</p>
<ol><li>Update Fink to the latest appropriate version supported by your OS (as above in the <em>Source Update</em> item in the <em>Same OS </em>section)--you need not turn on the unstable tree.</li>  
<li>Remove your old Developer Tools by running "<tt>/Developer/Tools/uninstall-devtools.pl</tt>" in a terminal.</li>
<li>Then update your OS.</li>
<li>Run "<tt>/sw/lib/fink/postinstall.pl</tt>" in a terminal--this will redirect Fink to the correct distribution for your OS version.</li>
<li>Run "<tt>fink scanpackages</tt>" in the terminal (Source->scanpackages for Fink Commander users).</li>
<li>Run "<tt>sudo apt-get update</tt>" in the terminal (Binary->update).</li>
<p>(The above two commands get rid of binary-distribution related errors.)</p>
<li>Run "<tt>fink selfupdate</tt>" in the terminal (Source->selfupdate).</li></ol>

<p>Note:  A prior version of this document (appropriate for older Fink versions) can be found <a href=upgrade-old.en.php>here</a>.</p>

<?
include "footer.inc";
?>
