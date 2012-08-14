<a name="2012-07-25%20Mountain%20Lion%20released"><span class="news-date">2012-07-25: </span><span class="news-headline">Mountain Lion released</span></a><?php gray_line(); ?>
   <p>Mountain Lion is now available to the general public.  Ideally, users should update
 to <code>fink-0.34.0</code> or later before updating their OS.  In addition, Xcode 4.4 
 (or at least its command line tools) is required--it can be installed under Lion, but 
 there is a separate version of the Command Line Tools for Mountain Lion, so make sure
 to install those.  Use </p><p><code>fink list xcode</code></p><p>to verify that you have the
 Xcode 4.4 command-line tools installed, and that Fink knows where your Xcode.app is.
 If the CLI tools are missing or not for Xcode 4.4, reinstall them, e.g. via the Xcode 
 Preferences.  If <code>fink</code> isn't finding your Xcode.app, use</p>
 <p><code>sudo xcode-select -switch /path/to/Xcode.app</code></p>
 <p>to make sure that your system's tools are pointing to the right place.  Also run</p>
 <p>sudo xcodebuild -license</p><p>to make sure that the Xcode license is accepted
 globally on your system, especially for fink's build user.</p>
 <p>Once you have updated the OS, use</p>
 <p><code>fink reinstall fink</code></p><p>to point it to the 10.8 distribution, and run</p>
 <p><code>fink install perl5123-core</code></p><p>to make sure any Perl modules you have
 from Lion will still work.</p>
 <p>If you updated the OS first,
  and have an earlier version of <code>fink</code> which doesn't know about Mountain Lion, you
  have probably found that it doesn't work.  To work around this issue, do the 
  following: (1) download an updated copy of 
  <a href="https://raw.github.com/fink/fink/master/perlmod/Fink/Services.pm">
  Services.pm</a>, (2) move the downloaded file into /sw/lib/perl5/Fink, such as
  via</p><p><code>sudo mv /path/to/Services.pm /sw/lib/perl5/Fink</code></p><p>; 
  (change <code>/sw</code> and <code>/path/to</code> to match 
  your particular setup); (3) run</p><p><code>fink selfupdate</code></p><p>, which should
  download and install <code>fink-0.34.0</code>; (4) use </p><p><code>fink reinstall fink</code></p>
  <p>to ensure that <code>fink</code> is pointing at the 10.8 distribution, 
  and (5) install <code>perl5123-core</code>
  as above.</p>
  <p><b>Addendum, 2012-07-26:</b>  It appears that the OS update wipes out the
  users that Fink creates (but not the groups).  After following the steps above, you should
  (1) Run</p><p><code>fink configure</code></p><p> to set the Fink build user back up, and 
  (2) use </p><p><code>fink list -it passwd | cut -f2 | xargs fink reinstall</code></p><p> to reinstall
  the various <code>passwd*</code> packages and their users.</p> 
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
  
