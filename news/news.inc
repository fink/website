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
                <a name="2003-06-26 Developer Tools Update."><span class="news-date">2003-06-26: </span><span class="news-headline">Developer Tools Update.</span></a><?php gray_line(); ?>
<p><b>Quick Summary: DO NOT INSTALL THIS UPDATE.</b></p>
               <p>
Apple has released a patch to the December 2002 
Developer Tools which includes gcc 3.3,
their new compiler.
</p><p>
Fink does not yet support compiling with gcc 3.3.  In addition, it is important
not to "mix and match" between compilers:  all C++ code in fink packages
needs to be compiled
with the same compiler.
</p><p>
For this reason, the Fink team recommends that if you update your
Developer Tools with the new patch, you should be careful to run
<code>sudo gcc_select 3</code>
prior to any "fink build" or "fink install" commands.
</p>
<p><b>Update 30 June 2003:</b> A 
<a href="<?php print $root; ?>http://sourceforge.net/mailarchive/forum.php?thread_id=2680195&amp;forum_id=2056">problem
has now been detected</a> with
the new assembler program which the update installs, which may prevent
certain Fink packages from being compiled at all if you install this
update.  
</p>
<p><b>Generally, Fortran programs will break if you install the update;
the breakage does not stop by simply switching back to gcc 3.1.</b>
The Fink team is working on a workaround for this problem, but until it
is ready, if you need Fortran-related programs you should not install
the update.</p>

                
