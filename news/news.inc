<a name="2003-10-12 New update method available"><span class="news-date">2003-10-12: </span><span class="news-headline">New update method available</span></a><?php gray_line(); ?>
<p>The latest version of the fink package manager offers a new update
method, <code>fink selfupdate-rsync</code>, as an alternative to the
CVS updates which have been so problematic in the past few months.
If you have difficulty updating to the new version, please follow
<a href="<?php print $root; ?>http://fink.sourceforge.net/download/rsync-upgrade.php">these 
special update instructions</a>.
</p>
<p>In addition, this version of the fink package manager is compatible
with last summer's Developer Tools updates.  After installing both the new
package manager and the Developer Tools update, 
fink will ask you to reset your gcc version whenever
that is necessary.</p>
	<a name="2003-09-02 Logo contest ends"><span class="news-date">2003-09-02: </span><span class="news-headline">Logo contest ends</span></a><?php gray_line(); ?>
<p>The Logo contest held by Fink, announced <a href="<?php print $root; ?>http://fink.sourceforge.net/logo.php"> here, </a>
ended yesterday. With over 80 different proposals from countries all over the world we 
consider the contest a big success.  
In the next couple of days all the submitted entries will be put on-line in a publically accessable gallery and more details on the participants shall be published. For those who are 
curious and cannot wait may have a look at an incomplete <a href="<?php print $root; ?>http://nour.net/logo/incomplete.html"> preview </a></p>
<p>Fink is proud to be part of such a supportive community and would like to thank those who submitted entries and <a href="<?php print $root; ?>http://www.macwelt.de"> MacWelt </a> for their continued support.
</p>
	<a name="2003-08-18 Source files from ftp.gnu.org"><span class="news-date">2003-08-18: </span><span class="news-headline">Source files from ftp.gnu.org</span></a><?php gray_line(); ?>
<p>As announced in <a href="<?php print $root; ?>http://www.cert.org/advisories/CA-2003-21.html">this CERT 
advisory</a>, it has recently been discovered that
the ftp servers for GNU software were compromised back in March, 
although it is not believed that any of the source code housed there
was affected.
</p><p>
Fink relies on MD5 checksums when downloading software, and we have had
no reports of incorrect checksums in Fink packages.  The Free Software
Foundation is in the process of verifying the integrity of all of the
source code distributed from that ftp site.  As of this writing, the source
code for the following Fink packages have not yet been verified:
<code>autoconf2.54</code>,
<code>emacs21</code>,
<code>gprolog</code>,
<code>groff</code>,
<code>guile16</code>,
<code>help2man</code>,
<code>jwhois</code>,
<code>libtool14</code>,
<code>libosip1</code>,
<code>sed</code>,
<code>slib</code>.
It may be difficult to install those packages at present.
</p>
                
