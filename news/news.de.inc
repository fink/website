<a name="2015-07-31%20CVS%20access%20restored"><span class="news-date">2015-07-31: </span><span class="news-headline">CVS access restored</span></a><?php gray_line(); ?>
  <p>
  We now have CVS access back for services including selfupdate, package updates, and
  website updates.
  </p>
 <a name="2015-06-13%20fink-0.38.6%20and%20dpkg-base-files-0.4%20released."><span class="news-date">2015-06-13: </span><span class="news-headline">fink-0.38.6 and dpkg-base-files-0.4 released.</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.38.6</code> was released on 13 June, 2015.  This release fixes an
  issue which prevented bootstrapping on Yosemite (or later) using Xcode newer
  than 6.2 .
  </p>
  <p>
  <code>dpkg-base-files-0.4</code> was also released on 13 June, 2015.  This update
  mitigates an issue in which packages with app bundles couldn't be updated on 
  Yosemite:
  </p>
  <pre>
 unable to make backup link of 
 `.%p/Applications/FOO.app/Contents/PkgInfo' 
 before installing new version: 
 Operation not permitted
</pre>
  <p>
  Users are encouraged to run <code>fink selfupdate</code> and install these new versions.
  </p>
  <a name="2015-06-9%20fink%20development%20branch%20for%2010.11%20on%20github"><span class="news-date">2015-06-9: </span><span class="news-headline">fink development branch for 10.11 on github</span></a><?php gray_line(); ?>
  <p>
	If you are interested in helping us with the migration to 10.11, a current released
	fink won't do the job.  A branch has been set up on 
	<a href="https://github.com/fink/fink/tree/TheCaptain">fink's github site</a> for this.
  </p>
  <p>
  Please note that right now we are in an alpha stage and you might need to wipe your 
  Fink distribution out a as stuff gets changed around.</p>
  
