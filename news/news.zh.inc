<a name="2017-03-28%20fink-0.43.0%20released"><span class="news-date">2017-03-28: </span><span class="news-headline">fink-0.43.0 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released <code>fink-0.43.0</code>.  This release supports using
  <code>git</code> or <code>svn</code> to update packages instead of cvs, particularly to 
  work through firewalls via HTTPS.  Use <code>fink selfupdate-git</code> or 
  <code>fink selfupdate-svn</code> to switch to one of those methods.  
  This release officially supports 10.9.0-10.13.4.  It also enhances support for Oracle's
  Java 9 as well as the 2017 release of Apple's legacy Java.
  In addition, it incorporates other bug fixes and enhancements.  
  The best update sequence from going to 10.9-10.12 to 10.13 is as follows:</p>
  <p>0) Start on 10.9-10.12.  Don't update your OS yet.</p>
  <p>1) In a terminal window, run <code>fink selfupdate</code> and install <code>fink-0.42.0</code></p>
  <p>2) Update to High Sierra.</p>
  <p>3) In a terminal window, run <code>fink reinstall fink</code>.</p>
  <p>If you happen to have updated your OS X before updating fink, follow the instructions below, and then run "fink selfupdate" again.</p>
 <a name="2017-10-07%20fink-0.42.0%20released"><span class="news-date">2017-10-07: </span><span class="news-headline">fink-0.42.0 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released <code>fink-0.42.0</code> to provide High Sierra (10.13) support.
  This release officially supports 10.9.0-10.13.0.  It also adds support for Oracle's Java 9.  
  In addition, it incorporates other bug fixes and enhancements.  
  The best update sequence from going to 10.9-10.12 to 10.13 is as follows:</p>
  <p>0) Start on 10.9-10.12.  Don't update your OS yet.</p>
  <p>1) In a terminal window, run <code>fink selfupdate</code> and install <code>fink-0.42.0</code></p>
  <p>2) Update to High Sierra.</p>
  <p>3) In a terminal window, run <code>fink reinstall fink</code>.</p>
  <p>If you happen to have updated your OS X before updating fink, follow the instructions below, and then run "fink selfupdate" again.</p>
 <a name="2017-10-03%20Fixing%20updates%20when%20you%20have%20installed%20High%20Sierra%20before%20updating%20fink"><span class="news-date">2017-10-03: </span><span class="news-headline">Fixing updates when you have installed High Sierra before updating fink</span></a><?php gray_line(); ?>
  <p>If you have updated to High Sierra before updating fink, your <code>fink</code> command 
  won't be able to function any more.  Fortunately, a workaround is now available.</p>
  <p>1) Download an updated <a href="http://bindist.finkproject.org/10.13/dists/stable/main/binary-darwin-x86_64/base/fink_0.42.0-121_darwin-x86_64.deb">fink</a>.</p>
  <p>2) In a terminal window, run <code>sudo dpkg -i fink_0.42.0-121_darwin-x86_64.deb</code> from the directory where you downloaded the file.</p>
 
