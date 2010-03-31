<a name="2010-04-01%20New%20Direction"><span class="news-date">2010-04-01: </span><span class="news-headline">New Direction</span></a><?php gray_line(); ?>
			<p>The Fink Project has seen the future, and it is flat and portable.</p>
			<p>Effective 1 May 2010, we are going to cease work on our Mac efforts, and 
switch to development for the iPad, as well as the iPhone and iPod Touch.</p>
			<p>The Fink distributions for Mac users on 10.4, 10.5, and 10.6 will still be 
available, but the project will no longer provide updates.</p>
			<p>Thank you for your support over the years, and we hope you will pick up an
iPad when it is available in your area so that you can continue to enjoy Fink on a large screen.</p>
		<a name="2009-10-30%20Servers%20back%20to%20normal."><span class="news-date">2009-10-30: </span><span class="news-headline">Servers back to normal.</span></a><?php gray_line(); ?>
      <p>Our user services have been restored. On Oct 28th the Web site and
      some of the mirrors (rsync, source files, binary distribution) were
      restored, and on Oct 30th all of our main rsync mirrors were operational.
      Once again, we apologise for the inconvenience. Thanks for your patience
      and support.</p>
    <a name="2009-10-24%20Server%20issues."><span class="news-date">2009-10-24: </span><span class="news-headline">Server issues.</span></a><?php gray_line(); ?>
      <p>We have had server issues and as a result the Web site and the
      official binary distribution are down, and the rsync servers are stalled.
      Whilst we sort this out, you may:</p>
      <ul>
        <li>(Web site) Use <a href="http://fink.thetis.ig42.org">http://fink.thetis.ig42.org</a> if
        you need Web site information</li>

        <li>(selfupdate) If you use rsync as your selfupdate method then edit
        <code>/sw/etc/fink.conf</code> and replace the line that starts with
        <code>Mirror-rsync</code> with <code>Mirror-rsync:
        rsync://fink.gecko.ig42.org/finkinfo/</code></li>

        <li>(source files) Edit <code>/sw/etc/fink.conf</code> and replace the
        line that starts with <code>Mirror-master</code> with
        <code>Mirror-master: http://fink-dist.gecko.ig42.org</code></li>
        
        <li>(bindist) Edit <code>/sw/etc/fink.conf</code> and replace the line
        that starts with <code>Mirror-apt:</code> with <code>Mirror-apt:
        http://fink-bindist.gecko.ig42.org</code></li>

        <li>(bindist) Edit <code>/sw/etc/apt/sources.list</code> and replace
        <code>http://bindist.finkmirrors.net/bindist</code> with
        <code>http://fink-bindist.gecko.ig42.org</code></li>

        <li>(bindist) Run <code>fink scanpackages</code>.</li>
      </ul>
      <p>We apologise for the inconvenience.</p>
    
