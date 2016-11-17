<a name="2016-09-20%20fink-0.41.0%20released"><span class="news-date">2016-09-20: </span><span class="news-headline">fink-0.41.0 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released <code>fink-0.41.0</code> to provide Sierra (10.12) support.
  This release officially supports 10.9.0-10.12.0 and incorporates other bug fixes and enhancements.  
  The best update sequence from going to 10.9 or 10.10 to 10.12 is as follows:</p>
  <p>0) Start on 10.9 or 10.10.</p>
  <p>1) <code>fink cleanup --deb</code></p>
  <p>2) <code>fink selfupdate</code></p>
  <p>4) Update to 10.12</p>
  <p>5) <code>fink reinstall fink</code></p>
  <p>If you happen to have updated your OS X before updating fink, see if you can install
  <code>fink-0.41.0</code> for your former distribution by using <code> sudo apt-get update ; sudo apt-get install fink </code> 
  and then use <code>fink reinstall fink</code> to switch your distribution.</p>
  <p>Otherwise you can download a <a href="http://bindist.finkmirrors.net/10.12/dists/stable/main/binary-darwin-x86_64/base/fink_0.41.0-111_darwin-x86_64.deb">
  .deb  archive</a> manually, and install it using 
  <code>sudo dpkg -i fink_0.39.4-101_darwin-x86_64.deb</code> from the directory where 
  you downloaded it, then use <code>fink reinstall fink</code> to update the distribution.
  </p>
 <a name="2016-08-13%20fink-0.39.5%20released"><span class="news-date">2016-08-13: </span><span class="news-headline">fink-0.39.5 released</span></a><?php gray_line(); ?>
   <p>The Fink Project has released <code>fink-0.39.5</code> for 10.9-10.11.  This 
  officially supports 10.9.0-10.11.6, and among other fixes and enhancements it
  switches from using <code>otool</code> to <code>otool-classic</code> to maintain
  compatibility with Xcode 8.</p>
 <a name="2016-07-30%20fink-0.39.4%20released"><span class="news-date">2016-07-30: </span><span class="news-headline">fink-0.39.4 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released <code>fink-0.39.4</code> for 10.9-10.11.  This 
  officially supports 10.9.0-10.11.5 and incorporates bug fixes and enhancements.  
  The best update sequence from going to 10.9 or 10.10 to 10.11 is as follows:</p>
  <p>0) Start on 10.9 or 10.10.</p>
  <p>1) fink cleanup --deb</p>
  <p>2) fink selfupdate</p>
  <p>3) fink selfupdate</p>
  <p>4) Update to 10.11</p>
  <p>If you happen to have updated your OS X before updating Fink, you can download a
  <a href="http://downloads.sourceforge.net/fink/fink_0.39.4-101_darwin-x86_64.deb">
  .deb  archive</a> , and install it using 
  <code>sudo dpkg -i fink_0.39.4-101_darwin-x86_64.deb</code> from the directory where 
  you downloaded it.
  </p>
 
