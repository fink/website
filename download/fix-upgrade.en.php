<?php
$title = "Repairing the Upgrade Path";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>

<h1>Source update after updating Mac OS X</h1>
<p>After you've updated the OS, the first thing to do to update Fink via source is to run <code>fink selfupdate</code> to make sure you have a version of the <code>fink</code> package that is compatible with your new OS version.  Then you should run <code>sudo /sw/lib/fink/postintstall.pl</code>.  This should insure that Fink is pointing at the correct distribution for your OS.  </p>
<p>If you're using the <em>UseBinaryDist</em> option, then run <code>sudo apt-get update</code> so that the homebuilt binary package listings appropriate for your new OS are used.  Lastly, whether you're using <em>UseBinaryDist</em> or not, you should run <code>fink selfupdate</code> again, since the prior run only downloaded the packages appropriate to your prior OS version.</p>

<h1>Repairing the Upgrade Path</h1>

<p>
Certain versions of Fink have had difficulties with upgrades when running
<code>fink selfupdate</code> (without CVS).  The result is a message
which states that Fink is up-to-date, even though (as the message
reports) the installed version is older than the latest version.
Here is how to update in this situation:
</p>
<ol>
<b><p>Fink-0.5.0a -> Fink-0.5.1</p></b>
<li><p>Install an older version of the fink package manager, by running
the following commands in a Terminal.app window:
</p>
<pre>curl -O http://us.dl.sourceforge.net/fink/direct_download/dists/fink-0.5.1/main/binary-darwin-powerpc/base/fink_0.11.1-10_darwin-powerpc.deb
sudo dpkg -i fink_0.11.1-10_darwin-powerpc.deb
rm fink_0.11.1-10_darwin-powerpc.deb</pre>
<li><p>
Now update as usual, by running <code>fink selfupdate</code>.
</p>

</ol>



<?php
include "footer.inc";
?>
