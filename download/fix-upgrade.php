<?
$title = "Repairing the Upgrade Path";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2003/04/15 21:44:47 $';

include "header.inc";
?>


<h1>Repairing the Upgrade Path</h1>

<p>
Certain versions of Fink have difficulties with upgrades when running
<code>fink selfupdate</code> (without CVS).  The result is a message
which states that Fink is up-to-date, even though (as the message
reports) the installed version is older than the latest version.
Here is how to update in this situation:
</p>
<ol>

<li><p>Install an older version of the fink package manager, by running
the following commands in a Terminal.app window:
</p>
<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.5.1/main/binary-darwin-powerpc/base/fink_0.11.1-10_darwin-powerpc.deb
sudo dpkg -i fink_0.11.1-10_darwin-powerpc.deb
rm fink_0.11.1-10_darwin-powerpc.deb</pre>
<li><p>
Now update as usual, by running <code>fink selfupdate</code>.
</p>

</ol>



<?
include "footer.inc";
?>
