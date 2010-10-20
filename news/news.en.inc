<a name="2010-10-19%20fink-0.29.14%20released"><span class="news-date">2010-10-19: </span><span class="news-headline">fink-0.29.14 released</span></a><?php gray_line(); ?>
      <p><code>fink-0.29.14</code> has been released to the unstable tree.
      This version of <code>fink contains</code>, among
      other new features, an <code>aria2</code> option for <code>DownloadMethod</code>,
      to allow the use of the <code>aria2</code> download accelerator
      (available via Fink), and a fix for the infamous "node exists" error.  
      </p>
      <p>It is planned to add this version to the stable tree shortly.</p>
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
    
