<a name="2012-04-09%20fink-0.32.5.5%20released"><span class="news-date">2012-04-09: </span><span class="news-headline">fink-0.32.5.5 released</span></a><?php gray_line(); ?>
   <p>
    <code>fink-0.32.5.5</code> was released on 9 April, 2012.  This bugfix release
    fixes an issue with bootstrapping on <b>10.5/PowerPC</b>.
   </p>
  <a name="2012-04-08%20fink-0.32.5.4%20released"><span class="news-date">2012-04-08: </span><span class="news-headline">fink-0.32.5.4 released</span></a><?php gray_line(); ?>
   <p>
    <code>fink-0.32.5.4</code> was released on 8 April, 2012.  This release allows users
    on 10.7 to bootstrap against the Xcode Command Line Tools.  Note that some packages
    actually require the full Xcode to build.
   </p>
  <a name="2012-03-27%20fink-0.32.4.1%20released"><span class="news-date">2012-03-27: </span><span class="news-headline">fink-0.32.4.1 released</span></a><?php gray_line(); ?>
      <p><code>fink-0.32.4.1</code> was released on 27 March, 2012.  This
      release allows users to install Xcode 4.3.x in an arbitrary location.</p>
      <p>After installing Xcode 4.3.x, users should:  (1) Select the Components pane from Xcode-&gt;Preferences-&gt;Downloads and 
      install the Command Line Tools, or install them via the separate installer from 
      connect.apple.com, and (2) run</p><p><code>sudo xcode-select -switch /path/to/Xcode.app/Contents/Developer</code></p>
      <p>(replacing <code>/path/to</code> with the actual path to the Xcode app) to make sure that everything is pointed in the right place.</p>
      <p><code>fink-0.32.4.1</code> also enhances the checksumming operation under
      <code>fink fetch</code>.</p>
    
