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
  <a name="2012-04-14%20fink-0.32.6%20released"><span class="news-date">2012-04-14: </span><span class="news-headline">fink-0.32.6 released</span></a><?php gray_line(); ?>
   <p>
    <code>fink-0.32.6</code> was released on 14 April, 2012.  This release introduces
    a new package description field, <code>BuildAsNobody: false</code>, to mark packages which
    cannot built using <code>fink --build-as-nobody</code>.  Currently, this does not
    have any effect, but in <code>fink-0.33.0</code> and later we will begin building packages
    as an unprivileged user by default, and this field will allow packages to be built
    as root.
   </p>
  <a name="2012-04-09%20fink-0.32.5.5%20released"><span class="news-date">2012-04-09: </span><span class="news-headline">fink-0.32.5.5 released</span></a><?php gray_line(); ?>
   <p>
    <code>fink-0.32.5.5</code> was released on 9 April, 2012.  This bugfix release
    fixes an issue with bootstrapping on <b>10.5/PowerPC</b>.
   </p>
  
