<a name="2019-06-02%20Fink%20mirrors%20are%20back"><span class="news-date">2019-06-02: </span><span class="news-headline">Fink mirrors are back</span></a><?php gray_line(); ?>
  <p>Thanks to the work of Fink members Chris Z and Justin H, the finkmirrors.net domain is operational once again.</p>
  <p>We are looking for new mirror owners to extend our mirroring service. If you can host a Fink mirror, see <a href="http://finkmirrors.net/">the main Fink Mirrors site</a> for instructions and requirements.</p>
  <p>Thank you for your patience.</p>
 <a name="2019-05-30%20Issues%20with%20macOS%2010.14.5"><span class="news-date">2019-05-30: </span><span class="news-headline">Issues with macOS 10.14.5</span></a><?php gray_line(); ?>
  <p>Apple's release of macOS 10.14.5 updated the system perl version from 5.18.2 to 5.18.4. This update broke bootstrapping fresh installs, as well as existing perl modules dependent on perl-5.18.2.</p>
  <p>Fixes for Fink working on macOS 10.14.5 are tracked <a href="https://github.com/fink/fink/pull/190">on GitHub</a>. </p>
  <p>We apologize for the inconvenience.</p>
 <a name="2019-03-14%20fink-0.44.1%20released"><span class="news-date">2019-03-14: </span><span class="news-headline">fink-0.44.1 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released <code>fink-0.44.1</code>.  This is primarily a bugfix release to fix bootstrapping or using the <code>Install Fink.tool</code> script, but with some additional optimization updates behind the scenes.  Use<code>fink selfupdate</code> to install it.</p>
  <p>The best update sequence from going to 10.9-10.13 to 10.14 is as follows:</p>
  <p>0) Start on 10.9-10.13.  Don't update your OS yet.</p>
  <p>1) In a terminal window, run <code>fink selfupdate</code> and install <code>fink-0.44.1</code></p>
  <p>2) Update to Mojave.</p>
  <p>3) In a terminal window, run <code>fink reinstall fink</code>.</p>
 
