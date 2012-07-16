<a name="2012-07-16%20fink-0.34.0%20released"><span class="news-date">2012-07-16: </span><span class="news-headline">fink-0.34.0 released</span></a><?php gray_line(); ?>
   <p><code>fink-0.34.0</code> was released on 16 July, 2012.  This is the first 
   release to support Mountain Lion (OS 10.8).</p>
   <p>Until Mountain Lion is available to the general public, we ask that users
   submit bug reports to the <a href="mailto:fink-seed@lists.sourceforge.net">
   Fink Seed List</a>, which has been set up in such a manner as to to avoid 
   violating the NDA.</p>
  <a name="2012-07-05%20fink-0.33.3%20released"><span class="news-date">2012-07-05: </span><span class="news-headline">fink-0.33.3 released</span></a><?php gray_line(); ?>
   <p><code>fink-0.33.3</code> was released on 5 July, 2012.  This release fixes a bug
   whereby <code>fink</code> wouldn't build packages as the <code>fink-bld</code> user
   (i.e. most packages) if certain <code>su</code> or <code>sudo</code> options were 
   chosen.  In addition, packages now log the md5 sums of all of their files for diagnostic
   purposes.  And users who are only using the Xcode Command-Line Tools will enjoy not
   seeing frequent messages that Xcode.app can't be found.</p>
  <a name="2012-06-11%20fink-0.33.0%20released"><span class="news-date">2012-06-11: </span><span class="news-headline">fink-0.33.0 released</span></a><?php gray_line(); ?>
   <p><code>fink-0.33.0</code> was released on 6 June, 2012.  This release introduces some new
    features:</p>
   <p>Starting with this version of <code>fink</code>, packages will be built as an unprivileged
   user by default, which prevents the build process from installing files in the rest of the
   filesystem. (Prior to <code>fink-0.33.0</code> we relied on maintainers to test their packages
   using this method).  Users may find that some packages don't build in this mode, so we appreciate
   feedback, as always, to help us find and correct problems.</p>
   <p>In addition, we have added some additional options for maintainers in this Fink version.
   <b>/sw/Library/Python</b> has been added to the list of valid directories in a package, to
   provide a unified location to install modules built against a built-in Python.  There is
   now an <code>xcode.app</code> virtual package for packages that use <code>xcodebuild</code>
   to BuildDepend upon.  Its version is the version of Xcode.app.  The <code>xcode</code>
   virtual package has always been based on the presence of the command-line tools, and now its
   version is the version of those.  Note that <code>xcode</code> and <code>xcode.app</code>
   are the same for Xcodes prior to 4.3.</p>
  
