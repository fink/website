<a name="2013-06-04%20fink-0.36.5%20and%20fink-0.37.0%20released.%20End%20of%20official%20support%20for%2010.6."><span class="news-date">2013-06-04: </span><span class="news-headline">fink-0.36.5 and fink-0.37.0 released. End of official support for 10.6.</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.37.0</code> and <code>fink-0.37.0</code> were released on 4 June, 2014.
  These <code>fink</code> releases contain fixes for Java detection on 10.6 if older
  versions of Apple's Java SDK are installed.  <code>fink-0.37.0</code> officially 
  recognizes OS 10.9.3.  In addition, Fink's compiler wrappers are 
  now installed directly by the fink package to make for easier modifications.
  </p>
  <p>
  <code>fink-0.36.5</code> marks the end of 10.6 support by the Fink Project.  Users
  who want package updates should contact the maintainers of the respective packages.
  Unmaintained packages can be updated by request as well.
  </p>
 <a name="2014-04-06%20fink-0.36.4%20released"><span class="news-date">2014-04-06: </span><span class="news-headline">fink-0.36.4 released</span></a><?php gray_line(); ?>
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
 
