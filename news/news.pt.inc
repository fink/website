<a name="2019-10-02%2010.15%20(Catalina)%20and%20Xcode11%20information"><span class="news-date">2019-10-02: </span><span class="news-headline">10.15 (Catalina) and Xcode11 information</span></a><?php gray_line(); ?>
  <p>Fink 0.45.0 and up support the upcoming 10.15 release, but there are some important things to note:</p>
  <ul>
    <li>Apple locked down the <code>/ (root)</code> directory where Fink normally installs (in <code>/sw</code> by default), so existing Fink installs may become read-only upon updating to 10.15.</li>
    <li>Xcode11 introduces some known breakages (with no known fixes at this time) to important packages like gcc, so not everything will build yet.</li>
  </ul>
  <p>Once macOS 10.15 is officially released, we suggest waiting to upgrade until we know how the system will treat existing installs and we can determine the best upgrade path.</p>
  <p>For anyone installing Fink for the first time (on 10.15beta or an earlier macOS version), we now recommend using <code>/opt/sw</code> as the install location, since that's known to work. The next Fink release after macOS 10.15 is out will use <code>/opt/sw</code> as the default install location.</p>
  <p>Xcode11 is known to currently break building the gccX and several other important packages. If possible (especially 10.14 users), hold off on upgrading to Xcode11 unless you need something specific from it. If you do upgrade to Xcode11, make sure that the Command Line Tools are also upgraded to version 11 for your macOS release.</p>
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
 
