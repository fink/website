<a name="2013-04-06%20fink-0.36.3.1%20released"><span class="news-date">2013-04-06: </span><span class="news-headline">fink-0.36.3.1 released</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.36.4</code> was released on 6 April, 2014.
  This <code>fink</code> release restores the use of an official binary distribution by
  default on 10.8 and 10.9 (if distributions are created for 10.6 and 10.7
  those will be supported, too).  In addition, it works around the multiple
  build failures introduced by Xcode 5.1 on 10.8 and 10.9. This release also includes 
  official support for OS X 10.9.2, fixes the bootstrap operation when Xcode.app isn't
  present, and makes x86_64 the default architecture for 10.6 bootstraps.
  </p>
  <p>Users are encouraged to run <code>fink selfupdate</code> to install this version of
  fink, particularly in view of the Xcode 5.1 build issues.</p>
 <a name="2014-04-06%20rsync%20issue"><span class="news-date">2014-04-06: </span><span class="news-headline">rsync issue</span></a><?php gray_line(); ?>
  <p>
  We've been having issues with the master rsync server, which haven't been
  resolved as of yet.  Unfortunately, this affects all but two of the other
  servers.  To work around this problem, edit <code>/sw/etc/fink.conf</code>
  as an administrator and change your <code>Mirror-rsync</code> setting to one of</p>
<pre>
rsync://ber.de.eu.finkmirrors.net/finkinfo/
rsync://hnd.jp.asi.finkmirrors.net/finkinfo/
</pre>
  <p>
  or use <code>fink selfupdate-cvs</code> to switch your update method.
  </p>
 <a name="2013-12-30%20fink-0.36.3.1%20released"><span class="news-date">2013-12-30: </span><span class="news-headline">fink-0.36.3.1 released</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.36.3.1</code> was released on 30 December, 2013.
  This release includes official support for OS X 10.9.1, and fixes an 
  issue in which the fink couldn't directly access official or unofficial 
  binary distributions on 64-bit platforms.  It also fixes an issue with 
  32-bit platforms which was introduced in fink-0.36.3.
  </p>
 
