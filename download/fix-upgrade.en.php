<?
$title = "Repairing the Upgrade Path";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2004/11/29 01:29:36 $';

include "header.inc";
?>


<h1>Repairing the Upgrade Path</h1>

<p>
Certain versions of Fink have had difficulties with upgrades when running
<code>fink selfupdate</code>.  The result is a message
which states that Fink is up-to-date, even though (as the message
reports) the installed version is older than the latest version.
Here is how to update in this situation:
</p>
<ol>

<li><p>Install an older version of the fink package manager, by running
the following commands in a Terminal.app window:
</p>
<ul>
<LI>
<p><b>OS 10.3.x:</b> (0.7.1 binary distribution)</p>
<pre><p>sudo apt-get install fink=0.21.2-1</p></pre>
</LI>
<li>
<p><b>OS 10.2.x:</b> (0.6.3 binary distribution)</p>
<pre><p>sudo apt-get install fink=0.18.3-1</p></pre>
</li>
<li>
<p><b>OS 10.1.x:</b> (0.4.1 binary distribution)</p>
<pre><p>sudo apt-get install fink=0.10.0-1</p></pre>
</li>

</ul>

<li><p>
Now update as usual, by running <code>fink selfupdate</code>.
</p>

</ol>

<b><p>Older instructions</p></b>
(specifically for Fink-0.5.0.a -> 0.5.1 update)
 </p>
<pre>curl -O http://us.dl.sourceforge.net/fink/direct_download/dists/fink-0.5.1/main/binary-darwin-powerpc/base/fink_0.11.1-10_darwin-powerpc.deb
sudo dpkg -i fink_0.11.1-10_darwin-powerpc.deb
rm fink_0.11.1-10_darwin-powerpc.deb</pre></p>
<p>Now run <code>fink selfupdate</code></p>.
<?
include "footer.inc";
?>
