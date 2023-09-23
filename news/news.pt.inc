<a name="2023-09-23%20Support%20for%20macOS%2011%20through%20macOS%2013"><span class="news-date">2023-09-23: </span><span class="news-headline">Support for macOS 11 through macOS 13</span></a><?php gray_line(); ?>
  <p>The main source branch for Fink development supports macOS 11 through macOS 13, under both intel (x86_64) and Apple's M1 and M2 (arm64) CPUs.</p>
  <p>Final work on a full release is ongoing. As there isn't a full release tarball yet, you need to download and install the code from git with these commands in Terminal.app:</p>
  <pre>
  mkdir -p ~/src
  cd src
  git clone https://github.com/fink/fink fink-upstream
  cd fink-upstream
  </pre>
  <p>If updating an existing Fink install, run <code>./inject.pl</code> from the Terminal prompt. If doing a fresh install, run <code>./bootstrap</code>.</p>
 <a name="2022-02-19%20fink-0.45.6%20released"><span class="news-date">2022-02-19: </span><span class="news-headline">fink-0.45.6 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released fink-0.45.6. This is a quick release to fix a bug introduced in fink-0.45.5 (issue #240).</p>
  <p>This release does not yet support macOS 11 (Big Sur) or macOS 12 (Monterey). Support for those two releases is coming soon.</p>
 <a name="2021-11-03%20fink-0.45.4%20released"><span class="news-date">2021-11-03: </span><span class="news-headline">fink-0.45.4 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released fink-0.45.4. This is a minor upgrade to support XQuartz 2.8.</p>
  <p>This release does not yet support macOS 11 (Big Sur) or macOS 12 (Monterey). Support for those two releases is coming soon.</p>
 
