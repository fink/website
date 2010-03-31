<a name="2010-04-01%20Nueva%20direcci%C3%B3n"><span class="news-date">2010-04-01: </span><span class="news-headline">Nueva dirección</span></a><?php gray_line(); ?>
			<p>El proyecto de Fink ha considerado el futuro, y es plano y portable.</p>
			<p>1 de mayo de 2010 eficaz, vamos a cesar el trabajo sobre nuestros esfuerzos del mac, y cambiamos al desarrollo para el iPad, así como al iPhone y al tacto de iPod.</p>
			<p>Las distribuciones de Fink para los utilizadores del mac el 10,4, 10,5, y 10,6 todavía estarán disponibles, solamente el proyecto proporcionarán no más a actualizaciones.</p>
			<p>Gracias por su ayuda durante los años, y esperamos que usted coja un iPad cuando está disponible en su área de modo que usted pueda continuar gozando de Fink en un en pantalla grande.</p>
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
	
