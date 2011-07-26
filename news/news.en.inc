<a name="2011-07-20%20Fink%20and%20Lion--updated."><span class="news-date">2011-07-20: </span><span class="news-headline">Fink and Lion--updated.</span></a><?php gray_line(); ?>
      <p>OS X 10.7 "Lion" was released on July 20, 2011.  We want to let Fink
      users know what to expect if updating.</p>
<p>First, the <code>fink</code> 
program itself will not run  on a system which has
been upgraded to Lion.  However, it will be possible to use the
<code>dpkg</code> program to extract a list of the Fink packages
which had been installed under 10.6, so that they can be reinstalled
under 10.7.  Use</p>
<p><code>dpkg --get-selections | cut -f1 &gt; fink_packages.txt</code></p>
<p>to extract the packages, and</p>
<p><code>cat fink_packages.txt | xargs fink install</code></p>
<p>once you have installed Fink for 10.7.</p>
<p>To upgrade fink after upgrading to Lion, one will have to bootstrap
Fink again, using a tarball for fink-0.31.0 or later.</p>
<p>Second, due to lots of changes under the hood, there currently are many fewer
Fink packages which build under 10.7 as opposed to 10.6.
Thus, even if you've extracted a list of Fink packages which had
been installed under 10.6, some of them may not yet be installable under
10.7.  We are currently creating a database showing which packages
can be successfully installed under 10.7, and work is ongoing to add packages.</p>
<p>10.7 introduces several drastic changes to how the system works. While this may
cause a slight delay in full Fink functionality in the short term, it will
make Fink work better in the future.</p>
    <a name="2011-07-16%20Fink%20and%20Lion."><span class="news-date">2011-07-16: </span><span class="news-headline">Fink and Lion.</span></a><?php gray_line(); ?>
      <p>Apple has announced that OS X 10.7 "Lion" will be released 
in July.  We want to let Fink users know what to expect when Lion is 
released.</p>
<p>First, the <code>fink</code> 
program itself will not run  on a system which has
been upgraded to Lion.  However, it will be possible to use the
<code>dpkg</code> program to extract a list of the Fink packages
which had been installed under 10.6, so that they can be reinstalled
under 10.7.  Use</p>
<p><code>dpkg --get-selections | cut -f1 &gt; fink_packages.txt</code></p>
<p>to extract the packages, and</p>
<p><code>cat fink_packages.txt | xargs fink install</code></p>
<p>once you have installed Fink for 10.7.</p>
<p>(To upgrade fink after upgrading to Lion, one will have to bootstrap
fink again, using a new version of fink which will be released shortly
after Lion has been released.  Watch this space for an announcement.)</p>
<p>Second, due to lots of changes under the hood, there will initially
be many fewer Fink packages which work under 10.7 as opposed to 10.6.
Thus, even if you've extracted a list of Fink packages which had
been installed under 10.6, some of them may not yet be installable under
10.7.  We are currently creating a database showing which packages
can be successfully installed under 10.7, but that database
may not be complete prior to the release of Lion.</p>
<p>10.7 introduces several drastic changes to how the system works. While this may
cause a slight delay in full Fink functionality in the short term, it will
make Fink work better in the future.</p>
    <a name="2011-07-11%20fink-0.30.2%20released."><span class="news-date">2011-07-11: </span><span class="news-headline">fink-0.30.2 released.</span></a><?php gray_line(); ?>
      <p><code>fink-0.30.2</code> was released to the unstable tree on 11 July, 2011.
      It is likely that this will be the last version that supports OS 10.4.</p>
      <p>It is planned to release it to stable soon.</p>
      <p><b>Update, 2011-07-15:</b>   It has been added to stable.</p>
    
