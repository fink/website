<a name="2012-12-10%20Issues%20with%20all%20SourceForge%20Services"><span class="news-date">2012-12-10: </span><span class="news-headline">Issues with all SourceForge Services</span></a><?php gray_line(); ?>
  <p>Sourceforge is currently down.  Check <a href="https://twitter.com/sfnet_ops">
  the SF.net Operations Twitter feed</a> and 
<a href="http://finkers.wordpress.com/2012/12/10/general-sourceforge-outage/">
  the Finkers blog</a> for status updates.</p>
  <p>For folks who aren't behind firewalls, the best recommendation is to use
  <code>fink selfupdate-rsync</code> since that is currently functional.  If yo$
  behind a firewall, the best short-term workaround is probably to ask for spec$
  updated package description files by contacting the maintainer
  directly.</p>
 <p>The mailing lists and bug tracker are also down, so as an interim solution
    please file bug reports for unmaintained packages (only) as comments to 
    <a href="http://finkers.wordpress.com/2012/12/10/general-sourceforge-outage">
    the Finkers entry</a>.  For maintained packages, send reports to the maintainer. ‎</p>
  <p><b>Addendum: 2012-12-12:</b> Anonymous CVS is working again.</p>
 <a name="2012-11-30%20Issues%20with%20sourceforge%20CVS"><span class="news-date">2012-11-30: </span><span class="news-headline">Issues with sourceforge CVS</span></a><?php gray_line(); ?>
  <p>Sourceforge's anonymous CVS is currently down.  It is not currently clear
  when it is going to be restored.  In addition, the 
  <a href="http://fink.cvs.sourceforge.net/viewvc/fink/">web interface</a> is
  not being updated.</p>
  <p>For folks who aren't behind firewalls, the best recommendation is to use
  <code>fink selfupdate-rsync</code> since that is currently functional.  If you're
  behind a firewall, the best short-term workaround is probably to ask for specific
  updated package description files on the mailing lists or by contacting the maintainer
  directly.</p>
  <p><b>Addendum: 2012-12-07:</b> Anonymous CVS is working again.</p>
 <a name="2012-09-25%20fink-0.34.4%20relased"><span class="news-date">2012-09-25: </span><span class="news-headline">fink-0.34.4 relased</span></a><?php gray_line(); ?>
  <p><code>fink-0.34.4</code> was released on 25 September, 2012.  This release adds diagnostics to make
  sure that the permissions of directories that <code>fink</code> uses when building packages are appropriate.
  Additionally, OS X versions 10.7.5 and 10.8.2 are recognized.</p>
 
