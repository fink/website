<a name="2011-09-26%20fink-0.31.2%20released"><span class="news-date">2011-09-26: </span><span class="news-headline">fink-0.31.2 released</span></a><?php gray_line(); ?>
      <p><code>fink-0.31.2</code> was released to the 10.4/unstable and
      10.7/stable trees on 26 September, 2011.  Packages are now built by default
      using the number of parallel threads specified by the <code>MaxBuildJobs</code>
      field set via <code>fink configure</code>.  In addition, maintainers no longer
      have to specify a particular version of <code>fink</code> to use a
      <code>PatchFile</code>, and fixes a Perl issue.</p>
      <p>It is expected that the package will be added to 10.4/stable shortly.</p>
    <a name="2011-09-11%20fink-0.31.1%20released"><span class="news-date">2011-09-11: </span><span class="news-headline">fink-0.31.1 released</span></a><?php gray_line(); ?>
      <p><code>fink-0.31.1</code> was released to the 10.4/unstable and
      10.7/stable trees on
      11 September, 2011.  It fixes an issue in which 32-bit machines running OS
      10.6 wouldn't be allowed to bootstrap, even though this is a fully supported
      configuration.  It also provides a more robust scheme to report on the
      Xcode version in error messages than in prior <code>fink</code> versions.
      Finally OS 10.7.1 is recognized as a supported OS version.</p>
      <p>It is expected that the package will be added to 10.4/stable shortly.</p>
      <p><b>Update, 2011-09-26:</b>   It has been added to 10.4/stable.</p>
   <a name="2011-07-20%20Fink%20and%20Lion--updated."><span class="news-date">2011-07-20: </span><span class="news-headline">Fink and Lion--updated.</span></a><?php gray_line(); ?>
      <p>OS X 10.7 "Lion" was released on July 20, 2011.  We want to let Fink
      users know what to expect if updating.</p>
<p>First, the <code>fink</code> 
program itself will not run  on a system which has
been upgraded to Lion, so it is not possible currently to update a Fink
installation in place.However, is possible to use the
<code>dpkg</code> program to extract a list of the Fink packages
which are current installed so that they can be reinstalled
under 10.7.  Use</p>
<p><code>dpkg --get-selections | cut -f1 &gt; fink_packages.txt</code></p>
<p>before updating to 10.7 to dump the package names to a text file, and</p>
<p><code>cat fink_packages.txt | xargs fink install</code></p>
<p>once you have installed Fink on 10.7.</p>
<p>To upgrade Fink after upgrading to Lion, one will have to bootstrap
Fink again, using a tarball for <code>fink-0.31.0</code> or later.  If you want
to use the same directory (e.g. /sw) for Fink that you were using on 10.6, you'll
need to remove that before bootstrapping, since the bootstrap doesn't allow you
to overwrite an existing Fink tree.</p>
<p>Second, due to lots of changes under the hood, there currently are many fewer
Fink packages which build under 10.7 as opposed to 10.6.
Thus, even if you've extracted a list of Fink packages which had
been installed under 10.6, some of them may not yet be installable under
10.7.  We are currently creating a database showing which packages
can be successfully installed under 10.7, and work is ongoing to add packages.</p>
<p>10.7 introduces several drastic changes to how the system works. While this may
cause a slight delay in full Fink functionality in the short term, it will
make Fink work better in the future.</p>
    
