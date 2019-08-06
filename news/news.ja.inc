<a name="2019-08-05%20fink-0.45.0%20released"><span class="news-date">2019-08-05: </span><span class="news-headline">fink-0.45.0 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released fink-0.45.0. This release provides support for macOS 10.14.5 and up, including preliminary support for macOS 10.15beta. This release also provides full support for .app bundles in APFS volumes.</p>
  <p>If your system is still on macOS 10.14.4 or earlier:</p>
  <ol>
    <li>In a terminal window, run <code>fink selfupdate</code> and install <code>fink-0.45.0</code>.</li>
    <li>Update to the latest version of Mojave.</li>
    <li>In a terminal window, run <code>fink reinstall fink</code>.</li>
  </ol>
  <p>If you have already updated to macOS 10.14.5:</p>
  <ol>
    <li>In a terminal window, run <code>fink selfupdate</code> and install <code>fink-0.45.0</code>.</li>
  </ol>
 <a name="2019-06-02%20Fink%20mirrors%20are%20back"><span class="news-date">2019-06-02: </span><span class="news-headline">Fink mirrors are back</span></a><?php gray_line(); ?>
  <p>Thanks to the work of Fink members Chris Z and Justin H, the finkmirrors.net domain is operational once again.</p>
  <p>We are looking for new mirror owners to extend our mirroring service. If you can host a Fink mirror, see <a href="http://finkmirrors.net/">the main Fink Mirrors site</a> for instructions and requirements.</p>
  <p>Thank you for your patience.</p>
 <a name="2019-05-30%20Issues%20with%20macOS%2010.14.5"><span class="news-date">2019-05-30: </span><span class="news-headline">Issues with macOS 10.14.5</span></a><?php gray_line(); ?>
  <p>Apple's release of macOS 10.14.5 updated the system perl version from 5.18.2 to 5.18.4. This update broke bootstrapping fresh installs, as well as existing perl modules dependent on perl-5.18.2.</p>
  <p>Fixes for Fink working on macOS 10.14.5 are tracked <a href="https://github.com/fink/fink/pull/190">on GitHub</a>. </p>
  <p>We apologize for the inconvenience.</p>
 
