<a name="2019-02-25%20Mirrors%20currently%20down"><span class="news-date">2019-02-25: </span><span class="news-headline">Mirrors currently down</span></a><?php gray_line(); ?>
  <p>Fink's mirroring infrastructure is currently down. This will affect users selfupdating via rsync, as well as those using the binary distribution.</p>
  <p>In order to keep your Fink distribution up to date, please run the following commands:</p>
  <ul>
    <li>Run <code>fink selfupdate-git</code> to change your update method from rsync to git.</li>
    <li>Run <code>fink configure</code> to turn off using the binary to download pre-compiled packages.</li>
  </ul>
  <p>We apologize for the inconvenience.</p>
 <a name="2019-01-16%20fink-0.44.0%20released"><span class="news-date">2019-01-16: </span><span class="news-headline">fink-0.44.0 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released <code>fink-0.44.0</code>.  This release now supports macOS 10.14 (Mojave), as well as Java 10.  Use<code>fink selfupdate</code> to install it.</p>
  <p>The best update sequence from going to 10.9-10.13 to 10.14 is as follows:</p>
  <p>0) Start on 10.9-10.13.  Don't update your OS yet.</p>
  <p>1) In a terminal window, run <code>fink selfupdate</code> and install <code>fink-0.44.0</code></p>
  <p>2) Update to Mojave.</p>
  <p>3) In a terminal window, run <code>fink reinstall fink</code>.</p>
 <a name="2017-04-18%20fink-0.43.1%20released"><span class="news-date">2017-04-18: </span><span class="news-headline">fink-0.43.1 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released <code>fink-0.43.1</code>.  This is a bugfix release.  Use<code>fink selfupdate</code> to install it.</p>
  <p>If you happen to have updated your OS X before updating fink, follow the "Fixing updates when you have installed High Sierra before updating fink" instructions below, and then run <code>fink selfupdate</code> again.</p>
 
