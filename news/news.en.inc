<a name="2011-01-05%20Temporary%20rysnc%20mirror%20outage."><span class="news-date">2011-01-05: </span><span class="news-headline">Temporary rysnc mirror outage.</span></a><?php gray_line(); ?>
      <p>We are experiencing a temporary failure in some of the rsync mirrors.
      If you have not seen updates in a while, then you may wish to change your
      rsync mirror for the time being by editing <code>/sw/etc/fink.conf</code> as a superuser
      and replacing the line that starts with <code>Mirror-rsync</code> with
        <code>Mirror-rsync: rsync://fink.gecko.ig42.org/finkinfo/</code></p>
        <p>or</p><p>
        <code>Mirror-rsync: rsync://hnd.jp.asi.finkmirrors.net/finkinfo/</code></p>
        <p>or</p><p>
        <code>Mirror-rsync: rsync://ber.de.eu.finkmirrors.net/finkinfo</code></p>
         <p>or</p><p>
        <code>Mirror-rsync: rsync://ams.nl.eu.finkmirrors.net/finkinfo/</code></p>       
      <p>If you prefer, you can select the latter three of the above mirrors via <code>fink configure</code>
      as well:  choose Asia (option 2) as your continent, Japan (10) as your country,
      and rsync://distfiles.hnd.jp.asi.finkmirrors.net/finkinfo/ (2) as the Rsync Selfupdate mirror;
      or choose Europe (4), then Germany (13) and rsync://ber.de.eu.finkmirrors.net/finkinfo/ 
      (3) as the rsync mirror, or Netherlands (27) and
      rsync://distfiles.ams.nl.eu.finkmirrors.net/finkinfo/ (2) as your rsync mirror. </p>
      <p><b>Update, 2011-01-07</b>  The mirrors are updating again.</p>
    <a name="2010-12-31%20Happy%2010th%20Birthday%20to%20Fink!"><span class="news-date">2010-12-31: </span><span class="news-headline">Happy 10th Birthday to Fink!</span></a><?php gray_line(); ?>
      <p>The Fink project was started in the waning days of December 2000 by
Christoph Pfisterer, using the "public beta" release of Mac OS X.
Within a year, versions 10.0 and 10.1 of OS X had been released, and
Fink usage took off.  Our founder chrisp stepped away from the project
in November 2001, and the community took over.</p>
<p>The Fink community is the heart of Fink, involving both package maintainers
and Fink users, as well as the small core team which tries to keep the
overall system in good shape.  The success of this community in keeping
Fink viable and active over ten years is really quite remarkable!  Let's
all join together to keep Fink going for a long time to come.</p>
<p>How long?  In the memorable words of Buzz Lightyear: <code>To Infinity
and Beyond!</code></p>
     <a name="2010-11-09%20fink-0.29.16%20released."><span class="news-date">2010-11-09: </span><span class="news-headline">fink-0.29.16 released.</span></a><?php gray_line(); ?>
      <p><code>fink-0.29.16</code> has been released to the unstable tree.
      This version of <code>fink</code> updates the versions of packages used for bootstrapping.</p>
      <p>It is planned to add this version of <code>fink</code> to the stable tree shortly.</p>
     
