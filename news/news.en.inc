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
  <a name="2012-04-08%20fink-0.32.5.4%20released"><span class="news-date">2012-04-08: </span><span class="news-headline">fink-0.32.5.4 released</span></a><?php gray_line(); ?>
   <p>
    <code>fink-0.32.5.4</code> was released on 8 April, 2012.  This release allows users
    on 10.7 to bootstrap against the Xcode Command Line Tools.  Note that some packages
    actually require the full Xcode to build.
   </p>
  
