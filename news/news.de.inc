<a name="2010-04-01%20Neue%20Richtung"><span class="news-date">2010-04-01: </span><span class="news-headline">Neue Richtung</span></a><?php gray_line(); ?>
			<p>Das Fink-Projekt hat die Zukunft gesehen, und es ist flach und Portable.</p>
			<p>Effektives 1. Mai 2010, werden wir Arbeit über unsere Macbemühungen aufhören und schalten zur Entwicklung für das iPad sowie zum iPhone und zur iPod-Note.</p>
			<p>Die Fink-Verteilungen für Macbenutzer auf 10,4, 10,5, und 10,6 sind noch verfügbar, aber das Projekt liefern nicht mehr Updates.</p>
			<p>Danke für Ihren Support in den Jahren, und wir hoffen, dass Sie ein iPad aufheben, wenn er in Ihrem Bereich verfügbar ist, damit Sie fortfahren können, Fink auf einem Großbild zu genießen.</p>
		<a name="2009-10-30%20Servers%20back%20to%20normal."><span class="news-date">2009-10-30: </span><span class="news-headline">Servers back to normal.</span></a><?php gray_line(); ?>
      <p>Our user services have been restored. On Oct 28th the Web site and
      some of the mirrors (rsync, source files, binary distribution) were
      restored, and on Oct 30th all of our main rsync mirrors were operational.
      Once again, we apologise for the inconvenience. Thanks for your patience
      and support.</p>
    <a name="2009-10-24%20Server%20issues"><span class="news-date">2009-10-24: </span><span class="news-headline">Server issues</span></a><?php gray_line(); ?>
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

		<li>Run <code>fink scanpackages</code>.</li>
	  </ul>
      <p>We apologise for the inconvenience.</p>
	
