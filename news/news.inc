<a name="2003-05-05 KDE 3.1.1 Binaries Available"><span class="news-date">2003-05-05: </span><span class="news-headline">KDE 3.1.1 Binaries Available</span></a><?php gray_line(); ?>
	       <p>KDE 3.1.1 binaries are now available.  Since they
have been released after 0.5.2 came out, you will need to update
your package descriptions by running <code>sudo apt-get update</code>
(or equivalent) before they will be available for installation.
For pointers to the changes and security fixes in this release,
see <a href="http://sourceforge.net/mailarchive/forum.php?thread_id=2068947&amp;forum_id=2022">the
announcement</a>.
</p>

		<a name="2003-04-16 Virex problem resolved"><span class="news-date">2003-04-16: </span><span class="news-headline">Virex problem resolved</span></a><?php gray_line(); ?>
	       <p>McAfee has released Virex 7.2.1, which no longer
overwrites the main Fink directory <code>/sw</code>.  Fink users should
continue to avoid Virex 7.2.
</p><p>Early reports indicate that upgrading Virex from 7.2 to 7.2.1
still leaves some problems however.  If you upgrade Virex with Fink not
installed, and subsequently
wish to install Fink, you will need to delete the <code>/sw</code>
directory by hand before installing.  And if you upgrade Virex with
Fink already installed, you should immediately run
<b>
fink reinstall openssl-shlibs dlcompat-shlibs curl-ssl-shlibs
</b>
to restore files which the Virex upgrade may have deleted.
</p>

		<a name="2003-04-14 Fink 0.5.2 released"><span class="news-date">2003-04-14: </span><span class="news-headline">Fink 0.5.2 released</span></a><?php gray_line(); ?>
	       <p>Fink is proud to announce that the Fink binary distribution 0.5.2 is available from the <a href="http://fink.sourceforge.net/download.php">download</a> page.
		With over 190 new binary packages, KDE, KOffice and KDevelop binaries amongst other various improvements this is a recommended download for any new and all existing Fink users.
		The full announcement can be read on the <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-announce">fink-announce</a> mailing list.
		</p>
<p>(If you are having trouble upgrading a source installation, consult
<a href="http://fink.sourceforge.net/download/fix-upgrade.php">these
special instructions</a>.)</p>

		
